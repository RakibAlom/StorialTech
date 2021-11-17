@php
    $id = $pdf->user->id;
    $count = 1;
    $author = App\Models\User::findOrFail($id);
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title', $pdf->title)
@section('meta-title', $pdf->title)
@section('meta-description', Str::words(str_replace($replace, ' ', $pdf->body), 25,''))
@section('meta-keywords', $pdf->keywords)
@section('meta-image', asset('storage/app/public/'.$pdf->image))
@section('og-title', $pdf->name)
@section('og-description', Str::words(str_replace($replace, ' ', $pdf->body), 25,''))
@section('og-image', asset('storage/app/public/'.$pdf->image))
@section('twitter-title', $pdf->name)
@section('twitter-description', Str::words(str_replace($replace, ' ', $pdf->body), 25,''))
@section('twitter-image', asset('storage/app/public/'.$pdf->image))


@extends('layouts.app')

@section('css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endsection

@section('aside')
    @include('pdf.aside')
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
                        
                        @include('include.googledisplayads')
                                    
                        <div class="entry-header entry-header-style-1 mb-20">
                            <h1 class="entry-title mb-30 font-weight-900">
                                {{ $pdf->title }}
                            </h1>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="entry-meta align-items-center meta-2 font-small color-muted">
                                        <p class="mb-5">
                                        @if($author->image)
                                            <a class="author-avatar" href="javascript:void()"><img class="img-circle" src="{{ asset('storage/app/public/'.$author->image) }}" alt="{{ $author->username }}"></a>
                                        @endif
                                            By <a href="javascript:void(0)" class="ml-2"><span class="author-name font-weight-bold">{{ $author->fullname }}</span></a>
                                        </p>
                                        <span class="mr-10"> {{ $pdf->created_at->format('d F Y') }}</span>
                                        <span class="ml-5 mr-10"><i class="fa fa-eye"></i> {{ $pdf->views }} views</span>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right d-none d-md-inline">
                                    <ul class="header-social-network d-inline-block list-inline mr-15">
                                        <li class="list-inline-item text-muted"><span>Share this: </span></li>
                                        <li class="list-inline-item"><a class="social-icon fb text-xs-center" href="{{ $pdf->fb() }}" target="popup"
                                            onclick="window.open('{{ $pdf->fb() }}','popup','width=600,height=600'); return false;" rel="nofollow"><i class="elegant-icon social_facebook"></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" href="{{ $pdf->twitter() }}" target="popup"
                                            onclick="window.open('{{ $pdf->twitter() }}','popup','width=600,height=600'); return false;" rel="nofollow"><i class="elegant-icon social_twitter "></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon pt text-xs-center" href="{{ $pdf->pin() }}" target="popup" onclick="window.open('{{ $pdf->pin() }}','popup','width=600,height=600'); return false;" rel="nofollow"><i class="elegant-icon social_pinterest "></i></a></li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--end single header-->

                        <div class="row">
                            <div class="col-md-6">
                                <figure class="image mb-30 m-auto text-center border-radius-10">
                                    @if($pdf->image)
                                        <img class="border-radius-10" src="{{ asset('storage/app/public/'.$pdf->image) }}" alt="{{ $pdf->title }}" />
                                    @endif
                                </figure>
                                <p><span class="font-weight-bold">Category:</span>
                                    @foreach($pdf->categorypdf as $category)
                                    <a href="{{ $category->path() }}" class="text-success">{{ $category->name }}</a>,
                                    @endforeach
                                </p>

                                @if($pdf->author->count() > 0)
                                    <p><span class="font-weight-bold">Author:</span>
                                        @foreach($pdf->authorpdf as $author)
                                        <a href="{{ $author->path() }}" class="text-success">{{ $author->name }}</a>,
                                        @endforeach
                                    </p>
                                @endif

                                @if($pdf->series->count() > 0)
                                    <p><span class="font-weight-bold">Series:</span>
                                        @foreach($pdf->seriespdf as $series)
                                        <a href="{{ $series->path() }}" class="text-success">{{ $series->name }}</a>,
                                        @endforeach
                                    </p>
                                @endif
                            </div>
                            <div class="col-md-6">
                            @if($pdf->name)
                                <p> <span class="font-weight-bold">Book Name:</span> {{ $pdf->name }}</p>
                            @endif
                            @if($pdf->translated)
                                <p> <span class="font-weight-bold">Translated:</span> {{ $pdf->translated }}</p>
                            @endif
                            @if($pdf->publisher)
                                <p> <span class="font-weight-bold">Publisher:</span> {{ $pdf->publisher }}</p>
                            @endif
                            @if($pdf->published)
                                <p> <span class="font-weight-bold">Publish Date:</span> {{ $pdf->published }}</p>
                            @endif
                            @if($pdf->pages)
                                <p> <span class="font-weight-bold">Pages:</span> {{ $pdf->pages }}</p>
                            @endif
                            @if($pdf->size)
                                <p> <span class="font-weight-bold">Size:</span> {{ $pdf->size }}</p>
                            @endif
                            </div>
                        </div>

                        <!--figure-->
                        <article class="entry-wraper mb-50">

                            {!! $pdf->review !!}

                            <div class="mt-50">
                                <div class="text-center">
                                    
                                    @include('include.googledisplayads')
                                    
                                    <h4 class="mb-20 mt-20 font-weight-bold text-success"><u>Downlaod Section</u></h4>
                                @if($pdf->file)
                                    <a href="{{ asset('storage/app/public/'.$pdf->file) }}" target="_blank" class="btn btn-primary">Download</a> <br> <br>
                                @endif

                                    <div class="mb-20">
                                        <button id="generateLink" onclick="DelayRedirect()" class="btn btn-success">Generate Download Link</button>
                                        <div class="h5" id="dvCountDown" style="display:none">
                                            Please, wait <span class="text-success font-weight-bold" id="lblCount"></span> seconds for download link.
                                        </div>
                                        <div id="downloadLink" style="display:none">
                                            @foreach($pdf->download as $item)
                                                <a href="{{ $item->link }}" class="btn btn-primary" rel="nofollow" target="_blank">Download Link - {{ $count++ }}</a> <br> <br>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                   @include('include.googledisplayads')
                                    
                                    <div class="mt-50 mb-30">
                                        <span>(If download link not working then <a href={{ route('contact') }}>contact with us</a> and report for update!)</span> <br>
                                        <span>(যদি ডাউনলোড লিঙ্ক কাজ না করে তাহলে আমাদের কে <a href={{ route('contact') }}>মেসেজ</a> দিয়ে জানিয়ে দিন। আমরা লিঙ্কটি  ঠিক করে দিবো!)</span>
                                    </div>
                                </div>
                            </div>


                            <div class="entry-bottom mt-20 mb-30 wow fadeIn animated">
                                <div class="tags">
                                    <span>Tags: </span>
                                @foreach($pdf->categorypdf as $category)
                                    <a href="{{ $category->path() }}" rel="tag">{{ $category->name }}</a>
                                @endforeach
                                @foreach($pdf->seriespdf as $series)
                                    <a href="{{ $series->path() }}" rel="tag">{{ $series->name }}</a>
                                @endforeach
                                @foreach($pdf->authorpdf as $author)
                                    <a href="{{ $author->path() }}" rel="tag">{{ $author->name }}</a>
                                @endforeach

                                </div>
                                <div class="single-social-share clearfix wow fadeIn animated">
                                    <ul class="header-social-network d-inline-block list-inline float-md-right mt-md-0 mt-4">
                                        <li class="list-inline-item text-muted"><span>Share this: </span></li>
                                        <li class="list-inline-item"><a class="social-icon fb text-xs-center" href="{{ $pdf->fb() }}" target="popup" onclick="window.open('{{ $pdf->fb() }}','popup','width=600,height=600'); return false;" rel="nofollow" title="Share on facebook"><i class="elegant-icon social_facebook"></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" href="{{ $pdf->twitter() }}" target="popup" onclick="window.open('{{ $pdf->twitter() }}','popup','width=600,height=600'); return false;" rel="nofollow" title="Tweet now"><i class="elegant-icon social_twitter "></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon pt text-xs-center" href="{{ $pdf->pin() }}" target="popup" onclick="window.open('{{ $pdf->pin() }}','popup','width=600,height=600'); return false;" rel="nofollow" title="Pin it"><i class="elegant-icon social_pinterest "></i></a></li>
                                    </ul>
                                </div>
                            </div>


                            <!--More posts-->
                            <div class="single-more-articles border-radius-5">
                                <div class="widget-header-2 position-relative mb-30">
                                    <h5 class="mt-5 mb-15">You might be interested in</h5>
                                    <button class="single-more-articles-close"><i class="elegant-icon icon_close"></i></button>
                                </div>
                                <div class="post-block-list post-module-1 post-module-5 mb-10">
                                @php
                                    $interestpdf =  App\Models\Pdf\Pdf::where('status', 1)->whereNotNull('image')->inRandomOrder()->orderBy('views', 'desc')->limit(2)->get();
                                @endphp
                                    <ul class="list-post">
                                    @foreach($interestpdf as $item)
                                        <li class="mb-20">
                                            <div class="d-flex hover-up-2 transition-normal">
                                                <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                                    <a class="color-white" href="{{ $item->path() }}">
                                                        <img src="{{ asset('storage/app/public/'.$item->image) }}" alt="{{ $item->title }}">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="{{ $item->path() }}">{{ $item->title }}</a></h6>
                                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                        <span class="post-on">size: {{ $item->size }}</span>
                                                        <span class="post-by">{{ $item->views }} views</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>

                        </article>
                    </div>
                </div>

                <div class="col-lg-4 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        {{-- <div class="sidebar-widget widget-about mb-20 pt-30 pr-30 pb-30 pl-30 bg-white border-radius-5 has-border  wow fadeInUp animated">

                        </div> --}}
                        <div class="sidebar-widget widget-latest-posts mb-30">
                            <div class="widget-header-2 position-relative mb-20">
                                <h5 class="mt-5 mb-20">Related PDF</h5>
                                @include('include.googledisplayads')
                            </div>

                            @foreach($pdf->category as $category)
                                @php
                                    $tucates1 =  App\Models\Category\Categorypdf::where('id', $category->category_id)->first();
                                    $related = $tucates1->pdf()->where('status',1)->inRandomOrder()->latest()->limit(5)->get();
                                @endphp
                            @endforeach
                            <div class="post-block-list post-module-1">
                                <ul class="list-post">
                                @foreach($related as $item)
                                    <li class="mb-10">
                                        <div class="d-flex bg-white has-border p-15 hover-up transition-normal border-radius-5">
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="{{ $item->path() }}">{{ Str::words($item->name, 6) }}</a></h6>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">size: {{ $item->size }}</span>
                                                    <span class="post-by">{{ $item->views }} views</span>
                                                </div>
                                            </div>
                                            <div class="post-thumb post-thumb-80 d-flex ml-15 border-radius-5 img-hover-scale overflow-hidden">
                                                <a class="color-white" href="{{ $item->path() }}">
                                                @if($item->image)
                                                    <img src="{{ asset('storage/app/public/'.$item->image) }}" alt="{{ $item->title }}">
                                                @else
                                                    <img src="{{ asset('storage/app/public/'.$setting->cover_image) }}" alt="{{ $item->title }}">
                                                @endif
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                            
                            @include('include.googledisplayads')
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
    var seconds = 5;
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



