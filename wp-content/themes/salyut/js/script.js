
 $(document).ready(function(){
  $('.page-numbers').addClass("large_batteries_of_fireworks_pagination_item_link pagination_item");
});

$("#js-range-slider1").ionRangeSlider({
    type: "double",
    min: 100,
    max: 250000,
    from: 100,
    to: 250000,
    step: 1,
    grid: true,
});



$("#js-range-slider2").ionRangeSlider({
    type: "double",
    min: 9.00,
    max: 180.00,
    from: 9.00,
    to: 180.00,
    step: 9.00,
    grid: true,
});


$("#js-range-slider3").ionRangeSlider({
    type: "double",
    min: 7.00,
    max: 300.00,
    from: 7.00,
    to: 300.00,
    step: 7.00,
    grid: true,
});


$("#js-range-slider4").ionRangeSlider({
    type: "double",
    min: 0.6,
    max: 2.00,
    from: 0.6,
    to: 2.00,
    grid: true,
    step: 0.1
});


$("#js-range-slider5").ionRangeSlider({
    type: "double",
    min: 499,
    max: 43890,
    from: 499,
    to: 43890,
    step: 499,
    grid: true,
});


$("#js-range-slider6").ionRangeSlider({
    type: "double",
    min: 9.00,
    max: 180.00,
    from: 9.00,
    to: 180.00,
    step: 9.00,
    grid: true,
});

$("#js-range-slider7").ionRangeSlider({
    type: "double",
    min: 7.00,
    max: 300.00,
    from: 7.00,
    to: 300.00,
    step: 7.00,
    grid: true,
});

$("#js-range-slider8").ionRangeSlider({
    type: "double",
    min: 0.6,
    max: 2.00,
    from: 0.6,
    to: 2.00,
    grid: true,
    step: 0.1
});




$(document).on("change", ".catalogue_check_input",function(){
    $(this).parent().toggleClass("active");
})

// .toggle().animate({top: "48px"}, 0.5);

$(document).on("click", ".effects_title_svg_wrapper",function(){
    $(this).parent().toggleClass("open");
    $(this).parent().find(".effects_hiiden_div").slideToggle("0.5");
})


$(document).on("click", ".color_title_svg_wrapper", function(){
    $(this).parent().toggleClass("open");
     $(this).parent().find(".color_hiiden_div").slideToggle("0.5");
})

$(document).on("change", ".color_type_input_check", function(){
    $(this).parent().toggleClass("active");
})


$(document).on("click", ".manufacturer_types_title_svg_wrapper", function(){
    $(this).parent().toggleClass("active");
      $(this).parent().find(".manufacturer_hidden_div").slideToggle("0.5");
    
})

$(document).on("change", ".manufacturer_ckeck_input", function(){
    $(this).parent().toggleClass("active");
})



$(document).on("change", ".search_filter_region_input", function(){
    if($(this).parent().hasClass("active")){
        $(this).closest('.search_regions_parent_wrapper').find('.search_regions_cities_check_input_wrapper').find('input').prop( "checked",  false );
        $(this).closest('.search_regions_parent_wrapper').find('.search_regions_cities_check_input_wrapper').removeClass("active");
    }else{
        $(this).closest('.search_regions_parent_wrapper').find('.search_regions_cities_check_input_wrapper').find('input').prop( "checked",  true );
        $(this).closest('.search_regions_parent_wrapper').find('.search_regions_cities_check_input_wrapper').addClass("active");
    }
})

$(document).on("click", ".pagination_item", function(){
    $(this).toggleClass("active");
})

$(document).on("click", ".effects_title_svg_wrapper", function(){
    $(this).parent().toggleClass("active");
})


$(document).on("click", ".hamburger-menu", function(){
    
    $('.mobile_version').animate({left: '0'}, 0.5);
    $(".hamburger-menu_close").addClass("open");
    $(this).hide();
    $("body").addClass("hidden_body");
    $(".swiper-btns-wrapper").addClass("open");
  
});

$(document).on("click", ".hamburger-menu_close", function(){
  
    $('.mobile_version').animate({left: '-980px'}, 0.5);
     $(this).removeClass("open");
    $(".hamburger-menu").show();
    $("body").removeClass("hidden_body");
    $(".swiper-btns-wrapper").removeClass("open");
  
});


