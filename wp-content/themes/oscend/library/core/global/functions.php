<?php

function oscend_get_option($slug,$_default = false) {

	$theme_slug = get_option( 'stylesheet' );

	if ($stgs = oscend_getCustomizeSettings()){
		$slug_option_name = 'oscend_'.$slug;

		if (isset($stgs->$slug_option_name))
			return esc_attr($stgs->$slug_option_name);
	}

	$slug = 'oscend_' . $slug;

	$pix_options = get_option('theme_mods_'.$theme_slug);

	if (isset($pix_options[$slug])){
		return esc_attr($pix_options[$slug],'default');
	}else{
		if ($_default)
			return esc_attr($_default,'default');
		else
			return false;
	}

}

function oscend_getCustomizeSettings(){
	if (isset($_POST['wp_customize']) && $_POST['wp_customize'] == 'on'){
		$settings = json_decode(stripslashes($_POST['customized']));
		return $settings;
	}else{
		return false;
	}

}




function oscend_pix_log($data, $name = 'default'){
	global $wp_filesystem;

	if (oscendDeveloperLog == false)
		return;

	$logDir = get_template_directory() . '/library/core/log/';
	$logFile = $logDir . $name . '.log';
	$_data = time() . ' - ' . $data;

	if( empty( $wp_filesystem ) ) {
		require_once( ABSPATH .'/wp-admin/includes/file.php' );
		WP_Filesystem();
	}

	if( $wp_filesystem ) {
		$wp_filesystem->put_contents(
			$logFile,
			$_data,
			FS_CHMOD_FILE // predefined mode settings for WP files
		);
	}

}




    function pz_child_yith_pa_comp_fix() {
        if (function_exists('WC')){
            wp_register_script( 'select2', WC()->plugin_url() . '/assets/js/select2/select2.full.min.js', array( 'jquery' ) );
            wp_enqueue_script( 'select2' );

            wp_register_script( 'selectWoo', WC()->plugin_url() . '/assets/js/selectWoo/selectWoo.full.min.js', array( 'jquery' ) );
            wp_enqueue_script( 'selectWoo' );

            wp_register_script( 'wc-enhanced-select', WC()->plugin_url() . '/assets/js/admin/wc-enhanced-select.min.js', array( 'jquery', 'selectWoo' ) );
            wp_enqueue_script( 'wc-enhanced-select' );
        }
    }

    add_action( 'admin_enqueue_scripts', 'pz_child_yith_pa_comp_fix' );

