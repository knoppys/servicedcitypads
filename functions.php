<?php

/***************************
* Load SCP Scripts
****************************/
function scp_front_styles() {        

		wp_register_style( 'bootstrapcss', get_template_directory_uri() .'/css/bootstrap.min.css');
        wp_enqueue_style( 'bootstrapcss' );
        wp_register_style( 'datetimecss', get_template_directory_uri() .'/css/jquery.datetimepicker.css');
        wp_enqueue_style( 'datetimecss' );
		wp_register_style( 'latofont', 'http://fonts.googleapis.com/css?family=Lato');
        wp_enqueue_style( 'latofont' );
        wp_register_style( 'slickcss', 'http://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.css');
        wp_enqueue_style( 'slickcss' );
        wp_register_style( 'styles', get_template_directory_uri() .'/styles.css');
        wp_enqueue_style( 'styles' );
        wp_register_style( 'style', get_stylesheet_uri() );
        wp_enqueue_style( 'style' );
     
}
add_action( 'wp_enqueue_scripts', 'scp_front_styles' );

function scp_front_scripts() {    
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );    
    wp_enqueue_script( 'slickjs', 'http://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'googlemap', 'http://maps.google.com/maps/api/js?sensor=false', array('jquery'), '', true );
    wp_enqueue_script( 'datetimepicker', get_template_directory_uri() . '/js/jquery.datetimepicker.js', array('jquery'), '', true );    
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '', true );
    wp_localize_script( 'scripts', 'siteUrlobject', array('siteUrl' => get_bloginfo('url')));
}

add_action( 'wp_enqueue_scripts', 'scp_front_scripts' );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
/***************************
* Galery post types
****************************/

    function my_image_cpt(){
        $cpts = array('apartments');
        return $cpts;
    }
    add_filter('images_cpt','my_image_cpt');
/***************************
* Load Menus
****************************/
register_nav_menus( array(
	'primary' => __( 'Primary' ),
	'footer_menu' => 'The footer menu',
) );




function init_send_my_awesome_form(){

    
		 // Build the message
        $message  = "Name :" . $_POST['name'] ."\n";
        $message .= "<br>Telephone :" . $_POST['number'] ."\n";
        $message .= "<br>Email :" . $_POST['email'] ."\n";
        $message .= "<br>Destination :" . $_POST['destination'] ."\n";
        $message .= "<br>No of nights :" . $_POST['noofnights'] ."\n";
        $message .= "<br>No of guests :" . $_POST['noofguests'] ."\n";
        $message .= "<br>Arrival Date :" . $_POST['arrival'] ."\n";
        $message .= "<br>Leaving Date :" . $_POST['leaving'] ."\n";


        //set the form headers
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "X-Priority: 3\n";
        $headers .= "X-MSMail-Priority: Normal\n";
        $headers .= "X-Mailer: php\n";
        $headers .= "From: Serviced City Pads <info@servicedcitypads.com>\n";
        $headers .= "Cc: richard.stockton@design-et-al.co.uk\n";

        // The email subject
        $subject = 'Booking Request';

        // Who are we going to send this form too
        $to = 'reservations@servicedcitypads.com';

        
        if (wp_mail( $to, $subject, $message, $headers ) ) {
             wp_redirect('http://www.servicedcitypads.com/email-sent/'); exit;
        }
        

    }
    

add_action('wp_ajax_send_my_awesome_form', 'init_send_my_awesome_form');
add_action('wp_ajax_nopriv_send_my_awesome_form', 'init_send_my_awesome_form');




function init_amendment_form(){

    
		// Build the message
        $message  = "Guestname :" . $_POST['guestname'] ."\n";
        $message .= "<br>Arrival Date :" . $_POST['arrival'] ."\n";
        $message .= "<br>Amendment :" . $_POST['message'] ."\n";

        //set the form headers
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "X-Priority: 3\n";
        $headers .= "X-MSMail-Priority: Normal\n";
        $headers .= "X-Mailer: php\n";
        $headers .= "From: Serviced City Pads <info@servicedcitypads.com>\n";
        $headers .= "Cc: richard.stockton@design-et-al.co.uk\n";

        // The email subject
        $subject = 'Amendment Request';

        // Who are we going to send this form too
        $to = 'info@servicedcitypads.com';

        
        if (wp_mail( $to, $subject, $message, $headers ) ) {
             wp_redirect('http://www.servicedcitypads.com/email-sent/'); exit;
        }
        
    }
    

