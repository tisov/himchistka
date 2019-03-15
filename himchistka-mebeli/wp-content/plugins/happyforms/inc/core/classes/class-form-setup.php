<?php

class HappyForms_Form_Setup {

	/**
	 * The singleton instance.
	 *
	 * @var HappyForms_Form_Setup
	 */
	private static $instance;

	/**
	 * The singleton constructor.
	 *
	 * @return HappyForms_Form_Setup
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		self::$instance->hook();

		return self::$instance;
	}

	/**
	 * Hook into WordPress.
	 *
	 * @return void
	 */
	public function hook() {
		// Common form extensions
		add_filter( 'happyforms_meta_fields', array( $this, 'meta_fields' ) );
		add_filter( 'happyforms_frontend_dependencies', array( $this, 'script_dependencies' ), 10, 2 );
		add_filter( 'happyforms_form_has_captcha', array( $this, 'has_captcha' ), 10, 2 );
		add_filter( 'happyforms_get_steps', array( $this, 'steps_add_preview' ), 10, 2 );
		add_action( 'happyforms_response_created', array( $this, 'increment_unique_id' ), 10, 2 );

		// Customizer form display
		add_filter( 'happyforms_part_class', array( $this, 'part_class_customizer' ) );
		add_filter( 'happyforms_the_form_title', array( $this, 'form_title_customizer' ) );

		// Reviewable form display
		add_filter( 'happyforms_get_template_path', array( $this, 'submit_preview_template' ), 10, 2 );
		add_filter( 'happyforms_get_template_path', array( $this, 'confirm_preview_partial' ), 20, 2 );
		add_filter( 'happyforms_form_class', array( $this, 'form_html_class_preview' ), 10, 2 );
		add_filter( 'happyforms_form_id', array( $this, 'form_html_id' ), 10, 2 );
		add_filter( 'happyforms_form_class', array( $this, 'form_html_class' ), 10, 2 );
		add_action( 'happyforms_after_title', array( $this, 'form_open_preview' ) );
		add_filter( 'happyforms_part_attributes', array( $this, 'part_attributes_preview' ), 10, 4 );
		add_action( 'happyforms_part_before', array( $this, 'part_before_preview' ), 10, 2 );
		add_action( 'happyforms_part_after', array( $this, 'part_after_preview' ), 10, 2 );
		add_action( 'happyforms_do_setup_control', array( $this, 'do_control' ), 10, 3 );
	}

