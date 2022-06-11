<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CultivationController;
use App\Http\Controllers\PoultryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/getSingleCowMilkCollection/{account_head_id}', [App\Http\Controllers\DashboardController::class, 'getSingleCowMilkCollection'])->name('dashboard.getSingleCowMilkCollection');
//Route::get('/getMilkCollectionSaleData/{startDateMilkCollectionSold}/{endDateMilkCollectionSold}', [App\Http\Controllers\DashboardController::class, 'getMilkCollectionSaleData'])->name('dashboard.getMilkCollectionSaleData');

//poultry
Route::get('/poultry/getIncubationDates/{date}', [\App\Http\Controllers\PoultryController::class, 'getIncubationDates'])->name('poultry.getIncubationDates');
Route::get('/poultry/getDateQuantity/{date}', [\App\Http\Controllers\PoultryController::class,'getDateQuantity'])->name('poultry.getDateQuantity');
Route::resource('/poultry', PoultryController::class);
//Route::get('/poultry/getIncubationDates', [\App\Http\Controllers\PoultryController::class,'getIncubationDates'])->name('poultry.getIncubationDates');

//poultry_daily
Route::get('poultry_daily',[\App\Http\Controllers\PoultryController::class, 'indexDaily'])->name('poultry_daily.indexDaily');
Route::post('/poultry_daily',[\App\Http\Controllers\PoultryController::class, 'storeDaily'])->name('poultry_daily.storeDaily');
//Route::get('/poultry_daily/totalEggs', [\App\Http\Controllers\PoultryController::class,'totalEggs'])->name('poultry_daily.totalEggs');


Route::delete('/poultry_daily/{poultry_daily}',[\App\Http\Controllers\Poultrycontroller::class,'eggdel'])->name('poultry_daily.eggdel');
Route::delete('/poultry_daily_feed/{poultry_daily}',[\App\Http\Controllers\Poultrycontroller::class,'feeddel'])->name('poultry_daily.feeddel');
Route::delete('/poultry_daily_vaccine/{poultry_daily}',[\App\Http\Controllers\Poultrycontroller::class,'vaccineDelete'])->name('poultry_daily.vaccineDelete');
Route::delete('/poultry_daily_medicine/{poultry_daily}',[\App\Http\Controllers\Poultrycontroller::class,'medicineDelete'])->name('poultry_daily.medicineDelete');

//cattle
Route::get('/cattle/{cattle_type}',[\App\Http\Controllers\CattleController::class,'index'])->name('cattle.index');
Route::get('/cattle/{cattle_type}/create',[\App\Http\Controllers\CattleController::class,'create'])->name('cattle.create');
Route::post('/cattle/{cattle_type}',[\App\Http\Controllers\CattleController::class,'store'])->name('cattle.store');
Route::get('/cattle/{cattle_type}/{cattle}',[\App\Http\Controllers\CattleController::class,'show'])->name('cattle.show');
Route::get('/cattle/{cattle_type}/{cattle_id}/edit',[\App\Http\Controllers\CattleController::class,'edit'])->name('cattle.edit');
Route::put('/cattle/{cattle_type}/{cattle_id}',[\App\Http\Controllers\CattleController::class,'update'])->name('cattle.update');
Route::delete('/cattle/{cattle_type}/{cattle}',[\App\Http\Controllers\CattleController::class,'destroy'])->name('cattle.destroy');

//cow_daily
Route::get('/cow_daily',[\App\Http\Controllers\CattleController::class, 'index'])->name('cow_daily.index');
Route::post('/cow_daily',[\App\Http\Controllers\CattleController::class, 'store'])->name('cow_daily.store');
Route::get('/cow_daily/{cow_daily}',[\App\Http\Controllers\CattleController::class, 'cowDaily'])->name('cow_daily.show');
Route::post('/cow_daily/sick',[\App\Http\Controllers\SickController::class, 'store'])->name('sickCow.store');
Route::post('/cow_daily/medicine',[\App\Http\Controllers\MedicinesController::class, 'store'])->name('medicineCow.store');
Route::post('/cow_daily/pregnant',[\App\Http\Controllers\PregnantController::class, 'store'])->name('pregnantCow.store');
Route::post('/cow_daily/delivery',[\App\Http\Controllers\DeliveryController::class, 'store'])->name('deliveryCow.store');
Route::post('/cow_daily/vaccination',[\App\Http\Controllers\VaccinationController::class, 'store'])->name('vaccinationCow.store');
Route::post('/cow_daily/insemination',[\App\Http\Controllers\InseminationController::class, 'store'])->name('inseminationCow.store');

