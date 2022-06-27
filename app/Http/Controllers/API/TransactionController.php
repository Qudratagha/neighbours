<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AccountHead;
use App\Models\Cattle;
use App\Models\Rate;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    public function index()
    {
        //
    }

    public function indexCowSale()
    {
        abort_if(Gate::denies('cow-read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $cows = Cattle::cows()->where('dead_date', null)->where('saleStatus', 0)->get();
        $soldCow = Transaction::where('account_head_id', 16)->where('transaction_type_id', 1)->get();
        return response()->json(['All Cows' => $cows, 'Sold Cows' => $soldCow], 200);
    }

    public function indexMilkSale()
    {
        abort_if(Gate::denies("cow-read"), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $soldMilk  = Transaction::whereRaw("account_head_id = 14 AND sub_head_id = 14")->get();
        return response()->json(['soldMilk'=>$soldMilk]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //sale cow
        if (isset($_POST['submitCowSale'])) {
            $cow = $request->cow_serial;
            $request['transaction_type_id'] = 1;
            $request['account_head_id'] = 15;
            $request['quantity'] = 1;
            $sub_head_id = AccountHead::where('name', "cow#$cow")->pluck('id')->last();
            $request['sub_head_id'] = $sub_head_id;
            $request['saleStatus'] = 1;
            Cattle::where('serial_no', $request->cow_serial)->update(['saleStatus' => 1, 'date' => now()]);
            Transaction::create($request->except('submitCowSale', 'cow_serial', 'saleStatus'));
            return response()->json('Cow Sold Successfully', 200);
        }

        //sale milk
        if (isset($_POST['submitMilkSale']))
        {
            $quantity = $request->quantity;
            $rate = Rate::where('name','milk')->where('status',1)->get('rate')->last();
            if (!$rate){
                return response()->json('Please Add Milk Rate First',200);
            }
            $rate = ($rate->rate)*($quantity);
            $request['amount'] = $rate;
            $request['transaction_type_id'] = 1;
            $request['account_head_id'] = 14;
            $request['sub_head_id'] = 14;
            Transaction::create($request->except('submitMilkSale'));
            return response()->json('Milk Sold Successful',200);

        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
