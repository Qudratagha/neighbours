<?php
	
	use App\Http\Controllers\CattleController;
	use App\Http\Controllers\CultivationController;
	use App\Http\Controllers\DeliveryController;
	use App\Http\Controllers\InseminationController;
	use App\Http\Controllers\MedicinesController;
	use App\Http\Controllers\PoultryController;
	use App\Http\Controllers\PregnantController;
	use App\Http\Controllers\RateController;
	use App\Http\Controllers\SickController;
	use App\Http\Controllers\TransactionController;
	use App\Http\Controllers\UserController;
	use App\Http\Controllers\VaccinationController;
	use App\Http\Controllers\WorkerController;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Route;
	
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

//get Incubation Dates Ajax
	Route::get('/poultry/getIncubationDates/{date}', [PoultryController::class, 'getIncubationDates'])->name('poultry.getIncubationDates');
	Route::get('/poultry/getDateQuantity/{date}', [PoultryController::class, 'getDateQuantity'])->name('poultry.getDateQuantity');

//poultry
	Route::resource('/poultry', PoultryController::class);

//poultry_daily
	Route::get('poultry_daily', [PoultryController::class, 'indexDaily'])->name('poultry_daily.indexDaily');
	Route::post('/poultry_daily', [PoultryController::class, 'storeDaily'])->name('poultry_daily.storeDaily');
//Route::get('/poultry_daily/totalEggs', [\App\Http\Controllers\PoultryController::class,'totalEggs'])->name('poultry_daily.totalEggs');
	
	
	Route::delete('/poultry_daily/{poultry_daily}', [PoultryController::class, 'eggdel'])->name('poultry_daily.eggdel');
	Route::delete('/poultry_daily_feed/{poultry_daily}', [PoultryController::class, 'feeddel'])->name('poultry_daily.feeddel');
	Route::delete('/poultry_daily_vaccine/{poultry_daily}', [PoultryController::class, 'vaccineDelete'])->name('poultry_daily.vaccineDelete');
	Route::delete('/poultry_daily_medicine/{poultry_daily}', [PoultryController::class, 'medicineDelete'])->name('poultry_daily.medicineDelete');

//cattle
	Route::get('/cattle/{cattle_type}', [CattleController::class, 'index'])->name('cattle.index');
	Route::get('/cattle/{cattle_type}/create', [CattleController::class, 'create'])->name('cattle.create');
	Route::post('/cattle/{cattle_type}', [CattleController::class, 'store'])->name('cattle.store');
	Route::get('/cattle/{cattle_type}/{cattle}', [CattleController::class, 'show'])->name('cattle.show');
	Route::get('/cattle/{cattle_type}/{cattle_id}/edit', [CattleController::class, 'edit'])->name('cattle.edit');
	Route::put('/cattle/{cattle_type}/{cattle_id}', [CattleController::class, 'update'])->name('cattle.update');
	Route::delete('/cattle/{cattle_type}/{cattle}', [CattleController::class, 'destroy'])->name('cattle.destroy');

//cow_daily
	Route::get('/cow_daily', [CattleController::class, 'index'])->name('cow_daily.index');
	Route::post('/cow_daily', [CattleController::class, 'store'])->name('cow_daily.store');
	Route::get('/cow_daily/{cow_daily}', [CattleController::class, 'cowDaily'])->name('cow_daily.show');
	Route::post('/cow_daily/sick', [SickController::class, 'store'])->name('sickCow.store');
	Route::post('/cow_daily/medicine', [MedicinesController::class, 'store'])->name('medicineCow.store');
	Route::post('/cow_daily/pregnant', [PregnantController::class, 'store'])->name('pregnantCow.store');
	Route::post('/cow_daily/delivery', [DeliveryController::class, 'store'])->name('deliveryCow.store');
	Route::post('/cow_daily/vaccination', [VaccinationController::class, 'store'])->name('vaccinationCow.store');
	Route::post('/cow_daily/insemination', [InseminationController::class, 'store'])->name('inseminationCow.store');
	Route::delete('/cow_daily/{transaction}', [TransactionController::class, 'destroy'])->name('cow_daily.destroy');
	Route::delete('/cow_daily_sick/{sick}', [SickController::class, 'destroy'])->name('sickCow.destroy');
	Route::delete('/cow_daily_medicine/{medicine}', [MedicinesController::class, 'destroy'])->name('medicineCow.destroy');
	Route::delete('/cow_daily_insemination/{insemination}', [InseminationController::class, 'destroy'])->name('inseminationCow.destroy');
	Route::delete('/cow_daily_pregnant/{pregnant}', [PregnantController::class, 'destroy'])->name('pregnantCow.destroy');
	Route::delete('/cow_daily_delivery/{delivery}', [DeliveryController::class, 'destroy'])->name('deliveryCow.destroy');
	Route::delete('/cow_daily_vaccination/{vaccination}', [VaccinationController::class, 'destroy'])->name('vaccinationCow.destroy');

