<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role_id',
        'organization_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }

    public function organization(){
        return $this->belongsTo(Organization::class,'organization_id');
    }

    public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }

    public function hasPermissionToRoute($route){
        if($this->role == 'iep'){
            return true;
        }

        $permissions = $this->role->permissions;

        foreach($permissions as $permission){
            if($permission->routes->contains('router',$route)){
                return true;
            }   
        }

        return false;
    }
}
