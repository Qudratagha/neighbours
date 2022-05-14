<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'deliveries';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function cattles(){
        return $this->hasMany(Cattle::class,'id', 'id');
    }

}
