@php
    $setting = App\Models\Admin\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>');
@endphp

@section('title', $category->name . ' | Bangla Story')
@section('meta-title', $category->name . ' | Bangla Story')
@section('meta-keywords', 'story, bangla story, romantic story, love story, scifi story, science fiction story, adventure story, fictional story, bengali story, funny story, crime story, mythology story, horror story, fairy tail, life story, historical story, fantasy story, detective story')
@section('og-title', $category->name . ' | Bangla Story')
@section('twitter-title', $category->name . ' | Bangla Story')
@section('meta-image', asset('public/frontend/img/story-thumbnail.jpg'))
@section('og-image', asset('public/frontend/img/story-thumbnail.jpg'))
@section('twitter-image', asset('public/frontend/img/story-thumbnail.jpg'))
@section('meta-description', 'You can read enjoyable stories from storialtech. Bangla romantic, adventure, funny,  Historial, and many other stories you can find and read.')
@section('og-description', 'You can read enjoyable stories from storialtech. Bangla romantic, adventure, funny,  Historial, and many other stories you can find and read.')
@section('twitter-description', 'You can read enjoyable stories from storialtech. Bangla romantic, adventure, funny,  Historial, and many other stories you can find and read.')

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
            <h1 style="display:none;">{{ $category->name }} - Bangla Story</h1>
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
                <article class="col-md-4 mb-20">
                    <div class="post-card-1 border-radius-10 hover-up">
                        <div class="post-content p-20">
                            <div class="entry-meta meta-0 font-small mb-10">
                            @foreach($item->categorystory as $category)
                                <a href="{{ $category->path() }}"><span class="post-cat text-success">{{ Str::words($category->name, 1,'') }}</span></a>
                            @endforeach
                            </div>
                            <div class="d-flex post-card-content-story">
                                <h5 class="post-title mb-20 font-weight-900" style="font-size: 1rem !important;">
                                    <a href="{{ $item->path() }}">{{ Str::words($item->title, 6)}}</a>
                                </h5>
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
            
            @include('include.googledisplayads')

        </div>
    </div>
</main>
<!-- End Main content -->
@endsection

@section('js')

@endsection





