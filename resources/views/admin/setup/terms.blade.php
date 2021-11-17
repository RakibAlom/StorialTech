@extends('admin.layouts.app')

@section('css')
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
                        @if($terms)
                            <form id="contact" class="section contact" action="{{ route('admin.update.terms') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="form-group">
                                                <h5 class="">TERMS & CONDITION</h5>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control mb-4 @error('terms') is-invalid @enderror" name="terms" placeholder="ex: type your terms & condition" id="terms" rows="10">{{ $terms->terms }}</textarea>
                                                @error('terms')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <button class="btn btn-success btn-lg font-weight-bold">UPDATE TERMS & CONDITION</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>

                        @else

                            <form id="contact" class="section contact" action="{{ route('admin.store.terms') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="form-group">
                                                <h5 class="">TERMS & CONDITION</h5>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control mb-4 @error('terms') is-invalid @enderror" name="terms" placeholder="ex: type your terms & condition" id="terms" rows="10">{{ old('terms') }}</textarea>
                                                @error('terms')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <button class="btn btn-success btn-lg font-weight-bold">PUBLISH TERMS & CONDITION</button>
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
    CKEDITOR.replace( 'terms' );
</script>
@endsection
