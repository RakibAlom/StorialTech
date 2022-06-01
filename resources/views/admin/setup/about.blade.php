@extends('admin.layouts.app')

@section('css')
<!--  END CUSTOM STYLE FILE  -->
<link href="{{ asset('public/backend/assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
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
                        @if($about)
                            <form id="contact" class="section contact" action="{{ route('admin.update.about') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="form-group">
                                                <h5 class="">ABOUT</h5>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control mb-4 @error('about') is-invalid @enderror" name="about" placeholder="ex: type information about your website" id="about" rows="10">{{ $about->about }}</textarea>
                                                @error('about')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="image">IMAGE</label>
                                                <input type="file" class="form-control mb-4 @error('image') is-invalid @enderror" onchange="photoChange(this)" name="image" id="image">
                                                <input type="hidden" value="{{ $about->image }}" name="oldimage">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <img class="img-thumbnail" src="{{ asset('storage/app/public/'.$about->image) }}" alt="" id="photo">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success btn-lg font-weight-bold mt-4">UPDATE ABOUT</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        @else

                            <form id="contact" class="section contact" action="{{ route('admin.store.about') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="form-group">
                                                <h5 class="">ABOUT INFORMATION</h5>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control mb-4 @error('about') is-invalid @enderror" name="about" placeholder="ex: type information about your website" id="about" rows="10">{{ old('about') }}</textarea>
                                                @error('about')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="image">IMAGE (max: 100KB)</label>
                                                <input type="file" class="form-control mb-4 @error('image') is-invalid @enderror" onchange="photoChange(this)" name="image" id="image">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <img class="img-thumbnail" src="" alt="" id="photo">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success btn-lg font-weight-bold mt-4">UPLOAD ABOUT</button>
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

<script>
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
    CKEDITOR.replace( 'about' );
</script>
@endsection
