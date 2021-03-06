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
	<?php get_template_part('search-pulldown');	?>


	<div class="container content-area">
		<div class="row">
			<div class="col-md-12">
				<?php the_title('<h1>','</h1>'); ?>
				<p><?php the_content(); ?></p>
			</div>
		</div>
		<div class="row">
			<div id="<?php get_the_ID(); ?>">		

				<table width="100%" cellspacing="0" cellpadding="0" border-collapse="collapse" class="cityguidenav" style="margin-top:20px;">
					<tbody>
						<td style="padding:62px 40px; background: url(<?php echo get_post_meta($post->ID, 'wteimg', true); ?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
     						 <a class="navlink" href="#wte" style="padding:10px;">
      						</a>
  						</td>							
						<td style="padding:62px 40px; background: url(<?php echo get_post_meta($post->ID, 'wtdimg', true); ?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
							<a class="navlink" href="#wtd" style="padding:10px;">
							</a>
						</td>
						<td style="padding:62px 40px; background: url(<?php echo get_post_meta($post->ID, 'wtgoimg', true); ?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
							<a class="navlink" href="#wtgo" style="padding:10px;">
							</a>
						</td>
						<td style="padding:62px 40px; background: url(<?php echo get_post_meta($post->ID, 'wtshimg', true); ?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
							<a class="navlink" href="#wtshop" style="padding:10px;">
							</a>
						</td>
						<td style="padding:62px 40px; background: url(<?php echo get_post_meta($post->ID, 'wtvimg', true); ?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
							<a class="navlink" href="#wtvisit" style="padding:10px;">
							</a>
						</td>
						<td style="padding:62px 40px; background: url(<?php echo get_post_meta($post->ID, 'usefulwebimg', true); ?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
							<a class="navlink" href="#usefulweb" style="padding:10px;">
							</a>
						</td>
					</tbody>
				</table>
				<div id="scroller-anchor"></div> 
				<table width="100%" cellspacing="0" cellpadding="0" border-collapse="collapse" class="cityguidenav" id="cityguidenavstop">
					<tbody>
						<td>
							<a class="navlink" href="#wte">
								<span class="navtext">Where to eat...</span>
							</a>
						</td>						
						<td>
							<a class="navlink" href="#wtd">
								<span class="navtext">Where to drink...</span>
							</a>
						</td>
						<td>
							<a class="navlink" href="#wtgo">
								<span class="navtext">Where to go out...</span>
							</a>
						</td>
						<td>
							<a class="navlink" href="#wtshop">
								<span class="navtext">Where to shop...</span>
							</a>
						</td>
						<td>
							<a class="navlink" href="#wtvisit">
								<span class="navtext">Where to visit...</span>
							</a>
						</td>
						<td>
							<a class="navlink" href="#usefulweb">
								<span class="navtext">Useful Apps &amp; Webistes...</span>
							</a>
						</td>
					</tbody>
				</table>

			</div>
		</div>
		
		<div id="guidecontent">				
			<div class="row">	
				<div class="col-md-12" id="wte">
					<h2>Where to eat...</h2>
					<?php echo get_post_meta($post->ID, 'wheretoeat', true); ?>
				</div>
			</div>	
			<div class="row">	
				<div class="col-md-12" id="wtd">
					<h2>Where to drink...</h2>
					<?php echo get_post_meta($post->ID, 'wheretodrink', true); ?>
				</div>
			</div>	
			<div class="row">	
				<div class="col-md-12" id="wtgo">
					<h2>Where to go out...</h2>
					<?php echo get_post_meta($post->ID, 'wheretogoout', true); ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-md-12" id="wtshop">
					<h2>Where to shop...</h2>
					<?php echo get_post_meta($post->ID, 'wheretoshop', true); ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-md-12" id="wtvisit">
					<h2>Where to visit...</h2>
					<?php echo get_post_meta($post->ID, 'wheretovisit', true); ?>
				</div>
			</div>
			<div class="row">	
				<div class="col-md-12" id="usefulweb">
					<h2>Useful Apps &amp; Webistes...</h2>
					<?php echo get_post_meta($post->ID, 'usefulweb', true); ?>
				</div>
			</div>
		</div>							
					
	</div>

	<script type="text/javascript">
		
		//City Guides Navigation 
		jQuery(document).ready(function(){
			function sticky_relocate() {  
			    var window_top = jQuery(window).scrollTop();  
			    var div_top = jQuery('#scroller-anchor').offset().top - 200;  
			    if (window_top > div_top) {  
			        jQuery('#cityguidenavstop').addClass('stick');         
			    } else {  
			        jQuery('#cityguidenavstop').removeClass('stick');
			    }  
			}  
			jQuery(function () {  
			    jQuery(window).scroll(sticky_relocate);  
			    sticky_relocate();  
			});
		})

	</script>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>
