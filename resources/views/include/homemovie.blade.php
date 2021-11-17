<div class="template-section bg-grey">
    <div class="container">
        <div class="hot-tags pt-30 pb-20 font-small align-self-center">
            <div class="widget-header-3">
                <div class="row align-self-center">
                    <div class="col-md-4 align-self-center">
                        <h5 class="widget-title">MOVIE FEATURE</h5>
                    </div>
                    <div class="col-md-8 text-md-right font-small align-self-center">
                        <ul class="list-inline d-inline-block tags">
                            <li class="list-inline-item"><a href="{{ route('movie') }}">#All</a></li>
                        @php
                            $mcates = App\Models\Category\CategoryMovie::where('status', 1)->orderBy('views', 'desc')->take(4)->get();
                        @endphp
                        @foreach($mcates as $item)
                            <li class="list-inline-item"><a href="{{ $item->path() }}">#{{ Str::words($item->name, 1, '') }}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="loop-grid">
            <div class="row">
            @php
                $movies = App\Models\Movie\Movie::where('status', 1)->whereNotNull('thumbnail')->latest()->take(8)->get();
             @endphp
            @foreach($movies as $item)
                <article class="col-lg-3 col-md-4 mb-20">
                    <div class="post-card-1 border-radius-10 hover-up">
                        <div class="post-thumb thumb-overlay-movie img-hover-slide position-relative" @if($item->thumbnail) style="background-image: url({{ asset('storage/app/public/'. $item->thumbnail) }})" @else style="background-image: url({{ asset('storage/app/public/'.$setting->cover_image) }})" @endif>
                            <a class="img-link" href="{{ $item->path() }}"></a>
                        </div>
                        <div class="post-content p-20">
                            <div class="entry-meta meta-0 font-small mb-10">
                            @foreach($item->categorymovie as $category)
                                <a href="{{ $category->path() }}"><span class="post-cat text-success">{{ Str::words($category->name, 1,'') }}</span></a>
                            @endforeach
                            </div>
                            <div class="d-flex post-card-content-movie">
                                <h5 class="post-title font-weight-900" style="font-size: 1rem !important;">
                                    <a href="{{ $item->path() }}">{{ Str::words($item->name, 7)}}</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach

            </div>
        </div>
    </div>
</div>
