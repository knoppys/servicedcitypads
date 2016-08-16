<!-- Home page slider controlled from Rev Slider -->
<section id="offers-slider" class="offers-slider">
<h2 style="display:none;">Special Offers</h2>		
	<?php
		if( have_rows('slides') ):
		echo '<div id="home-slides">';
		    while ( have_rows('slides') ) : the_row(); ?>

		       <div id="slide" style="background: url(<?php the_sub_field('background_image'); ?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
					<div class="slide-content">
						<div class="slide-message">
							<h2><?php the_sub_field('foreground_content'); ?></h2>
							<a href="<?php the_sub_field('slide_link'); ?>" class="btn btn-primary">Find out more</a>
						</div>
					</div>
				</div>

		    <?php endwhile;
		echo '</div>';
		else : endif;
	?>
</section>
<?php get_template_part('search-pulldown'); ?>

