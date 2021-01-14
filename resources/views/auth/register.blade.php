@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-lg-6">
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card mt-3 ml-3">
                <div class="card-header">{{ __('Register') }}</div>
    
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
    
                        <div class="form-group mb-4">
                            <label for="name" class="col-md-2 col-sm-2 col-lg-2 control-label text-md-right" style="margin-left: 10% !important;">{{ __('Name') }}</label>
                            <div class="col-md-8 col-sm-8 col-lg-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group mb-4">
                            <label for="email" class="col-sm-2 col-form-label text-md-right" style="margin-left: 10% !important;">{{ __('E-Mail Address') }}</label>
    
                            <div class="col-sm-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group mb-4">
                            <label for="password" class="col-sm-2 col-form-label text-md-right" style="margin-left: 10% !important;">{{ __('Password') }}</label>
    
                            <div class="col-sm-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group mb-4">
                            <label for="password-confirm" class="col-sm-2 col-form-label text-md-right" style="margin-left: 10% !important;">{{ __('Confirm Password') }}</label>
    
                            <div class="col-sm-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
    
                        <div class="form-group mb-4">
                            <div class="col-sm-2 offset-md-2" style="margin-left: 27% !important;">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
