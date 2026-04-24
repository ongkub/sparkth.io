<?php

// get meta options/values
$oscend_quote_content = rwmb_meta('post_quote_content');
$oscend_quote_source = rwmb_meta('post_quote_source');

?>
<div class="post-quotes">
	<blockquote class="blockquote">
		<?php echo wp_kses_post($oscend_quote_content); ?>
		<div class="author"><?php echo wp_kses_post($oscend_quote_source); ?></div>
	</blockquote>
</div>