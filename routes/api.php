<?php

use App\Http\Controllers\API\CattleController;
use App\Http\Controllers\API\DeliveryController;
use App\Http\Controllers\API\InseminationController;
use App\Http\Controllers\API\MedicinesController;
use App\Http\Controllers\API\PregnantController;
use App\Http\Controllers\API\SickController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\VaccinationController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me']);
    Route::get('meAuth', [AuthController::class, 'meAuth']);

    //cattle
    Route::get('/cattle/{cattle_type}',[\App\Http\Controllers\API\CattleController::class,'index']);
    Route::get('/cattle/{cattle_type}/create',[\App\Http\Controllers\API\CattleController::class,'create']);
    Route::post('/cattle/{cattle_type}',[\App\Http\Controllers\API\CattleController::class,'store']);
    
    //cow_daily
    Route::get('/cow_daily', [CattleController::class, 'index']);
    Route::post('/cow_daily', [CattleController::class, 'store']);
    Route::get('/cow_daily/{cow_daily}', [CattleController::class, 'cowDaily']);
    Route::post('/cow_daily/sick', [SickController::class, 'store']);
    Route::post('/cow_daily/medicine', [MedicinesController::class, 'store']);
    Route::post('/cow_daily/pregnant', [PregnantController::class, 'store']);
    Route::post('/cow_daily/delivery', [DeliveryController::class, 'store']);
    Route::post('/cow_daily/vaccination', [VaccinationController::class, 'store']);
    Route::post('/cow_daily/insemination', [InseminationController::class, 'store']);
    
    //poultry
    Route::get('/poultry',[\App\Http\Controllers\API\PoultryController::class,'poultryIndex']);
    Route::post('/poultry',[\App\Http\Controllers\API\PoultryController::class, 'poultryStore']);
    Route::get('/poultry/getDateQuantity/{date}', [\App\Http\Controllers\PoultryController::class,'getDateQuantity'])->name('poultry.getDateQuantity');
    Route::get('/poultry_daily',[\App\Http\Controllers\API\PoultryController::class, 'poultryDailyIndex']);
    Route::post('/poultry_daily',[\App\Http\Controllers\API\PoultryController::class, 'poultryDailyStore']);
    Route::get('/poultry_expenditure',[\App\Http\Controllers\API\PoultryController::class,'poultryExpenditureIndex']);
    Route::post('/poultry_expenditure_store',[\App\Http\Controllers\API\PoultryController::class,'poultryExpenditureStore']);
	
	
	//goat_daily
	Route::get('/goat_daily', [CattleController::class, 'index']);
	Route::post('/goat_daily', [CattleController::class, 'store']);
	Route::get('/goat_daily/{goat_daily}', [CattleController::class, 'goatDaily']);
	Route::post('/goat_daily/sick', [SickController::class, 'store']);
	Route::post('/goat_daily/medicine', [MedicinesController::class, 'store']);
	Route::post('/goat_daily/pregnant', [PregnantController::class, 'store']);
	Route::post('/goat_daily/delivery', [DeliveryController::class, 'store']);
	Route::post('/goat_daily/vaccination', [VaccinationController::class, 'store']);
	
	//goat_sale
	Route::get('/goat_sale', [TransactionController::class, 'indexGoatSale']);
	Route::post('/goat_sale', [TransactionController::class, 'store']);
	
	//cow_sale
	Route::get('/cow_sale', [TransactionController::class, 'indexCowSale']);
	Route::post('/cow_sale', [TransactionController::class, 'store']);
	
	//milk_sale
	Route::get('/milk_sale', [TransactionController::class, 'indexMilkSale']);
	Route::post('/milk_sale', [TransactionController::class, 'store']);
});
