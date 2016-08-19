/********************
// jQuery loader
********************/
var loading = jQuery('#loadingDiv').hide();
jQuery(document)
  .ajaxStart(function () {
    loading.show();
  })
  .ajaxStop(function () {
    loading.hide();
  });

jQuery(document).ready(function moveScroller() {
    var $anchor = jQuery("#scroller-anchor");
    var $scroller = jQuery('#cityguidenavstop');
    var $content = jQuery('#guidecontent');

    var move = function() {
        var st = jQuery(window).scrollTop();
        var ot = $anchor.offset().top - 100;
        if(st > ot) {
            $scroller.css({
                position: "fixed",
                top: "146px",
                width: "100%",
                left: "0",
                right: "0",
                
            });
            $content.css({
            	margin: "150px 0px 0px 0px"
            });
        } else {
            if(st <= ot) {
                $scroller.css({
                    position: "relative",
                    top: ""
                });
                $content.css({
            	margin: "0px 0px"
            });
            }
        }
    };
    jQuery(window).scroll(move);
    move();
})

jQuery(document).ready(function(){
	jQuery('.cityguidenav a').click(function(){
		jQuery('html, body').animate({
		      scrollTop: jQuery(jQuery(this).attr('href')).offset().top - 200
		  }), 500
		  return false
	})
})


//Navoigation toggle
	jQuery( "#menu-toggle" ).click(function() {
	  jQuery( ".navigation" ).toggle( "slow", function() {
	    // Animation complete.
	  });
	});

//Close the landing screen
	jQuery("#landingclose").click(function(){
		jQuery(".hotelalt") .fadeOut(200);
	    jQuery(".landing").animate({left: "-100%"}, {duration:1000});
	});

//Hide the landing sub text before it reaches the side
	jQuery(function() { 
	      jQuery('.hotelalt').hide().delay(500).fadeIn(2200);
	});
//Run the featured news slider
	jQuery('.featured-news-container').slick({
		infinite: true,
	 	dots: false,
	 	arrows: false,
	 	autoPlay: true,
	 	pauseOnHover: false,
	 	autoplay: true,
	 	fade: true,
  		cssEase: 'linear'
	});
//Run the featured offers slider
	jQuery('#home-slides').slick({
		infinite: true,
	 	dots: false,
	 	arrows: false,
	 	autoPlay: true,
	 	pauseOnHover: false,
	 	autoplay: true,
	 	fade: true,
  		cssEase: 'linear'
	});

//Run the single apartment view slider
	jQuery('.apartment-single-slides').slick({
		infinite: true,
	 	dots: false,
	 	autoPlay: true,
	 	pauseOnHover: false,
	 	autoplay: true,
	 	prevArrow: '#slider-left',
	 	nextArrow: '#slider-right'
	});
	jQuery('.slider-nav').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.apartment-single-slides',
	  dots: false,
	  centerMode: true,
	  focusOnSelect: true
	});

jQuery(document).ready(function(){

//Run the single apartment view slider
	jQuery('#testimonials-slider').slick({
		infinite: true,
	 	dots: false,
	 	autoPlay: true,
	 	pauseOnHover: true,
	 	autoplay: true,
	 	speed: 2000,
	 	prevArrow: '#test-l',
	 	nextArrow: '#test-r',
	 	slidesToShow: 4,
	  	slidesToScroll: 1,
	});	
});
//Booking deposit date
	jQuery('#contact-arrival input').datetimepicker({
		timepicker: false,
		format:'d.m.Y'
	});
	//Booking deposit date
	jQuery('#contact-departure input').datetimepicker({
		timepicker: false,
		format:'d.m.Y'
	});

/*
/Run the latest offers vertical slider
	jQuery(document).ready(function(){
		jQuery('.latest-offers-slider').slick({
		infinite: true,
	 	dots: false,
	 	arrows:true,
	 	autoPlay:false,
	 	vertical: true,
	 	slidesToShow: 3,
	    slidesToScroll: 3,
	    swipeToSlide: false,
	    prevArrow: '.latest-offers-less',
	    nextArrow: '.latest-offers-more'
		});
	});
*/
//Run the content tabs on the home page
	jQuery('.nav-tabs a').click(function (e) {
		e.preventDefault()
		jQuery(this).tab('show')
	});


//Run the animation for the icons in the content tabs
	jQuery('#toggleicons').on('click', function() {
	    jQuery('#stepcorp1').animate({left: 0} ,{duration:500}); 
	});

	jQuery('#toggleicons').on('click', function() {
	    jQuery('#stepcorp2').fadeIn('500'); 
	});

	jQuery('#toggleicons').on('click', function() {
	    jQuery('#stepcorp3').animate({right: 0} ,{duration:500}); 
	});

	jQuery('#togglegroup').on('click', function() {
	    jQuery('#stepgroup1').animate({left: 0} ,{duration:500}); 
	});

	jQuery('#togglegroup').on('click', function() {
	    jQuery('#stepgroup2').fadeIn('500'); 
	});

	jQuery('#togglegroup').on('click', function() {
	    jQuery('#stepgroup3').animate({right: 0} ,{duration:500}); 
	});

