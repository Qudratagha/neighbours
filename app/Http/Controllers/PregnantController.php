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

        if (isset($_POST['submitCowPregnant']))
        {
            if (Pregnant::where('cattle_id', $request->cattle_id )->where('is_pregnant',1)->where('date',$request->date)->exists())
            {
                return redirect()->back()->with('errorMessage','This Cow is already Pregnant');
            }
            else
            {
                Pregnant::create($request->except('submitCowPregnant'));
                return redirect()->back()->with('message','Pregnant Cow Data Added.');
            }
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
        $pregnant->delete();
        return redirect()->back()->with('errorMessage','Pregnant Entry Deleted');
    }
}
