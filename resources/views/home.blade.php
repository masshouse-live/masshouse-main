@extends('layouts.app')

@section('content')
    <!--landing-page section-->
    <section class="landing-page">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
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
        <script src="{{ asset('js/cursor-trail.js') }}"></script>

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

    </section>

    <!--music-player section-->
    @include('partials.music-player')
@endsection
