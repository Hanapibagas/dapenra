<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Dapenra @yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('admin/assets/img/icon.ico')}}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{asset('admin/assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{asset('admin/assets/css/fonts.min.css')}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/atlantis.css')}}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
    <style>
        .logo-header .logo .navbar-brand {
            height : 80%;
        }
        .logo-header[data-background-color="blue"] {
            background: #FFFFFF !important;
        }
        .icon-action-redo, .icon-action-undo, .icon-anchor, .icon-arrow-down, .icon-arrow-down-circle, .icon-arrow-left, .icon-arrow-left-circle, .icon-arrow-right, .icon-arrow-right-circle, .icon-arrow-up, .icon-arrow-up-circle, .icon-badge, .icon-bag, .icon-ban, .icon-basket, .icon-basket-loaded, .icon-bell, .icon-book-open, .icon-briefcase, .icon-bubble, .icon-bubbles, .icon-bulb, .icon-calculator, .icon-calendar, .icon-call-end, .icon-call-in, .icon-call-out, .icon-camera, .icon-camrecorder, .icon-chart, .icon-check, .icon-chemistry, .icon-clock, .icon-close, .icon-cloud-download, .icon-cloud-upload, .icon-compass, .icon-control-end, .icon-control-forward, .icon-control-pause, .icon-control-play, .icon-control-rewind, .icon-control-start, .icon-credit-card, .icon-crop, .icon-cup, .icon-cursor, .icon-cursor-move, .icon-diamond, .icon-direction, .icon-directions, .icon-disc, .icon-dislike, .icon-doc, .icon-docs, .icon-drawer, .icon-drop, .icon-earphones, .icon-earphones-alt, .icon-emotsmile, .icon-energy, .icon-envelope, .icon-envelope-letter, .icon-envelope-open, .icon-equalizer, .icon-event, .icon-exclamation, .icon-eye, .icon-eyeglass, .icon-feed, .icon-film, .icon-fire, .icon-flag, .icon-folder, .icon-folder-alt, .icon-frame, .icon-game-controller, .icon-ghost, .icon-globe, .icon-globe-alt, .icon-graduation, .icon-graph, .icon-grid, .icon-handbag, .icon-heart, .icon-home, .icon-hourglass, .icon-information, .icon-key, .icon-layers, .icon-like, .icon-link, .icon-list, .icon-location-pin, .icon-lock, .icon-lock-open, .icon-login, .icon-logout, .icon-loop, .icon-magic-wand, .icon-magnet, .icon-magnifier, .icon-magnifier-add, .icon-magnifier-remove, .icon-map, .icon-menu, .icon-microphone, .icon-minus, .icon-mouse, .icon-music-tone, .icon-music-tone-alt, .icon-mustache, .icon-note, .icon-notebook, .icon-options, .icon-options-vertical, .icon-organization, .icon-paper-clip, .icon-paper-plane, .icon-paypal, .icon-pencil, .icon-people, .icon-phone, .icon-picture, .icon-pie-chart, .icon-pin, .icon-plane, .icon-playlist, .icon-plus, .icon-power, .icon-present, .icon-printer, .icon-puzzle, .icon-question, .icon-refresh, .icon-reload, .icon-rocket, .icon-screen-desktop, .icon-screen-smartphone, .icon-screen-tablet, .icon-settings, .icon-share, .icon-share-alt, .icon-shield, .icon-shuffle, .icon-size-actual, .icon-size-fullscreen, .icon-social-behance, .icon-social-dribbble, .icon-social-dropbox, .icon-social-facebook, .icon-social-foursqare, .icon-social-github, .icon-social-google, .icon-social-instagram, .icon-social-linkedin, .icon-social-pinterest, .icon-social-reddit, .icon-social-skype, .icon-social-soundcloud, .icon-social-spotify, .icon-social-steam, .icon-social-stumbleupon, .icon-social-tumblr, .icon-social-twitter, .icon-social-vkontakte, .icon-social-youtube, .icon-speech, .icon-speedometer, .icon-star, .icon-support, .icon-symbol-female, .icon-symbol-male, .icon-tag, .icon-target, .icon-trash, .icon-trophy, .icon-umbrella, .icon-user, .icon-user-female, .icon-user-follow, .icon-user-following, .icon-user-unfollow, .icon-vector, .icon-volume-1, .icon-volume-2, .icon-volume-off, .icon-wallet, .icon-wrench{
          color : #000000;
        }
        sidebar.sidebar-style-2 .nav.nav-primary > .nav-item.active > a {
          background: #f1a233 !important;
          box-shadow: 4px 4px 10px 0 rgb(0 0 0 / 10%), 4px 4px 15px -5px rgb(21 114 232 / 40%) !important;
        }

    </style>
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">

                <a href="index.html" class="logo">
                    <img src="{{asset('admin/assets/img/logo.png')}}" alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            @include('backend.partial.navbar')
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        @include('backend.partial.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                @yield('content')
            </div>
            @include('backend.partial.footer')
        </div>

        <!-- Custom template | don't include it in your project! -->
        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('admin/assets/js/core/jquery.3.2.1.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/core/bootstrap.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{asset('admin/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{asset('admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


    <!-- Chart JS -->
    <script src="{{asset('admin/assets/js/plugin/chart.js/chart.min.js')}}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{asset('admin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Chart Circle -->
    <script src="{{asset('admin/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{asset('admin/assets/js/plugin/datatables/datatables.min.js')}}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{asset('admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <!-- Sweet Alert -->
    <script src="{{asset('admin/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Atlantis JS -->
    <script src="{{asset('admin/assets/js/atlantis.min.js')}}"></script>

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="{{asset('admin/assets/js/setting-demo.js')}}"></script>

    <!-- custom javascript -->
    <script src="{{asset('admin/assets/js/plugin/datatables/datatables.min.js')}}"></script>

    <script src="{{asset('admin/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

    @stack('script')

</body>

</html>
