@extends('admin.layouts.app')

@section('css')
<!--  START CUSTOM STYLE FILE  -->
<link href="{{ asset('public/backend/assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
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
                        @if($setting)
                            <form id="contact" class="section contact" action="{{ route('admin.update.setting') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <h5 class="">INFORMATION SETTING</h5>
                                    <div class="row mx-auto">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">TITLE</label>
                                                <input type="text" class="form-control mb-4 @error('title') is-invalid @enderror" name="title" id="title" placeholder="ex: website title" id="title" value="{{ $setting->title }}">
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">EMAIL</label>
                                                <input type="text" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" placeholder="ex: email address" id="email" value="{{ $setting->email }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone_1">PHONE NUMBER</label>
                                                <input type="text" class="form-control mb-4 @error('phone_1') is-invalid @enderror" name="phone_1" id="phone_1" placeholder="ex: enter phone number" id="phone_1" value="{{ $setting->phone_1 }}">
                                                @error('phone_1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone_2">PHONE NUMBER (DONATE)</label>
                                                <input type="text" class="form-control mb-4 @error('phone_2') is-invalid @enderror" name="phone_2" id="phone_2" placeholder="ex: enter second phone number" id="phone_2" value="{{ $setting->phone_2 }}">
                                                @error('phone_2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">ADDRESS</label>
                                                <input type="text" class="form-control mb-4 @error('address') is-invalid @enderror" name="address" id="address" placeholder="ex: address" id="address" value="{{ $setting->address }}">
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fb_link">FACEBOOK LINK</label>
                                                <input type="text" class="form-control mb-4 @error('fb_link') is-invalid @enderror" name="fb_link" id="fb_link" placeholder="ex: " id="fb_link" value="{{ $setting->fb_link }}">
                                                @error('fb_link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="twitter_link">TWITTER LINK</label>
                                                <input type="text" class="form-control mb-4 @error('twitter_link') is-invalid @enderror" name="twitter_link" id="twitter_link" placeholder="ex: " id="twitter_link" value="{{ $setting->twitter_link }}">
                                                @error('twitter_link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="instagram_link">INSTAGRAM LINK</label>
                                                <input type="text" class="form-control mb-4 @error('instagram_link') is-invalid @enderror" name="instagram_link" id="instagram_link" placeholder="ex: " id="instagram_link" value="{{ $setting->instagram_link }}">
                                                @error('instagram_link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="youtube_link">YOUTUBE LINK</label>
                                                <input type="text" class="form-control mb-4 @error('youtube_link') is-invalid @enderror" name="youtube_link" id="youtube_link" placeholder="ex: " id="youtube_link" value="{{ $setting->youtube_link }}">
                                                @error('youtube_link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="github_link">GITHUB LINK</label>
                                                <input type="text" class="form-control mb-4 @error('github_link') is-invalid @enderror" name="github_link" id="github_link" placeholder="ex: " id="github_link" value="{{ $setting->github_link }}">
                                                @error('github_link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pinterest_link">PINTEREST LINK</label>
                                                <input type="text" class="form-control mb-4 @error('pinterest_link') is-invalid @enderror" name="pinterest_link" id="pinterest_link" placeholder="ex: " id="pinterest_link" value="{{ $setting->pinterest_link }}">
                                                @error('pinterest_link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telegram_link">TELEGRAM LINK</label>
                                                <input type="text" class="form-control mb-4 @error('telegram_link') is-invalid @enderror" name="telegram_link" id="telegram_link" placeholder="ex: " id="telegram_link" value="{{ $setting->telegram_link }}">
                                                @error('telegram_link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="whatsapp_link">WHATSAPP LINK</label>
                                                <input type="text" class="form-control mb-4 @error('whatsapp_link') is-invalid @enderror" name="whatsapp_link" id="whatsapp_link" placeholder="ex: " id="whatsapp_link" value="{{ $setting->whatsapp_link }}">
                                                @error('whatsapp_link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="discord_link">DISCORD LINK</label>
                                                <input type="text" class="form-control mb-4 @error('discord_link') is-invalid @enderror" name="discord_link" id="discord_link" placeholder="ex: " id="discord_link" value="{{ $setting->discord_link }}">
                                                @error('discord_link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description">META DESCRIPTION</label>
                                                <textarea class="form-control mb-4 @error('description') is-invalid @enderror" name="description" placeholder="ex: type website meta description" id="description" rows="5">{{ $setting->description }}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="keywords">META KEYWORDS</label>
                                                <textarea class="form-control mb-4 @error('keywords') is-invalid @enderror" name="keywords" placeholder="ex: type website keywords" id="keywords" rows="5">{{ $setting->keywords }}</textarea>
                                                @error('keywords')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="short_about">SHORT ABOUT</label>
                                                <textarea class="form-control mb-4 @error('short_about') is-invalid @enderror" name="short_about" placeholder="ex: type website short_about" id="short_about" rows="5">{{ $setting->short_about }}</textarea>
                                                @error('short_about')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="copyright">COPYRIGHT</label>
                                                <textarea class="form-control mb-4 @error('copyright') is-invalid @enderror" name="copyright" placeholder="ex: type website copyright" id="copyright" rows="5">{{ $setting->copyright }}</textarea>
                                                @error('copyright')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="">favicon (max: 20KB)</label>
                                            <input type="file" onchange="iconChange(this)" name="favicon" class="form-control">
                                        @if($setting->favicon)
                                            <input type="hidden" name="oldfavicon" value="{{ $setting->favicon }}">
                                            <img class="img-thumbnail mt-4" src="{{ asset('storage/app/public/'.$setting->favicon) }}" id="icon" style="height: 120px;">
                                        @else
                                            <img class="mt-4" src="" id="icon" style="height: 120px;">
                                        @endif
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Logo (max: 50KB)</label>
                                            <input type="file" onchange="logoChange(this)" name="logo" class="form-control">
                                        @if($setting->logo)
                                            <input type="hidden" name="oldlogo" value="{{ $setting->logo }}">
                                            <img class="img-thumbnail mt-4" src="{{ asset('storage/app/public/'.$setting->logo) }}" id="logo" style="height: 120px;">
                                        @else
                                            <img class="mt-4" src="" id="icon" style="height: 120px;">
                                        @endif
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Cover Image (max: 100KB)</label>
                                            <input type="file" onchange="coverChange(this)" name="cover_image" class="form-control">
                                        @if($setting->cover_image)
                                            <input type="hidden" name="oldcover" value="{{ $setting->cover_image }}">
                                            <img class="img-thumbnail mt-4" src="{{ asset('storage/app/public/'.$setting->cover_image) }}" id="cover" style="height: 120px;">
                                        @else
                                            <img class="mt-4" src="" id="cover" style="height: 120px;">
                                        @endif
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Donate Image (max: 100KB)</label>
                                            <input type="file" onchange="donateImageChange(this)" name="donate_image" class="form-control">
                                        @if($setting->donate_image)
                                            <input type="hidden" name="olddonateimage" value="{{ $setting->donate_image }}">
                                            <img class="img-thumbnail mt-4" src="{{ asset('storage/app/public/'.$setting->donate_image) }}" id="donate" style="height: 120px;">
                                        @else
                                            <img class="mt-4" src="" id="donate" style="height: 120px;">
                                        @endif
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group mt-5">
                                                <button class="btn btn-success btn-lg btn-block font-weight-bold float-right">UPDATE INFORMATION</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </form>

                        @else

                        <form id="contact" class="section contact" action="{{ route('admin.store.setting') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="info">
                                <h5 class="">INFORMATION SETTING</h5>
                                <div class="row mx-auto">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">TITLE</label>
                                            <input type="text" class="form-control mb-4 @error('title') is-invalid @enderror" name="title" id="title" placeholder="ex: website title" id="title" value="{{ old('title') }}">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">EMAIL</label>
                                            <input type="text" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" placeholder="ex: email address" id="email" value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_1">PHONE NUMBER</label>
                                            <input type="text" class="form-control mb-4 @error('phone_1') is-invalid @enderror" name="phone_1" id="phone_1" placeholder="ex: enter phone number" id="phone_1" value="{{ old('phone_1') }}">
                                            @error('phone_1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_2">PHONE NUMBER (DONATE)</label>
                                            <input type="text" class="form-control mb-4 @error('phone_2') is-invalid @enderror" name="phone_2" id="phone_2" placeholder="ex: enter second phone number" id="phone_2" value="{{ old('phone_2') }}">
                                            @error('phone_2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">ADDRESS</label>
                                            <input type="text" class="form-control mb-4 @error('address') is-invalid @enderror" name="address" id="address" placeholder="ex: address" id="address" value="{{ old('address') }}">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fb_link">FACEBOOK LINK</label>
                                            <input type="text" class="form-control mb-4 @error('fb_link') is-invalid @enderror" name="fb_link" id="fb_link" placeholder="ex: " id="fb_link" value="{{ old('fb_link') }}">
                                            @error('fb_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="twitter_link">TWITTER LINK</label>
                                            <input type="text" class="form-control mb-4 @error('twitter_link') is-invalid @enderror" name="twitter_link" id="twitter_link" placeholder="ex: " id="twitter_link" value="{{ old('twitter_link') }}">
                                            @error('twitter_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="instagram_link">INSTAGRAM LINK</label>
                                            <input type="text" class="form-control mb-4 @error('instagram_link') is-invalid @enderror" name="instagram_link" id="instagram_link" placeholder="ex: " id="instagram_link" value="{{ old('instagram_link') }}">
                                            @error('instagram_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="youtube_link">YOUTUBE LINK</label>
                                            <input type="text" class="form-control mb-4 @error('youtube_link') is-invalid @enderror" name="youtube_link" id="youtube_link" placeholder="ex: " id="youtube_link" value="{{ old('youtube_link') }}">
                                            @error('youtube_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="github_link">GITHUB LINK</label>
                                            <input type="text" class="form-control mb-4 @error('github_link') is-invalid @enderror" name="github_link" id="github_link" placeholder="ex: " id="github_link" value="{{ old('github_link') }}">
                                            @error('github_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pinterest_link">PINTEREST LINK</label>
                                            <input type="text" class="form-control mb-4 @error('pinterest_link') is-invalid @enderror" name="pinterest_link" id="pinterest_link" placeholder="ex: " id="pinterest_link" value="{{ old('pinterest_link') }}">
                                            @error('pinterest_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telegram_link">TELEGRAM LINK</label>
                                            <input type="text" class="form-control mb-4 @error('telegram_link') is-invalid @enderror" name="telegram_link" id="telegram_link" placeholder="ex: " id="telegram_link" value="{{ old('telegram_link') }}">
                                            @error('telegram_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="whatsapp_link">WHATSAPP LINK</label>
                                            <input type="text" class="form-control mb-4 @error('whatsapp_link') is-invalid @enderror" name="whatsapp_link" id="whatsapp_link" placeholder="ex: " id="whatsapp_link" value="{{ old('whatsapp_link') }}">
                                            @error('whatsapp_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="discord_link">DISCORD LINK</label>
                                            <input type="text" class="form-control mb-4 @error('discord_link') is-invalid @enderror" name="discord_link" id="discord_link" placeholder="ex: " id="discord_link" value="{{ old('discord_link') }}">
                                            @error('discord_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">META description</label>
                                            <textarea class="form-control mb-4 @error('description') is-invalid @enderror" name="description" placeholder="ex: type website meta description" id="description" rows="5">{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="keywords">META KEYWORDS</label>
                                            <textarea class="form-control mb-4 @error('keywords') is-invalid @enderror" name="keywords" placeholder="ex: type website keywords" id="keywords" rows="5">{{ old('keywords') }}</textarea>
                                            @error('keywords')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="short_about">SHORT ABOUT</label>
                                            <textarea class="form-control mb-4 @error('short_about') is-invalid @enderror" name="short_about" placeholder="ex: type website short_about" id="short_about" rows="5">{{ old('short_about') }}</textarea>
                                            @error('short_about')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="copyright">COPYRIGHT</label>
                                            <textarea class="form-control mb-4 @error('copyright') is-invalid @enderror" name="copyright" placeholder="ex: type website copyright" id="copyright" rows="5">{{ old('copyright') }}</textarea>
                                            @error('copyright')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">FAVICON (max:20KB)</label>
                                        <input type="file" onchange="iconChange(this)" name="favicon" class="form-control">
                                        <img src="" id="icon">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">LOGO (max:50KB)</label>
                                        <input type="file" onchange="logoChange(this)" name="logo" class="form-control">
                                        <img src="" id="logo">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">COVER IMAGE (max:100KB)</label>
                                        <input type="file" onchange="coverChange(this)" name="cover_image" class="form-control">
                                        <img src="" id="cover">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">DONATE IMAGE (max:100KB)</label>
                                        <input type="file" onchange="donateImageChange(this)" name="donate_image" class="form-control">
                                        <img src="" id="donate">
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group mt-5">
                                            <button class="btn btn-success btn-lg btn-block font-weight-bold float-right">UPLOAD INFORMATION</button>
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
<script src="{{ asset('public/backend/assets/js/users/account-settings.js') }}"></script>

<script>
	function iconChange(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#icon')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail mt-4")
			  	.attr("height",'120px')
          	};
          	reader.readAsDataURL(input.files[0]);
     	}
    }
    function logoChange(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#logo')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail mt-4")
			  	.attr("height",'120px')

          	};
          	reader.readAsDataURL(input.files[0]);
     	}
    }
    function coverChange(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#cover')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail mt-4")
			  	.attr("height",'120px')
          	};
          	reader.readAsDataURL(input.files[0]);
     	}
    }

    function donateImageChange(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#donate')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail mt-4")
			  	.attr("height",'120px')
          	};
          	reader.readAsDataURL(input.files[0]);
     	}
    }
</script>

{{-- CKEDITOR --}}
<script>
    // CKEDITOR.replace( 'details' );
</script>

@endsection
