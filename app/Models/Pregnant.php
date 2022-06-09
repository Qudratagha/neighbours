<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregnant extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pregnants';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function cattle()
    {
        return $this->belongsTo(Cattle::class,'cattle_id','id');
    }

    public function scopePregnantCows($q) {
        return $q->with(['cattle'=> function($query) {
            return $query->cows();
        }])->where('is_pregnant',1)->get()->groupBy('cattle_id')->count();
    }
}
