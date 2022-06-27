@extends('layouts.nav')
@section('title', 'Edit Cultivation Collect')
@section('margin', 'my-md-5')
@section('app-content', 'app-content')


@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('cultivation.collectCultivation')}}">Collect
                            Cultivation List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Cultivation Collect') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Edit Collect Cultivation') }} ID
                                # {{$cultivation->id}}</h3>
                        </div>
                        <form class="form-horizontal" method="post"
                              action="{{route('cultivation.updateCollect',$cultivation->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cultivation Type" class="required">Cultivation Type:</label>
                                            <select name="cultivation_type_id" class="form-control select2 " required>
                                                @foreach($cultivation_types as $cultivation_type)
                                                    <option value="{{$cultivation_type->id}}">{{$cultivation_type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="quantity" class="required">Quantity:</label>
                                            <input type="text" class="form-control" name="quantity"
                                                   value="{{$cultivation->quantity}}" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href="{{route('cultivation.collectCultivation')}}" class="btn btn-secondary">Back</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date" class="required">Date</label>
                                            <input type="text" onfocus="(this. type='date')" class="form-control"
                                                   name="date" value="{{$cultivation->date}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description:</label>
                                            <input type="text" class="form-control" name="description"
                                                   value="{{$cultivation->description}}">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('more-script')
    <script>
        @parent
        $(document).ready(function () {
            $('#mytable').DataTable({});
        });
    </script>
@endsection