$(document).on("click", "#firework", function(){
    $(".fireworks_types_catalogue_names").animate({right: '0'},0.5);
      $("body").addClass("hidden_body");
     
})

$(document).on("click", ".fireworks_types_catalogue_names_btn", function(){
    // $('.mobile_version').slideDown();
    $(".fireworks_types_catalogue_names").attr('style', '');
    $(".fireworks_types_catalogue_names").animate({right: '-2000px', },0.5);
      $("body").addClass("hidden_body");
    
})



$("#firework_types_second_ul_list_btn").mouseenter( function(){
    $(".firework_types_second_list_wrapper").slideDown("fast");
})

$(".firework_types_second_list_wrapper").mouseleave( function(){
    $(".firework_types_second_list_wrapper").slideUp("fast");
})




$(document).on("click", ".firework_sort_by_icon_title_wrapper", function(){
    $(".firework_sort_by_hidden_box").toggle().animate({top: "48px"}, 0.5);
    $(this).parent().toggleClass("open");
})

$(document).on("click", ".firework_filter_icon_title_wrapper", function(){
    $(".filter_modal").animate({left: '0'}, 0.5);
    $("body").addClass("hidden_body");
    $(".mobile_large_batteries_of_fireworks_catalogue_wrapper").css("overflow", "hidden");
})

$(document).on("click", ".filter_modal_close_icon", function(){
    $(".filter_modal").animate({left: '-2000px'}, 0.5);
    $("body").removeClass("hidden_body");
    $(".mobile_large_batteries_of_fireworks_catalogue_wrapper").css("overflow", "unset");
})

$(document).on("click", ".fireworks_catalogue_form_remove_btn", function(){
    $(".catalogue_check_input").prop( "checked", false );
    $(".color_type_input_check").prop( "checked", false );
    $(".manufacturer_ckeck_input").prop( "checked", false );
    $(".js-range-slider ").val("");
    $(".fireworks_catalogue_form_input_checkbox ").removeClass("active");
    $(".color_type_input_check_wrapper").removeClass("active"); 
    $(".manufacturer_input_check_wrapper").removeClass("active"); 
    $(".from ").css("left", "0");
    $(".to").css("position", "relative").css("right", "0");
    $(".irs-bar").css("width", "100%").css("left", "0");
   
})




$(document).on("change", ".effects_type_input_check",function(){
    $(this).parent().toggleClass("active");
})





//  $(document).on("click", ".fireworks_main_types_catalogue_item_img_video_wrapper", function(){
//     $(".fireworks_main_types_catalogue_item_img_video_wrapper").removeClass("open");
//     $(this).addClass("open");
//  });
var w = window.innerWidth;
if(w <= 1024) {
    $(".fireworks_main_types_catalogue_item_img_video_wrapper").click(function(){
       $(".fireworks_main_types_catalogue_item").removeClass("open");
        $(this).parent().addClass("open");
    })

} else {
    $(".fireworks_main_types_catalogue_item_img_video_wrapper").mouseenter(function(){
       $(".fireworks_main_types_catalogue_item").removeClass("open");
        $(this).parent().addClass("open");
    })

}


// $(".fireworks_main_types_catalogue_item_img_video_wrapper").mouseenter(function(){
//   $(".fireworks_main_types_catalogue_item").removeClass("open");
//     $(this).parent().addClass("open");
// })



// $(document).on("click", ".black_heart", function(){
//      $(this).parent().toggleClass("open");
// })

$(document).on("click", ".black_cart", function(){
     $(this).parent().toggleClass("open");
})
$(document).on("click", ".red_cart", function(){
     $(this).parent().toggleClass("open");
})



// $(document).on("click", ".red_heart", function(){
//      $(this).parent().toggleClass("open");
// })


$(document).on("click", ".firework_city_header_phone_info2", function(){
    
    $(".call_modal").addClass("open");
        $(".call_modal").fadeIn(300);
    // $(".call_modal").show(500);
    //   $(".call_modal_wrapper").animate({top: '0', },0.5);
    //   $("body").addClass("hidden_body");
   
    
})


