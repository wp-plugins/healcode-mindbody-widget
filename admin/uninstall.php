<?php 

function hc_hmw_network_uninstall($networkwide) {
	global $wpdb;

	if (function_exists('is_multisite') && is_multisite()) {
		// check if it is a network activation - if so, run the activation function for each blog id
		if ($networkwide) {
			$old_blog = $wpdb->blogid;
			// Get all blog ids
			$blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
			foreach ($blogids as $blog_id) {
				switch_to_blog($blog_id);
				hc_hmw_uninstall();
			}
			switch_to_blog($old_blog);
			return;
		}
	}
	hc_hmw_uninstall();
}

function hc_hmw_uninstall(){

global $wpdb;

delete_option("hc_hmw_limit");

/* table delete*/
$wpdb->query("DROP TABLE ".$wpdb->prefix."hc_hmw_short_code");


}

register_uninstall_hook( HC_INSERT_HTML_PLUGIN_FILE, 'hc_hmw_network_uninstall' );
?>