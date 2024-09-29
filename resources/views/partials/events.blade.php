<section class="upcoming-events" id="upcoming_events">
    <div class="sub-heading">
        <h3>UPCOMING EVENTS</h3>
    </div>
    <div class="swiper-filter">
        @php
            // get active filter
            $active_filter = request()->get('events');
        @endphp
        <ul>
            <li><a href="?events=daytime#upcoming_events"
                    class="{{ $active_filter == 'daytime' ? 'active' : '' }}">DAYTIME</a></li>
            <li><a href="?events=nightlife#upcoming_events"
                    class="{{ $active_filter == 'nightlife' ? 'active' : '' }}">NIGHTLIFE</a></li>
            <li><a href="?events=exclusive#upcoming_events"
                    class="{{ $active_filter == 'exclusive' ? 'active' : '' }}">EXCLUSIVE</a></li>
        </ul>
    </div>

    <!-- Swiper -->
    <div class="swiper mySwiper case-studies">
        <div class="swiper-wrapper">
            @foreach ($events as $event)
                <div class="swiper-slide work-box ">
                    <img class="logo-white" src="images/logo-white-removebg-preview.png" alt="logo" />
                    <img class="logo-black" src="images/logo-black-removebg-preview.png" alt="logo" />
                    <h6>
                        {{ $event->date_time->format('M d Y') }}
                    </h6>
                    <p>{{ $event->date_time->format('Hi') }} HRS</p>
                    <p>{{ $event->venue->name }}</p>
                    <br /><br />
                    <h6>{{ $event->date_time->format('l') }}</h6>
                    <h2>{{ $event->date_time->format('d M') }}</h2>
                    <!-- <br> -->
                    <h6>{{ $event->title }}</h6>
                    <p>{{ $event->subtitle }}</p>
                    <br />
                    <div class="button">
                        <a href="{{ $event->tickets_link }}" target="_blank" class="button1">GET TICKETS &nbsp;
                            <svg style="margin-left: 100px; margin-bottom: 5px" xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>
                        </a>
                    </div>
                    <br />

                    <div class="uc-cta d-flex justify-content-between">
                        <div>
                            <h6>VIP TABLES</h6>
                        </div>
                        <div>
                            <h6>BOOK NOW</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <!-- <div class="swiper-pagination"></div> -->
    </div>

    <!-- Swiper JS -->

    <!-- Initialize Swiper -->
    <script src="js/upcomingevents-swiper.js"></script>
</section>
