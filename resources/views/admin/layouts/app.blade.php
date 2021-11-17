@php
    $setting = App\Models\Admin\Setting::first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>StorialTech | Admin Dashboard </title>

    <link rel="icon" type="image/x-icon" href="{{ asset('storage/app/public/'.$setting->favicon) }}"/>

    <link href="{{ asset('public/backend/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('public/backend/assets/js/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('public/backend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backend/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/assets/css/elements/alert.css') }}">
    <style>
        .btn-light { border-color: transparent; }
    </style>
    <!--  END CUSTOM STYLE FILE  -->

    @yield('css')

</head>
<body class="alt-menu sidebar-noneoverflow">

    @yield('loader')

    @include('admin.layouts.header')

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

            @include('admin.layouts.sidebar')

            @yield('content')

    </div>
    <!-- END MAIN CONTAINER -->


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('public/backend/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('public/backend/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/backend/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('public/backend/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    @yield('js')

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

</body>
</html>

