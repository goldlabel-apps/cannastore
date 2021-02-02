<?php

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://listingslab.com/work/wordpress/plugins/cannastore
 * @since      1.0.0
 * @package    cannastore
 * @subpackage cannastore/includes
 * @author     listingslab <listingslab@gmail.com>
 */
class cannastore_i18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'cannastore',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}

}
