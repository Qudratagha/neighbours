<div class="tab-pane @if ($tab == 'medicine') active @endif" id="tab51">
    <div class="float-right mb-3">
        <div class="input-group">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addmedicine">Add Medicine</button>
            <!-- Message Modal -->
            <div class="modal fade" id="addmedicine" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">Add Vaccine</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('poultry_daily.storeDaily')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Date</label>
                                    <input type="text" onfocus= "(this. type='date')" class="form-control" name="created_at" value="<?php echo date('Y-m-d');?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Medicine Quantity</label>
                                    <input type="text" class="form-control" id="medicineQty" name="quantity">
                                    <?php
                                    $totalMedicinePurchase = \App\Models\Poultry:: totalMedicinePurchase();
                                    ?>
                                    <div id="testing" class="invalid-feedback" style="display: block !important;">
                                        Avaliable Medicine = {{$totalMedicinePurchase}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Medicine Desc</label>
                                    <input type="text" class="form-control" id="description" name="description" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submitMedicine" class="btn btn-primary">Add Medicine</button>
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
                <th class="wd-15p">Medicine Name</th>
                <th class="wd-15p">Medicine Quantity</th>
                <th class="wd-15p">Description</th>
            </tr>
            </thead>
            <tbody>
                @foreach($poultryMedicine as $medicine)
                    <tr>
                        <td>{{$medicine->id}}</td>
                        <td>{{date('d-m-Y', strtotime($medicine->created_at))}}</td>
                        <td>{{$medicine->name ?? ''}} </td>
                        <td>{{$medicine->quantity ?? ''}} </td>
                        <td>{{$medicine->description ?? ''}} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- table-wrapper -->
</div>
@section('more-script')
    <script>
        var medicineQty = {{$totalMedicinePurchase}};
        $(function(){
            $('#medicineQty').change(function()
            {
                if(this.value > medicineQty)
                {
                    alert('Please do not exceed the Available Quantity');
                    $('#medicineQty').val(medicineQty);
                }
            });
        });
    </script>
@endsection
