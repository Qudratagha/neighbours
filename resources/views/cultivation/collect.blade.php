@extends('layouts.nav')
@section('title', 'Cultivation Collect')
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
                        <button type="button" class="btn btn-outline-success " data-toggle="modal" data-target="#collect-cultivation">Collect Cultivation</button>
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
                                        <th>Cultivation Type</th>
                                        <th>Quantity</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($collectCultivation as $collect)
                                        <tr>
                                            <td>{{$collect->id}}</td>
                                            <td>{{$collect->accountSubHead->name}}</td>
                                            <td>{{$collect->quantity}}</td>
                                            <td>{{$collect->description}}</td>
                                            <td>{{$collect->date}}</td>
                                            <td>
                                                <a href="{{route('cultivation.edit', $collect->id)}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"><i class="fe fe-edit-3"></i></a>
                                                <form action="{{ route('cultivation.destroy',$collect->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fe fe-trash-2"></i></button>
                                                </form>
                                            </td>
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

    <!-- Collect cultivation Modal -->

    <div class="modal fade" id="collect-cultivation" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Collect Cultivation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('cultivation.store')}}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Cultivation Type</label>
                            <select class="form-control select2 custom-select" name="cultivation_type_id">
                                <option value="">Please Select Cultivation Type</option>
                                @foreach($cultivation_types as $cultivation_type)
                                    <option value="{{$cultivation_type->id}}" >{{$cultivation_type->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="date" class="form-control-label">Select Date:</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="total-collection" class="form-control-label">Total Collection:</label>
                            <input type="text" name="quantity" class="form-control" placeholder="Enter Collection In Kg">
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description:</label>
                            <input type="text" name="description" class="form-control" placeholder="Enter Description">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                            <button type="submit" name="collectCultivation" class="btn btn-outline-success">Submit </button>
                        </div>
                    </form>
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

