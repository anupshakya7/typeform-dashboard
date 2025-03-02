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
        'organization_id',
        'branch_id',
        'before',
        'during',
        'after'
    ];
}
