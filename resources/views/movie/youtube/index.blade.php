@php
    $setting = App\Models\Admin\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>');
@endphp

@section('title', 'YouTube Movie World  | StorialTech')
@section('meta-title', 'YouTube Movie World  | StorialTech')
@section('description', str_replace($replace, ' ', $setting->description))
@section('keywords', 'movie, movie download, hindi movie, hindi dubbed move, bollywood movie, hollywood movie, bangla subtitle movie, korean movie, chinese movie, free movie download, south indian movie, movie series, series, drama series, dc movie, marvel movie')
@section('og-title', 'YouTube Movie World  | StorialTech')
@section('twitter-title', 'YouTube Movie World  | StorialTech')
@section('meta-image', asset('public/frontend/img/movie-thumbnail.jpg'))
@section('og-image', asset('public/frontend/img/movie-thumbnail.jpg'))
@section('twitter-image', asset('public/frontend/img/movie-thumbnail.jpg'))

@extends('layouts.app')

@section('aside')
    @include('movie.youtube.aside')
@endsection


@section('content')
 <!-- Start Main content -->
 <main class="bg-grey">
    <!--archive header-->

    <div class="container pt-20">
        <div class="loop-grid">
        @csrf
        
        @if($movies->count() > 0)
        <div class="row">
            <div class="hot-tags pb-10 font-small align-self-center col-12">
                <div class="widget-header-3">
                    <div class="row align-self-center">
                        <div class="col-md-4 align-self-center">
                            <h5 class="widget-title">Youtube Movie</h5>
                        </div>
                    </div>
                </div>
            </div>
        @foreach($movies as $item)
            <article class="col-lg-3 col-md-3 mb-20">
                <div class="post-card-1 hover-up">
                    <div class="thumb-overlay-youtube-movie img-hover-slide position-relative">
                        <iframe src="{{ $item->elink }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width: 100%; height:180px;"></iframe>
                    </div>
                    <div class="post-content pr-20 pl-20 pt-10 pb-10">
                        <div class="entry-meta meta-0 font-small mb-10">
                        @foreach($item->categoryytmovie->take(3) as $category)
                            <a href="{{ $category->ytpath() }}" rel="nofollow"><span class="post-cat text-success">{{ Str::words($category->name, 1,'') }}</span></a>
                        @endforeach
                        </div>
                        <div class="d-flex post-card-content-movie">
                            <h5 class="post-title font-weight-900" style="font-size: 1rem !important;">
                                <a href="{{ $item->path() }}" rel="nofollow">{{ Str::words($item->name, 7)}}</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach

        </div>
        @endif
        
        <div class="row mt-20">
            <div class="col-12">
                <div class="pagination-area mb-30" style="visibility: visible; animation-name: fadeInUp;">
                    <nav aria-label="Page navigation example">

                        {{ $movies->links('vendor.pagination.custom') }}

                    </nav>
                </div>
            </div>
        </div>

            {{-- <div id="getData"></div> --}}
        </div>



    </div>
</main>
<!-- End Main content -->
@endsection

@section('js')
{{-- <script>
    var token = $('input[name="_token"]').val();
    load_more('', token);

    function load_more(id = "", token) {
        $.ajax({
            url:'{{ route('loadmore.youtube.movie') }}',
            method: 'POST',
            data: {id: id, _token:token},
            success: function (data) {
                $('#loadMoreButton').remove();
                $('#getData').append(data);
            }
        });
    }

    $('body').on('click', '#loadMoreButton', function () {
        var id = $(this).data('id');
        $('#loadMoreButton').html('Loading...');
        load_more(id, token);
    });
</script> --}}
@endsection



