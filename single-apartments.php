<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part('search-pulldown'); ?>

<section class="content-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php get_template_part('apartment-entry'); ?>				
			</div>		
			<div class="col-sm-4">
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