@php
    $setting = App\Models\Admin\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>');
@endphp

@extends('layouts.app')
@section('title', 'Frequently Asked Questions | ' . $setting->title)
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
            <h1 class="entry-title mb-20 font-weight-900 ">
                Frequently Asked Question
            </h1>
        </div>
        <div class="container single-content">
            <div class="entry-header entry-header-style-1 mb-50 pt-30">
            @foreach($faqs as $item)
                <div class="faq-single-question mb-30">
                    <h5 class="font-weight-bold"><i class="fa fa-question-circle"></i> {{ $item->question }}</h5>
                    <span class="ml-5"><i class="fa fa-arrow-right"></i> {{ $item->answer }}</span>
                </div>
            @endforeach
            </div>
        </div>
        <!--container-->
    </main>
@endsection
