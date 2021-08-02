@extends('layouts.master')
@section('title','Site Manager  | Dashboard')
@push('stylesheets')
<style>
    #results { float:right; margin:20px; padding:20px; border:1px solid; background:#ccc; }
    .modal-lg {
        max-width: 80% !important;
    }
</style>
@endpush
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header" style="background: #4CAFE0 !important; color:#fff">
            <strong class="card-title">Inspections</strong>
            <strong class="card-title pull-right"> {{ Auth::user()->name }} ({{ Auth::user()->role->name }}) </strong>
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
                        <th>Closing Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($inspections as $key=>$inspection)
                    <tr>
                        <td>{{ $key+1 }} <br> @if($inspection->approvedBy_siteman==1)<i style="color:green" class="fa fa-check" aria-hidden="true"></i>@else <i style="color:red" class="fa fa-times" aria-hidden="true"></i> @endif</td>
                        <td>{{ $inspection->location }} </td>
                        <td>{{ $inspection->start_date }} </td>
                        <td>{{ $inspection->findings }} </td>
                        <td>
                            <div class="row">
                                @foreach($inspection->pictures as $item)
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <img style="cursor:pointer" src="{{ asset('images/inspection_files').'/'.$item->name }}" data-toggle='modal' 
                                            data-picture="{{ $item->name }}" data-target='#showImageModal' onclick="fire(this)" class="img-thumbnail">
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        <td>{{ $inspection->pca }} </td>
                        <td>{{ $inspection->accountibility }} </td>
                        <td>{{ $inspection->closing_date }} </td>
                        <td>
                            @if($inspection->approvedBy_siteman==0)
                                <button class="btn btn-warning btn-sm"> Not Approved</a>
                            @else
                                <button class="btn btn-primary btn-sm" >Approved</button>
                            @endif
                        </td>  
                        <td>
                            @if($inspection->approvedBy_siteman ==0)
                            <a href="{{ route('inspection.approved_by_siteman', $inspection->id) }}" class="btn btn-sm btn-success"> Approve</button></a>
                            <button data-id="{{ $inspection->id }}" class="btn btn-sm btn-danger unApprove" data-toggle='modal' data-target='#unapproveSitemanModal'> Unapprove</button>
                            @else
                            <button data-id="{{ $inspection->id }}" class="btn btn-sm btn-danger unApprove" data-toggle='modal' data-target='#unapproveSitemanModal'> Unapprove</button>
                            @endif
                            <button data-id="{{ $inspection->id }}" class="btn btn-primary btn-sm review" data-toggle='modal' data-target='#showReviewModel' title="View Reviews"><i class="fa fa-eye"></i></button>
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
@include('modals.unapproveSitemanModal')
@include('modals.showReviewModel')
@include('modals.showImageModal')
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/reviewSiteman.js') }}"></script>
<script>
    $('.unApprove').click(function(){
        var id = $(this).data("id")
        var eidt = $('.editId').val(id);
    })
    function fire(data){
        $('#imageFileShow').html(`<img class="img-thumbnail" src=`+data.src+`>`);
    }
</script>
<script>
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
        }
    });
});
</script>
@endpush
