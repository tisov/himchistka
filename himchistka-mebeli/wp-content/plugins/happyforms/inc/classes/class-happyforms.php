<?php
class HappyForms extends HappyForms_Core {
	public $default_notice;

	public function initialize_plugin() {
		parent::initialize_plugin();
		
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'happyforms_form_before', array( $this, 'add_preview_notices' ) );
		add_action( 'admin_notices', array( $this, 'add_classic_editor_notices' ) );
		add_action( 'admin_notices', array( $this, 'add_response_notices' ) );
	}

	public function get_upgrade_notice_args() {
		return array(
			'classes' => array(
				'happyforms-notice--custom happyforms-notice--upgrade'
			),
			'type' => 'custom',
			'title' => __( 'Oh-no! You\'re missing out on these HappyForms features…', 'happyforms' ),
			'dismissible' => true,
		);
	}

	public function get_upgrade_notice_message() {
		return sprintf( 
			'<ul>
			<li>' . __( 'File upload part', 'happyforms' ) . '</li>
			<li>' . __( 'Schedule form display', 'happyforms' ) . '</li>
			<li>' . __( 'Password protect forms', 'happyforms' ) . '</li>
			<li>' . __( 'Open form in a pop-up', 'happyforms' ) . '</li>
			<li>' . __( 'Limit responses', 'happyforms' ) . '</li>
			<li>' . __( 'Filter responses', 'happyforms' ) . '</li>
			<li>' . __( 'Shuffle form parts', 'happyforms' ) . '</li>
			</ul>
			<p><a href="%s" class="%s" target="%s">'. __( 'Discover HappyForms Upgrade', 'happyforms' ) . '</a></p>',
			'https://happyforms.me/upgrade',
			'button button-primary button-hero',
			'_blank'
		);
	}

	public function add_response_notices() {
		$admin_notices = happyforms_get_admin_notices();
		$message_id = get_the_ID();

		$args = array(
			'screen' => array( 'happyforms-message' )
		);

		$args = wp_parse_args( $args, $this->get_upgrade_notice_args() );

		$admin_notices->register(
			"happyforms_message_{$message_id}_upgrade",
			$this->get_upgrade_notice_message(),
			$args
		);
	}

	public function add_preview_notices( $form ) {
		if ( happyforms_is_preview() ) {
			$admin_notices = happyforms_get_admin_notices();
			$form_controller = happyforms_get_form_controller();

			$args = array(
				'screen' => array( 'happyforms-preview' )
			);

			$args = wp_parse_args( $args, $this->get_upgrade_notice_args() );

			$admin_notices->register(
				"happyforms_form_{$form['ID']}_upgrade",
				$this->get_upgrade_notice_message(),
				$args
			);
		}
	}

	public function add_classic_editor_notices() {
		$post_id = get_the_ID();
		$admin_notices = happyforms_get_admin_notices();

		$admin_notices->register(
			"happyforms_post_{$post_id}_upgrade",
			sprintf(
				__( 'Do you want access to HappyForms’ most powerful features? <a href="%s" target="%s">Discover HappyForms Upgrade</a>', 'happyforms' ),
				'https://happyforms.me/upgrade',
				'_blank'
			),
			array(
				'type' => 'warning',
				'dismissible' => true,
				'screen' => array( 'page', 'post' )
			)
		);
	}

	public function admin_menu() {
		parent::admin_menu();

		$form_controller = happyforms_get_form_controller();

		add_submenu_page(
			'happyforms',
			__( 'HappyForms Upgrade', 'happyforms' ),
			__( 'Upgrade', 'happyforms' ),
			$form_controller->capability,
			'https://happyforms.me/upgrade'
		);
	}

	public function admin_enqueue_scripts() {
		parent::admin_enqueue_scripts();

		wp_enqueue_style(
			'happyforms-free-admin',
			happyforms_get_plugin_url() . 'inc/assets/css/admin.css',
			array(), HAPPYFORMS_VERSION
		);

		wp_register_script(
			'happyforms-free-admin',
			happyforms_get_plugin_url() . 'inc/assets/js/admin/dashboard.js',
			array(), HAPPYFORMS_VERSION, true
		);

		wp_enqueue_script( 'happyforms-free-admin' );
	}
}