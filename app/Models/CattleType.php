<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CattleType extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'cattle_types';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function cattles(){
        return $this->hasMany(Cattle::class,'cattle_type_id', 'id');
    }

}
