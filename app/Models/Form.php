<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable =[
        'form_id',
        'form_title',
        'country',
        'organization',
        'before',
        'during',
        'after'
    ];
}
