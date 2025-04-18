<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function role(){
        return $this->belongsToMany(Permission::class,'permission_role');
    }

    public function routes(){
        return $this->hasMany(PermissionRoute::class,'permission_id');
    }
}
