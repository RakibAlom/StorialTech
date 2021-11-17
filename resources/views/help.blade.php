@php
    $setting = App\Models\Admin\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>');
@endphp

@extends('layouts.app')
@section('title', 'Help | ' . $setting->title)
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
            @if($help)
                {!! $help->helps !!}
            @endif
            </div>
        </div>
        <!--container-->
    </main>
@endsection
