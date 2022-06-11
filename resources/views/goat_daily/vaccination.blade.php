<div class="tab-pane show" id="tab51">
    <div class="float-right mb-3">
        <div class="input-group">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addVaccination">Add Vaccination</button>
            <!-- Message Modal -->
            <div class="modal fade" id="addVaccination" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">Add Vaccination</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('vaccination.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Date</label>
                                    <input type="hidden" name="serial_no" value="{{$goat_daily->serial_no}}">
                                    <input type="text" onfocus= "(this. type='date')" class="form-control" name="created_at" value="<?php use App\Models\AccountHead;use App\Models\Medicines;echo date('Y-m-d');?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Medicine Quantity</label>
                                    <input type="text" class="form-control" id="goatVaccineQuantity" name="quantity">
                                    <?php
                                    $goatSerial = $goat_daily->serial_no;
                                    $sub_head_id = AccountHead::where('name',"goat#$goatSerial")->pluck('id')->last();
                                    $goatDailyVaccineStock = \App\Models\Vaccination::goatDailyVaccineStock($sub_head_id);
                                    ?>
                                    <div id="testing" class="invalid-feedback" style="display: block !important;">
                                        Avaliable Vaccine = {{$goatDailyVaccineStock}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submitGoat" class="btn btn-primary">Add Vaccination</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="" class="table table-striped table-bordered text-nowrap w-100 display">
            <thead>
            <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-25p">Date</th>
                <th class="wd-15p">Vaccination Quantity</th>
                <th class="wd-15p">Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vaccinations as $vaccination)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$vaccination->created_at ?? ''}}</td>
                    <td>{{$vaccination->quantity ?? ''}}</td>
                    <td>{{$vaccination->description ?? ''}}</td>
                    <td>
                        <form action="{{ route('vaccinationGoat.destroy', $vaccination->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline-block;">
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
@section('more-script')
    <script>
        $(function() {
            var purchaseFeedMUsedFeed = {{$goatDailyVaccineStock}};
            $('#goatVaccineQuantity').change(function()
            {
                console.log(this.value);
                if(this.value > purchaseFeedMUsedFeed)
                {
                    alert('Please do not exceed the Available Quantity');
                    $('#goatVaccineQuantity').val(purchaseFeedMUsedFeed);
                }
            });
        });
    </script>
@endsection
