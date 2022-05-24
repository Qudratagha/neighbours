<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poultry extends Model
{
    use HasFactory;




    protected $guarded = [];
    public $timestamps = false;

    public function poultryType(){
        return $this->belongsTo(PoultryType::class,'poultry_type_id','id');
    }


    public function scopeType($q, $value) {
        return $q->where('poultry_type_id',$value);
    }
    public function scopeHens($q) {
        return $q->where('poultry_type_id',1);
    }
    public function scopeChicks($q) {
        return $q->where('poultry_type_id',2);
    }
    public function scopeEggs($q) {
        return $q->where('poultry_type_id',3);
    }
    public function poultryStatus(){
        return $this->belongsTo(PoultryStatus::class,'poultry_status_id','id');
    }
    public function accountHead(){
        return $this->belongsTo(AccountHead::class,'account_head_id','id');
    }
    public static function totalPurchaseHen()
    {
        $totalPurchaseHen = Poultry::where('poultry_type_id',1)->where('poultry_status_id',6)->sum('quantity');
        if ($totalPurchaseHen == NULL)
        {
            $totalPurchaseHen = 0;
        }
        return $totalPurchaseHen;
    }
    public static function totalDieHen()
    {
        $henDie = Poultry::where('poultry_type_id',1)->where('poultry_status_id',1)->sum('quantity');
        if ($henDie == NULL)
        {
            $henDie = 0;
        }
        return $henDie;
    }
    public static function totalSickHen()
    {
        $sickHen = Poultry::where('poultry_type_id',1)->where('poultry_status_id',7)->sum('quantity');
        if ($sickHen == NULL)
        {
            $sickHen = 0;
        }
        return $sickHen;
    }
    public static function totalHealthyHen()
    {
        $healthyHen = Poultry::where('poultry_type_id',1)->where('poultry_status_id',8)->sum('quantity');
        if ($healthyHen == NULL)
        {
            $healthyHen = 0;
        }
        return $healthyHen;
    }
    public static function totalPurchaseSickHealthy(){
        $totalPurchaseHen = Poultry::where('poultry_type_id',1)->where('poultry_status_id',6)->sum('quantity');
        $henDie = Poultry::where('poultry_type_id',1)->where('poultry_status_id',1)->sum('quantity');
        $sickHen = Poultry::where('poultry_type_id',1)->where('poultry_status_id',7)->sum('quantity');

        $healthyHen = Poultry::where('poultry_type_id',1)->where('poultry_status_id',8)->sum('quantity');

        $totalPurchaseSickHealthy =  $totalPurchaseHen - $henDie - $sickHen + $healthyHen ;

        return $totalPurchaseSickHealthy;
    }
    public static function totalHenEggs()
    {
        $totalPurchaseHen = \App\Models\Poultry::totalPurchaseHen();
        $henDie = \App\Models\Poultry::totalDieHen();
        $totalEggsCollected = $totalPurchaseHen - $henDie;

        return $totalEggsCollected;
    }
    public static function totalCollectedEggs()
    {
        $totalCollectedEggs = Poultry::where('poultry_type_id',3)->where('poultry_status_id',4)->sum('quantity');
        return $totalCollectedEggs;
    }
    public static function totalEggsToBeIncubated()
    {
        $totalIncubatedEggs = Poultry::where('poultry_type_id',3)->where('poultry_status_id',3)->sum('quantity');
        $totalCollectedEggs = \App\Models\Poultry::totalCollectedEggs();
        $totalEggsToBeIncubated = $totalCollectedEggs - $totalIncubatedEggs;
        return $totalEggsToBeIncubated;
    }



}
