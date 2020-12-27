@extends('layouts.master')
@section('title','Senior Operation Manager  | Users')
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
            <strong class="card-title">Users</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Picture</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $key=>$user)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $user->name }} </td>
                        <td>{{ $user->email }} </td>
                        <td>{{ $user->role->name }} </td>
                        <td><img src="{{ asset('images/avatar/1.jpg') }}" class="img-thumbnail" height="200px" height="200px" ></td>
                        <td>
                            @if($user->approved==0)
                                <button class="btn btn-warning btn-sm"> Not Approved</a>
                            @else
                                <button class="btn btn-success btn-sm" >Approved</button>
                            @endif
                        </td>  
                        <td>
                            <button type='button' class='btn btn-primary btn-sm mb-1 pull-right' data-toggle='modal' data-target='#changeUserRoleModal'><i class="fa fa-pencil"></i> Change Role</button>
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

@endsection
@push('scripts')
@include('modals.changeUserRoleModel')
@endpush