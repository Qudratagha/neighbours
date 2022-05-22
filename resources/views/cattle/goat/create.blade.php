@extends('layouts.nav')
@section('title', 'Register - Goat/Sheep')
@section('app-content', 'app-content')
@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('cattle.index','goat')}}">Goats-sheeps List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Add Goats-sheeps') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Dashboard') }}</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('cattle.store', 'goat')}}">
                                @csrf
                                @method('POST')
                                <div class="row" >
                                    <div class="col-md-12" id="fields">
                                        <label class="form-label required">Select One Option</label>
                                        <select class="form-control mb-2" id="select" required>
                                            <option value="">Select Option </option>
                                            <option value="1">Entry In Farm</option>
                                            <option value="2">Date Of Birth</option>
                                        </select>
                                        <div class="form-group">
                                            <label for="gender" class="form-label">Select Gender</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="1" value=  "1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="0" value="0">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Serial No.</label>
                                            <input type="number" class="form-control" name="serial_no" placeholder="Serial No.">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Date Of Birth</label>
                                            <input type="text" onfocus= "(this. type='date')" class="form-control" name="dob" value="<?php echo date('Y-m-d');?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Parent</label>
                                            <select name="parent_id" id="parent_id" class="form-control">
                                                <option value="">Choose Parent</option>
                                                @foreach($goats as $goat)
                                                    <option value="{{$goat->id}}">{{$goat->serial_no}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Entry In Farm</label>
                                            <input type="text" onfocus= "(this. type='date')" class="form-control" name="entry_in_farm" value="<?php echo date('Y-m-d');?>">
                                        </div>
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
                                <button type="submit" name="submitGoat" class="btn btn-primary">Submit</button>
                                <a href="{{route('cattle.create', 'goat')}}" type="button" class="btn btn-danger">Back</a>
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
@section('more-script')
    @parent
    <script>
        $('#select').on('change' ,function(){
            $('#fields').html('<h3>Entry In Farm Selected</h3>' +
                '<div class="row">' +
                '<div class="col-md-6">' +
                '<div class="form-group">\n' +
                '<label class="form-label">Entry In Farm</label>\n' +
                '<input type="text" onfocus= "(this. type=\'date\')" class="form-control" name="entry_in_farm">\n'+
                '</div>' +
                '<div class="form-group">\n' +
                '<label for="cattle_name" class="form-label">Select Cattle Type</label>\n' +
                '<div class="form-check">\n' +
                '<input class="form-check-input" type="radio" name="cattle_type_id" id="1" value="2" >\n' +
                '<label class="form-check-label" for="flexRadioDefault1">\n' +
                'Goat\n' +
                '</label>\n' +
                '</div>\n' +
                '<div class="form-check">\n' +
                '<input class="form-check-input" type="radio" name="cattle_type_id" id="0" value="3">\n' +
                '<label class="form-check-label" for="flexRadioDefault1">\n' +
                'Sheep\n' +
                '</label>\n' +
                '</div>\n' +
                '</div>' +
                '<div class="form-group">\n' +
                '<label for="gender" class="form-label">Select Gender</label>\n' +
                '<div class="form-check">\n' +
                '<input class="form-check-input" type="radio" name="gender" id="1" value=  "1">\n' +
                '<label class="form-check-label" for="flexRadioDefault1">\n' +
                'Male\n' +
                '</label>\n' +
                '</div>\n' +
                '<div class="form-check">\n' +
                '<input class="form-check-input" type="radio" name="gender" id="0" value="0">\n' +
                '<label class="form-check-label" for="flexRadioDefault1">\n' +
                'Female\n' +
                '</label>\n' +
                '</div>\n' +
                '</div>' +
                '<div class="form-group">\n' +
                '<label class="form-label">Enter Date</label>\n' +
                '<input type="text" onfocus= "(this. type=\'date\')" class="form-control" name="date">\n'+
                '</div>\n' +
                '<div class="form-group">\n' +
                '<label class="form-label">Serial No.</label>\n' +
                '<input type="number" class="form-control" name="serial_no" placeholder="Serial No.">\n' +
                '</div>' +
                '</div> ' +
                '<div class="col-md-6">\n' +
                '\n' +
                '<div class="form-group">\n' +
                '<label class="form-label">Amount</label>\n' +
                '<input type="number" class="form-control" name="amount" placeholder="Enter Purchase Amount">\n' +
                '</div>' +
                '<div class="form-group">\n' +
                '<label class="form-label">Age</label>\n' +
                '<input type="number" class="form-control" name="age" placeholder="Enter Age">\n' +
                '</div>' +
                '<div class="form-group">\n' +
                '<label class="form-label">Breed</label>\n' +
                '<input type="text" class="form-control" name="breed" placeholder="Enter Breed">\n' +
                '</div>\n' +
                '<div class="form-group">\n' +
                '<label class="form-label">Weight</label>\n' +
                '<input type="number" class="form-control" name="weight" placeholder="Enter Weight">\n' +
                '</div>\n' +
                '<div class="form-group">\n' +
                '<label class="form-label">Height</label>\n' +
                '<input type="number" class="form-control" name="height" placeholder="Enter Height">\n' +
                '</div>\n' +
                '</div>\n' +
                '</div>' +
                '</div> ');
            if (this.value == 1){
            }

            if (this.value == 2){
                $('#fields').html('<h3>Date Of Birth Selected</h3>' +
                    '<div class = "row">' +
                    '<div class = "col-md-6">' +
                    '<div class="form-group">\n' +
                    '<label class="form-label">Date Of Birth</label>\n' +
                    '<input type="text" onfocus= "(this. type=\'date\')" class="form-control" name="dob">\n'+
                    '</div>' +
                    '<div class="form-group">\n' +
                    '<label class="form-label">Parent</label>\n' +
                    '<select name="parent_id" id="parent_id" class="form-control">\n' +
                    '<option value="">Choose Parent</option>\n' +
                    '@foreach($goats as $goat)\n' +
                    '<option value="{{$goat->id}}">{{$goat->serial_no}}</option>\n' +
                    '@endforeach\n' +
                    '</select>\n' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="cattle_name" class="form-label">Select Cattle Type</label>' +
                    '<div class="form-check">' +
                    '<input class="form-check-input" type="radio" name="cattle_type_id" id="1" value="2" >' +
                    '<label class="form-check-label" for="flexRadioDefault1">' +
                    'Goat\n' +
                    '</label>\n' +
                    '</div>\n' +
                    '<div class="form-check">\n' +
                    '<input class="form-check-input" type="radio" name="cattle_type_id" id="0" value="3">\n' +
                    '<label class="form-check-label" for="flexRadioDefault1">\n' +
                    'Sheep\n' +
                    '</label>\n' +
                    '</div>\n' +
                    '</div>' +
                    '<div class="form-group">\n' +
                    '<label for="gender" class="form-label">Select Gender</label>\n' +
                    '<div class="form-check">\n' +
                    '<input class="form-check-input" type="radio" name="gender" id="1" value=  "1">\n' +
                    '<label class="form-check-label" for="flexRadioDefault1">\n' +
                    'Male\n' +
                    '</label>\n' +
                    '</div>\n' +
                    '<div class="form-check">\n' +
                    '<input class="form-check-input" type="radio" name="gender" id="0" value="0">\n' +
                    '<label class="form-check-label" for="flexRadioDefault1">\n' +
                    'Female\n' +
                    '</label>\n' +
                    '</div>\n' +
                    '</div>' +
                    '<div class="form-group">\n' +
                    '<label class="form-label">Enter Date</label>\n' +
                    '<input type="text" onfocus= "(this. type=\'date\')" class="form-control" name="date">\n'+
                    '</div>' +
                    '</div>' +
                    '<div class = "col-md-6">' +
                    '<div class="form-group">\n' +
                    '<label class="form-label">Serial No.</label>\n' +
                    '<input type="number" class="form-control" name="serial_no" placeholder="Serial No.">\n' +
                    '</div>' +
                    '<div class="form-group">\n' +
                    '<label class="form-label">Breed</label>\n' +
                    '<input type="text" class="form-control" name="breed" placeholder="Enter Breed">\n' +
                    '</div>\n' +
                    '<div class="form-group">\n' +
                    '<label class="form-label">Weight</label>\n' +
                    '<input type="number" class="form-control" name="weight" placeholder="Enter Weight">\n' +
                    '</div>\n' +
                    '<div class="form-group">\n' +
                    '<label class="form-label">Height</label>\n' +
                    '<input type="number" class="form-control" name="height" placeholder="Enter Height">\n' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            }
        });
    </script>
@endsection

