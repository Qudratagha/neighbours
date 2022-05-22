<?php

namespace App\Http\Controllers;

use App\Models\Cattle;
use App\Models\Sick;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\AbstractList;

class SickController extends Controller
{
    public function index()
    {
        return view('cow_daily.sick');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if (isset($_POST['submitGoat']))
        {
            Sick::create($request->except('submitGoat'));
            return redirect()->back()->with('message','Sick Data Added.');
        }

        if (isset($_POST['submitCow']))
        {
            if (Sick::where('cattle_id', $request->cattle_id )->where('is_sick',1)->exists())
            {
                    return redirect()->back()->with('errorMessage','This Cow is already sick');
            }
            else
                {
                Sick::create($request->except('submitCow'));
                return redirect()->back()->with('message','Sick Data Added.');
            }
        }

        if (Sick::where('cattle_id', $request->cattle_id )->where('is_sick',1)->exists())
        {
            if (isset($_POST['submitHealthyCow']))
            {
                Sick::create($request->except('submitHealthyCow','sick_id'));
                return redirect()->back()->with('message', 'Now your cow is Healthy');
            }
        }

    }

    public function show(Sick $sick)
    {

    }

    public function edit(Sick $sick)
    {
        //
    }

    public function update(Request $request, Sick $sick)
    {

    }

    public function destroy(Sick $sick)
    {
        $sick->delete();
        return redirect()->back()->with('errorMessage','Sick Entry Deleted');
    }
}
