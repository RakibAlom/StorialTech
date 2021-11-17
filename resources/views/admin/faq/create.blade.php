@extends('admin.layouts.app')

@section('css')
{{-- <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> --}}
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
                            <form id="contact" class="section contact" action="{{ route('admin.store.faq') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <h5 class="">NEW FAQ</h5>
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="question">QUESTION</label>
                                                        <input type="text" class="form-control mb-4 @error('question') is-invalid @enderror" name="question" id="question" placeholder="ex: faq question" value="{{ old('question') }}" required>
                                                        @error('question')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="answer">ANSWER</label>
                                                        <textarea type="text" class="form-control mb-4 @error('answer') is-invalid @enderror" name="answer" id="answer" rows="6" placeholder="ex: type your answer" required>{{ old('answer') }}</textarea>
                                                        @error('answer')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-success btn-lg font-weight-bold float-right">PUBLISH FAQ</button>
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

{{-- CKEDITOR --}}
{{-- <script>
        ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
</script> --}}
@endsection
