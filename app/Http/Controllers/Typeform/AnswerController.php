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
        $answersQuery = Answer::with('form','form.organization')->select('id','event_id','form_id','name','age','gender','created_at');
        
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
        }

        if($request->filled('survey_form')){
            $answersQuery->whereHas('form',function($query) use($request){
                $query->where('form_title',$request->survey_form);
            });
        }
        
        $answers = $answersQuery->filterSurvey()->paginate(10);
        
        
        $answers = PaginationHelper::addSerialNo($answers);

        $countriesPath = public_path('build/js/countries/countries.json');
        $countries = json_decode(File::get($countriesPath),true);
        $organizations = Organization::all();
        $surveyForms = Form::all();

        return view('typeform.survey.index',compact('answers','countries','organizations','surveyForms'));
    }

    public function getAnswer(Request $request){
        $allData = $request->all();
        
        $formId = $allData['form_response']['form_id'];
        $eventId = $allData['event_id'];
        $answers = $allData['form_response']['answers'];
        
        $formData = [
            'event_id'=>$eventId,
            'form_id'=>$formId
            ];
        
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
            'extra_ans1',
            'extra_ans2',
            'extra_ans3',
            ];
        $answersDBData = [];
        
        foreach($answers as $key => $answer){
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

    public function generateCSV(){
        $survey = Answer::with('form','form.organization')->filterSurvey()->get();

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
                $row->form->form_title,
                $row->form->country,
                $row->form->organization->name,
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
}
