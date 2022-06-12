<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AccountHead;
use App\Models\Cattle;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CattleController extends Controller
{


    public function index(String $cattle_type)
    {
        $goats = Cattle::goats()->get();
        $cows = Cattle::cows()->get();
        if ($cattle_type == 'cow' )
        {
            return response()->json($cows,200);
        }
        else if ($cattle_type == 'goat')
        {
            return response()->json($goats,200);
        }
    }


    public function create(String $cattle_type)
    {
        $goats = Cattle::goats()->where('saleStatus', 0)->where('dry_date', null)->where('dead_date', null)->get(['id','serial_no']);
        $cows = Cattle::cows()->where('saleStatus',0)->where('dry_date', null)->where('dead_date', null)->get(['id','serial_no']);
        if ($cattle_type == 'cow' )
        {
            return response()->json($cows,200);
        }
        else if ($cattle_type == 'goat')
        {
            return response()->json($goats,200);
        }
    }

    public function store(Request $request)
    {
        //dry Goat
        if (isset($_POST['submitDryGoat']))
        {
            DB::table('cattle')->where('id', $request->cattle_id)->update(['dry_date' => $request->dry_date]);
            return response()->json('Goat Dry Added',200);
        }

        //dead goat
        if (isset($_POST['submitDeadGoat']))
        {
            DB::table('cattle')->where('id', $request->cattle_id)->update(['dead_date' => $request->dead_date]);
            return response()->json('Goat Dead Added',200);
        }

        //dry cow
        if (isset($_POST['submitDry']))
        {
            DB::table('cattle')->where('id', $request->cattle_id)->update(['dry_date' => $request->dry_date]);
            return response()->json('Cow Dry Added',200);
        }

        //dead cow
        if (isset($_POST['submitDead']))
        {
            DB::table('cattle')->where('id', $request->cattle_id)->update(['dead_date' => $request->dead_date]);
            return response()->json('Cow Dry Added',200);
        }

        //store cow
        if (isset($_POST['submitCow']))
        {
            $uniqueSerial = Cattle::cows()->where('serial_no',$request->serial_no)->first();
            if (isset($uniqueSerial->serial_no) and isset($request->serial_no))
            {
                return response()->json('Cow With this SerialNo Already exists. Please Try another',200);
            }
            else
            {
                $cow_daily = $request->serial_no;
                $accountHeadData = array
                (
                    'name' => "cow#$cow_daily",
                    'parent_id' => 6
                );
                AccountHead::updateOrCreate($accountHeadData);

                $accountHeadId = AccountHead::where('name', "cow#$cow_daily")->pluck('id')->last();

                if ($request->age) {
                    Transaction::create([
                        'date' => $request->date,
                        'transaction_type_id' => 2,
                        'account_head_id' => 6,
                        'sub_head_id' => $accountHeadId,
                        'quantity' => 1,
                        'amount' => $request->amount,
                        'description' => 'Purchased Cow'
                    ]);
                }
                $request['cattle_type_id'] = $request->submitCow;
                $request['account_head_id'] = $accountHeadId;
                Cattle::create($request->except('submitCow', 'amount'));
                return response()->json('Cow Added Successful',200);
            }
        }
        //store goat
        if (isset($_POST['submitGoat']))
        {
//            dd($request->all());
            $goat_serial = $request->serial_no;

            $accountHeadData = array
            (
                'name' => "goat#$goat_serial",
                'parent_id' => 7
            );
            AccountHead::updateOrCreate($accountHeadData);
            $accountHeadId = AccountHead::where('name',"goat#$goat_serial")->pluck('id')->last();

            if ($request->age){

                Transaction::create([
                    'date' => $request->entry_in_farm,
                    'transaction_type_id' => 2,
                    'account_head_id' => 7,
                    'sub_head_id' => $accountHeadId,
                    'quantity' => 1,
                    'amount' => $request->amount,
                    'description' => "Purchased Goat/Sheep"
                ]);
            }

            $request['account_head_id'] = $accountHeadId;
            Cattle::create($request->except('submitGoat','amount'));
            return response()->json('Goat Added Successful',200);
        }

        //store milk
        if (isset($_POST['submitMilk'])) {
            $cowSerial = $request->serial_no;

            $request['transaction_type_id'] = 3;
            $request['account_head_id'] = 22;
            $sub_head_id = AccountHead::where('name', "cow#$cowSerial")->pluck('id')->last();
            $request['sub_head_id'] = $sub_head_id;

            Transaction::create($request->except(['serial_no', 'submitMilk']));

            return response()->json('Milk Added Successful',200);
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
