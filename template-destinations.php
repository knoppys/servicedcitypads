<?php 
/*
Template Name: Desintations
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
	<?php get_template_part('search-pulldown');	?>
	

	<div class="container content-area">
		<div class="row">
			<div class="col-sm-12" id="<?php get_the_ID(); ?>">
				<main>
					<artcile>		
						<h1><?php the_title(); ?></h1>				
						<?php the_content(); ?>
						<div class="row">							
							<div class="col-md-6">
								<h3>Cities</h3>
								<ul class="destinations-nav">
								<?php
								$args = array( 'post_type' => 'locations', 'posts_per_page' => -1, 'order'=> 'ASC', 'orderby' => 'title', 'locationcategory' => 'cities' );

								$myposts = get_posts( $args );
								foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
									<li>	
										<?php if(get_post_meta($post->ID,'cityguide', true)){
											echo '<a class="cutyguidelink" href="'.get_site_url().'/?cityguides='.get_the_title(get_post_meta($post->ID,'cityguide', true)).'"><i class="fa fa-map-marker"></i></a>';
										}
										?>									
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										
									</li>
								<?php endforeach; 
								wp_reset_postdata();?>

								</ul>
							</div>
										
							<div class="col-md-6">
								<h3>City Areas</h3>
								<ul class="destinations-nav">
								<?php
								$args = array( 'post_type' => 'locations', 'posts_per_page' => -1, 'order'=> 'ASC', 'orderby' => 'title', 'locationcategory' => 'city-areas' );

								$myposts = get_posts( $args );
								foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
								
									<li>																	
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										<?php if(get_post_meta($post->ID,'cityguide', true)){
											echo '<a class="cutyguidelink wordlink" href="'.get_site_url().'/?cityguides='.get_the_title(get_post_meta($post->ID,'cityguide', true)).'">City Gudie</a>';
										}
										?>	
									</li>
								<?php endforeach; 
								wp_reset_postdata();?>

								</ul>
							</div>
						</div>
					</artcile>					
				</main>
			</div>
			
		</div>
	</div>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>