//goat_daily
	Route::get('/goat_daily', [CattleController::class, 'index'])->name('goat_daily.index');
	Route::post('/goat_daily', [CattleController::class, 'store'])->name('goat_daily.store');
	Route::get('/goat_daily/{goat_daily}', [CattleController::class, 'goatDaily'])->name('goat_daily.show');
	Route::post('/goat_daily/sick', [SickController::class, 'store'])->name('sick.store');
	Route::post('/goat_daily/medicine', [MedicinesController::class, 'store'])->name('medicine.store');
	Route::post('/goat_daily/pregnant', [PregnantController::class, 'store'])->name('pregnant.store');
	Route::post('/goat_daily/delivery', [DeliveryController::class, 'store'])->name('delivery.store');
	Route::post('/goat_daily/vaccination', [VaccinationController::class, 'store'])->name('vaccination.store');
	Route::delete('/goat_daily_sick/{sick}', [SickController::class, 'destroy'])->name('sickGoat.destroy');
	Route::delete('/goat_daily_medicine/{medicine}', [MedicinesController::class, 'destroy'])->name('medicineGoat.destroy');
	Route::delete('/goat_daily_insemination/{insemination}', [InseminationController::class, 'destroy'])->name('inseminationGoat.destroy');
	Route::delete('/goat_daily_pregnant/{pregnant}', [PregnantController::class, 'destroy'])->name('pregnantGoat.destroy');
	Route::delete('/goat_daily_delivery/{delivery}', [DeliveryController::class, 'destroy'])->name('deliveryGoat.destroy');
	Route::delete('/goat_daily_vaccination/{vaccination}', [VaccinationController::class, 'destroy'])->name('vaccinationGoat.destroy');

//cow_sale
	Route::get('/cow_sale', [TransactionController::class, 'indexCowSale'])->name('cow_sale.index');
	Route::post('/cow_sale', [TransactionController::class, 'store'])->name('cow_sale.store');
	Route::get('/cow_sale/{cow_sale}', [TransactionController::class, 'showCowSale'])->name('cow_sale.show');

//Cow Feed
	Route::get('cow_feed', [App\Http\Controllers\FeedController::class, 'cowIndex'])->name('cow_feed.index');
	Route::post('cow_feed_store', [App\Http\Controllers\FeedController::class, 'store'])->name('cow_feed.store');
	Route::delete('cow_feed_delete/{cow_feed_id}', [App\Http\Controllers\FeedController::class, 'destroy'])->name('cow_feed.destroy');

//milk_collection
	Route::get('milk_collection', [CattleController::class, 'milkCollection'])->name('milk_collection.index');
	Route::post('milk_collection_store', [CattleController::class, 'store'])->name('milk_collection.store');
	Route::delete('milk_collection_delete/{milk_collection_id}', [TransactionController::class, 'destroy'])->name('milk_collection.destroy');

//Goat Feed
	Route::get('goat_feed', [App\Http\Controllers\FeedController::class, 'goatIndex'])->name('goat_feed.index');
	Route::post('goat_feed_store', [App\Http\Controllers\FeedController::class, 'store'])->name('goat_feed.store');
	Route::delete('goat_feed_delete/{goat_feed_id}', [App\Http\Controllers\FeedController::class, 'destroy'])->name('goat_feed.destroy');

//milk_sale
	Route::get('/milk_sale', [TransactionController::class, 'indexMilkSale'])->name('milk_sale.index');
	Route::post('/milk_sale', [TransactionController::class, 'store'])->name('milk_sale.store');

//goat_sale
	Route::get('/goat_sale', [TransactionController::class, 'indexGoatSale'])->name('goat_sale.index');
	Route::post('/goat_sale', [TransactionController::class, 'store'])->name('goat_sale.store');
	Route::get('/goat_sale/{goat_sale}', [TransactionController::class, 'showCowSale'])->name('goat_sale.show');

//rate
	Route::resource('/rates', RateController::class);

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
	Route::get('/expenditure', [TransactionController::class, 'indexExpenditure'])->name('expenditure.index');
	Route::get('/expenditure_create', [TransactionController::class, 'createExpenditure'])->name('expenditure.create');
	Route::post('/expenditure', [TransactionController::class, 'storeExpenditure'])->name('expenditure.store');
	Route::get('/expenditure/{transaction}/edit', [TransactionController::class, 'editExpenditure'])->name('expenditure.edit');
	Route::put('/expenditure_update/{transaction}', [TransactionController::class, 'updateExpenditure'])->name('expenditure.update');
	Route::delete('/expenditure/{transaction}', [TransactionController::class, 'destroyExpenditure'])->name('expenditure.destroy');

//cow_expenditure
	Route::get('/cow_expenditure', [TransactionController::class, 'indexCowExpenditure'])->name('cow_expenditure.index');
//  {  Cow Purchase
	Route::get('/cow_expenditure_purchase_create', [CattleController::class, 'createCowExpenditurePurchase'])->name('cow_expenditure_purchase.create');
	Route::post('/cow_expenditure_purchase', [CattleController::class, 'store'])->name('cow_expenditure_purchase.store');
