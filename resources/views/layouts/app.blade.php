<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MassHouse @yield('title')</title>
    <!--icon-->
    <link rel="icon" href="images/logo-white.png" type="image/x-icon">

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <!--animate-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!--font awesome links-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css"
        integrity="sha512-d0olNN35C6VLiulAobxYHZiXJmq+vl+BGIgAxQtD5+kqudro/xNMvv2yIHAciGHpExsIbKX3iLg+0B6d0k4+ZA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- font awesome offline links -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">

    <!------ css file ------------->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!--sticky navbar-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="{{ asset('js/sticky-navbar.js') }}"></script>

</head>

<body>
    <!--transparent navbar-->
    <nav class="navbar sticky home" id="transparentNavbar">
        <div class="nav-wrapper">

            <div class="nav1">
                <ul>
                    <li><a href="about.html">About</a></li>
                    <li><a href="news.html">Media</a></li>
                    <li><a href="news.html">Whats Up!</a></li>
                </ul>
            </div>
            <div class="logo">
                <a href="index.html">
                    <img src="{{ asset('images/logo-white.png') }}">
                </a>
            </div>
            <div class="nav2">
                <ul>
                    <li><a href=".html">Tickets</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="contact.html" class="nav-button">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--alternative navbar-->
    <nav class="navbar sticky alternative-navbar" id="alternativeNavbar">
        <div class="nav-wrapper">

            <div class="nav1">
                <ul>
                    <li><a href="about.html">About</a></li>
                    <li><a href="news.html">Media</a></li>
                    <li><a href="news.html">Whats Up!</a></li>
                </ul>
            </div>
            <div class="logo">
                <a href="index.html">
                    <img src="{{ asset('images/logo-white.png') }}">
                </a>
            </div>
            <div class="nav2">
                <ul>
                    <li><a href=".html">Tickets</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="contact.html" class="nav-button">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="{{ asset('js/alternative-navbar.js') }}"></script>


    @yield('content')

    <!--footer section-->
    <footer>
        <div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 foot one">
                    <h5 class="mb-4 font-weight-bold">REGISTER TO HEAR FROM US</h5>
                    <p>Sign up to hear about the latest news,
                        events and offers at MASSHOUSE.</p>

                    <form method="post" action="">
                        <div class="form-outline f-outline2 d-flex justify-content-between">
                            <input type="email" id="subscription_email" class="form-control f-input2"
                                placeholder="Email Address" autocomplete="off" required="required"
                                name="subscription_email">

                        </div>
                        <br>

                        <div class="form-check agreement">

                            <input class="form-check-input rounded-0" type="checkbox" id="agreement" name="agreement">
                            <label class="form-check-label" for="agreement">
                                I have read and agree to MASSHOUSE’s Privacy Policy & I would like to receive email
                                updates and news from MASSHOUSE
                            </label>
                        </div>

                        <br>

                        <div>
                            <input class="btn btn-success sign-up" type="submit" value="SUBMIT" aria-label="Search"
                                name="sign_up">
                        </div>

                    </form>



                </div>
                <div class="row col-lg-3 col-md-6 col-sm-12 foot two">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h5 class=" font-weight-bold ">MASSHOUSE</h5>
                        <hr
                            style="border: none!important; border-top: 1px solid #fff!important; background-color: #fff;">
                        <ul>
                            <li><a href="about.html" class="footer-link text-white" style="text-decoration: none;">
                                    >&nbsp;MHL</a></li>
                            <li><a href="about.html" class="footer-link text-white" style="text-decoration: none;">
                                    >&nbsp;Ticketing</a></li>
                            <li><a href="about.html" class="footer-link text-white" style="text-decoration: none;">
                                    >&nbsp;About Us</a></li>
                            <li><a href="news.html" class="footer-link text-white" style="text-decoration: none;">
                                    >&nbsp;News & Blogs</a></li>
                            <li><a href="about.html" class="footer-link text-white" style="text-decoration: none;">
                                    >&nbsp;All about HTML</a></li>
                        </ul>




                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h5 class=" font-weight-bold ">VENUES</h5>
                        <hr
                            style="border: none!important; border-top: 1px solid #fff!important; background-color: #fff;">

                        <ul>
                            <li><a href="about.html" class="footer-link text-white" style="text-decoration: none;">
                                    >&nbsp;Nairobi</a></li>
                            <li><a href="about.html" class="footer-link text-white" style="text-decoration: none;">
                                    >&nbsp;Kisumu</a></li>
                            <li><a href="about.html" class="footer-link text-white" style="text-decoration: none;">
                                    >&nbsp;Naivasha</a></li>
                            <li><a href="news.html" class="footer-link text-white" style="text-decoration: none;">
                                    >&nbsp;Mombasa</a></li>

                        </ul>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-12 foot three">
                    <h5 class=" font-weight-bold">CONNECT WITH US</h5>
                    <hr style="border: none!important; border-top: 1px solid #fff!important; background-color: #fff;">
                    <ul>
                        <li><a href="" target="_blank"><i
                                    class="fa-brands fa-facebook-f"></i>&nbsp;&nbsp;<span>Masshouse_live</span></a>
                        </li>
                        <br>
                        <li><a href="" target="_blank"><i
                                    class="fa-brands fa-x-twitter"></i>&nbsp;<span>Masshouse_live</span></a></li>
                        <br>
                        <li><a href="" target="_blank"><i
                                    class="fa-brands fa-instagram"></i>&nbsp;&nbsp;<span>Masshouse_live</span></a></li>
                    </ul>

                    <!-- <br> -->

                    <!-- <br> -->


                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 foot four">
                    <a href="">
                        <img src="{{ asset('images/footer-video.PNG') }}" alt="video">
                    </a>

                </div>
            </div>
        </div>
        <hr class="mb-2">

        <!-- bottom part -->
        <div class="row row-foot-bot align-items-center">
            <div class="foot-bot col-lg-4 col-md-6 col-sm-12">
                <p>@MASSHOUSE 2024. All Rights Reserved</p>

                <ul class="list-unstyled list-inline">
                    <li class="list-inline-item mx-1">Terms & Conditions</li>
                    <li class="list-inline-item mx-1">Code of Ethics</li>
                    <li class="list-inline-item mx-1">Report an Incident</li>
                </ul>
            </div>

            <div class=" foot-bot col-lg-4 col-md-6 col-sm-12">
                <br>
                <hr style="border: none!important; border-top: 2px solid #fff!important; background-color: #fff;">

            </div>
            <div class="foot-bot col-lg-4 col-md-6 col-sm-12">
                <!-- <p>Powered by : <a href="https://drenla.com" style="text-decoration: none; color:#CEA673;"><strong>DRENLA</strong>
      </p> -->
                <ul class="list-unstyled list-inline">
                    <li class="list-inline-item mx-1">Privacy Policy</li>
                    <li class="list-inline-item mx-1">Cookie Policy</li>
                    <li class="list-inline-item mx-1">Black Community Policy</li>
                    <li class="list-inline-item mx-1">Slavery Policy</li>
                </ul>
            </div>

        </div>
    </footer>




</body>

</html>
