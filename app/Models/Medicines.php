<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicines extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'medicines';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function accountHead(){
        return $this->belongsTo(AccountHead::class,'sub_head_id', 'id');
    }
}
