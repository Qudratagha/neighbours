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

    public static function cowDailyFeedStock()
    {
        $totalFeedPurchase = \App\Models\Transaction::where('transaction_type_id', 2)->where('account_head_id', 6)->where('sub_head_id', 30)->sum('quantity');
        $totalFeedUsed = \App\Models\Feed::where('cattle_type', 2)->where('status',2)->sum('quantity');
        return $totalFeedPurchase - $totalFeedUsed;
    }

    public static function goatDailyFeedStock()
    {
        $totalFeedPurchase = \App\Models\Transaction::where('transaction_type_id', 2)->where('account_head_id', 7)->where('sub_head_id', 41)->sum('quantity');
        $totalFeedUsed = \App\Models\Feed::where('cattle_type', 3)->where('status',3)->sum('quantity');
        return $totalFeedPurchase - $totalFeedUsed;
    }
}
