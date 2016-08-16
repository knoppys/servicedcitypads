<?php get_header('header3'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<header class="resellerp">
		
		  <div class="container">
		    
		    <div class="row">
		    	<div class="col-sm-8">
		    		<?php the_post_thumbnail('medium'); ?>
		    	</div>
		    	<div class="col-sm-4">
		    		<h2>Our Recommendations</h2>
		    		<a href="<?php echo get_post_meta($post->ID, 'resellerp_website', true); ?>">View our full website</a>
		    	</div>
		    </div>
		  
		  </div><!-- /.container-fluid -->
		
	</header>
	<div class="container content-area resellerp">
		<div class="row">
			<div class="col-sm-8" id="<?php $post->ID; ?>">
				<main>
					<artcile <?php post_class(); ?>>
						<h1><?php the_title(); ?></h1>
						<?php echo get_post_meta($post->ID, 'resellerp_terms', true); ?>
						<?php						
						
						$postsin = explode(',', ($_SERVER["QUERY_STRING"]));					

						$args2 = array(
							'post_type' => 	'apartments',
							'post__in'	=>	$postsin,
							);

						$query = new WP_Query($args2);

						if ($query->have_posts() ) {
							while ($query->have_posts() ) {								
								$query->the_post(); ?>

							    <?php

								$parking = get_post_meta( $post->ID, 'parking', true );    
							    $description = get_post_meta( $post->ID, 'description', true );   
							    $shortdescription = get_post_meta( $post->ID, 'shortdescription', true ); 
							    $internet = get_post_meta( $post->ID, 'internet', true );
							    $lift = get_post_meta( $post->ID, 'lift', true );
							    $bedrooms = get_post_meta( $post->ID, 'bedrooms', true );
							    $bathrooms = get_post_meta( $post->ID, 'bathrooms', true );
							    $sleeps = get_post_meta( $post->ID, 'sleeps', true );
							    $livingroom = get_post_meta( $post->ID, 'livingroom', true );
							    $diningroom = get_post_meta( $post->ID, 'diningroom', true );
							    $kitchen = get_post_meta( $post->ID, 'kitchen', true );
							    $tv = get_post_meta( $post->ID, 'tv', true );
							    $dvd = get_post_meta( $post->ID, 'dvd', true );
							    $broadband = get_post_meta( $post->ID, 'broadband', true );
							    $additionalfeatures = get_post_meta( $post->ID, 'additionalfeatures', true );
							    $rating = get_post_meta( $post->ID, 'rating', true );
							    $baserentalprice = get_post_meta( $post->ID, 'baserentalprice', true );
							    $housekeeping = get_post_meta( $post->ID, 'housekeeping', true );
							    $laundry = get_post_meta( $post->ID, 'laundry', true );
							    $reception = get_post_meta( $post->ID, 'reception', true );
							    $apptchekintime = get_post_meta( $post->ID, 'apptchekintime', true);
							    $apptchekouttime = get_post_meta( $post->ID, 'apptchekouttime', true);
							    $location = get_post_meta($post->ID, 'apptlocation1', true); 
							    $address = get_post_meta($post->ID, 'address', true);
							    $town = get_post_meta($post->ID, 'town', true);
							    $state = get_post_meta($post->ID, 'state', true);
							    $postcode = get_post_meta($post->ID, 'postcode', true);
							    $fulladdress = $address . '&nbsp' . $town . '&nbsp' . $state . '.&nbsp' . $postcode;
							    $frontendcancellation = get_post_meta($post->ID, 'frontendcancellation', true);
							    $reviews = get_post_meta($post->ID, 'reviews', true);
							    $buildingname = get_post_meta($post->ID, 'buildingname', true);

							    $additionalinfo = get_post_meta($post->ID, 'additionalinfo', true);
							    ?>

							    
							    <div class="post-container">
									<div class="row">
										<div class="col-md-12">
											<!-- Post Title -->
								
								<div class="row">					
									<div class="col-sm-12">
										<h2 class="apartment-title"><?php the_title(); ?></h2>
									</div>
								</div>
								
								<!-- Images -->	
								<div class="row">
									<div class="col-md-12">
										<h2 class="entry-section-title"><i class="fa fa-chevron-down"></i>Gallery</h2>
									</div>
								</div>		
								<div class="row">
									<div class="col-sm-12 apartment-single-slides">
										<?php 
										$images = get_attached_media('image', $post->ID);
										if(!empty($images)){
											foreach($images as $image) { ?>
										   <img src="<?php echo wp_get_attachment_image_src($image->ID,'full')[0]; ?>" />
										<?php } ?>
										<div class="slider-navigation">
											<div class="row">
												<div class="col-xs-6 slide-left">
													<i class="fa fa-chevron-left slider-control" id="slider-left"></i>			
												</div>
												<div class="col-xs-6 slide-right">
													<i class="fa fa-chevron-right slider-control" id="slider-right"></i>
												</div>
											</div>
										</div>
										<?php } else {
											echo 'Sorry there are no images available for this apartment.';
										} ?>			
									</div>			
								</div>
									<div class="row">
									<div class="col-sm-12 slider-nav">
										<?php 
										$images = get_attached_media('image', $post->ID);
										if(!empty($images)){
											foreach($images as $image) { ?>
										   <img src="<?php echo wp_get_attachment_image_src($image->ID,'full')[0]; ?>" />
										<?php } } ?>
									</div>	
								</div>
								<!-- Facilities -->
								<div class="row">
									<div class="col-md-12">
										<h2 class="entry-section-title"><i class="fa fa-chevron-down"></i>
										Facilities
										<?php
											if ( $rating == '1' ){
												echo '<div class="facilities rating">Rating&nbsp;<i class="fa fa-star"></i></div>';
											} 	elseif ( $rating == '2') {
													echo '<div class="facilities rating">Rating&nbsp;<i class="fa fa-star"></i><i class="fa fa-star"></i></div>';
											}  	elseif ( $rating == '3') {
													echo '<div class="facilities rating">Rating&nbsp;<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>';
											}	elseif ( $rating == '4') {
													echo '<div class="facilities rating">Rating&nbsp;<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>';
											}	elseif ( $rating == '5') {
													echo '<div class="facilities rating">Rating&nbsp;<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>';
											}
										?>
										</h2>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<ul class="facilities">
											<?php if( ! empty( $internet ) ) { echo '<li><i class="fa fa-wifi" style="padding-right:10px;" title="Internet access"></i><span class="mobile-tool">Internet Access:</span>' . $internet . '</li>'; } ?>
																					<?php if( ! empty( $sleeps ) ) { echo '<li><i class="fa fa-users" style="padding-right:10px;" title="Sleeps"></i><span class="mobile-tool">Number of guests:</span>Sleeps ' . $sleeps , $sofabed . '</li>'; } ?>
																					<?php if( ! empty( $bedrooms ) ) { echo '<li><i class="fa fa-bed" style="padding-right:10px;" title="Number of rooms"></i><span class="mobile-tool">Number of rooms:</span>' . $bedrooms . ' Bedrooms</li>'; } ?>
																					<?php if( ! empty( $tv ) ) { echo '<li><i class="fa fa-desktop" style="padding-right:10px;" title="TV"></i><span class="mobile-tool">TV</span>' . $tv . '</li>'; } ?>
																					<?php if( ! empty( $dvd ) ) { echo '<li><i class="fa fa-youtube-play" style="padding-right:10px;" title="DVD"></i><span class="mobile-tool">DVD Player:</span>' . $dvd . '</li>'; } ?>
																					<?php if( ! empty( $housekeeping ) ) { echo '<li><i class="fa fa-check-square" style="padding-right:10px;" title="Housekeeping"></i><span class="mobile-tool">Housekeeping:</span>' . $housekeeping . '</li>'; } ?>					
										</ul>							
									</div>
									<div class="col-md-6">
										<ul class="facilities">
											<?php if( ! empty( $reception ) ) { echo '<li><i class="fa fa-user-plus" style="padding-right:10px;" title="Reception"></i><span class="mobile-tool">Reception:</span>' . $reception . '</li>'; } ?>
																					<?php if( ! empty( $kitchen ) ) { echo '<li><i class="fa fa-cutlery" style="padding-right:10px;" title="Kitchen Facilities"></i><span class="mobile-tool">Kitchen Facilities:</span>' . $kitchen . '</li>'; } ?>
																					<?php if( ! empty( $parking ) ) { echo '<li><i class="fa fa-car" style="padding-right:10px;" title="Parking available"></i><span class="mobile-tool">Parking:</span>' . $parking . '</li>'; } ?>
																					<?php if( ! empty( $lift ) ) { echo '<li><i class="fa fa-wheelchair" style="padding-right:10px;" title="Disabled / Lift Access"></i><span class="mobile-tool">Disabled / Lift Access:</span>' . $lift . '</li>'; } ?>
																					<?php if( ! empty( $laundry ) ) { echo '<li><i class="fa fa-cog" style="padding-right:10px;" title="Laundry Facilities"></i><span class="mobile-tool">Laundry Facilities:</span>' . $laundry . '</li>'; } ?>
											<?php if( ! empty( $apptchekintime ) ) { echo '<li><i class="fa fa-clock-o" style="padding-right:10px;" title="Check In Time"></i>Check In Time: ' . $apptchekintime . '</li>'; } ?>
											<?php if( ! empty( $apptchekouttime ) ) { echo '<li><i class="fa fa-clock-o" style="padding-right:10px;" title="Check Out Time"></i>Check Out Time: ' . $apptchekouttime . '</li>'; } ?>
										</ul>
									</div>				
								</div>
								<!-- Address and Description -->
								<div class="row">
									<div class="col-md-12">
										<h2 class="entry-section-title"><i class="fa fa-chevron-down"></i>Description</h2>
									   	<p><strong>Address: <span id="address"><?php echo $buildingname . '&nbsp' . $fulladdress; ?></span></strong></p>
									   	<p id="overview"><?php echo $description; ?></p>    
									</div>
								</div>

								<!-- Location Information -->
								<?php 
								  	$page_title = get_post_meta($post->ID, 'apptlocation1', true);					
									$post_type = 'locations';
									$thelocation = get_page_by_title( $page_title, OBJECT, $post_type );
									$areainfo = get_post_meta($thelocation->ID, 'areainformation', true);
									if (  !empty ($areainfo) ) {
								 ?>
									<div class="row">
										<div class="col-md-12">			
											<p>
												<?php 					 
													echo '<h2 class="entry-section-title"><i class="fa fa-chevron-down"></i>Additional Area Information</h2>';
													echo $areainfo;					 
												?>
											</p>				
										</div>
									</div>
								<?php } ?>

								<!-- Reviews -->
								<?php 
								  	$page_title = get_post_meta($post->ID, 'apptlocation1', true);					
									$post_type = 'locations';
									$thelocation = get_page_by_title( $page_title, OBJECT, $post_type );
									$reviews = get_post_meta($thelocation->ID, 'reviews', true);
									if (  !empty ($reviews) ) {
								 ?>
									<div class="row">
										<div class="col-md-12">			
											<p>
												<?php 					 
													echo '<h2 class="entry-section-title"><i class="fa fa-chevron-down"></i>Reviews</h2>';
													echo $reviews; 					 
												?>
											</p>				
										</div>
									</div>
								<?php } ?>

								<!-- Reviews -->
								<?php 
									if (  !empty ($frontendcancellation) ) {
								 ?>
									<div class="row">
										<div class="col-md-12">			
											<p>
												<?php 					 
													echo '<h2 class="entry-section-title"><i class="fa fa-chevron-down"></i>Cancellation and Security Deposits</h2>';
													echo wpautop( $frontendcancellation ); 					 
												?>
											</p>				
										</div>
									</div>
								<?php } ?>
								<div class="row">
									<div class="col-sm-3">
										<a class="btn btn-primary" href="http://maps.google.com/?q=<?php echo $postcode; ?>" target="_blank">View this apartment on a map</a>
									</div>
								</div>
										</div>
									</div>
								</div>

						
						<?php } ?>
						<?php  } else {	echo 'Sorry but no apartments were found'; } ?> 	
						<?php wp_reset_postdata(); ?>
						
					</artcile>					
				</main>
			</div>	
			<div class="col-md-4">
				<aside class="sidebar">
					<h4>Contact Details</h4>
					<p><i class="fa fa-phone"></i><?php echo get_post_meta($post->ID,'resellerp_phone', true); ?></p>
					<p><i class="fa fa-envelope"></i><?php echo get_post_meta($post->ID, 'resellerp_email', true); ?></p>
				</aside>
			</div>

		</div>
	</div>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php get_footer('footer3'); ?>