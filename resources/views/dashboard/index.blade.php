@extends('layouts.nav')
@section('title', 'dashboard')

@section('app-content', 'app-content')
@section('more-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection
@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                                <div class="tabs-menu ">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li class=""><a href="#tab11" class="active" data-toggle="tab">Cow</a></li>
                                        <li><a href="#tab12" data-toggle="tab">Goat/Sheep</a></li>
                                        <li><a href="#tab13" data-toggle="tab">Poultry</a></li>
                                        <li><a href="#tab14" data-toggle="tab">Cultivation</a></li>
                                        <li><a href="#tab15" data-toggle="tab">Overall farm</a></li>
                                    </ul>
                                </div>

                        </div>
                        <div class="card-body">

                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active " id="tab11">
                                        <hr>
                                        <h3 class="text-center" style="font-weight: bold; font-size: 35px;">Overall Cow Details</h3>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="card card-counter bg-gradient-danger">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <h2 class="text-white mt-1 mb-0">Total Expenditure</h2>
                                                            </div>
                                                            <div class="mr-1 text-center">
                                                                <div class="mt-1 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$totalExpenditure}}</h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="card card-counter bg-gradient-teal">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <h2 class="text-white mt-1 mb-0">Total Income</h2>
                                                            </div>
                                                            <div class="col-5 text-center">
                                                                <div class="mt-1 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$totalIncome}}</h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-blue">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-eye mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$cows}}</h2>
                                                                    <p class="text-white mt-1">Total Cows</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-success ">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-basket mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$milkingCows}}</h2>
                                                                    <p class="text-white mt-1">Milking Cows</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-azure-dark">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-people mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$pregnantCows}}</h2>
                                                                    <p class="text-white mt-1">Pregnant Cows</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-pink">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-paper-plane mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$dryCows}}</h2>
                                                                    <p class="text-white mt-1 ">Dry Cows</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                        </div>
                                        <div class="row row-cards">
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gray-dark-dark">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="fa fa-line-chart mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h3 class="mb-0">{{$deadCows}}</h3>
                                                                    <p class="text-white mt-1">Dead Cows </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter badge-gradient-warning">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="fa fa-sign-out mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h3 class="mb-0">{{$sickCows}}</h3>
                                                                    <p class="text-white mt-1">Sick Cows </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-info">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="fa fa-reply-all mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h3 class="mb-0">{{$soldCows}}</h3>
                                                                    <p class="text-white mt-1 ">Sold Cows</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-teal">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="fa fa-suitcase mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h3 class="mb-0">34,762</h3>
                                                                    <p class="text-white mt-1">Supported projects </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                        </div>
                                        <hr>

                                        <!-- Tabs end -->

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Single Cow Milk Collection</h3>
                                                        <select name="" id="getCowID" style="position: absolute; right: 0px">
                                                                @foreach( $cowSerials as $cowSerial)
                                                                <option value="{{$cowSerial->account_head_id}}">{{$cowSerial->serial_no}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="card-body">
                                                          <canvas id="singleCowMilkCollection" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3 class="text-center" style="font-weight: bold">Today Total Collection</h3>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Single lineChart</h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="Chart" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3 class="text-center" style="font-weight: bold">Overall Total Collection</h3>
                                        <form action="">
                                            <div class="row">
                                                <div class="mb-3 col-md-3">
                                                    <label for="" class="form-label">Select Date Range :</label>
                                                    <input type="text" class="form-control" name="dates" placeholder="Select Range">
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Single Barchart</h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="Chart2" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3 class="text-center" style="font-weight: bold">Today Total Sale</h3>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Single Barchart</h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="Chart2" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3 class="text-center" style="font-weight: bold">Overall Total Sale</h3>
                                        <form action="">
                                            <div class="row">
                                                <div class="mb-3 col-md-3">
                                                    <label for="" class="form-label">Select Date Range :</label>
                                                    <input type="text" class="form-control" name="dates" placeholder="Select Range">
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Single Barchart</h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="Chart2" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab12">
                                        <h3>Total Expenditures:</h3>
                                        <h3>Total Income:</h3>
                                        <hr>
                                        <h3 class="text-center" style="font-weight: bold; font-size: 35px;">Overall Goat/Sheep Details</h3>

                                        <div class="row">
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-danger">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-eye mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">54,234</h2>
                                                                    <p class="text-white mt-1">Total Goat/Sheep</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-azure-dark ">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-basket mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">80,956</h2>
                                                                    <p class="text-white mt-1">Sick</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-success">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-people mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">34,762</h2>
                                                                    <p class="text-white mt-1">Dry</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-pink">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-paper-plane mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">25,789</h2>
                                                                    <p class="text-white mt-1 ">Dead</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                        </div>
                                        <div class="row row-cards">
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gray-dark-dark">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="fa fa-line-chart mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h3 class="mb-0">80,956</h3>
                                                                    <p class="text-white mt-1">Healthy</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter badge-gradient-warning">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="fa fa-sign-out mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h3 class="mb-0">54,234</h3>
                                                                    <p class="text-white mt-1">Sold</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-info">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="fa fa-reply-all mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h3 class="mb-0">25,789</h3>
                                                                    <p class="text-white mt-1 ">Vaccinated</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-teal">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="fa fa-suitcase mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h3 class="mb-0">34,762</h3>
                                                                    <p class="text-white mt-1">Pregnant</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                        </div>
                                        <hr>

                                        <h3 class="text-center" style="font-weight: bold;">Total Goat/Sheep Purchased</h3>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Single Barchart</h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="Chart2" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3 class="text-center" style="font-weight: bold">Total Goat/Sheep Sold</h3>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Single Barchart</h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="Chart2" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane " id="tab13">
                                        <h3>Total Expenditures:</h3>
                                        <h3>Total Income:</h3>
                                        <hr>
                                        <h3 class="text-center" style="font-weight: bold; font-size: 35px;">Overall Poultry Details</h3>
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-danger">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-eye mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">54,234</h2>
                                                                    <p class="text-white mt-1">Hens</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-azure-dark ">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-basket mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">80,956</h2>
                                                                    <p class="text-white mt-1">Chicks</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-success">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-people mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">34,762</h2>
                                                                    <p class="text-white mt-1">Eggs</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-pink">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-paper-plane mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">25,789</h2>
                                                                    <p class="text-white mt-1 ">Eggs Incubated</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                        </div>
                                        <hr>

                                        <h3 class="text-center" style="font-weight: bold">Total Eggs Collected</h3>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Single Barchart</h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="Chart2" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3 class="text-center" style="font-weight: bold">Total Eggs Collected</h3>
                                        <form action="">
                                            <div class="row">
                                                <div class="mb-3 col-md-3">
                                                    <label for="" class="form-label">Select Date Range :</label>
                                                    <input type="text" class="form-control" name="dates" placeholder="Select Range">
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Single Barchart</h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="Chart2" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3 class="text-center" style="font-weight: bold">Total Sold Eggs</h3>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Single Barchart</h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="Chart2" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3 class="text-center" style="font-weight: bold">Total Sold Eggs</h3>
                                        <form action="">
                                            <div class="row">
                                                <div class="mb-3 col-md-3">
                                                    <label for="" class="form-label">Select Date Range :</label>
                                                    <input type="text" class="form-control" name="dates" placeholder="Select Range">
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Single Barchart</h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="Chart2" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane  " id="tab14">
                                        <h3>Total Expenditures:</h3>
                                        <h3>Total Income:</h3>
                                        <hr>
                                        <h3 class="text-center" style="font-weight: bold; font-size: 35px;">Overall Cultivation Details</h3>
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-danger">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-eye mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">54,234</h2>
                                                                    <p class="text-white mt-1">Area Cultivated</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-azure-dark ">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-basket mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">80,956</h2>
                                                                    <p class="text-white mt-1">Wheat</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-success">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-people mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">34,762</h2>
                                                                    <p class="text-white mt-1">Corn</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-pink">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-paper-plane mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">25,789</h2>
                                                                    <p class="text-white mt-1 ">Cucumber</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- col end -->
                                        </div>
                                        <hr>

                                        <h3 class="text-center" style="font-weight: bold">Total Wheat Sold</h3>
                                        <form action="">
                                            <div class="row">
                                                <div class="mb-3 col-md-3">
                                                    <label for="" class="form-label">Select Date Range :</label>
                                                    <input type="text" class="form-control" name="dates" placeholder="Select Range">
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Single Barchart</h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="Chart2" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3 class="text-center" style="font-weight: bold">Total Corn Sold</h3>
                                        <form action="">
                                            <div class="row">
                                                <div class="mb-3 col-md-3">
                                                    <label for="" class="form-label">Select Date Range :</label>
                                                    <input type="text" class="form-control" name="dates" placeholder="Select Range">
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Single Barchart</h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="Chart2" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <h3 class="text-center" style="font-weight: bold">Total Cucumber Sold</h3>
                                        <form action="">
                                            <div class="row">
                                                <div class="mb-3 col-md-3">
                                                    <label for="" class="form-label">Select Date Range :</label>
                                                    <input type="text" class="form-control" name="dates" placeholder="Select Range">
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Single Barchart</h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="Chart2" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="tab-pane  " id="tab15">
                                        <h3>Total Expenditures:</h3>
                                        <h3>Total Income:</h3>
                                        <hr>
                                        <h3 class="text-center" style="font-weight: bold">Overall Farm Details</h3>
                                    </div>
                                </div>
                            </div>

                            <! -- Goat Tabs Content -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--      end side app --}}
    </div>
{{--   end container area--}}
@endsection
@section('more-script')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $('input[name="dates"]').daterangepicker();

        $('#getCowID').change(function()
        {
            let text = "";
            let singleCowMilkCollection = [];
            let account_head_id = this.value;
            $.ajax({
                url:"{{  route('dashboard.getSingleCowMilkCollection',"") }}/"+account_head_id,
                method:'get',
                success: function(result){
                    var ctx = document.getElementById("singleCowMilkCollection").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [
                                result.forEach((item) => {text += item;})
                            ],
                            datasets: [{
                                label: 'Milk Collection',
                                data: [

                                ],
                                borderWidth: 2,
                                backgroundColor: '#1753fc',
                                borderColor: '#1753fc',
                                borderWidth: 2.0,
                                pointBackgroundColor: '#ffffff',
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 150,
                                        fontColor: "#bbc1ca",
                                    },
                                    gridLines: {
                                        color: 'rgba(0,0,0,0.03)'
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                        display: true,
                                        fontColor: "#bbc1ca",
                                    },
                                    gridLines: {
                                        display: false,
                                        color: 'rgba(0,0,0,0.03)'
                                    }
                                }]
                            },
                        }
                    });
                }
            });
        });
    </script>
@endsection
