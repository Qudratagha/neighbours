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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>
                </ol>
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
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Edit Poultry') }} ID # {{$poultry->id}}</h3>
                        </div>
                        {{--  edit poultry  start --}}
                        <form class="form-horizontal" method="post" action="{{route('poultry.update',$poultry->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Date</label>
                                            <input type="text" onfocus= "(this. type='date')" class="form-control" name="created_at" value="{{date('d-m-Y', strtotime($poultry->created_at))}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Quantity</label>
                                            <input type="text" class="form-control" name="quantity" value="{{$poultry->quantity}}" >
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href="{{ url()->previous() }}" class="btn btn-outline-danger">Back</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Poultry Type</label>
                                            <select name="poultry_type_id" class="form-control select2 custom-select" required onchange="change_status(this.value);">
                                                <option value="" hidden >{{$poultry->poultryType->name}}</option>
                                                @foreach($poultry_types as $poultry_type)
                                                    <option value="{{$poultry_type->id}}">{{$poultry_type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Poultry Status</label>
                                            {{ $poultry->poultryStatus->name }}
{{--                                            <select name="poultry_status_id" id="poultry_status_id" class="form-control select2 custom-select" required>--}}
                                            <select name="poultry_status_id" id="poultry_status_id" class="form-control select2 custom-select">
                                                <option value="{{$poultry->poultryStatus->id}}">{{$poultry->poultryStatus->name}}</option>
{{--                                                @foreach($poultry_statuses as $poultry_status)--}}
{{--                                                    <option value="{{$poultry_status->id}}" >{{$poultry_status->name}}</option>--}}
{{--                                                @endforeach--}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{--  edit poultry end --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('more-script')
    <script>
        const poultry_status = {
            'poultry_1' : {
                'name' : 'Hen',
                'status' : [
                    { id: 1, value: 'Die'},
                    { id: 5,value: 'Purchase'},
                    { id: 6, value: 'Sick'},

                ]
            },
            'poultry_2' : {
                'name' : 'Chicks',
                'status' : [
                    { id : 1, value: 'Die' },
                    { id : 2, value: 'Collected' },
                    { id : 4, value: 'Converted To Hen' },
                    { id : 6, value: 'Sick'},

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
    </script>
@endsection
