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

<<<<<<< HEAD
    public function children()
    {
        return $this->hasMany(Cattle::class, 'parent_id', 'id');
    }
    public function parent()
    {
        return $this->belongsTo(Cattle::class, 'parent_id');
=======
    public function children(){
        return $this->hasMany(Cattle::class,'parent_id', 'id');
    }

    public function parent(){
        return $this->belongsTo(Cattle::class,'parent_id');
>>>>>>> umair
    }

    public function cattleType(){
        return $this->belongsTo(CattleType::class,'cattle_type_id', 'id');
    }

    public function scopeGoats($q) {
        return $q->whereIn('cattle_type_id',[2,3]);
    }

    public function scopeCows($q) {
        return $q->where('cattle_type_id',1);
    }

    public function account_head(){
        return $this->belongsTo(AccountHead::class,'account_head_id', 'id');
    }
}
