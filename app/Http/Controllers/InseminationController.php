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

    public function show(Insemination $insermination)
    {
        //
    }

    public function edit(Insemination $insermination)
    {
        //
    }

    public function update(Request $request, Insemination $insermination)
    {
        //
    }

    public function destroy(Insemination $insermination)
    {
        //
    }
}
