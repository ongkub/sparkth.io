<?php /* Header Title template */ ?>

<?php
	$oscend_pix_postpage_id = get_option( 'page_for_posts' );
	$oscend_pix_frontpage_id = get_option( 'page_on_front' );
	$oscend_pix_page_id = isset( $wp_query ) ? $wp_query->get_queried_object_id() : '';

	$oscend_page_subtitle = ( class_exists( 'RW_Meta_Box' ) && rwmb_meta( 'oscend_page_subtitle', 'type=text', $oscend_pix_page_id) != '' ) ? rwmb_meta( 'oscend_page_subtitle', 'type=text', $oscend_pix_page_id ) : oscend_get_option( 'header_settings_subtitle' );

	$oscend_page_icon = ( class_exists( 'RW_Meta_Box' ) && rwmb_meta( 'oscend_page_icon', 'type=text', $oscend_pix_page_id) != '' ) ? rwmb_meta( 'oscend_page_icon', 'type=text', $oscend_pix_page_id ) : oscend_get_option( 'header_settings_icon' );

	$oscend_header_title_css_animation = ( oscend_get_option('css_animation_settings_header_title') != '' ) ? ' wow '.oscend_get_option('css_animation_settings_header_title') : '';


?>
<div class="header-container <?php echo esc_attr($oscend_header_title_css_animation); ?>">
	<div class="header-title">
		<div class="header-icon"><span class="icon <?php echo esc_attr( $oscend_page_icon ); ?>"></span></div>
		<div class="title">
			<?php
				if (is_single() && ! is_attachment() && get_post_type() == 'post' ) :
					echo wp_kses_post( oscend_get_option('header_settings_title_single_post', esc_html__('Blog details', 'oscend' ) ) );
				elseif (is_single() && ! is_attachment() && get_post_type() == 'portfolio' ) :
					echo wp_kses_post( oscend_get_option('header_settings_title_single_portfolio', esc_html__('Single work', 'oscend' ) ) );
				elseif( class_exists( 'WooCommerce' ) && (is_shop() || is_product_category() || is_product_tag()) ) :
					wp_kses_post(woocommerce_page_title());
				elseif ( is_archive() ) :
					wp_kses_post( the_archive_title( ) );
				elseif ( is_search() ) :
					echo wp_kses_post( oscend_get_option('header_settings_title_search_results', esc_html__('Search results', 'oscend' ) ) );
				elseif (  is_404() ) :
					echo wp_kses_post( esc_html__( '404', 'oscend' ) );
				elseif ( $oscend_pix_frontpage_id == $oscend_pix_page_id && $oscend_pix_page_id == $oscend_pix_postpage_id ) :
					echo wp_kses_post( oscend_get_option('header_settings_title_all_posts', esc_html__('All posts', 'oscend' ) ) );
				elseif ( isset($post->ID) && $post->ID > 0 ) :
					echo wp_kses_post( get_the_title($oscend_pix_page_id) );
				else :
					echo wp_kses_post( get_the_title() );
				endif;
			?>
		</div>
		<em><?php echo wp_kses_post( $oscend_page_subtitle ); ?></em>
	</div>
</div><!--container-->