<?php
/**
 * This file manages the core functionality of the plugin
 */

class Redirects {

	/*
	 * Adding the necessary hooks/filters here
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'load_dependencies' ] );
	}

	public function load_dependencies() {
		
		if ( ! class_exists( 'QM_Collectors' ) ) {
			return;
		}

		//require_once VIP_TS_DEMO_PATH . '/includes/class-redirects-collector.php';
		//require_once VIP_TS_DEMO_PATH . '/includes/class-redirects-dispatcher.php';
		//require_once VIP_TS_DEMO_PATH . '/includes/class-redirects-output.php';
	
		add_filter(
			'qm/outputter/html',
			function( array $output, QM_Collectors $collectors ) {
				include VIP_TS_DEMO_PATH . '/includes/class-redirects-output.php'; 
				if ( $collector = QM_Collectors::get( 'redirects' ) ) {
					$output['redirects'] = new WPCOM_VIP_QM_Output_Html_Redirects( $collector );
				}
				return $output;
			},
			101,
			2
		);	
	}
}
