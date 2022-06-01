@php
    $id = $tutorial->user->id;
    $author = App\Models\User::findOrFail($id);
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<h5>','</h5>','<em>','</em>','<strong>','</strong>','<span>','</span>');
    $seo = App\Models\Seo\SeoTutorial::first();
@endphp

@section('title', $tutorial->title . ' ' . $seo->sp_title_plus)
@section('meta-title', $tutorial->title . ' ' . $seo->sp_title_plus)
@section('meta-description', Str::words(str_replace($replace, ' ', $tutorial->body), 25,''))
@section('meta-keywords', $tutorial->keywords)
@section('og-title', $tutorial->title . ' ' . $seo->sp_title_plus)
@section('og-description', Str::words(str_replace($replace, ' ', $tutorial->body), 25,''))
@section('twitter-title', $tutorial->title . ' ' . $seo->sp_title_plus)
@section('twitter-description', Str::words(str_replace($replace, ' ', $tutorial->body), 25,''))

@if($tutorial->image)
@section('meta-image', asset('storage/app/public/'.$tutorial->image))
@section('og-image', asset('storage/app/public/'.$tutorial->image))
@section('twitter-image', asset('storage/app/public/'.$tutorial->image))
@endif


@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('public/frontend/css/vendor/night-owl.min.css') }}">
<script src="{{ asset('public/frontend/js/vendor/highlight.min.js') }}"></script>
<style>
    .hljs {
        padding: 0.8em;
    }
</style>
@endsection

