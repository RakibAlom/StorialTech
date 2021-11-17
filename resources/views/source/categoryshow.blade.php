@php
    $setting = App\Models\Admin\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>');
@endphp

@section('title', $category->name . ' | Premium Free Source')
@section('meta-title', $category->name . ' | Premium Free Source')
@section('meta-keywords', 'premuim course, free source, premium free source download, download, software free download, free theme download, free course, udemy course, course cupon, download course')
@section('og-title', $category->name . ' | Premium Free Source')
@section('twitter-title', $category->name . ' | Premium Free Source')
@section('meta-description', "Download Premium Source and Course For Free. You can find your course and necessary file source here. Let's visit and download free.")
@section('og-description', "Download Premium Source and Course For Free. You can find your course and necessary file source here. Let's visit and download free.")
@section('twitter-description', "Download Premium Source and Course For Free. You can find your course and necessary file source here. Let's visit and download free.")

@extends('layouts.app')

@section('aside')
    @include('source.aside')
@endsection

@section('content')
 <!-- Start Main content -->
 <main class="bg-grey">
    <div class="archive-header pt-10 text-center">
        <div class="container">
            <h1 style="display:none;">Get & Download Premium Source</h1>
            @include('include.googledisplayads')
        </div>
    </div>
    <div class="container pt-20">
        <div class="loop-grid mb-30">
            @csrf
            <div class="hot-tags pt-20 pb-10 font-small align-self-center">
                <div class="widget-header-3">
                    <div class="row align-self-center">
                        <div class="col-md-4 align-self-center">
                            <h5 class="widget-title">{{ $category->name }} Tutorial</h5>
                        </div>
                    </div>
                </div>
                @if($sources->count()  == 0)
                    <h5 class="text-center">No Tutorial Founded</h5>
                @endif
            </div>
            <div class="row">
            @foreach ($sources as $item)
                <article class="col-lg-4 col-md-6 mb-20">
                    <div class="post-card-1 border-radius-10 hover-up">
                        <div class="post-content p-20">
                            <div class="entry-meta meta-0 font-small mb-10">
                                <a href={{$item->prefreecategory->path()}}><span class="post-cat text-success">{{ Str::words($item->prefreecategory->name, 1,'') }}</span></a>
                            </div>
                            <div class="d-flex post-card-content-source">
                                <h6>
                                    <a href="{{ $item->path() }}">{{ Str::words($item->title, 11) }}</a>
                                </h6>
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
            
            @include('include.googledisplayads')

        </div>
    </div>
</main>
<!-- End Main content -->
@endsection

@section('js')

@endsection





