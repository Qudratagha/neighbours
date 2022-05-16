<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RateController extends Controller
{
    public function index()
    {
        $rates = Rate::groupBy('name')->where('status', 1)->get();

        return view('/rates.index', compact('rates'));
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

        Rate::create($request->all());
        return redirect()->back()->with('message','Rate Add Successfully');
    }

    public function show(Rate $rate)
    {

        return view('rates.show',['rate'=>$rate]);
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
