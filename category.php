<?php get_header(); ?>

	<div class="container content-area category-view">
		<div class="row">
			<div class="col-sm-8" id="<?php get_the_ID(); ?>">
				<main>
					<div class="featured-news-container">

						
						<?php
						$args = array ('post_type'=> array( 'post' ),'cat'=>'53',);
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>
						<?php
						$post_thumbnail_id = get_post_thumbnail_id();
						$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); 
						?>
						<div class="featured-news-item" style="background: url(<?php echo $post_thumbnail_url; ?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
							<div class="row">
								<div class="col-md-12">
									<h3>Featured News</h3>
									<h3 class="f-title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<strong><?php the_excerpt(); ?></strong>
								</div>
							</div>
						</div>
								
						<?php }} wp_reset_postdata(); ?>

					</div>

					<?php 
						if ( have_posts() ) :
						while ( have_posts() ) : the_post(); ?>

						<div class="blog-item">
							<div class="row">		
													
								<div class="col-sm-3 post-thumbnail">
									<?php if( has_post_thumbnail() ){
										the_post_thumbnail('medium');
									} else { ?>
										<img src="<?php echo get_template_directory_uri(); ?>/images/camera-icon.png" alt="no-image" />
									<?php }; ?>						
								</div>
								<div class="col-sm-9">

									<p><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></p>
									<p><?php the_excerpt(); ?></p>
									<strong>Posted on : <?php echo get_the_date(); ?></strong>								    
								</div>
								
								
							</div>
							<a href="<?php the_permalink(); ?>" class="btn btn-primary">More</a>
						</div>

					<?php endwhile; else : ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>						 
					<?php endif; ?>
					<?php posts_nav_link(); ?> 
				</main>
			</div>
			<div class="col-sm-4">
				<aside>
					<?php get_template_part('sidebar'); ?>
					<h2><i style="padding-right:10px;" class="fa fa-newspaper-o"></i>News Categories</h2>
					<?php 
						$args = array( 'title_li' => __( NULL ) );
					    wp_list_categories( $args ); 
					?>
				</aside>
			</div>
		</div>
	</div>




<?php get_footer(); ?>