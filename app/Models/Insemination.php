<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insemination extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'inseminations';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function cattle(){
        return $this->belongsTo(Cattle::class,'cattle_id', 'id');
    }
}
