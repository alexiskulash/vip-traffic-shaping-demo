<?php

/*
 * Plugin Name: VIP Traffic Shaping Demo
 * Description: This plugin demonstrates various mechanisms for configuring traffic on the VIP Go platform.
 * Version: 1.0
 * Author: Alexis Kulash, Matt Perry, Automattic
 */

if ( class_exists( 'VIP_Traffic_Shaping_Demo' ) ) {
	return;
}

class VIP_Traffic_Shaping_Demo {

	/**
	 * Initiate an instance of this class if one doesn't exist already.
	 *
	 * @return VIP_Traffic_Shaping_Demo instance
	 */
	static public function init() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new VIP_Traffic_Shaping_Demo;
		}

		return $instance;
	}

	/**
	 * Class constructor for hooking actions/filters.
	 *
	 * @return void
	 */
	public function __construct() {
		// Do stuff here
	}
}

add_action( 'init', [ 'VIP_Traffic_Shaping_Demo', 'init' ] );
