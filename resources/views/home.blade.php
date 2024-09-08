@extends('layouts.app')

@section('content')
    <!--landing-page section-->
    <section class="landing-page">
        <div class="lp-wrapper">
            <h1>HOME <br> OF <br> AMAZING <br> EXPERIENCE</h1>
        </div>



    </section>

    <!--next-event section-->
    <section class="next-event">
        <h5>THIS FRIDAY</h5>
        <h4>18TH JUL</h4>

        <div class="words">
            <div class="words-slide">
                <p>MASSHOUSE LIVE</p>
            </div>
            <div class="words-slide">
                <p>MASSHOUSE LIVE</p>
            </div>
            <div class="words-slide">
                <p>MASSHOUSE LIVE</p>
            </div>
        </div>


        <h2>THE LIVE PARTY</h2>

        <script>
            var copy = document.querySelector(".word-slide").cloneNode(true);
            document.querySelector(".words").appendChild(copy);
        </script> <!--infinite loop script-->
    </section>

    <!--upcoming-events section-->
    <section class="upcoming-events">
        <div class="sub-heading">
            <h3>UPCOMING EVENTS</h3>
        </div>



        <!-- Swiper -->
        <div class="swiper mySwiper case-studies">
            <div class="swiper-wrapper">
                <!-- <a href=""></a> -->
                <div class="swiper-slide work-box one">
                    <img class="logo-white" src="{{ asset('images/logo-icon-white.png') }}" alt="logo">
                    <!-- <img class="logo-black" src="images/logo-icon-white.png" alt="logo"> -->

                    <h6>AUG 24TH 2024</h6>
                    <p>1800 HRS</p>
                    <!-- <br> -->
                    <p>Masshouse Live*</p>
                    <br><br>

                    <h6>FRIDAY</h6>
                    <!-- <br> -->
                    <h2>24 AUG</h2>
                    <!-- <br> -->
                    <h6>GOOD VIBES & GOOD TIMES</h6>
                    <p>THE LIVE PARTY</p>

                    <br>

                    <div class="button">
                        <a href="" class="button1">GET TICKETS &nbsp;<i style="margin-left: 130px;"
                                class="text-dark fa-solid fa-up-right-from-square"></i></a>
                    </div>
                    <br>

                    <div class="uc-cta d-flex justify-content-between">
                        <div>
                            <!-- <a href=""></a> -->
                            <h6>VIP TABLES</h6>
                        </div>
                        <div>
                            <h6>BOOK NOW</h6>
                        </div>
                    </div>

                </div>



                <div class="swiper-slide work-box">
                    <img class="logo-white" src="{{ asset('images/logo-icon-white.png') }}" alt="logo">
                    <!-- <img class="logo-black" src="images/logo-icon-white.png" alt="logo"> -->

                    <h6>AUG 24TH 2024</h6>
                    <p>1800 HRS</p>
                    <!-- <br> -->
                    <p>Masshouse Live*</p>
                    <br><br>

                    <h6>FRIDAY</h6>
                    <!-- <br> -->
                    <h2>24 AUG</h2>
                    <!-- <br> -->
                    <h6>GOOD VIBES & GOOD TIMES</h6>
                    <p>THE LIVE PARTY</p>

                    <br>

                    <div class="button">
                        <a href="" class="button1">GET TICKETS &nbsp;<i style="margin-left: 130px;"
                                class="text-dark fa-solid fa-up-right-from-square"></i></a>
                    </div>
                    <br>

                    <div class="uc-cta d-flex justify-content-between">
                        <div>
                            <!-- <a href=""></a> -->
                            <h6>VIP TABLES</h6>
                        </div>
                        <div>
                            <h6>BOOK NOW</h6>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide work-box">
                    <img class="logo-white" src="{{ asset('images/logo-icon-white.png') }}" alt="logo">
                    <!-- <img class="logo-black" src="images/logo-icon-white.png" alt="logo"> -->

                    <h6>AUG 24TH 2024</h6>
                    <p>1800 HRS</p>
                    <!-- <br> -->
                    <p>Masshouse Live*</p>
                    <br><br>

                    <h6>FRIDAY</h6>
                    <!-- <br> -->
                    <h2>24 AUG</h2>
                    <!-- <br> -->
                    <h6>GOOD VIBES & GOOD TIMES</h6>
                    <p>THE LIVE PARTY</p>

                    <br>

                    <div class="button">
                        <a href="" class="button1">GET TICKETS &nbsp;<i style="margin-left: 130px;"
                                class="text-dark fa-solid fa-up-right-from-square"></i></a>
                    </div>
                    <br>

                    <div class="uc-cta d-flex justify-content-between">
                        <div>
                            <!-- <a href=""></a> -->
                            <h6>VIP TABLES</h6>
                        </div>
                        <div>
                            <h6>BOOK NOW</h6>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide work-box">
                    <img class="logo-white" src="images/logo-icon-white.png" alt="logo">
                    <!-- <img class="logo-black" src="images/logo-icon-white.png" alt="logo"> -->

                    <h6>AUG 24TH 2024</h6>
                    <p>1800 HRS</p>
                    <!-- <br> -->
                    <p>Masshouse Live*</p>
                    <br><br>

                    <h6>FRIDAY</h6>
                    <!-- <br> -->
                    <h2>24 AUG</h2>
                    <!-- <br> -->
                    <h6>GOOD VIBES & GOOD TIMES</h6>
                    <p>THE LIVE PARTY</p>

                    <br>

                    <div class="button">
                        <a href="" class="button1">GET TICKETS &nbsp;<i style="margin-left: 130px;"
                                class="text-dark fa-solid fa-up-right-from-square"></i></a>
                    </div>
                    <br>

                    <div class="uc-cta d-flex justify-content-between">
                        <div>
                            <!-- <a href=""></a> -->
                            <h6>VIP TABLES</h6>
                        </div>
                        <div>
                            <h6>BOOK NOW</h6>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide work-box">
                    <img class="logo-white" src="images/logo-icon-white.png" alt="logo">
                    <!-- <img class="logo-black" src="images/logo-icon-white.png" alt="logo"> -->

                    <h6>AUG 24TH 2024</h6>
                    <p>1800 HRS</p>
                    <!-- <br> -->
                    <p>Masshouse Live*</p>
                    <br><br>

                    <h6>FRIDAY</h6>
                    <!-- <br> -->
                    <h2>24 AUG</h2>
                    <!-- <br> -->
                    <h6>GOOD VIBES & GOOD TIMES</h6>
                    <p>THE LIVE PARTY</p>

                    <br>

                    <div class="button">
                        <a href="" class="button1">GET TICKETS &nbsp;<i style="margin-left: 130px;"
                                class="text-dark fa-solid fa-up-right-from-square"></i></a>
                    </div>
                    <br>

                    <div class="uc-cta d-flex justify-content-between">
                        <div>
                            <!-- <a href=""></a> -->
                            <h6>VIP TABLES</h6>
                        </div>
                        <div>
                            <h6>BOOK NOW</h6>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide work-box one">
                    <img class="logo-white" src="images/logo-icon-white.png" alt="logo">
                    <!-- <img class="logo-black" src="images/logo-icon-white.png" alt="logo"> -->

                    <h6>AUG 24TH 2024</h6>
                    <p>1800 HRS</p>
                    <!-- <br> -->
                    <p>Masshouse Live*</p>
                    <br><br>

                    <h6>FRIDAY</h6>
                    <!-- <br> -->
                    <h2>24 AUG</h2>
                    <!-- <br> -->
                    <h6>GOOD VIBES & GOOD TIMES</h6>
                    <p>THE LIVE PARTY</p>

                    <br>

                    <div class="button">
                        <a href="" class="button1">GET TICKETS &nbsp;<i style="margin-left: 130px;"
                                class="text-dark fa-solid fa-up-right-from-square"></i></a>
                    </div>
                    <br>

                    <div class="uc-cta d-flex justify-content-between">
                        <div>
                            <!-- <a href=""></a> -->
                            <h6>VIP TABLES</h6>
                        </div>
                        <div>
                            <h6>BOOK NOW</h6>
                        </div>
                    </div>
                </div>


            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
        </div>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script src="js/upcomingevents-swiper.js"></script>

    </section>

    <!--partners-n-sponsors section-->
    <section class="partners-n-sponsors">
        <div class="logos">
            <div class="logos-slide">
                <img src="{{ asset('images/sponsors/eabl.png') }}" />
                <img src="images/sponsors/donjulio.png" />
                <img src="images/sponsors/tanqueray.png" />
                <img src="images/sponsors/kbl.png" />
                <img src="images/sponsors/singleton.png" />
                <img src="images/sponsors/safaricom.png" />

            </div>
        </div>


        <script>
            var copy = document.querySelector(".logos-slide").cloneNode(true);
            document.querySelector(".logos").appendChild(copy);
        </script> <!--infinite loop script-->
    </section>

    <!--merchandise-alert section-->
    <section class="merchandise-alert">
        <div class="sub-heading">
            <h3>MERCHANDISE ALERT</h3>
        </div>



        <!-- Swiper -->
        <div class="swiper mySwiper case-studies">
            <div class="swiper-wrapper">

                <div class="swiper-slide merch-box one">

                </div>

                <div class="swiper-slide merch-box two">

                </div>

                <div class="swiper-slide merch-box three">

                </div>

                <div class="swiper-slide merch-box four">

                </div>

                <div class="swiper-slide merch-box five">

                </div>

                <div class="swiper-slide merch-box six">

                </div>


            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
        </div>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script src="{{ asset('js/upcomingevents-swiper.js') }}"></script>
    </section>

    <!--music-player section-->
    <section class="music-player"></section>
@endsection
