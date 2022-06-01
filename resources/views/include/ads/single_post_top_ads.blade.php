@php
    $ads = App\Models\Ads\AdsCode::first();
@endphp

{!! $ads->single_post_top_ads !!}