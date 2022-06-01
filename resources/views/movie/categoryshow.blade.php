@php
    $seo = App\Models\Seo\SeoMovie::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<h5>','</h5>','<em>','</em>','<strong>','</strong>','<span>','</span>');
@endphp

@section('title', $category->name . ' ' . $seo->sp_title_plus)
@section('meta-title', $category->name . ' ' . $seo->sp_title_plus)
@section('meta-keywords', $seo->keywords)
@section('og-title', $category->name . ' ' . $seo->sp_title_plus)
@section('twitter-title', $category->name . ' ' . $seo->sp_title_plus)
@section('meta-description', $seo->description)
@section('og-description', $seo->description)
@section('twitter-description', $seo->description)
@section('meta-image', asset('storage/app/public/'.$seo->cover_image))
@section('og-image', asset('storage/app/public/'.$seo->cover_image))
@section('twitter-image', asset('storage/app/public/'.$seo->cover_image))

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
            <h1 style="display:none;">{{ $category->name }} {{ $seo->sp_title_plus }}</h1>
            @include('include.ads.section_top_banner_ads')
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
                        <div class="post-thumb thumb-overlay-movie img-hover-slide position-relative" @if($item->thumbnail) style="background-image: url({{ asset('storage/app/public/'. $item->thumbnail) }})" @else style="background-image: url({{ asset('storage/app/public/'.$seo->cover_image) }})" @endif>
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
                                <h2 class="post-title font-weight-900" style="font-size: 1rem !important;">
                                    <a href="{{ $item->path() }}" rel="nofollow">{{ Str::words($item->name, 7)}}</a>
                                </h2>
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
            
            @include('include.ads.section_bottom_banner_ads')

        </div>
    </div>
</main>
<!-- End Main content -->
@endsection

@section('js')

@endsection





