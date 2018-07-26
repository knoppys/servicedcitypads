<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="container content-area logged-in-home single-bookings">
		<div class="row">
			<div class="col-sm-8" id="<?php get_the_ID(); ?>">
				<main>
					<artcile <?php post_class(); ?>>
						<?php  echo clientemail($post->ID); ?>
					</artcile>					
				</main>	
			</div>
			<div class="col-sm-4">
				<aside>
					<h2><i style="padding-right:10px;" class="fa fa-newspaper-o"></i>Booking Options</h2>	
					<table style="margin-top:20px;" class="bookingoptions">
	                	<tr>	                		
	                		<td class="amendmentclick" style="padding:5px;"><a class="btn btn-primary">Request Amendment</a></td>	                		
	                	</tr>             	
					</table>	
					<table id="form-container">
						<tr>
                    		<td>                    			 
                    			<form class="form-horizontal amendmentform" name="amendmentform">  										                    				    
                    				Enter your request here and one of our team will be in touch with you shortly
                    			 	<input type="hidden" name="guestname" value="<?php echo get_post_meta($post->ID, 'guestname', true ); ?>">
									<input type="hidden" name="arrival" value="<?php echo get_post_meta($post->ID, 'arrivaldate', true ); ?>">
									<input type="text" name="message" style="display: block;width: 100%;margin: 9px 0;">
									<a id="amendmentsubmit" class="btn btn-primary">Send Request</a>							  
								</form>								
								<div class="success">
									<p>Thankyou, your request has been recieved and one of our team will be in touch with your shortly.</p>
								</div>
                    		</td>
                    	</tr>
					</table>						
				</aside>
			</div>
		</div>
	</div>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('td.amendmentclick a').on('click', function(){
			jQuery('.amendmentform').show();
		})
	});
</script>
<?php get_footer('bookings'); ?>