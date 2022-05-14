<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Utils;

class Cattle extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'cattle';
    /**
     * @var mixed
     */

    public function pregnants(){
        return $this->hasMany(Pregnant::class,'cattle_id','id');
    }

    public function deliveries(){
        return $this->hasMany(Delivery::class, 'cattle_id','id');
    }

    public function inseminations(){
        return $this->hasMany(Insemination::class,'cattle_id', 'id');
    }

    public function sicks(){
        return $this->hasMany(Sick::class,'cattle_id','id');
    }

    public function cattles(){
        return $this->hasMany(Cattle::class,'parent_id', 'id');
    }

    public function cattleType(){
        return $this->belongsTo(CattleType::class,'cattle_type_id', 'id');
    }

    public function account_head(){
        return $this->belongsTo(AccountHead::class,'account_head_id', 'id');
    }

//    public function dead(){
//        return $this->belongsTo(Dead::class,'cattle_id','id');
//    }
//    public function dry(){
//        return $this->belongsTo(Dry::class,'cattle_id', 'id');
//    }

//    public function feed(){
//        return $this->belongsTo(Feed::class,'cattle_id', 'id');
//    }


}