@section('aside')
    @include('tutorial.aside')
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
                        <div class="entry-header entry-header-style-1 mb-20 mt-10">
                            <h1 class="entry-title mb-30 font-weight-900">
                                {{ $tutorial->title }}
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
                                           <span class="font-small"> Date: {{ $tutorial->created_at->format('d F Y') }}</span>
                                            <span class="ml-5 mr-10 font-small"><i class="fa fa-eye"></i> {{ $tutorial->views }} views</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right d-none d-md-inline">
                                    <ul class="header-social-network d-inline-block list-inline mr-15">
                                        <li class="list-inline-item text-muted"><span>Share this: </span></li>
                                        <li class="list-inline-item"><a class="social-icon fb text-xs-center" href="{{ $tutorial->fb() }}" target="popup"
                                            onclick="window.open('{{ $tutorial->fb() }}','popup','width=600,height=600'); return false;" rel="nofollow"><i class="elegant-icon social_facebook"></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" href="{{ $tutorial->twitter() }}" target="popup"
                                            onclick="window.open('{{ $tutorial->twitter() }}','popup','width=600,height=600'); return false;" rel="nofollow"><i class="elegant-icon social_twitter "></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon pt text-xs-center" href="{{ $tutorial->pin() }}" target="popup" onclick="window.open('{{ $tutorial->pin() }}','popup','width=600,height=600'); return false;" rel="nofollow"><i class="elegant-icon social_pinterest "></i></a></li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--end single header-->

                        <figure class="image mb-30 m-auto text-center border-radius-10">
                            @if($tutorial->vlink)
                            <iframe src="{{ $tutorial->vlink }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" style="width: 100%; height:360px;" allowfullscreen></iframe>
                            @elseif($tutorial->image)
                                <img class="border-radius-10" src="{{ asset('storage/app/public/'.$tutorial->image) }}" alt="{{ $tutorial->title }}" />
                            @endif
                        </figure>

                        <!--figure-->
                        <article class="entry-wraper mb-50">

                            {!! $tutorial->body !!}
                            
                        @if($tutorial->preview_code)
                            <blockquote class="font-weight-bold">Preview of Coding</blockquote>
                            <div class="preview-code" id="previewCode">
                                {!! $tutorial->preview_code !!}
                            </div>
                        @endif
                        
                            <div class="like-section">

                            @auth
                                @php
                                    $like = App\Models\Tutorial\Tutoriallike::where('tutorial_id', $tutorial->id)->where('user_id', auth()->user()->id)->first();
                                @endphp
                                @if($like)
                                    <a class="btn btn-primary btn-sm unlike" href="{{ route('unlike.tutorial', auth()->user()->tutoriallike->id) }}"> <i class="fa fa-heart"></i>
                                        @if($tutorial->like)
                                            You Liked ({{ $tutorial->like->count() }})
                                        @endif
                                    </a>
                                @else
                                    <a class="btn btn-sm like" href="{{ route('like.tutorial', $tutorial->id) }}" style="background: #999999; color: #fff"> <i class="fa fa-heart"></i>
                                        @if($tutorial->like)
                                            Like ({{ $tutorial->like->count() }})
                                        @endif
                                    </a>
                                @endif
                            @else
                                <a class="btn btn-sm like" href="javascript:viod(0)" style="background: #999999; color: #fff" title="login first"> <i class="fa fa-heart"></i>
                                    @if($tutorial->like)
                                        ({{ $tutorial->like->count() }})
                                    @endif
                                </a> 
                                <span class="text-danger font-weight-bold">Login first for like post.</span>
                            @endauth
                            </div>

                            <div class="entry-bottom mt-20 mb-30 wow fadeIn animated">
                                <div class="tags">
                                    <span>Tags: </span>
                                @foreach($tutorial->categorytutorial as $category)
                                    <a href="{{ $category->path() }}" rel="tag">{{ Str::words($category->name, 2, '') }}</a>
                                @endforeach
                                @foreach($tutorial->tagtutorial as $tag)
                                    <a href="{{ $tag->path() }}" rel="tag">{{ Str::words($tag->name, 1, '') }}</a>
                                @endforeach
                                </div>
                            </div>
                            <div class="single-social-share clearfix wow fadeIn animated">
                                <div class="entry-meta meta-1 font-small color-grey float-left mt-10">
                                    <span class="hit-count mr-15"><i class="elegant-icon icon_like mr-5"></i>{{ $tutorial->like->count() }} likes</span>
                                    <span class="hit-count mr-15"><i class="elegant-icon icon_comment_alt mr-5"></i>{{ $tutorial->comment->count() + $tutorial->commentreply->count() }} comments</span>
                                </div>
                                <ul class="header-social-network d-inline-block list-inline float-md-right mt-md-0 mt-4">
                                    <li class="list-inline-item text-muted"><span>Share this: </span></li>
                                    <li class="list-inline-item"><a class="social-icon fb text-xs-center" href="{{ $tutorial->fb() }}" target="popup" onclick="window.open('{{ $tutorial->fb() }}','popup','width=600,height=600'); return false;" rel="nofollow" title="Share on facebook"><i class="elegant-icon social_facebook"></i></a></li>
                                    <li class="list-inline-item"><a class="social-icon tw text-xs-center" href="{{ $tutorial->twitter() }}" target="popup" onclick="window.open('{{ $tutorial->twitter() }}','popup','width=600,height=600'); return false;" rel="nofollow" title="Tweet now"><i class="elegant-icon social_twitter "></i></a></li>
                                    <li class="list-inline-item"><a class="social-icon pt text-xs-center" href="{{ $tutorial->pin() }}" target="popup" onclick="window.open('{{ $tutorial->pin() }}','popup','width=600,height=600'); return false;" rel="nofollow" title="Pin it"><i class="elegant-icon social_pinterest "></i></a></li>
                                </ul>
                            </div>
                            <!--author box-->
                            <div class="author-bio p-20 mt-50 border-radius-10 bg-white wow fadeIn animated">
                                <div class="author-image mb-30">
                                @if($author->image)
                                    <a href="javascript:void()"><img src="{{ asset('storage/app/public/' .  $author->image) }}" alt="" class="avatar"></a>
                                @else
                                    <a href="javascript:void()"><img src="{{ asset('public/frontend/img/user-icon.png') }}" alt="" class="avatar"></a>
                                @endif
                                </div>
                                <div class="author-info">
                                    <h4 class="font-weight-bold mb-20"><span class="vcard author"><span class="fn"><a href="javascript:void()" title="Posted by {{ $author->fullname }}" rel="author">{{ $author->fullname }}</a></span></span>
                                    </h4>
                                @if($author->userdetails)
                                    <h5 class="text-muted">About author</h5>
                                    <div class="author-description text-muted">{{ $author->userdetails->about }} </div>
                                @endif
                                   {{-- <a href="javascript:void()" class="author-bio-link mb-md-0 mb-3">View all posts (125)</a> --}}
                                </div>
                            </div>

                            <!--More posts-->
                            {{-- <div class="single-more-articles border-radius-5">
                                <div class="widget-header-2 position-relative mb-30">
                                    <h5 class="mt-5 mb-15">You might be interested in</h5>
                                    <button class="single-more-articles-close"><i class="elegant-icon icon_close"></i></button>
                                </div>
                                <div class="post-block-list post-module-1 post-module-5 mb-10">
                                @php
                                    $interesttutorial =  App\Models\Tutorial\Tutorial::where('status', 1)->whereNotNull('image')->inRandomOrder()->orderBy('views', 'desc')->limit(2)->get();
                                @endphp
                                    <ul class="list-post">
                                    @foreach($interesttutorial as $item)
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

                            <!--Comments-->
                            <div class="comments-area">
                                <div class="widget-header-2 position-relative">
                                    <h5 class="mt-5">Comments ({{ $tutorial->comment->count() + $tutorial->commentreply->count() }})</h5>
                                </div>
                                <!--comment form-->
                                <div class="comment-form wow fadeIn animated">
                                    <form class="form-contact comment_form" action="{{ route('comment.tutorial', $tutorial->id) }}" id="commentForm" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="form-control w-100" name="message" id="comment" cols="30" rows="2" placeholder="Write Comment"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @auth
                                        <div class="form-group mt-1 mb-20">
                                            <button type="submit" class="btn button button-contactForm">Post Comment</button>
                                        </div>
                                    @else
                                        <div class="form-group mt-1 mb-20">
                                            <a href="{{ route('login') }}"><span class="btn button button-contactForm">Login First For Comment</span></a>
                                        </div>
                                    @endauth
                                    </form>
                                </div>

                                <div class="comment-list wow fadeIn animated">
                                @foreach($tutorial->comment as $comment)
                                    <div class="single-comment mt-30 justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                            @if($comment->user->image)
                                                <img style="height: 30px; width:30px;" src="{{ asset('storage/app/public/'.$comment->user->image) }}" alt="{{ $comment->user->fullname }}">
                                            @else
                                                <img style="height: 30px; width:30px;" src="{{ asset('public/frontend/img/user-icon.png') }}" alt="storialtech-user-avatar">
                                            @endif
                                            </div>
                                            <div class="desc">
                                                <p class="comment">
                                                    {{ $comment->message }}
                                                </p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void()" class="font-weight-bold">{{ $comment->user->fullname }}</a>
                                                        <span class="date">{{ $comment->created_at->diffForHumans() }} </span>
                                                    </div>
                                                </div>
                                                <div>
                                                @auth
                                                    @if(auth()->user()->id == $comment->user->id)
                                                    <a href="javascript:void(0);" class="text-primary collapsible mr-2">edit</a>
                                                    <form class="form-contact comment_form content" action="{{ route('update-comment.tutorial', $comment->id) }}" style="display: none;" method="POST">
                                                        @csrf
                                                        <div class="input-group mb-4 w-100">
                                                            <textarea type="text" class="form-control" name="message" placeholder="Type your comment..." rows="1">{{ $comment->message }}</textarea>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <a href="{{ route('delete-comment.tutorial', $comment->id) }}" class="text-danger mr-2" id="delete">delete</a>
                                                @endif
                                                    <a href="javascript:void(0)" class="text-muted collapsible">reply</a>
                                                    <form class="mt-3 content" action="{{ route('reply-comment.tutorial', $comment->id) }}" id="replyComment" style="display: none;" method="POST">
                                                        @csrf
                                                        <div class="input-group mb-4">
                                                            <textarea type="text" class="form-control" name="message" placeholder="Type your comment..." rows="1"></textarea>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary btn-sm" type="submit">Reply</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                @endauth
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @foreach($comment->commentreply as $reply)
                                        <div class="single-comment depth-2 justify-content-between d-flex mt-20">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    @if($reply->user->image)
                                                        <img style="height:30px; width:30px" src="{{ asset('storage/app/public/'.$reply->user->image) }}" alt="{{ $reply->user->fullname }}">
                                                    @else
                                                        <img style="height:30px; width:30px" src="{{ asset('public/frontend/img/user-icon.png') }}" alt="storialtech-user-avatar">
                                                    @endif
                                                </div>
                                                <div class="desc">
                                                    <p class="comment">
                                                        {{ $reply->message }}
                                                    </p>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void()" class="font-weight-bold">{{ $reply->user->fullname }}</a>
                                                            <span class="date">{{ $reply->created_at->diffForHumans() }} </span>
                                                        </div>
                                                    </div>
                                            @auth
                                                 @if(auth()->user()->id == $reply->user->id)
                                                    <a href="javascript:void(0);" class="text-primary collapsible mr-2">edit</a>
                                                    <form class="form-contact comment_form content" action="{{ route('update-reply-comment.tutorial', $reply->id) }}" style="display: none;" method="POST">
                                                        @csrf
                                                        <div class="input-group mb-4 w-100">
                                                            <textarea type="text" class="form-control" name="message" placeholder="Type your reply..." rows="1">{{ $reply->message }}</textarea>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <a href="{{ route('delete-reply-comment.tutorial', $reply->id) }}" class="text-danger delete-alert mr-2" id="delete">delete</a>
                                                @endif
                                            @endauth
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

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
                                <h5 class="mt-5 mb-20">Related Tutorial</h5>
                                
                                @include('include.ads.sidebar_top_ads')
                                
                            </div>

                            @foreach($tutorial->category as $category)
                                @php
                                    $tucates1 =  App\Models\Category\CategoryTutorial::where('id', $category->category_id)->first();
                                    $related = $tucates1->tutorial()->where('status',1)->inRandomOrder()->orderBy('id','desc')->limit(6)->get();
                                @endphp
                            @endforeach
                            <div class="post-block-list post-module-1">
                                <ul class="list-post">
                                @foreach($related as $item)
                                    <li class="mb-10">
                                        <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="{{ $item->path() }}">{{ $item->title }}</a></h6>
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
                        </div>
                        
                        @include('include.ads.sidebar_bottom_ads')

                        <div class="sidebar-widget widget-latest-posts mb-30">
                            <div class="widget-header-2 position-relative mb-20">
                                <h5 class="mt-5 mb-20">Popular Tutorial</h5>
                            </div>
                                @php
                                    $ptutorial =  App\Models\Tutorial\Tutorial::where('status', 1)->inRandomOrder()->orderBy('views', 'desc')->limit(6)->get();
                                @endphp
                            <div class="post-block-list post-module-1">
                                <ul class="list-post">
                                @foreach($ptutorial as $item)
                                    <li class="mb-10">
                                        <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="{{ $item->path() }}">{{ $item->title }}</a></h6>
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



