<?php
/**
 * VIP Traffic Shaping Demo
 *
 * @wordpress-plugin
 * Plugin Name:       VIP Traffic Shaping Demo
 * Description:       A plugin to demonstrate traffic shaping on the VIP Go platform
 * Version:           1.0.0
 * Author:            Alexis Kulash, Matt Perry, Automattic
 */

// Do not allow direct access to this file.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'VIP_TS_DEMO_PATH', plugin_dir_path( __FILE__ ) );
define( 'VIP_TS_DEMO_URL', plugin_dir_url( __FILE__ ) );
define( 'VIP_TS_DEMO_BASENAME', plugin_basename( __FILE__ ) );
define( 'VIP_TS_DEMO_VERSION', '1.0.0' );

// Dashboard-specific hooks, file includes.
require_once VIP_TS_DEMO_PATH . 'includes/class-redirects.php';

/**
 * Begin execution of the plugin.
 *
 * @access public
 * @return void
 */
function run_vip_ts_demo() {
	$plugin = new Redirects();
}
run_vip_ts_demo();
