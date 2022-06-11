@extends('layouts.nav')
@section('title', 'Cows Feed')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('cattle.index','cow')}}">Cow List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Cows Feed') }}</li>
                </ol><!-- End breadcrumb -->
                <div class="ml-auto">
                    <div class="input-group">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addFeed">Feed Cow</button>
                        <div class="modal fade" id="addFeed" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="example-Modal3">Feed Cow</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{route('cow_feed.store')}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="recipient-name" class="form-control-label">Date</label>
                                                <input type="text" onfocus= "(this. type='date')" class="form-control" name="created_at" value="<?php use App\Models\AccountHead;echo date('Y-m-d');?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Vaccine Quantity</label>
                                                <input type="text" class="form-control" id="quantity" name="quantity">
                                                <?php
                                                $cowDailyFeedStock = \App\Models\Feed::cowDailyFeedStock();
                                                ?>
                                                <div id="testing" class="invalid-feedback" style="display: block !important;">
                                                    Avaliable Feed = {{$cowDailyFeedStock}}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Discription</label>
                                                <input type="text" class="form-control" id="name" name="name">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="submitCowFeed" class="btn btn-primary">Feed Cow</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Cows Feed') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="" class="table table-striped table-bordered text-nowrap w-100 display">
                                    <thead>
                                    <tr>
                                        <th class="wd-30p">Cattle Type</th>
                                        <th class="wd-30p">Quantity</th>
                                        <th class="wd-30p">Description</th>
                                        <th class="wd-10p">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($feeds as $feed)
                                        <tr>
                                            <td>{{$feed->cattle_type ? 'Cow' : ''}}</td>
                                            <td>{{$feed->quantity}} Kg</td>
                                            <td>{{$feed->name}}</td>
                                            <td>
                                                <form action="{{route('cow_feed.destroy', $feed->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fe fe-trash-2"></i></button>
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