Route::delete('/cow_daily/{transaction}',[\App\Http\Controllers\TransactionController::class, 'destroy'])->name('cow_daily.destroy');
Route::delete('/cow_daily_sick/{sick}',[\App\Http\Controllers\SickController::class, 'destroy'])->name('sickCow.destroy');

Route::delete('/cow_daily_medicine/{medicine}',[\App\Http\Controllers\MedicinesController::class, 'destroy'])->name('medicineCow.destroy');
Route::delete('/cow_daily_insemination/{insemination}',[\App\Http\Controllers\InseminationController::class, 'destroy'])->name('inseminationCow.destroy');
Route::delete('/cow_daily_pregnant/{pregnant}',[\App\Http\Controllers\PregnantController::class, 'destroy'])->name('pregnantCow.destroy');
Route::delete('/cow_daily_delivery/{delivery}',[\App\Http\Controllers\DeliveryController::class, 'destroy'])->name('deliveryCow.destroy');
Route::delete('/cow_daily_vaccination/{vaccination}',[\App\Http\Controllers\VaccinationController::class, 'destroy'])->name('vaccinationCow.destroy');

//goat_daily
Route::get('/goat_daily',[\App\Http\Controllers\CattleController::class, 'index'])->name('goat_daily.index');
Route::post('/goat_daily',[\App\Http\Controllers\CattleController::class, 'store'])->name('goat_daily.store');
Route::get('/goat_daily/{goat_daily}',[\App\Http\Controllers\CattleController::class, 'goatDaily'])->name('goat_daily.show');
Route::post('/goat_daily/sick',[\App\Http\Controllers\SickController::class, 'store'])->name('sick.store');
Route::post('/goat_daily/medicine',[\App\Http\Controllers\MedicinesController::class, 'store'])->name('medicine.store');
Route::post('/goat_daily/pregnant',[\App\Http\Controllers\PregnantController::class, 'store'])->name('pregnant.store');
Route::post('/goat_daily/delivery',[\App\Http\Controllers\DeliveryController::class, 'store'])->name('delivery.store');
Route::post('/goat_daily/vaccination',[\App\Http\Controllers\VaccinationController::class, 'store'])->name('vaccination.store');

Route::delete('/goat_daily_sick/{sick}', [\App\Http\Controllers\SickController::class, 'destroy'])->name('sickGoat.destroy');
Route::delete('/goat_daily_medicine/{medicine}',[\App\Http\Controllers\MedicinesController::class, 'destroy'])->name('medicineGoat.destroy');
Route::delete('/goat_daily_insemination/{insemination}',[\App\Http\Controllers\InseminationController::class, 'destroy'])->name('inseminationGoat.destroy');
Route::delete('/goat_daily_pregnant/{pregnant}',[\App\Http\Controllers\PregnantController::class, 'destroy'])->name('pregnantGoat.destroy');
Route::delete('/goat_daily_delivery/{delivery}',[\App\Http\Controllers\DeliveryController::class, 'destroy'])->name('deliveryGoat.destroy');
Route::delete('/goat_daily_vaccination/{vaccination}',[\App\Http\Controllers\VaccinationController::class, 'destroy'])->name('vaccinationGoat.destroy');

//cow_sale
Route::get('/cow_sale',[\App\Http\Controllers\TransactionController::class, 'indexCowSale'])->name('cow_sale.index');
Route::post('/cow_sale',[\App\Http\Controllers\TransactionController::class, 'store'])->name('cow_sale.store');
Route::get('/cow_sale/{cow_sale}',[\App\Http\Controllers\TransactionController::class, 'showCowSale'])->name('cow_sale.show');

//Feed
Route::get('cow_feed', [App\Http\Controllers\FeedController::class, 'cowIndex'])->name('cow_feed.index');
Route::get('goat_feed', [App\Http\Controllers\FeedController::class, 'goatIndex'])->name('goat_feed.index');
Route::post('cow_feed_store', [App\Http\Controllers\FeedController::class, 'store'])->name('cow_feed.store');
Route::post('goat_feed_store', [App\Http\Controllers\FeedController::class, 'store'])->name('goat_feed.store');
Route::delete('cow_feed_delete/{cow_feed_id}', [App\Http\Controllers\FeedController::class, 'destroy'])->name('cow_feed.destroy');
Route::delete('goat_feed_delete/{goat_feed_id}', [App\Http\Controllers\FeedController::class, 'destroy'])->name('goat_feed.destroy');

//cow_feed
//Route::get('/cow_feed', [\App\Http\Controllers\FeedController::class, 'indexCowFeed'])->name('cow_feed.index');

