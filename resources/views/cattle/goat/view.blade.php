@extends('layouts.nav')

@section('title', 'Register - Cow')

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
                        <a href="{{route('goat.edit',$goat->id)}}" type="button" class="btn btn-info" >Edit Goat/Sheep</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">View Goat/Sheep Details</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <dl>
                                        <dt>Date </dt>
                                        <dd>{{$goat->date}}</dd>
                                        <dt>Cattle Name</dt>
                                        <dd>{{$goat->cattle_type->name}}</dd>
                                        <dt>Gender </dt>
                                        <dd>{{$goat->gender}}</dd>
                                        <dt>Date Of Birth </dt>
                                        <dd>{{$goat->dob}}</dd>
                                        <dt>Entry In Farm </dt>
                                        <dd>{{$goat->entry_in_farm}}</dd>
                                        <dt>Age </dt>
                                        <dd>{{$goat->age}}</dd>
                                        <dt>Breed</dt>
                                        <dd>{{$goat->breed}}</dd>
                                        <dt>Weight</dt>
                                        <dd>{{$goat->weight}}</dd>
                                        <dt>Height</dt>
                                        <dd>{{$goat->height}}</dd>
{{--                                                                                <dt>Dry Date: </dt>--}}
{{--                                                                                <dd>{{$cow->dry}}</dd>--}}
{{--                                                                                <dt>Dead Date: </dt>--}}
{{--                                                                                <dd>{{$cow->dead}}</dd>--}}
{{--                                        <dt>Date Of Birth: </dt>--}}
{{--                                        <dd>{{$cow->dob}}</dd>--}}
{{--                                        <dt>Entry In Farm: </dt>--}}
{{--                                        <dd>{{$cow->entry_in_farm}}</dd>--}}
{{--                                        <dt>Age: </dt>--}}
{{--                                        <dd>{{$cow->age}}</dd>--}}
{{--                                        <dt>Breed: </dt>--}}
{{--                                        <dd>{{$cow->breed}}</dd>--}}
{{--                                        <dt>Weight: </dt>--}}
{{--                                        <dd>{{$cow->weight}}</dd>--}}
{{--                                        <dt>Height: </dt>--}}
{{--                                        <dd>{{$cow->height}}</dd>--}}
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
