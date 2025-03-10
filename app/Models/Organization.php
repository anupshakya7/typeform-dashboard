<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'country'
    ];

    public function branches(){
        return $this->hasMany(Branch::class,'organization_id');
    }
}
