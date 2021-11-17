@extends('admin.layouts.app')

@section('css')
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
<link href="{{ asset('public/backend/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('public/backend/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
@endsection

{{-- @section('loader')
    @include('admin.layouts.loader')
@endsection --}}

@section('content')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="row">

                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    </div>
                                    <p class="w-value">{{ $storyvisits }}</p>
                                    <h5 class="">Story Visits</h5>
                                    <br>
                                    <h5 class="">{{ $story->count() }} story are public</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                                    </div>
                                    <p class="w-value">{{ $tutorialvisits }}</p>
                                    <h5 class="">Tutorial Visits</h5>
                                    <br>
                                    <h5 class="">{{ $tutorial->count() }} tutorial are public</h5>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                                    </div>
                                    <p class="w-value">{{ $pdfvisits }}</p>
                                    <h5 class="">PDF Visits</h5>
                                    <br>
                                    <h5 class="">{{ $pdf->count() }} pdf are public</h5>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                                    </div>
                                    <p class="w-value">{{ $templatevisits }}</p>
                                    <h5 class="">Template Visits</h5>
                                    <br>
                                    <h5 class="">{{ $template->count() }} template are public</h5>

                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-film"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect><line x1="7" y1="2" x2="7" y2="22"></line><line x1="17" y1="2" x2="17" y2="22"></line><line x1="2" y1="12" x2="22" y2="12"></line><line x1="2" y1="7" x2="7" y2="7"></line><line x1="2" y1="17" x2="7" y2="17"></line><line x1="17" y1="17" x2="22" y2="17"></line><line x1="17" y1="7" x2="22" y2="7"></line></svg>
                                    </div>
                                    <p class="w-value">{{ $movievisits }}</p>
                                    <h5 class="">Movie Visits</h5>
                                    <br>
                                    <h5 class="">{{ $movie->count() }} movie / {{ $ymovie->count() }} utube movie</h5>

                                </div>
                            </div>
                        </div> --}}
                        
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                                    </div>
                                    <p class="w-value">{{ $blogvisits }}</p>
                                    <h5 class="">Blog Visits</h5>
                                    <br>
                                    <h5 class="">{{ $blog->count() }} blog posts</h5>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                                    </div>
                                    <p class="w-value">{{ $sourcevisits }}</p>
                                    <h5 class="">Source Visits</h5>
                                    <br>
                                    <h5 class="">{{ $source->count() }} source</h5>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    </div>
                                    <p class="w-value">{{ $totalvisits }}</p>
                                    <h5 class="">Total Visits</h5>
                                    <br>
                                    <h5 class="">All visit status</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    </div>
                                    <p class="w-value">{{ $users->count() }}</p>
                                    <h5 class="">Total Users</h5>
                                    <br>
                                    <h5 class="">All of normal users</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                @if(auth()->user()->utype === 5)
                                    <a href="{{ route('admin.create.story') }}" class="btn btn-primary btn-block">New Story</a>
                                    <br>
                                    <a href="{{ route('admin.story') }}" class="btn btn-success btn-block">Story List ({{ $story->count() }})</a>
                                @elseif(auth()->user()->utype === 2)
                                    <a href="{{ route('moderator.create.story') }}" class="btn btn-primary btn-block">New Story</a>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                @if(auth()->user()->utype === 5)
                                    <a href="{{ route('admin.create.tutorial') }}" class="btn btn-primary btn-block">New Tutorial</a>
                                    <br>
                                    <a href="{{ route('admin.tutorial') }}" class="btn btn-success btn-block">Tutorial List ({{ $tutorial->count() }})</a>
                                @elseif(auth()->user()->utype === 2)
                                <a href="{{ route('moderator.create.tutorial') }}" class="btn btn-primary btn-block">New Tutorial</a>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                @if(auth()->user()->utype === 5)
                                    <a href="{{ route('admin.create.pdf') }}" class="btn btn-primary btn-block">New PDF</a>
                                    <br>
                                    <a href="{{ route('admin.pdf') }}" class="btn btn-success btn-block">PDF List ({{ $pdf->count() }})</a>
                                @elseif(auth()->user()->utype === 2)
                                    <a href="{{ route('moderator.create.pdf') }}" class="btn btn-primary btn-block">New PDF</a>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                @if(auth()->user()->utype === 5)
                                    <a href="{{ route('admin.create.template') }}" class="btn btn-primary btn-block">New Template</a>
                                    <br>
                                    <a href="{{ route('admin.template') }}" class="btn btn-success btn-block">Template List ({{ $template->count() }})</a>
                                @elseif(auth()->user()->utype === 2)
                                    <a href="{{ route('moderator.create.template') }}" class="btn btn-primary btn-block">New Template</a>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                @if(auth()->user()->utype === 5)
                                    <a href="{{ route('admin.create.blog') }}" class="btn btn-primary btn-block">New Blog</a>
                                    <br>
                                    <a href="{{ route('admin.blog') }}" class="btn btn-success btn-block">Blog List ({{ $blog->count() }})</a>
                                @elseif(auth()->user()->utype === 2)
                                    <a href="{{ route('moderator.create.blog') }}" class="btn btn-primary btn-block">New Blog</a>
                                @endif
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                    <a href="{{ route('admin.create.movie') }}" class="btn btn-primary btn-block">New Movie</a>
                                @if(auth()->user()->utype === 5)
                                    <br>
                                    <a href="{{ route('admin.movie') }}" class="btn btn-success btn-block">Movie List ({{ $movie->count() }})</a>
                                @endif
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                    <a href="{{ route('admin.create.youtube-movie') }}" class="btn btn-primary btn-block">New YT Movie</a>
                                @if(auth()->user()->utype === 5)
                                    <br>
                                    <a href="{{ route('admin.youtube-movie') }}" class="btn btn-success btn-block">Youtube Movie ({{ $ymovie->count() }})</a>
                                @endif
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                @if(auth()->user()->utype === 5)
                                    <a href="{{ route('admin.create.source') }}" class="btn btn-primary btn-block">New Source</a>
                                    <br>
                                    <a href="{{ route('admin.source') }}" class="btn btn-success btn-block">Source List ({{ $source->count() }})</a>
                                @elseif(auth()->user()->utype === 2)
                                    <a href="{{ route('moderator.create.source') }}" class="btn btn-primary btn-block">New Source</a>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @if(auth()->user()->utype === 5)
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-responsive-sm">
                                <tr class="text-white">
                                    <th>SL</th>
                                    <th>NAME</th></th>
                                    <th>STORY</th>
                                    <th>TUTORIAL</th></th>
                                    <th>PDF</th>
                                    <th>TEMPLATE</th>
                                    <!--<th>MOVIE</th>-->
                                    <!--<th>YTMOVIE</th>-->
                                    <th>BLOG</th>
                                    <th>PREFREE</th>
                                </tr>
                            @foreach($admins as $admin)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $admin->username }}</td>
                                    <td>{{ $admin->story->count() }}</td>
                                    <td>{{ $admin->tutorial->count() }}</td>
                                    <td>{{ $admin->pdf->count() }}</td>
                                    <td>{{ $admin->template->count() }}</td>
                                    <!--<td>{{ $admin->movie->count() }}</td>-->
                                    <!--<td>{{ $admin->ytmovie->count() }}</td>-->
                                    <td>{{ $admin->blog->count() }}</td>
                                    <td>{{ $admin->source->count() }}</td>
                                </tr>
                            @endforeach
                            </table>
                        </div>
                    </div>
                @endif

                </div>

            </div>

        </div>
    </div>
    <!--  END CONTENT AREA  -->

@endsection

@section('js')
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{ asset('public/backend/plugins/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/js/dashboard/dash_1.js') }}"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
@endsection
