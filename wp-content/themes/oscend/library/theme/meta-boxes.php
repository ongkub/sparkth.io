<?php
/**
 * The template for registering metabox.
 *
 * @package Oscend
 * @since 1.0
 */
add_filter( 'rwmb_meta_boxes', 'oscend_pix_register_meta_boxes' );

if ( ! function_exists( 'oscend_pix_register_meta_boxes' ) ) :

	function oscend_pix_register_meta_boxes( $meta_boxes ) {

		$meta_boxes[] = array(

			'id' => 'post_format',
			'title' => esc_html__( 'Post Format Options', 'oscend' ),
			'pages' => array( 'post' ),
			'context' => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields' => array(

				array(
					'name' => esc_html__('Post Gallery:','oscend'),
					'id'   => 'post_gallery',
					'type' => 'image_advanced',
					'max_file_uploads' => 25
				),
				array(
					'name'  => esc_html__('Quote Source:', 'oscend'),
					'id'    => 'post_quote_source',
					'desc'  => '',
					'type'  => 'text',
					'std'   => '',
				),
				array(
					'name'  => esc_html__('Quote Content:', 'oscend'),
					'id'    => 'post_quote_content',
					'desc'  => '',
					'type'  => 'textarea',
					'std'   => '',
				),
				array(
					'name'  => esc_html__('Video URL', 'oscend'),
					'id'    => "post_video",
					'type'  => 'oembed',
					'desc' => esc_html__( 'Enter video link eg (https://youtu.be/R8OOWcsFj0U)', 'oscend' )
				),
				array(
					'name' => esc_html__('Image for background', 'oscend'),
					'id'   => 'post_link_bg',
					'type' => 'image_advanced',
					'max_file_uploads' => 1
				),
				array(
					'name'  => esc_html__('Link URL', 'oscend'),
					'id'    => 'post_link_url',
					'desc'  => '',
					'type'  => 'url',
					'std'   => '',
				),
				array(
					'name'  => esc_html__('Link text', 'oscend'),
					'id'    => 'post_link_text',
					'desc'  => '',
					'type'  => 'text',
					'std'   => '',
				),
				array(
					'name'  => esc_html__('Audio URL', 'oscend'),
					'id'    => "post_audio",
					'type'  => 'oembed',
					'desc' => esc_html__( 'Enter audio link eg (https://soundcloud.com/muse/01-new-born)', 'oscend' )
				),
			)

		);


		$meta_boxes[] = array(

			'id' => 'page_options',
			'title' => esc_html__( 'Page Subtitle', 'oscend' ),
			'pages' => array( 'portfolio', 'post', 'page'),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(

				array(
					'name'    => esc_html__( 'Text', 'oscend' ),
					'id'      => 'oscend_page_subtitle',
					'desc'    => '',
					'type'    => 'text',
					'std'     => ''
				)
			)
		);

		$meta_boxes[] = array(
			'id' => 'page_additional',
			'title' => esc_html__( 'Page Icon', 'oscend' ),
			'pages' => array( 'portfolio', 'post', 'page'),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name'    => esc_html__( 'Class', 'oscend' ),
					'id'      => 'oscend_page_icon',
					'desc'    => '',
					'type'    => 'text',
					'std'     => ''
				)
			)
		);

		$meta_boxes[] = array(
			'id' => 'portfolio_meta',
			'title' => esc_html__( 'Portfolio Meta', 'oscend' ),
			'pages' => array( 'portfolio' ),
			'context' => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields' => array(
				array(
					'name'  => esc_html__( 'Created by', 'oscend' ),
					'id'    => 'portfolio_create',
					'type'  => 'text',
					'desc' => esc_html__( 'Enter author name', 'oscend' )
				),
				array(
					'name'  => esc_html__( 'Completed on', 'oscend' ),
					'id'    => 'portfolio_complete',
					'type'  => 'date',
					'js_options' => array('dateFormat' => 'MM d, yy'),
					'desc' => esc_html__( 'Enter date', 'oscend' )
				),
				array(
					'name'  => esc_html__( 'Skills', 'oscend' ),
					'id'    => 'portfolio_skills',
					'type'  => 'text',
					'desc' => esc_html__( 'Enter skills', 'oscend' )
				),
				array(
					'name'  => esc_html__( 'Client', 'oscend' ),
					'id'    => 'portfolio_client',
					'type'  => 'text',
					'desc' => esc_html__( 'Enter client name', 'oscend' )
				),
				array(
					'name'  => esc_html__( 'Client link', 'oscend' ),
					'id'    => 'portfolio_client_link',
					'type'  => 'url',
					'desc' => esc_html__( 'Enter client link eg (http://themeforest.net/)', 'oscend' )
				),
				array(
					'name'  => esc_html__( 'Project link', 'oscend' ),
					'id'    => 'portfolio_button_link',
					'type'  => 'url',
					'desc' => esc_html__( 'Enter project link eg (http://themeforest.net/). Leave empty to hide button View project', 'oscend' )
				),
			)
		);

		$meta_boxes[] = array(
			'id' => 'post_types',
			'title' => esc_html__( 'Portfolio Option', 'oscend' ),
			'pages' => array( 'portfolio' ),
			'context' => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields' => array(
				array(
					'name'     => esc_html__( 'Post Types', 'oscend' ),
					'id'       => "post_types_select",
					'type'     => 'select_advanced',
					'desc' => esc_html__( 'Select post types', 'oscend' ),
					'options'  => array(
						'image' => esc_html__( 'Gallery', 'oscend' ),
						'video' => esc_html__( 'Video', 'oscend' )
					)
				),
				array(
					'name' => esc_html__( 'Post Type For Gallery', 'oscend' ),
					'id'   => 'portfolio_images',
					'type' => 'image_advanced',
					'max_file_uploads' => 25,
					'desc' => esc_html__( 'Upload images for your portfolio post.', 'oscend' ),
				),
				array(
					'name'  => esc_html__( 'Video', 'oscend' ),
					'id'    => 'portfolio_video_href',
					'type'  => 'oembed',
					'desc' => esc_html__( 'Enter video link eg (https://youtu.be/R8OOWcsFj0U)', 'oscend' )
				),
				array(
					'name' => esc_html__( 'Video width', 'oscend' ),
					'id'   => 'portfolio_video_width',
					'type' => 'slider',
					'desc' => esc_html__('Range video width', 'oscend'),
					'suffix' => ' ' . esc_html__( 'px', 'oscend' ),
					'js_options' => array(
						'min'   => 100,
						'max'   => 2000,
						'step'  => 10,
					),
				),
				array(
					'name' => esc_html__( 'Video height', 'oscend' ),
					'id'   => 'portfolio_video_height',
					'type' => 'slider',
					'desc' => esc_html__('Range video height', 'oscend'),
					'suffix' => ' ' . esc_html__( 'px', 'oscend' ),
					'js_options' => array(
						'min'   => 100,
						'max'   => 1000,
						'step'  => 5,
					),
				),
			)
		);


		return $meta_boxes;
	}

endif;