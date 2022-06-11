@extends('layouts.nav')
@section('title', 'Daily - Goat')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('cattle.index','goat')}}">All Goats</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Goat Daily') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Goat Serial') }} # {{$goat_daily->serial_no}}</h3>
                        </div>
                        <div class="card-body">
                            <table cellpadding="2" cellspacing="2" border="1" class="table thead-dark table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <center>
                                        <th style="font-weight: 600">Goat-Serial</th>
                                        @if($goat_daily->dob != null )
                                            <th style="font-weight: 600">Date-of-Birth</th>
                                        @else
                                            <th style="font-weight: 600">Entry-in-Farm</th>
                                            <th style="font-weight: 600">Age</th>
                                        @endif
                                        <th style="font-weight: 600">Breed</th>
                                        <th style="font-weight: 600">Weight</th>
                                        <th style="font-weight: 600">Height</th>
                                    </center>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$goat_daily->serial_no}}</td>
                                    @if($goat_daily->dob != null)
                                        <td>{{date('d-m-Y', strtotime($goat_daily->dob)) ?? ''}}</td>
                                    @else
                                        <td>{{date('d-m-Y', strtotime($goat_daily->entry_in_farm)) ?? ''}}</td>
                                        <td>{{$goat_daily->age}}</td>
                                    @endif
                                    <td>{{$goat_daily->breed}}</td>
                                    <td>{{$goat_daily->weight}}</td>
                                    <td>{{$goat_daily->height}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs myTab" data-bs-toggle="tab">
                                            <li><a class="nav-link active" href="#tab11" id="hov" data-bs-toggle="tab">Sick</a></li>
                                            <li class="act"><a href="#tab21" id="hov" data-bs-toggle="tab">Medicine</a></li>
                                            @if($goat_daily->gender == 0)
                                                <li class="act"><a href="#tab31" id="hov" data-bs-toggle="tab">Pregnant</a></li>
                                                <li class="act"><a href="#tab41" id="hov" data-bs-toggle="tab">Delivery</a></li>
                                            @endif
                                            <li class="act"><a href="#tab51" id="hov" data-bs-toggle="tab">Vaccination</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body">
                                    <div class="tab-content">
                                        @include('goat_daily.sick')
{{--                                        End div 11 --}}

                                        @include('goat_daily.medicine')
{{--                                        End div 21 --}}
                                        @if($goat_daily->gender == 0)
                                            @include('goat_daily.pregnant')
{{--                                        End div 31 --}}
                                        @include('goat_daily.delivery')
                                        @endif
{{--                                        End div 41 --}}

                                        @include('goat_daily.vaccination')
{{--                                        End div 51 --}}
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

        $('a[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('.myTab a[href="' + activeTab + '"]').tab('show');
        }
    </script>
@endsection
