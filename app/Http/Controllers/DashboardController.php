<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

//        $eggCollected =  DB::select("SELECT
//                                            SUM(quantity)as quantity,
//                                            poultry_type_id,
//                                            poultry_status_id,
//                                            account_head_id,
//                                            created_at
//                                        FROM
//                                            `poultries`
//                                        WHERE
//                                            poultry_type_id = 3
//                                            AND poultry_status_id = 4
//                                            AND account_head_id = 8
//                                            GROUP BY
//                                            created_at");


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

//        dd($eggSale);

        $totalPurchaseHens = \App\Models\Poultry:: totalPurchaseHen();
        $totalSaleHens = \App\Models\Poultry:: totalSaleHen();
        $totalDieHens = \App\Models\Poultry:: totalDieHen();
        $totalRemainingHens = \App\Models\Poultry:: purchaseMsaleMdie();

        $totalChicksCollected = \App\Models\Poultry:: totalChicksCollected();
        $totalDieChicks = \App\Models\Poultry:: totalDieChicks();
        $totalchickSale = \App\Models\Poultry:: totalchickSale();
        $totalRemainingChicks = \App\Models\Poultry:: totalRemainingChicks();


        return view('/dashboard.index', compact('eggCollected', 'eggSale','totalPurchaseHens','totalSaleHens', 'totalDieHens','totalRemainingHens','totalChicksCollected','totalDieChicks','totalchickSale','totalRemainingChicks'));
    }

}
