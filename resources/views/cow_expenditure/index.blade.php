@extends('layouts.nav')
@section('title', 'Cow Expenditure')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Cow Expenditure') }}</li>
                </ol><!-- End breadcrumb -->
                <div class="ml-auto">
                    <div class="input-group">
                        <a href="{{route('cow_expenditure.create')}}" type="button" class="btn btn-info">Add Cow's
                            Expenditure</a>
                    </div>
                </div>
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Cow Expenditure') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered text-nowrap w-100 display">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p">ID</th>
                                        <th class="wd-25p">Date</th>
                                        <th class="wd-15p">Expenditure Name</th>
                                        <th class="wd-15p">Amount</th>
                                        <th class="wd-15p">Quantity</th>
                                        <th class="wd-15p">Description</th>
                                        <th class="wd-25p notExport" style="width: 5px; !important;">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cowExpenses as $cowExpense)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{date('d-m-Y', strtotime($cowExpense->date))}}</td>
                                            <td>{{$cowExpense->accountSubHead->name ?? 'Null'}}</td>
                                            <td>{{$cowExpense->amount ?? 'Null'}}</td>
                                            <td>{{$cowExpense->quantity ?? 'Null'}}</td>
                                            <td>{{$cowExpense->description ?? 'Null'}}</td>
											<?php
                                            $lastID = \App\Models\Transaction::pluck('id')->last();
											?>
                                            <td>

                                                <a href="{{route('cow_expenditure.edit',$cowExpense->id)}}"
                                                   class="btn btn-sm btn-success"
                                                   data-toggle="tooltip"
                                                   title="Edit"><i class="fe fe-edit-3"></i></a>
                                                <form action="{{ route('cow_expenditure.destroy',$cowExpense->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete this?');"
                                                      style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                            data-toggle="tooltip" title="Delete"><i
                                                                class="fe fe-trash-2"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- table-wrapper -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--      end side app --}}
    </div>
    {{--   end container area--}}
@endsection