	public function get_fields() {
		global $current_user;

		$fields = array(
			'confirmation_message' => array(
				'default' => __( 'Your message has been successfully sent. We appreciate you contacting us and we’ll be in touch soon.', 'happyforms' ),
				'sanitize' => 'esc_html',
			),
			'receive_email_alerts' => array(
				'default' => 1,
				'sanitize' => 'happyforms_sanitize_checkbox'
			),
			'email_recipient' => array(
				'default' => ( $current_user->user_email ) ? $current_user->user_email : '',
				'sanitize' => 'happyforms_sanitize_emails',
			),
			'email_mark_and_reply' => array(
				'default' => 0,
				'sanitize' => 'happyforms_sanitize_checkbox',
			),
			'alert_email_subject' => array(
				'default' => __( 'You received a new message', 'happyforms' ),
				'sanitize' => 'sanitize_text_field',
			),
			'send_confirmation_email' => array(
				'default' => 1,
				'sanitize' => 'happyforms_sanitize_checkbox'
			),
			'confirmation_email_from_name' => array(
				'default' => get_bloginfo( 'name' ),
				'sanitize' => 'sanitize_text_field',
			),
			'confirmation_email_subject' => array(
				'default' => __( 'We received your message', 'happyforms' ),
				'sanitize' => 'sanitize_text_field',
			),
			'confirmation_email_content' => array(
				'default' => __( 'Your message has been successfully sent. We appreciate you contacting us and we’ll be in touch soon.', 'happyforms' ),
				'sanitize' => 'esc_html',
			),
			'redirect_on_complete' => array(
				'default' => 0,
				'sanitize' => 'happyforms_sanitize_checkbox',
			),
			'redirect_url' => array(
				'default' => '',
				'sanitize' => 'sanitize_text_field',
			),
			'spam_prevention' => array(
				'default' => 1,
				'sanitize' => 'happyforms_sanitize_checkbox',
			),
			'optional_part_label' => array(
				'default' => __( '(optional)', 'happyforms' ),
				'sanitize' => 'sanitize_text_field',
			),
			'submit_button_label' => array(
				'default' => __( 'Submit Form', 'happyforms' ),
				'sanitize' => 'sanitize_text_field',
			),
			'form_expiration_datetime' => array(
				'default' => date( 'Y-m-d H:i:s', time() + 3600 * 24 * 7 ),
				'sanitize' => 'happyforms_sanitize_datetime',
			),
			'save_entries' => array(
				'default' => 1,
				'sanitize' => 'happyforms_sanitize_checkbox',
			),
			'captcha' => array(
				'default' => '',
				'sanitize' => 'happyforms_sanitize_checkbox',
			),
			'captcha_site_key' => array(
				'default' => '',
				'sanitize' => 'sanitize_text_field',
			),
			'captcha_secret_key' => array(
				'default' => '',
				'sanitize' => 'sanitize_text_field',
			),
			'captcha_label' => array(
				'default' => __( 'Validate your submission', 'happyforms' ),
				'sanitize' => 'sanitize_text_field'
			),
			'preview_before_submit' => array(
				'default' => 0,
				'sanitize' => 'happyforms_sanitize_checkbox',
			),
			'review_button_label' => array(
				'default' => __( 'Review submission', 'happyforms' ),
				'sanitize' => 'sanitize_text_field',
			),
			'unique_id' => array(
				'default' => 0,
				'sanitize' => 'happyforms_sanitize_checkbox',
			),
			'unique_id_start_from' => array(
				'default' => 1,
				'sanitize' => 'intval',
			),
			'unique_id_prefix' => array(
				'default' => '',
				'sanitize' => 'sanitize_text_field',
			),
			'unique_id_suffix' => array(
				'default' => '',
				'sanitize' => 'sanitize_text_field',
			),
			'use_html_id' => array(
				'default' => 0,
				'sanitize' => 'happyforms_sanitize_checkbox',
			),
			'html_id' => array(
				'default' => '',
				'sanitize' => 'sanitize_text_field'
			),
			'disable_submit_until_valid' => array(
				'default' => '',
				'sanitize' => 'sanitize_text_field'
			),
			'submit_button_html_class' => array(
				'default' => '',
				'sanitize' => 'sanitize_text_field'
			),
		);

		return $fields;
	}

