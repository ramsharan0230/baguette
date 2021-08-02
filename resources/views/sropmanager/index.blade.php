@extends('layouts.master')
@section('title','Senior Operation Manager | Dashboard')
@push('stylesheets')

@endpush
@section('content')
<div class="col-md-12">
    <div class="card">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block mr-1 ml-1">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
        @endif
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
                        <td>{{ $key+1 }}</td>
                        <td>{{ $inspection->location }} </td>
                        <td>{{ $inspection->start_date }} </td>
                        <td>{{ $inspection->findings }} </td>
                        <td><img src="{{ asset('images/inspection_files').'/'.$inspection->picture }}" class="img-thumbnail" height="200px" height="200px" ></td>
                        <td>{{ $inspection->pca }} </td>
                        <td>{{ $inspection->accountibility }} </td>
                        <td>{{ $inspection->closing_date }} </td>
                        <td>
                            @if($inspection->approvedBy_opman==0)
                                <button class="btn btn-warning btn-sm"> Not Approved</a>
                            @else
                                <button class="btn btn-primary btn-sm" >Approved</button>
                            @endif
                        </td>  
                        <td>
                            @if($inspection->approvedBy_opman ==0)
                            <a href="{{ route('inspection.approvedByOpManager', $inspection->id) }}" class="btn btn-sm btn-success"> Approve</button>
                            @else
                            <button data-id="{{ $inspection->id }}" class="btn btn-sm btn-danger unApprove" data-toggle='modal' data-target='#unApproveOpManModal'> Unapprove</button>
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
@include('modals.unApproveOpManModal')
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous">
</script>
<script>
    $('.unApprove').click(function(){
        var id = $(this).data("id")
        $('#editId').val(id);
    })
    
</script>
@endpush
