$(document).ready(function() {
    var lastScrollTop = 0; // To keep track of the previous scroll position
    var scrollThreshold = 50; // Adjust this threshold as needed
  
    // Function to handle the scroll event
    $(window).scroll(function () {
      var scrolled = $(document).scrollTop();
  
      // Check if the user has scrolled past the threshold
      if (Math.abs(scrolled - lastScrollTop) > scrollThreshold) {
        if (scrolled > lastScrollTop) {
          // Scrolling down, hide the navbar
          $('.navbar').addClass('animate');
          $('.navbar').removeClass('sticky');
        } else {
          // Scrolling up, show the navbar
          $('.navbar').removeClass('animate');
          $('.navbar').addClass('sticky');
        }
        
        lastScrollTop = scrolled; // Update the last scroll position
      }
    });
  
    // Initialize the navbar as hidden when the page loads
    $('.navbar').addClass('animate');
  });
  
  
  