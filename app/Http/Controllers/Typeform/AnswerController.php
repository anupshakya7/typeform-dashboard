<?php

namespace App\Http\Controllers\Typeform;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\ExtraAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Helpers\PaginationHelper;
use App\Models\AnswerTesting;
use App\Models\Form;
use App\Models\Organization;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function index(Request $request){
        $answersQuery = Answer::with('form','form.organization','form.branches')->select('id','event_id','form_id','name','age','gender','created_at');
        
        if($request->filled('search_participant')){
            $answersQuery->where('name','like','%'.$request->search_participant.'%');
        }

        if($request->filled('country')){
            $answersQuery->whereHas('form',function($query) use($request){
                $query->where('country',$request->country);
            });
        }

        if($request->filled('organization')){
            $answersQuery->whereHas('form',function($query) use($request){
                $query->where('organization_id',$request->organization);
            });

            if($request->filled('branch')){
                $answersQuery->whereHas('form',function($query) use($request){
                    $query->where('branch_id',$request->branch);
                });
            }
        }

        if($request->filled('survey')){
            $answersQuery->whereHas('form',function($query) use($request){
                $query->where('form_id',$request->survey);
            });
        }
        
        $answers = $answersQuery->filterSurvey()->latest()->paginate(10)->appends($request->all());
        

        
        $answers = PaginationHelper::addSerialNo($answers);

        // $countriesPath = public_path('build/js/countries/countries.json');
        // $countries = json_decode(File::get($countriesPath),true);
        $countries = Form::select('country')->filterForm()->distinct()->get();
        $organizations = Organization::filterOrganization()->get();
        $surveyForms = Form::filterForm()->get();

        return view('typeform.survey.index',compact('answers','countries','organizations','surveyForms'));
    }

    public function getAnswer(Request $request){
        $allData = $request->all();

        $formId = $allData['form_response']['form_id'];
        // $eventId = $allData['event_id'];
        $eventId = $allData['form_response']['token'];
        $questions = $allData['form_response']['definition']['fields'];
        $age=[];
        $gender = [];
        $ageType = ["18 to 24","25 to 44","45 to 64","65 or over","Prefer not to say"];
        $genderType = ["Male","Female","Other","Prefer not to say"];
        
        if($questions[0]['type'] == 'short_text'){
            $agesIndex = 1;
            $gendersIndex = 2;
        }else{
            $agesIndex = 0;
            $gendersIndex = 1;
        }
        
        foreach($questions[$agesIndex]['choices'] as $key=>$ages){
            $age[$ages['id']] = $ageType[$key];
        }
        
        foreach($questions[$gendersIndex]['choices'] as $key=>$genders){
            $gender[$genders['id']] = $genderType[$key];
        }
        
        
        $answers = $allData['form_response']['answers'];

        $formData = [
            'event_id'=>$eventId,
            'form_id'=>$formId,
            'age'=>$age[$answers[$agesIndex]['choice']['id']],
            'gender'=>$gender[$answers[$gendersIndex]['choice']['id']],
            ];
        
        $optionalName = [
              'name'
              ];
        
        // $labelDBData = [
        //     'age',
        //     'gender',
        //     'country',
        //     'state',
        //     'well_functioning_government',
        //     'low_level_corruption',
        //     'equitable_distribution',
        //     'good_relations',
        //     'free_flow',
        //     'high_levels',
        //     'sound_business',
        //     'acceptance_rights',
        //     'positive_peace',
        //     'negative_peace'
        //     ];
            
        $labelDBData = [
                'age',
                'gender',
                'village-town-city',
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
                'negative_peace'
            ];
            
        if($questions[0]['type'] == 'short_text'){
            $labelDBData = array_merge($optionalName,$labelDBData); 
        }
        
        $matchesCountry = array_filter($questions,function($item){
            return isset($item['ref']) && $item['ref'] === 'country_field_ref'; 
        });
        
        //Separate Array for Main Answers and Extra Answers
        if(empty($matchesCountry)){
            if($questions[0]['type'] == 'short_text'){
                $mainAnswers = array_slice($answers,0,14);
                $extraAnswers = array_slice($answers,14);
            }else{
                $mainAnswers = array_slice($answers,0,13);
                $extraAnswers = array_slice($answers,13);
            }
        }else{
            if($questions[0]['type'] == 'short_text'){
                $mainAnswers = array_slice($answers,0,15);
                $extraAnswers = array_slice($answers,15);
            }else{
                $mainAnswers = array_slice($answers,0,14);
                $extraAnswers = array_slice($answers,14); 
            }
        }
        
        if(!empty($matchesCountry)){
            $labelDBData = array_filter($labelDBData,function($item){
                return $item !== 'village-town-city';
            });
            
            $labelDBData = array_values($labelDBData);
        }
        
        if(empty($matchesCountry)){
            $labelDBData = array_filter($labelDBData,function($item){
                return $item !== 'country'; 
            });
        }
        
        $matches = array_filter($questions,function($item){
            return is_string($item['ref']) && str_ends_with($item['ref'],'_state_field_ref');
        });
        
        if(empty($matches)){
            $labelDBData = array_filter($labelDBData,function($item){
                return $item !=='state'; 
            });
            
            $labelDBData = array_values($labelDBData);
        }
        
        $answersDBData = [];

        foreach($mainAnswers as $key => $answer){
            if($key == $agesIndex || $key == $gendersIndex){
                continue;
            }
            
            if($answer['type'] == 'choice'){
                $ans = $answer[$answer['type']]['label'];
            }else{
                $ans = $answer[$answer['type']];
            }
            
            $answersDBData[$labelDBData[$key]] = $ans;
        }
        
        $DBData = array_merge($formData,$answersDBData);

        $extraAnswersFormat = [];
        foreach($extraAnswers as $extraAnswer){
            $value ='';
            if($extraAnswer['type'] ==  "text"){
                $value = $extraAnswer['text'];
            }elseif($extraAnswer['type'] == "choice"){
                $value = $extraAnswer['choice']['label'];
            }elseif($extraAnswer['type'] == "number"){
                $value = $extraAnswer['number'];
            }elseif($extraAnswer['type'] == "choices"){
                $labels = $extraAnswer['choices']['labels'] ?? [];
                $value = is_array($labels) ? implode(', ', $labels) : (string) $labels;
            }
    
            $extraAnswersFormat[] = [
                'event_id'=>$eventId,
                'form_id'=>$formId,
                'question_id'=>$extraAnswer['field']['id'],
                'type'=>$extraAnswer['type'],
                'value'=>$value,
                'created_at'=>now(),
                'updated_at'=>now(),
            ];
        }
        

        try{
            DB::beginTransaction();
            
            $answerCreated = Answer::create($DBData);
            $extraAnswerCreated = ExtraAnswer::insert($extraAnswersFormat);
            
            $checkWebHooks = Form::where('form_id',$formId)->first();

            if($checkWebHooks->webhook == 0){
                $checkWebHooks->update([
                    'webhook'=>1
                ]);
            }
            
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            Log::error('Error creating answer: '.$e->getMessage());
            return $e->getMessage();
        }
       
        
        return $answerCreated;
    }

    public function show($answer){
       $answer = Answer::filterSurvey()->find($answer);
       
        if($answer){
            return view('typeform.survey.view',compact('answer'));
        }else{
            return redirect()->back()->with('error','Survey Data Not Found');
        }
    }

    public function QA(String $id){
        $answer = Answer::with('form','form.question','form.extraQuestions','rcountry','rstate','extraAnswer')->filterSurvey()->find($id);
        
        if($answer){
            return view('typeform.survey.QA',compact('answer'));
        }else{
            return redirect()->back()->with('error','Survey Data Not Found');
        }
    }

    public function generateCSV(Request $request){
        $surveyQuery = Answer::with('form','form.organization')->filterSurvey();

        if($request->filled('search_participant')){
            $surveyQuery->where('name','like','%'.$request->search_participant.'%');
        }

        if($request->filled('country')){
            $surveyQuery->whereHas('form',function($query) use($request){
                $query->where('country',$request->country);
            });
        }

        if($request->filled('organization')){
            $surveyQuery->whereHas('form',function($query) use($request){
                $query->where('organization_id',$request->organization);
            });

            if($request->filled('branch')){
                $surveyQuery->whereHas('form',function($query) use($request){
                    $query->where('branch_id',$request->branch);
                });
            }
        }

        if($request->filled('survey')){
            $surveyQuery->where('form_id',$request->survey);
        }

        $survey = $surveyQuery->latest()->get();
        
        $formName = Str::slug(Form::where('form_id',$request->survey)->pluck('form_title')->first()).'-survey-data.csv';
        
        $filename = $formName;
        $fp = fopen($filename,'w+');
        fputcsv($fp,array(
            'ID',
            'Form',
            'Country (Form)',
            'Organization (Form)',
            'Participant',
            'Age',
            'Gender',
            'Address',
            'Well-Functioning Government',
            'Low Levels of Corruption',
            'Equitable Distribution of Resources',
            'Good Relations with Neighbours',
            'Free Flow of Information',
            'High Levels of Human Capital',
            'Sound Business Environment',
            'Acceptance of the Rights of Others',
            'Positive Peace',
            'Negative Peace',
            'Extra Question 1',
            'Extra Question 2',
            'Extra Question 3',
            'Survey Date'
        ));

        foreach($survey as $row){
            fputcsv($fp,array(
                $row->id,
                $row->form ? optional($row->form)->form_title:null,
                $row->form ? optional($row->form)->country:null,
                $row->form ? optional($row->form)->organization->name :null,
                $row->name,
                $row->age,
                $row->gender,
                $row->{'village-town-city'},
                $row->well_functioning_government,
                $row->low_level_corruption,
                $row->equitable_distribution,
                $row->good_relations,
                $row->free_flow,
                $row->high_levels,
                $row->sound_business,
                $row->acceptance_rights,
                $row->positive_peace,
                $row->negative_peace,
                $row->extra_ans1,
                $row->extra_ans2,
                $row->extra_ans3,
                Carbon::parse($row->created_at)->format('d M, Y'),
            ));
        }

        fclose($fp);
        $headers = array('Content-Type'=>'text/csv');

        return response()->download($filename,$formName,$headers);
    }

    public function generateIndividualCSV($id){
        $surveySingle = Answer::with('form','form.extraQuestions','form.organization','extraAnswer')->filterSurvey()->where('id',$id)->first();

        $filename = 'survey.csv';
        $fp = fopen($filename,'w+');

        $headers = [
            'ID',
            'Survey Data ID',
            'Survey ID',
            'Survey',
            'Participant',
            'Age',
            'Gender',
            'Address',
            'Well-Functioning Government',
            'Low Levels of Corruption',
            'Equitable Distribution of Resources',
            'Good Relations with Neighbours',
            'Free Flow of Information',
            'High Levels of Human Capital',
            'Sound Business Environment',
            'Acceptance of the Rights of Others',
            'Positive Peace',
            'Negative Peace'
        ];

        if($surveySingle->form->extraQuestions !== null){
            $extraQuestions = $surveySingle->form->extraQuestions->pluck('title');
            $headers = array_merge($headers,$extraQuestions->toArray());
        }

        $headers = array_merge($headers,['Survey Date']);

        fputcsv($fp,$headers);
            $values = [
                $surveySingle->id,
                $surveySingle->event_id,
                $surveySingle->form_id,
                $surveySingle->form ? optional($surveySingle->form)->form_title:null,
                $surveySingle->name,
                $surveySingle->age,
                $surveySingle->gender,
                $surveySingle->{'village-town-city'},
                $surveySingle->well_functioning_government,
                $surveySingle->low_level_corruption,
                $surveySingle->equitable_distribution,
                $surveySingle->good_relations,
                $surveySingle->free_flow,
                $surveySingle->high_levels,
                $surveySingle->sound_business,
                $surveySingle->acceptance_rights,
                $surveySingle->positive_peace,
                $surveySingle->negative_peace
            ];

            if($surveySingle->form->extraQuestions !== null){
                $extraAnswers = $surveySingle->extraAnswer->pluck('value')->toArray();
                $values = array_merge($values,$extraAnswers);
            }

            $values = array_merge($values,[
                Carbon::parse($surveySingle->created_at)->format('d M, Y')
            ]);

            fputcsv($fp,$values);

        fclose($fp);
        $headers = array('Content-Type'=>'text/csv');

        return response()->download($filename,$surveySingle->name.' survey.csv',$headers);
    }

    public function fetchAllSurvey(Request $request)
    {
        // Start building the query
        $answersQuery = Answer::with('form', 'form.organization')  // Load the related form and organization
            ->select('id', 'event_id', 'form_id', 'name', 'age', 'gender', 'created_at');
        
        

        // Filter by country if provided
        if($request->filled('country')){
            $answersQuery->whereHas('form',function($query) use($request){
                $query->where('country',$request->country);
            });
        }

        if($request->filled('organization')){
            $answersQuery->whereHas('form',function($query) use($request){
                $query->where('organization_id',$request->organization_id);
            });
        }


        // Get all answers (no pagination)
        $answers = $answersQuery->filterSurvey()->latest()->get();  // Use get() to fetch all data
        
        // Prepare data for frontend
        $formattedAnswers = $answers->map(function($answer) {
            return [
                'survey_data_id' => $answer->event_id,
                'survey_id' => $answer->form_id,
                'survey_name' => $answer->form ? optional($answer->form)->form_title : 'Form Not Sync Yet',
                'survey_country' => $answer->form ? optional($answer->form)->country : 'No Country',
                'survey_organization' => $answer->form ? optional($answer->form)->organization->name : 'No Organization',
                'participant_name' => $answer->name,
                'age' => $answer->age,
                'gender' => $answer->gender,
                'survey_date' => Carbon::parse($answer->created_at)->format('d M, Y'),
            ];
        });

        // Return the data as a JSON response
        return response()->json([
            'surveys' => $formattedAnswers,
        ]);
    }

    public function importAnswerSurvey($surveyId){
        try{
            $token = config('services.api.key');
        
            $response = Http::withToken($token)->get("https://api.typeform.com/forms/$surveyId/responses",[
                'page_size' => 1000
            ]);
    
            if($response->successful()){
                $result = $response->json();
                $eachResponse = [];
                foreach($result['items'] as $item){
                    
                    $surveyLabel = [
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
                    ];

                    $firstItemType = $item['answers'][0]['field']['type'];
                    
                    if($firstItemType == 'multiple_choice'){
                        $surveyLabel = array_filter($surveyLabel,function($item){
                            return $item !== 'name';
                        });

                        $surveyLabel = array_values($surveyLabel);
                    }
                        $matchCountry = array_filter($item['answers'],function($item){
                            return is_string($item['field']['ref']) && Str::contains($item['field']['ref'],'country_field_ref');
                        });
                        
                        if(empty($matchCountry)){
                            $surveyLabel = array_filter($surveyLabel,function($item){
                                return $item !== 'country'; 
                            });
                        }
                        
                        $matches = array_filter($item['answers'],function($item){
                            return is_string($item['field']['ref']) && str_ends_with($item['field']['ref'],'_state_field_ref');
                        });
                        
                        if(empty($matches)){
                            $surveyLabel = array_filter($surveyLabel,function($item){
                                return $item !== 'state'; 
                            });
                            
                            $surveyLabel = array_values($surveyLabel);
                        }

                        $eachLabel = [];
                        foreach($item['answers'] as $key => $answer){
                            if($answer['type'] == "choice"){
                                $value = $answer['choice']['label'];
                            }

                            if($answer['type'] == "text"){
                                $value = $answer['text'];
                            }

                            if($answer['type'] == "number"){
                                $value = $answer['number'];
                            }

                            $eachLabel[$surveyLabel[$key]] = $value;
                        }

                        $surveyLabelId = [
                            'event_id'=>$item['token'],
                            'form_id'=>$surveyId,
                        ];
                        // $surveyLabelCreateUpdate =[
                        //     'created_at'=>now(),
                        //     'updated_at'=>now()
                        // ];
                        
                        $finalEachResponse = array_merge($surveyLabelId,$eachLabel);
                        
                        $eachResponse[] = $finalEachResponse;
                    
                }
                // dd($eachResponse);

                foreach(array_chunk($eachResponse,50) as $chunk){
                    foreach($chunk as $data){
                        if(isset($data['event_id'])){
                         $answer =   Answer::create($data);
                        }
                    }
                    
                }

                Log::info("Inserted Succesfully");

               return true;
                
            }else{
                Log::error('API Response Fail');
                return false;
            }
        }catch(Exception $e){
            
            Log::error($e->getMessage());
            return false;
        }
        
    }
    // public function importAnswerSurvey($surveyId){
    //     $allResponses = [];
    //     $page =1;
    //     $pageSize = 100;
    //     $hasMore = true;

    //     $token = config('services.api.key');
        
    //     $response = Http::withToken($token)->get("https://api.typeform.com/forms/wLqSVeHU/responses",[
    //         'page_size' => $pageSize,
    //         'page' => $page
    //     ]);
    // }
}
