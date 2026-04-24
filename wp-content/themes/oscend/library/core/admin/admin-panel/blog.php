<?php

function oscend_customize_blog_tab($wp_customize, $theme_name) {

	$wp_customize->add_section( 'oscend_blog_settings' , array(
		'title'      => esc_html__( 'Blog', 'oscend' ),
		'priority'   => 12,
	) );


	$wp_customize->add_setting( 'oscend_blog_settings_sidebar_type' , array(
		'default'     => '2',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_sidebar_blog_type'
	) );

	$wp_customize->add_control(
		'oscend_blog_settings_sidebar_type',
		array(
			'label'    => esc_html__( 'Blog sidebar type', 'oscend' ),
			'section'  => 'oscend_blog_settings',
			'settings' => 'oscend_blog_settings_sidebar_type',
			'description' => esc_html__( 'Select sidebar type for blog pages (not for static page) - all posts, arhive, category, etc.', 'oscend' ),
			'type'     => 'select',
			'choices'  => array(
				'1' => esc_html__( 'Full width', 'oscend' ),
				'2' => esc_html__( 'Right Sidebar', 'oscend' ),
				'3' => esc_html__( 'Left Sidebar', 'oscend' ),
			),
			'priority' => 5
		)
	);

	$wp_customize->add_setting( 'oscend_blog_settings_sidebar_content' , array(
		'default'     => 'sidebar-1',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_sidebar_blog_content'
	) );

	$wp_customize->add_control(
		'oscend_blog_settings_sidebar_content',
		array(
			'label'    => esc_html__( 'Blog sidebar content', 'oscend' ),
			'section'  => 'oscend_blog_settings',
			'settings' => 'oscend_blog_settings_sidebar_content',
			'description' => esc_html__( 'Select sidebar content for blog pages (not for static page) - all posts, arhive, category, etc.', 'oscend' ),
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

	$wp_customize->add_setting( 'oscend_blog_settings_readmore' , array(
		'default'     => esc_html__('Read more', 'oscend' ),
		'transport'   => 'refresh',
		'sanitize_callback'=>'oscend_sanitize_text',
	) );

	$wp_customize->add_control(
		'oscend_blog_settings_readmore',
		array(
			'label'    => esc_html__( 'Read More button text', 'oscend' ),
			'section'  => 'oscend_blog_settings',
			'settings' => 'oscend_blog_settings_readmore',
			'type'     => 'textfield',
			'priority' => 20
		)
	);

	$wp_customize->add_setting( 'oscend_blog_show_share' , array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_onoff'
	) );

	$wp_customize->add_control(
		'oscend_blog_show_share',
		array(
			'label'    => esc_html__( 'Show share buttons', 'oscend' ),
			'section'  => 'oscend_blog_settings',
			'settings' => 'oscend_blog_show_share',
			'description' => esc_html__( 'Show share buttons on single post.', 'oscend' ),
			'type'     => 'select',
			'choices'  => array(
				'on'  => esc_html__( 'On', 'oscend' ),
				'off'  => esc_html__( 'Off', 'oscend' ),
			),
			'priority'   => 30
		)
	);

	$wp_customize->add_setting( 'oscend_blog_show_date' , array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_onoff'
	) );

	$wp_customize->add_control(
		'oscend_blog_show_date',
		array(
			'label'    => esc_html__( 'Show date', 'oscend' ),
			'section'  => 'oscend_blog_settings',
			'settings' => 'oscend_blog_show_date',
			'description' => esc_html__( 'Show date posts on/off.', 'oscend' ),
			'type'     => 'select',
			'choices'  => array(
				'on'  => esc_html__( 'On', 'oscend' ),
				'off'  => esc_html__( 'Off', 'oscend' ),
			),
			'priority'   => 40
		)
	);

	$wp_customize->add_setting( 'oscend_blog_show_author' , array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_onoff'
	) );

	$wp_customize->add_control(
		'oscend_blog_show_author',
		array(
			'label'    => esc_html__( 'Show author', 'oscend' ),
			'section'  => 'oscend_blog_settings',
			'settings' => 'oscend_blog_show_author',
			'description' => esc_html__( 'Show author posts on/off.', 'oscend' ),
			'type'     => 'select',
			'choices'  => array(
				'on'  => esc_html__( 'On', 'oscend' ),
				'off'  => esc_html__( 'Off', 'oscend' ),
			),
			'priority'   => 50
		)
	);

	$wp_customize->add_setting( 'oscend_blog_show_tags' , array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_onoff'
	) );

	$wp_customize->add_control(
		'oscend_blog_show_tags',
		array(
			'label'    => esc_html__( 'Show Tags', 'oscend' ),
			'section'  => 'oscend_blog_settings',
			'settings' => 'oscend_blog_show_tags',
			'description' => esc_html__( 'Show Tags list on/off.', 'oscend' ),
			'type'     => 'select',
			'choices'  => array(
				'on'  => esc_html__( 'On', 'oscend' ),
				'off'  => esc_html__( 'Off', 'oscend' ),
			),
			'priority'   => 50
		)
	);

}