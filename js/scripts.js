var loading=jQuery("#loadingDiv").hide();jQuery(document).ajaxStart(function(){loading.show()}).ajaxStop(function(){loading.hide()}),jQuery(document).ready(function(){var e=jQuery("#scroller-anchor"),t=jQuery("#cityguidenavstop"),o=jQuery("#guidecontent"),n=function(){var n=jQuery(window).scrollTop(),r=e.offset().top-125;n>r?(t.css({position:"fixed",top:"146px",width:"100%",left:"0",right:"0"}),o.css({margin:"150px 0px 0px 0px"})):r>=n&&(t.css({position:"relative",top:""}),o.css({margin:"0px 0px"}))};jQuery(window).scroll(n),n()}),jQuery(document).ready(function(){jQuery(".cityguidenav a").click(function(){return jQuery("html, body").animate({scrollTop:jQuery(jQuery(this).attr("href")).offset().top-200}),!1})}),jQuery("#menu-toggle").click(function(){jQuery(".navigation").toggle("slow",function(){})}),jQuery("#landingclose").click(function(){jQuery(".hotelalt").fadeOut(200),jQuery(".landing").animate({left:"-100%"},{duration:1e3})}),jQuery(function(){jQuery(".hotelalt").hide().delay(500).fadeIn(2200)}),jQuery(".featured-news-container").slick({infinite:!0,dots:!1,arrows:!1,autoPlay:!0,pauseOnHover:!1,autoplay:!0,fade:!0,cssEase:"linear"}),jQuery("#home-slides").slick({infinite:!0,dots:!1,arrows:!1,autoPlay:!0,pauseOnHover:!1,autoplay:!0,fade:!0,cssEase:"linear"}),jQuery(".apartment-single-slides").slick({infinite:!0,dots:!1,autoPlay:!0,pauseOnHover:!1,autoplay:!0,prevArrow:"#slider-left",nextArrow:"#slider-right"}),jQuery(".slider-nav").slick({slidesToShow:3,slidesToScroll:1,asNavFor:".apartment-single-slides",dots:!1,centerMode:!0,focusOnSelect:!0}),jQuery(document).ready(function(){jQuery("#testimonials-slider").slick({infinite:!0,dots:!1,autoPlay:!0,pauseOnHover:!0,autoplay:!0,speed:2e3,prevArrow:"#test-l",nextArrow:"#test-r",slidesToShow:4,slidesToScroll:1})}),jQuery("#contact-arrival input").datetimepicker({timepicker:!1,format:"d.m.Y"}),jQuery("#contact-departure input").datetimepicker({timepicker:!1,format:"d.m.Y"}),jQuery(".nav-tabs a").click(function(e){e.preventDefault(),jQuery(this).tab("show")}),jQuery("#toggleicons").on("click",function(){jQuery("#stepcorp1").animate({left:0},{duration:500})}),jQuery("#toggleicons").on("click",function(){jQuery("#stepcorp2").fadeIn("500")}),jQuery("#toggleicons").on("click",function(){jQuery("#stepcorp3").animate({right:0},{duration:500})}),jQuery("#togglegroup").on("click",function(){jQuery("#stepgroup1").animate({left:0},{duration:500})}),jQuery("#togglegroup").on("click",function(){jQuery("#stepgroup2").fadeIn("500")}),jQuery("#togglegroup").on("click",function(){jQuery("#stepgroup3").animate({right:0},{duration:500})}),jQuery(".searchpulldown").on("click",function(){jQuery(".archive-search").slideToggle()}),jQuery(document).ready(function(){jQuery(window).scroll(function(){var e=jQuery("#sticky"),t=jQuery(window).scrollTop();t>=10?e.addClass("sticky"):e.removeClass("sticky")})}),jQuery(document).ready(function(){jQuery("#arrivaldate").datetimepicker({timepicker:!1,format:"d.m.Y"}),jQuery("#leavingdate").datetimepicker({timepicker:!1,format:"d.m.Y"})}),jQuery(document).ready(function(){jQuery("#location").focus(function(){jQuery("#location").addClass("include")}),jQuery("#noofpeople").focus(function(){jQuery("#noofpeople").addClass("include")}),jQuery("#noofrooms").focus(function(){jQuery("#noofrooms").addClass("include")}),jQuery("#search-submit").click(function(){if(3==jQuery("#location.include, #noofpeople.include, #noofrooms.include").length){var e=jQuery("#location").val(),t=jQuery("#noofpeople").val(),o=jQuery("#noofrooms").val();jQuery(function(){jQuery.ajax({url:"http://www.servicedcitypads.com/wp-admin/admin-ajax.php",type:"POST",data:"action=getsearchresults&location="+e+"&noofpeople="+t+"&apartmenttype="+o,success:function(e){jQuery(".content-area").hide().html(e).fadeIn("slow"),jQuery(".archive-search").hide()}})})}else jQuery("#validate").show()})}),jQuery("#contacthidden").click(function(){jQuery("#contacthidden").val("fail")}),jQuery("#maincontact").click(function(){var e=jQuery("#contactname").val(),t=jQuery("#contactemail").val(),o=jQuery("#contactnumber").val(),n=jQuery("#contactdestination").val(),r=jQuery("#contactarrival").val(),a=jQuery("#contactleaving").val(),i=jQuery("#contactnoofguests").val(),c=jQuery("#contactnoofnights").val();i?jQuery(function(){jQuery.ajax({url:"http://www.servicedcitypads.com/wp-admin/admin-ajax.php",type:"POST",data:"action=send_my_awesome_form&name="+e+"&email="+t+"&number="+o+"&destination="+n+"&arrival="+r+"&leaving="+a+"&noofguests="+i+"&noofnights="+c,success:function(e){jQuery(".success").show(),jQuery(".maincontactform").hide()}})}):i||jQuery(".error").show()}),jQuery(document).ready(function(){jQuery(".amendmentclick").click(function(){jQuery(this).closest(".collapse").find(".amendmentform").toggle()}),jQuery("#amendmentsubmit").click(function(){var e=jQuery(this).closest(".amendmentform").serialize();jQuery(function(){jQuery.ajax({url:"http://www.servicedcitypads.com/wp-admin/admin-ajax.php",type:"POST",data:"action=amendment_form&"+e,success:function(e){jQuery(".amendmentform").hide()}})})})});