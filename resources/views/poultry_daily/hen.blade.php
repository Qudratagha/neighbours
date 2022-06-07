<div class="tab-pane @if ($tab == 'hen') active @endif" id="tab21">
    <div class="float-right mb-3">
        <div class="input-group">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#soldhen">Sold Hen</button>
            <!-- Message Modal -->
            <div class="modal fade" id="soldhen" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">Sold Hen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('poultry_daily.storeDaily')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Date</label>
                                    <input type="text" onfocus= "(this. type='date')" class="form-control" name="date" value="<?php echo date('Y-m-d');?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Hen Quantity</label>
                                    <input type="text" class="form-control" id="HenQuantity" name="quantity" required>
                                    <?php
                                    $purchaseMsaleMdie = \App\Models\Poultry:: purchaseMsaleMdie();
                                    ?>
                                    <div id="testing" class="invalid-feedback" style="display: block !important;">
                                        Avaliable Hens = {{$purchaseMsaleMdie}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Amount</label>
                                    <input type="number" class="form-control" id="amount" name="amount">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submitHen" class="btn btn-primary">Sold Hen</button>
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
                <th class="wd-15p">Hen Quantity</th>
                <th class="wd-15p">Rate</th>
                <th class="wd-15p">Detail</th>
                <th class="wd-15p">Delete</th>

            </tr>
            </thead>
            <tbody>
                @foreach($henSale as $hen)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$hen->date ?? ''}}</td>
                        <td>{{$hen->quantity ?? ''}} </td>
                        <td>{{$hen->amount ?? ''}} </td>
                        <td>{{$hen->description ?? ''}} </td>
                        <td>
                            <form method="POST" action="{{ route('poultry_daily.eggdel',$hen->id ) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" name="deleteEgg" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fe fe-trash"></i></button>
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
    @parent
    <script>
        $(function()
        {
            var qtyindzn = {{$purchaseMsaleMdie}};
            $('#HenQuantity').change(function()
            {
                if(this.value > qtyindzn)
                {
                    alert('Please do not exceed the Available Quantity');
                    $('#HenQuantity').val(qtyindzn);
                }
            });
        });
    </script>
@endsection

