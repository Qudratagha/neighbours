<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'transactions';

    protected $guarded = [];

    public function accountHead()
    {
        return $this->belongsTo(AccountHead::class,'account_head_id','id');
    }

    public function accountSubHead()
    {
        return $this->belongsTo(AccountHead::class,'sub_head_id','id');
    }

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class,'transaction_type_id','id');
    }

    public static function milkStock()
    {
        $totalMilk = Transaction::where('account_head_id',21)->sum('quantity');

        $soldMilk = Transaction::where('account_head_id',15)->sum('quantity');

        $stockMilk = $totalMilk - $soldMilk;

        return $stockMilk;
    }
}