//search drop down
	jQuery('.searchpulldown').on('click', function() {
	    jQuery('.archive-search').slideToggle();
	});

jQuery(document).ready(function(){
	jQuery(window).scroll(function(){
	  var sticky = jQuery('#sticky'),
	      scroll = jQuery(window).scrollTop();

	  if (scroll >= 10) sticky.addClass('sticky');
	  else sticky.removeClass('sticky');
	});
});




//Check in time search box
jQuery(document).ready(function(){
	jQuery('#arrivaldate').datetimepicker({																								
		timepicker: false,
		format:'d.m.Y'
	});
	jQuery('#leavingdate').datetimepicker({																								
		timepicker: false,
		format:'d.m.Y'
	});
});

/********************
// Ajax function for the default location serch query
********************/	

jQuery(document).ready(function(){

		//add the include class to each element6 as it is clicked.
		jQuery('#location').focus(function(){
			jQuery('#location').addClass('include');
		});
		jQuery('#noofpeople').focus(function(){
			jQuery('#noofpeople').addClass('include');
		});
		jQuery('#noofrooms').focus(function(){
			jQuery('#noofrooms').addClass('include');
		});

		jQuery('#search-submit').click(function() { 
		    if (jQuery('#location.include, #noofpeople.include, #noofrooms.include').length == 3){
		        var location = jQuery('#location').val();
				var noofpeople = jQuery('#noofpeople').val();
				var noofrooms = jQuery('#noofrooms').val();
				jQuery(function(){
				    jQuery.ajax({
			            url:"http://www.servicedcitypads.com/wp-admin/admin-ajax.php",
			            type:'POST',
			            data:'action=getsearchresults&location=' + location + 
			            '&noofpeople=' + noofpeople + '&apartmenttype=' + noofrooms,
			            success:function(result){
			            //got it back, now assign it to its fields. 	            	
			           	jQuery('.content-area').hide().html( result ).fadeIn('slow');
			           	jQuery('.archive-search').hide();
			           	//console.log(result);

			            	
			            }
					});		
				});
		    } else {
		        jQuery('#validate').show();
		    }
		});


});


/********************
// Ajax main booking request form
********************/	

jQuery('#contacthidden').click(function(){
	jQuery('#contacthidden').val('fail');
});

jQuery('#maincontact').click(function() { 
	var name = jQuery('#contactname').val();
	var email = jQuery('#contactemail').val(); 
	var number = jQuery('#contactnumber').val(); 
	var destination = jQuery('#contactdestination').val();
	var arrival =  jQuery('#contactarrival').val()
	var leaving = jQuery('#contactleaving').val();
    var noofguests = jQuery('#contactnoofguests').val();
    var noofnights = jQuery('#contactnoofnights').val();

    if (name,email,number,destination,arrival,leaving,noofguests){

    	jQuery(function(){
		    jQuery.ajax({
	            url:"http://www.servicedcitypads.com/wp-admin/admin-ajax.php",
	            type:'POST',
	            data:'action=send_my_awesome_form&name=' + name + 
	            '&email=' + email +
	            '&number=' + number + 
	            '&destination=' + destination +
	            '&arrival=' + arrival +
	            '&leaving=' + leaving + 
	            '&noofguests=' + noofguests + 
	            '&noofnights=' + noofnights,
	         
	            success:function(result){	            	
	            	     jQuery('.success').show(); 
	            	     jQuery('.maincontactform').hide();         	
	                  }
			});
		});

    } else if (!name,!email,!number,!destination,!arrival,!leaving,!noofguests){
    	jQuery('.error').show();
    }

	
});


/********************
// Ajax amendment form
********************/	

jQuery(document).ready(function(){
	jQuery('.amendmentclick').click(function(){
		jQuery(this).closest('.collapse').find('.amendmentform').toggle();
	});

	jQuery('#amendmentsubmit').click(function() { 
		var data = jQuery(this).closest('.amendmentform').serialize();		

	    	jQuery(function(){
			    jQuery.ajax({
		            url:"http://www.servicedcitypads.com/wp-admin/admin-ajax.php",
		            type:'POST',
		            data:'action=amendment_form&' + data,	         
		            success:function(result){	
						jQuery('.amendmentform').hide(); 					
							        	             	
		              }
				});
			});

	    });
});