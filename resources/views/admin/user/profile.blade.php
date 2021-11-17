@extends('admin.layouts.app')

@section('css')
<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{ asset('public/backend/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
<!--  END CUSTOM STYLE FILE  -->
@endsection

{{-- @section('loader')
    @include('admin.layouts.loader')
@endsection --}}

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row layout-spacing">

            <!-- Content -->
            <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                <div class="user-profile layout-spacing">
                    <div class="widget-content widget-content-area">
                        <div class="d-flex justify-content-between">
                            <h3 class="">Profile</h3>
                        @if(auth()->user()->utype == 5)
                            <a href="{{ route('admin.edit.user', $user->slug) }}" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                        @elseif(auth()->user()->utype == 2)
                            <a href="{{ route('moderator.edit.user', $user->slug) }}" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                        @endif
                        </div>
                        <div class="text-center user-info">
                        @if($user->image)
                            <img class="img-fluid" src="{{ asset('storage/app/public/'.$user->image) }}" alt="{{ $user->fullname }}">
                        @else
                            <img src="{{ asset('public/backend/assets/img/90x90.jpg') }}" alt="avatar">
                        @endif
                            <p class="">{{ $user->fullname }}</p>
                        @if($user->userdetails)
                            <span>{{ $user->userdetails->bio_title }}</span>
                        @endif
                        </div>
                        <div class="user-info-list">

                            <div class="">
                                <ul class="contacts-block list-unstyled">

                                    <li class="contacts-block__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> {{ $user->birthdate }}
                                    </li>

                                    <li class="contacts-block__item">
                                        <a href="mailto:{{ $user->email }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>{{ $user->email }}</a>
                                    </li>
                                    <li class="contacts-block__item">
                                        <a href="tel:{{ $user->email }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>{{ $user->phone }}</a>
                                    </li>
                                @if($user->userdetails)
                                    <li class="contacts-block__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg>{{ $user->userdetails->profession }}
                                    </li>
                                    <li class="contacts-block__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>{{ $user->userdetails->address }}
                                    </li>
                                    <li class="contacts-block__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>{{ $user->userdetails->language }}
                                    </li>
                                    <li class="contacts-block__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>{{ $user->userdetails->religion }}
                                    </li>
                                    <li class="contacts-block__item">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="http://{{ $user->userdetails->fb_link }}" target="_blank"><div class="social-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                                                </div></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="http://{{ $user->userdetails->twitter_link }}" target="_blank"><div class="social-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                                                </div></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="http://{{ $user->userdetails->linkedin_link }}" target="_blank"><div class="social-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                                                </div></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="http://{{ $user->userdetails->github_link }}" target="_blank"><div class="social-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                                                </div></a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @if($user->userdetails)
                <div class="education layout-spacing ">
                    <div class="widget-content widget-content-area">
                        <h3 class="">Education</h3>
                        <div class="timeline-alter">
                            <div class="t-text">
                                <p>{{ $user->userdetails->education }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="work-experience layout-spacing ">

                    <div class="widget-content widget-content-area">

                        <h3 class="">About</h3>

                        <div class="timeline-alter">

                            <div class="t-text">
                                <p>{{ $user->userdetails->about }}</p>
                            </div>

                        </div>
                    </div>

                </div>

            @endif

            </div>

            <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

                <div class="bio layout-spacing ">
                    <div class="widget-content widget-content-area">
                        <h3 class=""><span class="float-left">Story</span><span class="float-right">Tutorial</span></h3>

                        <div class="bio-skill-box">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="col-12 mb-5 ">

                                        <div class="d-flex b-skills">
                                            <div>
                                            </div>
                                            <div class="">
                                                <h5></h5>
                                                <p></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-12 mb-5 ">

                                        <div class="d-flex b-skills">
                                            <div>
                                            </div>
                                            <div class="">
                                                <h5></h5>
                                                <p></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

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


@endsection
