<div class="tab-pane" id="tab21">
    <div class="float-right mb-3">
        <div class="input-group">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addMilk">Sale Cow</button>
            <!-- Message Modal -->
            <div class="modal fade" id="addMilk" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">Sale CowMilk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('cow_sale.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Date</label>
                                    {{--                                    <input type="hidden" name="cow_id" value="{{$cow_sale->id}}">--}}
                                    <input type="text" onfocus= "(this. type='date')" class="form-control" name="date" value="<?php echo date('Y-m-d');?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="message-text" class="form-control-label">Cow Serial</label>
                                    <select name="cow_serial" class="form-control select2 custom-select" required onchange="change_status(this.value);">
                                        <option value="">Please Select Cow to be Sold</option>
                                        @foreach($cows as $cow)
                                            <option value="{{$cow->serial_no}}">{{$cow->serial_no}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Amount</label>
                                    <input type="number" class="form-control" id="amount" name="amount" required>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="submitCowSale" class="btn btn-primary">Sale Cow</button>
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
                <th class="wd-15p">ID</th>
                <th class="wd-25p">Date</th>
                <th class="wd-15p">Cow-Serial</th>
                <th class="wd-15p">Sale Amount</th>
                <th class="wd-15p">Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach($soldCow as $cow)

                <tr>
                    {{--                    <td>{{$loop->iteration}}</td>--}}
                    {{--                    <td>{{$cow->account_head->transactionsSubHead[0]->date ?? ''}}</td>--}}
                    {{--                    <td>{{ $cow->account_head->name ?? '' }}</td>--}}
                    {{--                    <td>--}}
                    {{--                        <?php--}}
                    {{--//                            $amount = 0;--}}
                    {{--//                            $description = "";--}}
                    {{--//                            foreach ($cow->account_head->transactionsSubHead as $saleTransaction) {--}}
                    {{--//                                if ($saleTransaction->account_head_id == 13) {--}}
                    {{--//                                    $amount = $saleTransaction->amount;--}}
                    {{--//                                    $description = $saleTransaction->description;--}}
                    {{--//                                }--}}
                    {{--//                            }--}}
                    {{--                        ?>--}}
                    {{--                        {{ $cow->account_head->transactionsSubHead[0]->amount ?? ''}}--}}
                    {{--                    </td>--}}
                    {{--                    <td>{{ $cow->account_head->transactionsSubHead[0]->description ?? ''}} </td>--}}

                    <td>{{$loop->iteration}}</td>
                    <td>{{$cow->date ?? ''}}</td>
                    <td>{{ $cow->accountSubHead->name ?? '' }}</td>
                    <td>
                        {{ $cow->amount ?? ''}}
                    </td>
                    <td>{{ $cow->description ?? ''}} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- table-wrapper -->
</div>
