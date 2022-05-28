@extends('layouts.nav')
@section('title', 'Cultivation')
@section('margin', 'my-md-5')
@section('app-content', 'app-content')


@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>
                </ol><!-- End breadcrumb -->
                <div class="ml-auto">

                    <div class="input-group">
                        <button type="button" class="btn btn-outline-info mr-2" data-toggle="modal" data-target="#add-cultivation">Cultivation Sale</button>

                    </div>
                </div>
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Add_Cultivation') }}</h3>
                        </div>

                        <div class="card-body">
                            <!-- DataTables Start -->
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordered" style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cultivation Type</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>{{$transaction->id}}</td>
                                            <td>{{$transaction->accountSubHead->name}}</td>
                                            <td>{{$transaction->quantity}} Kg</td>
                                            <td>{{$transaction->amount}}</td>
                                            <td>{{$transaction->description}}</td>
                                            <td>{{$transaction->date}}</td>
                                            <td>
                                                <?php
                                                    $saleCultivation =  App\Models\Transaction::where('transaction_type_id', 1)->pluck('id')->last();
                                                ?>
                                                @if($transaction->id == $saleCultivation)
                                                    <form action="{{ route('cultivation.destroy',$transaction->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fe fe-trash-2"></i></button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
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
    <!-- Modal -->
    <!-- Add cultivation Modal -->
    <div class="modal fade" id="add-cultivation" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Cultivation Sale</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('cultivation.store')}}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Cultivation Type</label>
                            <select class="form-control select2 custom-select" id="cultivationType" name="cultivation_type_id">
                                <option value="">Please Select Cultivation Type</option>
                                @foreach($cultivation_types as $cultivation_type)
                                    <option value="{{$cultivation_type->id}}" >{{$cultivation_type->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <?php
                                $totalWheat = App\Models\Transaction::wheatStock();
                                $totalCorn = App\Models\Transaction::cornStock();
                                $totalCucumber = App\Models\Transaction::cucumberStock();
                            ?>
                            <label for="quantity" class="form-control-label">Quantity:</label>
                            <input type="number" name="quantity" class="form-control" id="quantity">
                                <div class="invalid-feedback" id="available" style="display: block !important;">

                                </div>
                        </div>
                        <div class="form-group">
                            <label for="amount" class="form-control-label">Amount:</label>
                            <input type="number" name="amount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="date" class="form-control-label">Select Date:</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description:</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                            <button type="submit" id="btn" name="saleCultivation" class="btn btn-outline-success">Submit </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('more-script')
    <script>
        @parent
            var  wheatQty = {{$totalWheat}};
            var  cornQty = {{$totalCorn}};
            var  cucumberQty = {{$totalCucumber}};
        $(document).ready(function() {
            $('#mytable').DataTable( {
            });
        });

        $(function () {
            $('#cultivationType').on('change', function() {
                if(this.value == 1){
                    $('#available').html("Total Stock Available Of Wheat " + wheatQty + " kg" );
                    $('#quantity').change(function () {
                        if(this.value > wheatQty)
                        {
                            alert('Please do not exceed the Available Stock');
                            $(this).val(wheatQty);
                            $('#btn').prop('disabled', true);

                        }else {

                            $('#btn').prop('disabled', false);
                        }

                    });
                }

                if (this.value == 2){
                    $('#available').html("Total Stock Available Of Corn " + cornQty + " kg" );
                    $('#quantity').change(function () {
                        if(this.value > cornQty)
                        {
                            alert('Please do not exceed the Available Stock');
                            $(this).val(cornQty);
                            $('#btn').prop('disabled', true);

                        }else {

                            $('#btn').prop('disabled', false);
                        }
                    });
                }


                if(this.value == 3){
                    $('#available').html("Total Stock Available Of Cucumber " + cucumberQty + " kg" );
                    $('#quantity').change(function () {
                        if(this.value > cucumberQty)
                        {
                            alert('Please do not exceed the Available Stock');
                            $(this).val(cucumberQty);
                            $('#btn').prop('disabled', true);

                        }else {

                            $('#btn').prop('disabled', false);
                        }

                    });
                }
            });


        });

    </script>
@endsection

