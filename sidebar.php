
<div class="booking-request-single">
	<h2><i class="fa fa-book"></i>&nbsp;Booking</h2>
	<p>You can make a booking by using the form below. Once we have your details, one of our reservations team will call or email you back with a competitive quotation.</p>
	<?php /* include('booking-request.php'); */ ?>
	<?php get_template_part('booking-request'); ?>
</div>

	<?php /* include('areas-covered.php'); */ ?>
	<?php 
	if ( is_singular('apartments') ) {
		get_template_part('vertical-offers');
	}

	  ?>


