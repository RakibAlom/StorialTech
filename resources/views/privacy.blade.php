@php
    $setting = App\Models\Admin\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<h5>','</h5>','<em>','</em>','<strong>','</strong>','<span>','</span>');
@endphp

@extends('layouts.app')
@section('title', 'Privacy Policy | ' . $setting->title)
@section('meta-title', 'Privacy Policy | ' . $setting->title)
@section('og-title', 'Privacy Policy | ' . $setting->title)
@section('twitter-title', 'Privacy Policy | ' . $setting->title)

@section('aside')
    @include('layouts.aside')
@endsection
{{-- @section('loader')
    @include('layouts.loader')
@endsection --}}
@section('content')
<!-- Start Main content -->
    <main class="bg-grey pb-30">
        <div class="container single-content">
            <div class="entry-header entry-header-style-1 mb-50 pt-50">
            @if($privacy)
                {!! $privacy->privacy !!}
            @endif
            </div>
        </div>
        <!--container-->
    </main>
@endsection
