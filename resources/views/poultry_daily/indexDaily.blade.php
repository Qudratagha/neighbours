@extends('layouts.nav')
@section('title', 'Poultry - Daily')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('poultry_daily.indexDaily','poultry_daily')}}">Daily</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Poultry Daily') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu">
                                        <!-- Tabs -->
                                        <nav class="navbar navbar-expand-sm navbar-light ">
                                            <a class="navbar-brand" href="#"></a>
                                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon"></span>
                                            </button>
                                            <div class="collapse navbar-collapse" id="navbarNav">
                                                <ul class="navbar-nav nav nav-tabs myTab" data-bs-toggle="tab">
                                                    <li class="nav-item active"><a href="#tab11" data-bs-toggle="tab">Egg</a></li>
                                                    <li><a href="#tab21" data-bs-toggle="tab">Hen</a></li>
                                                    <li><a href="#tab61" data-bs-toggle="tab">Chicks</a></li>
                                                    <li><a href="#tab31" data-bs-toggle="tab">Feed</a></li>
                                                    <li><a href="#tab41" data-bs-toggle="tab">Vaccination</a></li>
                                                    <li><a href="#tab51" data-bs-toggle="tab">Medicine</a></li>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body">
                                    <div class="tab-content">

                                        {{-- Egg Starts Here--}}
                                        <div class="tab-pane show @if ($tab == 'egg') active @endif" id="tab11">
                                            <div class="float-right mb-3">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#soldEgg">Sold Egg</button>
                                                    <!-- Message Modal -->
                                                    <div class="modal fade" id="soldEgg" tabindex="-1" role="dialog"  aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example-Modal3">Add Egg</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" action="{{route('poultry_daily.storeDaily')}}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="recipient-name" class="form-control-label">Date</label>
                                                                            <input type="text" id="test1" onfocus= "(this. type='date')" class="form-control" name="date" value="<?php echo date('Y-m-d');?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label">Quantity: In Dozens </label>
                                                                            <input type="text"  class="form-control" id="EggQuantity" name="quantity" required>
                                                                            <?php
                                                                            $totalEggsCollected = \App\Models\Poultry::totalEggsCollected();
                                                                            $qtyInDozens = floor($totalEggsCollected / 12);
                                                                            ?>
                                                                            <div id="testing" class="invalid-feedback" style="display: block !important;">
                                                                                Avaliable Eggs = {{$qtyInDozens}} Dozens
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label">Description</label>
                                                                            <input type="text" class="form-control" id="description" name="description">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" name="submitEgg" class="btn btn-primary">Sold Egg</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered text-nowrap w-100 display">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-15p">ID</th>
                                                        <th class="wd-25p">Date</th>
                                                        <th class="wd-15p">Egg Quantity</th>
                                                        <th class="wd-15p">Amount</th>
                                                        <th class="wd-15p">Description</th>
                                                        <th class="wd-15p notExport">Delete</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($eggSale as $egg)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$egg->date ?? ''}}</td>
                                                            <td>{{$egg->quantity/12 ?? ''}} Dozen</td>
                                                            <td>{{$egg->amount ?? ''}} </td>
                                                            <td>{{$egg->description ?? ''}}</td>
                                                            <td>
                                                                <form method="POST" action="{{ route('poultry_daily.eggdel',$egg->id ) }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" name="deleteEgg" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fe fe-trash"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- table-wrapper -->
                                        </div>
                                        {{--end  div 11--}}


                                        {{--this is hen --}}
                                        <div class="tab-pane show @if ($tab == 'hen') active @endif" id="tab21">
                                            <div class="float-right mb-3">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#soldhen">Sold Hen</button>
                                                    <!-- Message Modal -->
                                                    <div class="modal fade" id="soldhen" tabindex="-1" role="dialog"  aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example-Modal3">Sold Hen</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" action="{{route('poultry_daily.storeDaily')}}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="recipient-name" class="form-control-label">Date</label>
                                                                            <input type="text" onfocus= "(this. type='date')" class="form-control" name="date" value="<?php echo date('Y-m-d');?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label">Hen Quantity</label>
                                                                            <input type="text" class="form-control" id="HenQuantity" name="quantity" required>
                                                                            <?php
                                                                            $purchaseMsaleMdie = \App\Models\Poultry:: purchaseMsaleMdie();
                                                                            ?>
                                                                            <div id="testing" class="invalid-feedback" style="display: block !important;">
                                                                                Avaliable Hens = {{$purchaseMsaleMdie}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label">Description</label>
                                                                            <input type="text" class="form-control" id="description" name="description">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label">Amount</label>
                                                                            <input type="number" class="form-control" id="amount" name="amount">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" name="submitHen" class="btn btn-primary">Sold Hen</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered text-nowrap w-100 display">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-15p">ID</th>
                                                        <th class="wd-25p">Date</th>
                                                        <th class="wd-15p">Hen Quantity</th>
                                                        <th class="wd-15p">Rate</th>
                                                        <th class="wd-15p">Detail</th>
                                                        <th class="wd-15p notExport">Delete</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($henSale as $hen)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$hen->date ?? ''}}</td>
                                                            <td>{{$hen->quantity ?? ''}} </td>
                                                            <td>{{$hen->amount ?? ''}} </td>
                                                            <td>{{$hen->description ?? ''}} </td>
                                                            <td>
                                                                <form method="POST" action="{{ route('poultry_daily.eggdel',$hen->id ) }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" name="deleteEgg" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fe fe-trash"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- table-wrapper -->
                                        </div>
                                        {{--End div 21 --}}

