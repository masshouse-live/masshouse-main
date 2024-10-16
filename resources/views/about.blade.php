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
        <section class="venue-click" id="venues">
            <div class="sub-heading">
                <h3>UNLIMITED ENTERTAINMENT AT OUR SELECTED VENUES</h3>
            </div>
            <br>
            <!-- Swiper -->
            <div class="swiper mySwiper case-studies">
                <div class="swiper-wrapper">
                    @foreach ($venues as $venue)
                        <div class="swiper-slide venue-box one">
                            <img src="{{ asset($venue->cover_photo) }}" alt="image">
                            <p>{{ $venue->name }}</p>
                            <div class="button">
                                <a href="#" class="button1 venues" data-venue-id="{{ $venue->id }}">CHECK OUT VENUE
                                    <svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                        height="1.5em" viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </section>
        @foreach ($venues as $venue)
            <!-- Each venue has its own venue-pictures section -->
            <section class="venue-pictures {{ $loop->iteration == 1 ? 'show' : '' }}"
                id="venue-pictures-{{ $venue->id }}">
                <div class="row vp-wrapper">
                    <div class="vp-left col-lg-5 col-md-6 col-sm-12">
                        <div class="vp-box1">
                            <img src="{{ asset($venue->images[0]->image) }}" alt="image">
                        </div>
                        <div class="vp-box2">
                            <img src="{{ asset($venue->images[1]->image) }}" alt="image">
                        </div>
                    </div>
                    <div class="vp-right col-lg-7 col-md-6 col-sm-12">
                        <div class="vp-box3 d-flex">
                            <div class="box1 col-lg-7 col-md-6 col-sm-12">
                                <img src="{{ asset($venue->images[2]->image) }}" alt="image">
                            </div>
                            <div class="box2 col-lg-5 col-md-6 col-sm-12">
                                <img src="{{ asset($venue->images[3]->image) }}" alt="image">
                            </div>
                        </div>
                        <div class="vp-box4">
                            <img src="{{ asset($venue->images[4]->image) }}" alt="image">
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
        <!--team section-->


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
                        <a href="/contact?type=partnership" style="padding-left: 30px;" class="button1">PARTNER WITH US
                            &nbsp;
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
                        <a href="/contact?type=corporate" style="padding-left: 30px;" class="button1">BE PART OF US
                            &nbsp;
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
                        <a href="/contact?type=expert" style="padding-left: 30px;" class="button1">LINK WITH AN EXPERT
                            &nbsp;
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
    @include('partials.events', ['events' => $events])
    @include('partials.partners', ['color' => 'black', 'partners' => $sponsors, 'type' => 'about'])
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.venues');

            buttons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    // Get the venue ID from the data attribute
                    const venueId = this.getAttribute('data-venue-id');

                    // Hide all venue-pictures sections
                    document.querySelectorAll('.venue-pictures').forEach(section => {
                        section.classList.remove('show');
                        section.style.display = 'none';
                    });

                    // Show the selected venue's pictures
                    const venuePictures = document.querySelector(`#venue-pictures-${venueId}`);
                    venuePictures.style.display = 'block';
                    setTimeout(() => {
                        venuePictures.classList.add('show');
                    }, 10);
                });
            });
        });
    </script>
    <style>
        .venue-pictures {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .venue-pictures.show {
            display: block;
            opacity: 1;
        }
    </style>
@endsection
