<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'roleID';
    protected $fillable = [];


    public function privileges(){
        return $this->belongsToMany('App\Models\Privilege', 'rolePrivilege', 'role_id', 'privilege_id');
    }

    public function userRoles(){
        return $this->hasMany('App\Models\userRole', 'id', 'id');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User', 'userRole', 'role_id', 'user_id');
    }

    public function role_privilege(){
        return $this->hasMany('App\Models\RolePrivilege', 'id', 'id');
    }
}
