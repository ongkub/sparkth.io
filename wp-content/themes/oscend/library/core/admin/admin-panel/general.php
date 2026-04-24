<?php

function oscend_customize_general_tab($wp_customize, $theme_name) {

	$wp_customize->add_section( 'oscend_general_settings' , array(
		'title'      => esc_html__( 'General Settings', 'oscend' ),
		'priority'   => 0,
	) );

	/* logo image */
	$wp_customize->add_setting( 'oscend_general_settings_logo' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback'=>'esc_url_raw'
	) );

	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'oscend_general_settings_logo',
			   array(
				   'label'      => esc_html__( 'Logo image', 'oscend' ),
				   'section'    => 'oscend_general_settings',
				   'context'    => 'oscend_general_settings_logo',
				   'settings'   => 'oscend_general_settings_logo',
				   'priority'   => 50,
				   'description' => esc_html__( 'Recommended size: 130x34', 'oscend')
			   )
	   )
   );

	$wp_customize->add_setting( 'oscend_general_settings_logo_inverse' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback'=>'esc_url_raw'
	) );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'oscend_general_settings_logo_inverse',
			array(
				'label'      => esc_html__( 'Logo inverse image', 'oscend' ),
				'section'    => 'oscend_general_settings',
				'context'    => 'oscend_general_settings_logo_inverse',
				'settings'   => 'oscend_general_settings_logo_inverse',
				'priority'   => 50,
				'description' => esc_html__( 'Recommended size: 130x34', 'oscend')
			)
		)
	);

	$wp_customize->add_setting( 'oscend_general_settings_logo_mobile' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback'=>'esc_url_raw'
	) );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'oscend_general_settings_logo_mobile',
			array(
				'label'      => esc_html__( 'Logo mobile image', 'oscend' ),
				'section'    => 'oscend_general_settings',
				'context'    => 'oscend_general_settings_logo_mobile',
				'settings'   => 'oscend_general_settings_logo_mobile',
				'priority'   => 50,
				'description' => esc_html__( 'Recommended size: 34x34', 'oscend')
			)
		)
	);

	$wp_customize->add_setting( 'oscend_general_settings_loader' , array(
		'default'     => 'off',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_loader'
	) );

   $wp_customize->add_control(
		'oscend_general_settings_loader',
		array(
			'label'    => esc_html__( 'Loader', 'oscend' ),
			'section'  => 'oscend_general_settings',
			'settings' => 'oscend_general_settings_loader',
			'type'     => 'select',
			'choices'  => array(
				'off'  => esc_html__( 'Off', 'oscend' ),
				'usemain' => esc_html__( 'Use on main', 'oscend' ),
				'useall' => esc_html__( 'Use on all pages', 'oscend' )
			),
			'priority'   => 110
		)
	);

   $wp_customize->add_setting( 'oscend_general_settings_css_live_editor' , array(
		'default'     => 'off',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_onoff'
	) );

   $wp_customize->add_control(
		'oscend_general_settings_css_live_editor',
		array(
			'label'    => esc_html__( 'On/off Front Editor', 'oscend' ),
			'section'  => 'oscend_general_settings',
			'settings' => 'oscend_general_settings_css_live_editor',
			'type'     => 'select',
			'choices'  => array(
				'off'  => esc_html__( 'Off', 'oscend' ),
				'on' => esc_html__( 'On', 'oscend' )
			),
			'priority'   => 120
		)
	);

}