@extends('layouts.app')

@section('content')
    <!--shop-landing section-->
    <section class="shop-landing">
        <h2>GIRLSHINE BADDIES</h2>

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

        <script>
            var copy = document.querySelector(".word-slide2").cloneNode(true);
            document.querySelector(".words2").appendChild(copy);
        </script> <!--infinite loop script-->

        <div class="hd">
            <h3>FOR YOU!</h3>
        </div>

    </section>

    <section class="shop-now">
        <div class="row shn-wrapper">
            <div class="shn-left col-lg-8 col-md-6 col-sm-12">
                <div class="button">
                    <a href="merch.html" class="button1">SHOP NOW &nbsp;
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
                    <span>GO TO CATALOGUE</span>
                    <span>CHECK OUT</span>
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
        <!-- <div class="swiper-filter">
                    <ul>
                        <li><a href="#">ALL</a></li>
                        <li><a href="#" class="active">ACCESSORIES</a></li>
                        <li><a href="#">EXCLUSIVE</a></li>
                    </ul>
                </div> -->



        <!-- Swiper -->
        <div class="swiper mySwiper case-studies">
            <div class="swiper-wrapper">

                <div class="swiper-slide merch-box">
                    <img src="images/shop/poloshirt-black.png" alt="image">
                    <div class="merch-details">
                        <span>MEN'S STYLE</span>

                        <div class="button">
                            <a href="merch.html" class="button1a">SHOP NOW &nbsp;
                                <svg style="margin-left: 120px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                    width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                </svg>
                                <!-- <i style="margin-left: 130px;"
                                                  class="text-dark fa-solid fa-up-right-from-square"></i> -->
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide merch-box">
                    <img src="images/shop/sweatshirt.png" alt="image">
                    <div class="merch-details">
                        <span>LADIES STYLE</span>

                        <div class="button">
                            <a href="merch.html" class="button1a">SHOP NOW &nbsp;
                                <svg style="margin-left: 120px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                    width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                </svg>
                                <!-- <i style="margin-left: 130px;"
                                                                      class="text-dark fa-solid fa-up-right-from-square"></i> -->
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide merch-box">
                    <img src="images/shop/tshirt-mockup.png" alt="image">
                    <div class="merch-details">
                        <span>COUPLE GOALS</span>

                        <div class="button">
                            <a href="merch.html" class="button1a">SHOP NOW &nbsp;
                                <svg style="margin-left: 120px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                    width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                </svg>
                                <!-- <i style="margin-left: 130px;"
                                                                      class="text-dark fa-solid fa-up-right-from-square"></i> -->
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide merch-box">
                    <img src="images/shop/poloshirt-black.png" alt="image">
                    <div class="merch-details">
                        <span>MEN'S STYLE</span>

                        <div class="button">
                            <a href="merch.html" class="button1a">SHOP NOW &nbsp;
                                <svg style="margin-left: 120px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                    width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                </svg>
                                <!-- <i style="margin-left: 130px;"
                                                                  class="text-dark fa-solid fa-up-right-from-square"></i> -->
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide merch-box">
                    <img src="images/shop/sweatshirt.png" alt="image">
                    <div class="merch-details">
                        <span>LADIES STYLE</span>

                        <div class="button">
                            <a href="merch.html" class="button1a">SHOP NOW &nbsp;
                                <svg style="margin-left: 120px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                    width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                </svg>
                                <!-- <i style="margin-left: 130px;"
                                                                                      class="text-dark fa-solid fa-up-right-from-square"></i> -->
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide merch-box">
                    <img src="images/shop/tshirt-mockup.png" alt="image">
                    <div class="merch-details">
                        <span>COUPLE GOALS</span>

                        <div class="button">
                            <a href="merch.html" class="button1a">SHOP NOW &nbsp;
                                <svg style="margin-left: 120px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                    width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                </svg>
                                <!-- <i style="margin-left: 130px;"
                                                                                      class="text-dark fa-solid fa-up-right-from-square"></i> -->
                            </a>
                        </div>
                    </div>
                </div>


            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script src="js/upcomingevents-swiper.js"></script>
    </section>
    <!--custom-merch section-->
    <section class="custom-merch">
        <div class="sub-heading">
            <h3>CUSTOM MERCHANDISE</h3>
        </div>
        <br>
        <div class="row cm-wrapper">
            <div class="cm-left col-lg-6 col-md-6 col-sm-12">
                <img src="images/shop/poloshirt-white.png" alt="image">
            </div>
            <div class="cm-right col-lg-6 col-md-6 col-sm-12">
                <h4>MASSHOUSE POLO SHIRT LIMITED EDITION</h4>

                <div class="price">
                    <p>KES. 3,499.00</p>
                    <span>Taxes Included</span>
                </div>
                <div class="size">
                    <p>SIZE:</p>
                    <ul>
                        <li>S</li>
                        <li>M</li>
                        <li>L</li>
                        <li>XL</li>
                        <li>2XL</li>
                        <li>3XL</li>
                    </ul>
                </div>
                <br>
                <img src="images/shop/dashes.PNG" alt="">
                <br><br>
                <div class="row">
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <p>
                            Declare your allegiance to Masshouse Live with this stylish polo shirt, perfect for any
                            occasion. Made from premium cotton, it offers a comfortable and breathable fit whether
                            you're attending an event or enjoying a casual day out. The sleek design features an
                            embroidered MassHouse Live logo, making it clear at first glance where your loyalty lies.
                        </p>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <span>Size Guide</span>
                    </div>
                </div>
                <ul class="list-unstyled list-inline description">
                    <li class="list-inline-item mx-2"><i class="fa-solid fa-check"></i> Regular Fit</li>
                    <li class="list-inline-item mx-2"><i class="fa-solid fa-check"></i> Ribbed Crew Neck</li>
                    <li class="list-inline-item mx-2"><i class="fa-solid fa-check"></i> 100% Cotton</li>
                    <li class="list-inline-item mx-2"><i class="fa-solid fa-check"></i> Embroided MassHouse logo</li>

                </ul>

                <div class="button">
                    <a href="" class="button2">SHOP NOW &nbsp;
                        <svg style="margin-left: 100px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                            width="1.5em" height="1.5em" viewBox="0 0 256 256">
                            <path fill="currentColor"
                                d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!--merchandise-alert section-->
    <section class="merchandise-alert madeformh">
        <div class="sub-heading">
            <h3>MADE FOR MASSHOUSE</h3>
        </div>
        <br>
        <!-- <div class="swiper-filter">
                        <ul>
                            <li><a href="#">ALL</a></li>
                            <li><a href="#" class="active">ACCESSORIES</a></li>
                            <li><a href="#">EXCLUSIVE</a></li>
                        </ul>
                    </div> -->



        <!-- Swiper -->
        <div class="swiper mySwiper case-studies">
            <div class="swiper-wrapper">

                <div class="swiper-slide merch-box">
                    <img src="images/shop/front-hoodie.png" alt="image">
                    <p class="merch-name">MASSHOUSE CUSTOM <span>HOODIE</span></p>
                    <div class="merch-details">
                        <!-- <h5>MASSHOUSE SIGNATURE POLO</h5> -->
                        <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;XXL</p>
                        <img style="width: auto; height: auto;" src="images/shop/dashes-small.PNG" alt="">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="button">
                                <a href="merch.html" class="button2">SHOP NOW &nbsp;
                                    <svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                        height="1.5em" viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                    </svg>
                                    <!-- <i style="margin-left: 130px;"
                                  class="text-dark fa-solid fa-up-right-from-square"></i> -->
                                </a>
                            </div>
                            <div><br>
                                <p style="font-size: 12px;">KES <br> 2,699.00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide merch-box">
                    <img src="images/shop/lighter-mockup.png" alt="image">
                    <p class="merch-name">WINDPROOF <span>METAL LIGHTER</span></p>
                    <div class="merch-details">
                        <!-- <h5>MASSHOUSE SIGNATURE POLO</h5> -->
                        <!-- <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;XXL</p> -->
                        <br><br>
                        <img style="width: auto; height: auto;" src="images/shop/dashes-small.PNG" alt="">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="button">
                                <a href="merch.html" class="button2">SHOP NOW &nbsp;
                                    <svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                        height="1.5em" viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                    </svg>
                                    <!-- <i style="margin-left: 130px;"
                                                  class="text-dark fa-solid fa-up-right-from-square"></i> -->
                                </a>
                            </div>
                            <div><br>
                                <p style="font-size: 12px;">KES <br> 2,699.00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide merch-box">
                    <img src="images/shop/phone-case.png" alt="image">
                    <p class="merch-name">MULTI-DESIGN <span>PHONE CASES</span></p>
                    <div class="merch-details">
                        <!-- <h5>MASSHOUSE SIGNATURE POLO</h5> -->
                        <!-- <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;XXL</p> -->
                        <br><br>
                        <img style="width: auto; height: auto;" src="images/shop/dashes-small.PNG" alt="">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="button">
                                <a href="merch.html" class="button2">SHOP NOW &nbsp;
                                    <svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                        height="1.5em" viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                    </svg>
                                    <!-- <i style="margin-left: 130px;"
                                                  class="text-dark fa-solid fa-up-right-from-square"></i> -->
                                </a>
                            </div>
                            <div><br>
                                <p style="font-size: 12px;">KES <br> 2,699.00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide merch-box">
                    <img src="images/shop/headphone-masshouse.png" alt="image">
                    <p class="merch-name">OVER-EAR WIRELESS <span>STUDIO PRO</span></p>
                    <div class="merch-details">
                        <!-- <h5>MASSHOUSE SIGNATURE POLO</h5> -->
                        <p>Iconic Sound</p>
                        <img style="width: auto; height: auto;" src="images/shop/dashes-small.PNG" alt="">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="button">
                                <a href="merch.html" class="button2">SHOP NOW &nbsp;
                                    <svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                        height="1.5em" viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                    </svg>
                                    <!-- <i style="margin-left: 130px;"
                                                  class="text-dark fa-solid fa-up-right-from-square"></i> -->
                                </a>
                            </div>
                            <div><br>
                                <p style="font-size: 12px;">KES <br> 2,699.00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide merch-box">
                    <img src="images/shop/front-hoodie.png" alt="image">
                    <p class="merch-name">MASSHOUSE CUSTOM <span>HOODIE</span></p>
                    <div class="merch-details">
                        <!-- <h5>MASSHOUSE SIGNATURE POLO</h5> -->
                        <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;XXL</p>
                        <img style="width: auto; height: auto;" src="images/shop/dashes-small.PNG" alt="">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="button">
                                <a href="merch.html" class="button2">SHOP NOW &nbsp;
                                    <svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                        height="1.5em" viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                    </svg>
                                    <!-- <i style="margin-left: 130px;"
                                                  class="text-dark fa-solid fa-up-right-from-square"></i> -->
                                </a>
                            </div>
                            <div><br>
                                <p style="font-size: 12px;">KES <br> 2,699.00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide merch-box">
                    <img src="images/shop/lighter-mockup.png" alt="image">
                    <p class="merch-name">WINDPROOF <span>METAL LIGHTER</span></p>
                    <div class="merch-details">
                        <!-- <h5>MASSHOUSE SIGNATURE POLO</h5> -->
                        <!-- <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;XXL</p> -->
                        <br><br>
                        <img style="width: auto; height: auto;" src="images/shop/dashes-small.PNG" alt="">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="button">
                                <a href="merch.html" class="button2">SHOP NOW &nbsp;
                                    <svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                        height="1.5em" viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                    </svg>
                                    <!-- <i style="margin-left: 130px;"
                                                                  class="text-dark fa-solid fa-up-right-from-square"></i> -->
                                </a>
                            </div>
                            <div><br>
                                <p style="font-size: 12px;">KES <br> 2,699.00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide merch-box">
                    <img src="images/shop/phone-case.png" alt="image">
                    <p class="merch-name">MULTI-DESIGN <span>PHONE CASES</span></p>
                    <div class="merch-details">
                        <!-- <h5>MASSHOUSE SIGNATURE POLO</h5> -->
                        <!-- <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;XXL</p> -->
                        <br><br>
                        <img style="width: auto; height: auto;" src="images/shop/dashes-small.PNG" alt="">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="button">
                                <a href="merch.html" class="button2">SHOP NOW &nbsp;
                                    <svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                        height="1.5em" viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                    </svg>
                                    <!-- <i style="margin-left: 130px;"
                                                                  class="text-dark fa-solid fa-up-right-from-square"></i> -->
                                </a>
                            </div>
                            <div><br>
                                <p style="font-size: 12px;">KES <br> 2,699.00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide merch-box">
                    <img src="images/shop/headphone-masshouse.png" alt="image">
                    <p class="merch-name">OVER-EAR WIRELESS <span>STUDIO PRO</span></p>
                    <div class="merch-details">
                        <!-- <h5>MASSHOUSE SIGNATURE POLO</h5> -->
                        <p>Iconic Sound</p>
                        <img style="width: auto; height: auto;" src="images/shop/dashes-small.PNG" alt="">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="button">
                                <a href="merch.html" class="button2">SHOP NOW &nbsp;
                                    <svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                        height="1.5em" viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                    </svg>
                                    <!-- <i style="margin-left: 130px;"
                                                                  class="text-dark fa-solid fa-up-right-from-square"></i> -->
                                </a>
                            </div>
                            <div><br>
                                <p style="font-size: 12px;">KES <br> 2,699.00</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script src="js/upcomingevents-swiper.js"></script>
    </section>

    <!--partners-n-sponsors section-->
    <section class="partners-n-sponsors">
        <div class="logos">
            <div class="logos-slide">
                <img src="images/sponsors/eabl.png" />
                <img src="images/sponsors/donjulio.png" />
                <img src="images/sponsors/tanqueray.png" />
                <img src="images/sponsors/kbl.png" />
                <img src="images/sponsors/singleton.png" />
                <img src="images/sponsors/safaricom.png" />

            </div>
        </div>


        <script>
            var copy = document.querySelector(".logos-slide").cloneNode(true);
            document.querySelector(".logos").appendChild(copy);
        </script> <!--infinite loop script-->
    </section>

    <!--music-player section-->
    <section class="music-player">
        <div class="row mp-wrapper">
            <div class="mp-left one col-lg-6 col-md-6 col-sm-12">
                <h2>OFFICIAL <br> PLAYLIST <br> 2025</h2>

                <p>
                    Experience the best of Masshouse Live®, Wherever you are, <br>
                    Whenever you can, in the world. Whether you're looking for <br>
                    illusive track IDs from your time on our dancefloor, or simply <br>
                    reflecting on a memory for a re-connect, Tune in below to <br>
                    Experience Amazing™
                </p>

                <ul class="list-unstyled list-inline">
                    <li class="list-inline-item mx-3">SPOTIFY</li>
                    <li class="list-inline-item mx-3">SOUNDCLOUD</li>
                    <li class="list-inline-item mx-3">YOUTUBE</li>
                    <li class="list-inline-item mx-3">APPLEMUSIC</li>

                </ul>

            </div>
            <div class="mp-right two col-lg-6 col-md-6 col-sm-12">

                <div class="music-box text-center">
                    <div class=" mpr-wrapper d-flex">
                        <div class="mpr-left col-lg-10 col-md-6 col-sm-12">
                            <img src="images/johnie walker.png" alt="image">
                            <p>JOHNIE WALKER <br>
                                THROW BACK THURSDAYS
                            </p>
                            <!-- <br> -->
                            <h2>DJ KNEE-BREAKER</h2>
                            <span>LIVE AT THE MASSHOUSE LIVE</span>
                            <br><br>
                            <hr style="border: 2px soild #fff!important;">
                            <br>
                            <ul class="music-icons list-unstyled list-inline">
                                <li class="list-inline-item mx-3">
                                    <i class="fa-solid fa-backward-step"></i>
                                </li>
                                <li class="list-inline-item mx-3">
                                    <i class="fa-solid fa-play"></i>
                                </li>
                                <li class="list-inline-item mx-3">
                                    <i class="fa-solid fa-stop"></i>
                                </li>
                                <li class="list-inline-item mx-3">
                                    <i class="fa-solid fa-forward-step"></i>
                                </li>

                            </ul>
                        </div>
                        <div class="mpr-right col-lg-2 col-md-6 col-sm-12">
                            <div class="music-icons">
                                <i class="fa-solid fa-share-nodes"></i>
                                <br>
                                <i class="fa-solid fa-list"></i>
                                <br>
                                <i class="fa-solid fa-minus"></i>
                                <br>
                                <div class="volume-bar">
                                    <i class="fa-solid fa-minus" style="color: #777;"></i>
                                    <i class="fa-solid fa-minus" style="color: #777;"></i>
                                    <i class="fa-solid fa-minus" style="color: #777;"></i>
                                    <i class="fa-solid fa-minus" style="color: #777;"></i>
                                    <i class="fa-solid fa-minus" style="color: #777;"></i>
                                    <i class="fa-solid fa-minus" style="color: #777;"></i>
                                    <i class="fa-solid fa-minus" style="color: #777;"></i>
                                    <i class="fa-solid fa-minus" style="color: #777;"></i>
                                    <i class="fa-solid fa-minus" style="color: #777;"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                    <i class="fa-solid fa-minus"></i>
                                </div>
                                <i class="fa-solid fa-plus"></i>
                                <br>
                                <i class="fa-solid fa-volume-high"></i>
                            </div>

                        </div>
                    </div>






                </div>
            </div>

        </div>
    </section>
@endsection
