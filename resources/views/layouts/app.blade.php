<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>MassHouse | @yield('title')</title>
    <!--icon-->
    <link rel="icon" href="{{ asset('images/logo-white.png') }}" type="image/x-icon" />

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <!--animate-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!--iconify cdn-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.min.js"
        integrity="sha512-lYMiwcB608+RcqJmP93CMe7b4i9G9QK1RbixsNu4PzMRJMsqr/bUrkXUuFzCNsRUo3IXNUr5hz98lINURv5CNA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--font awesome links-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css"
        integrity="sha512-d0olNN35C6VLiulAobxYHZiXJmq+vl+BGIgAxQtD5+kqudro/xNMvv2yIHAciGHpExsIbKX3iLg+0B6d0k4+ZA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- font awesome offline links -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}" />

    <!------ css file ------------->
    <link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}" />

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!--sticky navbar-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="{{ asset('js/sticky-navbar.js') }}"></script>

    <style>
        body {
            background-color: #000;
        }
    </style>

</head>

<body class="dark">
    @php
        // fetch site settings
        $settings = App\Models\SiteSttings::first();
    @endphp
    <!--transparent navbar-->
    <nav class="navbar sticky home main" id="transparentNavbar">
        <div class="nav-wrapper">
            <div class="nav1">
                <ul>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('news') }}">Media</a></li>
                    <li><a href="{{ route('tickets') }}">Tickets</a></li>
                </ul>
            </div>
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('images/logo-white.png') }}" />
                </a>
            </div>
            <div class="nav2">
                <ul>
                    <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                    <li><a href="{{ route('shop.shop') }}">Shop</a></li>
                    <li><a href="{{ route('cart.checkout') }}">Cart <i class="fa-solid fa-cart-shopping"></i> </a>
                    </li>
                    <li><a href="{{ route('contact') }}" class="nav-button">Contact Us</a></li>
                </ul>
            </div>
            <a class="burger-nav"></a>
            <input type="radio" name="slider" id="close-btn" />
        </div>
    </nav>
    <!--alternative navbar-->
    <nav class="navbar sticky alternative-navbar main" id="alternativeNavbar">
        <div class="nav-wrapper">
            <a class="burger-nav"></a>

            <div class="nav1">
                <ul>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('news') }}">Media</a></li>
                    <li><a href="{{ route('tickets') }}">Tickets</a></li>
                </ul>
            </div>
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('images/logo-white.png') }}" />
                </a>
            </div>
            <div class="nav2">
                <ul>
                    <li><a href="{{ route('shop.shop') }}">Shop</a></li>
                    <li><a href="{{ route('cart.checkout') }}">Cart <i class="fa-solid fa-cart-shopping"></i>
                            <sup>0</sup>
                        </a>
                    </li>
                    <li><a href="{{ route('contact') }}" class="nav-button">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="{{ asset('js/alternative-navbar.js') }}"></script>
    <!--mobile transparent navbar -->
    <nav class="navbar sticky mobile home" id="transparentNavbar">
        <div class="nav-wrapper">
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('images/logo-white.png') }}" alt="logo" />
                </a>
            </div>
            <div class="nav-list">
                <ul>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('news') }}">Media</a></li>
                    <li><a href="{{ route('tickets') }}">Tickets</a></li>

                    <li><a href="{{ route('shop.shop') }}">Shop</a></li>
                    <li><a href="{{ route('cart.checkout') }}">Cart <i class="fa-solid fa-cart-shopping"></i>
                            <sup>0</sup>
                        </a>
                    </li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <!-- <li><a href="/"><img src="images/logo-white.png" alt="logo"></a></li> -->
                </ul>
            </div>
            <a class="burger-nav"></a>
        </div>
    </nav>
    <!--mobile alternative navbar-->
    <nav class="navbar sticky mobile alternative-navbar" id="alternativeNavbar">
        <div class="nav-wrapper">
            <div class="logo">
                <a href="/"><img src="{{ asset('images/logo-white.png') }}" alt="logo" /></a>
            </div>
            <div class="nav-list">
                <ul>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('news') }}">Media</a></li>
                    <li><a href="{{ route('tickets') }}">Tickets</a></li>

                    <li><a href="{{ route('shop.shop') }}">Shop</a></li>
                    <li><a href="{{ route('cart.checkout') }}">Cart <i class="fa-solid fa-cart-shopping"></i>
                            <sup>0</sup>
                        </a>
                    </li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <!-- <li><a href="/"><img src="images/logo-white.png" alt="logo"></a></li> -->
                </ul>
            </div>
            <a class="burger-nav"></a>
        </div>
    </nav>

    <script src="{{ asset('js/mobile-alternative-navbar.js') }}"></script>
    @yield('content')
    <script src="{{ asset('js/upcomingevents-swiper.js') }}"></script>
    <script src="{{ asset('js/player.js') }}"></script>
    <footer>
        <div>
            <div class="row foot-wrapper">
                <div class="col-lg-3 col-md-6 col-sm-12 foot one">
                    <h5 class="mb-4 font-weight-bold">REGISTER TO HEAR FROM US</h5>
                    <p>
                        Sign up to hear about the latest news, events and offers at
                        MASSHOUSE.
                    </p>
                    <form method="post" action="{{ route('subscribe_newsletter') }}">
                        @csrf
                        <div class="form-outline f-outline2 d-flex justify-content-between">
                            <input type="email" id="subscription_email" name="email"
                                class="form-control f-input2" placeholder="Email*" required="required"
                                name="subscription_email" />
                        </div>
                        <br />

                        <div class="form-check agreement">
                            <input required class="form-check-input rounded-0" type="checkbox" id="agreement"
                                name="agreement" />
                            <label class="form-check-label" for="agreement">
                                I have read and agree to MASSHOUSE’s Privacy Policy & I would
                                like to receive email updates and news from MASSHOUSE
                            </label>
                        </div>

                        <br />

                        <div>
                            <input class="btn btn-success sign-up" type="submit" value="SUBMIT" aria-label="Search"
                                name="sign_up" />
                        </div>
                    </form>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 foot two">
                    <h5 class="font-weight-bold">MASSHOUSE</h5>
                    <hr
                        style="
                  border: none !important;
                  border-top: 1px solid #fff !important;
                  background-color: #fff;
                " />

                    <ul>
                        <li>
                            <a href="{{ route('about') }}" class="footer-link text-white"
                                style="text-decoration: none">
                                >&nbsp;MHL</a>
                        </li>
                        <li>
                            <a href="{{ route('tickets') }}" class="footer-link text-white"
                                style="text-decoration: none">
                                >&nbsp;Ticketing</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="footer-link text-white"
                                style="text-decoration: none">
                                >&nbsp;About Us</a>
                        </li>
                        <li>
                            <a href="{{ route('news') }}" class="footer-link text-white"
                                style="text-decoration: none">
                                >&nbsp;News & Blogs</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="footer-link text-white"
                                style="text-decoration: none">
                                >&nbsp;All about MHL</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 foot three">
                    <h5 class="font-weight-bold">VENUES</h5>
                    <hr
                        style="
                  border: none !important;
                  border-top: 1px solid #fff !important;
                  background-color: #fff;
                " />

                    <ul>
                        <li>
                            <a href="{{ route('about') }}#venues" class="footer-link text-white"
                                style="text-decoration: none">
                                >&nbsp;Nairobi</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}#venues" class="footer-link text-white"
                                style="text-decoration: none">
                                >&nbsp;Kisumu</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}#venues" class="footer-link text-white"
                                style="text-decoration: none">
                                >&nbsp;Naivasha</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}#venues" class="footer-link text-white"
                                style="text-decoration: none">
                                >&nbsp;Mombasa</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 foot four">
                    <h5 class="font-weight-bold">CONNECT WITH US</h5>
                    <hr
                        style="
                  border: none !important;
                  border-top: 1px solid #fff !important;
                  background-color: #fff;
                " />
                    <ul>
                        <li>
                            <a href="{{ $settings->facebook ?? '' }}" target="_blank"><i
                                    class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="{{ $settings->twitter ?? '' }}" target="_blank"><i
                                    class="fa-brands fa-x-twitter"></i></a>
                        </li>
                        <li>
                            <a href="{{ $settings->instagram ?? '' }}" target="_blank"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="{{ $settings->tiktok ?? '' }}" target="_blank"><i
                                    class="fa-brands fa-tiktok"></i></a>
                        </li>
                        <li>
                            <a href="{{ $settings->youtube ?? '' }}" target="_blank"><i
                                    class="fa-brands fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="{{ $settings->threads ?? '' }}" target="_blank"><i
                                    class="fa-brands fa-threads"></i></a>
                        </li>
                        <li>
                            <a href="{{ $settings->snapchat ?? '' }}" target="_blank"><i
                                    class="fa-brands fa-snapchat"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="mb-2" />
        <div class="row row-foot-bot align-items-center">
            <div class="foot-bot col-lg-6 col-md-6 col-sm-12 left">

                <ul class="list-unstyled list-inline">
                    <li class="list-inline-item mx-1">
                        <a href="{{ route('terms-and-conditions') }}" class="">Terms & Conditions</a>
                    </li>
                    <li class="list-inline-item mx-1">
                        <a href="{{ route('contact') }}" class="">Report an Incident</a>
                    </li>
                </ul>

                <p>&copy MASSHOUSE LIVE 2024. All Rights Reserved</p>

            </div>

            <div class="foot-bot col-lg-6 col-md-6 col-sm-12 right">
                <div>
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item mx-1">
                            <a href="{{ route('privacy-policy') }}" class="">Privacy Policy</a>
                        </li>
                        <li class="list-inline-item mx-1">
                            <a href="{{ route('cookies-policy') }}" class="">Cookie Policy</a>
                        </li>
                    </ul>

                    <p style="letter-spacing: 2px; font-family: 'Arian LT Demi', sans-serif;">&nbsp;Powered by : <a
                            href="https://drenla.com"
                            style="text-decoration: none; color:#ccc; font-size: 22px;"><strong>DRENLA</strong>
                        </a></p><a href="https://drenla.com"
                        style="text-decoration: none; color:#ccc; font-size: 22px;">
                    </a>
                </div><a href="https://drenla.com" style="text-decoration: none; color:#ccc; font-size: 22px;">
                </a>
            </div><a href="https://drenla.com" style="text-decoration: none; color:#ccc; font-size: 22px;">

            </a>
        </div>

    </footer>
    <style>
        .list-inline-item a {
            color: #ffff;
        }
    </style>
</body>
<script src="{{ asset('js/menu.js') }}"></script>

</html>

</html>
