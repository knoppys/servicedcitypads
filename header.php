<?php
//include the debuf file
//include 'debug.php';
?>
<!DOCTYPE html>
<html>
<head>
<title><?php wp_title(); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php wp_head(); ?>
</head>
<body>
<header class="home-naviagtion" id="sticky">
	<nav class="navbar navbar-default">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	        	
		    
		 
	    	  <!-- Collect the nav links, forms, and other content for toggling -->
			    
		  
		    	<div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a href="<?php echo get_site_url(); ?>" class="navbar-brand" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" title="Serviced City Pads Logo" alt="Serviced City Pads Logo"></a>
			    </div>	    	
		    
 <?php
			        wp_nav_menu( array(
			            'menu'              => 'primary',
			            'theme_location'    => 'primary',
			            'depth'             => 2,
			            'container'         => 'div',
			            'container_class'   => 'collapse navbar-collapse',
			    		'container_id'      => 'bs-example-navbar-collapse-1',
			            'menu_class'        => 'nav navbar-nav pull-right',
			            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			            'walker'            => new wp_bootstrap_navwalker())
			        );
			    ?>
	    

	  
	  </div><!-- /.container-fluid -->
	</nav>
</header>

<section class="warning">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<i class="fa fa-warning"></i>
			</div>
			<div class="col-sm-7">
				<h2 style="font-size: 3em;">System Outage</h2>
                <p style="font-size: 25px;">Due to unforeseen circumstances, our internal communications are temporarily unavailable.  </p>
                <p>Please contact our Reservations Team on:</p>
                <p class="warning-tel" style="font-size: 49px;">07470 477 208</p>
                <p>We appreciate your patience and apologise for any inconvenience caused. </p>
			</div>
		</div>
	</div>
</section>
<?php 
if(is_front_Page()){
		//get_template_part('slider');
		get_template_part('search-pulldown');
	}
?>







