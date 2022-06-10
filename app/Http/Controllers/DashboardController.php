<?php

namespace App\Http\Controllers;

use App\Models\Cattle;
use App\Models\Pregnant;
use App\Models\Sick;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Gate;
use function Psy\debug;
use function Symfony\Component\Mime\Header\get;

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
            'eggCollected', 'eggSale','totalPurchaseHens','totalSaleHens', 'totalDieHens','totalRemainingHens','totalChicksCollected','totalDieChicks','totalchickSale','totalRemainingChicks'));
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
                                        ->orderBy('date','DESC')
                                        ->get(['quantity','date']);
        return response()->json($cowMilkCollection);
    }


}
