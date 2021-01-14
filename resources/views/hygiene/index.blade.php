@extends('layouts.master')
@section('title','Hygiene  | Dashboard')
@push('stylesheets')
<style>
    #results { float:right; margin:20px; padding:20px; border:1px solid; background:#ccc; }
    .modal-lg {
        max-width: 80% !important;
    }
</style>

@endpush
@section('content')
<div class="col-sm-12 col-md-12 col-lg-12">
    <div class="card">
        <div class="card-header" style="background: #4CAFE0 !important; color:#fff">
            <strong class="card-title">Inspections</strong>
            <button type='button' class='btn btn-warning btn-sm pull-right' data-toggle='modal' data-target='#addlocationModal'><i class="fa fa-plus"></i> Add New</button>
            <strong class="card-title pull-right mr-4"> {{ Auth::user()->name }} ({{ Auth::user()->role->name }}) </strong>
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
                        <td>{{ $key+1 }}</td>
                        <td>{{ $inspection->location }} @if($inspection->approvedBy_hygiene ==0)<button data-id="{{ $inspection->id }}" data-location="{{ $inspection->location }}" class="btn btn-default btn-sm editLocation" style="border-radius: 50%" data-toggle='modal' data-target='#editLocationModal'><i class="fa fa-pencil"></i></button>@endif</td>
                        <td>{{ $inspection->start_date }} @if($inspection->approvedBy_hygiene ==0)<button data-id="{{ $inspection->id }}" data-start_date="{{ $inspection->start_date }}" class="btn btn-default btn-sm editDate" style="border-radius: 50%" data-toggle='modal' data-target='#editDateModal'><i class="fa fa-pencil"></i></button>@endif</td>
                        <td>{{ $inspection->findings }} @if($inspection->approvedBy_hygiene ==0)<button data-id="{{ $inspection->id }}" data-findings="{{ $inspection->findings }}" class="btn btn-default btn-sm editFindings" style="border-radius: 50%" data-toggle='modal' data-target='#editFindingsModal'><i class="fa fa-pencil"></i></button>@endif</td>
                        <td>
                            <div class="row">
                                @forelse ($inspection->pictures as $item)
                                @if(count($inspection->pictures) < 2)
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <img style="cursor:pointer" src="{{ asset('images/inspection_files').'/'.$item->name }}" data-toggle='modal' 
                                        data-picture="{{ $item->name }}" data-target='#showImageModal' onclick="fire(this)" class="img-thumbnail">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <a href="{{ route('inspection.take-picture', $inspection->id) }}" class="btn btn btn-outline-success btn-sm">
                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                        Take Picture</a>
                                </div>
                                @else
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <img style="cursor:pointer" src="{{ asset('images/inspection_files').'/'.$item->name }}" data-toggle='modal' 
                                        data-picture="{{ $item->name }}" data-target='#showImageModal' onclick="fire(this)" class="img-thumbnail">
                                </div>
                                @endif
                                @empty
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <a href="{{ route('inspection.take-picture', $inspection->id) }}" class="btn btn btn-outline-success btn-sm">
                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                        Take Picture</a>
                                </div>
                                @endforelse
                            </div>
                        </td>
                        <td>{{ $inspection->pca }} @if($inspection->approvedBy_hygiene ==0)<button data-id="{{ $inspection->id }}" data-pca="{{ $inspection->pca }}" class="btn btn-default btn-sm editPca" style="border-radius: 50%" data-toggle='modal' data-target='#editPcaModal'><i class="fa fa-pencil"></i></button>@endif</td>
                        <td>{{ $inspection->accountibility }} @if($inspection->approvedBy_hygiene ==0)<button data-id="{{ $inspection->id }}" data-accountability="{{ $inspection->accountibility }}" class="btn btn-default btn-sm editAccountability" style="border-radius: 50%" data-toggle='modal' data-target='#editAccountabilityModal'><i class="fa fa-pencil"></i></button>@endif</td>
                        <td>
                            @if($inspection->status==1)
                                <button class="btn btn-sm btn-success">Open</button>
                            @else
                                <button class="btn btn-sm btn-primary">Close</button>
                            @endif
                            @if($inspection->approvedBy_hygiene ==0)<button data-id="{{ $inspection->id }}" data-status="{{ $inspection->status }}" class="btn btn-default btn-sm editStatus" style="border-radius: 50%" data-toggle='modal' data-target='#editStatusModal'><i class="fa fa-pencil"></i></button>@endif
                        </td>
                        <td>{{ $inspection->closing_date }} @if($inspection->approvedBy_hygiene ==0) <button data-id="{{ $inspection->id }}" data-closing_date="{{ $inspection->closing_date }}" class="btn btn-default btn-sm editClosingDate" style="border-radius: 50%" data-toggle='modal' data-target='#editClosingDateModal'><i class="fa fa-pencil"></i></button>@endif   </td>
                        <td>
                            @if($inspection->approvedBy_hygiene==1)
                                <button class="btn btn-outline-success disabled btn-sm" title="Submitted"><i style="color:green" class="fa fa-check-circle" aria-hidden="true"></i> <span style="color:green"></span> Submitted</button>                       
                            @else
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <a href="{{ route('inspection.approve', $inspection->id) }}" class="btn btn-primary btn-sm pull-left" title="Submit"><i class="fa fa-check" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <a href="{{ route('inspection.delete', $inspection->id) }}" class="btn btn-danger btn-sm btn-sm" title="Delete"><i class="fa fa-trash"></i></a>      
                                </div>
                            </div>
                            @endif    
                        </td>
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
@include('modals.addInspection')
@include('modals.editLocation')
@include('modals.editDate')
@include('modals.editFindings')
@include('modals.editPca')
@include('modals.editAccountability')
@include('modals.editStatus')
@include('modals.editClosingDate')
@include('modals.showImageModal')

@endsection

@push('scripts')


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
</script>
<script>
    @if (count($errors) > 0)
        $('#addlocationModal').modal('show');
    @endif
</script>

<script>
    function fire(data){
        $('#imageFileShow').html(`<img class="img-thumbnail" src=`+data.src+`>`);
    }
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

    $('.img-thumbnail').click(function (event) {
        event.preventDefault()
        debugger
        var id = $(this).data("id")

        $.ajax({
            url: 'inspection/'+id+'/showImage',
            type: "GET",
            success: function (data) {
                debugger
                alert(data.message)
                location.reload();
            }
    });
});
</script>
@endpush
