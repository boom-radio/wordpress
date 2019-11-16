//------------------GO TO TOP BUTTON----------------------
// Set a variable for our button element(styling see stickytop partial).
const scrollToTopButton = document.getElementById('js-top');

//set up a function that shows scroll-to-top button if user scrolls beyond the height of the initial window.
const scrollFunc = () => {
    // Get the current scroll value
    let y = window.scrollY;

    // If the scroll value is greater than the window height, add a class to the scroll-to-top button to show it(styling in mobile.scss)!
    if (y > 0) {
        scrollToTopButton.className = "top-link show";
    } else {
        scrollToTopButton.className = "top-link hide";
    }
};

window.addEventListener("scroll", scrollFunc);

const scrollToTop = () => {
    // set a variable for the number of pixels from the top of the document.
    const c = document.documentElement.scrollTop || document.body.scrollTop;

    // If that number is greater than 0, scroll back to 0, or the top of the document.
    if (c > 0) {
        window.requestAnimationFrame(scrollToTop);
        // ScrollTo takes an x and a y coordinate.
        // Increase the '10' value to get a smoother/slower scroll!
        window.scrollTo(0, c - c / 2);
    }
};

// When the button is clicked, run ScrolltoTop function above!
scrollToTopButton.onclick = function (e) {
    e.preventDefault();
    scrollToTop();
};