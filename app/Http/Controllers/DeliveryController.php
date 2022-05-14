<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        return view('cow_daily.delivery');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if (isset($_POST['submitGoat']))
        {
            Delivery::create($request->except('submitGoat'));
            return redirect()->back()->with('message', 'Delivery Data Added');
        }

        if (isset($_POST['submitCow']))
        {
            Delivery::create($request->except('submitCow'));
            return redirect()->back()->with('message', 'Delivery Data Added');
        }
    }

    public function show(Delivery $delivery)
    {

    }

    public function edit(Delivery $delivery)
    {
        //
    }

    public function update(Request $request, Delivery $delivery)
    {
        //
    }

    public function destroy(Delivery $delivery)
    {
        //
    }
}
