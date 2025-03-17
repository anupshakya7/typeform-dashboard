<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRoute extends Model
{
    use HasFactory;
    protected $table = 'permission_route';

    protected $fillable = [
        'permission_id',
        'route',
    ];

    public function permission(){
        return $this->belongsTo(Permission::class,'permission_id');
    }
}
