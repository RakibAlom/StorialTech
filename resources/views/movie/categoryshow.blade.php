@php
    $setting = App\Models\Admin\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>');
@endphp

@section('title', $category->name . ' | Movie Download World | StorialTech')
@section('meta-title', $category->name . ' | Movie Download World | StorialTech')
@section('meta-description', 'You can download free movies from StorialTech. Free movie downloads like hollywood, hindi, adventure, mystery, horror, comedy, and others movie.')
@section('og-description', 'You can download free movies from StorialTech. Free movie downloads like hollywood, hindi, adventure, mystery, horror, comedy, and others movie.')
@section('twitter-description', 'You can download free movies from StorialTech. Free movie downloads like hollywood, hindi, adventure, mystery, horror, comedy, and others movie.')
@section('meta-keywords', 'movie, movie download, dowload movie, hindi movie, hindi dubbed move, comedy movie, bollywood movie, hollywood movie, bangla subtitle movie, korean movie, chinese movie, free movie download, south indian movie, movie series, series, drama series, dc movie, marvel movie')
@section('og-title', $category->name . ' | Movie Download World | StorialTech')
@section('twitter-title', $category->name . ' | Movie Download World | StorialTech')
@section('meta-image', asset('public/frontend/img/movie-thumbnail.jpg'))
@section('og-image', asset('public/frontend/img/movie-thumbnail.jpg'))
@section('twitter-image', asset('public/frontend/img/movie-thumbnail.jpg'))

@extends('layouts.app')

@section('aside')
    @include('movie.aside')
@endsection

@section('content')
 <!-- Start Main content -->
 <main class="bg-grey">
    <!--archive header-->
    <div class="archive-header pt-10 text-center">
        <div class="container">
            <h1 style="display:none;">{{ $category->name }} Movie Free Download in HD</h1>
        </div>
    </div>
    <div class="container pt-20">
        <div class="loop-grid mb-30">
            @csrf
            <div class="hot-tags pb-10 font-small align-self-center">
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
                        <div class="post-thumb thumb-overlay-movie img-hover-slide position-relative" @if($item->thumbnail) style="background-image: url({{ asset('storage/app/public/'. $item->thumbnail) }})" @else style="background-image: url({{ asset('storage/app/public/'.$setting->cover_image) }})" @endif>
                            <a class="img-link" href="{{ $item->path() }}" rel="nofollow"></a>
                            <ul class="social-share">
                                <li><a href="javascript:void(0)"><i class="elegant-icon social_share"></i></a></li>
                                <li><a class="fb" href="{{ $item->fb() }}" target="popup" onclick="window.open('{{ $item->fb() }}','popup','width=600,height=600'); return false;" rel="nofollow" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                <li><a class="tw" href="{{ $item->twitter() }}" target="popup" onclick="window.open('{{ $item->twitter() }}','popup','width=600,height=600'); return false;" rel="nofollow" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                <li><a class="pt" href="{{ $item->pin() }}" target="popup" onclick="window.open('{{ $item->pin() }}','popup','width=600,height=600'); return false;" rel="nofollow" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                            </ul>
                        </div>
                        <div class="post-content p-20">
                            <div class="entry-meta meta-0 font-small mb-10">
                            @foreach($item->categorymovie->take(3) as $category)
                                <a href="{{ $category->path() }}"><span class="post-cat text-success" rel="nofollow">{{ Str::words($category->name, 1,'') }}</span></a>
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




