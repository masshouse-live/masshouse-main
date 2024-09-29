// alternative-navbar.js

// Get the navbar elements
var transparentNavbar = document.getElementById("transparentNavbar");
var alternativeNavbar = document.getElementById("alternativeNavbar");

// Variable to track if the user is actively scrolling
var isScrolling = false;

// Function to handle scroll events
function handleScroll() {
    // Get the current scroll position
    var currentScrollPos = window.pageYOffset;

    // Check if the user is actively scrolling
    if (!isScrolling) {
        // User is not actively scrolling, update the navbar visibility
        updateNavbarVisibility(currentScrollPos);
        return;
    }

    // Update the navbar visibility
    updateNavbarVisibility(currentScrollPos);
}

// Function to update navbar visibility based on scroll position
function updateNavbarVisibility(scrollPos) {
    if (scrollPos === 0) {
        // At the top of the page, show transparentNavbar, hide alternativeNavbar
        transparentNavbar.style.display = "block";
        alternativeNavbar.style.display = "none";
    } else {
        // Scrolling down or not at the top, hide transparentNavbar, show alternativeNavbar
        transparentNavbar.style.display = "none";
        alternativeNavbar.style.display = "block";
    }
}

// Event listener for scroll
window.addEventListener("scroll", function () {
    // User is actively scrolling
    isScrolling = true;

    // Clear the timeout to prevent it from being set multiple times
    clearTimeout(scrollTimeout);

    // Set a timeout to reset scrolling state after a certain duration
    var scrollTimeout = setTimeout(function () {
        isScrolling = false;
    }, 2000); // You can adjust the duration as needed

    // Handle scroll events
    handleScroll();
});

// Event listener for touchstart to track scrolling on touch devices
document.addEventListener("touchstart", function () {
    // User is actively scrolling on touch devices
    isScrolling = true;

    // Clear the timeout to prevent it from being set multiple times
    clearTimeout(scrollTimeout);

    // Set a timeout to reset scrolling state after a certain duration
    var scrollTimeout = setTimeout(function () {
        isScrolling = false;
    }, 2000); // You can adjust the duration as needed

    // Handle scroll events
    handleScroll();
});

// Toggle menu click event
