<?php
/* Woocommerce template. */
$oscend_id = oscend_woo_get_page_id();
$oscend_isProduct = false;

if ( is_single() && get_post_type() == 'product' ) {
	$oscend_isProduct = true;
}

$oscend_custom = $oscend_id > 0 ? get_post_custom($oscend_id) : array();
$oscend_layout = isset ($oscend_custom['pix_page_layout']) ? reset($oscend_custom['pix_page_layout']) : '2';
$oscend_sidebar = isset ($oscend_custom['pix_selected_sidebar'][0]) ? reset($oscend_custom['pix_selected_sidebar']) : 'sidebar-1';

if ( $oscend_isProduct === true ) {
	$oscend_useSettingsGlobal = oscend_get_option( 'shop_settings_global_product', 'on' );
	if ( $oscend_useSettingsGlobal == 'on' ) {
		$oscend_layout = oscend_get_option( 'shop_settings_sidebar_type', '2');
		$oscend_sidebar = oscend_get_option( 'shop_settings_sidebar_content', 'product-sidebar-1' );
	}
}

if ( ! is_active_sidebar($oscend_sidebar) ) $oscend_layout = '1';

get_header(); ?>


<section class="page-section">
	<div class="container">
		<div class="row">
			<main class="main-content">

				<?php oscend_show_sidebar( 'left', $oscend_layout, $oscend_sidebar ); ?>

				<div class="rtd <?php if ( $oscend_layout == 1 ) : ?>col-lg-12 col-md-12<?php else : ?>col-lg-9 col-md-8<?php endif; ?> col-sm-12 col-xs-12 left-column sidebar-type-<?php echo esc_attr($oscend_layout); ?>">

					<?php  woocommerce_content(); ?>

				</div>

				<?php oscend_show_sidebar( 'right', $oscend_layout, $oscend_sidebar ); ?>

			</main>

		</div>
	</div>
</section>

<?php get_footer();?>
