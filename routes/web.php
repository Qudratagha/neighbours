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

//poultry
Route::resource('/poultry', PoultryController::class);

//poultry_daily
Route::get('poultry_daily',[\App\Http\Controllers\PoultryController::class, 'indexDaily'])->name('poultry_daily.indexDaily');
Route::post('/poultry_daily',[\App\Http\Controllers\PoultryController::class, 'storeDaily'])->name('poultry_daily.storeDaily');

Route::delete('/poultry_daily/{poultry_daily}',[\App\Http\Controllers\Poultrycontroller::class,'eggdel'])->name('poultry_daily.eggdel');

//cultivation
Route::resource('/cultivation', CultivationController::class);

//cattle
Route::get('/cattle/{cattle_type}',[\App\Http\Controllers\CattleController::class,'index'])->name('cattle.index');
Route::get('/cattle/{cattle_type}/create',[\App\Http\Controllers\CattleController::class,'create'])->name('cattle.create');
Route::post('/cattle/{cattle_type}',[\App\Http\Controllers\CattleController::class,'store'])->name('cattle.store');
Route::get('/cattle/{cattle_type}/{cattle}',[\App\Http\Controllers\CattleController::class,'show'])->name('cattle.show');
Route::get('/cattle/{cattle_type}/{cattle_id}/edit',[\App\Http\Controllers\CattleController::class,'edit'])->name('cattle.edit');
Route::put('/cattle/{cattle_type}/{cattle_id}',[\App\Http\Controllers\CattleController::class,'update'])->name('cattle.update');
Route::delete('/cattle/{cattle_type}',[\App\Http\Controllers\CattleController::class,'destroy'])->name('cattle.destroy');

//cow_daily
Route::get('/cow_daily',[\App\Http\Controllers\CattleController::class, 'index'])->name('cow_daily.index');
Route::post('/cow_daily',[\App\Http\Controllers\CattleController::class, 'store'])->name('cow_daily.store');
Route::get('/cow_daily/{cow_daily}',[\App\Http\Controllers\CattleController::class, 'cowDaily'])->name('cow_daily.show');
Route::post('/cow_daily/sick',[\App\Http\Controllers\SickController::class, 'store'])->name('sick.store');
Route::post('/cow_daily/medicine',[\App\Http\Controllers\MedicinesController::class, 'store'])->name('medicine.store');
Route::post('/cow_daily/pregnant',[\App\Http\Controllers\PregnantController::class, 'store'])->name('pregnant.store');
Route::post('/cow_daily/delivery',[\App\Http\Controllers\DeliveryController::class, 'store'])->name('delivery.store');
Route::post('/cow_daily/vaccination',[\App\Http\Controllers\VaccinationController::class, 'store'])->name('vaccination.store');
Route::post('/cow_daily/insemination',[\App\Http\Controllers\InseminationController::class, 'store'])->name('insemination.store');

//goat_daily
Route::get('/goat_daily',[\App\Http\Controllers\CattleController::class, 'index'])->name('goat_daily.index');
Route::post('/goat_daily',[\App\Http\Controllers\CattleController::class, 'store'])->name('goat_daily.store');
Route::get('/goat_daily/{goat_daily}',[\App\Http\Controllers\CattleController::class, 'goatDaily'])->name('goat_daily.show');
Route::post('/goat_daily/sick',[\App\Http\Controllers\SickController::class, 'store'])->name('sick.store');
Route::post('/goat_daily/medicine',[\App\Http\Controllers\MedicinesController::class, 'store'])->name('medicine.store');
Route::post('/goat_daily/pregnant',[\App\Http\Controllers\PregnantController::class, 'store'])->name('pregnant.store');
Route::post('/goat_daily/delivery',[\App\Http\Controllers\DeliveryController::class, 'store'])->name('delivery.store');
Route::post('/goat_daily/vaccination',[\App\Http\Controllers\VaccinationController::class, 'store'])->name('vaccination.store');

//cow_sale
Route::get('/cow_sale',[\App\Http\Controllers\TransactionController::class, 'indexCowSale'])->name('cow_sale.index');
Route::post('/cow_sale',[\App\Http\Controllers\TransactionController::class, 'store'])->name('cow_sale.store');
Route::get('/cow_sale/{cow_sale}',[\App\Http\Controllers\TransactionController::class, 'showCowSale'])->name('cow_sale.show');

//milk_sale
Route::get('/milk_sale',[\App\Http\Controllers\TransactionController::class, 'indexMilkSale'])->name('milk_sale.index');
Route::post('/milk_sale',[\App\Http\Controllers\TransactionController::class, 'store'])->name('milk_sale.store');

//goat_sale
Route::get('/goat_sale',[\App\Http\Controllers\TransactionController::class, 'indexGoatSale'])->name('goat_sale.index');
Route::post('/goat_sale',[\App\Http\Controllers\TransactionController::class, 'store'])->name('goat_sale.store');
Route::get('/goat_sale/{goat_sale}',[\App\Http\Controllers\TransactionController::class, 'showCowSale'])->name('goat_sale.show');

//rate
Route::resource('/rates', \App\Http\Controllers\RateController::class);
