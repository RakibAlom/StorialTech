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
                        @if($movie->status == 1)
                            Active
                        @elseif($movie->status == 2)
                            Deactived
                        @elseif($movie->status == 9)
                            Movie in trash
                        @endif
                    </a>
                    <a href="{{ route('admin.edit.movie',$movie->id) }}">Edit</a>
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
                                    <h4>{{ $movie->name }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div class="col-md-6">
                                    @if($movie->thumbnail)
                                        <img class="img-thumbnail" src="{{ asset('storage/app/public/'.$movie->thumbnail) }}" alt="">
                                    @endif
                                    <h6 class="mt-4">Category:
                                        @foreach($movie->category as $category)
                                        <a href="#" class="text-success">{{ $category->categorymovie->name }}</a>,
                                        @endforeach
                                    </h6>
                                </div>
                                <div class="col-md-6">
                                    <h6>Name: {{ $movie->name }}</h6>
                                    <h6>Duration: {{ $movie->duration }}</h6>
                                    <h6>PUblisher: {{ $movie->publisher }}</h6>
                                    <h6>Language: {{ $movie->language }}</h6>
                                    <h6>Release Date: {{ $movie->release_date }}</h6>
                                    <h6>IMDB Ratiing: {{ $movie->imdb_rating }}</h6>
                                    <h6>Region: {{ $movie->region }}</h6>
                                    <h6>Date: {{ $movie->created_at->diffForHumans() }}</h6>
                                </div>
                            </div>
                            <hr>
                            <p id="description" class="mt-4 text-white">
                                {!! $movie->details !!}
                            </p>

                            <div class="text-center">
                                <h4>DOWNLOAD LINK</h4>
                                @foreach($movie->download as $item)
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
<!--  END CONTENT AREA  -->

@endsection

@section('js')
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('public/backend/assets/js/scrollspyNav.js') }}"></script>
<!-- END PAGE LEVEL SCRIPTS -->
@include('admin.layouts.sweetalertjs')


@endsection
