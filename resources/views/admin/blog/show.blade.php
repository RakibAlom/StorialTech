@php
 $user = auth()->user();
@endphp

@extends('admin.layouts.app')

@section('css')
<link href="{{ asset('public/backend/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{ asset('public/backend/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/backend/assets/css/elements/infobox.css') }}" rel="stylesheet" type="text/css" />
<!--  END CUSTOM STYLE FILE  -->

@endsection


@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="container">

        <div class="container">

            <div id="navSection" data-spy="affix" class="nav sidenav">
                <div class="sidenav-content">
                    <a href="#heading" class="active nav-link">Heading</a>
                    <a href="#description" class="nav-link">Description</a>
                    <a href="#comment" class="nav-link">Comment</a>
                    <a href="#status" class="nav-link">
                        Status:
                        @if($blog->status == 0)
                            <a class="btn btn-success approve-alert" href="{{ route('admin.approve.blog', $blog->id) }}">Approve</a>
                        @elseif($blog->status == 1)
                            Active
                        @elseif($blog->status == 2)
                            Deactived
                        @elseif($blog->status == 9)
                            Blog in Trash
                        @endif
                    </a>
                </div>
            </div>

            <div class="row layout-top-spacing">
                <div id="heading" class="col-xl-12 col-lg-12 layout-spacing">
                    <div class="row">
                        <div class="col-12">
                            @include('admin.layouts.alerts')
                        </div>
                    </div>
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{ $blog->title }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            @if($blog->image)
                                <img class="img-thumbnail" src="{{ asset('storage/app/public/'.$blog->image) }}" alt="{{ $blog->title }}">
                            @endif

                            <h6 class="mt-4">Category:
                                @foreach($blog->category as $category)
                                <a href="#" class="text-success">{{ $category->categoryblog->name }}</a>,
                                @endforeach
                                <span class="float-right">{{ $blog->created_at->diffForHumans() }}</span>
                            </h6>
                            <hr>
                            <p id="description" class="mt-4 text-white">
                                {!! $blog->body !!}
                            </p>

                            <div class="mt-5">
                            {{-- @php
                                $like = App\Models\blog\bloglike::where('blog_id', $blog->id)->where('user_id', auth()->user()->id)->first();
                            @endphp
                            @if($like)
                                <a class="btn btn-danger btn-sm unlike" href="{{ route('unlike.blog', $user->bloglike->id) }}">Liked
                                    @if($blog->like)
                                        ({{ $blog->like->count() }})
                                    @endif
                                </a>
                            @else
                                <a class="btn btn-primary btn-sm like" href="{{ route('like.blog', $blog->id) }}">Like
                                    @if($blog->like)
                                        ({{ $blog->like->count() }})
                                    @endif
                                </a>
                            @endif --}}
                            <span class="btn btn-primary btn-sm like">Likes ({{ $blog->like->count() }})</span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            @include('admin.blog.comment')

        </div>

    </div>

</div>
<!--  END CONTENT AREA  -->

@endsection

@section('js')
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('public/backend/assets/js/scrollspyNav.js') }}"></script>
<!-- END PAGE LEVEL SCRIPTS -->
@include('admin.layouts.sweetalertjs')


@endsection
