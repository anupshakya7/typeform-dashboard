<?php

namespace App\Http\Controllers\Typeform;

use App\Helpers\DownloadCSV;
use App\Helpers\PaginationHelper;
use App\Http\Controllers\Controller;
use App\Models\Branch;
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

        $countriesPath = public_path('build/js/countries/countries.json');
        $countries = json_decode(File::get($countriesPath),true);
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
        ]);
        
        DB::transaction(function() use($validatedData){
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
                // isset()
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


                Form::create($formData);
    
                //Question Data
                $labelDBData = [
                    'name',
                    'age',
                    'gender',
                    'village-town-city',
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
                $questionFormattingData = [];
    
                foreach ($validatedData['questions'] as $key => $question) {
                    $questionFormattingData[$labelDBData[$key]] = $question;
                }
    
                $formIdData = [
                    'form_id' => $validatedData['formId']
                ];
    
                $questionsData = array_merge($formIdData, $questionFormattingData);

                Question::create($questionsData);
                Log::error('Created Successfully!!!');
                $forms = Form::with('organization','branches')->filterForm()->latest()->paginate(10);

                return redirect()->route('form.index',$forms)->with('success', 'Successfully Created Form and its Questions!!!');
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                DB::rollBack();

                return redirect()->back()->with('error', 'Failed to Create Form and its Questions'.$e->getMessage());
            }
            // return redirect()->route('form.index')->with('success', 'Successfully Created Form and its Questions!!!');
        });

            // try {
            //     DB::beginTransaction();

            //     //Formatting Date
            //     $beforedate_start = $this->reformatDate(explode(' to ',$validatedData['beforedate'])[0]);
            //     $beforedate_end = $this->reformatDate(explode(' to ',$validatedData['beforedate'])[1]);
            //     if($validatedData['duringdate']){
            //         $duringdate_start = $this->reformatDate(explode(' to ',$validatedData['duringdate'])[0]);
            //         $duringdate_end = $this->reformatDate(explode(' to ',$validatedData['duringdate'])[1]);
            //     }
            //     if($validatedData['afterdate']){
            //         $enddate_start = $this->reformatDate(explode(' to ',$validatedData['afterdate'])[0]);
            //         $enddate_end = $this->reformatDate(explode(' to ',$validatedData['afterdate'])[1]); 
            //     }

            //     if(isset($validatedData['branch'])){
            //         $branch_id =$validatedData['branch'];
            //         $branchLevel = 1;
            //     }else{
            //         $branch_id=null;
            //         $branchLevel = 0;
            //     }
            //     // isset()
            //     //Form Data
            //     $formData = [
            //         'form_id' => $validatedData['formId'],
            //         'form_title' => $validatedData['form_name'],
            //         'country' => $validatedData['country'],
            //         'organization_id' => $validatedData['organization'],
            //         'branch_id' => $branch_id,
            //         'branch_level'=>$branchLevel,
            //         'before' => $beforedate_start.' to '.$beforedate_end,
            //         'during' => $validatedData['duringdate'] !== null ? $duringdate_start.' to '.$duringdate_end : null,
            //         'after' => $validatedData['afterdate'] !== null ? $enddate_start.' to '.$enddate_end : null
            //     ];


            //     Form::create($formData);
    
            //     //Question Data
            //     $labelDBData = [
            //         'name',
            //         'age',
            //         'gender',
            //         'village-town-city',
            //         'well_functioning_government',
            //         'low_level_corruption',
            //         'equitable_distribution',
            //         'good_relations',
            //         'free_flow',
            //         'high_levels',
            //         'sound_business',
            //         'acceptance_rights',
            //         'positive_peace',
            //         'negative_peace',
            //         'extra_ques1',
            //         'extra_ques2',
            //         'extra_ques3',
            //     ];
            //     $questionFormattingData = [];
    
            //     foreach ($validatedData['questions'] as $key => $question) {
            //         $questionFormattingData[$labelDBData[$key]] = $question;
            //     }
    
            //     $formIdData = [
            //         'form_id' => $validatedData['formId']
            //     ];
    
            //     $questionsData = array_merge($formIdData, $questionFormattingData);

            //     Question::create($questionsData);
            //     $forms = Form::with('organization','branches')->filterForm()->latest()->paginate(10);

            //     return redirect()->route('form.index',$forms)->with('success', 'Successfully Created Form and its Questions!!!');
            //     Log::error('Created Successfully!!!');
            //     DB::commit();
            // } catch (\Exception $e) {
            //     DB::rollBack();
            //     Log::error($e->getMessage());
            //     return redirect()->back()->with('error', 'Failed to Create Form and its Questions'.$e->getMessage());
            // }

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
            'organization_id' => 'required|integer',
            'branch_id'=>'nullable|integer'
        ]);

        $formQuery = Form::where('organization_id',$validatedData['organization_id']);
        
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
        
        $forms = $formsQuery->get();
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
    
}
