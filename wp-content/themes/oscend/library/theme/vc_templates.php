<?php
add_action( 'init', 'oscend_integrateWithVC', 200 );

function oscend_integrateWithVC() {

	if (!function_exists('vc_map'))
		return FALSE;

	$args = array( 'taxonomy' => 'category', 'hide_empty' => '0');
	$categories_blog = get_categories($args);
	$cats_post = array();
	$i = 0;

	foreach($categories_blog as $category){
		if ($category && is_object($category)){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cats_post[$category->name] = $category->term_id;
		}

	}

	$args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0');
	$categories_port = get_categories($args);
	$cats_port = array();
	$i = 0;

	foreach($categories_port as $category){
		if ($category && is_object($category)){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cats_port[$category->name] = $category->term_id;
		}

	}

	$args = array( 'post_type' => 'wpcf7_contact_form');
	$forms = get_posts($args);
	$cform7 = array();
	if ( empty( $forms['errors'] ) ) {
		foreach ( $forms as $form ) {
			$cform7[$form->post_title] = $form->ID;
		}
	}

	$args = array( 'post_type' => 'mc4wp-form');
	$newsletter_forms = get_posts($args);
	$mc4wp = array();
	if ( empty( $newsletter_forms['errors'] ) ) {
		foreach ( $newsletter_forms as $form ) {
			$mc4wp[$form->post_title] = $form->ID;
		}
	}

	/** Fonts Icon Loader */

	$vc_icons_data = oscend_init_vc_icons();

	$add_css_animation = array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'CSS Animation', 'oscend' ),
		'param_name' => 'css_animation',
		'admin_label' => true,
		'value' => array(
			esc_html__( 'No', 'oscend' ) => '',
			esc_html__( 'bounce', 'oscend' ) => 'bounce',
			esc_html__( 'flash', 'oscend' ) => 'flash',
			esc_html__( 'pulse', 'oscend' ) => 'pulse',
			esc_html__( 'rubberBand', 'oscend' ) => 'rubberBand',
			esc_html__( 'shake', 'oscend' ) => 'shake',
			esc_html__( 'swing', 'oscend' ) => 'swing',
			esc_html__( 'tada', 'oscend' ) => 'tada',
			esc_html__( 'wobble', 'oscend' ) => 'wobble',
			esc_html__( 'jello', 'oscend' ) => 'jello',

			esc_html__( 'bounceIn', 'oscend' ) => 'bounceIn',
			esc_html__( 'bounceInDown', 'oscend' ) => 'bounceInDown',
			esc_html__( 'bounceInLeft', 'oscend' ) => 'bounceInLeft',
			esc_html__( 'bounceInRight', 'oscend' ) => 'bounceInRight',
			esc_html__( 'bounceInUp', 'oscend' ) => 'bounceInUp',
			esc_html__( 'bounceOut', 'oscend' ) => 'bounceOut',
			esc_html__( 'bounceOutDown', 'oscend' ) => 'bounceOutDown',
			esc_html__( 'bounceOutLeft', 'oscend' ) => 'bounceOutLeft',
			esc_html__( 'bounceOutRight', 'oscend' ) => 'bounceOutRight',
			esc_html__( 'bounceOutUp', 'oscend' ) => 'bounceOutUp',

			esc_html__( 'fadeIn', 'oscend' ) => 'fadeIn',
			esc_html__( 'fadeInDown', 'oscend' ) => 'fadeInDown',
			esc_html__( 'fadeInDownBig', 'oscend' ) => 'fadeInDownBig',
			esc_html__( 'fadeInLeft', 'oscend' ) => 'fadeInLeft',
			esc_html__( 'fadeInLeftBig', 'oscend' ) => 'fadeInLeftBig',
			esc_html__( 'fadeInRight', 'oscend' ) => 'fadeInRight',
			esc_html__( 'fadeInRightBig', 'oscend' ) => 'fadeInRightBig',
			esc_html__( 'fadeInUp', 'oscend' ) => 'fadeInUp',
			esc_html__( 'fadeInUpBig', 'oscend' ) => 'fadeInUpBig',
			esc_html__( 'fadeOut', 'oscend' ) => 'fadeOut',
			esc_html__( 'fadeOutDown', 'oscend' ) => 'fadeOutDown',
			esc_html__( 'fadeOutDownBig', 'oscend' ) => 'fadeOutDownBig',
			esc_html__( 'fadeOutLeft', 'oscend' ) => 'fadeOutLeft',
			esc_html__( 'fadeOutLeftBig', 'oscend' ) => 'fadeOutLeftBig',
			esc_html__( 'fadeOutRight', 'oscend' ) => 'fadeOutRight',
			esc_html__( 'fadeOutRightBig', 'oscend' ) => 'fadeOutRightBig',
			esc_html__( 'fadeOutUp', 'oscend' ) => 'fadeOutUp',
			esc_html__( 'fadeOutUpBig', 'oscend' ) => 'fadeOutUpBig',

			esc_html__( 'flip', 'oscend' ) => 'flip',
			esc_html__( 'flipInX', 'oscend' ) => 'flipInX',
			esc_html__( 'flipInY', 'oscend' ) => 'flipInY',
			esc_html__( 'flipOutX', 'oscend' ) => 'flipOutX',
			esc_html__( 'flipOutY', 'oscend' ) => 'flipOutY',

			esc_html__( 'lightSpeedIn', 'oscend' ) => 'lightSpeedIn',
			esc_html__( 'lightSpeedOut', 'oscend' ) => 'lightSpeedOut',

			esc_html__( 'rotateIn', 'oscend' ) => 'rotateIn',
			esc_html__( 'rotateInDownLeft', 'oscend' ) => 'rotateInDownLeft',
			esc_html__( 'rotateInDownRight', 'oscend' ) => 'rotateInDownRight',
			esc_html__( 'rotateInUpLeft', 'oscend' ) => 'rotateInUpLeft',
			esc_html__( 'rotateInUpRight', 'oscend' ) => 'rotateInUpRight',
			esc_html__( 'rotateOut', 'oscend' ) => 'rotateOut',
			esc_html__( 'rotateOutDownLeft', 'oscend' ) => 'rotateOutDownLeft',
			esc_html__( 'rotateOutDownRight', 'oscend' ) => 'rotateOutDownRight',
			esc_html__( 'rotateOutUpLeft', 'oscend' ) => 'rotateOutUpLeft',
			esc_html__( 'rotateOutUpRight', 'oscend' ) => 'rotateOutUpRight',

			esc_html__( 'slideInUp', 'oscend' ) => 'slideInUp',
			esc_html__( 'slideInDown', 'oscend' ) => 'slideInDown',
			esc_html__( 'slideInLeft', 'oscend' ) => 'slideInLeft',
			esc_html__( 'slideInRight', 'oscend' ) => 'slideInRight',
			esc_html__( 'slideOutUp', 'oscend' ) => 'slideOutUp',
			esc_html__( 'slideOutDown', 'oscend' ) => 'slideOutDown',
			esc_html__( 'slideOutLeft', 'oscend' ) => 'slideOutLeft',
			esc_html__( 'slideOutRight', 'oscend' ) => 'slideOutRight',

			esc_html__( 'zoomIn', 'oscend' ) => 'zoomIn',
			esc_html__( 'zoomInDown', 'oscend' ) => 'zoomInDown',
			esc_html__( 'zoomInLeft', 'oscend' ) => 'zoomInLeft',
			esc_html__( 'zoomInRight', 'oscend' ) => 'zoomInRight',
			esc_html__( 'zoomInUp', 'oscend' ) => 'zoomInUp',
			esc_html__( 'zoomOut', 'oscend' ) => 'zoomOut',
			esc_html__( 'zoomOutDown', 'oscend' ) => 'zoomOutDown',
			esc_html__( 'zoomOutLeft', 'oscend' ) => 'zoomOutLeft',
			esc_html__( 'zoomOutRight', 'oscend' ) => 'zoomOutRight',
			esc_html__( 'zoomOutUp', 'oscend' ) => 'zoomOutUp',

			esc_html__( 'hinge', 'oscend' ) => 'hinge',
			esc_html__( 'rollIn', 'oscend' ) => 'rollIn',
			esc_html__( 'rollOut', 'oscend' ) => 'rollOut',

		),
		'description' => esc_html__( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'oscend' )
	);


	/** Additional Row Settings */

	$attributes1 = array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Use Section Anchor', 'oscend' ),
			'param_name' => 'panchor',
			'value' => array(
					esc_html__( 'Use Simple Anchor', 'oscend' ) => 'anchor-simple',
					esc_html__( 'Use Anchor with background', 'oscend' ) => 'anchor-effect',
					esc_html__( 'Do not use', 'oscend' ) => 'anchor-disabled',
			),
			'description' => esc_html__( 'Need Row ID. ', 'oscend' )
		),
	);

	$attributes2 = array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Padding', 'oscend' ),
			'param_name' => 'ppadding',
			'value' => array(
				esc_html__( "Default", "oscend" ) => 'vc_pixrow-no-padding',
				esc_html__( "Both", "oscend" ) => 'vc_pixrow-padding-both',
				esc_html__( "Top", "oscend" ) => 'vc_pixrow-padding-top',
				esc_html__( "Bottom", "oscend" ) => 'vc_pixrow-padding-bottom',
			),
			'description' => esc_html__( 'Top, bottom, both', 'oscend' ),
			'group' => esc_html__( 'Row Options', 'oscend' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Overlay', 'oscend' ),
			'param_name' => 'pixoverlay',
			'value' => array(
				esc_html__( esc_html__( "No", "oscend" ), "oscend" ) => '',
				esc_html__( esc_html__( "Yes", "oscend" ), "oscend" ) => 'vc_row-overlay dark',

			),
			'description' => esc_html__( 'Yes / No', 'oscend' ),
			'group' => esc_html__( 'Row Options', 'oscend' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Overlay Opacity', 'oscend' ),
			'param_name' => 'pixoverlayopacity',
			'value' => "0.1",
			'description' => esc_html__( 'Values 0.1 - 0.9', 'oscend' ),
			'group' => esc_html__( 'Row Options', 'oscend' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Bottom effect', 'oscend' ),
			'param_name' => 'pix_bottom_effect',
			'value' => array(
				esc_html__( 'Without bottom effect', 'oscend' ) => '',
				esc_html__( 'With bottom effect', 'oscend' ) => 'with-bottom-effect',
				esc_html__( 'With transparent bottom effect', 'oscend' ) => 'with-bottom-effect transparent-effect',
			),
			'group' => esc_html__( 'Row Options', 'oscend' )
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Text Color', 'oscend' ),
			'param_name' => 'ptextcolor',
			'value' => array(
				esc_html__( 'Default', 'oscend' ) => 'text-default',
				esc_html__( 'White', 'oscend' ) => 'text-white',
				esc_html__( 'Black', 'oscend' ) => 'text-black',
			),
			'description' => esc_html__( "Text Color", 'oscend' ),
			'group' => esc_html__( 'Row Options', 'oscend' ),
		),
	);
	if ( ! function_exists('fil_init') ) {
		$attributes = array_merge($attributes1, $attributes2);
	} else {
		$attributes = array_merge($attributes1, oscend_get_vc_icons($vc_icons_data), $attributes2);
	}

	vc_add_params( 'vc_row', $attributes );


	vc_map(
		array(
			'name' => esc_html__( 'Title Box with decor', 'oscend' ),
			'base' => 'box_title',
			'class' => 'pix-theme-icon2',
			'category' => esc_html__( 'Templines', 'oscend' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Before Title', 'oscend' ),
					'param_name' => 'before_title',
					'description' => esc_html__( 'Before Title text.', 'oscend' )
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title', 'oscend' ),
					'param_name' => 'title',
					'description' => esc_html__( 'Title param.', 'oscend' )
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'After Title', 'oscend' ),
					'param_name' => 'after_title',
					'description' => esc_html__( 'After Title text.', 'oscend' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Box Title Position', 'oscend' ),
					'param_name' => 'titlepos',
					'value' => array(
						esc_html__( 'Center', 'oscend' ) => 'text-center',
						esc_html__( 'Left', 'oscend' ) => 'text-left',
						esc_html__( 'Right', 'oscend' ) => 'text-right',
					),
					'description' => esc_html__( 'Center, left or right', 'oscend' ),
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Content', 'oscend' ),
					'param_name' => 'content',
					'description' => esc_html__( 'Enter your content.', 'oscend' )
				),
				$add_css_animation
			)
		)
	);

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Title extends WPBakeryShortCode {

		}
	}

	vc_map(
		array(
			'name' => esc_html__( 'Title Box underline', 'oscend' ),
			'base' => 'box_title2',
			'class' => 'pix-theme-icon2',
			'category' => esc_html__( 'Templines', 'oscend' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title', 'oscend' ),
					'param_name' => 'title',
					'value' => esc_html__( 'I am Title', 'oscend' ),
					'description' => esc_html__( 'Title param.', 'oscend' )
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Content', 'oscend' ),
					'param_name' => 'content',
					'value' => '',
					'description' => esc_html__( 'Enter your content.', 'oscend' )
				),
				$add_css_animation,
			)
		)
	);

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Title2 extends WPBakeryShortCode {

		}
	}


	oscend_vc_map(
		array(
			'name' => esc_html__( 'Feature Box (top icon)', 'oscend' ),
			'base' => 'box_feature',
			'class' => 'pix-theme-icon3',
			'category' => esc_html__( 'Templines', 'oscend' ),
			'params' => array(
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'Link', 'oscend' ),
					'param_name' => 'link',
					'description' => esc_html__( 'Select url.', 'oscend' )
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title', 'oscend' ),
					'param_name' => 'title',
					'value' => esc_html__( 'I am Title', 'oscend' ),
					'description' => esc_html__( 'Title param.', 'oscend' )
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Content', 'oscend' ),
					'param_name' => 'content',
					'value' => wp_kses_post( __( '<p>I am test text block. Click edit button to change this text.</p>', 'oscend' ) ),
					'description' => esc_html__( 'Enter your content.', 'oscend' )
				)
			)
		),
		$add_css_animation,
		oscend_get_vc_icons($vc_icons_data)
	);

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Feature extends WPBakeryShortCode {

		}
	}


	oscend_vc_map(
		array(
			'name' => esc_html__( 'Feature Box (left icon)', 'oscend' ),
			'base' => 'box_feature_left_icon',
			'class' => 'pix-theme-icon3',
			'category' => esc_html__( 'Templines', 'oscend' ),
			'params' => array(
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'Link', 'oscend' ),
					'param_name' => 'link',
					'description' => esc_html__( 'Select url.', 'oscend' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'oscend' ),
					'param_name' => 'title',
					'value' => esc_html__( 'I am Title', 'oscend' ),
					'description' => esc_html__( 'Title param.', 'oscend' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Under Title', 'oscend' ),
					'param_name' => 'under_title',
					'description' => esc_html__( 'Under Title text', 'oscend' )
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Content', 'oscend' ),
					'param_name' => 'content',
					'value' => wp_kses_post( __( '<p>I am test text block. Click edit button to change this text.</p>', 'oscend' ) ),
					'description' => esc_html__( 'Enter your content.', 'oscend' )
				)
			)
		),
		$add_css_animation,
		oscend_get_vc_icons($vc_icons_data)
	);

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Feature_Left_Icon extends WPBakeryShortCode {

		}
	}

	oscend_vc_map(
		array(
			'name' => esc_html__( 'Amount Box', 'oscend' ),
			'base' => 'box_amount',
			'class' => 'pix-theme-icon',
			'category' => esc_html__( 'Templines', 'oscend' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title', 'oscend' ),
					'param_name' => 'title',
					'value' => esc_html__( 'Project', 'oscend' ),
					'description' => esc_html__( 'Title.', 'oscend' )
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Amount', 'oscend' ),
					'param_name' => 'amount',
					'value' => '999',
					'description' => esc_html__( 'Amount.', 'oscend' )
				),
			)
		),
		$add_css_animation,
		oscend_get_vc_icons($vc_icons_data)
	);

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Amount extends WPBakeryShortCode {

		}
	}


	//////// Carousel Reviews ////////

	vc_map( array(
		'name' => esc_html__( 'Reviews', 'oscend' ),
		'base' => 'section_reviews',
		'class' => 'pix-theme-icon5',
		'as_parent' => array('only' => 'section_review'),
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => esc_html__( 'Templines', 'oscend' ),

		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Reviews per page', 'oscend' ),
				'param_name' => 'reviews_per_page',
				'value' => array(
					"2" => 2,
					"1" => 1,
				),
				'description' => esc_html__( 'Select number of columns.', 'oscend' )
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Carousel', 'oscend' ),
				'param_name' => 'disable_carousel',
				'value' => array(
					esc_html__('Enable', 'oscend') => 1,
					esc_html__('Disable', 'oscend') => 0,
				),
				'description' => esc_html__( 'On/off carousel', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Auto Play', 'oscend' ),
				'param_name' => 'autoplay',
				'value' => '4000',
				'description' => esc_html__( 'Enter autoplay speed in milliseconds. 0 is turn off autoplay.', 'oscend' ),
			),
			$add_css_animation,
		),


		'js_view' => 'VcColumnView',

	) );


	vc_map( array(
		'name' => esc_html__( 'Review', 'oscend' ),
		'base' => 'section_review',
		'class' => 'pix-theme-icon5',
		'as_child' => array('only' => 'section_reviews'),
		'content_element' => true,
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'oscend' ),
				'param_name' => 'image',
				'description' => esc_html__( 'Select image.', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Name', 'oscend' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Person name.', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Position', 'oscend' ),
				'param_name' => 'position',
				'description' => esc_html__( 'Text under the name.', 'oscend' )
			),
			$add_css_animation,
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( 'Review Text', 'oscend' ),
				"param_name" => "content",
				"value" => wp_kses_post( __( '<p>I am test text block. Click edit button to change this text.</p>', 'oscend' ) ),
				"description" => esc_html__( 'Enter text.', 'oscend' )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Section_Reviews extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Review extends WPBakeryShortCode {
		}
	}

	/////////////////////////////////

	//////// Our Team ////////

	vc_map( array(
		'name' => esc_html__( 'Slider Team Members', 'oscend' ),
		'base' => 'section_team',
		'class' => 'pix-theme-icon5',
		'as_parent' => array('only' => 'section_team_member'),
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => esc_html__( 'Templines', 'oscend' ),
		'params' => array(
			$add_css_animation,
		),
		'js_view' => 'VcColumnView',

	) );


	vc_map( array(
		'name' => esc_html__( 'Team Member', 'oscend' ),
		'base' => 'section_team_member',
		'class' => 'pix-theme-icon',
		'as_child' => array('only' => 'section_team'),
		'content_element' => true,
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'oscend' ),
				'param_name' => 'image',
				'description' => esc_html__( 'Select image.', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Name', 'oscend' ),
				'param_name' => 'name',
				'description' => esc_html__( 'Team member name.', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Position', 'oscend' ),
				'param_name' => 'position',
				'description' => esc_html__( 'Member position.', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 1', 'oscend' ),
				'param_name' => 'scn1',
				'description' => esc_html__( 'https://twitter.com/', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 1', 'oscend' ),
				'param_name' => 'scn_icon1',
				'description' => wp_kses_post( __( 'Add icon fa-twitter <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'oscend' ) )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 2', 'oscend' ),
				'param_name' => 'scn2',
				'description' => esc_html__( 'https://www.facebook.com/', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 2', 'oscend' ),
				'param_name' => 'scn_icon2',
				'description' => wp_kses_post( __( 'Add icon fa-facebook <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'oscend' ) )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 3', 'oscend' ),
				'param_name' => 'scn3',
				'description' => esc_html__( 'https://www.linkedin.com/', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 3', 'oscend' ),
				'param_name' => 'scn_icon3',
				'description' => wp_kses_post( __( 'Add icon fa-linkedin <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'oscend' ) )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 4', 'oscend' ),
				'param_name' => 'scn4',
				'description' => esc_html__( 'https://www.googleplus.com/', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 4', 'oscend' ),
				'param_name' => 'scn_icon4',
				'description' => wp_kses_post( __( 'Add icon fa-google-plus <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'oscend' ) )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'E-mail', 'oscend' ),
				'param_name' => 'scn5',
				'description' => esc_html__( 'Example: youremail@example.com (Leave empty to hide e-mail)', 'oscend' )
			),
			$add_css_animation,
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Section_Team extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Team_Member extends WPBakeryShortCode {
		}
	}

	////////////////////////

	// block one teem member

	vc_map( array(
		'name' => esc_html__( 'Team Member box', 'oscend' ),
		'base' => 'box_team_member',
		'class' => 'pix-theme-icon',
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'oscend' ),
				'param_name' => 'image',
				'description' => esc_html__( 'Select image.', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Name', 'oscend' ),
				'param_name' => 'name',
				'description' => esc_html__( 'Team member name.', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Position', 'oscend' ),
				'param_name' => 'position',
				'description' => esc_html__( 'Member position.', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 1', 'oscend' ),
				'param_name' => 'scn1',
				'description' => esc_html__( 'https://twitter.com/', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 1', 'oscend' ),
				'param_name' => 'scn_icon1',
				'description' => wp_kses_post( __( 'Add icon fa-twitter <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'oscend' ) )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 2', 'oscend' ),
				'param_name' => 'scn2',
				'description' => esc_html__( 'https://www.facebook.com/', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 2', 'oscend' ),
				'param_name' => 'scn_icon2',
				'description' => wp_kses_post( __( 'Add icon fa-facebook <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'oscend' ) )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 3', 'oscend' ),
				'param_name' => 'scn3',
				'description' => esc_html__( 'https://www.linkedin.com/', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 3', 'oscend' ),
				'param_name' => 'scn_icon3',
				'description' => wp_kses_post( __( 'Add icon fa-linkedin <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'oscend' ) )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 4', 'oscend' ),
				'param_name' => 'scn4',
				'description' => esc_html__( 'https://www.googleplus.com/', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 4', 'oscend' ),
				'param_name' => 'scn_icon4',
				'description' => wp_kses_post( __( 'Add icon fa-google-plus <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'oscend' ) )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'E-mail', 'oscend' ),
				'param_name' => 'scn5',
				'description' => esc_html__( 'Example: youremail@example.com (Leave empty to hide e-mail)', 'oscend' )
			),
			$add_css_animation,
		)
	) );

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Team_Member extends WPBakeryShortCode {
		}
	}


	vc_map(
		array(
			"name" => esc_html__( 'Posts Block', 'oscend' ),
			"base" => 'block_posts',
			"class" => 'pix-theme-icon4',
			'category' => esc_html__( 'Templines', 'oscend' ),
			"params" => array(
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Category', 'oscend' ),
					'param_name' => 'cat_post',
					'value' => $cats_post,
					'description' => esc_html__( 'Select category to show their post.', 'oscend' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Columns Number', 'oscend' ),
					'param_name' => 'columns_number',
					'value' => array(
						esc_html__('Columns 3', 'oscend') => '3',
						esc_html__('Columns 2', 'oscend') => '2',
					)
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Posts Count', 'oscend' ),
					'param_name' => 'posts_count',
					'value' => '3',
					'description' => esc_html__( 'If empty, display all posts.', 'oscend' ),
				),
				$add_css_animation,
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Block_Posts extends WPBakeryShortCode {

		}
	}

	// block About

	vc_map( array(
		'name' => esc_html__( 'About box', 'oscend' ),
		'base' => 'box_about',
		'class' => 'pix-theme-icon',
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'oscend' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Title block.', 'oscend' )
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'oscend' ),
				'param_name' => 'image',
				'description' => esc_html__( 'Select image.', 'oscend' )
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'Link', 'oscend' ),
				'param_name' => 'link',
				'description' => esc_html__( 'Select url.', 'oscend' )
			),
			array(
				'type' => 'textarea_html',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Content', 'oscend' ),
				'param_name' => 'content',
				'value' => wp_kses_post( __( '<p>I am test text block. Click edit button to change this text.</p>', 'oscend' ) ),
				'description' => esc_html__( 'Enter text.', 'oscend' )
			),
			$add_css_animation,
		)
	) );

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_About extends WPBakeryShortCode {
		}
	}


	/// twitter

	vc_map(
		array(
			"name" => esc_html__( 'Twitter Box', 'oscend' ),
			"base" => 'box_twitter',
			 "class" => 'pix-theme-icon6',
			"category" => esc_html__( 'Templines', 'oscend'),
			'show_settings_on_create' => true,
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'oscend' ),
					'param_name' => 'title',
					'value' => esc_html__( 'Latest from twitter', 'oscend' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Username', 'oscend' ),
					'param_name' => 'username',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Consumer Key', 'oscend' ),
					'param_name' => 'consumer_key',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Consumer Secret', 'oscend' ),
					'param_name' => 'consumer_secret',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Access Token', 'oscend' ),
					'param_name' => 'access_token',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Access Token Secret', 'oscend' ),
					'param_name' => 'access_token_secret',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of Tweets to show', 'oscend' ),
					'param_name' => 'num_of_tweets',
					'value' => '5',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Carousel', 'oscend' ),
					'param_name' => 'disable_carousel',
					'value' => array(
						esc_html__('Enable', 'oscend') => 1,
						esc_html__('Disable', 'oscend') => 0,
					),
					'description' => __( 'On/off carousel', 'oscend' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Auto Play', 'oscend' ),
					'param_name' => 'autoplay',
					'value' => '4000',
					'description' => esc_html__( 'Enter autoplay speed in milliseconds. 0 is turn off autoplay.', 'oscend' ),
				),
				$add_css_animation,
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Twitter extends WPBakeryShortCode {
			public function hyperlinks($text) {
				$text = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a target=\"_blank\" href=\"$1\" class=\"twitter-link\"></a>", $text);
				$text = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a target=\"_blank\" href=\"http://$1\" class=\"twitter-link\"></a>", $text);
			
				$text = preg_replace("/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i","<a target=\"_blank\" href=\"mailto://$1\" class=\"twitter-link\"></a>", $text);
					//mach #trendingtopics. Props to Michael Voigt
				$text = preg_replace('/([\.|\,|\:|\?|\?|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a target=\"_blank\" href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\"></a>$3 ", $text);
				return $text;
			}
			/**
			 * Find twitter usernames and link to them
			 */
			public function twitter_users($text) {
				   $text = preg_replace('/([\.|\,|\:|\?|\?|\>|\{|\(]?){1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\"></a>$3 ", $text);
				   return $text;
			}
		}
	}

	//////////////////////////////////////////////////////////////////////

	//////// Timeline ////////

	vc_map( array(
		'name' => esc_html__( 'Timeline', 'oscend' ),
		'base' => 'section_timeline',
		'class' => 'pix-theme-icon5',
		'as_parent' => array('only' => 'section_timeline_option'),
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => esc_html__( 'Templines', 'oscend' ),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Timeline block per page', 'oscend' ),
				'param_name' => 'count',
				'value' => '3',
				'description' => esc_html__( 'If empty, display all blocks', 'oscend' ),
			),
			$add_css_animation,
		),


		'js_view' => 'VcColumnView',

	) );


	vc_map( array(
		'name' => esc_html__( 'Timeline option', 'oscend' ),
		'base' => 'section_timeline_option',
		'class' => 'pix-theme-icon',
		'as_child' => array('only' => 'section_timeline'),
		'content_element' => true,
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Position On Timeline', 'oscend' ),
				'param_name' => 'type',
				'value' => array(
					esc_html__('Left', 'oscend') => 'left',
					esc_html__('Right', 'oscend') => 'right',
				),
				'description' => esc_html__( 'Left/right position on timeline', 'oscend' )
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'oscend' ),
				'param_name' => 'image',
				'description' => esc_html__( 'Select image.', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Date', 'oscend' ),
				'param_name' => 'date',
				'description' => esc_html__( 'Option date', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'oscend' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Option title', 'oscend' )
			),
			$add_css_animation,
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( 'Content', 'oscend' ),
				"param_name" => "content",
				"value" => wp_kses_post( __( '<p>I am test text block. Click edit button to change this text.</p>', 'oscend' ) ),
				"description" => esc_html__( 'Enter text.', 'oscend' )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Section_Timeline extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Timeline_Option extends WPBakeryShortCode {
		}
	}

	/////////////////////////////////


	/// section_analytics
	vc_map( array(
		'name' => esc_html__( 'Detailed Analytics', 'oscend' ),
		'base' => 'section_analytics',
		'class' => 'pix-theme-icon5',
		'as_parent' => array('only' => 'section_analytics_option'),
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => esc_html__( 'Templines', 'oscend'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'oscend' ),
				'param_name' => 'image',
				'description' => esc_html__( 'Select image.', 'oscend' )
			),
			$add_css_animation,
		),
		'js_view' => 'VcColumnView',

	) );
	vc_map( array(
		'name' => esc_html__( 'Analytic Option', 'oscend' ),
		'base' => 'section_analytics_option',
		'class' => 'pix-theme-icon',
		'as_child' => array('only' => 'section_analytics'),
		'content_element' => true,
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'oscend' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Title.', 'oscend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Under Title', 'oscend' ),
				'param_name' => 'under_title',
				'description' => esc_html__( 'Under Title.', 'oscend' )
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Horizontal Item Position", "oscend" ),
				"param_name" => "itempos",
				"value" => array(
					esc_html__( "Left", "oscend" ) => 'left',
					esc_html__( "Right", "oscend" ) => 'right',
				),
				"description" => esc_html__( "Left or right", "oscend" ),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Vertical Item Position", "oscend" ),
				"param_name" => "itempos_vert",
				"value" => array(
					esc_html__( "Top", "oscend" ) => 'top',
					esc_html__( "Middle", "oscend" ) => 'middle',
					esc_html__( "Bottom", "oscend" ) => 'bottom',
				),
				"description" => esc_html__( "Top, middle or bottom", "oscend" ),
			),
			$add_css_animation,
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Info", "oscend" ),
				"param_name" => "content",
				"description" => esc_html__( "Enter information.", "oscend" )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Section_Analytics extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Analytics_Option extends WPBakeryShortCode {
		}
	}
	////////////////////////

	oscend_vc_map(
		array(
			"name" => esc_html__( "Icon Step", "oscend" ),
			"base" => "box_icon_step",
			"class" => "pix-theme-icon3",
			"category" => esc_html__( "Templines", "oscend"),
			'params' => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Title", "oscend" ),
					"param_name" => "title",
					"value" => esc_html__( "I am title", "oscend" ),
					"description" => esc_html__( "Add Title ", "oscend" )
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Step", "oscend" ),
					"param_name" => "step",
					"value" => '1',
					"description" => esc_html__( "Use step number.", "oscend" )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Type', 'oscend' ),
					'param_name' => 'color',
					'value' => array(
						esc_html__( "Black", "oscend" ) => '',
						esc_html__( "Color", "oscend" ) => 'invert',
					),
					'description' => '',
				),
			)
		),
		$add_css_animation,
		oscend_get_vc_icons($vc_icons_data)
	);

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Icon_Step extends WPBakeryShortCode {

		}
	}

	///Price
	vc_map( array(
		'name' => esc_html__( 'Price', 'oscend' ),
		'base' => 'section_prices',
		'class' => 'pix-theme-icon',
		'as_parent' => array('only' => 'section_price'),
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => esc_html__( 'Templines', 'oscend'),
		'params' => array(
			$add_css_animation,
		),
		'js_view' => 'VcColumnView',

	) );

	vc_map(
		array(
			"name" => esc_html__( 'Price Table', 'oscend' ),
			"base" => 'section_price',
			"class" => 'pix-theme-icon',
			'as_child' => array('only' => 'section_prices'),
			'content_element' => true,
			"params" => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Type Price', 'oscend' ),
					'param_name' => 'type',
					'value' => array(
						esc_html__( 'Simple', 'oscend' ) => '',
						esc_html__( 'Popular', 'oscend' ) => 'active',
					),
					'description' => esc_html__( 'Simple or popular', 'oscend' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Width Table Price', 'oscend' ),
					'param_name' => 'width_type',
					'value' => array(
						esc_html__( '1/3', 'oscend' ) => '3',
						esc_html__( '1/4', 'oscend' ) => '4',
					),
					'description' => esc_html__( '1/3 or 1/4', 'oscend' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Price Title', 'oscend' ),
					'param_name' => 'price_title',
					'description' => esc_html__( 'Price title.', 'oscend' ),
					'value' => esc_html__( 'Basic', 'oscend' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Amount', 'oscend' ),
					'param_name' => 'price_amount',
					'value' => esc_html__( '$150', 'oscend' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Date', 'oscend' ),
					'param_name' => 'price_date',
					'value' => esc_html__( 'per month', 'oscend' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button Text', 'oscend' ),
					'param_name' => 'btntext',
					'description' => esc_html__( 'Button text.', 'oscend' ),
					'value' => esc_html__( 'Sign up now', 'oscend' ),
				),
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'Link', 'oscend' ),
					'param_name' => 'btnlink',
					'description' => esc_html__( 'Button link.', 'oscend' ),
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'heading' => esc_html__( 'Content', 'oscend' ),
					'param_name' => 'content',
					'value' => wp_kses_post( __( '<ul><li>1</li><li>2</li><li class="inactive">3</li></ul>', 'oscend' ) ),
				),
				$add_css_animation,
			)
		)
	);

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Section_Prices extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Price extends WPBakeryShortCode {
		}
	}


	//////// Social Buttons ////////


	vc_map( array(
		'name' => esc_html__( 'Social Buttons', 'oscend' ),
		'base' => 'section_socialbuts',
		'class' => 'pix-theme-icon3',
		'as_parent' => array('only' => 'section_socialbut'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => esc_html__( 'Templines', 'oscend' ),
		'params' => array(
			$add_css_animation,
		),
		'js_view' => 'VcColumnView',

	) );

	vc_map(
		array(
			'name' => esc_html__( 'Color Social Button', 'oscend' ),
			'base' => 'section_socialbut',
			'class' => 'pix-theme-icon',
			'category' => esc_html__( 'Templines', 'oscend' ),
			'as_child' => array('only' => 'section_socialbuts'),
			'content_element' => true,
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'oscend' ),
					'param_name' => 'title',
					'description' => esc_html__( 'Social title.', 'oscend' )
				),
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'Link', 'oscend' ),
					'param_name' => 'link',
					'description' => esc_html__( 'Social link.', 'oscend' )
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => esc_html__( "Background Color", 'oscend' ),
					"param_name" => "bg_color",
					"value" => "#ff6400",
					"description" => esc_html__( "Select bg color.", 'oscend' )
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => esc_html__( "Color", 'oscend' ),
					"param_name" => "color",
					"value" => "#fff",
					"description" => esc_html__( "Select text color.", 'oscend' )
				),
				$add_css_animation,
			)
		)
	);

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Section_Socialbuts extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Socialbut extends WPBakeryShortCode {

		}
	}


	////////////////////////

	vc_map( array(
		'name' => esc_html__( 'Social Icons', 'oscend' ),
		'base' => 'section_socicons',
		'class' => 'pix-theme-icon',
		'as_parent' => array('only' => 'section_socicon'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => esc_html__( 'Templines', 'oscend' ),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'oscend' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Social title.', 'oscend' ),
				'value' => esc_html__( 'We are social 24/7 - Get in touch', 'oscend' ),
			),
			$add_css_animation,
		),
		'js_view' => 'VcColumnView',

	) );


	oscend_vc_map(
		array(
			'name' => esc_html__( 'Social Button', 'oscend' ),
			'base' => 'section_socicon',
			'class' => 'pix-theme-icon',
			'category' => esc_html__( 'Templines', 'oscend' ),
			'as_child' => array('only' => 'section_socicons'),
			'content_element' => true,
			'params' => array(
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'Link', 'oscend' ),
					'param_name' => 'link',
					'description' => esc_html__( 'Social link.', 'oscend' )
				),
			)
		),
		$add_css_animation,
		oscend_get_vc_icons($vc_icons_data)
	);

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Section_Socicons extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Socicon extends WPBakeryShortCode {

		}
	}


	////////////////////////

	/////////// brands

	vc_map( array(
		'name' => esc_html__( 'Brands', 'oscend' ),
		'base' => 'section_brands',
		'class' => 'pix-theme-icon',
		'as_parent' => array('only' => 'section_brand'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => esc_html__( 'Templines', 'oscend' ),
		'params' => array(
			$add_css_animation,
		),
		'js_view' => 'VcColumnView',

	) );

	vc_map(
		array(
			'name' => esc_html__( 'Brand', 'oscend' ),
			'base' => 'section_brand',
			'class' => 'pix-theme-icon',
			'category' => esc_html__( 'Templines', 'oscend' ),
			'as_child' => array('only' => 'section_brands'),
			'content_element' => true,
			'params' => array(
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Image', 'oscend' ),
					'param_name' => 'image',
					'description' => esc_html__( 'Select image from media library.', 'oscend' )
				),
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'Link', 'oscend' ),
					'param_name' => 'link',
					'value' => esc_html__( 'https://wordpress.com', 'oscend' ),
					'description' => esc_html__( 'Brand link.', 'oscend' )
				),
				$add_css_animation,
			)
		)
	);

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Section_Brands extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Brand extends WPBakeryShortCode {

		}
	}

	//////////////////


	vc_map(
		array(
			"name" => esc_html__( "Portfolio", 'oscend' ),
			"base" => "section_portfolio",
			"class" => "pix-theme-icon",
			'category' => esc_html__( 'Templines', 'oscend' ),
			"params" => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Show filter', 'oscend' ),
					'param_name' => 'template',
					'value' => array(
						esc_html__( "Yes", 'oscend' ) => 'isotop',
						esc_html__( "No", 'oscend' ) => 'landing',
					),
					'description' => '',
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Categories', 'oscend' ),
					'param_name' => 'cat_port',
					'value' => $cats_port,
					'description' => esc_html__( 'Select categories to show their portfolio.', 'oscend' ),
					'dependency' => array(
						'element' => 'template',
						'value' => array('isotop', 'landing'),
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Columns Number', 'oscend' ),
					'param_name' => 'perrow',
					'value' => array(
						esc_html__( '2 Columns', 'oscend' ) => '2',
						esc_html__( '3 Columns', 'oscend' ) => '3',
						esc_html__( '4 Columns', 'oscend' ) => '4',
					),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Items Count', 'oscend' ),
					'param_name' => 'count',
					'description' => esc_html__( 'Select number portfolio works to show per page. Leave empty to show all warks.', 'oscend' ),
					'dependency' => array(
						'element' => 'template',
						'value' => array('isotop', 'landing'),
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Item type', 'oscend' ),
					'param_name' => 'type',
					'value' => array(
						esc_html__( 'Without over icons', 'oscend' ) => 'type_without_icons',
						esc_html__( 'With over icons', 'oscend' ) => 'type_with_icons',
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Show Load more button', 'oscend' ),
					'param_name' => 'btnshow',
					'value' => array(
						esc_html__( 'No', 'oscend' ) => 'no',
						esc_html__( 'Yes', 'oscend' ) => 'yes',
					),
					'dependency' => array(
						'element' => 'template',
						'value' => array('isotop', 'landing'),
					),
					'description' => esc_html__( 'Show or not button Load more', 'oscend' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button text', 'oscend' ),
					'param_name' => 'btntext',
					'value' => esc_html__( 'Load more', 'oscend' ),
					'dependency' => array(
						'element' => 'btnshow',
						'value' => array('yes'),
					),
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'heading' => esc_html__( 'Description', 'oscend' ),
					'param_name' => 'content',
					'value' => '',
				),
				$add_css_animation,
				array(
					'type' => 'tab_id',
					'heading' => esc_html__( 'ID', 'oscend' ),
					'param_name' => "tab_id",
				),
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Portfolio extends WPBakeryShortCode {

		}
	}

	vc_map(
		array(
			"name" => esc_html__( "Portfolio Latest Works", 'oscend' ),
			"base" => "section_portfolio_latest_works",
			"class" => "pix-theme-icon",
			'category' => esc_html__( 'Templines', 'oscend' ),
			"params" => array(
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Categories', 'oscend' ),
					'param_name' => 'cat_port',
					'value' => $cats_port,
					'description' => esc_html__( 'Select categories to show their portfolio.', 'oscend' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Items Count', 'oscend' ),
					'param_name' => 'count',
					'description' => esc_html__( 'Select number portfolio works to show. Leave empty to show all warks.', 'oscend' ),
				),
				$add_css_animation,
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Portfolio_Latest_Works extends WPBakeryShortCode {

		}
	}

	vc_map(
		array(
			"name" => esc_html__( 'Contact Form 7', 'oscend' ),
			"base" => "block_cform7",
			"class" => "pix-theme-icon6",
			'category' => esc_html__( 'Templines', 'oscend' ),
			"params" => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Contact Form', 'oscend' ),
					'param_name' => 'form_id',
					'value' => $cform7,
					'description' => esc_html__( 'Select contact form to show', 'oscend' )
				),
				$add_css_animation,
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Block_Cform7 extends WPBakeryShortCode {

		}
	}

	////////////////////////

	vc_map(
		array(
			"name" => esc_html__( 'Mailchimp Block', 'oscend' ),
			"base" => "block_mailchimp",
			"class" => "pix-theme-icon6",
			'category' => esc_html__( 'Templines', 'oscend' ),
			"params" => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Mailchimp Form', 'oscend' ),
					'param_name' => 'form_id',
					'value' => $mc4wp,
					'description' => esc_html__( 'Select Mailchimp Form to show', 'oscend' )
				),
				$add_css_animation,
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Block_Mailchimp extends WPBakeryShortCode {

		}
	}

	vc_map(
		array(
			"name" => esc_html__( 'Flickr', 'oscend' ),
			"base" => "flickr",
			"class" => "pix-theme-icon6",
			'category' => esc_html__( 'Templines', 'oscend' ),
			"params" => array(
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Title", 'oscend' ),
					"param_name" => "title",
					"value" => esc_html__( 'Latest From Flickr', 'oscend' ),
					"description" => ''
				),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Flickr ID", 'oscend' ),
					"param_name" => "id",
					"value" => '37304598@N02',
					"description" => esc_html__( "Get your flickr ID from: //idgettr.com/", 'oscend' )
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Number of photos", 'oscend' ),
					"param_name" => "number",
					"value" => '6',
					"description" => esc_html__( "Default 6.", 'oscend' )
				 ),
				 $add_css_animation,
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Flickr extends WPBakeryShortCode {

		}
	}

	/// section_tabs
	vc_map( array(
		'name' => esc_html__( 'Tabs', 'oscend' ),
		'base' => 'section_tabs',
		'class' => 'pix-theme-icon',
		'as_parent' => array('only' => 'section_tab'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		'content_element' => true,
		'category' => esc_html__( 'Templines', 'oscend'),
		'params' => array(
			$add_css_animation,
		),
		'js_view' => 'VcColumnView', // must be added for all Containers ( or should be extended in js ). VC Dev team
	) );

	oscend_vc_map(
		array(
			'name' => esc_html__( 'Tab', 'oscend' ),
			'base' => 'section_tab',
			'class' => 'pix-theme-icon',
			'category' => esc_html__( 'Templines', 'oscend' ),
			'as_child' => array('only' => 'section_tabs'),
			'content_element' => true,
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'oscend' ),
					'param_name' => 'title',
					'description' => esc_html__( 'Tab title.', 'oscend' )
				),
				array(
					'type' => 'tab_id',
					'heading' => esc_html__( 'Tab ID', 'oscend' ),
					'param_name' => "tab_id",
				),
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Content Image', 'oscend' ),
					'param_name' => 'image',
					'description' => esc_html__( 'Select image.', 'oscend' )
				),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Content", 'oscend' ),
					"param_name" => "content",
					"value" => wp_kses_post( __( "<p>I am test text block. Click edit button to change this text.</p>", 'oscend' ) ),
					"description" => esc_html__( "Enter your content.", 'oscend' )
				),
			),
			'js_view' => 'VcTabView',
		),
		$add_css_animation,
		oscend_get_vc_icons($vc_icons_data)
	);

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Section_Tabs extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Tab extends WPBakeryShortCode {
		}
	}
	//////////////////////////////////

	////icon box info

	oscend_vc_map(
		array(
			"name" => esc_html__( "Info Icon Box", "oscend" ),
			"base" => "box_icon_info",
			"class" => "pix-theme-icon3",
			"category" => esc_html__( "Templines", "oscend"),
			'params' => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Title", "oscend" ),
					"param_name" => "title",
					"value" => esc_html__( "I am title", "oscend" ),
					"description" => esc_html__( "Add Title ", "oscend" )
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Info", "oscend" ),
					"param_name" => "info",
					"description" => esc_html__( "Add Info", "oscend" )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Type', 'oscend' ),
					'param_name' => 'typebox',
					'value' => array(
						esc_html__( 'Simple', 'oscend' ) => '1',
						esc_html__( 'Underline', 'oscend' ) => '2',
					),
					'description' => esc_html__( 'Select type icon box', 'oscend' ),
				),
			)
		),
		$add_css_animation,
		oscend_get_vc_icons($vc_icons_data)
	);

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Icon_Info extends WPBakeryShortCode {

		}
	}


	//// icon big

	oscend_vc_map(
		array(
			"name" => esc_html__( "Big Icon Box", "oscend" ),
			"base" => "box_icon_big",
			"class" => "pix-theme-icon3",
			"category" => esc_html__( "Templines", "oscend"),
			'params' => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Title", "oscend" ),
					"param_name" => "title",
					"value" => esc_html__( "I am title", "oscend" ),
					"description" => esc_html__( "Add Title ", "oscend" )
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Info", "oscend" ),
					"param_name" => "info",
					"description" => esc_html__( "Add Info", "oscend" )
				),
			)
		),
		$add_css_animation,
		oscend_get_vc_icons($vc_icons_data)
	);

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Icon_Big extends WPBakeryShortCode {

		}
	}

	//// buttons

	vc_map(
		array(
			'name' => esc_html__( 'Button', 'oscend' ),
			'base' => 'box_button',
			'class' => 'pix-theme-icon',
			'category' => esc_html__( 'Templines', 'oscend' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Button text', 'oscend' ),
					'param_name' => 'btntext',
					'description' => esc_html__( 'Enter Button text', 'oscend' )
				),
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'Link', 'oscend' ),
					'param_name' => 'btnlink',
					'description' => esc_html__( 'Button link.', 'oscend' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Button Type', 'oscend' ),
					'param_name' => 'btntype',
					'value' => array(
						esc_html__( 'Default (bg white)', 'oscend' ) => 'btn-default',
						esc_html__( 'Info (bg transparent)', 'oscend' ) => 'btn-info',
						esc_html__( 'Primary (bg main color)', 'oscend' ) => 'btn-primary',
						esc_html__( 'Warning (bg white color - hover main color)', 'oscend' ) => 'btn-primary-warning',
					),
					'description' => esc_html__( 'Select button type', 'oscend' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Button Type', 'oscend' ),
					'param_name' => 'btnstyle',
					'value' => array(
						esc_html__( 'Inline', 'oscend' ) => 'inline',
						esc_html__( 'Center', 'oscend' ) => 'text-center',
						esc_html__( 'Left', 'oscend' ) => 'text-left',
						esc_html__( 'Right', 'oscend' ) => 'text-right',
					),
					'description' => esc_html__( 'Select button type', 'oscend' ),
				),
				$add_css_animation
			)
		)
	);

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Button extends WPBakeryShortCode {

		}
	}


	///// video

	vc_map(
		array(
			'name' => esc_html__( 'Video', 'oscend' ),
			'base' => 'box_video',
			'class' => 'pix-theme-icon',
			'category' => esc_html__( 'Templines', 'oscend' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'oscend' ),
					'param_name' => 'title',
					'description' => esc_html__( 'Title.', 'oscend' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Under Title', 'oscend' ),
					'param_name' => 'undertitle',
					'description' => esc_html__( 'Under Title.', 'oscend' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'YouTube link', 'oscend' ),
					'param_name' => 'url',
					'value' => 'https://youtu.be/R8OOWcsFj0U',
					'description' => esc_html__( 'Use YouTube link.', 'oscend' )
				),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Content", "oscend" ),
					"param_name" => "content",
				),
				$add_css_animation,
			)
		)
	);

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Video extends WPBakeryShortCode {

		}
	}


	vc_map(
		array(
			"name" => esc_html__( "Google Map", 'oscend' ),
			"base" => "section_map",
			"class" => "pix-theme-icon6",
			"category" => esc_html__( 'Templines', 'oscend'),
			"params" => array(
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Marker Image', 'oscend' ),
					'param_name' => 'image',
					'value' => '',
					'description' => esc_html__( 'Select image from media library.', 'oscend' )
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => esc_html__( "Address", 'oscend' ),
					"param_name" => "address",
					"value" => '',
					"description" => esc_html__( "Example: San Diego, CA", 'oscend' )
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => esc_html__( "Map Width", 'oscend' ),
					"param_name" => "width",
					"value" => '',
					"description" => esc_html__( "Default 100%", 'oscend' )
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => esc_html__( "Map Height", 'oscend' ),
					"param_name" => "height",
					"value" => '',
					"description" => esc_html__( "Default 300px", 'oscend' )
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => esc_html__( "Zoom", 'oscend' ),
					"param_name" => "zoom",
					"value" => '',
					"description" => esc_html__( "Zoom 0-20. Default 12.", 'oscend' )
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Scroll Wheel", 'oscend' ),
					"param_name" => "scrollwheel",
					'value' => array(
						esc_html__( "Off", 'oscend' ) => 'false',
						esc_html__( "On", 'oscend' ) => 'true',
					),
					"description" => esc_html__( "Zoom map with scroll", 'oscend' )
				),
			)
		)
	);

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Map extends WPBakeryShortCode {
		}
	}



}