{{--                                        this is chick--}}
                                        <div class="tab-pane show @if ($tab == 'chicks') active @endif" id="tab61">
                                            <div class="float-right mb-3">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#soldchicks">Sold Chicks</button>
                                                    <!-- Message Modal -->
                                                    <div class="modal fade" id="soldchicks" tabindex="-1" role="dialog"  aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example-Modal3">Sold Chicks</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" action="{{route('poultry_daily.storeDaily')}}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="recipient-name" class="form-control-label">Date</label>
                                                                            {{--                                    <input type="hidden" name="cow_id" value="{{$cow_daily->id}}">--}}
                                                                            <input type="text" onfocus= "(this. type='date')" class="form-control" name="date" value="<?php echo date('Y-m-d');?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label">Quantity</label>
                                                                            <input type="number" class="form-control" id="chickQuantityAvail" name="quantity" required>
                                                                            <?php
                                                                            $totalRemainingChicks = \App\Models\Poultry:: totalRemainingChicks();
                                                                            ?>
                                                                            <div id="testing" class="invalid-feedback" style="display: block !important;">
                                                                                Avaliable Chicks = {{$totalRemainingChicks}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label">Amount</label>
                                                                            <input type="number" class="form-control" id="amount" name="amount">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label">Detail</label>
                                                                            <input type="text" class="form-control" id="description" name="description">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" name="submitChick" class="btn btn-primary">Sold Chicks</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered text-nowrap w-100 display">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-15p">ID</th>
                                                        <th class="wd-25p">Date</th>
                                                        <th class="wd-15p">Quantity</th>
                                                        <th class="wd-15p">Amount</th>
                                                        <th class="wd-15p">Detail</th>
                                                        <th class="wd-15p notExport">Delete</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($chickSale as $chick)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$chick->date ?? ''}}</td>
                                                            <td>{{$chick->quantity ?? ''}} </td>
                                                            <td>{{$chick->amount ?? ''}} </td>
                                                            <td>{{$chick->description ?? ''}} </td>
                                                            <td>
                                                                <form method="POST" action="{{ route('poultry_daily.eggdel',$chick->id ) }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" name="deleteEgg" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fe fe-trash"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- table-wrapper -->
                                        </div>
                                        {{--End div 61 --}}

