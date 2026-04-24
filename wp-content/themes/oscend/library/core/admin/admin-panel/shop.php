<?php

function oscend_customize_shop_tab($wp_customize, $theme_name) {

	$wp_customize->add_section( 'oscend_shop_settings' , array(
		'title'      => esc_html__( 'Shop', 'oscend' ),
		'priority'   => 15,
	) );


	$wp_customize->add_setting( 'oscend_shop_settings_global_product' , array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_onoff'
	) );

	$wp_customize->add_control(
		'oscend_shop_settings_global_product',
		array(
			'label'    => esc_html__( 'Global sidebar settings for Product pages', 'oscend' ),
			'section'  => 'oscend_shop_settings',
			'settings' => 'oscend_shop_settings_global_product',
			'description' => esc_html__( 'Global sidebar settings for all Product pages.', 'oscend' ),
			'type'     => 'select',
			'choices'  => array(
				'on'  => esc_html__( 'On', 'oscend' ),
				'off'  => esc_html__( 'Off', 'oscend' ),
			),
			'priority'   => 3
		)
	);

	$wp_customize->add_setting( 'oscend_shop_settings_sidebar_type' , array(
		'default'     => '2',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_sidebar_blog_type'
	) );

	$wp_customize->add_control(
		'oscend_shop_settings_sidebar_type',
		array(
			'label'    => esc_html__( 'Product sidebar type', 'oscend' ),
			'section'  => 'oscend_shop_settings',
			'settings' => 'oscend_shop_settings_sidebar_type',
			'description' => esc_html__( 'Select sidebar type for Product pages.', 'oscend' ),
			'type'     => 'select',
			'choices'  => array(
				'1' => esc_html__( 'Full width', 'oscend' ),
				'2' => esc_html__( 'Right Sidebar', 'oscend' ),
				'3' => esc_html__( 'Left Sidebar', 'oscend' ),
			),
			'priority' => 5
		)
	);

	$wp_customize->add_setting( 'oscend_shop_settings_sidebar_content' , array(
		'default'     => 'product-sidebar-1',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_sidebar_blog_content'
	) );

	$wp_customize->add_control(
		'oscend_shop_settings_sidebar_content',
		array(
			'label'    => esc_html__( 'Product sidebar content', 'oscend' ),
			'section'  => 'oscend_shop_settings',
			'settings' => 'oscend_shop_settings_sidebar_content',
			'description' => esc_html__( 'Select sidebar content for product pages', 'oscend' ),
			'type'     => 'select',
			'choices'  => array(
				'sidebar-1' => esc_html__( 'WP Default Sidebar', 'oscend' ),
				'global-sidebar-1' => esc_html__( 'Blog Sidebar', 'oscend' ),
				'portfolio-sidebar-1' => esc_html__( 'Portfolio Sidebar', 'oscend' ),
				'shop-sidebar-1' => esc_html__( 'Shop Sidebar', 'oscend' ),
				'product-sidebar-1' => esc_html__( 'Product Sidebar', 'oscend' ),
				'custom-area-1' => esc_html__( 'Custom Area', 'oscend' ),
			),
			'priority' => 10
		)
	);

}