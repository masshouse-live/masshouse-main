@extends('layouts.app')
@section('title')
    {{ $news->title }}
@endsection
@section('content')
    <!--zblog section-->
    @php
        function calculateReadingTime($text, $wpm = 180)
        {
            $plainText = strip_tags($text);
            $wordCount = str_word_count($plainText);
            $readingTimeMinutes = ceil($wordCount / $wpm);
            return $readingTimeMinutes;
        }
    @endphp
    <section class="individual-blogs " style="color: white">
        <div class="blog-deets d-flex justify-content-between">
            <h5 style="color: white">MassHouse Live | {{ calculateReadingTime($news->description) }} min read</h5>

        </div>

        <h1 style="color: white">{{ $news->title }}</h1>

        <h6 class="date" style="color: white">{{ $news->created_at->format('F j, Y') }}</h6>
        <br>
        <div class="social-media" style="color: white">
            <ul style="color: white">
                <li><a href="https://www.facebook.com/MASSHOUSEUK/" target="_blank" style="color: white"><i
                            class="fa-brands fa-facebook-f"></i></a>
                </li>
                <li><a href="https://x.com/masshouse_ke" target="_blank" style="color: white"><i
                            class="fa-brands fa-x-twitter"></i></a>
                </li>
                <li><a href="https://www.instagram.com/masshouse_live/" target="_blank" style="color: white"><i
                            class="fa-brands fa-instagram"></i></a>
                </li>
                <li><a href="https://www.tiktok.com/masshouse_live" target="_blank" style="color: white"><i
                            class="fa-brands fa-tiktok"></i></a>
                </li>
                <li><a href="https://www.youtube.com/masshouse_live" target="_blank" style="color: white"><i
                            class="fa-brands fa-youtube"></i></a></li>
                <li><a href="https://www.threads.com/masshouse_live" target="_blank" style="color: white"><i
                            class="fa-brands fa-threads"></i></a></li>
                <li><a href="https://www.snapchat.com/masshouse_live" target="_blank" style="color: white"><i
                            class="fa-brands fa-snapchat"></i></a></li>
            </ul>
        </div>

        <section class="zblog-image">
            <img src="{{ asset($news->image) }}" alt="Blog Pic">
        </section>
        {!! $news->description !!}
        <div class="author d-flex" style="color:white">
            <p style="color:white"><br>&nbsp;&nbsp; By <strong>{{ $news->created_by }}</strong></p>
        </div>
    </section>

    <style>
        p {
            color: white !important;
        }
    </style>


    <!-----related news------>
    <section class="related-news">
        <div class="sub-heading">
            <h3>RELATED NEWS</h3>
        </div>
        <br>
        <div class="row article-wrapper">
            @foreach ($related_news as $related)
                <div class="article-box one col-lg-4 col-md-6 col-sm-12">
                    <div class="img-box">
                        <img src="{{ asset($related->image) }}" alt="image">
                    </div>
                    <div class="news-details">
                        <span>{{ $related->category }}</span>
                        <h3>{{ $related->title }}</h3>
                        <div class="button">
                            <a href="{{ route('news_detail', $related->slug) }}" style="padding-left: 50px;"
                                class="button2">READ MORE &nbsp;
                                <svg style="margin-left: 50px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg"
                                    width="1.5em" height="1.5em" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M204 64v104a12 12 0 0 1-24 0V93L72.49 200.49a12 12 0 0 1-17-17L163 76H88a12 12 0 0 1 0-24h104a12 12 0 0 1 12 12" />
                                </svg>
                                <!-- <i style="margin-left: 50px;"
                                                                                                                                                                                                                                            class="text-white fa-solid fa-up-right-from-square"></i> -->
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
