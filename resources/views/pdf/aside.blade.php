@php
    $pcates = App\Models\Category\CategoryPdf::where('status', 1)->orderBy('snumber')->get();
    $pauthors = App\Models\Author\AuthorPdf::where('status', 1)->orderBy('snumber')->get();
    $pseries = App\Models\Series\SeriesPdf::where('status', 1)->orderBy('snumber')->get();
    $setting = App\Models\Admin\Setting::first();

@endphp

<!--Offcanvas sidebar-->
<aside id="sidebar-wrapper" class="custom-scrollbar off-canvas-sidebar">
    <button class="off-canvas-close"><i class="elegant-icon icon_close"></i></button>
    <div class="sidebar-inner">
        <!--Categories-->
        <div class="sidebar-widget widget_categories mt-30">
            <div class="widget-header-2 position-relative">
                <h5 class="mt-5 mb-15">PDF CATEGORY</h5>
            </div>
            <div class="widget_nav_menu">
                <ul>
                @foreach($pcates as $cate)
                    <li class="cat-item cat-item-2">
                        <i class="fa fa-folder-o mr-2" style="font-size: 1.2rem;"></i> <a href="{{ $cate->path() }}">{{ $cate->name }}</a>
                        <span class="post-count">{{ $cate->pdf->count() }}</span>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>

        <!--Authors-->
        <div class="sidebar-widget widget_categories mt-30">
            <div class="widget-header-2 position-relative">
                <h5 class="mt-5 mb-15">AUTHOR</h5>
            </div>
            <div class="widget_nav_menu">
                <ul>
                @foreach($pauthors as $author)
                    <li class="cat-item cat-item-2">
                        <i class="fa fa-folder-o mr-2" style="font-size: 1.2rem;"></i> <a href="{{ $author->path() }}">{{ $author->name }}</a>
                        <span class="post-count">{{ $author->pdf->count() }}</span>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>

        <!--Categories-->
        <div class="sidebar-widget widget_categories mt-30">
            <div class="widget-header-2 position-relative">
                <h5 class="mt-5 mb-15">SERIES</h5>
            </div>
            <div class="widget_nav_menu">
                <ul>
                @foreach($pseries as $series)
                    <li class="cat-item cat-item-2">
                        <i class="fa fa-folder-o mr-2" style="font-size: 1.2rem;"></i> <a href="{{ $series->path() }}">{{ $series->name }}</a>
                        <span class="post-count">{{ $series->pdf->count() }}</span>
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
                    $pdfs = App\Models\Pdf\Pdf::where('status', 1)->inRandomOrder()->take(4)->get();
                @endphp
                @foreach($pdfs as $item)
                    <li class="mb-30">
                        <div class="d-flex hover-up-2 transition-normal">
                            <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                <a class="color-white" href="{{ $item->path() }}">
                                    <img src="{{ asset('storage/app/public/'.$item->image) }}" alt="{{ $item->name }}">
                                </a>
                            </div>
                            <div class="post-content media-body">
                                <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="{{ $item->path() }}">{{ $item->name }}</a></h6>
                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                    <span class="post-on">size: {{ $item->size }}</span>
                                    <span class="post-by">{{ $item->views }} views</span>
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
