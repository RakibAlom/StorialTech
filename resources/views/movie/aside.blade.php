@php
    $mcates = App\Models\Category\CategoryMovie::where('status', 1)->orderBy('name')->get();

@endphp

<!--Offcanvas sidebar-->
<aside id="sidebar-wrapper" class="custom-scrollbar off-canvas-sidebar">
    <button class="off-canvas-close"><i class="elegant-icon icon_close"></i></button>
    <div class="sidebar-inner">
        <!--Categories-->
        <div class="sidebar-widget widget_categories mb-50 mt-30">
            <div class="widget-header-2 position-relative">
                <h5 class="mt-5 mb-15">Movie Category</h5>
            </div>
            <div class="widget_nav_menu">
                <ul>
                @foreach($mcates as $cate)
                    <li class="cat-item cat-item-2">
                        <i class="fa fa-folder-o mr-2" style="font-size: 1.2rem;"></i> <a href="{{ $cate->path() }}" rel="nofollow">{{ $cate->name }}</a>
                        <span class="post-count">{{ $cate->movie->count() }}</span>
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
                    $movies = App\Models\Movie\Movie::where('status', 1)->inRandomOrder()->take(4)->get();
                @endphp
                @foreach($movies as $item)
                    <li class="mb-30">
                        <div class="d-flex hover-up-2 transition-normal">
                            <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                <a class="color-white" href="{{ $item->path() }}" rel="nofollow">
                                    <img src="{{ asset('storage/app/public/'.$item->thumbnail) }}" alt="{{ $item->name }}">
                                </a>
                            </div>
                            <div class="post-content media-body">
                                <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="{{ $item->path() }}" rel="nofollow">{{ $item->name }}</a></h6>
                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                    <span class="post-on">size: {{ $item->created_at->format('d F Y') }}</span>
                                    <span class="post-by">{{ $item->views }} views</span>
                                    <br><br>
                                @foreach($item->categorymovie->take(1) as $cate)
                                    <span class="post-by"><a href="{{ $cate->path() }}" rel="nofollow">{{ Str::words($cate->name, 2, '') }}</a></span>
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
