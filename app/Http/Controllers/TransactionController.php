<?php

namespace App\Http\Controllers;

use App\Models\AccountHead;
use App\Models\Cattle;
use App\Models\Delivery;
use App\Models\Insemination;
use App\Models\Medicines;
use App\Models\Pregnant;
use App\Models\Rate;
use App\Models\Sick;
use App\Models\Transaction;
use App\Models\Vaccination;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.gates');
    }

    public function index()
    {

    }

    public function indexCowSale()
    {
//      $cows = Cattle::with('account_head.transactionsSubHead')->where('cattle_type_id',1)->get();
//      dd($cows);
//        $cows = Cattle::with(['account_head.transactionSubHeads' => function($query) {
//            return $query->where('account_head_id',17);
//        }])->where('cattle_type_id',1)->get();
        abort_if(Gate::denies('cow-read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $cows = Cattle::where('cattle_type_id',1)->where('saleStatus',0)->get();
        $soldCow = Transaction::where('account_head_id',16)->where('transaction_type_id',1)->get();
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
        return view('cow_sale.index', compact('cows', 'soldCow'));
    }

    public function indexMilkSale()
    {
        abort_if(Gate::denies("cow-read"), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $milkStock = Transaction::milkStock();
        $soldMilk  = Transaction::whereRaw("account_head_id = 15 AND sub_head_id = 15")->get();
        return view('milk_sale.index',compact('soldMilk'));
    }

    public function indexGoatSale()
    {

        abort_if(Gate::denies("goat-read"), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $goats = Cattle::goats()->where('saleStatus', 0)->get();
        $transaction = Transaction::where('sub_head_id', 18)->where('account_head_id', 7)->where('transaction_type_id', 1)->get();
        return view('goat_sale.index', compact('goats','transaction'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

        //        sale cow
        if (isset($_POST['submitCowSale']))
        {
            $cow = $request->cow_serial;
            $request['transaction_type_id'] = 1;
            $request['account_head_id'] = 16;
            $request['quantity'] = 1;
            $sub_head_id = AccountHead::where('name', "cow#$cow")->pluck('id')->last();
            $request['sub_head_id'] = $sub_head_id;
            $request['saleStatus'] = 1;
            Cattle::where('serial_no',$request->cow_serial)->update(['saleStatus'=>1,'date'=>now()]);
            Transaction::create($request->except('submitCowSale','cow_serial','saleStatus'));

            return redirect()->back()->with('message', 'Cow Sold Successfully');
        }

//        sale milk
        if (isset($_POST['submitMilkSale']))
        {
            $quantity = $request->quantity;
            $rate = Rate::where('name','milk')->where('status',1)->get('rate')->last();
            if (!$rate){
                return redirect()->back()->with('errorMessage', 'Please Add Milk Rate First');
            }
            $rate = ($rate->rate)*($quantity);

            $request['amount'] = $rate;
            $request['transaction_type_id'] = 1;
            $request['account_head_id'] = 15;
            $request['sub_head_id'] = 15;

            Transaction::create($request->except('submitMilkSale'));
            return redirect()->back()->with('message', 'Milk Sold Successful');

        }

        //Sale Goat
        if (isset($_POST['submitGoatSale']))
        {
            Cattle::where('serial_no', $request->quantity)->update(['saleStatus'=> 1, 'date'=> now()]);
            $request['transaction_type_id'] = 1;
            $request['account_head_id'] = 7;
            $all_Qtys = $request->quantity;
//            $stringQuantity = collect($all_Qtys)->implode("-");
            $totalQuantity = count($all_Qtys);
            $request['quantity'] = $totalQuantity;
            $request['saleStatus'] = 1;
            $request['sub_head_id'] = 18;
            Transaction::create($request->except('submitGoatSale', 'saleStatus'));

            return redirect()->back()->with('message', 'Goat Sold Successfully');
        }
    }

    public function show(Cattle $cow_daily)
    {

    }

    public function edit(Transaction $transaction)
    {

    }

    public function update(Request $request, Transaction $cow_daily)
    {

    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->back()->with('errorMessage','Milk Entry Deleted');
    }
}
