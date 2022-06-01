@php
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<h5>','</h5>','<em>','</em>','<strong>','</strong>','<span>','</span>');
    $bl_details = App\Models\Tools\BacklinkPageDetails::first();
@endphp

@section('title', $bl_details->meta_title)
@section('meta-title', $bl_details->meta_title)
@section('meta-description', Str::words(str_replace($replace, ' ', $bl_details->description), 25,''))
@section('meta-keywords', $bl_details->keywords)
@section('og-title', $bl_details->meta_title)
@section('og-description', Str::words(str_replace($replace, ' ', $bl_details->description), 25,''))
@section('twitter-title', $bl_details->meta_title)
@section('twitter-description', Str::words(str_replace($replace, ' ', $bl_details->description), 25,''))

@if($bl_details->cover_image)
@section('meta-image', asset('storage/app/public/'.$bl_details->cover_image))
@section('og-image', asset('storage/app/public/'.$bl_details->cover_image))
@section('twitter-image', asset('storage/app/public/'.$bl_details->cover_image))
@endif

@extends('layouts.app')

@section('css')
<style>
    table .tbody-tr td {
        font-size: 14px;
        color: #6c757d;
        line-height: 21px;
    }
    table .tbody-tr td.name {
        font-weight: 500;
    }
    table .tbody-tr td a {
        color: #6658dd;
        text-decoration: none;
    }
    table tr th{
        color: #414142;
;
    }
</style>
@endsection

@section('aside')
    @include('layouts.aside')
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

                        <div class="entry-header entry-header-style-1 mb-30 mt-10">
                            <h1 class="entry-title mb-10 font-weight-900">
                                {{ $bl_details->title }}
                            </h1>
                            @if ($bl_details->slogan)
                                <p>{{ $bl_details->slogan }}</p>
                            @endif
                        </div>
                        <!--end single header-->
                        
                        @include('include.ads.single_post_top_ads')
                        
                        <!--figure-->
                        <article class="entry-wraper mb-50">

                            <table class="table table-responsive-sm mt-30 mb-20">
                                    <tr class="bg-grey">
                                        <th>Authority Site</th>
                                        <th>TLD</th>
                                        <th>DR</th>
                                        <th>Link Type</th>
                                        <th>Action</th>
                                    </tr>
                            @foreach($backlinks as $item)
                                <tr class="tbody-tr">
                                    <td class="name">{{ $item->authority_site }}</td>
                                    <td>{{ $item->tld }}</td>
                                    <td>{{ $item->dr }}</td>
                                    <td>{{ $item->link_type }}</td>
                                    <td>
                                        <a href="{{ $item->website_link }}" rel="noopener nofollow" target="_blank"><i class="fa fa-external-link mr-1"></i> URL</a>
                                    </td>
                                </tr>
                            @endforeach

                            </table>

                        </article>
                        
                        @include('include.ads.single_post_bottom_ads')

                        <article class="entry-wraper mb-50 mt-10">
                            {!! $bl_details->description !!}
                        </article>
                        
                        @include('include.ads.single_post_bottom_ads')
                        
                    </div>
                </div>

                <div class="col-lg-4 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        <div class="sidebar-widget widget-latest-posts mb-10">
                            @include('include.ads.sidebar_bottom_ads')
                        </div>
                        <div class="sidebar-widget widget-latest-posts mb-10">
                            @include('include.ads.sidebar_bottom_ads')
                        </div>
                        <div class="sidebar-widget widget-latest-posts mb-10">
                            @include('include.ads.sidebar_bottom_ads')
                        </div>
                        <div class="sidebar-widget widget-latest-posts mb-10">
                            @include('include.ads.sidebar_bottom_ads')
                        </div>
                        <div class="sidebar-widget widget-latest-posts mb-10">
                            @include('include.ads.sidebar_bottom_ads')
                        </div>
                        <div class="sidebar-widget widget-latest-posts mb-10">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection



