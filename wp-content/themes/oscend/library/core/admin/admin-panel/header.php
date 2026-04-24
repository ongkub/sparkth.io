<?php

function oscend_customize_header_tab($wp_customize, $theme_name) {

	$wp_customize->add_section( 'oscend_header_settings' , array(
		'title'      => esc_html__( 'Header', 'oscend' ),
		'priority'   => 5,
	) );

	/*
	$wp_customize->add_setting( 'oscend_header_settings_type' , array(
		'default'     => '1',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_header_type'
	) );

	$wp_customize->add_control(
		'oscend_header_settings_type',
		array(
			'label'    => esc_html__( 'Header Type', 'oscend' ),
			'section'  => 'oscend_header_settings',
			'settings' => 'oscend_header_settings_type',
			'type'     => 'select',
			'choices'  => array(
				'1' => esc_html__( 'Transparent menu', 'oscend' ),
				'2' => esc_html__( 'White background menu', 'oscend' ),
			),
			'priority'   => 5
		)
	);
	*/

	$wp_customize->add_setting( 'oscend_header_settings_headerimage' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback'=>'esc_url_raw'
	) );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'oscend_header_settings_headerimage',
			array(
				'label'      => esc_html__( 'Header Image', 'oscend' ),
				'section'    => 'oscend_header_settings',
				'context'    => 'oscend_header_settings_headerimage',
				'settings'   => 'oscend_header_settings_headerimage',
				'priority'   => 10
			)
		)
	);

	$wp_customize->add_setting( 'oscend_header_settings_headerimage_overlay' , array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_onoff'
	) );

	$wp_customize->add_control(
		'oscend_header_settings_headerimage_overlay',
		array(
			'label'    => esc_html__( 'On/off header image overlay', 'oscend' ),
			'section'  => 'oscend_header_settings',
			'settings' => 'oscend_header_settings_headerimage_overlay',
			'type'     => 'select',
			'choices'  => array(
				'on' => esc_html__( 'On', 'oscend' ),
				'off' => esc_html__( 'Off', 'oscend' ),
			),
			'priority'   => 20
		)
	);

	$wp_customize->add_setting( 'oscend_header_settings_headerimage_opacity' , array(
		'default'     => '0.1',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_overlay_opacity'
	) );

	$wp_customize->add_control(
		'oscend_header_settings_headerimage_opacity',
		array(
			'label'    => esc_html__( 'Select header image overlay opacity', 'oscend' ),
			'section'  => 'oscend_header_settings',
			'settings' => 'oscend_header_settings_headerimage_opacity',
			'type'     => 'select',
			'choices'  => array(
				'0.1' => '0.1',
				'0.2' => '0.2',
				'0.3' => '0.3',
				'0.4' => '0.4',
				'0.5' => '0.5',
				'0.6' => '0.6',
				'0.7' => '0.7',
				'0.8' => '0.8',
				'0.9' => '0.9',
			),
			'priority'   => 30
		)
	);

	$wp_customize->add_setting( 'oscend_header_settings_subtitle' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_text'
	) );

	$wp_customize->add_control(
		'oscend_header_settings_subtitle',
		array(
			'label'    => esc_html__( 'Page Subtitle', 'oscend' ),
			'section'  => 'oscend_header_settings',
			'settings' => 'oscend_header_settings_subtitle',
			'type'     => 'text',
			'priority'   => 40
		)
	);

	$wp_customize->add_setting( 'oscend_header_settings_title_single_post' , array(
		'default'     => esc_html__('Blog details', 'oscend' ),
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_text'
	) );

	$wp_customize->add_control(
		'oscend_header_settings_title_single_post',
		array(
			'label'    => esc_html__( 'Title Single Post Page', 'oscend' ),
			'section'  => 'oscend_header_settings',
			'settings' => 'oscend_header_settings_title_single_post',
			'type'     => 'text',
			'priority'   => 50
		)
	);

	$wp_customize->add_setting( 'oscend_header_settings_title_all_posts' , array(
		'default'     => esc_html__('All posts', 'oscend' ),
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_text'
	) );

	$wp_customize->add_control(
		'oscend_header_settings_title_all_posts',
		array(
			'label'    => esc_html__( 'Title All Posts Page', 'oscend' ),
			'section'  => 'oscend_header_settings',
			'settings' => 'oscend_header_settings_title_all_posts',
			'type'     => 'text',
			'priority'   => 60
		)
	);

	$wp_customize->add_setting( 'oscend_header_settings_title_single_portfolio' , array(
		'default'     => esc_html__('Single work', 'oscend' ),
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_text'
	) );

	$wp_customize->add_control(
		'oscend_header_settings_title_single_portfolio',
		array(
			'label'    => esc_html__( 'Title Single Portfolio Page', 'oscend' ),
			'section'  => 'oscend_header_settings',
			'settings' => 'oscend_header_settings_title_single_portfolio',
			'type'     => 'text',
			'priority'   => 70
		)
	);

	$wp_customize->add_setting( 'oscend_header_settings_title_search_results' , array(
		'default'     => esc_html__('Search results', 'oscend' ),
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_text'
	) );

	$wp_customize->add_control(
		'oscend_header_settings_title_search_results',
		array(
			'label'    => esc_html__( 'Title Search Results Page', 'oscend' ),
			'section'  => 'oscend_header_settings',
			'settings' => 'oscend_header_settings_title_search_results',
			'type'     => 'text',
			'priority'   => 80
		)
	);

	$wp_customize->add_setting( 'oscend_header_settings_icon' , array(
		'default'     => esc_html__('icon-Wheelbarrow', 'oscend' ),
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_text'
	) );

	$wp_customize->add_control(
		'oscend_header_settings_icon',
		array(
			'label'    => esc_html__( 'Default Icon', 'oscend' ),
			'section'  => 'oscend_header_settings',
			'settings' => 'oscend_header_settings_icon',
			'type'     => 'text',
			'priority'   => 90
		)
	);

}