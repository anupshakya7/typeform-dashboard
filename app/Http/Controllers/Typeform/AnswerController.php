<?php

namespace App\Http\Controllers\Typeform;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Helpers\PaginationHelper;
use App\Models\Form;
use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

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
        $eventId = $allData['event_id'];
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
        
        $labelDBData = [
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
            'extra_ans1',
            'extra_ans2',
            'extra_ans3',
            ];
            
        if($questions[0]['type'] == 'short_text'){
            $labelDBData = array_merge($optionalName,$labelDBData); 
        }
  
        $answersDBData = [];
        
        foreach($answers as $key => $answer){
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

        try{
            $answerCreated = Answer::create($DBData);
            $checkWebHooks = Form::where('form_id',$formId)->first();

            if($checkWebHooks->webhook == 0){
                $checkWebHooks->update([
                    'webhook'=>1
                ]);
            }
        }catch(\Exception $e){
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
        $answer = Answer::with('form','form.question')->filterSurvey()->find($id);
        
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

        $filename = 'survey.csv';
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

        return response()->download($filename,'survey.csv',$headers);
    }

    public function generateIndividualCSV($id){
        $surveySingle = Answer::with('form','form.organization')->filterSurvey()->where('id',$id)->first();

        $filename = 'survey.csv';
        $fp = fopen($filename,'w+');
        fputcsv($fp,array(
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
            'Negative Peace',
            'Extra Question 1',
            'Extra Question 2',
            'Extra Question 3',
            'Survey Date'
        ));

            fputcsv($fp,array(
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
                $surveySingle->negative_peace,
                $surveySingle->extra_ans1,
                $surveySingle->extra_ans2,
                $surveySingle->extra_ans3,
                Carbon::parse($surveySingle->created_at)->format('d M, Y'),
            ));

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
}
