<?php

namespace App\Http\Controllers\Typeform;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Form;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function countryStateFilter($surveyId,$countryCode=null){
        $survey = Answer::query()->with(['rcountry','rstate']);

        if($surveyId && $countryCode){
             $survey->where('form_id',$surveyId)->where('country',$countryCode);
        }elseif($surveyId){
            $survey->where('form_id',$surveyId);
        }

        $answers = $survey->get();
        
        if($surveyId && $countryCode){
            $countryState = $answers->pluck('rstate')->filter()->unique('id')->map(function($state){
                return [
                    'code' => $state->id,
                    'state' => $state->name
                ];
            })->values();
        }elseif($surveyId){
            $countryState = $answers->pluck('rcountry')->filter()->unique('id')->map(function($country){
                return [
                    'code' => $country->code,
                    'country' => $country->name,
                ];
            })->values();
        }

        return response()->json([
            'status'=>true,
            'data'=>$countryState
        ]);
        
    }
}
