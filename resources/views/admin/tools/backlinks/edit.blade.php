@extends('admin.layouts.app')

@section('css')
<!--  BEGIN CUSTOM STYLE FILE  -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/plugins/dropify/dropify.min.css') }}">
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
                <div class="col-12 form-group">
                    @include('admin.layouts.alerts')
                </div>
            </div>
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="contact" class="section contact" action="{{ route('admin.update-backlinks', $backlinks->id) }}" method="POST">
                                @csrf
                                <div class="info">
                                    <h5 class="text-center">Edit Backlinks</h5>
                                    <div class="row">
                                        <div class="col-md-6 mx-auto">
                                            <div class="row">
                                                <div class="col-12 form-group">
                                                    <input type="text" class="form-control @error('authority_site') is-invalid @enderror" name="authority_site" id="authority_site" placeholder="sitename" id="authority_site" value="{{ $backlinks->authority_site }}" required>
                                                    @error('authority_site')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 form-group">
                                                    <input type="text" class="form-control @error('tld') is-invalid @enderror" name="tld" id="tld" placeholder=".com .net .org" id="tld" value="{{ $backlinks->tld }}" required>
                                                    @error('tld')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 form-group">
                                                    <input type="text" class="form-control @error('website_link') is-invalid @enderror" name="website_link" id="website_link" placeholder="http://website.com" id="website_link" value="{{ $backlinks->website_link }}" required>
                                                    @error('website_link')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 form-group">
                                                    <input type="text" class="form-control @error('dr') is-invalid @enderror" name="dr" id="dr" placeholder="domain rating" id="dr" value="{{ $backlinks->dr }}" required>
                                                    @error('dr')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 form-group">
                                                    <select class="form-control @error('link_type') is-invalid @enderror" name="link_type" id="link_type" id="link_type" value="{{ $backlinks->link_type }}" required>
                                                        <option value="Dofollow" @if($backlinks->link_type == 'Dofollow') selected @endif>Dofollow</option>
                                                        <option value="Nofollow" @if($backlinks->link_type == 'Nofollow') selected @endif>Nofollow</option>
                                                    </select>
                                                    @error('link_type')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>


                                                <div class="col-12 form-group">
                                                    <div class="form-group">
                                                        <button class="btn btn-success btn-lg">Update Backlinks</button>
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
<!--  END CUSTOM SCRIPTS FILE  -->

<script>


</script>
@endsection
