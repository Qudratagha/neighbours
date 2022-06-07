<?php

namespace App\Http\Controllers;

use App\Models\Cattle;
use App\Models\Pregnant;
use App\Models\Sick;
use Carbon\Traits\Localization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.gates');
    }
    public function index()
    {
        abort_if(Gate::denies('dashboard-read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //Goats Details
        $allGoats = Cattle::where('cattle_type_id', 2)->where('saleStatus', 0)->where('dead_date', Null)->count();
        $maleGoats= Cattle::where('cattle_type_id', 2)->where('saleStatus', 0)->where('dead_date', Null)->where('gender', 1)->count();
        $femaleGoats = Cattle::where('cattle_type_id', 2)->where('saleStatus', 0)->where('dead_date', Null)->where('gender', 0)->count();
        $pregnantGoats = Pregnant::with('cattle')->count();
        $sickGoats = Sick::with('cattle')->count();
        $soldGoats = Cattle::where('cattle_type_id', 2)->where('saleStatus', 1)->count();
        $dryGoats = Cattle::where('cattle_type_id', 2)->where('gender', 0)->whereNotNull('dry_date')->count();
        $deadGoats = Cattle::where('cattle_type_id', 2)->whereNotNull('dead_date')->count();

        //Sheep Details
        $allSheeps = Cattle::where('cattle_type_id', 3)->where('saleStatus', 0)->where('dead_date', Null)->count();
        $maleSheeps= Cattle::where('cattle_type_id', 3)->where('saleStatus', 0)->where('dead_date', Null)->where('gender', 1)->count();
        $femaleSheeps = Cattle::where('cattle_type_id', 3)->where('saleStatus', 0)->where('dead_date', Null)->where('gender', 0)->count();
        $pregnantSheeps = Pregnant::with('cattle')->count();
        $sickSheeps = Sick::with('cattle')->count();
        $soldSheeps = Cattle::where('cattle_type_id', 3)->where('saleStatus', 1)->count();
        $drySheeps = Cattle::where('cattle_type_id', 3)->where('gender', 0)->whereNotNull('dry_date')->count();
        $deadSheeps = Cattle::where('cattle_type_id', 3)->whereNotNull('dead_date')->count();

        return view('/dashboard.index', compact('allGoats', 'maleGoats', 'femaleGoats', 'pregnantGoats', 'sickGoats', 'soldGoats', 'dryGoats', 'deadGoats', 'allSheeps', 'maleSheeps', 'femaleSheeps', 'pregnantSheeps', 'sickSheeps', 'soldSheeps', 'drySheeps', 'deadSheeps'));
    }
}
