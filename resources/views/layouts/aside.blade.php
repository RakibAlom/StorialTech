@php
    $bcates = App\Models\Category\CategoryBlog::where('status', 1)->orderBy('name', 'asc')->get();
    $tucates = App\Models\Category\CategoryTutorial::where('status', 1)->orderBy('name', 'asc')->get();
    $temcates = App\Models\Category\CategoryTemplate::where('status', 1)->orderBy('name', 'asc')->get();
    $mcates = App\Models\Category\CategoryMovie::where('status', 1)->orderBy('name', 'asc')->get();
    $scates = App\Models\Category\CategoryStory::where('status', 1)->orderBy('name', 'asc')->get();
    $pcates = App\Models\Category\CategoryPdf::where('status', 1)->orderBy('name', 'asc')->get();
@endphp
<!--Offcanvas sidebar-->
<aside id="sidebar-wrapper" class="custom-scrollbar off-canvas-sidebar">
    <button class="off-canvas-close"><i class="elegant-icon icon_close"></i></button>
    <div class="sidebar-inner">
        

        <!--Categories-->
        <div class="sidebar-widget widget_categories mb-20 mt-30">
            <div class="widget-header-2 position-relative">
                <h5 class="mt-5 mb-15">Blog Category</h5>
            </div>
            <div class="widget_nav_menu">
                <ul>
                @foreach($bcates as $cate)
                    <li class="cat-item cat-item-2"><a href="{{ $cate->path() }}">{{ $cate->name }}</a>
                        <span class="post-count">{{ $cate->blog->count() }}</span>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        
        <!--Categories-->
        <div class="sidebar-widget widget_categories mb-20 mt-30">
            <div class="widget-header-2 position-relative">
                <h5 class="mt-5 mb-15">Tutorial Category</h5>
            </div>
            <div class="widget_nav_menu">
                <ul>
                @foreach($tucates as $cate)
                    <li class="cat-item cat-item-2"><a href="{{ $cate->path() }}">{{ $cate->name }} Tutorial</a>
                        <span class="post-count">{{ $cate->tutorial->count() }}</span>
                    </li>

                    <div class="sidebar-widget widget_tagcloud">
                        <div class="tagcloud mt-10">
                        @foreach($cate->tag as $tag)
                            <a class="tag-cloud-link" href="{{ $tag->path() }}">{{ $tag->name }} <span class="post-count">({{ $tag->tutorial->count() }})</span></a>
                        @endforeach
                        </div>
                    </div>
                @endforeach
                </ul>
            </div>
        </div>
        
        <!--Categories-->
        <div class="sidebar-widget widget_categories mb-20 mt-30">
            <div class="widget-header-2 position-relative">
                <h5 class="mt-5 mb-15">Website Template Category</h5>
            </div>
            <div class="widget_nav_menu">
                <ul>
                @foreach($temcates as $cate)
                    <li class="cat-item cat-item-2">
                        <i class="fa fa-folder-o mr-2" style="font-size: 1.2rem;"></i> <a href="{{ $cate->path() }}">{{ $cate->name }} Template</a>
                        <span class="post-count">{{ $cate->template->count() }}</span>
                    </li>

                    <div class="sidebar-widget widget_tagcloud">
                        <div class="tagcloud mt-10">
                        @foreach($cate->tag as $tag)
                            <a class="tag-cloud-link" href="{{ $tag->path() }}">{{ $tag->name }} <span class="post-count">({{ $tag->template->count() }})</span></a>
                        @endforeach
                        </div>
                    </div>
                @endforeach
                </ul>
            </div>
        </div>


        <!--Categories-->
        {{-- <div class="sidebar-widget widget_categories mb-20 mt-30">
            <div class="widget-header-2 position-relative">
                <h5 class="mt-5 mb-15">Movie Category</h5>
            </div>
            <div class="widget_nav_menu">
                <ul>
                @foreach($mcates as $cate)
                    <li class="cat-item cat-item-2">
                        <i class="fa fa-folder-o mr-2" style="font-size: 1.2rem;"></i> <a href="{{ $cate->path() }}">{{ $cate->name }}</a>
                        <span class="post-count">{{ $cate->movie->count() }}</span>
                    </li>
                @endforeach
            </div>
        </div> --}}
        
        <!--Categories-->
        <div class="sidebar-widget widget_categories mb-20 mt-30">
            <div class="widget-header-2 position-relative">
                <h5 class="mt-5 mb-15">Story Category</h5>
            </div>
            <div class="widget_nav_menu">
                <ul>
                @foreach($scates as $cate)
                    <li class="cat-item cat-item-2">
                        <i class="fa fa-folder-o mr-2" style="font-size: 1.2rem;"></i> <a href="{{ $cate->path() }}">{{ $cate->name }}</a>
                        <span class="post-count">{{ $cate->story->count() }}</span>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        
        <!--Categories-->
        <div class="sidebar-widget widget_categories mb-20 mt-30">
            <div class="widget-header-2 position-relative">
                <h5 class="mt-5 mb-15">PDF Category</h5>
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
        
        <!--Ads-->
        <!--<div class="sidebar-widget widget-ads">-->
        <!--    <div class="widget-header-2 position-relative mb-30">-->
        <!--        <h5 class="mt-5 mb-30">Advertise banner</h5>-->
        <!--    </div>-->
        <!--</div>-->

        <div class="sidebar-widget widget_categories mb-20 mt-30">
            <div class="widget-header-2 position-relative mb-20">
                <h5 class="mt-5 mb-30">YouTube Cahnnel <i class=" text-danger fa fa-youtube-play "></i></h5>
            </div>
        @php
            $youtubes = App\Models\Youtube\Youtube::where('status', 1)->get();
        @endphp
        @foreach($youtubes as $item)
            <a href="{{ $item->clink }}" target="_blank">
                <img class="advertise-img border-radius-5" src="{{ asset('storage/app/public/'.$item->image) }}" alt="{{ $item->name }}">
            </a>
            <a href="{{ $item->clink }}" target="_blank">
                <div class="mb-30">
                    <h6 class="mt-5 mb-30 text-success">{{ $item->name }}</h6>
                </div>
            </a>
        @endforeach
        </div>
    </div>
</aside>
