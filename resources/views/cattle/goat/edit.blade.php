@extends('layouts.nav')
@section('title', 'Register - Goat/Sheep')

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
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Dashboard') }}</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('cattle.update', ['goat', $cattle_id->id])}}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Enter Date</label>
                                            <div class="wd-200 mg-b-30">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" onfocus= "(this. type='date')" class="form-control" name="date" value="{{$cattle_id->date}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Goat/Sheep Serial</label>
                                            <input type="number" class="form-control" name="serial_no" placeholder="Enter Serial No" value="{{$cattle_id->serial_no}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="cattle_name" class="form-label">Select Cattle Type</label>
                                            <div class="form-check">
<<<<<<< HEAD
                                                <input class="form-check-input" type="radio" name="cattle_type" id="1" value="1" {!! ($cattle_id->cattle_type_id == 2 ? 'checked' : '') !!} >
=======
                                                <input class="form-check-input" type="radio" name="cattle_type_id" id="1" value="2">
>>>>>>> 52ea3b1177ed9194253ba5af7b209b6d59cb78d9
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Goat
                                                </label>
                                            </div>
                                            <div class="form-check">
<<<<<<< HEAD
                                                <input class="form-check-input" type="radio" name="cattle_type" id="0" value="0" {!! ($cattle_id->cattle_type_id == 3 ? 'checked' : '') !!}>
=======
                                                <input class="form-check-input" type="radio" name="cattle_type_id" id="0" value="3">
>>>>>>> 52ea3b1177ed9194253ba5af7b209b6d59cb78d9
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Sheep
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="gender" class="form-label">Select Gender</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="1" value="1" {!! ($cattle_id->gender == 1 ? 'checked' : '') !!}>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="0" value="0" {!! ($cattle_id->gender == 0 ? 'checked' : '') !!}>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Date Of Birth</label>
                                            <input type="text" onfocus= "(this. type='date')" class="form-control" name="dob" placeholder="Date of Birth" value="{{$cattle_id->dob}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Parent</label>
                                            <select name="parent_id" id="parent_id" class="form-control">
                                                <option value="">Choose Parent</option>
                                                @foreach($goats as $goat)
<<<<<<< HEAD
                                                    <option value="{{$goat->id}}" {{$goat->id == $cattle_id->parent_id ? 'selected' : ''}}></option>{{$goat->serial_no}}</option>
                                                @endforeach
=======
                                                    @if($goat->parent_id)
                                                    <option value="{{$goat->parent_id}}">{{$goat->serial_no}}</option>
                                                    @endif
                                                        @endforeach
>>>>>>> 52ea3b1177ed9194253ba5af7b209b6d59cb78d9
                                            </select>
{{--                                                {{dd($cattle_id->parent_id)}}--}}
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Entry In Farm</label>
                                            <input type="text" onfocus= "(this. type='date')" class="form-control" name="entry_in_farm" placeholder="Entry In Farm" value="{{$cattle_id->entry_in_farm}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="form-label">Age</label>
                                            <input type="number" class="form-control" name="age" placeholder="Enter Age" value="{{$cattle_id->age}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Breed</label>
                                            <input type="text" class="form-control" name="breed" placeholder="Enter Breed" value="{{$cattle_id->breed}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Weight</label>
                                            <input type="number" class="form-control" name="weight" placeholder="Enter Weight" value="{{$cattle_id->weight}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Height</label>
                                            <input type="number" class="form-control" name="height" placeholder="Enter Height" value="{{$cattle_id->height}}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="updateGoat" class="btn btn-primary">Submit</button>
                                <a href="{{route('cattle.index', 'goat')}}" type="button" class="btn btn-danger">Back</a>
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
