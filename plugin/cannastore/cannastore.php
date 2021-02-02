<?php

/**
 * @link              https://listingslab.com/work/wordpress/plugins/cannastore
 * @package           cannastore
 *
 * @wordpress-plugin
 * Version:           2.5.7
 * Plugin Name:       Cannastore
 * Description:       Widget for WordPress by Listingslab
 * Plugin URI:        https://listingslab.com/work/wordpress/plugins/cannastore
 * Author:            listingslab
 * Author URI:        https://listingslab.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cannastore
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) { die; }
define( 'cannastore_VERSION', '2.5.7' );

add_action('admin_menu', 'cannastore_plugin_setup_menu');
function cannastore_plugin_setup_menu(){
    add_menu_page(
    	'Cannastore App', 
    	'Cannastore', 
    	'manage_options', 
    	'cannastore', 
    	'cannastore_admin',
        plugin_dir_url(__FILE__) . 'public/svg/icons/wp-admin-menu.svg',
        10
    );
}

require_once plugin_dir_path( __FILE__ ) . 'admin.php';

function activate_cannastore() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cannastore-activator.php';
	cannastore_Activator::activate();
}

function deactivate_cannastore() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cannastore-deactivator.php';
	cannastore_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cannastore' );
register_deactivation_hook( __FILE__, 'deactivate_cannastore' );

require plugin_dir_path( __FILE__ ) . 'includes/class-cannastore.php';

function run_cannastore() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-cannastore-widget.php';
    $widget = new cannastore_Widget();
	$plugin = new cannastore();
	$plugin->run();
}

run_cannastore();

