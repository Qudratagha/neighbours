<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CultivationType extends Model
{
    use HasFactory;

    protected $table = "cultivation_types";
    protected $primaryKey = "id";
    public $timestamps = false;


    protected $guarded = [];
    public function cultivations(){
        return $this->hasMany(Cultivation::class,'cultivation_type_id','id');
    }

}

