<?php
/**
* HealCode MINDBODY Widget Plugin for WordPress
*
*/

	add_action('admin_menu', 'hc_hmw_menu');


function hc_hmw_menu(){
	
    /* Adding Main Menu */
	add_menu_page('healcode-mb-widget', 'HC Widgets', 'manage_options', 'insert-html-short-manage','hc_hmw_snippets',plugins_url('healcode-mindbody-widget/images/hclogo.png'));

    /* Adding submenus */
    add_submenu_page('insert-html-short-manage', 'Widget Shortcodes', 'Widget Shortcodes', 'manage_options', 'insert-html-short-manage','hc_hmw_snippets');
	add_submenu_page('insert-html-short-manage', 'Widget Shortcodes - Manage Settings', 'Settings', 'manage_options', 'insert-html-short-settings' ,'hc_hmw_settings');	
	add_submenu_page('insert-html-short-manage', 'Widget Shortcodes - About', 'About', 'manage_options', 'insert-html-short-about' ,'hc_hmw_about');
	
}

/* Additional pages */
function hc_hmw_snippets(){
	$formflag = 0;
	if(isset($_GET['action']) && $_GET['action']=='snippet-delete' )
	{
		include(dirname( __FILE__ ) . '/snippet-delete.php');
		$formflag=1;
	}
	if(isset($_GET['action']) && $_GET['action']=='snippet-edit' )
	{
		require( dirname( __FILE__ ) . '/header.php' );
		include(dirname( __FILE__ ) . '/snippet-edit.php');
		require( dirname( __FILE__ ) . '/footer.php' );
		$formflag=1;
	}
	if(isset($_GET['action']) && $_GET['action']=='snippet-add' )
	{
		require( dirname( __FILE__ ) . '/header.php' );
		require( dirname( __FILE__ ) . '/snippet-add.php' );
		require( dirname( __FILE__ ) . '/footer.php' );
		$formflag=1;
	}
	if(isset($_GET['action']) && $_GET['action']=='snippet-status' )
	{
		require( dirname( __FILE__ ) . '/snippet-status.php' );
		$formflag=1;
	}
	if($formflag == 0){
		require( dirname( __FILE__ ) . '/header.php' );
		require( dirname( __FILE__ ) . '/snippets.php' );
		require( dirname( __FILE__ ) . '/footer.php' );
	}
}

/* Stacking */
function hc_hmw_settings()
{
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/settings.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
	
}

function hc_hmw_about(){
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/about.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}

/* Adding styling */
function hc_hmw_add_style_script(){

	wp_enqueue_script('jquery');
	
	wp_register_script( 'hc_notice_script', plugins_url('healcode-mindbody-widget/js/notice.js') );
	wp_enqueue_script( 'hc_notice_script' );
	
	
	// Register stylesheets
	wp_register_style('hc_hmw_style', plugins_url('healcode-mindbody-widget/css/hc_hmw_styles.css'));
	wp_enqueue_style('hc_hmw_style');
}
add_action('admin_enqueue_scripts', 'hc_hmw_add_style_script');



?>