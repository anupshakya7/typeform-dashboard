<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Organization;

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

    public function scopeFilterForm($query){
        $user = auth()->user();
        $role = $user->role->name;
 
        if($role == "survey"){
             $query->where('organization_id',$user->organization_id)->where('form_id',$user->form_id);
        }elseif($role =="branch"){
             $query->where('organization_id',$user->organization_id)->whereIn('branch_id',$user->branch_id);
        }elseif($role == "organization"){
             $query->where('organization_id',$user->organization_id);
        }
 
        return $query;
     }

    public function organization(){
        return $this->hasOne(Organization::class,'id','organization_id');
    }

    public function branches(){
        return $this->hasOne(Branch::class,'id','branch_id');
    }

    public function question(){
        return $this->hasOne(Question::class,'form_id','form_id');
    }

    public function answer(){
        return $this->hasMany(Answer::class,'form_id','form_id');
    }
}
