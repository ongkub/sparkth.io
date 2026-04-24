<?php

if ( ! function_exists( 'oscend_setup' ) ) :

function oscend_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style( 'css/editor-style.css' );

	// removes detailed login error information for security

	add_filter( 'login_errors', function($a){return null;});

	//Loading theme textdomain
	load_theme_textdomain( 'oscend', get_template_directory() . '/languages' );

	// This theme uses post thumbnails
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );

		// Define various thumbnail sizes
		$width = ( ( oscend_get_option( 'portfolio_settings_trumb_width', '555' ) ) &&
					 is_numeric( oscend_get_option( 'portfolio_settings_trumb_width', '555' ) ) &&
					 oscend_get_option( 'portfolio_settings_trumb_width', '555' ) > 0
				 ) ? oscend_get_option( 'portfolio_settings_trumb_width', '555' ) : 555;
		$height = ( ( oscend_get_option( 'portfolio_settings_trumb_height', '555' ) ) &&
					 is_numeric( oscend_get_option( 'portfolio_settings_trumb_height', '555' ) ) &&
					 oscend_get_option( 'portfolio_settings_trumb_height', '555' ) > 0
				 ) ? oscend_get_option( 'portfolio_settings_trumb_height', '555' ) : 555;
		add_image_size('oscend-portfolio-thumb', $width, $height, true);
		add_image_size('oscend-post-thumb-large', 1170, 560, true); // for blog full widht
		add_image_size('oscend-post-thumb-middle', 770, 370, true); // for blog with sidebar
		add_image_size('oscend-post-thumb-home', 555, 400, true); // for blog block on home page
		add_image_size('oscend-post-thumb-small', 250, 155, true); // for blog widget
		add_image_size('oscend-preview-thumb', 100, 100, true); // for share
		add_image_size('oscend-review-thumb', 300, 300, true); //for home testimonials img
	}

	// support title-tag for Wordpress 4.1+
	add_theme_support( 'title-tag' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// custom menu support 
	if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus( array ('primary_menu' => esc_html__( 'Primary Menu', 'oscend' ) ) );
	}

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'gallery', 'quote', 'video', 'link', 'audio' ) );

	if ( ! isset( $content_width ) ) {
		$content_width = 1200;
	}

	// ADD SUPPORT FOR WORDPRESS MENU ************/


	$args = array(
		'flex-width' => true,
		'width' => 350,
		'flex-height' => true,
		'height' => 'auto',
		'default-image' => get_template_directory_uri() . '/images/logo.jpg'
	);

	add_theme_support('custom-header', $args);


	$args = array(
		'default-color' => 'FFFFFF'
	);

	add_theme_support('custom-background', $args);

	// WooCommerce support
	add_theme_support( 'woocommerce' );

}
endif;// oscend_setup
add_action( 'after_setup_theme', 'oscend_setup' );


add_filter('nav_menu_css_class' , 'oscend_special_nav_class' , 10 , 2);
function oscend_special_nav_class($classes, $item){
	 if( in_array( 'current-menu-item', $classes ) ){
			 $classes[] = 'active ';
	 }
	 return $classes;
}

