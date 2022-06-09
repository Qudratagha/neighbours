<?php

namespace App\Http\Controllers;

use App\Models\Cattle;
use App\Models\Cultivation;
use App\Models\Pregnant;
use App\Models\Sick;
use App\Models\Transaction;
use Carbon\Traits\Localization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
//use App\Models\Pregnant;
//use App\Models\Sick;
//use App\Models\Transaction;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.gates');
    }
    public function index()
    {
        abort_if(Gate::denies('dashboard-read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //Goats Details
        $allGoats = Cattle::where('cattle_type_id', 2)->where('saleStatus', 0)->where('dead_date', Null)->count();
        $maleGoats= Cattle::where('cattle_type_id', 2)->where('saleStatus', 0)->where('dead_date', Null)->where('gender', 1)->count();
        $femaleGoats = Cattle::where('cattle_type_id', 2)->where('saleStatus', 0)->where('dead_date', Null)->where('gender', 0)->count();
        $pregnantGoats = Pregnant::with('cattle')->count();
        $sickGoats = Sick::with('cattle')->count();
        $soldGoats = Cattle::where('cattle_type_id', 2)->where('saleStatus', 1)->count();
        $dryGoats = Cattle::where('cattle_type_id', 2)->where('gender', 0)->whereNotNull('dry_date')->count();
        $deadGoats = Cattle::where('cattle_type_id', 2)->whereNotNull('dead_date')->count();

        //Sheep Details
        $allSheeps = Cattle::where('cattle_type_id', 3)->where('saleStatus', 0)->where('dead_date', Null)->count();
        $maleSheeps= Cattle::where('cattle_type_id', 3)->where('saleStatus', 0)->where('dead_date', Null)->where('gender', 1)->count();
        $femaleSheeps = Cattle::where('cattle_type_id', 3)->where('saleStatus', 0)->where('dead_date', Null)->where('gender', 0)->count();
        $pregnantSheeps = Pregnant::with('cattle')->count();
        $sickSheeps = Sick::with('cattle')->count();
        $soldSheeps = Cattle::where('cattle_type_id', 3)->where('saleStatus', 1)->count();
        $drySheeps = Cattle::where('cattle_type_id', 3)->where('gender', 0)->whereNotNull('dry_date')->count();
        $deadSheeps = Cattle::where('cattle_type_id', 3)->whereNotNull('dead_date')->count();

        //Graph
        $transactions = Transaction::where('account_head_id', 7)->get('date');
        $graphPurchaseGoats = Transaction::where('transaction_type_id', 2)->where('account_head_id', 7)->get('quantity');
//        dd($graphPurchaseGoats);
        $graphSoldGoats = Transaction::where('transaction_type_id', 1)->where('account_head_id', 7)->get('quantity');

        $sheepTransaction = Transaction::where('account_head_id', 7)->get('date');

        //Cultivation Wheat
        $wheatAreaCultivated = Cultivation::where('cultivation_type_id', 1)->sum('total_area_cultivated');
        $wheatCollected = Transaction::where('transaction_type_id', 3)->where('sub_head_id', 73)->where('sub_head_id',73)->sum('quantity');
        $wheatSold = Transaction::where('transaction_type_id', 1)->where('account_head_id', 13)->where('sub_head_id', 76)->whereNotNull('amount')->sum('quantity');
//        dd($wheatSold);

        //Cultivation Corn
        $cornAreaCultivated = Cultivation::where('cultivation_type_id', 2)->sum('total_area_cultivated');
        $cornCollected = Transaction::where('transaction_type_id', 3)->where('sub_head_id', 74)->where('amount', NULL)->sum('quantity');
        $cornSold = Transaction::where('transaction_type_id', 1)->where('account_head_id',13)->where('sub_head_id', 77)->whereNotNull('amount')->sum('quantity');

        //Cultivation Cucumber
        $cucumberAreaCultivated = Cultivation::where('cultivation_type_id', 3)->sum('total_area_cultivated');
        $cucumberCollected = Transaction::where('transaction_type_id', 3)->where('sub_head_id', 75)->sum('quantity');
        $cucumberSold = Transaction::where('transaction_type_id', 1)->where('account_head_id', 13)->where('sub_head_id', 78)->whereNotNull('amount')->sum('quantity');


        $eggCollected =  \App\Models\Poultry::where('poultry_type_id',3)
            ->where('poultry_status_id',4)
            ->where('account_head_id', 8)
            ->groupBy('created_at')
            ->selectRaw('SUM(quantity) AS quantity,created_at')
            ->get();
        $eggSale =  \App\Models\Transaction::where('transaction_type_id',1)
            ->where('account_head_id',8)
            ->where('sub_head_id', 19)
            ->groupBy('date')
            ->selectRaw('SUM(quantity) AS totalQuantity,date')
            ->get();

        $totalPurchaseHens = \App\Models\Poultry:: totalPurchaseHen();
        $totalSaleHens = \App\Models\Poultry:: totalSaleHen();
        $totalDieHens = \App\Models\Poultry:: totalDieHen();
        $totalRemainingHens = \App\Models\Poultry:: purchaseMsaleMdie();

        $totalChicksCollected = \App\Models\Poultry:: totalChicksCollected();
        $totalDieChicks = \App\Models\Poultry:: totalDieChicks();
        $totalchickSale = \App\Models\Poultry:: totalchickSale();
        $totalRemainingChicks = \App\Models\Poultry:: totalRemainingChicks();


        $cows = Cattle::cows()->count();
        $cowSerials = Cattle::cows()->where('dry_date',null)->where('dead_date',null)->where('saleStatus',0)->get();
        $milkingCows = Transaction::milkingCows()->count();
        $pregnantCows = Pregnant::pregnantCows();
        $dryCows = Cattle::cows()->whereNotNull('dry_date')->count();
        $deadCows = Cattle::cows()->whereNotNull('dead_date')->count();
        $sickCows = Sick::sickCows();
        $soldCows = Transaction::soldCows();
        $totalCowExpenditure = Transaction::totalExpenditure();
        $totalCowIncome = Transaction::totalIncome();

        return view('/dashboard.index',compact('cowSerials','cows','milkingCows','pregnantCows','dryCows','deadCows','sickCows','soldCows','totalCowExpenditure','totalCowIncome',
            'eggCollected', 'eggSale','totalPurchaseHens','totalSaleHens', 'totalDieHens','totalRemainingHens','totalChicksCollected','totalDieChicks','totalchickSale','totalRemainingChicks','transactions','allGoats', 'maleGoats', 'femaleGoats', 'pregnantGoats', 'sickGoats', 'soldGoats', 'dryGoats', 'deadGoats', 'allSheeps', 'maleSheeps', 'femaleSheeps', 'pregnantSheeps', 'sickSheeps', 'soldSheeps', 'drySheeps', 'deadSheeps', 'wheatAreaCultivated', 'wheatCollected', 'cornAreaCultivated', 'cornCollected', 'cucumberAreaCultivated', 'cucumberCollected', 'graphPurchaseGoats', 'graphSoldGoats', 'wheatSold', 'cornSold', 'cucumberSold'));
    }

    public function getSingleCowMilkCollection($account_head_id)
    {
        $date = \Carbon\Carbon::now()->subDays(30);
        $year = \Carbon\Carbon::now()->year;
        $cowMilkCollection = Transaction::where('transaction_type_id',3)
                                        ->where('account_head_id',22)
                                        ->where('sub_head_id',$account_head_id)
                                        ->where('date','>=',$date)
                                        ->where('date','>=',$year)
                                        ->orderBy('date','ASC')
                                        ->get(['quantity','date']);
        return response()->json($cowMilkCollection);
    }

    public function getMilkCollectionSaleData($getDatesCowMilkCollection)
    {
        dd($getDatesCowMilkCollection);
        return response()->json($getDatesCowMilkCollection);
    }

}
