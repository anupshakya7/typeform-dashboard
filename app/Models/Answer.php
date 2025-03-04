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

    public function form(){
        return $this->belongsTo(Form::class,'form_id','form_id');
    }
}
