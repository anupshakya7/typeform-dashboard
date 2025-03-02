<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable =[
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
        'extra_ques1',
        'extra_ques2',
        'extra_ques3',
    ];
}
