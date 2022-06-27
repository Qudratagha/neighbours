<?php

namespace App\Http\Controllers;

use App\Models\AccountHead;
use App\Models\Feed;
use App\Models\Medicines;
use App\Models\Poultry;
use App\Models\PoultryStatus;
use App\Models\PoultryType;
use App\Models\Transaction;
use App\Models\Vaccination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Gate;
use function Symfony\Component\Mime\Header\get;

class PoultryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.gates');
    }

    public function index()

    {
        abort_if(Gate::denies("poultry-read"), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $eggincdates = [];
        $eggincdates = Poultry::where('status', 3)->orderBy('id','desc')->distinct('created_at')->pluck('created_at');
        $eggincquans =  Poultry::where('quantity','>',0)->get()->pluck('quantity');
        $poultry_types = PoultryType::all();
        $poultry_statuses = PoultryStatus::all();
        $poultries = Poultry::orderBy('id','desc')->get();
        return view('poultry.index',compact('poultry_types','poultry_statuses', 'poultries', 'eggincdates','eggincquans'));
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
//      return view('/poultry.test',compact('dateQuantity'));
    }
    public function getIncubationDates($date)
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
//        return view('/poultry.test',compact('dateQuantity'));
    }
    public function totalEggs()
    {
        $eggscollected = Poultry::where('poultry_type_id',3)->where('poultry_type_id',3)->sum('quantity');
        $totalQty = $eggscollected / 12;
        $qtyindzn = floor($totalQty);
        return response()->json($qtyindzn);
    }
    public function indexDaily(Poultry $poultry, Request $request)
    {
        $tab = 'egg';
        if ($request->has('tab')) {
            $tab = $request->get('tab');
        }
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
        return view ('poultry_daily.indexDaily',compact('eggSale','henSale', 'chickSale','poultryFeedPurchase','poultryFeed','poultryVaccine','poultryMedicine', 'tab'));
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
        $request['account_head_id'] = 8;
        $pti =  $request->poultry_type_id;
        $psi =  $request->poultry_status_id;
        $request['remaining_quantity'] = 0;
        $request['status'] = $psi;
        if ($request['quantity'] == 0)
            {
                return redirect(route('poultry.index'))->with('errorMessage', 'Your quantity must be greater than zero ');
            }
        else
            {
                Poultry::create($request->all());
                return redirect(route('poultry.index'))->with('message', ' Entry Created');
            }
    }
    public function show(Poultry $poultry)
    {
        return view('poultry.view');
    }

    public function edit(Poultry $poultry)
    {
        $poultry_types = PoultryType::all();
        $poultry_statuses = PoultryStatus::all();
        $poultries = Poultry::all();
        return view('poultry.edit',compact('poultry','poultry_types','poultry_statuses','poultries'));
    }

    public function update(Request $request, Poultry $poultry)
    {
        $poultry->update($request->all());
        return redirect(route('poultry.index'))->with('message', 'Edit Successfully');
    }

    public function destroy(Poultry $poultry)
    {
        $poultry->delete();
        return redirect(route('poultry.index'))->with('message', 'Entry Deleted');
    }

    public function eggdel($poultry_daily)
    {
        $eggt = Transaction::where('id',$poultry_daily);
        $eggt->delete();
        return redirect()->back()->with('message', 'Entry Deleted');
    }
    public function feeddel($poultry_daily)
    {
        $eggt = Feed::where('id',$poultry_daily);
        $eggt->delete();
        return redirect()->back()->with('message', 'Entry Deleted');
    }
    public function vaccineDelete($poultry_daily)
    {
        $eggt = Vaccination::where('id',$poultry_daily);
        $eggt->delete();
        return redirect()->back()->with('message', 'Entry Deleted');
    }
    public function medicineDelete($poultry_daily)
    {
        $eggt = Medicines::where('id',$poultry_daily);
        $eggt->delete();
        return redirect()->back()->with('message', 'Entry Deleted');
    }

    public function storeDaily(Request $request)
    {

       $accountHeadData = [];
       if (isset($_POST['submitEgg']))
       {

           $quantity = $request->quantity;

           $rate = \App\Models\Rate::where('name','egg')->where('status',1)->get('rate')->last();
           if (!$rate)
           {
               return redirect()->back()->with('errorMessage', 'Please Add Egg\'s Rate First');
           }
           $request['quantity'] = $quantity*12;
           $rate = ($rate->rate)*($quantity);
           $request['amount'] = $rate ;
           $request['transaction_type_id'] = 1;
           $request['account_head_id'] = 8;
           $request['sub_head_id'] = 19;
//            dd($request);
           Transaction::Create($request->except('submitEgg'));
           return redirect()->back()->with('message', 'Eggs Sold');
       }
        $accountHeadData = [];




        if (isset($_POST['submitHen']))
        {
            $request['transaction_type_id'] = 1;
            $request['account_head_id'] = 8 ;
            $request['sub_head_id'] = 20;
            Transaction::Create($request->except('submitHen'));
//            return redirect()->back()->with('message', 'Hen Sold');
            return redirect()->route('poultry_daily.indexDaily','tab=hen')->with('message', 'Hen Sold');
        }
        if (isset($_POST['submitChick']))
        {
            $request['transaction_type_id'] = 1;
            $request['account_head_id'] = 8;
            $request['sub_head_id'] = 21;
            Transaction::Create($request->except('submitChick'));
//            return redirect()->back()->with('message', 'Chick Sold');
            return redirect()->route('poultry_daily.indexDaily','tab=chicks')->with('message', 'Chicks Sold');
        }
        if (isset($_POST['submitFeed']))
        {
//           status 1 is for poultry
            $request['status'] = 1;
//            cattle type 1 is f  or poultry
            $request['cattle_type'] = 1;
//            dd($request->all());
            Feed::Create($request->except('submitFeed','name'));
//            return redirect()->back()->with('message', 'Feed Added');
            return redirect()->route('poultry_daily.indexDaily','tab=feed')->with('message', 'Feed Added');
        }

        if (isset($_POST['submitVaccine']))
        {
            $request['sub_head_id'] = 57;
            Vaccination::Create($request->except('submitVaccine', 'name'));
//            return redirect()->back()->with('message', 'Vaccine Added');
            return redirect()->route('poultry_daily.indexDaily','tab=vaccine')->with('message', 'Vaccine Added');
        }
        if (isset($_POST['submitMedicine']))
        {
            $request['sub_head_id'] = 55;
            Medicines::Create($request->except('submitMedicine','name'));
//            return redirect()->back()->with('message', 'Medicine Added');
            return redirect()->route('poultry_daily.indexDaily','tab=medicine')->with('message', 'Medicine Added');
        }
    }
}
