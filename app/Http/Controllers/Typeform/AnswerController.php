<?php

namespace App\Http\Controllers\Typeform;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AnswerController extends Controller
{
    public function getAnswer(Request $request){
        $allData = $request->all();
        
        $formId = $allData['form_response']['form_id'];
        $answers = $allData['form_response']['answers'];
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
        
        try{
            $answerCreated = Answer::create($answersDBData);
        }catch(\Exception $e){
            Log::error('Error creating answer: '.$e->getMessage());
            return $e->getMessage();
        }
       
        
        return $answerCreated;
    }
}
