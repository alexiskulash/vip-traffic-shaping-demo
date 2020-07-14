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

add_action( 'plugins_loaded', 'vip_ts_demo_require', 5 ); 
function vip_ts_demo_require() {

	if ( class_exists( 'QM_Collectors' ) ) {
		include VIP_TS_DEMO_PATH . '/classes/QM_Collector_VIPRedirects.class.php';
		QM_Collectors::add( new QM_Collector_VIPRedirects() );
	}

	add_filter(
		'qm/outputter/html',
		function( array $output, QM_Collectors $collectors ) {
			include VIP_TS_DEMO_PATH . '/classes/QM_Output_VIPRedirects.class.php';
			$collector = QM_Collectors::get( 'vip-redirects' );
			if ( $collector ) {
				$output['vip-redirects'] = new QM_Output_VIPRedirects( $collector );
			}
			return $output;
		},
		50,
		2
	);
}

