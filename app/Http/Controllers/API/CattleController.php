<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AccountHead;
use App\Models\Cattle;
use App\Models\Delivery;
use App\Models\Insemination;
use App\Models\Medicines;
use App\Models\Pregnant;
use App\Models\Transaction;
use App\Models\Vaccination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Gate;

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
        if (isset($_REQUEST['submitDryGoat']))
        {
            DB::table('cattle')->where('id', $request->cattle_id)->update(['dry_date' => $request->dry_date]);
            return response()->json('Goat Dry Added',200);
        }

        //dead goat
        if (isset($_REQUEST['submitDeadGoat']))
        {
            DB::table('cattle')->where('id', $request->cattle_id)->update(['dead_date' => $request->dead_date]);
            return response()->json('Goat Dead Added',200);
        }

        //dry cow
        if (isset($_REQUEST['submitDry']))
        {
            DB::table('cattle')->where('id', $request->cattle_id)->update(['dry_date' => $request->dry_date]);
            return response()->json('Cow Dry Added',200);
        }

        //dead cow
        if (isset($_REQUEST['submitDead']))
        {
            DB::table('cattle')->where('id', $request->cattle_id)->update(['dead_date' => $request->dead_date]);
            return response()->json('Cow Dry Added',200);
        }

        //store cow
        if (isset($_REQUEST['submitCow']))
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
        if (isset($_REQUEST['submitGoat']))
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
        if (isset($_REQUEST['submitMilk'])) {
            $cowSerial = $request->serial_no;

            $request['transaction_type_id'] = 3;
            $request['account_head_id'] = 22;
            $sub_head_id = AccountHead::where('name', "cow#$cowSerial")->pluck('id')->last();
            $request['sub_head_id'] = $sub_head_id;

            Transaction::create($request->except(['serial_no', 'submitMilk']));

            return response()->json('Milk Added Successful',200);
        }
    }

    public function show(String $cattle_type, Cattle $cattle)
    {
        if ($cattle->dead_date)
        {
            if ($cattle_type == 'cow' || $cattle_type == 'goat')
            {
                abort_if(Gate::denies("$cattle_type-read"), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return response()->json(
                    [
                        'cattle'=>$cattle,
                        'cattle_type'=>$cattle_type
                    ],200);
            }
        }
        elseif ($cattle->dry_date)
        {
            if ($cattle_type == 'cow' || $cattle_type == 'goat')
            {
                abort_if(Gate::denies("$cattle_type-read"), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return response()->json(
                    [
                        'cattle'=>$cattle,
                        'cattle_type'=>$cattle_type
                    ],200);
            }
        }
        elseif ($cattle->saleStatus == 1)
        {
            $transaction = Transaction::where('transaction_type_id', 1)->where('sub_head_id',18)->where('account_head_id', 7)->get();
            if ($cattle_type == 'cow' || $cattle_type == 'goat')
            {
                abort_if(Gate::denies("$cattle_type-read"), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return response()->json(
                    [
                        'cattle'=>$cattle,
                        'cattle_type'=>$cattle_type
                    ],200);
            }
        }
    }

    //Cow Daily Entries Show
    public static function cowDaily(Cattle $cow_daily)
    {
        abort_if(Gate::denies('cow-read'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cowID = $cow_daily->id;
        $cow_serial = $cow_daily->serial_no;
        $sub_head_id = AccountHead::where('name',"cow#$cow_serial")->pluck('id')->last();

        if ($sub_head_id != '')
        {
            $transactions = Transaction::whereRaw("account_head_id = 22 AND sub_head_id = $sub_head_id")->get();
        }
        else $transactions = [null];

        $sicks = $cow_daily->sicks()->get();
        $medicines      =   Medicines::where('sub_head_id',$sub_head_id)->get();
        $pregnants      =   Pregnant::where('cattle_id',$cowID)->get();
        $deliveries     =   Delivery::where('cattle_id',$cowID)->get();
        $vaccinations   =   Vaccination::where('sub_head_id',$sub_head_id)->get();
        $inseminations   =   Insemination::where('cattle_id',$cowID)->get();

        return response()->json(
            ['Specific Cow Daily Data'=>$cow_daily,
                'Specific Cow Milk Data'=>$transactions,
                'Specific Cow Sick'=>$sicks,
                'Specific Cow Medicine'=>$medicines,
                'Specific Cow Pregnant'=>$pregnants,
                'Specific Cow Delivery'=>$deliveries,
                'Specific Cow Vaccination'=>$vaccinations,
                'Specific Cow Insemination'=>$inseminations
            ],200);
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
