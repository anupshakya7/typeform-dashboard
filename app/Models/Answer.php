<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable =[
        'event_id',
        'form_id',
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
        'extra_ans1',
        'extra_ans2',
        'extra_ans3',
    ];

    public function scopeFilterSurvey($query){
        $user = auth()->user();
        $role = $user->role->name;

        $branchIds = is_array($user->branch_id) ? $user->branch_id : explode(', ',$user->branch_id); 
        $surveyIds = is_array($user->form_id) ? $user->form_id : explode(', ',$user->form_id);
 
        if($role == "survey"){
             $query->whereIn('form_id',$surveyIds);
        }elseif($role =="division"){
             $query->whereHas('form',function($q) use($user,$branchIds){
                $q->whereIn('branch_id',$branchIds);
             });
        }elseif($role == "organization"){
             $query->whereHas('form',function($q) use($user){
                $q->where('organization_id',$user->organization_id);
             });
        }
 
        return $query;
    }

    public function form(){
        return $this->belongsTo(Form::class,'form_id','form_id');
    }
}
