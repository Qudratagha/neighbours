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
    public function scopeType($q, $value) {
        return $q->where('poultry_type_id',$value);
    }
    public function scopeHens($q) {
        return $q->where('poultry_type_id',1);
    }
    public function scopeChicks($q) {
        return $q->where('poultry_type_id',2);
    }
    public function scopeEggs($q) {
        return $q->where('poultry_type_id',3);
    }
    public function poultryStatus(){
        return $this->belongsTo(PoultryStatus::class,'poultry_status_id','id');
    }
    public function accountHead(){
        return $this->belongsTo(AccountHead::class,'account_head_id','id');
    }
}
