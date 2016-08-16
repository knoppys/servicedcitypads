<?php 
/* 
Template Name: Offers
*/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php 
	$post_thumbnail_id = get_post_thumbnail_id();
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); 
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

	<div class="container content-area">
		<div class="row">
			<div class="col-sm-8" id="<?php get_the_ID(); ?>">
				<main>
					<artcile>		
						<h1><?php the_title(); ?></h1>				
						<?php the_content(); ?>
						<?php

					// WP_Query arguments
					$args = array (
						'post_type'              => array( 'special_offers' ),
						
					);

					// The Query
					$query = new WP_Query( $args );

					// The Loop
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post(); ?>
							<?php 
								$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
								$url = $thumb['0']; 
							?>

							<div class="col-md-12">
								<div class="blog-item offers-archive">
									<div class="row">									
										<div class="col-sm-4 post-thumbnail">
											<?php if( has_post_thumbnail() ){
												the_post_thumbnail('medium');
											} else { ?>
												<img src="http://www.servicedcitypads.com/wp-content/themes/servicedcitypads/images/camera-icon-md.png" alt="no-image" />
											<?php }; ?>						
										</div>
										<div class="col-sm-8">
											<p><strong><?php the_title(); ?></strong></p>
											<p><?php the_excerpt(); ?></p>										    
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<a href="<?php the_field('apartment'); ?>" class="btn btn-primary">More</a>
										</div>
									</div>
								</div>
							</div>


						<?php }
					} else {
						// no posts found
					}

					// Restore original Post Data
					wp_reset_postdata();

				?>
					</artcile>					
				</main>
			</div>
			<div class="col-sm-4">
				<aside>
					<?php get_template_part('sidebar'); ?>
				</aside>
			</div>
		</div>
		
	</div>


<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>