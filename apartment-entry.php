
<?php

	//get all the post meta

	$parking = get_post_meta( $post->ID, 'parking', true );    
    $description = get_post_meta( $post->ID, 'description', true );   
    $shortdescription = get_post_meta( $post->ID, 'shortdescription', true ); 
    $internet = get_post_meta( $post->ID, 'internet', true );
    $lift = get_post_meta( $post->ID, 'lift', true );
    $bedrooms = get_post_meta( $post->ID, 'bedrooms', true );
    $bathrooms = get_post_meta( $post->ID, 'bathrooms', true );
    $sleeps = get_post_meta( $post->ID, 'sleeps', true );
    $livingroom = get_post_meta( $post->ID, 'livingroom', true );
    $diningroom = get_post_meta( $post->ID, 'diningroom', true );
    $kitchen = get_post_meta( $post->ID, 'kitchen', true );
    $tv = get_post_meta( $post->ID, 'tv', true );
    $dvd = get_post_meta( $post->ID, 'dvd', true );
    $broadband = get_post_meta( $post->ID, 'broadband', true );
    $additionalfeatures = get_post_meta( $post->ID, 'additionalfeatures', true );
    $rating = get_post_meta( $post->ID, 'rating', true );
    $baserentalprice = get_post_meta( $post->ID, 'baserentalprice', true );
    $housekeeping = get_post_meta( $post->ID, 'housekeeping', true );
    $laundry = get_post_meta( $post->ID, 'laundry', true );
    $reception = get_post_meta( $post->ID, 'reception', true );
    $apptchekintime = get_post_meta( $post->ID, 'apptchekintime', true);
    $apptchekouttime = get_post_meta( $post->ID, 'apptchekouttime', true);
    $location = get_post_meta($post->ID, 'apptlocation1', true); 
    $address = get_post_meta($post->ID, 'address', true);
    $town = get_post_meta($post->ID, 'town', true);
    $state = get_post_meta($post->ID, 'state', true);
    $postcode = get_post_meta($post->ID, 'postcode', true);
    $fulladdress = $address . '&nbsp' . $town . '&nbsp' . $state . '.&nbsp' . $postcode;
    $frontendcancellation = get_post_meta($post->ID, 'frontendcancellation', true);
    $reviews = get_post_meta($post->ID, 'reviews', true);
    $buildingname = get_post_meta($post->ID, 'buildingname', true);

    $additionalinfo = get_post_meta($post->ID, 'additionalinfo', true);

    $price37 = get_post_meta($post->ID, 'cp37', true);
    $price728 = get_post_meta($post->ID, 'cp728', true);
    $price2990 = get_post_meta($post->ID, 'cp2990', true);
    $price90 = get_post_meta($post->ID, 'cp90', true);    

    $sofabedcheck = get_post_meta( $post->ID, 'sofabed', true);
    if ($sofabedcheck == 'TRUE'){
    	$sofabed = '&nbsp:&nbsp;(Includes Sofa Bed)';
    } else {
    	$sofabed = '';
    }

	$address = $fulladdress;
	$coordinates = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&sensor=true');
	$coordinates = json_decode($coordinates);
 
		$lat = $coordinates->results[0]->geometry->location->lat;
		$long = $coordinates->results[0]->geometry->location->lng;

		echo '<input type="hidden" id="lat" value="' . $lat . '" />';
		echo '<input type="hidden" id="long" value="' . $long . '" />';
		echo '<input type="hidden" id="latlong" value="' . $lat . ',&nbsp;' . $long . '" />';	

	function has_children() {
		global $post;
		return count( get_posts( array('post_parent' => $post->ID, 'post_type' => $post->post_type) ) );
	}			

?>


