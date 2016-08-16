<?php include('header2.php'); ?>


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

<section class="content-area">
	<div class="container">
		<div class="row">			
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6">
						<?php include('post-entry.php'); ?>
						<?php include('post-entry.php'); ?>
						<?php include('post-entry.php'); ?>						
					</div>	
					<div class="col-md-6">
						<?php include('post-entry.php'); ?>
						<?php include('post-entry.php'); ?>
						<?php include('post-entry.php'); ?>						
					</div>
				</div>
				<div class="row blog-nav">
					<div class="col-md-6"><a href="#" class="btn btn-primary"><i class="fa fa-chevron-left"></i>&nbsp;Prev</a></div>
					<div class="col-md-6"><a href="#" class="btn btn-primary">Next&nbsp;<i class="fa fa-chevron-right"></i></a></div>					
				</div>
			</div>
			<aside class="col-md-3">
				<?php include('sidebar-blog.php'); ?>
			</aside>
		</div>
	</div>
</section>

<?php include('footer.php'); ?>