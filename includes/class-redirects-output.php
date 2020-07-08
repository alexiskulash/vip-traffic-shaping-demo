<?php

class WPCOM_VIP_QM_Output_Html_Redirects extends QM_Output_Html {

	public function __construct( QM_Collector $collector ) {
		parent::__construct( $collector );

		add_filter( 'qm/output/menus', [ $this, 'admin_menu' ], 51 );
		add_filter( 'qm/output/menu_class', [ $this, 'admin_class' ] );
	}

	public function output() {
		$redirects = QM_Collectors::get_data( 'redirects' );

		$this->before_non_tabular_output();

		if ( ! $redirects['trace'] ) {
			echo $this->build_notice( 'No redirects occurred' ); // WPCS: XSS ok.
		} else {
			echo '<section>';
			echo '<h3>Redirect Backtrace</h3>';
			
			// Dumping backtrace here

			echo '</section>';
			echo '</div>';
		}

		$this->after_non_tabular_output();
	}
	
	public function admin_class( array $class ) {
		$class[] = 'qm-redirects';
		return $class;
	}

	public function admin_menu( array $menu ) {
		$menu[] = $this->menu(
			array(
				'id'    => 'qm-redirects',
				'href'  => '#qm-redirects',
				'title' => 'Redirects',
			)
		);

		return $menu;
	}
}

