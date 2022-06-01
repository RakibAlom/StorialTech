@php
    $platform = App\Models\Custom\PlatformControl::first();
@endphp

@extends('admin.layouts.app')

@section('css')
<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{ asset('public/backend/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/plugins/table/datatable/custom_dt_html5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/plugins/table/datatable/dt-global_style.css') }}">
<!--  END CUSTOM STYLE FILE  -->
@endsection

{{-- @section('loader')
    @include('admin.layouts.loader')
@endsection --}}

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row layout-spacing">

            <div class="col-xl-12 layout-top-spacing">

                <div class="bio layout-spacing ">
                    <div class="widget-content widget-content-area">

                        <div class="bio-skill-box">

                            <div class="row">

                                <div class="col-lg-4 col-sm-6 col-12">
                                    @if($platform->blog_status == 1)
                                        <div class="d-flex b-skills mb-4">
                                            <div>
                                                <h5 class="font-weight-bold text-dark">Blog List</h5>
                                                <ul>
                                                @foreach ($blogs as $item)
                                                    <li><a class="text-success" href="{{ $item->path() }}" target="_blank">{{ $item->title }}</a></li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                    @if($platform->pdf_status == 1)
                                        <div class="d-flex b-skills mb-4">
                                            <div>
                                                <h5 class="font-weight-bold text-dark">PDF List</h5>
                                                <ul>
                                                @foreach ($pdfs as $item)
                                                    <li><a class="text-success" href="{{ $item->path() }}" target="_blank">{{ $item->name }}</a></li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    @if($platform->tutorial_status == 1)
                                        <div class="d-flex b-skills mb-4">
                                            <div>
                                                <h5 class="font-weight-bold text-dark">Tutorial List</h5>
                                                <ul>
                                                @foreach ($tutorials as $item)
                                                    <li><a class="text-success" href="{{ $item->path() }}" target="_blank">{{ $item->title }}</a></li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                    @if($platform->tools_status == 1)

                                        <div class="d-flex b-skills mb-4">
                                            <div>
                                                <h5 class="font-weight-bold text-dark">Tools</h5>
                                                <ul>
                                                @foreach ($tools as $item)
                                                    <li><a class="text-success" href="{{ $item->website_links }}" target="_blank">{{ $item->tool_title }}</a></li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                    @if($platform->source_status == 1)

                                        <div class="d-flex b-skills mb-4">
                                            <div>
                                                <h5 class="font-weight-bold text-dark">Premium Free Source</h5>
                                                <ul>
                                                @foreach ($sources as $item)
                                                    <li><a class="text-success" href="{{ $item->path() }}" target="_blank">{{ $item->title }}</a></li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    @if($platform->story_status == 1)
                                        <div class="d-flex b-skills mb-4">
                                            <div>
                                                <h5 class="font-weight-bold text-dark">Story List</h5>
                                                <ul>
                                                @foreach ($stories as $item)
                                                    <li><a class="text-success" href="{{ $item->path() }}" target="_blank">{{ $item->title }}</a></li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                    @if($platform->template_status == 1)
                                        <div class="d-flex b-skills mb-4">
                                            <div>
                                                <h5 class="font-weight-bold text-dark">Template/Script List</h5>
                                                <ul>
                                                @foreach ($templates as $item)
                                                    <li><a class="text-success" href="{{ $item->path() }}" target="_blank">{{ $item->title }}</a></li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    @if($platform->movie_status == 1)
                                        <div class="d-flex b-skills mb-4">
                                            <div>
                                                <h5 class="font-weight-bold text-dark">Movie List</h5>
                                                <ul>
                                                @foreach ($movies as $item)
                                                    <li><a class="text-success" href="{{ $item->path() }}" target="_blank">{{ $item->name }}</a></li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
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
<!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
<script src="{{ asset('public/backend/plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>
<script>
    
</script>

@endsection
