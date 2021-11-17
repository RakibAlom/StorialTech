@extends('admin.auth.layout')
@section('title', 'Register | StorialTech | Dashboard')
@section('content')

<h1 class="">Register</h1>
<p class="signup-link register">Already have an account? <a href="{{ route('admin.login') }}">Log in</a></p>

<form class="text-left" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form">

        <div id="username-field" class="field-wrapper input">
            <label for="username">USERNAME</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Username" required>
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div id="username-field" class="field-wrapper input">
            <label for="fullname">FULLNAME</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <input id="fullname" name="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" value="{{ old('fullname') }}" required placeholder="Full Name">
            @error('fullname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div id="username-field" class="field-wrapper input">
            <label for="phone">PHONE</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <input id="phone" name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Phone Number">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div id="username-field" class="field-wrapper input">
            <label for="birthdate">DATE OF BIRTH</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <input id="birthdate" name="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror">
            @error('birthdate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div id="username-field" class="field-wrapper input">
            <label for="birthdate">GENDER</label>
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

        <div id="email-field" class="field-wrapper input">
            <label for="email">EMAIL</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
            <input id="email" name="email" type="text" value="" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div id="password-field" class="field-wrapper input mb-2">
            <div class="d-flex justify-content-between">
                <label for="password">PASSWORD</label>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div id="password-field" class="field-wrapper input mb-2">
            <div class="d-flex justify-content-between">
                <label for="password-confirm">CONFIRM PASSWORD</label>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
        </div>

        <div class="field-wrapper terms_condition">
            <div class="n-chk">
                <label class="new-control new-checkbox checkbox-primary">
                  <input type="checkbox" class="new-control-input" required>
                  <span class="new-control-indicator"></span><span>I agree to the <a href="javascript:void(0);">  terms and conditions </a></span>
                </label>
            </div>

        </div>

        <div class="d-sm-flex justify-content-between">
            <div class="field-wrapper">
                <button type="submit" class="btn btn-primary" value="">Get Started!</button>
            </div>
        </div>

        <div class="division">
            <span>OR</span>
        </div>

        <div class="social">
            <a href="javascript:void(0);" class="btn social-fb">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                <span class="brand-name">Facebook</span>
            </a>
           <a href="javascript:void(0);" class="btn social-github">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                <span class="brand-name">Github</span>
            </a>
        </div>

    </div>
</form>

@endsection
