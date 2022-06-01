@php
    $id = $movie->user->id;
    $author = App\Models\User::findOrFail($id);
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<h5>','</h5>','<em>','</em>','<strong>','</strong>','<span>','</span>');
    $seo = App\Models\Seo\SeoMovie::first();
@endphp

@section('title', $movie->title . ' ' . $seo->sp_title_plus)
@section('meta-title', $movie->title . ' ' . $seo->sp_title_plus)
@section('meta-description', Str::words(str_replace($replace, ' ', $movie->body), 25,''))
@section('meta-keywords', $movie->keywords)
@section('og-title', $movie->title . ' ' . $seo->sp_title_plus)
@section('og-description', Str::words(str_replace($replace, ' ', $movie->body), 25,''))
@section('twitter-title', $movie->title . ' ' . $seo->sp_title_plus)
@section('twitter-description', Str::words(str_replace($replace, ' ', $movie->body), 25,''))

@if($movie->image)
@section('meta-image', asset('storage/app/public/'.$movie->image))
@section('og-image', asset('storage/app/public/'.$movie->image))
@section('twitter-image', asset('storage/app/public/'.$movie->image))
@endif


@extends('layouts.app')

@section('css')
@endsection

@section('aside')
    @include('movie.aside')
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
                                {{ $movie->name }}
                            </h1>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="entry-meta align-items-center meta-2 font-small color-muted">
                                        <p class="mb-5">
                                        @if($author->image)
                                            <a class="author-avatar" href="javascript:void()" rel="nofollow"><img class="img-circle" src="{{ asset('storage/app/public/'.$author->image) }}" alt="{{ $author->username }}"></a>
                                        @endif
                                            By <a href="javascript:void(0)" class="ml-2" rel="nofollow"><span class="author-name font-weight-bold">{{ $author->fullname }}</span></a>
                                        </p>
                                        <span class="mr-10"> {{ $movie->created_at->format('d F Y') }}</span>
                                        <span class="ml-5 mr-10"><i class="fa fa-eye"></i> {{ $movie->views }} views</span>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right d-none d-md-inline">
                                    <ul class="header-social-network d-inline-block list-inline mr-15">
                                        <li class="list-inline-item text-muted"><span>Share this: </span></li>
                                        <li class="list-inline-item"><a class="social-icon fb text-xs-center" href="{{ $movie->fb() }}" target="popup"
                                            onclick="window.open('{{ $movie->fb() }}','popup','width=600,height=600'); return false;" rel="nofollow"><i class="elegant-icon social_facebook"></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" href="{{ $movie->twitter() }}" target="popup"
                                            onclick="window.open('{{ $movie->twitter() }}','popup','width=600,height=600'); return false;" rel="nofollow"><i class="elegant-icon social_twitter "></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon pt text-xs-center" href="{{ $movie->pin() }}" target="popup" onclick="window.open('{{ $movie->pin() }}','popup','width=600,height=600'); return false;" rel="nofollow"><i class="elegant-icon social_pinterest "></i></a></li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--end single header-->
                        <div class="row">
                            <div class="col-md-6">
                                <figure class="image mb-30 m-auto text-center border-radius-10">
                                    @if($movie->thumbnail)
                                        <img class="border-radius-10" src="{{ asset('storage/app/public/'.$movie->thumbnail) }}" alt="{{ $movie->name }}" />
                                    @endif
                                </figure>
                                <p><span class="font-weight-bold">Category:</span>
                                    @foreach($movie->categorymovie as $category)
                                    <a href="{{ $category->path() }}" class="text-success" rel="nofollow">{{ $category->name }}</a>,
                                    @endforeach
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p> <span class="font-weight-bold">Duration:</span> {{ $movie->duration }}</p>
                                <p> <span class="font-weight-bold">Language:</span> {{ $movie->language }}</p>
                                <p> <span class="font-weight-bold">Release Date:</span> {{ $movie->release_date }}</p>
                                <p> <span class="font-weight-bold">IMDB Rating:</span> {{ $movie->imdb_rating }}</p>
                                <p> <span class="font-weight-bold">Region:</span> {{ $movie->reginon }}</p>
                            </div>
                        </div>

                        <!--figure-->
                        <article class="entry-wraper mb-50">

                            {!! $movie->details !!}
                            <hr>
                            <div class="mt-5">
                                <div class="text-center">
                                    <h4 class="mb-20 mt-20 font-weight-bold text-success"><u>Downlaod Section</u></h4>
                                @if($movie->file)
                                    <a href="{{ asset('storage/app/public/'.$movie->file) }}" class="btn btn-success" rel="nofollow">Download</a> <br> <br>
                                @endif
                                    
                                    <div class="mb-20">
                                        <button id="generateLink" onclick="DelayRedirect()" class="btn btn-success">Generate Download Link</button>
                                        <div class="h5" id="dvCountDown" style="display:none">
                                            Please, wait <span class="text-success font-weight-bold" id="lblCount"></span> seconds for download link.
                                        </div>
                                        <div id="downloadLink" style="display:none">
                                            @foreach($movie->download as $item)
                                                <h6 class="font-weight-bold">{{ $item->quality }} {{ $item->size }}</h6>
                                                <a href="{{ $item->link }}" class="btn btn-primary btn-sm" rel="nofollow" target="_blank">Download {{ $item->quality }}</a> <br> <br>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                    <div class="mt-50 mb-30">
                                        <h5><u>Instructions (নির্দেশনা)</u></h5>
                                    
                                        <span>(If download link not working then <a href={{ route('contact') }}>contact with us</a> and report for update!)</span> <br>
                                    </div>
                                </div>
                            </div>


                            <div class="entry-bottom mt-20 mb-30 wow fadeIn animated">
                                <div class="tags">
                                    <span>Tags: </span>
                                @foreach($movie->categorymovie as $category)
                                    <a href="{{ $category->path() }}" rel="tag">{{ Str::words($category->name, 2, '') }}</a>
                                @endforeach
                                </div>
                                <div class="single-social-share clearfix wow fadeIn animated">
                                    <ul class="header-social-network d-inline-block list-inline float-md-right mt-md-0 mt-4">
                                        <li class="list-inline-item text-muted"><span>Share this: </span></li>
                                        <li class="list-inline-item"><a class="social-icon fb text-xs-center" href="{{ $movie->fb() }}" target="popup" onclick="window.open('{{ $movie->fb() }}','popup','width=600,height=600'); return false;" rel="nofollow" title="Share on facebook"><i class="elegant-icon social_facebook"></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" href="{{ $movie->twitter() }}" target="popup" onclick="window.open('{{ $movie->twitter() }}','popup','width=600,height=600'); return false;" rel="nofollow" title="Tweet now"><i class="elegant-icon social_twitter "></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon pt text-xs-center" href="{{ $movie->pin() }}" target="popup" onclick="window.open('{{ $movie->pin() }}','popup','width=600,height=600'); return false;" rel="nofollow" title="Pin it"><i class="elegant-icon social_pinterest "></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            @include('include.ads.single_post_bottom_ads')

                            <!--More posts-->
                            {{-- <div class="single-more-articles border-radius-5">
                                <div class="widget-header-2 position-relative mb-30">
                                    <h5 class="mt-5 mb-15">You might be interested in</h5>
                                    <button class="single-more-articles-close"><i class="elegant-icon icon_close"></i></button>
                                </div>
                                <div class="post-block-list post-module-1 post-module-5 mb-10">
                                @php
                                    $interestmovie =  App\Models\movie\movie::where('status', 1)->whereNotNull('thumbnail')->inRandomOrder()->orderBy('views', 'desc')->limit(2)->get();
                                @endphp
                                    <ul class="list-post">
                                    @foreach($interestmovie as $item)
                                        <li class="mb-20">
                                            <div class="d-flex hover-up-2 transition-normal">
                                                <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                                    <a class="color-white" href="{{ $item->path() }}">
                                                        <img src="{{ asset('storage/app/public/'.$item->thumbnail) }}" alt="{{ $item->name }}">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="{{ $item->path() }}">{{ $item->name }}</a></h6>
                                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                        <span class="post-on">{{ $item->created_at->format('d F Y') }}</span>
                                                        <span class="post-by has-dot">{{ $item->views }} views</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div> --}}

                        </article>
                    </div>
                    
                
                </div>

                <div class="col-lg-4 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        
                        <div class="sidebar-widget widget-latest-posts mb-30">
                            <div class="widget-header-2 position-relative mb-20">
                                <h5 class="mt-5 mb-20">Related movie</h5>
                                @include('include.ads.sidebar_top_ads')
                            </div>

                            @foreach($movie->category as $category)
                                @php
                                    $tucates1 =  App\Models\Category\Categorymovie::where('id', $category->category_id)->first();
                                    $related = $tucates1->movie()->where('status',1)->inRandomOrder()->latest()->limit(6)->get();
                                @endphp
                            @endforeach
                            <div class="post-block-list post-module-1">
                                <ul class="list-post">
                                @foreach($related as $item)
                                    <li class="mb-10">
                                        <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="{{ $item->path() }}">{{ $item->name }}</a></h6>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">{{ $item->created_at->format('d F Y') }}</span>
                                                    <span class="post-by has-dot">{{ $item->views }} views</span>
                                                </div>
                                            </div>
                                            <div class="post-thumb post-thumb-80 d-flex ml-15 border-radius-5 img-hover-scale overflow-hidden">
                                                <a class="color-white" href="{{ $item->path() }}">
                                                @if($item->thumbnail)
                                                    <img src="{{ asset('storage/app/public/'.$item->thumbnail) }}" alt="{{ $item->name }}">
                                                @endif
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            </div>

                            @include('include.ads.sidebar_bottom_ads')

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script type="text/javascript">
function DelayRedirect() {
    var seconds = 15;
    var dvCountDown = document.getElementById("dvCountDown");
    var lblCount = document.getElementById("lblCount");
    dvCountDown.style.display = "block";
    document.getElementById("generateLink").style.display = "none";
    lblCount.innerHTML = seconds;
    setInterval(function () {
        seconds--;
        lblCount.innerHTML = seconds;
        if (seconds == 0) {
            dvCountDown.style.display = "none";
            document.getElementById("downloadLink").style.display = "block";
        }
    }, 1000);
}
</script>
@endsection



