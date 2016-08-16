<?php
//include the debuf file
//include 'debug.php';
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php wp_head(); ?>
</head>
<body>
<!-- color-secondary-1-0 -->
<header class="home-naviagtion innerheader" id="sticky">
	<div class="container">
		<div class="row">	
			<div class="col-md-3 logo">				
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" title="Serviced City Pads Logo" alt="Serviced City Pads Logo">	
			</div>
			<div class="col-md-9">
				<?php /* include('navigation.php'); */ ?>
				<?php get_template_part('navigation'); ?>
			</div>
		</div>	
	</div>
</header>





