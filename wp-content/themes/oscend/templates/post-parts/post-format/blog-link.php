<?php
/**
 * This template is for displaying part of blog format video.
 *
 * @package Pix-Theme
 * @since 1.0
 */

$oscend_postpage_id = get_option( 'page_for_posts' );
$oscend_frontpage_id = get_option( 'page_on_front' );
$oscend_page_id = isset($wp_query) ? $wp_query->get_queried_object_id() : '';

if ( ( $oscend_page_id == $oscend_postpage_id && $oscend_postpage_id != $oscend_frontpage_id ) || is_single() ) :
	$oscend_custom = isset ($wp_query) ? get_post_custom($wp_query->get_queried_object_id()) : '';
	$oscend_layout = isset ($oscend_custom['oscend_page_layout']) ? $oscend_custom['oscend_page_layout'][0] : '2';
else :
	$oscend_layout = oscend_get_option('blog_settings_sidebar_type', '2');
endif;

$oscend_size_thumb = ( $oscend_layout == '1' ) ? 'oscend-post-thumb-large' : 'oscend-post-thumb-middle';



$oscend_link_url = rwmb_meta('post_link_url');
$oscend_link_text = rwmb_meta('post_link_text');
$oscend_link_bg = rwmb_meta('post_link_bg', 'type=image&size='.$oscend_size_thumb.'');

if ( $oscend_link_bg && $oscend_link_bg != '' && count( $oscend_link_bg ) == 1 ) :
	foreach ( $oscend_link_bg as $slide ) {
		$oscend_link_bg_url = esc_url( $slide['url'] );
	}
endif;

?>

<div class="wrap-linked-image" style="background-image: url(<?php echo esc_url( $oscend_link_bg_url ); ?>);">
	<span class="wrap-linked-image-overlay"></span>
	<a href="<?php echo esc_url( $oscend_link_url ); ?>" target="_blank">
		<span class="icon icon-Unlinked"></span>
		<?php echo wp_kses_post( $oscend_link_text ); ?>
	</a>
</div>
