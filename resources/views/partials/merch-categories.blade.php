<div class="swiper mySwiper case-studies">
    <div class="swiper-wrapper">
        @foreach ($categories as $category)
            <div class="swiper-slide merch-box">
                <img src="images/shop/poloshirt-black.png" alt="image" />
                <div class="merch-details">
                    <h5>{{ $category->name }}</h5>
                    <p>{{ $category->tags }}{{ \Str::length($category->tags) > 0 ? '' : '.' }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="button">
                            <a href="/shop/merch/category={{ $category->slug }}" class="button1">SHOP NOW
                                <svg style="margin-left: 120px; margin-bottom: 5px" xmlns="http://www.w3.org/2000/svg"
                                    width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                </svg>
                            </a>
                        </div>
                        <div>
                            <br />
                            <p style="font-size: 12px; font-family: 'Arian LT Bold'">
                                KES <br />
                                {{ number_format($category->price_from, 2, '.', ',') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <!-- <div class="swiper-pagination"></div> -->
</div>
