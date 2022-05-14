<?php

namespace App\Http\Controllers;

use App\Models\AccountHead;
use App\Models\Cattle;
use App\Models\Medicines;
use Illuminate\Http\Request;

class MedicinesController extends Controller
{
    public function index()
    {
        return view('cow_daily.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        //Submit Goat Medicine
        if (isset($_POST['submitGoat']))
        {
            $goatID = $request->cattle_id;
            $accountHeadData = array
            (
                'name' => "goat#$goatID",
                'parent_id' => 5
            );
            AccountHead::updateOrCreate($accountHeadData);

            $sub_head_id = AccountHead::where('name', "goat#$goatID")->pluck('id')->last();

            $request['sub_head_id'] = $sub_head_id;
            Medicines::create($request->except(['cattle_id','submitGoat']));
            return redirect()->back()->with('message','Medicine Added.');
        }

        //Submit Cow Medicine
        if (isset($_POST['submitCow']))
        {
            $cowID = $request->cow_id;
            $accountHeadData = array
            (
                'name' => "cow#$cowID",
                'parent_id' => 5
            );
            AccountHead::updateOrCreate($accountHeadData);

            $sub_head_id = AccountHead::where('name', "cow#$cowID")->pluck('id')->last();

            if ($sub_head_id != '')
            {
                $request['sub_head_id'] = $sub_head_id;
                Medicines::create($request->except(['cow_id','submitCow']));
                return redirect()->back()->with('message','Medicine Added.');
            }
//            else return view('cow_daily.index')->with('message', 'Please Add Milk Data First');
        }
    }

    public function show(Cattle $cow_daily)
    {
        //
    }

    public function edit(Medicines $medicines)
    {
        //
    }

    public function update(Request $request, Medicines $medicines)
    {
        //
    }

    public function destroy(Medicines $medicines)
    {
        //
    }
}
