@extends('layouts.nav')
@section('title', 'Sale - Cow')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('cattle.index','goat')}}">All Goats</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Sale Goat') }}</li>
                </ol><!-- End breadcrumb -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addGoat">Sale Goat</button>
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
                            <div class="float-right mb-3">
                                <div class="input-group">
                                    <!-- Message Modal -->
                                        <div class="modal fade" id="addGoat" tabindex="-1" role="dialog"  aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="example-Modal3">Sale Goat</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('goat_sale.store')}}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="form-control-label required">Date</label>
{{--                                                            <input type="hidden" name="cow_id" value="{{$cow_sale->id}}">--}}
                                                                <input type="text" onfocus= "(this. type='date')" class="form-control" name="date" value="<?php echo date('Y-m-d');?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" class="form-label required">Goats Quantity</label>
                                                                <select class="form-control form-select quantity" name="quantity[]" multiple="multiple" style="width: 100%; outline: 0; border: 2px solid black; border-radius: 4px;" required>
                                                                    @foreach($goats as $goat)
                                                                        @if( $goat->dead_date == null && $goat->dry_date == null && $goat->saleStatus == 0)
                                                                            <option value="{{$goat->serial_no}}">{{$goat->serial_no}}</option>
                                                                        @endif
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
                                                                <button type="submit" name="submitGoatSale" class="btn btn-primary">Sale Goat</button>
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
                                            <th class="wd-15p">Goat Quantity</th>
                                            <th class="wd-15p notExport">Sold Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($transaction as $t)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$t->date ?? ''}}</td>
                                                    <td>{{$t->quantity ?? ''}}</td>
                                                    <td>{{$t->amount}}</td>
                                                    <td></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('more-script')
    <script>
        $(function() {
            $('.act').click(function() {
                $(this).toggleClass('active');
            });
        });

        $(function(){
            $('.quantity').select2({
                tags: true
            });
        })
    </script>
@endsection
