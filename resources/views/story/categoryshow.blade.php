@php
    $seo = App\Models\Seo\SeoStory::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<h5>','</h5>','<em>','</em>','<strong>','</strong>','<span>','</span>');
    $ads = 0;
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
    @include('story.aside')
@endsection

@section('content')
 <!-- Start Main content -->
 <main class="bg-grey">
    <!--archive header-->
    <div class="archive-header pt-10 text-center">
        <div class="container">
            <h1 style="display:none;">{{ $category->name }} - {{ $seo->sp_title_plus }}</h1>
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
                @if($stories->count()  == 0)
                    <h5 class="text-center mt-20">No Story Founded</h5>
                @endif
            </div>
            <div class="row">
            @foreach ($stories as $item)
                <article class="col-lg-4 col-md-6 mb-20">
                    <div class="post-card-1 border-radius-10 hover-up">
                        <div class="post-content p-20">
                            <div class="entry-meta meta-0 font-small mb-10">
                            @foreach($item->categorystory as $category)
                                <a href="{{ $category->path() }}"><span class="post-cat text-success">{{ Str::words($category->name, 1,'') }}</span></a>
                            @endforeach
                            </div>
                            <div class="d-flex post-card-content-story">
                                <h2 class="post-title mb-20 font-weight-bold" style="font-size: 1rem !important;">
                                    <a href="{{ $item->path() }}">{{ Str::words($item->title, 6)}}</a>
                                </h2>
                                <div class="post-excerpt mb-15 font-small text-muted">
                                    <p>{!! Str::words(str_replace($replace, ' ', $item->body), 24) !!} <a href="{{ $item->path() }}" class="text-primary">Read More</a></p>
                                </div>
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
            @if($ads%4 == 0 && $ads != 0)
                <article class="col-lg-4 col-md-6 mb-20">
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

            <div class="row mt-20">
                <div class="col-12">
                    <div class="pagination-area mb-30" style="visibility: visible; animation-name: fadeInUp;">
                        <nav aria-label="Page navigation example">

                            {{ $stories->links('vendor.pagination.custom') }}

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





