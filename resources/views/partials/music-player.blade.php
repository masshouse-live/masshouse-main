<section class="music-player">
    <div class="row mp-wrapper">
        <div class="mp-left one col-lg-6 col-md-6 col-sm-12">
            <h2>
                OFFICIAL <br />
                PLAYLIST <br />
                2025
            </h2>

            <p>
                Experience the best of Masshouse Live®, Wherever you are, <br />
                Whenever you can, in the world. Whether you're looking for <br />
                illusive track IDs from your time on our dancefloor, or simply
                <br />
                reflecting on a memory for a re-connect, Tune in below to <br />
                <span style="font-family: 'Mundial Regular', sans serif; color: #fff">Experience Amazing™</span>
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
                <div class="mpr-wrapper d-flex">
                    <div class="mpr-left col-lg-10 col-md-6 col-sm-12">
                        <img src="{{ asset('images/johnie walker.png') }}" alt="image" />
                        <p>
                            JOHNIE WALKER <br />
                            THROW BACK THURSDAYS
                        </p>
                        <!-- <br> -->
                        <h2>DJ KNEE-BREAKER</h2>
                        <span>LIVE AT THE MASSHOUSE LIVE</span>
                        <br /><br />
                        <div id="progress-indicator"
                            style="background-color: #777; width: 100%; height: 4px; position:relative">
                            <span
                                style="width: 10px; height: 10px;position: absolute; top: -3px; left: 0; background-color: #fff; border-radius: 50%"
                                id="progress-ball"></span>
                            <div class="progress" id="progress" style="height: 4px; width: 0%"></div>
                        </div>
                        <br />
                        <ul class="music-icons list-unstyled list-inline">
                            <li class="list-inline-item mx-3">
                                <i class="fa-solid fa-backward-step" id="backward-step"></i>
                            </li>
                            <li class="list-inline-item mx-3">
                                <i class="fa-solid fa-play" id="play-music"></i>
                            </li>
                            <li class="list-inline-item mx-3">
                                <i class="fa-solid fa-stop" id="stop-music"></i>
                            </li>
                            <li class="list-inline-item mx-3">
                                <i class="fa-solid fa-forward-step" id="forward-step"></i>
                            </li>
                        </ul>
                    </div>
                    <div class="mpr-right col-lg-2 col-md-6 col-sm-12">
                        <audio id="music-player"
                            src="https://upcdn.io/FW25c2f/raw/uploads/2024/05/25/4kbAqbHE12-Are%20Sinners%20Raptured%20First.%20mp3.mp3"></audio>
                        <div class="music-icons">
                            <i class="fa-solid fa-share-nodes"></i>
                            <br />
                            <i class="fa-solid fa-list"></i>
                            <br />
                            <i class="fa-solid fa-plus" id="increase-volume"></i>
                            <div class="volume-bar" id="volume-bar" style="padding-top: 20px;">
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                                <i class="fa-solid fa-minus vol-indicator"></i>
                            </div>
                            <i class="fa-solid fa-minus" id="decrease-volume"></i>
                            <br />
                            <i class="fa-solid fa-volume-mute" id="level"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
