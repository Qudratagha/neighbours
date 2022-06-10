<?php

namespace App\Http\Controllers;

use App\Console\Kernel;
use App\Models\AccountHead;
use App\Models\Cultivation;
use App\Models\CultivationType;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CultivationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.gates');
    }

    public function index()
    {
        abort_if(Gate::denies("cultivation-read"), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cultivation_types = CultivationType::all();
        $cultivations = Cultivation::all();
        return view('cultivation.index', compact('cultivation_types', 'cultivations'));

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
            return redirect()->back()->with('message', 'Cultivation Added Successfully');
        }

        //Collect Cultivation
        if (isset($_POST['collectCultivation'])){
            $cultivation_type_id = $request['cultivation_type_id'];
            if ($cultivation_type_id == 1){
                $request['sub_head_id'] = 73;
            }elseif ($cultivation_type_id == 2){
                $request['sub_head_id'] = 74;

            }elseif ($cultivation_type_id == 3){
                $request['sub_head_id'] = 75;

            }
            $request['transaction_type_id'] = 3;
            $request['account_head_id'] = 9;
            Transaction::create($request->except(['cultivation_type_id', 'collectCultivation']));
            return redirect()->back()->with('message', 'Cultivation Collected Successfully');
        }

        //Sale Cultivation
        if (isset($_POST['saleCultivation'])){
            $request['transaction_type_id'] = 1;
            $cultivation_type_id = $request['cultivation_type_id'];
            if ($cultivation_type_id == 1){
                $request['account_head_id'] = 13;
                $request['sub_head_id'] = 76;
            }elseif ($cultivation_type_id == 2){
                $request['account_head_id'] = 13;
                $request['sub_head_id'] = 77;

            }elseif ($cultivation_type_id == 3){
                $request['account_head_id'] = 13;
                $request['sub_head_id'] = 78;

            }

            Transaction::create($request->except('saleCultivation', 'cultivation_type_id'));
            return redirect()->back()->with('message', 'Cucumber Sold Successfully');
        }

    }

    //Collect Cultivation
    public function collectCultivation(){
        $collectCultivation = Transaction::where('transaction_type_id', 3)->where('account_head_id', 9)->get();
        $cultivation_types = CultivationType::all();
        return view('cultivation.collect', compact('collectCultivation', 'cultivation_types'));
    }

    //Sale Cultivation
    public function saleCultivation(){
        $transactions = Transaction::where('transaction_type_id', 1)->where('account_head_id', 13)->get();
        $cultivation_types = CultivationType::all();
        return view('cultivation.sale', compact('cultivation_types', 'transactions'));
    }



    public function show(Cultivation $cultivation)
    {
        //
    }


    public function edit(Cultivation $cultivation)
    {
        $cultivation_types = CultivationType::all();
        return view('cultivation.edit',compact('cultivation','cultivation_types'));
    }

    // Update Cultivation
    public function update(Request $request, Cultivation $cultivation)
    {
        $cultivation->update($request->all());
        return redirect(route('cultivation.index'));
    }

    // Delete Cultivation
    public function destroy(Cultivation $cultivation)
    {
        $cultivation->delete();
        return redirect(route('cultivation.index'));
    }

    // Edit Collect Cultivation
    public function editCollect(Transaction $cultivation){

        $cultivation_types = CultivationType::all();
        return view('cultivation.editCollect', compact('cultivation', 'cultivation_types'));
    }

    // Update Collect Cultivation
    public function updateCollect(Request $request, Transaction $cultivation){
        $cultivation->update($request->except('cultivation_type_id'));
        return redirect()->back()->with('Message', 'Collect Cultivation Updated');

    }

    // Delete Collect Cultivation
    public function destroyCollect(Transaction $cultivation){
        $cultivation->delete();
        return redirect()->back()->with('errorMessage', 'Collect Cultivation Deleted');
    }

}
