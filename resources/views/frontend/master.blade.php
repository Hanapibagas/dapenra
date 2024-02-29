<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partial.link')
</head>

<body>
    <div class="body-inner">
        <!--/ Topbar end -->
        <!-- Header start -->
        @include('frontend.partial.header')
        <!--/ Header end -->

        <div class="banner-carousel banner-carousel-2 mb-0">
            <div class="banner-carousel-item" style="background-image:url(user/images/slider-main/slider-1.png)">
                <div class="container">
                    <div class="box-slider-content">
                        <div class="box-slider-text">
                            <h2 class="box-slide-title">Halaman Administrator Otentikasi</h2>
                            <h3 class="box-slide-sub-title">Dapenra</h3>
                            <p class="box-slide-description">Selamat Datang di halaman Adminstrator Aplikasi Otentikasi Wajah Dana Pensiun Angkasa Pura, Silahkan Klik login untuk melanjutkan.</p>
                            <p>
                                <a href="{{route('login')}}" class=" slider btn btn-primary">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        @include('frontend.partial.footer')

        <!-- Javascript Files
  ================================================== -->

        <!-- initialize jQuery Library -->
        @include('frontend.partial.js')
    </div><!-- Body inner end -->
</body>

</html>
