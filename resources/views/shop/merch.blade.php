@extends('layouts.app')

@section('content')
    <section class="merch-landing">
        <!-- <img src="" alt=""> -->
    </section>


    <!--merchandise section-->
    <section class="merchandise">
        <p>HOME / SHOP / MERCHANDISE</p>
        <span>105 Results</span>
        <br>
        <br>
        <div class="row merchandise-wrapper">
            <div class="popup" id="popup-1">
                <div class="overlay"></div>
                <div class="content">
                    <div class="close-btn" onclick="togglePopup()">&times;</div>
                    <section class="custom-merch">
                        <!-- <div class="sub-heading">
                        <h3>CUSTOM MERCHANDISE</h3>
                    </div>
                    <br> -->
                        <div class="row cm-wrapper">
                            <div class="cm-left col-lg-6 col-md-6 col-sm-12">
                                <img src="images/shop/poloshirt-white.png" alt="image">
                            </div>
                            <div class="cm-right col-lg-6 col-md-6 col-sm-12">
                                <h4>MASSHOUSE POLO SHIRT LIMITED EDITION</h4>
                                <!-- <br> -->

                                <div class="price">
                                    <p>KES. 3,499.00</p>
                                    <span>Taxes Included</span>
                                </div>
                                <br><br>
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
                                <div class="row descr">
                                    <div class="col-lg-10 col-md-6 col-sm-12">
                                        <p>
                                            Declare your allegiance to Masshouse Live with this stylish polo shirt, perfect
                                            for any
                                            occasion. Made from premium cotton, it offers a comfortable and breathable fit
                                            whether
                                            you're attending an event or enjoying a casual day out. The sleek design
                                            features an
                                            embroidered MassHouse Live logo, making it clear at first glance where your
                                            loyalty
                                            lies.
                                        </p>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-12">
                                        <span>Size Guide</span>
                                    </div>
                                </div>
                                <ul class="list-unstyled list-inline description">
                                    <li class="list-inline-item mx-2"><i class="fa-solid fa-check"></i> Regular Fit</li>
                                    <li class="list-inline-item mx-2"><i class="fa-solid fa-check"></i> Ribbed Crew Neck
                                    </li>
                                    <li class="list-inline-item mx-2"><i class="fa-solid fa-check"></i> 100% Cotton</li>
                                    <li class="list-inline-item mx-2"><i class="fa-solid fa-check"></i> Embroided MassHouse
                                        logo
                                    </li>

                                </ul>

                                <div class="button">
                                    <a href="" class="button2">SHOP NOW &nbsp;
                                        <svg style="margin-left: 100px; margin-bottom: 5px;"
                                            xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                            viewBox="0 0 256 256">
                                            <path fill="currentColor"
                                                d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                        </svg>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            <div onclick="togglePopup()" class="merchandise-box col-lg-3 col-md-6 col-sm-12">
                <div class="merch-image-wrapper">
                    <img src="images/shop/poloshirt-white.png" alt="image">
                </div>
                <div class="merchandise-details">
                    <h5>MH MENS POLO SHIRT
                        LIMITED EDITION</h5>
                    <h6>FROM KES 1,300</h6>
                    <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;2XL &nbsp;3XL</p>
                </div>
            </div>
            <div onclick="togglePopup()" class="merchandise-box col-lg-3 col-md-6 col-sm-12">
                <div class="merch-image-wrapper">
                    <img src="images/shop/poloshirt-black.png" alt="image">
                </div>
                <div class="merchandise-details">
                    <h5>MH MENS POLO SHIRT
                        PLAIN BLACK</h5>
                    <h6>FROM KES 1,300</h6>
                    <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;2XL &nbsp;3XL</p>
                </div>
            </div>
            <div onclick="togglePopup()" class="merchandise-box col-lg-3 col-md-6 col-sm-12">
                <div class="merch-image-wrapper">
                    <img src="images/shop/front-hoodie.png" alt="image">
                </div>
                <div class="merchandise-details">
                    <h5>MH CUSTOMIZED HOODIE
                        BLACK</h5>
                    <h6>FROM KES 2,500</h6>
                    <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;2XL &nbsp;3XL</p>
                </div>
            </div>
            <div onclick="togglePopup()" class="merchandise-box col-lg-3 col-md-6 col-sm-12">
                <div class="merch-image-wrapper">
                    <img src="images/shop/jersey 3.png" alt="image">
                </div>
                <div class="merchandise-details">
                    <h5>MH UNISEX CUSTOMIZED
                        T-SHIRT</h5>
                    <h6>FROM KES 650</h6>
                    <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;2XL &nbsp;3XL</p>
                </div>
            </div>

            <div onclick="togglePopup()" class="merchandise-box col-lg-3 col-md-6 col-sm-12">
                <div class="merch-image-wrapper">
                    <img src="images/shop/jersey.png" alt="image">
                </div>
                <div class="merchandise-details">
                    <h5>MH MENS SPORTS SHIRT
                        BLACK</h5>
                    <h6>FROM KES 2,500</h6>
                    <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;2XL &nbsp;3XL</p>
                </div>
            </div>
            <div onclick="togglePopup()" class="merchandise-box col-lg-3 col-md-6 col-sm-12">
                <div class="merch-image-wrapper">
                    <img src="images/shop/socks.png" alt="image">
                </div>
                <div class="merchandise-details">
                    <h5>MH UNISEX SOCKS BLACK NEW
                        RELEASES</h5>
                    <h6>FROM KES 2,500</h6>
                    <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;2XL &nbsp;3XL</p>
                </div>
            </div>
            <div onclick="togglePopup()" class="merchandise-box col-lg-3 col-md-6 col-sm-12">
                <div class="merch-image-wrapper">
                    <img src="images/shop/arsenal front.png" alt="image">
                </div>
                <div class="merchandise-details">
                    <h5>MH MENS SPORTS SHIRT
                        WHITE</h5>
                    <h6>FROM KES 300</h6>
                    <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;2XL &nbsp;3XL</p>
                </div>
            </div>
            <div onclick="togglePopup()" class="merchandise-box col-lg-3 col-md-6 col-sm-12">
                <div class="merch-image-wrapper">
                    <img src="images/shop/Basketball Jersey Mockup.png" alt="image">
                </div>
                <div class="merchandise-details">
                    <h5>MH FAN BASKETBALL JERSEY
                        WHITE X BLACK</h5>
                    <h6>FROM KES 2,200</h6>
                    <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;2XL &nbsp;3XL</p>
                </div>
            </div>

            <div onclick="togglePopup()" class="merchandise-box col-lg-3 col-md-6 col-sm-12">
                <div class="merch-image-wrapper">
                    <img src="images/shop/Fisherman Hat.png" alt="image">
                </div>
                <div class="merchandise-details">
                    <h5>MH UNISEX BUCKET HUT</h5>
                    <h6>FROM KES 800</h6>
                    <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;2XL &nbsp;3XL</p>
                </div>
            </div>
            <div onclick="togglePopup()" class="merchandise-box col-lg-3 col-md-6 col-sm-12">
                <div class="merch-image-wrapper">
                    <img src="images/shop/Beanie Mockup2.png" alt="image">
                </div>
                <div class="merchandise-details">
                    <h5>MH UNISEX BEANIE HAT BLACK</h5>
                    <h6>FROM KES 900</h6>
                    <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;2XL &nbsp;3XL</p>
                </div>
            </div>
            <div onclick="togglePopup()" class="merchandise-box col-lg-3 col-md-6 col-sm-12">
                <div class="merch-image-wrapper">
                    <img src="images/shop/Cap Mockups.png" alt="image">
                </div>
                <div class="merchandise-details">
                    <h5>MH BLACK A-FRAME TRUCKER</h5>
                    <h6>FROM KES 2,500</h6>
                    <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;2XL &nbsp;3XL</p>
                </div>
            </div>
            <div onclick="togglePopup()" class="merchandise-box col-lg-3 col-md-6 col-sm-12">
                <div class="merch-image-wrapper">
                    <img src="images/shop/Fan Scarf Mockup.png" alt="image">
                </div>
                <div class="merchandise-details">
                    <h5>MH FAN ONE-SIDED SCARF</h5>
                    <h6>FROM KES 1,200</h6>
                    <p>S &nbsp;M &nbsp;L &nbsp;XL &nbsp;2XL &nbsp;3XL</p>
                </div>
            </div>


        </div>
    </section>


    <!--custom-merch section-->
    <!-- <section class="custom-merch">
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
    </section> -->

    <!--extra-merch section-->
    <section class="extra-merch">
        <div class="row extram-wrapper">
            <div class="extram-box col-lg-4 col-md-6 col-sm-12">
                <div class="extram-image-wrapper">
                    <img src="images/shop/lighter white.png" alt="image">
                </div>
                <div class="extram-details">
                    <h3>MH LIGHTERS</h3>
                    <div class="button">
                        <a href="" class="button1">DISCOVER MORE &nbsp;
                            <svg style=" margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="extram-box col-lg-4 col-md-6 col-sm-12">
                <div class="extram-image-wrapper">
                    <img src="images/shop/vape pod set 3 angle 2.png" alt="image">
                </div>
                <div class="extram-details">
                    <h3>MH VAPES</h3>
                    <div class="button">
                        <a href="" class="button1">DISCOVER MORE &nbsp;
                            <svg style=" margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="extram-box col-lg-4 col-md-6 col-sm-12">
                <div class="extram-image-wrapper">
                    <img src="images/shop/ring 4.png" alt="image">
                </div>
                <div class="extram-details">
                    <h3>MH JEWELLERY</h3>
                    <div class="button">
                        <a href="" class="button1">DISCOVER MORE &nbsp;
                            <svg style=" margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                height="1.5em" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
@endsection
