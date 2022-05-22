@extends('layouts.nav')
@section('title', 'Dry - Goat')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('cattle.index','cow')}}">All Goats</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Dry Goat') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Dry Goat</h3>
                        </div>
                        <div class="card-body">
                            <table cellpadding="2" cellspacing="2" border="1" class="table thead-dark table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <center>
                                        <th style="font-weight: 600">Goat-Serial</th>
                                        @if($cattle->dob)
                                            <th style="font-weight: 600">Date-of-Birth</th>
                                            <th style="font-weight: 600">Parent</th>
                                        @elseif($cattle->entry_in_farm)
                                            <th style="font-weight: 600">Entry-in-Farm</th>
                                            <th style="font-weight: 600">Age</th>
                                        @endif
                                        <th style="font-weight: 600">Breed</th>
                                        <th style="font-weight: 600">Weight</th>
                                        <th style="font-weight: 600">Height</th>
                                        <th style="font-weight: 600">Dry Date</th>

                                    </center>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$cattle->serial_no}}</td>
                                    @if($cattle->dob)
                                        <td>{{date('d-m-Y', strtotime($cattle->dob)) ?? ''}}</td>
                                        @if($cattle->parent_id)
                                            <td>{{$cattle->cattleParent->serial_no ?? ''}}</td>
                                        @else
                                            <td></td>
                                        @endif
                                    @elseif($cattle->entry_in_farm)
                                        <td>{{date('d-m-Y', strtotime($cattle->entry_in_farm)) ?? ''}}</td>
                                        <td>{{$cattle->age}}</td>
                                    @endif
                                    <td>{{$cattle->breed}}</td>
                                    <td>{{$cattle->weight}}</td>
                                    <td>{{$cattle->height}}</td>
                                    <td>{{$cattle->dead_date}}</td>
                                </tr>
                                </tbody>
                            </table>
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

    </script>
@endsection
