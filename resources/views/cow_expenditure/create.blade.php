@extends('layouts.nav')
@section('title', 'Cow Expenditure')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('cow_expenditure.index')}}">Cow Expenditure List</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Cow Expenditure') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Add Cow\'s Expenditure') }}</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('cow_expenditure.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label required">Enter Date</label>
                                            <input type="text" onfocus="(this. type='date')" class="form-control"
                                                   name="date" value="<?php echo date('Y-m-d')?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">Select Expenditure Type</label>
                                            <select name="sub_head_id" id="expenseHeads" class="form-control" required>
                                                <option style="font-weight: bold">Select Expenditure Type</option>
                                                @foreach($expenseHeads as $expenseHead)
                                                    <option value="{{$expenseHead->id}}">{{trim(strstr("$expenseHead->name"," "))}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">Amount</label>
                                            <input type="number" class="form-control" name="amount" placeholder="Amount"
                                                   required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">Quantity</label>
                                            <input type="number" class="form-control" name="quantity"
                                                   placeholder="quantity" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <input type="text" class="form-control" name="description"
                                                   placeholder="Enter Description">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('cow_expenditure.index')}}" type="button"
                                   class="btn btn-danger">Back</a>
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
