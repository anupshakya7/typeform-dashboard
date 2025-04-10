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
    use HasFactory, Notifiable;

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
        'organization_id',
        'branch_id',
        'form_id'
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

    public function scopeFilterUser($query){
       $user = auth()->user();
       $role = $user->role->name;

       if($role == "survey"){
            $query->where('organization_id',$user->organization_id)->where('form_id',$user->form_id);
       }elseif($role =="division"){
            $query->where('organization_id',$user->organization_id)->whereIn('branch_id',$user->branch_id);
       }elseif($role == "organization"){
            $query->where('organization_id',$user->organization_id);
       }

       return $query;
    }

    public function organization(){
        return $this->belongsTo(Organization::class,'organization_id');
    }

    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function survey(){
        return $this->belongsTo(Form::class,'form_id','form_id');
    }

    public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }

    public function hasPermissionToRoute($route){
        if($this->role->name == 'superadmin' || $this->role->name == 'krizmatic'){
            return true;
        }

        $permissions = $this->role->permissions;

        foreach($permissions as $permission){
            if($permission->routes->contains('route',$route)){
                return true;
            }   
        }

        if($route == 'home.index'){
            return true;
        }

        return false;
    }
}
