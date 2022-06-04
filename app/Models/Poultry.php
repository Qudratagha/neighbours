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
    // Hen Calculation Starts
    public static function totalPurchaseHen()
    {
        $totalPurchaseHen = Transaction::where('transaction_type_id', 2)->where('account_head_id', 8)->where('sub_head_id', 53)->sum('quantity');
        return $totalPurchaseHen;
    }
    public static function totalSaleHen()
    {
        $totalSaleHen = Transaction::where('transaction_type_id', 1)->where('account_head_id', 20)->where('sub_head_id', 20)->sum('quantity');
        return $totalSaleHen;
    }
    public static function totalDieHen()
    {
        $totalDieHen = \App\Models\Poultry::where('poultry_type_id', 1)->where('poultry_status_id', 1)->where('account_head_id', 8)->sum('quantity');
        return $totalDieHen;
    }
    public static function totalSickHen()
    {
        $totalSickHen = \App\Models\Poultry::where('poultry_type_id', 1)->where('poultry_status_id', 7)->where('account_head_id', 8)->sum('quantity');
        return $totalSickHen;
    }
    public static function totalHealthyHen()
    {
        $totalHealthyHen = \App\Models\Poultry::where('poultry_type_id', 1)->where('poultry_status_id', 8)->where('account_head_id', 8)->sum('quantity');
        return $totalHealthyHen;
    }
    public static function sickMHealthy()
    {
        $totalSickHen = \App\Models\Poultry:: totalSickHen();
        $totalHealthyHen = \App\Models\Poultry:: totalHealthyHen();
        $sickMHealthy =$totalSickHen - $totalHealthyHen;
        return $sickMHealthy;
    }
    public static function purchaseMsaleMdie()
    {
        $totalPurchaseHen = \App\Models\Poultry:: totalPurchaseHen();
        $totalSaleHen     = \App\Models\Poultry:: totalSaleHen();
        $totalDieHen      = \App\Models\Poultry:: totalDieHen();
        $purchaseMsaleMdie = $totalPurchaseHen -  $totalSaleHen -  $totalDieHen;
        return $purchaseMsaleMdie;
    }
    public static function purchaseMsaleMdieMsickHen()
    {
        $purchaseMsaleMdie = \App\Models\Poultry:: purchaseMsaleMdie();
        $totalSickHen = \App\Models\Poultry::totalSickHen();
        $totalHealthyHen = \App\Models\Poultry::totalHealthyHen();
        $purchaseMsaleMdie = $purchaseMsaleMdie - $totalSickHen + $totalHealthyHen ;
        return $purchaseMsaleMdie;
    }

    // Hen Calculation Ends
    public static function totalEggsCollected()
    {
        $totalEggsCollected = \App\Models\Poultry::where('poultry_type_id', 3)->where('poultry_status_id', 4)->where('account_head_id', 8)->sum('quantity');
        $totalIncubatedCollected = \App\Models\Poultry::where('poultry_type_id', 3)->where('poultry_status_id', 3)->where('account_head_id', 8)->sum('quantity');
        $totalSaleEggs = \App\Models\Transaction::where('transaction_type_id', 1)->where('account_head_id', 19)->where('sub_head_id', 19)->sum('quantity');
        $collEggsMincuEggs =  $totalEggsCollected - $totalIncubatedCollected - $totalSaleEggs ;
        return $collEggsMincuEggs;
    }
    // Chicks Calculation Strats

    public static function totalChicksCollected()
    {
        $totalEggsCollected = \App\Models\Poultry::where('poultry_type_id', 2)->where('poultry_status_id', 4)->where('account_head_id', 8)->sum('quantity');
        return $totalEggsCollected;
    }
    public static function totalDieChicks()
    {
        $totalDieChicks = \App\Models\Poultry::where('poultry_type_id', 2)->where('poultry_status_id', 1)->where('account_head_id', 8)->sum('quantity');
        return $totalDieChicks;
    }
    public static function totalSickChicks()
    {
        $totalSickChicks = \App\Models\Poultry::where('poultry_type_id', 2)->where('poultry_status_id', 7)->where('account_head_id', 8)->sum('quantity');
        return $totalSickChicks;
    }
    public static function totalHealthyChicks()
    {
        $totalHealthyChicks = \App\Models\Poultry::where('poultry_type_id', 2)->where('poultry_status_id', 8)->where('account_head_id', 8)->sum('quantity');
        return $totalHealthyChicks;
    }
    public static function totalchickSale()
    {
        $totalHealthyChicks = \App\Models\Transaction::where('transaction_type_id', 1)->where('account_head_id', 21)->where('sub_head_id', 21)->sum('quantity');
        return $totalHealthyChicks;
    }
    public static function totalRemainingChicks()
    {
        $totalChicksCollected = \App\Models\Poultry:: totalChicksCollected();
        $totalDieChicks = \App\Models\Poultry:: totalDieChicks();
        $totalchickSale = \App\Models\Poultry:: totalchickSale();
        $collMdie =  $totalChicksCollected - $totalDieChicks - $totalchickSale;
        return $collMdie;
    }
    public static function totalRemainingMsick()
    {
        $totalRemainingChicks = \App\Models\Poultry:: totalRemainingChicks();
        $totalSickChicks = \App\Models\Poultry:: totalSickChicks();
        $totalHealthyChicks = \App\Models\Poultry:: totalHealthyChicks();
        $totalRemainingMsick = $totalRemainingChicks - $totalSickChicks + $totalHealthyChicks  ;
        return $totalRemainingMsick;
    }
    public static function totalSickPHealthy()
    {
        $totalSickChicks = \App\Models\Poultry:: totalSickChicks();
        $totalHealthyChicks = \App\Models\Poultry:: totalHealthyChicks();
        $totalSickPHealthy = $totalSickChicks - $totalHealthyChicks;
        return $totalSickPHealthy;
    }
    // Chicks Calculation Ends
    // Feed Calculation Starts
    public static function totalFeedPurchase()
    {
        $totalFeedPurchase = \App\Models\Transaction::where('transaction_type_id', 2)->where('account_head_id', 8)->where('sub_head_id', 54)->sum('quantity');
        return $totalFeedPurchase;
    }
    public static function totalFeedUsed()
    {
        $totalFeedUsed = \App\Models\Feed::where('status', 1)->where('cattle_type', 1)->sum('quantity');
        return $totalFeedUsed;
    }
    public static function purchaseFeedMUsedFeed()
    {
        $totalFeedPurchase = \App\Models\Poultry:: totalFeedPurchase();
        $totalFeedUsed = \App\Models\Poultry:: totalFeedUsed();
        $purchaseFeedMUsedFeed = $totalFeedPurchase - $totalFeedUsed;
        return $purchaseFeedMUsedFeed;
    }

    public static function totalVaccinePurchase()
    {
        $totalVaccinePurchase = \App\Models\Transaction::where('transaction_type_id', 2)->where('account_head_id', 8)->where('sub_head_id', 57)->sum('quantity');
        return $totalVaccinePurchase;
    }
    public static function totalVaccineUsed()
    {
        $totalVaccineUsed = \App\Models\Vaccination::where('sub_head_id', 57)->sum('quantity');
        return $totalVaccineUsed;
    }
    public static function purchaseVaccineMUsedVaccine()
    {
        $totalVaccinePurchase = \App\Models\Poultry:: totalVaccinePurchase();
        $totalVaccineUsed = \App\Models\Poultry:: totalVaccineUsed();
        $purchaseVaccineMUsedVaccine =  $totalVaccinePurchase - $totalVaccineUsed;
        return $purchaseVaccineMUsedVaccine;
    }
    public static function totalMedicinePurchase()
    {
        $totalMedicinePurchase = \App\Models\Transaction::where('transaction_type_id', 2)->where('account_head_id', 8)->where('sub_head_id', 55)->sum('quantity');
        return $totalMedicinePurchase;
    }
    public static function totalMedicineUsed()
    {
        $totalMedicineUsed = \App\Models\Medicines::where('sub_head_id', 55)->sum('quantity');
        return $totalMedicineUsed;
    }

    public static function purchaseMedicineMUsedMedicine()
    {
        $totalMedicinePurchase = \App\Models\Poultry::totalMedicinePurchase();
        $totalMedicineUsed = \App\Models\Poultry::totalMedicineUsed();
        $variable = $totalMedicinePurchase - $totalMedicineUsed;
        return $variable;
    }




}
