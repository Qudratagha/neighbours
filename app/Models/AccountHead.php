<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountHead extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'account_heads';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function account_heads(){
        return $this->hasMany(AccountHead::class,'parent_id','id');
    }
    public function cattles(){
        return $this->hasMany(Cattle::class,'account_head_id','id');
    }

    public function cultivations(){
        return $this->hasMany(Cultivation::class,'account_head_id','id');
    }

    public function poultries(){
        return $this->hasMany(Poultry::class,'account_head_id','id');
    }

    public function medicines(){
        return $this->hasMany(Medicines::class,'sub_head_id','id');
    }

    public function vaccinations()
    {
    return $this->hasMany(Vaccination::class,'sub_head_id','id');
    }

    public function transactionHead()
    {
        return $this->hasMany(Transaction::class,'account_head_id','id');
    }

    public function transactionSubHead()
    {
        return $this->hasMany(Transaction::class,'sub_head_id','id');
    }

    public function worker(){
        return $this->hasMany(AccountHead::class, 'account_head_id', 'id');
    }

}
