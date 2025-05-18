<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NSubCountry extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function country(){
        return $this->belongsTo(NCountry::class,'countryCode','code');
    }
    
    //Get Id By State Name
    public static function getIdByName($name){
        return self::where('name',$name)->value('id');
    }
}
