<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'vaccinations';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function accountHead(){
        return $this->belongsTo(AccountHead::class,'sub_head_id', 'id');
    }
}
