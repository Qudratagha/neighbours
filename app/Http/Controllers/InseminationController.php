<?php

namespace App\Http\Controllers;

use App\Models\Insemination;
use Illuminate\Http\Request;

class InseminationController extends Controller
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
        Insemination::create($request->all());
        return redirect()->back()->with('message','Insemination data inserted');
    }

    public function show(Insemination $insemination)
    {
        //
    }

    public function edit(Insemination $insemination)
    {
        //
    }

    public function update(Request $request, Insemination $insemination)
    {
        //
    }

    public function destroy(Insemination $insemination)
    {
        $insemination->delete();
        return redirect()->back()->with('errorMessage','Insemination Entry Deleted');
    }
}
