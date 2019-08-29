$(document).foundation();

//BEGINNING OF JS FOR SCROLLING-STICKY TOP BAR
// When the user scrolls the page, execute myFunction
window.onscroll = function () {
  myFunction();
};

// Get the header
var header = document.getElementById("topBarContainer");

// Get the offset position of the navbar
var sticky = topBarContainer.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
    topBarContainer.classList.add("sticky-navbar");
  } else {
    topBarContainer.classList.remove("sticky-navbar");
  }
}
//END OF JS FOR SCROLLING-STICKY TOP BAR

//BEGINNING OF JS FOR AUDIO PLAYER
//Everything commented because we are using the boom radio embedded iframe
// var music = document.getElementById('musicPlayer'); // class for audio element
// //var music = document.getElementsByClassName('musicPlayer'); // class for audio element
// var duration = music.duration; // Duration of audio clip, calculated here for embedding purposes
// var pButton = document.getElementById('pButton'); // play button
// //var pButton = document.getElementsByClassName('pButton'); // play button
// var pButtonIcon = document.getElementById('pButtonIcon'); // play button
// //var pButtonIcon = document.getElementsByClassName('pButtonIcon'); // play button
// var playhead = document.getElementById('playhead'); // playhead
// //var playhead = document.getElementsByClassName('playhead'); // playhead
// var timeline = document.getElementById('timeline'); // timeline
// //var timeline = document.getElementsByClassName('timeline'); // timeline

// // timeline width adjusted for playhead
// var timelineWidth = timeline.offsetWidth - playhead.offsetWidth;

// // play button event listenter
// pButton.addEventListener("click", play);
// //TEST FOR CLASS BELOW
// // for (var i = 0; i < pButton.length; i++) {
// //     pButton[i].addEventListener('click', play);
// // }

// // timeupdate event listener
// music.addEventListener("timeupdate", timeUpdate, false);
// //TEST FOR CLASS BELOW
// // for (var i = 0; i < music.length; i++) {
// //     music[i].addEventListener('click', timeUpdate, false);
// // }

// // makes timeline clickable
// timeline.addEventListener("click", function(event) {
//     moveplayhead(event);
//     music.currentTime = duration * clickPercent(event);
// }, false);
// //TEST FOR CLASS BELOW
// // for (var i = 0; i < timeline.length; i++) {
// //     timeline[i].addEventListener('click', function(event) {
// //         moveplayhead(event);
// //         music.currentTime = duration * clickPercent(event);
// //         }, false);
// // }

// // returns click as decimal (.77) of the total timelineWidth
// function clickPercent(event) {
//     return (event.clientX - getPosition(timeline)) / timelineWidth;
// }

// // makes playhead draggable
// playhead.addEventListener('mousedown', mouseDown, false);
// //TEST FOR CLASS BELOW
// // for (var i = 0; i < playhead.length; i++) {
// //     playhead[i].addEventListener('mousedown', mouseDown, false);
// // }
// // window.addEventListener('mouseup', mouseUp, false);

// // Boolean value so that audio position is updated only when the playhead is released
// var onplayhead = false;

// // mouseDown EventListener
// function mouseDown() {
//     onplayhead = true;
//     window.addEventListener('mousemove', moveplayhead, true);
//     music.removeEventListener('timeupdate', timeUpdate, false);
// }

// // mouseUp EventListener
// // getting input from all mouse clicks
// function mouseUp(event) {
//     if (onplayhead == true) {
//         moveplayhead(event);
//         window.removeEventListener('mousemove', moveplayhead, true);
//         // change current time
//         music.currentTime = duration * clickPercent(event);
//         music.addEventListener('timeupdate', timeUpdate, false);
//         //TEST FOR CLASS BELOW
//         // for (var i = 0; i < music.length; i++) {
//         //     music[i].addEventListener('timeupdate', timeUpdate, false);
//         // }
//     }
//     onplayhead = false;
// }
// // mousemove EventListener
// // Moves playhead as user drags
// function moveplayhead(event) {
//     var newMargLeft = event.clientX - getPosition(timeline);

//     if (newMargLeft >= 0 && newMargLeft <= timelineWidth) {
//         playhead.style.marginLeft = newMargLeft + "px";
//     }
//     if (newMargLeft < 0) {
//         playhead.style.marginLeft = "0px";
//     }
//     if (newMargLeft > timelineWidth) {
//         playhead.style.marginLeft = timelineWidth + "px";
//     }
// }

// // timeUpdate
// // Synchronizes playhead position with current point in audio
// function timeUpdate() {
//     var playPercent = timelineWidth * (music.currentTime / duration);
//     playhead.style.marginLeft = playPercent + "px";
//     if (music.currentTime == duration) {
//         // pButton.className = "";
//         // pButton.className = "play";

//         //At the end of the track, show play icon and stop animation
//         pButtonIcon.className = "fas fa-play";
//         soundContainer.className = "";
//         //TEST FOR CLASS BELOW
//         // pButtonIcon.className = "pButtonIcon fas fa-play";
//         // soundContainer.className = "soundContainer ";
//     }
// }

