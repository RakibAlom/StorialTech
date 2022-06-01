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
                        @if(!$ads)
                            <form id="contact" class="section contact" action="{{ route('admin.ads.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <h5 class="">ADVERTISE PROGRAM</h5>
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="section_top_banner_ads">SECTION TOP BANNER ADS</label>
                                                        <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('section_top_banner_ads') is-invalid @enderror" name="section_top_banner_ads" placeholder="ex: paste your responsive ads code" rows="8">{{ old('section_top_banner_ads') }}</textarea>
                                                        @error('section_top_banner_ads')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="section_bottom_banner_ads">SECTION BOTTOM BANNER ADS</label>
                                                        <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('section_bottom_banner_ads') is-invalid @enderror" name="section_bottom_banner_ads" placeholder="ex: paste your responsive ads code" rows="8">{{ old('section_bottom_banner_ads') }}</textarea>
                                                        @error('section_bottom_banner_ads')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="single_post_top_ads">SINGLE POST TOP ADS</label>
                                                        <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('single_post_top_ads') is-invalid @enderror" name="single_post_top_ads" placeholder="ex: paste your responsive ads code" rows="8">{{ old('single_post_top_ads') }}</textarea>
                                                        @error('single_post_top_ads')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="single_post_bottom_ads">SINGLE POST BOTTOM ADS</label>
                                                        <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('single_post_bottom_ads') is-invalid @enderror" name="single_post_bottom_ads" placeholder="ex: paste your responsive ads code" rows="8">{{ old('single_post_bottom_ads') }}</textarea>
                                                        @error('single_post_bottom_ads')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="sidebar_top_ads">SIDEBAR TOP ADS</label>
                                                        <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('sidebar_top_ads') is-invalid @enderror" name="sidebar_top_ads" placeholder="ex: paste your responsive ads code" rows="8">{{ old('sidebar_top_ads') }}</textarea>
                                                        @error('sidebar_top_ads')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="sidebar_bottom_ads">SIDEBAR BOTTOM ADS</label>
                                                        <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('sidebar_bottom_ads') is-invalid @enderror" name="sidebar_bottom_ads" placeholder="ex: paste your responsive ads code" rows="8">{{ old('sidebar_bottom_ads') }}</textarea>
                                                        @error('sidebar_bottom_ads')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-success btn-lg btn-block font-weight-bold">PUBLISH YOUR ADS PROGRAM</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else

                        <form id="contact" class="section contact" action="{{ route('admin.ads.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="info">
                                <h5 class="">ADVERTISE PROGRAM</h5>
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="section_top_banner_ads">SECTION TOP BANNER ADS</label>
                                                    <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('section_top_banner_ads') is-invalid @enderror" name="section_top_banner_ads" placeholder="ex: paste your responsive ads code" rows="8">{{ $ads->section_top_banner_ads }}</textarea>
                                                    @error('section_top_banner_ads')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="section_bottom_banner_ads">SECTION BOTTOM BANNER ADS</label>
                                                    <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('section_bottom_banner_ads') is-invalid @enderror" name="section_bottom_banner_ads" placeholder="ex: paste your responsive ads code" rows="8">{{ $ads->section_bottom_banner_ads }}</textarea>
                                                    @error('section_bottom_banner_ads')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="single_post_top_ads">SINGLE POST TOP ADS</label>
                                                    <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('single_post_top_ads') is-invalid @enderror" name="single_post_top_ads" placeholder="ex: paste your responsive ads code" rows="8">{{ $ads->single_post_top_ads }}</textarea>
                                                    @error('single_post_top_ads')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="single_post_bottom_ads">SINGLE POST BOTTOM ADS</label>
                                                    <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('single_post_bottom_ads') is-invalid @enderror" name="single_post_bottom_ads" placeholder="ex: paste your responsive ads code" rows="8">{{ $ads->single_post_bottom_ads }}</textarea>
                                                    @error('single_post_bottom_ads')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sidebar_top_ads">SIDEBAR TOP ADS</label>
                                                    <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('sidebar_top_ads') is-invalid @enderror" name="sidebar_top_ads" placeholder="ex: paste your responsive ads code" rows="8">{{ $ads->sidebar_top_ads }}</textarea>
                                                    @error('sidebar_top_ads')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sidebar_bottom_ads">SIDEBAR BOTTOM ADS</label>
                                                    <textarea  id="full-featured-non-premium" class="form-control mb-4 @error('sidebar_bottom_ads') is-invalid @enderror" name="sidebar_bottom_ads" placeholder="ex: paste your responsive ads code" rows="8">{{ $ads->sidebar_bottom_ads }}</textarea>
                                                    @error('sidebar_bottom_ads')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button class="btn btn-success btn-lg btn-block font-weight-bold">UPDATE YOUR ADS PROGRAM</button>
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
