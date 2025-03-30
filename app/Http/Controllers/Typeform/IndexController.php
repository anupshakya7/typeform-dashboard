<?php

namespace App\Http\Controllers\Typeform;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Form;
use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->all() == [] && auth()->user()->role->name !== 'survey' && !session()->has('survey_id')){
            //Dropdown
            $countries = Form::select('country')->filterForm()->distinct()->get();

            $organizations = Organization::filterOrganization()->get();
            $surveyForms = Form::filterForm()->get();

            $topBox = $this->topBoxData();

            return view('typeform.welcome.index',compact('countries','organizations','surveyForms','topBox'));
        }else{
            $filterData = $request->all() == [] ? Form::filterForm()->where('form_id',session('survey_id'))->first():null;
        
            //Dropdown
            // $countriesPath = public_path('build/js/countries/countries.json');
            // $countries = json_decode(File::get($countriesPath),true);

            $countries = Form::select('country')->filterForm()->distinct()->get();

            $organizations = Organization::filterOrganization()->get();
            $surveyForms = Form::filterForm()->get();
            
            //Survey id if no then latest form id
            if(auth()->user()->role->name == "survey"){
                $country = auth()->user()->survey->country;
                $survey_id = auth()->user()->survey->form_id;
            }else{
                $country = isset($request->survey) && $request->survey ? Form::where('form_id',$request->survey)->pluck('country')->first() : session('country');
                $survey_id = isset($request->survey) && $request->survey ? $request->survey : session('survey_id');
                session(['country'=>$country,'survey_id'=>$survey_id]);
            }

            $formDetails = Form::with('organization')->where('form_id',$survey_id)->first();
    
            $selectedCountrywithSurvey = isset($request->survey) && $request->survey ? Form::where('form_id',$request->survey)->pluck('country')->first():null;
    
            $topBox = $this->topBoxData($survey_id);
            $meanScore = $this->meanScoreGraph($request->all(),$survey_id);
            $participantDetails = $this->participantDetails($survey_id);
            $positivePeace = $this->positiveNegative($country,$survey_id,'positive_peace');
            $negativePeace = $this->positiveNegative($country,$survey_id,'negative_peace');
            $pillarMeanScore = $this->pillarsMeanScore($country,$survey_id);
            $overTimeScores = $this->overTimeScore($survey_id);
    
            $resultByPillar = [];
    
            return view('typeform.index',compact('formDetails','countries','organizations','surveyForms','topBox','meanScore','participantDetails','positivePeace','negativePeace','pillarMeanScore','overTimeScores','filterData','selectedCountrywithSurvey'));
        }
       
    }

    public function topBoxData($surveyValue=null){
        $surveys = Form::filterForm()->count();
        $countries = Form::select('country')->distinct()->filterForm()->get()->count();
        $organizations = Organization::filterOrganization()->count();
        $people = $surveyValue !== null ? Answer::filterSurvey()->where('form_id',$surveyValue)->count() : Answer::filterSurvey()->count();

        return [
            'survey'=>$surveys,
            'countries'=>$countries,
            'organizations'=>$organizations,
            'people'=>$people,
        ];
    }

    public function meanScoreGraph($request,$survey_id){
        $meanPillarScore = [];

        $pillars = [
            'well_functioning_government',
            'low_level_corruption',
            'equitable_distribution',
            'good_relations',
            'free_flow',
            'high_levels',
            'sound_business',
            'acceptance_rights'
        ];

        foreach($pillars as $pillar){
            $sum = Answer::where('form_id',$survey_id)->filterSurvey()->sum($pillar);
            $count = Answer::where('form_id',$survey_id)->filterSurvey()->whereNotNull($pillar)->count();
            $count = $count == 0 ? 1 : $count; 

            $mean = $sum / $count;

            $meanPillarScore[$pillar] = round($mean,1);
        }

        return $meanPillarScore;
    }

    public function participantDetails($survey_id){
        $genderWise = [];
        $ageWise = [];

        //Gender Wise
        $male = Answer::where('form_id',$survey_id)->filterSurvey()->where('gender','Male')->count();
        $female = Answer::where('form_id',$survey_id)->filterSurvey()->where('gender','Female')->count();
        $other = Answer::where('form_id',$survey_id)->filterSurvey()->where('gender','Other')->count();

        $genderWise = [
            'male'=>$male,
            'female'=>$female,
            'other'=>$other
        ];
        //Gender Wise

        //Age Wise
        $participants = Answer::where('form_id',$survey_id)->filterSurvey();
        $ages = ['18 to 24','25 to 44','45 to 64','65 or over'];

        foreach($ages as $age){
            $participantsClone = clone $participants;

            $ageWise[$age]= $participantsClone->where('age',$age)->count();
        }
        //Age Wise

        return [
            'genderWise'=>$genderWise,
            'ageWise'=>$ageWise
        ];
    }

    public function positiveNegative($country,$survey_id,$flag){
        $types = ['mean','countryMean','globalMean'];
        $positiveMeanCal = [];

        foreach($types as $type){
            $query = Form::with('answer')->filterForm();

            if($type === "mean"){
                $query->where('form_id',$survey_id);
            }elseif($type === "countryMean"){
                $query->where('country',$country);
            }

            $formsCountry = $query->get();
          
            $sum = $formsCountry->flatMap(function($form) use($flag){
                return $form->answer->pluck($flag);
            })->sum();
            
            $count= $formsCountry->sum(function($form){
                return $form->answer->count();
            });
    
            $positiveMeanCal[$type] = $count > 0 ? round($sum/$count,1) : 0;
        }
        
        return $positiveMeanCal;
    }

    public function pillarsMeanScore($country,$survey_id){
        $types = ['mean','countryMean','globalMean'];
        $pillars = [
            'well_functioning_government',
            'low_level_corruption',
            'equitable_distribution',
            'good_relations',
            'free_flow',
            'high_levels',
            'sound_business',
            'acceptance_rights'
        ];
        $pillarMeanCal = [];
        $singlePillarMeanCal = [];

        foreach($types as $type){
            $query = Form::with('answer')->filterForm();

            if($type === "mean"){
                $query->where('form_id',$survey_id);
            }elseif($type === "countryMean"){
                $query->where('country',$country);
            }

            $formsCountry = $query->get();
          
            foreach($pillars as $pillar){
                $sum = $formsCountry->flatMap(function($form) use($pillar){
                    return $form->answer->pluck($pillar);
                })->sum();
                
                $count= $formsCountry->sum(function($form){
                    return $form->answer->count();
                });
                $singlePillarMeanCal[$pillar] = $count > 0 ? round($sum/$count,1) : 0;
            }

            $pillarMeanCal[$type] = $singlePillarMeanCal;
        }

        return $pillarMeanCal;
    }

    public function overTimeScore($survey_id){
        $survey = Form::with('answer')->filterForm()->where('form_id',$survey_id)->first();
        $overTimeMeanTime = [];

        $pillars = [
            'well_functioning_government',
            'low_level_corruption',
            'equitable_distribution',
            'good_relations',
            'free_flow',
            'high_levels',
            'sound_business',
            'acceptance_rights'
        ];

        $timeTypes = ['before','during','after'];

        foreach($timeTypes as $timeType){
            if($survey->$timeType != null){
                $date = explode(' to ',$survey->$timeType);
                $startdate = Carbon::createFromFormat('d-m-Y',$date[0])->startOfDay();
                $enddate = Carbon::createFromFormat('d-m-Y',$date[1])->endOfDay();

                $answersInTimeRange = $survey->answer()->filterSurvey()->whereBetween('created_at',[$startdate,$enddate])->get();

                $overTimeMean = [];
                foreach($pillars as $pillar){
                    $answerSum = $answersInTimeRange->sum($pillar);
                    $answerCount = $answersInTimeRange->count();
                    
                    $answerCount = max($answerCount,1);

                    $overTimeMean[$pillar] = round($answerSum/$answerCount,1);
                }

                $overTimeMeanTime[$timeType] = $overTimeMean;
            }else{
                $overTimeMeanTime[$timeType] = 0;
            }
        }
        
        return $overTimeMeanTime;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function generateCSV(Request $request){

        if(auth()->user()->role->name == "survey"){
            $country = auth()->user()->survey->country;
            $survey_id = auth()->user()->survey->form_id;
        }else{
            $country = isset($request->survey) && $request->survey ? Form::where('form_id',$request->survey)->pluck('country')->first() : Form::latest()->first()->country;
            $survey_id = isset($request->survey) && $request->survey ? $request->survey : Form::latest()->first()->form_id;
        }


        $pillarMeanScores =  $this->pillarsMeanScore($country,$survey_id);
        
        $filename = "result_by_pillar.csv";
        $fp = fopen($filename,'w+');
        fputcsv($fp,array('','Mean','Country Mean','Global Mean'));
        $pillars = [
            'well_functioning_government'=>'Well-Functioning Government',
            'low_level_corruption'=>'Low Levels of Corruption',
            'equitable_distribution'=>'Equitable Distribution of Resources',
            'good_relations'=>'Good Relations with Neighbours',
            'free_flow'=>'Free Flow of Information',
            'high_levels'=>'High Levels of Human Capital',
            'sound_business'=>'Sound Business Environment',
            'acceptance_rights'=>'Acceptance of the Rights of Others'
        ];

        foreach($pillarMeanScores['mean'] as $key=>$pillarMeanScore){
            fputcsv($fp,array(
                $pillars[$key],
                $pillarMeanScore,
                $pillarMeanScores['countryMean'][$key],
                $pillarMeanScores['globalMean'][$key]
            ));
        }

        fclose($fp);
        $headers = array('Content-Type'=>'text/csv');
        return response()->download($filename,'result_by_pillar.csv',$headers);
    }
}
