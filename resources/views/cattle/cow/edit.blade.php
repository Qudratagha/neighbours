@extends('layouts.nav')
@section('title', 'Edit - Cow')

@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('cattle.index','cow')}}">Cows</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Cow') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Edit Cow') }}</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('cattle.update',['cow', $cattle_id->id])}}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    @if($cattle_id->dob == null)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label required">Enter Date</label>
                                                <input type="text" onfocus="(this. type='date')" class="form-control"
                                                       name="date" value="{{$cattle_id->date}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label required">Cow Serial</label>
                                                <input type="number" class="form-control" name="serial_no"
                                                       placeholder="Enter Serial No" value="{{$cattle_id->serial_no}}"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label required">Entry In Farm</label>
                                                <input type="text" onfocus="(this. type='date')" class="form-control"
                                                       name="entry_in_farm" placeholder="Entry In Farm"
                                                       value="{{$cattle_id->entry_in_farm}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label required">Age</label>
                                                <input type="number" class="form-control" name="age"
                                                       placeholder="Enter Age" value="{{$cattle_id->age}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label required">Breed</label>
                                                <input type="text" class="form-control" name="breed"
                                                       placeholder="Enter Breed" value="{{$cattle_id->breed}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Weight</label>
                                                <input type="number" class="form-control" name="weight"
                                                       placeholder="Enter Weight" value="{{$cattle_id->weight}}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Height</label>
                                                <input type="number" class="form-control" name="height"
                                                       placeholder="Enter Height" value="{{$cattle_id->height}}">
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label required">Enter Date</label>
                                                <input type="text" onfocus="(this. type='date')" class="form-control"
                                                       name="date" value="{{$cattle_id->date}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label required">Parent</label>
                                                <select name="parent_id" id="parent_id" class="form-control" required>
                                                    <option value="{{$cattle_id->parent->id}}">{{$cattle_id->parent->serial_no}}</option>
                                                    @foreach($cows as $cow)
                                                        @if($cow->parent_id)
                                                            <option value="{{$cow->parent_id}}">{{$cow->serial_no}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label required">Cow Serial</label>
                                                <input type="number" class="form-control" name="serial_no"
                                                       placeholder="Enter Serial No" value="{{$cattle_id->serial_no}}"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label required">Date Of Birth</label>
                                                <input type="text" onfocus="(this. type='date')" class="form-control"
                                                       name="dob" placeholder="Enter Date Of Birth"
                                                       value="{{$cattle_id->dob}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label required">Breed</label>
                                                <input type="text" class="form-control" name="breed"
                                                       placeholder="Enter Breed" value="{{$cattle_id->breed}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Weight</label>
                                                <input type="number" class="form-control" name="weight"
                                                       placeholder="Enter Weight" value="{{$cattle_id->weight}}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Height</label>
                                                <input type="number" class="form-control" name="height"
                                                       placeholder="Enter Height" value="{{$cattle_id->height}}">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <button type="submit" name="updateCow" value="1" class="btn btn-primary">Submit</button>
                                <a href="{{route('cattle.index', 'cow')}}" type="button" class="btn btn-secondary">Back</a>
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

