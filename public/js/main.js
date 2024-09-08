// Set the date we are counting to
var countdownDate = new Date("Aug 29, 2024 12:00:00").getTime();

var x = setInterval(function () {
  // Get today's time and date
  var nowDT = new Date().getTime();

  // Find the distance between now and the countdown date
  var distance = countdownDate - nowDT;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Add leading zeros
  days = padWithZero(days);
  hours = padWithZero(hours);
  minutes = padWithZero(minutes);
  seconds = padWithZero(seconds);

  // Output the result
  document.querySelector(".days h3").innerHTML = days;
  document.querySelector(".hours h3").innerHTML = hours;
  document.querySelector(".minutes h3").innerHTML = minutes;
  document.querySelector(".seconds h3").innerHTML = seconds;
});

// Function to add leading zeros
function padWithZero(value) {
  return value < 10 ? "0" + value : value;
}
