<div class="story-section bg-grey">
    <div class="container">
        <div class="pt-10">
            @include('include.ads.section_top_banner_ads')
        </div>
        <div class="hot-tags pt-20 pb-20 font-small align-self-center">
            <div class="widget-header-3">
                <div class="row align-self-center">
                    <div class="col-md-4 align-self-center">
                        <h5 class="widget-title">STORY WORLD</h5>
                    </div>
                    <div class="col-md-8 text-md-right font-small align-self-center">
                        <ul class="list-inline d-inline-block tags">
                            <li class="list-inline-item"><a href="{{ route('story') }}">#All</a></li>
                        @php
                            $scates = App\Models\Category\CategoryStory::where('status', 1)->orderBy('views', 'desc')->take(4)->get();
                        @endphp
                        @foreach($scates as $item)
                            <li class="list-inline-item"><a href="{{ $item->path() }}">#{{ Str::words($item->name, 1, '') }}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="post-module-2">
                    <div class="loop-list loop-list-style-1">
                        <div class="row">
                        @php
                            $stories = App\Models\Story\Story::with('categorystory','user')->where('status', 1)->orderBy('id','desc')->take(6)->get();
                        @endphp
                        @foreach($stories as $item)
                            <article class="col-md-4 mb-20">
                                <div class="post-card-1 border-radius-10 hover-up">
                                    <div class="post-content p-20">
                                        <div class="entry-meta meta-0 font-small mb-10">
                                        @foreach($item->categorystory as $category)
                                            <a href="{{ $category->path() }}"><span class="post-cat text-success">{{ Str::words($category->name, 1,'') }}</span></a>
                                        @endforeach
                                        </div>
                                        <div class="d-flex post-card-content-story">
                                            <h2 class="post-title mb-20 font-weight-bold" style="font-size: 1rem !important;">
                                                <a href="{{ $item->path() }}">{{ Str::words($item->title, 6)}}</a>
                                            </h2>
                                            <div class="post-excerpt mb-15 font-small text-muted">
                                                <p>{!! Str::words(str_replace($replace, ' ', $item->body), 24) !!} <a href="{{ $item->path() }}" class="text-primary">Read More</a></p>
                                            </div>
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
        </div>
    </div>
</div>
