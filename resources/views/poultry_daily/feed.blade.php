<div class="tab-pane @if ($tab == 'feed') active @endif" id="tab31">
    <div class="float-right mb-3">
        <div class="input-group">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addfeed">Add Feed</button>
            <!-- Message Modal -->
            <div class="modal fade" id="addfeed" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">Add Feed</h5>
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
                                    <input type="text" onfocus= "(this. type='date')" class="form-control" name="created_at" value="<?php echo date('Y-m-d');?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Feed Quantity</label>
                                    <input type="number" class="form-control" id="feedQuantity" name="quantity" required>
                                    <?php
                                    $purchaseFeedMUsedFeed = \App\Models\Poultry::purchaseFeedMUsedFeed();
                                    ?>
                                    <div id="testing" class="invalid-feedback" style="display: block !important;">
                                        Avaliable Feeds = {{$purchaseFeedMUsedFeed}}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submitFeed" class="btn btn-primary">Add Feed</button>
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
                <th class="wd-15p">Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach($poultryFeed as $t)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{date('d-m-Y', strtotime($t->created_at))}}</td>
                        <td>{{$t->quantity ?? ''}} </td>
                        <td>
                            <form method="POST" action="{{ route('poultry_daily.feeddel',$t->id ) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" name="deleteEgg" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fe fe-trash"></i> {{$t->id}}</button>
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
        var feedQty = {{$purchaseFeedMUsedFeed}};
        $(function(){
            $('#feedQuantity').change(function()
            {
                if(this.value > feedQty)
                {
                    alert('Please do not exceed the Available Quantity');
                    $('#feedQuantity').val(feedQty);
                }
            });
        });
    </script>
@endsection
