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

    public static function cowDailyVaccineStock($sub_head_id)
    {
        $totalVaccinePurchase = \App\Models\Transaction::where('transaction_type_id', 2)->where('account_head_id', 6)->where('sub_head_id', 34)->sum('quantity');
        $totalVaccineUsed = \App\Models\Vaccination::where('sub_head_id', $sub_head_id)->sum('quantity');

        $cowDailyVaccineStock =  $totalVaccinePurchase - $totalVaccineUsed;
        return $cowDailyVaccineStock;
    }

    public static function goatDailyVaccineStock($sub_head_id)
    {
        $totalVaccinePurchase = \App\Models\Transaction::where('transaction_type_id', 2)->where('account_head_id', 7)->where('sub_head_id', 44)->sum('quantity');
        $totalVaccineUsed = \App\Models\Vaccination::where('sub_head_id', $sub_head_id)->sum('quantity');

        $goatDailyVaccineStock =  $totalVaccinePurchase - $totalVaccineUsed;
        return $goatDailyVaccineStock;
    }
}