// //Play and Pause
// function play() {
//     // start music
//     if (music.paused) {
//         music.play();
//         //If playing show pause button and sound animation
//         pButtonIcon.className = "fas fa-pause";
//         soundContainer.className = "sound-container";
//         //TEST FOR CLASS BELOW
//         // pButtonIcon.className = "pButtonIcon fas fa-pause";
//         // soundContainer.className = "soundContainer sound-container";
//     } else { // pause music
//         music.pause();
//         // remove pause, add play
//         // pButton.className = "";
//         // pButton.className = "play";

//         //If paused show play button and stop sound animation
//         pButtonIcon.className = "fas fa-play";
//         soundContainer.className = "";
//         //TEST FOR CLASS BELOW
//         // pButtonIcon.className = "pButtonIcon fas fa-play";
//         // soundContainer.className = "soundContainer";
//     }
// }

// // Gets audio file duration
// music.addEventListener("canplaythrough", function() {
//     duration = music.duration;
// }, false);
// //TEST FOR CLASS BELOW
// // for (var i = 0; i < music.length; i++) {
// //     music[i].addEventListener("canplaythrough", function() {
// //         duration = music.duration;
// //         }, false);
// // }

// // getPosition
// // Returns elements left position relative to top-left of viewport
// function getPosition(el) {
//     return el.getBoundingClientRect().left;
// }
//END OF JS FOR AUDIO PLAYER

//BEGINNING EXPLOSION ANIMATION FOR LOGO
var logo = document.getElementById("logo"); // id for logo element
{
  //const colors = [ '#ffc000', '#ff3b3b', '#ff8400' ]; //ORIGINAL COLOURS FROM CODEPEN
  // const colors = [ '#FE657E', '#3AA9E1', '#EB5B27' ];
  const colors = ["#FAA294", "#3FC5BE", "#FCAB62"];
  // const bubbles = 25; //ORIGINAL FROM CODEPEN
  const bubbles = 50;

  const explode = (x, y) => {
    let particles = [];
    let ratio = window.devicePixelRatio;
    let c = document.createElement("canvas");
    let ctx = c.getContext("2d");

    //ORIGINAL FROM CODEPEN
    // c.style.position = 'absolute';
    // c.style.left = (x - 100) + 'px';
    // c.style.top = (y - 100) + 'px';
    // c.style.pointerEvents = 'none';
    // c.style.width = 200 + 'px';
    // c.style.height = 200 + 'px';
    // c.style.zIndex = 100;
    // c.width = 200 * ratio;
    // c.height = 200 * ratio;
    c.style.position = "absolute";
    c.style.left = x - 100 + "px";
    c.style.top = y - 100 + "px";
    c.style.pointerEvents = "none";
    c.style.width = 200 + "px";
    c.style.height = 200 + "px";
    c.style.zIndex = 150;
    c.width = 200 * ratio;
    c.height = 200 * ratio;
    document.body.appendChild(c);

    for (var i = 0; i < bubbles; i++) {
      particles.push({
        x: c.width / 2,
        y: c.height / 2,
        radius: r(20, 30),
        color: colors[Math.floor(Math.random() * colors.length)],
        rotation: r(0, 360, true),
        // speed: r(8, 12),
        speed: r(12, 8),
        friction: 0.9,
        opacity: r(0, 1, true),
        yVel: 0,
        gravity: 0.1
      });
    }

    render(particles, ctx, c.width, c.height);
    setTimeout(() => document.body.removeChild(c), 1000);
  };

  const render = (particles, ctx, width, height) => {
    requestAnimationFrame(() => render(particles, ctx, width, height));
    ctx.clearRect(0, 0, width, height);

    particles.forEach((p, i) => {
      p.x += p.speed * Math.cos((p.rotation * Math.PI) / 180);
      p.y += p.speed * Math.sin((p.rotation * Math.PI) / 180);

      p.opacity -= 0.01;
      p.speed *= p.friction;
      p.radius *= p.friction;
      p.yVel += p.gravity;
      p.y += p.yVel;

      if (p.opacity < 0 || p.radius < 0) return;

      ctx.beginPath();
      ctx.globalAlpha = p.opacity;
      ctx.fillStyle = p.color;
      ctx.arc(p.x, p.y, p.radius, 0, 2 * Math.PI, false);
      ctx.fill();
    });

    return ctx;
  };

  const r = (a, b, c) =>
    parseFloat(
      (Math.random() * ((a ? a : 1) - (b ? b : 0)) + (b ? b : 0)).toFixed(
        c ? c : 0
      )
    );

  //document.querySelector('.js-explosion').addEventListener('mouseover', e => explode(e.pageX, e.pageY));
  logo.addEventListener("mouseover", e => explode(e.pageX, e.pageY));
}
//END EXPLOSION ANIMATION FOR LOGO

//SLICK CAROUSEL FOR listen.html
//Slick carousel
$(document).ready(function () {
  //Responsive layout
  $('.responsive').slick({
    dots: true,
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
});