	public function get_controls() {
		$controls = array(
			100 => array(
				'type' => 'editor',
				'label' => __( 'Confirmation message', 'happyforms' ),
				'tooltip' => __( 'This is the message your users will see after succesfully submitting your form.', 'happyforms' ),
				'field' => 'confirmation_message',
			),
			200 => array(
				'type' => 'checkbox',
				'label' => __( 'Receive submission alerts', 'happyforms' ),
				'field' => 'receive_email_alerts',
			),
			300 => array(
				'type' => 'text',
				'label' => __( 'Email address', 'happyforms' ),
				'tooltip' => __( 'Add your email address here to receive a confirmation email for each form response. You can add multiple email addresses by separating each address with a comma.', 'happyforms' ),
				'field' => 'email_recipient',
			),
			400 => array(
				'type' => 'text',
				'label' => __( 'Email subject', 'happyforms' ),
				'tooltip' => __( 'Each time a user submits a message, you\'ll receive an email with this subject.', 'happyforms' ),
				'field' => 'alert_email_subject',
			),
			450 => array(
				'type' => 'checkbox',
				'label' => __( 'Include mark and reply link', 'happyforms' ),
				'tooltip' => __( 'Reply to your users and mark their submission as read in one click.', 'happyforms' ),
				'field' => 'email_mark_and_reply',
			),
			500 => array(
				'type' => 'checkbox',
				'label' => __( 'Send confirmation email', 'happyforms' ),
				'field' => 'send_confirmation_email',
			),
			600 => array(
				'type' => 'text',
				'label' => __( 'Email display name', 'happyforms' ),
				'tooltip' => __( 'If your form contains an email field, recipients will receive an email with this sender name.', 'happyforms' ),
				'field' => 'confirmation_email_from_name',
			),
			700 => array(
				'type' => 'text',
				'label' => __( 'Email subject', 'happyforms' ),
				'tooltip' => __( 'If your form contains an email field, recipients will receive an email with this subject.', 'happyforms' ),
				'field' => 'confirmation_email_subject',
			),
			800 => array(
				'type' => 'editor',
				'label' => __( 'Email content', 'happyforms' ),
				'tooltip' => __( 'If your form contains an email field, recipients will receive an email with this content.', 'happyforms' ),
				'field' => 'confirmation_email_content',
			),
			900 => array(
				'type' => 'text',
				'label' => __( 'Optional part label', 'happyforms' ),
				'field' => 'optional_part_label',
			),
			1000 => array(
				'type' => 'text',
				'label' => __( 'Submit button label', 'happyforms' ),
				'field' => 'submit_button_label',
			),
			1100 => array(
				'type' => 'text',
				'label' => __( 'Submit button HTML class', 'happyforms' ),
				'field' => 'submit_button_html_class'
			),
			1200 => array(
				'type' => 'checkbox',
				'label' => __( 'Use custom form HTML ID', 'happyforms' ),
				'field' => 'use_html_id',
				'tooltip' => __( 'Add a unique HTML ID to your form. Write without a hash (#) character.', 'happyforms' ),
			),
			1201 => array(
				'type' => 'text',
				'label' => __( 'Form HTML ID', 'happyforms' ),
				'field' => 'html_id',
			),
			1300 => array(
				'type' => 'checkbox',
				'label' => __( 'Redirect on complete', 'happyforms' ),
				'tooltip' => __( 'By default, recipients will be redirected to the post or page displaying this form. To set a custom redirect webpage, add a link here.', 'happyforms' ),
				'field' => 'redirect_on_complete'
			),
			1301 => array(
				'type' => 'text',
				'label' => __( 'On complete redirect link', 'happyforms' ),
				'field' => 'redirect_url',
			),
			1400 => array(
				'type' => 'checkbox',
				'label' => __( 'Spam prevention', 'happyforms' ),
				'tooltip' => __( 'Protect your form against bots by using HoneyPot security.', 'happyforms' ),
				'field' => 'spam_prevention',
			),
			1500 => array(
				'type' => 'checkbox',
				'label' => sprintf(
					__( 'Use <a href="%s" target="_blank" class="external"> Google ReCaptcha</a>', 'happyforms' ),
					'https://www.google.com/recaptcha'
				),
				'tooltip' => __( 'Protect your form against bots using your Google ReCaptcha credentials.', 'happyforms' ),
				'field' => 'captcha',
			),
			1501 => array(
				'type' => 'text',
				'label' => __( 'ReCaptcha site key', 'happyforms' ),
				'field' => 'captcha_site_key',
			),
			1502 => array(
				'type' => 'text',
				'label' => __( 'ReCaptcha secret key', 'happyforms' ),
				'field' => 'captcha_secret_key',
			),
			1503 => array(
				'type' => 'text',
				'label' => __( 'ReCaptcha label', 'happyforms' ),
				'field' => 'captcha_label'
			),
			1600 => array(
				'type' => 'checkbox',
				'label' => __( 'Save responses', 'happyforms' ),
				'tooltip' => __( 'Keep recipients responses stored in your WordPress database.', 'happyforms' ),
				'field' => 'save_entries',
			),
			1700 => array(
				'type' => 'checkbox',
				'label' => __( 'Give each response an ID number', 'happyforms' ),
				'tooltip' => __( 'Tag responses with a unique, incremental identifier.', 'happyforms' ),
				'field' => 'unique_id',
			),
			1701 => array(
				'type' => 'number',
				'label' => __( 'Start counter from', 'happyforms' ),
				'tooltip' => __( 'Your next submission will be tagged with this identifier.', 'happyforms' ),
				'field' => 'unique_id_start_from',
				'min' => 0
			),
			1702 => array(
				'type' => 'text',
				'label' => __( 'Prefix', 'happyforms' ),
				'field' => 'unique_id_prefix',
			),
			1703 => array(
				'type' => 'text',
				'label' => __( 'Suffix', 'happyforms' ),
				'field' => 'unique_id_suffix',
			),
			1800 => array(
				'type' => 'checkbox',
				'label' => __( 'Preview values before submission', 'happyforms' ),
				'tooltip' => __( 'Let your users review their submission before confirming it.', 'happyforms' ),
				'field' => 'preview_before_submit',
			),
			1801 => array(
				'type' => 'text',
				'label' => __( 'Review button text', 'happyforms' ),
				'field' => 'review_button_label',
			),
			1900 => array(
				'type' => 'checkbox',
				'label' => __( 'Disable submit button until form is valid', 'happyforms' ),
				'field' => 'disable_submit_until_valid',
			),
		);

		$controls = apply_filters( 'happyforms_setup_controls', $controls );
		ksort( $controls, SORT_NUMERIC );

		return $controls;
	}

