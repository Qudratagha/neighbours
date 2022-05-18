<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'modules';
    protected $fillable = [];


    public function privilege(){
        return $this->hasMany('App\Models\Privilege', 'id', 'id');
    }

    public function accessLevel(){
        return $this->belongsToMany('App\Models\AccessLevel', 'privilege', 'module_id', 'access_level_id');
    }
}
