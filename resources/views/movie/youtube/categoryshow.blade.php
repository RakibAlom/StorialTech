@php
    $setting = App\Models\Admin\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>');
@endphp

@section('title', $category->name . ' | YouTube Movie World | StorialTech')
@section('meta-title', $category->name . ' | YouTube Movie World | StorialTech')
@section('meta-description', $setting->description)
@section('meta-keywords', 'website theme, web movie, ecommer theme movie, free html movie, wordpress movie, wordpress plugin, wordpress theme, react movie, vue movie, angular movie, shopify movie, free premium movie, free premium theme, magazine theme, newspaper theme, creative theme')
@section('og-title', $category->name . ' | YouTube Movie World | StorialTech')
@section('twitter-title', $category->name . ' | YouTube Movie World | StorialTech')
@section('meta-image', asset('public/frontend/img/movie-thumbnail.jpg'))
@section('og-image', asset('public/frontend/img/movie-thumbnail.jpg'))
@section('twitter-image', asset('public/frontend/img/movie-thumbnail.jpg'))

@extends('layouts.app')

@section('aside')
    @include('movie.youtube.aside')
@endsection

@section('content')
 <!-- Start Main content -->
 <main class="bg-grey">
    <!--archive header-->
    <div class="container">
        <div class="loop-grid mb-30">
            @csrf
            <div class="hot-tags pb-10 pt-20 font-small align-self-center">
                <div class="widget-header-3">
                    <div class="row align-self-center">
                        <div class="col-md-4 align-self-center">
                            <h5 class="widget-title">{{ $category->name }}</h5>
                        </div>
                    </div>
                </div>
                @if($movies->count()  == 0)
                    <h5 class="text-center mt-20">No Movie Founded</h5>
                @endif
            </div>
            <div class="row">

            @foreach ($movies as $item)
                <article class="col-lg-3 col-md-4 mb-20">
                    <div class="post-card-1 hover-up">
                        <div class="thumb-overlay-youtube-movie img-hover-slide position-relative">
                            <iframe src="{{ $item->elink }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width: 100%; height:180px;"></iframe>
                        </div>
                        <div class="post-content pr-20 pl-20 pt-10 pb-10">
                            <div class="entry-meta meta-0 font-small mb-10">
                            @foreach($item->categoryytmovie->take(3) as $category)
                                <a href="{{ $category->ytpath() }}" rel="nofollow"><span class="post-cat text-success">{{ Str::words($category->name, 1,'') }}</span></a>
                            @endforeach
                            </div>
                            <div class="d-flex post-card-content-movie">
                                <h5 class="post-title font-weight-900" style="font-size: 1rem !important;">
                                    <a href="{{ $item->path() }}" rel="nofollow">{{ Str::words($item->name, 7)}}</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
            </div>

            <div class="row mt-20">
                <div class="col-12">
                    <div class="pagination-area mb-30" style="visibility: visible; animation-name: fadeInUp;">
                        <nav aria-label="Page navigation example">

                            {{ $movies->links('vendor.pagination.custom') }}

                        </nav>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
<!-- End Main content -->
@endsection

@section('js')

@endsection





