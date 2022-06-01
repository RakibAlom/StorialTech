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
                        @if($helps)
                            <form id="contact" class="section contact" action="{{ route('admin.update.helps') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="form-group">
                                                <h5 class="">HELPS SUPPORT</h5>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control mb-4 @error('helps') is-invalid @enderror" name="helps" placeholder="ex: type your helps support" id="helps" rows="10">{{ $helps->helps }}</textarea>
                                                @error('helps')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <button class="btn btn-success btn-lg font-weight-bold">UPDATE HELPS SUPPORT</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>

                        @else

                            <form id="contact" class="section contact" action="{{ route('admin.store.helps') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="form-group">
                                                <h5 class="">HELPS SUPPORT</h5>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control mb-4 @error('helps') is-invalid @enderror" name="helps" placeholder="ex: type your helps support" id="helps" rows="10">{{ old('helps') }}</textarea>
                                                @error('helps')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <button class="btn btn-success btn-lg font-weight-bold">PUBLISH HELPS SUPPORT</button>
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

{{-- CKEDITOR --}}
<script>
    CKEDITOR.replace( 'helps' );
</script>

@endsection
