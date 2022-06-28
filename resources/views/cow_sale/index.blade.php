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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Sale Cow') }}</li>
                </ol><!-- End breadcrumb -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addMilk">Sale Cow</button>
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
                            <div class="tab-pane" id="tab21">
                                <div class="float-right mb-3">
                                    <div class="input-group">
                                        <!-- Message Modal -->
                                        <div class="modal fade" id="addMilk" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="example-Modal3">Sale CowMilk</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('cow_sale.store')}}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="form-control-label required">Date</label>
                                                                {{--<input type="hidden" name="cow_id" value="{{$cow_sale->id}}">--}}
                                                                <input type="text" onfocus="(this. type='date')" class="form-control" name="date"
                                                                       value="<?php echo date('Y-m-d');?>" required>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label for="message-text" class="form-control-label required">Cow Serial</label>
                                                                <select name="cow_serial" class="form-control select2 custom-select" required
                                                                        onchange="change_status(this.value);">
                                                                    <option value="">Please Select Cow to be Sold</option>
                                                                    @foreach($cows as $cow)
                                                                        <option value="{{$cow->serial_no}}">{{$cow->serial_no}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" class="form-control-label required">Amount</label>
                                                                <input type="number" class="form-control" id="amount" name="amount" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" class="form-control-label">Description</label>
                                                                <input type="text" class="form-control" id="description" name="description">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="submitCowSale" class="btn btn-primary">Sale Cow</button>
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
                                    <table class="table table-striped table-bordered text-nowrap w-100 display">
                                        <thead>
                                        <tr>
                                            <th class="wd-15p">ID</th>
                                            <th class="wd-25p">Date</th>
                                            <th class="wd-15p">Cow-Serial</th>
                                            <th class="wd-15p">Sale Amount</th>
                                            <th class="wd-15p notExport">Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($soldCow as $cow)

                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$cow->date ?? ''}}</td>
                                                <td>{{ $cow->accountSubHead->name ?? '' }}</td>
                                                <td>
                                                    {{ $cow->amount ?? ''}}
                                                </td>
                                                <td>{{ $cow->description ?? ''}} </td>
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
        $(function () {
            $('.act').click(function () {
                $(this).toggleClass('active');
            });
        });
    </script>
@endsection
