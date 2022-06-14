<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AccountHead;
use App\Models\Medicines;
use Illuminate\Http\Request;

class MedicinesController extends Controller
{

    public function index()
    {
        //
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
            $sub_head_id = AccountHead::where('name', "goat#$goatID")->pluck('id')->last();
            $request['sub_head_id'] = $sub_head_id;
            Medicines::create($request->except(['cattle_id','submitGoat']));
            return response()->json('Medicine Added.',200);
        }
        //Submit Cow Medicine
        if (isset($_POST['submitCow']))
        {
            $cowID = $request->cow_id;
            $sub_head_id = AccountHead::where('name', "cow#$cowID")->pluck('id')->last();
            $request['sub_head_id'] = $sub_head_id;
            Medicines::create($request->except(['cow_id','submitCow']));
            return response()->json('Medicine Added.',200);
        }
    }

    public function show($id)
    {
        //
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
