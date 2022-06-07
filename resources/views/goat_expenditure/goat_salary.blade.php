@extends('layouts.nav')
@section('title', 'Goat/sheep Worker Salary')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('goat_expenditure.index')}}">Goat/sheep Expenditure List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Goat/sheep Worker Salary') }}</li>
                </ol><!-- End breadcrumb -->
                <div class="ml-auto">
                    <div class="input-group">
                        <a href="#" type="button" class="btn btn-info" >Add Goat/sheep's Worker Salary</a>
                    </div>
                </div>
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Add Goat/sheep\'s Worker Salary') }}</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('goat_salary.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label required">Enter Date</label>
                                            <input type="text" onfocus= "(this. type='date')" class="form-control" name="date" value="<?php echo date('Y-m-d')?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">Select Worker</label>
                                            <select name="sub_head_id" id="expenseHeads" class="form-control" required>
                                                @foreach($workers as $worker)
                                                    <option value="{{$worker->accountHeads->id}}">{{$worker->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">Salary in Rupees</label>
                                            <input type="number" class="form-control" name="amount" placeholder="Amount" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <input type="text" class="form-control" name="description" placeholder="Enter Description">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('goat_expenditure.index')}}" type="button" class="btn btn-danger">Back</a>
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
