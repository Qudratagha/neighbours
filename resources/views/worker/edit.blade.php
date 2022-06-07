@extends('layouts.nav')
@section('title', 'Edit Worker')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                     <li class="breadcrumb-item"><a href="{{route('worker.index')}}">Worker List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Worker') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('') }}</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('worker.update',$worker->id)}}">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label required">Enter Date</label>
                                            <input type="text" onfocus= "(this. type='date')" class="form-control" name="created_at" value="{{$worker->created_at}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">Select Expenditure Type</label>
                                            <select name="module_id" id="module" class="form-control">
                                                @foreach($modules as $module)
                                                    <option value="{{$module->id}}">{{$module->moduleCode}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">Worker Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Worker Name" value="{{$worker->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Worker Phone</label>
                                            <input type="number" class="form-control" name="phone" placeholder="Worker Phone" value="{{$worker->phone}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Worker Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="Enter Address" value="{{$worker->address}}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('worker.index')}}" type="button" class="btn btn-danger">Back</a>
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