add_action('wp_ajax_amendment_form', 'init_amendment_form');
add_action('wp_ajax_nopriv_amendment_form', 'init_amendment_form');

/***************************
* Custom Excerpt
****************************/
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class wp_bootstrap_navwalker extends Walker_Nav_Menu {

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

			if ( $args->has_children )
				$class_names .= ' dropdown';

			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';

			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				$atts['href']   		= '#';
				$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;

			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .'>';

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {

			extract( $args );

			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;

				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';

				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';

				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';

			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';

			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';

			if ( $container )
				$fb_output .= '</' . $container . '>';

			echo $fb_output;
		}
	}
}

/***************************
* Register Sidebars
****************************/
	$args = array(
		'name'          => __( 'Blog Sidebar' ),
		'id'            => 'sidebar-blog',
		'description'   => '',
	    'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' 
	); 
	register_sidebar( $args );






/***************************
* Login Styles
****************************/
function login_styles() {
echo '<style type="text/css">.login h1 a { 
	background: url('. get_template_directory_uri() .'/images/logo-login.png) no-repeat center top; 
	width:320px;
	border-radius:4px;
	height:118px;
	}
	html { background: url('. get_template_directory_uri() .'/images/login-bkg.png) no-repeat center center fixed; 
  	-webkit-background-size: cover;
  	-moz-background-size: cover;
  	-o-background-size: cover;
  	background-size: cover;
	}
	.login form {
	  margin-top: 20px;
	  margin-left: 0;
	  padding: 26px 24px 46px;
	  font-weight: 400;
	  overflow: hidden;
	  background: rgba(23,54,85,0.5);
	  -webkit-box-shadow: 0 1px 3px rgba(0,0,0,.13);
	  box-shadow: 0 1px 3px rgba(0,0,0,.13);
	}
	.wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {
	  background: #d8b800;
	  border-color: #d8b800;
	  -webkit-box-shadow: inset 0 1px 0 rgba(120,200,230,.6);
	  box-shadow: inset 0 1px 0 rgba(120,200,230,.6);
	  color: #555;
	}
	.login label {
	  color: #fff;
	  font-size: 14px;
	}
	.wp-core-ui .button-primary {
	  background: #d8b800;
	  border-color: #d8b800;
	  -webkit-box-shadow: inset 0 1px 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15);
	  box-shadow: inset 0 1px 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15);
	  color: #333;
	  text-decoration: none;
	}
	body{
		background:none;
	}
	</style>';
}
add_action('login_head', 'login_styles');





/**
Get the client details and populate the client fields in the booking form
**/

