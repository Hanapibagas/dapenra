<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partial.link')
</head>

<body>
    <div class="body-inner">
        <!--/ Topbar end -->
        @include('frontend.partial.header')
        <!--/ Header end -->
        <div id="banner-area" class="banner-area" style="background-image:url(images/banner/banner5.jpg)">
            <div class="banner-text">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="banner-heading">
                                <h1 class="banner-title">Tentang</h1>
                            </div>
                        </div><!-- Col end -->
                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div><!-- Banner text end -->
        </div><!-- Banner area end -->

        <section id="main-container" class="main-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="column-title">Tentang Kami</h3>
                        <p>{!!$about->content!!}</p>
                    </div><!-- Col end -->

                    <div class="col-lg-6 mt-5 mt-lg-0">

                        <div id="page-slider" class="page-slider small-bg">

                            <div class="item" style="background-image:url(images/slider-pages/about.jpg)">
                                <div class="container">
                                    <div class="box-slider-content">

                                    </div>
                                </div>
                            </div><!-- Item 1 end -->

                        </div><!-- Page slider end-->
                    </div><!-- Col end -->
                </div><!-- Content row end -->
            </div><!-- Container end -->
        </section><!-- Main container end -->
        <!--/ Team end -->

        @include('frontend.partial.footer')

        <!-- Javascript Files
================================================== -->

        @include('frontend.partial.js')

    </div><!-- Body inner end -->
</body>

</html>