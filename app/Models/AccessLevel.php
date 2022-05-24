<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessLevel extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'accessLevel';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function privilege(){
        return $this->hasMany('App\Models\Privilege', 'privilege_id', 'id');
    }

    public function modules(){
        return $this->belongsToMany('App\Models\Module', 'privilege', 'id', 'id');
    }

    public function roles(){
        return $this->belongsToMany('App\Models\Role', 'rolePrivilege', 'access_level_id', 'role_id');
    }

}
