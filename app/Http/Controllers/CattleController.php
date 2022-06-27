<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCattleRequest;
use App\Http\Requests\UpdateCattleRequest;
use App\Models\AccountHead;
use App\Models\Cattle;
use App\Models\Delivery;
use App\Models\Insemination;
use App\Models\Medicines;
use App\Models\Pregnant;
use App\Models\Sick;
use App\Models\Transaction;
use App\Models\Vaccination;
use Gate;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use function Symfony\Component\HttpFoundation\all;

//use Yajra\DataTables\DataTables;


class CattleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.gates');
    }

    public static function cowDaily(Cattle $cow_daily)
    {
        abort_if(Gate::denies('cow-read'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cowID = $cow_daily->id;
        $cow_serial = $cow_daily->serial_no;
        $sub_head_id = AccountHead::where('name', "cow#$cow_serial")->pluck('id')->last();

        if ($sub_head_id != '') {
            $transactions = Transaction::whereRaw("account_head_id = 22 AND sub_head_id = $sub_head_id")->get();
        } else $transactions = [null];

        $sicks = $cow_daily->sicks()->get();
        $medicines = Medicines::where('sub_head_id', $sub_head_id)->get();
        $pregnants = Pregnant::where('cattle_id', $cowID)->get();
        $deliveries = Delivery::where('cattle_id', $cowID)->get();
        $vaccinations = Vaccination::where('sub_head_id', $sub_head_id)->get();
        $inseminations = Insemination::where('cattle_id', $cowID)->get();

        return view('cow_daily.index', compact('cow_daily', 'transactions', 'sicks', 'medicines', 'pregnants', 'deliveries', 'vaccinations', 'inseminations'));
    }

    public function create(string $cattle_type)
    {
        $goats = Cattle::goats()->where('saleStatus', 0)->where('dry_date', null)->where('dead_date', null)->get(['id', 'serial_no']);
        $cows = Cattle::cows()->where('saleStatus', 0)->where('dry_date', null)->where('dead_date', null)->get(['id', 'serial_no']);
        if ($cattle_type == 'cow' || $cattle_type == 'goat') {
            abort_if(Gate::denies("$cattle_type-create"), Response::HTTP_FORBIDDEN, '403 Forbidden');
            return view("cattle.$cattle_type.create", compact('goats', 'cows'));
        }
    }

    public function createCowExpenditurePurchase()
    {
        return view('cow_expenditure.purchase');
    }

    public function createGoatExpenditurePurchase()
    {
        return view('goat_expenditure.purchase');
    }

    public function store(StoreCattleRequest $request)
    {
        //dry Goat
        if (isset($_POST['submitDryGoat'])) {
            DB::table('cattle')->where('id', $request->cattle_id)->update(['dry_date' => $request->dry_date]);
            return redirect()->back()->with('message', 'Goat Dry Added');
        }

        //dead goat
        if (isset($_POST['submitDeadGoat'])) {
            DB::table('cattle')->where('id', $request->cattle_id)->update(['dead_date' => $request->dead_date]);
            return redirect()->back()->with('message', 'Goat Dead Added');
        }

        //dry cow
        if (isset($_POST['submitDry'])) {
            DB::table('cattle')->where('id', $request->cattle_id)->update(['dry_date' => $request->dry_date]);
            return redirect()->back()->with('message', 'Cow Dry Added');
        }

        //dead cow
        if (isset($_POST['submitDead'])) {
            DB::table('cattle')->where('id', $request->cattle_id)->update(['dead_date' => $request->dead_date]);
            return redirect()->back()->with('message', 'Cow Dead Added');
        }

        //store cow
        if (isset($_POST['submitCow'])) {
            $uniqueSerial = Cattle::cows()->where('serial_no', $request->serial_no)->first();
            if (isset($uniqueSerial->serial_no) and isset($request->serial_no)) {
                return to_route('cattle.index', 'cow')->with('errorMessage', 'Cow With this SerialNo Already exists. Please Try another');
            } else {
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
                return redirect()->back()->with('message', 'Cow Added Successfully');
            }
        }

        //store goat
        if (isset($_POST['submitGoat'])) {
//            dd($request->all());
            $goat_serial = $request->serial_no;

            $accountHeadData = array
            (
                'name' => "goat#$goat_serial",
                'parent_id' => 7
            );
            AccountHead::updateOrCreate($accountHeadData);
            $accountHeadId = AccountHead::where('name', "goat#$goat_serial")->pluck('id')->last();

            if ($request->age) {

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
            Cattle::create($request->except('submitGoat', 'amount'));
            return redirect()->back()->with('message', 'Goat Added Successfully');
        }

        //store milk
        if (isset($_POST['submitMilk'])) {
            $cowSerial = $request->serial_no;

            $request['transaction_type_id'] = 3;
            $request['account_head_id'] = 22;
            $sub_head_id = AccountHead::where('name', "cow#$cowSerial")->pluck('id')->last();
            $request['sub_head_id'] = $sub_head_id;

            Transaction::create($request->except(['serial_no', 'submitMilk']));

            return redirect()->back()->with('message', 'Milk Added Successfully');
        }
    }

    public function show(String $cattle_type, Cattle $cattle)
    {

        if ($cattle->dead_date) {
            if ($cattle_type == 'cow' || $cattle_type == 'goat') {
                abort_if(Gate::denies("$cattle_type-read"), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return view("cattle.$cattle_type.showDead", compact('cattle', 'cattle_type'));
            }
        } elseif ($cattle->dry_date) {
            if ($cattle_type == 'cow' || $cattle_type == 'goat') {
                abort_if(Gate::denies("$cattle_type-read"), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return view("cattle.$cattle_type.showDry", compact('cattle', 'cattle_type'));
            }
        } elseif ($cattle->saleStatus == 1) {
            $transaction = Transaction::where('transaction_type_id', 1)->where('sub_head_id', 18)->where('account_head_id', 7)->get();
//            dd($transaction);
            if ($cattle_type == 'cow' || $cattle_type == 'goat') {
                abort_if(Gate::denies("$cattle_type-read"), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return view("cattle.$cattle_type.showSold", compact('cattle', 'cattle_type', 'transaction'));
            }
        }

    }

    //Cow Daily Entries Show

    public function goatDaily(Cattle $goat_daily)
    {
        abort_if(Gate::denies('goat-read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $goatID = $goat_daily->id;
        $serial = $goat_daily->serial_no;
        $sub_head_id = AccountHead::where('name', "goat#$serial")->pluck('id')->last();
        $sicks = Sick::where('cattle_id', $goatID)->get();
        $medicines = Medicines::where('sub_head_id', $sub_head_id)->get();
        $pregnants = Pregnant::where('cattle_id', $goatID)->get();
        $deliveries = Delivery::where('cattle_id', $goatID)->get();
        $vaccinations = Vaccination::where('sub_head_id', $sub_head_id)->get();

        return view('goat_daily.index', compact('goat_daily', 'sicks', 'medicines', 'pregnants', 'deliveries', 'vaccinations'));
    }

    // Goat Daily Entries Show

    public function edit(String $cattle_type, Cattle $cattle_id)
    {
        abort_if(Gate::denies("$cattle_type-update"), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $goats = Cattle::goats()->get();
        $cows = Cattle::where('cattle_type_id', 1)->get();

        if ($cattle_type == 'cow' || $cattle_type == 'goat') {
            return view("cattle.$cattle_type.edit", compact('cows', 'goats', 'cattle_id'));
        }
    }

    public function update(UpdateCattleRequest $request, String $cattle_type, Cattle $cattle_id)

    {
        abort_if(Gate::denies("$cattle_type-update"), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //update cow
        if (isset($_POST['updateCow'])) {
            $request['cattle_type_id'] = $request->updateCow;
            $request['account_head_id'] = 6;
            $cattle_id->update($request->except('updateCow'));
            return CattleController::index($cattle_type);
        }

        //update goat
        if (isset($_POST['updateGoat'])) {
            $request['account_head_id'] = 7;
            $cattle_id->update($request->except('updateGoat', 'cattle_type'));
            return CattleController::index($cattle_type);
        }
    }

    public function index(String $cattle_type)
    {
        $goats = Cattle::goats()->get();
        $cows = Cattle::cows()->get();
        if ($cattle_type == 'cow' || $cattle_type == 'goat') {
            abort_if(Gate::denies("$cattle_type-read"), Response::HTTP_FORBIDDEN, '403 Forbidden');
            return view("cattle.$cattle_type.index", compact('goats', 'cows'));
        }
    }

    public function destroy(String $cattle_type, Cattle $cattle)
    {
        abort_if(Gate::denies("$cattle_type-delete"), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $cattle->deliveries()->delete();
        $cattle->pregnants()->delete();
        $cattle->sicks()->delete();
        $cattle->delete();
        $cattle->account_head->transactionSubHead()->delete();
        $cattle->account_head()->delete();
        return to_route('cattle.index', $cattle_type)->with('errorMessage', "$cattle_type Deleted Successful");
    }
}
