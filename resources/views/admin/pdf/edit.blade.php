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
                            <form id="contact" class="section contact" action="{{ route('admin.update.pdf', $pdf->id) }}" method="POST" enctype="multipart/form-data">
                        @elseif(auth()->user()->utype === 2)
                            <form id="contact" class="section contact" action="{{ route('moderator.update.pdf', $pdf->id) }}" method="POST" enctype="multipart/form-data">
                        @endif
                                @csrf
                                <div class="info">
                                    <h5 class="">Edit pdf</h5>
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="title">TITLE</label>
                                                        <input type="text" class="form-control mb-4 @error('title') is-invalid @enderror" name="title" id="title" placeholder="ex: pdf title" id="title" value="{{ $pdf->title }}" required>
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
                                                        <input type="text" class="form-control mb-4 @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="ex: pdf-url-slug" id="slug" value="{{ $pdf->slug }}" required>
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
                                                        <input type="text" class="form-control mb-4 @error('name') is-invalid @enderror" name="name" id="name" placeholder="ex: book name" id="name" value="{{ $pdf->name }}" required>
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
                                                            <option value="{{ $item->id }}" @foreach($pdf->category as $category) @if($item->id == $category->category_id) selected @endif @endforeach>{{ $item->name }}</option>
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
                                                            <option value="{{ $item->id }}" @foreach($pdf->author as $author) @if($item->id == $author->author_id) selected @endif @endforeach>{{ $item->name }}</option>
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
                                                            <option value="{{ $item->id }}" @foreach($pdf->series as $series) @if($item->id == $series->series_id) selected @endif @endforeach>{{ $item->name }}</option>
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
                                                        <input type="text" class="form-control mb-4 @error('translated') is-invalid @enderror" name="translated" id="translated" placeholder="ex: translated name" id="translated" value="{{ $pdf->translated }}">
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
                                                        <input type="text" class="form-control mb-4 @error('publisher') is-invalid @enderror" name="publisher" id="publisher" placeholder="ex: publisher name" id="publisher" value="{{ $pdf->publisher }}">
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
                                                        <input type="text" class="form-control mb-4 @error('published') is-invalid @enderror" name="published" id="published" placeholder="ex: publish date" id="published" value="{{ $pdf->published }}">
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
                                                                <input type="text" class="form-control mb-4 @error('pages') is-invalid @enderror" name="pages" id="pages" placeholder="ex: pages" id="pages" value="{{ $pdf->pages }}">
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
                                                                <input type="text" class="form-control mb-4 @error('size') is-invalid @enderror" name="size" id="size" placeholder="ex: size" id="size" value="{{ $pdf->size }}" required>
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
                                                    @foreach($pdf->download as $item)
                                                        <tr>
                                                            <td>
                                                                <input type="text" class="form-control @error('download_link[]') is-invalid @enderror" name="download_link[]" id="download_link[]" placeholder="ex: enter download link" id="download_link[]" value="{{ $item->link }}" required>
                                                                @error('download_link[]')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <span class="btn btn-danger" onclick="DeleteFunction(this)">-</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </table>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="image">IMAGE (max: 50KB / 200x160)</label>
                                                        <input type="file" class="form-control mb-4 @error('image') is-invalid @enderror" onchange="photoChange(this)" name="image" id="image" value="">
                                                        <input type="hidden" name="oldimage" value="{{ $pdf->image }}">
                                                        @error('image')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="file">PDF FILE</label>
                                                        <input type="file" class="form-control mb-4 @error('file') is-invalid @enderror" name="file" id="file" value="">
                                                        <input type="hidden" name="oldfile" value="{{ $pdf->file }}">
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
                                                        <textarea class="form-control mb-4 @error('review') is-invalid @enderror" name="review" id="review" placeholder="ex: type your pdf">{{ $pdf->review }}</textarea>
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
                                                        <input type="text" class="form-control mb-4 @error('keywords') is-invalid @enderror" name="keywords" id="keywords" placeholder="ex: western pdf book, bangla pdf book, onubad pdf book" id="keywords" value="{{ $pdf->keywords }}">
                                                        @error('keywords')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <img class="img-thumbnail" src="{{ asset('storage/app/public/'.$pdf->image) }}" alt="{{ $pdf->name }}" id="photo">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" disabled value="{{ $pdf->file }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-success btn-lg btn-block font-weight-bold">UPDATE PDF</button>
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
