<?php
/**
 * This template is for displaying part of blog.
 *
 * @package oscend
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
?>


<div class="wrap-image">
	<?php if ( is_single() ) : ?>

		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( $size = $oscend_size_thumb, $attr = array( 'class' => "img-responsive" ) ); ?>
		<?php endif; ?>

	<?php else : ?>

		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php esc_url( the_permalink() ); ?>">
				<?php the_post_thumbnail( $size = $oscend_size_thumb, $attr = array( 'class' => "img-responsive" ) ); ?>
			</a>
		<?php endif; ?>

	<?php endif; ?>
</div>