	public function do_control( $control, $field, $index ) {
		$type = $control['type'];
		$path = happyforms_get_include_folder() . '/core/templates/customize-controls/setup';

		switch( $control['type'] ) {
			case 'editor':
			case 'checkbox':
			case 'text':
			case 'number':
				require( "{$path}/{$type}.php" );
				break;
			default:
				break;
		}
	}

	/**
	 * Filter: add fields to form meta.
	 *
	 * @hooked filter happyforms_meta_fields
	 *
	 * @param array $fields Current form meta fields.
	 *
	 * @return array
	 */
	public function meta_fields( $fields ) {
		$fields = array_merge( $fields, $this->get_fields() );

		return $fields;
	}

	public function requires_confirmation( $form ) {
		return ( 1 === intval( $form['preview_before_submit'] ) );
	}

	/**
	 * Filter: append -editable class to part templates.
	 *
	 * @hooked filter happyforms_part_class
	 *
	 * @return void
	 */
	public function part_class_customizer( $classes ) {
		if ( ! is_customize_preview() ) {
			return $classes;
		}

		$classes[] = 'happyforms-block-editable happyforms-block-editable--part';

		return $classes;
	}

	public function form_title_customizer( $title ) {
		if ( ! is_customize_preview() ) {
			return $title;
		}

		$before = '<div class="happyforms-block-editable happyforms-block-editable--title">';
		$after = '</div>';
		$title = "{$before}{$title}{$after}";

		return $title;
	}

	public function part_before_preview( $part, $form ) {
		if ( happyforms_get_form_property( $form, 'preview_before_submit' )
			&& ( 'review' === happyforms_get_current_step( $form ) ) ) {

			require( happyforms_get_include_folder() . '/core/templates/partials/part-preview.php' );
		}
	}

	public function part_after_preview( $part, $form ) {
		if ( happyforms_get_form_property( $form, 'preview_before_submit' )
			&& ( 'review' === happyforms_get_current_step( $form ) ) ) {
			?>
			</div></div>
			<?php
		}
	}

