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
        'webhook',
        'organization_id',
        'branch_id',
        'before',
        'during',
        'after'
    ];

    public function scopeFilterForm($query){
        $user = auth()->user();
        $role = $user->role->name;

        $branchIds = is_array($user->branch_id) ? $user->branch_id : explode(', ',$user->branch_id);
        $formIds = is_array($user->form_id) ? $user->form_id : explode(', ',$user->form_id);
 
        if($role == "survey"){
             $query->where('organization_id',$user->organization_id)->whereIn('form_id',$formIds);
        }elseif($role =="division"){
             $query->where('organization_id',$user->organization_id)->whereIn('branch_id',$branchIds);
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
