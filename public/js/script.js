/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
function calcPrice(dom, soLuong) {
  var val = $(dom).parent().find(".input-qty").val();
  val = parseInt(val);
  val = val + soLuong;
  $(dom).parent().find(".input-qty").val(val);
  var price = $(dom).attr("price");
  price = val * parseInt(price);
  $(dom).parent().parent().parent().find(".prodTotal p").html(price);
  $(dom).parent().parent().parent().find(".prodTotal").attr("total", price);
  var pid = parseInt($(dom).attr("pid"));
  $.post("/addCart", {
    productId: pid,
    quantity: soLuong
  }, function (data, status) {
    console.log(data);
  });
}

function calcPriceTong() {
  var products = $("ul.cartWrap li");
  var total = 0;

  for (var i = 0; i < products.length; i++) {
    var totalPrice = $(products[i]).find(".prodTotal").attr("total");
    totalPrice = parseInt(totalPrice);
    total += totalPrice;
  }

  $("#subTotal").html(total);
  $("#totalPrice").html(total + 35000);
}

jQuery(document).ready(function () {
  $(".orderStatus").on('change', function () {
    var link = $(this).attr("statuslink");
    link = link.replace("_status_", this.value);
    $.put(link, {}, function (data, status) {
      console.log(data);
    });
  });
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  jQuery("#backdrop").bind('click', function (e) {
    e.preventDefault();
    jQuery("#main-menu").removeClass("menu-show");
    jQuery("#backdrop").hide();
  });
  $("#mobile-menu").bind('click', function (e) {
    e.preventDefault();
    jQuery("#main-menu").addClass("menu-show");
    jQuery("#backdrop").show();
  });
  $('.blog-item').slick({
    dots: true,
    arrows: false,
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    }, {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    } // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });
  $("a.addCart").click(function (event) {
    event.preventDefault();
    var current = this;
    var pid = parseInt($(this).attr("pid"));
    var q = parseInt($(this).attr("q"));
    $.post("/addCart", {
      productId: pid,
      quantity: q
    }, function (data, status) {
      if (data.error === true) return;
      var startPosition = $(current).offset();
      var destinationPosition = $(".navbar-tool").offset();
      var img = $(current).parent().parent().find("img").clone();
      img.css({
        position: 'absolute',
        top: startPosition.top,
        left: startPosition.left,
        width: '50px'
      });
      $("body").append(img);
      img.animate({
        opacity: 0.3,
        top: destinationPosition.top,
        left: destinationPosition.left
      }, 2000, function () {
        img.remove();
        $(".cart-quantity").html(data.data);
      });
    });
  });
  $(".btnCong").click(function (event) {
    event.preventDefault();
    calcPrice(this, 1);
    calcPriceTong();
  });
  $(".btnTru").click(function (event) {
    event.preventDefault();
    calcPrice(this, -1);
    calcPriceTong();
  });
});
/******/ })()
;