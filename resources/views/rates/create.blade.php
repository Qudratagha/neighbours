@extends('layouts.nav')
@section('title', 'Rates - Create')

@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('rates.index')}}">Rates List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('New Rate') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Add Rate') }}</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('rates.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Item Name</label>
                                            <select class="form-control" name="name" id="name">
                                                <option value="Egg">Egg</option>
                                                <option value="Milk">Milk</option>
                                                <option value="Cucumber">Cucumber</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Rate</label>
                                            <input type="hidden" value="1" name="status">
                                            <input type="text" class="form-control" name="rate" placeholder="Enter Rate">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('rates.index')}}" type="button" class="btn btn-secondary">Back</a>
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
