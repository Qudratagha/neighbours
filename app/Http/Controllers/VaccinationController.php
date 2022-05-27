<?php

namespace App\Http\Controllers;

use App\Models\AccountHead;
use App\Models\Medicines;
use App\Models\Vaccination;
use Illuminate\Http\Request;

class VaccinationController extends Controller
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
        if (isset($_POST['submitGoat']))
        {
            $goatID = $request->serial_no;

            $sub_head_id = AccountHead::where('name', "goat#$goatID")->pluck('id')->last();
            if ($sub_head_id != '')
            {
                $request['sub_head_id'] = $sub_head_id;
                Vaccination::create($request->except(['serial_no','submitGoat']));
                return redirect()->back()->with('message', 'Vaccination Added');
            }
            else return redirect()->back()->with('message', 'Please Add Milk Data First');
        }

        if (isset($_POST['submitCow']))
        {
            $cowID = $request->serial_no;

            $sub_head_id = AccountHead::where('name', "cow#$cowID")->pluck('id')->last();

            if ($sub_head_id != '')
            {
                $request['sub_head_id'] = $sub_head_id;
                Vaccination::create($request->except(['serial_no','submitCow']));
                return redirect()->back()->with('message', 'Vaccination Added');
            }
            else return redirect()->back()->with('message', 'Please Add Milk Data First');
        }
    }

    public function show(Vaccination $vaccination)
    {
        //
    }

    public function edit(Vaccination $vaccination)
    {
        //
    }

    public function update(Request $request, Vaccination $vaccination)
    {
        //
    }

    public function destroy(Vaccination $vaccination)
    {
        $vaccination->delete();
        return redirect()->back()->with('errorMessage','Vaccination Entry Deleted');
    }
}
