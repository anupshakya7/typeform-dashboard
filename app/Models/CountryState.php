<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryState extends Model
{
    use HasFactory;

    protected $table="new_countries_state";

    protected $guarded = [];

    public function state(){
        return $this->hasMany(CountryState::class,'parent_code','code');
    }
}
