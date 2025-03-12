<?php

namespace App\Http\Controllers\Typeform;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Form;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Dropdown
        $countriesPath = public_path('build/js/countries/countries.json');
        $countries = json_decode(File::get($countriesPath),true);
        $organizations = Organization::all();
        $surveyForms = Form::all();

        $topBox = $this->topBoxData();
        $meanScore = $this->meanScoreGraph($request->all());

        $resultByPillar = [];


        return view('typeform.index',compact('countries','organizations','surveyForms','topBox','meanScore'));
    }

    public function topBoxData(){
        $surveys = Form::count();
        $countries = Form::select('country')->distinct()->count();
        $organizations = Organization::count();
        $people = Answer::count();

        return [
            'survey'=>$surveys,
            'countries'=>$countries,
            'organizations'=>$organizations,
            'people'=>$people,
        ];
    }

    public function meanScoreGraph($request){
        $survey_id = isset($request->survey) && $request->survey ? $request->survey : Form::latest()->first()->form_id;
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
            $sum = Answer::where('form_id',$survey_id)->sum($pillar);
            $count = Answer::where('form_id',$survey_id)->whereNotNull($pillar)->count();

            $mean = $sum / $count;

            $meanPillarScore[$pillar] = round($mean,2);
        }

        return $meanPillarScore;
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
}
