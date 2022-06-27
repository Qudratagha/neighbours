@extends('layouts.nav')
@section('title', 'Poultry')
@section('margin', 'my-md-5')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Poultry') }}</li>
                </ol><!-- End breadcrumb -->
                <div class="ml-auto">
                    <div class="input-group">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-poultry">Add Poultry</button>
                    </div>
                </div>
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Add_Poultry') }}</h3>
                        </div>
                        <div class="card-body">
                            <!-- DataTables Start -->

                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordered" style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Quantity</th>
                                        <th>Poultry Type</th>
                                        <th>Poultry Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($poultries as $poultry)
                                            <tr>
                                                <td>{{$poultry->id}}</td>
                                                <td>{{date('d-m-Y', strtotime($poultry->created_at))}}</td>
                                                <td>{{$poultry->quantity}}</td>
                                                <td>{{$poultry->poultryType->name}}</td>
                                                <td>{{$poultry->poultryStatus->name}}</td>

                                                <?php
                                                $lastEntry = \App\Models\Poultry::orderBy('id', 'desc')->pluck('id')->first();
                                                ?>
                                                @if ($lastEntry == $poultry->id)
                                                <td>
                                                    <form action="{{route('poultry.destroy', $poultry->id)}}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <a href="{{route('poultry.edit',$poultry->id)}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"><i class="fe fe-edit-3"></i></a>
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fe fe-trash-2"></i></button>
                                                    </form>
                                                </td>
                                            @else
                                                    <td></td>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- DataTables Ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--      end side app --}}
    </div>
    {{--   end container area--}}
    <!-- Add Poultry Modal -->
    <div class="modal fade" id="add-poultry" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Add Poultry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('poultry.store')}}" >
                        @csrf

                        <div class="form-group">
                            <label class="form-label">Entry In Farm</label>
                            <input type="text" name="created_at" onfocus= "(this. type='date')" class="form-control" name="entry_in_farm" value="<?php echo date('Y-m-d');?>">
                        </div>
                        <div class="form-group ">
                            <label class="form-label">Poultry Type</label>
                            <select name="poultry_type_id" id="poultry_type_id" class="form-control select2 custom-select" required onchange="change_status(this.value);">
                                <option value="">Please Select Poultry Type</option>
                                @foreach($poultry_types as $poultry_type)
                                    <option value="{{$poultry_type->id}}" >{{$poultry_type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                            <label class="form-label">Poultry Status</label>
                            <select name="poultry_status_id" id="poultry_status_id" class="form-control select2 custom-select" required></select>
                        </div>
                        <div class="form-group" id="incubatedDate"></div>

                        <div class="form-group">
                            <label for="quantity" class="form-control-label">Quantity:</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" required>
                            <?php

                            //      Hens calculation Starts
                            $purchaseMsaleMdie = \App\Models\Poultry::purchaseMsaleMdie();
                            $purchaseMsaleMdieMsickHen = \App\Models\Poultry:: purchaseMsaleMdieMsickHen();
                            $totalSickHen = \App\Models\Poultry:: sickMHealthy();
                            //      Hens calculation Ends
                            //      Eggs calculation Starts
                            $totalEggsCollected = \App\Models\Poultry::totalEggsCollected();
                            //      Egg calculation Ends
                            //      Chicks calculation Starts
                            $totalRemainingChicks = \App\Models\Poultry::totalRemainingChicks();
                            $totalRemainingMsick = \App\Models\Poultry::totalRemainingMsick();
                            $totalSickPHealthy = \App\Models\Poultry::totalSickPHealthy();
                            //      Chicks calculation Ends
                            //      Feed calculation Starts
                            $totalFeedPurchase = \App\Models\Poultry::totalFeedPurchase();
                            //      Feed calculation Ends
                            ?>
                            <div id="totalHen" class="invalid-feedback" style="display: block !important;"></div>
                            <div id="testing" class="invalid-feedback" style="display: block !important;"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('more-script')
    <script>
        // Hen Calculation Starts
        let purchaseMsaleMdie = {{$purchaseMsaleMdie}};
        let purchaseMsaleMdieMsickHen = {{$purchaseMsaleMdieMsickHen}};
        let totalSickHen = {{$totalSickHen}};
        // Hen Calculation Ends
        // Egg Calculation Starts
        let totalEggsCollected = {{$totalEggsCollected}};
        let totalRemainingChicks = {{$totalRemainingChicks}};
        // Egg Calculation Ends
        // Chicks Calculation Starts
        let totalRemainingMsick = {{$totalRemainingMsick}};
        let totalSickPHealthy = {{$totalSickPHealthy}};
        // Hen Calculation Ends
        // Feed Calculation Starts
        let totalFeedPurchase = {{$totalFeedPurchase}};


        // Feed Calculation Ends

        var newQty = 0;
        var current_poultry_status = 0;
        var alertMsg = "";
        var validationMsg = "";
        $(function(){

            $('#quantity').change(function () {
                if(this.value > newQty && current_poultry_status != 6)
                {
                    alert(alertMsg);
                    $('#quantity').val(newQty);
                }
            });
            $("#poultry_status_id").change(function(){
                current_poultry_status = this.value;
                alertMsg = 'Please do not exceed the Available Quantity';
                let pti = $("#poultry_type_id").val();

                if (this.value == 4 && pti == 2)
                {
                    $('#incubatedDate').html('<label class="form-label">Incubation Date</label>\n' +
                        '                            <select id="mySelect" name="collection_date" class="form-control dates">\n' +
                        '                                <option value="">Please Select Incubation Date</option>\n' +
                        '                                    @foreach($eggincdates as $eggincdate)\n' +
                        '                                        <option value={{$eggincdate}} >{{$eggincdate}}</option>\n' +
                        '                                    @endforeach\n' +
                        '                            </select>');
                } else {
                    $('#incubatedDate').html('');
                }
                $('#mySelect').change(function(e){
                    var date = this.value;

                    $.ajax({
                        url:"{{  route('poultry.getIncubationDates',"") }}/"+date,
                        method:'get',
                        success: function(result){
                            $('#testing').html('Total Remaining Incubated Eggs = '+result);
                            newQty = result;
                        }
                    });

                    $.ajax({
                        url: "{{  route('poultry.getDateQuantity',"") }}/"+date,
                        method: 'get',
                        success: function(result){
                            $('#testing').html('Total Remaining Incubated Eggs = '+result);
                            newQty = result;
                        }
                    });
                });
                switch (this.value != 0 || pti != 0)
                {
                    //      Hen calculation Starts
                    case this.value == 1 && pti == 1:
                        {
                            newQty = purchaseMsaleMdie;
                            validationMsg = 'Remaining Hens = ' + purchaseMsaleMdie;
                            break;
                        }
                    case this.value == 7 && pti == 1:
                        {
                            newQty = purchaseMsaleMdieMsickHen;
                            validationMsg = 'Remaining Hens = ' + purchaseMsaleMdieMsickHen;
                            break;
                        }
                    case this.value == 8 && pti == 1:
                        {
                            newQty = totalSickHen;
                            validationMsg = 'Total Sick Hens = ' + totalSickHen;
                            break;
                        }
                    //      Hen calculation Ends
                    //      Egg calculation Starts
                    case this.value == 4 && pti == 3:
                    {
                        newQty = purchaseMsaleMdie;
                        validationMsg = 'Total Eggs to be Collected = ' + purchaseMsaleMdie;
                        break;
                    }
                    case this.value == 3 && pti == 3:
                    {
                        newQty = totalEggsCollected;
                        validationMsg = 'Total Eggs To Be Incubated = ' + totalEggsCollected;
                        break;
                    }
                    //      Eggs calculation Ends
                    //      Chick calculation Starts
                    case this.value == 1 && pti == 2:
                    {
                        newQty = totalRemainingChicks;
                        validationMsg = 'Total Collected Chicks = ' + totalRemainingChicks;
                        break;
                    }
                    case this.value == 7 && pti == 2:
                    {
                        newQty = totalRemainingMsick;
                        validationMsg = 'Total Chicks To Be Sick = ' + totalRemainingMsick;
                        break;
                    }
                    case this.value == 8 && pti == 2:
                    {
                        newQty = totalSickPHealthy;
                        validationMsg = 'Total Chicks To Be Healthy = ' + totalSickPHealthy;
                        break;
                    }
                    //      Chick calculation Ends
                }
                //      Chick calculation Starts
                $('#totalHen').html(validationMsg);
            });
                //      Hens calculation Starts
                //      Chick calculation Ends
                });

        $(document).ready(function() {
            $('#mytable').DataTable( {
                "ordering": false
            });
        });

        const poultry_status = {
            'poultry_1' : {
                'name' : 'Hen',
                'status' : [
                    { id: 1, value: 'Die'},
                    { id: 7, value: 'Sick'},
                    { id: 8, value: 'Healthy'},
                ]
            },
            'poultry_2' : {
                'name' : 'Chicks',
                'status' : [
                    { id : 1, value: 'Die' },
                    { id : 4, value: 'Collected' },
                    { id : 7, value: 'Sick'},
                    { id: 8, value: 'Healthy'},
                ]
            },
            'poultry_3' : {
                'name' : 'Egg',
                'status' : [
                    { id : 3, value: 'Incubated' },
                    { id : 4, value: 'Collected' },
                ]
            }
        };

        function change_status(statusID)
        {
            var strOptions = '<option value="">Please Select Poultry Status</option>';
            poultry_status['poultry_'+statusID].status.forEach(function(val,idx)
            {
                strOptions+="<option value='"+val.id+"'>"+val.value+"</option>";
            });
            $('#poultry_status_id').html(strOptions);
        }

        @if(session()->has('alert'))
            alert('{{ session('alert') }}');
        @endif
    </script>
@endsection

