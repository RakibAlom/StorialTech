<div class="pdf-section">
    <div class="container">
        <div class="pt-10">
            @include('include.ads.section_top_banner_ads')
        </div>
        <div class="hot-tags pt-20 pb-20 font-small align-self-center">
            <div class="widget-header-3">
                <div class="row align-self-center">
                    <div class="col-md-4 align-self-center">
                        <h5 class="widget-title">PDF BOOKS</h5>
                    </div>
                    <div class="col-md-8 text-md-right font-small align-self-center">
                        <ul class="list-inline d-inline-block tags">
                            <li class="list-inline-item"><a href="{{ route('pdf') }}">#All</a></li>
                        @php
                            $pcates = App\Models\Category\CategoryPdf::where('status', 1)->orderBy('views')->take(4)->get();
                        @endphp
                        @foreach($pcates as $item)
                            <li class="list-inline-item"><a href="{{ $item->path() }}">#{{ Str::words($item->name, 1, '') }}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="loop-grid">
            <div class="post-block-list post-module-1">
                <ul class="list-post">
                @php
                    $pdfs = App\Models\Pdf\Pdf::with('categorypdf')->where('status', 1)->latest()->take(12)->get();
                @endphp
                    <div class="row">
                    @foreach($pdfs as $item)
                        <div class="col-lg-3 col-md-4">
                            <li class="mb-20 p-3 bg-grey border-radius-10">
                                <div class="d-flex hover-up-2 transition-normal">
                                    <div class="post-thumb post-thumb-100 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                        <a class="color-white" href="{{ $item->path() }}">
                                            <img src="{{ asset('storage/app/public/'.$item->image) }}" alt="{{ $item->name }}">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h2 class="post-title mb-15 text-limit-2-row font-medium"><a href="{{ $item->path() }}">{{ $item->name }}</a></h2>
                                        <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                            <span class="post-on">size: {{ $item->size }}</span>
                                            <span class="post-by has-dot">{{ $item->views }} views</span>
                                            <br><br>
                                            @foreach($item->categorypdf->take(4) as $category)
                                                <a href="{{ $category->path() }}"><span class="post-cat text-success">{{ Str::words($category->name, 1,'') }}</span></a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                    @endforeach
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
