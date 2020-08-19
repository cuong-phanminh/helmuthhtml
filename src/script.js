$(document).ready(function () {

  $('a[name^="remove_product"]').on("click", function () {
    const rmid = $(this).attr('id').substring(3);
    remove_product_iterm(rmid)
  })

  $('input[name^="pro_quantity"]').on("change", function () {
    const id = $(this).attr('id')
    testChange(id)
  })

  // fixed header menu anddisplay none header top bar
  $(window).scroll(function () {
    if (window.pageYOffset >= 50) {
      $("#fixed-navbar").addClass("fixed-nav");
      $("#header-topbar").addClass("topbar_none");
    } else {
      $("#fixed-navbar").removeClass("fixed-nav");
      $("#header-topbar").removeClass("topbar_none");
    }
  });


  // fixed hero menu
  $(window).scroll(function () {
    if (window.pageYOffset >= 400) {
      $(".hero-menu").addClass("fixed-hero-menu");
    } else {
      $(".hero-menu").removeClass("fixed-hero-menu");
    }
  });


  // get id to add product iterm
  $('input[name^="pro_quantity"]').on("change", function () {
    const id = $(this).attr('id')
    change(id);
  });

  $("#id").click(function () {
    // load home page on click
    $("#response").html($('body').load("cart.php"));
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
  if (n > x.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = x.length }
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex - 1].style.display = "block";
}


// check-box
function checkDifferentAddress() {
  var checkBox = document.getElementById("ship-to-different-address-checkbox");
  var check = document.getElementById("shipping_address");
  if (checkBox.checked == true) {
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
  if (checkBox1.checked == true) {
    check1.style.display = "block";
    check2.style.display = "none";
  }
  else {
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


//post value id product iterm

function testChange(id) {
  const quantity = $(`#${id}`).val()
  $.ajax({
    type: "POST",
    url: './actionajax.php',
    data: `id=${id}&quantity=${quantity}`,
    success: function (data) {
      $("body").load("cart.php");
    },
    error: function (error) {
      console.log("error", error)
    }
  });
}

function remove_product_iterm(id) {
  $.ajax({
    type: "POST",
    url: './actionajax.php',
    data: `id=${id}&action=remove`,
    success: function (data) {
      console.log("functionremove_product_iterm -> data", data)
      $("body").load("cart.php");
    },
    error: function (error) {
      console.log("error", error)
    }
  });
}












