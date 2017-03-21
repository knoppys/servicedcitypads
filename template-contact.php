<?php 
/* 
Template Name: Contact
*/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



	<div class="contact-header">
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:500px;width:100%;"><div id="gmap_canvas2" style="height:500px;width:100%;"></div><style>#gmap_canvas2 img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://wptiger.com" id="get-map-data">best wordpress themes</a></div><script type="text/javascript"> 
      jQuery(document).ready(function(){
        function init_map(){
      var myOptions = {
        zoom:14,
        scrollwheel: false,
          navigationControl: false,
          mapTypeControl: false,
        center:new google.maps.LatLng(53.1866138,-2.8907398999999714),
        mapTypeId: google.maps.MapTypeId.ROADMAP};

        map = new google.maps.Map(document.getElementById("gmap_canvas2"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(53.1866138, -2.8907398999999714)});infowindow = new google.maps.InfoWindow({
          content:"<b>Serviced City Pads</b><br/>7 &amp; 8 The Old Rectory<br/>St Mary's Hill<br/>Chester<br>CH1 2DW" });

        google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
      })
    </script>
	</div>


	<section class="contact content-area center">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				<?php the_content(); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				<?php get_template_part('booking-request'); ?> 
				</div>
			</div>
		</div>
	</section>



<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>