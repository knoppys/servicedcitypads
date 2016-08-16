

<?php get_header(); ?>

<section class="content-area">
	<div class="container">
		<div class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="col-md-6">			
				<?php get_template_part('apartments-entry'); ?>				
			</div>				
		
		<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>