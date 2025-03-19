<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable=[
        'organization_id',
        'name',
        'country'
    ];

    public function scopeFilterBranch($query){
        $user = auth()->user();
        $role = $user->role->name;

        if($role == "organization"){
            $query->where('organization_id',$user->organization_id);
        }

        return $query;
    }

    public function organization(){
        return $this->belongsTo(Organization::class,'organization_id');
    }
}
