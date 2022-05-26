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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if (isset($_POST['addCultivation'])){
            $cultivation_type_id = $request['cultivation_type_id'];
//            if ($cultivation_type_id == 1){
//                $request['sub_head_id'] = 27;
//            }elseif ($cultivation_type_id == 2){
//                $request['sub_head_id'] = 28;
//
//            }elseif ($cultivation_type_id == 3){
//                $request['sub_head_id'] = 29;
//
//            }
//            AccountHead::updateOrCreate($accountHeadData);
            $request['account_head_id'] = 9;
            Cultivation::create($request->except('addCultivation'));
            return redirect()->back()->with('message', 'Cultivation Added Successfully');
        }

        if (isset($_POST['collectCultivation'])){
            $cultivation_type_id = $request['cultivation_type_id'];
            if ($cultivation_type_id == 1){
                $request['sub_head_id'] = 27;
            }elseif ($cultivation_type_id == 2){
                $request['sub_head_id'] = 28;

            }elseif ($cultivation_type_id == 3){
                $request['sub_head_id'] = 29;

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
                $request['sub_head_id'] = 16;
            }elseif ($cultivation_type_id == 2){
                $request['account_head_id'] = 13;
                $request['sub_head_id'] = 18;

            }elseif ($cultivation_type_id == 3){
                $request['account_head_id'] = 13;
                $request['sub_head_id'] = 17;

            }

            Transaction::create($request->except('saleCultivation', 'cultivation_type_id'));
            return redirect()->back()->with('message', 'Cucumber Sold Successfully');
        }

    }

    //Collect Cultivation
    public function collectCultivation(){
        $collectCultivation = Transaction::where('transaction_type_id', 3)->get();
        $cultivation_types = CultivationType::all();
        return view('cultivation.collect', compact('collectCultivation', 'cultivation_types'));
    }

    //Sale Cultivation
    public function saleCultivation(){
        $transactions = Transaction::where('transaction_type_id', 1)->get();
        $cultivation_types = CultivationType::all();
        return view('cultivation.sale', compact('cultivation_types', 'transactions'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivation  $cultivation
     * @return \Illuminate\Http\Response
     */
    public function show(Cultivation $cultivation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivation  $cultivation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Cultivation $cultivation)
    {
        $cultivation_types = CultivationType::all();

//        $cultivations = Cultivation::all();
        return view('cultivation.edit',compact('cultivation','cultivation_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivation  $cultivation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Cultivation $cultivation)
    {
        $cultivation->update($request->all());
        return redirect(route('cultivation.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivation  $cultivation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cultivation $cultivation)
    {
        //
    }
}
