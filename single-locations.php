<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
$cityoffers = get_post_meta( $post->ID, 'cityoffers', true );
$areainformation = get_post_meta( $post->ID, 'areainformation', true );
$reviews = get_post_meta( $post->ID, 'reviews', true );
$post_thumbnail_id = get_post_thumbnail_id();
$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); 
$locationname = get_the_title();
?>
<?php
if( has_post_thumbnail() ){ ?>
	<div class="banner-container">
		<div class="banner" style="background: url(<?php echo $post_thumbnail_url; ?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
			<div class="banner-overlay"></div>			
		</div>
	</div>
<?php } ?>
<?php get_template_part('search-pulldown'); ?>
<section class="content-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<h2>Serviced Apartments in&nbsp;<?php the_title(); ?></h2>
						<?php the_content(); ?>
						<?php 
						if (!empty ($cityoffers)) {
							echo '<h2>City Offers</h2>';
							echo wpautop($cityoffers);
						}
						if (!empty ($areainformation)) {
							echo '<h2>Area Information</h2>';
							echo wpautop($areainformation);
						}
						if (!empty ($reviews)) {
							echo '<h2>Reviews</h2>';
							echo wpautop($reviews);
						}					
						?>
					</div>
				</div>
				<div class="row cities-apartments">
					<div class="col-md-12">
					<h2 class="title">Apartments in <?php echo $locationname; ?></h2>
						<?php
						// WP_Query arguments
						$args = array (
							'post_type' => array( 'apartments' ),
							'posts_per_page' => -1,
							'meta_query' => array(
								'relation' => 'OR',
								array(
									'key' => 'apptlocation1',									
									'value'    => $locationname,
								),
								array(
									'key'	=> 'apptlocation2',
									'value'	=> $locationname,
								),

							),
						);

						// The Query
						$query = new WP_Query( $args );

						if ( $query->have_posts() ) { 			
							 while ( $query->have_posts() ) { 
								 $query->the_post() ; ?>

								
							<?php
							$parking = get_post_meta( get_the_ID(), 'parking', true );    
							$description = get_post_meta( get_the_ID(), 'description', true );   
							$shortdescription = get_post_meta( get_the_ID(), 'shortdescription', true ); 
							$internet = get_post_meta( get_the_ID(), 'internet', true );
							$lift = get_post_meta( get_the_ID(), 'lift', true );
							$bedrooms = get_post_meta( get_the_ID(), 'bedrooms', true );
							$bathrooms = get_post_meta( get_the_ID(), 'bathrooms', true );
							$sleeps = get_post_meta( get_the_ID(), 'sleeps', true );
							$livingroom = get_post_meta( get_the_ID(), 'livingroom', true );
							$diningroom = get_post_meta( get_the_ID(), 'diningroom', true );
							$kitchen = get_post_meta( get_the_ID(), 'kitchen', true );
							$tv = get_post_meta( get_the_ID(), 'tv', true );
							$dvd = get_post_meta( get_the_ID(), 'dvd', true );
							$broadband = get_post_meta( get_the_ID(), 'broadband', true );					    
							$rating = get_post_meta( get_the_ID(), 'rating', true );					    
							$housekeeping = get_post_meta( get_the_ID(), 'housekeeping', true );
							$laundry = get_post_meta( get_the_ID(), 'laundry', true );
							$reception = get_post_meta( get_the_ID(), 'reception', true );
							$location = get_post_meta(get_the_ID(), 'apptlocation1', true); 
							$sofabedcheck = get_post_meta( $post->ID, 'sofabed', true);
						    if ($sofabedcheck == 'TRUE'){
						    	$sofabed = '&nbsp:&nbsp;(Includes Sofa Bed)';
						    } else {
						    	$sofabed = '';
						    }
							?>
							<div class="row apartment">
								<div class="col-md-12">
									<div class="row">
										<div class="col-sm-4 apartment-image">
											<?php if ( has_post_thumbnail() ) { 
												
												the_post_thumbnail('medium');
											
											} else {
											
												$args = array(
											    'numberposts' => 1,
											    'order' => 'ASC',
											    'post_mime_type' => 'image',
											    'post_parent' => $post->ID,
											    'post_status' => null,
											    'post_type' => 'attachment',
												);

												$attachments = get_children( $args );

												if ( $attachments ) {
												   foreach ( $attachments as $attachment ) {
												      $image_attributes = wp_get_attachment_image_src( $attachment->ID, 'medium' );											      
												      echo '<img src="' . wp_get_attachment_thumb_url( $attachment->ID ) . '" class="current">';
													}
												} else {
													echo '<img style="height:144px;" src="' . get_template_directory_uri() . '/images/camera-icon-md.png" />';
												}

											}

											

											?>
											<a class="btn btn-primary" href="<?php the_permalink(); ?>">More</a>	
										</div>
										<div class="col-sm-8 apartment-info">
											<div class="row">
												<div class="col-md-12">
													<h3 class="apartment-title"><?php the_title(); ?></h3>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-5">
													<ul class="facilities">
														<?php if( ! empty( $internet ) ) { echo '<li><i class="fa fa-wifi" style="padding-right:10px;" title="Internet access"></i><span class="mobile-tool">Internet Access:</span>' . $internet . '</li>'; } ?>
														<?php if( ! empty( $sleeps ) ) { echo '<li><i class="fa fa-users" style="padding-right:10px;" title="Sleeps"></i><span class="mobile-tool">Number of guests:</span>Sleeps ' . $sleeps , $sofabed . '</li>'; } ?>
														<?php if( ! empty( $bedrooms ) ) { echo '<li><i class="fa fa-bed" style="padding-right:10px;" title="Number of rooms"></i><span class="mobile-tool">Number of rooms:</span>' . $bedrooms . ' Bedrooms</li>'; } ?>
														<?php if( ! empty( $tv ) ) { echo '<li><i class="fa fa-desktop" style="padding-right:10px;" title="TV"></i><span class="mobile-tool">TV</span>' . $tv . '</li>'; } ?>
														<?php if( ! empty( $dvd ) ) { echo '<li><i class="fa fa-youtube-play" style="padding-right:10px;" title="DVD"></i><span class="mobile-tool">DVD Player:</span>' . $dvd . '</li>'; } ?>
														<?php if( ! empty( $housekeeping ) ) { echo '<li><i class="fa fa-check-square" style="padding-right:10px;" title="Housekeeping"></i><span class="mobile-tool">Housekeeping:</span>' . $housekeeping . '</li>'; } ?>					
													</ul>
													<?php
														if ( $rating == '1' ){
															echo '<div class="facilities rating">Rating<i class="fa fa-star"></i></div>';
														} 	elseif ( $rating == '2') {
																echo '<div class="facilities rating">Rating : <i class="fa fa-star"></i><i class="fa fa-star"></i></div>';
														}  	elseif ( $rating == '3') {
																echo '<div class="facilities rating">Rating : <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>';
														}	elseif ( $rating == '4') {
																echo '<div class="facilities rating">Rating : <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>';
														}	elseif ( $rating == '5') {
																echo '<div class="facilities rating">Rating : <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>';
														}
													?>
												</div>
												<div class="col-sm-5">
													<ul class="facilities">											
														<?php if( ! empty( $reception ) ) { echo '<li><i class="fa fa-user-plus" style="padding-right:10px;" title="Reception"></i><span class="mobile-tool">Reception:</span>' . $reception . '</li>'; } ?>
														<?php if( ! empty( $kitchen ) ) { echo '<li><i class="fa fa-cutlery" style="padding-right:10px;" title="Kitchen Facilities"></i><span class="mobile-tool">Kitchen Facilities:</span>' . $kitchen . '</li>'; } ?>
														<?php if( ! empty( $parking ) ) { echo '<li><i class="fa fa-car" style="padding-right:10px;" title="Parking available"></i><span class="mobile-tool">Parking:</span>' . $parking . '</li>'; } ?>
														<?php if( ! empty( $lift ) ) { echo '<li><i class="fa fa-wheelchair" style="padding-right:10px;" title="Disabled / Lift Access"></i><span class="mobile-tool">Disabled / Lift Access:</span>' . $lift . '</li>'; } ?>
														<?php if( ! empty( $laundry ) ) { echo '<li><i class="fa fa-cog" style="padding-right:10px;" title="Laundry Facilities"></i><span class="mobile-tool">Laundry Facilities:</span>' . $laundry . '</li>'; } ?>
														
													</ul>
													
												</div>
											</div>									
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 description">									
											<p> 
											<?php echo $shortdescription; ?>
											</p>
										</div>
									</div>
								</div>
							</div>									
						

						<?php } ?>

						
						<?php page_navi(); ?>
						<?php  } else {	?>
						<div class="row errorcontainer">
							<div class="col-sm-4">
								<img src="<?php echo get_template_directory_uri();?>/images/errorwoman.png">
							</div>
							<div class="col-sm-7">
								<h3>Sorry, we could find anything in that particular area.</h3>
								<p>Please use our advanced search function at the top of the page to see if there is something nearby.</p>
								<img class="errorarrow"src="<?php echo get_template_directory_uri();?>/images/errorarrow.png">
							</div>
						</div>							
						<?php } ?> 	
						<?php wp_reset_postdata(); ?>
						
					</div>
				</div>
</div>
			<div class="col-md-4">
				<aside>
					<?php get_template_part('sidebar'); ?>
				</aside>
			</div>
				
				

			
			
		</div>		
	</div>
</section>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>