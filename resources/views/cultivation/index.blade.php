@extends('layouts.nav')
@section('title', 'Cultivation')
@section('margin', 'my-md-5')
@section('app-content', 'app-content')


@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>
                </ol><!-- End breadcrumb -->
                <div class="ml-auto">

                    <div class="input-group">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#collect-cultivation">Collect Cultivation</button>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-cultivation">Add Cultivation</button>
                    </div>
                </div>
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Add_Cultivation') }}</h3>
                        </div>

                        <div class="card-body">
                            <!-- DataTables Start -->
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordered" style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>C_type id/ Name</th>
                                        <th>Fertilizer Name</th>
                                        <th>Total Area Cultivated</th>
                                        <th>Date</th>
                                        <th>Edit Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cultivations as $cultivation)
                                            <tr>
                                                <td>{{$cultivation->id}}</td>
                                                <td>{{$cultivation->cultivationTypes->name}}</td>
                                                <td>{{$cultivation->fertilizer}}</td>
                                                <td>{{$cultivation->total_area_cultivated}}</td>
                                                <td>{{date('Y-m-d', strtotime($cultivation->created_at))}}</td>
                                                <td>
                                                    <form action="{{route('cultivation.destroy', $cultivation->id)}}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <a href="{{route('cultivation.edit',$cultivation->id)}}" class="btn btn-success">Edit</a>
                                                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')" >Delete</button>
                                                    </form>
                                                </td>

    {{--                                            <td><a href="{{route('users.show',$user->user_id)}}" class="btn btn-success">View</a></td>--}}
    {{--                                            <td><a href="{{route('users.edit',$user->user_id)}}" class="btn btn-success">Edit</a></td>--}}
    {{--                                            <td>--}}
    {{--                                                <form action="{{route('users.destroy', $user->user_id)}}" method="POST">--}}
    {{--                                                    @csrf--}}
    {{--                                                    @method("DELETE")--}}
    {{--                                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')" >Dlt</button>--}}
    {{--                                                </form>--}}
    {{--                                            </td>--}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- DataTables Ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--      end side app --}}
    </div>
    {{--   end container area--}}
    <!-- Modal -->
    <!-- Add cultivation Modal -->
    <div class="modal fade" id="add-cultivation" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Add Cultivation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('cultivation.store')}}">
                        @csrf
                        <div class="form-group ">
                            <label class="form-label">Cultivation Type</label>
                            <select class="form-control select2 custom-select" name="cultivation_type_id">
                                <option value="">Please Select Poultry Type</option>
                                @foreach($cultivation_types as $cultivation_type)
                                    <option value="{{$cultivation_type->id}}" >{{$cultivation_type->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="fertilizer" class="form-control-label">Fertilizer Name:</label>
                            <input type="text" name="fertilizer" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="total_Area_cultivated" class="form-control-label">Total Aera Cultivated:</label>
                            <input type="number" name="total_Area_cultivated" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="created_at" class="form-control-label">Select Date:</label>
                            <input type="date" name="created_at" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Collect cultivation Modal -->

    <div class="modal fade" id="collect-cultivation" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Add Cultivation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="form-group ">
                            <label class="form-label">Cultivation Type</label>
                            <select class="form-control select2 custom-select" data-placeholder="Choose one">
                                <option value="">Please Select Cultivation Type</option>
                                @foreach($cultivation_types as $cultivation_type)
                                    <option value="{{$cultivation_type->name}}" >{{$cultivation_type->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="total_collection" class="form-control-label">total collection :</label>
                            <input type="text" class="form-control" id="total_collection">
                        </div>

                        <div class="form-group">
                            <label for="date" class="form-control-label">Select Date:</label>
                            <input type="date" class="form-control" id="date">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('more-script')
    <script>
        @parent
        $(document).ready(function() {
            $('#mytable').DataTable( {
            });
        });
    </script>
@endsection

