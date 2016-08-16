
<!-- Key links section -->
<section class="">
<h2 class="hidden">Key links section</h2>
	<div class="container content-area">
		<div class="row center">
			<div class="col-md-12">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="row center home-icons">
			<div class="col-md-4 col-sm-6">
				<i class="fa fa-<?php the_field('icon_left'); ?>"></i>
				<h3><?php the_field('title_left'); ?></h3>
				<p><?php the_field('content_left'); ?></p>
				<a href="<?php the_field('link_left'); ?>" class="btn btn-primary">More</a>
			</div>
			<div class="col-md-4 col-sm-6">
				<i class="fa fa-<?php the_field('icon_center'); ?>"></i>
				<h3><?php the_field('title_center'); ?></h3>
				<p><?php the_field('content_center'); ?></p>
				<a href="<?php the_field('link_center'); ?>" class="btn btn-primary">More</a>
			</div>
			<div class="col-md-4 col-sm-6">
				<i class="fa fa-<?php the_field('icon_right'); ?>"></i>
				<h3><?php the_field('title_right'); ?></h3>
				<p><?php the_field('content_right'); ?></p>
				<a href="<?php the_field('link_right'); ?>" class="btn btn-primary">More</a>
			</div>
		</div>
	</div>
</section>


<!-- Home special offers -->
<section class="featured-apartments-home">
	<h2 style="display:none;">Serviced Apartment Special Offers</h2>	
	<div class="container">
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
			<h2>Your Weekly Offers</h2>
			<p>At Serviced City Pads we know that you are always looking for great offers. If you want to find out more about any of these great offers, call us on 0844 335 8866, or send an e-mail to great-offers@servicedcitypads.com.</p>
		</div>
	</div>
		<div class="row">
			<?php
			// WP_Query arguments
			$args = array (
				'post_type'	=> array( 'special_offers' ),
				'posts_per_page' => 4,		
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

					<div class="col-md-3">
						<div class="fa-content-container" style="background: url(<?php echo $url ?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
							<div class="row">
								<div class="col-md-12">
									<div class="text-content">
										<p class="title"><?php the_title(); ?></p>
										<p class="price"><?php the_field('special_offer_price'); ?></p>
										<a href="<?php the_field('apartment'); ?>" class="btn btn-primary">More</a>
									</div>
								</div>							
							</div>					
						</div>
					</div>

			<?php } } else {} wp_reset_postdata();	?>	
							
		</div>
	</div>
</section>

<!-- Blog and Testimonials Section -->
<section class="blog-test">
	<div class="container">		
		<div class="row">
			<!-- Recent Blog Articles -->
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<ul class="row blog-articles">
						<?php
							// WP_Query arguments
							$args = array (
								'post_type'	=> array( 'post' ),
								'posts_per_page' => 4,		
							);

							// The Query
							$query = new WP_Query( $args );

							// The Loop
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post(); ?>

									<li class="col-md-6">
										<div class="blog-item">
											<div class="row">									
												<div class="col-sm-5">
												<?php
												if (has_post_thumbnail()) {
													the_post_thumbnail('medium');
												} else {
													echo '<img src="' . get_template_directory_uri() . '/images/camera-icon-md.png"/>';
												}												
												?>																			
												</div>
												<div class="col-sm-7">
													<p><strong><?php the_title(); ?></strong></p>
													<p><?php the_excerpt(); ?></p>												    
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<a href="<?php the_permalink(); ?>" class="btn btn-primary">More</a>
												</div>
											</div>
										</div>								
									</li>

							<?php } } else {} wp_reset_postdata();	?>						

						</ul>
					</div>
				</div>				
			</div>

			<!--  -->
		</div>
	</div>
</section>
