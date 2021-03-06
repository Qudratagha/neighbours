@extends('layouts.nav')
@section('title', 'dashboard')

@section('app-content', 'app-content')
@section('more-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection
@section('main-content')
    <div class="container content-area">
        <div class="sideapp">
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12 col">
                    <div class="card">
                        <div class="card-header">
                            <div class="tabs-menu ">
                                <!-- Tabs -->
                                <nav class="navbar navbar-expand-sm navbar-light">
                                    <a class="navbar-brand" href="#"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav nav nav-tabs myTab" data-bs-toggle="tab">
                                            <li class="nav-item active"><a href="#tab11" data-bs-toggle="tab">Cow</a></li>
                                            <li><a href="#tab12" data-bs-toggle="tab">Goat/Sheep</a></li>
                                            <li><a href="#tab13" data-bs-toggle="tab">Poultry</a></li>
                                            <li><a href="#tab14" data-bs-toggle="tab">Cultivation</a></li>
                                            <li><a href="#tab15" data-bs-toggle="tab">Overall farm</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="tab11">
                                        <hr>
                                        <h3 class="text-center" style="font-weight: bold; font-size: 35px;">Overall Cow Details</h3>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-info">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 text-center">
                                                                <h2 class="text-white mt-1 mb-0">Total Expenditure</h2>
                                                            </div>
                                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                                                                <div class="mt-2 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$totalCowExpenditure}}</h2>
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
                                                                    <h2 class="mb-0">{{$totalCowIncome}}</h2>
                                                                    {{--                                                                    <p class="text-white mt-1">Total Hens</p>--}}
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
                                                        <div  style="position: absolute !important; right: 0px">
                                                            <select class="form-control custom-control" id="getCowID">
                                                                <option selected disabled>Choose Cow to Show Milk Collection Data</option>
                                                                @foreach( $milkingCowSerials as $milkingCowSerial)
                                                                    <option value="{{$milkingCowSerial->sub_head_id}}">{{$milkingCowSerial->accountSubHead->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <canvas id="singleCowMilkCollection" class="h-300 chartjs-render-monitor" width="528" height="300" style="display: block; width: 528px; height: 300px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane show" id="tab12">
                                        <h3>Total Expenditures:</h3>
                                        <h3>Total Income:</h3>
                                        <hr>
                                        <h3 class="text-center" style="font-weight: bold; font-size: 35px;">Overall Goat Details</h3>

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
                                                                    <h2 class="mb-0">{{$allGoats}}</h2>
                                                                    <p class="text-white mt-1">Total Goat</p>
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
                                                                    <h2 class="mb-0">{{$maleGoats}}</h2>
                                                                    <p class="text-white mt-1">Male</p>
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
                                                                    <h2 class="mb-0">{{$femaleGoats}}</h2>
                                                                    <p class="text-white mt-1">Female</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-teal">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="fa fa-suitcase mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h3 class="mb-0">{{$pregnantGoats}}</h3>
                                                                    <p class="text-white mt-1">Pregnant</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <!-- col end -->
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
                                                                    <h3 class="mb-0">{{$sickGoats}}</h3>
                                                                    <p class="text-white mt-1">Sick</p>
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
                                                                    <h3 class="mb-0">{{$soldGoats}}</h3>
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
                                                                    <h3 class="mb-0">{{$dryGoats}}</h3>
                                                                    <p class="text-white mt-1 ">Dry</p>
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
                                                                    <h2 class="mb-0">{{$deadGoats}}</h2>
                                                                    <p class="text-white mt-1 ">Dead</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                        </div>
                                        <hr>

                                        <!-- Sheep -->
                                        <h3 class="text-center" style="font-weight: bold; font-size: 35px;">Overall Sheep Details</h3>
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
                                                                    <h2 class="mb-0">{{$allSheeps}}</h2>
                                                                    <p class="text-white mt-1">Total Sheep</p>
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
                                                                    <h2 class="mb-0">{{$maleSheeps}}</h2>
                                                                    <p class="text-white mt-1">Male</p>
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
                                                                    <h2 class="mb-0">{{$femaleSheeps}}</h2>
                                                                    <p class="text-white mt-1">Female</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-teal">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="fa fa-suitcase mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h3 class="mb-0">{{$pregnantSheeps}}</h3>
                                                                    <p class="text-white mt-1">Pregnant</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                            <!-- col end -->
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
                                                                    <h3 class="mb-0">{{$sickSheeps}}</h3>
                                                                    <p class="text-white mt-1">Sick</p>
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
                                                                    <h3 class="mb-0">{{$soldSheeps}}</h3>
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
                                                                    <h3 class="mb-0">{{$drySheeps}}</h3>
                                                                    <p class="text-white mt-1 ">Dry</p>
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
                                                                    <h2 class="mb-0">{{$deadSheeps}}</h2>
                                                                    <p class="text-white mt-1 ">Dead</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- col end -->
                                        </div>
                                        <hr>
                                        <h3 class="text-center" style="font-weight: bold;">Total Goats Purchased/Sold</h3>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Goat</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <canvas id="goatPurchasedSold" class="h-200"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3 class="text-center" style="font-weight: bold">Total Sheeps Purchased/Sold</h3>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Sheep</h3>
                                                    </div>
                                                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="sheepPurchasedSold" class="h-200 chartjs-render-monitor" width="528" height="200" style="display: block; width: 528px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane show" id="tab13">
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
                                        </div>
                                        <hr>
                                        <h3 class="text-center" style="font-weight: bold"></h3>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Eggs Collected </h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <canvas id="totalEggsCollectionChart" class="h-400"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Eggs Sale </h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <canvas id="totalEggsSaleChart" class="h-400"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Hen Calculation </h3>
                                                    </div>
                                                    <canvas id="henPurchaseSaleDie" class="h-400"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Chick Calculation </h3>
                                                    </div>
                                                    <canvas id="chickCollected" class="h-400"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane show" id="tab14">
                                        <h3>Total Expenditures:</h3>
                                        <h3>Total Income:</h3>
                                        <hr>
                                        <h3 class="text-center" style="font-weight: bold; font-size: 35px;">Wheat Details</h3>
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-danger">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-eye mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$wheatAreaCultivated}}</h2>
                                                                    <p class="text-white mt-1">Area Cultivated</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-azure-dark ">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-basket mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$wheatCollected}} Kg</h2>
                                                                    <p class="text-white mt-1">Collected Wheat</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-success">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-people mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$wheatSold}} Kg</h2>
                                                                    <p class="text-white mt-1">Sold Wheat</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <h3 class="text-center" style="font-weight: bold; font-size: 35px;">Corn Details</h3>
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-danger">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-eye mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$cornAreaCultivated}}</h2>
                                                                    <p class="text-white mt-1">Area Cultivated</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-azure-dark ">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-basket mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$cornCollected}} Kg</h2>
                                                                    <p class="text-white mt-1">Collected Corn</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-success">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-people mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$cornSold}} Kg</h2>
                                                                    <p class="text-white mt-1">Sold Corn</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <h3 class="text-center" style="font-weight: bold; font-size: 35px;">Cucumber Details</h3>
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-danger">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-eye mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$cucumberAreaCultivated}}</h2>
                                                                    <p class="text-white mt-1">Area Cultivated</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-azure-dark ">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-basket mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$cucumberCollected}} Kg</h2>
                                                                    <p class="text-white mt-1">Collected Cucumber</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-success">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <i class="si si-people mt-3 mb-0 text-white-transparent"></i>
                                                            </div>
                                                            <div class="col-8 text-center">
                                                                <div class="mt-4 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$cucumberSold}} Kg</h2>
                                                                    <p class="text-white mt-1">Sold Cucumber</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="card"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand"
                                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" 						style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                <div class="card-header">
                                                    <h3 class="card-title">Total Cultivation Collected </h3>
                                                </div>
                                                <canvas id="totalCulativationCollected" class="h-400 chartjs-render-monitor" height="456" style="display: block; width: 1183px; height: 456px;" width="1183"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="card"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand"
                                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" 						style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                <div class="card-header">
                                                    <h3 class="card-title">Total Cultivation Sale </h3>
                                                </div>
                                                <canvas id="totalCulativationSale" class="h-400 chartjs-render-monitor" height="456" style="display: block; width: 1183px; height: 456px;" width="1183"></canvas>
                                            </div>
                                        </div>
                                        </div>


                                    </div>
                                    <div class="tab-pane show" id="tab15">
{{--                                        <h3>Total Expenditures:</h3>--}}
{{--                                        <h3>Total Income:</h3>--}}
                                        <hr>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-info">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 text-center">
                                                                <h2 class="text-white mt-1 mb-0">Cow Expeniture</h2>
                                                            </div>
                                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                                                                <div class="mt-2 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$totalCowExpenditure}}</h2>

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
                                                                <h2 class="text-white mt-1 mb-0">Cow Income</h2>
                                                            </div>
                                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                                                                <div class="mt-2 mb-0 text-white">
                                                                    <h2 class="mb-0">{{$totalCowIncome}}</h2>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col end -->
                                        </div>

{{--                                        <h3 class="text-center" style="font-weight: bold">Goat Sheep Details</h3>--}}
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-info">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 text-center">
                                                                <h2 class="text-white mt-1 mb-0">Goat Sheep Expeniture</h2>
                                                            </div>
                                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                                                                <div class="mt-2 mb-0 text-white">
                                                                    <h2 class="mb-0">0</h2>

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
                                                                <h2 class="text-white mt-1 mb-0">Goat Sheep Income</h2>
                                                            </div>
                                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                                                                <div class="mt-2 mb-0 text-white">
                                                                    <h2 class="mb-0">0</h2>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- col end -->

                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-info">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 text-center">
                                                                <h2 class="text-white mt-1 mb-0">Poultry Expeniture</h2>
                                                            </div>
                                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                                                                <div class="mt-2 mb-0 text-white">
                                                                    <?php
                                                                    $poultryExpenditure = \App\Models\Poultry:: poultryExpenditure();;
                                                                    ?>
                                                                    <h2 class="mb-0">{{$poultryExpenditure}}</h2>
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
                                                                <h2 class="text-white mt-1 mb-0">Poultry Income</h2>
                                                            </div>
                                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                                                                <div class="mt-2 mb-0 text-white">
                                                                    <?php
                                                                    $poultryIncome = \App\Models\Poultry:: poultryIncome();;
                                                                    ?>
                                                                    <h2 class="mb-0">{{$poultryIncome}}</h2>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- col end -->
{{--                                        <h3 class="text-center" style="font-weight: bold">Cultivation Details</h3>--}}
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="card card-counter bg-gradient-info">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 text-center">
                                                                <h2 class="text-white mt-1 mb-0">Cultivation Expeniture</h2>
                                                            </div>
                                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                                                                <div class="mt-2 mb-0 text-white">
                                                                    <h2 class="mb-0">0</h2>

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
                                                                <h2 class="text-white mt-1 mb-0">Cultivation Income</h2>
                                                            </div>
                                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                                                                <div class="mt-2 mb-0 text-white">
                                                                    <h2 class="mb-0">0</h2>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- col end -->
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
        var ctx = document.getElementById("totalEggsCollectionChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($eggCollected as $collected)
                    "{{ $collected->created_at }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Collection',
                    data: [
                        @foreach ($eggCollected as $collected)
                            "{{ $collected->quantity }}",
                        @endforeach
                        ],

                    borderWidth: 2,
                    backgroundColor: 'rgba(59,175,238,0.73)',
                    borderColor: 'rgba(59,175,238,0.73)',
                    borderWidth: 2.0,
                    pointBackgroundColor: '#ffffff',
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
        })
        var ctx = document.getElementById("totalEggsSaleChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($eggSale as $collected)
                        "{{ $collected->date }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Sale',
                    data: [
                        @foreach ($eggSale as $collected)
                            "{{ $collected->totalQuantity }}",
                        @endforeach
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
        })

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

        $('a[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('.myTab a[href="' + activeTab + '"]').tab('show');
        }

        var ctx = document.getElementById("totalCulativationCollected");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        {{$wheatCollected}},

                        {{$cornCollected}},
                        {{ $cucumberCollected }}

                    ],
                    backgroundColor: ['#1753fc', ' #00b3ff', '#9258f1'],
                    hoverBackgroundColor: ['#1753fc', ' #00b3ff', '#9258f1'],
                    borderColor:'transparent',
                }],
                labels: ["Wheat Collected", "Corn Collected", "Cucumber Collected"]
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
        var ctx = document.getElementById("totalCulativationSale");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        {{$wheatSold}},

                        {{$cornSold}},
                        {{ $cucumberSold }}

                    ],
                    backgroundColor: ['#04c2d9', ' #e5ff49', '#cb3592'],
                    hoverBackgroundColor: ['#04c2d9', ' #e5ff49', '#cb3592'],
                    borderColor:'transparent',
                }],
                labels: ["Wheat Sale", "Corn Sale", "Cucumber Sale"]
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

        $("button").click(function() {
            $("#tab14").toggle();
        });

        var ctx = document.getElementById("goatPurchasedSold").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($transactions as $collected)
                        "{{ $collected->date }}",
                    @endforeach
                ],
                datasets:
                    [{
                        label: "Purchase",
                        data: [
                            @foreach ($graphPurchaseGoats as $collected)
                                "{{ $collected->quantity }}",
                            @endforeach
                        ],
                        borderColor: "#1753fc",
                        borderWidth: "0",
                        backgroundColor: "#1753fc"
                    }, {
                        label: "Sale",
                        data: [
                            @foreach ($graphSoldGoats as $sale)
                                "{{ $sale->quantity }}",
                            @endforeach
                        ],
                        borderColor: "#9258f1",
                        borderWidth: "0",
                        backgroundColor: "#9258f1"
                    }],
            }
        });

    </script>
@endsection
