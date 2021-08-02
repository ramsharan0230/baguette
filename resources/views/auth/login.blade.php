@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="bg-video-wrap">
        {{-- <video src="https://designsupply-web.com/samplecontent/vender/codepen/20181014.mp4" loop muted autoplay> --}}
        {{-- </video> --}}
        <video src="{{ asset('images/video-back1.mp4') }}"  loop muted autoplay></video>
        <div class="overlay">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                </div>
                <div class="col-md-2 col-lg-2"></div>
        
                <div class="col-sm-12 col-md-4 col-lg-4 mt-1 mr-1">
                    <div class="card" style="min-height: 300px">
                        <div class="card-header" style="color:green">{{ __('Aa24Inspect Login') }}</div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                    
                                    <div class="form-group row mb-4">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                    
                                    <div class="form-group row mb-4">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                    
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                    
                                    <div class="form-group row mb-4">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                    
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <video src="{{ asset('images/video-background.mp4') }}"  loop muted autoplay></video> --}}

    
</div>

@endsection
