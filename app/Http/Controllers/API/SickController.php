<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sick;
use Illuminate\Http\Request;

class SickController extends Controller
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
        if (isset($_POST['submitGoat']))
        {
            if (Sick::where('cattle_id', $request->cattle_id )->where('is_sick',1)->exists())
            {
                return response()->json('This Goat is already sick',200);
            }
            Sick::create($request->except('submitGoat'));
            return response()->json('Sick Data Added.',200);
        }
        if (Sick::where('cattle_id', $request->cattle_id )->where('is_sick',1)->exists())
        {
            if (isset($_POST['submitHealthyGoat']))
            {
                Sick::create($request->except('submitHealthyGoat','sick_id'));
                return response()->json('Now Your Goat is Healthy',200);
            }
        }

        if (isset($_POST['submitCow']))
        {
            if (Sick::where('cattle_id', $request->cattle_id )->where('is_sick',1)->where('date',$request->date)->exists())
            {
                return response()->json('This Cow is already sick',200);
            }
            else
            {
                Sick::create($request->except('submitCow'));
                return response()->json('Sick Data Added.',200);
            }
        }

        if (Sick::where('cattle_id', $request->cattle_id )->where('is_sick',1)->exists())
        {
            if (isset($_POST['submitHealthyCow']))
            {
                Sick::create($request->except('submitHealthyCow','sick_id'));
                return response()->json( 'Now your cow is Healthy',200);
            }
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
