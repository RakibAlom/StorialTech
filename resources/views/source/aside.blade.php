@php
    $pfcates = App\Models\Category\CategoryPrefree::where('status', 1)->orderBy('snumber')->get();
    $setting = App\Models\Admin\Setting::first();

@endphp

<!--Offcanvas sidebar-->
<aside id="sidebar-wrapper" class="custom-scrollbar off-canvas-sidebar">
    <button class="off-canvas-close"><i class="elegant-icon icon_close"></i></button>
    <div class="sidebar-inner">
        <!--Categories-->
        <div class="sidebar-widget widget_categories mb-50 mt-30">
            <div class="widget-header-2 position-relative">
                <h5 class="mt-5 mb-15">PreFree Category</h5>
            </div>
            <div class="widget_nav_menu">
                <ul>
                @foreach($pfcates as $cate)
                    <li class="cat-item cat-item-2">
                        <i class="fa fa-folder-o mr-2" style="font-size: 1.2rem;"></i> <a href="{{ $cate->path() }}">{{ $cate->name }}</a>
                        <span class="post-count">{{ $cate->prefree->count() }}</span>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>

        <!--Latest-->
        {{-- <div class="sidebar-widget widget-latest-posts mb-50">
            <div class="widget-header-2 position-relative mb-30">
                <h5 class="mt-5 mb-30">Don't miss</h5>
            </div>
            <div class="post-block-list post-module-1 post-module-5">
                <ul class="list-post">
                    <li class="mb-30">
                        <div class="d-flex hover-up-2 transition-normal">
                            <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                <a class="color-white" href="single.html">
                                    <img src="" alt="">
                                </a>
                            </div>
                            <div class="post-content media-body">
                                <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="single.html">The 22 Best Things to See and Do in Bangkok</a></h6>
                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                    <span class="post-on">27 August</span>
                                    <span class="post-by has-dot">23k views</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div> --}}
        <!--Ads-->

        <div class="sidebar-widget">
            <div class="widget-header-2 position-relative mb-30">
                <h5 class="mt-5 mb-30">Advertise banner</h5>
            </div>
            <a href="{{ url('/') }}" target="_blank">
                <img class="advertise-img border-radius-5" src="{{ asset('storage/app/public/'.$setting->cover_image) }}" alt="{{ $setting->title }}">
            </a>
        </div>

    </div>
</aside>
