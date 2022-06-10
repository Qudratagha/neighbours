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
                                        <li class=""><a href="#tab11" class="active"  data-toggle="tab">Cow</a></li>
                                        <li><a href="#tab12" data-toggle="tab">Goat/Sheep</a></li>
                                        <li><a href="#tab13"  data-toggle="tab">Poultry</a></li>
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
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                <div class="card card-counter bg-gradient-danger">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-8 col-sm-12">
                                                                <h2 class="text-white mt-1 mb-0">Total Expenditure</h2>
                                                            </div>
                                                            <div class="mr-1 text-center">
                                                                <div class="mt-1 mb-0 text-white">
                                                                    <h2 class="mb-0">PKR: {{$totalCowExpenditure}}</h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                <div class="card card-counter bg-gradient-teal">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-8 col-sm-12">
                                                                <h2 class="text-white mt-1 mb-0">Total Income</h2>
                                                            </div>
                                                            <div class="mr-1 text-center">
                                                                <div class="mt-1 mb-0 text-white">
                                                                    <h2 class="mb-0">PKR: {{$totalCowIncome}}</h2>
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
                                                        <h3 class="card-title">Single Cow Milk Collection in Last 30 Days</h3>
                                                    </div>
                                                    <div class="card-body">
                                                          <canvas id="singleCowMilkCollection" class="h-300 chartjs-render-monitor" width="528" height="300" style="display: block; width: 528px; height: 300px;"></canvas>
                                                        <div  style="position: absolute !important; right: 0px">
                                                            <select class="form-control custom-control" id="getCowID">
                                                                <option selected disabled>Choose Cow to Show Milk Collection Data</option>
                                                                @foreach( $cowSerials as $cowSerial)
                                                                    <option value="{{$cowSerial->account_head_id}}">{{$cowSerial->serial_no}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Total Milk Collected and Sold</h3>
                                                </div>
                                                <div class="card-body">
                                                    <canvas id="milkCollectionSold" class="h-200"></canvas>
                                                    <div class="form-floating row" style="position: absolute; right: 0%; padding-right: 8px">
                                                        <div class="form-floating">
                                                            <input type="date" id="startDateMilkCollectionSold" class="form-control">
                                                            <label for="startDateMilkCollectionSold">Start</label>
                                                        </div>
                                                        <div class="form-floating">
                                                            <input type="date" id="endDateMilkCollectionSold" class="form-control">
                                                            <label for="endDateMilkCollectionSold">End</label>
                                                        </div>
                                                    </div>
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
                                    <div class="tab-pane" id="tab13">

                                        <hr>
                                        <h3 class="text-center" style="font-weight: bold; font-size: 35px;">Overall Poultry Details</h3>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-info">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 text-center">
                                                                <h2 class="text-white mt-1 mb-0">Total Expeniture</h2>
                                                            </div>
                                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                                                                <div class="mt-2 mb-0 text-white">
                                                                    <?php
                                                                    $poultryExpenditure = \App\Models\Poultry:: poultryExpenditure();;
                                                                    ?>
                                                                        <h2 class="mb-0">{{$poultryExpenditure}}</h2>
{{--                                                                    <p class="text-white mt-1">Total Hens</p>--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-primary">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 text-center">
                                                                <h2 class="text-white mt-1 mb-0">Total Income</h2>
                                                            </div>
                                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                                                                <div class="mt-2 mb-0 text-white">
                                                                    <?php
                                                                    $poultryExpenditure = \App\Models\Poultry:: poultryIncome();;
                                                                    ?>
                                                                    <h2 class="mb-0">{{$poultryExpenditure}}</h2>
                                                                    {{--                                                                    <p class="text-white mt-1">Total Hens</p>--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
{{--                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">--}}
{{--                                                <div class="card card-counter bg-gradient-danger">--}}
{{--                                                    <div class="card-body">--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="d-none d-sm-none d-md-block">--}}
{{--                                                                <h2 class="text-white mt-1 mb-0">Total Expeniture</h2>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="text-center col-xl-4 col-lg-6 col-md-5 col-sm-12">--}}
{{--                                                                <div class="mt-1 mb-0 text-white">--}}
{{--                                                                    <?php--}}
{{--                                                                    $poultryExpenditure = \App\Models\Poultry:: poultryExpenditure();--}}
{{--                                                                    ?>--}}
{{--                                                                    <h2 class="mb-0">{{$poultryExpenditure}}</h2>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div><!-- col end -->--}}
{{--                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">--}}
{{--                                                <div class="card card-counter bg-gradient-teal">--}}
{{--                                                    <div class="card-body">--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-lg-8 col-md-8 col-sm-12">--}}
{{--                                                                <h2 class="text-white mb-0">Total Income</h2>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="text-center col-lg-4 col-md-4 col-sm-12">--}}
{{--                                                                <div class="mt-1 mb-0 text-white">--}}
{{--                                                                    <?php--}}
{{--                                                                    $poultryIncome = \App\Models\Poultry:: poultryIncome();--}}
{{--                                                                    ?>--}}
{{--                                                                    <h2 class="mb-0">{{$poultryIncome}}</h2>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div><!-- col end -->--}}
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-danger">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-eye mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <?php
                                                                    $purchaseMsaleMdie = \App\Models\Poultry:: purchaseMsaleMdie();
                                                                    ?>
                                                                    <h2 class="mb-0">{{$purchaseMsaleMdie}}</h2>
                                                                    <p class="text-white mt-1">Total Hens</p>
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
                                                                    <?php
                                                                    $totalRemainingChicks = \App\Models\Poultry:: totalRemainingChicks();
                                                                    ?>
                                                                    <h2 class="mb-0">{{$totalRemainingChicks}}</h2>
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
                                                                    <?php
                                                                    $totalEggsCollected = \App\Models\Poultry::totalEggsCollected();
                                                                    ?>
                                                                    <h2 class="mb-0">{{$totalEggsCollected}}</h2>
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
                                                                    <?php
                                                                    $incubatedEggs = \App\Models\Poultry::eggincMchickCollected();
                                                                    ?>
                                                                    <h2 class="mb-0">{{$incubatedEggs}}</h2>
                                                                    <p class="text-white mt-1 ">Eggs Incubated</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                        <hr>

                                        <h3 class="text-center" style="font-weight: bold"></h3>
                                        <div class="row">
                                            <div class="col-lg-10 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <?php
                                                        $totalEggsCollected = \App\Models\Poultry::totalEggsCollected();
                                                        ?>

                                                        <h3 class="card-title">Eggs Collected And Egg Sale</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <canvas id="totalEggsChart" class="h-400"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <?php
                                                        $totalEggsCollected = \App\Models\Poultry::where('poultry_type_id', 3)->where('poultry_status_id', 4)->where('account_head_id', 8)->sum('quantity');
                                                        ?>
                                                        <h3 class="card-title">{{$totalEggsCollected}}</h3>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Hen Calculation </h3>
                                                    </div>
                                                    <canvas id="henPurchaseSaleDie" class="h-400"></canvas>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Chick Calculation </h3>
                                                    </div>
                                                    <canvas id="chickCollected" class="h-400"></canvas>
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
        var ctx = document.getElementById("totalEggsChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($eggCollected as $collected)
                        "{{ $collected->created_at }}",
                    @endforeach
                ],
                datasets:
                    [{
                        label: "Egg Collected",
                        data: [
                            @foreach ($eggCollected as $collected)
                            "{{ $collected->quantity }}",
                            @endforeach
                        ],
                        borderColor: "#1753fc",
                        borderWidth: "0",
                        backgroundColor: "#1753fc"
                    }, {
                        label: "Egg Sale",
                        data: [
                            @foreach ($eggSale as $sale)
                                "{{ $sale->totalQuantity }}",
                            @endforeach
                        ],
                        borderColor: "#9258f1",
                        borderWidth: "0",
                        backgroundColor: "#9258f1"
                    }]

            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true
                },
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
                legend: {
                    labels: {
                        fontColor: "#bbc1ca"
                    },
                },
            }
        });


        var ctx = document.getElementById("henPurchaseSaleDie");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        {{$totalPurchaseHens}},

                        {{$totalSaleHens}},
                        {{ $totalDieHens }},
                        {{$totalRemainingHens}}
                            ],
                    backgroundColor: ['#1753fc', ' #00b3ff', '#9258f1', '#68b2bb'],
                    hoverBackgroundColor: ['#1753fc', ' #00b3ff', '#9258f1','#68b2bb'],
                    borderColor:'transparent',
                }],
                labels: ["Hen Purchase", "Hen Sale", "Hen Die","Remaining Hens"]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    labels: {
                        fontColor: "#bbc1ca"
                    },
                },
            }
        });
        var ctx = document.getElementById("chickCollected");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        {{$totalChicksCollected}},

                        {{$totalchickSale}},
                        {{ $totalDieChicks }},
                        {{$totalRemainingChicks}}

                    ],
                    backgroundColor: ['#1753fc', ' #00b3ff', '#9258f1','#68b2bb'],
                    hoverBackgroundColor: ['#1753fc', ' #00b3ff', '#9258f1','#68b2bb'],
                    borderColor:'transparent',
                }],
                labels: ["collected chicks", "chick Sale", "chick Die","Remaining chicks"]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    labels: {
                        fontColor: "#bbc1ca"
                    },
                },
            }
        });
        var ctx = myChart = null;
        var chart_label = [];
        var chart_data = [];
        $(function(){
            ctx = document.getElementById("singleCowMilkCollection").getContext('2d');
            initializeChart();
            getSingleCowMilkCollectionData($('#getCowID').val());
            $('#getCowID').change(function() {
                getSingleCowMilkCollectionData(this.value);
            });
        });

        function initializeChart() {
            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: chart_label,
                    datasets: [{
                        label: 'Milk Collection',
                        data: chart_data,
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
                                stepSize: 100,
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
        function getSingleCowMilkCollectionData(account_head_id) {
            chart_label = [];
            chart_data = [];
            $.ajax({
                url:"{{  route('dashboard.getSingleCowMilkCollection',"") }}/"+account_head_id,
                method:'get',
                success: function(result){
                    result.forEach((item) => {
                        chart_label.push(item.date);
                        chart_data.push(item.quantity);
                    });
                    myChart.destroy();
                    initializeChart();
                }
            });
        }



        //milkCollectionSold
        chart_data_sale = [];
        chart_label_sale = [];
        var startDateMilkCollectionSold = endDateMilkCollectionSold = null;
        $('#startDateMilkCollectionSold').change(function() {
             startDateMilkCollectionSold = this.value;

            $('#endDateMilkCollectionSold').change(function() {
                endDateMilkCollectionSold = this.value;
                $.ajax({
                    url:"{{route('dashboard.getMilkCollectionSaleData',["",""])}}/"+startDateMilkCollectionSold+"/"+endDateMilkCollectionSold,
                    method:'get',
                    success: function(result){
                        console.log(result);
                        result.milkCollectionDates.forEach((item) => {
                            chart_label.push(item.date);
                        });
                        result.milkSaleDates.forEach((item) => {
                            chart_label_sale.push(item.date);
                        });
                        result.milkCollectionData.forEach((item) => {
                            chart_data.push(item.quantity);
                        });
                        result.milkSaleData.forEach((item) => {
                            chart_data_sale.push(item.quantity);
                        });
                        var ctx = document.getElementById("milkCollectionSold");
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: chart_label,
                                datasets: [{
                                    label: "collection",
                                    data: chart_data,
                                    borderColor: "#1753fc",
                                    borderWidth: "0",
                                    backgroundColor: "#1753fc"
                                }, {
                                    label: "sale",
                                    data: chart_data_sale,
                                    borderColor: "#9258f1",
                                    borderWidth: "0",
                                    backgroundColor: "#9258f1"
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: {
                                    xAxes: [{
                                        ticks: {
                                            fontColor: "#bbc1ca",
                                        },
                                        gridLines: {
                                            color: 'rgba(0,0,0,0.03)'
                                        }
                                    }],
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true,
                                            fontColor: "#bbc1ca",
                                        },
                                        gridLines: {
                                            color: 'rgba(0,0,0,0.03)'
                                        },
                                    }]
                                },
                                legend: {
                                    labels: {
                                        fontColor: "#bbc1ca"
                                    },
                                },
                            }
                        });
                    }
                });
            });
        });

    </script>
@endsection
