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
                            <form id="contact" class="section contact" action="{{ route('admin.store-backlinks') }}" method="POST" enctype="multipart/form-data">
                        @elseif(auth()->user()->utype === 2)
                            {{-- <form id="contact" class="section contact" action="{{ route('moderator.store.pdf') }}" method="POST" enctype="multipart/form-data"> --}}
                        @endif
                                @csrf
                                <div class="info">
                                    <h5 class="">New Backlinks</h5>
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                                <table class="table table-sm bg-white table-responsive-sm" id="table">
                                                    <tr>
                                                        <th>AUTHORITY SITE <span class="text-danger">*</span></th>
                                                        <th>TLD <span class="text-danger">*</span></th>
                                                        <th>WEBSITE LINK <span class="text-danger">*</span></th>
                                                        <th>DR <span class="text-danger">*</span></th>
                                                        <th>LINK TYPE <span class="text-danger">*</span></th>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" class="form-control @error('authority_site[]') is-invalid @enderror" name="authority_site[]" id="authority_site[]" placeholder="sitename" id="authority_site[]" value="{{ old('authority_site[]') }}" required>
                                                            @error('authority_site[]')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control @error('tld[]') is-invalid @enderror" name="tld[]" id="tld[]" placeholder=".com .net .org" id="tld[]" value="{{ old('tld[]') }}" required>
                                                            @error('tld[]')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control @error('website_link[]') is-invalid @enderror" name="website_link[]" id="website_link[]" placeholder="http://..." id="website_link[]" value="{{ old('website_link[]') }}" required>
                                                            @error('website_link[]')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control @error('dr[]') is-invalid @enderror" name="dr[]" id="dr[]" placeholder="rating" id="dr[]" value="{{ old('dr[]') }}" required>
                                                            @error('dr[]')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <select class="form-control @error('link_type[]') is-invalid @enderror" name="link_type[]" id="link_type[]" id="link_type[]" value="{{ old('link_type[]') }}" required>
                                                                <option value="Dofollow">Dofollow</option>
                                                                <option value="Nofollow">Nofollow</option>
                                                            </select>
                                                            @error('link_type[]')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <span class="btn btn-primary" onclick="CreateFunction()">+</span>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <div class="form-group">
                                                    <button class="btn btn-success btn-lg btn-block font-weight-bold">PUBLISH BACKLINKS</button>
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
        var cell3 = row.insertCell(0);
        var cell4 = row.insertCell(0);
        var cell5 = row.insertCell(0);
        var cell6 = row.insertCell(0);
        var random = Math.floor(Math.random() * 100);
        cell1.innerHTML = '<span class="btn btn-danger" onclick="DeleteFunction(this)">-</span>';
        cell2.innerHTML = '<select class="form-control" name="link_type[]" id="link_type[]" id="link_type[]" required><option value="Dofollow">Dofollow</option><option value="Nofollow">Nofollow</option></select>';
        cell3.innerHTML = '<input type="text" class="form-control" name="dr[]" id="dr[]" placeholder="rating" id="dr[]" value="" required>';
        cell4.innerHTML = '<input type="text" class="form-control" name="website_link[]" id="website_link[]" placeholder="http://..." id="website_link[]" value="" required>';
        cell5.innerHTML = '<input type="text" class="form-control" name="tld[]" id="tld[]" placeholder=".com .net .org" id="tld[]" value="" required>';
        cell6.innerHTML = '<input type="text" class="form-control" name="authority_site[]" id="authority_site[]" placeholder="sitename" value="" required>';
    }

    function DeleteFunction(row) {
        var i = row.parentNode.parentNode.rowIndex;
        document.getElementById("table").deleteRow(i);
    }
</script>

@endsection
