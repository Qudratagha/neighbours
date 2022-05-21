@extends('layouts.nav')
@section('title', 'Goat/Sheep')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Goats') }}</li>
                </ol><!-- End breadcrumb -->
                <div class="ml-auto">
                    <div class="input-group">
                        <a href="{{route('cattle.create','goat')}}" type="button" class="btn btn-info" >Add Goat/Sheep</a>
                    </div>
                </div>
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Dashboard') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p">ID</th>
                                        <th class="wd-25p">Date</th>
                                        <th class="wd-25p">Cattle Type</th>
                                        <th class="wd-25p">Serial-No</th>
                                        <th class="wd-25p">Breed</th>
                                        <th class="wd-15p">Gender</th>
                                        <th class="wd-15p">Parent</th>
                                        <th class="wd-25p" style="width: 200px">Actions</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($goats as $goat)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{date('d-m-Y', strtotime($goat->date)) ?? ''}}</td>
                                            <td>{{$goat->cattleType->name}}</td>
                                            <td>{{$goat->serial_no ?? 'Null'}}</td>
                                            <td>{{$goat->breed ?? 'Null'}}</td>
                                            <td>{{($goat->gender == 1) ? 'Male' : 'female' }}</td>
                                            <td>{{$goat->cattleParent->serial_no ?? ''}}</td>
                                        @if(!($goat->dead_date||$goat->dry_date||$goat->saleStatus==1))
                                            <td>
                                                <form action="{{route('cattle.store',$goat->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to DRY cow with serial no: {{$goat->id}} ?');" style="display: inline-block;">
                                                    @csrf
                                                    <input type="hidden" onfocus= "(this. type='date')" class="form-control" name="dry_date" value="<?php echo date('Y-m-d');?>">
                                                    <input type="hidden" name="cattle_id" value="{{$goat->id}}">
                                                    <button type="submit" name="submitDryGoat" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" title="Dry"><span>Dry</span></button>
                                                </form>

                                                <form action="{{ route('cattle.store',$goat->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to DEAD cow with serial no: {{$goat->id}} ?');" style="display: inline-block;">
                                                    @csrf
                                                    <input type="hidden" onfocus= "(this. type='date')" class="form-control" name="dead_date" value="<?php echo date('Y-m-d');?>">
                                                    <input type="hidden" name="cattle_id" value="{{$goat->id}}">
                                                    <button type="submit" name="submitDeadGoat" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" title="Dead"><span>&#128128;</span></button>
                                                </form>

                                                <a href="{{route('goat_daily.show',$goat->id)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="View"><i class="fe fe-eye"></i></a>
                                                <a href="{{route('cattle.edit',['goat',$goat->id])}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"><i class="fe fe-edit-3"></i></a>
                                                <form action="{{ route('cattle.destroy',['goat',$goat->id] ) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fe fe-trash-2"></i></button>
                                                </form>
                                            </td>
                                            @else
                                                <td>
                                                    <a href="{{route('cattle.show',['goat',$goat->id])}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="View"><i class="fe fe-eye"></i></a>
                                                    @if($goat->dead_date)
                                                        Dead
                                                        @elseif ($goat->dry_date)
                                                        Dry
                                                    @elseif ($goat->saleStatus==1)
                                                        Sold
                                                    @endif
                                                </td>
                                                @endif

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
