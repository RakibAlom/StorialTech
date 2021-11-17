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
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div class="row">
                                <div class="col-12">
                                    @include('admin.layouts.alerts')
                                </div>
                            </div>
                            <div id="general-info" class="section general-info">
                                <div class="info">
                                    <h6 class="">General Information</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                            @if(auth()->user()->utype === 5)
                                                <form action="{{ route('admin.image.user', $user->id) }}" method="post" enctype="multipart/form-data">
                                            @elseif(auth()->user()->utype === 2)
                                                <form action="{{ route('moderator.image.user', $user->id) }}" method="post" enctype="multipart/form-data">
                                            @endif
                                                @csrf
                                                     <div class="upload mt-4 pr-md-4">
                                                    @if($user->image)
                                                        <input type="file" id="input-file-max-fs" class="dropify" data-default-file="{{ asset('storage/app/public/'.$user->image) }}" name="image" required data-max-file-size="2M" />
                                                        <input type="hidden" name="oldimage" value="{{ $user->image }}">
                                                    @else
                                                        <input type="file" id="input-file-max-fs" class="dropify" data-default-file="{{ asset('public/backend/assets/img/200x200.jpg') }}" name="image" required data-max-file-size="2M" />
                                                    @endif
                                                        <button class="mt-2 btn btn-success btn-sm">Upload Picture</button>
                                                    </div>
                                                </form>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                @if(auth()->user()->utype === 5)
                                                    <form class="form" action="{{ route('admin.info.user', $user->id) }}" method="POST">
                                                @elseif(auth()->user()->utype === 2)
                                                    <form class="form" action="{{ route('moderator.info.user', $user->id) }}" method="POST">
                                                @endif
                                                    <form class="form" action="{{ route('admin.info.user', $user->id) }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">Full Name</label>
                                                                    <input type="text" class="form-control mb-4" id="fullName" placeholder="Full Name" name="fullname" value="{{ $user->fullname }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="dob-input">Date of Birth</label>
                                                                <input type="date" class="form-control mb-4" value="{{ $user->birthdate }}" id="fullName" name="birthdate">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="dob-input">Phone</label>
                                                                <input type="text" class="form-control mb-4" value="{{ $user->phone }}" id="fullName" name="phone">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="dob-input">gender</label>
                                                                <select name="gender" class="form-control" id="" required>
                                                                    <option value="male" @if($user->gender == 'male') selected @endif>Male</option>
                                                                    <option value="female" @if($user->gender == 'female') selected @endif>Female</option>
                                                                    <option value="other" @if($user->gender == 'other') selected @endif>Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            @if(!$user->userdetails)
                                @include('admin.user.storeform')
                            @else
                                @include('admin.user.updateform')
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
<script src="{{ asset('public/backend/plugins/dropify/dropify.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/blockui/jquery.blockUI.min.js') }}"></script>
<!-- <script src="plugins/tagInput/tags-input.js') }}"></script> -->
<script src="{{ asset('public/backend/assets/js/users/account-settings.js') }}"></script>
<!--  END CUSTOM SCRIPTS FILE  -->
@endsection
