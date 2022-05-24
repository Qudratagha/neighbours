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

//    Goat (2), Sheep (3), Cow (1)

    public function scopeCows()
    {
        return $this->cattles()->where('cattle_type_id',1);
    }

    public function scopeGoats()
    {
        return $this->cattles()->where('cattle_type_id',2);
    }
}
