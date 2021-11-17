@extends('admin.layouts.app')

@section('css')
<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{ asset('public/backend/assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/backend/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/plugins/select2/select2.min.css') }}">
<!--  END CUSTOM STYLE FILE  -->
<script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>

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
                        @if(auth()->user()->utype === 5)
                            <form id="contact" class="section contact" action="{{ route('admin.store.source') }}" method="POST" enctype="multipart/form-data">
                        @elseif(auth()->user()->utype === 2)
                            <form id="contact" class="section contact" action="{{ route('moderator.store.source') }}" method="POST" enctype="multipart/form-data">
                        @endif
                                @csrf
                                <div class="info">
                                    <h5 class="">New Source</h5>
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="title">TITLE</label>
                                                        <input type="text" class="form-control mb-4 @error('title') is-invalid @enderror" name="title" id="title" placeholder="ex: source title" id="title" value="{{ old('title') }}" required>
                                                        @error('title')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="slug">URL SLUG</label>
                                                        <input type="text" class="form-control mb-4 @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="ex: source-url-slug" id="slug" value="{{ old('slug') }}" required>
                                                        @error('slug')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="category_id">CATEGORY</label>
                                                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" required>
                                                            <option value="">SELECT CATEGORY</option>
                                                        @foreach($categories as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                        </select>
                                                        @error('category_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="type">TYPE</label>
                                                        <input type="text" class="form-control mb-4 @error('type') is-invalid @enderror" name="type" id="type" placeholder="ex: grapic design or web design" id="type" value="{{ old('type') }}">
                                                        @error('type')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="delete_time">SHEDULED DELETE TIME (BY HOURS)</label>
                                                        <input type="text" class="form-control mb-4 @error('delete_time') is-invalid @enderror" name="delete_time" id="delete_time" placeholder="ex: 02 OR 24" value="{{ old('delete_time') }}">
                                                        @error('delete_time')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="body">FULL DETAILS</label>
                                                        <textarea class="form-control mb-4 @error('body') is-invalid @enderror" name="body" id="body" placeholder="ex: type source download link with details" rows="6">{{ old('body') }}</textarea>
                                                        @error('body')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-success btn-lg btn-block font-weight-bold">PUBLISH SOURCE</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
<script src="{{ asset('public/backend/plugins/dropify/dropify.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/blockui/jquery.blockUI.min.js') }}"></script>
<!-- <script src="plugins/tagInput/tags-input.js') }}"></script> -->
<script src="{{ asset('public/backend/assets/js/users/account-settings.js') }}"></script>

<script src="{{ asset('public/backend/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/select2/custom-select2.js') }}"></script>
<!--  END CUSTOM SCRIPTS FILE  -->

<script>

    // SLUG SCRIPT
    function delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
            callback.apply(context, args);
            }, ms || 0);
        };
    }

    $('#title').keyup(delay(function(e) {
        $.get('{{ route('title.slug') }}',
            { 'title': $(this).val() },
            function(data) {
                $('#slug').val(data.slug);
            }
        );
    }, 500));

    // SELECT 2
    $(".tagging").select2({
        tags: true,
        maximumSelectionLength: 3
    });



</script>

{{-- CKEDITOR --}}
<script>
    CKEDITOR.replace( 'body');
</script>

@endsection
