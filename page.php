<?php get_header(); ?>
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
	<?php 
		get_template_part('search-pulldown');

	?>

	<div class="container content-area">
		<div class="row">
			<div class="col-sm-8" id="<?php get_the_ID(); ?>">
				<main>
					<artcile>		
						<h1><?php the_title(); ?></h1>				
						<?php the_content(); ?>
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