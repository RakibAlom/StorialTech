@php
    $seo = App\Models\Seo\SeoWebstory::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<h5>','</h5>','<em>','</em>','<strong>','</strong>','<span>','</span>');
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

@section('css')
    <style>
        iframe{
            border: none;
            width: 100%;
            height: 330px;
        }
    </style>
@endsection

@section('aside')
    @include('blog.aside')
@endsection

@section('content')
<!-- Start Main content -->
<main class="bg-grey">
    <div class="pt-10">
        <div class="container">
            <div class="pb-10">
                @include('include.ads.section_top_banner_ads')
            </div>
            <div class="row">
                <div class="col-12 bg-white border-radius-10 p-20">
                    <div class="row">
                        @foreach ($webstories as $item)
                            <article class="col-lg-3 col-md-4 col-sm-6 mb-30">
                                <div class="post-card-1 border-radius-10 hover-up">
                                    <iframe src="{{ $item->embed_code }}" frameborder="0"></iframe>
                                </div>
                                <div class="mt-2">
                                    <h6><a href="{{ $item->path() }}" target="_blank">{{ Str::words($item->title, 6, '') }}</a></h6>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <div class="col-12 mt-5">
                        <div class="pagination-area mb-10" style="visibility: visible; animation-name: fadeInUp;">
                            <nav aria-label="Page navigation example">
    
                                {{ $webstories->links('vendor.pagination.custom') }}
    
                            </nav>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="pt-10">
                @include('include.ads.section_top_banner_ads')
            </div>
        </div>
    </div>
</main>
<!-- End Main content -->

@endsection

@section('js')

@endsection



