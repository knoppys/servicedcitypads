<?php

/*
Template Name: Login
*/

get_header();


if ( have_posts() ) : while ( have_posts() ) : the_post();

$homeurl = get_site_url();

$args = array(
	'echo'           => true,
	'remember'       => true,
	'redirect'       => $homeurl,
	'form_id'        => 'loginform',
	'id_username'    => 'user_login',
	'id_password'    => 'user_pass',
	'id_remember'    => 'rememberme',
	'id_submit'      => 'wp-submit',
	'label_username' => __( 'Username' ),
	'label_password' => __( 'Password' ),
	'label_remember' => __( 'Remember Me' ),
	'label_log_in'   => __( 'Log In' ),
	'value_username' => '',
	'value_remember' => false
);
?>

<div class="city-pads-login">
	<center>
	<?php
	if (($_SERVER["QUERY_STRING"]) == 'login=failed') {
		echo '
		Im sorry but the details you entered are incorrect. <br> Please try again or contact a member of staff.
		';
	}
	
	
	wp_login_form($args); ?>
	</center>
</div>

<?php
endwhile; else :
	//do nothing
endif; 

get_footer();


?>