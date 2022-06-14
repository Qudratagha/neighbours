<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pregnant;
use Illuminate\Http\Request;

class PregnantController extends Controller
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
            if (Pregnant::where('cattle_id', $request->cattle_id)->where('is_pregnant', 1)->exists()){
                return response()->json( 'This Goat is Already Pregnant',200);
            }
            Pregnant::create($request->except('submitGoat'));
            return response()->json('Pregnant Data Added',200);
        }

        if (isset($_POST['submitCowPregnant']))

        {
            if (Pregnant::where('cattle_id', $request->cattle_id )->where('is_pregnant',1)->where('date',$request->date)->exists())
            {
                return response()->json('This Cow is already Pregnant',200);
            }
            else
            {
                Pregnant::create($request->except('submitCowPregnant'));
                return response()->json('Pregnant Cow Data Added.',200);
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
