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
        $totalMilk = Transaction::where('account_head_id',22)->sum('quantity');

        $soldMilk = Transaction::where('account_head_id',14)->sum('quantity');

        $stockMilk = $totalMilk - $soldMilk;

        return $stockMilk;
    }

    public static function wheatStock(){

        $totalWheat = Transaction::where('transaction_type_id', 3)
            ->where('account_head_id', 9)
            ->where('sub_head_id', 71)
            ->sum('quantity');

        $soldWheat = Transaction::where('transaction_type_id', 1)
            ->where('account_head_id', 13)
            ->where('sub_head_id', 74)
            ->sum('quantity');

        $stockWheat = $totalWheat - $soldWheat;
        return $stockWheat;
    }

    public static function cornStock(){

        $totalCorn = Transaction::where('transaction_type_id', 3)
            ->where('account_head_id', 9)
            ->where('sub_head_id', 72)
            ->sum('quantity');

        $soldCorn = Transaction::where('transaction_type_id', 1)
            ->where('account_head_id', 13)
            ->where('sub_head_id', 76)
            ->sum('quantity');

        $stockCorn = $totalCorn - $soldCorn;
        return $stockCorn;
    }

    public static function cucumberStock(){

        $totalCucumber = Transaction::where('transaction_type_id', 3)
            ->where('account_head_id', 9)
            ->where('sub_head_id', 73)
            ->sum('quantity');

        $soldCucumber = Transaction::where('transaction_type_id', 1)
            ->where('account_head_id', 13)
            ->where('sub_head_id', 75)
            ->sum('quantity');

        $stockCucumber = $totalCucumber - $soldCucumber;
        return $stockCucumber;
    }

    public static function rateQuantitySum(){
        $cucumberRate = Rate::recentRate()->where('name', 'Cucumber')->pluck('rate');
        return $cucumberRate;
    }


    public function scopeMilkingCows($q) {
        return $q->where('transaction_type_id',3)->where('account_head_id',22)->groupBy('sub_head_id')->get();
    }

    public function scopeSoldCows($q) {
        return $q->where('transaction_type_id',1)->where('account_head_id',15)->groupBy('sub_head_id')->get()->count();
    }

    public function scopeTotalExpenditure($q) {
        return $q->where('transaction_type_id',2)->where('account_head_id',6)->sum('amount');
    }

    public function scopeTotalIncome($q) {
        return $q->where('transaction_type_id',1)->whereIn('account_head_id',[15,14])->sum('amount');
    }
}
