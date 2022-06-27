@extends('layouts.nav')
@section('title', 'Worker - Create')

@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('worker.index')}}">Workers List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Register New Worker') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Register New Worker') }}</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('worker.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label required">Select Module of Worker</label>
                                            <select class="form-control" name="module_id" id="module" required>
                                                <option style="font-weight: bold">Select Module of Worker</option>
                                                @foreach($modules as $module)
                                                <option value="{{$module->id}}">{{$module->moduleCode}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">Worker Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Worker Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">Worker Phone</label>
                                            <input type="number" class="form-control" name="phone" placeholder="Enter Worker Phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Worker Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="Enter Worker Address">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('worker.index')}}" type="button" class="btn btn-secondary">Back</a>
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
