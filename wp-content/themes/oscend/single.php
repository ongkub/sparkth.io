<?php
/**
 * The Template for displaying all single posts
 */

get_header();

$oscend_custom = isset( $wp_query ) ? get_post_custom( $wp_query->get_queried_object_id() ) : '';
$oscend_layout = isset( $oscend_custom['pix_page_layout'] ) ? $oscend_custom['pix_page_layout'][0] : '2';
$oscend_sidebar = isset( $oscend_custom['pix_selected_sidebar'][0] ) ? $oscend_custom['pix_selected_sidebar'][0] : 'sidebar-1';

if ( ! is_active_sidebar($oscend_sidebar) ) $oscend_layout = '1';

?>

<!-- =========================
	BLOG ITEMS
============================== -->
<section class="blog-content-section">
	<div class="container">
		<div class="row">

			<?php oscend_show_sidebar( 'left', $oscend_layout, $oscend_sidebar ); ?>

			<!-- === BLOG ITEMS === -->

			<div class="<?php if ( $oscend_layout == 1 ) : ?>col-lg-12 col-md-12<?php else : ?>col-lg-9 col-md-8<?php endif; ?> col-sm-12 col-xs-12 left-column sidebar-type-<?php echo esc_attr($oscend_layout); ?>">

				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						get_template_part( 'templates/post-parts/content', 'single' );

					endwhile;


				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

				?>

			</div>

			<?php oscend_show_sidebar( 'right', $oscend_layout, $oscend_sidebar ); ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>