$(document).on("click", ".call_modal_close", function(){
    $(".call_modal").removeClass("open");
        $(".call_modal").fadeOut(300);
    //   $(".call_modal_wrapper").animate({top: '-250px', },0.5);
    $("body").removeClass("hidden_body"); 
})

    $("body").click(function (event) {
        if($(event.target).hasClass("call_modal")){
           $(".call_modal").fadeOut(300);
          $("body").removeClass("hidden_body"); 
        }
     
    });


$(document).on("click", "#firework_product_type_link", function(){
    $(".photo_modal").addClass("open");
    $(".photo_modal_wrapper").animate({top: '0', },"fast");
    $("body").addClass("hidden_body");
})


$(document).on("click", ".photo_modal_close", function(){
    $(".photo_modal").removeClass("open");
       $(".photo_modal_wrapper").animate({top: '-500px', },"fast");
    $("body").removeClass("hidden_body"); 
})

    $("body").click(function () {
       $(".photo_modal").removeClass("open");
       $("body").removeClass("hidden_body"); 

    });

$(document).on("click", ".fireworks_main_types_catalogue_item_details_cart_btn", function(){
   
    $(this).parent().find(".fireworks_main_types_catalogue_item_details_cart_number_btns_wrapper").addClass("open");
    $(this).parent().find(".fireworks_main_types_catalogue_item_details_cart_btn").hide();
    $(".fireworks_main_types_catalogue_item_details_cart_number").val(1);
})





//minus_plus button's fucntional part

    $(document).on('click', ".cart_minus_btn", function(e) {
    
      var $this = $(this);
      var $input = $this.parent().find(".fireworks_main_types_catalogue_item_details_cart_number");
      var value = parseInt($input.val());
        if(value > 0 ){
            value = value - 1;
            $input.val(value);
        }
          if(value == 0 ){
            $(this).parent().removeClass("open");
             $(this).closest(".fireworks_main_types_catalogue_item_details_price_cart_wrapper").find(".fireworks_main_types_catalogue_item_details_cart_btn").show();
             
        }
    });

    $(document).on('click', ".cart_plus_btn", function() {
  
      var $this = $(this);
      var $input = $this.parent().find('.fireworks_main_types_catalogue_item_details_cart_number');
      var value = parseInt($input.val());
        value = value + 1;
        $input.val(value);
    
    });
    
    
    
    
    $(document).on("click", ".black_cart", function(){
        $(this).toggleClass("active");
    })
    
    
    
    
    $(document).on("click", ".close_video", function(){
        $(this).closest(".fireworks_main_types_catalogue_item").removeClass("open");
    })
    
    
    
    
    $(document).on("click", ".about_firework_product_type_img_btn_wrapper", function(){
        $(this).addClass("active");
        $(this).closest(".about_firework_product_type_img_video_btns_wrapper").find(".about_firework_product_type_img_div_wrapper ").addClass("open");
        $(this).closest(".about_firework_product_type_img_video_btns_wrapper").find(".about_firework_product_type_video_div_wrapper").removeClass("open");
        $(".about_firework_product_type_video_btn_wrapper").removeClass("active");
    
    })
    $(document).on("click", ".about_firework_product_type_video_btn_wrapper", function(){
        $(this).addClass("active");
         $(this).closest(".about_firework_product_type_img_video_btns_wrapper").find(".about_firework_product_type_video_div_wrapper").addClass("open");
         $(this).closest(".about_firework_product_type_img_video_btns_wrapper").find(".about_firework_product_type_img_div_wrapper ").removeClass("open");
          $(".about_firework_product_type_img_btn_wrapper").removeClass("active");
    })
    
    
    
    $(document).on("click", ".firework_product_type_description_specifications_title", function(){

  var data_id = $(this).data("id");
  $(".firework_product_type_description_specifications_title").removeClass("open");
  $(this).addClass("open");
   $("#first_title").removeClass("active");


   $(".firework_product_type_description_specifications_item").hide();
    $("#firework_product_type_open_div1").removeClass("open");
  $("#" + data_id).fadeIn(0.5);
})  









    $(document).on("click", ".favorites_item_title", function(){

  var data_id = $(this).data("id");
  $(".favorites_item_title").removeClass("open");
  $(this).addClass("open");
   $("#first_title1").removeClass("active");


   $(".favorites_items").hide();
    $("#favorites_open_item1").removeClass("open");
  $("#" + data_id).fadeIn(0.5);
  
})  



