<?php
//get the meta keys and values of the current post
$locationone = get_post_meta($post->ID, 'apptlocation1', true);
$locationtwo = get_post_meta($post->ID, 'apptlocation2', true);
$sleeps = get_post_meta($post->ID,'sleeps',true);
?>

<h2><i class="fa fa-location-arrow" style="padding-right:10px;"></i>Nearby Apartments</h2>
<div class="latest-offers-slider">

<?php
	$currentpost = get_the_id();
	// WP_Query arguments
	$args = array (
		'post_type'              => array( 'apartments' ),
		'order'                  => 'ASC',
		'posts_per_page'		=>	4,
		'post__not_in'			=> array($currentpost),
		'meta_query' => array(
			'relation' => 'AND',
				array(
					'key' => 'apptlocation1',
					'value' => $locationone,
					),
				array(
					'key' => 'sleeps',
					'value' => $sleeps + 2,
					),
				
		),
	);

	// The Query
	$query = new WP_Query( $args );

	// The Loop

	if ( $query->have_posts() ) { ?>
	
		<?php while ( $query->have_posts() ) {
			$query->the_post(); ?>

							
				<div class="latest-offers-slide">
					<div class="row">
						<div class="col-md-4 post-thumbnail">
							<?php if( has_post_thumbnail() ){
								the_post_thumbnail('medium');
							} else { ?>
								<img src="<?php echo get_template_directory_uri(); ?>/images/camera-icon.png" alt="no-image" />
							<?php }; ?>	
							<a class="btn btn-primary" href="<?php the_permalink(); ?>">More</a>
						</div>
						<div class="col-md-8">
							<h4><?php the_title(); ?></h4>
							<ul>
								<?php $bedrooms = get_post_meta( $post->ID, 'bedrooms', true ); ;?>
								<?php $sleeps = get_post_meta( $post->ID, 'sleeps', true ); ;?>
								<?php if( ! empty( $sleeps ) ) { echo '<li>Sleeps ' . $sleeps . '</li>'; } ?>
								<?php if( ! empty( $bedrooms ) ) { echo '<li>' . $bedrooms . ' Bedrooms</li>'; } ?>
							</ul>

						</div>
					</div>
				</div>

		<?php } } else {
		// no posts found
	} ?>
	</div>
	<?php
	// Restore original Post Data
	wp_reset_postdata();
	?>
	

