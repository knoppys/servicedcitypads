<footer>
	<!-- Testimonials Slider -->

	<section class="center testimonials" id="testimonials">
		<div class="container">
			<?php if( have_rows('testimonials',2012) ): ?>
			
				<div class="row">
					<div class="col-md-12">
						<h2 class="section-title">What our clients say</h2>
					</div>
				</div>
				<div class="row" id="testimonials-slider">

				 	<?php // loop through the rows of data
				    while ( have_rows('testimonials', 2012) ) : the_row(); ?>

				    	<div class="col-md-3">							
									
							<p><?php the_sub_field('testimonial_text'); ?></p>
						</div>

				    <?php endwhile; ?>

			    </div>
				<?php else : ?>			
			<?php endif; ?>	
			<div class="row">
				<div class="col-md-12">
					<i id="test-l" class="fa fa-chevron-left"></i>
					<i id="test-r" class="fa fa-chevron-right"></i>
				</div>
			</div>
		</div>
	</section>



	<section class="home-content contact-us">
		<h2 style="display:none;">Contact us</h2>
	
		<div class="container">
		
			<div class="row contact-methods center">			
				<div class="col-sm-4 telephone">
				<i class="fa fa-phone"></i>
				<h4>On the phone</h4>
					<a href="tel:08443358866">Calls from UK: 0844 335 8866</a><br/> 
					<a href="tel:+441517098000">International: +44 1244 346 869</a>
				</div>

				<div class="col-sm-4 address">
				<h2>Serviced City Pads Ltd</h2>
				<p>7 &amp; 8 The Old Rectory<br/>St Mary’s Hill<br/>Chester<br/>CH1 2DW</p>
				</div>

				<div class="col-sm-4 email">
				<i class="fa fa-envelope"></i>
				<h4>Email Us</h4>
					<a href="mailto:info@servicedcitypads.com" target="_blank">info@servicedcitypads.com</a><br/>
					<a href="mailto:reservations@servicedcitypads.com" target="_blank">reservations@servicedcitypads.com</a>
				</div>
			</div>			
			
		</div>
	</section>
	
	<section class="home-content footer">
	<h2 style="display:none;">Footer</h2>
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<h4 class="widget-title">Menu</h4>
						
						<?php

						$defaults = array(
							'theme_location'  => 'footer_menu',
							'menu'            => '',
							'container'       => 'div',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'menu',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
						);

						wp_nav_menu( $defaults );
						

						?>
									
					<h4 class="widget-title">Find Us on...</h4>
					<ul>
						<li class="footer-social"><a href="https://www.facebook.com/ServicedCityPadsApartments"><i class="fa fa-facebook footer-f"></i>Facebook</a></li>
						<li class="footer-social"><a href="<?php echo get_site_url(); ?>"><i class="fa fa-twitter footer-t"></i>Twitter</a></li>
						<li class="footer-social"><a href="<?php echo get_site_url(); ?>"><i class="fa fa-google-plus footer-g"></i>Google Plus</a></li>
					</ul>	
					<img class="asaplogo" src="<?php echo get_template_directory_uri(); ?>/images/asap.png" alt="the association of serviced apartment providers">		
				</div>
				<div class="col-sm-4">
					<h4 class="widget-title">Booking Request</h4>
					<?php /* include 'booking-request.php'; */ ?>
					<?php get_template_part('booking-request'); ?>
				</div>
				<div class="col-sm-4">
					<h4 class="widget-title">Latest Tweets</h4>
					<div id="twitter-feed" class="box">		
					<a class="twitter-timeline" href="https://twitter.com/CityPadTeam" data-widget-id="352015064267632640">Tweets by @CityPadTeam</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>	
				</div>		
			</div>
		</div>
	</section>

</footer>
<?php wp_footer(); ?>

</body>
</html>