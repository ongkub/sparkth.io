<?php

function oscend_customize_style_tab($wp_customize, $theme_name) {


	$wp_customize->add_section( 'oscend_style_settings' , array(
		'title'      => esc_html__( 'Style Settings', 'oscend' ),
		'priority'   => 4,
	) );

	$wp_customize->add_setting(
		'oscend_style_settings_main_color',
		array(
			'default' => '#ff6400',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'oscend_style_settings_main_color',
			array(
				'label' => esc_html__( 'Main Color', 'oscend' ),
				'section' => 'oscend_style_settings',
				'settings' => 'oscend_style_settings_main_color',
				'priority'   => 10
			)
		)
	);

	$wp_customize->add_setting(
		'oscend_style_settings_additional_color_darker',
		array(
			'default' => '#cc5000',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'oscend_style_settings_additional_color_darker',
			array(
				'label' => esc_html__( 'Additional Color 1 (Darker than the main)', 'oscend' ),
				'section' => 'oscend_style_settings',
				'settings' => 'oscend_style_settings_additional_color_darker',
				'priority'   => 20
			)
		)
	);

	$wp_customize->add_setting(
		'oscend_style_settings_additional_color_lighter',
		array(
			'default' => '#ffb17f',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'oscend_style_settings_additional_color_lighter',
			array(
				'label' => esc_html__( 'Additional Color 2 (lighter than the main)', 'oscend' ),
				'section' => 'oscend_style_settings',
				'settings' => 'oscend_style_settings_additional_color_lighter',
				'priority'   => 30
			)
		)
	);

	$wp_customize->add_setting( 'oscend_style_settings_custom_css' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_text'
	) );


   $wp_customize->add_control(
		'oscend_style_settings_custom_css',
		array(
		  'label' => esc_html__( 'Custom CSS', 'oscend' ),
		  'type' => 'textarea',
		  'section' => 'oscend_style_settings',
		  'settings' => 'oscend_style_settings_custom_css',
		  'description' => esc_html__( 'Add custom CSS here', 'oscend' ),
		  'priority'   => 40
		)
	);

}

