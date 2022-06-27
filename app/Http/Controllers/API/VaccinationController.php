<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AccountHead;
use App\Models\Vaccination;
use Illuminate\Http\Request;

class VaccinationController extends Controller
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
        if (isset($_POST['submitGoat'])) {
            $goatID = $request->serial_no;
            $sub_head_id = AccountHead::where('name', "goat#$goatID")->pluck('id')->last();
            if ($sub_head_id != '') {
                $request['sub_head_id'] = $sub_head_id;
                Vaccination::create($request->except(['serial_no', 'submitGoat']));
                return response()->json('Vaccination Added', 200);
            } else return response()->json('Please Add Milk Data First', 200);
        }

        if (isset($_POST['submitCow'])) {
            $cowID = $request->serial_no;
            $sub_head_id = AccountHead::where('name', "cow#$cowID")->pluck('id')->last();
            if ($sub_head_id != '') {
                $request['sub_head_id'] = $sub_head_id;
                Vaccination::create($request->except(['serial_no', 'submitCow']));
                return response()->json('Vaccination Added', 200);
            } else return response()->json('Please Add Milk Data First', 200);
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
