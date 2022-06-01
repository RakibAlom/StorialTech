@php
    $setting = App\Models\Admin\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>');
@endphp

@extends('layouts.app')
@section('title', 'About | ' . $setting->title)
@section('meta-title', 'About | ' . $setting->title)
@section('og-title', 'About | ' . $setting->title)
@section('twitter-title', 'About | ' . $setting->title)

@section('aside')
    @include('layouts.aside')
@endsection
{{-- @section('loader')
    @include('layouts.loader')
@endsection --}}
@section('content')
<!-- Start Main content -->
    <main class="bg-grey pb-30">
        <!--archive header-->
        <div class="entry-header entry-header-style-1 mb-30 pt-50 text-center">
            <h1 class="entry-title mb-20 font-weight-900">
                About StorialTech
            </h1>
            <p class="text-muted"><span class="typewrite d-inline" data-period="2000" data-type='[ "Learn From Tutorial. ", "Read Story. ", "Download Premium Template. ", "Donwload PDF Book. ", "Download Premium Source. " ]'></span></p>
        </div>
        <div class="container single-content">
            <div class="entry-header entry-header-style-1 mb-50 pt-30">
            @if($about)
                {!! $about->about !!}
            @endif

            <figure class="image mb-30 m-auto text-center border-radius-10">
            @if($about->image)
                <img class="border-radius-10" src="{{ asset('storage/app/public/'.$about->image) }}" alt="StorialTech" />
            @endif
        </figure>
            </div>
        </div>
        <!--container-->
    </main>
@endsection