	public function part_attributes_preview( $attributes, $part, $form, $component ) {
		if ( happyforms_get_form_property( $form, 'preview_before_submit' )
			&& ( 'review' === happyforms_get_current_step( $form ) ) ) {

			$attributes[] = 'readonly';
		}

		return $attributes;
	}

	public function form_open_preview( $form ) {
		if ( happyforms_get_form_property( $form, 'preview_before_submit' )
			&& ( 'review' === happyforms_get_current_step( $form ) ) ) {
			?>
			<p><?php _e( 'Please review your submission...', 'happyforms' ); ?></p>
			<?php
		}
	}

	public function form_html_class_preview( $classes, $form ) {
		if ( happyforms_get_form_property( $form, 'preview_before_submit' )
			&& ( 'review' === happyforms_get_current_step( $form ) ) ) {

			$classes[] = 'happyforms-form-preview';
		}

		return $classes;
	}

	public function confirm_preview_partial( $path, $form ) {
		if ( happyforms_get_form_property( $form, 'preview_before_submit' )
			&& ( 'review' === happyforms_get_current_step( $form ) )
			&& ( 'partials/form-submit' === $path ) ) {

			$path = 'partials/form-confirm-preview';
		}

		return $path;
	}

	public function submit_preview_template( $path, $form ) {
		if ( happyforms_get_form_property( $form, 'preview_before_submit' )
			&& ( 'preview' === happyforms_get_current_step( $form ) )
			&& ( 'partials/form-submit' === $path ) ) {

			$path = 'partials/form-submit-preview';
		}

		return $path;
	}

	public function increment_unique_id( $response_id, $form ) {
		if ( intval( $form['unique_id'] ) ) {
			$increment = intval( $form['unique_id_start_from'] );

			happyforms_update_meta( $form['ID'], 'unique_id_start_from', $increment + 1 );
		}
	}

	public function steps_add_preview( $steps, $form ) {
		if ( $this->requires_confirmation( $form ) ) {
			$steps[100] = 'preview';
			$steps[200] = 'review';
		}

		return $steps;
	}

	public function has_captcha( $has_captcha, $form ) {
		$has_captcha = $form['captcha'] || happyforms_is_preview();

		return $has_captcha;
	}

	public function form_html_id( $id, $form ) {
		if ( 1 === intval( happyforms_get_form_property( $form, 'use_html_id' ) ) && ! empty( $form['html_id'] ) ) {
			$id = $form['html_id'];
		}

		return $id;
	}

	public function form_html_class( $class, $form ) {
		if ( 1 === intval( happyforms_get_form_property( $form, 'disable_submit_until_valid' ) ) ) {
			$class[] = 'happyforms-form--disable-until-valid';
		}

		return $class;
	}

	public function script_dependencies( $deps, $forms ) {
		$has_captcha = false;

		foreach ( $forms as $form ) {
			if ( $form['captcha'] ) {
				$has_captcha = true;
				break;
			}
		}

		if ( ! happyforms_is_preview() && ! $has_captcha ) {
			return $deps;
		}

		$recaptcha_url = 'https://www.google.com/recaptcha/api.js';
		$recaptcha_locale = happyforms_get_recaptcha_locale();

		if ( $recaptcha_locale ) {
			$recaptcha_url = add_query_arg( 'hl', $recaptcha_locale, $recaptcha_url );
		}

		wp_register_script(
			'google-recaptcha',
			$recaptcha_url,
			array(), false, true
		);

		wp_register_script(
			'recaptcha',
			happyforms_get_plugin_url() . 'inc/core/assets/js/frontend/recaptcha.js',
			array( 'google-recaptcha' ), false, true
		);

		$deps[] = 'recaptcha';

		return $deps;
	}

}

if ( ! function_exists( 'happyforms_get_setup' ) ):

function happyforms_get_setup() {
	return HappyForms_Form_Setup::instance();
}

endif;

happyforms_get_setup();
