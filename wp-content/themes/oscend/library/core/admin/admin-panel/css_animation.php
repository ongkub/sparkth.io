<?php

function oscend_customize_css_animation_tab($wp_customize, $theme_name) {

	$wp_customize->add_section( 'oscend_css_animation_settings' , array(
		'title'      => esc_html__( 'Css Animation', 'oscend' ),
		'priority'   => 16,
	) );

	$oscend_customize_css_animation =  array(
		'' => esc_html__( 'No', 'oscend' ),
		'bounce' => esc_html__( 'bounce', 'oscend' ),
		'flash' => esc_html__( 'flash', 'oscend' ),
		'pulse' => esc_html__( 'pulse', 'oscend' ),
		'rubberBand' => esc_html__( 'rubberBand', 'oscend' ),
		'shake' => esc_html__( 'shake', 'oscend' ),
		'swing' => esc_html__( 'swing', 'oscend' ),
		'tada' => esc_html__( 'tada', 'oscend' ),
		'wobble' => esc_html__( 'wobble', 'oscend' ),
		'jello' => esc_html__( 'jello', 'oscend' ),

		'bounceIn' => esc_html__( 'bounceIn', 'oscend' ),
		'bounceInDown' => esc_html__( 'bounceInDown', 'oscend' ),
		'bounceInLeft' => esc_html__( 'bounceInLeft', 'oscend' ),
		'bounceInRight' => esc_html__( 'bounceInRight', 'oscend' ),
		'bounceInUp' => esc_html__( 'bounceInUp', 'oscend' ),
		'bounceOut' => esc_html__( 'bounceOut', 'oscend' ),
		'bounceOutDown' => esc_html__( 'bounceOutDown', 'oscend' ),
		'bounceOutLeft' => esc_html__( 'bounceOutLeft', 'oscend' ),
		'bounceOutRight' => esc_html__( 'bounceOutRight', 'oscend' ),
		'bounceOutUp' => esc_html__( 'bounceOutUp', 'oscend' ),

		'fadeIn' => esc_html__( 'fadeIn', 'oscend' ),
		'fadeInDown' => esc_html__( 'fadeInDown', 'oscend' ),
		'fadeInDownBig' => esc_html__( 'fadeInDownBig', 'oscend' ),
		'fadeInLeft' => esc_html__( 'fadeInLeft', 'oscend' ),
		'fadeInLeftBig' => esc_html__( 'fadeInLeftBig', 'oscend' ),
		'fadeInRight' => esc_html__( 'fadeInRight', 'oscend' ),
		'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'oscend' ),
		'fadeInUp' => esc_html__( 'fadeInUp', 'oscend' ),
		'fadeInUpBig' => esc_html__( 'fadeInUpBig', 'oscend' ),
		'fadeOut' => esc_html__( 'fadeOut', 'oscend' ),
		'fadeOutDown' => esc_html__( 'fadeOutDown', 'oscend' ),
		'fadeOutDownBig' => esc_html__( 'fadeOutDownBig', 'oscend' ),
		'fadeOutLeft' => esc_html__( 'fadeOutLeft', 'oscend' ),
		'fadeOutLeftBig' => esc_html__( 'fadeOutLeftBig', 'oscend' ),
		'fadeOutRight' => esc_html__( 'fadeOutRight', 'oscend' ),
		'fadeOutRightBig' => esc_html__( 'fadeOutRightBig', 'oscend' ),
		'fadeOutUp' => esc_html__( 'fadeOutUp', 'oscend' ),
		'fadeOutUpBig' => esc_html__( 'fadeOutUpBig', 'oscend' ),

		'flip' => esc_html__( 'flip', 'oscend' ),
		'flipInX' => esc_html__( 'flipInX', 'oscend' ),
		'flipInY' => esc_html__( 'flipInY', 'oscend' ),
		'flipOutX' => esc_html__( 'flipOutX', 'oscend' ),
		'flipOutY' => esc_html__( 'flipOutY', 'oscend' ),

		'lightSpeedIn' => esc_html__( 'lightSpeedIn', 'oscend' ),
		'lightSpeedOut' => esc_html__( 'lightSpeedOut', 'oscend' ),

		'rotateIn' => esc_html__( 'rotateIn', 'oscend' ),
		'rotateInDownLeft' => esc_html__( 'rotateInDownLeft', 'oscend' ),
		'rotateInDownRight'=> esc_html__( 'rotateInDownRight', 'oscend' ),
		'rotateInUpLeft' => esc_html__( 'rotateInUpLeft', 'oscend' ),
		'rotateInUpRight'=> esc_html__( 'rotateInUpRight', 'oscend' ),
		'rotateOut' => esc_html__( 'rotateOut', 'oscend' ),
		'rotateOutDownLeft' => esc_html__( 'rotateOutDownLeft', 'oscend' ),
		'rotateOutDownRight' => esc_html__( 'rotateOutDownRight', 'oscend' ),
		'rotateOutUpLeft' => esc_html__( 'rotateOutUpLeft', 'oscend' ),
		'rotateOutUpRight' => esc_html__( 'rotateOutUpRight', 'oscend' ),

		'slideInUp' => esc_html__( 'slideInUp', 'oscend' ),
		'slideInDown' => esc_html__( 'slideInDown', 'oscend' ),
		'slideInLeft' => esc_html__( 'slideInLeft', 'oscend' ),
		'slideInRight' => esc_html__( 'slideInRight', 'oscend' ),
		'slideOutUp' => esc_html__( 'slideOutUp', 'oscend' ),
		'slideOutDown' => esc_html__( 'slideOutDown', 'oscend' ),
		'slideOutLeft' => esc_html__( 'slideOutLeft', 'oscend' ),
		'slideOutRight' => esc_html__( 'slideOutRight', 'oscend' ),

		'zoomIn' => esc_html__( 'zoomIn', 'oscend' ),
		'zoomInDown' => esc_html__( 'zoomInDown', 'oscend' ),
		'zoomInLeft' => esc_html__( 'zoomInLeft', 'oscend' ),
		'zoomInRight' => esc_html__( 'zoomInRight', 'oscend' ),
		'zoomInUp' => esc_html__( 'zoomInUp', 'oscend' ),
		'zoomOut' => esc_html__( 'zoomOut', 'oscend' ),
		'zoomOutDown' => esc_html__( 'zoomOutDown', 'oscend' ),
		'zoomOutLeft' => esc_html__( 'zoomOutLeft', 'oscend' ),
		'zoomOutRight' => esc_html__( 'zoomOutRight', 'oscend' ),
		'zoomOutUp' => esc_html__( 'zoomOutUp', 'oscend' ),

		'hinge' => esc_html__( 'hinge', 'oscend' ),
		'rollIn' => esc_html__( 'rollIn', 'oscend' ),
		'rollOut' => esc_html__( 'rollOut', 'oscend' ),
	);

	$wp_customize->add_setting( 'oscend_css_animation_settings_header_title' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_animation'
	) );

	$wp_customize->add_control(
		'oscend_css_animation_settings_header_title',
		array(
			'label'    => esc_html__( 'Header Title Animation', 'oscend' ),
			'section'  => 'oscend_css_animation_settings',
			'settings' => 'oscend_css_animation_settings_header_title',
			'description' => esc_html__( 'Select css animation for Header Title Block.', 'oscend' ),
			'type'     => 'select',
			'choices'  => $oscend_customize_css_animation,
			'priority' => 10
		)
	);

	$wp_customize->add_setting( 'oscend_css_animation_settings_blog' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_animation'
	) );

	$wp_customize->add_control(
		'oscend_css_animation_settings_blog',
		array(
			'label'    => esc_html__( 'Blog Animation', 'oscend' ),
			'section'  => 'oscend_css_animation_settings',
			'settings' => 'oscend_css_animation_settings_blog',
			'description' => esc_html__( 'Select css animation for blog pages.', 'oscend' ),
			'type'     => 'select',
			'choices'  => $oscend_customize_css_animation,
			'priority' => 20
		)
	);

	$wp_customize->add_setting( 'oscend_css_animation_settings_sidebar' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_animation'
	) );

	$wp_customize->add_control(
		'oscend_css_animation_settings_sidebar',
		array(
			'label'    => esc_html__( 'Sidebar Animation', 'oscend' ),
			'section'  => 'oscend_css_animation_settings',
			'settings' => 'oscend_css_animation_settings_sidebar',
			'description' => esc_html__( 'Select css animation for Sidebar.', 'oscend' ),
			'type'     => 'select',
			'choices'  => $oscend_customize_css_animation,
			'priority' => 30
		)
	);

	$wp_customize->add_setting( 'oscend_css_animation_settings_portfolio' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback' => 'oscend_sanitize_animation'
	) );

	$wp_customize->add_control(
		'oscend_css_animation_settings_portfolio',
		array(
			'label'    => esc_html__( 'Portfolio Category Page Animation', 'oscend' ),
			'section'  => 'oscend_css_animation_settings',
			'settings' => 'oscend_css_animation_settings_portfolio',
			'description' => esc_html__( 'Select css animation for portfolio category pages.', 'oscend' ),
			'type'     => 'select',
			'choices'  => $oscend_customize_css_animation,
			'priority' => 70
		)
	);

}