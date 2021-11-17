@php
    $setting = App\Models\Admin\Setting::first()
@endphp

<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
@if($setting->favicon)
	<link rel="icon" type="image/x-icon" href="{{ asset('storage/app/public/'.$setting->favicon) }}"/>
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('storage/app/public/'.$setting->favicon) }}" />
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('storage/app/public/'.$setting->favicon) }}" />
@endif
    
    @yield('canonical')
    
    <!-- Primary Meta Tags -->
    <title>@yield('title')</title>
    <meta name="title" content="@yield('meta-title')">
    <meta name="description" content="@yield('meta-description')">
    <meta name="keywords" content="@yield('meta-keywords')">
    <meta property="image" content="@yield('meta-image')">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og-title')">
    <meta property="og:description" content="@yield('og-description')">
    <meta property="og:image" content="@yield('og-image')">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="@yield('twitter-title')">
    <meta property="twitter:description" content="@yield('twitter-description')">
    <meta property="twitter:image" content="@yield('twitter-image')">
    
    <!--FaceBook Instantarticles-->
    <meta property="fb:pages" content="405838296887850" />


    <!-- CSS SECTION  -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/storialtech.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/widgets.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- TOASTR CSS --}}
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" /> -->

    @yield('css')
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157563620-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-157563620-1');
    </script>
    
    <!--Google Adsense-->
    <script data-ad-client="ca-pub-8183914844375779" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


</head>

<body>
    
    
    <div class="scroll-progress primary-bg"></div>

    @yield('loader')

    @yield('aside')

    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

    <!-- End Footer -->
    <div class="dark-mark"></div>
    <!-- Vendor JS-->
    <!--<script src="{{ asset('public/frontend/js/vendor/modernizr-3.5.0.min.js') }}"></script>-->
    <script src="{{ asset('public/frontend/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendor/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendor/wow.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendor/jquery.ticker.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendor/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendor/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendor/jquery.nice-select.min.js') }}"></script>
    <!--<script src="{{ asset('public/frontend/js/vendor/jquery.magnific-popup.js') }}"></script>-->
    <script src="{{ asset('public/frontend/js/vendor/jquery.sticky.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendor/perfect-scrollbar.js') }}"></script>
    <!--<script src="{{ asset('public/frontend/js/vendor/waypoints.min.js') }}"></script>-->
    <script src="{{ asset('public/frontend/js/vendor/jquery.theia.sticky.js') }}"></script>
    <!-- JS SECTION -->
    <script src="{{ asset('public/frontend/js/main.js') }}"></script>
    {{-- TOASTR JS --}}
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->

    @yield('js')

    <script>
        //Toastr Notification
        @if(Session::has('messege'))
            var type="{{Session::get('alert-type','info')}}"
            switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                  toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
            }
        @endif
    </script>

    <script>
        //Hidding Button
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
              content.style.display = "none";
            } else {
              content.style.display = "block";
            }
          });
        }
    </script>
    <script>
        //Delete Alert
        $(document).on("click","#delete", function(e){
              e.preventDefault();
              var link = $(this).attr("href");
                swal({
                  title: "Are you sure?",
                  text: "Delete for everytime!",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location.href = link;
                  }
                });
            });
    </script>
    <!-- Cloudflare Web Analytics -->
    <script defer src='https://static.cloudflareinsights.com/beacon.min.js' data-cf-beacon='{"token": "2d6e1db653284a71843a00c85923fc31"}'></script>
    <!-- End Cloudflare Web Analytics -->

</body>

</html>
