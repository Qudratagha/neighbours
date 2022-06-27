@extends('layouts.nav')
@section('title', 'Milk Collection')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('cattle.index','cow')}}">Cow List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Milk Collection') }}</li>
                </ol><!-- End breadcrumb -->
                <div class="ml-auto">
                    <div class="input-group">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addMilk">Add Milk
                        </button>
                        <div class="modal fade" id="addMilk" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="example-Modal3">Milk Collection</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{route('milk_collection.store')}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="recipient-name"
                                                       class="form-control-label">Date</label>
                                                <input type="text"
                                                       onfocus="(this. type='date')"
                                                       class="form-control" name="date"
                                                       value="<?php echo date('Y-m-d');?>"
                                                       required>
                                            </div>
                                            <div class="form-group ">
                                                <label for="message-text" class="form-control-label required">Cow Serial</label>
                                                <select name="serial_no" class="form-control select2 custom-select" required
                                                        onchange="change_status(this.value);">
                                                    <option value="">Please Select Cow to be Sold</option>
                                                    @foreach($cows as $cow)
                                                        <option value="{{$cow->serial_no}}">{{$cow->serial_no}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text"
                                                       class="form-control-label">Quantity (In Liters)</label>
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
                                                <button type="submit" name="submitMilk"
                                                        class="btn btn-primary">Add Milk
                                                </button>
                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        data-dismiss="modal">Close
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Milk Collection') }}</h3>
                        </div>
                        <div class="card-body">
                            <h3 class="mb-0 card-title"> Total Milk Stock Available {{ \App\Models\Transaction::milkStock() }}</h3>
                            <div class="table-responsive">
                                <table id="" class="table table-striped table-bordered text-nowrap w-100 display">
                                    <thead>
                                    <tr>
                                        <th class="wd-30p">S#</th>
                                        <th class="wd-30p">Cow Serial</th>
                                        <th class="wd-30p">Date</th>
                                        <th class="wd-30p">Quantity</th>
                                        <th class="wd-10p">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $t)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$t->accountSubHead->name ?? ''}}</td>
                                            <td>{{$t->date ?? ''}}</td>
                                            <td>{{$t->quantity ?? ''}} Liters</td>
                                            <td>
                                                <form action="{{ route('milk_collection.destroy',$t->id) }}"
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
        {{--      end side app --}}
    </div>
    {{--   end container area--}}
@endsection
