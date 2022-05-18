@extends('layouts.nav')
@section('title', 'Sale - Cow')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('cattle.index','cow')}}">All Cows</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Milk Cow') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Sale</h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-pane active" id="tab11">
                                <div class="float-right mb-3">
                                    <div class="input-group">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addMilk">Sale Milk</button>
                                        <!-- Message Modal -->
                                        <div class="modal fade" id="addMilk" tabindex="-1" role="dialog"  aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="example-Modal3">Sale Milk</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('milk_sale.store')}}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="form-control-label">Date</label>
                                                                {{--                                    <input type="hidden" name="cow_id" value="{{$cow_sale->id}}">--}}
                                                                <input type="text" onfocus= "(this. type='date')" class="form-control" name="date" value="<?php echo date('Y-m-d');?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <?php
                                                                $totalMilk = \App\Models\Transaction::milkStock();
                                                                ?>
                                                                <label for="message-text" class="form-control-label">Quantity</label>
                                                                <input type="number" class="form-control" id="quantity" name="quantity" required>
                                                                <div class="invalid-feedback" style="display: block !important;">
                                                                    Total Quantity Available is {{$totalMilk}} Liters
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" class="form-control-label">Description</label>
                                                                <input type="text" class="form-control" id="description" name="description">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="submitMilkSale" class="btn btn-primary">Sale Milk</button>
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
                                            <th class="wd-15p">Quantity</th>
                                            <th class="wd-15p">Total Amount</th>
                                            <th class="wd-15p">Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($soldMilk as $t)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$t->date ?? ''}}</td>
                                                <td>{{$t->quantity ?? ''}} Liters</td>
                                                <td> Rs/- {{$t->amount ?? ''}}</td>
                                                <td>{{$t->description ?? ''}}</td>
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
        {{--      end side app --}}
    </div>
    {{--   end container area--}}
@endsection
@section('more-script')
    <script>
        var milkQty = {{$totalMilk}};
        $(function() {
            $('.act').click(function() {
                $(this).toggleClass('active');
            });

            $('#quantity').change(function () {
                if(this.value > milkQty)
                {
                    alert('Please do not exceed the Available Stock');
                    $(this).val(milkQty);
                }
            })
        });

    </script>
@endsection
