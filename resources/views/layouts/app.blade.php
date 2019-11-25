<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('icon.png')}}" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/vendor.bundle.base.css')}}" rel="stylesheet">
    <link href="{{asset('css/vendor.bundle.addons.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style1.css') }}" rel="stylesheet">
    <link href="{{ asset('css/iconfonts/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/iconfonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/iconfonts/ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/iconfonts/mdi/css/materialdesignicons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/iconfonts/themify-icons/themify-icons.css') }}" rel="stylesheet">
<style>
    .navbar .nav-item:not(:last-child) {
        margin-right: 35px;
    }

    .dropdown-toggle::after {
        transition: transform 0.15s linear;
    }

    .show.dropdown .dropdown-toggle::after {
        transform: translateY(3px);
    }

    .dropdown-menu {
        margin-top: 0;
    }


</style>



</head>
<body>
    <div id="app">

        <div class="container-fluid">
            @include('includes.navbar')
        </div>
        <main class="py-4">
            <div class="container-fluid page-body-wrapper">
                @include('includes.messages')
                @yield('content')
            </div>
        </main>
        @include('includes.footer')
    </div>


    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{--<script src="{{asset('js/vendor.bundle.base.js')}}"></script>--}}
    {{--<script src="{{asset('js/vendor.bundle.addons.js')}}"></script>--}}
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/navbar_script.js')}}"></script>
    @yield('script')
    <script>
        $('document').ready(function(){
            setTimeout(function()
            {
                $('.alert').fadeOut('fast');
            },3000);

            // setTimeout(function()
            // {
            //     $('#notify').reload();
            // },300);
        });
    </script>

    {{--<script>

        const $dropdown = $(".dropdown");
        const $dropdownToggle = $(".dropdown-toggle");
        const $dropdownMenu = $(".dropdown-menu");
        const showClass = "show";

        $(window).on("load resize", function() {
            if (this.matchMedia("(min-width: 768px)").matches) {
                $dropdown.hover(
                    function() {
                        const $this = $(this);
                        $this.addClass(showClass);
                        $this.find($dropdownToggle).attr("aria-expanded", "true");
                        $this.find($dropdownMenu).addClass(showClass);
                    },
                    function() {
                        const $this = $(this);
                        $this.removeClass(showClass);
                        $this.find($dropdownToggle).attr("aria-expanded", "false");
                        $this.find($dropdownMenu).removeClass(showClass);
                    }
                );
            } else {
                $dropdown.off("mouseenter mouseleave");
            }
        });
    </script>--}}
</body>
</html>
