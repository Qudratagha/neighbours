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

                            $totalPurchaseHen = \App\Models\Poultry:: totalPurchaseHen();
                            $totalDieHen = \App\Models\Poultry:: totalDieHen();
                            $totalSickHen = \App\Models\Poultry:: totalSickHen();
                            $totalHealthyHen = \App\Models\Poultry:: totalHealthyHen();
                            $totalPurchaseSickHealthy = \App\Models\Poultry:: totalPurchaseSickHealthy();
//                            dd($totalPurchaseSickHealthy);
                            $totalEggsCollected = \App\Models\Poultry:: totalHenEggs();

                            $totalEggsToBeIncubated = \App\Models\Poultry:: totalEggsToBeIncubated();

                            $chicksCollected = \App\Models\Poultry:: chicksCollected();


                            $totalSickChicks = \App\Models\Poultry:: totalSickChicks();

                            $totalSickMHealthy = \App\Models\Poultry:: totalSickMHealthy();
                            if ($totalPurchaseHen > $totalDieHen){
                                $purchaseMdie = $totalPurchaseHen - $totalDieHen;
                            }
                            else{
                                $purchaseMdie = 0;
                            }
                            $purchasePhealthy =   $totalPurchaseHen + $totalHealthyHen;

                            if ($totalPurchaseHen > $totalSickHen && $totalPurchaseHen > $totalDieHen  ){
                                $purchaseMsick = $totalPurchaseHen - $totalDieHen;
                            }
                            else{
                                $purchaseMsick = 0;
                            }
                            if ($totalSickHen > $totalHealthyHen && $totalPurchaseHen > $totalDieHen ){
                                $sickMhealthy = $totalSickHen - $totalHealthyHen;
                            }
                            else{
                                $sickMhealthy = 0;
                            }



//                            $totalSickHen = \App\Models\Poultry::where('poultry_type_id',1)->where('poultry_status_id',7)->pluck('remaining_quantity')->last();
                            $totalHen = \App\Models\Poultry::where('poultry_type_id',1)->where('poultry_status_id',6)->pluck('remaining_quantity')->last();
                            $totalRemainingHen = $totalHen - $totalSickHen;
//                            if ($totalSickHen == NULL)
//                            {
//                                $totalSickHen = 0;
//                            }
                            $totalHen = \App\Models\Poultry::where('poultry_type_id',1)->where('poultry_status_id',6)->pluck('remaining_quantity')->last();
                            if ($totalHen == NULL)
                            {
                                $totalHen = 0;
                            }
                            if ($totalRemainingHen == NULL)
                            {
                                $totalRemainingHen = 0;
                            }
                            //      Hens calculation Ends
                            //      Eggs calculation Starts
                            $totalEggs = \App\Models\Poultry::where('poultry_type_id',3)->where('poultry_status_id',4)->pluck('remaining_quantity')->last();
                            if ($totalEggs == NULL)
                            {
                                $totalEggs = 0;
                            }
                            //      Hens calculation Ends
                            //      Chicks calculation Starts
                            $totalChicks = \App\Models\Poultry::where('poultry_type_id',2)->where('poultry_status_id',4)->pluck('remaining_quantity')->last();
                            if ($totalChicks == NULL)
                            {
                                $totalChicks = 0;
                            }
                            //      Chicks calculation Ends
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
        let totalPurchaseHen = {{$totalPurchaseHen}};
        let purchaseMdie = {{$purchaseMdie}};
        let totalSickHen = {{$totalSickHen}};

        let sickMhealthy = {{$sickMhealthy}};


        let totalPurchaseSickHealthy = {{$totalPurchaseSickHealthy}};

        let purchaseMsick = {{$purchaseMsick}};

        let purchasePhealthy = {{$purchasePhealthy}};


        // Eggs calculation
        let totalEggsCollected = {{$totalEggsCollected}};
        let totalEggsToBeIncubated = {{$totalEggsToBeIncubated}};

        let totalhens = {{$totalHen}};
        let totalsickhensRemaining = {{$totalRemainingHen}};
        {{--let totalSickHen = {{$totalSickHen}};--}}

            let chicksCollected = {{$chicksCollected}};
            let totalSickChicks = {{$totalSickChicks}};
            let totalSickMHealthy = {{$totalSickMHealthy}};

        let totalEggs = {{$totalEggs}};
        let totalChicks = {{$totalChicks}};
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

                    // console.log(this.value);



                    $.ajax({
                        url: "{{  route('poultry.getDateQuantity',"") }}/"+date,
                        method: 'get',
                        success: function(result){
                            $('#testing').html('Total Remaining Incubated Eggs = '+result);
                            newQty = result;
                        }
                    });
                });
                console.log(this.value);
                console.log(pti);
                switch (this.value != 0 || pti != 0)
                {
                    //      Hen calculation Starts

                    case this.value == 1 && pti == 1:
                        {
                            newQty = purchaseMdie;
                            validationMsg = 'Total Purchase Minus Die Hens = ' + purchaseMdie;
                            break;
                        }
                    case this.value == 7 && pti == 1:
                        {
                            newQty = totalPurchaseSickHealthy;
                            validationMsg = 'Total Purchase Sick Healthy Hens = ' + totalPurchaseSickHealthy;
                            break;
                        }
                    case this.value == 8 && pti == 1:
                        {
                            newQty = sickMhealthy;
                            validationMsg = 'Total Sick Hens = ' + sickMhealthy;
                            break;
                        }
                    //      Hen calculation Ends
                    //      Egg calculation Starts
                    case this.value == 3 && pti == 4:
                    {
                        newQty = totalEggs;
                        validationMsg = 'Total Hens = ' + totalEggs;
                        break;
                    }

                    //      Egg calculation Ends

                    case this.value == 4 && pti == 3:
                        {
                            newQty = totalEggsCollected;
                            validationMsg = 'Total Eggs To Be Collected = ' + totalEggsCollected;
                            break;
                        }
                    case this.value == 3 && pti == 3:
                    {
                        newQty = totalEggsToBeIncubated;
                        validationMsg = 'Total Eggs To Be Incubated = ' + totalEggsToBeIncubated;
                        break;
                    }
                    //      Eggs calculation Ends
                    //      Chick calculation Starts

                    case this.value == 1 && pti == 2:
                    {
                        newQty = chicksCollected;
                        validationMsg = 'Total Collected Chicks = ' + chicksCollected;
                        break;
                    }
                    case this.value == 7 && pti == 2:
                    {
                        newQty = totalSickChicks;
                        validationMsg = 'Total Chicks To Be Sick = ' + totalSickChicks;
                        break;
                    }
                    case this.value == 8 && pti == 2:
                    {
                        newQty = totalSickMHealthy;
                        validationMsg = 'Total Chicks To Be Healthy = ' + totalSickMHealthy;
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
                    { id: 6,value: 'Purchase'},
                    { id: 7, value: 'Sick'},
                    { id: 8, value: 'Healthy'},
                ]
            },
            'poultry_2' : {
                'name' : 'Chicks',
                'status' : [
                    { id : 1, value: 'Die' },
                    { id : 4, value: 'Collected' },
                    { id : 5, value: 'Converted To Hen' },
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

        function change_status(statusID) {
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

