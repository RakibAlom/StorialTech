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
                    <a href="#status" class="nav-link">
                        Status:
                        @if($template->status == 0)
                            <a class="btn btn-success approve-alert" href="{{ route('admin.approve.template', $template->id) }}">Approve</a>
                        @elseif($template->status == 1)
                            Active
                        @elseif($template->status == 2)
                            Deactived
                        @elseif($template->status == 9)
                            template in Trash
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
                                    <h4>{{ $template->title }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area text-white">
                            @if($template->image)
                                <img class="img-thumbnail" src="{{ asset('storage/app/public/'.$template->image) }}" alt="{{ $template->title }}">
                            @endif

                            <h6 class="mt-4">Category:
                                @foreach($template->category as $category)
                                <a href="#" class="text-success">{{ $category->categorytemplate->name }}</a>,
                                @endforeach
                                <span class="float-right">{{ $template->created_at->diffForHumans() }}</span>
                            </h6>
                            <h6 class="mt-4">Tag:
                                @foreach($template->tag as $tag)
                                <a href="#" class="text-success">{{ $tag->tagtemplate->name }}</a>,
                                @endforeach
                            </h6>
                            <hr>
                            <p id="description" class="mt-4">
                                {!! $template->body !!}
                            </p>

                            <div class="mt-5">
                                <div class="text-center">
                                    <h4>Download link</h4>
                                @if($template->file)
                                    <a href="{{ asset('storage/app/public/'.$template->file) }}" target="_blank" class="btn btn-success">Download</a> <br> <br>
                                @endif

                                    @foreach($template->download as $item)
                                        <a href="{{ $item->link }}" target="_blank" class="text-success">{{ $item->link }}</a> <br> <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

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
