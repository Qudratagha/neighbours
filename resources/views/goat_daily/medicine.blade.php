<div class="tab-pane" id="tab21">
    <div class="float-right mb-3">
        <div class="input-group">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addMedicine">Add Medicine</button>
            <!-- Message Modal -->
            <div class="modal fade" id="addMedicine" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">Add Medicine</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('medicine.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Date</label>
                                    <input type="hidden" name="cattle_id" value="{{$goat_daily->serial_no}}">
                                    <input type="text" onfocus= "(this. type='date')" class="form-control" name="created_at" value="<?php echo date('Y-m-d');?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submitGoat" class="btn btn-primary">Add Medicine</button>
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
                    <th class="wd-15p">Medicine</th>
                    <th class="wd-15p">Description</th>
                    <th class="wd-15p">Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach($medicines as $medicine)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$medicine->date}}</td>
                        <td>{{$medicine->name }}</td>
                        <td>{{$medicine->description}}</td>
                        <td>
                            <form action="{{ route('medicineGoat.destroy', $medicine->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline-block;">
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
