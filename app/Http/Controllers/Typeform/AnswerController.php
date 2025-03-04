<?php

namespace App\Http\Controllers\Typeform;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AnswerController extends Controller
{
    public function index(){
        $answers = Answer::with('form')->select('id','event_id','form_id','name','age','gender','created_at')->paginate(10);

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
}
