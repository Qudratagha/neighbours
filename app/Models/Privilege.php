<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'privilege';
    protected $guarded = [];

    public function role(){
        return $this->belongsToMany('App\Models\Role', 'rolePrivilege', 'privilege_id', 'role_id');
    }

    public function role_privilege(){
        return $this->hasMany('App\Models\RolePrivilege', 'id', 'id');
    }

    public function modules(){
        return $this->belongsTo('App\Models\Module', 'id', 'id');
    }

    public function accessLevel(){
        return $this->belongsTo('App\Models\AccessLevel', 'id', 'id');
    }
}
