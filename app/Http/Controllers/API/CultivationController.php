<?php

namespace App\Http\Controllers\API;

use App\Models\AccountHead;
use App\Models\Cultivation;
use App\Models\CultivationType;
use App\Models\Rate;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CultivationController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies("cultivation-read"), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cultivation_types = CultivationType::all();
        $cultivations = Cultivation::all();
        return response()->json([$cultivation_types, $cultivations], 200);

    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //Add Cultivation
        if (isset($_POST['addCultivation'])){
            $request['account_head_id'] = 9;
            Cultivation::create($request->except('addCultivation'));
            return response()->json("Cultivation Added Successfully");
        }

        //Collect Cultivation
        if (isset($_POST['collectCultivation'])){
            $cultivation_type_id = $request['cultivation_type_id'];
            if ($cultivation_type_id == 1){
                $request['sub_head_id'] = 71;
            }elseif ($cultivation_type_id == 2){
                $request['sub_head_id'] = 72;

            }elseif ($cultivation_type_id == 3){
                $request['sub_head_id'] = 73;

            }
            $request['transaction_type_id'] = 3;
            $request['account_head_id'] = 9;
            Transaction::create($request->except(['cultivation_type_id', 'collectCultivation']));
            return response()->json("Cultivation Collected Successfully");
        }

        //Sale Cultivation
        if (isset($_POST['saleCultivation'])){
            $request['transaction_type_id'] = 1;
            $cultivation_type_id = $request['cultivation_type_id'];
            if ($cultivation_type_id == 1){
                $request['account_head_id'] = 13;
                $request['sub_head_id'] = 74;
            }elseif ($cultivation_type_id == 2){
                $request['account_head_id'] = 13;
                $request['sub_head_id'] = 76;

            }elseif ($cultivation_type_id == 3){
                $request['account_head_id'] = 13;
                $request['sub_head_id'] = 75;

            }

            Transaction::create($request->except('saleCultivation', 'cultivation_type_id'));
            return response()->json("Cultivation Sold Successfully");
        }

    }

    //Rate Quantity Sum

    public function rateQuantitySum(){
        $rates = Rate::recentRate()->where('name', 'cucumber')->pluck('rate');
        return response()->json($rates);

    }

    //Collect Cultivation
    public function collectCultivation(){
        $collectCultivation = Transaction::where('transaction_type_id', 3)->where('account_head_id', 9)->get();
        $cultivation_types = CultivationType::all();
        return response()->json([$collectCultivation,$cultivation_types], 200);
    }

    //Sale Cultivation
    public function saleCultivation(){
        $transactions = Transaction::where('transaction_type_id', 1)->where('account_head_id', 13)->get();
        $cultivation_types = CultivationType::all();
        return response()->json([$transactions, $cultivation_types], 200);
    }



    public function show(Cultivation $cultivation)
    {
        //
    }


    public function edit(Cultivation $cultivation)
    {
        $cultivation_types = CultivationType::all();
        return response()->json([$cultivation, $cultivation_types], 200);
    }

    // Update Cultivation
    public function update(Request $request, Transaction $cultivation)
    {
//        dd($request, $cultivation);

        $cultivation->update($request->all());
        return response()->json("Cultivation Updated Successfully");
    }

    // Edit Collect Cultivation

    public function editCollect(Transaction $cultivation){

        $ids = [71, 72, 73];
        $cultivationType = AccountHead::whereIn('id', $ids)->get();
        return response()->json([$cultivation, $cultivationType], 200);
;
    }

    // Update Collect Cultivation
    public function updateCollect(Request $request, Transaction $cultivation){
//        dd($request->all());

        if (isset($_POST['updateCollectCultivation'])){
            $cultivation_type_id = $request['cultivation_type_id'];
            if ($cultivation_type_id == 71){
                $request['sub_head_id'] = 71;
            }elseif ($cultivation_type_id == 72){
                $request['sub_head_id'] = 72;

            }elseif ($cultivation_type_id == 73){
                $request['sub_head_id'] = 73;

            }
            $request['transaction_type_id'] = 3;
            $request['account_head_id'] = 9;
        }

        $cultivation->update($request->except('cultivation_type_id', 'updateCollectCultivation'));
        return response()->json("Cultivation Collect Updated Successfully",200);
        ;

    }

    // Delete Cultivation
    public function destroy(Cultivation $cultivation)
    {
        $cultivation->delete();
        return response()->json("Cultivation Deleted Successfully", 200);
        ;
    }

    // Delete Collect Cultivation
    public function destroyCollect(Transaction $cultivation){
//        dd($cultivation)
        $cultivation->delete();
        return response()->json("Cultivation Collected Deleted Successfully", 200);
        ;
    }

    //Delete Sale Cultivation

    public function destroySale(Transaction $cultivation){
        $cultivation->delete();
        return response()->json("Cultivation Sale Deleted Successfully", 200);
        ;
    }

}
