<div class="tab-pane @if ($tab == 'vaccine') active @endif" id="tab41">
    <div class="float-right mb-3">
        <div class="input-group">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addvaccine">Add Vaccine</button>
            <!-- Message Modal -->
            <div class="modal fade" id="addvaccine" tabindex="-1" role="dialog"  aria-hidden="true">
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
                                    <label for="message-text" class="form-control-label">Vaccine Quantity</label>
                                    <input type="text" class="form-control vaccinationQty" id="vaccinationQty" name="quantity">
                                    <?php
                                    $purchaseVaccineMUsedVaccine = \App\Models\Poultry:: purchaseVaccineMUsedVaccine();
                                    ?>
                                    <div id="testing" class="invalid-feedback" style="display: block !important;">
                                        Avaliable Vaccine = {{$purchaseVaccineMUsedVaccine}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Vaccine Desc</label>
                                    <input type="text" class="form-control" id="description" name="description" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submitVaccine" class="btn btn-primary">Vaccine</button>
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
                <th class="wd-15p">Vaccine Quantity</th>
                <th class="wd-15p">DESC</th>
            </tr>
            </thead>
            <tbody>
                @foreach($poultryVaccine as $vaccine)
                    <tr>
                        <td>{{$vaccine->id}}</td>
                        <td>{{date('d-m-Y', strtotime($vaccine->created_at))}}</td>
                        <td>{{$vaccine->quantity ?? ''}} </td>
                        <td>{{$vaccine->description ?? ''}} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- table-wrapper -->
</div>
@section('more-script')
    <script>
        $(function(){
            var feedQty = {{$purchaseVaccineMUsedVaccine}};
            $('.vaccinationQty').change(function()
            {
                if(this.value > feedQty)
                {
                    alert('Please do not exceed the Available Quantity');
                    $('.vaccinationQty').val(feedQty);
                }
            });
        });
    </script>
@endsection
