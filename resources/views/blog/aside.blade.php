@php
    $bcates = App\Models\Category\CategoryBlog::where('status', 1)->orderBy('snumber')->get();
    $setting = App\Models\Admin\Setting::first();

@endphp

<!--Offcanvas sidebar-->
<aside id="sidebar-wrapper" class="custom-scrollbar off-canvas-sidebar">
    <button class="off-canvas-close"><i class="elegant-icon icon_close"></i></button>
    <div class="sidebar-inner">
        <!--Categories-->
        <div class="sidebar-widget widget_categories mb-50 mt-30">
            <div class="widget-header-2 position-relative">
                <h5 class="mt-5 mb-15">Blog Category</h5>
            </div>
            <div class="widget_nav_menu">
                <ul>
                @foreach($bcates as $item)
                    <li class="cat-item cat-item-2"><i class="fa fa-folder-o mr-2" style="font-size: 1.2rem;"></i> <a href="{{ $item->path() }}">{{ $item->name }}</a> <span class="post-count">{{ $item->blog->count() }}</span></li>
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
