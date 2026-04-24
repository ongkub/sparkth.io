<?php
/**
 * The template for displaying archive pages
 */

get_header();

$oscend_layout = oscend_get_option('blog_settings_sidebar_type', '2');
$oscend_sidebar = oscend_get_option('blog_settings_sidebar_content', 'sidebar-1');


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