<?php
/**
* HealCode MINDBODY Widget Plugin for WordPress
* Adding a shortcode dropdown to the TinyMCE editor
*/

if(!class_exists('HC_Insert_Html_TinyMCESelector')):

class HC_Insert_Html_TinyMCESelector{
	var $buttonName = 'hc_hmw_snippet_selector';
	function addSelector(){
		// Don't bother doing this stuff if the current user lacks permissions
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;
	 
	   // Add only in Rich Editor mode
	    if ( get_user_option('rich_editing') == 'true') {
	      add_filter('mce_external_plugins', array($this, 'registerTmcePlugin'));
	      //you can use the filters mce_buttons_2, mce_buttons_3 and mce_buttons_4 
	      //to add your button to other toolbars of your tinymce
	      add_filter('mce_buttons', array($this, 'registerButton'));
	    }
	}
	
	function registerButton($buttons){
		array_push($buttons, "separator", $this->buttonName);
		return $buttons;
	}
	
	function registerTmcePlugin($plugin_array){
		$plugin_array[$this->buttonName] =get_site_url() . '/index.php?wp_hmw=editor_plugin_js';
		if ( get_user_option('rich_editing') == 'true') 
		 	//var_dump($plugin_array);
		return $plugin_array;
	}
}

endif;

if(!isset($shortcodesHCEH)){
	$shortcodesHCEH = new HC_Insert_Html_TinyMCESelector();
	add_action('admin_head', array($shortcodesHCEH, 'addSelector'));
}

?>