const swiper_third = new Swiper('#third_swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  slidesPerView: 3,



  // Navigation arrows
  navigation: {
    nextEl: '.swiper-btn-next3',
    prevEl: '.swiper-btn-prev3',
  },
  
     breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      324: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      330: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      340: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      350: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      360: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      370: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      380: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      400: {
        slidesPerView:2,
        spaceBetween: 10
      },
      420: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      426: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      440: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      450: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      460: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      470: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      480: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      500: {
        slidesPerView: 2,
        spaceBetween: 10
      },
       555: {
        slidesPerView: 2,
        spaceBetween: 10
      },
       556: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      600: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      700: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      800: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      801: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      900: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      1114: {
        slidesPerView: 2,
        spaceBetween: 10
      },
        1115: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1119: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1120: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1130: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1140: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1150: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1152: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1155: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1157: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1158: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1160: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1170: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1180: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1170: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1180: {
        slidesPerView:  3,
        spaceBetween: 10
      },
      1190: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1216: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1218: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1220: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1230: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1240: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1250: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1260: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1270: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1280: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1299: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1300: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1400: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1500: {
        slidesPerView:  3,
        spaceBetween: 10
      },
      1600: {
        slidesPerView:  3,
        spaceBetween: 10
      },
      1700: {
        slidesPerView:  3,
        spaceBetween: 10
      },
      1800: {
        slidesPerView:  3,
        spaceBetween: 10
      },
      1920: {
        slidesPerView:  3,
        spaceBetween: 10
      }
    }

});






const swiper = new Swiper('#first_swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  slidesPerView: 1,



  // Navigation arrows
  navigation: {
    nextEl: '.swiper-btn-next1',
    prevEl: '.swiper-btn-prev1',
  },

});




const swiper_second = new Swiper('#second_swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  slidesPerView: 3,



  // Navigation arrows
  navigation: {
    nextEl: '.swiper-btn-next2',
    prevEl: '.swiper-btn-prev2',
  },
  
      breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 10
      },
      324: {
        slidesPerView: 1,
        spaceBetween: 10
      },
      330: {
        slidesPerView: 1,
        spaceBetween: 10
      },
      340: {
        slidesPerView: 1,
        spaceBetween: 10
      },
      350: {
        slidesPerView: 1,
        spaceBetween: 10
      },
      360: {
        slidesPerView: 1,
        spaceBetween: 10
      },
      370: {
        slidesPerView: 1,
        spaceBetween: 10
      },
      380: {
        slidesPerView: 1,
        spaceBetween: 10
      },
      400: {
        slidesPerView: 1,
        spaceBetween: 10
      },
      420: {
        slidesPerView: 1,
        spaceBetween: 10
      },
      426: {
        slidesPerView: 1,
        spaceBetween: 10
      },
      440: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      450: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      460: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      470: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      480: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      500: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      600: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      700: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      800: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      801: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      900: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1000: {
        slidesPerView: 3,
        spaceBetween: 10
      },
        1001: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1119: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1120: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1130: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1140: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1150: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1152: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1155: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1157: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1158: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1160: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1170: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1180: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1170: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1180: {
        slidesPerView:  3,
        spaceBetween: 10
      },
      1190: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1216: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1218: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1220: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1230: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1240: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1250: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1260: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1270: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1280: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1299: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1300: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1400: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      1500: {
        slidesPerView:  3,
        spaceBetween: 10
      },
      1600: {
        slidesPerView:  3,
        spaceBetween: 10
      },
      1700: {
        slidesPerView:  3,
        spaceBetween: 10
      },
      1800: {
        slidesPerView:  3,
        spaceBetween: 10
      },
      1920: {
        slidesPerView:  3,
        spaceBetween: 10
      }
    }

});





$(document).on("click", ".open_video", function(){
    $(".bought_firework_today_modal").addClass("open");
    $(".fireworks_main_types_catalogue_item_video_wrapper").animate({top: '0', },"fast");
    $("body").addClass("hidden_body");
})


