@extends('layouts.nav')
@section('title', 'Rates')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rates') }}</li>
                </ol><!-- End breadcrumb -->
                <div class="ml-auto">
                    <div class="input-group">
                        <a href="{{route('rates.create')}}" type="button" class="btn btn-info" >Add Rate</a>
                    </div>
                </div>
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
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p">ID</th>
                                        <th class="wd-25p">Date</th>
                                        <th class="wd-15p">Name</th>
                                        <th class="wd-25p">Rate</th>
                                        <th class="wd-25p" style="width: 200px; !important;">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
{{--                                    @foreach($cows as $cow)--}}
{{--                                        <tr>--}}
{{--                                            <td>{{$loop->iteration}}</td>--}}
{{--                                            <td>{{date('d-m-Y', strtotime($cow->date))}}</td>--}}
{{--                                            <td>{{$cow->name}}</td>--}}
{{--                                            <td>{{$cow->rate}}</td>--}}
{{--                                            <td>--}}
{{--                                                <a href="{{route('cow_daily.show',$cow->id)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="View"><i class="fe fe-eye"></i></a>--}}
{{--                                                <a href="{{route('cattle.edit',['cow',$cow->id])}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"><i class="fe fe-edit-3"></i></a>--}}
{{--                                                <form action="{{ route('cattle.destroy',$cow->id ) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline-block;">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fe fe-trash-2"></i></button>--}}
{{--                                                </form>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
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
@section('more-script')
    <script>
        $(function() {
            $('.act').click(function() {
                $(this).toggleClass('active');
            });
        });
    </script>
@endsection
