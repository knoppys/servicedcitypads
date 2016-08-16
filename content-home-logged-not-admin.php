<?php

//get the userinfo variable
$user = wp_get_current_user();
$username = $user->user_email;

			

// WP_Query arguments
	$args = array (
		'post_type'              => array( 'bookings' ),
		'meta_query'             => array(
			array(
				'key'       => 'operatoremail',
				'value'     => $username,
			),
		),
	);

	// The Query
	$query = new WP_Query( $args );

	$i = 1;
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post(); 

			$displayname = get_post_meta($post->ID, 'displayname', true);

			if ($displayname) {
				$displaynametext = $displayname;
			} else {
				$displaynametext = get_post_meta($post->ID, 'apartmentname', true);
			}
			

			$apartmenttitle = get_post_meta($post->ID, 'apartmentname', true);
            $page = get_page_by_title( $apartmenttitle, OBJECT, 'apartments');
            $permalink = $page->guid;

			$apartmentaddress   = get_post_meta($page->ID,'address', true );            
			$aprtmentlocation   = get_post_meta($page->ID,'apptlocation1', true);
			$aprtmentlocation2  = get_post_meta($page->ID,'apptlocation2', true);
			$apartmentpostcode  = get_post_meta($page->ID,'postcode', true );
			$apartmentstate     = get_post_meta($page->ID,'state', true );
			$apartmentcountry   = get_post_meta($page->ID,'country', true );
			$fulladdress = $apartmentaddress.', '.$aprtmentlocation.', '.$aprtmentlocation2.', '.$apartmentstate.'. '.$apartmentpostcode
			?>

			<div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>"><?php the_title(); ?></a>
                </h4>
            </div>

            <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <table width="100%">
                    	<tr>
                    		<td width="25%">Guest Name:</td>
                    		<td><?php echo get_post_meta($post->ID, 'guestname', true ); ?></td>
                    	</tr>
                    	<tr>
                    		<td width="25%">Apartment Name:</td>
                    		<td><?php echo $displaynametext; ?></td>
                    	</tr>
                    	<tr>
                    		<td width="25%">Apartment Address:</td>
                    		<td><?php echo $fulladdress ?></td>
                    	</tr>
                    	<tr>
                    		<td width="25%">Checkin Date:</td>
                    		<td><?php echo get_post_meta($post->ID,'arrivaldate', true) . ' from ' . get_post_meta($post->ID, 'checkintime', true); ?></td>
                    	</tr>
                    	<tr>
                    		<td width="25%">Checkout Date:</td>
                    		<td><?php echo get_post_meta($post->ID,'leavingdate', true) . ' by ' . get_post_meta($post->ID, 'checkouttime', true); ?></td>
                    	</tr>										                    	
                    </table>
                    <table style="margin-top:20px;">
                    	<tr>
                    		<td style="padding:5px;"><a class="btn btn-primary" href="https://www.google.co.uk/maps/place/<?php echo $apartmentpostcode; ?>" target="_blank">View on Map</a></td>
                    		<td style="padding:5px;"><a class="btn btn-primary" href="<?php echo $permalink ?>" target="_blank">View on website</a></td>
                    	</tr>
                    </table>
                </div>
            </div>


		<?php $i++; }} else {}

	
	wp_reset_postdata();

											
?>