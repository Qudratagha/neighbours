<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sick extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'sicks';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function cattle(){
        return $this->belongsTo(Cattle::class,'cattle_id','id');
    }

    public function scopeSickCows($q) {
        return $q->with(['cattle'=> function($query) {
            return $query->cows();
        }])->where('is_sick',1)->get()->groupBy('cattle_id')->count();
    }
}
