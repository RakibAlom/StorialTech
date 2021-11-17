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
                            <form id="contact" class="section contact" action="{{ route('admin.store.youtube') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <h5 class="">NEW YOUTUBE CHANNEL</h5>
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">NAME</label>
                                                        <input type="text" class="form-control mb-4 @error('name') is-invalid @enderror" name="name" id="name" placeholder="ex: channel name" value="{{ old('name') }}" required>
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
                                                        <input type="text" class="form-control mb-4 @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="ex: channel-url-slug" value="{{ old('slug') }}" required>
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
                                                        <input type="text" class="form-control mb-4 @error('elink') is-invalid @enderror" name="elink" id="elink" placeholder="ex: channel embeded link" value="{{ old('elink') }}" required>
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
                                                        <input type="text" class="form-control mb-4 @error('clink') is-invalid @enderror" name="clink" id="clink" placeholder="ex: channel link" value="{{ old('clink') }}" required>
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
                                                        <textarea class="form-control mb-4 @error('body') is-invalid @enderror" name="body" id="body" placeholder="ex: type your youtube" rows="10" required>{{ old('body') }}</textarea>
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
                                                        <input type="file" class="form-control mb-4 @error('image') is-invalid @enderror" onchange="photoChange(this)" name="image" id="image" value="{{ old('image') }}">
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
                                                        <input type="text" class="form-control mb-4 @error('keywords') is-invalid @enderror" name="keywords" id="keywords" placeholder="ex: channel keywords" value="{{ old('keywords') }}" required>
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
                                                        <button class="btn btn-success btn-lg btn-block font-weight-bold">PUBLISH CHANNEL</button>
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
