@php
    $scates = App\Models\Category\CategoryStory::where('status', 1)->orderBy('snumber')->get();
    $setting = App\Models\Admin\Setting::first();

@endphp

<!--Offcanvas sidebar-->
<aside id="sidebar-wrapper" class="custom-scrollbar off-canvas-sidebar">
    <button class="off-canvas-close"><i class="elegant-icon icon_close"></i></button>
    <div class="sidebar-inner">
        <!--Categories-->
        <div class="sidebar-widget widget_categories mb-50 mt-30">
            <div class="widget-header-2 position-relative">
                <h5 class="mt-5 mb-15">Story Category</h5>
            </div>
            <div class="widget_nav_menu">
                <ul>
                @foreach($scates as $item)
                    <li class="cat-item cat-item-2">
                        <i class="fa fa-folder-o mr-2" style="font-size: 1.2rem;"></i> <a href="{{ $item->path() }}">{{ $item->name }}</a> 
                        <span class="post-count">{{ $item->story->count() }}</span>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>

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