$(document).on("click", ".bought_firework_today_modal_close", function(){
    $(".bought_firework_today_modal").removeClass("open");
       $(".fireworks_main_types_catalogue_item_video_wrapper").animate({top: '-500px', },"fast");
    $("body").removeClass("hidden_body"); 
})

    $("body").click(function () {
       $(".bought_firework_today_modal").removeClass("open");
       $("body").removeClass("hidden_body"); 

    });
    
    
    
    
    
    
    
    
    
    //minus_plus button's fucntional part

    $(document).on('click', ".basket_item_box_cart_minus_btn", function(e) {
    
      var $this = $(this);
      var $input = $this.parent().find(".basket_item_box_cart_number");
      var value = parseInt($input.val());
        if(value > 0 ){
            value = value - 1;
            $input.val(value);
        }
        //   if(value == 0 ){
        //     $(this).parent().removeClass("open");
        //      $(this).closest(".fireworks_main_types_catalogue_item_details_price_cart_wrapper").find(".fireworks_main_types_catalogue_item_details_cart_btn").show();
        //      console.log(value)
        // }
    });

    $(document).on('click', ".basket_item_box_cart_plus_btn", function() {
  
      var $this = $(this);
      var $input = $this.parent().find('.basket_item_box_cart_number');
      var value = parseInt($input.val());
        value = value + 1;
        $input.val(value);
    
    });
    
    
    
     $("#phone_input").inputmask("+7(99) 99-99-99");
     $("#registration_form_phone_input").inputmask("+7(99) 99-99-99");
     $("#authorization_form_phone_input").inputmask("+7(99) 99-99-99");
     $("#user_personal_data_input_phone").inputmask("+7(99) 99-99-99");
    $("#email_input").inputmask({alias: "email"});
    $("#registration_form_email_input").inputmask({alias: "email"});
    $("#user_personal_data_input_mail").inputmask({alias: "email"});

    
    
    $(document).on("focus", ".ordering_details_enter_delivery_address_input_field", function(){
         $(".ordering_details_enter_delivery_address_input_field").removeClass("active");
         $(this).addClass("active");
    })
    
   
    
      $(document).on("focus", ".ordering_details_contact_information_input_field", function(){
         $(".ordering_details_contact_information_input_field").removeClass("active");
         $(this).addClass("active");
    })
    
    
       $(document).on("click", ".firework_city_header_search_form_wrapper", function(){
         $(".firework_city_header_search_form_wrapper").toggleClass("active");
        //  $(this).addClass("active");
    })
    
    
    
    

    
    
    $(document).on("change", ".ordering_details_radio_input", function(){
          $(".ordering_details_radio_label").removeClass("active");
          $(this).parent().find(".ordering_details_radio_label").addClass("active");
    })
    
    
    
        $(document).on("focus", ".registration_form_input_field", function(){
         $(".registration_form_input_field").removeClass("active");
         $(this).addClass("active");
    })
    
    
         $(document).on("focus", ".authorization_form_input_field", function(){
         $(".authorization_form_input_field").removeClass("active");
         $(this).addClass("active");
    })
    
    
       $(document).on("focus", ".user_personal_data_input_field", function(){
         $(".user_personal_data_input_field").removeClass("active");
         $(this).addClass("active");
    })
    
        $(document).on("focus", ".user_profile_password_info_input", function(){
         $(".user_profile_password_info_input").removeClass("active");
         $(this).addClass("active");
    })
    
   
    
   
    
    
    
    
    $(document).on("change", "#registration_form_checkbox_input", function(){
         $(this).parent().toggleClass("active");
    })
    
    
  $(document).on("click", ".user_profile_title", function(){

    var data_id = $(this).data("id");
    $(".user_profile_title").removeClass("open");
    $(this).addClass("open");
    $("#user_profile_title_first_title").removeClass("active");


    $(".user_profile_item").hide();
      $("#open_user_div1").removeClass("open");
    $("#" + data_id).fadeIn();
})  

    
    
        
        $(document).on("focus", ".call_modal_input_field", function(){
         $(".call_modal_input_field").removeClass("active");
         $(this).addClass("active");
    });
    
    
  
    
  $(".authorization_form_wrapper_email").hide(); 

