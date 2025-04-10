<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo'
    ];

    public function scopeFilterOrganization($query){
        $user = auth()->user();
        $role = $user->role->name;

        if($role == 'survey'){
            $query->where('id',$user->organization_id);
        }elseif($role == "division"){
            $query->where('id',$user->organization_id);
        }elseif($role == "organization"){
             $query->where('id',$user->organization_id);
        }

        return $query;
     }

    public function branches(){
        return $this->hasMany(Branch::class,'organization_id');
    }
}
