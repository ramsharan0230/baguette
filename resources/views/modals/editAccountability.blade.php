<div class="modal fade" id="editAccountabilityModal" tabindex="-1" role="dialog" aria-labelledby="editAccountabilityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="{{ route('inspection.edit.accountability') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="editAccountabilityModalLabel">
                        <h4 class="card-title"><strong>Edit Accountability</strong></h4>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="editAccountabilityId" name="editAccountabilityId">
                                <label for="editAccountability">Accountability</label>
                                <textarea class="form-control" name="editAccountability" id="editAccountability" rows="3" placeholder="Edit Accountability......"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="editLocationSubmit" class="btn btn-primary btn-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>