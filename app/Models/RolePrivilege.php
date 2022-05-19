<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePrivilege extends Model
{
    use HasFactory;
    protected $table = 'rolePrivilege';
    protected $guarded= [];

    public function role(){
        return $this->belongsTo('App\Models\Role', 'role_id', 'role_id');
    }

    public function privilege(){
        return $this->belongsTo('App\Models\Privilege', 'privilege_id', 'privilege_id');
    }
}
