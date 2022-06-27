@extends('layouts.nav')
@section('title', 'Edit Cultivation')
@section('margin', 'my-md-5')
@section('app-content', 'app-content')


@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('cultivation.index')}}">Cultivation List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Cultivation') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Edit Cultivation') }} ID # {{$cultivation->id}}</h3>
                        </div>
                        <form class="form-horizontal" method="post"
                              action="{{route('cultivation.update',$cultivation->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cultivation Type" class="required">Cultivation Type</label>
                                            <select name="cultivation_type_id"
                                                    class="form-control select2 custom-select" required>
                                                @foreach($cultivation_types as $cultivation_type)
                                                    <option value="{{$cultivation_type->id}}" {{ $cultivation_type->id == $cultivation->cultivation_type_id ? 'selected' : '' }}>{{$cultivation_type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Fertilizer</label>
                                            <input type="text" class="form-control" name="fertilizer"
                                                   value="{{$cultivation->fertilizer}}">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="required">Date</label>
                                            <input type="text" onfocus="(this. type='date')" class="form-control"
                                                   name="created_at"
                                                   value="{{date('Y-m-d', strtotime($cultivation->created_at))}}"
                                                   required>
                                        </div>
                                        <div class="form-group">
                                            <label for="total_area_cultivated" class="required">Total Area
                                                Cultivated (In sq ft)</label>
                                            <input type="text" class="form-control" name="total_area_cultivated"
                                                   value="{{$cultivation->total_area_cultivated}}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('more-script')
    <script>
        @parent
        $(document).ready(function () {
            $('#mytable').DataTable({});
        });
    </script>
@endsection

