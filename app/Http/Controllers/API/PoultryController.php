<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Feed;
use App\Models\Medicines;
use App\Models\Poultry;
use App\Models\PoultryStatus;
use App\Models\PoultryType;
use App\Models\Transaction;
use App\Models\Vaccination;
use Illuminate\Http\Request;

class PoultryController extends Controller
{
    public function poultryIndex()
    {
        $eggincdates = Poultry::where('status', 3)->orderBy('id','desc')->distinct('created_at')->pluck('created_at');
        $eggincquans =  Poultry::where('quantity','>',0)->get()->pluck('quantity');
        $poultry_types = PoultryType::all();
        $poultry_statuses = PoultryStatus::all();
        $poultries = Poultry::orderBy('id','desc')->get();
        return response()->json([$poultries,$eggincdates,$eggincquans,$poultry_types,$poultry_statuses]);
    }
    public function getDateQuantity($date)
    {
        $incDateMcollDate = 0;
        $incubationDate = Poultry::where('created_at',$date)
            ->where('poultry_type_id', 3)
            ->where('poultry_status_id', 3)
            ->pluck('created_at')->last();
        $incubationDatetotalQty = Poultry::where('created_at',$incubationDate)
            ->where('poultry_type_id', 3)
            ->where('poultry_status_id', 3)
            ->sum('quantity');
        $collectionDatetotalQty = Poultry::where('collection_date',$incubationDate)
            ->where('poultry_type_id', 2)
            ->where('poultry_status_id', 4)
            ->sum('quantity');
        $incDateMcollDate = $incubationDatetotalQty - $collectionDatetotalQty;
        return response()->json($incDateMcollDate);
    }
    public function poultryStore(Request $request)
    {
        $request['account_head_id'] = 8;
        $pti =  $request->poultry_type_id;
        $psi =  $request->poultry_status_id;
        $request['remaining_quantity'] = 0;
        $request['status'] = $psi;
        if ($request['quantity'] == 0)
        {
//            return redirect(route('poultry.index'))->with('errorMessage', 'Your quantity must be greater than zero ');
            return response()->json(['Message' => 'Quantity is 0'],400);

        }
        else
        {
            $poultry = Poultry::create($request->all());
//            return redirect(route('poultry.index'))->with('message', ' Entry Created');
            return response()->json($poultry);
        }

    }
    public function poultryDailyIndex()
    {
        $eggscollected = Poultry::where('poultry_type_id',3)->sum('quantity');
        $totalQty = $eggscollected / 12;
        $qtyindzn = floor($totalQty);
        $eggSale = Transaction::where('transaction_type_id', 1 )->where('account_head_id', 8 )->where('sub_head_id', 19 )->get();
        $henSale = Transaction::where('transaction_type_id', 1 )->where('account_head_id', 8 )->where('sub_head_id', 20 )->get();
        $chickSale = Transaction::where('transaction_type_id', 1 )->where('account_head_id', 8 )->where('sub_head_id', 21 )->get();
        $poultryFeedPurchase = Transaction::where('transaction_type_id', 2 )->where('account_head_id', 8 )->where('sub_head_id', 54 )->get();
        $poultryFeed = Feed::where('status', 1 )->where('cattle_type', 1 )->get();
        $poultryVaccine = Vaccination::where('sub_head_id', 57 )->get();
        $poultryMedicine = Medicines::where('sub_head_id', 55 )->get();
        return response()->json([$eggSale,$henSale,$chickSale,$poultryFeedPurchase,$poultryFeed,$poultryVaccine,$poultryMedicine], 200);
    }
    public function poultryDailyStore(Request $request)
    {
        $accountHeadData = [];
        if (isset($_POST['submitEgg']))
        {
            $quantity = $request->quantity;
            $rate = \App\Models\Rate::where('name','egg')->where('status',1)->get('rate')->last();
            if (!$rate)
            {
                return response()->json(['Message' => 'Please Add Egg\'s Rate First'],400);
//                return redirect()->back()->with('errorMessage', 'Please Add Egg\'s Rate First');
            }
            $request['quantity'] = $quantity*12;
            $rate = ($rate->rate)*($quantity);
            $request['amount'] = $rate ;
            $request['transaction_type_id'] = 1;
            $request['account_head_id'] = 8;
            $request['sub_head_id'] = 19;
            Transaction::Create($request->except('submitEgg'));
            return response()->json(['message' => 'EggsSold'],200);
//            return redirect()->back()->with('message', 'Eggs Sold');
        }
        if (isset($_POST['submitHen']))
        {
            $request['transaction_type_id'] = 1;
            $request['account_head_id'] = 8 ;
            $request['sub_head_id'] = 20;
            Transaction::Create($request->except('submitHen'));
            return response()->json(['message' => 'Hen Sold'],200);
//            return redirect()->route('poultry_daily.indexDaily','tab=hen')->with('message', 'Hen Sold');
        }
        if (isset($_POST['submitChick']))
        {
            $request['transaction_type_id'] = 1;
            $request['account_head_id'] = 8;
            $request['sub_head_id'] = 21;
            Transaction::Create($request->except('submitChick'));
            return response()->json(['message' => 'Chicks Sold'],200);

//            return redirect()->route('poultry_daily.indexDaily','tab=chicks')->with('message', 'Chicks Sold');
        }
        if (isset($_POST['submitFeed']))
        {
//          status 1 is for poultry
            $request['status'] = 1;
//          cattle type 1 is f  or poultry
            $request['cattle_type'] = 1;
            Feed::Create($request->except('submitFeed','name'));
            return response()->json(['message' => 'Feed Added'],200);

//            return redirect()->route('poultry_daily.indexDaily','tab=feed')->with('message', 'Feed Added');
        }
        if (isset($_POST['submitVaccine']))
        {
            $request['sub_head_id'] = 57;
            Vaccination::Create($request->except('submitVaccine', 'name'));
            return response()->json(['message' => 'Vaccine Added'],200);

//            return redirect()->route('poultry_daily.indexDaily','tab=vaccine')->with('message', 'Vaccine Added');
        }
        if (isset($_POST['submitMedicine']))
        {
            $request['sub_head_id'] = 55;
            Medicines::Create($request->except('submitMedicine','name'));
            return response()->json(['message' => 'Medicine Added'],200);

//            return redirect()->route('poultry_daily.indexDaily','tab=medicine')->with('message', 'Medicine Added');
        }
    }

    public function poultryExpenditureIndex()
    {
        $poultryExpenses = Transaction::where('transaction_type_id',2)->where('account_head_id',8)->get();
        return response()->json($poultryExpenses);
    }
    public function poultryExpenditureStore(Request $request)
    {

        $request['transaction_type_id'] = 2;
        $request['account_head_id'] = 8;
        $poultryExpenditureStore =  Transaction::create($request->all());
        return response()->json('hello');

//        return redirect()->back()->with('message','Poultry Added Successfully');
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
