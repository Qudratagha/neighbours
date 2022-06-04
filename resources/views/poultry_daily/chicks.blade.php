<div class="tab-pane @if ($tab == 'chicks') active @endif" id="tab61">
    <div class="float-right mb-3">
        <div class="input-group">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#soldchicks">Sold Chicks</button>
            <!-- Message Modal -->
            <div class="modal fade" id="soldchicks" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">Sold Chicks</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('poultry_daily.storeDaily')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Date</label>
                                    {{--                                    <input type="hidden" name="cow_id" value="{{$cow_daily->id}}">--}}
                                    <input type="text" onfocus= "(this. type='date')" class="form-control" name="date" value="<?php echo date('Y-m-d');?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Quantity</label>
                                    <input type="number" class="form-control" id="chickQuantityAvail" name="quantity" required>
                                    <?php
                                    $totalRemainingChicks = \App\Models\Poultry:: totalRemainingChicks();
                                    ?>
                                    <div id="testing" class="invalid-feedback" style="display: block !important;">
                                        Avaliable Chickss = {{$totalRemainingChicks}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Amount</label>
                                    <input type="number" class="form-control" id="amount" name="amount">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Detail</label>
                                    <input type="text" class="form-control" id="description" name="description">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submitChick" class="btn btn-primary">Sold Chicks</button>
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
                <th class="wd-15p">Quantity</th>
                <th class="wd-15p">Amount</th>
                <th class="wd-15p">Detail</th>
                <th class="wd-15p">Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach($chickSale as $chick)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$chick->date ?? ''}}</td>
                        <td>{{$chick->quantity ?? ''}} </td>
                        <td>{{$chick->amount ?? ''}} </td>
                        <td>{{$chick->description ?? ''}} </td>
                        <td>
                            <form method="POST" action="{{ route('poultry_daily.eggdel',$chick->id ) }}">
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

let totalRemainingChicks  = {{$totalRemainingChicks}}
        $(function()
        {
            var qtyindzn = totalRemainingChicks;
            $('#chickQuantityAvail').change(function()
            {
                if(this.value > qtyindzn)
                {
                    alert('Please do not exceed the Available Quantity');
                    $('#chickQuantityAvail').val(qtyindzn);
                }
            });
        });
    </script>
@endsection
