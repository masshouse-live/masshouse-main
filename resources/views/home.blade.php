@extends('layouts.app')
@section('title', 'Home of Amazing Experiences')
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
    @php
    use Carbon\Carbon;

    // Define special holiday dates
    $currentYear = Carbon::now()->format('Y');
    $christmas = Carbon::parse("$currentYear-12-25");
    $newYearsEve = Carbon::parse("$currentYear-12-31");

    // Get current date and time
    $today = Carbon::now(); // Use now() instead of today()
    $event_date = Carbon::parse($coming_event->date_time ?? Carbon::now());

    $diffInDays = $event_date->diffInDays($today);
    $diffInWeeks = ceil($diffInDays / 7); // Get the number of weeks
    $dayOfWeek = $event_date->format('l'); // Get the day of the week e.g. 'Friday'
    $eventMonthName = $event_date->format('F'); // Get event month name (e.g., "October")
    $eventMonth = $event_date->format('n'); // Get event month as number (1-12)
    $eventYear = $event_date->format('Y'); // Get the event year
    $currentMonth = $today->format('n'); // Get current month as number (1-12)

    // Determine the heading text
    if ($event_date->isSameDay($christmas)) {
        $heading = 'CHRISTMAS';
    } elseif ($event_date->isSameDay($newYearsEve)) {
        $heading = 'NEW YEAR\'S EVE';
    } elseif ($event_date->isToday()) { // Use isToday() method for clarity
        $heading = 'TODAY';
    } elseif ($diffInDays === 1) {
        $heading = 'TOMORROW';
    } elseif ($diffInDays <= 7) {
        $heading = 'THIS ' . strtoupper($dayOfWeek);
    } elseif ($diffInDays <= 14) {
        $heading = 'NEXT ' . strtoupper($dayOfWeek);
    } elseif ($diffInWeeks <= 4 && $eventMonth === $currentMonth) {
        $heading = 'IN ' . $diffInWeeks . ' WEEKS'; // More than 2 weeks but same month
    } elseif (
        $eventMonth === $currentMonth + 1 ||
        ($currentMonth === 12 && $eventMonth === 1 && $eventYear === $currentYear + 1)
    ) {
        $heading = 'NEXT MONTH';
    } elseif ($eventYear > $currentYear) {
        $heading = 'ON ' . strtoupper($eventMonthName) . ' ' . $eventYear;
    } else {
        $heading = 'THIS ' . strtoupper($eventMonthName);
    }
@endphp


    <section class="next-event">
        <h5>{{ $heading }} {{$coming_event->date_time }}</h5>
        @if ($coming_event && $coming_event->date_time)
            <h4>{{ $coming_event->date_time->format('d M') ?? '' }}</h4>
        @endif

        <div class="words">
            <div class="words-slide">
                <p>{{ $coming_event->title ?? '' }}</p>
            </div>
            <div class="words-slide">
                <p>{{ $coming_event->title ?? '' }}</p>
            </div>
            <div class="words-slide">
                <p>{{ $coming_event->title ?? '' }}</p>
            </div>
        </div>

        <h2>{{ $coming_event->subtitle ?? '' }}</h2>
    </section>


    <section class="shop-now" style="border-bottom: 1px solid #fff">
        <div class="row shn-wrapper">
            <div class="shn-left col-lg-8 col-md-6 col-sm-12">
                <div class="button">
                    <a href="{{$coming_event->tickets_link??""}}" class="button1">GET TICKETS &nbsp;
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
                    <a href="{{route('tickets')}}" style="color:#ffff;font-family: 'Arian LT Demi', sans-serif">VIP TABLES</span>
                    <a href="{{route('tickets')}}" style="color:#ffff;font-family: 'Arian LT Demi', sans-serif">BOOK NOW</span>
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
    @include('partials.music-player', ['playlist' => $playlist])
@endsection
