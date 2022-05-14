<div class="tab-pane active" id="tab11">
    <div class="float-right mb-3">
        <div class="input-group">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addSick">Add Sick</button>
            <!-- Message Modal -->
            <div class="modal fade" id="addSick" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">Add Sick</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('sick.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Date</label>
                                    <input type="hidden" name="cattle_id" value="{{$goat_daily->id}}">
                                    <input type="text" onfocus= "(this. type='date')" class="form-control" name="date" value="<?php echo date('Y-m-d');?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Sick</label>
                                    <input type="radio" class="form-control" id="is_sick" name="is_sick" value="1">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Treatment</label>
                                    <input type="text" class="form-control" id="treatment" name="treatment">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submitGoat" class="btn btn-primary">Add Sick</button>
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
                <th class="wd-15p">Sick</th>
                <th class="wd-15p">Treatment</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sicks as $sick)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$sick->date ?? ''}}</td>
                    <td>{{$sick->is_sick ?? ''}}</td>
                    <td>{{$sick->treatment ?? ''}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- table-wrapper -->
</div>
