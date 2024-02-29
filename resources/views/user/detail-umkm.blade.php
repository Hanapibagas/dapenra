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
                                <h1 class="banner-title">detail umkm</h1>
                            </div>
                        </div><!-- Col end -->
                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div><!-- Banner text end -->
        </div><!-- Banner area end -->


        <section id="main-container" class="main-container">
            <div class="container">

                <div class="row">
                    <div class="col-lg-8">
                        <div id="page-slider" class="page-slider small-bg">
                            <div class="item">
                                <img loading="lazy" class="img-fluid" src="{{asset('storage/'.$detailUmkm->image)}}"
                                    alt="project-image" />
                            </div>
                        </div><!-- Page slider end -->
                    </div><!-- Slider col end -->

                    <div class="col-lg-4 mt-5 mt-lg-0">

                        <h3 class="column-title mrt-0">{{$detailUmkm->name}}</h3>
                        <p>{!!$detailUmkm->description!!}</p>

                        <ul class="project-info list-unstyled">
                            <li>
                                <p class="project-info-label">Alamat</p>
                                <p class="project-info-content">{{$detailUmkm->address}}</p>
                            </li>
                        </ul>

                    </div><!-- Content col end -->

                </div><!-- Row end -->

            </div><!-- Conatiner end -->
        </section><!-- Main container end -->
        @include('frontend.partial.footer')

        @include('frontend.partial.js')

    </div><!-- Body inner end -->
</body>

</html>