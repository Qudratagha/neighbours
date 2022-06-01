@extends('layouts.nav')
@section('title', 'Worker')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Worker') }}</li>
                </ol><!-- End breadcrumb -->
                <div class="ml-auto">
                    <div class="input-group">
                        <a href="{{route('worker.create')}}" type="button" class="btn btn-info" >Register New Worker</a>
                    </div>
                </div>
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            {{--<h3 class="mb-0 card-title">{{ __('Cow Serial') }} # {{$cow_daily->serial_no}}</h3>--}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p">ID</th>
                                        <th class="wd-25p">Registration Date</th>
                                        <th class="wd-15p">Module Name</th>
                                        <th class="wd-15p">Worker Name</th>
                                        <th class="wd-25p">Phone</th>
                                        <th class="wd-25p">Address</th>
                                        <th class="wd-25p" style="width: 200px; !important;">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($workers as $worker)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{date('d-m-Y', strtotime($worker->created_at))}}</td>
                                            <td>{{$worker->modules->moduleCode}}</td>
                                            <td>{{$worker->name}}</td>
                                            <td>{{$worker->phone}}</td>
                                            <td>{{$worker->address}}</td>
                                            {{-- To Show to Delete on last entry --}}
                                            <?php  $lastRow = \App\Models\Worker::pluck('id')->max(); ?>
                                            <td>
                                                <a href="{{route('worker.edit',$worker->id)}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"><i class="fe fe-edit-3"></i></a>
                                                @if($lastRow == $worker->id )
                                                <form action="{{ route('worker.destroy',$worker->id ) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fe fe-trash-2"></i></button>
                                                </form>
                                                @endif
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
@section('more-script')

@endsection
