<section class="partners-n-sponsors {{ $color == 'black' ? 'about' : '' }}">
    @if ($color == 'black')
        <div style="margin-left: 50px; margin-bottom: 30px;">
            <h3>PARTNERS & SPONSORS</h3>
        </div>
    @endif
    <div class="logos">
        <div class="logos-slide">
            @foreach ($partners as $partner)
                <img src="{{ asset($color == 'black' ? $partner->logo_black : $partner->logo_white) }}" />
            @endforeach

        </div>
    </div>
    <script>
        var copy = document.querySelector(".logos-slide").cloneNode(true);
        document.querySelector(".logos").appendChild(copy);
    </script>
</section>