//milk_sale
Route::get('/milk_sale',[\App\Http\Controllers\TransactionController::class, 'indexMilkSale'])->name('milk_sale.index');
Route::post('/milk_sale',[\App\Http\Controllers\TransactionController::class, 'store'])->name('milk_sale.store');

//goat_sale
Route::get('/goat_sale',[\App\Http\Controllers\TransactionController::class, 'indexGoatSale'])->name('goat_sale.index');
Route::post('/goat_sale',[\App\Http\Controllers\TransactionController::class, 'store'])->name('goat_sale.store');
Route::get('/goat_sale/{goat_sale}',[\App\Http\Controllers\TransactionController::class, 'showCowSale'])->name('goat_sale.show');

//rate
Route::resource('/rates', \App\Http\Controllers\RateController::class);

//cultivation
Route::resource('/cultivation', CultivationController::class);

//Cultivation Collect
Route::get('/cultivation_collect', [App\Http\Controllers\CultivationController::class, 'collectCultivation'])->name('cultivation.collectCultivation');
Route::get('/cultivation_collect/{cultivation}/editCollect', [App\Http\Controllers\CultivationController::class, 'editCollect'])->name('cultivation.editCollect');
Route::put('/cultivation_collect/{cultivation}', [App\Http\Controllers\CultivationController::class, 'updateCollect'])->name('cultivation.updateCollect');
Route::delete('/cultivation_collect/{cultivation}', [App\Http\Controllers\CultivationController::class, 'destroyCollect'])->name('cultivation.destroyCollect');

//Sale Cultivation
Route::get('cultivation_sale', [App\Http\Controllers\CultivationController::class, 'saleCultivation'])->name('cultivation.saleCultivation');

//expenditure
Route::get('/expenditure',[\App\Http\Controllers\TransactionController::class, 'indexExpenditure'])->name('expenditure.index');
Route::get('/expenditure_create',[\App\Http\Controllers\TransactionController::class, 'createExpenditure'])->name('expenditure.create');
Route::post('/expenditure',[\App\Http\Controllers\TransactionController::class, 'storeExpenditure'])->name('expenditure.store');
Route::get('/expenditure/{transaction}/edit',[\App\Http\Controllers\TransactionController::class, 'editExpenditure'])->name('expenditure.edit');
Route::put('/expenditure_update/{transaction}',[\App\Http\Controllers\TransactionController::class, 'updateExpenditure'])->name('expenditure.update');
Route::delete('/expenditure/{transaction}',[\App\Http\Controllers\TransactionController::class, 'destroyExpenditure'])->name('expenditure.destroy');

//cow_expenditure
Route::get('/cow_expenditure',[\App\Http\Controllers\TransactionController::class, 'indexCowExpenditure'])->name('cow_expenditure.index');
//  {  Cow Purchase
Route::get('/cow_expenditure_purchase_create',[\App\Http\Controllers\CattleController::class, 'createCowExpenditurePurchase'])->name('cow_expenditure_purchase.create');
Route::post('/cow_expenditure_purchase',[\App\Http\Controllers\CattleController::class, 'store'])->name('cow_expenditure_purchase.store');
//     Cow Purchase end }
//  {  Cow Salaries
Route::get('/cow_salary_create',[\App\Http\Controllers\TransactionController::class, 'createCowSalary'])->name('cow_salary.create');
Route::post('/cow_salary',[\App\Http\Controllers\TransactionController::class, 'storeCowSalary'])->name('cow_salary.store');
//     Cow Salaries end }
Route::get('/cow_expenditure_create',[\App\Http\Controllers\TransactionController::class, 'createCowExpenditure'])->name('cow_expenditure.create');
Route::post('/cow_expenditure',[\App\Http\Controllers\TransactionController::class, 'storeCowExpenditure'])->name('cow_expenditure.store');
Route::get('/cow_expenditure/{transaction}/edit',[\App\Http\Controllers\TransactionController::class, 'editCowExpenditure'])->name('cow_expenditure.edit');
Route::put('/cow_expenditure_update/{transaction}',[\App\Http\Controllers\TransactionController::class, 'updateCowExpenditure'])->name('cow_expenditure.update');
Route::delete('/cow_expenditure/{transaction}',[\App\Http\Controllers\TransactionController::class, 'destroyCowExpenditure'])->name('cow_expenditure.destroy');

