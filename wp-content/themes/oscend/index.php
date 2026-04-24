<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 */

get_header();

$oscend_postpage_id = get_option( 'page_for_posts' );
$oscend_frontpage_id = get_option( 'page_on_front' );
$oscend_page_id = isset($wp_query) ? $wp_query->get_queried_object_id() : '';

if ( $oscend_page_id == $oscend_postpage_id && $oscend_postpage_id != $oscend_frontpage_id ) :
	$oscend_custom = isset( $wp_query ) ? get_post_custom( $wp_query->get_queried_object_id() ) : '';
	$oscend_layout = isset( $oscend_custom['pix_page_layout'] ) ? $oscend_custom['pix_page_layout'][0] : '2';
	$oscend_sidebar = isset( $oscend_custom['pix_selected_sidebar'][0] ) ? $oscend_custom['pix_selected_sidebar'][0] : 'sidebar-1';
else :
	$oscend_layout = oscend_get_option('blog_settings_sidebar_type', '2');
	$oscend_sidebar = oscend_get_option('blog_settings_sidebar_content', 'sidebar-1');
endif;

if ( ! is_active_sidebar($oscend_sidebar) ) $oscend_layout = '1';

?>

<!-- ========================== -->
<!-- BLOG - CONTENT -->
<!-- ========================== -->
<section class="blog-content-section">
	<div class="container">
		<div class="row">

			<?php oscend_show_sidebar( 'left', $oscend_layout, $oscend_sidebar ); ?>

			<div class="<?php if ( $oscend_layout == 1 ) : ?>col-lg-12 col-md-12<?php else : ?>col-lg-9 col-md-8<?php endif; ?> col-sm-12 col-xs-12 left-column sidebar-type-<?php echo esc_attr($oscend_layout); ?>">

				<?php
					if ( have_posts() ) :
						// Start the Loop.
						while ( have_posts() ) : the_post();

							get_template_part( 'templates/post-parts/content' );

						endwhile;

					else:
						// If no content, include the "No posts found" template.
						get_template_part( 'templates/post-parts/content', 'none' );

					endif;

				?>

				<?php oscend_num_pagination(); ?>

			</div>

			<?php oscend_show_sidebar( 'right', $oscend_layout, $oscend_sidebar ); ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>