<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cultivation extends Model
{
    use HasFactory;
    protected $table = "cultivations";
    protected $primaryKey = "id";
    public $timestamps = false;


    protected $guarded = [];


    public function cultivationTypes(){
        return $this->belongsTo(CultivationType::class,'cultivation_type_id','id');
    }

    public function accountHead(){
        return $this->belongsTo(AccountHead::class,'account_head_id','id');
    }
}