//poultry_expenditure
Route::get('/poultry_expenditure',[\App\Http\Controllers\TransactionController::class, 'indexPoultryExpenditure'])->name('poultry_expenditure.index');
Route::get('/poultry_expenditure_create',[\App\Http\Controllers\TransactionController::class, 'createPoultryExpenditure'])->name('poultry_expenditure.create');
//  {  Poultry Salaries
Route::get('/poultry_salary_create',[\App\Http\Controllers\TransactionController::class, 'createPoultrySalary'])->name('poultry_salary.create');
Route::post('/poultry_salary',[\App\Http\Controllers\TransactionController::class, 'storePoultrySalary'])->name('poultry_salary.store');
//     Poultry Salaries end }
Route::post('/poultry_expenditure',[\App\Http\Controllers\TransactionController::class, 'storePoultryExpenditure'])->name('poultry_expenditure.store');
Route::get('/poultry_expenditure/{transaction}/edit',[\App\Http\Controllers\TransactionController::class, 'editPoultryExpenditure'])->name('poultry_expenditure.edit');
Route::put('/poultry_expenditure_update/{transaction}',[\App\Http\Controllers\TransactionController::class, 'updatePoultryExpenditure'])->name('poultry_expenditure.update');
Route::delete('/poultry_expenditure/{transaction}',[\App\Http\Controllers\TransactionController::class, 'destroyPoultryExpenditure'])->name('poultry_expenditure.destroy');

//goat_expenditure
Route::get('/goat_expenditure',[\App\Http\Controllers\TransactionController::class, 'indexGoatExpenditure'])->name('goat_expenditure.index');
//  {Goat Purchase
Route::get('/goat_expenditure_purchase_create',[\App\Http\Controllers\CattleController::class, 'createGoatExpenditurePurchase'])->name('goat_expenditure_purchase.create');
Route::post('/goat_expenditure_purchase',[\App\Http\Controllers\CattleController::class, 'store'])->name('goat_expenditure_purchase.store');
//     Goat Purchase end }
//  {Goat Salaries
Route::get('/goat_salary_create',[\App\Http\Controllers\TransactionController::class, 'createGoatSalary'])->name('goat_salary.create');
Route::post('/goat_salary',[\App\Http\Controllers\TransactionController::class, 'storeGoatSalary'])->name('goat_salary.store');
//     Goat Salaries end }
Route::get('/goat_expenditure_create',[\App\Http\Controllers\TransactionController::class, 'createGoatExpenditure'])->name('goat_expenditure.create');
Route::post('/goat_expenditure',[\App\Http\Controllers\TransactionController::class, 'storeGoatExpenditure'])->name('goat_expenditure.store');
Route::get('/goat_expenditure/{transaction}/edit',[\App\Http\Controllers\TransactionController::class, 'editGoatExpenditure'])->name('goat_expenditure.edit');
Route::put('/goat_expenditure_update/{transaction}',[\App\Http\Controllers\TransactionController::class, 'updateGoatExpenditure'])->name('goat_expenditure.update');
Route::delete('/goat_expenditure/{transaction}',[\App\Http\Controllers\TransactionController::class, 'destroyGoatExpenditure'])->name('goat_expenditure.destroy');

//cultivation_expenditure
Route::get('/cultivation_expenditure',[\App\Http\Controllers\TransactionController::class, 'indexCultivationExpenditure'])->name('cultivation_expenditure.index');
Route::get('/cultivation_expenditure_create',[\App\Http\Controllers\TransactionController::class, 'createCultivationExpenditure'])->name('cultivation_expenditure.create');
//  {  Cultivation Salaries
Route::get('/cultivation_salary_create',[\App\Http\Controllers\TransactionController::class, 'createCultivationSalary'])->name('cultivation_salary.create');
Route::post('/cultivation_salary',[\App\Http\Controllers\TransactionController::class, 'storeCultivationSalary'])->name('cultivation_salary.store');
//     Cultivation Salaries end }
Route::post('/cultivation_expenditure',[\App\Http\Controllers\TransactionController::class, 'storeCultivationExpenditure'])->name('cultivation_expenditure.store');
Route::get('/cultivation_expenditure/{transaction}/edit',[\App\Http\Controllers\TransactionController::class, 'editCultivationExpenditure'])->name('cultivation_expenditure.edit');
Route::put('/cultivation_expenditure_update/{transaction}',[\App\Http\Controllers\TransactionController::class, 'updateCultivationExpenditure'])->name('cultivation_expenditure.update');
Route::delete('/cultivation_expenditure/{transaction}',[\App\Http\Controllers\TransactionController::class, 'destroyCultivationExpenditure'])->name('cultivation_expenditure.destroy');

//worker
Route::resource('/worker', \App\Http\Controllers\WorkerController::class);

//User
Route::resource('/user', \App\Http\Controllers\UserController::class);

