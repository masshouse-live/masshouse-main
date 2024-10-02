@extends('layouts.app')

@section('content')
    <section class="merch-landing">
        <!-- <img src="" alt=""> -->
    </section>

    @php
        $category = Request::get('category');
        $category = implode(' ', explode('-', $category));
    @endphp


    <!--merchandise section-->
    <section class="merchandise">
        <p style="text-transform:uppercase">HOME / SHOP / MERCHANDISE / {{ $category }}</p>
        <span>{{ $merchandise->total() }} Result{{ $merchandise->total() == 1 ? '' : 's' }}</span>
        <br>
        <br>
        <div class="row merchandise-wrapper">
            @foreach ($merchandise as $merch)
                <div class="popup" id="popup-{{ $merch->id }}">
                    <div class="overlay"></div>
                    <div class="content">
                        <div class="close-btn" onclick="togglePopup('popup-{{ $merch->id }}')">&times;</div>
                        <section class="custom-merch">

                            <div class="row cm-wrapper">
                                <div class="cm-left col-lg-6 col-md-6 col-sm-12" style="background:black">
                                    <img src="{{ asset($merch->image) }}" alt="image">
                                </div>
                                <div class="cm-right col-lg-6 col-md-6 col-sm-12">
                                    <h4>{{ $merch->name }}</h4>

                                    <div class="price">
                                        <p>KES. {{ number_format($merch->price, 2, '.', ',') }}</p>
                                        <span>Taxes Included</span>
                                    </div>
                                    <br>

                                    <!-- Size Selection with Radio Buttons -->
                                    <div class="size">
                                        <p>SIZE:</p>
                                        <div>
                                            @foreach (explode(',', $merch->sizes) as $size)
                                                <label class="size-label"
                                                    style=" display: inline-block; padding: 1px 10px 1px 10px;  border: 1px solid black; color:black">{{ $size }}

                                                    <input type="radio" style="display: none"
                                                        name="size-{{ $merch->id }}" value="{{ $size }}"
                                                        class="size-radio"
                                                        onclick="selectSize('size-input-{{ $merch->id }}', this)">
                                                    <span </span>
                                                </label>
                                            @endforeach
                                            <input type="hidden" id="size-input-{{ $merch->id }}" name="size"
                                                value="">
                                        </div>
                                    </div>
                                    <br>

                                    <!-- Color Selection with Radio Buttons -->
                                    <div class="color">
                                        <p>COLOR:</p>
                                        <div>
                                            @foreach (explode(',', $merch->colors) as $color)
                                                <label class="color-label"
                                                    style="background: {{ $color }}; display: inline-block; height: 20px; width: 40px; border: 1px solid {{ $color }};">
                                                    <input type="radio" style="display: none"
                                                        name="color-{{ $merch->id }}" value="{{ $color }}"
                                                        class="color-radio"
                                                        onclick="selectColor('color-input-{{ $merch->id }}', this)">
                                                </label>
                                            @endforeach
                                            <input type="hidden" id="color-input-{{ $merch->id }}" name="color"
                                                value="">
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row descr">
                                        <div class="col-lg-10 col-md-6 col-sm-12">
                                            {!! $merch->description !!}
                                        </div>
                                    </div>

                                    <!-- Add to Cart Button -->
                                    <div class="button">
                                        <button onclick="addToCart({{ $merch->id }})" class="button2">
                                            ADD TO CART &nbsp;
                                            <svg style="margin-left: 100px; margin-bottom: 5px;"
                                                xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                                viewBox="0 0 256 256">
                                                <path fill="currentColor"
                                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            @endforeach

            @foreach ($merchandise as $merch)
                <div onclick="togglePopup('popup-{{ $merch->id }}')"
                    class="merchandise-box col-lg-3 col-md-6 col-sm-12">
                    <div class="merch-image-wrapper">
                        <img src="{{ asset($merch->image) }}" alt="image">
                    </div>
                    <div class="merchandise-details">
                        <h5>{{ $merch->name }}</h5>
                        <h6>FROM KES {{ number_format($merch->price, 2, '.', ',') }}</h6>
                        <p>{{ $merch->sizes }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    <section class="extra-merch">
        <div class="row extram-wrapper">
            @foreach ($top_categories as $category)
                <div class="extram-box col-lg-4 col-md-6 col-sm-12">
                    <div class="extram-image-wrapper">
                        <img src="{{ asset($category->image) }}" alt="image">
                    </div>
                    <div class="extram-details">
                        <h3>{{ $category->name }}</h3>
                        <div class="button">
                            <a href="{{ route('shop.merchandise', ['category' => $category->slug]) }}"
                                class="button1">DISCOVER MORE &nbsp;
                                <svg style=" margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                    height="1.5em" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </section>
    <style>
        .size-label.selected {

            /* Highlight color for selected size */
            border: 1px solid #333 !important;

        }

        .color-label.selected {
            border: 2px solid #333 !important;
        }
    </style>

    @include('partials.partners', ['color' => 'white', 'partners' => $partners])
    <script src="{{ asset('js/modal-popup.js') }}"></script>
    <script>
        function selectSize(hiddenInputId, radio) {
            const hiddenInput = document.getElementById(hiddenInputId);
            hiddenInput.value = radio.value; // Set the hidden input value to the selected size

            // Update the style of selected size
            document.querySelectorAll(`.size-radio`).forEach(r => {
                r.parentElement.classList.remove('selected');
            });
            radio.parentElement.classList.add('selected'); // Highlight the selected size
        }

        function selectColor(hiddenInputId, radio) {
            const hiddenInput = document.getElementById(hiddenInputId);
            hiddenInput.value = radio.value; // Set the hidden input value to the selected color

            // Update the style of selected color
            document.querySelectorAll(`.color-radio`).forEach(r => {
                r.parentElement.classList.remove('selected');
            });
            radio.parentElement.classList.add('selected'); // Highlight the selected color
        }

        function addToCart(merchId) {
            // Get the hidden inputs for sizes and colors
            var size = document.getElementById('size-input-' + merchId).value;
            var color = document.getElementById('color-input-' + merchId).value;

            // Make an AJAX request to add to cart
            $.ajax({
                url: "{{ route('cart.add') }}", // Ensure this route exists
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: merchId,
                    size: size,
                    color: color
                },
                success: function(response) {
                    alert('Product added to cart successfully!');
                    // Optionally, you can update the cart UI without reloading the page
                },
                error: function(xhr) {
                    alert('Something went wrong, please try again.');
                }
            });
        }
    </script>
@endsection
