@extends('auth.main')

@section('content')

<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> --}}
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}

        <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="#"> <h4>Login Admin</h4></a><br>
                                <center>
                                    <img src="{{asset('frontend/images/logo_ppid.png')}}" alt="Constra" style=" height:90px">
                                </center>
                                <form class="mt-5 mb-5 login-input" method="POST" action="{{ route('login') }}">
                                @csrf
                                    <div class="form-group">
                                        <input type="email"  placeholder="Email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                        required autocomplete="email" autofocus>
                                            @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        <span class="form-bar"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="Password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                        <span class="form-bar"></span>
                                    </div>
                                    <button class="btn login-form__btn submit w-100">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="row mb-0">
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
                        </div> --}}
{{-- @endsection --}}
