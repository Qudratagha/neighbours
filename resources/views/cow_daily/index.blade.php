@extends('layouts.nav')
@section('title', 'Daily - Cow')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('cattle.index','cow')}}">All Cows</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Cow Daily') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Cow Daily</h3>
                        </div>
                        <div class="card-body">
                            <table cellpadding="2" cellspacing="2" border="1"
                                   class="table thead-dark table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th style="font-weight: 600">Cow-Serial</th>
                                    @if($cow_daily->dob)
                                        <th style="font-weight: 600">Date-of-Birth</th>
                                        <th style="font-weight: 600">Parent</th>
                                    @elseif($cow_daily->entry_in_farm)
                                        <th style="font-weight: 600">Entry-in-Farm</th>
                                        <th style="font-weight: 600">Age</th>
                                    @endif
                                    <th style="font-weight: 600">Breed</th>
                                    <th style="font-weight: 600">Weight</th>
                                    <th style="font-weight: 600">Height</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$cow_daily->serial_no}}</td>
                                    @if($cow_daily->dob)
                                        <td>{{date('d-m-Y', strtotime($cow_daily->dob)) ?? ''}}</td>
                                        @if($cow_daily->parent_id)
                                            <td>{{$cow_daily->cattleParent->serial_no ?? ''}}</td>
                                        @else
                                            <td></td>
                                        @endif
                                    @elseif($cow_daily->entry_in_farm)
                                        <td>{{date('d-m-Y', strtotime($cow_daily->entry_in_farm)) ?? ''}}</td>
                                        <td>{{$cow_daily->age}}</td>
                                    @endif
                                    <td>{{$cow_daily->breed}}</td>
                                    <td>{{$cow_daily->weight}}</td>
                                    <td>{{$cow_daily->height}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu">
                                        <!-- Tabs -->
                                        <ul class="nav nav-tabs myTab" data-bs-toggle="tab">
                                            <li><a class="active" href="#tab11" id="hov" data-bs-toggle="tab">Milk</a>
                                            </li>
                                            <li class="act"><a href="#tab21" id="hov" data-bs-toggle="tab">Sick</a></li>
                                            <li class="act"><a href="#tab31" id="hov" data-bs-toggle="tab">Medicine</a>
                                            </li>
                                            <li class="act"><a href="#tab41" id="hov"
                                                               data-bs-toggle="tab">Insemination</a></li>
                                            <li class="act"><a href="#tab51" id="hov" data-bs-toggle="tab">Pregnant</a>
                                            </li>
                                            <li class="act"><a href="#tab61" id="hov" data-bs-toggle="tab">Delivery</a>
                                            </li>
                                            <li class="act"><a href="#tab71" id="hov"
                                                               data-bs-toggle="tab">Vaccination</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body">
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="tab11">
                                            <h4>Total Milk Stock Available {{\App\Models\Transaction::milkStock()}}</h4>

                                            <div class="float-right mb-3">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                            data-target="#addMilk">Add Milk
                                                    </button>
                                                    <!-- Message Modal -->
                                                    <div class="modal fade" id="addMilk" tabindex="-1" role="dialog"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example-Modal3">Add
                                                                        Milk</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                          action="{{route('cow_daily.store')}}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="recipient-name"
                                                                                   class="form-control-label">Date</label>
                                                                            <input type="hidden" name="serial_no"
                                                                                   value="{{$cow_daily->serial_no}}">
                                                                            <input type="text"
                                                                                   onfocus="(this. type='date')"
                                                                                   class="form-control" name="date"
                                                                                   value="<?php use App\Models\AccountHead;use App\Models\Medicines;use App\Models\Vaccination;echo date('Y-m-d');?>"
                                                                                   required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text"
                                                                                   class="form-control-label">Quantity: In Liters</label>
                                                                            <input type="text" class="form-control"
                                                                                   id="quantity" name="quantity"
                                                                                   required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text"
                                                                                   class="form-control-label">Description</label>
                                                                            <input type="text" class="form-control"
                                                                                   id="description" name="description">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close
                                                                            </button>
                                                                            <button type="submit" name="submitMilk"
                                                                                    class="btn btn-primary">Add Milk
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id=""
                                                       class="table table-striped table-bordered text-nowrap w-100 display">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-15p">ID</th>
                                                        <th class="wd-25p">Date</th>
                                                        <th class="wd-15p">Milk Quantity</th>
                                                        <th style="width: 5px">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($transactions as $t)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$t->date ?? ''}}</td>
                                                            <td>{{$t->quantity ?? ''}} Liters</td>
                                                            <td>
                                                                <form action="{{ route('cow_daily.destroy',$t->id) }}"
                                                                      method="POST"
                                                                      onsubmit="return confirm('Are you sure you want to delete this?');"
                                                                      style="display: inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                                            data-toggle="tooltip" title="Delete"><i
                                                                                class="fe fe-trash-2"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- table-wrapper -->
                                        </div>


                                        <div class="tab-pane show" id="tab21">
                                            <div class="float-right mb-3">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                            data-target="#sickData">Add Sick Info
                                                    </button>
                                                    <!-- Message Modal -->
                                                    <div class="modal fade" id="sickData" tabindex="-1" role="dialog"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example-Modal3">Add Sick
                                                                        Detail</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                          action="{{route('sickCow.store')}}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="cattle_id"
                                                                                   value="{{$cow_daily->id}}">
                                                                            <input type="hidden" name="date"
                                                                                   value="<?php echo date('Y-m-d');?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text"
                                                                                   class="form-control-label">Sick</label>
                                                                            <input type="checkbox" class="form-control"
                                                                                   id="is_sick" name="is_sick"
                                                                                   value="1">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text"
                                                                                   class="form-control-label">Treatment</label>
                                                                            <input type="text" class="form-control"
                                                                                   id="treatment" name="treatment"
                                                                                   required>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close
                                                                            </button>
                                                                            <button type="submit" name="submitCow"
                                                                                    class="btn btn-primary">Submit
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id=""
                                                       class="table table-striped table-bordered text-nowrap w-100 display">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-15p">ID</th>
                                                        <th class="wd-25p">Date</th>
                                                        <th class="wd-15p">Sick</th>
                                                        <th class="wd-15p">Treatment</th>
                                                        <th style="width: 5px !important;">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($sicks as $sick)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$sick->date ?? ''}}</td>
                                                            <td>{{($sick->is_sick == 1) ? 'Is Sick' : 'Not Sick'}}</td>
                                                            <td>{{$sick->treatment ?? ''}}</td>

                                                            <td>
                                                                <form action="{{ route('sickCow.destroy', $sick->id) }}"
                                                                      method="POST"
                                                                      onsubmit="return confirm('Are you sure you want to delete this?');"
                                                                      style="display: inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                                            data-toggle="tooltip" title="Delete"><i
                                                                                class="fe fe-trash-2"></i></button>
                                                                </form>
                                                                <form action="{{route('sickCow.store')}}" method="POST"
                                                                      style="display: inline-block;">
                                                                    @csrf
                                                                    <input type="hidden" name="is_sick" value="0">
                                                                    <input type="hidden" name="date"
                                                                           value="<?php echo date('Y-m-d')?>">
                                                                    <input type="hidden" name="sick_id"
                                                                           value="{{$sick->id}}">
                                                                    <input type="hidden" name="cattle_id"
                                                                           value="{{$cow_daily->id}}">
                                                                    <button type="submit" name="submitHealthyCow"
                                                                            class="btn btn-sm btn-success"
                                                                            data-toggle="tooltip" title="Healthy"><i
                                                                                class="fe fe-heart"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- table-wrapper -->
                                        </div>


                                        <div class="tab-pane show" id="tab31">
                                            <div class="float-right mb-3">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                            data-target="#addMedicine">Add Medicine
                                                    </button>
                                                    <!-- Message Modal -->
                                                    <div class="modal fade" id="addMedicine" tabindex="-1" role="dialog"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example-Modal3">Add
                                                                        Medicine</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                          action="{{route('medicineCow.store')}}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="recipient-name"
                                                                                   class="form-control-label">Date</label>
                                                                            <input type="hidden" name="cow_id"
                                                                                   value="{{$cow_daily->serial_no}}">
                                                                            <input type="text"
                                                                                   onfocus="(this. type='date')"
                                                                                   class="form-control"
                                                                                   name="created_at"
                                                                                   value="<?php echo date('Y-m-d');?>"
                                                                                   required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text"
                                                                                   class="form-control-label">Medicine
                                                                                Quantity (Per Unit)</label>
                                                                            <input type="text" class="form-control"
                                                                                   id="medicineQuantity"
                                                                                   name="quantity">
																			<?php
																			$cowSerial = $cow_daily->serial_no;
																			$sub_head_id = AccountHead::where('name', "cow#$cowSerial")->pluck('id')->last();
																			$cowDailyMedicineStock = Medicines::cowDailyMedicineStock($sub_head_id);
																			?>
                                                                            <div id="testing" class="invalid-feedback"
                                                                                 style="display: block !important;">
                                                                                Avaliable Medicine
                                                                                = {{$cowDailyMedicineStock}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text"
                                                                                   class="form-control-label">Description</label>
                                                                            <input type="text" class="form-control"
                                                                                   id="description" name="description">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close
                                                                            </button>
                                                                            <button type="submit" name="submitCow"
                                                                                    class="btn btn-primary">Add Medicine
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id=""
                                                       class="table table-striped table-bordered text-nowrap w-100 display">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-15p">ID</th>
                                                        <th class="wd-25p">Date</th>
                                                        <th class="wd-15p">Medicine Quantity</th>
                                                        <th class="wd-15p">Description</th>
                                                        <th style="width: 5px">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($medicines as $medicine)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$medicine->created_at ?? ''}}</td>
                                                            <td>{{$medicine->quantity ?? ''}}</td>
                                                            <td>{{$medicine->description ?? ''}}</td>
                                                            <td>
                                                                <form action="{{ route('medicineCow.destroy', $medicine->id) }}"
                                                                      method="POST"
                                                                      onsubmit="return confirm('Are you sure you want to delete this?');"
                                                                      style="display: inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                                            data-toggle="tooltip" title="Delete"><i
                                                                                class="fe fe-trash-2"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- table-wrapper -->
                                        </div>


                                        <div class="tab-pane show" id="tab41">
                                            <div class="float-right mb-3">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                            data-target="#inseminationData">Add Insemination Info
                                                    </button>
                                                    <!-- Message Modal -->
                                                    <div class="modal fade" id="inseminationData" tabindex="-1"
                                                         role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example-Modal3">Add
                                                                        Insemination Detail</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                          action="{{route('inseminationCow.store')}}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="recipient-name"
                                                                                   class="form-control-label">Date</label>
                                                                            <input type="hidden" name="cattle_id"
                                                                                   value="{{$cow_daily->id}}">
                                                                            <input type="text"
                                                                                   onfocus="(this. type='date')"
                                                                                   class="form-control" name="date"
                                                                                   value="<?php echo date('Y-m-d');?>"
                                                                                   required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text"
                                                                                   class="form-control-label">Insemination</label>
                                                                            <input type="checkbox" class="form-control"
                                                                                   id="is_inseminated"
                                                                                   name="is_inseminated" value="1"
                                                                                   required>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close
                                                                            </button>
                                                                            <button type="submit"
                                                                                    class="btn btn-primary">Submit
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id=""
                                                       class="table table-striped table-bordered text-nowrap w-100 display">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-15p">ID</th>
                                                        <th class="wd-25p">Date</th>
                                                        <th class="wd-15p">Insemination</th>
                                                        <th style="width: 5%">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($inseminations as $insemination)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$insemination->date ?? ''}}</td>
                                                            <td>{{($insemination->is_inseminated == 1) ? 'Is Inseminated' : 'Not Inseminated'}}</td>
                                                            <td>
                                                                <form action="{{ route('inseminationCow.destroy', $insemination->id) }}"
                                                                      method="POST"
                                                                      onsubmit="return confirm('Are you sure you want to delete this?');"
                                                                      style="display: inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                                            data-toggle="tooltip" title="Delete"><i
                                                                                class="fe fe-trash-2"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- table-wrapper -->
                                        </div>


                                        <div class="tab-pane show" id="tab51">
                                            <div class="float-right mb-3">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                            data-target="#pregnantData">Add Pregnant Info
                                                    </button>
                                                    <!-- Message Modal -->
                                                    <div class="modal fade" id="pregnantData" tabindex="-1"
                                                         role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example-Modal3">Add
                                                                        Pregnant Detail</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                          action="{{route('pregnantCow.store')}}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="recipient-name"
                                                                                   class="form-control-label">Date</label>
                                                                            <input type="hidden" name="cattle_id"
                                                                                   value="{{$cow_daily->id}}">
                                                                            <input type="text"
                                                                                   onfocus="(this. type='date')"
                                                                                   class="form-control" name="date"
                                                                                   value="<?php echo date('Y-m-d');?>"
                                                                                   required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text"
                                                                                   class="form-control-label">Pregnant</label>
                                                                            <input type="checkbox" class="form-control"
                                                                                   id="is_pregnant" name="is_pregnant"
                                                                                   value="1">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close
                                                                            </button>
                                                                            <button type="submit"
                                                                                    name="submitCowPregnant"
                                                                                    class="btn btn-primary">Submit
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id=""
                                                       class="table table-striped table-bordered text-nowrap w-100 display">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-15p">ID</th>
                                                        <th class="wd-25p">Date</th>
                                                        <th class="wd-15p">Pregnant</th>
                                                        <th style="width: 5%">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($pregnants as $pregnant)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$pregnant->date ?? ''}}</td>
                                                            <td>{{($pregnant->is_pregnant == 1) ? 'Is Pregnant' : 'Not Pregnant'}}</td>
                                                            <td>
                                                                <form action="{{ route('pregnantCow.destroy', $pregnant->id) }}"
                                                                      method="POST"
                                                                      onsubmit="return confirm('Are you sure you want to delete this?');"
                                                                      style="display: inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                                            data-toggle="tooltip" title="Delete"><i
                                                                                class="fe fe-trash-2"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- table-wrapper -->
                                        </div>


                                        <div class="tab-pane show" id="tab61">
                                            <div class="float-right mb-3">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                            data-target="#deliveryData">Add Delivery Info
                                                    </button>
                                                    <!-- Message Modal -->
                                                    <div class="modal fade" id="deliveryData" tabindex="-1"
                                                         role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example-Modal3">Add
                                                                        Delivery Detail</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                          action="{{route('deliveryCow.store')}}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="recipient-name"
                                                                                   class="form-control-label">Date</label>
                                                                            <input type="hidden" name="cattle_id"
                                                                                   value="{{$cow_daily->id}}">
                                                                            <input type="text"
                                                                                   onfocus="(this. type='date')"
                                                                                   class="form-control" name="date"
                                                                                   value="<?php echo date('Y-m-d');?>"
                                                                                   required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text"
                                                                                   class="form-control-label">Delivery</label>
                                                                            <input type="checkbox" class="form-control"
                                                                                   id="is_delivered" name="is_delivered"
                                                                                   value="1">
                                                                            <input type="hidden" class="form-control"
                                                                                   id="is_pregnant" name="is_pregnant"
                                                                                   value="0">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close
                                                                            </button>
                                                                            <button type="submit"
                                                                                    name="submitCowDelivery"
                                                                                    class="btn btn-primary">Submit
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id=""
                                                       class="table table-striped table-bordered text-nowrap w-100 display">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-15p">ID</th>
                                                        <th class="wd-25p">Date</th>
                                                        <th class="wd-15p">Delivery</th>
                                                        <th class="wd-15p">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($deliveries as $delivery)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$delivery->date ?? ''}}</td>
                                                            <td>{{($delivery->is_delivered == 1) ? 'Is Delivered' : 'Not Delivered'}}</td>
                                                            <td>
                                                                <form action="{{ route('deliveryCow.destroy', $delivery->id) }}"
                                                                      method="POST"
                                                                      onsubmit="return confirm('Are you sure you want to delete this?');"
                                                                      style="display: inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                                            data-toggle="tooltip" title="Delete"><i
                                                                                class="fe fe-trash-2"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- table-wrapper -->
                                        </div>


                                        <div class="tab-pane show" id="tab71">
                                            <div class="float-right mb-3">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                            data-target="#vaccinationData">Add Vaccination Info
                                                    </button>
                                                    <!-- Message Modal -->
                                                    <div class="modal fade" id="vaccinationData" tabindex="-1"
                                                         role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example-Modal3">Add
                                                                        Vaccination Detail</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                          action="{{route('vaccination.store')}}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="recipient-name"
                                                                                   class="form-control-label">Date</label>
                                                                            <input type="hidden" name="serial_no"
                                                                                   value="{{$cow_daily->serial_no}}">
                                                                            <input type="text"
                                                                                   onfocus="(this. type='date')"
                                                                                   class="form-control"
                                                                                   name="created_at"
                                                                                   value="<?php echo date('Y-m-d');?>"
                                                                                   required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text"
                                                                                   class="form-control-label">Vaccine
                                                                                Quantity</label>
                                                                            <input type="text"
                                                                                   class="form-control vaccinationQty"
                                                                                   id="vaccinationQuantity"
                                                                                   name="quantity">
																			<?php
																			$cowSerial = $cow_daily->serial_no;
																			$sub_head_id = AccountHead::where('name', "cow#$cowSerial")->pluck('id')->last();
																			$cowDailyVaccineStock = Vaccination::cowDailyVaccineStock($sub_head_id);
																			?>
                                                                            <div id="testing" class="invalid-feedback"
                                                                                 style="display: block !important;">
                                                                                Avaliable Vaccine
                                                                                = {{$cowDailyVaccineStock}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text"
                                                                                   class="form-control-label">Description</label>
                                                                            <input type="text" class="form-control"
                                                                                   id="description" name="description">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close
                                                                            </button>
                                                                            <button type="submit" name="submitCow"
                                                                                    class="btn btn-primary">Submit
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id=""
                                                       class="table table-striped table-bordered text-nowrap w-100 display">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-15p">ID</th>
                                                        <th class="wd-25p">Date</th>
                                                        <th class="wd-15p">Vaccination Quantity</th>
                                                        <th class="wd-15p">Description</th>
                                                        <th style="width: 5%;">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($vaccinations as $vaccination)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$vaccination->created_at ?? ''}}</td>
                                                            <td>{{$vaccination->quantity ?? ''}}</td>
                                                            <td>{{$vaccination->description ?? ''}}</td>
                                                            <td>
                                                                <form action="{{ route('vaccinationCow.destroy', $vaccination->id) }}"
                                                                      method="POST"
                                                                      onsubmit="return confirm('Are you sure you want to delete this?');"
                                                                      style="display: inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                                            data-toggle="tooltip" title="Delete"><i
                                                                                class="fe fe-trash-2"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- table-wrapper -->
                                        </div>
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
        $(function () {
            $('.act').click(function () {
                $(this).toggleClass('active');
            });
        });
        //medicine available quantity
        var purchaseFeedMUsedFeed = {{$cowDailyMedicineStock}};
        $('#medicineQuantity').change(function () {
            if (this.value > purchaseFeedMUsedFeed) {
                alert('Please do not exceed ddddddthe Available Quantity');
                $('#medicineQuantity').val(purchaseFeedMUsedFeed);
            }
        });
        //vaccine available quantity
        var purchaseFeedMUsedFeed = {{$cowDailyVaccineStock}};
        $('#vaccinationQuantity').change(function () {
            if (this.value > purchaseFeedMUsedFeed) {
                alert('Please do not exceed ddddddthe Available Quantity');
                $('#vaccinationQuantity').val(purchaseFeedMUsedFeed);
            }
        });

        $('a[data-bs-toggle="tab"]').on('show.bs.tab', function (e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('.myTab a[href="' + activeTab + '"]').tab('show');
        }
    </script>
@endsection
