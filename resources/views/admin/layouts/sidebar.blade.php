@php
    $setting = App\Models\Admin\Setting::first();
    $platform = App\Models\Custom\PlatformControl::first();
@endphp
<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="{{ route('admin.home') }}">
                    <img src="{{ asset('storage/app/public/'.$setting->favicon) }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="{{ route('admin.home') }}" class="nav-link"> STORIALT </a>
            </li>
        </ul>

        <ul class="list-unstyled menu-categories" id="accordionExample">
        @if(auth()->user()->utype === 5)
            <li class="menu @if(URL::current() == route('admin.home')) active @endif">
                <a href="{{ route('admin.home') }}" @if(URL::current() == route('admin.home')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
        @elseif(auth()->user()->utype === 2)
            <li class="menu @if(URL::current() == route('moderator.home')) active @endif">
                <a href="{{ route('moderator.home') }}" @if(URL::current() == route('moderator.home')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
        @endif
            
        
        @if($platform->blog_status == 1)
            {{-- BLOG START --}}
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>BLOG SECTOR</span></div>
            </li>
            <li class="menu  @if(URL::current() == route('admin.create.blog') || URL::current() ==  route('admin.pending-list.blog') || URL::current() ==  route('admin.deactive-list.blog') || URL::current() ==  route('admin.blog') || URL::current() ==  route('admin.trash.blog') || URL::current() == route('moderator.create.blog') || URL::current() ==  route('moderator.deactive-list.blog') || URL::current() ==  route('moderator.blog')) active @endif">
                <a href="#blog" data-toggle="collapse" @if(URL::current() == route('admin.create.blog') || URL::current() ==  route('admin.pending-list.blog') || URL::current() ==  route('admin.deactive-list.blog') || URL::current() ==  route('admin.blog') || URL::current() ==  route('admin.trash.blog') || URL::current() == route('moderator.create.blog') || URL::current() ==  route('moderator.deactive-list.blog') || URL::current() ==  route('moderator.blog')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                        <span>BLOG</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="blog" data-parent="#accordionExample">
                @if(auth()->user()->utype === 5)
                    <li class="@if(URL::current() == route('admin.create.blog')) active @endif">
                        <a href="{{ route('admin.create.blog') }}"> New blog </a>
                    </li>
                    <li class="@if(URL::current() == route('admin.blog')) active @endif">
                        <a href="{{ route('admin.blog') }}"> Blog List</a>
                    </li>
                    {{-- <li class="@if(URL::current() == route('admin.pending-list.blog')) active @endif">
                        <a href="{{ route('admin.pending-list.blog') }}"> Pending List</a>
                    </li> --}}
                    <li class="@if(URL::current() == route('admin.deactive-list.blog')) active @endif">
                        <a href="{{ route('admin.deactive-list.blog') }}"> Deactive List</a>
                    </li>

                    <li class="@if(URL::current() == route('admin.trash.blog')) active @endif">
                        <a href="{{ route('admin.trash.blog') }}"> Trash</a>
                    </li>
                @elseif(auth()->user()->utype === 2)
                    <li class="@if(URL::current() == route('moderator.create.blog')) active @endif">
                        <a href="{{ route('moderator.create.blog') }}"> New blog </a>
                    </li>
                    <li class="@if(URL::current() == route('moderator.blog')) active @endif">
                        <a href="{{ route('moderator.blog') }}"> Blog List</a>
                    </li>
                    {{-- <li class="@if(URL::current() == route('moderator.pending-list.blog')) active @endif">
                        <a href="{{ route('moderator.pending-list.blog') }}"> Pending List</a>
                    </li> --}}
                    <li class="@if(URL::current() == route('moderator.deactive-list.blog')) active @endif">
                        <a href="{{ route('moderator.deactive-list.blog') }}"> Deactive List</a>
                    </li>
                @endif
                </ul>
            </li>

        @if(auth()->user()->utype === 5)
            <li class="menu  @if(URL::current() == route('admin.create-category.blog') || URL::current() ==  route('admin.category.blog') || URL::current() ==  route('admin.trash-category.blog')) active @endif">
                <a href="#bcategory" data-toggle="collapse" @if(URL::current() == route('admin.create-category.blog') || URL::current() ==  route('admin.category.blog') || URL::current() ==  route('admin.trash-category.blog')) aria-expanded="true"  @endif class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                        <span>CATEGORY</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="bcategory" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.create-category.blog')) active @endif">
                        <a href="{{ route('admin.create-category.blog') }}"> Create Category</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.category.blog')) active @endif">
                        <a href="{{ route('admin.category.blog') }}"> Category List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash-category.blog')) active @endif">
                        <a href="{{ route('admin.trash-category.blog') }}"> Trash</a>
                    </li>
                </ul>
            </li>
        @endif
            {{-- Blog END --}}
        @endif

        
        @if($platform->tutorial_status == 1)
            {{-- TUTORIAL START --}}
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>TUTORIAL SECTOR</span></div>
            </li>
            <li class="menu  @if(URL::current() == route('admin.create.tutorial') || URL::current() ==  route('admin.pending-list.tutorial') || URL::current() ==  route('admin.deactive-list.tutorial') || URL::current() ==  route('admin.tutorial') || URL::current() ==  route('admin.trash.tutorial') || URL::current() == route('moderator.create.tutorial') || URL::current() ==  route('moderator.pending-list.tutorial') || URL::current() ==  route('moderator.deactive-list.tutorial') || URL::current() ==  route('moderator.tutorial')) active @endif">
                <a href="#tutorial" data-toggle="collapse" @if(URL::current() == route('admin.create.tutorial') || URL::current() ==  route('admin.pending-list.tutorial') || URL::current() ==  route('admin.deactive-list.tutorial') || URL::current() ==  route('admin.tutorial') || URL::current() ==  route('admin.trash.tutorial') || URL::current() == route('moderator.create.tutorial') || URL::current() ==  route('moderator.pending-list.tutorial') || URL::current() ==  route('moderator.deactive-list.tutorial') || URL::current() ==  route('moderator.tutorial')) aria-expanded="true"  @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                        <span>TUTORIAL</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="tutorial" data-parent="#accordionExample">
                @if(auth()->user()->utype === 5)
                    <li class="@if(URL::current() == route('admin.create.tutorial')) active @endif">
                        <a href="{{ route('admin.create.tutorial') }}"> New Tutorial </a>
                    </li>
                    <li class="@if(URL::current() == route('admin.tutorial')) active @endif">
                        <a href="{{ route('admin.tutorial') }}"> Tutorial List</a>
                    </li>
                    {{-- <li class="@if(URL::current() == route('admin.pending-list.tutorial')) active @endif">
                        <a href="{{ route('admin.pending-list.tutorial') }}"> Pending List</a>
                    </li> --}}
                    <li class="@if(URL::current() == route('admin.deactive-list.tutorial')) active @endif">
                        <a href="{{ route('admin.deactive-list.tutorial') }}"> Deactive List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash.tutorial')) active @endif">
                        <a href="{{ route('admin.trash.tutorial') }}"> Trash</a>
                    </li>
                @elseif(auth()->user()->utype === 2)
                    <li class="@if(URL::current() == route('moderator.create.tutorial')) active @endif">
                        <a href="{{ route('moderator.create.tutorial') }}"> New Tutorial </a>
                    </li>
                    <li class="@if(URL::current() == route('moderator.tutorial')) active @endif">
                        <a href="{{ route('moderator.tutorial') }}"> Tutorial List</a>
                    </li>
                    {{-- <li class="@if(URL::current() == route('moderator.pending-list.tutorial')) active @endif">
                        <a href="{{ route('moderator.pending-list.tutorial') }}"> Pending List</a>
                    </li> --}}
                    <li class="@if(URL::current() == route('moderator.deactive-list.tutorial')) active @endif">
                        <a href="{{ route('moderator.deactive-list.tutorial') }}"> Deactive List</a>
                    </li>
                @endif
                </ul>
            </li>

        @if(auth()->user()->utype === 5)
            <li class="menu  @if(URL::current() == route('admin.create-category.tutorial') || URL::current() ==  route('admin.category.tutorial') || URL::current() ==  route('admin.trash-category.tutorial')) active @endif">
                <a href="#tcategory" data-toggle="collapse" @if(URL::current() == route('admin.create-category.tutorial') || URL::current() ==  route('admin.category.tutorial') || URL::current() ==  route('admin.trash-category.tutorial')) aria-expanded="true"  @endif class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                        <span>CATEGORY</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="tcategory" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.create-category.tutorial')) active @endif">
                        <a href="{{ route('admin.create-category.tutorial') }}"> Create Category</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.category.tutorial')) active @endif">
                        <a href="{{ route('admin.category.tutorial') }}"> Category List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash-category.tutorial')) active @endif">
                        <a href="{{ route('admin.trash-category.tutorial') }}"> Trash</a>
                    </li>
                </ul>
            </li>

            <li class="menu  @if(URL::current() == route('admin.create-tag.tutorial') || URL::current() ==  route('admin.tag.tutorial') || URL::current() ==  route('admin.trash-tag.tutorial')) active @endif">
                <a href="#ttag" data-toggle="collapse" @if(URL::current() == route('admin.create-tag.tutorial') || URL::current() ==  route('admin.tag.tutorial') || URL::current() ==  route('admin.trash-tag.tutorial')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                        <span>TAG</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="ttag" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.create-tag.tutorial')) active @endif">
                        <a href="{{ route('admin.create-tag.tutorial') }}"> Create Tag</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.tag.tutorial')) active @endif">
                        <a href="{{ route('admin.tag.tutorial') }}"> Tag List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash-tag.tutorial')) active @endif">
                        <a href="{{ route('admin.trash-tag.tutorial') }}"> Trash</a>
                    </li>
                </ul>
            </li>
        @endif
            {{-- TUTORIAL END --}}
        @endif
        
        @if($platform->story_status == 1)
            {{-- STORY START --}}
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>STORY SECTOR</span></div>
            </li>
            <li class="menu  @if(URL::current() == route('admin.create.story') || URL::current() ==  route('admin.pending-list.story') || URL::current() ==  route('admin.deactive-list.story') || URL::current() ==  route('admin.story') || URL::current() ==  route('admin.trash.story') || URL::current() == route('moderator.create.story')  || URL::current() ==  route('moderator.pending-list.story') || URL::current() ==  route('moderator.deactive-list.story') || URL::current() ==  route('moderator.story')) active @endif">
                <a href="#story" data-toggle="collapse" @if(URL::current() == route('admin.create.story') || URL::current() ==  route('admin.pending-list.story') || URL::current() ==  route('admin.deactive-list.story') || URL::current() ==  route('admin.story') || URL::current() ==  route('admin.trash.story') || URL::current() == route('moderator.create.story')  || URL::current() ==  route('moderator.pending-list.story') || URL::current() ==  route('moderator.deactive-list.story') || URL::current() ==  route('moderator.story')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                        <span>STORY</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="story" data-parent="#accordionExample">
                @if(auth()->user()->utype == 5)
                    <li class="@if(URL::current() == route('admin.create.story')) active @endif">
                        <a href="{{ route('admin.create.story') }}"> New Story </a>
                    </li>
                    <li class="@if(URL::current() == route('admin.story')) active @endif">
                        <a href="{{ route('admin.story') }}"> Story List</a>
                    </li>
                    {{-- <li class="@if(URL::current() == route('admin.pending-list.story')) active @endif">
                        <a href="{{ route('admin.pending-list.story') }}"> Pending List</a>
                    </li> --}}
                    <li class="@if(URL::current() == route('admin.deactive-list.story')) active @endif">
                        <a href="{{ route('admin.deactive-list.story') }}"> Deactive List</a>
                    </li>

                    <li class="@if(URL::current() == route('admin.trash.story')) active @endif">
                        <a href="{{ route('admin.trash.story') }}"> Trash</a>
                    </li>
                @elseif(auth()->user()->utype == 2)
                    <li class="@if(URL::current() == route('moderator.create.story')) active @endif">
                        <a href="{{ route('moderator.create.story') }}"> New Story </a>
                    </li>
                    <li class="@if(URL::current() == route('moderator.story')) active @endif">
                        <a href="{{ route('moderator.story') }}"> Story List</a>
                    </li>
                    {{-- <li class="@if(URL::current() == route('moderator.pending-list.story')) active @endif">
                        <a href="{{ route('moderator.pending-list.story') }}"> Pending List</a>
                    </li> --}}
                    <li class="@if(URL::current() == route('moderator.deactive-list.story')) active @endif">
                        <a href="{{ route('moderator.deactive-list.story') }}"> Deactive List</a>
                    </li>
                @endif
                </ul>
            </li>
        @if(auth()->user()->utype == 5)
            <li class="menu  @if(URL::current() == route('admin.create-category.story') || URL::current() ==  route('admin.category.story') || URL::current() ==  route('admin.trash-category.story')) active @endif">
                <a href="#scategory" data-toggle="collapse" @if(URL::current() == route('admin.create-category.story') || URL::current() ==  route('admin.category.story') || URL::current() ==  route('admin.trash-category.story')) aria-expanded="true"  @endif class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                        <span>CATEGORY</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="scategory" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.create-category.story')) active @endif">
                        <a href="{{ route('admin.create-category.story') }}"> Create Category</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.category.story')) active @endif">
                        <a href="{{ route('admin.category.story') }}"> Category List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash-category.story')) active @endif">
                        <a href="{{ route('admin.trash-category.story') }}"> Trash</a>
                    </li>
                </ul>
            </li>
        @endif
            {{-- STORY END --}}
        @endif

        @if($platform->pdf_status == 1)
            {{-- PDF START --}}
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>PDF SECTOR</span></div>
            </li>
            <li class="menu  @if(URL::current() == route('admin.create.pdf') || URL::current() ==  route('admin.deactive-list.pdf') || URL::current() ==  route('admin.pdf') || URL::current() ==  route('admin.trash.pdf') || URL::current() == route('moderator.create.pdf') || URL::current() ==  route('moderator.deactive-list.pdf') || URL::current() ==  route('moderator.pdf')) active @endif">
                <a href="#pdf" data-toggle="collapse" @if(URL::current() == route('admin.create.pdf') || URL::current() ==  route('admin.deactive-list.pdf') || URL::current() ==  route('admin.pdf') || URL::current() ==  route('admin.trash.pdf') || URL::current() == route('moderator.create.pdf') || URL::current() ==  route('moderator.deactive-list.pdf') || URL::current() ==  route('moderator.pdf')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                        <span>PDF</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="pdf" data-parent="#accordionExample">
                @if(auth()->user()->utype === 5)
                    <li class="@if(URL::current() == route('admin.create.pdf')) active @endif">
                        <a href="{{ route('admin.create.pdf') }}"> New PDF </a>
                    </li>
                    <li class="@if(URL::current() == route('admin.pdf')) active @endif">
                        <a href="{{ route('admin.pdf') }}"> PDF List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.deactive-list.pdf')) active @endif">
                        <a href="{{ route('admin.deactive-list.pdf') }}"> Deactive List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash.pdf')) active @endif">
                        <a href="{{ route('admin.trash.pdf') }}"> Trash</a>
                    </li>
                @elseif(auth()->user()->utype === 2)
                    <li class="@if(URL::current() == route('moderator.create.pdf')) active @endif">
                        <a href="{{ route('moderator.create.pdf') }}"> New PDF </a>
                    </li>
                    <li class="@if(URL::current() == route('moderator.pdf')) active @endif">
                        <a href="{{ route('moderator.pdf') }}"> PDF List</a>
                    </li>
                    <li class="@if(URL::current() == route('moderator.deactive-list.pdf')) active @endif">
                        <a href="{{ route('moderator.deactive-list.pdf') }}"> Deactive List</a>
                    </li>
                @endif
                </ul>
            </li>

        @if(auth()->user()->utype === 5)
            <li class="menu  @if(URL::current() == route('admin.create-category.pdf') || URL::current() ==  route('admin.category.pdf') || URL::current() ==  route('admin.trash-category.pdf')) active @endif">
                <a href="#pdfcategory" data-toggle="collapse" @if(URL::current() == route('admin.create-category.pdf') || URL::current() ==  route('admin.category.pdf') || URL::current() ==  route('admin.trash-category.pdf')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                        <span>CATEGORY</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="pdfcategory" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.create-category.pdf')) active @endif">
                        <a href="{{ route('admin.create-category.pdf') }}"> Create Category</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.category.pdf')) active @endif">
                        <a href="{{ route('admin.category.pdf') }}"> Category List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash-category.pdf')) active @endif">
                        <a href="{{ route('admin.trash-category.pdf') }}"> Trash</a>
                    </li>
                </ul>
            </li>

            <li class="menu  @if(URL::current() == route('admin.create-author.pdf') || URL::current() ==  route('admin.author.pdf') || URL::current() ==  route('admin.trash-author.pdf')) active @endif">
                <a href="#pdfauthor" data-toggle="collapse" @if(URL::current() == route('admin.create-author.pdf') || URL::current() ==  route('admin.author.pdf') || URL::current() ==  route('admin.trash-author.pdf')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                        <span>AUTHOR</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="pdfauthor" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.create-author.pdf')) active @endif">
                        <a href="{{ route('admin.create-author.pdf') }}"> New Author</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.author.pdf')) active @endif">
                        <a href="{{ route('admin.author.pdf') }}"> Author List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash-author.pdf')) active @endif">
                        <a href="{{ route('admin.trash-author.pdf') }}"> Trash</a>
                    </li>
                </ul>
            </li>

            <li class="menu  @if(URL::current() == route('admin.create-series.pdf') || URL::current() ==  route('admin.series.pdf') || URL::current() ==  route('admin.trash-series.pdf')) active @endif">
                <a href="#pdfseries" data-toggle="collapse" @if(URL::current() == route('admin.create-series.pdf') || URL::current() ==  route('admin.series.pdf') || URL::current() ==  route('admin.trash-series.pdf')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                        <span>SERIES</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="pdfseries" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.create-series.pdf')) active @endif">
                        <a href="{{ route('admin.create-series.pdf') }}"> New Series</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.series.pdf')) active @endif">
                        <a href="{{ route('admin.series.pdf') }}"> Author List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash-series.pdf')) active @endif">
                        <a href="{{ route('admin.trash-series.pdf') }}"> Trash</a>
                    </li>
                </ul>
            </li>
        @endif
            {{-- PDF END --}}
        @endif

        @if($platform->template_status == 1)
            {{-- TEMPLATE START --}}
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>TEMPLATE SECTOR</span></div>
            </li>
            <li class="menu  @if(URL::current() == route('admin.create.template') || URL::current() ==  route('admin.deactive-list.template') || URL::current() ==  route('admin.template') || URL::current() ==  route('admin.trash.template') || URL::current() == route('moderator.create.template') || URL::current() ==  route('moderator.deactive-list.template') || URL::current() ==  route('moderator.template')) active @endif">
                <a href="#template" data-toggle="collapse" @if(URL::current() == route('admin.create.template') || URL::current() ==  route('admin.deactive-list.template') || URL::current() ==  route('admin.template') || URL::current() ==  route('admin.trash.template') || URL::current() == route('moderator.create.template') || URL::current() ==  route('moderator.deactive-list.template') || URL::current() ==  route('moderator.template')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                        <span>TEMPLATE/SCRIPTS</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="template" data-parent="#accordionExample">
                @if(auth()->user()->utype === 5)
                    <li class="@if(URL::current() == route('admin.create.template')) active @endif">
                        <a href="{{ route('admin.create.template') }}"> New Template/Script </a>
                    </li>
                    <li class="@if(URL::current() == route('admin.template')) active @endif">
                        <a href="{{ route('admin.template') }}"> Template/Script List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.deactive-list.template')) active @endif">
                        <a href="{{ route('admin.deactive-list.template') }}"> Deactive List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash.template')) active @endif">
                        <a href="{{ route('admin.trash.template') }}"> Trash</a>
                    </li>
                @elseif(auth()->user()->utype === 2)
                    <li class="@if(URL::current() == route('moderator.create.template')) active @endif">
                        <a href="{{ route('moderator.create.template') }}"> New Template </a>
                    </li>
                    <li class="@if(URL::current() == route('moderator.template')) active @endif">
                        <a href="{{ route('moderator.template') }}"> Template List</a>
                    </li>
                    <li class="@if(URL::current() == route('moderator.deactive-list.template')) active @endif">
                        <a href="{{ route('moderator.deactive-list.template') }}"> Deactive List</a>
                    </li>
                @endif
                </ul>
            </li>

        @if(auth()->user()->utype === 5)
            <li class="menu  @if(URL::current() == route('admin.create-category.template') || URL::current() ==  route('admin.category.template') || URL::current() ==  route('admin.trash-category.template')) active @endif">
                <a href="#templatecategory" data-toggle="collapse" @if(URL::current() == route('admin.create-category.template') || URL::current() ==  route('admin.category.template') || URL::current() ==  route('admin.trash-category.template')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                        <span>CATEGORY</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="templatecategory" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.create-category.template')) active @endif">
                        <a href="{{ route('admin.create-category.template') }}"> Create Category</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.category.template')) active @endif">
                        <a href="{{ route('admin.category.template') }}"> Category List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash-category.template')) active @endif">
                        <a href="{{ route('admin.trash-category.template') }}"> Trash</a>
                    </li>
                </ul>
            </li>

            <li class="menu  @if(URL::current() == route('admin.create-tag.template') || URL::current() ==  route('admin.tag.template') || URL::current() ==  route('admin.trash-tag.template')) active @endif">
                <a href="#templatetag" data-toggle="collapse" @if(URL::current() == route('admin.create-tag.template') || URL::current() ==  route('admin.tag.template') || URL::current() ==  route('admin.trash-tag.template')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                        <span>TAG</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="templatetag" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.create-tag.template')) active @endif">
                        <a href="{{ route('admin.create-tag.template') }}"> Create Tag</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.tag.template')) active @endif">
                        <a href="{{ route('admin.tag.template') }}"> Tag List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash-tag.template')) active @endif">
                        <a href="{{ route('admin.trash-tag.template') }}"> Trash</a>
                    </li>
                </ul>
            </li>
        @endif
            {{-- TEMPLATE END --}}
        @endif

        @if($platform->movie_status == 1)
            {{-- MOVIE START --}}
        @if(auth()->user()->utype === 5)
        <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>MOVIE SECTOR</span></div>
            </li>
            <li class="menu  @if(URL::current() == route('admin.create.movie') || URL::current() ==  route('admin.movie') || URL::current() ==  route('admin.deactive-list.movie') || URL::current() ==  route('admin.trash.movie')) active @endif">
                <a href="#movie" data-toggle="collapse" @if(URL::current() == route('admin.create.movie') || URL::current() ==  route('admin.movie') || URL::current() ==  route('admin.deactive-list.movie') || URL::current() ==  route('admin.trash.movie')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-film"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect><line x1="7" y1="2" x2="7" y2="22"></line><line x1="17" y1="2" x2="17" y2="22"></line><line x1="2" y1="12" x2="22" y2="12"></line><line x1="2" y1="7" x2="7" y2="7"></line><line x1="2" y1="17" x2="7" y2="17"></line><line x1="17" y1="17" x2="22" y2="17"></line><line x1="17" y1="7" x2="22" y2="7"></line></svg>
                        <span>MOVIE</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="movie" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.create.movie')) active @endif">
                        <a href="{{ route('admin.create.movie') }}"> New Movie </a>
                    </li>
                    <li class="@if(URL::current() == route('admin.movie')) active @endif">
                        <a href="{{ route('admin.movie') }}"> Movie List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.deactive-list.movie')) active @endif">
                        <a href="{{ route('admin.deactive-list.movie') }}"> Deactive List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash.movie')) active @endif">
                        <a href="{{ route('admin.trash.movie') }}"> Trash</a>
                    </li>
                </ul>
            </li>

            <li class="menu  @if(URL::current() == route('admin.create.youtube-movie') || URL::current() ==  route('admin.youtube-movie') || URL::current() ==  route('admin.deactive-list.youtube-movie') || URL::current() ==  route('admin.trash.youtube-movie')) active @endif">
                <a href="#ytmovie" data-toggle="collapse" @if(URL::current() == route('admin.create.youtube-movie') || URL::current() ==  route('admin.youtube-movie') || URL::current() ==  route('admin.deactive-list.youtube-movie') || URL::current() ==  route('admin.trash.youtube-movie')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-film"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect><line x1="7" y1="2" x2="7" y2="22"></line><line x1="17" y1="2" x2="17" y2="22"></line><line x1="2" y1="12" x2="22" y2="12"></line><line x1="2" y1="7" x2="7" y2="7"></line><line x1="2" y1="17" x2="7" y2="17"></line><line x1="17" y1="17" x2="22" y2="17"></line><line x1="17" y1="7" x2="22" y2="7"></line></svg>
                        <span>YOUTUBE MOVIE</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="ytmovie" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.create.youtube-movie')) active @endif">
                        <a href="{{ route('admin.create.youtube-movie') }}"> New Movie </a>
                    </li>
                    <li class="@if(URL::current() == route('admin.youtube-movie')) active @endif">
                        <a href="{{ route('admin.youtube-movie') }}"> Movie List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.deactive-list.youtube-movie')) active @endif">
                        <a href="{{ route('admin.deactive-list.youtube-movie') }}"> Deactive List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash.youtube-movie')) active @endif">
                        <a href="{{ route('admin.trash.youtube-movie') }}"> Trash</a>
                    </li>
                </ul>
            </li>

            <li class="menu  @if(URL::current() == route('admin.create-category.movie') || URL::current() ==  route('admin.category.movie') || URL::current() ==   route('admin.trash-category.movie')) active @endif">
                <a href="#moviecategory" data-toggle="collapse" @if(URL::current() == route('admin.create-category.movie') || URL::current() ==  route('admin.category.movie') || URL::current() ==   route('admin.trash-category.movie')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                        <span>CATEGORY</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="moviecategory" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.create-category.movie')) active @endif">
                        <a href="{{ route('admin.create-category.movie') }}"> Create Category</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.category.movie')) active @endif">
                        <a href="{{ route('admin.category.movie') }}"> Category List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash-category.movie')) active @endif">
                        <a href="{{ route('admin.trash-category.movie') }}"> Trash</a>
                    </li>
                </ul>
            </li>
        @endif
            {{-- MOVIE END --}}
        @endif


        @if($platform->source_status == 1)
            {{-- SOURCE START --}}
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>SOURCE SECTOR</span></div>
            </li>
            <li class="menu  @if(URL::current() == route('admin.create.source') || URL::current() ==  route('admin.deactive-list.source') || URL::current() ==  route('admin.source') || URL::current() ==  route('admin.trash.source') || URL::current() == route('moderator.create.source') || URL::current() ==  route('moderator.deactive-list.source') || URL::current() ==  route('moderator.source')) active @endif">
                <a href="#source" data-toggle="collapse" @if(URL::current() == route('admin.create.source') || URL::current() ==  route('admin.deactive-list.source') || URL::current() ==  route('admin.source') || URL::current() ==  route('admin.trash.source') || URL::current() == route('moderator.create.source') || URL::current() ==  route('moderator.deactive-list.source') || URL::current() ==  route('moderator.source')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                        <span>SOURCE</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="source" data-parent="#accordionExample">
                @if(auth()->user()->utype === 5)
                    <li class="@if(URL::current() == route('admin.create.source')) active @endif">
                        <a href="{{ route('admin.create.source') }}"> New Source </a>
                    </li>
                    <li class="@if(URL::current() == route('admin.source')) active @endif">
                        <a href="{{ route('admin.source') }}"> Source List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.deactive-list.source')) active @endif">
                        <a href="{{ route('admin.deactive-list.source') }}"> Deactive List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash.source')) active @endif">
                        <a href="{{ route('admin.trash.source') }}"> Trash</a>
                    </li>
                @elseif(auth()->user()->utype === 2)
                    <li class="@if(URL::current() == route('moderator.create.source')) active @endif">
                        <a href="{{ route('moderator.create.source') }}"> New Source </a>
                    </li>
                    <li class="@if(URL::current() == route('moderator.source')) active @endif">
                        <a href="{{ route('moderator.source') }}"> Source List</a>
                    </li>
                    <li class="@if(URL::current() == route('moderator.deactive-list.source')) active @endif">
                        <a href="{{ route('moderator.deactive-list.source') }}"> Deactive List</a>
                    </li>
                @endif
                </ul>
            </li>

        @if(auth()->user()->utype === 5)
            <li class="menu  @if(URL::current() == route('admin.create-category.source') || URL::current() ==  route('admin.category.source') || URL::current() ==  route('admin.trash-category.source')) active @endif">
                <a href="#sourcecategory" data-toggle="collapse" @if(URL::current() == route('admin.create-category.source') || URL::current() ==  route('admin.category.source') || URL::current() ==  route('admin.trash-category.source')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                        <span>CATEGORY</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="sourcecategory" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.create-category.source')) active @endif">
                        <a href="{{ route('admin.create-category.source') }}"> Create Category</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.category.source')) active @endif">
                        <a href="{{ route('admin.category.source') }}"> Category List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash-category.source')) active @endif">
                        <a href="{{ route('admin.trash-category.source') }}"> Trash</a>
                    </li>
                </ul>
            </li>
        @endif
            {{-- SOURCE END --}}
        @endif


        @if($platform->web_stories_status == 1)
            {{-- WEB STORY START --}}
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>WEB STORY SECTOR</span></div>
            </li>
            <li class="menu  @if(URL::current() == route('admin.create.web-story') || URL::current() == route('admin.web-stories.grid') || URL::current() ==  route('admin.pending-list.web-stories') || URL::current() ==  route('admin.deactive-list.web-stories') || URL::current() ==  route('admin.web-stories') || URL::current() ==  route('admin.trash.web-stories') || URL::current() == route('moderator.create.web-story') || URL::current() ==  route('moderator.deactive-list.web-stories') || URL::current() ==  route('moderator.web-stories')) active @endif">
                <a href="#webstories" data-toggle="collapse" @if(URL::current() == route('admin.create.web-story') || URL::current() ==  route('admin.pending-list.web-stories') || URL::current() ==  route('admin.deactive-list.web-stories') || URL::current() ==  route('admin.web-stories') || URL::current() == route('admin.web-stories.grid') || URL::current() ==  route('admin.trash.web-stories') || URL::current() == route('moderator.create.web-story') || URL::current() ==  route('moderator.deactive-list.web-stories') || URL::current() ==  route('moderator.web-stories')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                        <span>WEB STORY</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="webstories" data-parent="#accordionExample">
                @if(auth()->user()->utype === 5)
                    <li class="@if(URL::current() == route('admin.create.web-story')) active @endif">
                        <a href="{{ route('admin.create.web-story') }}"> New Web Story </a>
                    </li>
                    <li class="@if(URL::current() == route('admin.web-stories')) active @endif">
                        <a href="{{ route('admin.web-stories') }}"> Web Story List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.web-stories.grid')) active @endif">
                        <a href="{{ route('admin.web-stories.grid') }}"> List Grid View</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.deactive-list.web-stories')) active @endif">
                        <a href="{{ route('admin.deactive-list.web-stories') }}"> Deactive List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash.web-stories')) active @endif">
                        <a href="{{ route('admin.trash.web-stories') }}"> Trash</a>
                    </li>
                @elseif(auth()->user()->utype === 2)
                    <li class="@if(URL::current() == route('moderator.create.web-story')) active @endif">
                        <a href="{{ route('moderator.create.web-story') }}"> New Web Story </a>
                    </li>
                    <li class="@if(URL::current() == route('moderator.web-stories')) active @endif">
                        <a href="{{ route('moderator.web-stories') }}"> Web Story List</a>
                    </li>
                    <li class="@if(URL::current() == route('moderator.deactive-list.web-stories')) active @endif">
                        <a href="{{ route('moderator.deactive-list.web-stories') }}"> Deactive List</a>
                    </li>
                @endif
                </ul>
            </li>
            {{-- WEB STORY END --}}
        @endif


        
        @if(auth()->user()->utype === 5)

        @if($platform->backlinks_status == 1)
            {{-- BACKLINKS START --}}
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>BACKLINKS SECTOR</span></div>
            </li>
            <li class="menu  @if(URL::current() == route('admin.create-backlinks') || URL::current() ==  route('admin.backlinks') || URL::current() ==  route('admin.backlinks.page') || URL::current() == route('admin.trash-backlinks')) active @endif">
                <a href="#backlinks" data-toggle="collapse" @if(URL::current() == route('admin.create-backlinks') || URL::current() ==  route('admin.backlinks') || URL::current() ==  route('admin.backlinks.page') || URL::current() == route('admin.trash-backlinks')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                        <span>BACKLINKS</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="backlinks" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.create-backlinks')) active @endif">
                        <a href="{{ route('admin.create-backlinks') }}"> New Backlinks </a>
                    </li>
                    <li class="@if(URL::current() == route('admin.backlinks')) active @endif">
                        <a href="{{ route('admin.backlinks') }}"> Backlinks List </a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash-backlinks')) active @endif">
                        <a href="{{ route('admin.trash-backlinks') }}"> Backlinks Trash </a>
                    </li>
                    <li class="@if(URL::current() == route('admin.backlinks.page')) active @endif">
                        <a href="{{ route('admin.backlinks.page') }}"> Backlinks Page </a>
                    </li>
                </ul>
            </li>
            {{-- BACKLINKS END --}}
        @endif

        @if($platform->youtube_status == 1)
            {{-- YOUTUBE START --}}
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>YOUTUBE SECTOR</span></div>
            </li>
            <li class="menu  @if(URL::current() == route('admin.create.youtube') || URL::current() ==  route('admin.youtube') || URL::current() ==  route('admin.trash.youtube')) active @endif">
                <a href="#ychannel" data-toggle="collapse" @if(URL::current() == route('admin.create.youtube') || URL::current() ==  route('admin.youtube') || URL::current() ==  route('admin.trash.youtube')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-youtube"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
                        <span>YOUTUBE CHANNEL</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="ychannel" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.create.youtube')) active @endif">
                        <a href="{{ route('admin.create.youtube') }}"> New Channel </a>
                    </li>
                    <li class="@if(URL::current() == route('admin.youtube')) active @endif">
                        <a href="{{ route('admin.youtube') }}"> Channel List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash.youtube')) active @endif">
                        <a href="{{ route('admin.trash.youtube') }}"> Trash</a>
                    </li>
                </ul>
            </li>
            {{-- YOUTUBE END --}}
        @endif

            {{-- USER MANAGEMENT --}}
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>USER MANAGEMENT</span></div>
            </li>
            <li class="menu  @if(URL::current() == route('admin.users') || URL::current() ==  route('admin.block.users') || URL::current() ==  route('admin.moderator.users') || URL::current() ==  route('admin.admin.users') || URL::current() ==  route('admin.trash.users')) active @endif">
                <a href="#users" data-toggle="collapse" @if(URL::current() == route('admin.users') || URL::current() ==  route('admin.block.users') || URL::current() ==  route('admin.moderator.users') || URL::current() ==  route('admin.admin.users') || URL::current() ==  route('admin.trash.users')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>USERS</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="users" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.users')) active @endif">
                        <a href="{{ route('admin.users') }}"> General Users </a>
                    </li>
                    <li class="@if(URL::current() == route('admin.block.users')) active @endif">
                        <a href="{{ route('admin.block.users') }}"> Block Users</a>
                    </li>
                @if(auth()->user()->utype == 5)
                    <li class="@if(URL::current() == route('admin.moderator.users')) active @endif">
                        <a href="{{ route('admin.moderator.users') }}"> Moderator Users</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.admin.users')) active @endif">
                        <a href="{{ route('admin.admin.users') }}"> Admins</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash.users')) active @endif">
                        <a href="{{ route('admin.trash.users') }}"> Trash</a>
                    </li>
                @endif
                </ul>
            </li>


            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>WEBSITE MASTER</span></div>
            </li>

            <li class="menu  @if(URL::current() == route('admin.seo.blog') || URL::current() == route('admin.seo.tutorial') || URL::current() == route('admin.seo.template') || URL::current() == route('admin.seo.story') || URL::current() == route('admin.seo.pdf') || URL::current() == route('admin.seo.source') || URL::current() == route('admin.seo.web-story') || URL::current() == route('admin.seo.movie')) active @endif">
                <a href="#seo" data-toggle="collapse" @if(URL::current() == route('admin.seo.blog') || URL::current() == route('admin.seo.tutorial') || URL::current() == route('admin.seo.template') || URL::current() == route('admin.seo.story') || URL::current() == route('admin.seo.pdf') || URL::current() == route('admin.seo.source') || URL::current() == route('admin.seo.web-story') || URL::current() == route('admin.seo.movie')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                        <span>SEO</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="seo" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.seo.blog')) active @endif">
                        <a href="{{ route('admin.seo.blog') }}"> BLOG</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.seo.tutorial')) active @endif">
                        <a href="{{ route('admin.seo.tutorial') }}"> TUTORIAL</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.seo.template')) active @endif">
                        <a href="{{ route('admin.seo.template') }}"> TEMPLATE/SCRIPT</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.seo.story')) active @endif">
                        <a href="{{ route('admin.seo.story') }}"> STORY</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.seo.pdf')) active @endif">
                        <a href="{{ route('admin.seo.pdf') }}"> PDF</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.seo.source')) active @endif">
                        <a href="{{ route('admin.seo.source') }}"> PREMIUM SOURCE</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.seo.web-story')) active @endif">
                        <a href="{{ route('admin.seo.web-story') }}"> WEB STORY</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.seo.movie')) active @endif">
                        <a href="{{ route('admin.seo.movie') }}"> MOVIE</a>
                    </li>
                </ul>
            </li>

            <li class="menu  @if(URL::current() == route('admin.create.faq') || URL::current() ==  route('admin.faq') || URL::current() ==  route('admin.trash.faq')) active @endif">
                <a href="#faq" data-toggle="collapse" @if(URL::current() == route('admin.create.faq') || URL::current() ==  route('admin.faq') || URL::current() ==  route('admin.trash.faq')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                        <span>FAQ</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="faq" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.create.faq')) active @endif">
                        <a href="{{ route('admin.create.faq') }}"> Create FAQ</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.faq')) active @endif">
                        <a href="{{ route('admin.faq') }}"> FAQ List</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.trash.faq')) active @endif">
                        <a href="{{ route('admin.trash.faq') }}"> Trash</a>
                    </li>
                </ul>
            </li>

            <li class="menu  @if(URL::current() == route('admin.custom.code') || URL::current() == route('admin.ads') || URL::current() == route('admin.control.platform')) active @endif">
                <a href="#customize" data-toggle="collapse" @if(URL::current() == route('admin.custom.code') || URL::current() == route('admin.ads') || URL::current() == route('admin.control.platform')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                        <span>CUSTOMIZATION</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="customize" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.custom.code') ) active @endif">
                        <a href="{{ route('admin.custom.code') }}"> CUSTOM CODING</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.ads')) active @endif">
                        <a href="{{ route('admin.ads') }}"> ADS PROGRAM</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.control.platform')) active @endif">
                        <a href="{{ route('admin.control.platform') }}"> PLATFORM CONTROL</a>
                    </li>
                    <li class="@if(URL::current() == route('admin.tools.site')) active @endif">
                        <a href="{{ route('admin.tools.site') }}"> MORE TOOLS</a>
                    </li>
                </ul>
            </li>

            <li class="menu  @if(URL::current() == route('admin.sitemap.list')) active @endif">
                <a href="#sitemap" data-toggle="collapse" @if(URL::current() == route('admin.sitemap.list')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                        <span>SITEMAP</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="sitemap" data-parent="#accordionExample">
                    <li class="@if(URL::current() == route('admin.sitemap.list') ) active @endif">
                        <a href="{{ route('admin.sitemap.list') }}"> SITEMAP LIST</a>
                    </li>
                    <li class="@if(URL::current() == route('sitemap') ) active @endif">
                        <a href="{{ route('sitemap') }}" target="_blank"> SITEMAP UPDATE</a>
                    </li>
                </ul>
            </li>

            <li class="menu @if(URL::current() == route('admin.about')) active @endif">
                <a href="{{ route('admin.about') }}" @if(URL::current() == route('admin.about')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
                        <span>ABOUT</span>
                    </div>
                </a>
            </li>

            <li class="menu @if(URL::current() == route('admin.terms')) active @endif">
                <a href="{{ route('admin.terms') }}" @if(URL::current() == route('admin.terms')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        <span>TERMS & CONDITION</span>
                    </div>
                </a>
            </li>

            <li class="menu @if(URL::current() == route('admin.privacy')) active @endif">
                <a href="{{ route('admin.privacy') }}" @if(URL::current() == route('admin.privacy')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        <span>PRIVACY POLICY</span>
                    </div>
                </a>
            </li>

            <li class="menu @if(URL::current() == route('admin.helps')) active @endif">
                <a href="{{ route('admin.helps') }}" @if(URL::current() == route('admin.helps')) aria-expanded="true" @endif class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        <span>HELPS</span>
                    </div>
                </a>
            </li>

            <li class="menu @if(URL::current() == route('admin.setting')) active @endif">
                <a href="{{ route('admin.setting') }}" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                        <span>INFORMATION SETUP</span>
                    </div>
                </a>
            </li>
        @endif


        </ul>

    </nav>

</div>
<!--  END SIDEBAR  -->
