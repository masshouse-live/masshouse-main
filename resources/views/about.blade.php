@extends('layouts.app')

@section('content')
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
    <div class="bg-image">
        <!--info section-->
        <section class="info">
            <h3>The Masshouse Experience</h3>
            <div>
                <p>
                    Masshouse Live is Kenya’s top event destination, known for its electrifying energy and welcoming
                    atmosphere. Our <br>
                    venue is designed to host outstanding, unique events that stand out in every way.
                    <br><br>
                    Every aspect of Masshouse Live is crafted for an exceptional experience, ensuring each event is
                    memorable. From <br>
                    luxurious settings to top-tier service, we are dedicated to making every occasion special. At Masshouse,
                    we create <br>
                    moments that matter and celebrate each event with authenticity and care.
                </p>
            </div>
        </section>

        <!--venue section-->
        <section class="venue-click">
            <div class="sub-heading">
                <h3>UNLIMITED ENTERTAINMENT AT OUR SELECTED VENUES</h3>
            </div>
            <br>



            <!-- Swiper -->
            <div class="swiper mySwiper case-studies">
                <div class="swiper-wrapper">

                    <div class="swiper-slide venue-box one">
                        <img src="images/venues/nairobi.jpg" alt="image">
                        <p>NAIROBI</p>
                        <div class="button">
                            <a href="" class="button1">CHECK OUT VENUE
                                <svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                    height="1.5em" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                </svg>
                                <!-- <i class="text-dark fa-solid fa-up-right-from-square"></i> -->
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide venue-box two">
                        <img src="images/venues/mombasa.jpg" alt="image">
                        <p>MOMBASA</p>
                        <div class="button">
                            <a href="" class="button1">CHECK OUT VENUE
                                <svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                    height="1.5em" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide venue-box three">
                        <img src="images/venues/naivasha.jpg" alt="image">
                        <p>NAIVASHA</p>
                        <div class="button">
                            <a href="" class="button1">CHECK OUT VENUE
                                <svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                    height="1.5em" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                </svg>
                            </a>
                        </div>
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
                <!-- <div class="swiper-pagination"></div> -->
            </div>

            <!-- Swiper JS -->
            <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

            <!-- Initialize Swiper -->
            <script src="js/upcomingevents-swiper.js"></script>
        </section>
        <section class="venue-pictures">
            <div class="row vp-wrapper">
                <div class="vp-left col-lg-5 col-md-6 col-sm-12">
                    <div class="vp-box1">
                        <img src="images/venue-ph-1.PNG" alt="image">
                    </div>
                    <div class="vp-box2">
                        <img src="images/venue-ph-2.PNG" alt="image">
                    </div>
                </div>
                <div class="vp-right col-lg-7 col-md-6 col-sm-12">
                    <div class="vp-box3 d-flex">
                        <div class="box1 col-lg-7 col-md-6 col-sm-12">
                            <img src="images/venue-ph-3.PNG" alt="image">
                        </div>
                        <div class="box2 col-lg-5 col-md-6 col-sm-12">
                            <img src="images/venue-ph-4.PNG" alt="image">
                        </div>
                    </div>
                    <div class="vp-box4">
                        <img src="images/venue-ph-5.PNG" alt="image">
                    </div>
                </div>
            </div>
        </section>

        <!--team section-->
        <section class="team">
            <div class="sub-heading">
                <h3>THE MASSHOUSE TEAM</h3>
                <br>
                <p>Get to know the talented individuals who will put a touch of class on your events.</p>
            </div>



            <!-- Swiper -->
            <div class="swiper mySwiper case-studies">
                <div class="swiper-wrapper">

                    <div class="swiper-slide team-box">
                        <div class="team-box-img">
                            <img src="images/team/user1.PNG" alt="">
                        </div>
                        <div class="team-details">
                            <h5>NICK NYAGA</h5>
                            <p>Managing Director</p>
                        </div>
                    </div>

                    <div class="swiper-slide team-box">
                        <div class="team-box-img">
                            <img src="images/team/user2.PNG" alt="">
                        </div>
                        <div class="team-details">
                            <h5>CHARLES RUIRU</h5>
                            <p> Events Cordinator</p>
                        </div>
                    </div>

                    <div class="swiper-slide team-box">
                        <div class="team-box-img">
                            <img src="images/team/user3.PNG" alt="">
                        </div>
                        <div class="team-details">
                            <h5>MKENYA MWENZA</h5>
                            <p>Sound Guru</p>
                        </div>
                    </div>

                    <div class="swiper-slide team-box">
                        <div class="team-box-img">
                            <img src="images/team/user4.PNG" alt="">
                        </div>
                        <div class="team-details">
                            <h5>OMWAMI KIBOKOLAO</h5>
                            <p>Stage Manager</p>
                        </div>
                    </div>

                    <div class="swiper-slide team-box">
                        <div class="team-box-img">
                            <img src="images/team/user1.PNG" alt="">
                        </div>
                        <div class="team-details">
                            <h5>NICK NYAGA</h5>
                            <p>Managing Director</p>
                        </div>
                    </div>

                    <div class="swiper-slide team-box"></div>


                </div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <!-- <div class="swiper-pagination"></div> -->
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
            <br>

            <div class="row pro-wrapper">
                <div class="pro-box one col-lg-4 col-md-6 col-sm-12">
                    <img src="images/djs.jpg" alt="image">
                    <div>
                        <p>DJ's</p>
                    </div>

                    <div class="pro-details">
                        <div class="button">
                            <a href="" style="padding-left: 50px;" class="button2">VIEW PROFILES &nbsp;
                                <svg style="margin-left: 50px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                    width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                </svg>
                                <!-- <i style="margin-left: 50px;"
                                class="text-white fa-solid fa-up-right-from-square"></i> -->
                            </a>
                        </div>
                    </div>
                </div>

                <div class="pro-box two col-lg-4 col-md-6 col-sm-12">
                    <img src="images/artists2.jpg" alt="image">
                    <p class="artist-p">ARTISTS</p>
                    <div class="pro-details">
                        <div class="button">
                            <a href="" style="padding-left: 50px;" class="button2">VIEW PROFILES &nbsp;
                                <svg style="margin-left: 50px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                    width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="pro-box three col-lg-4 col-md-6 col-sm-12">
                    <img src="images/mcs.jpg" alt="image">
                    <p>MC's</p>
                    <div class="pro-details">
                        <div class="button">
                            <a href="" style="padding-left: 50px;" class="button2">VIEW PROFILES &nbsp;
                                <svg style="margin-left: 50px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                    width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--www-cta section-->
        <section class="www-cta">
            <div class="sub-heading">
                <h3>WORK WITH US</h3>
            </div>
            <br>

            <div class="row www-wrapper">
                <div class="www-box col-lg-4 col-md-6 col-sm-12">

                    <p>PARTNERSHIPS</p>

                    <div class="button">
                        <a href="" style="padding-left: 30px;" class="button1">PARTNER WITH US &nbsp;
                            <svg style="margin-left: 30px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>

                        </a>
                    </div>
                </div>
                <div class="www-box col-lg-4 col-md-6 col-sm-12">
                    <p>CORPORATES</p>

                    <div class="button">
                        <a href="" style="padding-left: 30px;" class="button1">BE PART OF US &nbsp;
                            <svg style="margin-left: 30px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>
                        </a>
                    </div>

                </div>
                <div class="www-box col-lg-4 col-md-6 col-sm-12">
                    <p>SPECIALISTS</p>

                    <div class="button">
                        <a href="" style="padding-left: 30px;" class="button1">LINK WITH AN EXPERT &nbsp;
                            <svg style="margin-left: 30px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>
                        </a>
                    </div>

                </div>
            </div>
        </section>

    </div>

    <!--upcoming-events section-->
    <section class="upcoming-events">
        <div class="sub-heading">
            <h3>UPCOMING EVENTS</h3>
        </div>
        <div class="swiper-filter">
            <ul>
                <li><a href="#">DAYTIME</a></li>
                <li><a href="#" class="active">NIGHTLIFE</a></li>
                <li><a href="#">EXCLUSIVE</a></li>
            </ul>
        </div>



        <!-- Swiper -->
        <div class="swiper mySwiper case-studies">
            <div class="swiper-wrapper">

                <div class="swiper-slide work-box one">
                    <img class="logo-white" src="images/logo-white-removebg-preview.png" alt="logo">
                    <img class="logo-black" src="images/logo-black-removebg-preview.png" alt="logo">

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
                        <a href="tickets.html" class="button1">GET TICKETS &nbsp;
                            <svg style="margin-left: 100px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>

                        </a>
                    </div>
                    <br>

                    <div class="uc-cta d-flex justify-content-between">
                        <div>
                            <h6>VIP TABLES</h6>
                        </div>
                        <div>
                            <h6>BOOK NOW</h6>
                        </div>
                    </div>

                </div>



                <div class="swiper-slide work-box">
                    <img class="logo-white" src="images/logo-white-removebg-preview.png" alt="logo">
                    <img class="logo-black" src="images/logo-black-removebg-preview.png" alt="logo">

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
                        <a href="tickets.html" class="button1">GET TICKETS &nbsp;
                            <svg style="margin-left: 100px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>
                        </a>
                    </div>
                    <br>

                    <div class="uc-cta d-flex justify-content-between">
                        <div>
                            <h6>VIP TABLES</h6>
                        </div>
                        <div>
                            <h6>BOOK NOW</h6>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide work-box">
                    <img class="logo-white" src="images/logo-white-removebg-preview.png" alt="logo">
                    <img class="logo-black" src="images/logo-black-removebg-preview.png" alt="logo">

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
                        <a href="tickets.html" class="button1">GET TICKETS &nbsp;
                            <svg style="margin-left: 100px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>
                        </a>
                    </div>
                    <br>

                    <div class="uc-cta d-flex justify-content-between">
                        <div>
                            <h6>VIP TABLES</h6>
                        </div>
                        <div>
                            <h6>BOOK NOW</h6>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide work-box">
                    <img class="logo-white" src="images/logo-white-removebg-preview.png" alt="logo">
                    <img class="logo-black" src="images/logo-black-removebg-preview.png" alt="logo">

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
                        <a href="tickets.html" class="button1">GET TICKETS &nbsp;
                            <svg style="margin-left: 100px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>
                        </a>
                    </div>
                    <br>

                    <div class="uc-cta d-flex justify-content-between">
                        <div>
                            <h6>VIP TABLES</h6>
                        </div>
                        <div>
                            <h6>BOOK NOW</h6>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide work-box">
                    <img class="logo-white" src="images/logo-white-removebg-preview.png" alt="logo">
                    <img class="logo-black" src="images/logo-black-removebg-preview.png" alt="logo">

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
                        <a href="tickets.html" class="button1">GET TICKETS &nbsp;
                            <svg style="margin-left: 100px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>
                        </a>
                    </div>
                    <br>

                    <div class="uc-cta d-flex justify-content-between">
                        <div>
                            <h6>VIP TABLES</h6>
                        </div>
                        <div>
                            <h6>BOOK NOW</h6>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide work-box one">
                    <img class="logo-white" src="images/logo-white-removebg-preview.png" alt="logo">
                    <img class="logo-black" src="images/logo-black-removebg-preview.png" alt="logo">

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
                        <a href="tickets.html" class="button1">GET TICKETS &nbsp;
                            <svg style="margin-left: 100px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>
                        </a>
                    </div>
                    <br>

                    <div class="uc-cta d-flex justify-content-between">
                        <div>
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
            <!-- <div class="swiper-pagination"></div> -->
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
