<?php

namespace App\Http\Controllers;

use App\Models\AccountHead;
use App\Models\Cattle;
use App\Models\Delivery;
use App\Models\Medicines;
use App\Models\Pregnant;
use App\Models\Sick;
use App\Models\Transaction;
use App\Models\Vaccination;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {

    }

    public function indexCowSale()
    {
//      $cows = Cattle::with('account_head.transactionsSubHead')->where('cattle_type_id',1)->get();
//      dd($cows);
//        $cows = Cattle::with(['account_head.transactionsSubHead' => function($query) {
//            return $query->where('account_head_id',13);
//        }])->where('cattle_type_id',1)->get();
        $cows = Cattle::where('cattle_type_id',1)->get();

        $soldCow = Transaction::where('account_head_id',13)->get();

//        dd($cows);
//        $soldcowarr = [];
//        $cow = $cows->pluck('serial_no');
//        $cowSoldSerials = $cow->all();
//
//        foreach ($cowSoldSerials as $cowSoldSerial)
//        {
//            $sub_head_id = AccountHead::where('name', "cow#$cowSoldSerial")->pluck('id')->last();
//            if ($sub_head_id != '')
//            {
//                $soldCow = Transaction::whereRaw("account_head_id = 13 AND sub_head_id = $sub_head_id")->get();
//                $soldcowarr[] =  array_push($soldcowarr ,$soldCow);
//
//            }
//            else $soldCow = [null];
//        }
//       dd($soldcowarr);
        return view('cow_sale.index', compact('cows','soldCow'));
    }

    public function indexMilkSale()
    {
        $soldMilk  = Transaction::whereRaw("account_head_id = 13 AND sub_head_id = 15")->get();
        return view('milk_sale.index',compact('soldMilk'));
    }

    public function indexGoatSale()
    {
        return view('goat_sale.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //        sale cow
        if (isset($_POST['submitCowSale']))
        {
            $cow = $request->cow_serial;
            $request['transaction_type_id'] = 1;
            $request['account_head_id'] = 13;
            $request['quantity'] = 1;
            $sub_head_id = AccountHead::where('name', "cow#$cow")->pluck('id')->last();
            $request['sub_head_id'] = $sub_head_id;
            Transaction::create($request->except('submitCowSale','cow_serial'));

            return redirect()->back()->with('message', 'Cow Sold Successfully');
        }

//        sale milk
        if (isset($_POST['submitMilkSale']))
        {
            $request['transaction_type_id'] = 1;
            $request['account_head_id'] = 13;
            $request['sub_head_id'] = 15;

            Transaction::create($request->except('submitMilkSale'));
            return redirect()->back()->with('message', 'Milk Sold Successfully');
        }
    }

    public function show(Cattle $cow_daily)
    {

    }

    public function edit(Transaction $transactions)
    {
        //
    }

    public function update(Request $request, Transaction $transactions)
    {
        //
    }

    public function destroy(Transaction $transactions)
    {
        //
    }
}
