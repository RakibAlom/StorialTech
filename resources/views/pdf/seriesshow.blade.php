@php
    $setting = App\Models\Admin\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>');
@endphp

@section('title', $series->name . ' | Bangla PDF Books Download | StorialTech')
@section('meta-title', $series->name . ' | Bangla PDF Books Download | StorialTech')
@section('meta-keywords', 'pdf, bangla pdf, ebook download, western bangla pdf, pdf download, bengali free pdf download, onubad book free download, free ebook download, story book pdf download, pdf books world, free pdf books bestsellers, google drive pdf books, google drive pdf books, pdf books library')
@section('og-title', $series->name . ' | Bangla PDF Books Download | StorialTech')
@section('twitter-title', $series->name . ' | Bangla PDF Books Download | StorialTech')
@section('meta-image', asset('public/frontend/img/pdf-thumbnail.jpg'))
@section('og-image', asset('public/frontend/img/pdf-thumbnail.jpg'))
@section('twitter-image', asset('public/frontend/img/pdf-thumbnail.jpg'))
@section('meta-description', "StorialTech is the largest library of eBooks. You can download bangla, onubad, and various types of pdf. So let's visit and download your favorite book.")
@section('og-description', "StorialTech is the largest library of eBooks. You can download bangla, onubad, and various types of pdf. So let's visit and download your favorite book.")
@section('twitter-description', "StorialTech is the largest library of eBooks. You can download bangla, onubad, and various types of pdf. So let's visit and download your favorite book.")

@extends('layouts.app')

@section('aside')
    @include('pdf.aside')
@endsection

@section('content')
 <!-- Start Main content -->
 <main class="bg-grey">
   <!--archive header-->
    <div class="archive-header pt-10 text-center">
        <div class="container">
            <h1 style="display:none;">{{  $series->name }} Bangla PDF Book Download</h1>
            @include('include.googledisplayads')
        </div>
    </div>
    <div class="container pt-20">
        <div class="loop-grid mb-30">
            <div class="hot-tags pb-10 font-small align-self-center">
                <div class="widget-header-3">
                    <div class="row align-self-center">
                        <div class="col-md-4 align-self-center">
                            <h5 class="widget-title">{{ $series->name }}</h5>
                        </div>
                    </div>
                </div>
                @if($pdfs->count()  == 0)
                    <h5 class="text-center mt-20">No PDF Founded</h5>
                @endif
            </div>

            <ul class="list-post">
                <div class="row">
                    @foreach ($pdfs as $item)
                    <div class="col-lg-2 col-md-3 col-6 mb-10">
                        <li class="p-3 bg-white border-radius-10" style="min-height: 190px;">
                            <div class="hover-up-2 transition-normal">
                                <div class="post-thumb pdf-thumb-100 img-hover-scale overflow-hidden">
                                    <a class="color-white" href="{{ $item->path() }}">
                                        <img src="{{ asset('storage/app/public/'.$item->image) }}" alt="{{ $item->name }}">
                                    </a>
                                </div>
                                <div class="post-content media-body">
                                    <h6 class="post-title mb-10 mt-10 text-limit-2-row font-medium"><a href="{{ $item->path() }}">{{ Str::words($item->name, 5) }}</a></h6>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on">size: {{ $item->size }}</span>
                                        <span class="post-by">{{ $item->views }} views</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                    @endforeach
                </div>
            </ul>

            <div class="row mt-20">
                <div class="col-12">
                    <div class="pagination-area mb-30" style="visibility: visible; animation-name: fadeInUp;">
                        <nav aria-label="Page navigation example">

                            {{ $pdfs->links('vendor.pagination.custom') }}

                        </nav>
                    </div>
                </div>
            </div>
            
            @include('include.googledisplayads')

        </div>
    </div>
</main>
<!-- End Main content -->
@endsection

@section('js')

@endsection





