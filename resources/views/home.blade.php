@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ Session::get('message') }}</li>
                </ul>
            </div>
        @endif
        <div class="col-md-6">
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card mt-3 ml-3">
                <div class="card-header">
                    <div class="card-title">{{ __('Your Profile') }}</div> 
                </div>
                <div class="card-body mt-3 mb-3">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                            <h4>{{ $signedInUser->name }}</h4>
                            <p class="text-secondary mb-1"><span>Role: </span>{{ $signedInUser->role->name }}</p>
                            <p class="text-muted font-size-sm"><span>Email: </span>{{ $signedInUser->email }}</p>
                            @if($signedInUser->suspended=='suspended')
                                <button class="btn btn-danger">Suspended</button>
                            @elseif($signedInUser->approved=='0')
                                <button class="btn btn-warning">Not Approved</button>
                            @endif
                            
                        </div>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>
@endsection
