<?php

function oscend_customize_portfolio_tab($wp_customize, $theme_name) {

	$wp_customize->add_panel('oscend_portfolio_settings',
	array(
		'title' => esc_html__( 'Portfolio', 'oscend' ),
		'priority' => 14,
		)
	);

	// portfolio general settings
	$wp_customize->add_section( 'oscend_portfolio_general_settings' , array(
		'title'      => __( 'Portfolio General', 'oscend' ),
		'priority'   => 10,
		'panel' => 'oscend_portfolio_settings'
	) );

	$wp_customize->add_setting( 'oscend_portfolio_settings_trumb_width' , array(
		'default'     => '555',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_absinteger'
	) );

	$wp_customize->add_control(
		'oscend_portfolio_settings_trumb_width',
		array(
			'label'    => esc_html__( 'Portfolio Tumbnails Width (px)', 'oscend' ),
			'section'  => 'oscend_portfolio_general_settings',
			'settings' => 'oscend_portfolio_settings_trumb_width',
			'type'     => 'textfield',
			'description' => esc_html__( 'Default: 555px', 'oscend' ),
			'priority' => 10
		)
	);

	$wp_customize->add_setting( 'oscend_portfolio_settings_trumb_height' , array(
		'default'     => '555',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_absinteger'
	) );

	$wp_customize->add_control(
		'oscend_portfolio_settings_trumb_height',
		array(
			'label'    => esc_html__( 'Portfolio Tumbnails Height (px)', 'oscend' ),
			'section'  => 'oscend_portfolio_general_settings',
			'settings' => 'oscend_portfolio_settings_trumb_height',
			'type'     => 'textfield',
			'description' => esc_html__( 'Default: 555px', 'oscend' ),
			'priority' => 20
		)
	);


	// portfolio categories page settings
	$wp_customize->add_section( 'oscend_portfolio_categories_settings' , array(
		'title'      => esc_html__( 'Portfolio Category and Archive Pages', 'oscend' ),
		'priority'   => 20,
		'panel' => 'oscend_portfolio_settings'
	) );

	$wp_customize->add_setting( 'oscend_portfolio_settings_type' , array(
		'default'     => 'type_without_icons',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_portfolio_type'
	) );

	$wp_customize->add_control(
		'oscend_portfolio_settings_type',
		array(
			'label'    => esc_html__( 'Item type', 'oscend' ),
			'section'  => 'oscend_portfolio_categories_settings',
			'settings' => 'oscend_portfolio_settings_type',
			'description' => esc_html__( 'Portfolio items per row for portfolio category and archive pages.', 'oscend' ),
			'type'     => 'select',
			'choices'  => array(
				'type_without_icons' => esc_html__( 'Without over icons', 'oscend' ),
				'type_with_icons' => esc_html__( 'With over icons', 'oscend' ),
			),
			'priority' => 10
		)
	);

	$wp_customize->add_setting( 'oscend_portfolio_settings_perrow' , array(
		'default'     => '2',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_portfolio_perrow'
	) );

	$wp_customize->add_control(
		'oscend_portfolio_settings_perrow',
		array(
			'label'    => esc_html__( 'Portfolio Column Number', 'oscend' ),
			'section'  => 'oscend_portfolio_categories_settings',
			'settings' => 'oscend_portfolio_settings_perrow',
			'description' => esc_html__( 'Portfolio items per row for portfolio category and archive pages.', 'oscend' ),
			'type'     => 'select',
			'choices'  => array(
				'2' => esc_html__( '2 columns', 'oscend' ),
				'3' => esc_html__( '3 columns', 'oscend' ),
				'4' => esc_html__( '4 columns', 'oscend' ),
			),
			'priority' => 20
		)
	);

	$wp_customize->add_setting( 'oscend_portfolio_settings_perpage' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_per_page'
	) );

	$wp_customize->add_control(
		'oscend_portfolio_settings_perpage',
		array(
			'label'    => esc_html__( 'Portfolio Item per page', 'oscend' ),
			'section'  => 'oscend_portfolio_categories_settings',
			'settings' => 'oscend_portfolio_settings_perpage',
			'description' => esc_html__( 'Portfolio items per page for portfolio category and archive pages. Leave empty to show all items.', 'oscend' ),
			'type'     => 'textfield',
			'priority' => 30
		)
	);

	$wp_customize->add_setting( 'oscend_portfolio_settings_sidebar_type' , array(
		'default'     => '2',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_sidebar_portfolio_type'
	) );

	$wp_customize->add_control(
		'oscend_portfolio_settings_sidebar_type',
		array(
			'label'    => esc_html__( 'Portfolio sidebar type', 'oscend' ),
			'section'  => 'oscend_portfolio_categories_settings',
			'settings' => 'oscend_portfolio_settings_sidebar_type',
			'description' => esc_html__( 'Select sidebar type for portfolio category and archive pages.', 'oscend' ),
			'type'     => 'select',
			'choices'  => array(
				'1' => esc_html__( 'Full width', 'oscend' ),
				'2' => esc_html__( 'Right Sidebar', 'oscend' ),
				'3' => esc_html__( 'Left Sidebar', 'oscend' ),
			),
			'priority' => 40
		)
	);

	$wp_customize->add_setting( 'oscend_portfolio_settings_sidebar_content' , array(
		'default'     => 'sidebar-1',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_sidebar_portfolio_content'
	) );

	$wp_customize->add_control(
		'oscend_portfolio_settings_sidebar_content',
		array(
			'label'    => esc_html__( 'Portfolio sidebar content', 'oscend' ),
			'section'  => 'oscend_portfolio_categories_settings',
			'settings' => 'oscend_portfolio_settings_sidebar_content',
			'description' => esc_html__( 'Select sidebar content for portfolio category and archive pages.', 'oscend' ),
			'type'     => 'select',
			'choices'  => array(
				'sidebar-1' => esc_html__( 'WP Default Sidebar', 'oscend' ),
				'global-sidebar-1' => esc_html__( 'Blog Sidebar', 'oscend' ),
				'portfolio-sidebar-1' => esc_html__( 'Portfolio Sidebar', 'oscend' ),
				'custom-area-1' => esc_html__( 'Custom Area', 'oscend' ),
			),
			'priority' => 50
		)
	);

	$wp_customize->add_setting( 'oscend_portfolio_settings_loadmore' , array(
		'default'     => esc_html__('Load more', 'oscend' ),
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_text'
	) );

	$wp_customize->add_control(
		'oscend_portfolio_settings_loadmore',
		array(
			'label'    => esc_html__( 'Load More button text', 'oscend' ),
			'section'  => 'oscend_portfolio_categories_settings',
			'settings' => 'oscend_portfolio_settings_loadmore',
			'type'     => 'textfield',
			'priority' => 60
		)
	);


	// portfolio single page settings
	$wp_customize->add_section( 'oscend_portfolio_single_settings' , array(
		'title'      => esc_html__( 'Portfolio Single Page', 'oscend' ),
		'priority'   => 30,
		'panel' => 'oscend_portfolio_settings'
	) );

	$wp_customize->add_setting( 'oscend_portfolio_settings_related_show' , array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_onoff'
	) );

	$wp_customize->add_control(
		'oscend_portfolio_settings_related_show',
		array(
			'label'    => esc_html__( 'Show block Related projects', 'oscend' ),
			'section'  => 'oscend_portfolio_single_settings',
			'settings' => 'oscend_portfolio_settings_related_show',
			'description' => esc_html__( 'Select on/off Related projects for portfolio single pages.', 'oscend' ),
			'type'     => 'select',
			'choices'  => array(
				'on' => esc_html__( 'On', 'oscend' ),
				'off' => esc_html__( 'Off', 'oscend' ),
			),
			'priority' => 10
		)
	);

	$wp_customize->add_setting( 'oscend_portfolio_settings_related_title' , array(
		'default'     => esc_html__('Related projects', 'oscend' ),
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_text'
	) );

	$wp_customize->add_control(
		'oscend_portfolio_settings_related_title',
		array(
			'label'    => esc_html__( 'Title block Related Projects', 'oscend' ),
			'section'  => 'oscend_portfolio_single_settings',
			'settings' => 'oscend_portfolio_settings_related_title',
			'type'     => 'textfield',
			'priority' => 20
		)
	);

	$wp_customize->add_setting( 'oscend_portfolio_settings_related_desc' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_text'
	) );

	$wp_customize->add_control(
		'oscend_portfolio_settings_related_desc',
		array(
			'label'    => esc_html__( 'Description block Related Projects', 'oscend' ),
			'section'  => 'oscend_portfolio_single_settings',
			'settings' => 'oscend_portfolio_settings_related_desc',
			'type'     => 'textarea',
			'priority' => 30
		)
	);

	$wp_customize->add_setting( 'oscend_portfolio_settings_share' , array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_onoff'
	) );

	$wp_customize->add_control(
		'oscend_portfolio_settings_share',
		array(
			'label'    => esc_html__( 'Show share', 'oscend' ),
			'section'  => 'oscend_portfolio_single_settings',
			'settings' => 'oscend_portfolio_settings_share',
			'description' => esc_html__( 'Select on/off share for portfolio single pages.', 'oscend' ),
			'type'     => 'select',
			'choices'  => array(
				'on' => esc_html__( 'On', 'oscend' ),
				'off' => esc_html__( 'Off', 'oscend' ),
			),
			'priority' => 40
		)
	);

	$wp_customize->add_setting( 'oscend_portfolio_settings_link_to_all' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback' => 'esc_url'
	) );

	$wp_customize->add_control(
		'oscend_portfolio_settings_link_to_all',
		array(
			'label'    => esc_html__( 'Link to portfolio all works Page', 'oscend' ),
			'section'  => 'oscend_portfolio_single_settings',
			'settings' => 'oscend_portfolio_settings_link_to_all',
			'type'     => 'textfield',
			'description' => esc_html__( 'Leave empty to show portfolio default archive page.', 'oscend' ),
			'priority' => 50
		)
	);


}