<?php

namespace App\Http\Controllers;

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
//            dd($request->all());

            $request['account_head_id'] = 8;
            Cultivation::create($request->except('addCultivation'));
            return redirect()->back()->with('message', 'Cultivation Added Successfully');
        }

        if (isset($_POST['collectCultivation'])){
            $request['transaction_type_id'] = 3;
            $request['account_head_id'] = 9;
            $request['sub_head_id'] = 24;

            Transaction::create($request->except(['cultivation_type', 'collectCultivation']));
            return redirect()->back()->with('message', 'Cultivation Collected Successfully');
        }

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
