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
                                <img src="{{ asset('images/shop/poloshirt-white.png') }}" alt="image">
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
            @foreach ($merchandise as $merch)
                <div onclick="togglePopup()" class="merchandise-box col-lg-3 col-md-6 col-sm-12">
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

    @include('partials.partners', ['color' => 'white', 'partners' => $partners])
    <script src="{{ asset('js/modal-popup.js') }}"></script>
@endsection
