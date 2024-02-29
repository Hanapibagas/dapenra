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
                                <h1 class="banner-title">umkm</h1>
                            </div>
                        </div><!-- Col end -->
                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div><!-- Banner text end -->
        </div><!-- Banner area end -->

        <section id="main-container" class="main-container pb-2">
            <div class="container">
                <div class="row">
                    @foreach ($umkm as $item)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="ts-service-box">
                            <div class="ts-service-image-wrapper">
                                <img loading="lazy" class="w-100" src="{{asset('storage/'.$item->image)}}"
                                    alt="service-image">
                            </div>
                            <div class="d-flex">
                                <div class="ts-service-info">
                                    <h3 class="service-box-title"><a
                                            href="{{route('user.detail-umkm', $item->id)}}">{{$item->name}}</a>
                                    </h3>
                                </div>
                            </div>
                        </div><!-- Service1 end -->
                    </div><!-- Col 1 end -->
                    @endforeach
                </div><!-- Main row end -->
                <nav class="paging" aria-label="Page navigation example">
                    <ul class="pagination">
                        {{$umkm->links()}}
                    </ul>
                </nav>
            </div><!-- Conatiner end -->
        </section>

        @include('frontend.partial.footer')

        @include('frontend.partial.js')

    </div><!-- Body inner end -->
</body>

</html>