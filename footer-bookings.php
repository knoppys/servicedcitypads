	
<footer>

	
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