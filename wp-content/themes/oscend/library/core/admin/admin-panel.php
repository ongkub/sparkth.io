<?php

	require_once( get_template_directory() . '/library/core/admin/admin-panel/general.php' );
	require_once( get_template_directory() . '/library/core/admin/admin-panel/style.php' );
	require_once( get_template_directory() . '/library/core/admin/admin-panel/header.php' );
	require_once( get_template_directory() . '/library/core/admin/admin-panel/footer.php' );
	require_once( get_template_directory() . '/library/core/admin/admin-panel/portfolio.php' );
	require_once( get_template_directory() . '/library/core/admin/admin-panel/blog.php' );
	require_once( get_template_directory() . '/library/core/admin/admin-panel/css_animation.php' );
	require_once( get_template_directory() . '/library/core/admin/admin-panel/shop.php' );
	require_once( get_template_directory() . '/library/core/admin/admin-panel/sanitizer.php' );


	function oscend_customize_register( $wp_customize ) {


		/** GENERAL SETTINGS **/
		oscend_customize_general_tab($wp_customize, 'oscend');


		/** STYLE SECTION **/

		oscend_customize_style_tab($wp_customize, 'oscend');


		/** HEADER SECTION **/

		oscend_customize_header_tab($wp_customize, 'oscend');


		/** FOOTER SECTION **/

		oscend_customize_footer_tab($wp_customize, 'oscend');


		/** PORTFOLIO PANEL AND SECTIONS **/

		oscend_customize_portfolio_tab($wp_customize, 'oscend');


		/** BLOG SECTION **/

		oscend_customize_blog_tab($wp_customize, 'oscend');


		/** CSS ANIMATION SECTION **/

		oscend_customize_css_animation_tab($wp_customize, 'oscend');


		/** SHOP SECTION **/

		oscend_customize_shop_tab($wp_customize, 'oscend');


		/** Remove unused sections */

		$removedSections = apply_filters('oscend_admin_customize_removed_sections', array('header_image','background_image'));
		foreach ($removedSections as $_sectionName){
			$wp_customize->remove_section($_sectionName);
		}

	}

	add_action( 'customize_register', 'oscend_customize_register' );