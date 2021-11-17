@php
    $setting = App\Models\Admin\Setting::first();
@endphp

@extends('layouts.app')
@section('title', 'Register | ' . $setting->title)
@section('aside')
    @include('layouts.aside')
@endsection

@section('content')
<!-- Start Main content -->
<main class="bg-grey pt-50 pb-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap widget-taber-content p-30 bg-white border-radius-10">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1 text-center">
                            <h3 class="mb-30 font-weight-900">Create an account</h3>
                        </div>
                        <form method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" required="" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username (unique)">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" required="" class="form-control @error('fullname') is-invalid @enderror" name="fullname" placeholder="Full Name">
                                        @error('fullname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" required="" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" required="" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone Number (optional)">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-9 col-8">
                                    <div class="form-group">
                                        <input type="date" required="" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" placeholder="Date of Birth">
                                        @error('birthdate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-4">
                                    <div class="form-group">
                                        <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <input class="form-control @error('password') is-invalid @enderror" required="" type="password" name="password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control" required="" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="terms_policy" required>
                                        <label class="form-check-label" for="terms_policy"><span>I agree to Terms &amp; Policy.</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button button-contactForm btn-block">Submit &amp; Register</button>
                            </div>
                        </form>
                        <div class="divider-text-center mt-15 mb-15">
                            <span> or</span>
                        </div>
                        {{-- <ul class="btn-login list_none text-center mb-15">
                            <li><a href="#" class="btn btn-facebook"><i class="elegant-icon social_facebook  mr-5"></i>Facebook</a></li>
                            <li><a href="#" class="btn btn-google"><i class="elegant-icon social_googleplus mr-5"></i>Google</a></li>
                        </ul> --}}
                        <div class="text-muted text-center">Already have an account? <a href="{{ route('login') }}">Login now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- End Main content -->
@endsection
