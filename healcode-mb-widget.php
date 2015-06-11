<?php 
/*
Plugin Name: HealCode MINDBODY Widget
Plugin URI: https://wordpress.org/plugins/healcode-mb-widget/
Description: Add HealCode Widgets to your WordPress website. This plugin lets you generate a shortcode for a widget. The shortcodes
can be used in your pages, posts and widgets.     
Version: 1.0.5
Author: HealCode
Author URI: http://www.healcode.com/
Text Domain: healcode-mb-widget
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// if ( !function_exists( 'add_action' ) ) {
// 	echo "Hi there!  I'm just a plugin, not much I can do when called directly.";
// 	exit;
// }

ob_start();

// error_reporting(E_ALL);

define('HC_INSERT_HTML_PLUGIN_FILE',__FILE__);

require( dirname( __FILE__ ) . '/hc-functions.php' );

require( dirname( __FILE__ ) . '/add_shortcode_tynimce.php' );

require( dirname( __FILE__ ) . '/install.php' );

require( dirname( __FILE__ ) . '/menu.php' );

require( dirname( __FILE__ ) . '/shortcode-handler.php' );

require( dirname( __FILE__ ) . '/ajax-handler.php' );

require( dirname( __FILE__ ) . '/uninstall.php' );

require( dirname( __FILE__ ) . '/widget.php' );

require( dirname( __FILE__ ) . '/direct_call.php' );



if(get_option('hc_credit_link')=="hmw"){

	add_action('wp_footer', 'hc_hmw_credit');

}

?>
