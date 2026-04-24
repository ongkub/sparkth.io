<?php
/**
 * This template is for displaying part of blog.
 *
 * @package Oscend
 * @since 1.0
 */
$oscend_post_format  = get_post_format();
$oscend_post_format = !in_array($oscend_post_format, array("quote", "gallery", "video", "link","audio")) ? "standared" : $oscend_post_format;

$oscend_text_readmore = oscend_get_option( 'blog_settings_readmore', esc_html__('Read more', 'oscend' ) );
$oscend_blog_css_animation = ( oscend_get_option('css_animation_settings_blog', '') != '' ) ? ' wow '.oscend_get_option('css_animation_settings_blog', '') : '';

$oscend_get_avatar = get_avatar(get_the_author_meta('ID'), 70);
preg_match("/src=['\"](.*?)['\"]/i", $oscend_get_avatar, $matches);
$oscend_src = !empty($matches[1]) ? $matches[1] : '';
?>


<!-- Blog post-->
<div id="post-<?php esc_attr( the_ID() ); ?>" <?php post_class( 'wrap-blog-post' . esc_attr($oscend_blog_css_animation) ); ?>>

	<?php if ( class_exists( 'RW_Meta_Box' ) ) : ?>
	<?php get_template_part( 'templates/post-parts/post-format/blog', $oscend_post_format ); ?>
	<?php else : ?>
	<?php get_template_part( 'templates/post-parts/post-format/blog', 'default' ); ?>
	<?php endif; ?>

	<div class="wrap-post-description">
		<?php if ( oscend_get_option( 'blog_show_author', 'on' ) == 'on' ) : ?>
			<?php if ( get_the_author_meta( 'user_url' ) != '' ) : ?>
				<a class="post-avatar" href="<?php esc_url( the_author_meta( 'user_url' ) ); ?>" target="_blank">
					<img src="<?php echo esc_url($oscend_src); ?>" alt="<?php esc_attr( the_author_meta( 'display_name' ) ); ?>">
				</a>
			<?php else : ?>
				<a class="post-avatar" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>">
					<img src="<?php echo esc_url($oscend_src); ?>" alt="<?php esc_attr( the_author_meta( 'display_name' ) ); ?>">
				</a>
			<?php endif; ?>
		<?php endif; ?>
		<?php $oscend_add_meta_class = ( ( ! has_tag() || oscend_get_option( 'blog_show_tags', 'on' ) == 'off' ) && oscend_get_option( 'blog_show_date', 'on' ) == 'off' && ! comments_open() ) ? 'meta-empty' : ''; ?>
		<div class="meta <?php echo esc_attr($oscend_add_meta_class); ?>">
			<?php if ( has_tag() && oscend_get_option( 'blog_show_tags', 'on' ) == 'on' ) : ?>
			<div class="meta-item"><span class="icon icon-Tag"></span><?php oscend_post_terms( array( 'taxonomy' => 'post_tag' ) ); ?></div>
			<?php endif; ?>
			<?php if ( oscend_get_option( 'blog_show_date', 'on' ) == 'on' ) : ?>
			<div class="meta-item"><span class="icon icon-Agenda"></span><a href="<?php esc_url( the_permalink() ); ?>"><?php echo get_the_date(); ?></a></div>
			<?php endif; ?>
			<?php if ( comments_open() ) : ?>
			<div class="meta-item"><span class="icon icon-Message"></span><?php comments_popup_link( esc_html__( 'Post a Comment', 'oscend' ), esc_html__( '1 comment', 'oscend' ), esc_html__( '% comments', 'oscend' ), "comments-link"); ?></div>
			<?php endif; ?>
		</div>
	</div>
	<?php if ( ( $oscend_post_format == 'link' || $oscend_post_format == 'quote' ) && class_exists( 'RW_Meta_Box' ) ) : ?>

	<?php else : ?>
	<div class="post-body">
		<h2  class="post-body-title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
		<div class="post-body-content post-body-excerpt"><?php echo do_shortcode( get_the_excerpt() ); ?></div>
		<div class="more-page">
			<?php
				$args = array(
				 'link_before'      => '<span>'
				,'link_after'       => '</span>' );

				wp_link_pages( $args );
			?>
		</div>
		<div class="row">
			<div class="col-md-12 clearfix">
				<a  href="<?php esc_url( the_permalink() ); ?>" class="btn btn-primary pull-left" title="<?php esc_attr( the_title() ); ?>"><?php echo esc_attr( $oscend_text_readmore ); ?></a>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div><!--blog-post-->
