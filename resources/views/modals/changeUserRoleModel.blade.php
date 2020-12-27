
<div class="modal fade" id="changeUserRoleModal" tabindex="-1" role="dialog" aria-labelledby="changeUserRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="{{ route('inspection.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="changeUserRoleModalLabel">
                        <h4 class="card-title"><strong>Change Role</strong></h4>
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
                                <label for="status">Select Role</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Role</option>
                                    @forelse ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @empty
                                        <option value="">No roles found</option>
                                    @endforelse
                                </select>
                            </div>
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