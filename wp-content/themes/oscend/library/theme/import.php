<?php

function oscend_import_files() {
    return array(
		array(
            'import_file_name'           => esc_html__( 'Oscend Theme', 'oscend' ),
            'import_file_url'            => esc_url('http://assets.templines.com/plugins/theme/oscend/zy3jq3g2rj8aztx6b2uffm387nmakkhh724cmf7rq6t6xv8k8zf2bjgpmgaxqxumfqnqvt6mq8wed9jtnjt7vfwqd4tqshw5v4c/oscend.xml'),
            'import_widget_file_url'     => '',
            'import_customizer_file_url' => '',
            'import_preview_image_url'   => '',
            'import_notice'              => '',
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'oscend_import_files' );


function oscend_after_import( $selected_import ) {

    $menu_arr = array();
    $main_menu = get_term_by('name', 'main', 'nav_menu');
    if(is_object($main_menu))
        $menu_arr['primary_menu'] = $main_menu->term_id;
    set_theme_mod( 'nav_menu_locations', $menu_arr );

    $slider_array = array(
        get_template_directory()."/library/revslider/home01.zip",
    );

    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
    set_theme_mod( 'oscend_footer_block_top', '428' );
    set_theme_mod( 'oscend_footer_block', '422' );

    $absolute_path = __FILE__;
    $path_to_file = explode( 'wp-content', $absolute_path );
    $path_to_wp = $path_to_file[0];

    require_once( $path_to_wp.'/wp-load.php' );
    require_once( $path_to_wp.'/wp-includes/functions.php');

    $slider = new RevSlider();

    foreach($slider_array as $filepath){
     $slider->importSliderFromPost(true,true,$filepath);
    }

}
add_action( 'pt-ocdi/after_import', 'oscend_after_import' );


?>