<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function scopeFilterRole($query){
        $user = auth()->user();
        $role = $user->role->name;
 
        if($role == "survey"){
            $query->whereNot('name',"survey");
        }

        if($role =="branch"){
            $query->whereNot('name',"branch");
        }
        
        if($role == "organization"){
             $query->whereNot('name',"organization");
        }
 
        return $query;
     }

    public function permissions(){
        return $this->belongsToMany(Permission::class,'permission_role');
    }
}
