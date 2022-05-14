<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poultry extends Model
{
    use HasFactory;




    protected $guarded = [];

    public function poultryType(){
        return $this->belongsTo(PoultryType::class,'poultry_type_id','id');
    }
    public function poultryStatus(){
        return $this->belongsTo(PoultryStatus::class,'poultry_status_id','id');
    }
    public function accountHead(){
        return $this->belongsTo(AccountHead::class,'account_head_id','id');
    }
}
