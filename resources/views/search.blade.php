@php
    $setting = App\Models\Admin\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<h5>','</h5>','<em>','</em>','<strong>','</strong>','<span>','</span>');
@endphp

@extends('layouts.app')

@section('title', $search . ' - search result | ' . $setting->title)

@section('aside')
    @include('layouts.aside')
@endsection

@section('content')
<!-- Start Main content -->
<main class="bg-grey pt-30 pb-30">
    <!--archive header-->
    <div class="archive-header pt-20">
        <div class="container">
            <h2 class="font-weight-bold" style="font-size: 1.5rem !important;">Search results</h2>
            <div class="breadcrumb">
                We found
                <strong class="text-primary">
                    {{ $tutorials->count() + $stories->count() + $templates->count() + $sources->count() + $movies->count() + $ytmovies->count() + $pdfs->count() + $blogs->count() }}
                </strong>
                 articles for
                <strong class="text-primary">
                    "{{ $search }}"
                </strong>
                 key word
            </div>
            <div class="bt-1 border-color-1 mt-30 mb-20"></div>
        </div>
    </div>
    <div class="pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="loop-list loop-list-style-1">
                        <div class="row">
                            
                            {{-- BLOGS --}}
                            @if($blogs->count() > 0)
                                @foreach ($blogs as $item)
                                <article class="col-md-6 mb-30">
                                    <div class="post-card-1 border-radius-10 hover-up">
                                        <div class="post-thumb thumb-overlay img-hover-slide position-relative" @if($item->image) style="background-image: url({{ asset('storage/app/public/'. $item->image) }})" @else style="background-image: url({{asset('storage/app/public/'. $setting->cover_image)}})" @endif>
                                            <a class="img-link" href="{{ $item->path() }}"></a>
                                            <span class="top-right-icon-search bg-success">Blog/News</span>
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
                                                <h5 class="post-title mb-20 font-weight-bold" style="font-size: 1rem !important;">
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
                        @endif
                            
                        {{-- TUTORIAL --}}
                        @if($tutorials->count() > 0)
                            @foreach($tutorials as $item)
                            <article class="col-md-6 mb-20 wow fadeInUp animated">
                                <div class="post-card-1 border-radius-10 hover-up">
                                    <div class="post-thumb thumb-overlay img-hover-slide position-relative" @if($item->image) @if($item->image) style="background-image: url({{ asset('storage/app/public/'. $item->image) }})" @else style="background-image: url({{ asset('storage/app/public/'.$setting->cover_image) }})" @endif @else style="background-image: url(storage/{{$setting->cover_image}})" @endif>
                                        <a class="img-link" href="{{ $item->path() }}"></a>
                                        <span class="top-right-icon-search bg-primary">Tutorial</span>
                                        <ul class="social-share">
                                            <li><a href="javascript:void(0)"><i class="elegant-icon social_share"></i></a></li>
                                            <li><a class="fb" href="{{ $item->fb() }}" target="popup" onclick="window.open('{{ $item->fb() }}','popup','width=600,height=600'); return false;" rel="nofollow" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                            <li><a class="tw" href="{{ $item->twitter() }}" target="popup" onclick="window.open('{{ $item->twitter() }}','popup','width=600,height=600'); return false;" rel="nofollow" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                            <li><a class="pt" href="{{ $item->pin() }}" target="popup" onclick="window.open('{{ $item->pin() }}','popup','width=600,height=600'); return false;" rel="nofollow" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="post-content p-30">
                                        <div class="entry-meta meta-0 font-small mb-10">
                                        @foreach($item->categorytutorial as $category)
                                            <a href="{{ $category->path() }}" title="{{ $category->name }}"><span class="post-cat text-primary">{{ Str::words($category->name, 1,'') }}</span></a>
                                        @endforeach
                                        @foreach($item->tagtutorial->take(3) as $tag)
                                            <a href="{{ $tag->path() }}" title="{{ $tag->name }}"><span class="post-cat text-success">{{ Str::words($tag->name, 1,'') }}</span></a>
                                        @endforeach
                                        </div>
                                        <div class="d-flex post-card-content-tutorial">
                                            <h5 class="post-title mb-10 font-weight-bold" style="font-size: 1rem !important;">
                                                <a href="{{ $item->path() }}">{{ Str::words($item->title, 9)}}</a>
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
                        @endif

                        @if($stories->count() > 0)
                            {{-- STORY --}}
                            @foreach ($stories as $item)
                            <article class="col-md-6 mb-20">
                                <div class="post-card-1 border-radius-10 hover-up">
                                    <div class="post-content p-20">
                                        <div class="entry-meta meta-0 font-small mb-10">
                                        @foreach($item->categorystory as $category)
                                            <a href="{{ $category->path() }}"><span class="post-cat text-success">{{ Str::words($category->name, 1,'') }}</span></a>
                                        @endforeach
                                        </div>
                                        <div class="d-flex post-card-content-story">
                                            <h5 class="post-title mb-20 font-weight-bold" style="font-size: 1rem !important;">
                                                <a href="{{ $item->path() }}">{{ Str::words($item->title, 6)}}</a>
                                            </h5>
                                            <div class="post-excerpt mb-15 font-small text-muted">
                                                <p>{{ Str::words(str_replace($replace, ' ', $item->body), 24) }} <a href="{{ $item->path() }}" class="text-primary">Read More</a></p>
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
                        @endif

                        @if($templates->count() > 0)
                            {{-- TEMPLATE --}}
                            @foreach ($templates as $item)
                            <article class="col-md-6 mb-30">
                                <div class="post-card-1 border-radius-10 hover-up">
                                    <div class="post-thumb thumb-overlay img-hover-slide position-relative" @if($item->image) style="background-image: url({{ asset('storage/app/public/'. $item->image) }})" @else style="background-image: url({{asset('storage/app/public/'. $setting->cover_image)}})" @endif>
                                        <a class="img-link" href="{{ $item->path() }}"></a>
                                        <span class="top-right-icon-search bg-success">Template</span>
                                        <ul class="social-share">
                                            <li><a href="javascript:void(0)"><i class="elegant-icon social_share"></i></a></li>
                                            <li><a class="fb" href="{{ $item->fb() }}" target="popup" onclick="window.open('{{ $item->fb() }}','popup','width=600,height=800'); return false;" rel="nofollow" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                            <li><a class="tw" href="{{ $item->twitter() }}" target="popup" onclick="window.open('{{ $item->twitter() }}','popup','width=600,height=800'); return false;" rel="nofollow" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                            <li><a class="pt" href="{{ $item->pin() }}" target="popup" onclick="window.open('{{ $item->pin() }}','popup','width=600,height=800'); return false;" rel="nofollow" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
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
                                            <h5 class="post-title mb-20 font-weight-bold" style="font-size: 1rem !important;">
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
                    @endif

                    @if($movies->count() > 0)
                        {{-- MOVIE --}}
                        @foreach ($movies as $item)
                            <article class="col-md-6 mb-20">
                                <div class="post-card-1 hover-up">
                                    <div class="post-thumb thumb-overlay-movie img-hover-slide position-relative" @if($item->thumbnail) style="background-image: url({{ asset('storage/app/public/'. $item->thumbnail) }})" @else style="background-image: url({{ asset('storage/app/public/'.$setting->cover_image) }})" @endif>
                                        <a class="img-link" href="{{ $item->path() }}"></a>
                                        <span class="top-right-icon-search bg-danger">Movie</span>
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
                                            <a href="{{ $category->path() }}"><span class="post-cat text-success">{{ Str::words($category->name, 1,'') }}</span></a>
                                        @endforeach
                                        </div>
                                        <div class="d-flex post-card-content-movie">
                                            <h5 class="post-title font-weight-bold" style="font-size: 1rem !important;">
                                                <a href="{{ $item->path() }}">{{ Str::words($item->name, 7)}}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @endif

                    @if($ytmovies->count() > 0)
                        {{-- YOUTUBE MOVIE --}}
                        @foreach ($ytmovies as $item)
                            <article class="col-md-6 mb-20">
                                <div class="post-card-1 hover-up">
                                    <div class="thumb-overlay-youtube-movie img-hover-slide position-relative">
                                        <iframe src="{{ $item->elink }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width: 100%; height:180px;"></iframe>
                                    </div>
                                    <div class="post-content pr-20 pl-20 pt-10 pb-10">
                                        <div class="entry-meta meta-0 font-small mb-10">
                                        @foreach($item->categoryytmovie->take(3) as $category)
                                            <a href="{{ $category->ytpath() }}"><span class="post-cat text-success">{{ Str::words($category->name, 1,'') }}</span></a>
                                        @endforeach
                                        </div>
                                        <div class="d-flex post-card-content-movie">
                                            <h5 class="post-title font-weight-bold" style="font-size: 1rem !important;">
                                                <a href="{{ $item->path() }}">{{ Str::words($item->name, 7)}}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @endif

                    @if($pdfs->count() > 0)
                        {{-- PDF --}}
                        @foreach ($pdfs as $item)
                            <div class="col-md-3 col-6">
                                <li class="p-3 bg-white border-radius-10" style="min-height: 190px;">
                                    <div class="hover-up-2 transition-normal">
                                        <div class="post-thumb pdf-thumb-100 img-hover-scale overflow-hidden">
                                            <a class="color-white" href="{{ $item->path() }}">
                                                <img src="{{ asset('storage/app/public/'.$item->image) }}" alt="{{ $item->name }}">
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10 mt-10 text-limit-2-row font-medium"><a href="{{ $item->path() }}">{{ Str::words($item->name, 5) }}</a></h6>
                                            <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                <span class="post-on">size: {{ $item->size }}</span>
                                                <span class="post-by">{{ $item->views }} views</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </div>
                        @endforeach
                    @endif

                    @if($sources->count() > 0)
                        {{-- SOURCES --}}
                        @foreach ($sources as $item)
                            <article class="col-md-6 mb-20">
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
                                                <span class="post-on has-dot">remove in <b class="text-danger">{{ $item->delete_time }}</b> hours</span>
                                            @endif
                                                <span class="has-dot">{{ $item->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @endif
                    

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        <div class="sidebar-widget widget-about mb-20 p-10 bg-white border-radius-5 has-border">
                            <img src="{{ asset('storage/app/public/'.$setting->cover_image) }}" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<!-- End Main content -->
@endsection

@section('js')


{{-- <script>
    var token = $('input[name="_token"]').val();
    load_more('', token);

    function load_more(id = "", token) {
        $.ajax({
            url:'{{ route('loadmore.search') }}',
            method: 'POST',
            data: {id: id, _token:token},
            success: function (data) {
                $('#loadMoreButton').remove();
                $('#getData').append(data);
            }
        });
    }

    $('body').on('click', '#loadMoreButton', function () {
        var id = $(this).data('id');
        $('#loadMoreButton').html('Loading...');
        load_more(id, token);
    });
</script> --}}
@endsection

