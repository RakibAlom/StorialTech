@php
    $setting = App\Models\Admin\Setting::first();
    $platform = App\Models\Custom\PlatformControl::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<h5>','</h5>','<em>','</em>','<strong>','</strong>','<span>','</span>');

@endphp

@section('canonical')
<link href="{{ url('/') }}" rel="canonical"/>
@endsection

@section('title',  $setting->title)
@section('meta-title',  $setting->title)
@section('meta-description', $setting->description)
@section('meta-keywords', $setting->keywords)
@section('og-title', $setting->title)
@section('og-description', $setting->description)
@section('twitter-title',  $setting->title)
@section('twitter-description', $setting->description)
@section('meta-image', asset('storage/app/public/'.$setting->cover_image))
@section('og-image', asset('storage/app/public/'.$setting->cover_image))
@section('twitter-image', asset('storage/app/public/'.$setting->cover_image))

@extends('layouts.app')

@section('aside')
    @include('layouts.aside')
@endsection

{{-- @section('loader')
    @include('layouts.loader')
@endsection --}}

@section('content')
<main>
    <h1 style="display:none;">{{ $setting->title }}</h1>

@if($platform->blog_status == 1)
    @include('include.homeblog')
@endif

@if($platform->tutorial_status == 1)
    @include('include.hometutorial')
@endif

{{-- @if($platform->template_status == 1)
    @include('include.hometemplate')
@endif --}}

{{-- @if($platform->pdf_status == 1)
    @include('include.homepdf')
@endif --}}

{{-- @if($platform->story_status == 1)
    @include('include.homestory')
@endif --}}

{{-- @if($platform->movie_status == 1)
    @include('include.homemovie')
@endif --}}

{{-- @if($platform->source_status == 1)
    @include('include.homesource')
@endif --}}

</main>
@endsection
