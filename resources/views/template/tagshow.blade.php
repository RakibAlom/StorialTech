@php
    $setting = App\Models\Admin\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>');
@endphp

@section('title', $tag->name . ' | Website Template | StorialTech')
@section('meta-title', $tag->name . ' | Website Template | StorialTech')
@section('meta-keywords', 'website theme, web template, ecommer theme template, free html template, wordpress template, wordpress plugin, wordpress theme, react template, vue template, angular template, shopify template, free premium template, free premium theme, magazine theme, newspaper theme, creative theme')
@section('og-title', $tag->name . ' | Website Template | StorialTech')
@section('twitter-title', $tag->name . ' | Website Template | StorialTech')
@section('meta-image', asset('public/frontend/img/template-thumbnail.jpg'))
@section('og-image', asset('public/frontend/img/template-thumbnail.jpg'))
@section('twitter-image', asset('public/frontend/img/template-thumbnail.jpg'))
@section('meta-description', "Download Premium Theme and Template For Free. You can find your favorite website template here. Let's visit and free download your necessary template.")
@section('og-description', "Download Premium Theme and Template For Free. You can find your favorite website template here. Let's visit and free download your necessary template.")
@section('twitter-description', "Download Premium Theme and Template For Free. You can find your favorite website template here. Let's visit and free download your necessary template.")

@extends('layouts.app')

@section('aside')
    @include('template.aside')
@endsection

@section('content')
 <!-- Start Main content -->
 <main class="bg-grey">
    <!--archive header-->
    <div class="archive-header pt-10 text-center">
        <div class="container">
            <h1 style="display:none;">{{ $tag->name }} Website Template Free Download</h1>
            @include('include.googledisplayads')
        </div>
    </div>
    <div class="container pt-20">
        <div class="loop-grid mb-30">
            @csrf
            <div class="hot-tags pb-10 font-small align-self-center">
                <div class="widget-header-3">
                    <div class="row align-self-center">
                        <div class="col-md-4 align-self-center">
                            <h5 class="widget-title">{{ $tag->name }} Template</h5>
                        </div>
                    </div>
                </div>
                @if($templates->count()  == 0)
                    <h5 class="text-center mt-20">No Template Founded</h5>
                @endif
            </div>
            <div class="row">
                @foreach ($templates as $item)
                    <article class="col-lg-4 col-md-6 mb-30">
                        <div class="post-card-1 border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" @if($item->image) style="background-image: url({{ asset('storage/app/public/'. $item->image) }})" @else style="background-image: url({{asset('storage/app/public/'. $setting->cover_image)}})" @endif>
                                <a class="img-link" href="{{ $item->path() }}"></a>
                                <ul class="social-share">
                                    <li><a href="javascript:void(0)"><i class="elegant-icon social_share"></i></a></li>
                                    <li class="list-inline-item"><a class="social-icon fb text-xs-center" href="{{ $item->fb() }}" target="popup" onclick="window.open('{{ $item->fb() }}','popup','width=600,height=600'); return false;" rel="nofollow" title="Share on facebook"><i class="elegant-icon social_facebook"></i></a></li>
                                    <li class="list-inline-item"><a class="social-icon tw text-xs-center" href="{{ $item->twitter() }}" target="popup" onclick="window.open('{{ $item->twitter() }}','popup','width=600,height=600'); return false;" rel="nofollow" title="Tweet now"><i class="elegant-icon social_twitter "></i></a></li>
                                     <li class="list-inline-item"><a class="social-icon pt text-xs-center" href="{{ $item->pin() }}" target="popup" onclick="window.open('{{ $item->pin() }}','popup','width=600,height=600'); return false;" rel="nofollow" title="Pin it"><i class="elegant-icon social_pinterest "></i></a></li>
                                </ul>
                            </div>
                            <div class="post-content p-30">
                                <div class="entry-meta meta-0 font-small mb-10">
                                    @foreach($item->categorytemplate as $category)
                                        <a href="{{ $category->path() }}" title="{{ $category->name }}"><span class="post-cat text-primary">{{ Str::words($category->name, 2,'') }}</span></a>
                                    @endforeach
                                    @foreach($item->tagtemplate->take(3) as $tag)
                                        <a href="{{ $tag->path() }}" title="{{ $tag->name }}"><span class="post-cat text-success">{{ Str::words($tag->name, 1,'') }}</span></a>
                                    @endforeach
                                </div>
                                <div class="d-flex post-card-content-template">
                                    <h5 class="post-title mb-20 font-weight-900" style="font-size: 1rem !important;">
                                        <a href="{{ $item->path() }}">{{ $item->title }}</a>
                                    </h5>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on">{{ $item->created_at->format('d F Y') }}</span>
                                        <span class="time-reading has-dot"><a href="javascript:void(0)">{{ $item->user->fullname }}</a></span>
                                        <span class="post-by has-dot">{{ $item->views }} views</span>
                                    </div>
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

                            {{ $templates->links('vendor.pagination.custom') }}

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





