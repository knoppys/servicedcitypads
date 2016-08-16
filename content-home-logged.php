
<section class="logged-in-home">
	<div class="container">
		<divc class="row">
			<div class="col-md-12">
		
					<div>

						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">

							<li role="presentation" class="active"><a href="#Bookings" aria-controls="Bookings" role="tab" data-toggle="tab">Bookings</a></li>
							<li role="presentation"><a href="#Search" aria-controls="Search" role="tab" data-toggle="tab">Availability Enquiry</a></li>

						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="Bookings">
								<p>Please find a list below of all your currently active bookings.</p>
								<p>Click on a booking name to view the full booking details.</p>
								<div class="bs-example">
    								<div class="panel-group" id="accordion">
    									<div class="panel panel-default">	            
										
										<?php 
								
										//get the userinfo variable
										$user = wp_get_current_user();
										$username = $user->user_email;
										$isadmin = get_user_meta($user->ID, 'companyadmin', true);
										$companyname = get_user_meta($user->ID, 'companyname', true);		

														

											// WP_Query arguments
												if ($isadmin == 'Y') {
													$args = array (
														'posts_per_page'	=>	-1,
														'meta_key'	=>	'guestname',
														'orderby'	=>	'meta_value',
														'order'	=>	ASC,
														'post_type'              => array( 'bookings' ),
														'meta_query'             => array(
															'relation' => 'OR',
															array(
																'key'       => 'operatorname',
																'value'     => $companyname,
															),
															array(
																'key'       => 'clientname',
																'value'     => $companyname,
															),
														),
													);
												} else {
													$args = array (
														'posts_per_page'	=>	-1,
														'meta_key'	=>	'arrivaldate',
														'orderby'	=>	'meta_value',
														'order'	=>	ASC,
														'post_type'              => array( 'bookings' ),
														'meta_query'             => array(													
															array(
																'key'       => 'email',
																'value'     => $username,
															),															
														),
													);
												}
												

												// The Query
												$query = new WP_Query( $args );

												$i = 1;
												if ( $query->have_posts() ) {
													while ( $query->have_posts() ) {
														$query->the_post(); 

														$displayname = get_post_meta($post->ID, 'displayname', true);

														if ($displayname) {
															$displaynametext = $displayname;
														} else {
															$displaynametext = get_post_meta($post->ID, 'apartmentname', true);
														}
														



														$apartmenttitle = get_post_meta($post->ID, 'apartmentname', true);
										                $page = get_page_by_title( $apartmenttitle, OBJECT, 'apartments');
										                $permalink = $page->guid;

														$apartmentaddress   = get_post_meta($page->ID,'address', true );            
                										$aprtmentlocation   = get_post_meta($page->ID,'apptlocation1', true);
                										$aprtmentlocation2  = get_post_meta($page->ID,'apptlocation2', true);
                										$apartmentpostcode  = get_post_meta($page->ID,'postcode', true );
                										$apartmentstate     = get_post_meta($page->ID,'state', true );
                										$apartmentcountry   = get_post_meta($page->ID,'country', true );
                										$fulladdress = $apartmentaddress.', '.$aprtmentlocation.', '.$aprtmentlocation2.', '.$apartmentstate.'. '.$apartmentpostcode
														?>

														<div id="">
														<div class="panel-heading">
											                <h4 class="panel-title">
											                	<?php
											                	if ($isadmin == 'Y') {
											                		$titletext = get_post_meta($post->ID, 'guestname', true);
											                	} else {
											                		$titletext = get_post_meta($post->ID, 'apartmentname', true);
											                	}
											                	
											                	?>
											                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>"><?php echo $titletext; ?></a>
											                </h4>
											            </div>

											            <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
											                <div class="panel-body">
											                    <table width="100%">
											                    	<tr>
											                    		<td width="25%">Guest Name:</td>
											                    		<td><?php echo get_post_meta($post->ID, 'guestname', true ); ?></td>
											                    	</tr>
											                    	<tr>
											                    		<td width="25%">Apartment Name:</td>
											                    		<td><?php echo $displaynametext; ?></td>
											                    	</tr>
											                    	<tr>
											                    		<td width="25%">Apartment Address:</td>
											                    		<td><?php echo $fulladdress ?></td>
											                    	</tr>
											                    	<tr>
											                    		<td width="25%">Checkin Date:</td>
											                    		<?php
											                    		$checkintime = get_post_meta($page->ID, 'apptchekintime', true);
											                    		$checkouttime = get_post_meta($page->ID, 'apptchekouttime', true);
											                    		$arrivaldate = get_post_meta($post->ID,'arrivaldate', true);
											                    		$leavingdate = get_post_meta($post->ID,'leavingdate', true);
											                    		?>
											                    		<td><?php if($arrivaldate){echo $arrivaldate;} else {echo 'Other';} ?> from <?php if($checkintime){echo $checkintime;} else {echo '(Check in time not available)';} ?></td>
											                    	</tr>
											                    	<tr>
											                    		<td width="25%">Checkout Date:</td>
											                    		<td><?php if($leavingdate){echo $leavingdate;} else {echo 'Other';} ?> from <?php if($checkouttime){echo $checkouttime;} else {echo '(Check out time not available)';} ?></td>
											                    	</tr>										                    	
											                    </table>
											                    <table style="margin-top:20px;">
											                    	<tr>
											                    		<td style="padding:5px;"><a class="btn btn-primary" href="https://www.google.co.uk/maps/place/<?php echo $apartmentpostcode; ?>" target="_blank">View on Map</a></td>
											                    		<td style="padding:5px;"><a class="btn btn-primary" href="<?php echo get_site_url() . '/?post_type=apartments&p=' . $page->ID ?>" target="_blank">View on website</a></td>
											                    		<td class="amendmentclick" style="padding:5px;"><a class="btn btn-primary">Request Amendment</a></td>
											                    	</tr>             	
																</table>
																<table id="form-container">
																	<tr>
											                    		<td>
											                    			 
											                    			<form class="form-horizontal amendmentform" name="amendmentform">  										                    				    
											                    				Enter your request here and one of our team will be in touch with you shortly
											                    			 	<input type="hidden" name="guestname" value="<?php echo get_post_meta($post->ID, 'guestname', true ); ?>">
																				<input type="hidden" name="arrival" value="<?php echo $arrivaldate; ?>">
																				<input type="text" name="message" style="display: block;width: 100%;margin: 9px 0;">
																				<a id="amendmentsubmit"class="btn btn-primary">Send Request</a>							  
																			</form>

																			<div class="success">
																				<p>Thankyou, your request has been recieved and one of our team will be in touch with your shortly.</p>
																			</div>
											                    		</td>

											                    	</tr>
																</table>
											                </div>
											            </div>
														</div>


													<?php $i++; }} else { ?>

														<div style="padding:10px;">
															<p>Sorry but there are no bookings that meet your criteria.</p>
														<p>This either means there are no bookings associated with your email address, or you are not a company admin.</p>
														</div>

													<?php }

												
												wp_reset_postdata();

											

											?>

								 		</div>
    								</div>
    							</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="Search">								
								<?php get_template_part('booking-request'); ?>					
							</div>	    
						</div>

					</div>
			
			</div>
		</div>
		<div class="content-area"></div>
	</div>
</section>