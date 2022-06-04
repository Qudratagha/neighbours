<div class="tab-pane @if ($tab == 'egg') active @endif" id="tab11">
    <div class="float-right mb-3">
        <div class="input-group">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#soldEgg">Sold Egg</button>
            <!-- Message Modal -->
            <div class="modal fade" id="soldEgg" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">Add Egg</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('poultry_daily.storeDaily')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Date</label>
                                    <input type="text" id="test1" onfocus= "(this. type='date')" class="form-control" name="date" value="<?php echo date('Y-m-d');?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Quantity</label>
                                    <input type="text"  class="form-control" id="EggQuantity" name="quantity" required>
                                    <?php
                                    $totalEggsCollected = \App\Models\Poultry::totalEggsCollected();
                                    $qtyInDozens = floor($totalEggsCollected / 12);

                                    ?>
                                    <div id="testing" class="invalid-feedback" style="display: block !important;">
                                        Avaliable Eggs = {{$qtyInDozens}} Dozens
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submitEgg" class="btn btn-primary">Sold Egg</button>
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
                <th class="wd-15p">Egg Quantity</th>
                <th class="wd-15p">Amount</th>
                <th class="wd-15p">Description</th>
                <th class="wd-15p">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($eggSale as $egg)
                {{$eggQty = $egg->quantity/12}}
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$egg->date ?? ''}}</td>
                    <td>{{$eggQty ?? ''}} Dozen</td>
                    <td>{{$egg->amount ?? ''}} </td>
                    <td>{{$egg->description ?? ''}}</td>
                    <td>
                        <form method="POST" action="{{ route('poultry_daily.eggdel',$egg->id ) }}">
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

    <script>
        var qtyindzn = {{$qtyInDozens}};
        $(function(){
            $('#EggQuantity').change(function()
            {

                if(this.value > qtyindzn)
                {
                    alert('Please do not exceed the Available Quantity');
                    $('#EggQuantity').val(qtyindzn);
                }
            });
        });
    {{--$(document).ready(function() {--}}
    {{--    $('#test1').change(function (e) {--}}
    {{--        $.ajax({--}}
    {{--            url: "{{route('poultry_daily.totalEggs')}}",--}}
    {{--            method: 'get',--}}
    {{--            success: function (result) {--}}
    {{--                console.log(result);--}}
    {{--                $('#testing').html('Your Total Incubated Eggs = ' + result +' Dozen');--}}
    {{--                $('#quantity').change(function () {--}}
    {{--                    // console.log(this.value);--}}
    {{--                    if (this.value > result) {--}}
    {{--                        alert('Please do not exceed the Available Quantity');--}}
    {{--                        $('#quantity').val(result);--}}
    {{--                    }--}}
    {{--                });--}}
    {{--            }--}}
    {{--        });--}}
    {{--    });--}}
    {{--});--}}
</script>
@endsection