$(".with_email").click(function(){

  $(".authorization_form_wrapper_phone").hide();
  $(".authorization_form_wrapper_email").show(); 

})
$(".with_phone").click(function(){

  $(".authorization_form_wrapper_email").hide();
  $(".authorization_form_wrapper_phone").show(); 

})




var like_product_ajax = true;
  
 $(document).on("click", ".fireworks_main_types_catalogue_item_details_icons1", function(){

  var thisis = $(this);
  
  if(like_product_ajax === true) {
      
      like_product_ajax = false;
      var product_id = $(this).find('.product_id').val();
      
        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {action: 'like_product' , product_id: product_id},
  
            success: function (response) {
              
              like_product_ajax = true;

              if (response.hasOwnProperty("like_hard")) {
           
                thisis.toggleClass("open");
               
              }
              if (response.hasOwnProperty("prod_count")) {
           
                console.log(response.prod_count);
                $(".like_count_header").html(response.prod_count);
              }
            }
        });
     
    }

  
});


$(document).on("click", ".author_login_phone_button", function(event){
  event.preventDefault();
  var phone = $('.author_login_phone_phone').val();
  var password = $('.author_login_phone_password').val();

  var valid = true;

  if (phone.length < 8) {

    valid = false;
    $('.author_login_phone_phone').addClass("active");
    $('.alert-error-phone').css("display", "block");
    $('.alert-error-phone').html("Телефон обязательное поле");

  }
  if (password.length < 4) {

    valid = false;
    $('.author_login_phone_password').addClass("active");
    $('.alert-error-password').css("display", "block");
    $('.alert-error-password').html("Пароль  обязательное поле");

  }

  if (!valid) {
    return false;
  }

     
   $.ajax({
       url: ajaxUrl,
       type: 'POST',
       data: {action: 'login_phone' , phone: phone, password: password},

       success: function (response) {
         
            if (response.hasOwnProperty("create_success")) {
           
              window.location=" http://salyut/мой-аккаунт/";
             
            }else if(response.hasOwnProperty("email_exists")){

              $('.phone_exist').css("display", "block");
              $('.phone_exist').html("Данный Телефон уже зарегистрирован"); 
              $("author_login_phone_phone").addClass("actived");
              $('.author_login_phone_phone').css("color", "red");

            }

       }
   });

});



$(document).on("click", ".author_login_email_button", function(event){
  event.preventDefault();
  var email = $('.author_login_email_email').val();
  var password = $('.author_login_email_password').val();

  var valid = true;

  if (email.length < 1) {

    valid = false;
    $('.author_login_email_email').addClass("active");
    $('.alert-error-email_email').css("display", "block");
    $('.alert-error-email_email').html("Email  обязательное поле");

} else {
    
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    if (!testEmail.test(email)) {

        valid = false;
        $('.author_login_email_email').addClass("active");
        $('.alert-error-email_email').css("display", "block");
        $('.alert-error-email_email').html("Введите действительный email");
    }

}
  if (password.length < 4) {

    valid = false;
    $('.author_login_email_password').addClass("active");
    $('.alert-error-email_password').css("display", "block");
    $('.alert-error-email_password').html("Пароль  обязательное поле");

  }

  if (!valid) {
    return false;
  }

     
   $.ajax({
       url: ajaxUrl,
       type: 'POST',
       data: {action: 'login_email' , email: email, password: password},

       success: function (response) {
         
            if (response.hasOwnProperty("create_success")) {
           
              window.location=" http://salyut/мой-аккаунт/";
             
            }else if(response.hasOwnProperty("email_exists")){

              $('.email_exist').css("display", "block");
              $('.email_exist').html("Данный Email уже зарегистрирован"); 
              $("author_login_email_email").addClass("actived");
              $('.author_login_email_email').css("color", "red");

            }

       }
   });

});


