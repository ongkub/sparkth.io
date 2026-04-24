<?php

function oscend_customize_footer_tab($wp_customize, $theme_name) {

	$staticBlocks = oscend_get_staticblock_option_array();

	$wp_customize->add_section( 'oscend_footer_settings' , array(
		'title'      => esc_html__( 'Footer', 'oscend' ),
		'priority'   => 6,
	) );

	$wp_customize->add_setting( 'oscend_footer_block_top' , array(
		'default'     => 'default',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_footer_block'
	) );

	$wp_customize->add_control(
		'oscend_footer_block_top',
		array(
			'label'    => esc_html__( 'Top Footer Block', 'oscend' ),
			'section'  => 'oscend_footer_settings',
			'settings' => 'oscend_footer_block_top',
			'type'     => 'select',
			'choices'  => $staticBlocks,
			'priority' => 10
		)
	);

	$wp_customize->add_setting( 'oscend_footer_block' , array(
		'default'     => 'default',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_footer_block'
	) );

	$wp_customize->add_control(
		'oscend_footer_block',
		array(
			'label'    => esc_html__( 'Bottom Footer Block', 'oscend' ),
			'section'  => 'oscend_footer_settings',
			'settings' => 'oscend_footer_block',
			'type'     => 'select',
			'choices'  => $staticBlocks,
			'priority' => 10
		)
	);

}