<article class="col-md-12 content-block apartment-container">

	<!-- Post Title -->
	
	<div class="row">					
		<div class="col-sm-12">
			<h2 class="apartment-title"><?php the_title(); ?></h2>
		</div>
	</div>

	<?php
	//check if the apartments have apartment types
	if( ( has_children() ) || (count(get_post_ancestors($post) == 2) ) ){ 
		get_template_part('apartmenttypes');
	} elseif ( (!has_children() )  && (!get_post_ancestors( $post )) ) {
		//do nothing
	}
	?>

	<script>
		var count = jQuery('#apartmenttypes a').length;
		console.log(count);
		if ( count == 0 ){
			jQuery('#apartmenttypes').hide();		
		}
	</script>
	
			

	<!-- Images -->	
	<div class="row">
		<div class="col-md-12">
			<h2 class="entry-section-title"><i class="fa fa-chevron-down"></i>Gallery</h2>
		</div>
	</div>		
	<div class="row">
		<div class="col-sm-12 apartment-single-slides">
			<?php 
			$images = get_attached_media('image', $post->ID);
			if(!empty($images)){
				foreach($images as $image) { ?>
					
					<?php $imagesrc = wp_get_attachment_image_src($image->ID,'full')[0]; ?>
					
					<div style="background: url('<?php echo $imagesrc; ?>'); background-repeat: no-repeat;background-position: center center;background-attachment: scroll;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
						<div style="padding:30%;"></div>					
					</div>

			<?php } ?>
			<div class="slider-navigation">
				<div class="row">
					<div class="col-xs-6 slide-left">
						<i class="fa fa-chevron-left slider-control" id="slider-left"></i>			
					</div>
					<div class="col-xs-6 slide-right">
						<i class="fa fa-chevron-right slider-control" id="slider-right"></i>
					</div>
				</div>
			</div>
			<?php } else {
				echo 'Sorry there are no images available for this apartment.';
			} ?>			
		</div>			
	</div>
	<div class="row">
		<div class="col-sm-12 slider-nav">
			<?php 
			$images = get_attached_media('image', $post->ID);
			if(!empty($images)){
				foreach($images as $image) { ?>

				<?php $imagesrc = wp_get_attachment_image_src($image->ID,'full')[0]; ?>

				
			  	<div style="background: url('<?php echo $imagesrc; ?>'); background-repeat: no-repeat;background-position: center center;background-attachment: scroll;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
					<div style="padding:30%;border:1px solid #fff;"></div>
				</div>
			<?php } } ?>
		</div>	
	</div>
	<!-- Facilities -->
	<div class="row">
		<div class="col-md-12">
			<h2 class="entry-section-title"><i class="fa fa-chevron-down"></i>
			Facilities
			<?php
				if ( $rating == '1' ){
					echo '<div class="facilities rating">Rating&nbsp;<i class="fa fa-star"></i></div>';
				} 	elseif ( $rating == '2') {
						echo '<div class="facilities rating">Rating&nbsp;<i class="fa fa-star"></i><i class="fa fa-star"></i></div>';
				}  	elseif ( $rating == '3') {
						echo '<div class="facilities rating">Rating&nbsp;<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>';
				}	elseif ( $rating == '4') {
						echo '<div class="facilities rating">Rating&nbsp;<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>';
				}	elseif ( $rating == '5') {
						echo '<div class="facilities rating">Rating&nbsp;<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>';
				}
			?>
			</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<ul class="facilities">
				<?php if( ! empty( $internet ) ) { echo '<li><i class="fa fa-wifi" style="padding-right:10px;" title="Internet access"></i><span class="mobile-tool">Internet Access:</span>' . $internet . '</li>'; } ?>
														<?php if( ! empty( $sleeps ) ) { echo '<li><i class="fa fa-users" style="padding-right:10px;" title="Sleeps"></i><span class="mobile-tool">Number of guests:</span>Sleeps ' . $sleeps , $sofabed . '</li>'; } ?>
														<?php if( ! empty( $bedrooms ) ) { echo '<li><i class="fa fa-bed" style="padding-right:10px;" title="Number of rooms"></i><span class="mobile-tool">Number of rooms:</span>' . $bedrooms . ' Bedrooms</li>'; } ?>
														<?php if( ! empty( $tv ) ) { echo '<li><i class="fa fa-desktop" style="padding-right:10px;" title="TV"></i><span class="mobile-tool">TV</span>' . $tv . '</li>'; } ?>
														<?php if( ! empty( $dvd ) ) { echo '<li><i class="fa fa-youtube-play" style="padding-right:10px;" title="DVD"></i><span class="mobile-tool">DVD Player:</span>' . $dvd . '</li>'; } ?>
														<?php if( ! empty( $housekeeping ) ) { echo '<li><i class="fa fa-check-square" style="padding-right:10px;" title="Housekeeping"></i><span class="mobile-tool">Housekeeping:</span>' . $housekeeping . '</li>'; } ?>					
			</ul>							
		</div>
		<div class="col-md-6">
			<ul class="facilities">
				<?php if( ! empty( $reception ) ) { echo '<li><i class="fa fa-user-plus" style="padding-right:10px;" title="Reception"></i><span class="mobile-tool">Reception:</span>' . $reception . '</li>'; } ?>
														<?php if( ! empty( $kitchen ) ) { echo '<li><i class="fa fa-cutlery" style="padding-right:10px;" title="Kitchen Facilities"></i><span class="mobile-tool">Kitchen Facilities:</span>' . $kitchen . '</li>'; } ?>
														<?php if( ! empty( $parking ) ) { echo '<li><i class="fa fa-car" style="padding-right:10px;" title="Parking available"></i><span class="mobile-tool">Parking:</span>' . $parking . '</li>'; } ?>
														<?php if( ! empty( $lift ) ) { echo '<li><i class="fa fa-wheelchair" style="padding-right:10px;" title="Disabled / Lift Access"></i><span class="mobile-tool">Disabled / Lift Access:</span>' . $lift . '</li>'; } ?>
														<?php if( ! empty( $laundry ) ) { echo '<li><i class="fa fa-cog" style="padding-right:10px;" title="Laundry Facilities"></i><span class="mobile-tool">Laundry Facilities:</span>' . $laundry . '</li>'; } ?>
				<?php if( ! empty( $apptchekintime ) ) { echo '<li><i class="fa fa-clock-o" style="padding-right:10px;" title="Check In Time"></i>Check In Time: ' . $apptchekintime . '</li>'; } ?>
				<?php if( ! empty( $apptchekouttime ) ) { echo '<li><i class="fa fa-clock-o" style="padding-right:10px;" title="Check Out Time"></i>Check Out Time: ' . $apptchekouttime . '</li>'; } ?>
			</ul>
		</div>				
	</div>



	<!-- Rates -->
	<div class="rates-table">
		<div class="row">
			<div class="col-md-12">
				<h2 class="entry-section-title"><i class="fa fa-chevron-down"></i>Rates (all rates ex VAT)</h2>
			</div>
		</div>
		<div class="row">
			<div class="rates-table-content">
				<div class="col-md-3">
					<p class="rate-title"><strong>3-7 Nights</strong></p>
					<p class="rate-amount"><?php if( ! empty( $price37 ) ) { echo '&pound;' . $price37 . '&nbsp;Per Night'; } else {echo 'Please call.';} ?></p>
				</div>
				<div class="col-md-3">
					<p class="rate-title"><strong>7-28 Nights</strong></p>
					<p class="rate-amount"><?php if( ! empty( $price728 ) ) { echo '&pound;' .  $price728 . '&nbsp;Per Night'; } else {echo 'Please call.';} ?></p>
				</div>
				<div class="col-md-3">
					<p class="rate-title"><strong>29-90 Nights</strong></p>
					<p class="rate-amount">Please Call</p>
				</div>
				<div class="col-md-3">
					<p class="rate-title"><strong>90 + Nights</strong></p>
					<p class="rate-amount">Please Call</p>
				</div>
			</div>
		</div>		
	</div>

	<!-- Address and Description -->
	<div class="row">
		<div class="col-md-12">
			<h2 class="entry-section-title"><i class="fa fa-chevron-down"></i>Description</h2>
		   	<p><strong>Address: <span id="address"><?php echo $buildingname . '&nbsp' . $fulladdress; ?></span></strong></p>
		   	<p id="overview"><?php echo $description; ?></p>    
		</div>
	</div>

	<!-- Location Information -->
	<?php 
	  	$page_title = get_post_meta($post->ID, 'apptlocation1', true);					
		$post_type = 'locations';
		$thelocation = get_page_by_title( $page_title, OBJECT, $post_type );
		$areainfo = get_post_meta($thelocation->ID, 'areainformation', true);
		if (  !empty ($areainfo) ) {
	 ?>
		<div class="row">
			<div class="col-md-12">			
				<p>
					<?php 					 
						echo '<h2 class="entry-section-title"><i class="fa fa-chevron-down"></i>Additional Area Information</h2>';
						echo $areainfo;					 
					?>
				</p>				
			</div>
		</div>
	<?php } ?>

	<!-- Location Map -->	
	<div class="row">
		<div class="col-md-12">
			<?php get_template_part('apartment-map'); ?>
		</div>
	</div>

	<!-- Reviews -->
	<?php 
	  	$page_title = get_post_meta($post->ID, 'apptlocation1', true);					
		$post_type = 'locations';
		$thelocation = get_page_by_title( $page_title, OBJECT, $post_type );
		$reviews = get_post_meta($thelocation->ID, 'reviews', true);
		if (  !empty ($reviews) ) {
	 ?>
		<div class="row">
			<div class="col-md-12">			
				<p>
					<?php 					 
						echo '<h2 class="entry-section-title"><i class="fa fa-chevron-down"></i>Reviews</h2>';
						echo $reviews; 					 
					?>
				</p>				
			</div>
		</div>
	<?php } ?>

	<!-- Reviews -->
	<?php 
		if (  !empty ($frontendcancellation) ) {
	 ?>
		<div class="row">
			<div class="col-md-12">			
				<p>
					<?php 					 
						echo '<h2 class="entry-section-title"><i class="fa fa-chevron-down"></i>Cancellation and Security Deposits</h2>';
						echo wpautop( $frontendcancellation ); 					 
					?>
				</p>				
			</div>
		</div>
	<?php } ?>
	

</article>
