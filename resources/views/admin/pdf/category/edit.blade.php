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
                <div class="col-12">
                    @include('admin.layouts.alerts')
                </div>
            </div>
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="contact" class="section contact" action="{{ route('admin.update-category.pdf', $category->id) }}" method="POST">
                                @csrf
                                <div class="info">
                                    <h5 class="text-center">Edit PDF Category</h5>
                                    <div class="row">
                                        <div class="col-md-6 mx-auto">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name">Category Name</label>
                                                        <input type="text" class="form-control mb-4 @error('name') is-invalid @enderror" name="name" id="name" placeholder="ex: category name" id="name" value="{{ $category->name }}" required>
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="slug">URL SLUG</label>
                                                        <input type="text" class="form-control mb-4 @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="ex: category-url-slug" id="slug" value="{{ $category->slug }}" required>
                                                        @error('slug')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-success btn-lg">Update Category</button>
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

</script>
@endsection
