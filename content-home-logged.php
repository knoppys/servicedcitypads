<?php
$user = wp_get_current_user();
$username = $user->user_email;
$isadmin = get_user_meta($user->ID, 'companyadmin', true);
$companyname = get_user_meta($user->ID, 'companyname', true);	

//Mobile rules. We could use CSS but this text would show up in the csv download.	
function mobile($string){

	if (wp_is_mobile()) {
		return $string;
	} else {
		return '';
	}

}

// WP_Query arguments
if ($isadmin == 'Y') {
	$args = array (
		'posts_per_page'	=>	-1,
		'post_status' => array('publish','archive'),
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
		'post_status' => array('publish','archive'),
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
$bookings = get_posts($args);
?>
<section class="logged-in-home">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<h1>Your Bookings</h1>
				<table class="bookingtable">
					<thead>
						<tr>
						<td>Arrival Date</td>
						<td>Leaving Date</td>
						<td>Guest Name</td>
						<td>Apartment Name</td>
						<td>Location</td>
						<td style="text-align: center;">No of nights</td>
						<td style="text-align: right;">Nightly Rate</td>
						<td style="text-align: center;">Cost Code</td>
						<td style="text-align: right;">Total Cost</td>
						</tr>										
					</thead>					
					<?php
					foreach ($bookings as $booking) { 
						//Booking Meta
						$meta = get_post_meta($booking->ID); 
						//Apartment Meta						
		                $page = get_page_by_title( $meta['apartmentname'][0], OBJECT, 'apartments');
		                $permalink = $page->guid;
		                $apartmentmeta = get_post_meta($page->ID);	
		                //GFet map link  
				
						?> <tr>
						<td><?php mobile('<span class="entrylabel">Arrival Date (click to view booking)</span>'); ?><a target="_blank" title="View Booking" href="<?php echo get_the_permalink($booking->ID); ?>"><?php echo $meta['arrivaldate'][0]; ?></a></td>
						<td><?php mobile('<span class="entrylabel">Leaving Date</span>'); ?><?php echo $meta['leavingdate'][0]; ?></td>
						<td><?php mobile('<span class="entrylabel">Guest Name</span>'); ?><?php echo $meta['guesname'][0]; ?></td>
						<td><?php mobile('<span class="entrylabel">Apartment Name</span>'); ?><?php if ($meta['displayname'][0]) {echo $meta['displayname'][0];}else{echo $meta['apartmentname'][0];}?></td>
						<td><?php mobile('<span class="entrylabel">Location (click to view map)</span>'); ?><a title="View on map" href="https://www.google.co.uk/maps/place/<?php echo $apartmentmeta['postcode'][0]; ?>" target="_blank"><?php echo $apartmentmeta['address'][0]; ?> <?php echo $apartmentmeta['apptlocation2'][0]; ?>. <?php echo $apartmentmeta['postcode'][0]; ?></a></td>
						<td style="text-align: center;"><?php mobile('<span class="entrylabel">No of nights</span>');?><?php echo $meta['numberofnights'][0]; ?></td>
						<td style="text-align: right;"><?php mobile('<span class="entrylabel">Nightly Rate</span>');?>£<?php echo $meta['rentalprice'][0]; ?></td>
						<td style="text-align: center;"><?php mobile('<span class="entrylabel">Cost Code</span>');?><?php echo $meta['costcode'][0]; ?></td>
						<td class="finaltd" style="text-align: right;"><?php mobile('<span class="entrylabel">Total Cost</span>');?>£<?php echo $meta['totalcost'][0]; ?></td>						
					</tr> <?php }	?>
				</table>
				<button id="export" data-export="export">Export to CSV</button>
			</div>
		</div>

	</div>
</section>
<script type="text/javascript">

	jQuery(document).ready(function(){
		jQuery("#export").click(function(){
		  jQuery(".bookingtable").tableToCSV();
		});
	})


	jQuery.fn.tableToCSV = function() {
    
    var clean_text = function(text){
        text = text.replace(/"/g, '""');
        return '"'+text+'"';
    };
    
	jQuery(this).each(function(){
			var table = jQuery(this);
			var caption = jQuery(this).find('caption').text();
			var title = [];
			var rows = [];

			jQuery(this).find('tr').each(function(){
				var data = [];
				jQuery(this).find('th').each(function(){
                    var text = clean_text(jQuery(this).text());
					title.push(text);
					});
				jQuery(this).find('td').each(function(){
                    var text = clean_text(jQuery(this).text());
					data.push(text);
					});
				data = data.join(",");
				rows.push(data);
				});
			title = title.join(",");
			rows = rows.join("\n");

			var csv = title + rows;
			var uri = 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv);
			var download_link = document.createElement('a');
			download_link.href = uri;
			var ts = new Date().getTime();
			if(caption==""){
				download_link.download = ts+".csv";
			} else {
				download_link.download = caption+"-"+ts+".csv";
			}
			document.body.appendChild(download_link);
			download_link.click();
			document.body.removeChild(download_link);
	});
    
};

</script>
<?php get_footer('bookings'); ?>