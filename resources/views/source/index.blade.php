@php
    $seo = App\Models\Seo\SeoPrefree::first();
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

@section('aside')
    @include('source.aside')
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
            @csrf

            <div class="hot-tags pb-10 font-small align-self-center">
                <div class="widget-header-3">
                    <div class="row align-self-center">
                        <div class="col-md-4 align-self-center">
                            <h5 class="widget-title">Premium Free Source And Course</h5>
                        </div>
                    </div>
                </div>
                @if($sources->count()  == 0)
                    <h5 class="text-center mt-20">No Source Founded</h5>
                @endif
            </div>

            <div class="row">

            @foreach($sources as $item)
                <article class="col-lg-4 col-md-6 mb-20">
                    <div class="post-card-1 border-radius-10 hover-up">
                        <div class="post-content p-20">
                            <div class="entry-meta meta-0 font-small mb-10">
                                <a href={{$item->prefreecategory->path()}}><span class="post-cat text-success">{{ Str::words($item->prefreecategory->name, 1,'') }}</span></a>
                            </div>
                            <div class="d-flex post-card-content-source">
                                <h2 style="font-size: 1rem !important;">
                                    <a href="{{ $item->path() }}">{{ Str::words($item->title, 11) }}</a>
                                </h2>
                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                    <span class="post-by">{{ $item->views }} views</span>
                                @if($item->delete_time)
                                    <span class="post-on has-dot">Time <b class="text-danger">{{ $item->delete_time }}</b></span>
                                @endif
                                    <span class="has-dot">{{ $item->created_at->diffForHumans() }}</span>
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

                            {{ $sources->links('vendor.pagination.custom') }}

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



