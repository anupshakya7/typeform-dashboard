<?php

namespace App\Http\Controllers\Typeform;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Form;
use App\Models\NCountry;
use App\Models\NSubCountry;
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
        if ($request->all() == [] && !session()->has('survey_id')) {
            //Dropdown
            $countries = Form::select('country')->filterForm()->distinct()->get();

            $organizations = Organization::filterOrganization()->get();
            $surveyForms = Form::with('countries','states')->filterForm()->get();

            $topBox = $this->topBoxData();

            return view('typeform.welcome.index', compact('countries', 'organizations', 'surveyForms', 'topBox'));
        } else {
            // if((isset($request->formType) && $request->formType == 0) || (session('form_type') == 0 && session('form_type') !== null)){
            //     return $this->singleSurveyData($request);
            // }elseif((isset($request->formType) && $request->formType == 1) || (session('form_type') == 1 && session('form_type') !== null)){
                return $this->globalSurveyData($request);
            // }
        }
    }

    public function globalSurveyData($request)
    {
        $filterData = $request->all() == [] ? Form::filterForm()->where('form_id', session('survey_id'))->first() : null;

        //Dropdown
        $countries = Form::select('country')->filterForm()->whereNotNull('country',)->distinct()->get();

        $organizations = Organization::filterOrganization()->get();
        $surveyForms = Form::with('countries','states')->filterForm()->get();
        
        // dd(session('survey_id'));
        //Survey id if no then latest form id
        if((isset($request->formType) && $request->formType == 1) || session('form_type') == 1){
            $country = isset($request->country) || $request->country == null ? $request->country : session('country');
            $selectedCountry = isset($request->country) || $request->country == null ? $request->country : session('country');
            session(['country'=>$country]);       
        }else{
            $country = isset($request->survey) && $request->survey ? Form::where('form_id', $request->survey)->pluck('country')->first() : Form::where('form_id', session('survey_id'))->pluck('country')->first();
            $selectedCountry = null;
            session(['country'=>null]); 
        } 

        if((isset($request->formType) && $request->formType == 1) || session('form_type') == 1){
            $state = isset($request->state) || $request->state == null ?  $request->state :session('state'); 
            session(['state'=>$state]);
        }else{
            $state =isset($request->survey) && $request->survey ? Form::where('form_id', $request->survey)->pluck('state')->first() : Form::where('form_id', session('survey_id'))->pluck('state')->first();
            session(['state'=>null]);
        }

        $survey_id = isset($request->survey) && $request->survey ? $request->survey : session('survey_id');
        $form_type = isset($request->survey) && $request->survey ? Form::where('form_id', $request->survey)->pluck('form_type')->first() : session('form_type');
        session(['survey_id' => $survey_id,'form_type'=>$form_type]);

        $formDetails = Form::with('organization','extraQuestions')->where('form_id', $survey_id)->first();

        $selectedCountrywithSurvey = isset($request->survey) && $request->survey ? Form::where('form_id', $request->survey)->pluck('country')->first() : null;
        $selectedOrganizationwithSurvey = isset($request->survey) && $request->survey ? Form::where('form_id', $request->survey)->pluck('organization_id')->first() : null;

        $topBox = $this->topBoxData($survey_id,$form_type,$country,$state);
        $meanScore = $this->meanScoreGraph($request->all(), $survey_id,$form_type,$country,$state);
        $participantDetails = $this->participantDetails($survey_id,$form_type,$country,$state);
        $positivePeace = $this->positiveNegative($country, $survey_id, 'positive_peace',$form_type,$state);
        $negativePeace = $this->positiveNegative($country, $survey_id, 'negative_peace',$form_type,$state);
        $pillarMeanScore = $this->pillarsMeanScore($country, $survey_id,$form_type,$state);
        $overTimeScores = $this->overTimeScore($survey_id,$form_type,$country,$state);

        $resultByPillar = [];

        return view('typeform.index', compact('formDetails','countries', 'organizations', 'surveyForms', 'topBox', 'meanScore', 'participantDetails', 'positivePeace', 'negativePeace', 'pillarMeanScore', 'overTimeScores', 'filterData', 'selectedCountrywithSurvey', 'selectedOrganizationwithSurvey','selectedCountry','state' ));
    }

    // public function singleSurveyData($request)
    // {
    //     $filterData = $request->all() == [] ? Form::filterForm()->where('form_id', session('survey_id'))->first() : null;

    //     //Dropdown
    //     $countries = Form::select('country')->filterForm()->whereNotNull('country',)->distinct()->get();

    //     $organizations = Organization::filterOrganization()->get();
    //     $surveyForms = Form::filterForm()->get();

    //     //Survey id if no then latest form id
    //     $country = isset($request->survey) && $request->survey ? Form::where('form_id', $request->survey)->pluck('country')->first() : session('country');
    //     $survey_id = isset($request->survey) && $request->survey ? $request->survey : session('survey_id');
    //     $form_type = isset($request->survey) && $request->survey ? Form::where('form_id', $request->survey)->pluck('form_type')->first() : session('form_type');
    //     session(['country' => $country, 'survey_id' => $survey_id,'form_type'=>$form_type]);

    //     $formDetails = Form::with('organization')->where('form_id', $survey_id)->first();

    //     $selectedCountrywithSurvey = isset($request->survey) && $request->survey ? Form::where('form_id', $request->survey)->pluck('country')->first() : null;
    //     $selectedOrganizationwithSurvey = isset($request->survey) && $request->survey ? Form::where('form_id', $request->survey)->pluck('organization_id')->first() : null;

    //     $topBox = $this->topBoxData($survey_id);
    //     $meanScore = $this->meanScoreGraph($request->all(), $survey_id);
    //     $participantDetails = $this->participantDetails($survey_id);
    //     $positivePeace = $this->positiveNegative($country, $survey_id, 'positive_peace');
    //     $negativePeace = $this->positiveNegative($country, $survey_id, 'negative_peace');
    //     $pillarMeanScore = $this->pillarsMeanScore($country, $survey_id);
    //     $overTimeScores = $this->overTimeScore($survey_id);

    //     $resultByPillar = [];

    //     return view('typeform.index', compact('formDetails', 'countries', 'organizations', 'surveyForms', 'topBox', 'meanScore', 'participantDetails', 'positivePeace', 'negativePeace', 'pillarMeanScore', 'overTimeScores', 'filterData', 'selectedCountrywithSurvey', 'selectedOrganizationwithSurvey'));
    // }

    public function topBoxData($surveyValue = null,$form_type=null,$country=null,$state=null)
    {
        $surveys = Form::filterForm()->count();
        $countries = Form::select('country')->distinct()->filterForm()->get()->count();
        $organizations = Organization::filterOrganization()->count();
        
        //Global Survey Condition
        // if($form_type !== 0){
        //     $people = $surveyValue !== null ? Answer::filterSurvey()->filterGlobalSurvey($form_type,$surveyValue,$country,$state)->count() : Answer::filterSurvey()->count();
        // }else{
        //     $people = $surveyValue !== null ? Answer::filterSurvey()->where('form_id', $surveyValue)->count() : Answer::filterSurvey()->count();
        // }
        $people = $surveyValue !== null ? Answer::filterSurvey()->filterGlobalSurvey($form_type,$surveyValue,$country,$state)->count() : Answer::filterSurvey()->count();

        return [
            'survey' => $surveys,
            'countries' => $countries,
            'organizations' => $organizations,
            'people' => $people,
        ];
    }

    public function meanScoreGraph($request, $survey_id,$form_type=null,$country=null,$state=null)
    {
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

        foreach ($pillars as $pillar) {
            $sum = Answer::filterSurvey()->filterGlobalSurvey($form_type,$survey_id,$country,$state)->sum($pillar);
            $count = Answer::filterSurvey()->filterGlobalSurvey($form_type,$survey_id,$country,$state)->whereNotNull($pillar)->count();

            $count = $count == 0 ? 1 : $count;

            $mean = $sum / $count;

            $meanPillarScore[$pillar] = round($mean, 1);
        }

        return $meanPillarScore;
    }

    public function participantDetails($survey_id,$form_type=null,$country=null,$state=null)
    {
        $genderWise = [];
        $ageWise = [];

        //Gender Wise
        $male = Answer::filterSurvey()->filterGlobalSurvey($form_type,$survey_id,$country,$state)->where('gender', 'Male')->count();
        $female = Answer::filterSurvey()->filterGlobalSurvey($form_type,$survey_id,$country,$state)->where('gender', 'Female')->count();
        $other = Answer::filterSurvey()->filterGlobalSurvey($form_type,$survey_id,$country,$state)->where('gender', 'Other')->count();
        $preferNot = Answer::filterSurvey()->filterGlobalSurvey($form_type,$survey_id,$country,$state)->where('gender', 'Prefer not to say')->count();

        $genderWise = [
            'male' => $male,
            'female' => $female,
            'other' => $other,
            'preferNot' => $preferNot,
        ];
        //Gender Wise

        //Age Wise
        $participants = Answer::filterSurvey()->filterGlobalSurvey($form_type,$survey_id,$country,$state);
        $ages = ['18 to 24', '25 to 44', '45 to 64', '65 or over', 'Prefer not to say'];

        foreach ($ages as $age) {
            $participantsClone = clone $participants;

            $ageWise[$age] = $participantsClone->where('age', $age)->count();
        }
        //Age Wise

        return [
            'genderWise' => $genderWise,
            'ageWise' => $ageWise
        ];
    }

    public function positiveNegative($country, $survey_id, $flag,$form_type=null,$state=null)
    {
        if($form_type ==1 ){
            $types = ['mean', 'globalMean'];
            
            if(!empty($state)){
                array_splice($types,1,0,'stateMean');
            }

            if(!empty($country)){
                array_splice($types,2,0,'countryMean');
            }
        }else{
            $types = ['mean', 'countryMean', 'globalMean'];

            if(!empty($state)){
                array_splice($types,1,0,'stateMean');
            }
        }
        
        $positiveMeanCal = [];

        foreach ($types as $type) {
        // $query = Form::with('answer');

        if ($type === "mean") {
            $forms = Form::with('answer')->where('form_id',$survey_id)->get();

            // $sum = $forms->flatMap(fn($form) => $form->answer->pluck($flag))->sum();
            $sum = $forms->flatMap(function($form) use($flag,$form_type,$country,$state){
                if($form_type == 1 && !empty($country)){
                    return $form->answer->filter(function($answer) use($country,$state){
                        if(!empty($state)){
                            return $answer->country == $country && $answer->state == $state;
                        }
                        return $answer->country == $country;
                    })->pluck($flag);
                   
                }

                return $form->answer->pluck($flag)->map(function($v){
                    return empty($v) ? 0 : (int) $v;
                });
            })->sum();

            $count = $forms->flatMap(function($form) use($flag,$form_type,$country,$state){
                if($form_type == 1 && !empty($country)){
                    return $form->answer->filter(function($answer) use($country,$state){
                        if(!empty($state)){
                            return $answer->country == $country && $answer->state == $state;
                        }
                        return $answer->country == $country;
                    })->pluck($flag);

                }

                return $form->answer->pluck($flag);
            })->count();
            // $count = $forms->sum(fn($form) => $form->answer->count());
        }elseif ($type === "stateMean") {
            if($form_type == 0){
                $forms = Form::with('answer')->where('state',$state)->get();
                
                $sum = $forms->flatMap(fn($form) => $form->answer->pluck($flag)->map(function($v){
                    return empty($v) ? 0 : (int) $v;
                }))->sum();
                $count = $forms->sum(fn($form) => $form->answer->count());
            }else{
                $formTypeSingleAnswers = Form::with('answer')
                    ->where('form_type',0)
                    ->where('state',$state)
                    ->get()
                    ->flatMap(fn($form)=>$form->answer->pluck($flag));

                $formTypeGlobalIds = Form::where('form_type',1)->pluck('form_id');
                $formTypeGlobalAnswers = Answer::whereIn('form_id',$formTypeGlobalIds)->where('state',$state)->pluck($flag);

                $allAnswers = $formTypeSingleAnswers->merge($formTypeGlobalAnswers);
                
                $sum = $allAnswers->sum();
                $count = $allAnswers->count();
            }
        } elseif ($type === "countryMean") {
            if($form_type == 0){
                $forms = Form::with('answer')->where('country',$country)->get();

                $sum = $forms->flatMap(fn($form) => $form->answer->pluck($flag)->map(function($v){
                    return empty($v) ? 0 : (int) $v;
                }))->sum();
                $count = $forms->sum(fn($form) => $form->answer->count());
            }else{
                $countryFull = NCountry::where('code',$country)->pluck('name')->first();

                $formTypeSingleAnswers = Form::with('answer')
                    ->where('form_type',0)
                    ->where('country',$countryFull)
                    ->get()
                    ->flatMap(fn($form)=>$form->answer->pluck($flag));

                $formTypeGlobalIds = Form::where('form_type',1)->pluck('form_id');
                $formTypeGlobalAnswers = Answer::whereIn('form_id',$formTypeGlobalIds)->where('country',$country)->pluck($flag);

                $allAnswers = $formTypeSingleAnswers->merge($formTypeGlobalAnswers);
                
                $sum = $allAnswers->sum();
                $count = $allAnswers->count();
            }
        }elseif($type === "globalMean"){
            $forms = Form::with('answer')->get();
            
            $sum = $forms->flatMap(fn($form) => $form->answer->pluck($flag)->map(function($v){
                return empty($v) ? 0 : (int) $v;
            }))->sum();
            $count = $forms->sum(fn($form) => $form->answer->count());
        }

        $positiveMeanCal[$type] = $count > 0 ? round($sum / $count, 1) : 0;
    }
        
    return $positiveMeanCal;
    }

    // public function pillarsMeanScore($country, $survey_id,$form_type=null,$state=null)
    // {
    //     $types = ['mean', 'countryMean', 'globalMean'];

    //     $pillars = [
    //         'well_functioning_government',
    //         'low_level_corruption',
    //         'equitable_distribution',
    //         'good_relations',
    //         'free_flow',
    //         'high_levels',
    //         'sound_business',
    //         'acceptance_rights'
    //     ];
    //     $pillarMeanCal = [];
    //     $singlePillarMeanCal = [];

    //     foreach ($types as $type) {
    //         $query = Form::with('answer');

    //         if ($type === "mean") {
    //             $query->where('form_id', $survey_id);
    //         } elseif ($type === "countryMean") {
    //             $query->where('country', $country);
    //         }

    //         $formsCountry = $query->get();

    //         foreach ($pillars as $pillar) {
    //             $sum = $formsCountry->flatMap(function ($form) use ($pillar) {
    //                 return $form->answer->pluck($pillar);
    //             })->sum();

    //             $count = $formsCountry->sum(function ($form) {
    //                 return $form->answer->count();
    //             });
    //             $singlePillarMeanCal[$pillar] = $count > 0 ? round($sum / $count, 1) : 0;
    //         }

    //         $pillarMeanCal[$type] = $singlePillarMeanCal;
    //     }

    //     return $pillarMeanCal;
    // }

    //Update for Global Survey
    public function pillarsMeanScore($country, $survey_id,$form_type=null,$state=null)
    {
        if($form_type == 1){
            $types = ['mean', 'globalMean'];

            if(!empty($state) && !empty($country)){
                $indexState = 1;
                $indexCountry = 2;
            }elseif(!empty($country)){
                $indexCountry =1;
            }

            if(!empty($state)){
                array_splice($types,$indexState,0,'stateMean');
            }

            if(!empty($country)){
                array_splice($types,$indexCountry,0,'countryMean');
            }
        }else{
            $types = ['mean', 'countryMean', 'globalMean'];

            if(!empty($state)){
                array_splice($types,1,0,'stateMean');
            }
        }

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

        foreach ($types as $type) {
            $pillarScores = [];

            foreach($pillars as $pillar){
                if($type === "mean"){
                    $forms = Form::with('answer')->where('form_id',$survey_id)->get();

                    // $sum = $forms->flatMap(fn($form) => $form->answer->pluck($pillar))->sum();
                    // $count = $forms->flatMap(fn($form) => $form->answer->pluck($pillar))->count();
                    $sum = $forms->flatMap(function($form) use($pillar,$form_type,$country,$state){
                        if($form_type == 1 && !empty($country)){
                            return $form->answer->filter(function($answer) use($country,$state){
                                if(!empty($state)){
                                    return $answer->country == $country && $answer->state == $state;
                                }
                                return $answer->country == $country;
                            })->pluck($pillar);

                        }
        
                        return $form->answer->pluck($pillar)->map(function($v){
                            return empty($v) ? 0 : (int) $v;
                        });
                    })->sum();
        
                    $count = $forms->flatMap(function($form) use($pillar,$form_type,$country,$state){
                        if($form_type == 1 && !empty($country)){
                            return $form->answer->filter(function($answer) use($country,$state){
                                if(!empty($state)){
                                    return $answer->country == $country && $answer->state == $state;
                                }
                                return $answer->country == $country;
                            })->pluck($pillar);

                        }
        
                        return $form->answer->pluck($pillar);
                    })->count();
                }elseif($type === "stateMean"){
                    if($form_type == 0){
                        $forms = Form::with('answer')->where('state',$state)->get();

                        $sum = $forms->flatMap(fn($form) => $form->answer->pluck($pillar)->map(function($v){
                            return empty($v) ? 0 : (int) $v;
                        }))->sum();
                        $count = $forms->sum(fn($form) => $form->answer->count());

                    }else{
                        $formTypeSingleAnswers = Form::with('answer')
                        ->where('form_type', 0)
                        ->where('state', $state)
                        ->get()
                        ->flatMap(fn($form) => $form->answer->pluck($pillar));

                        $formTypeGlobalIds = Form::where('form_type', 1)->pluck('form_id');
                        $formTypeGlobalAnswers = Answer::whereIn('form_id', $formTypeGlobalIds)
                            ->where('state', $state)
                            ->pluck($pillar);

                        $allAnswers = $formTypeSingleAnswers->merge($formTypeGlobalAnswers);

                        $sum = $allAnswers->sum();
                        $count = $allAnswers->count(); 
                    }
                }elseif($type === "countryMean"){
                    if($form_type == 0){
                        $forms = Form::with('answer')->where('country',$country)->get();

                        $sum = $forms->flatMap(fn($form) => $form->answer->pluck($pillar)->map(function($v){
                            return empty($v) ? 0 : (int) $v;
                        }))->sum();
                        $count = $forms->flatMap(fn($form) => $form->answer->pluck($pillar))->count();
                    }else{
                        $countryFull = NCountry::where('code',$country)->pluck('name')->first();

                        $formTypeSingleAnswers = Form::with('answer')
                        ->where('form_type', 0)
                        ->where('country', $countryFull)
                        ->get()
                        ->flatMap(fn($form) => $form->answer->pluck($pillar));

                        $formTypeGlobalIds = Form::where('form_type', 1)->pluck('form_id');

                        $formTypeGlobalAnswers = Answer::whereIn('form_id', $formTypeGlobalIds)
                            ->where('country', $country)
                            ->pluck($pillar);

                        $allAnswers = $formTypeSingleAnswers->merge($formTypeGlobalAnswers);

                        $sum = $allAnswers->sum();
                        $count = $allAnswers->count(); 
                    }
                }elseif($type === "globalMean"){
                    $forms = Form::with('answer')->get();

                    $sum = $forms->flatMap(fn($form) => $form->answer->pluck($pillar)->map(function($v){
                        return empty($v) ? 0 : (int) $v;
                    }))->sum();
                    $count = $forms->flatMap(fn($form) => $form->answer->pluck($pillar))->count();
                }

                $pillarScores[$pillar] = $count > 0 ? round($sum / $count, 1) : 0;
                
            }

            $pillarMeanCal[$type] = $pillarScores;
        }

        return $pillarMeanCal;
    }

    // public function overTimeScore($survey_id,$form_type=null,$country=null,$state=null)
    // {
    //     $survey = Form::with('answer')->filterForm()->where('form_id', $survey_id)->first();

    //     $overTimeMeanTime = [];

    //     $pillars = [
    //         'well_functioning_government',
    //         'low_level_corruption',
    //         'equitable_distribution',
    //         'good_relations',
    //         'free_flow',
    //         'high_levels',
    //         'sound_business',
    //         'acceptance_rights'
    //     ];

    //     $timeTypes = ['before', 'during', 'after'];

    //     foreach ($timeTypes as $timeType) {
    //         if ($survey->$timeType != null) {
    //             $date = explode(' to ', $survey->$timeType);
    //             $startdate = Carbon::createFromFormat('d-m-Y', $date[0])->startOfDay();
    //             $enddate = Carbon::createFromFormat('d-m-Y', $date[1])->endOfDay();

    //             $answersInTimeRange = $survey->answer()->filterSurvey()->whereBetween('created_at', [$startdate, $enddate])->get();
    //             if($timeType == 'after'){
    //                 $answersInTimeRanges = $survey->answer()->filterSurvey()->whereBetween('created_at', [$startdate, $enddate])->first();
    //                 dd($answersInTimeRanges);
    //             }

    //             $overTimeMean = [];
    //             foreach ($pillars as $pillar) {
    //                 $answerSum = $answersInTimeRange->sum($pillar);
    //                 $answerCount = $answersInTimeRange->count();

    //                 $answerCount = max($answerCount, 1);

    //                 $overTimeMean[$pillar] = round($answerSum / $answerCount, 1);
    //             }

    //             $overTimeMeanTime[$timeType] = $overTimeMean;
    //         } else {
    //             $overTimeMeanTime[$timeType] = 0;
    //         }
    //     }

    //     return $overTimeMeanTime;
    // }

    public function overTimeScore($survey_id,$form_type=null,$country=null,$state=null)
    {
        $survey = Form::with('answer')->filterForm()->where('form_id', $survey_id)->first();

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

        $timeTypes = ['before', 'during', 'after'];

        foreach ($timeTypes as $timeType) {
            if ($survey->$timeType != null) {
                $date = explode(' to ', $survey->$timeType);
                $startdate = Carbon::createFromFormat('d-m-Y', $date[0])->startOfDay();
                $enddate = Carbon::createFromFormat('d-m-Y', $date[1])->endOfDay();

                $answersInTimeRange = $survey->answer()->filterSurvey();
                if($form_type == 1 && !empty($country)){
                    $answersInTimeRange->where('country',$country);

                    if(!empty($state)){
                        $answersInTimeRange->where('state',$state);
                    }
                }
                $answersInTimeRange = $answersInTimeRange->whereBetween('created_at', [$startdate, $enddate])->get();

                $overTimeMean = [];
                foreach ($pillars as $pillar) {
                    
                    $answerSum = $answersInTimeRange->pluck($pillar)->map(fn($val) => (int) $val)->sum();
                    $answerCount = $answersInTimeRange->count();

                    $answerCount = max($answerCount, 1);

                    $overTimeMean[$pillar] = round($answerSum / $answerCount, 1);
                }

                $overTimeMeanTime[$timeType] = $overTimeMean;
            } else {
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

    public function generateCSV(Request $request)
    {

        if (auth()->user()->role->name == "survey") {
            $country = auth()->user()->survey->country;
            $survey_id = auth()->user()->survey->form_id;
        } else {
            $country = isset($request->survey) && $request->survey ? Form::where('form_id', $request->survey)->pluck('country')->first() : Form::latest()->first()->country;
            $survey_id = isset($request->survey) && $request->survey ? $request->survey : Form::latest()->first()->form_id;
        }


        $pillarMeanScores =  $this->pillarsMeanScore($country, $survey_id);

        $filename = "result_by_pillar.csv";
        $fp = fopen($filename, 'w+');
        fputcsv($fp, array('', 'Mean', 'Country Mean', 'Global Mean'));
        $pillars = [
            'well_functioning_government' => 'Well-Functioning Government',
            'low_level_corruption' => 'Low Levels of Corruption',
            'equitable_distribution' => 'Equitable Distribution of Resources',
            'good_relations' => 'Good Relations with Neighbours',
            'free_flow' => 'Free Flow of Information',
            'high_levels' => 'High Levels of Human Capital',
            'sound_business' => 'Sound Business Environment',
            'acceptance_rights' => 'Acceptance of the Rights of Others'
        ];

        foreach ($pillarMeanScores['mean'] as $key => $pillarMeanScore) {
            fputcsv($fp, array(
                $pillars[$key],
                $pillarMeanScore,
                $pillarMeanScores['countryMean'][$key],
                $pillarMeanScores['globalMean'][$key]
            ));
        }

        fclose($fp);
        $headers = array('Content-Type' => 'text/csv');
        return response()->download($filename, 'result_by_pillar.csv', $headers);
    }
}
