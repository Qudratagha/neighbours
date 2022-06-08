<?php

namespace App\Http\Controllers;

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

        $eggCollected =  \App\Models\Poultry::where('poultry_type_id',3)->where('poultry_status_id',4)->distinct('created_at')->get();
        $eggSale =  \App\Models\Transaction::where('transaction_type_id',1)->where('account_head_id',8)->where('sub_head_id', 19)->get();
//        dd($eggCollected);
        return view('/dashboard.index', compact('eggCollected', 'eggSale'));
    }

}
