<?php


function oscend_init_sidebars() {
	if ( function_exists( 'register_sidebar' ) ) {

		$oscend_sidebar_css_animation = ( oscend_get_option('css_animation_settings_sidebar', '') != '' ) ? $oscend_sidebar_css_animation = ' wow '.oscend_get_option('css_animation_settings_sidebar') : '';

		register_sidebar( array(
			'name' => esc_html__( 'WP Default Sidebar', 'oscend' ),
			'id'	=> 'sidebar-1',
			'before_widget' => '<div id="%1$s" class="widget sidebar-item %2$s ' . esc_attr($oscend_sidebar_css_animation) . '">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>',
		));

		register_sidebar( array(
			'name' => esc_html__( 'Blog Sidebar', 'oscend' ),
			'id' => 'global-sidebar-1',
			'before_widget' => '<div id="%1$s" class="widget sidebar-item %2$s ' . esc_attr($oscend_sidebar_css_animation) . '">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>',
		));

		register_sidebar( array(
			'name' => esc_html__( 'Portfolio sidebar', 'oscend' ),
			'id'	=> 'portfolio-sidebar-1',
			'before_widget' => '<div id="%1$s" class="widget sidebar-item %2$s ' . esc_attr($oscend_sidebar_css_animation) . '">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>',
		));

		register_sidebar(array(
			'name' => esc_html__('Shop sidebar', 'oscend' ),
			'id'	=> 'shop-sidebar-1',
			'before_widget' => '<div id="%1$s" class="widget sidebar-item %2$s ' . esc_attr($oscend_sidebar_css_animation) . '">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title"><span>',
			'after_title' => '</span></h5>',
		));

		register_sidebar(array(
			'name' => esc_html__('Product sidebar', 'oscend' ),
			'id'	=> 'product-sidebar-1',
			'before_widget' => '<div id="%1$s" class="widget sidebar-item %2$s ' . esc_attr($oscend_sidebar_css_animation) . '">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title"><span>',
			'after_title' => '</span></h5>',
		));

		register_sidebar( array(
			'name' => esc_html__( 'Custom Area', 'oscend' ),
			'id'	=> 'custom-area-1',
			'before_widget' => '<div id="%1$s" class="widget sidebar-item %2$s ' . esc_attr($oscend_sidebar_css_animation) . '">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>',
		));

	}
}


add_action( 'widgets_init', 'oscend_init_sidebars' );