$('.password_changed_successfully_wrapper').hide();
$(document).on("click", ".user_chenge_password_button", function(event){
  event.preventDefault();
  var password = $('.user_chenge_password_input').val();
  var conpassword = $('.user_chenge_conpassword_input').val();

  var valid = true;

  if (password.length < 4) {

    valid = false;
    $('.user_chenge_password_input').addClass("active");
    $('.alert-error-empty_password').css("display", "block");
    $('.alert-error-empty_password').html("Пароль слишком короткий");
 }
  if (password !== conpassword ) {

    valid = false;
    $('.user_chenge_password_input').addClass("active");
    $('.user_chenge_conpassword_input').addClass("active");
    $('.alert-error-password_mismatch').css("display", "block");
    $('.alert-error-password_mismatch').html("Пароли не совпадают ");

  }

  if (!valid) {
    return false;
  }

     
   $.ajax({
       url: ajaxUrl,
       type: 'POST',
       data: {action: 'password_change_ajax' ,  password: password, conpassword: conpassword,},

       success: function (response) {
        
            if (response.hasOwnProperty("create_success")) {
           
              $('.password_changed_successfully_wrapper').show();
             
            }else if(response.hasOwnProperty("password_error")){

              $('.email_exist').css("display", "block");
              $('.email_exist').html("Данный Email уже зарегистрирован"); 
              $("author_login_email_email").addClass("actived");
              $('.author_login_email_email').css("color", "red");

            }

       }
   });

});




  $( document ).on( 'click', '.but_input_qty', function() {
    
      var id = $(this).parent().find( ".input_qty" ).attr( 'name' );
      var quantity = $(this).parent().find( ".input_qty" ).val();
   
          $.ajax({
              type: 'POST',
              url: ajaxUrl,
              data: {
                  action: 'qty_cart_qun',
                  id: id,
                  use_rewards:true, 
                  quantity: quantity
              },
              success: function(response) {
                
                if (response.hasOwnProperty("all_count")) {
                    
                    $('.cart_count').html(response.all_count);
                   
                }
                if (response.hasOwnProperty("total_price")) {
                 

                  $('.cart_prices').html(response.total_price);
                 
                }
              }
          });  

  });


  $( document ).on( 'click', '.fireworks_main_types_catalogue_item_details_price_cart_wrapper', function() {

      $.ajax({
        type: 'POST',
        url: ajaxUrl,
        data: {
            action: 'qty_cart_qun2'
            
        },
        success: function(response) {
          
          if (response.hasOwnProperty("all_count")) {
              
              $('.cart_count').html(response.all_count);
            
          }
          if (response.hasOwnProperty("total_price")) {
          

            $('.cart_prices').html(response.total_price);
          
          }
        }
    });

  })


  

 
  $(document).on("click", ".call_order_btn", function(event){
    event.preventDefault();
    var name = $('.call_inp_name').val();
    var phone = $('.call_inp_phone').val();
  
    var valid = true;
  

    if (name.length < 1) {
  
      valid = false;
      $('.call_inp_name').addClass("active");
      $('.call_inp_name_error').css("display", "block");
      $('.call_inp_name_error').html("введите ваше имя");
  
    }
    if (phone.length < 8) {
  
      valid = false;
      $('.call_inp_phone').addClass("active");
      $('.call_inp_phone_error').css("display", "block");
      $('.call_inp_phone_error').html("введите ваш телефон");
  
    }
  
    if (!valid) {
      return false;
    }
  
       
     $.ajax({
         url: ajaxUrl,
         type: 'POST',
         data: {action: 'call_order' , name: name, phone: phone},
  
         success: function (response) {
           
              if (response.hasOwnProperty("create_success")) {
                
                $('.call_modal_title').html("Спасибо, ваша заявка принята!");
               
              }else if(response.hasOwnProperty("phone_exists")){
  
                $('.call_inp_phone').addClass("active");
                $('.call_inp_phone_error').css("display", "block");
                $('.call_inp_phone_error').html("введите ваш телефон");
                
  
              }
  
         }
     });
  
  });



  $(document).ready(function(){
    $('.pay1').click(function(){
      $('#payment_method_cod').prop('checked', true);
    })
    $('.pay3').click(function(){
      $('#payment_method_bacs').prop('checked', true);
    })
    $('.pay2').click(function(){
      $('#payment_method_cheque').prop('checked', true);
    })



    $(".about_firework_product_type_img_btn_wrapper").click(function(){
      var img_url = $(this).find('.about_firework_product_type_btn_img').find('.gallery_img').attr('src');
      var big_img = $('.about_firework_product_type_img_div_wrapper').find('.big_img').attr("src", img_url );
      console.log(big_img);
    })
  })