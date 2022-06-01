@extends('layouts.app')

@section('title','RSS Feeds - StorialTech')

@section('content')
<main class="bg-grey pb-30">
    <div class="container pt-20">
        <div class="loop-grid mb-30">
            <div class="pt-30">
                <h1 class="pb-10 font-weight-900">StorialTech RSS Feeds</h1>
                <div class="pb-10">
                    <i class="fa fa-arrow-right"></i> <a class="font-weight-bold text-success" href="{{ route('feed.news') }}">News / Blog RSS</a>
                </div>
                <div class="pb-10">
                    <i class="fa fa-arrow-right"></i> <a class="font-weight-bold text-success" href="{{ route('feed.tutorial') }}">Tutorial RSS</a>
                </div>
                <div class="pb-10">
                    <i class="fa fa-arrow-right"></i> <a class="font-weight-bold text-success" href="{{ route('feed.story') }}">Story RSS</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection