"use strict";

/*------------------Preloader------------------*/

$(window).on( 'load', function() {

  $(".loader").delay(1000).fadeOut("slow");

});


$(document).ready( function() {

  /* Background Default */

    $("#slider").css('background-color', '#9ae1ff');
    $("#sun").attr("src", "img/home/sun.png");
    $("#globe").attr("src", "img/home/globe.png");
    $("#cloud").attr("src", "img/home/clouds.png");
    $("#overlay_slider_land").addClass('slider_footer_v1').removeClass('slider_footer_v2 slider_footer_v3 slider_footer_v4');

  /* Background V1 */

  /*
    $("#slider").css('background-color', '#94d8ff');
    $("#sun").attr("src", "img/home/sun.png");
    $("#globe").attr("src", "");
    $("#cloud").attr("src", "img/home/clouds_1.png");
    $("#overlay_slider_land").addClass('slider_footer_v1').removeClass('slider_footer_v2 slider_footer_v3 slider_footer_v4');
  */

  /* Background V2 */

  /*
    $("#slider").css('background-color', '#94d8ff');
    $("#sun").attr("src", "img/home/sun.png");
    $("#globe").attr("src", "");
    $("#cloud").attr("src", "img/home/clouds_2.png");
    $("#overlay_slider_land").addClass('slider_footer_v1').removeClass('slider_footer_v2 slider_footer_v3 slider_footer_v4');
  */

  /* Background V3 */

  /*
    $("#slider").css('background-color', '#94d8ff');
    $("#sun").attr("src", "img/home/sun_v2.png");
    $("#globe").attr("src", "");
    $("#cloud").attr("src", "img/home/clouds_5.png")
    $("#overlay_slider_land").addClass('slider_footer_v1').removeClass('slider_footer_v2 slider_footer_v3 slider_footer_v4');
  */

  /* Background V4 */

  /*
    $("#slider").css('background-color', '#0f5b8e');
    $("#sun").attr("src", "img/home/sun_without.png");
    $("#globe").attr("src", "");
    $("#cloud").attr("src", "img/home/clouds_3.png")
    $("#overlay_slider_land").addClass('slider_footer_v1').removeClass('slider_footer_v2 slider_footer_v3 slider_footer_v4');
  */

  /* Background V5 */

  /*
    $("#slider").css('background-color', '#0f5b8e');
    $("#sun").attr("src", "img/home/sun_without.png");
    $("#globe").attr("src", "");
    $("#cloud").attr("src", "img/home/clouds_3.png")
    $("#overlay_slider_land").addClass('slider_footer_v4').removeClass('slider_footer_v1 slider_footer_v2 slider_footer_v3');
  */

  /* Background V6 */

  /*
    $("#slider").css('background-color', '#94d8ff');
    $("#sun").attr("src", "img/home/sun.png");
    $("#globe").attr("src", "");
    $("#cloud").attr("src", "img/home/clouds_1.png");
    $("#overlay_slider_land").addClass('slider_footer_v4').removeClass('slider_footer_v1 slider_footer_v2 slider_footer_v3');
  */

  /* Background V7 */

  /*
    $("#slider").css('background-color', '#3baade');
    $("#sun").attr("src", "img/home/sun_without.png");
    $("#globe").attr("src", "");
    $("#cloud").attr("src", "img/home/clouds_4.png")
    $("#overlay_slider_land").addClass('slider_footer_v4').removeClass('slider_footer_v1 slider_footer_v2 slider_footer_v3');
  */

  /* Background V8 */

  /*
    $("#slider").css('background-color', '#94d8ff');
    $("#sun").attr("src", "img/home/sun.png");
    $("#globe").attr("src", "");
    $("#cloud").attr("src", "img/home/clouds_2.png");
    $("#overlay_slider_land").addClass('slider_footer_v2').removeClass('slider_footer_v1 slider_footer_v3 slider_footer_v4');
  */

  /* Background V9 */

  /*
    $("#slider").css('background-color', '#9ae1ff');
    $("#sun").attr("src", "img/home/sun.png");
    $("#globe").attr("src", "img/home/globe.png");
    $("#cloud").attr("src", "img/home/clouds.png");
    $("#overlay_slider_land").addClass('slider_footer_v2').removeClass('slider_footer_v1 slider_footer_v3 slider_footer_v4');
  */

  /* Background V10 */

  /*
    $("#slider").css('background-color', '#94d8ff');
    $("#sun").attr("src", "img/home/sun.png");
    $("#globe").attr("src", "");
    $("#cloud").attr("src", "img/home/clouds_2.png");
    $("#overlay_slider_land").addClass('slider_footer_v3').removeClass('slider_footer_v2 slider_footer_v1 slider_footer_v4');
  */

  /* Background V11 */

  /*
    $("#slider").css('background-color', '#9ae1ff');
    $("#sun").attr("src", "img/home/sun.png");
    $("#globe").attr("src", "img/home/globe.png");
    $("#cloud").attr("src", "img/home/clouds.png");
    $("#overlay_slider_land").addClass('slider_footer_v3').removeClass('slider_footer_v2 slider_footer_v1 slider_footer_v4');
  */ 

    var h_hght = 105; 
    var h_mrg = 0;    

    var elem = $('.mnu_fixed');
    var top = $(this).scrollTop();
     
    if(top > h_hght){
        elem.css('top', h_mrg);
        $('header').addClass('header_fixed');
    }  
    $(window).on( 'scroll', function() {
        top = $(this).scrollTop();
         
        if (top+h_mrg < h_hght) {
            elem.css('top', (h_hght-top));
            $('header').removeClass('header_fixed');
        } else {
            elem.css('top', h_mrg);
            $('header').addClass('header_fixed');
        }
    });

/*------------------ Slide Sidebar ------------------*/

    $('#sidebar').stick_in_parent({
        offset_top: 70,
        parent: ".row",
    });

/*------------------ Validate Contact Form ------------------*/

    if($('#contact_form').length){
    $('#contact_form').validate({
      rules: {
        name: {
          required: true
        },
        username: {
          required: true
        },
        email: {
          required: true,
          email: true
        },
        phone: {
          required: true,
          number: true
        },
        phone_error: {
          required: true,
          number: true
        },
        message: {
          required: false
        }
      },
      messages: {
                name: "Please let us know who you are.",
                email: "A valid email will help us get in touch with you.",
                phone: "Please provide a valid phone number.",
                phone_error: "Please provide a valid phone number.",
            }
    });
  }

  if($('#contact_form_footer').length){
    $('#contact_form_footer').validate({
      rules: {
        email: {
          required: true,
          email: true
        }
      },
      messages: {
                email: "A valid email will help us get in touch with you.",
            }
    });
  }

  $("a.btnopen").on("click", function() {
     $(".input_search").animate({width: "show", opacity: 1}, {queue: false, duration: 500});
      $(".btnsearch, .btnclose").delay(200).show(400);
      $(".btnopen").animate({width: "hide", opacity: 0}, {queue: false, duration: 0});
     $(".mnu").fadeOut();
  });
  $("a.btnclose").on("click", function() {
     $(".input_search").animate({width: "hide", opacity: 0}, {queue: false, duration: 300});
     $(".btnsearch, .btnclose").delay(100).hide(100);
     $(".btnopen").animate({width: "show", opacity: 1}, {queue: false, duration: 0});
     $(".mnu").delay(200).fadeIn();
});

/*------------------ Animate Serch ------------------*/

  $(".ui_mnu_first .input_search").show();

/*------------------ Animate WOW ------------------*/

  new WOW().init();

/*------------------ Scroll Menu------------------*/

  $(".scrollup, .scrollpage").mPageScroll2id(); 

  /*------------------ Button to Top------------------*/
  
  $(window).on( 'scroll', function(){
    if ($(this).scrollTop() > 100) {
      $('.scrollup').fadeIn();
    } else {
      $('.scrollup').fadeOut();
    }
  }); 

  /*------------------ Mobile Main Menu ------------------*/

 $(".toggle-mnu").on( 'click', function(){
    $(this).toggleClass("on");
    $(".top_mnu").slideToggle();
    return false;
  });

   $(".drop1_mnu").on( 'click', function(){
    $(this).toggleClass("on");
    $(".drop_mnu1").slideToggle();
    return false;
  });
     $(".drop2_mnu").on( 'click', function(){
    $(this).toggleClass("on");
    $(".drop_mnu2").slideToggle();
    return false;
  });
    $(".drop3_mnu").on( 'click', function(){
    $(this).toggleClass("on");
    $(".drop_mnu3").slideToggle();
    return false;
  });
    $(".drop4_mnu").on( 'click', function(){
    $(this).toggleClass("on");
    $(".drop_mnu4").slideToggle();
    return false;
  });
    $(".drop5_mnu").on( 'click', function(){
    $(this).toggleClass("on");
    $(".drop_mnu5").slideToggle();
    return false;
  });
     $(".drop6_mnu").on( 'click', function(){
    $(this).toggleClass("on");
    $(".drop_mnu6").slideToggle();
    return false;
  });
    $(".drop7_mnu").on( 'click', function(){
    $(this).toggleClass("on");
    $(".drop_mnu7").slideToggle();
    return false;
  });

  /*------------------ Sliders Settings ------------------*/ 

  $('#slider_home').sliderPro({
      width: 1120,
      height: 400,
      arrows: true,
      buttons: false,
      waitForLayers: true,
      fade: true,
      autoplay: true,
      autoScaleLayers: false,
      fadeDuration: 1000,
      fadeArrows: false,
      autoHeight: true,
      breakpoints: {
        768: {
          arrows: false
        },
        640: {
          arrows: false
        }
      }
    });

  
$("#teacher_owl").owlCarousel({
 
      nav: true, // показывать кнопки next и prev 
      navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
      dots: false,      
      slideSpeed : 300,
      paginationSpeed : 400,
      items : 2, 
      itemsDesktop : false,
      itemsDesktopSmall : false,
      itemsTablet: false,
      itemsMobile : false,
      mouseDrag: false,
      loop: true,
      responsiveClass:true,
      responsive:{
        0:{
            items:1,
            nav:false,
            mouseDrag: true
        },
        600:{
            items:1,
            nav:false,
            mouseDrag: true
        },
        1000:{
            items:2,
            mouseDrag: true
        }
    }
  });

$("#stories_owl").owlCarousel({
 
      nav: true, // показывать кнопки next и prev 
      navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
      dots: false,      
      slideSpeed : 300,
      paginationSpeed : 400,
      itemsDesktop : false,
      itemsDesktopSmall : false,
      mouseDrag: false,
      itemsTablet: false,
      itemsMobile : false,
      loop: true,
       responsiveClass:true,
      responsive:{
        0:{
            items:1,
            nav:false,
            mouseDrag: true
        },
        600:{
            items:2,
            nav:false,
            mouseDrag: true
        },
        1000:{
            items:3,
            mouseDrag: true
        }
    }
 
  });

$("#about_teacher_owl, #single_event_gallery").owlCarousel({
 
      nav: true, // показывать кнопки next и prev 
      navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
      dots: false,      
      slideSpeed : 300,
      paginationSpeed : 400,
      itemsDesktop : false,
      itemsDesktopSmall : false,
      mouseDrag: false,
      itemsTablet: false,
      itemsMobile : false,
      loop: true,
      responsiveClass:true,
      responsive:{
        0:{
            items:1,
            nav:false,
            mouseDrag: true
        },
        600:{
            items:3,
            nav:false,
            mouseDrag: true
        },
        1000:{
            items:4,
            mouseDrag: true
        }
    }
  });
 
  /*------------------ Portfolio Settings ------------------*/  

  $('.portfolio_grid, .comment_grid').each(function() {
        var $container = $(this);
        $container.imagesLoaded(function() {
            $container.isotope({
                itemSelector: '.portfolio_grid_item, .comment_grid_item',
                layoutMode: 'masonry',
                masonry: {
                    columnWidth: '.portfolio_grid_item, .comment_grid_item'
                }
            });
        });
    });
    $('.filter a').on('click', function() {
        $('.filter .active').removeClass('active');
        $(this).closest('li').addClass('active');
        var selector = $(this).attr('data-filter');
        $('.portfolio_grid, .comment_grid').isotope({
            filter: selector,
            animationOptions: {
                duration: 500,
                queue: false
            }
        });
        return false;
    });

  /*------------------ Index Timer ------------------*/ 

  $("#index_timer")
  .countdown("2018/12/12", function(event) { /* change date */
    $(this).html(
      event.strftime(' <div class="time">%D<span class="label">days</span></div>' 
       + '<div class="time">%H<span class="label">hours</span></div>'
       + '<div class="time dots">%M<span class="label">minutes</span></div>'
       + '<div class="time dots">%S<span class="label">seconds</span></div>')
    );
  });

/*------------------ Event Page Timer ------------------*/ 

    $("#register_timer")
  .countdown("2018/12/12", function(event) { /* change date */
    $(this).html(
      event.strftime(' <div class="time">%D<span class="label">days</span></div>' 
       + '<div class="time">%H<span class="label">hours</span></div>'
       + '<div class="time dots">%M<span class="label">minutes</span></div>'
       + '<div class="time dots">%S<span class="label">seconds</span></div>')
    );
  });

  /*------------------ Collaps Settings ------------------*/  

  $('.panel-heading a').on("click", function() {
    $('.panel-heading').removeClass('actives');
    $(this).parents('.panel-heading').addClass('actives'); 
 });

/*------------------ Popup Settings ------------------*/  

  $('.link').magnificPopup({
        type:'image',
        titleSrc: 'title',
        mainClass: 'gallery_popup',
        gallery:{enabled:true}
    });

  $('.teacher_link_img').magnificPopup({
        type:'image',
        gallery:{enabled:false}
    });

  $('.register-form').magnificPopup({
    type: 'inline',
    focus: '#name',
    mainClass: 'register_popup',
    closeOnBgClick: true
  });

  $('.popup-youtube').magnificPopup({
    type: 'iframe',
    mainClass: 'popup_close',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

/*------------------ Shop Slider ------------------*/ 

$('.single_img_big').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.block_img'
});
   
$('.block_img').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  asNavFor: '.single_img_big',
  dots: false,
  focusOnSelect: true
});

/*------------------ Vertical Slider ------------------*/ 

  $('.certificate').slick({
    infinite: true,
    dots: false,
    slidesToShow: 3,
    vertical: true,
    slidesToScroll: 1,
    nextArrow: '<div class="down"><i class="fa fa-angle-down"></div></i>',
    prevArrow: '<div class="up"><i class="fa fa-angle-up"></div></i>'
  });  


/*------------------CountUp------------------*/

$('.counter').countUp({
  'time': 2000,
  'delay': 10
})

/*------------------ Price Filter ------------------*/ 

 $( function() {
        var slider_range = '#slider-range';
        var amount1 = '#amount1';
        var amount2 = '#amount2';
        $(slider_range).slider({
            range: true,
            min: 0,
            max: 1000,
            values: [99, 799],
            slide: function (event, ui) {
                $(amount1).val(ui.values[0]);
                $(amount2).val(ui.values[1]);
            }
        });
        $(amount1).val($(slider_range).slider("values", 0));
        $(amount2).val($(slider_range).slider("values", 1));
  } );

 $('#slider-range .ui-slider-handle').draggable();

 $( function() {
    var spinner = $( ".item_buy input" ).spinner({
      min: 0,
      icons: { down: "ui-icon-caret-1-s", up: "ui-icon-caret-1-n" }
    });
    
    $( "button" ).button();
  } );

$(function() {
   $('li.icon_search').on("click", function() {
      $(this).toggleClass('searchform')
   })
});


$("a.topcat").on("click", function() {
    
    $current = $(this).next("ul.menu-sub");
    $current.animate({width: "show", opacity: 1}, {queue: false, duration: 1000});
    $("ul.menu-sub").not($current).animate(
        {width: "1", opacity: 0},
        {
         queue: false,
         duration: 1000,
         complete: function(){
            $(this).removeAttr('style')
            }
        });
  });
      $('.parallax-layer').parallax({
        mouseport: $("#port")
      });        
});

/*------------------ Google Maps Settings ------------------*/ 

var marker;
var marker_home = 'img/icons/marker.png';
var marker_event = 'img/icons/marker_event.png';

/* Map on index.html */

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 14,
    center: {lat: 30.533600, lng: -87.214598},
    scrollwheel: false,
    disableDefaultUI: true
  });

  marker = new google.maps.Marker({
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: {lat: 30.533600, lng: -87.214598},
    icon: marker_home
  });

}

function initMap_contact() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 14,
    center: {lat: 30.533600, lng: -87.214598},
    scrollwheel: false  
  });

  marker = new google.maps.Marker({
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: {lat: 30.533600, lng: -87.214598},
    icon: marker_home
  });

}

function initMap_event() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 14,
    center: {lat: 30.533600, lng: -87.214598},
    scrollwheel: false  
  });

  marker = new google.maps.Marker({
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: {lat: 30.533600, lng: -87.214598},
    icon: marker_event
  });

  var contentString = '<div class="event_map_content">'+
      '<p>121 King St, Melbourne VIC 3000, Tampa, FR 954816</p>'
      + '</div>';

  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });

    infowindow.open(map, marker);

    marker.addListener('click', function() {
    infowindow.open(map, marker);
  });

}

function initMap_footer() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 14,
    center: {lat: 30.535966, lng: -87.222237},
    scrollwheel: false  
  });

  marker = new google.maps.Marker({
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: {lat: 30.533600, lng: -87.214598},
    icon: marker_home
  });

}
