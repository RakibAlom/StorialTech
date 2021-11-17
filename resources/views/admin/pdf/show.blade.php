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
                        @if($pdf->status == 0)
                            <a class="btn btn-success approve-alert" href="{{ route('admin.approve.pdf', $pdf->id) }}">Approve</a>
                        @elseif($pdf->status == 1)
                            Active
                        @elseif($pdf->status == 2)
                            Deactived
                        @elseif($pdf->status == 9)
                            pdf in Trash
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
                                    <h4>{{ $pdf->title }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div class="col-md-6">
                                    @if($pdf->image)
                                        <img class="img-thumbnail" src="{{ asset('storage/app/public/'.$pdf->image) }}" alt="{{ $pdf->title }}">
                                    @endif

                                    <h6 class="mt-4">Category:
                                        @foreach($pdf->category as $category)
                                        <a href="#" class="text-success">{{ $category->categorypdf->name }}</a>,
                                        @endforeach
                                    </h6>

                                @if($pdf->author)
                                    <h6 class="mt-4">Author:
                                        @foreach($pdf->author as $author)
                                        <a href="#" class="text-success">{{ $author->authorpdf->name }}</a>,
                                        @endforeach
                                    </h6>
                                @endif

                                @if($pdf->series)
                                    <h6 class="mt-4">Series:
                                        @foreach($pdf->series as $series)
                                        <a href="#" class="text-success">{{ $series->seriespdf->name }}</a>,
                                        @endforeach
                                    </h6>
                                @endif
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                @if($pdf->name)
                                    <h6>Book Name: {{ $pdf->name }}</h6>
                                @endif
                                @if($pdf->translated)
                                    <h6>Translated: {{ $pdf->translated }}</h6>
                                @endif
                                @if($pdf->publisher)
                                    <h6>PUblisher: {{ $pdf->publisher }}</h6>
                                @endif
                                @if($pdf->pages)
                                    <h6>Pages: {{ $pdf->pages }}</h6>
                                @endif
                                @if($pdf->size)
                                    <h6>Size: {{ $pdf->size }}</h6>
                                @endif
                                    <h6>Date: {{ $pdf->created_at->diffForHumans() }}</h6>
                                </div>
                            </div>
                            <p id="description" class="mt-4 text-white">
                                {!! $pdf->review !!}
                            </p>

                            <div class="text-center">
                                @foreach($pdf->download as $item)
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
