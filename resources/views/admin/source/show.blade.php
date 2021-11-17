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
                        @if($source->status == 0)
                            <a class="btn btn-success approve-alert" href="{{ route('admin.approve.source', $source->id) }}">Approve</a>
                        @elseif($source->status == 1)
                            Active
                        @elseif($source->status == 2)
                            Deactived
                        @elseif($source->status == 9)
                            Source in Trash
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
                                    <h4>{{ $source->title }}</h4>
                                    <h6 class="ml-3">Category: 
                                        <a href="#" class="text-success">{{ $source->prefreecategory->name }}</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <p id="description" class="mt-4 text-white">
                                {!! $source->body !!}
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
