function updateVolumeBar(player) {
    const volume = player.volume; // Volume is a value between 0.0 and 1.0
    const volumeBar = document.getElementById("volume-bar");
    const volumeIcons = volumeBar.querySelectorAll("i");
    const totalIcons = volumeIcons.length;
    const activeIcons = Math.floor(volume * totalIcons);

    // Update the color of volume icons based on current volume, in reverse
    volumeIcons.forEach((icon, index) => {
        if (index >= totalIcons - activeIcons) {
            icon.style.color = "#ffffff"; // Active icons (white)
        } else {
            icon.style.color = "#777"; // Inactive icons (grey)
        }
    });
    if (volume > 0.5) {
        document.getElementById("level").className = "fa-solid fa-volume-high";
    } else if (volume > 0.1) {
        document.getElementById("level").className = "fa-solid fa-volume-low";
    } else if (volume > 0) {
        document.getElementById("level").className = "fa-solid fa-volume-off";
    } else {
        document.getElementById("level").className = "fa-solid fa-volume-mute";
    }
}

const increaseVolume = (player) => {
    if (player.muted) {
        player.muted = false;
    }
    const volumeBar = document.getElementById("volume-bar");
    const volumeIcons = volumeBar.querySelectorAll("i");
    const rate = 1 / volumeIcons.length;
    player.volume = Math.min(player.volume + rate, 1.0);
    updateVolumeBar(player);
};

const decreaseVolume = (player) => {
    if (player.muted) {
        player.muted = false;
    }
    const volumeBar = document.getElementById("volume-bar");
    const volumeIcons = volumeBar.querySelectorAll("i");
    const rate = 1 / volumeIcons.length;

    // Ensure volume does not go below 0.0
    player.volume = Math.max(player.volume - rate, 0.0);
    updateVolumeBar(player);
};
const clickIcon = (event, player) => {
    const volumeBar = document.getElementById("volume-bar");
    const volumeIcons = Array.from(volumeBar.querySelectorAll("i"));

    // Get the index of the clicked icon
    const clickedIcon = event.target;
    const clickedIndex = volumeIcons.indexOf(clickedIcon);

    if (clickedIndex !== -1) {
        const totalIcons = volumeIcons.length;
        // Calculate the new volume based on the inverted clicked index
        const newVolume = (totalIcons - clickedIndex) / totalIcons;

        // Set the player's volume to match the clicked icon's inverted index
        player.volume = newVolume;

        console.log(`Icon index: ${clickedIndex}, New volume: ${newVolume}`);
        updateVolumeBar();
    }
};

// Function to reset the progress bar
function resetProgressBar() {
    const progressBar = document.getElementById("progress");
    const progressBall = document.getElementById("progress-ball");

    progressBar.style.width = "0%";
    progressBall.style.left = "0%";
}

const togglePlay = (player) => {
    if (player.paused) {
        player.play();
        document.getElementById("play-music").className = "fa-solid fa-pause";
    } else {
        player.pause();
        document.getElementById("play-music").className = "fa-solid fa-play";
    }
};

const updateProgressBar = (player) => {
    const progressBar = document.getElementById("progress");
    const progressBall = document.getElementById("progress-ball");
    progressBar.style.width = `${
        (player.currentTime / player.duration) * 100
    }%`;
    progressBall.style.left = `${
        (player.currentTime / player.duration) * 100
    }%`;
};

(() => {
    const player = document.getElementById("music-player");

    const progressBall = document.getElementById("progress-ball");
    let isDragging = false;
    document
        .getElementById("play-music")
        .addEventListener("click", () => togglePlay(player));
    document
        .getElementById("increase-volume")
        .addEventListener("click", () => increaseVolume(player));

    document
        .getElementById("decrease-volume")
        .addEventListener("click", () => decreaseVolume(player));
    document
        .getElementById("volume-bar")
        .addEventListener("click", (event) => clickIcon(event, player));

    // Update progress bar as the song plays
    player.addEventListener("timeupdate", () => {
        if (!isDragging) {
            if (!player.ended) {
                updateProgressBar(player);
            } else {
                player.currentTime = 0;
                document.getElementById("play-music").className =
                    "fa-solid fa-play";
                resetProgressBar(); // Reset progress bar to zero
            }
        }
    });

    // Add event listener to the progress bar for seeking
    document
        .getElementById("progress-indicator")
        .addEventListener("click", (event) => {
            const indicator = document.getElementById("progress-indicator");
            const rect = indicator.getBoundingClientRect();
            const offsetX = event.clientX - rect.left;

            const percentage = offsetX / rect.width; // Value between 0 and 1
            const targetTime = player.duration * percentage; // Calculate the target time

            player.currentTime = targetTime; // Set currentTime

            updateProgressBar(player);
        });

    player.addEventListener("timeupdate", () => {
        if (!isDragging) {
            updateProgressBar(player);
        }
    });

    // Allow dragging the ball in the x direction
    progressBall.addEventListener("mousedown", (event) => {
        isDragging = true; // Start dragging
    });

    document.addEventListener("mousemove", (event) => {
        if (isDragging) {
            const indicator = document.getElementById("progress-indicator");
            const rect = indicator.getBoundingClientRect();
            const offsetX = event.clientX - rect.left;
            const percentage = Math.max(0, Math.min(1, offsetX / rect.width)); // Clamping between 0 and 1
            player.currentTime = player.duration * percentage;
            updateProgressBar(player);
        }
    });

    document.addEventListener("mouseup", () => {
        isDragging = false; // Stop dragging
    });

    progressBall.addEventListener("dragstart", (event) => {
        event.preventDefault();
    });

    updateVolumeBar(player);
})();
