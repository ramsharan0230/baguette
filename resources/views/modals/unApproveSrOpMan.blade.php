<div class="modal fade" id="unapproveSitemanModal" tabindex="-1" role="dialog" aria-labelledby="unapproveSitemanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="{{ route('inspection.unapproved_by_siteman') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="unapproveSitemanModalLabel">
                        <h4 class="card-title"><strong>Report Problem</strong></h4>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="editId" name="editId">
                                <label for="problem">Report Problem</label>
                                <textarea class="form-control" name="problem" id="problem" rows="3" placeholder="Report Problem......"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="submitUnapprove" class="btn btn-primary btn-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>