@extends('layouts.app')

@section('content')
    <!--about-landing section-->
    <section class="about-landing">
        <!-- <p class="white">HOME OF AMAZING EXPERIENCES</p>
        <p class="black">HOME OF AMAZING EXPERIENCES</p> -->
        <div class="words">
            <div class="words-slide">
                <p class="white">HOME OF AMAZING EXPERIENCES</p>
            </div>
            <div class="words-slide">
                <p class="white">HOME OF AMAZING EXPERIENCES</p>
            </div>
            <div class="words-slide">
                <p class="white">HOME OF AMAZING EXPERIENCES</p>
            </div>
        </div>
        <!-- <style>
            @keyframes  slide {
    from {
        transform: translateX(-100%);
    }

    to {
        transform: translateX(0);
    }
    }
        </style> -->

        <script>
            var copy = document.querySelector(".word-slide").cloneNode(true);
            document.querySelector(".words").appendChild(copy);
        </script> <!--infinite loop script-->

        <div class="words2">
            <div class="words-slide2">
                <p class="black">HOME OF AMAZING EXPERIENCES</p>
            </div>
            <div class="words-slide2">
                <p class="black">HOME OF AMAZING EXPERIENCES</p>
            </div>
            <div class="words-slide2">
                <p class="black">HOME OF AMAZING EXPERIENCES</p>
            </div>
        </div>

        <script>
            var copy = document.querySelector(".word-slide2").cloneNode(true);
            document.querySelector(".words2").appendChild(copy);
        </script> <!--infinite loop script-->
    </section>

    <!--info section-->
    <section class="info">
        <h3>The Masshouse Experience</h3>
        <div>
            <p>
                Masshouse Live is Kenya’s top event destination, known for its electrifying energy and welcoming atmosphere.
                Our <br>
                venue is designed to host outstanding, unique events that stand out in every way.
                <br><br>
                Every aspect of Masshouse Live is crafted for an exceptional experience, ensuring each event is memorable.
                From <br>
                luxurious settings to top-tier service, we are dedicated to making every occasion special. At Masshouse, we
                create <br>
                moments that matter and celebrate each event with authenticity and care.
            </p>
        </div>
    </section>

    <!--venue section-->
    <section class="venue-click">
        <div class="sub-heading">
            <h3>UNLIMITED ENTERTAINMENT AT OUR SELECTED VENUES</h3>
        </div>



        <!-- Swiper -->
        <div class="swiper mySwiper case-studies">
            <div class="swiper-wrapper">

                <div class="swiper-slide venue-box one">
                    <p>NAIROBI</p>
                </div>

                <div class="swiper-slide venue-box two">
                    <p>MOMBASA</p>
                </div>

                <div class="swiper-slide venue-box three">
                    <p>NAIVASHA</p>
                </div>

                <div class="swiper-slide venue-box">

                </div>

                <div class="swiper-slide venue-box">

                </div>

                <div class="swiper-slide venue-box">

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
    <section class="venue-pictures"></section>

    <!--team section-->
    <section class="team">
        <div class="sub-heading">
            <h3>THE MASSHOUSE TEAM</h3>
            <p>Get to know the talented individuals who will put a touch of class on your events.</p>
        </div>



        <!-- Swiper -->
        <div class="swiper mySwiper case-studies">
            <div class="swiper-wrapper">

                <div class="swiper-slide team-box one">

                </div>

                <div class="swiper-slide team-box two">

                </div>

                <div class="swiper-slide team-box three">

                </div>

                <div class="swiper-slide team-box four">

                </div>

                <div class="swiper-slide team-box five">

                </div>

                <div class="swiper-slide team-box six">

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

    <!--pro-corner section-->
    <section class="pro-corner">
        <div class="sub-heading">
            <h3>OUR PRO'S CORNER</h3>
        </div>

        <div class="row pro-wrapper">
            <div class="pro-box one col-lg-4 col-md-6 col-sm-12"></div>
            <div class="pro-box two col-lg-4 col-md-6 col-sm-12"></div>
            <div class="pro-box three col-lg-4 col-md-6 col-sm-12"></div>
        </div>
    </section>

    <!--www-cta section-->
    <section class="www-cta">
        <div class="sub-heading">
            <h3>WORK WITH US</h3>
        </div>

        <div class="row www-wrapper">
            <div class="www-box col-lg-4 col-md-6 col-sm-12">
                <p>PARTNERSHIPS</p>
            </div>
            <div class="www-box col-lg-4 col-md-6 col-sm-12">
                <p>CORPORATES</p>
            </div>
            <div class="www-box col-lg-4 col-md-6 col-sm-12">
                <p>SPECIALISTS</p>
            </div>
        </div>
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
    <section class="partners-n-sponsors about">
        <div style="margin-left: 50px; margin-bottom: 30px;">
            <h3>PARTNERS & SPONSORS</h3>
        </div>
        <div class="logos">
            <div class="logos-slide">
                <img src="images/sponsors/eabl-black.png" />
                <img src="images/sponsors/donjulio-black.png" />
                <img src="images/sponsors/tanqueray-black.png" />
                <img src="images/sponsors/kbl-black.png" />
                <img src="images/sponsors/singleton-black.png" />
                <img src="images/sponsors/safaricom-black.png" />

            </div>
        </div>


        <script>
            var copy = document.querySelector(".logos-slide").cloneNode(true);
            document.querySelector(".logos").appendChild(copy);
        </script> <!--infinite loop script-->
    </section>
@endsection
