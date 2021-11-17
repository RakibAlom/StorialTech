@php
    $setting = App\Models\Admin\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>');
@endphp

@extends('layouts.app')
@section('title', 'Contact | ' . $setting->title)
@section('meta-title', 'Contact | ' . $setting->title)
@section('og-title', 'Contact | ' . $setting->title)
@section('twitter-title', 'Contact | ' . $setting->title)

@section('aside')
    @include('layouts.aside')
@endsection
{{-- @section('loader')
    @include('layouts.loader')
@endsection --}}
@section('content')
<main class="bg-grey pb-30">
    <div class="entry-header entry-header-style-2 pb-80 pt-80 mb-50 text-white" style="background-image: url({{ asset('public/frontend/img/storialtech-contact.jpg') }})">
        <div class="container entry-header-content">
            <h1 class="entry-title mb-50 font-weight-900">
                Get in Touch
            </h1>
        </div>
    </div>
    <div class="container single-content">
        <div class="entry-wraper mt-50">
            @if(session('success'))
                <h4 class="alert alert-success">
                    {{ session('success') }}
                </h4>
            @endif

            <p class="font-large">
                {{ $setting->description }}
            </p>
            <hr class="wp-block-separator is-style-wide">
            <p><span class="mr-5">
                    <ion-icon name="location-outline" role="img" class="md hydrated" aria-label="location outline"></ion-icon>
                </span><strong>Address</strong>: {{ $setting->address }}</p>
            <p><span class="mr-5">
                    <ion-icon name="home-outline" role="img" class="md hydrated" aria-label="home outline"></ion-icon>
                </span><strong>Our website</strong>: <a href="{{ route('site') }}">{{ route('site') }}</a></p>
            <p><span class="mr-5">
                    <ion-icon name="planet-outline" role="img" class="md hydrated" aria-label="planet outline"></ion-icon>
                </span><strong>Support center</strong>: <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></p>

            <h1 class="mt-30">Get in touch</h1>
            <hr class="wp-block-separator is-style-wide">
            <form class="form-contact comment_form" action="{{ route('store.contact') }}" id="commentForm" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control" name="name" id="name" type="text" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control" name="phone" id="phone" type="text" placeholder="Phone" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" name="email" id="email" type="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control w-100" type="text" name="message" cols="30" rows="9" placeholder="Message" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="button button-contactForm">Send Message</button>
                </div>
            </form>
        </div>
    </div>
    <!--container-->
</main>
@endsection
