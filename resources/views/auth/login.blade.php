@php
    $setting = App\Models\Admin\Setting::first();
@endphp

@extends('layouts.app')
@section('title', 'Login | ' . $setting->title)
@section('aside')
    @include('layouts.aside')
@endsection

@section('content')
<!-- Start Main content -->
<main class="bg-grey pt-80 pb-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap widget-taber-content p-30 bg-white border-radius-10">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1 text-center">
                            <h3 class="mb-30 font-weight-900">Login</h3>
                        </div>
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input id="username" type="text" class="form-control {{ $errors->has('username') || $errors->has('email') ? 'is-invalid' : '' }}" name="login" value="{{ old('username') ?: old('email') }}" name="login" required autocomplete="login" autofocus placeholder="Username/Email Address">
                                @if($errors->has('username') || $errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @if($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>
                                        <label class="form-check-label" for="remember"><span>Remember me</span></label>
                                    </div>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button button-contactForm btn-block">Log in</button>
                            </div>
                        </form>
                        <div class="divider-text-center mt-15 mb-15">
                            <span> or</span>
                        </div>
                        {{-- <ul class="btn-login list_none text-center mb-15">
                            <li><a href="#" class="btn btn-facebook"><i class="elegant-icon social_facebook  mr-5"></i>Facebook</a></li>
                            <li><a href="#" class="btn btn-google"><i class="elegant-icon social_googleplus mr-5"></i>Google</a></li>
                        </ul> --}}
                        <div class="text-muted text-center">Don't Have an Account? <a href="{{ route('register') }}">Sign up now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- End Main content -->
@endsection
