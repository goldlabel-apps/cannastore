<?php

/**
 * @link              https://listingslab.com/work/wordpress/plugins/listingslab/
 * @package           listingslab
 *
 * @wordpress-plugin
 * Version:           2.5.7
 * Plugin Name:       Cannastore
 * Description:       Widget for WordPress by Listingslab
 * Plugin URI:        https://listingslab.com/work/wordpress/plugins/push2talk-plugin/
 * Author:            listingslab
 * Author URI:        https://listingslab.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       listingslab
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) { die; }
define( 'listingslab_VERSION', '2.5.7' );

add_action('admin_menu', 'listingslab_plugin_setup_menu');
function listingslab_plugin_setup_menu(){
    add_menu_page( 
    	'Listingslab Page', 
    	'Push2Talk', 
    	'manage_options', 
    	'listingslab', 
    	'listingslab_admin',
        plugin_dir_url(__FILE__) . 'public/svg/icons/wp-admin-menu.svg',
        10
    );
}

require_once plugin_dir_path( __FILE__ ) . 'admin.php';

function activate_listingslab() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-listingslab-activator.php';
	listingslab_Activator::activate();
}

function deactivate_listingslab() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-listingslab-deactivator.php';
	listingslab_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_listingslab' );
register_deactivation_hook( __FILE__, 'deactivate_listingslab' );

require plugin_dir_path( __FILE__ ) . 'includes/class-listingslab.php';

function run_listingslab() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-listingslab-widget.php';
    $widget = new listingslab_Widget();
	$plugin = new listingslab();
	$plugin->run();
}

run_listingslab();

