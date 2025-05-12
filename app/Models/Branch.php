<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable=[
        'organization_id',
        'name'
    ];

    public function scopeFilterBranch($query){
        $user = auth()->user();
        $role = $user->role->name;

        $branchIds = is_array($user->branch_id) ? $user->branch_id : explode(', ',$user->branch_id); 
        
        if($role == "survey"){
            $query->whereIn('id',$user->branch_id);
        }elseif($role == "division"){
            $query->whereIn('id',$branchIds);
        }elseif($role == "organization"){
            $query->where('organization_id',$user->organization_id);
        }

        return $query;
    }

    public function organization(){
        return $this->belongsTo(Organization::class,'organization_id');
    }
}
