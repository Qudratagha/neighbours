@extends('layouts.nav')
@section('title', 'Register - Goat/Sheep')
@section('app-content', 'app-content')
@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('cattle.index', 'goat')}}">Goats/Sheep List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Create Goat/Sheep') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Create Goat/sheep') }}</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('cattle.store', 'goat')}}">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label required">Date Of Birth</label>
                                            <input type="text" onfocus="(this. type='date')" class="form-control"
                                                   name="dob" value="<?php echo date('Y-m-d');?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">Parent</label>
                                            <select name="parent_id" id="parent_id" class="form-control" required>
                                                <option selected disabled>Choose Parent</option>
                                                @foreach($goats as $goat)
                                                    <option value="{{$goat->id}}">{{$goat->serial_no}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-4">
                                                <label for="cattle_name" class="form-label required">Select Cattle
                                                    Type</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="cattle_type_id"
                                                           id="1" value="2" required>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Goat
                                                    </label>
                                                </div>
                                                <div class="form-check required">
                                                    <input class="form-check-input" type="radio" name="cattle_type_id"
                                                           id="0" value="3" required>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Sheep
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group col-4">
                                                <label for="gender" class="form-label required">Select Gender</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender" id="1"
                                                           value="1" required>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Male
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender" id="0"
                                                           value="0" required>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Female
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">Serial No.</label>
                                            <input type="number" class="form-control" name="serial_no"
                                                   placeholder="Serial No." required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label required">Date</label>
                                            <input type="text" onfocus="(this. type='date')" class="form-control"
                                                   name="date" value="<?php echo date('Y-m-d');?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">Breed</label>
                                            <input type="text" class="form-control" name="breed"
                                                   placeholder="Enter Breed" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Weight</label>
                                            <input type="number" class="form-control" name="weight"
                                                   placeholder="Enter Weight">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Height</label>
                                            <input type="number" class="form-control" name="height"
                                                   placeholder="Enter Height">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="submitGoat" class="btn btn-primary">Submit</button>
                                <a href="{{route('cattle.index', 'goat')}}" type="button" class="btn btn-secondary">Back</a>
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

