<?php

namespace App\Http\Controllers\Typeform;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Form;

class FormController extends Controller
{
    // public function settings(){
    //     return view('')
    // }
    public function index(){
        return view('typeform.form.index');
    }

    public function create(){
        return view('typeform.form.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'formId'=>'required|unique:forms,form_id',
            'form_name'=>'required|string',
            'country'=>'required|string',
            'organization'=>'required|string',
            'beforedate'=>'required|string',
            'duringdate'=>'required|string',
            'afterdate'=>'required|string',
            'questions'=>'required|array',
        ]);

        //Form Data
        $formData = [
            'form_id'=>$validatedData['formId'],
            'form_title'=>$validatedData['form_name'],
            'country'=>$validatedData['country'],
            'organization'=>$validatedData['organization'],
            'before'=>$validatedData['beforedate'],
            'during'=>$validatedData['duringdate'],
            'after'=>$validatedData['afterdate'],
        ];

        // $formCreated = Form::create($formData);


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
            $questionData=[];

            foreach($validatedData['questions'] as $key=>$question){
                $questionData[$labelDBData[$key]] = $question;
            }

            dd($questionData);

    }

    public function getForm(Request $request){
        $formId = $request->input('form_id');

        $apiKey = config('services.api.key');

        $response = Http::withHeaders([
            'Authorization'=>'Bearer '.$apiKey
        ])->get('https://api.typeform.com/forms/'.$formId);

        if($response->successful()){
            return response()->json([
                'status'=>true,
                'data'=>$response->json()
            ],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Form Not Found'
            ],404);
        }
    }
}
