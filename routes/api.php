<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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



Route::post('login',  [AuthController::class,'login']);

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::post ('refresh', 'AuthController@refresh');
    Route::post('logout', [AuthController::class,'logout']);
    Route::get('me', [AuthController::class,'me']);
    Route::get('meAuth', 'AuthController@meAuth');

    //cattle
    Route::get('/cattle/{cattle_type}',[\App\Http\Controllers\API\CattleController::class,'index']);
    Route::get('/cattle/{cattle_type}/create',[\App\Http\Controllers\API\CattleController::class,'create']);
    Route::post('/cattle/{cattle_type}',[\App\Http\Controllers\API\CattleController::class,'store']);

    //poultry
    Route::get('/poultry',[\App\Http\Controllers\API\PoultryController::class,'poultryIndex']);
    Route::post('/poultry',[\App\Http\Controllers\API\PoultryController::class, 'poultryStore']);

    Route::get('/poultry/getDateQuantity/{date}', [\App\Http\Controllers\PoultryController::class,'getDateQuantity'])->name('poultry.getDateQuantity');

    Route::get('/poultry_daily',[\App\Http\Controllers\API\PoultryController::class, 'poultryDailyIndex']);
    Route::post('/poultry_daily',[\App\Http\Controllers\API\PoultryController::class, 'poultryDailyStore']);
    Route::get('/poultry_expenditure',[\App\Http\Controllers\API\PoultryController::class,'poultryExpenditureIndex']);
    Route::post('/poultry_expenditure_store',[\App\Http\Controllers\API\PoultryController::class,'poultryExpenditureStore']);

});
