<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Pregnant;
use Illuminate\Http\Request;

class DeliveryController extends Controller
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
            if (Delivery::where('cattle_id', $request->cattle_id)->where('is_delivered', 1)->exists()) {
                return response()->json('This Goat Is Already in Delivery Process',200);
            }
            Delivery::create($request->except('submitGoat'));
            return response()->json('Delivery Data Added',200);
        }

        if (isset($_POST['submitCowDelivery'])) {
            if (Delivery::where('cattle_id', $request->cattle_id)->where('is_delivered', 1)->where('date', $request->date)->exists()) {
                return response()->json('This Cow is already Delivered',200);
            } elseif (Pregnant::where('cattle_id', $request->cattle_id)->where('is_pregnant', 1)->exists()) {
                Delivery::create($request->except('submitCowDelivery', 'is_pregnant'));
                Pregnant::create($request->except('submitCowDelivery', 'is_delivered'));
                return response()->json('Delivery Cow Data Added.',200);
            } else
                return response()->json('This Cow is not Even Pregnant',200);
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
