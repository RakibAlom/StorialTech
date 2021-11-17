@php
    $setting = App\Models\Admin\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>');
@endphp

@if($tutorials->isEmpty())
    <div class="col-12 text-center">
        <button class="btn bt-default">More data are not available</button>
    </div>
@else
    @foreach ($tutorials as $item)

        @php($i = 0)
        <article class="col-lg-6 col-md-6 mb-20 wow fadeInUp animated">
            <div class="post-card-1 border-radius-10 hover-up">
                <div class="post-thumb thumb-overlay img-hover-slide position-relative" @if($item->image) @if($item->image) style="background-image: url({{ asset('storage/app/public/'. $item->image) }})" @else style="background-image: url({{ asset('storage/app/public/'.$setting->cover_image) }})" @endif @else style="background-image: url(storage/{{$setting->cover_image}})" @endif>
                    <a class="img-link" href="{{ $item->path() }}"></a>
                    <ul class="social-share">
                        <li><a href="javascript:void(0)"><i class="elegant-icon social_share"></i></a></li>
                        <li><a class="fb" href="{{ $item->fb() }}" target="popup" onclick="window.open('{{ $item->fb() }}','popup','width=600,height=600'); return false;" rel="nofollow" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                        <li><a class="tw" href="{{ $item->twitter() }}" target="popup" onclick="window.open('{{ $item->twitter() }}','popup','width=600,height=600'); return false;" rel="nofollow" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                        <li><a class="pt" href="{{ $item->pin() }}" target="popup" onclick="window.open('{{ $item->pin() }}','popup','width=600,height=600'); return false;" rel="nofollow" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                    </ul>
                </div>
                <div class="post-content p-30">
                    <div class="entry-meta meta-0 font-small mb-10">
                    @foreach($item->categorytutorial as $category)
                        <a href="{{ $category->path() }}" title="{{ $category->name }}"><span class="post-cat text-primary">{{ Str::words($category->name, 1,'') }}</span></a>
                    @endforeach
                    @foreach($item->tagtutorial->take(3) as $tag)
                        <a href="{{ $tag->path() }}" title="{{ $tag->name }}"><span class="post-cat text-success">{{ Str::words($tag->name, 1,'') }}</span></a>
                    @endforeach
                    </div>
                    <div class="d-flex post-card-content-tutorial">
                        <h5 class="post-title mb-10 font-weight-900" style="font-size: 1rem !important;">
                            <a href="{{ $item->path() }}">{{ Str::words($item->title, 9)}}</a>
                        </h5>
                        <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                            <span class="post-on">{{ $item->created_at->format('d F Y') }}</span>
                            <span class="time-reading has-dot"><a href="javascript:void(0)">{{ $item->user->fullname }}</a></span>
                            <span class="post-by has-dot">{{ $item->views }} views</span>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <hr>
        @php($lastId = $item->id)
        @php($i++)

    @endforeach

    @if($i < 2)
        <div class="col-12 text-center">
            <button class="btn button button-contactForm" data-id="{{ $lastId }}" id="loadMoreButton">Load More</button>
        </div>
    @endif
@endif
