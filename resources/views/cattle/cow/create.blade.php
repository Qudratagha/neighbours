@extends('layouts.nav')
@section('title', 'Register - Cow')

@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('cattle.index','cow')}}">Cows</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Add Cow') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Add Cow') }}</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('cattle.store','cow')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Enter Date</label>
                                            <input type="text" onfocus= "(this. type='date')" class="form-control" name="date" value="<?php echo date('Y-m-d');?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Cow Serial</label>
                                            <input type="number" class="form-control" name="serial_no" placeholder="Enter Serial No">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Date Of Birth</label>
                                            <input type="text" onfocus= "(this. type='date')" class="form-control" name="dob" value="<?php echo date('Y-m-d');?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Parent</label>
                                            <select name="parent_id" id="parent_id" class="form-control">
                                                <option value="">Choose Parent</option>
                                                @foreach($cows as $cow)
                                                    <option value="{{$cow->parent_id}}">{{$cow->serial_no}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Entry In Farm</label>
                                            <input type="text" onfocus= "(this. type='date')" class="form-control" name="entry_in_farm" value="<?php echo date('Y-m-d');?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="form-label">Age</label>
                                            <input type="number" class="form-control" name="age" placeholder="Enter Age">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Breed</label>
                                            <input type="text" class="form-control" name="breed" placeholder="Enter Breed">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Weight</label>
                                            <input type="number" class="form-control" name="weight" placeholder="Enter Weight">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Height</label>
                                            <input type="number" class="form-control" name="height" placeholder="Enter Height">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="submitCow" value="1" class="btn btn-primary">Submit</button>
                                <a href="{{route('cattle.index','cow')}}" type="button" class="btn btn-danger">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--      end side app --}}
    </div>
    {{--   end container area--}}
@endsection
