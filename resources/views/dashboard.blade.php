@extends('layouts.nav')
@section('title', 'dashboard')

@section('app-content', 'app-content')
@section('more-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection
@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Dashboard') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-menu-heading">
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

                            <! -- Cow Tabs Content -->

                            <div class="row row-cards">
                                <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                    <div class="card card-counter bg-gradient-purple">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-4 mb-0 text-white">
                                                        <h3 class="mb-0">80,956</h3>
                                                        <p class="text-white mt-1">Total Graph </p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <i class="fa fa-line-chart mt-3 mb-0 text-white-transparent"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                    <div class="card card-counter bg-gradient-secondary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-4 mb-0 text-white">
                                                        <h3 class="mb-0">54,234</h3>
                                                        <p class="text-white mt-1">Requesting Projects </p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <i class="fa fa-sign-out mt-3 mb-0 text-white-transparent"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                    <div class="card card-counter bg-gradient-warning">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-4 mb-0 text-white">
                                                        <h3 class="mb-0">25,789</h3>
                                                        <p class="text-white mt-1 ">Requests Receiving</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <i class="fa fa-reply-all mt-3 mb-0 text-white-transparent"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                    <div class="card card-counter bg-gradient-success">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-4 mb-0 text-white">
                                                        <h3 class="mb-0">34,762</h3>
                                                        <p class="text-white mt-1">Supported projects </p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <i class="fa fa-suitcase mt-3 mb-0 text-white-transparent"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>

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
                                                        <p class="text-white mt-1">Daily Visitors </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                    <div class="card card-counter bg-gradient-secondary ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <i class="si si-basket mt-3 mb-0 text-white-transparent"></i>
                                                </div>
                                                <div class="col-8 text-center">
                                                    <div class="mt-4 mb-0 text-white">
                                                        <h2 class="mb-0">80,956</h2>
                                                        <p class="text-white mt-1">Daily Orders </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                        <p class="text-white mt-1">Daily  Customers</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                        <p class="text-white mt-1 ">Daily Revenue</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-cards">
                                <div class="col-lg-1"></div>
                                <div class="col-sm-12 col-md-6 col-lg-2">
                                    <div class="card" style="background: mediumseagreen; ">
                                        <div class="card-body text-center list-icons">
                                            <i class="si si-briefcase text-primary"></i>
                                            <p class="card-text mt-3 mb-3">Total Projects</p>
                                            <p class="h1 text-center  text-primary">459</p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-12 col-md-6 col-lg-2">
                                    <div class="card">
                                        <div class="card-body text-center list-icons">
                                            <i class="si si-basket-loaded text-secondary"></i>
                                            <p class="card-text mt-3 mb-3">New Sales</p>
                                            <p class="h1 text-center  text-secondary">262</p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-12 col-md-6 col-lg-2">
                                    <div class="card">
                                        <div class="card-body text-center list-icons">
                                            <i class="si si-people text-warning"></i>
                                            <p class="card-text mt-3 mb-3">Employees</p>
                                            <p class="h1 text-center  text-warning">789</p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-12 col-md-6 col-lg-2">
                                    <div class="card">
                                        <div class="card-body text-center list-icons">
                                            <i class="si si-eye text-success"></i>
                                            <p class="card-text mt-3 mb-3">Customer Visitis</p>
                                            <p class="h1 text-center text-success">2635</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-2 ">
                                    <div class="card">
                                        <div class="card-body text-center list-icons">
                                            <i class="si si-eye text-success"></i>
                                            <p class="card-text mt-3 mb-3">Customer Visitis</p>
                                            <p class="h1 text-center text-success">2635</p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active " id="tab11">
                                        <h4 style="font-family: Calibri; font-weight: bold; ">Cows Details</h4>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex clearfix">
                                                            <div class="text-left mt-3">
                                                                <p class="card-text  mb-1">Total Cows</p>
                                                                <h2 class="mb-0 text-dark mainvalue">6,895</h2>
                                                            </div>
                                                            <div class="ml-auto">
                                                                <span class="bg-primary-transparent icon-service text-primary ">
                                                                    <i class="si si-briefcase  fs-2"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-lg-6 col-xl-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex clearfix">
                                                            <div class="text-left mt-3">
                                                                <p class="card-text  mb-1">Pregnant Cows</p>
                                                                <h2 class="mb-0 text-dark mainvalue">8,379</h2>
                                                            </div>
                                                            <div class="ml-auto">
                                                    <span class="bg-success-transparent icon-service text-success">
                                                        <i class="si si-layers fs-2"></i>
                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-lg-6 col-xl-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex clearfix">
                                                            <div class="text-left mt-3">
                                                                <p class="card-text  mb-1">Healthy Cow</p>
                                                                <h2 class="mb-0 text-dark mainvalue">1,345</h2>
                                                            </div>
                                                            <div class="ml-auto">
                                                    <span class="bg-danger-transparent icon-service text-danger">
                                                        <i class="si si-note  fs-2"></i>
                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-lg-6 col-xl-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex clearfix">
                                                            <div class="text-left mt-3">
                                                                <p class="card-text  mb-1">Sick Cows</p>
                                                                <h2 class="mb-0 text-dark mainvalue">2,456K</h2>
                                                            </div>
                                                            <div class="ml-auto">
                                                    <span class="bg-warning-transparent icon-service text-warning">
                                                        <i class="si si-basket-loaded  fs-2"></i>
                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-lg-6 col-xl-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex clearfix">
                                                            <div class="text-left mt-3">
                                                                <p class="card-text mb-1">Milky Cows</p>
                                                                <h2 class="mb-0 text-dark mainvalue">2,456K</h2>
                                                            </div>
                                                            <div class="ml-auto">
                                                    <span class="bg-warning-transparent icon-service text-warning">
                                                        <i class="si si-basket-loaded  fs-2"></i>
                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h3 style="text-align: center;">Milk Collection Details</h3>
                                        <form action="">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="" class="form-label">Select Date Range :</label>
                                                    <input type="text" class="form-control" name="dates" placeholder="Select Range">
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Single lineChart</h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="Chart" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Single Barchart</h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="Chart2" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Line Chart </h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="sales-chart" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Area Chart </h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="team-chart" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Bar Chart </h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="barChart" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Radar Chart </h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="radarChart" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Area Chart </h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="lineChart" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Dought Chart </h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="doughutChart" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Line Chart </h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="pieChart" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Polar Chart </h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="polarChart" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab12">
                                        <h3>Goat tab</h3>
                                    </div>
                                    <div class="tab-pane " id="tab13">
                                        <h3>Poultry Tab</h3>
                                    </div>
                                    <div class="tab-pane  " id="tab14">
                                        <h3>Cultivation tab</h3>
                                    </div>
                                    <div class="tab-pane  " id="tab15">
                                        <h3>Overall farm tab</h3>
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

@endsection
