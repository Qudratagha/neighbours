@extends('layouts.nav')
@section('title', 'Daily - Cow')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('cattle.index','cow')}}">All Cows</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Cow Daily') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Cow Daily</h3>
                        </div>
                        <div class="card-body">
                            <table cellpadding="2" cellspacing="2" border="1" class="table thead-dark table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <center>
                                        <th style="font-weight: 600">Cow-Serial</th>
                                        <th style="font-weight: 600">Date-of-Birth</th>
                                        <th style="font-weight: 600">Entry-in-Farm</th>
                                        <th style="font-weight: 600">Age</th>
                                        <th style="font-weight: 600">Breed</th>
                                        <th style="font-weight: 600">Weight</th>
                                        <th style="font-weight: 600">Height</th>
                                    </center>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$cow_daily->serial_no}}</td>
                                    <td>{{date('d-m-Y', strtotime($cow_daily->dob)) ?? ''}}</td>
                                    <td>{{date('d-m-Y', strtotime($cow_daily->entry_in_farm)) ?? ''}}</td>
                                    <td>{{$cow_daily->age}}</td>
                                    <td>{{$cow_daily->breed}}</td>
                                    <td>{{$cow_daily->weight}}</td>
                                    <td>{{$cow_daily->height}}</td>
                                </tr>
                                </tbody>

                            </table>

                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li><a class="active" href="#tab11" id="hov" data-toggle="tab">Milk</a></li>
                                            <li class="act"><a href="#tab21" id="hov" data-toggle="tab">Sick</a></li>
                                            <li class="act"><a href="#tab31" id="hov" data-toggle="tab">Medicine</a></li>
                                            <li class="act"><a href="#tab41" id="hov" data-toggle="tab">Pregnant</a></li>
                                            <li class="act"><a href="#tab51" id="hov" data-toggle="tab">Delivery</a></li>
                                            <li class="act"><a href="#tab61" id="hov" data-toggle="tab">Vaccination</a></li>
                                            <li class="act"><a href="#tab71" id="hov" data-toggle="tab">Insemination</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body">
                                    <div class="tab-content">
                                        @include('cow_daily.milk')
{{--                                      end  div 11 --}}

                                        @include('cow_daily.sick')
{{--                                        End div 21 --}}

                                        @include('cow_daily.medicine')
{{--                                        End div 31 --}}

                                        @include('cow_daily.pregnant')
{{--                                        End div 41 --}}

                                        @include('cow_daily.delivery')
{{--                                        End div 51 --}}

                                        @include('cow_daily.vaccination')
{{--                                        End div 61 --}}

                                        @include('cow_daily.insemination')
{{--                                        End div 71 --}}
                                    </div>
                                </div>
                            </div>
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
    <script>
        $(function() {
            $('.act').click(function() {
                $(this).toggleClass('active');
            });
        });
    </script>
@endsection
