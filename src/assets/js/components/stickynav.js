$(document).foundation();

//BEGINNING OF JS FOR SCROLLING-STICKY TOP BAR
// Get the header
var navbar = document.getElementById("topBarContainer");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky-navbar");
    } else {
        navbar.classList.remove("sticky-navbar");
    }
}

// When the user scrolls the page, execute myFunction
//I (ALEX) HAVE COMMENTED THE FOLLOWING EVENT LISTENER BECAUSE I ACHIEVIED THE STICKY NAV WITH JUST CSS (position: sticky;);
//Please keep this code in case we need to switch back.
//window.onscroll = function () {
//  myFunction();
//};
//END OF JS FOR SCROLLING-STICKY TOP BAR