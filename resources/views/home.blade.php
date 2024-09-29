@extends('layouts.app')

@section('content')
    <!--landing-page section-->
    <section class="landing-page">
        <!-- <div class="lp-wrapper">
                                                                      <h1>HOME <br> OF <br> AMAZING <br> EXPERIENCE</h1>
                                                                    </div> -->
        <div class="maincontainer">
            <div class="thecard">
                <div class="thefront">
                    <h1>
                        HOME <br />
                        OF
                    </h1>
                </div>

                <div class="theback">
                    <h1>
                        AMAZING <br />
                        EXPERIENCES
                    </h1>
                </div>
            </div>
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
        </script>
        <!--infinite loop script-->
    </section>

    <section class="shop-now" style="border-bottom: 1px solid #fff">
        <div class="row shn-wrapper">
            <div class="shn-left col-lg-8 col-md-6 col-sm-12">
                <div class="button">
                    <a href="merch.html" class="button1">GET TICKETS &nbsp;
                        <svg style="margin-left: 100px; margin-bottom: 5px" xmlns="http://www.w3.org/2000/svg"
                            width="1.5em" height="1.5em" viewBox="0 0 256 256">
                            <path fill="currentColor"
                                d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="shn-right col-lg-4 col-md-6 col-sm-12">
                <div class="d-flex justify-content-between">
                    <span style="font-family: 'Arian LT Demi', sans-serif">VIP TABLES</span>
                    <span style="font-family: 'Arian LT Demi', sans-serif">BOOK NOW</span>
                </div>
            </div>
        </div>
    </section>
    <!--upcoming-events section-->
    @include('partials.events', ['events' => $events])
    <!--partners-n-sponsors section-->
    @include('partials.partners', ['color' => 'white', 'partners' => $sponsors])

    <!--merchandise-alert section-->
    <section class="merchandise-alert">
        <div class="sub-heading">
            <h3>MERCHANDISE ALERT</h3>
        </div>
        <div class="swiper-filter">
            <ul>
                <li><a href="#">ALL</a></li>
                <li><a href="#" class="active">ACCESSORIES</a></li>
                <li><a href="#">EXCLUSIVE</a></li>
            </ul>
        </div>

        <!-- Swiper -->
        @include('partials.merch-categories', ['categories' => $merchandise_categories])
        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script src="js/upcomingevents-swiper.js"></script>
    </section>

    <!--music-player section-->
    <section class="music-player">
        <div class="row mp-wrapper">
            <div class="mp-left one col-lg-6 col-md-6 col-sm-12">
                <h2>
                    OFFICIAL <br />
                    PLAYLIST <br />
                    2025
                </h2>

                <p>
                    Experience the best of Masshouse Live®, Wherever you are, <br />
                    Whenever you can, in the world. Whether you're looking for <br />
                    illusive track IDs from your time on our dancefloor, or simply
                    <br />
                    reflecting on a memory for a re-connect, Tune in below to <br />
                    <span style="font-family: 'Mundial Regular', sans serif; color: #fff">Experience Amazing™</span>
                </p>

                <ul class="list-unstyled list-inline">
                    <li class="list-inline-item mx-3">SPOTIFY</li>
                    <li class="list-inline-item mx-3">SOUNDCLOUD</li>
                    <li class="list-inline-item mx-3">YOUTUBE</li>
                    <li class="list-inline-item mx-3">APPLEMUSIC</li>
                </ul>
            </div>
            <div class="mp-right two col-lg-6 col-md-6 col-sm-12">
                <div class="music-box text-center">
                    <div class="mpr-wrapper d-flex">
                        <div class="mpr-left col-lg-10 col-md-6 col-sm-12">
                            <img src="images/johnie walker.png" alt="image" />
                            <p>
                                JOHNIE WALKER <br />
                                THROW BACK THURSDAYS
                            </p>
                            <!-- <br> -->
                            <h2>DJ KNEE-BREAKER</h2>
                            <span>LIVE AT THE MASSHOUSE LIVE</span>
                            <br /><br />
                            <hr style="border: 2px soild #fff !important" />
                            <br />
                            <ul class="music-icons list-unstyled list-inline">
                                <li class="list-inline-item mx-3">
                                    <i class="fa-solid fa-backward-step"></i>
                                </li>
                                <li class="list-inline-item mx-3">
                                    <i class="fa-solid fa-play"></i>
                                </li>
                                <li class="list-inline-item mx-3">
                                    <i class="fa-solid fa-stop"></i>
                                </li>
                                <li class="list-inline-item mx-3">
                                    <i class="fa-solid fa-forward-step"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="mpr-right col-lg-2 col-md-6 col-sm-12">
                            <div class="music-icons">
                                <i class="fa-solid fa-share-nodes"></i>
                                <br />
                                <i class="fa-solid fa-list"></i>
                                <br />
                                <i class="fa-solid fa-minus"></i>
                                <br />
                                <div class="volume-bar">
                                    <i class="fa-solid fa-minus" style="color: #777"></i>
                                    <i class="fa-solid fa-minus" style="color: #777"></i>
                                    <i class="fa-solid fa-minus" style="color: #777"></i>
                                    <i class="fa-solid fa-minus" style="color: #777"></i>
                                    <i class="fa-solid fa-minus" style="color: #777"></i>
                                    <i class="fa-solid fa-minus" style="color: #777"></i>
                                    <i class="fa-solid fa-minus" style="color: #777"></i>
                                    <i class="fa-solid fa-minus" style="color: #777"></i>
                                    <i class="fa-solid fa-minus" style="color: #777"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                </div>
                                <i class="fa-solid fa-plus"></i>
                                <br />
                                <i class="fa-solid fa-volume-high"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
