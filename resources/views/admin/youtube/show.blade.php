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
                        @if($youtube->status == 0)
                            <a class="btn btn-success approve-alert" href="{{ route('admin.approve.youtube', $youtube->id) }}">Approve</a>
                        @elseif($youtube->status == 1)
                            Active
                        @elseif($youtube->status == 2 || $youtube->status == 0)
                            Deactived
                        @elseif($youtube->status == 9)
                            youtube in Trash
                        @endif
                    </a>
                    <a href="{{ route('admin.edit.youtube',$youtube->id) }}">Edit</a>
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
                                    <h4>{{ $youtube->name }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            @if($youtube->elink)
                                <iframe src="{{ $youtube->clink }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" style="width:100%; height:400px;" allowfullscreen></iframe>
                            @endif

                            <h6 class="mt-4">Views: {{ $youtube->views }}<span class="float-right">{{ $youtube->created_at->diffForHumans() }}</span></h6>
                            <a href="{{ $youtube->clink }}" class="mt-4 text-primary">{{ $youtube->clink }}</a> <br>
                            <h6>Keywords: {{ $youtube->keywords }}</h6>
                            <hr>
                            <p id="description" class="mt-4 text-white">
                                {!! $youtube->body !!}
                            </p>

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
