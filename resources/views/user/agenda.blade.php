<!DOCTYPE html>
<html lang="en">

<head>
    @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- fullcalendar css  -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
    @endpush
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
                                <h1 class="banner-title">Agenda</h1>
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
                        <h2 class="section-title">Agenda</h2>
                        <h3 class="section-sub-title">Agenda Yang Akan Datang</h3>
                    </div>
                </div>
                <!--/ Title row end -->
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="mx-auto" id="calendar"></div>
                    </div>
                </div>
            </div><!-- Conatiner end -->
        </section><!-- Main container end -->

        @include('frontend.partial.footer')

        @include('frontend.partial.js')

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
            integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: [@foreach ($agenda as $item)
                                {
                                    title : "{{$item->title}}",
                                    start : "{{$item->start_date}}",
                                    end : "{{$item->end_date}}",
                                },
                            @endforeach],
                    selectOverlap: function (event) {
                        return event.rendering === 'background';
                    }
                });
    
                calendar.render();
            });
            
        </script>
    </div><!-- Body inner end -->
</body>

</html>