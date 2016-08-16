<?php get_header(); ?>


<section class="destinations content-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<main>
					<?php if ( have_posts() ) : $i = 1; while ( have_posts() ) : the_post(); ?>

						<div class="col-md-4">
							<a href="<?php the_permalnk(); ?>">Serviced Apartments In&nbsp;<?php the_title(); ?></a>
						</div>

					<?php if($i % 3 == 0) { echo '</div><div class="row">'; } $i++; ?>

					<?php endwhile; else : ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
				</main>
			</div>
			<div class="col-sm-4">
				<aside>
					<?php get_template_part('sidebar'); ?>
				</aside>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>