@extends('layouts.nav')
@section('title', 'Poultry')
@section('margin', 'my-md-5')
@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Poultry') }}</li>
                </ol><!-- End breadcrumb -->
                <div class="ml-auto">
                    <div class="input-group">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-poultry">Add Poultry</button>
                    </div>
                </div>
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.message')
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Add_Poultry') }}</h3>
                        </div>
                        <div class="card-body">
                            <!-- DataTables Start -->

                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordered" style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Quantity</th>
                                        <th>Poultry Type</th>
                                        <th>Poultry Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($poultries as $poultry)
                                            <tr>
                                                <td>{{$poultry->id}}</td>
                                                <td>{{date('d-m-Y', strtotime($poultry->created_at))}}</td>
                                                <td>{{$poultry->quantity}}</td>
                                                <td>{{$poultry->poultryType->name}}</td>
                                                <td>{{$poultry->poultryStatus->name}}</td>
                                                <td>
                                                    <form action="{{route('poultry.destroy', $poultry->id)}}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <a href="{{route('poultry.edit',$poultry->id)}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"><i class="fe fe-edit-3"></i></a>
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
    <!-- Add Poultry Modal -->
    <div class="modal fade" id="add-poultry" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Add Poultry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('poultry.store')}}" >
                        @csrf

                        <div class="form-group ">
                            <label class="form-label">Poultry Type</label>
                            <select name="poultry_type_id" class="form-control select2 custom-select" required onchange="change_status(this.value);">
                                <option value="">Please Select Poultry Type</option>
                                @foreach($poultry_types as $poultry_type)
                                    <option value="{{$poultry_type->id}}" >{{$poultry_type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                            <label class="form-label">Poultry Status</label>
                            <select name="poultry_status_id" id="poultry_status_id" class="form-control select2 custom-select" required></select>
                        </div>

                        <div class="form-group" id="incubatedDate">

                        </div>


                        <div id="append">

                        </div>


                        {{--                        <div class="form-group ">--}}
{{--                            <label class="form-label">Incubation Date</label>--}}
{{--                            <select name="incubationDate" class="form-control select2 custom-select" required>--}}
{{--                                <option value="">Please Select Incubation Date</option>--}}
{{--                                @foreach($eggincdates as $eggincdate)--}}
{{--                                    <option value="" >{{$eggincdate}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}


{{--                        <div class="form-group ">--}}
{{--                            <label class="form-label">Incubation Quantity</label>--}}
{{--                            <select name="incubationDate" class="form-control select2 custom-select" required>--}}
{{--                                <option value="">Please Select Incubation Date</option>--}}
{{--                                @foreach($eggincquans as $eggincquan)--}}
{{--                                    <option value="" >{{$eggincquan}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}


                        <div class="form-group">
                            <label for="quantity" class="form-control-label"> selection Quantity:</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" required>
                            <div id="testing" class="invalid-feedback" style="display: block !important;">
                            </div>
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
@endsection
@section('more-script')
    <script>
        @parent
        $(document).ready(function(){
            $eggincdate = 0;
            $("#poultry_status_id").change(function(){

                if (this.value == 2)
                {
                    $('#incubatedDate').html('<label class="form-label">Incubation Date</label>\n' +
                        '                            <select id="mySelect" class="form-control dates">\n' +
                        '                                <option value="">Please Select Incubation Date</option>--}}\n' +
                        '                                    @foreach($eggincdates as $eggincdate)\n' +
                        '                                        <option value={{$eggincdate}} >{{$eggincdate}}</option>\n' +
                        '                                    @endforeach\n' +
                        '                            </select>')
                } else {
                    $('#incubatedDate').html('');
                }
                $(document).ready(function() {

                        $('#mySelect').change(function(e){
                            var date = this.value;
                            console.log(this.value);
                            $.ajax({
                                url: "{{  route('poultry.getDateQuantity',"") }}/"+date,
                                method: 'get',
                                success: function(result){
                                    $('#testing').html('Your Total Incubated Eggs = '+result);
                                    $('#quantity').change(function () {
                                        if(this.value > result)
                                        {
                                            alert('Please do not exceed the Available Quantity');
                                        }
                                    })
                                }});
                        });

                    });
                })
            });


        $(document).ready(function() {
            $('#mytable').DataTable( {
            });
        });

        const poultry_status = {
            'poultry_1' : {
                'name' : 'Hen',
                'status' : [
                    { id: 1, value: 'Die'},
                    { id: 5,value: 'Purchase'},
                    { id: 6, value: 'Sick'},

                ]
            },
            'poultry_2' : {
                'name' : 'Chicks',
                'status' : [
                    { id : 1, value: 'Die' },
                    { id : 2, value: 'Collected' },
                    { id : 4, value: 'Converted To Hen' },
                    { id : 6, value: 'Sick'},

                ]
            },
            'poultry_3' : {
                'name' : 'Egg',
                'status' : [
                    { id : 3, value: 'Incubated' },
                    { id : 4, value: 'Collected' },
                ]
            }
        };

        function change_status(statusID) {
            var strOptions = '<option value="">Please Select Poultry Status</option>';
            poultry_status['poultry_'+statusID].status.forEach(function(val,idx)
            {
                strOptions+="<option value='"+val.id+"'>"+val.value+"</option>";
            });
            $('#poultry_status_id').html(strOptions);
        }
    </script>
@endsection

