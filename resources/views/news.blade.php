@extends('layouts.app')

@section('content')
    <!--news-landing section-->
    <section class="news-landing">
        <h2>NEWS</h2>

    </section>
    @php
        $active_news = Request::get('news');
    @endphp

    <!--news-articles section-->
    <section class="news-articles">
        <div class="news-filter">
            <ul>
                <li><a href="?" class="{{ $active_news == null ? 'active' : '' }}">All</a></li>
                <li><a href="?news=interview" class="{{ $active_news == 'interview' ? 'active' : '' }}">Interview</a></li>
                <li><a href="?news=article" class="{{ $active_news == 'article' ? 'active' : '' }}">Article</a></li>
            </ul>
        </div>
        <div class="row article-wrapper">
            @foreach ($news as $blog)
                <div class="article-box one col-lg-4 col-md-6 col-sm-12">
                    <div class="img-box">
                        <img src="images/news1-ph.PNG" alt="image">
                    </div>
                    <div class="news-details">
                        <span>{{ $blog->category }}</span>
                        <h3>{{ $blog->title }}</h3>
                        <div class="button">
                            <a href="{{ route('news_detail', $blog->slug) }}" style="padding-left: 50px;"
                                class="button2">READ
                                MORE &nbsp;
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
            @endforeach

        </div>
    </section>

    <!--blogs section-->
    <section class="blogs">
        <div class="sub-heading">
            <h3>BLOGS/INSTABUZZ</h3>
        </div>
        <br>
        <div class="row blog-wrapper">
            @foreach ($blogs as $blog)
                <div class="blog-box one col-lg-4 col-md-6 col-sm-12">
                    <div class="img-box">
                        <img src="{{ asset($blog->image) }}" alt="image">
                    </div>
                    <div class="blog-details">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="date">
                                <span>{{ $blog->created_at->format('d M, Y') }}</span>
                            </div>
                            <div class="admin">
                                <span class="admin" style="text-transform: uppercase;"><i
                                        class="fa-regular fa-circle-user"></i>&nbsp;BY
                                    {{ $blog->created_by }}</span>
                            </div>
                        </div>
                        <h4>
                            {{ $blog->title }}
                        </h4>
                        <p>
                            {{ $blog->short_description }}
                        </p>
                        <div class="button">
                            <a href="{{ route('news_detail', $blog->slug) }}" style="padding-left: 50px;"
                                class="button1">READ
                                MORE &nbsp;
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
            @endforeach

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
        @include('partials.partners', ['color' => 'black', 'partners' => $sponsors, 'type' => 'news'])

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
        @include('partials.events', ['events' => $events])
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
