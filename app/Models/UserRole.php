<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $table = 'userRole';
    protected $primaryKey = ['user_id','role_id'];
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = ['user_id','role_id'];
    public function role(){
        return $this->belongsTo('App\Models\Role', 'role_id', 'role_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    }
}
