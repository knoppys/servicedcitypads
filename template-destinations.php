<?php 
/*
Template Name: Desintations two
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

						<!-- Parent Term Nav -->
						<ul class="nav nav-tabs">
							<?php				
							$parentTerms = get_terms( 'locationcategory', array('hide_empty' => false, 'parent' => 0, 'orderby' => 'name', 'order' => 'DESC') );
							foreach ($parentTerms as $parentTerm)  { ?>				
								<li>
									<a href="#<?php echo $parentTerm->term_id; ?>"><?php echo $parentTerm->name; ?></a>								
								</li>
							<?php } ?>	
						</ul>

						<!-- Parent Term Containers -->
						<div class="tab-content">
							<?php		
							//For each parent term, create a Tab Pane
							$i = 0;
							foreach ($parentTerms as $parentTerm)  { 
								
								if ($i == 0) { $active = 'in active'; } else { $active = ''; }?>	

									<!-- Child Term Pane -->
									<div id="<?php echo $parentTerm->term_id; ?>" class="tab-pane <?php echo $active; ?>">	
																
										<?php	
										//For each child term (Cities and City Areas), show the title and get the Locations	
										$parent = $parentTerm->term_id;
										$childterms = get_term_children($parent, 'locationcategory');	
										foreach ($childterms as $child) {
											$term = get_term_by('id', $child, 'locationcategory'); ?>
											<ul class="destinations-nav">
												<h2><?php echo $term->name; ?></h2>

												<?php 
												$args = array( 
												'post_type' => 'locations',
												'posts_per_page' => -1,
												'order'=> 'ASC',
												'orderby' => 'title',
												'tax_query' => array(
													array(
														'taxonomy' => 'locationcategory',
														'field' => 'term_id',
														'terms' => array($term->term_id))
													)
												);
												$myposts = get_posts( $args );

												//for each location post 
												foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
													<li>	
														<?php if(get_post_meta($post->ID,'cityguide', true)){
															echo '<a class="cutyguidelink" title="City Guide" href="'.get_site_url().'/?cityguides='.get_the_title(get_post_meta($post->ID,'cityguide', true)).'"><i class="fa fa-map-marker"></i></a>';
														}
														?>									
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														
													</li>
												<?php endforeach; 
												wp_reset_postdata();?>
											</ul>	
										<?php }	?>
										
									</div>										
							<?php $i++; } ?>		
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