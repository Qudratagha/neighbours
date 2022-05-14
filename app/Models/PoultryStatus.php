<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoultryStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function poultries(){
        return $this->hasMany(Poultry::class,'poultry_status_id','id');
    }
}
