@extends('layouts.nav')
@section('title', 'Poultry - Daily')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('poultry_daily.indexDaily','poultry_daily')}}">Daily</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Egg Daily') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
{{--                            <h3 class="mb-0 card-title">{{ __('Cow Serial') }} # {{$cow_daily->serial_no}}</h3>--}}
                        </div>
                        <div class="card-body">
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li><a class="active" href="#tab11" id="hov" data-toggle="tab">Egg</a></li>
                                            <li class="act"><a href="#tab21" id="hov" data-toggle="tab">Hen</a></li>
                                            <li class="act"><a href="#tab61" id="hov" data-toggle="tab">Chicks</a></li>

                                            <li class="act"><a href="#tab31" id="hov" data-toggle="tab">Feed</a></li>
                                            <li class="act"><a href="#tab41" id="hov" data-toggle="tab">Vaccination</a></li>
                                            <li class="act"><a href="#tab51" id="hov" data-toggle="tab">Medicine</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body">
                                    <div class="tab-content">
                                        @include('poultry_daily.egg')
                                        {{--end  div 11--}}
                                        @include('poultry_daily.hen')
                                        {{--End div 21 --}}
                                        @include('poultry_daily.chicks')
                                        {{--End div 61 --}}
                                        @include('poultry_daily.feed')
                                        {{--End div 31 --}}
                                        @include('poultry_daily.vaccination')
                                        {{--End div 41 --}}
                                        @include('poultry_daily.medicine')
                                        {{--End div 51 --}}

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
