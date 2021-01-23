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
                    <div class="card-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h5 class="card-title pull-left">{{ __('Your Profile') }}</h5>
                            </div>
                            <div class="col-sm-4">
                                <div class="pull-right"> 
                                    @if(Auth::user()->role->slug == 'hygiene') 
                                    <a href="{{ route('hygiene') }}" class="btn btn-success btn-sm home_button">Go to Home</a>
                                    @elseif(Auth::user()->role->slug == 'sitemanager')
                                    <a href="{{ route('sitemanager') }}" class="btn btn-success btn-sm home_button">Go to Home</a>
                                    @elseif(Auth::user()->role->slug == 'OpManager')
                                    <a href="{{ route('opmanager') }}" class="btn btn-success btn-sm home_button">Go to Home</a>
                                    @elseif(Auth::user()->role->slug == 'SrOpManager')
                                    <a href="{{ route('sropmanager') }}" class="btn btn-success btn-sm home_button">Go to Home</a>
                                    @elseif(Auth::user()->role->slug == 'user')
                                    <a href="{{ route('home') }}" class="btn btn-success btn-sm home_button">Go to Home</a>
                                    @endif
                                </div> 
                            </div>
                        </div>
                    </div> 
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
