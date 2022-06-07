<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\ErrorHandler\traceAt;

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

    public static function wheatStock(){

        $totalWheat = Transaction::where('transaction_type_id', 3)
            ->where('account_head_id', 9)
            ->where('sub_head_id', 73)
            ->sum('quantity');

        $soldWheat = Transaction::where('transaction_type_id', 1)
            ->where('account_head_id', 74)
            ->where('sub_head_id', 16)
            ->sum('quantity');

        $stockWheat = $totalWheat - $soldWheat;
        return $stockWheat;
    }

    public static function cornStock(){

        $totalWheat = Transaction::where('transaction_type_id', 3)
            ->where('account_head_id', 9)
            ->where('sub_head_id', 75)
            ->sum('quantity');

        $soldWheat = Transaction::where('transaction_type_id', 1)
            ->where('account_head_id', 13)
            ->where('sub_head_id', 18)
            ->sum('quantity');

        $stockWheat = $totalWheat - $soldWheat;
        return $stockWheat;
    }

    public static function cucumberStock(){

        $totalCorn = Transaction::where('transaction_type_id', 3)
            ->where('account_head_id', 9)
            ->where('sub_head_id', 29)
            ->sum('quantity');

        $soldCorn = Transaction::where('transaction_type_id', 1)
            ->where('account_head_id', 13)
            ->where('sub_head_id', 17)
            ->sum('quantity');

        $stockCorn = $totalCorn - $soldCorn;
        return $stockCorn;
    }
}
