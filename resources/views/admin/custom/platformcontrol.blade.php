@extends('admin.layouts.app')

@section('css')
<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{ asset('public/backend/assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
<!--  END CUSTOM STYLE FILE  -->
@endsection

{{-- @section('loader')
    @include('admin.layouts.loader')
@endsection --}}

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="account-settings-container layout-top-spacing">
            <div class="row">
                <div class="col-12">
                    @include('admin.layouts.alerts')
                </div>
            </div>
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        @if(!$platform)
                            <form id="contact" class="section contact" action="{{ route('admin.control.platform.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <h5 class="">PLATFORM ENABLE/DISABLE</h5>
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="story_status">STORY</label>
                                                        <select class="form-control mb-4 @error('story_status') is-invalid @enderror" name="story_status">
                                                            <option value="">SELECT OPTION</option>
                                                            <option value="1">ENABLE</option>
                                                            <option value="0">DISABLE</option>
                                                        </select>
                                                        @error('story_status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="tutorial_status">TUTORIAL</label>
                                                        <select class="form-control mb-4 @error('tutorial_status') is-invalid @enderror" name="tutorial_status">
                                                            <option value="">SELECT OPTION</option>
                                                            <option value="1">ENABLE</option>
                                                            <option value="0">DISABLE</option>
                                                        </select>
                                                        @error('tutorial_status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="pdf_status">PDF</label>
                                                        <select class="form-control mb-4 @error('pdf_status') is-invalid @enderror" name="pdf_status">
                                                            <option value="">SELECT OPTION</option>
                                                            <option value="1">ENABLE</option>
                                                            <option value="0">DISABLE</option>
                                                        </select>
                                                        @error('pdf_status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="template_status">TEMPLATE</label>
                                                        <select class="form-control mb-4 @error('template_status') is-invalid @enderror" name="template_status">
                                                            <option value="">SELECT OPTION</option>
                                                            <option value="1">ENABLE</option>
                                                            <option value="0">DISABLE</option>
                                                        </select>
                                                        @error('template_status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="movie_status">MOVIE</label>
                                                        <select class="form-control mb-4 @error('movie_status') is-invalid @enderror" name="movie_status">
                                                            <option value="">SELECT OPTION</option>
                                                            <option value="1">ENABLE</option>
                                                            <option value="0">DISABLE</option>
                                                        </select>
                                                        @error('movie_status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="blog_status">BLOG</label>
                                                        <select class="form-control mb-4 @error('blog_status') is-invalid @enderror" name="blog_status">
                                                            <option value="">SELECT OPTION</option>
                                                            <option value="1">ENABLE</option>
                                                            <option value="0">DISABLE</option>
                                                        </select>
                                                        @error('blog_status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="source_status">PREMIUM FREE SOURCE</label>
                                                        <select class="form-control mb-4 @error('source_status') is-invalid @enderror" name="source_status">
                                                            <option value="">SELECT OPTION</option>
                                                            <option value="1">ENABLE</option>
                                                            <option value="0">DISABLE</option>
                                                        </select>
                                                        @error('source_status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="youtube_status">YOUTUBE CHANNEL</label>
                                                        <select class="form-control mb-4 @error('youtube_status') is-invalid @enderror" name="youtube_status">
                                                            <option value="">SELECT OPTION</option>
                                                            <option value="1">ENABLE</option>
                                                            <option value="0">DISABLE</option>
                                                        </select>
                                                        @error('youtube_status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="backlinks_status">BACKLINKS PAGE</label>
                                                        <select class="form-control mb-4 @error('backlinks_status') is-invalid @enderror" name="backlinks_status">
                                                            <option value="">SELECT OPTION</option>
                                                            <option value="1">ENABLE</option>
                                                            <option value="0">DISABLE</option>
                                                        </select>
                                                        @error('backlinks_status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="tools_status">EXTRA TOOLS MENU</label>
                                                        <select class="form-control mb-4 @error('tools_status') is-invalid @enderror" name="tools_status">
                                                            <option value="">SELECT OPTION</option>
                                                            <option value="1">ENABLE</option>
                                                            <option value="0">DISABLE</option>
                                                        </select>
                                                        @error('tools_status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="web_stories_status">WEB STORY</label>
                                                        <select class="form-control mb-4 @error('web_stories_status') is-invalid @enderror" name="web_stories_status">
                                                            <option value="">SELECT OPTION</option>
                                                            <option value="1">ENABLE</option>
                                                            <option value="0">DISABLE</option>
                                                        </select>
                                                        @error('web_stories_status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-success btn-lg btn-block font-weight-bold">BUILD SETTING</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else

                        <form id="contact" class="section contact" action="{{ route('admin.control.platform.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="info">
                                <h5 class="">PLATFORM ENABLE/DISABLE</h5>
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="story_status">STORY</label>
                                                    <select class="form-control mb-4 @error('story_status') is-invalid @enderror" name="story_status">
                                                        <option value="">SELECT OPTION</option>
                                                        <option value="1" @if($platform->story_status == 1) selected @endif>ENABLE</option>
                                                        <option value="0" @if($platform->story_status == 0) selected @endif>DISABLE</option>
                                                    </select>
                                                    @error('story_status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tutorial_status">TUTORIAL</label>
                                                    <select class="form-control mb-4 @error('tutorial_status') is-invalid @enderror" name="tutorial_status">
                                                        <option value="">SELECT OPTION</option>
                                                        <option value="1" @if($platform->tutorial_status == 1) selected @endif>ENABLE</option>
                                                        <option value="0" @if($platform->tutorial_status == 0) selected @endif>DISABLE</option>
                                                    </select>
                                                    @error('tutorial_status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="pdf_status">PDF</label>
                                                    <select class="form-control mb-4 @error('pdf_status') is-invalid @enderror" name="pdf_status">
                                                        <option value="">SELECT OPTION</option>
                                                        <option value="1" @if($platform->pdf_status == 1) selected @endif>ENABLE</option>
                                                        <option value="0" @if($platform->pdf_status == 0) selected @endif>DISABLE</option>
                                                    </select>
                                                    @error('pdf_status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="template_status">TEMPLATE</label>
                                                    <select class="form-control mb-4 @error('template_status') is-invalid @enderror" name="template_status">
                                                        <option value="">SELECT OPTION</option>
                                                        <option value="1" @if($platform->template_status == 1) selected @endif>ENABLE</option>
                                                        <option value="0" @if($platform->template_status == 0) selected @endif>DISABLE</option>
                                                    </select>
                                                    @error('template_status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="movie_status">MOVIE</label>
                                                    <select class="form-control mb-4 @error('movie_status') is-invalid @enderror" name="movie_status">
                                                        <option value="">SELECT OPTION</option>
                                                        <option value="1" @if($platform->movie_status == 1) selected @endif>ENABLE</option>
                                                        <option value="0" @if($platform->movie_status == 0) selected @endif>DISABLE</option>
                                                    </select>
                                                    @error('movie_status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="blog_status">BLOG</label>
                                                    <select class="form-control mb-4 @error('blog_status') is-invalid @enderror" name="blog_status">
                                                        <option value="">SELECT OPTION</option>
                                                        <option value="1" @if($platform->blog_status == 1) selected @endif>ENABLE</option>
                                                        <option value="0" @if($platform->blog_status == 0) selected @endif>DISABLE</option>
                                                    </select>
                                                    @error('blog_status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="source_status">PREMIUM FREE SOURCE</label>
                                                    <select class="form-control mb-4 @error('source_status') is-invalid @enderror" name="source_status">
                                                        <option value="">SELECT OPTION</option>
                                                        <option value="1" @if($platform->source_status == 1) selected @endif>ENABLE</option>
                                                        <option value="0" @if($platform->source_status == 0) selected @endif>DISABLE</option>
                                                    </select>
                                                    @error('source_status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="youtube_status">YOUTUBE CHANNEL</label>
                                                    <select class="form-control mb-4 @error('youtube_status') is-invalid @enderror" name="youtube_status">
                                                        <option value="">SELECT OPTION</option>
                                                        <option value="1" @if($platform->youtube_status == 1) selected @endif>ENABLE</option>
                                                        <option value="0" @if($platform->youtube_status == 0) selected @endif>DISABLE</option>
                                                    </select>
                                                    @error('youtube_status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="backlinks_status">BACKLINKS PAGE</label>
                                                    <select class="form-control mb-4 @error('backlinks_status') is-invalid @enderror" name="backlinks_status">
                                                        <option value="">SELECT OPTION</option>
                                                        <option value="1" @if($platform->backlinks_status == 1) selected @endif>ENABLE</option>
                                                        <option value="0" @if($platform->backlinks_status == 0) selected @endif>DISABLE</option>
                                                    </select>
                                                    @error('backlinks_status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tools_status">EXTRA TOOLS MENU</label>
                                                    <select class="form-control mb-4 @error('tools_status') is-invalid @enderror" name="tools_status">
                                                        <option value="">SELECT OPTION</option>
                                                        <option value="1" @if($platform->tools_status == 1) selected @endif>ENABLE</option>
                                                        <option value="0" @if($platform->tools_status == 0) selected @endif>DISABLE</option>
                                                    </select>
                                                    @error('tools_status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="web_stories_status">WEB STORY</label>
                                                    <select class="form-control mb-4 @error('web_stories_status') is-invalid @enderror" name="web_stories_status">
                                                        <option value="">SELECT OPTION</option>
                                                        <option value="1" @if($platform->web_stories_status == 1) selected @endif>ENABLE</option>
                                                        <option value="0" @if($platform->web_stories_status == 0) selected @endif>DISABLE</option>
                                                    </select>
                                                    @error('web_stories_status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button class="btn btn-success btn-lg btn-block font-weight-bold">UPDATE PLATFORM CONTROL</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        @endif
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
<!--  BEGIN CUSTOM SCRIPTS FILE  -->
<script src="{{ asset('public/backend/assets/js/users/account-settings.js') }}"></script>
<!--  END CUSTOM SCRIPTS FILE  -->


{{-- EDITOR --}}
<script>

</script>

@endsection
