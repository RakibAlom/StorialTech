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
                            <form id="contact" class="section contact" action="{{ route('admin.store.template') }}" method="POST" enctype="multipart/form-data">
                        @elseif(auth()->user()->utype === 2)
                            <form id="contact" class="section contact" action="{{ route('moderator.store.template') }}" method="POST" enctype="multipart/form-data">
                        @endif
                                @csrf
                                <div class="info">
                                    <h5 class="">New Template</h5>
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="title">TITLE</label>
                                                        <input type="text" class="form-control mb-4 @error('title') is-invalid @enderror" name="title" id="title" placeholder="ex: template title" id="title" value="{{ old('title') }}" required>
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
                                                        <input type="text" class="form-control mb-4 @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="ex: template-url-slug" id="slug" value="{{ old('slug') }}" required>
                                                        @error('slug')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="category_id">CATEGORY</label>
                                                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" required>
                                                            <option value="">Select Category</option>
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
                                                        <label for="tag_id">TAGS</label>
                                                        <select class="form-control tagging @error('tag_id') is-invalid @enderror" multiple="multiple" name="tag_id[]" required>
                                                        @foreach($tags as $item)

                                                        @endforeach
                                                        </select>
                                                        @error('tag_id')
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
                                                        <label for="file">FILE</label>
                                                        <input type="file" class="form-control mb-4 @error('file') is-invalid @enderror" name="file" id="file" value="{{ old('file') }}">
                                                        @error('file')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
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
                                                                <input type="text" class="form-control @error('download_link[]') is-invalid @enderror" name="download_link[]" id="download_link[]" placeholder="ex: enter download link" value="{{ old('download_link[]') }}" required>
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

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="body">DESCIPTION</label>
                                                        <textarea class="form-control mb-4 @error('body') is-invalid @enderror" name="body" placeholder="ex: type your template" id="body" rows="10">{{ old('body') }}</textarea>
                                                        @error('body')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="keywords">TAG / KEYWORDS</label>
                                                        <input type="text" class="form-control mb-4 @error('keywords') is-invalid @enderror" name="keywords" id="keywords" placeholder="ex: html template, wordpress theme, ecommerce template" id="keywords" value="{{ old('keywords') }}">
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
                                                        <button class="btn btn-success btn-lg btn-block font-weight-bold">PUBLISH TEMPLATE</button>
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
        maximumSelectionLength: 6
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
    CKEDITOR.replace( 'body');
</script>

{{-- GET CATEGORY ID --}}
<script src="{{ asset('public/backend/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){

       $('select[name="category_id"]').on('change', function(){
           var category_id = $(this).val();
           if(category_id) {
               $.ajax({
                   url: "{{  url('get/template-category/') }}/"+category_id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                     $("select[name='tag_id[]']").empty();
                     $.each(data, function(key,value){
                            $('select[name="tag_id[]"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                     })
                   },
               });
           } else {
              $('select[name="tag_id[]"]').append('<option>Select Category First</option>');
           }
       });
   });
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
