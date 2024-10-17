@extends('layouts.app')
@section('title', 'Events & Tickets')
@section('content')
    <section class="event-ticket">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($coming_events as $coming_event)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="ticket-landing">
                            <img src="{{ asset($coming_event->banner) }}" alt="image">
                            <div class="ticket-name">
                                <h2>{{ $coming_event->title }}</h2>
                                <h4>{{ $coming_event->subtitle }}</h4>
                            </div>
                        </div>
                        <div class="button text-center">
                            <a href="{{ $coming_event->tickets_link }}" class="button1"><span style="margin-left: 50px;">BUY
                                    NOW</span>
                                <svg style="margin-bottom: 5px; margin-right: 50px;" xmlns="http://www.w3.org/2000/svg"
                                    width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                </svg>
                            </a>
                        </div>

                        <div class="ticket-details">
                            <span>{{ $coming_event->date_time->format('d M') }} <br> FROM
                                {{ $coming_event->date_time->format('Hi') }}HRS</span>
                        </div>
                    </div>
                @endforeach

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
    <!--more-info section-->
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


    <!--book-table section-->
    <form class="book-table" style="position: relative; top: 0; left: 0; right: 0; bottom: 0; margin: auto;" method="POST"
        action="{{ route('reserve_table') }}" id="reservationForm">
        @csrf
        <h2>RESERVE A TABLE</h2>
        <h4>RESERVATION REQUEST +254712 345 678 OR FILL OUT THE ORDER FORM</h4>
        <div class="success-message"
            style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 9999; display: none; max-width: 400px; width: 100%;">
            <div class="alert alert-success" role="alert">
                <p class="alert-text">Table reserved successfully</p>
            </div>
        </div>

        <div class="row bt-wrapper">

            <div class="bt-outline col-lg-4 col-md-6 col-sm-12">
                <input type="text" id="yourname" class="form-control grey" placeholder="YOUR NAME*" autocomplete="off"
                    required="required" name="customer_name">
            </div>
            <div class="bt-outline col-lg-4 col-md-6 col-sm-12">
                <input type="email" id="email" class="form-control grey" placeholder="EMAIL ADDRESS*"
                    autocomplete="off" required="required" name="customer_email">
            </div>
            <div class="bt-outline col-lg-4 col-md-6 col-sm-12">
                <input type="tel" id="phone" class="form-control grey" placeholder="PHONE NUMBER*"
                    autocomplete="off" required="required" name="customer_phone">
            </div>
            <div class="bt-outline col-lg-4 col-md-6 col-sm-12">
                <input type="tel" id="phone" class="form-control grey" placeholder="CUSTOMER ADDRESS*"
                    autocomplete="off" required="required" name="customer_address">
            </div>

            <div class="bt-outline col-lg-4 col-md-6 col-sm-12">
                <select class='form-select' required name="table_id" id="table" style="color:white">
                    <option disabled selected>SELECT TABLE</option>
                    @foreach ($tables as $table)
                        <option value="{{ $table->id }}">{{ $table->number_seats }} seater table</option>
                    @endforeach
                </select>
            </div>
            <div class="bt-outline col-lg-4 col-md-6 col-sm-12">
                <input type="date" name="date" id="reservation-date" required class="form-control"
                    style="color-scheme: dark;" disabled>
            </div>

            <div class="bt-outline col-lg-4 col-md-6 col-sm-12">
                <select class='form-select' name="from_time" id="from-time" required disabled>
                    <option>FROM TIME</option>
                </select>
            </div>

            <div class="bt-outline col-lg-4 col-md-6 col-sm-12">
                <select class='form-select' name="to_time" id="to-time" required disabled>
                    <option>TO TIME</option>
                </select>
            </div>
        </div>

        <br>
        <div class="button text-center">
            <button class="button1"><span style="margin-left: 50px;">BOOK TABLE</span>
                <svg style="margin-bottom: 5px; margin-right: 50px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                    height="1.5em" viewBox="0 0 256 256">
                    <path fill="currentColor"
                        d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                </svg>
            </button>
        </div>
        <br><br>
        <div class="row lower-wrapper">
            <div class="lw-left col-lg-4 col-md-6 col-sm-12">
                <ul class="list-unstyled list-inline">
                    <li class="list-inline-item mx-1"><i class="fa-brands fa-facebook-f"></i></li>
                    <li class="list-inline-item mx-1"><i class="fa-brands fa-x-twitter"></i></li>
                    <li class="list-inline-item mx-1"><i class="fa-brands fa-instagram"></i></li>
                    <li class="list-inline-item mx-1">Masshouse_live</li>

                </ul>
            </div>
            <div class="lw-center col-lg-4 col-md-6 col-sm-12">
                <p>
                    We remain open for all days. All payments are secured with options of mobile money transfer or credit
                    card. NO charges will be applied for online booking. Payment once made are non-refundable
                </p>
            </div>
            <div class="lw-right col-lg-4 col-md-6 col-sm-12">
                <span>www.masshouse.live</span>
            </div>
        </div>

        <style>
            .border-danger {
                border: 2px solid red !important;
            }
        </style>
    </form>
    @include('partials.partners', ['color' => 'black', 'partners' => $sponsors])
    <script>
        // legth less than 5
        const padTime = (time_) => time_.length < 5 ? `0${time_}` : time_;
        document.getElementById('table').addEventListener('change', function() {
            // Enable date picker after table selection
            document.getElementById('reservation-date').disabled = false;
        });


        document.getElementById('reservation-date').addEventListener('change', function() {
            const tableId = document.getElementById('table').value;
            const selectedDate = this.value;

            // Fetch available times
            fetch(`/table-available-times/${tableId}?date=${selectedDate}`)
                .then(response => response.json())
                .then(data => {
                    const fromTimeSelect = document.getElementById('from-time');
                    const toTimeSelect = document.getElementById('to-time');

                    // Enable time selectors
                    fromTimeSelect.disabled = false;
                    toTimeSelect.disabled = true; // "To" will be enabled after "From" is selected

                    // Clear current options
                    fromTimeSelect.innerHTML = '<option>FROM TIME</option>';
                    toTimeSelect.innerHTML = '<option>TO TIME</option>';

                    // Populate "From" time options, disabling unavailable hours
                    for (let hour = 0; hour < 24; hour++) {
                        const option = document.createElement('option');
                        option.value = padTime(`${hour}:00`);
                        option.text = padTime(`${hour}:00`);
                        option.disabled = !data.find(slot => slot.time === hour && slot.available);
                        fromTimeSelect.appendChild(option);
                    }
                });
        });

        document.getElementById('from-time').addEventListener('change', function() {
            const selectedTime = parseInt(this.value);
            const toTimeSelect = document.getElementById('to-time');
            const selectedDate = document.getElementById('reservation-date').value;
            const tableId = document.getElementById('table').value;

            // Enable "To" time selector
            toTimeSelect.disabled = false;

            // Fetch available times again to repopulate "To" times
            fetch(`/table-available-times/${tableId}?date=${selectedDate}`)
                .then(response => response.json())
                .then(data => {
                    toTimeSelect.innerHTML = '<option>TO TIME</option>'; // Clear previous options

                    let disableFollowingTimes = false; // Flag to track when to start disabling times

                    for (let hour = 1; hour < 24; hour++) {
                        const option = document.createElement('option');
                        option.value = padTime(`${hour-1}:59`); // Value for "To" dropdown
                        option.text = (`${hour}:00`); // Display text for "To" dropdown

                        // Find if the current hour is available in the data
                        const isAvailable = data.find(slot => slot.time === hour && slot.available);

                        // Disable options:
                        // - Earlier than the selected "From" time
                        // - After the first unavailable time or if it's unavailable
                        if (hour <= selectedTime || disableFollowingTimes || !isAvailable) {
                            option.disabled = true;
                            if (!isAvailable && hour > selectedTime) {
                                disableFollowingTimes =
                                    true; // Start disabling subsequent times after the first unavailable time
                            }
                        }
                        toTimeSelect.appendChild(option);
                    }

                    // Add an option for 00:00 (midnight) if needed
                    const optionMidnight = document.createElement('option');
                    optionMidnight.value = `23:59`;
                    optionMidnight.text = `00:00`;
                    optionMidnight.disabled = disableFollowingTimes || !data.find(slot => slot.time === 0 &&
                        slot.available);
                    toTimeSelect.appendChild(optionMidnight);
                });

        });
    </script>
    <script>
        // Handle form submission
        document.getElementById('reservationForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Validate required fields
            let valid = true;
            const inputs = this.querySelectorAll('.form-control, .form-select');

            inputs.forEach(input => {
                if (!input.checkValidity()) {
                    valid = false;
                    input.classList.add('border-danger'); // Add red border for invalid inputs
                } else {
                    input.classList.remove('border-danger'); // Remove red border if valid
                }
            });

            if (!valid) {
                alert("Please fill in all required fields correctly.");
                return; // Stop the submission if invalid
            }

            // Prepare form data for submission
            const formData = new FormData(this);

            // Send the data using Fetch API
            fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json(); // Parse JSON response
                })
                .then(data => {
                    // Handle success
                    document.querySelector('.success-message').style.display = 'block';

                    // display none after 5 seconds
                    setTimeout(function() {
                        document.querySelector('.success-message').style.display = 'none';
                    }, 5000);

                    this.reset();
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                    alert("There was an error processing your request. Please try again.");
                });

            // Prevent clicking disabled fields
            document.querySelectorAll('.form-control, .form-select').forEach(element => {
                element.addEventListener('click', function() {
                    if (this.disabled) {
                        this.classList.add(
                            'border-danger'); // Add red border if user clicks a disabled field
                    }
                });
            });
        });
    </script>

@endsection
