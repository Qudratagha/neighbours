<?php

namespace App\Http\Controllers;

use App\Models\Cultivation;
use App\Models\CultivationType;
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
//        DB::table('cultivation_types')->select('name')->get();
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
        $request['account_head_id'] = 8;
        Cultivation::create($request->all());

        return redirect(route('cultivation.index'));
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
