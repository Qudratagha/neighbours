<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $table = 'workers';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function modules(){
        return $this->belongsTo(Module::class, 'module_id', 'id');
    }

    public function accountHeads(){
        return $this->belongsTo(AccountHead::class, 'account_head_id', 'id');
    }
}