{{--                                        this is feed--}}
                                        <div class="tab-pane show @if ($tab == 'feed') active @endif" id="tab31">
                                            <div class="float-right mb-3">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addfeed">Add Feed</button>
                                                    <!-- Message Modal -->
                                                    <div class="modal fade" id="addfeed" tabindex="-1" role="dialog"  aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example-Modal3">Add Feed</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" action="{{route('poultry_daily.storeDaily')}}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="recipient-name" class="form-control-label">Date</label>
                                                                            {{--                                    <input type="hidden" name="cow_id" value="{{$cow_daily->id}}">--}}
                                                                            <input type="text" onfocus= "(this. type='date')" class="form-control" name="created_at" value="<?php echo date('Y-m-d');?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label">Feed Quantity</label>
                                                                            <input type="number" class="form-control" id="feedQuantity" name="quantity" required>
                                                                            <?php
                                                                            $purchaseFeedMUsedFeed = \App\Models\Poultry::purchaseFeedMUsedFeed();
                                                                            ?>
                                                                            <div id="testing" class="invalid-feedback" style="display: block !important;">
                                                                                Avaliable Feeds = {{$purchaseFeedMUsedFeed}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" name="submitFeed" class="btn btn-primary">Add Feed</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered text-nowrap w-100 display">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-15p">ID</th>
                                                        <th class="wd-25p">Date</th>
                                                        <th class="wd-15p">Quantity</th>
                                                        <th class="wd-15p notExport">Delete</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($poultryFeed as $t)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{date('d-m-Y', strtotime($t->created_at))}}</td>
                                                            <td>{{$t->quantity ?? ''}} </td>
                                                            <td>
                                                                <form method="POST" action="{{ route('poultry_daily.feeddel',$t->id ) }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" name="deleteEgg" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fe fe-trash"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- table-wrapper -->
                                        </div>
                                        {{--End div 31 --}}

