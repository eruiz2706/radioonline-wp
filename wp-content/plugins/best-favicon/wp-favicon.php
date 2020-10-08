<?php
/*
	Plugin Name: EZ Favicon
	Description: A very simple favicon plugin. You can upload any size image and the plugin will resize it, convert it to an .ico file, and add the necessary html code to the header.
	Author: Samantha Evans
        Author URI: -
	Version: 1.0 
*/  
function wpf_plugin_activate() {
	global $wpdb;
	$db_prefix = $wpdb->prefix; 

}

function myplugin_activate() {
	if($_GET['activate'] == true) 
		echo '<div id="message" class="updated"><p><strong>Click <a href="' . get_bloginfo('url') . '/wp-admin/options-general.php?page=WPFavicon">here</a> to configure your favicon.</strong></p></div>';
}

function wpf_check_user_permission() {
	if(current_user_can('manage_options') || current_user_can('edit_posts'))
		return true;
	else 
		return false;
}

function wpf_create_table($table_name, $sql) {
	global $wpdb;
        $db_prefix = $wpdb->prefix; 
	if($wpdb->get_var("show tables like '". $table_name . "'") != $table_name) {
		$wpdb->query($sql);
   }
}



function wpf_admin() {
	global $wpdb;
	$db_prefix = $wpdb->prefix; 
	if(!current_user_can('manage_options') || !current_user_can('edit_posts')) {
		echo '<div id="message" class="error">'. __("You don't have permissions to use this plugin","wpf") .' </div>';
	} else {
                include('wp_favicon_admin_page.php');        
	}
}

function wpf_admin_actions() {
	if(wpf_check_user_permission()) {
		add_options_page("WP-Favicon","WP-Favicon",1,"WPFavicon","wpf_admin");  
	}
}

function wpf_init() {

}

function wpf_admin_scripts() {
	if (isset($_GET['page']) && $_GET['page'] == 'WPFavicon')
	 {
		wp_enqueue_script('jquery');
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_register_script('my-upload', ONETAREK_WPMUT_PLUGIN_URL.'onetarek-wpmut-admin-script.js', array('jquery','media-upload','thickbox'));
		wp_enqueue_script('my-upload');
	 }
}

function wpf_admin_styles() {
	if (isset($_GET['page']) && $_GET['page'] == 'WPFavicon')
	{
		wp_enqueue_style('thickbox');
	}
}

function wpf_add_favicon() {
	if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod')) {
		if(get_option( 'wp_favicon_current_mobile', '' ) != '') {
			echo '<link rel="icon" type="image/ico" href="' . get_option( 'wp_favicon_current_mobile', '' ) . '"/>';		
			echo '<link rel="apple-touch-icon" href="' . get_option( 'wp_favicon_current_mobile', '' ) . '">';
		}
	} else {
		if(get_option( 'wp_favicon_current', '' ) != '') {
			echo '<link rel="icon" type="image/ico" href="' . get_option( 'wp_favicon_current', '' ) . '"/>';	
			echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_option( 'wp_favicon_current', '' ) . '"/>';	
		}
	}
}

function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
	$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomString;
}

add_action('init','wpf_init');
add_action('admin_menu','wpf_admin_actions');
add_action('admin_print_scripts', 'wpf_admin_scripts');
add_action('admin_print_styles', 'wpf_admin_styles');
add_action( 'wp_head', 'wpf_add_favicon' );
add_action( 'admin_head', 'wpf_add_favicon' );
add_action('admin_notices', 'myplugin_activate');
register_activation_hook(__FILE__, 'wpf_plugin_activate');

?>