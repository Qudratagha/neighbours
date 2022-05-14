<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoultryType extends Model
{
    use HasFactory;

    protected $table = "poultry_types";
    protected $primaryKey = "id";
    public $timestamps = false;


    protected $fillable = [
//        'categoryName',
//        'user_id',
//        'dateCreated',
    ];

    public function poultries(){
        return $this->hasMany(Poultry::class,'poultry_type_id','id');
    }
}
