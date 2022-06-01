@php
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<h5>','</h5>','<em>','</em>','<strong>','</strong>','<span>','</span>');
    $setting = App\Models\Admin\Setting::first();
    $seo = App\Models\Seo\SeoWebstory::first();
@endphp

<!DOCTYPE html>
<html amp lang="en">
    <head>
        <meta charset="utf-8" />
        <link href="https://cdn.ampproject.org/v0.js" rel="preload" as="script" />
        <script async src="https://cdn.ampproject.org/v0.js"></script>
        <style amp-boilerplate>
            body {
                -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
                -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
                -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
                animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            }
            @-webkit-keyframes -amp-start {
                from {
                    visibility: hidden;
                }
                to {
                    visibility: visible;
                }
            }
            @-moz-keyframes -amp-start {
                from {
                    visibility: hidden;
                }
                to {
                    visibility: visible;
                }
            }
            @-ms-keyframes -amp-start {
                from {
                    visibility: hidden;
                }
                to {
                    visibility: visible;
                }
            }
            @-o-keyframes -amp-start {
                from {
                    visibility: hidden;
                }
                to {
                    visibility: visible;
                }
            }
            @keyframes -amp-start {
                from {
                    visibility: hidden;
                }
                to {
                    visibility: visible;
                }
            }
        </style>
        <noscript>
            <style amp-boilerplate>
                body {
                    -webkit-animation: none;
                    -moz-animation: none;
                    -ms-animation: none;
                    animation: none;
                }
            </style>
        </noscript>

        <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />

        <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
        <script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>


        @if($setting->favicon)
            <link rel="icon" type="image/x-icon" href="{{ asset('storage/app/public/'.$setting->favicon) }}"/>
        @endif

        <script type="application/ld+json">
            { "@context": "https://schema.org", "@type": "", "mainEntityOfPage": { "@type": "WebPage", "@id": "{{ URL::Current() }}" } }
        </script>

        <!-- Primary Meta Tags -->
        <title>@yield('title')</title>
        <meta name="title" content="{{ $webstory->title . ' ' . $seo->sp_title_plus }}">
        <meta property="image" content="{{ asset('storage/app/public/'.$webstory->image) }}">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $webstory->title . ' ' . $seo->sp_title_plus }}">
        <meta property="og:image" content="{{ asset('storage/app/public/'.$webstory->image) }}">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:title" content="{{ $webstory->title . ' ' . $seo->sp_title_plus }}">
        <meta property="twitter:image" content="{{ asset('storage/app/public/'.$webstory->image) }}">

        <link rel="canonical" href="{{ URL::Current() }}" />
        <style amp-custom>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body{
                margin: 0;
                padding: 0;
                overflow: hidden;
            }
            amp-iframe{
                width: 100vw;
                height: 100vh;
                border: none;
            }
        </style>
    </head>
    <body>
        <amp-iframe src="{{ $webstory->embed_code }}" width="200" height="100" sandbox="allow-scripts" layout="responsive" frameborder="0">
            <p placeholder>
                {{ $webstory->title }}
            </p>
        </amp-iframe>
    </body>
</html>
