<?php
function hc_hmw_plugin_query_vars($vars) {
	$vars[] = 'wp_hmw';
	return $vars;
}
add_filter('query_vars', 'hc_hmw_plugin_query_vars');


function hc_hmw_plugin_parse_request($wp) {
	/*confirmation*/
	if (array_key_exists('wp_hmw', $wp->query_vars) && $wp->query_vars['wp_hmw'] == 'editor_plugin_js') {
		require( dirname( __FILE__ ) . '/editor_plugin.js.php' );
		die;
	}
	
}
add_action('parse_request', 'hc_hmw_plugin_parse_request');
