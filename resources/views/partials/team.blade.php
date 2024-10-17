<section class="team">
    <div class="sub-heading">
        <h3>THE MASSHOUSE TEAM</h3>
        <br>
        <p>Get to know the talented individuals who will put a touch of class on your events.</p>
    </div>



    <!-- Swiper -->
    <div class="swiper mySwiper case-studies">
        <div class="swiper-wrapper">
            @foreach ($team_members as $member)
                <div class="swiper-slide team-box">
                    <div class="team-box-img">
                        <img src="{{ asset($member->image) }}" alt="">
                    </div>
                    <div class="team-details">
                        <h5>{{ $member->name }}</h5>
                        <p>{{ $member->title }}</p>
                    </div>
                </div>
            @endforeach


        </div>

        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

</section>
