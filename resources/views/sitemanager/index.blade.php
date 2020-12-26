@extends('layouts.master')
@section('title','Hygiene  | Dashboard')
@push('stylesheets')
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
                        <th>Closing Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($inspections as $key=>$inspection)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $inspection->location }} </td>
                        <td>{{ $inspection->start_date }} </td>
                        <td>{{ $inspection->findings }} </td>
                        <td><img src="{{ asset('images/inspection_files').'/'.$inspection->picture }}" class="img-thumbnail" height="200px" height="200px" ></td>
                        <td>{{ $inspection->pca }} </td>
                        <td>{{ $inspection->accountibility }} </td>
                        <td>{{ $inspection->closing_date }} </td>
                        <td>
                            @if($inspection->sitemanager->inspection)
                                <button class="btn btn-primary btn-sm approveSiteManBtn" >Approve</button>
                            @else
                                <button class="btn btn-primary btn-sm approveSiteManBtn" >Approved</button>
                            @endif
                        </td>   
                    </tr>
                    @empty
                        <tr><td colspan="9">No Data Found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>  

@endsection
@push('scripts')

<script src="text/javascript">
$(document).ready(function () {
    $(".approveSiteManBtn").click(function(e){
        e.preventDefault();
        var id = $(this).data("id")
        debugger
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
});
</script>
@endpush
