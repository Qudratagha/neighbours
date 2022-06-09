<?php

namespace App\Http\Controllers;

use App\Models\Cattle;
use App\Models\Pregnant;
use App\Models\Sick;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $cows = Cattle::cows()->count();
        $cowSerials = Cattle::cows()->where('dry_date',null)->where('dead_date',null)->where('saleStatus',0)->get();
        $milkingCows = Transaction::milkingCows()->count();
        $pregnantCows = Pregnant::pregnantCows();
        $dryCows = Cattle::cows()->whereNotNull('dry_date')->count();
        $deadCows = Cattle::cows()->whereNotNull('dead_date')->count();
        $sickCows = Sick::sickCows();
        $soldCows = Transaction::soldCows();
        $totalExpenditure = Transaction::totalExpenditure();
        $totalIncome = Transaction::totalIncome();

        return view('/dashboard.index',compact('cowSerials','cows','milkingCows','pregnantCows','dryCows','deadCows','sickCows','soldCows','totalExpenditure','totalIncome'));
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
