@extends('layouts.nav')
@section('title', 'Daily - Goat')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('cattle.index','goat')}}">All Goats</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Goat Daily') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Goat Serial') }} # {{$goat_daily->serial_no}}</h3>
                        </div>
                        <div class="card-body">
                            <table cellpadding="2" cellspacing="2" border="1" class="table thead-dark table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th style="font-weight: 600">Goat-Serial</th>
                                    @if($goat_daily->dob != null )
                                        <th style="font-weight: 600">Date-of-Birth</th>
                                    @else
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
                                    <td>{{$goat_daily->serial_no}}</td>
                                    @if($goat_daily->dob != null)
                                        <td>{{date('d-m-Y', strtotime($goat_daily->dob)) ?? ''}}</td>
                                    @else
                                        <td>{{date('d-m-Y', strtotime($goat_daily->entry_in_farm)) ?? ''}}</td>
                                        <td>{{$goat_daily->age}}</td>
                                    @endif
                                    <td>{{$goat_daily->breed}}</td>
                                    <td>{{$goat_daily->weight}}</td>
                                    <td>{{$goat_daily->height}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs myTab" data-bs-toggle="tab">
                                            <li>
                                                <a class="nav-link active" href="#tab11" id="hov" data-bs-toggle="tab">Sick</a>
                                            </li>
                                            <li class="act"><a href="#tab21" id="hov" data-bs-toggle="tab">Medicine</a>
                                            </li>
                                            @if($goat_daily->gender == 0)
                                                <li class="act">
                                                    <a href="#tab31" id="hov" data-bs-toggle="tab">Pregnant</a></li>
                                                <li class="act">
                                                    <a href="#tab41" id="hov" data-bs-toggle="tab">Delivery</a></li>
                                            @endif
                                            <li class="act">
                                                <a href="#tab51" id="hov" data-bs-toggle="tab">Vaccination</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body">
                                    <div class="tab-content">
                                        {{--                                        @include('goat_daily.sick')--}}
                                        <div class="tab-pane show active" id="tab11">
                                            <div class="float-right mb-3">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addSick">Add Sick</button>
                                                    <!-- Message Modal -->
                                                    <div class="modal fade" id="addSick" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example-Modal3">Add Sick</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" action="{{route('sick.store')}}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="recipient-name" class="form-control-label required">Date</label>
                                                                            <input type="hidden" name="cattle_id" value="{{$goat_daily->id}}">
                                                                            <input type="text" onfocus="(this. type='date')" class="form-control" name="date" value="<?php echo date('Y-m-d');?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label required">Sick</label>
                                                                            <input type="radio" class="form-control" id="is_sick" name="is_sick" value="1" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label">Treatment</label>
                                                                            <input type="text" class="form-control" id="treatment" name="treatment">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" name="submitGoat" class="btn btn-primary">Add Sick</button>
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="" class="table table-striped table-bordered text-nowrap w-100 display">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-15p">ID</th>
                                                        <th class="wd-25p">Date</th>
                                                        <th class="wd-15p">Sick</th>
                                                        <th class="wd-15p">Treatment</th>
                                                        <th class="wd-15p">Actions</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($sicks as $sick)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$sick->date ?? ''}}</td>
                                                            <td>{{$sick->is_sick == 1 ? 'Is Sick' : 'Healthy'}}</td>
                                                            <td>{{$sick->treatment ?? ''}}</td>
                                                            @if($sick->cattle_id || $sick->is_sick == 1)
                                                                <td>
                                                                    <form action="{{ route('sickGoat.destroy', $sick->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline-block;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                                                            <i class="fe fe-trash-2"></i></button>
                                                                    </form>
                                                                    <form action="{{route('sick.store')}}" method="POST" style="display: inline-block;">
                                                                        @csrf
                                                                        <input type="hidden" name="is_sick" value="0">
                                                                        <input type="hidden" name="date" value="<?php echo date('Y-m-d')?>">
                                                                        <input type="hidden" name="sick_id" value="{{$sick->id}}">
                                                                        <input type="hidden" name="cattle_id" value="{{$goat_daily->id}}">
                                                                        <button type="submit" name="submitHealthyGoat" class="btn btn-sm btn-success" data-toggle="tooltip" title="Healthy">
                                                                            <i class="fe fe-heart"></i></button>
                                                                    </form>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- table-wrapper -->
                                        </div>

                                        {{--                                        End div 11 --}}

                                        {{--                                        @include('goat_daily.medicine')--}}
                                        <div class="tab-pane show" id="tab21">
                                            <div class="float-right mb-3">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addMedicine">Add Medicine</button>
                                                    <!-- Message Modal -->
                                                    <div class="modal fade" id="addMedicine" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example-Modal3">Add Medicine</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" action="{{route('medicine.store')}}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="recipient-name" class="form-control-label required">Date</label>
                                                                            <input type="hidden" name="cattle_id" value="{{$goat_daily->serial_no}}">
                                                                            <input type="text" onfocus="(this. type='date')" class="form-control" name="created_at" value="<?php use App\Models\AccountHead;use App\Models\Medicines;use App\Models\Vaccination;echo date('Y-m-d');?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label required">Quantity (Per Unit)</label>
                                                                            <input type="text" class="form-control" id="goatMedicineQuantity" name="quantity" required>
																			<?php
																			$goatSerial = $goat_daily->serial_no;
																			$sub_head_id = AccountHead::where('name', "goat#$goatSerial")->pluck('id')->last();
																			$goatDailyMedicineStock = Medicines::goatDailyMedicineStock($sub_head_id);
																			?>
                                                                            <div id="testing" class="invalid-feedback" style="display: block !important;">
                                                                                Avaliable Medicine = {{$goatDailyMedicineStock}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label">Description</label>
                                                                            <input type="text" class="form-control" id="description" name="description">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" id="goatMedicineExceed" name="submitGoat" class="btn btn-primary">Add Medicine</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="" class="table table-striped table-bordered text-nowrap w-100 display">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-15p">ID</th>
                                                        <th class="wd-25p">Date</th>
                                                        <th class="wd-15p">Medicine</th>
                                                        <th class="wd-15p">Description</th>
                                                        <th class="wd-15p">Actions</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($medicines as $medicine)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$medicine->created_at}}</td>
                                                            <td>{{$medicine->quantity }}</td>
                                                            <td>{{$medicine->description}}</td>
                                                            <td>
                                                                <form action="{{ route('medicineGoat.destroy', $medicine->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                                                        <i class="fe fe-trash-2"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- table-wrapper -->
                                        </div>
                                        {{--                                        End div 21 --}}
                                        @if($goat_daily->gender == 0)
                                            {{--                                            @include('goat_daily.pregnant')--}}
                                            <div class="tab-pane show" id="tab31">
                                                <div class="float-right mb-3">
                                                    <div class="input-group">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addPregnant">Add Pregnant</button>
                                                        <!-- Message Modal -->
                                                        <div class="modal fade" id="addPregnant" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="example-Modal3">Add Pregnant</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" action="{{route('pregnant.store')}}">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <label for="recipient-name" class="form-control-label required">Date</label>
                                                                                <input type="hidden" name="cattle_id" value="{{$goat_daily->id}}">
                                                                                <input type="text" onfocus="(this. type='date')" class="form-control" name="date" value="<?php echo date('Y-m-d');?>" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="message-text" class="form-control-label required">Pregnant</label>
                                                                                <input type="checkbox" class="form-control" id="is_pregnant" name="is_pregnant" value="1" required>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" name="submitGoat" class="btn btn-primary">Add Pregnant</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table id="" class="table table-striped table-bordered text-nowrap w-100 display">
                                                        <thead>
                                                        <tr>
                                                            <th class="wd-15p">ID</th>
                                                            <th class="wd-25p">Date</th>
                                                            <th class="wd-15p">Pregnant</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($pregnants as $pregnant)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$pregnant->date ?? ''}}</td>
                                                                <td>{{$pregnant->is_pregnant == 1 ? 'Is Pregnant' : 'Delivered'}}</td>
                                                                <td>
                                                                    <form action="{{ route('pregnantGoat.destroy', $pregnant->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline-block;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                                                            <i class="fe fe-trash-2"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- table-wrapper -->
                                            </div>

                                            {{--                                        End div 31 --}}
                                            {{--                                        @include('goat_daily.delivery')--}}
                                            <div class="tab-pane show" id="tab41">
                                                <div class="float-right mb-3">
                                                    <div class="input-group">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addDelivery">Add Delivery</button>
                                                        <!-- Message Modal -->
                                                        <div class="modal fade" id="addDelivery" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="example-Modal3">Add Delivery</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" action="{{route('delivery.store')}}">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <label for="recipient-name" class="form-control-label required">Date</label>
                                                                                <input type="hidden" name="cattle_id" value="{{$goat_daily->id}}">
                                                                                <input type="text" onfocus="(this. type='date')" class="form-control" name="date" value="<?php echo date('Y-m-d');?>" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="message-text" class="form-control-label required">Delivery</label>
                                                                                <input type="checkbox" class="form-control" id="is_delivered" name="is_delivered" value="1" required>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" name="submitGoat" class="btn btn-primary">Add Delivery</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table id="" class="table table-striped table-bordered text-nowrap w-100 display">
                                                        <thead>
                                                        <tr>
                                                            <th class="wd-15p">ID</th>
                                                            <th class="wd-25p">Date</th>
                                                            <th class="wd-15p">Delivery</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($deliveries as $delivery)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$delivery->date ?? ''}}</td>
                                                                <td>{{($delivery->is_delivered == 1) ? 'Is Delivered' : 'Not Delivered'}}</td>
                                                                <td>
                                                                    <form action="{{ route('deliveryGoat.destroy', $delivery->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline-block;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                                                            <i class="fe fe-trash-2"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- table-wrapper -->
                                            </div>

                                        @endif
                                        {{--                                        End div 41 --}}

                                        {{--                                        @include('goat_daily.vaccination')--}}
                                        <div class="tab-pane show" id="tab51">
                                            <div class="float-right mb-3">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addVaccination">Add Vaccination</button>
                                                    <!-- Message Modal -->
                                                    <div class="modal fade" id="addVaccination" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example-Modal3">Add Vaccination</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" action="{{route('vaccination.store')}}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="recipient-name" class="form-control-label required">Date</label>
                                                                            <input type="hidden" name="serial_no" value="{{$goat_daily->serial_no}}">
                                                                            <input type="text" onfocus="(this. type='date')" class="form-control" name="created_at" value="<?php echo date('Y-m-d');?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label required">Quantity (Per Unit)</label>
                                                                            <input type="text" class="form-control" id="goatVaccineQuantity" name="quantity" required>
																			<?php
																			$goatSerial = $goat_daily->serial_no;
																			$sub_head_id = AccountHead::where('name', "goat#$goatSerial")->pluck('id')->last();
																			$goatDailyVaccineStock = Vaccination::goatDailyVaccineStock($sub_head_id);
																			?>
                                                                            <div id="testing" class="invalid-feedback" style="display: block !important;">
                                                                                Avaliable Vaccine = {{$goatDailyVaccineStock}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="form-control-label">Description</label>
                                                                            <input type="text" class="form-control" id="description" name="description">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" id="goatVaccineExceed" name="submitGoat" class="btn btn-primary">Add Vaccination</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="" class="table table-striped table-bordered text-nowrap w-100 display">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-15p">ID</th>
                                                        <th class="wd-25p">Date</th>
                                                        <th class="wd-15p">Vaccination Quantity</th>
                                                        <th class="wd-15p">Description</th>
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
                                                                <form action="{{ route('vaccinationGoat.destroy', $vaccination->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                                                        <i class="fe fe-trash-2"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- table-wrapper -->
                                        </div>
                                        {{--                                        End div 51 --}}
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
        var purchaseFeedMUsedFeed = {{$goatDailyMedicineStock}};
        $('#goatMedicineQuantity').change(function () {
            let value = this.value;
            if (this.value > purchaseFeedMUsedFeed) {
                alert('Please do not exceed the Available Quantity');
                $('#goatMedicineQuantity').val(purchaseFeedMUsedFeed);
            } else if (value == 0) {
                alert('You can no sell 0 quantity');
                $('#goatMedicineExceed').prop('disabled', true);
                $(this).val(purchaseFeedMUsedFeed);
            } else {
                $('#goatMedicineExceed').prop('disabled', false);
            }
        });
        var purchaseFeedMUsedFeed = {{$goatDailyVaccineStock}};
        $('#goatVaccineQuantity').change(function () {
            if (this.value > purchaseFeedMUsedFeed) {
                alert('Please do not exceed the Available Quantity');
                $('#goatVaccineQuantity').val(purchaseFeedMUsedFeed);
            } else if (this.value == 0) {
                alert('You can no sell 0 quantity');
                $('#goatVaccineExceed').prop('disabled', true);
                $(this).val(purchaseFeedMUsedFeed);
            } else {
                $('#goatVaccineExceed').prop('disabled', false);
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
