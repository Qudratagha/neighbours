<?php

namespace App\Http\Controllers;

use App\Models\Pregnant;
use Illuminate\Http\Request;

class PregnantController extends Controller
{
    public function index()
    {
        return view('cow_daily.pregnant');
    }

   public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if (isset($_POST['submitGoat']))
        {
            Pregnant::create($request->except('submitGoat'));
            return redirect()->back()->with('message', 'Pregnant Data Added');
        }
        if (isset($_POST['submitCow']))
        {
            Pregnant::create($request->except('submitCow'));
            return redirect()->back()->with('message', 'Pregnant Data Added');
        }
    }

    public function show(Pregnant $pregnant)
    {

    }

    public function edit(Pregnant $pregnant)
    {
        //
    }

    public function update(Request $request, Pregnant $pregnant)
    {
        //
    }

    public function destroy(Pregnant $pregnant)
    {
        //
    }
}
