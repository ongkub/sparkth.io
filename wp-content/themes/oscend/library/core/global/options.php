<?php

/** Oscend Options Page **/

$theme_name = esc_html__( 'Oscend', 'oscend' );
$theme_slug = 'oscend';
$shortname = 'pix';
$theme_version = '1.0';
$path = get_stylesheet_directory_uri();
$styles = array();
$background_options = array();
$skins = array();

if (is_dir(TEMPLATEPATH . "/css/")) {
	if ($open_dir = opendir(TEMPLATEPATH . "/css/")) {
		while (($style = readdir($open_dir)) !== false) {
			if (stristr($style, ".css") !== false) {
				$styles[] = $style;
			}
		}
	}
}


$html_desc = esc_html__( 'Enter HTML text', 'oscend' );
$html_desc_p = esc_html__( 'Enter HTML text NOTE: Text must be between "p" tags', 'oscend' );
$text_desc = esc_html__( 'Enter text', 'oscend' );
$long_text = wp_kses_post( __( '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et dignissim ipsum. Nam ac interdum sem. Pellentesque diam lacus, dictum in dapibus id, hendrerit eget felis. Nunc nec turpis libero</p>
<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas euismod condimentum mollis. In non congue orci. Nulla nunc velit, volutpat vestibulum congue vitae, tincidunt at sem. Pellentesque tincidunt molestie mi, eu aliquam quam fringilla nec. Sed suscipit adipiscing urna, et varius libero commodo eget.</p>', 'oscend' ) );

$upload_desc = esc_html__( 'Upload image for your theme, or specify an existing url', 'oscend' );

// Array added for 3D Rotator
$tween_types = array(
	array( "value"=>"linear", "text"=>esc_html__( "linear", "oscend" ) ),
	array( "value"=>"easeInSine", "text"=>esc_html__( "easeInSine", "oscend" ) ),
	array( "value"=>"easeInSine", "text"=>esc_html__( "easeInSine", "oscend" ) ),
	array( "value"=>"easeInOutSine", "text"=>esc_html__( "easeInOutSine", "oscend" ) ),
	array( "value"=>"easeInCubic", "text"=>esc_html__( "easeInCubic", "oscend" ) ),
	array( "value"=>"easeOutCubic", "text"=>esc_html__( "easeOutCubic", "oscend" ) ),
	array( "value"=>"easeInOutCubic", "text"=>esc_html__( "easeInOutCubic", "oscend" ) ),
	array( "value"=>"easeOutInCubic", "text"=>esc_html__( "easeOutInCubic", "oscend" ) ),
	array( "value"=>"easeInQuint", "text"=>esc_html__( "easeInQuint", "oscend" ) ),
	array( "value"=>"easeOutQuint", "text"=>esc_html__( "easeOutQuint", "oscend" ) ),
	array( "value"=>"easeInOutQuint", "text"=>esc_html__( "easeInOutQuint", "oscend" ) ),
	array( "value"=>"easeOutInQuint", "text"=>esc_html__( "easeOutInQuint", "oscend" ) ),
	array( "value"=>"easeInCirc", "text"=>esc_html__( "easeInCirc", "oscend" ) ),
	array( "value"=>"easeOutCirc", "text"=>esc_html__( "easeOutCirc", "oscend" ) ),
	array( "value"=>"easeInOutCirc", "text"=>esc_html__( "easeInOutCirc", "oscend" ) ),
	array( "value"=>"easeOutInCirc", "text"=>esc_html__( "easeOutInCirc", "oscend" ) ),
	array( "value"=>"easeInBack", "text"=>esc_html__( "easeInBack", "oscend" ) ),
	array( "value"=>"easeOutBack", "text"=>esc_html__( "easeOutBack", "oscend" ) ),
	array( "value"=>"easeInOutBack", "text"=>esc_html__( "easeInOutBack", "oscend" ) ),
	array( "value"=>"easeOutInBack", "text"=>esc_html__( "easeOutInBack", "oscend" ) ),
	array( "value"=>"easeInQuad", "text"=>esc_html__( "easeInQuad", "oscend" ) ),
	array( "value"=>"easeOutQuad", "text"=>esc_html__( "easeOutQuad", "oscend" ) ),
	array( "value"=>"easeInOutQuad", "text"=>esc_html__( "easeInOutQuad", "oscend" ) ),
	array( "value"=>"easeOutInQuad", "text"=>esc_html__( "easeOutInQuad", "oscend" ) ),
	array( "value"=>"easeInQuart", "text"=>esc_html__( "easeInQuart", "oscend" ) ),
	array( "value"=>"easeOutQuart", "text"=>esc_html__( "easeOutQuart", "oscend" ) ),
	array( "value"=>"easeInOutQuart", "text"=>esc_html__( "easeInOutQuart", "oscend" ) ),
	array( "value"=>"easeOutInQuart", "text"=>esc_html__( "easeOutInQuart", "oscend" ) ),
	array( "value"=>"easeInExpo", "text"=>esc_html__( "easeInExpo", "oscend" ) ),
	array( "value"=>"easeOutExpo", "text"=>esc_html__( "easeOutExpo", "oscend" ) ),
	array( "value"=>"easeInOutExpo", "text"=>esc_html__( "easeInOutExpo", "oscend" ) ),
	array( "value"=>"easeOutInExpo", "text"=>esc_html__( "easeOutInExpo", "oscend" ) ),
	array( "value"=>"easeInElastic", "text"=>esc_html__( "easeInElastic", "oscend" ) ),
	array( "value"=>"easeOutElastic", "text"=>esc_html__( "easeOutElastic", "oscend" ) ),
	array( "value"=>"easeInOutElastic", "text"=>esc_html__( "easeInOutElastic", "oscend" ) ),
	array( "value"=>"easeOutInElastic", "text"=>esc_html__( "easeOutInElastic", "oscend" ) ),
	array( "value"=>"easeInBounce", "text"=>esc_html__( "easeInBounce", "oscend" ) ),
	array( "value"=>"easeOutBounce", "text"=>esc_html__( "easeOutBounce", "oscend" ) ),
	array( "value"=>"easeInOutBounce", "text"=>esc_html__( "easeInOutBounce", "oscend" ) ),
	array( "value"=>"easeOutInBounce", "text"=>esc_html__( "easeOutInBounce", "oscend" ) )
);
