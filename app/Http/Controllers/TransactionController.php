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

    public function indexExpenditure()
    {
        $expenses = Transaction::where('transaction_type_id',2)
            ->where('account_head_id',5)->get();
        return view('expenditure.index',compact('expenses'));
    }

    public function indexCowExpenditure()
    {
        $cowExpenses = Transaction::where('transaction_type_id',2)->where('account_head_id',6)->get();

        return view('cow_expenditure.index',compact('cowExpenses'));
    }

    public function indexPoultryExpenditure()
    {
        $poultryExpenses = Transaction::where('transaction_type_id',2)
            ->where('account_head_id',8)->get();
        return view('poultry_expenditure.index',compact('poultryExpenses'));
    }

    public function indexGoatExpenditure()
    {
        $goatExpenses = Transaction::where('transaction_type_id',2)->where('account_head_id',7)->get();
        return view('goat_expenditure.index',compact('goatExpenses'));
    }

    public function indexCultivationExpenditure()
    {
        $cultivationExpenses = Transaction::where('transaction_type_id',2)
            ->where('account_head_id',9)->get();
        return view('cultivation_expenditure.index',compact('cultivationExpenses'));
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
//        foreach ($cowSoldSerials as $cowSoldSerial)
//        {
//            $sub_head_id = AccountHead::where('name', "cow#$cowSoldSerial")->pluck('id')->last();
//            if ($sub_head_id != '')
//            {
//                $soldCow = Transaction::whereRaw("account_head_id = 13 AND sub_head_id = $sub_head_id")->get();
//                $soldcowarr[] =  array_push($soldcowarr ,$soldCow);
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

    public function createExpenditure()
    {
        $expenseHeads = AccountHead::where('parent_id',5)->where('name','LIKE','%FARM %')->get();
        return view('expenditure/create',compact('expenseHeads'));
    }

    public function createCowExpenditure()
    {
        $expenseHeads = AccountHead::where('parent_id',5)->where('name','LIKE','%Cow %')->get();
        return view('cow_expenditure/create',compact('expenseHeads'));
    }

    public function createPoultryExpenditure()
    {
        $expenseHeads = AccountHead::where('parent_id',5)->where('name','LIKE','%Poultry %')->get();
        return view('poultry_expenditure/create',compact('expenseHeads'));
    }

    public function createGoatExpenditure()
    {
        $expenseHeads = AccountHead::where('parent_id',5)->where('name','LIKE','%Goat/Sheep %')->get();
        return view('goat_expenditure/create',compact('expenseHeads'));
    }

    public function createCultivationExpenditure()
    {
        $expenseHeads = AccountHead::where('parent_id',5)->where('name','LIKE','%Cultivation %')->get();
        return view('cultivation_expenditure/create',compact('expenseHeads'));
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
            foreach ($request->quantity as $quantity)
            {
                Cattle::where('serial_no', $quantity)->update(['saleStatus'=> 1, 'date'=> now()]);
            }
            $request['transaction_type_id'] = 1;
            $request['account_head_id'] = 7;

            $all_Qtys = $request->quantity;
//          $stringQuantity = collect($all_Qtys)->implode("-");
            $totalQuantity = count($all_Qtys);
            $request['quantity'] = $totalQuantity;
            $request['saleStatus'] = 1;
            $request['sub_head_id'] = 18;

            Transaction::create($request->except('submitGoatSale', 'saleStatus'));

            return redirect()->back()->with('message', 'Goat Sold Successfully');
        }
    }

    public function storeExpenditure(Request $request)
    {
        $request['transaction_type_id'] = 2;
        $request['account_head_id'] = 5;
        Transaction::create($request->all());
        return redirect()->back()->with('message','FARM Expenditure Added Successfully');
    }

    public function storeCowExpenditure(Request $request)
    {
        $request['transaction_type_id'] = 2;
        $request['account_head_id'] = 6;
        Transaction::create($request->all());
        return redirect()->back()->with('message','Cow Expenditure Added Successfully');
    }

    public function storePoultryExpenditure(Request $request)
    {
        $request['transaction_type_id'] = 2;
        $request['account_head_id'] = 8;
        Transaction::create($request->all());
        return redirect()->back()->with('message','Poultry Added Successfully');
    }

    public function storeGoatExpenditure(Request $request)
    {
        $request['transaction_type_id'] = 2;
        $request['account_head_id'] = 7;
        Transaction::create($request->all());
        return redirect()->back()->with('message','Goat Added Successfully');
    }

    public function storeCultivationExpenditure(Request $request)
    {
        $request['transaction_type_id'] = 2;
        $request['account_head_id'] = 9;
        Transaction::create($request->all());
        return redirect()->back()->with('message','Cultivation Added Successfully');
    }


    public function show(Cattle $cow_daily)
    {

    }

    public function edit(Transaction $transaction)
    {

    }

    public function editExpenditure(Transaction $transaction)
    {
        $expenseHeads = AccountHead::where('parent_id',5)->where('name','LIKE','%FARM %')->get();
        return view('expenditure.edit',compact('transaction','expenseHeads'));
    }

    public function editCowExpenditure(Transaction $transaction)
    {
        $expenseHeads = AccountHead::where('parent_id',5)->where('name','LIKE','%Cow %')->get();
        return view('cow_expenditure.edit',compact('transaction','expenseHeads'));
    }

    public function editPoultryExpenditure(Transaction $transaction)
    {
        $expenseHeads = AccountHead::where('parent_id',5)->where('name','LIKE','%Poultry %')->get();
        return view('poultry_expenditure.edit',compact('transaction','expenseHeads'));
    }

    public function editGoatExpenditure(Transaction $transaction)
    {
        $expenseHeads = AccountHead::where('parent_id',5)->where('name','LIKE','%Goat %')->get();
        return view('goat_expenditure.edit',compact('transaction','expenseHeads'));
    }

    public function editCultivationExpenditure(Transaction $transaction)
    {
        $expenseHeads = AccountHead::where('parent_id',5)->where('name','LIKE','%Cultivation %')->get();
        return view('cultivation_expenditure.edit',compact('transaction','expenseHeads'));
    }

    public function update(Request $request, Transaction $cow_daily)
    {

    }

    public function updateExpenditure(Request $request, Transaction $transaction)
    {
//        dd($request->all(),$transaction);
        $request['transaction_type_id'] = 2;
        $request['account_head_id'] = 5;
        $transaction->update($request->all());
        return redirect()->back()->with('message','FARM Expenditure Updated Successfully');
    }

    public function updateCowExpenditure(Request $request, Transaction $transaction)
    {
//        dd($request->all(),$transaction);
        $request['transaction_type_id'] = 2;
        $request['account_head_id'] = 6;
        $transaction->update($request->all());
        return redirect()->back()->with('message','Cow Expenditure Updated Successfully');
    }

    public function updatePoultryExpenditure(Request $request, Transaction $transaction)
    {
//        dd($request->all(),$transaction);
        $request['transaction_type_id'] = 2;
        $request['account_head_id'] = 8;
        $transaction->update($request->all());
        return redirect()->back()->with('message','Poultry Updated Successfully');
    }

    public function updateGoatExpenditure(Request $request, Transaction $transaction)
    {
//        dd($request->all(),$transaction);
        $request['transaction_type_id'] = 2;
        $request['account_head_id'] = 7;
        $transaction->update($request->all());
        return redirect()->back()->with('message','Goat Updated Successfully');
    }

    public function updateCultivationExpenditure(Request $request, Transaction $transaction)
    {
//        dd($request->all(),$transaction);
        $request['transaction_type_id'] = 2;
        $request['account_head_id'] = 9;
        $transaction->update($request->all());
        return redirect()->back()->with('message','Cultivation Updated Successfully');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->back()->with('errorMessage','Milk Entry Deleted');
    }

    public function destroyExpenditure(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->back()->with('errorMessage','FARM Expenditure Entry Deleted');
    }

    public function destroyCowExpenditure(Transaction $transaction)
    {
        $cowPurchased = $transaction->description;

        if (($cowPurchased == 'Purchased Cow'))
        {
            return to_route('cattle.index','cow')->with('errorMessage','Expenditure For Cows can not be deleted You have to delete Cow First From Cows Page');
        }
        else
        $transaction->delete();
        return redirect()->back()->with('errorMessage','Cow Expenditure Entry Deleted');
    }

    public function destroyPoultryExpenditure(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->back()->with('errorMessage','Poultry Expenditure Entry Deleted');
    }

    public function destroyGoatExpenditure(Transaction $transaction)
    {
        $goatPurchased = $transaction->description;

        if ($goatPurchased == 'Purchased Goat/Sheep')
        {
            return to_route('cattle.index','goat')->with('errorMessage','Goat/Sheep Purchase can not be deleted You have to delete Cow First From Goat/Sheep Page');
        }
        else
            $transaction->delete();
        return redirect()->back()->with('errorMessage','Goat Expenditure Entry Deleted');
    }

    public function destroyCultivationExpenditure(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->back()->with('errorMessage','Cultivation Expenditure Entry Deleted');
    }
}
