<div class="tab-pane" id="tab21">
    <div class="float-right mb-3">
        <div class="input-group">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addFeed">Feed Cow</button>
            <!-- Message Modal -->
            <div class="modal fade" id="addFeed" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">Feed Cow</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('cow_feed.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Date</label>
                                    <input type="text" onfocus= "(this. type='date')" class="form-control" name="created_at" value="<?php echo date('Y-m-d');?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="submitCowFeed" class="btn btn-primary">Feed Cow</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                <th class="wd-30p">Cattle Type</th>
                <th class="wd-30p">Name</th>
                <th class="wd-30p">Quantity</th>
                <th class="wd-10p">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($feeds as $feed)
                    <tr>
                        <td>{{$feed->cattle_type ? 'Cow' : ''}}</td>
                        <td>{{$feed->name}}</td>
                        <td>{{$feed->quantity}} Kg</td>
                        <td>
                            <form action="{{route('cow_feed.destroy', $feed->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline-block;">
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
