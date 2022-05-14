<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dry extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'dries';
    protected $primaryKey = 'id';
    protected $guarded = [];

//    public function cattles(){
//        return $this->hasMany(Cattle::class,'dry_id','id');
//    }
}
