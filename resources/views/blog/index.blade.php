@php
    $seo = App\Models\Seo\SeoBlog::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<h5>','</h5>','<em>','</em>','<strong>','</strong>','<span>','</span>');
    $ads = 0;
@endphp

@section('title', $seo->title)
@section('meta-title', $seo->title)
@section('meta-keywords', $seo->keywords)
@section('og-title', $seo->title)
@section('twitter-title', $seo->title)
@section('meta-description', $seo->description)
@section('og-description', $seo->description)
@section('twitter-description', $seo->description)
@section('meta-image', asset('storage/app/public/'.$seo->cover_image))
@section('og-image', asset('storage/app/public/'.$seo->cover_image))
@section('twitter-image', asset('storage/app/public/'.$seo->cover_image))

@extends('layouts.app')

@section('aside')
    @include('blog.aside')
@endsection

@section('content')
 <!-- Start Main content -->
 <main class="bg-grey">
    <!--archive header-->
    <div class="archive-header pt-10 text-center">
        <div class="container">
            <h1 style="display:none;">{{ $seo->title }}</h1>
            @include('include.ads.section_top_banner_ads')
        </div>
    </div>
    <div class="container pt-20">
        <div class="loop-grid mb-30">
            <div class="hot-tags font-small align-self-center">
                @if($blogs->count()  == 0)
                    <h5 class="text-center">No Blog Founded</h5>
                @endif
            </div>
            <div class="row">
                @foreach ($blogs as $item)
                    <article class="col-lg-4 col-md-6 mb-30">
                        <div class="post-card-1 border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" @if($item->image) style="background-image: url({{ asset('storage/app/public/'. $item->image) }})" @else style="background-image: url({{asset('storage/app/public/'. $seo->cover_image)}})" @endif>
                                <a class="img-link" href="{{ $item->path() }}"></a>
                                <ul class="social-share">
                                    <li><a href="javascript:void(0)"><i class="elegant-icon social_share"></i></a></li>
                                    <li><a class="fb" href="{{ $item->fb() }}" target="popup" onclick="window.open('{{ $item->fb() }}','popup','width=600,height=600'); return false;" rel="nofollow" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                    <li><a class="tw" href="{{ $item->twitter() }}" target="popup" onclick="window.open('{{ $item->twitter() }}','popup','width=600,height=600'); return false;" rel="nofollow" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                    <li><a class="pt" href="{{ $item->pin() }}" target="popup" onclick="window.open('{{ $item->pin() }}','popup','width=600,height=600'); return false;" rel="nofollow" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                </ul>
                            </div>
                            <div class="post-content p-30">
                                <div class="entry-meta meta-0 font-small mb-10">
                                    @foreach($item->categoryblog->take(2) as $category)
                                        <a href="{{ $category->path() }}" title="{{ $category->name }}"><span class="post-cat text-success">{{ Str::words($category->name, 3,'') }}</span></a>
                                    @endforeach
                                </div>
                                <div class="d-flex post-card-content-tutorial">
                                    <h2 class="post-title mb-20 font-weight-bold" style="font-size: 1rem !important;">
                                        <a href="{{ $item->path() }}">{{ $item->title }}</a>
                                    </h2>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on">{{ $item->created_at->format('d F Y') }}</span>
                                        <span class="time-reading has-dot"><a href="javascript:void(0)">{{ $item->user->fullname }}</a></span>
                                        <span class="post-by has-dot">{{ $item->views }} views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    @php $ads++; @endphp
                    @if($ads%3 == 0 && $ads != 0)
                        <article class="col-lg-4 col-md-6 mb-30">
                            <div class="post-card-1 border-radius-10 hover-up">
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8183914844375779" crossorigin="anonymous"></script>
                                <!-- Display Ads -->
                                <ins class="adsbygoogle"
                                     style="display:block"
                                     data-ad-client="ca-pub-8183914844375779"
                                     data-ad-slot="6149709211"
                                     data-ad-format="auto"
                                     data-full-width-responsive="true"></ins>
                                <script>
                                     (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
                        </article>
                    @endif
                @endforeach
                
            </div>

            <div class="row mt-10">
                <div class="col-12">
                    <div class="pagination-area mb-30" style="visibility: visible; animation-name: fadeInUp;">
                        <nav aria-label="Page navigation example">

                            {{ $blogs->links('vendor.pagination.custom') }}

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



