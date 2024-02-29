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
                                <h1 class="banner-title">Detail Wisata</h1>
                            </div>
                        </div><!-- Col end -->
                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div><!-- Banner text end -->
        </div><!-- Banner area end -->

        <section id="main-container" class="main-container">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 mb-5 mb-lg-0">

                        <div class="post-content post-single">
                            <div class="post-media post-image">
                                <img loading="lazy" src="{{asset('storage/'. $detailTour->image)}}" class="img-fluid"
                                    alt="post-image">
                            </div>

                            <div class="post-body">
                                <div class="entry-header">
                                    <div class="post-meta">
                                        <span class="post-author">
                                            <i class="far fa-user"></i><a href="#"> Admin</a>
                                        </span>
                                        <span class="post-cat">
                                            <i class="far fa-folder-open"></i><a href="#">Kegiatan</a>
                                        </span>
                                        <span class="post-meta-date"><i class="far fa-calendar"></i>
                                            {{Carbon\Carbon::parse($detailTour->created_at)->isoFormat('D MMMM Y ')
                                            }}</span>
                                    </div>
                                    <h2 class="entry-title">
                                        {{$detailTour->name}}
                                    </h2>
                                </div><!-- header end -->

                                <div class="entry-content">
                                    <p>{!!$detailTour->description!!}</p>

                                </div>
                            </div><!-- post-body end -->
                        </div><!-- post content end -->
                    </div><!-- Content Col end -->

                    <div class="col-lg-4">

                        <div class="sidebar sidebar-right">
                            <div class="widget recent-posts">
                                <h3 class="widget-title">Recent Posts</h3>
                                <ul class="list-unstyled">
                                    @foreach ($recentTour as $item)
                                    <li class="d-flex align-items-center">
                                        <div class="posts-thumb">
                                            <a href="#"><img loading="lazy" alt="img"
                                                    src="{{asset('storage/'.$item->image)}}"></a>
                                        </div>
                                        <div class="post-info">
                                            <h4 class="entry-title">
                                                <a href="{{route('user.detail-tour', $item->id)}}">{{$item->name}}</a>
                                            </h4>
                                        </div>
                                    </li><!-- 1st post end-->
                                    @endforeach
                                </ul>

                            </div><!-- Recent post end -->
                        </div><!-- Sidebar end -->
                    </div><!-- Sidebar Col end -->

                </div><!-- Main row end -->

            </div><!-- Conatiner end -->
        </section><!-- Main container end -->

        @include('frontend.partial.footer')

        @include('frontend.partial.js')

    </div><!-- Body inner end -->
</body>

</html>