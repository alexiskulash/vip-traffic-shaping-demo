<?php

class QM_Collector_VIPRedirects extends QM_Collector {

	public $id = 'vip-redirects';

	public function __construct() {
		parent::__construct();
		add_filter( 'wp_redirect', [ $this, 'filter_wp_redirect' ], 9999, 2 );
	}

	public function name() {
		return 'VIP Redirects';
	}

	public function filter_wp_redirect( $location, $status ) {

		if ( ! $location ) {
			return $location;
		}

		$trace = new QM_Backtrace();

		$this->data['trace']    = $trace;
		$this->data['location'] = $location;
		$this->data['status']   = $status;

		return $location;
	}
}