{{--                                        this is vaccinaiton --}}
                                        <div class="tab-pane show @if ($tab == 'vaccine') active @endif" id="tab41">
                                            <div class="float-right mb-3">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addvaccine">Add Vaccine</button>
                                                    <!-- Message Modal -->
                                                    <div class="modal fade" id="addvaccine" tabindex="-1" role="dialog"  aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example-Modal3">Add Vaccine</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" action="{{route('poultry_daily.storeDaily')}}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="recipient-name" class="form-control-label">Date</label>
                                                                            <input type="text" onfocus= "(this. type='date')" class="form-control" name="created_at" value="<?php echo date('Y-m-d');?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label">Vaccine Quantity</label>
                                                                            <input type="text" class="form-control vaccinationQty" id="vaccinationQty" name="quantity">
                                                                            <?php
                                                                            $purchaseVaccineMUsedVaccine = \App\Models\Poultry:: purchaseVaccineMUsedVaccine();
                                                                            ?>
                                                                            <div id="testing" class="invalid-feedback" style="display: block !important;">
                                                                                Avaliable Vaccine = {{$purchaseVaccineMUsedVaccine}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label">Vaccine Desc</label>
                                                                            <input type="text" class="form-control" id="description" name="description" required>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" name="submitVaccine" class="btn btn-primary">Vaccine</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered text-nowrap w-100 display">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-15p">ID</th>
                                                        <th class="wd-25p">Date</th>
                                                        <th class="wd-15p">Vaccine Quantity</th>
                                                        <th class="wd-15p">DESC</th>
                                                        <th class="wd-15p notExport">Delete</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($poultryVaccine as $vaccine)
                                                        <tr>
                                                            <td>{{$vaccine->id}}</td>
                                                            <td>{{date('d-m-Y', strtotime($vaccine->created_at))}}</td>
                                                            <td>{{$vaccine->quantity ?? ''}} </td>
                                                            <td>{{$vaccine->description ?? ''}} </td>
                                                            <td>
                                                                <form method="POST" action="{{ route('poultry_daily.vaccineDelete',$vaccine->id ) }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" name="vaccineDelete" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fe fe-trash"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- table-wrapper -->
                                        </div>
                                        {{--End div 41 --}}

{{--                                        this is medicine--}}
                                        <div class="tab-pane show @if ($tab == 'medicine') active @endif" id="tab51">
                                            <div class="float-right mb-3">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addmedicine">Add Medicine</button>
                                                    <!-- Message Modal -->
                                                    <div class="modal fade" id="addmedicine" tabindex="-1" role="dialog"  aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example-Modal3">Add Vaccine</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" action="{{route('poultry_daily.storeDaily')}}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="recipient-name" class="form-control-label">Date</label>
                                                                            <input type="text" onfocus= "(this. type='date')" class="form-control" name="created_at" value="<?php echo date('Y-m-d');?>" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label">Medicine Quantity</label>
                                                                            <input type="text" class="form-control" id="medicineQty" name="quantity">
                                                                            <?php
                                                                            $purchaseMedicineMUsedMedicine = \App\Models\Poultry:: purchaseMedicineMUsedMedicine();
                                                                            ?>
                                                                            <div id="testing" class="invalid-feedback" style="display: block !important;">
                                                                                Avaliable Medicine = {{$purchaseMedicineMUsedMedicine}}
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label">Medicine Desc</label>
                                                                            <input type="text" class="form-control" id="description" name="description" required>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" name="submitMedicine" class="btn btn-primary">Add Medicine</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered text-nowrap w-100 display">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-15p">ID</th>
                                                        <th class="wd-25p">Date</th>
                                                        <th class="wd-15p">Medicine Quantity</th>
                                                        <th class="wd-15p">Description</th>
                                                        <th class="wd-15p notExport">Delete</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($poultryMedicine as $medicine)
                                                        <tr>
                                                            <td>{{$medicine->id}}</td>
                                                            <td>{{date('d-m-Y', strtotime($medicine->created_at))}}</td>
                                                            <td>{{$medicine->quantity ?? ''}} </td>
                                                            <td>{{$medicine->description ?? ''}} </td>
                                                            <td>
                                                                <form method="POST" action="{{ route('poultry_daily.medicineDelete',$medicine->id ) }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" name="medicineDelete" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fe fe-trash"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- table-wrapper -->
                                        </div>
                                        {{--End div 51 --}}

                                    </div>
                                </div>
                            </div>
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
    <script>
        $(function() {
            $('.act').click(function() {
                $(this).toggleClass('active');
            });

            //this is egg
            let qtyInDozens = {{$qtyInDozens}};
            $('#EggQuantity').change(function()
            {
                if(this.value > qtyInDozens)
                {
                    alert('Please do not exceed the Available Quantity');
                    $('#EggQuantity').val(qtyInDozens);
                }
            });
            //this is egg end

            //this is hen
            let purchaseMsaleMdie = {{$purchaseMsaleMdie}};
            $('#HenQuantity').change(function()
            {
                if(this.value > purchaseMsaleMdie)
                {
                    alert('Please do not exceed the Available Quantity');
                    $('#HenQuantity').val(purchaseMsaleMdie);
                }
            });
            //this is hen end

            //this is chick
            let totalRemainingChicks = {{$totalRemainingChicks}};
            $('#chickQuantityAvail').change(function()
            {
                if(this.value > totalRemainingChicks)
                {
                    alert('Please do not exceed the Available Quantity');
                    $('#chickQuantityAvail').val(totalRemainingChicks);
                }
            });
            //this is chick end

            //this is feed
            var purchaseFeedMUsedFeed = {{$purchaseFeedMUsedFeed}};
            $('#feedQuantity').change(function()
            {
                if(this.value > purchaseFeedMUsedFeed)
                {
                    alert('Please do not exceed the Available Quantity');
                    $('#feedQuantity').val(purchaseFeedMUsedFeed);
                }
            });
            //this is feed end

            //this is vaccination
            var purchaseVaccineMUsedVaccine = {{$purchaseVaccineMUsedVaccine}};
            $('.vaccinationQty').change(function()
            {
                if(this.value > purchaseVaccineMUsedVaccine)
                {
                    alert('Please do not exceed the Available Quantity');
                    $('.vaccinationQty').val(purchaseVaccineMUsedVaccine);
                }
            });
            //this is vaccination end

            //this is medicine
            var purchaseMedicineMUsedMedicine = {{$purchaseMedicineMUsedMedicine}};
            $('#medicineQty').change(function()
            {
                if(this.value > purchaseMedicineMUsedMedicine)
                {
                    alert('Please do not exceed the Available Quantity');
                    $('#medicineQty').val(purchaseMedicineMUsedMedicine);
                }
            });
            //this is medicine end
        });

        $('a[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('.myTab a[href="' + activeTab + '"]').tab('show');
        }
    </script>
@endsection
