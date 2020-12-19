@extends('layouts.master')
@section('title','Dashboard')
@push('stylesheets')
<link rel="stylesheet" href="{{ asset('assets/css/cs-skin-elastic.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endpush
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header" style="background: #4CAFE0 !important; color:#fff">
            <strong class="card-title">Data Table</strong>
            <button type='button' class='btn btn-warning btn-sm mb-1 pull-right' data-toggle='modal' data-target='#addlocationModal'><i class="fa fa-plus"></i> Add New</button>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Area/Location Building/Level</th>
                        <th>Date</th>
                        <th>Findings</th>
                        <th>Picture</th>
                        <th>Proposed Corrective Action</th>
                        <th>Accoutibility</th>
                        <th>Status</th>
                        <th>Closing Date</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>$320,800</td>
                        <td>dfgsdfgsdg</td>
                        <td>Edinburgh</td>
                        <td>$320,800</td>
                        <td>01-01-2021</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>  
{{-- add Location  --}}
<div class="modal fade" id="addlocationModal" tabindex="-1" role="dialog" aria-labelledby="addlocationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('inspection.store') }}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="addlocationModalLabel">
                        <h4 class="card-title"><strong>Add Inpections</strong></h4>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" placeholder="Add Area/Location Building/Level..." name="location">
                    </div>

                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="text" class="form-control" id="date" placeholder="Add Date..." name="date">
                    </div>

                    <div class="form-group">
                        <label for="findings">Findings</label>
                        <textarea class="form-control" name="findings" id="findings" cols="30" rows="3" placeholder="Add Findings......"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="picture">Picture</label>
                        <input type="text" class="form-control" id="picture" placeholder="Take Picture..." name="picture">
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
                        <input type="text" class="form-control" name="closing_date" placeholder="Add Closing date...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="{{ asset('assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/js/init/datatables-init.js') }}"></script>


<script type="text/javascript"> 
    function addNewRow(){
        var table = $('#bootstrap-data-table').DataTable();

            table.row.add([
                    "0",
                    "09/10/2019",
                    "System Architect",
                    "$3,120",
                    "2011/04/25",
                    "2011/04/25",
                    "2011/04/25",
                    "2011/04/25",
                    "<button type='button' class='btn btn-success btn-sm mb-1' data-toggle='modal' data-target='#addlocationModal'>Add</button>"
            ]).draw();
    }
    
    function onChange(){
        debugger
    }
        
</script>
@endpush
