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
                        <td>
                            <a href="{{ route('sropmanager.user.changeStatus', $user->id) }}" class="btn btn-sm btn-{{ $user->approved ==0?'success':'primary' }}" >{{ $user->approved ==0?" Not Approved":" Approved" }}  </a>
                            @if($user->suspended =='suspended')
                                <button class="btn btn-danger btn-sm">Suspended</button>
                            @elseif($user->suspended =='unsuspend')
                                <button class="btn btn-warning btn-sm">UnSuspended</button>
                            @endif
                        </td>  
                        <td>
                            <button type='button' class='btn btn-primary btn-sm mb-1 pull-right changeRole' data-toggle='modal' data-user_id="{{ $user->id }}" data-role_id="{{ $user->role->id }}" data-target='#changeUserRoleModal'><i class="fa fa-pencil"></i> Change Role</button>
                            @if($user->suspended =='normal' || $user->suspended =='unsuspend')
                            <a href="{{ route('sropmanager.user.suspend', $user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-times"></i> Suspend</a>
                            @elseif($user->suspended =='suspended')
                            <a href="{{ route('sropmanager.user.unsuspend', $user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-times"></i> UnSuspend</a>
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
@include('modals.changeUserRoleModel')

@endsection
@push('scripts')
<script>
    $('.changeRole').click(function() {
        var id = $('#editRoleId').val($(this).data("role_id"));
        var user_id = $('#userId').val($(this).data("user_id"));
    });

    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $(".btnApprove").click(function(e){
            e.preventDefault()
            var user_id = $(this).data("user_id");
            $.ajax({
                url: 'user/'+user_id+'/changeStatus',
                type: "GET",
                success: function (data) {
                    if(data.status==200)
                        window.location.reload(true);
                }
            })
        });
    });

    // $('.chageStatus').click(function(e) {
    //     e.preventDefault()
    //     var user_id = $(this).data("user_id");
    //     debugger
    //     $.ajax({
    //         url: 'sropmanager/user/'+user_id+'/changeStatus',
    //         type: "POST",
    //         data: {
    //             user_id: user_id,
    //         },
    //         dataType: 'json',
    //         success: function (data) {
    //             debugger
    //             // $('#companydata').trigger("reset");
    //             // $('#practice_modal').modal('hide');
    //             // window.location.reload(true);
    //         }
    //     })
    // });
</script>
@endpush
