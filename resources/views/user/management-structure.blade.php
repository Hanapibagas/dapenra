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
                                <h1 class="banner-title">Struktur Organisi</h1>
                            </div>
                        </div><!-- Col end -->
                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div><!-- Banner text end -->
        </div><!-- Banner area end -->

        <section id="main-container" class="main-container">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <h3 class="column-title">Struktur Organisi</h3>
                    </div><!-- Col end -->
                </div><!-- Content row end -->
                <div class="row justify-content-center ">
                    <div class="col-lg-12">
                        <div class="col-lg-12 col-sm-12">
                            <div class="ts-team-wrapper">
                                <div class="team-img-wrapper">
                                    <img loading="lazy" src="{{asset('storage/'.$managementStructure->image)}}"
                                        class="img-fluid" alt="struktur organisasi">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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