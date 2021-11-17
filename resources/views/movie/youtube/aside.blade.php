@php
    $mcates = App\Models\Category\CategoryMovie::where('status', 1)->orderBy('snumber')->get();
    $setting = App\Models\Admin\Setting::first();

@endphp

<!--Offcanvas sidebar-->
<aside id="sidebar-wrapper" class="custom-scrollbar off-canvas-sidebar">
    <button class="off-canvas-close"><i class="elegant-icon icon_close"></i></button>
    <div class="sidebar-inner">
        <!--Categories-->
        <div class="sidebar-widget widget_categories mb-50 mt-30">
            <div class="widget-header-2 position-relative">
                <h5 class="mt-5 mb-15">Youtube Movie Category</h5>
            </div>
            <div class="widget_nav_menu">
                <ul>
                @foreach($mcates as $cate)
                    <li class="cat-item cat-item-2">
                        <i class="fa fa-folder-o mr-2" style="font-size: 1.2rem;"></i> <a href="{{ $cate->ytpath() }}" rel="nofollow">{{ $cate->name }}</a>
                        <span class="post-count">{{ $cate->ytmovie->count() }}</span>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>

        <!--Latest-->
        <div class="sidebar-widget widget-latest-posts mt-30 mb-50">
            <div class="widget-header-2 position-relative mb-30">
                <h5 class="mt-5 mb-30">Don't miss</h5>
            </div>
            <div class="post-block-list post-module-1 post-module-5">
                <ul class="list-post">
                @php
                    $movies = App\Models\Movie\Youtubemovie::where('status', 1)->inRandomOrder()->take(4)->get();
                @endphp
                @foreach($movies as $item)
                    <li class="mb-30">
                        <div class="hover-up-2 transition-normal">
                            <div class="post-thumb post-thumb-80 mb-10 img-hover-scale overflow-hidden">
                                <iframe src="{{ $item->elink }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width: 100%;  height:180px;"></iframe>
                            </div>
                            <div class="post-content media-body">
                                <h6 class="post-title text-limit-2-row font-medium"><a href="{{ $item->path() }}" rel="nofollow">{{ $item->name }}</a></h6>
                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                    <span class="post-on">size: {{ $item->created_at->format('d F Y') }}</span>
                                    <span class="post-by">{{ $item->views }} views</span>
                                @foreach($item->categoryytmovie->take(1) as $cate)
                                    <span class="post-by"><a href="{{ $cate->path() }}">{{ Str::words($cate->name, 2, '') }}</a></span>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        <!--Ads-->

    </div>
</aside>
