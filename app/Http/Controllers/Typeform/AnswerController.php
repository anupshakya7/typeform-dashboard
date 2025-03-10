<?php

namespace App\Http\Controllers\Typeform;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Helpers\PaginationHelper;
use Carbon\Carbon;

class AnswerController extends Controller
{
    public function index(){
        $answers = Answer::with('form')->select('id','event_id','form_id','name','age','gender','created_at')->paginate(10);
        $answers = PaginationHelper::addSerialNo($answers);

        return view('typeform.survey.index',compact('answers'));
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
       $answer = Answer::find($answer);

       return view('typeform.survey.view',compact('answer'));
    }

    public function QA(Answer $answer){
        $answer->load('form','form.question');

        return view('typeform.survey.QA',compact('answer'));
    }

    public function generateCSV(){
        $survey = Answer::with('form')->get();

        $filename = 'survey.csv';
        $fp = fopen($filename,'w+');
        fputcsv($fp,array(
            'ID',
            'Form',
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
