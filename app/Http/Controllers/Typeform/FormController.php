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

        $forms = $formsQuery->paginate(10);
        
        $forms = PaginationHelper::addSerialNo($forms);

        $countriesPath = public_path('build/js/countries/countries.json');
        $countries = json_decode(File::get($countriesPath),true);
        $organizations = Organization::all();

        return view('typeform.form.index',compact('forms','countries','organizations'));
    }

    public function show(Form $form)
    {
        $form->load('organization','branches');
        return view('typeform.form.view',compact('form'));
    }

    public function create()
    {
        $countriesPath = public_path('build/js/countries/countries.json');
        $countries = json_decode(File::get($countriesPath),true);

        $organizations = Organization::all();

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
            'branch' => 'nullable|integer',
            'beforedate' => 'required|string',
            'duringdate' => 'required|string',
            'afterdate' => 'required|string',
            'questions' => 'required|array',
        ]);

        DB::transaction(function() use($validatedData){
            try {
                //Formatting Date
                $beforedate_start = $this->reformatDate(explode(' to ',$validatedData['beforedate'])[0]);
                $beforedate_end = $this->reformatDate(explode(' to ',$validatedData['beforedate'])[1]);
                $duringdate_start = $this->reformatDate(explode(' to ',$validatedData['duringdate'])[0]);
                $duringdate_end = $this->reformatDate(explode(' to ',$validatedData['duringdate'])[1]);
                $enddate_start = $this->reformatDate(explode(' to ',$validatedData['afterdate'])[0]);
                $enddate_end = $this->reformatDate(explode(' to ',$validatedData['afterdate'])[1]);

                //Form Data
                $formData = [
                    'form_id' => $validatedData['formId'],
                    'form_title' => $validatedData['form_name'],
                    'country' => $validatedData['country'],
                    'organization_id' => $validatedData['organization'],
                    'branch_id' => $validatedData['branch'],
                    'before' => $beforedate_start.' to '.$beforedate_end,
                    'during' => $duringdate_start.' to '.$duringdate_end,
                    'after' => $enddate_start.' to '.$enddate_end,
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
                return redirect()->route('form.index')->with('success', 'Successfully Created Form and its Questions!!!');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Failed to Create Form and its Questions'.$e->getMessage());
            }
            return redirect()->route('form.index')->with('success', 'Successfully Created Form and its Questions!!!');
        });

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

    public function edit(Form $form)
    {
        $form->load('branches','branches.organization');
        // dd($form);
        $countriesPath = public_path('build/js/countries/countries.json');
        $countries = json_decode(File::get($countriesPath),true);

        $organizations = Organization::all();

        return view('typeform.form.edit',compact('form','countries','organizations'));
    }


    public function update(Request $request,Form $form)
    {
        $validatedData = $request->validate([
            'formId' => 'required|exists:forms,form_id',
            'form_name' => 'required|string',
            'country' => 'required|string',
            'organization' => 'required|integer',
            'branch' => 'nullable|integer',
            'beforedate' => 'required|string',
            'duringdate' => 'required|string',
            'afterdate' => 'required|string',
        ]);
        
        DB::transaction(function() use($validatedData,$form){
            try {
                //Formatting Date
                $beforedate_start = $this->reformatDate(explode(' to ',$validatedData['beforedate'])[0]);
                $beforedate_end = $this->reformatDate(explode(' to ',$validatedData['beforedate'])[1]);
                $duringdate_start = $this->reformatDate(explode(' to ',$validatedData['duringdate'])[0]);
                $duringdate_end = $this->reformatDate(explode(' to ',$validatedData['duringdate'])[1]);
                $enddate_start = $this->reformatDate(explode(' to ',$validatedData['afterdate'])[0]);
                $enddate_end = $this->reformatDate(explode(' to ',$validatedData['afterdate'])[1]);

                //Form Data
                $formData = [
                    'form_id' => $validatedData['formId'],
                    'form_title' => $validatedData['form_name'],
                    'country' => $validatedData['country'],
                    'organization_id' => $validatedData['organization'],
                    'branch_id' => $validatedData['branch'],
                    'before' => $beforedate_start.' to '.$beforedate_end,
                    'during' => $duringdate_start.' to '.$duringdate_end,
                    'after' => $enddate_start.' to '.$enddate_end,
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

        $formDelete = Form::find($validatedData['item_id']);

        if($formDelete){
            $formDelete->delete();

            return redirect()->route('form.index')->with('success','Deleted Form Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Delete Form');
        }
    }

    public function formQuestion(Form $form){
        $form->load('question');
        return view('typeform.form.questions',compact('form'));
    }

    public function generateCSV(){
        $forms = Form::all();
        $filename = "form.csv";

        return DownloadCSV::downloadCSV($forms,$filename);
    }
    
}
