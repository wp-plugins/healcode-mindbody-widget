<?php

if(!function_exists('hc_hmw_plugin_get_version'))
{
	function hc_hmw_plugin_get_version() 
	{
		if ( ! function_exists( 'get_plugins' ) )
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		$plugin_folder = get_plugins( '/' . plugin_basename( dirname( HC_INSERT_HTML_PLUGIN_FILE ) ) );
		// 		print_r($plugin_folder);
		return $plugin_folder['healcode-mb-widget.php']['Version'];
	}
}

if(!function_exists('hc_trim_deep'))
{

	function hc_trim_deep($value) {
		if ( is_array($value) ) {
			$value = array_map('hc_trim_deep', $value);
		} elseif ( is_object($value) ) {
			$vars = get_object_vars( $value );
			foreach ($vars as $key=>$data) {
				$value->{$key} = hc_trim_deep( $data );
			}
		} else {
			$value = trim($value);
		}

		return $value;
	}

}

/* Remove in future

if(!function_exists('xyz_ihs_links')){
function xyz_ihs_links($links, $file) {
	$base = plugin_basename(XYZ_INSERT_HTML_PLUGIN_FILE);
	if ($file == $base) {
	}
	return $links;
}
}
add_filter( 'plugin_row_meta','xyz_ihs_links',10,2);

*/

?>