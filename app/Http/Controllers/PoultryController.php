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

class PoultryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $eggincdates =  Poultry::where('status',3)->distinct('created_at')->pluck('created_at');
//        dd($eggincdates);
        $eggincquans =  Poultry::where('quantity','>',0)->get()->pluck('quantity');
        abort_if(Gate::denies("poultry read"), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poultry_types = PoultryType::all();
        $poultry_statuses = PoultryStatus::all();
        $poultries = Poultry::all();
        return view('poultry.index',compact('poultry_types','poultry_statuses', 'poultries', 'eggincdates','eggincquans'));
    }
    public function getDateQuantity($date)
    {
        $dateQuantity = Poultry::where('created_at',$date)->where('poultry_type_id',3)->where('poultry_status_id',3)->sum('quantity');
//        $dateQuantity = Poultry::where('created_at',$date)->where('poultry_type_id',3)->where('poultry_status_id',3)->where('quantity','>',0)->pluck('remaining_quantity')->last();
        return  response()->json($dateQuantity);
//        return view('/poultry.test',compact('dateQuantity'));
    }
    public function totalEggs()
    {
        $eggscollected = Poultry::where('poultry_type_id',3)->where('poultry_type_id',3)->sum('quantity');
        $totalQty = $eggscollected / 12;
        $qtyindzn = floor($totalQty);
        return response()->json($qtyindzn);
    }
    public function indexDaily(Poultry $poultry)
    {
        $eggscollected = Poultry::where('poultry_type_id',3)->sum('quantity');
        $totalQty = $eggscollected / 12;
        $qtyindzn = floor($totalQty);

        $eggs = Transaction::where('sub_head_id', 16 )->get();
        $hens = Transaction::where('sub_head_id', 17 )->get();
        $chicks = Transaction::where('sub_head_id', 17 )->get();
        $vaccines = Vaccination::where('sub_head_id', 20 )->get();
        $medicines = Medicines::where('sub_head_id', 21 )->get();
        return view ('poultry_daily.indexDaily',compact('eggs','hens', 'chicks','vaccines','medicines'));
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
            return redirect(route('poultry.index'))->with('alert', 'Yoyr quantity must be greater than zero ');
        }
        else{
            Poultry::create($request->except('updatedDate'));

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
    public function storeDaily(Request $request)
    {

       $accountHeadData = [];
       if (isset($_POST['submitEgg']))
       {
           $accountHeadData = array
           (
               'name' => "eggs",
               'parent_id' => 8
           );
           AccountHead::updateOrCreate($accountHeadData);
           $request['transaction_type_id'] = 1;
           $request['account_head_id'] = 4;
           $sub_head_id = AccountHead::where('name', "eggs")->pluck('id')->last();
           $request['sub_head_id'] = $sub_head_id;

           Transaction::Create($request->except('submitEgg'));
           return redirect()->back()->with('message', 'Eggs Sold');
       }
        if (isset($_POST['submitHen']))
        {
            $accountHeadData = array
            (
                'name' => "hen",
                'parent_id' => 8
            );
            AccountHead::updateOrCreate($accountHeadData);
            $request['transaction_type_id'] = 1;
            $request['account_head_id'] = 4;
            $sub_head_id = AccountHead::where('name', "hen")->pluck('id')->last();

            $request['sub_head_id'] = $sub_head_id;
            Transaction::Create($request->except('submitHen'));
            return redirect()->back()->with('message', 'Hen Sold');
        }
        if (isset($_POST['submitChick']))
        {
            $accountHeadData = array
            (
                'name' => "chick",
                'parent_id' => 8
            );
            AccountHead::updateOrCreate($accountHeadData);
            $request['transaction_type_id'] = 1;
            $request['account_head_id'] = 4;
            $sub_head_id = AccountHead::where('name', "chick")->pluck('id')->last();
            $request['sub_head_id'] = $sub_head_id;
            Transaction::Create($request->except('submitChick'));
            return redirect()->back()->with('message', 'Chick Sold');
        }
        if (isset($_POST['submitFeed']))
        {
//            dd($request);
//            dd($request['poultry'] = 8);
            dd(Feed::Create($request));
            return redirect()->back()->with('message', 'Feed Added');
        }
        if (isset($_POST['submitVaccine']))
        {
            $accountHeadData = array
            (
                'name' => "vaccine",
                'parent_id' => 8
            );
            AccountHead::updateOrCreate($accountHeadData);
            $sub_head_id = AccountHead::where('name', "vaccine")->pluck('id')->last();
            $request['sub_head_id'] = $sub_head_id;
            Vaccination::Create($request->except('submitVaccine'));
            return redirect()->back()->with('message', 'Vaccine Added');
        }
        if (isset($_POST['submitMedicine']))
        {
            $accountHeadData = array
            (
                'name' => "medicine",
                'parent_id' => 8
            );
            AccountHead::updateOrCreate($accountHeadData);
            $sub_head_id = AccountHead::where('name', "medicine")->pluck('id')->last();
            $request['sub_head_id'] = $sub_head_id;
            Medicines::Create($request->except('submitMedicine'));
            return redirect()->back()->with('message', 'Medicine Added');
        }
    }
}
