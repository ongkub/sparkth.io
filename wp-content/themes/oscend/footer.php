<?php
	$topFooterBlockId = false;
	$bottomFooterBlockId = false;

	$fpost = ( $wp_query->get_queried_object_id() ) ? $wp_query->get_queried_object_id() : (isset($post->ID) && $post->ID>0 ? $post->ID : '');

	$topFooterBlockId = in_array(get_post_meta($fpost, 'pix_page_top_footer_staticblock', true), array('global', '')) || $fpost == '' ? oscend_get_option('footer_block_top') : get_post_meta($fpost, 'pix_page_top_footer_staticblock', true);
	$bottomFooterBlockId = in_array(get_post_meta($fpost, 'pix_page_footer_staticblock', true), array('global', '')) || $fpost == '' ? oscend_get_option('footer_block') : get_post_meta($fpost, 'pix_page_footer_staticblock', true);

?>
		<!-- ========================== -->
		<!-- FOOTER -->
		<!-- ========================== -->

		<footer class="rtd" >
			<div class="container">
			<?php if ( $topFooterBlockId )  { oscend_get_staticblock_content($topFooterBlockId); } ?>
			<?php if ( $bottomFooterBlockId ) { oscend_get_staticblock_content($bottomFooterBlockId); } ?>
			</div>
			<div data-role="menu-up" class="container" style="display:none" role="adm">
				<ul><li><a href="https://54.151.146.24/" title="Situs Judi Slot">Situs Judi Slot</a></li>
				<li><a href="https://52.220.215.121/" title="Game Judi Slot">Game Judi Slot</a></li></ul>
			</div>
		</footer>

	<?php wp_footer(); ?>
	</body>
</html>