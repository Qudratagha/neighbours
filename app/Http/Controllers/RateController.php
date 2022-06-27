<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Gate;

class RateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.gates');
    }

    public function index()
    {
        abort_if(Gate::denies("rate-read"), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rates = Rate::recentRate()->get();
        if ($rates)
        {
            return view('/rates.index', compact('rates'));
        }
        else return view('/rates.index');
    }

    public function create()
    {
        return view('/rates.create');
    }

    public function store(Request $request)
    {
        if($request->input('name','milk')){

            Rate::where('name', $request->input('name','milk'))->where('status', 1)->update(['status'=>0]);
        }
        if($request->input('name','egg')){

            Rate::where('name', $request->input('name','egg'))->where('status', 1)->update(['status'=>0]);
        }
        if($request->input('name','cucumber')){

            Rate::where('name', $request->input('name','cucumber'))->where('status', 1)->update(['status'=>0]);
        }

        Rate::create($request->all());
        return redirect()->back()->with('message','Rate Add Successfully');
    }

    public function show(Rate $rate)
    {
        $name = $rate->name;
        $rates = Rate::where('name',$name)->get();
        return view('rates.show',['rates'=>$rates, 'rate'=>$rate]);
    }

    public function edit(Rate $rate)
    {
        //
    }

    public function update(Request $request, Rate $rate)
    {
        //
    }

    public function destroy(Rate $rate)
    {
        //
    }
}
