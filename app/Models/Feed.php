<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'feeds';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function cattles(){
        return $this->hasMany(Cattle::class,'feed_id','id');
    }
}