//     Cow Purchase end }
//  {  Cow Salaries
	Route::get('/cow_salary_create', [TransactionController::class, 'createCowSalary'])->name('cow_salary.create');
	Route::post('/cow_salary', [TransactionController::class, 'storeCowSalary'])->name('cow_salary.store');
//     Cow Salaries end }
	Route::get('/cow_expenditure_create', [TransactionController::class, 'createCowExpenditure'])->name('cow_expenditure.create');
	Route::post('/cow_expenditure', [TransactionController::class, 'storeCowExpenditure'])->name('cow_expenditure.store');
	Route::get('/cow_expenditure/{transaction}/edit', [TransactionController::class, 'editCowExpenditure'])->name('cow_expenditure.edit');
	Route::put('/cow_expenditure_update/{transaction}', [TransactionController::class, 'updateCowExpenditure'])->name('cow_expenditure.update');
	Route::delete('/cow_expenditure/{transaction}', [TransactionController::class, 'destroyCowExpenditure'])->name('cow_expenditure.destroy');

//poultry_expenditure
	Route::get('/poultry_expenditure', [TransactionController::class, 'indexPoultryExpenditure'])->name('poultry_expenditure.index');
	Route::get('/poultry_expenditure_create', [TransactionController::class, 'createPoultryExpenditure'])->name('poultry_expenditure.create');
//  {  Poultry Salaries
	Route::get('/poultry_salary_create', [TransactionController::class, 'createPoultrySalary'])->name('poultry_salary.create');
	Route::post('/poultry_salary', [TransactionController::class, 'storePoultrySalary'])->name('poultry_salary.store');
//     Poultry Salaries end }
	Route::post('/poultry_expenditure', [TransactionController::class, 'storePoultryExpenditure'])->name('poultry_expenditure.store');
	Route::get('/poultry_expenditure/{transaction}/edit', [TransactionController::class, 'editPoultryExpenditure'])->name('poultry_expenditure.edit');
	Route::put('/poultry_expenditure_update/{transaction}', [TransactionController::class, 'updatePoultryExpenditure'])->name('poultry_expenditure.update');
	Route::delete('/poultry_expenditure/{transaction}', [TransactionController::class, 'destroyPoultryExpenditure'])->name('poultry_expenditure.destroy');

//goat_expenditure
	Route::get('/goat_expenditure', [TransactionController::class, 'indexGoatExpenditure'])->name('goat_expenditure.index');
//  {Goat Purchase
	Route::get('/goat_expenditure_purchase_create', [CattleController::class, 'createGoatExpenditurePurchase'])->name('goat_expenditure_purchase.create');
	Route::post('/goat_expenditure_purchase', [CattleController::class, 'store'])->name('goat_expenditure_purchase.store');
//     Goat Purchase end }
//  {Goat Salaries
	Route::get('/goat_salary_create', [TransactionController::class, 'createGoatSalary'])->name('goat_salary.create');
	Route::post('/goat_salary', [TransactionController::class, 'storeGoatSalary'])->name('goat_salary.store');
//     Goat Salaries end }
	Route::get('/goat_expenditure_create', [TransactionController::class, 'createGoatExpenditure'])->name('goat_expenditure.create');
	Route::post('/goat_expenditure', [TransactionController::class, 'storeGoatExpenditure'])->name('goat_expenditure.store');
	Route::get('/goat_expenditure/{transaction}/edit', [TransactionController::class, 'editGoatExpenditure'])->name('goat_expenditure.edit');
	Route::put('/goat_expenditure_update/{transaction}', [TransactionController::class, 'updateGoatExpenditure'])->name('goat_expenditure.update');
	Route::delete('/goat_expenditure/{transaction}', [TransactionController::class, 'destroyGoatExpenditure'])->name('goat_expenditure.destroy');

//cultivation_expenditure
	Route::get('/cultivation_expenditure', [TransactionController::class, 'indexCultivationExpenditure'])->name('cultivation_expenditure.index');
	Route::get('/cultivation_expenditure_create', [TransactionController::class, 'createCultivationExpenditure'])->name('cultivation_expenditure.create');

//  {  Cultivation Salaries
	Route::get('/cultivation_salary_create', [TransactionController::class, 'createCultivationSalary'])->name('cultivation_salary.create');
	Route::post('/cultivation_salary', [TransactionController::class, 'storeCultivationSalary'])->name('cultivation_salary.store');

//     Cultivation Salaries end }
	Route::post('/cultivation_expenditure', [TransactionController::class, 'storeCultivationExpenditure'])->name('cultivation_expenditure.store');
	Route::get('/cultivation_expenditure/{transaction}/edit', [TransactionController::class, 'editCultivationExpenditure'])->name('cultivation_expenditure.edit');
	Route::put('/cultivation_expenditure_update/{transaction}', [TransactionController::class, 'updateCultivationExpenditure'])->name('cultivation_expenditure.update');
	Route::delete('/cultivation_expenditure/{transaction}', [TransactionController::class, 'destroyCultivationExpenditure'])->name('cultivation_expenditure.destroy');

//worker
	Route::resource('/worker', WorkerController::class);

//User
	Route::resource('/user', UserController::class);

