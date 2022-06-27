@extends('layouts.nav')
@section('title', 'Purchase - Cow')

@section('app-content', 'app-content')

@section('main-content')
    <div class="container content-area">
        <div class="side-app">
            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('cow_expenditure.index')}}">Cow Expenditure List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Purchase Cow') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ __('Purchase Cow') }}</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('cow_expenditure_purchase.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label required">Enter Date</label>
                                            <input type="text" onfocus="(this. type='date')" class="form-control"
                                                   name="date" value="<?php use App\Models\Cattle;echo date('Y-m-d')?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">Cow Serial</label>
                                            <input type="number" class="form-control" name="serial_no" id="serialNO"
                                                   placeholder="Enter Serial No" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">Entry In Farm</label>
                                            <input type="text" onfocus="(this. type='date')" class="form-control"
                                                   name="entry_in_farm" placeholder="Entry In Farm"
                                                   value="<?php echo date('Y-m-d')?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">Age</label>
                                            <input type="number" class="form-control" name="age"
                                                   placeholder="Enter Age" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label required">Cost</label>
                                            <input type="number" class="form-control" name="amount"
                                                   placeholder="Enter Cost" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">Breed</label>
                                            <input type="text" class="form-control" name="breed"
                                                   placeholder="Enter Breed" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Weight</label>
                                            <input type="number" class="form-control" name="weight"
                                                   placeholder="Enter Weight">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Height</label>
                                            <input type="number" class="form-control" name="height"
                                                   placeholder="Enter Height">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="submitCow" value="1" class="btn btn-primary">Submit</button>
                                <a href="{{route('cow_expenditure.index')}}" type="button"
                                   class="btn btn-danger">Back</a>
                            </form>
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
		<?php
            $allSerialNO = Cattle::cows()->get('serial_no');
            $allSerialNO = json_encode($allSerialNO);
		?>
        $(function () {
            let allSerialNOs = {!! $allSerialNO !!};
            console.log(allSerialNO);
            $('#serialNO').change(function () {
                forEach(allSerialNOs as allSerialNO)
                if (allSerialNO === this.value) {
                    console.log(this.value);
                }
            });
        });
    </script>
@endsection
