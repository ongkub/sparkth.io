<?php
/*** The template for displaying all pages. ***/

get_header();

$oscend_custom = isset( $wp_query ) ? get_post_custom( $wp_query->get_queried_object_id() ) : '';
$oscend_layout = isset( $oscend_custom['pix_page_layout'] ) ? $oscend_custom['pix_page_layout'][0] : '2';
$oscend_sidebar = isset( $oscend_custom['pix_selected_sidebar'][0] ) ? $oscend_custom['pix_selected_sidebar'][0] : 'sidebar-1';

if ( ! is_active_sidebar($oscend_sidebar) ) $oscend_layout = '1';

?>

<!-- ========================== -->
<!-- BLOG - CONTENT -->
<!-- ========================== -->
<section class="page-section">
	<div class="container">
		<div class="row">

			<?php oscend_show_sidebar( 'left', $oscend_layout, $oscend_sidebar ); ?>

			<div class="<?php if ( $oscend_layout == 1 ) : ?>col-lg-12 col-md-12<?php else : ?>col-lg-9 col-md-8 left-column sidebar-type-<?php echo esc_attr($oscend_layout); ?><?php endif; ?> col-sm-12 col-xs-12">

				<?php

					// Start the Loop.
					while ( have_posts() ) : the_post();

						get_template_part( 'templates/post-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template(); }

					endwhile;
				?>

			</div>

			<?php oscend_show_sidebar( 'right', $oscend_layout, $oscend_sidebar ); ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>