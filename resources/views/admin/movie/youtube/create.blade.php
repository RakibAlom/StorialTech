@extends('admin.layouts.app')

@section('css')
<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{ asset('public/backend/assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/backend/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/plugins/select2/select2.min.css') }}">
<!--  END CUSTOM STYLE FILE  -->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

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
                            <form id="contact" class="section contact" action="{{ route('admin.store.youtube-movie') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <h5 class="">New YouTube Movie</h5>
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">MOVIE NAME</label>
                                                        <input type="text" class="form-control mb-4 @error('name') is-invalid @enderror" name="name" id="name" placeholder="ex: movie name" id="name" value="{{ old('name') }}" required>
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="slug">URL SLUG</label>
                                                        <input type="text" class="form-control mb-4 @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="ex: movie-url-slug" id="slug" value="{{ old('slug') }}" required>
                                                        @error('slug')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="category_id[]">CATEGORY</label>
                                                        <select class="form-control tagging @error('category_id[]') is-invalid @enderror" multiple="multiple" name="category_id[]" required>
                                                        @foreach($categories as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                        </select>
                                                        @error('category_id[]')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="elink">EMBEDED LINK</label>
                                                        <input type="text" class="form-control mb-4 @error('elink') is-invalid @enderror" name="elink" id="elink" placeholder="ex: enter embeded link" id="name" value="{{ old('elink') }}" required>
                                                        @error('elink')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="duration">DURATION</label>
                                                        <input type="text" class="form-control mb-4 @error('duration') is-invalid @enderror" name="duration" id="duration" placeholder="ex: 2:30 hours" id="name" value="{{ old('duration') }}">
                                                        @error('duration')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="language">LANGUAGE</label>
                                                        <input type="text" class="form-control mb-4 @error('language') is-invalid @enderror" name="language" id="language" placeholder="ex: english, bangla" id="name" value="{{ old('language') }}">
                                                        @error('language')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="release_date">RELEASE DATE</label>
                                                        <input type="text" class="form-control mb-4 @error('release_date') is-invalid @enderror" name="release_date" id="release_date" placeholder="ex: date of release" id="name" value="{{ old('release_date') }}" >
                                                        @error('release_date')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="imdb_rating">IMDB RATING</label>
                                                        <input type="text" class="form-control mb-4 @error('imdb_rating') is-invalid @enderror" name="imdb_rating" id="imdb_rating" placeholder="ex: 8/10" id="name" value="{{ old('imdb_rating') }}">
                                                        @error('imdb_rating')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="region">REGION</label>
                                                        <input type="text" class="form-control mb-4 @error('region') is-invalid @enderror" name="region" id="region" placeholder="ex: united states, china" id="name" value="{{ old('region') }}">
                                                        @error('duration')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="thumbnail">THUMBNAIL (max: 50KB / 350x200)</label>
                                                        <input type="file" class="form-control mb-4 @error('thumbnail') is-invalid @enderror" onchange="photoChange(this)" name="thumbnail" value="{{ old('thumbnail') }}">
                                                        @error('thumbnail')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="details">Details</label>
                                                        <textarea class="form-control mb-4 @error('details') is-invalid @enderror" name="details" id="details" placeholder="ex: movie details" rows="10">{{ old('details') }}</textarea>
                                                        @error('details')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="keywords">Keywords</label>
                                                        <textarea class="form-control mb-4 @error('keywords') is-invalid @enderror" name="keywords" id="keywords" placeholder="ex: movie keywords" rows="1">{{ old('keywords') }}</textarea>
                                                        @error('keywords')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <img class="ml-5" src="" alt="" id="photo">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-success btn-lg btn-block font-weight-bold">PUBLISH YOUTUBE MOVIE</button>
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

    $('#name').keyup(delay(function(e) {
        $.get('{{ route('name.slug') }}',
            { 'name': $(this).val() },
            function(data) {
                $('#slug').val(data.slug);
            }
        );
    }, 500));

    // SELECT 2
    $(".tagging").select2({
        tags: true,
        maximumSelectionLength: 6
    });

    // IMAGE SHOW SCRIPT
    function photoChange(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#photo')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail")
          	};
          	reader.readAsDataURL(input.files[0]);
     	}
    }

</script>

{{-- CKEDITOR --}}
<script>
    CKEDITOR.replace( 'details');
</script>
@endsection
