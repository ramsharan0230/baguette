@extends('layouts.master')
@section('title','Hygiene  | Dashboard')
@push('stylesheets')
<<<<<<< HEAD
<link rel="stylesheet" href="{{ asset('assets/css/cs-skin-elastic.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<style>
    #results { float:right; margin:20px; padding:20px; border:1px solid; background:#ccc; }
    .modal-lg {
        max-width: 80% !important;
    }
</style>
=======
<link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.css">
>>>>>>> 302001233e6401179493a224d29e27d0f1603f36
@endpush
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header" style="background: #4CAFE0 !important; color:#fff">
            <strong class="card-title">Inspections</strong>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($inspections as $key=>$inspection)
                    <tr>
<<<<<<< HEAD
                        <td>{{ $key+1 }}</td>
                        <td>{{ $inspection->location }} <button data-id="{{ $inspection->id }}" data-location="{{ $inspection->location }}" class="btn btn-default btn-sm editLocation" style="border-radius: 50%" data-toggle='modal' data-target='#editLocationModal'><i class="fa fa-pencil"></i></button></td>
                        <td>{{ $inspection->start_date }} <button data-id="{{ $inspection->id }}" data-start_date="{{ $inspection->start_date }}" class="btn btn-default btn-sm editDate" style="border-radius: 50%" data-toggle='modal' data-target='#editDateModal'><i class="fa fa-pencil"></i></button></td>
                        <td>{{ $inspection->findings }} <button data-id="{{ $inspection->id }}" data-findings="{{ $inspection->findings }}" class="btn btn-default btn-sm editFindings" style="border-radius: 50%" data-toggle='modal' data-target='#editFindingsModal'><i class="fa fa-pencil"></i></button></td>
                        <td><img src="{{ asset('images/inspection_files').'/'.$inspection->picture }}" data-toggle='modal' data-picture="{{ $inspection->picture }}" data-target='#showImageModal' class="img-thumbnail showImage" height="200px" height="200px" ></td>
                        <td>{{ $inspection->pca }} <button data-id="{{ $inspection->id }}" data-pca="{{ $inspection->pca }}" class="btn btn-default btn-sm editPca" style="border-radius: 50%" data-toggle='modal' data-target='#editPcaModal'><i class="fa fa-pencil"></i></button></td>
                        <td>{{ $inspection->accountibility }} <button data-id="{{ $inspection->id }}" data-accountability="{{ $inspection->accountibility }}" class="btn btn-default btn-sm editAccountability" style="border-radius: 50%" data-toggle='modal' data-target='#editAccountabilityModal'><i class="fa fa-pencil"></i></button></td>
                        <td>
                            @if($inspection->status==1)
                                <button class="btn btn-sm btn-success">Open</button>
                            @else
                                <button class="btn btn-sm btn-primary">Close</button>
                            @endif
                            <button data-id="{{ $inspection->id }}" data-status="{{ $inspection->status }}" class="btn btn-default btn-sm editStatus" style="border-radius: 50%" data-toggle='modal' data-target='#editStatusModal'><i class="fa fa-pencil"></i></button>
                        </td>
                        <td>{{ $inspection->closing_date }} <button data-id="{{ $inspection->id }}" data-closing_date="{{ $inspection->closing_date }}" class="btn btn-default btn-sm editClosingDate" style="border-radius: 50%" data-toggle='modal' data-target='#editClosingDateModal'><i class="fa fa-pencil"></i></button></td>
                        <td>
                            @if($inspection->approvedBy_hygiene==1)
                                <button class="btn btn-default disabled btn-sm">Submitted</button>                       
                            @else
                                <a href="{{ route('inspection.approve', $inspection->id) }}" class="btn btn-primary btn-sm" >Submit</a>
                                <button class="btn btn-danger btn-sm btn-sm">Delete</button>      
                            @endif    
                        </td>
=======
                        <td>1</td>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>$320,800</td>
                        <td>dfgsdfgsdg</td>
                        <td>Edinburgh</td>
                        <td>$320,800</td>
                        <td>01/01/2021 <button class="btn btn-primary btn-sm" style="float: right;" onclick="addNewRow()"> <i class="fa fa-plus"></i></button></td>
>>>>>>> 302001233e6401179493a224d29e27d0f1603f36
                    </tr>
                    @empty
                        <tr><td colspan="10">No Data Found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>  
{{-- add Location  --}}
<<<<<<< HEAD
@include('modals.addInspection')
@include('modals.editLocation')
@include('modals.editDate')
@include('modals.editFindings')
@include('modals.editPca')
@include('modals.editAccountability')
@include('modals.editStatus')
@include('modals.editClosingDate')
@include('modals.showImageModal')
=======
<div class="modal fade" id="addlocationModal" tabindex="-1" role="dialog" aria-labelledby="addlocationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="">
                <div class="modal-header" style="background: #4CAFE0 !important; color:#fff">
                    <h5 class="modal-title" id="addlocationModalLabel">Add Inpections</h5>
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
                        <label for="location">Date</label>
                        <input type="text" class="form-control" id="date" placeholder="Add Date..." name="date">
                    </div>

                    <div class="form-group">
                        <label for="location">Findings</label>
                        <textarea class="form-control" name="pca" id="findings" cols="30" rows="3" placeholder="Add Findings......"></textarea>
                    </div>
