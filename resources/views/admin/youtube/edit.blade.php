@extends('admin.layouts.app')

@section('css')

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
                            <form id="contact" class="section contact" action="{{ route('admin.update.youtube', $youtube->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <h5 class="">Edit YOUTUBE CHANNEL</h5>
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">NAME</label>
                                                        <input type="text" class="form-control mb-4 @error('name') is-invalid @enderror" name="name" id="name" placeholder="ex: channel name" value="{{ $youtube->name }}" required>
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
                                                        <input type="text" class="form-control mb-4 @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="ex: channel-url-slug" value="{{ $youtube->slug }}" required>
                                                        @error('slug')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="elink">CHANNEL EMBEDED LINK</label>
                                                        <input type="text" class="form-control mb-4 @error('elink') is-invalid @enderror" name="elink" id="elink" placeholder="ex: channel embeded link" value="{{ $youtube->elink }}" required>
                                                        @error('elink')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="clink">CHANNEL LINK</label>
                                                        <input type="text" class="form-control mb-4 @error('clink') is-invalid @enderror" name="clink" id="clink" placeholder="ex: channel link" value="{{ $youtube->clink }}" required>
                                                        @error('clink')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="body">DESCIPTION</label>
                                                        <textarea class="form-control mb-4 @error('body') is-invalid @enderror" name="body" id="body" placeholder="ex: type your youtube" rows="10" required>{{ $youtube->body }}</textarea>
                                                        @error('body')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="image">IMAGE (max: 120KB / 800x480)</label>
                                                        <input type="file" class="form-control mb-4 @error('image') is-invalid @enderror" onchange="photoChange(this)" name="image" id="image" value="{{ $youtube->image }}">
                                                        <input type="hidden" name="oldimage" value="{{ $youtube->image }}">
                                                        @error('image')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="clink">CHANNEL KEYWORDS</label>
                                                        <input type="text" class="form-control mb-4 @error('keywords') is-invalid @enderror" name="keywords" id="keywords" placeholder="ex: channel keywords" value="{{ $youtube->keywords }}" required>
                                                        @error('keywords')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <img class="img-thumbnail" src="{{ asset('storage/app/public/'.$youtube->image) }}" alt="{{ $youtube->name }}" id="photo">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-success btn-lg btn-block font-weight-bold">UPDATE CHANNEL</button>
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
    // function delay(callback, ms) {
    //     var timer = 0;
    //     return function() {
    //         var context = this, args = arguments;
    //         clearTimeout(timer);
    //         timer = setTimeout(function () {
    //         callback.apply(context, args);
    //         }, ms || 0);
    //     };
    // }

    // $('#title').keyup(delay(function(e) {
    //     $.get('{{ route('title.slug') }}',
    //         { 'title': $(this).val() },
    //         function(data) {
    //             $('#slug').val(data.slug);
    //         }
    //     );
    // }, 500));

    // SELECT 2
    $(".tagging").select2({
        tags: true,
        maximumSelectionLength: 3
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
    CKEDITOR.replace( 'body');
</script>
@endsection
