$( document ).ready(function() {
    $( window ).scroll(function() {
        if (window.pageYOffset >= 50) {
            $("#fixed-navbar").addClass("fixed-nav");
            console.log("hello")
        } else {
            $("#fixed-navbar").removeClass("fixed-nav");
        }
    });
});

// fixed hero-menu

$( document ).ready(function() {
    $( window ).scroll(function() {
        if (window.pageYOffset >= 400) {
            $(".hero-menu").addClass("fixed-hero-menu");
            console.log("hello")
        } else {
            $(".hero-menu").removeClass("fixed-hero-menu");
        }
    });
});


// slide

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("testimonial-item");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
