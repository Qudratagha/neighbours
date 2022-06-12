<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'role';
    protected $fillable = [];


    public function privileges(){
        return $this->belongsToMany('App\Models\Privilege', 'rolePrivilege', 'role_id', 'privilege_id');
    }

    public function users(){
        return $this->belongsToMany(User::class,'userrole','role_id','user_id');
    }

    public function rolePrivilege(){
        return $this->hasMany('App\Models\RolePrivilege', 'role_id', 'id');
    }

    public function accessLevels() {
        return $this->belongsToMany('App\Models\AccessLevel','role_privilege','role_id','role_id');
    }
}
