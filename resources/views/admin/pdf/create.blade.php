@extends('admin.layouts.app')

@section('css')
<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{ asset('public/backend/assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/backend/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/plugins/select2/select2.min.css') }}">
<!--  END CUSTOM STYLE FILE  -->
<script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>

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
                        @if(auth()->user()->utype === 5)
                            <form id="contact" class="section contact" action="{{ route('admin.store.pdf') }}" method="POST" enctype="multipart/form-data">
                        @elseif(auth()->user()->utype === 2)
                            <form id="contact" class="section contact" action="{{ route('moderator.store.pdf') }}" method="POST" enctype="multipart/form-data">
                        @endif
                                @csrf
                                <div class="info">
                                    <h5 class="">New PDF</h5>
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="title">TITLE</label>
                                                        <input type="text" class="form-control mb-4 @error('title') is-invalid @enderror" name="title" id="title" placeholder="ex: pdf title" id="title" value="{{ old('title') }}" required>
                                                        @error('title')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="slug">URL SLUG</label>
                                                        <input type="text" class="form-control mb-4 @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="ex: pdf-url-slug" id="slug" value="{{ old('slug') }}" required>
                                                        @error('slug')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">BOOK NAME</label>
                                                        <input type="text" class="form-control mb-4 @error('name') is-invalid @enderror" name="name" id="name" placeholder="ex: book-url-name" id="name" value="{{ old('name') }}" required>
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="category_id">CATEGORY</label>
                                                        <select class="form-control tagging @error('category_id') is-invalid @enderror" multiple="multiple" name="category_id[]" required>
                                                        @foreach($categories as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                        </select>
                                                        @error('category_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="author_id">AUTHOR</label>
                                                        <select class="form-control tagging @error('author_id') is-invalid @enderror" multiple="multiple" name="author_id[]">
                                                        @foreach($authors as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                        </select>
                                                        @error('author_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="series_id">SERIES</label>
                                                        <select class="form-control tagging @error('series_id') is-invalid @enderror" multiple="multiple" name="series_id[]">
                                                        @foreach($serieses as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                        </select>
                                                        @error('series_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="translated">TRANSLATED</label>
                                                        <input type="text" class="form-control mb-4 @error('translated') is-invalid @enderror" name="translated" id="translated" placeholder="ex: " id="translated" value="{{ old('translated') }}">
                                                        @error('translated')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="publisher">PUBLISHER</label>
                                                        <input type="text" class="form-control mb-4 @error('publisher') is-invalid @enderror" name="publisher" id="publisher" placeholder="ex: publisher name" id="publisher" value="{{ old('publisher') }}">
                                                        @error('publisher')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="published">PUBLISH DATE</label>
                                                        <input type="text" class="form-control mb-4 @error('published') is-invalid @enderror" name="published" id="published" placeholder="ex: publish date" id="published" value="{{ old('published') }}">
                                                        @error('published')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="pages">PDF PAGES</label>
                                                                <input type="text" class="form-control mb-4 @error('pages') is-invalid @enderror" name="pages" id="pages" placeholder="ex: pages" id="pages" value="{{ old('pages') }}">
                                                                @error('pages')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="size">PDF SIZE</label>
                                                                <input type="text" class="form-control mb-4 @error('size') is-invalid @enderror" name="size" id="size" placeholder="ex: size" id="size" value="{{ old('size') }}" required>
                                                                @error('size')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <table class="table table-sm bg-white table-bordered" id="table">
                                                        <tr>
                                                            <th>Download Link <span class="text-danger">*</span></th>
                                                            <th><span class="btn btn-primary" onclick="CreateFunction()">+</span></th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="text" class="form-control @error('download_link[]') is-invalid @enderror" name="download_link[]" id="download_link[]" placeholder="ex: enter download link" id="download_link[]" value="{{ old('download_link[]') }}" required>
                                                                @error('download_link[]')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </td>
                                                            <td>

                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="image">IMAGE (max: 50KB / 200x160)</label>
                                                        <input type="file" class="form-control mb-4 @error('image') is-invalid @enderror" onchange="photoChange(this)" name="image" value="{{ old('image') }}" required>
                                                        @error('image')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="file">FILE</label>
                                                        <input type="file" class="form-control mb-4 @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}">
                                                        @error('file')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="review">BOOK REVIEW</label>
                                                        <textarea class="form-control mb-4 @error('review') is-invalid @enderror" name="review" id="review" placeholder="ex: type pdf review" rows="10">{{ old('review') }}</textarea>
                                                        @error('review')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="keywords">TAG / KEYWORDS</label>
                                                        <input type="text" class="form-control mb-4 @error('keywords') is-invalid @enderror" name="keywords" id="keywords" placeholder="ex: western pdf book, bangla pdf book, onubad pdf book" id="keywords" value="{{ old('keywords') }}">
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
                                                        <button class="btn btn-success btn-lg btn-block font-weight-bold">PUBLISH PDF</button>
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

    $('#title').keyup(delay(function(e) {
        $.get('{{ route('title.slug') }}',
            { 'title': $(this).val() },
            function(data) {
                $('#slug').val(data.slug);
            }
        );
    }, 500));

    // SELECT 2
    $(".tagging").select2({
        tags: true,
        maximumSelectionLength: 7
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
    CKEDITOR.replace( 'review' );
</script>
<script>
    function CreateFunction() {
        var table = document.getElementById("table");
        var row = table.insertRow();
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(0);
        var random = Math.floor(Math.random() * 100);
        cell1.innerHTML = '<span class="btn btn-danger" onclick="DeleteFunction(this)">-</span>';
        cell2.innerHTML = '<input type="text" placeholder="ex: enter download link" class="form-control amount" name="download_link[]">';
    }

    function DeleteFunction(row) {
        var i = row.parentNode.parentNode.rowIndex;
        document.getElementById("table").deleteRow(i);
    }
</script>

@endsection