>>>>>>> 302001233e6401179493a224d29e27d0f1603f36

@endsection
@push('scripts')
<script>
    @if (count($errors) > 0)
        $('#addlocationModal').modal('show');
    @endif
</script>
<script>
    $(".approveBtn").click(function(e){
        e.preventDefault();
        var id = $(this).data("id")

        $.ajax({
            url: 'inspection/'+id+'/approve',
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
            },
            dataType: 'json',
        success: function (data) {
            alert(data.message)
            location.reload();
        }
    }); 

    $(".assignBtn").click(function(e){
        debugger
        // e.preventDefault();
        // var id = $(this).data("id")

        // $.ajax({
        //     url: 'inspection/'+id+'/assign',
        //     type: "POST",
        //     data: {
        //         "_token": "{{ csrf_token() }}",
        //         id: id,
        //     },
        //     dataType: 'json',
        // success: function (data) {
        //     alert(data.message)
        //     location.reload();
        // }
    }); 
});
</script>
<script type="text/javascript">
    $('.showImage').click(function(){
        var image = $(this).data('picture');
        $('#showImageModal').html('<img src="' + $(this).data('picture') + '"/>')

<<<<<<< HEAD
        // $('#showImageModal').modal('show');src="{{ asset('images/inspection_files').'/'.$inspection->picture }}"
    })
</script>
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
<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js"> </script>
<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/webcam.js') }}"></script>
<script src="{{ asset('assets/js/jquery.base64.min.js') }}"></script>

<script src="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            dateFormat: "dd-mm-yy", 
        });
    });
</script>
<script language="JavaScript">
    Webcam.set({
        width: 500,
        height: 300,
        image_format: 'jpeg',
        jpeg_quality: 500
    });
    Webcam.attach( '#my_camera' );
</script>
=======
{{-- Closing date model --}}
<div class="modal fade" id="closingDateModal" tabindex="-1" role="dialog" aria-labelledby="closingDateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="closingDateModalLabel">Closing Date</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" >
                    <label for="Select date">Select Closing Date</label>
                    <input class="form-control" type="date" name="date"  value="{{old('date')}}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-sm">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Status --}}
<div class="modal fade" id="selectStatusModel" tabindex="-1" role="dialog" aria-labelledby="selectStatusModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectStatusModelLabel">Select Status</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" >
                    <label for="Select date">Select Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="1">Open</option>
                        <option value="0">Close/option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-sm">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/jszip.min.js"></script>
<script src="assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="assets/js/init/datatables-init.js"></script>
<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js"> </script>
<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js"></script>
>>>>>>> 302001233e6401179493a224d29e27d0f1603f36

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
                    "Open <button type='button' class='btn btn-primary btn-sm mb-1' data-toggle='modal' data-target='#selectStatusModel'>  <i class='fa fa-pencil'></i></button>",
                    "20/01/2021 <button type='button' class='btn btn-primary btn-sm mb-1' data-toggle='modal' data-target='#closingDateModal'>  <i class='fa fa-calendar-o'></i></button>"
            ]).draw();
    }
    
    function onChange(){
        debugger
    }
        
</script>

<script language="JavaScript">
    function take_snapshot() {
        // take snapshot and get image data
        Webcam.snap( function(data_uri) {
            // display results in page
            $('#picture').val(data_uri)
            document.getElementById('results').innerHTML = 
                '<h2>Here is your image:</h2>' +
                '<img src="'+data_uri+'"/>'; 
        } );
    }
</script>
<script type="text/javascript" src="{{ asset('assets/js/actions.js') }}"></script>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script src="text/javascript">

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    $('#editLocationSubmit').on('click', function (event) {
        event.preventDefault()
        var id = $("#editId").val();
        var location = $("#editLocation").val();
    
        $.ajax({
        url: 'hygiene/edit/'+id+'/location',
        type: "POST",
        data: {
            id: id,
            location: location,
        },
        dataType: 'json',
        success: function (data) {
            debugger
            // $('#companydata').trigger("reset");
            // $('#practice_modal').modal('hide');
            // window.location.reload(true);
        }
    });

    $('#editDateSubmit').on('click', function (event) {
        event.preventDefault()
        var id = $("#editId").val();
        var date = $("#editDate").val();
    
        $.ajax({
        url: 'hygiene/edit/'+id+'/date',
        type: "POST",
        data: {
            id: id,
            date: date,
        },
        dataType: 'json',
        success: function (data) {
            debugger
            // $('#companydata').trigger("reset");
            // $('#practice_modal').modal('hide');
            // window.location.reload(true);
        }
    });
});
</script>
@endpush
