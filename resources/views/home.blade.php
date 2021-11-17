@php
    $setting = App\Models\Admin\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>');
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
    
    @include('include.homeblog')
    
    @include('include.hometutorial')
    
    @include('include.hometemplate')
    
    @include('include.homepdf')
    
    @include('include.homestory')

    <!--@include('include.homemovie')-->

    @include('include.homesource')

</main>
@endsection
