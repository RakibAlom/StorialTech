@php
    $scates = App\Models\Category\CategoryStory::where('status', 1)->orderBy('name', 'asc')->get();
    $tucates = App\Models\Category\CategoryTutorial::where('status', 1)->orderBy('name', 'asc')->get();
    $pcates = App\Models\Category\CategoryPdf::where('status', 1)->orderBy('name', 'asc')->get();
    $temcates = App\Models\Category\CategoryTemplate::where('status', 1)->orderBy('name', 'asc')->get();
    $mcates = App\Models\Category\CategoryMovie::where('status', 1)->orderBy('name', 'asc')->get();
@endphp

<header class="main-header header-style-1 font-heading">
    <div class="header-top">
        <div class="container">
            <div class="row pt-10 pb-10">
                <div class="col-md-3 col-xs-6">
                @if($setting->logo)
                    <a href="{{ url('/') }}"><img class="logo" src="{{ asset('storage/app/public/'.$setting->logo) }}" alt="{{ $setting->title }}"></a>
                @endif
                </div>
                <div class="col-md-9 col-xs-6 text-right header-top-right ">
                    <ul class="list-inline nav-topbar d-none d-md-inline">
                        {{-- <li class="list-inline-item"><a href="https://forums.storialtech.com" title="Forums - Social Question & Answers Solutions">Forums</a></li> --}}
                        <li class="list-inline-item"><a href="https://videodownloader.storialtech.com" title="Social Video Downloader">VideoDownloader</a></li>
                    @auth
                        <li class="list-inline-item menu-item-children">
                            <a href="javascript:void(0)">{{ Str::words(auth()->user()->fullname,1,'') }}</a>
                            <ul class="sub-menu font-small">
                                {{-- <li><a href="javascript:void(0)"><i class="fa fa-user mr-1"></i> Profile</a></li> --}}
                            @if(auth()->user()->utype == 5)
                                <li><a href="{{ route('admin.home') }}" target="_blank"><i class="fa fa-user mr-1"></i> Dashboard</a></li>
                            @elseif(auth()->user()->utype == 2)
                                <li><a href="{{ route('moderator.home') }}" target="_blank"><i class="fa fa-user mr-1"></i> Dashboard</a></li>
                            @endif
                                {{-- <li><a href="javascript:void(0)"><i class="fa fa-cog mr-1"></i> Setting</a></li> --}}
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out mr-1"></i> Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="list-inline-item"><a href="{{ route('login') }}">Login</a></li>
                        <li class="list-inline-item"><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                    </ul>
                    <span class="vertical-divider mr-20 ml-20 d-none d-md-inline"></span>
                    <button class="search-icon d-md-inline"><span class="mr-15 text-muted font-small"><i class="elegant-icon icon_search mr-5"></i>Search</span></button>
                    <button class="btn btn-radius bg-primary text-white ml-15 font-small box-shadow" data-toggle="modal" data-target="#donateModal">Donate</button>
                </div>
            </div>
        </div>
    </div>

    <div class="header-sticky">
        <div class="container align-self-center">
            <div class="mobile_menu d-lg-none d-block"></div>
            <div class="main-nav d-none d-lg-block float-left">
                <nav>
                    <!--Desktop menu-->
                    <ul class="main-menu d-none d-lg-inline text-uppercase font-small">
                        <li class="current-item">
                            <a href="{{ route('site') }}"> <i class="elegant-icon icon-house-alt mr-5"></i> Home</a>
                        </li>
                        <li class="menu-item-children">
                            <a href="{{ route('tutorial') }}">Tutorial</a>
                            <ul class="sub-menu font-small">
                            @foreach($tucates as $item)
                                <li><a href="{{ $item->path() }}">{{ $item->name }}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        <li class="menu-item-children">
                            <a href="{{ route('template') }}">Template</a>
                            <ul class="sub-menu font-small">
                            @foreach($temcates as $item)
                                <li><a href="{{ $item->path() }}">{{ $item->name }}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        <li class="menu-item-children">
                            <a href="{{ route('pdf') }}">PDF</a>
                            <ul class="sub-menu font-small">
                            @foreach($pcates as $item)
                                <li><a href="{{ $item->path() }}">{{ $item->name }}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        <li class="menu-item-children">
                            <a href="{{ route('story') }}">Story</a>
                            <ul class="sub-menu font-small">
                            @foreach($scates as $item)
                                <li><a href="{{ $item->path() }}">{{ $item->name }}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        {{-- <li class="menu-item-children">
                            <a href="{{ route('movie') }}">Movie</a>
                            <ul class="sub-menu font-small">
                                <li><a href="{{ route('youtube.movie') }}">Youtube Movie</a></li> 
                            @foreach($mcates as $item)
                                <li><a href="{{ $item->path() }}">{{ $item->name }}</a></li>
                            @endforeach
                            </ul>
                        </li> --}}
                        <!--<li> <a href="{{ route('movie') }}">Movie</a> </li>-->
                        <li> <a href="{{ route('source') }}">PreFree</a> </li>
                        <li> <a href="{{ route('blog') }}">Blog</a> </li>
                        <!--<li> <a href="https://movielinksa2z.blogspot.com/" target="_blank">Movie</a> </li>-->
                    </ul>



                    <!--Mobile menu-->
                    <ul id="mobile-menu" class="d-block d-lg-none text-uppercase">
                        <li>
                            <a href="{{ route('site') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('story') }}">Story</a>
                        </li>
                        <li>
                            <a href="{{ route('tutorial') }}">Tutorial</a>
                        </li>
                        <li>
                            <a href="{{ route('template') }}">Template</a>
                        </li>
                        <li>
                            <a href="{{ route('pdf') }}">PDF</a>
                        </li>
                        <!--<li>-->
                        <!--    <a href="{{ route('movie') }}">Movie</a>-->
                            
                        <!--</li>-->
                        <li> <a href="{{ route('source') }}">PreFree</a> </li>
                        <li> <a href="{{ route('blog') }}">Blog</a> </li>
                        <!--<li class="list-inline-item"><a href="https://forums.storialtech.com" title="Forums - Social Question & Answers Solutions">Forums</a></li>-->
                        <li> <a href="https://videodownloader.storialtech.com" title="Social Video Downloader">Video Downloader</a> </li>
                    @auth
                        <li class="menu-item-children"><a href="javascript:void(0)">{{ auth()->user()->fullname }}</a>
                            <ul class="sub-menu font-small">
                            @if(auth()->user()->utype == 5)
                                <li><a href="{{ route('admin.home') }}" target="_blank"><i class="fa fa-user mr-1"></i> Dashboard</a></li>
                            @endif
                                {{-- <li><a href="javascript:void(0)"><i class="fa fa-cog mr-1"></i> Setting</a></li> --}}
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out mr-1"></i> Logout</a></li>
                            </ul>
                        </li>
                    @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                    </ul>



                </nav>
            </div>
            <div class="float-right header-tools text-muted font-small">
                <ul class="header-social-network d-inline-block list-inline mr-15">
                    <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="{{ $setting->fb_link }}"><i class="elegant-icon social_facebook"></i></a></li>
                    <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="{{ $setting->twitter_link }}"><i class="elegant-icon social_twitter "></i></a></li>
                    <li class="list-inline-item"><a class="social-icon pt text-xs-center" target="_blank" href="{{ $setting->pinterest_link }}"><i class="elegant-icon social_pinterest "></i></a></li>
                </ul>
                <div class="off-canvas-toggle-cover d-inline-block">
                    <div class="off-canvas-toggle hidden d-inline-block" id="off-canvas-toggle">
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</header>

