
<div class="modal fade" id="addlocationModal" tabindex="-1" role="dialog" aria-labelledby="addlocationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('inspection.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="addlocationModalLabel">
                        <h4 class="card-title"><strong>Add Inpections</strong></h4>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <ul>
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{{ $error }}</div>
                            @endforeach
                        </ul>  
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" placeholder="Add Area/Location Building/Level..." name="location">
                            </div>
        
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input class="form-control" type="date" name="start_date"  value="{{old('start_date')}}">
                            </div>
        
                            <div class="form-group">
                                <label for="findings">Findings</label>
                                <textarea class="form-control" name="findings" id="findings" cols="30" rows="3" placeholder="Add Findings......"></textarea>
                            </div>
        
                            <div class="form-group">
                                <label for="picture">Picture</label>
                                <input type="button" value="Take Snapshot" onClick="take_snapshot()" class="form-control">
                                <input type="hidden" id="picture" name="picture" class="form-control">
                            </div>
        
                            <div class="form-group">
                                <label for="pca">Propose Corrective Action</label>
                                <textarea class="form-control" name="pca" id="pca" cols="30" rows="3" placeholder="Add Propose Corrective Action..."></textarea>
                            </div>
        
                            <div class="form-group">
                                <label for="accountibility">Accountibility</label>
                                <input type="text" name="accountibility" id="accountibility" placeholder="Add Accountibility..." class="form-control">
                            </div>
        
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="1">Open</option>
                                    <option value="0">Close</option>
                                </select>
                            </div>
        
                            <div class="form-group">
                                <label for="closing_date">Closing Date</label>
                                <input class="form-control" type="date" name="closing_date" placeholder="Add Closing date...">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div id="results"></div>
                            <div id="my_camera"></div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>