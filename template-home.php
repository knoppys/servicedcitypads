<?php 
/* 
Template Name: Home Page
*/

if (is_user_logged_in()) {
	get_header('headerlogin');
} else {
	get_header();
}


if ( have_posts() ) : while ( have_posts() ) : the_post();




	if (is_user_logged_in()) {
		get_template_part('content-home-logged');
	} else {
		get_template_part('content-home-notlogged');
	}



endwhile; else : 
	// do nothing
endif;


if (is_user_logged_in()) {
	get_footer('footer-login');
} else {
	get_footer();
}


