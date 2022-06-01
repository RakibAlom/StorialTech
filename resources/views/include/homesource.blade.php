<div class="template-section">
    <div class="container">
        <div class="pt-10">
            @include('include.ads.section_top_banner_ads')
        </div>
        <div class="hot-tags pt-30 pb-20 font-small align-self-center">
            <div class="widget-header-3">
                <div class="row align-self-center">
                    <div class="col-md-4 align-self-center">
                        <h5 class="widget-title">PREMIUM FREE SORUCE</h5>
                    </div>
                    <div class="col-md-8 text-md-right font-small align-self-center">
                        <ul class="list-inline d-inline-block tags">
                            <li class="list-inline-item"><a href="{{ route('source') }}">#All</a></li>
                        @php
                            $sourcecates = App\Models\Category\CategoryPrefree::where('status', 1)->orderBy('views', 'desc')->take(4)->get();
                        @endphp
                        @foreach($sourcecates as $item)
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
                $sources = App\Models\Source\PreemiumFree::with('prefreecategory')->where('status', 1)->orderBy('id','desc')->take(6)->get();
             @endphp
            @foreach($sources as $item)
                <article class="col-lg-4 col-md-6 mb-20">
                    <div class="post-card-1 border-radius-10 hover-up">
                        <div class="post-content p-20">
                            <div class="entry-meta meta-0 font-small mb-10">
                                <a href="{{ $item->prefreecategory->path() }}"><span class="post-cat text-success">{{ Str::words($item->prefreecategory->name, 1,'') }}</span></a>
                            </div>
                            <div class="d-flex post-card-content-source">
                                <h2>
                                    <a href="{{ $item->path() }}">{{ Str::words($item->title, 11)}}</a>
                                </h2>
                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                    <span class="post-by">{{ $item->views }} views</span>
                                @if($item->delete_time)
                                    <span class="post-on has-dot"><b class="text-danger">{{ $item->delete_time }}</b> left</span>
                                @endif
                                    <span class="has-dot">{{ $item->created_at->diffForHumans() }}</span>
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
