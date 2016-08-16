<?php 
/* 
Template Name: Update Bookings
*/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php



	   		// WP_Query arguments
			$args = array (
				'post_type'              => array( 'bookings' ),
				'numberposts' => -1
			);

			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					//get the apartment 
					$ID = get_the_id();	   		
				   		$apartmentname = get_post_meta($ID, 'apartmentname', true);		
				   		$page = get_page_by_title( $apartmentname, OBJECT, 'apartments' );

				   			/*
				   			$bookingtype = get_post_meta($ID, 'bookingtype', true);  
				   			$terms = get_post_meta($page->ID, $bookingtype, true);
				   			$arrivalprocess = get_post_meta($page->ID, 'arrivalprocess', true);
				   			$emcontact = get_post_meta($page->ID, 'emergencycontact', true); 

				   			//sanitize
				   			update_post_meta($ID, 'terms', $terms);
				   			update_post_meta($ID, 'arrival', $arrivalprocess);
				   			update_post_meta($ID, 'emergencycontact', $emcontact);  		
				   			*/
				   		
				}
			} else {
				// no posts found
			}

			// Restore original Post Data
			wp_reset_postdata();

	   		

?>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>