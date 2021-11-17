<div class="tutorial-section bg-grey">
        <div class="container">
            <div class="pt-10">
                @include('include.googledisplayads')
            </div>
            <div class="hot-tags pt-20 pb-20 font-small align-self-center">
                <div class="widget-header-3">
                    <div class="row align-self-center">
                        <div class="col-md-4 align-self-center">
                            <h5 class="widget-title">Blog Feature</h5>
                        </div>
                        <div class="col-md-8 text-md-right font-small align-self-center">
                            <ul class="list-inline d-inline-block tags">
                                <li class="list-inline-item"><a href="{{ route('tutorial') }}">#All</a></li>
                            @php
                                $bcates = App\Models\Category\CategoryBlog::where('status', 1)->orderBy('views', 'desc')->take(3)->get();
                            @endphp
                            @foreach($bcates as $item)
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
                    $blogs = App\Models\Blog\Blog::where('status', 1)->latest()->take(6)->get();
                @endphp
                @foreach($blogs as $item)
                    <article class="col-lg-4 col-md-6 mb-20">
                        <div class="post-card-1 border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" @if($item->image) style="background-image: url({{ asset('storage/app/public/'. $item->image) }})" @else style="background-image: url({{ asset('storage/app/public/'.$setting->cover_image) }})" @endif>
                                <a class="img-link" href="{{ $item->path() }}"></a>
                            </div>
                            <div class="post-content p-30">
                                <div class="entry-meta meta-0 font-small mb-10">
                                @foreach($item->categoryblog->take(2) as $category)
                                        <a href="{{ $category->path() }}" title="{{ $category->name }}"><span class="post-cat text-success">{{ Str::words($category->name, 3,'') }}</span></a>
                                @endforeach
                                </div>
                                <div class="d-flex post-card-content-tutorial">
                                    <h5 class="post-title mb-10 font-weight-900" style="font-size: 1rem !important;">
                                        <a href="{{ $item->path() }}">{{ Str::words($item->title, 9)}}</a>
                                    </h5>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on">{{ $item->created_at->format('d F Y') }}</span>
                                        <span class="time-reading has-dot">{{ $item->user->fullname }}</span>
                                        <span class="post-by has-dot">{{ $item->views }} views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach

                </div>
            </div>
        </div>
    </div>
