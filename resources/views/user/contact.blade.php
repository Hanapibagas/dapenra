<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partial.link')
</head>

<body>
    <div class="body-inner">

        @include('frontend.partial.header')
        <div id="banner-area" class="banner-area"
            style="background-image:url({{asset('user/images/banner/banner5.jpg')}})">
            <div class="banner-text">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="banner-heading">
                                <h1 class="banner-title">Contact</h1>
                            </div>
                        </div><!-- Col end -->
                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div><!-- Banner text end -->
        </div><!-- Banner area end -->
        <section id="main-container" class="main-container">
            <div class="container">

                <div class="row text-center">
                    <div class="col-12">
                        <h2 class="section-title">MENCAPAI KANTOR KAMI</h2>
                        <h3 class="section-sub-title">TEMUKAN LOKASI KAMI</h3>
                    </div>
                </div>
                <!--/ Title row end -->

                <div class="row">
                    <div class="col-md-4">
                        <div class="ts-service-box-bg text-center h-100">
                            <span class="ts-service-icon icon-round">
                                <i class="fas fa-map-marker-alt mr-0"></i>
                            </span>
                            <div class="ts-service-box-content">
                                <h4>KUNJUNGI KANTOR KAMI</h4>
                                <p>Toraja</p>
                            </div>
                        </div>
                    </div><!-- Col 1 end -->

                    <div class="col-md-4">
                        <div class="ts-service-box-bg text-center h-100">
                            <span class="ts-service-icon icon-round">
                                <i class="fa fa-envelope mr-0"></i>
                            </span>
                            <div class="ts-service-box-content">
                                <h4>EMAIL KAMI</h4>
                                <p>Masata@gmail.com</p>
                            </div>
                        </div>
                    </div><!-- Col 2 end -->

                    <div class="col-md-4">
                        <div class="ts-service-box-bg text-center h-100">
                            <span class="ts-service-icon icon-round">
                                <i class="fa fa-phone-square mr-0"></i>
                            </span>
                            <div class="ts-service-box-content">
                                <h4>HUBUNGI KAMI</h4>
                                <p>08234274522</p>
                            </div>
                        </div>
                    </div><!-- Col 3 end -->

                </div><!-- 1st row end -->

                <div class="gap-60"></div>
                <div class="row">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d510043.46380004985!2d119.60013254169385!3d-2.8983609735236593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d93c15594bf5fe7%3A0x3bd5d554371f59fa!2sKabupaten%20Toraja%20Utara%2C%20Sulawesi%20Selatan!5e0!3m2!1sid!2sid!4v1645845410686!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" class="col-md-12" allowfullscreen=""
                        loading="lazy"></iframe>
                </div>
                <div class="gap-40"></div>
            </div><!-- Conatiner end -->
        </section><!-- Main container end -->

        @include('frontend.partial.footer')

        @include('frontend.partial.js')
    </div><!-- Body inner end -->
</body>

</html>