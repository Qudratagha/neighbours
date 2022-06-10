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
    public static function cowDailyMedicineStock($sub_head_id)
    {
        $totalMedicinePurchase = \App\Models\Transaction::where('transaction_type_id', 2)->where('account_head_id', 6)->where('sub_head_id', 36)->sum('quantity');
        $totalMedicineUsed = \App\Models\Medicines::where('sub_head_id', $sub_head_id)->sum('quantity');
        return $cowDailyMedicineStock = $totalMedicinePurchase - $totalMedicineUsed;
    }
    public static function goatDailyMedicineStock($sub_head_id)
    {
        $totalMedicinePurchase = \App\Models\Transaction::where('transaction_type_id', 2)->where('account_head_id', 7)->where('sub_head_id', 44)->sum('quantity');
        $totalMedicineUsed = \App\Models\Medicines::where('sub_head_id', $sub_head_id)->sum('quantity');
        $goatDailyMedicineStock = $totalMedicinePurchase - $totalMedicineUsed;
        return $goatDailyMedicineStock;
    }
}
