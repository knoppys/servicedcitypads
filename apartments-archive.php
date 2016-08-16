<?php get_header('header2'); ?> ?>


<section id="offers-slider" class="offers-slider">
<h2 style="display:none;">Special Offers</h2>		
	<div id="home-slides">		
		<div id="slide" style="background: url(images/liberpool.png) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
			<div class="slide-content">
				<div class="slide-message">
					<h1>2 nights stay in Liverpool for £99</h1>
					<h3>Subliminal text to go here, A little bit about the offer.</h3>
					<a href="#" class="btn btn-primary">Find out more</a>
				</div>
			</div>
		</div>
		<div id="slide" style="background: url(images/london.png) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
			<div class="slide-content">
				<div class="slide-message">
					<h1>4 nights stay in London for £399</h1>
					<h3>Subliminal text to go here, A little bit about the offer.</h3>
					<a href="#" class="btn btn-primary">Find out more</a>
				</div>
			</div>					
		</div>
	</div>	
</section>
<section class="archive-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php /* include('home-search-form.php'); */ ?>
				<?php get_template_part('home-search-form'); ?>
			</div>
		</div>
		
	</div>
</section>
<div class="container">
	<div class="row">
		<div class="col-md-12 searchpulldown">
			<span class="btn btn-primary pulldown"><i class="fa fa-search" style="padding-right:10px;"></i>Search</span>
		</div>
	</div>
</div>

<section class="content-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php /* include('apartments-entry.php'); */ ?>
				<?php get_template_part('apartments-entry'); ?>				
			</div>		
			<aside class="col-md-4">
				<?php /* include('vertical-offers.php'); */?>
				<?php get_template_part('vertical-offers'); ?>
				<?php /* include('areas-covered.php'); */?>
				<?php get_template_part('areas-covered'); ?>
			</aside>
		</div>
	</div>
</section>

<?php get_footer(); ?>