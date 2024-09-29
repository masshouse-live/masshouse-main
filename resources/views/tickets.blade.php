@extends('layouts.app')

@section('content')
    <section class="event-ticket">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="ticket-landing">
                        <img src="images/events/kansoul2.jpg" alt="image">
                        <div class="ticket-name">
                            <h2>MEJJA FT MADTRAXX</h2>
                            <h4>Twenzetu Gengetone Rewind</h4>
                        </div>
                    </div>
                    <div class="button text-center">
                        <a href="" class="button1"><span style="margin-left: 50px;">BUY NOW</span>
                            <svg style="margin-bottom: 5px; margin-right: 50px;" xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>
                        </a>
                    </div>

                    <div class="ticket-details">
                        <span>18 OCT <br> FROM 2000HRS</span>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="ticket-landing">
                        <img src="images/events/khali.jpg" alt="image">
                        <div class="ticket-name">
                            <h2>MEJJA FT MADTRAXX</h2>
                            <h4>Twenzetu Gengetone Rewind</h4>
                        </div>
                    </div>
                    <div class="button text-center">
                        <a href="" class="button1"><span style="margin-left: 50px;">BUY NOW</span>
                            <svg style="margin-bottom: 5px; margin-right: 50px;" xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>
                        </a>
                    </div>

                    <div class="ticket-details">
                        <span>18 OCT <br> FROM 2000HRS</span>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="ticket-landing">
                        <img src="images/events/kansoul2.jpg" alt="image">
                        <div class="ticket-name">
                            <h2>MEJJA FT MADTRAXX</h2>
                            <h4>Twenzetu Gengetone Rewind</h4>
                        </div>
                    </div>
                    <div class="button text-center">
                        <a href="" class="button1"><span style="margin-left: 50px;">BUY NOW</span>
                            <svg style="margin-bottom: 5px; margin-right: 50px;" xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>
                        </a>
                    </div>

                    <div class="ticket-details">
                        <span>18 OCT <br> FROM 2000HRS</span>
                    </div>
                </div>


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>


    @include('partials.events', ['events' => $events])
    <section class="more-info">
        <div class="d-flex justify-content-between mi-wrapper">
            <div class="mi-left col-lg-6 col-md-6 col-sm-12">
                <ul class="list-unstyled list-inline">
                    <li class="list-inline-item mx-1"><i class="fa-brands fa-facebook-f"></i></li>
                    <li class="list-inline-item mx-1"><i class="fa-brands fa-x-twitter"></i></li>
                    <li class="list-inline-item mx-1"><i class="fa-brands fa-instagram"></i></li>
                    <li class="list-inline-item mx-1">Masshouse_live</li>

                </ul>
            </div>
            <div class="mi-right col-lg-6 col-md-6 col-sm-12">
                <span>www.masshouse.live</span>
            </div>
        </div>





    </section>
    @include('partials.partners', ['color' => 'black', 'partners' => $sponsors])
@endsection
