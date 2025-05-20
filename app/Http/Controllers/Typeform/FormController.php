<?php

namespace App\Http\Controllers\Typeform;

use App\Helpers\DownloadCSV;
use App\Helpers\PaginationHelper;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\NCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Form;
use App\Models\Organization;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class FormController extends Controller
{
    // public function settings(){
    //     return view('')
    // }
    public function index(Request $request)
    {
        $formsQuery = Form::with('organization','branches');

        if($request->filled('search_title')){
            $formsQuery->where('form_title','like','%'.$request->search_title.'%');
        }

        if($request->filled('country')){
            $formsQuery->where('country',$request->country);
        }
        if($request->filled('organization')){
            $formsQuery->where('organization_id',$request->organization);
        }
        if($request->filled('branch')){
            $formsQuery->where('branch_id',$request->branch);
        }
        if($request->filled('survey')){
            $formsQuery->where('form_id',$request->survey);
        }

        $forms = $formsQuery->filterForm()->latest()->paginate(10);
        
        $forms = PaginationHelper::addSerialNo($forms);

        // $countriesPath = public_path('build/js/countries/countries.json');
        // $countries = json_decode(File::get($countriesPath),true);
        $countries = Form::select('country')->filterForm()->distinct()->get();
        $organizations = Organization::filterOrganization()->get();
        $branches = Branch::filterBranch()->get();
        $surveys = Form::filterForm()->get();

        return view('typeform.form.index',compact('forms','countries','organizations','branches','surveys'));
    }

    public function show(String $id)
    {
        $form = Form::with('organization','branches')->filterForm()->find($id);

        if($form){
            return view('typeform.form.view',compact('form'));
        }else{
            return redirect()->back()->with('error','Form Not Found');
        }
    }

    public function create()
    {
        $countriesPath = public_path('build/js/countries/countries.json');
        $countries = json_decode(File::get($countriesPath),true);

        $organizations = Organization::filterOrganization()->get();

        return view('typeform.form.create',compact('countries','organizations'));
    }

    public function reformatDate($dateString){
        try{
            $date = Carbon::createFromFormat('d M, Y',$dateString);
            return $date->format('d-m-Y');
        }catch(\Exception $e){
            Log::error('Error in reformatDate:',['error'=>$e->getMessage()]);
            return null;
        }
      
    }

    public function store(Request $request)
    {  
        $validatedData = $request->validate([
            'formId' => 'required|unique:forms,form_id',
            'form_name' => 'required|string',
            'country' => 'required|string',
            'organization' => 'required|integer',
            'branch'=>['nullable','integer',Rule::requiredIf(function() use($request){
                return auth()->user()->role->name == 'branch';
            })],
            'beforedate' => 'required|string',
            'duringdate' => 'nullable|string',
            'afterdate' => 'nullable|string',
            'questions' => 'required|array',
            'questions.question' => 'required|array',
            'questions.ref' => 'required|array',
        ]);
        
        
        DB::transaction(function() use($validatedData,$request){
            try {
                //Formatting Date
                $beforedate_start = $this->reformatDate(explode(' to ',$validatedData['beforedate'])[0]);
                $beforedate_end = $this->reformatDate(explode(' to ',$validatedData['beforedate'])[1]);
                if($validatedData['duringdate']){
                    $duringdate_start = $this->reformatDate(explode(' to ',$validatedData['duringdate'])[0]);
                    $duringdate_end = $this->reformatDate(explode(' to ',$validatedData['duringdate'])[1]);
                }
                if($validatedData['afterdate']){
                    $enddate_start = $this->reformatDate(explode(' to ',$validatedData['afterdate'])[0]);
                    $enddate_end = $this->reformatDate(explode(' to ',$validatedData['afterdate'])[1]); 
                }

                if(isset($validatedData['branch'])){
                    $branch_id =$validatedData['branch'];
                    $branchLevel = 1;
                }else{
                    $branch_id=null;
                    $branchLevel = 0;
                }

                //Form Data
                $formData = [
                    'form_id' => $validatedData['formId'],
                    'form_title' => $validatedData['form_name'],
                    'country' => $validatedData['country'],
                    'webhook' => $request->webhook ? 1:0,
                    'organization_id' => $validatedData['organization'],
                    'branch_id' => $branch_id,
                    'branch_level'=>$branchLevel,
                    'before' => $beforedate_start.' to '.$beforedate_end,
                    'during' => $validatedData['duringdate'] !== null ? $duringdate_start.' to '.$duringdate_end : null,
                    'after' => $validatedData['afterdate'] !== null ? $enddate_start.' to '.$enddate_end : null
                ];
                
                Form::create($formData);
    
                //Question Data
                $labelDBData = [
                    'name',
                    'age',
                    'gender',
                    'country',
                    'state',
                    'well_functioning_government',
                    'low_level_corruption',
                    'equitable_distribution',
                    'good_relations',
                    'free_flow',
                    'high_levels',
                    'sound_business',
                    'acceptance_rights',
                    'positive_peace',
                    'negative_peace',
                    'extra_ques1',
                    'extra_ques2',
                    'extra_ques3',
                ];
                
                $matchCountry = array_filter($validatedData['questions']['ref'],function($item){
                    return is_string($item) && Str::contains($item,'country_field_ref');
                });
                
                if(empty($matchCountry)){
                    $labelDBData = array_filter($labelDBData,function($item){
                        return $item !== 'country'; 
                    });
                }
                
                
                $matches = array_filter($validatedData['questions']['ref'],function($item){
                    return is_string($item) && str_ends_with($item,'_state_field_ref');
                });
                
                
                if(empty($matches)){
                    $labelDBData = array_filter($labelDBData,function($item){
                        return $item !== 'state'; 
                    });
                    
                    $labelDBData = array_values($labelDBData);
                }
                
                if(!empty($matches)){
                     $firstStateIndex = null;
                
                    foreach($validatedData['questions']['question'] as $index=>$value){
                        if(is_string($value) && strpos($value,"Which state are your from?") === 0){
                            $firstStateIndex = $index;
                            break;
                        }
                    }
                    
                    $filteredArray = array_filter($validatedData['questions']['question'],function($item){
                        return !is_string($item) || strpos($item,'Which state are your from?') !== 0;
                    });
                    
                    $filteredArray = array_values($filteredArray);
                    
                    if(!is_null($firstStateIndex)){
                        array_splice($filteredArray,$firstStateIndex,0,["Which state are you from?"]);
                    }
                    
                    $validatedData['questions']['question'] = $filteredArray;
                }
                
                $questionFormattingData = [];

                foreach ($validatedData['questions']['question'] as $key => $question) {
                    $questionFormattingData[$labelDBData[$key]] = $question;
                }
                
                $formIdData = [
                    'form_id' => $validatedData['formId']
                ];
                
                $questionsData = array_merge($formIdData, $questionFormattingData);
            
                Question::create($questionsData);
                Log::info("Form and Question Created Successfully!");
                // return redirect()->route('form.index')->with('success', 'Successfully Created Form and its Questions!!!');
            } catch (\Exception $e) {
                Log::info($e->getMessage());
                DB::rollBack();
                return redirect()->back()->with('error', 'Failed to Create Form and its Questions'.$e->getMessage());
            }
        });
        return redirect()->route('form.index')->with('success', 'Successfully Created Form and its Questions!!!');
    }

    public function getForm(Request $request)
    {
        $validatedData = $request->validate([
            'form_id'=>'required'
        ]);

        $formId = $validatedData['form_id'];

        //Check Form Id Exists
        $checkForm = Form::where('form_id',$formId)->first();

        if($checkForm){
            return response()->json([
                'status' => false,
                'message' => 'Form with this ID already Exists.'
            ], 404);
        }

        $apiKey = config('services.api.key');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey
        ])->get('https://api.typeform.com/forms/' . $formId);

        if ($response->successful()) {
            return response()->json([
                'status' => true,
                'data' => $response->json()
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Form Not Found'
            ], 404);
        }
    }

    public function filterOrganization(Request $request){
        $validatedData = $request->validate([
            'country' => 'nullable|string'
        ]);

        $organizationsQuery = Organization::query();

        if($request->filled('country')){
            $organizationsQuery->where('country',$validatedData['country']);
        }
        $organizations = $organizationsQuery->get();
        
        if($organizations){
            return response()->json([
                'status'=>true,
                'organizations'=>$organizations
            ],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Organization Not Found'
            ],404);
        }
    }

    public function filterBranch(Request $request){
        $validatedData = $request->validate([
            'organization_id' => 'required|integer'
        ]);

        $branches = Branch::where('organization_id',$validatedData['organization_id'])->get();
        
        if($branches){
            return response()->json([
                'status'=>true,
                'branches'=>$branches
            ],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Branch Not Found'
            ],404);
        }
    }

    public function filterSurvey(Request $request){
        $validatedData = $request->validate([
            'country'=>'nullable|string',
            'organization_id' => 'nullable|integer',
            'branch_id'=>'nullable|integer',
        ]);

        $formQuery = Form::query();
        
        if($request->filled('country')){
            $formQuery->where('country',$validatedData['country']);
        }

        if($request->filled('organization_id')){
            $formQuery->where('organization_id',$validatedData['organization_id']);
        }
        
        if($request->filled('branch_id')){
            $formQuery->where('branch_id',$validatedData['branch_id']);
        }
        
        $forms = $formQuery->get();
        
        if($forms){
            return response()->json([
                'status'=>true,
                'forms'=>$forms
            ],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Form Not Found'
            ],404);
        }
    }

    public function edit(String $id)
    {
        $form = Form::with('branches','branches.organization')->filterForm()->find($id);
        $countriesPath = public_path('build/js/countries/countries.json');
        $countries = json_decode(File::get($countriesPath),true);

        $organizations = Organization::filterOrganization()->get();

        if($form){
            return view('typeform.form.edit',compact('form','countries','organizations'));
        }else{
            return redirect()->back()->with('error','Form Not Found');
        }
       
    }


    public function update(Request $request,Form $form)
    {
        $validatedData = $request->validate([
            'formId' => 'required|exists:forms,form_id',
            'form_name' => 'required|string',
            'country' => 'required|string',
            'organization' => 'required|integer',
            'branch'=>['nullable','integer',Rule::requiredIf(function() use($request){
                return auth()->user()->role->name == 'branch';
            })],
            'beforedate' => 'required|string',
            'duringdate' => 'nullable|string',
            'afterdate' => 'nullable|string',
        ]);
        
        DB::transaction(function() use($validatedData,$form){
            try {
                //Formatting Date
                $beforedate_start = $this->reformatDate(explode(' to ',$validatedData['beforedate'])[0]);
                $beforedate_end = $this->reformatDate(explode(' to ',$validatedData['beforedate'])[1]);
                if($validatedData['duringdate']){
                    $duringdate_start = $this->reformatDate(explode(' to ',$validatedData['duringdate'])[0]);
                    $duringdate_end = $this->reformatDate(explode(' to ',$validatedData['duringdate'])[1]);
                }
                if($validatedData['afterdate']){
                    $enddate_start = $this->reformatDate(explode(' to ',$validatedData['afterdate'])[0]);
                    $enddate_end = $this->reformatDate(explode(' to ',$validatedData['afterdate'])[1]); 
                }

                if(isset($validatedData['branch'])){
                    $branch_id =$validatedData['branch'];
                    $branchLevel = 1;
                }else{
                    $branch_id=null;
                    $branchLevel = 0;
                }

                //Form Data
                $formData = [
                    'form_id' => $validatedData['formId'],
                    'form_title' => $validatedData['form_name'],
                    'country' => $validatedData['country'],
                    'organization_id' => $validatedData['organization'],
                    'branch_id' => $branch_id,
                    'branch_level'=>$branchLevel,
                    'before' => $beforedate_start.' to '.$beforedate_end,
                    'during' => $validatedData['duringdate'] !== null ? $duringdate_start.' to '.$duringdate_end : null,
                    'after' => $validatedData['afterdate'] !== null ? $enddate_start.' to '.$enddate_end : null
                ];

                $form->update($formData);

            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Failed to Update Form');
            }
        });

        return redirect()->route('form.index')->with('success', 'Successfully Update Form!!!');

    }

    public function destroy(Request $request){
        $validatedData = $request->validate([
            'item_id'=>'required|integer'
        ]);
        

        $formDelete = Form::filterForm()->find($validatedData['item_id']);

        if($formDelete){
            $formDelete->delete();

            return redirect()->route('form.index')->with('success','Deleted Form Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Delete Form');
        }
    }

    public function formQuestion(String $id){
        $form = Form::with('question')->filterForm()->find($id);
        
        if($form){
            return view('typeform.form.questions',compact('form'));
        }else{
            return redirect()->back()->with('error','Form Not Found');
        }
        
    }

    public function generateCSV(Request $request){
        $formsQuery = Form::with('organization','branches')->filterForm();
        
        if($request->filled('search_title')){
            $formsQuery->where('form_title','like','%'.$request->search_title.'%');
        }

        if($request->filled('country')){
            $formsQuery->where('country',$request->country);
        }
        if($request->filled('organization')){
            $formsQuery->where('organization_id',$request->organization);
        }
        if($request->filled('branch')){
            $formsQuery->where('branch_id',$request->branch);
        }
        if($request->filled('survey')){
            $formsQuery->where('form_id',$request->survey);
        }
        
        $forms = $formsQuery->latest()->get();
        
        $filename = "form.csv";
        $fp = fopen($filename,'w+');
        fputcsv($fp,array('ID','Form Id','Form Title','Country','Organization','Branch','Branch Level','Before','During','After','Created At'));

        foreach($forms as $row){
            fputcsv($fp,array(
                $row->id,
                $row->form_id,
                $row->form_title,
                $row->country,
                $row->organization->name,
                $row->branches ? $row->branches->name : 'Main Branch',
                $row->branches ? 'Branch':'Main Branch',
                $row->before,
                $row->during,
                $row->after,
                $row->created_at,
            ));
        }

        fclose($fp);
        $headers = array('Content-Type'=>'text/csv');
        return response()->download($filename,'form.csv',$headers);
    }

    public function getFormDetails($formId){
        $token = config('services.api.key');

        $response = Http::withToken($token)->get("https://api.typeform.com/forms/{$formId}");

        if ($response->successful()) {
            return $response->json();
        }

        return response()->json([
            'error' => 'Unable to Fetch Form',
            'details' => $response->json()
        ], $response->status());
    }

    public function insertingNewField(){
        return view('typeform.form.insertField');
    }

    public function insertingNewFieldSubmit(Request $request){
        $request->merge([
            'fields'=>$request->input('fields',[])
        ]);
        $request->validate([
            'fields'=>'array',
            'fields.country'=>'required|in:on',
            'fields.state'=>'nullable',
        ]);

        $formData = json_decode($request->typeform_data, true);
        $countryCheckbox = array_key_exists('country',$request->fields);
        $stateCheckbox = array_key_exists('state',$request->fields);

        $hasCountryField = collect($formData['fields'])->contains(function ($field) {
            return isset($field['ref']) && $field['ref'] === 'country_field_ref';
        });
        
        if (!$hasCountryField) {
           return $this->insertCountriesAndStateField($formData,$countryCheckbox,$stateCheckbox);
        } else {
            $formData = $this->removeCountryAndStateFields($formData);
            return $this->insertCountriesAndStateField($formData,$countryCheckbox,$stateCheckbox);
        }
    }

    private function removeCountryAndStateFields($formData){
        $fields = $formData['fields'] ?? [];

        $fieldIdsRemove = collect($fields)
            ->filter(function($field){
                $title = strtolower($field['title'] ?? '');
                return str_contains($title,'country') || str_contains($title,'state');
            })
            ->pluck('ref')
            ->toArray();

        //Remove Fields
        $formData['fields'] = array_values(array_filter($fields,function($field) use($fieldIdsRemove){
            return !in_array($field['ref'],$fieldIdsRemove);
        }));
        
        //Remove Logic
        unset($formData['logic']);

        return $formData;
    }

    public function insertCountriesAndStateField($formData,$countryCheckbox,$stateCheckbox){
         try {
                $formId = $formData['id'];

                if($formData['fields'][0]['type'] == "short_text"){
                    $gendersIndex = 2;
                    $afterGenderIndex = 3;
                }else{
                    $gendersIndex = 1;
                    $afterGenderIndex = 2;
                }

                $formGender = $formData['fields'][$gendersIndex]['ref'];
                $formAfterGender = $formData['fields'][$afterGenderIndex]['ref'];

                // $selectedCountries = $request->country;

                // $countriesState = json_decode(file_get_contents(public_path('build/assets/countries_state.json')), true);
                $countriesState = NCountry::with(['states'=>function($query){
                    $query->select('name','countryCode');
                }])->select('name','code')->get();
    
                $accessToken = config('services.api.key');

                $fields = [];
                $logic = [];
                $logicCountryState = [];

                if($countryCheckbox){
                    $countryChoices = $countriesState->map(fn($country)=>['label'=>$country->name])->toArray();
         
                    $fields[] = [
                        "ref" => "country_field_ref",
                        "title" => "Which country do you live in?*",
                        "type" => "dropdown",
                        "properties" => [
                            "choices" => $countryChoices
                        ],
                    ];
                }

                if($countryCheckbox && $stateCheckbox){
                    foreach ($countriesState as $country) {
                         $stateChoices = $country->states->map(fn($state)=>['label'=>$state->name])->toArray();
                         
                         if(empty($stateChoices)){
                             continue;
                         }
                        
                        $stateFieldRef = preg_replace('/[^a-z0-9_\-]/', '_', strtolower($country->name) . '_state_field_ref');

                        $stateField = [
                            "ref" => $stateFieldRef,
                            "title" => "Please enter your state/province/county. ($country->name)",
                            "type" => "dropdown",
                            "properties" => [
                                "choices" => $stateChoices
                            ],
                        ];
    
                        $fields[] = $stateField;
    
                        //Logic for State according to Country
                        $logicCountryState[] = [
                            "action" => "jump",
                            "condition" => [
                                "op" => "equal",
                                "vars" => [
                                    ["type" => "field", "value" => "country_field_ref"],
                                    ["type" => "constant", "value" => $country->name],
                                ]
                            ],
                            "details" => [
                                "to" => [
                                    "type" => "field",
                                    "value" => $stateFieldRef,
                                ]
                            ]
                        ];
    
                        //Logic Redirecting to Field After Select State
                        $logic[] = [
                            "type" => "field",
                            "ref" => $stateFieldRef,
                            "actions" => [
                                [
                                    "action" => "jump",
                                    "condition" => [
                                        "op" => "always",
                                        "vars" => [],
                                    ],
                                    "details" => [
                                        "to" => [
                                            "type" => "field",
                                            "value" => "$formAfterGender"
                                        ]
                                    ]
                                ],
                            ]
                        ];
                    }
                }

                if($countryCheckbox && !$stateCheckbox){
                    //Logic Redirecting to Field After Select State
                    $logicCountryState[] = 
                    [
                        "action" => "jump",
                        "condition" => [
                            "op" => "always",
                            "vars" => [],
                        ],
                        "details" => [
                            "to" => [
                                "type" => "field",
                                "value" => "$formAfterGender"
                            ]
                        ]
                    ];
                }
                
                $logic[] = [
                    "type" => "field",
                    "ref" => "country_field_ref",
                    "actions" => $logicCountryState
                ];
         
                $logic[] = [
                    "type" => "field",
                    "ref" => $formGender,
                    "actions" => [
                        [
                            "action" => "jump",
                            "condition" => [
                                "op" => "always",
                                "vars" => [],
                            ],
                            "details" => [
                                "to" => [
                                    "type" => "field",
                                    "value" => "country_field_ref",
                                ]
                            ]
                        ],
                    ]
                ];

                $formFields = $formData['fields'];

                $formData['fields']=[];
                
                foreach($formFields as $key=>$formField){
                    if($key == 0 || $key ==1){
                        $formData['fields'][] = $formField;
                    }
                }
                
                foreach ($fields as $field) {
                    $formData['fields'][] = $field;
                }

                foreach($formFields as $key=>$formField){
                    if($key >= 2){
                        $formData['fields'][] = $formField;
                    }
                }

                foreach ($logic as $condition) {
                    $formData['logic'][] = $condition;
                }

                $updateForm = Http::withToken($accessToken)->put("https://api.typeform.com/forms/{$formId}", $formData);
                
                if($updateForm->successful()){
                    return "Succesfully Added Country and State Fields";
                    // return redirect()->back()->with('success','Succesfully Added Country and State Fields');
                }else{
                    return "Fail to Add Field";
                    // return redirect()->back()->with('error','Fail to Add Field');
                }
            }catch(\Exception $e){
                return $e->getMessage();
            }
    }
    
}
