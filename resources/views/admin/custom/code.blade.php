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
                        @if(!$custom)
                            <form id="contact" class="section contact" action="{{ route('admin.custom.code.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <h5 class="">CUSTOM CODE FOR WEBSITE BUILD</h5>
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="header_custom_code">HEADER CUSTOM CODE</label>
                                                        <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('header_custom_code') is-invalid @enderror" name="header_custom_code" placeholder="ex: link your css or js file links" rows="8">{{ old('header_custom_code') }}</textarea>
                                                        @error('header_custom_code')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="header_custom_css">HEADER CUSTOM CSS CODE</label>
                                                        <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('header_custom_css') is-invalid @enderror" name="header_custom_css" placeholder="ex: .class {...} or tag {...}" rows="8">{{ old('header_custom_css') }}</textarea>
                                                        @error('header_custom_css')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="footer_custom_code">FOOTER CUSTOM CODE</label>
                                                        <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('footer_custom_code') is-invalid @enderror" name="footer_custom_code" placeholder="ex: link your js file or custom file links" rows="8">{{ old('footer_custom_code') }}</textarea>
                                                        @error('footer_custom_code')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="footer_custom_js">FOOTER CUSTOM JS</label>
                                                        <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('footer_custom_js') is-invalid @enderror" name="footer_custom_js" placeholder="ex: <script>...</script>" rows="8">{{ old('footer_custom_js') }}</textarea>
                                                        @error('footer_custom_js')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-success btn-lg btn-block font-weight-bold">BUILD CUSTOM CODE</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else

                        <form id="contact" class="section contact" action="{{ route('admin.custom.code.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="info">
                                <h5 class="">CUSTOM CODE FOR WEBSITE BUILD</h5>
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="header_custom_code">HEADER CUSTOM CODE</label>
                                                    <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('header_custom_code') is-invalid @enderror" name="header_custom_code" placeholder="ex: link your css or js file links" rows="8">{{ $custom->header_custom_code }}</textarea>
                                                    @error('header_custom_code')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="header_custom_css">HEADER CUSTOM CSS CODE</label>
                                                    <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('header_custom_css') is-invalid @enderror" name="header_custom_css" placeholder="ex: .class {...} or tag {...}" rows="8">{{ $custom->header_custom_css }}</textarea>
                                                    @error('header_custom_css')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="footer_custom_code">FOOTER CUSTOM CODE</label>
                                                    <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('footer_custom_code') is-invalid @enderror" name="footer_custom_code" placeholder="ex: link your js file or custom file links" rows="8">{{ $custom->footer_custom_code }}</textarea>
                                                    @error('footer_custom_code')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="footer_custom_js">FOOTER CUSTOM JS</label>
                                                    <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('footer_custom_js') is-invalid @enderror" name="footer_custom_js" placeholder="ex: <script>...</script>" rows="8">{{ $custom->footer_custom_js }}</textarea>
                                                    @error('footer_custom_js')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button class="btn btn-success btn-lg btn-block font-weight-bold">UPDATE CUSTOM CODE</button>
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
