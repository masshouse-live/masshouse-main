// var $j = jQuery.noConflict();
 
$(document).ready(function() {
    $(".burger-nav").on("click", function() {
        $("nav.navbar.mobile ul").toggleClass("open");
    });
});

// $(document).ready(function() {
//     $(".btn.close-btn").on("click", function() {
//         $(".navbar ul").toggleClass("close");
//     });
// });