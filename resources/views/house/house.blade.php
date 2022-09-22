<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive coffee shop website design</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- fullcalendar css  -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('/assets/css/houseStyles.css') }}">


</head>

<body>

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>List Acara-Acara</h3>
            <h3>PT PAL Indonesia</h3>
            <a href="#" class="btn">change now !</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- review section starts  -->

    <section class="calender" id="calender">

        <h1 class="heading"> calender <span>event</span> </h1>

        <div class="container mt-4">
            <div class="row">
                <div class="card shadow-none rounded-0 bg-transparent h-auto">
                    <div class="card-header border-0 pb-0">
                        <h4 class="text-black">Upcoming Events</h4>
                    </div>
                    <div class="card-body">
                        <div class="media mb-5 align-items-center event-list">
                            <div class="p-3 text-center rounded me-3 date-bx bgl-primary">
                                <i class="fa fa-plus" style="font-size:25px;color:rgb(37, 37, 169)"></i>
                                {{-- <a class="fa-sharp fa-solid fa-pen"></a> --}}
                            </div>
                            <div class="media-body px-0">
                                <h6 class="mt-0 mb-3 fs-14"><a class="text-black" href="events.html">Live Concert Choir
                                        Charity
                                        Event 2020</a></h6>
                                <ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
                                    <li>Ticket Sold</li>
                                    <li>561/650</li>
                                </ul>
                                <div class="progress mb-0" style="height:4px; width:100%;">
                                    <div class="progress-bar bg-warning progress-animated"
                                        style="width:85%; height:8px;" role="progressbar">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="media mb-0 align-items-center event-list">
                            <div class="p-3 text-center rounded me-3 date-bx bgl-success">
                                <h2 class="mb-0 text-black">28</h2>
                                <h5 class="mb-1 text-black">Fri</h5>
                            </div>
                            <div class="media-body px-0">
                                <h6 class="mt-0 mb-3 fs-14"><a class="text-black" href="events.html">The Story Of Danau
                                        Toba
                                        (Musical Drama)</a></h6>
                                <ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
                                    <li>Ticket Sold</li>
                                    <li>650/650</li>
                                </ul>
                                <div class="progress mb-0" style="height:4px; width:100%;">
                                    <div class="progress-bar bg-success progress-animated"
                                        style="width:100%; height:8px;" role="progressbar">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @foreach ($rundown as $r)
                    <div class="modal fade" id="detailModalrundown{{ $r->idRundowns }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">


                    @endforeach --}}
                    <div class="card-footer justify-content-between border-0 d-flex fs-14">
                        <span>5 events more</span>
                        <a href="javascript:void(0);" class="text-primary">View more <i
                                class="las la-long-arrow-alt-right scale5 ms-2"></i></a>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
            integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: [],
                    selectOverlap: function(event) {
                        return event.rendering === 'background';
                    }
                });

                calendar.render();
            });
        </script>

        </div>

    </section>

    <!-- review section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> <span>pt pal</span> event's </h1>

        <div class="row">

            <div class="image">
                <img src="assets/images/pal-rs.jpg" alt="">
            </div>

            <div class="content">
                <h3>what makes our coffee special?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus qui ea ullam, enim tempora
                    ipsum fuga alias quae ratione a officiis id temporibus autem? Quod nemo facilis cupiditate. Ex, vel?
                </p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit amet enim quod veritatis, nihil
                    voluptas culpa! Neque consectetur obcaecati sapiente?</p>
                <a href="#" class="btn">learn more</a>
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- contact section starts  -->

    <section class="contact" id="contact">

        <h1 class="heading"> <span>pt pal</span> map's </h1>
        <div class="container mt-4">
            <div class="row">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.3096549515203!2d112.73937091465727!3d-7.205469772737496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f9fdd43a47e3%3A0xe81dae64f37a97ee!2sPT%20PAL%20Indonesia%20(Persero)!5e0!3m2!1sid!2sid!4v1661329637566!5m2!1sid!2sid"
                    width="1200" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </section>

    <!-- contact section ends -->

    <!-- footer section starts  -->

    <section class="footer">

        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
            <a href="#" class="fab fa-youtube"></a>
        </div>

        <div class="credit">dibuat oleh <span>mahasiswa TI </span> | politeknik negeri malang</div>

    </section>

    <!-- footer section ends -->

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>