function implement_ajax_contactform() {
	if(isset($_POST['validation'])) {
		die();
	} else {
			
			$to = 'alex.knopp@design-et-al.co.uk';
			$subject = 'Website Booking Enquiry';
			$headers = array('Content-Type: text/html; charset=UTF-8');

			$name = ($_POST['name']);
			$email = ($_POST['email']);
			$phone = ($_POST['phone']);
			$occupants = ($_POST['occupants']);
			$nightsstay = ($_POST['nightsstay']);
			$validation = ($_POST['validation']);

			$body = '

	
                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
                        <head style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
                        <!-- If you delete this tag, the sky will fall on your head -->
                        <meta name="viewport" content="width=device-width" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">

                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
                        <title style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">ZURBemails</title>
                            
                        <style type="text/css" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
                        /* ------------------------------------- 
                                GLOBAL 
                        ------------------------------------- */
                        * { 
                            margin:0;
                            padding:0;
                        }
                        * { font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; }

                        img { 
                            max-width: 100%; 
                        }
                        .collapse {
                            margin:0;
                            padding:0;
                        }
                        body {
                            -webkit-font-smoothing:antialiased; 
                            -webkit-text-size-adjust:none; 
                            width: 100%!important; 
                            height: 100%;
                        }


                        /* ------------------------------------- 
                                ELEMENTS 
                        ------------------------------------- */
                        a { color: #2BA6CB;}

                        .btn {
                            text-decoration:none;
                            color: #FFF;
                            background-color: #666;
                            padding:10px 16px;
                            font-weight:bold;
                            margin-right:10px;
                            text-align:center;
                            cursor:pointer;
                            display: inline-block;
                        }

                        p.callout {
                            padding:15px;
                            background-color:#ECF8FF;
                            margin-bottom: 15px;
                        }
                        .callout a {
                            font-weight:bold;
                            color: #2BA6CB;
                        }
                        .spacertext{
                            color: #ebebeb;
                        }
                        table.social {
                        /*  padding:15px; */
                            background-color: #ebebeb;
                            
                        }
                        .social .soc-btn {
                            padding: 3px 7px;
                            font-size:12px;
                            margin-bottom:10px;
                            text-decoration:none;
                            color: #FFF;font-weight:bold;
                            display:block;
                            text-align:center;
                        }
                        a.fb { background-color: #3B5998!important; }
                        a.tw { background-color: #1daced!important; }
                        a.gp { background-color: #DB4A39!important; }
                        a.ms { background-color: #000!important; }

                        .sidebar .soc-btn { 
                            display:block;
                            width:100%;
                        }

                        /* ------------------------------------- 
                                HEADER 
                        ------------------------------------- */
                        table.head-wrap { width: 100%;}

                        .header.container table td.logo { padding: 15px; }
                        .header.container table td.label { padding: 15px; padding-left:0px;}


                        /* ------------------------------------- 
                                BODY 
                        ------------------------------------- */
                        table.body-wrap { width: 100%;}


                        /* ------------------------------------- 
                                FOOTER 
                        ------------------------------------- */
                        table.footer-wrap { width: 100%;    clear:both!important;
                        }
                        .footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
                        .footer-wrap .container td.content p {
                            font-size:10px;
                            font-weight: bold;
                            
                        }


                        /* ------------------------------------- 
                                TYPOGRAPHY 
                        ------------------------------------- */
                        h1,h2,h3,h4,h5,h6 {
                        font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
                        }
                        h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

                        h1 { font-weight:200; font-size: 44px;}
                        h2 { font-weight:200; font-size: 37px;}
                        h3 { font-weight:500; font-size: 27px;}
                        h4 { font-weight:500; font-size: 23px;}
                        h5 { font-weight:900; font-size: 17px;}
                        h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

                        .collapse { margin:0!important;}

                        p, ul { 
                            margin-bottom: 10px; 
                            font-weight: normal; 
                            font-size:14px; 
                            line-height:1.6;
                        }
                        p.lead { font-size:17px; }
                        p.last { margin-bottom:0px;}

                        ul li {
                            margin-left:5px;
                            list-style-position: inside;
                        }

                        /* ------------------------------------- 
                                SIDEBAR 
                        ------------------------------------- */
                        ul.sidebar {
                            background:#ebebeb;
                            display:block;
                            list-style-type: none;
                        }
                        ul.sidebar li { display: block; margin:0;}
                        ul.sidebar li a {
                            text-decoration:none;
                            color: #666;
                            padding:10px 16px;
                        /*  font-weight:bold; */
                            margin-right:10px;
                        /*  text-align:center; */
                            cursor:pointer;
                            border-bottom: 1px solid #777777;
                            border-top: 1px solid #FFFFFF;
                            display:block;
                            margin:0;
                        }
                        ul.sidebar li a.last { border-bottom-width:0px;}
                        ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}




                        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                        .container {
                            display:block!important;
                            max-width:600px!important;
                            margin:0 auto!important; /* makes it centered */
                            clear:both!important;
                        }

                        /* This should also be a block element, so that it will fill 100% of the .container */
                        .content {
                            padding:15px;
                            max-width:600px;
                            margin:0 auto;
                            display:block; 
                        }

                        /* Lets make sure tables in the content area are 100% wide */
                        .content table {
                          width: 100%;
                          border-radius: 4px;
                        }


                        /* Odds and ends */
                        .column {
                            width: 300px;
                            float:left;
                        }
                        .column tr td { padding: 15px; }
                        .price tr td { padding: 15px; }
                        .row tr td { padding: 15px; }
                        .column-wrap { 
                            padding:0!important; 
                            margin:0 auto; 
                            max-width:600px!important;
                        }
                        .column table { width:100%;}
                        .social .column {
                            width: 280px;
                            min-width: 279px;
                            float:left;
                        }
                        .social .price {
                            width: 100%;
                            min-width: 279px;
                            text-align: center;
                            background: #e2e2e2;
                        }
                        .social .row {
                            width: 100%;
                            min-width: 279px;
                            background: #e2e2e2;
                        }

                        /* Be sure to place a .clear element after each set of columns, just to be safe */
                        .clear { display: block; clear: both; }


                        /* ------------------------------------------- 
                                PHONE
                                For clients that support media queries.
                                Nothing fancy. 
                        -------------------------------------------- */
                        @media only screen and (max-width: 600px) {

                            .spacertext{display: none;}
                            
                            a[class="btn"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

                            div[class="column"] { width: auto!important; float:none!important;}
                            
                            table.social div[class="column"] {
                                width:auto!important;
                            }

                        }
                        </style>

                        </head>
                         
                        <body bgcolor="#FFFFFF" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none;height: 100%;width: 100%!important;">

                        <!-- HEADER -->
                        <table class="head-wrap" bgcolor="#999999" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;">
                            <tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
                                <td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"></td>
                                <td class="header container" style="margin: 0 auto!important;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;display: block!important;max-width: 600px!important;clear: both!important;">
                                    
                                        <div class="content" style="margin: 0 auto;padding: 15px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;max-width: 600px;display: block;">
                                            <table bgcolor="#999999" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;border-radius: 4px;">
                                            <tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
                                                <td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"><h6 class="collapse" style="margin: 0!important;padding: 0;font-family: &quot;HelveticaNeue-Light&quot;, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;line-height: 1.1;margin-bottom: 15px;color: #444;font-weight: 900;font-size: 14px;text-transform: uppercase;">Booking Title & REF:' . $title .'</h6></td>
                                                <td align="right" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"><h6 class="collapse" style="margin: 0!important;padding: 0;font-family: &quot;HelveticaNeue-Light&quot;, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;line-height: 1.1;margin-bottom: 15px;color: #444;font-weight: 900;font-size: 14px;text-transform: uppercase;">Booking Confirmation</h6></td>
                                            </tr>
                                        </table>
                                        </div>
                                        
                                </td>
                                <td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"></td>
                            </tr>
                        </table><!-- /HEADER -->


                        <!-- BODY -->
                        <table class="body-wrap" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;">
                            <tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
                                <td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"></td>
                                <td class="container" bgcolor="#FFFFFF" style="margin: 0 auto!important;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;display: block!important;max-width: 600px!important;clear: both!important;">

                                    <div class="content" style="margin: 0 auto;padding: 15px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;max-width: 600px;display: block;">
                                    <table style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;border-radius: 4px;">
                                        <tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
                                            <td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
                                                <p style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 14px;line-height: 1.6;"><img src="http://greenmonkeypublicrelations.com/scpads/wp-content/plugins/scp-bookings/native/mail/scplogo.png" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;max-width: 100%;"></p><!-- /hero -->
                                                <h1 style="margin: 0;padding: 0;font-family: &quot;HelveticaNeue-Light&quot;, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;line-height: 1.1;margin-bottom: 15px;color: #000;font-weight: 200;font-size: 44px;">Website Enquiry</h1>
                                                <p class="lead" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 17px;line-height: 1.6;">A submission has been made yusing the websites enquiry form.</p>



                                                <!-- Name -->
                                                <p class="lead" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 17px;line-height: 1.6;">Name:&nbsp; ' . $name . '</p>

                                                <!-- Email -->
                                                <p class="lead" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 17px;line-height: 1.6;">Email:&nbsp; ' . $email . '</p>

                                                <!-- Phone -->
                                                <p class="lead" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 17px;line-height: 1.6;">Phone:&nbsp; ' . $phone . '</p>

                                                <!-- Occupants -->
                                                <p class="lead" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 17px;line-height: 1.6;">Occupants:&nbsp; ' . $occupants . '</p>

                                                <!-- Nights Stay -->
                                                <p class="lead" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 17px;line-height: 1.6;">Nights Stay:&nbsp; ' . $nightsstay . '</p>

                                                                                           
												<table width="100%" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;border-radius: 4px;">
                                                    <tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
                                                        <td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">                                 
                                                        </td>
                                                    </tr>
                                                </table>
                                                
                                                <!-- social & contact -->
                                                <table class="social" width="100%" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;background-color: #ebebeb;width: 100%;border-radius: 4px;">
                                                    <tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
                                                        <td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
                                                            
                                                            <!--- column 2 -->
                                                            <table align="left" class="column" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 280px;float: left;border-radius: 4px;min-width: 279px;">
                                                                <tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
                                                                    <td style="margin: 0;padding: 15px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">              
                                                                        
                                                                        <h5 class="" style="margin: 0;padding: 0;font-family: &quot;HelveticaNeue-Light&quot;, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;line-height: 1.1;margin-bottom: 15px;color: #000;font-weight: 900;font-size: 17px;">Connect with Us:</h5>
                                                                        <p class="" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 14px;line-height: 1.6;"><a href="https://www.facebook.com/ServicedCityPadsApartments" class="soc-btn fb" style="margin: 0;padding: 3px 7px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;color: #FFF;font-size: 12px;margin-bottom: 10px;text-decoration: none;font-weight: bold;display: block;text-align: center;background-color: #3B5998!important;">Facebook</a> <a href="https://twitter.com/CityPadTeam" class="soc-btn tw" style="margin: 0;padding: 3px 7px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;color: #FFF;font-size: 12px;margin-bottom: 10px;text-decoration: none;font-weight: bold;display: block;text-align: center;background-color: #1daced!important;">Twitter</a> <a href="#" class="soc-btn gp" style="margin: 0;padding: 3px 7px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;color: #FFF;font-size: 12px;margin-bottom: 10px;text-decoration: none;font-weight: bold;display: block;text-align: center;background-color: #DB4A39!important;">Google+</a></p>                      
                                                                        
                                                                    </td>
                                                                </tr>
                                                            </table><!-- /column 2 -->  
                                                            
                                                            <!--- column 2 -->
                                                            <table align="left" class="column" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 280px;float: left;border-radius: 4px;min-width: 279px;">
                                                                <tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
                                                                    <td style="margin: 0;padding: 15px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">              
                                                                                                    
                                                                        <h5 class="" style="margin: 0;padding: 0;font-family: &quot;HelveticaNeue-Light&quot;, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;line-height: 1.1;margin-bottom: 15px;color: #000;font-weight: 900;font-size: 17px;">Contact Info:</h5>                                             
                                                                        <p style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 14px;line-height: 1.6;">Phone: <strong style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">0844 335 8866</strong><br style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">Email: <strong style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"><a href="mailto:adele@servicedcitypads.com" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;color: #2BA6CB;">Adele Thompson <br style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"> Reservations & Bookings Manager</a></strong></p>
                                        
                                                                    </td>
                                                                </tr>
                                                            </table><!-- /column 2 -->
                                                
                                                            <span class="clear" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;display: block;clear: both;"></span>   
                                                            
                                                        </td>
                                                    </tr>
                                                </table><!-- /social & contact -->

                                            </td>
                                        </tr>
                                    </table>
                                    </div>
                                                            
                                </td>
                                <td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"></td>
                            </tr>
                        </table><!-- /BODY -->

                        </body>
                        </html>



			';



			wp_mail( $to, $subject, $body, $headers );
					    


		    die();
		}
	}
add_action('wp_ajax_contactform', 'implement_ajax_contactform');
add_action('wp_ajax_nopriv_contactform', 'implement_ajax_contactform');



/***************************
* Bootstrap pagination function
****************************/
/**
 * Snippet Name: Pagination for WordPress and Bootstrap
 * Snippet URL: http://www.wpcustoms.net/snippets/pagination-for-wordpress-and-bootstrap/
 */
 // usage:
function page_navi($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
		
	echo $before.'<div class="pagination"><ul class="clearfix">'."";
	if ($paged > 1) {
		$first_page_text = "«";
		echo '<li class="prev"><a href="'.get_pagenum_link().'" title="First">'.$first_page_text.'</a></li>';
	}
		
	$prevposts = get_previous_posts_link('← Previous');
	if($prevposts) { echo '<li>' . $prevposts  . '</li>'; }
	else { echo '<li class="disabled"><a href="#">← Previous</a></li>'; }
	
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="active"><a href="#">'.$i.'</a></li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	echo '<li class="">';
	next_posts_link('Next →');
	echo '</li>';
	if ($end_page < $max_page) {
		$last_page_text = "»";
		echo '<li class="next"><a href="'.get_pagenum_link($max_page).'" title="Last">'.$last_page_text.'</a></li>';
	}
	echo '</ul></div>'.$after."";
}





//Remove the admin bar
add_action('after_setup_theme', 'remove_admin_bar');
	function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}


//Redirect the failed login attempt
add_action( 'wp_login_failed', 'my_front_end_login_fail' );  // hook failed login

function my_front_end_login_fail( $username ) {
   $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
   // if there's a valid referrer, and it's not the default log-in screen
   if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
      wp_redirect( $referrer . '?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
      exit;
   }
}