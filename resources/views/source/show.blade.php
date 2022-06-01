@php
    $id = $source->user->id;
    $author = App\Models\User::findOrFail($id);
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<h5>','</h5>','<em>','</em>','<strong>','</strong>','<span>','</span>');
    $seo = App\Models\Seo\SeoPrefree::first();
@endphp

@section('title', $source->title . ' ' . $seo->sp_title_plus)
@section('meta-title', $source->title . ' ' . $seo->sp_title_plus)
@section('meta-description', Str::words(str_replace($replace, ' ', $source->body), 25,''))
@section('meta-keywords', $source->keywords)
@section('og-title', $source->title . ' ' . $seo->sp_title_plus)
@section('og-description', Str::words(str_replace($replace, ' ', $source->body), 25,''))
@section('twitter-title', $source->title . ' ' . $seo->sp_title_plus)
@section('twitter-description', Str::words(str_replace($replace, ' ', $source->body), 25,''))

@if($source->image)
@section('meta-image', asset('storage/app/public/'.$source->image))
@section('og-image', asset('storage/app/public/'.$source->image))
@section('twitter-image', asset('storage/app/public/'.$source->image))
@endif


@extends('layouts.app')

@section('css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<link rel="stylesheet" href="{{ asset('public/frontend/css/vendor/night-owl.min.css') }}">
<script src="{{ asset('public/frontend/js/vendor/highlight.min.js') }}"></script>
@endsection

@section('aside')
    @include('source.aside')
@endsection

@section('content')
<!-- Start Main content -->
<main class="bg-grey pt-30 pb-30">
    <div class="pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 bg-white border-radius-10 p-20">
                    <div class="single-content2">
                        @if(session('success'))
                            <p class="text-success">{{ session('success') }}</p>
                        @endif
                        @include('include.ads.single_post_top_ads')
                        <div class="entry-header entry-header-style-1 mb-20">
                            <h1 class="entry-title mb-30 font-weight-900">
                                {{ $source->title }}
                            </h1>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="entry-meta align-items-center meta-2 font-small color-muted">
                                        <p class="mb-5">
                                        @if($author->image)
                                            <a class="author-avatar" href="javascript:void()"><img class="img-circle" src="{{ asset('storage/app/public/'.$author->image) }}" alt="{{ $author->username }}"></a>
                                        @endif
                                            By <a href="javascript:void(0)" class="ml-2"><span class="author-name font-weight-bold">{{ $author->fullname }}</span></a>
                                            <br>
                                           <span class="font-small"> Date: {{ $source->created_at->format('d F Y') }}</span>
                                            <span class="ml-5 mr-10 font-small"><i class="fa fa-eye"></i> {{ $source->views }} views</span>
                                            <br>
                                            @if($source->delete_time)
                                            <span class="mr-10">Time <b class="text-danger">{{ $source->delete_time }}</b></span>
                                            @endif
                                        </p>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6 text-right d-none d-md-inline">
                                    <ul class="header-social-network d-inline-block list-inline mr-15">
                                        <li class="list-inline-item text-muted"><span>Share this: </span></li>
                                        <li class="list-inline-item"><a class="social-icon fb text-xs-center" href="{{ $source->fb() }}" target="popup"
                                            onclick="window.open('{{ $source->fb() }}','popup','width=600,height=600'); return false;" rel="nofollow"><i class="elegant-icon social_facebook"></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" href="{{ $source->twitter() }}" target="popup"
                                            onclick="window.open('{{ $source->twitter() }}','popup','width=600,height=600'); return false;" rel="nofollow"><i class="elegant-icon social_twitter "></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon pt text-xs-center" href="{{ $source->pin() }}" target="popup" onclick="window.open('{{ $source->pin() }}','popup','width=600,height=600'); return false;" rel="nofollow"><i class="elegant-icon social_pinterest "></i></a></li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--end single header-->

                        <!--figure-->
                        <article class="entry-wraper mb-50">

                            {!! $source->body !!}

                        </article>
                        
                        
                        <div class="mt-50 mb-30 text-center">
                            <span>(If download link not working then <a href={{ route('contact') }}>contact with us</a> and report for update!)</span> <br>
                        </div>

                        @include('include.ads.single_post_bottom_ads')

                    </div>
                </div>

                <div class="col-lg-4 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        {{-- <div class="sidebar-widget widget-about mb-20 pt-30 pr-30 pb-30 pl-30 bg-white border-radius-5 has-border  wow fadeInUp animated">

                        </div> --}}
                        <div class="sidebar-widget widget-latest-posts mb-30">
                            <div class="widget-header-2 position-relative mb-20">
                                <h5 class="mt-5 mb-20">Related Source</h5>
                                @include('include.ads.sidebar_top_ads')
                            </div>
                                @php
                                    $related = App\Models\Source\PreemiumFree::where('status', 1)->where('category_id', $source->category_id)->inRandomOrder()->orderBy('views', 'desc')->limit(3)->get();
                                @endphp
                            <div class="post-block-list post-module-1">
                                <ul class="list-post">
                                @foreach($related as $item)
                                    <li class="mb-10">
                                        <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="{{ $item->path() }}">{{ Str::words($item->title, 8) }}</a></h6>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-by">{{ $item->views }} views</span>
                                                @if($item->delete_time)
                                                    <span class="post-on has-dot">remove in <b class="text-danger">{{ $item->delete_time }}</b> hours</span>
                                                @endif
                                                    <span class="has-dot">{{ $item->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        
                        @include('include.ads.sidebar_bottom_ads')
                        
                        <div class="sidebar-widget widget-latest-posts mb-30">
                            <div class="widget-header-2 position-relative mb-20">
                                <h5 class="mt-5 mb-20">Popular Source</h5>
                            </div>
                            @php
                                $sources2 =  App\Models\Source\PreemiumFree::where('status', 1)->inRandomOrder()->orderBy('views', 'desc')->limit(3)->get();
                            @endphp
                            <div class="post-block-list post-module-1">
                                <ul class="list-post">
                                @foreach($sources2 as $item)
                                    <li class="mb-10">
                                        <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="{{ $item->path() }}">{{ Str::words($item->title, 8) }}</a></h6>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-by">{{ $item->views }} views</span>
                                                    @if($item->delete_time)
                                                        <span class="post-on has-dot">remove in <b class="text-danger">{{ $item->delete_time }}</b> hours</span>
                                                    @endif
                                                        <span class="has-dot">{{ $item->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script>
    hljs.highlightAll();
    hljs.initLineNumbersOnLoad();
</script>
@endsection