<!--Start search form-->
<div class="main-search-form">
    <div class="container">
        <div class=" pt-50 pb-50 ">
            <div class="row mb-20">
                <div class="col-12 align-self-center main-search-form-cover m-auto">
                    <p class="text-center"><span class="search-text-bg">Search</span></p>
                    <form action="{{ route('search') }}" class="search-header" method="GET">
                        <div class="input-group w-100">
                            <input type="text" name="search" class="form-control" placeholder="Search tutorials, stories, template, movie and pdf">
                            <div class="input-group-append">
                                <button class="btn btn-search bg-white" type="submit">
                                    <i class="elegant-icon icon_search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-80 text-center">
                <div class="col-12 font-small suggested-area">
                    <h5 class="suggested font-heading mb-20 text-muted"> <strong>Suggested keywords:</strong></h5>
                    <ul class="list-inline d-inline-block">
                    @php
                        $scates = App\Models\Category\CategoryStory::where('status', 1)->orderBy('views', 'desc')->take(2)->get();
                        $tucates = App\Models\Category\CategoryTutorial::where('status', 1)->orderBy('views', 'desc')->take(1)->get();
                        $pcates = App\Models\Category\CategoryPdf::where('status', 1)->orderBy('views', 'desc')->take(2)->get();
                        $temcates = App\Models\Category\CategoryTemplate::where('status', 1)->orderBy('views', 'desc')->take(2)->get();
                        $mcates = App\Models\Category\CategoryMovie::where('status', 1)->orderBy('views', 'desc')->take(2)->get();
                    @endphp
                        <div class="tagcloud mt-50">
                        @foreach($scates as $item)
                            <li class="list-inline-item"><a href="{{ route('site').'/search?search='.$item->name }}">{{ Str::words($item->name,2,'') }}</a></li>
                        @endforeach
                        @foreach($pcates as $item)
                            <li class="list-inline-item"><a href="{{ route('site').'/search?search='.$item->name }}">{{ Str::words($item->name,2,'') }}</a></li>

                        @endforeach
                        @foreach($temcates as $item)
                            <li class="list-inline-item"><a href="{{ route('site').'/search?search='.$item->name }}">{{ Str::words($item->name,2,'') }}</a></li>

                        @endforeach
                        @foreach($mcates as $item)
                            <li class="list-inline-item"><a href="{{ route('site').'/search?search='.$item->name }}">{{ Str::words($item->name,2,'') }}</a></li>
                        @endforeach
                        @foreach($tucates as $item)
                        <li class="list-inline-item"><a href="{{ route('site').'/search?search='.$item->name }}">{{ Str::words($item->name,2,'') }}</a></li>
                        @endforeach
                        <a href="{{ route('source') }}">Free Source</a>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="donateModal" tabindex="-1" aria-labelledby="donateModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered rounded-0">
      <div class="modal-content rounded-0">
        <div class="modal-header rounded-0">
          <h5 class="modal-title" id="exampleModalLabel">Give Your Donate</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center rounded-0">
            <h5 class="font-weight-bold p-3">
                {{ $setting->phone_2 }}
            </h5>
            <img class="img-fluid" src="{{ asset('public/frontend/img/donate-storialtech.png') }}" alt="Donate">
        </div>
      </div>
    </div>
  </div>
