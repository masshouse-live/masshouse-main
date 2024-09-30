@extends('layouts.app')

@section('content')
    <!--news-landing section-->
    <section class="news-landing">
        <h2>NEWS</h2>

    </section>

    <!--news-articles section-->
    <section class="news-articles">
        <div class="news-filter">
            <ul>
                <li><a href="#" class="active">All</a></li>
                <li><a href="#">Interview</a></li>
                <li><a href="#">Article</a></li>
            </ul>
        </div>
        <div class="row article-wrapper">
            <div class="article-box one col-lg-4 col-md-6 col-sm-12">
                <div class="img-box">
                    <img src="images/news1-ph.PNG" alt="image">
                </div>
                <div class="news-details">
                    <span>Article</span>
                    <h3>MASSHOUSE LAUNCH EVENT</h3>
                    <div class="button">
                        <a href="zblog.html" style="padding-left: 50px;" class="button2">READ MORE &nbsp;
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
            <div class="article-box two col-lg-4 col-md-6 col-sm-12">
                <div class="img-box">
                    <img src="images/news2-ph.PNG" alt="image">
                </div>
                <div class="news-details">
                    <span>Article</span>
                    <h3>DIRECTORS REVEAL THE DREAM BEHIND THE BRAND</h3>
                    <div class="button">
                        <a href="zblog.html" style="padding-left: 50px;" class="button2">READ MORE &nbsp;
                            <svg style="margin-left: 50px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="article-box three col-lg-4 col-md-6 col-sm-12">
                <div class="img-box">
                    <img src="images/news3-ph.PNG" alt="image">
                </div>
                <div class="news-details">
                    <span>Article</span>
                    <h3>UNMISSABLE POST-EVENTS EXCLUSIVE BITES</h3>
                    <div class="button">
                        <a href="zblog.html" style="padding-left: 50px;" class="button2">READ MORE &nbsp;
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

    <!--blogs section-->
    <section class="blogs">
        <div class="sub-heading">
            <h3>BLOGS/INSTABUZZ</h3>
        </div>
        <br>
        <div class="row blog-wrapper">
            <div class="blog-box one col-lg-4 col-md-6 col-sm-12">
                <div class="img-box">
                    <img src="images/blog-ph-1.PNG" alt="image">
                </div>
                <div class="blog-details">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="date">
                            <span>24 0CT 2024</span>
                        </div>
                        <div class="admin">
                            <span class="admin"><i class="fa-regular fa-circle-user"></i>&nbsp;BY ADMIN</span>
                        </div>
                    </div>
                    <h4>EXCLUSIVE: A spotlight check
                        on Masshouse Live the most
                        sough after event hub and why.</h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                        nonummy nibh euismod tincidunt ut laoreet dolore magna
                        aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud</p>
                    <div class="button">
                        <a href="zblog.html" style="padding-left: 50px;" class="button1">READ MORE &nbsp;
                            <svg style="margin-left: 50px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>
                            <!-- <i style="margin-left: 50px;"
                                                                                                class="text-dark fa-solid fa-up-right-from-square"></i> -->
                        </a>
                    </div>
                </div>
            </div>
            <div class="blog-box two col-lg-4 col-md-6 col-sm-12">
                <div class="img-box">
                    <img src="images/blog-ph-2.PNG" alt="image">
                </div>
                <div class="blog-details">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="date">
                            <span>24 0CT 2024</span>
                        </div>
                        <div class="admin">
                            <span class="admin"><i class="fa-regular fa-circle-user"></i>&nbsp;BY ADMIN</span>
                        </div>
                    </div>
                    <h4>Making it personal: How
                        Masshouse’s personalisation
                        creates epic events for ravellers.</h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                        nonummy nibh euismod tincidunt ut laoreet dolore magna
                        aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud</p>
                    <div class="button">
                        <a href="zblog.html" style="padding-left: 50px;" class="button1">READ MORE &nbsp;
                            <svg style="margin-left: 50px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="blog-box three col-lg-4 col-md-6 col-sm-12">
                <div class="img-box">
                    <img src="images/blog-ph-3.PNG" alt="image">
                </div>
                <div class="blog-details">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="date">
                            <span>24 0CT 2024</span>
                        </div>
                        <div class="admin">
                            <span class="admin"><i class="fa-regular fa-circle-user"></i>&nbsp;BY ADMIN</span>
                        </div>
                    </div>
                    <h4>Cultural extravaganza: Celebrating
                        Kenyan heritage through first
                        hand events</h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                        nonummy nibh euismod tincidunt ut laoreet dolore magna
                        aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud</p>
                    <div class="button">
                        <a href="zblog.html" style="padding-left: 50px;" class="button1">READ MORE &nbsp;
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

    <div class="bg-image2">
        <!--other-news section-->
        <section class="other-news">
            <div class="sub-heading">
                <h3>OTHER MH NEWS</h3>
            </div>
            <br>
            <div class="row onws-wrapper">
                <div class="onws-box one col-lg-3 col-md-6 col-sm-12">
                    <a href="">
                        <img src="images/mh-news-ph-1.PNG" alt="image">
                    </a>
                </div>
                <div class="onws-box two col-lg-3 col-md-6 col-sm-12">
                    <a href="">
                        <img src="images/mh-news-ph-2.PNG" alt="image">
                    </a>
                </div>
                <div class="onws-box three col-lg-3 col-md-6 col-sm-12">
                    <a href="">
                        <img src="images/mh-news-ph-3.PNG" alt="image">
                    </a>
                </div>
                <div class="onws-box four col-lg-3 col-md-6 col-sm-12">
                    <a href="">
                        <img src="images/mh-news-ph-4.PNG" alt="image">
                    </a>
                </div>
            </div>
        </section>

        <!--trending-now section-->
        <section class="trending-now">
            <div class="sub-heading">
                <h3>TRENDING NOW</h3>
            </div>
            <br>
            <div class="row trend-wrapper">
                <div class="trend-left col-lg-5 col-md-6 col-sm-12">
                    <img src="images/trending-now.PNG" alt="image">

                    <h3>
                        MHLHot & Fresh: Here is a <br>
                        list of new playlist released <br>
                        this week.
                    </h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                        nonummy nibh euismod tincidunt ut laoreet dolore magna
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                        nonummy nibh euismod tincidunt ut laoreet dolore magna
                    </p>
                </div>
                <div class="trend-right col-lg-7 col-md-6 col-sm-12">
                    <div class="row tr-wrapper one">
                        <div class="tr-left col-lg-6 col-md-6 col-sm-12">
                            <h5>
                                Bien enlists Nigeria's Adekunle Gold at <br>
                                #MHLFEST & other must-check events <br>
                                of month.
                            </h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet
                                dolore magna
                            </p>
                            <div class="button">
                                <a href="" class="button1" style="padding: 5px 10px;">READ MORE &nbsp;
                                    <svg style="margin-left: 30px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                        width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                    </svg>
                                    <!-- <i style="margin-left: 30px;"
                                                                                                    class="text-dark fa-solid fa-up-right-from-square"></i> -->
                                </a>
                            </div>
                        </div>
                        <div class="tr-right col-lg-6 col-md-6 col-sm-12">
                            <img src="images/trending-now2.PNG" alt="image">
                        </div>
                    </div>

                    <div class="row tr-wrapper">
                        <div class="tr-left col-lg-6 col-md-6 col-sm-12">
                            <br>
                            <h5>
                                Guiness announces fan exclusive <br>
                                Khaligraph Jones & Femi One <br>
                                street party
                            </h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet
                                dolore magna
                            </p>
                            <div class="button">
                                <a href="" class="button1" style="padding: 5px 10px;">READ MORE &nbsp;
                                    <svg style="margin-left: 30px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                        width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="tr-right col-lg-6 col-md-6 col-sm-12">
                            <br>
                            <img src="images/trending-now3.PNG" alt="image">
                        </div>
                    </div>


                </div>
            </div>
        </section>

        <!--partners-n-sponsors section-->
        <section class="partners-n-sponsors news">
            <div style="padding: 30px 0;padding-bottom: 10px;background-color: #000;">
                <h3 class="text-white">PARTNERS & SPONSORS</h3>
            </div>
            <br><br>
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

        <!--other-stuff section-->
        <section class="other-stuff">
            <div class="sub-heading">
                <h3>OTHER MH STUFF</h3>
            </div>
            <br>
            <div class="row ostf-wrapper">
                <div class="ostf-box one col-lg-3 col-md-6 col-sm-12">
                    <a href="">
                        <img src="images/mh-stuff-ph-1.PNG" alt="image">
                    </a>
                </div>
                <div class="ostf-box two col-lg-3 col-md-6 col-sm-12">
                    <a href="">
                        <img src="images/mh-stuff-ph-2.PNG" alt="image">
                    </a>
                </div>
                <div class="ostf-box three col-lg-3 col-md-6 col-sm-12">
                    <a href="">
                        <img src="images/mh-stuff-ph-3.PNG" alt="image">
                    </a>
                </div>
                <div class="ostf-box four col-lg-3 col-md-6 col-sm-12">
                    <a href="">
                        <img src="images/mh-stuff-ph-4.PNG" alt="image">
                    </a>
                </div>
            </div>
        </section>

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

            <!-- Initialize Swiper -->
        </section>




        <!--music-player2 section-->
        <section class="music-player2">
            <div class="music-box2 text-center">
                <div class=" mpr-wrapper d-flex">
                    <div class="mpr-left col-lg-10 col-md-6 col-sm-12">
                        <h3 class="text-center">LISTEN TO THE BEAT OF THE MONTH</h3>
                        <br><br>
                        <div id="progress-indicator"
                            style="background-color: #777; width: 100%; height: 4px; position:relative">
                            <span
                                style="width: 10px; height: 10px;position: absolute; top: -3px; left: 0; background-color: #fff; border-radius: 50%"
                                id="progress-ball"></span>
                            <div class="progress" id="progress" style="height: 4px; width: 0%"></div>
                        </div>
                        <br />
                        <br />
                        <ul class="music-icons list-unstyled list-inline">
                            <li class="list-inline-item mx-3">
                                <i class="fa-solid fa-backward-step" id="backward-step"></i>
                            </li>
                            <li class="list-inline-item mx-3">
                                <i class="fa-solid fa-play" id="play-music"></i>
                            </li>
                            <li class="list-inline-item mx-3">
                                <i class="fa-solid fa-stop" id="stop-music"></i>
                            </li>
                            <li class="list-inline-item mx-3">
                                <i class="fa-solid fa-forward-step" id="forward-step"></i>
                            </li>

                        </ul>
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item mx-3">SPOTIFY</li>
                            <li class="list-inline-item mx-3">SOUNDCLOUD</li>
                            <li class="list-inline-item mx-3">YOUTUBE</li>
                            <li class="list-inline-item mx-3">APPLEMUSIC</li>

                        </ul>
                    </div>

                    <div class="mpr-right col-lg-2 col-md-6 col-sm-12">
                        <audio id="music-player"
                            src="https://upcdn.io/FW25c2f/raw/uploads/2024/05/25/4kbAqbHE12-Are%20Sinners%20Raptured%20First.%20mp3.mp3"></audio>

                        <div class="music-icons">

                            <i class="fa-solid fa-plus" id="increase-volume"></i>
                            <br>
                            <div class="volume-bar" id="volume-bar" style="padding-top: 20px;">
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                            </div>
                        </div>
                        <i class="fa-solid fa-minus" id="decrease-volume"></i>
                        <br>
                        <i class="fa-solid fa-volume-mute" id="level"></i>
                    </div>
                </div>
            </div>

    </div>

    </section>

    </div>
@endsection
