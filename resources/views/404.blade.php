@php
    $setting = App\Models\Admin\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>');
@endphp

@extends('layouts.app')
@section('title', '404 Not Found | ' . $setting->title)
@section('aside')
    @include('layouts.aside')
@endsection
{{-- @section('loader')
    @include('layouts.loader')
@endsection --}}
@section('content')
<!-- Start Main content -->
<main class="bg-grey pt-80 pb-50">
    <div class="container">
         <div class="row pt-80">
             <div class="col-lg-6 col-md-12 d-lg-block d-none pr-50"><img src="{{ asset('storage/app/public/'.$setting->cover_image) }}" alt="{{ $setting->title }}"></div>
             <div class="col-lg-6 col-md-12 pl-50 text-md-center text-lg-left">
                 <h1 class="mb-30 font-weight-900 page-404">404</h1>
                 <form action="#" method="get" class="search-form d-lg-flex open-search mb-30">
                     <i class="icon-search"></i>
                     <input class="form-control" name="name" id="name" type="text" placeholder="Search...">
                 </form>
                 <p class="">The link you clicked may be broken or the page may have been removed.<br> visit the <a href="{{ route('site') }}">Homepage</a> or <a href="{{ route('contact') }}">Contact us</a> about the problem
                 </p>
                 <div class="form-group">
                     <button type="submit" class="button button-contactForm mt-30"><a class="text-white" href="{{ route('site') }}">Home page</a></button>
                 </div>
             </div>
         </div>
     </div>
 </main>
 <!-- End Main content -->
@endsection
