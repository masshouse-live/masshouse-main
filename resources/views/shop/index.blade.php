@extends('layouts.app')

@section('content')
    <!--shop-landing section-->
    <section class="shop-landing" style="background-image: url('{{ asset($higligted_category->image) }}') !important; ">
        >
        <h2>{{ $higligted_category->name }}</h2>

        <div class="words">
            <div class="words-slide">
                <p class="white">SIGNED MERCHANDISE
            </div>
            <div class="words-slide">
                <p class="white">SIGNED MERCHANDISE
            </div>
            <div class="words-slide">
                <p class="white">SIGNED MERCHANDISE
            </div>
        </div>


        <script>
            var copy = document.querySelector(".words-slide").cloneNode(true);
            document.querySelector(".words").appendChild(copy);
        </script> <!--infinite loop script-->

        <div class="words2">
            <div class="words-slide2">
                <p class="black">EXCLUSIVE MERCHANDISE</p>
            </div>
            <div class="words-slide2">
                <p class="black">EXCLUSIVE MERCHANDISE</p>
            </div>
            <div class="words-slide2">
                <p class="black">EXCLUSIVE MERCHANDISE</p>
            </div>
        </div>
        <div class="hd">
            <h3>FOR YOU!</h3>
        </div>

    </section>

    <section class="shop-now">
        <div class="row shn-wrapper">
            <div class="shn-left col-lg-8 col-md-6 col-sm-12">
                <div class="button">
                    <a href="{{ route('shop.merchandise', ['category' => $higligted_category->slug]) }}"
                        class="button1">SHOP NOW &nbsp;
                        <svg style="margin-left: 100px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                            width="1.5em" height="1.5em" viewBox="0 0 256 256">
                            <path fill="currentColor"
                                d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="shn-right col-lg-4 col-md-6 col-sm-12">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('shop.merchandise') }}" style="color:white">GO TO CATALOGUE</a>
                    <a style="color:white" href="{{ route('cart.checkout') }}">CHECK OUT</a>
                </div>
            </div>
        </div>
    </section>

    <!--alpha-merchandise section-->
    <section class="merchandise-alert alpha">
        <div class="sub-heading">
            <h3>ALPHA MERCHANDISE</h3>
        </div>
        <br>

        <div class="row alpha-wrapper">
            @foreach ($alpha_merch as $category)
                <div class="merch-box col-lg-3 col-md-6 col-sm-12">
                    <img src="{{ asset($category->image) }}" alt="image">
                    <div class="merch-details">
                        <span>{{ $category->name }}</span>

                        <div class="button">
                            <a href="{{ route('shop.merchandise', ['category' => $category->slug]) }}" class="button1a">SHOP
                                NOW &nbsp;
                                <svg style="margin-left: 120px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                    width="1.5em" height="1.5em" viewBox="0 0 256 256">
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
    <section class="merchandise-alert madeformh">
        <div class="sub-heading">
            <h3>MADE FOR MASSHOUSE</h3>
        </div>
        <br>

        <div class="row madeformh-wrapper">
            @foreach ($categories as $category)
                <div class="merch-box col-lg-3 col-md-6 col-sm-12">
                    <img src="{{ asset($category->image) }}" alt="image">
                    <p class="merch-name">{{ $category->subtitle }} <span>
                            {{ $category->name }}
                        </span></p>
                    <div class="merch-details">
                        @if (\Str::length($category->tags) > 0)
                            <p>{{ $category->tags }}</p>
                        @else
                            <br />
                            <br />
                        @endif
                        <img style="width: auto; height: auto;" src="images/shop/dashes-small.PNG" alt="">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="button">
                                <a href="{{ route('shop.merchandise', ['category' => $category->slug]) }}"
                                    class="button2">SHOP NOW
                                    &nbsp;
                                    <svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                        height="1.5em" viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                    </svg>

                                </a>
                            </div>
                            <div><br>
                                <p style="font-size: 12px;">KES <br>
                                    {{ number_format($category->price_from, 2, '.', ',') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    <!--partners-n-sponsors section-->
    @include('partials.partners', ['color' => 'white', 'partners' => $partners])
    <!--music-player section-->
    @include('partials.music-player')
@endsection
