$( document ).ready(function() {
    $( window ).scroll(function() {
        if (window.pageYOffset >= 50) {
            $("#fixed-navbar").addClass("fixed-nav");
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
        } else {
            $(".hero-menu").removeClass("fixed-hero-menu");
        }
    });
}); 


(function(d) {
  var config = {
    kitId: 'tjs1nfr',
    scriptTimeout: 3000,
    async: true
  },
  h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);


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




// check-box


function checkDifferentAddress() {
  var checkBox = document.getElementById("ship-to-different-address-checkbox");
  var check = document.getElementById("shipping_address");
  if (checkBox.checked == true){
    check.style.display = "block";
  } else {
     check.style.display = "none";
  }
}

// check radio buuton

function checkFunction() {
  var checkBox1 = document.getElementById("payment_method_cod");
  // var checkBox2 = document.getElementById("payment_method_paypal");
  var check1 = document.getElementById("payment_method_cod1");
  var check2 = document.getElementById("payment_method_paypal1");
  if (checkBox1.checked == true){
    check1.style.display = "block";
    check2.style.display = "none";
  } 
  else{
    check1.style.display = "none";
    check2.style.display = "block";
  }
}


///

function openIngredient(element, name, name2) {
  $('.tablinks').parent().removeClass('active');
  $('.tabpane').hide();
  $('#' + name2).show();
  $('#' + name).addClass('active');
  $(element).parent().addClass('active'); 
}
