<?php

class QM_Output_VIPRedirects extends QM_Output_Html {

	protected $collector;

	public $id = 'vip-redirects';

	public function __construct( QM_Collector $collector ) {
		parent::__construct( $collector );
		$this->collectors = [
			QM_Collectors::get( 'vip-redirects' )
		];

		add_filter( 'qm/output/menus', [ $this, 'admin_menu' ], 51 );
		add_filter( 'qm/output/menu_class', [ $this, 'admin_class' ] );
	}

	public function name() {
		return 'VIP Redirects';
	}

	public function output() {	
		$data = $this->collector->get_data();

		$this->before_non_tabular_output();

		if ( empty( $data['trace'] ) ) {
			echo $this->build_notice( 'No redirects occurred' ); // WPCS: XSS ok.
		} else {
			echo '<section>';
			echo '<h3>Redirect Backtrace</h3>';
			
			// TODO: Dump & style backtrace here

			echo '</section>';
			echo '</div>';
		}

		$this->after_non_tabular_output();
	}
	
	public function admin_class( array $class ) {
		$class[] = 'qm-vip-redirects';
		return $class;
	}

	public function admin_menu( array $menu ) {
		$menu[] = $this->menu(
			array(
				'id'    => 'qm-redirects',
				'href'  => '#qm-vip-redirects',
				'title' => 'Redirects',
			)
		);

		return $menu;
	}
}

