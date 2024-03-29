@php
    $bcates = App\Models\Category\CategoryBlog::where('status', 1)->orderBy('name', 'asc')->get();
    $scates = App\Models\Category\CategoryStory::where('status', 1)->orderBy('name', 'asc')->get();
    $tucates = App\Models\Category\CategoryTutorial::where('status', 1)->orderBy('name', 'asc')->get();
    $pcates = App\Models\Category\CategoryPdf::where('status', 1)->orderBy('name', 'asc')->get();
    $temcates = App\Models\Category\CategoryTemplate::where('status', 1)->orderBy('name', 'asc')->get();
    $mcates = App\Models\Category\CategoryMovie::where('status', 1)->orderBy('name', 'asc')->get();
    $platform = App\Models\Custom\PlatformControl::first();
    $moreSites = App\Models\Tools\ToolSiteLink::orderBy('tool_name','asc')->get();
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
                    {{-- @if($platform->tools_status == 1)
                        <li class="list-inline-item menu-item-children">
                            <a href="javascript:void(0)">More Tools</a>
                            <ul class="sub-menu font-small">
                            @foreach ($moreSites as $item)
                                <li><a href="{{ $item->website_links }}" title="{{ $item->tool_title }}" target="_blank">{{ $item->tool_name }}</a></li>
                            @endforeach
                            </ul>
                        </li> 
                        @foreach ($moreSites as $item)
                                <li class="list-inline-item "><a href="{{ $item->website_links }}" title="{{ $item->tool_title }}" target="_blank">{{ $item->tool_name }}</a></li>
                        @endforeach
                    @endif --}}
                        <li class="list-inline-item"><a href="{{ route('web-stories') }}">WEB STORIES</a></li>
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
                        
                        <li> 
                            <a href="{{ url('blog/category/news') }}">News</a> 
                        </li>
                        <li> 
                            <a href="{{ url('blog/category/tech-review') }}">Reviews</a> 
                        </li>
                        <li> 
                            <a href="{{ url('blog/category/computing') }}">Computing</a> 
                        </li>
                        <li> 
                            <a href="{{ url('blog/category/smartphone') }}">Smartphone</a> 
                        </li>
                        
                        @if($platform->blog_status == 1)
                        <li class="menu-item-children">
                            <a href="{{ route('blog') }}">Blog</a>
                            <ul class="sub-menu font-small">
                            @foreach($bcates as $item)
                                <li><a href="{{ $item->path() }}">{{ $item->name }}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        @endif

                        @if($platform->tutorial_status == 1)
                        <li class="menu-item-children">
                            <a href="{{ route('tutorial') }}">Tutorial</a>
                            <ul class="sub-menu font-small">
                            @foreach($tucates as $item)
                                <li><a href="{{ $item->path() }}">{{ $item->name }}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        @endif


                        {{-- @if($platform->pdf_status == 1)
                        <li class="menu-item-children">
                            <a href="{{ route('pdf') }}">PDF</a>
                            <ul class="sub-menu font-small">
                            @foreach($pcates as $item)
                                <li><a href="{{ $item->path() }}">{{ $item->name }}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        @endif

                        @if($platform->story_status == 1)
                        <li class="menu-item-children">
                            <a href="{{ route('story') }}">Story</a>
                            <ul class="sub-menu font-small">
                            @foreach($scates as $item)
                                <li><a href="{{ $item->path() }}">{{ $item->name }}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        @endif
                        
                        @if($platform->template_status == 1)
                        <li class="menu-item-children">
                            <a href="{{ route('template') }}">Template/Scripts</a>
                            <ul class="sub-menu font-small">
                            @foreach($temcates as $item)
                                <li><a href="{{ $item->path() }}">{{ $item->name }}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        @endif

                        @if($platform->source_status == 1)
                        <li> 
                            <a href="{{ route('source') }}">PreFree</a> 
                        </li>
                        @endif

                        @if($platform->movie_status == 1)
                        <li class="menu-item-children">
                            <a href="{{ route('movie') }}">Movie</a>
                            <ul class="sub-menu font-small">
                                <li><a href="{{ route('movie') }}"> All Movie</a></li> 
                            @foreach($mcates as $item)
                                <li><a href="{{ $item->path() }}">{{ $item->name }}</a></li>
                            @endforeach
                            @if($platform->movie_status == 1)
                                <li>
                                    <a href="{{ route('youtube.movie') }}">Youtube Movie</a>
                                </li> 
                            @endif
                            </ul>
                        </li>
                        @endif --}}
                        
                        @if($platform->tools_status == 1)
                            <li class="list-inline-item menu-item-children">
                                <a href="javascript:void(0)">More</a>
                                <ul class="sub-menu font-small">
                                @if($platform->pdf_status == 1)
                                    <li><a href="{{ route('story') }}" title="Story Library"><i class="fa fa-leanpub mr-1"></i> Story</a></li>
                                @endif
                                @if($platform->story_status == 1)
                                    <li><a href="{{ route('pdf') }}" title="PDF Book Download"><i class="fa fa-book mr-1"></i> PDF BooK</a></li>
                                @endif
                                    <li><a href="{{ route('source') }}" title="Premium Free Source"><i class="fa fa-folder mr-1"></i> Free Source</a></li>
                                    <li><a href="{{ route('template') }}" title="Template & Scripts"><i class="fa fa-code mr-1"></i> Template/Scripts</a></li>
                                @foreach ($moreSites as $item)
                                    <li><a href="{{ $item->website_links }}" title="{{ $item->tool_title }}" target="_blank"><i class="fa @if($item->tool_icon == '') fa-external-link @else {{ $item->tool_icon }} @endif mr-1"></i> {{ $item->tool_name }}</a></li>
                                @endforeach
                                </ul>
                            </li> 
                        @endif
                    </ul>



                    <!--Mobile menu-->
                    <ul id="mobile-menu" class="d-block d-lg-none text-uppercase">
                        <li>
                            <a href="{{ route('site') }}">Home</a>
                        </li>

                        @if($platform->blog_status == 1)
                        <li> 
                            <a href="{{ url('blog/category/news') }}">News</a> 
                        </li>
                        
                        <li> 
                            <a href="{{ url('blog/category/tech-review') }}">Reviews</a> 
                        </li>
                        
                        <li> 
                            <a href="{{ url('blog/category/computing') }}">Computing</a> 
                        </li>
                        
                        <li> 
                            <a href="{{ url('blog/category/smartphone') }}">Smartphone</a> 
                        </li>
                        
                        <li> 
                            <a href="{{ route('blog') }}">Blog</a> 
                        </li>
                        @endif
                        
                        @if($platform->tutorial_status == 1)
                        <li> 
                            <a href="{{ route('tutorial') }}">Tutorial</a> 
                        </li>
                        @endif
                        
                        <li class="menu-item-children"><a href="javascript:void(0)">More</a>
                            <ul class="sub-menu font-small">
                            @if($platform->story_status == 1)
                                <li><a href="{{ route('story') }}" title="Story Library"><i class="fa fa-leanpub mr-1"></i> Story</a></li>
                            @endif
                            @if($platform->pdf_status == 1)
                                <li><a href="{{ route('pdf') }}" title="PDF Book Download"><i class="fa fa-book mr-1"></i> PDF BooK</a></li>
                            @endif
                                <li><a href="{{ route('source') }}" title="Premium Free Source"><i class="fa fa-folder mr-1"></i> Free Source</a></li>
                                <li><a href="{{ route('template') }}" title="Template & Scripts"><i class="fa fa-code mr-1"></i> Template/Scripts</a></li>
                                <li><a href="{{ route('web-stories') }}" title="Our Web Story"><i class="fa fa-instagram mr-1"></i> Web Stories</a></li>
                            @foreach ($moreSites as $item)
                                <li><a href="{{ $item->website_links }}" title="{{ $item->tool_title }}" target="_blank"><i class="fa @if($item->tool_icon == '') fa-external-link @else {{ $item->tool_icon }} @endif mr-1"></i> {{ $item->tool_name }}</a></li>
                            @endforeach
                            </ul>
                        </li>
                    @auth
                        <li class="menu-item-children"><a href="javascript:void(0)">{{ auth()->user()->fullname }}</a>
                            <ul class="sub-menu font-small">
                            @if(auth()->user()->utype == 5)
                                <li><a href="{{ route('admin.home') }}" target="_blank"><i class="fa fa-user mr-1"></i> Dashboard</a></li>
                            @endif
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
                            <input type="text" name="search" class="form-control" placeholder="Search news, blogs, tutorials, stories and more...">
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
                        $bcates = App\Models\Category\CategoryBlog::where('status', 1)->orderBy('views', 'desc')->take(2)->get();
                        $tucates = App\Models\Category\CategoryTutorial::where('status', 1)->orderBy('views', 'desc')->take(1)->get();
                    @endphp
                        <div class="tagcloud mt-50">
                        @foreach($bcates as $item)
                            <li class="list-inline-item"><a href="{{ route('site').'/search?search='.$item->name }}">{{ Str::words($item->name,3,'') }}</a></li>
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
            <img class="img-fluid" src="{{ asset('storage/app/public/' . $setting->donate_image) }}" alt="Donate Image">
        </div>
      </div>
    </div>
  </div>
