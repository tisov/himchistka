<?php

class HappyForms_Form_Styles {

	/**
	 * The singleton instance.
	 *
	 * @since 1.0
	 *
	 * @var HappyForms_Form_Styles
	 */
	private static $instance;

	/**
	 * The singleton constructor.
	 *
	 * @since 1.0
	 *
	 * @return HappyForms_Form_Styles
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
	 * @since 1.0.0.
	 *
	 * @return void
	 */
	public function hook() {
		add_filter( 'happyforms_meta_fields', array( $this, 'meta_fields' ) );
		add_filter( 'happyforms_form_class', array( $this, 'form_html_class' ), 10, 2 );
		add_action( 'happyforms_do_style_control', array( $this, 'do_control' ), 10, 3 );
	}

	public function get_fields() {
		$fields = array(
			'form_direction' => array(
				'default' => '',
				'options' => array(
					'' => __( 'Left-to-right', 'happyforms' ),
					'happyforms-form--direction-rtl' => __( 'Right-to-left', 'happyforms' )
				),
				'target' => 'form_class',
				'sanitize' => 'sanitize_text_field'
			),
			'form_width' => array(
				'default' => 100,
				'unit' => '',
				'include_unit_switch' => true,
				'units' => array( '%', 'px' ),
				'min' => 0,
				'max' => 100,
				'step' => 10,
				'target' => 'css_var',
				'variable' => '--happyforms-form-width',
				'extra_class' => 'form-width-control',
				'sanitize' => 'sanitize_text_field'
			),
			'form_padding' => array(
				'default' => '',
				'options' => array(
					'' => __( 'Default', 'happyforms' ),
					'happyforms-form--padding-narrow' => __( 'Narrow', 'happyforms' ),
					'happyforms-form--padding-wide' => __( 'Wide', 'happyforms' )
				),
				'target' => 'form_class',
				'sanitize' => 'sanitize_text_field'
			),
			'form_title' => array(
				'default' => '',
				'options' => array(
					'' => __( 'Show', 'happyforms' ),
					'happyforms-form--hide-title' => __( 'Hide', 'happyforms' )
				),
				'target' => 'form_class',
				'sanitize' => 'sanitize_text_field'
			),
			'form_title_alignment' => array(
				'default' => '',
				'options' => array(
					'' => __( 'Left', 'happyforms' ),
					'happyforms-form--title-text-align-center' => __( 'Center', 'happyforms' ),
					'happyforms-form--title-text-align-right' => __( 'Right', 'happyforms' )
				),
				'sanitize' => 'sanitize_text_field',
				'target' => 'form_class'
			),
			'form_title_font_size' => array(
				'default' => 32,
				'unit' => 'px',
				'min' => 16,
				'max' => 52,
				'step' => 1,
				'sanitize' => 'intval',
				'target' => 'css_var',
				'variable' => '--happyforms-form-title-font-size'
			),
			'part_border' => array(
				'default' => '',
				'options' => array(
					'' => __( 'Show', 'happyforms' ),
					'happyforms-form--part-border-off' => __( 'Hide', 'happyforms' )
				),
				'target' => 'form_class',
				'sanitize' => 'sanitize_text_field'
			),
			'part_border_location' => array(
				'default' => '',
				'options' => array(
					'' => __( 'All sides', 'happyforms' ),
					'happyforms-form--part-borders-bottom-only' => __( 'Bottom only', 'happyforms' )
				),
				'target' => 'form_class',
				'sanitize' => 'sanitize_text_field'
			),
			'part_border_radius' => array(
				'default' => '',
				'options' => array(
					'happyforms-form--part-border-radius-square' => __( 'Square', 'happyforms' ),
					'' => __( 'Round', 'happyforms' ),
					'happyforms-form--part-border-radius-pill' => __( 'Pill', 'happyforms' )
				),
				'target' => 'form_class',
				'sanitize' => 'sanitize_text_field'
			),
			'part_outer_padding' => array(
				'default' => '',
				'options' => array(
					'happyforms-form--part-outer-padding-narrow' => __( 'Narrow', 'happyforms' ),
					'' => __( 'Default', 'happyforms' ),
					'happyforms-form--part-outer-padding-wide' => __( 'Wide', 'happyforms' )
				),
				'target' => 'form_class',
				'sanitize' => 'sanitize_text_field'
			),
			'part_inner_padding' => array(
				'default' => '',
				'options' => array(
					'happyforms-form--part-inner-padding-narrow' => __( 'Narrow', 'happyforms' ),
					'' => __( 'Default', 'happyforms' ),
					'happyforms-form--part-inner-padding-wide' => __( 'Wide', 'happyforms' )
				),
				'target' => 'form_class',
				'sanitize' => 'sanitize_text_field'
			),
			'part_toggle_placeholders' => array(
				'default' => '',
				'value' => 'happyforms-form--part-placeholder-toggle',
				'sanitize' => 'sanitize_text_field',
				'target' => 'form_class',
			),
			'part_title_alignment' => array(
				'default' => '',
				'options' => array(
					'' => __( 'Left', 'happyforms' ),
					'happyforms-form--part-title-text-align-center' => __( 'Center', 'happyforms' ),
					'happyforms-form--part-title-text-align-right' => __( 'Right', 'happyforms' )
				),
				'sanitize' => 'sanitize_text_field',
				'target' => 'form_class'
			),
			'part_title_font_size' => array(
				'default' => 16,
				'unit' => 'px',
				'min' => 13,
				'max' => 30,
				'step' => 1,
				'target' => 'css_var',
				'variable' => '--happyforms-part-title-font-size',
				'sanitize' => 'sanitize_text_field'
			),
			'part_title_font_weight' => array(
				'default' => '',
				'options' => array(
					'' => __( 'Normal', 'happyforms' ),
					'happyforms-form--part-title-font-weight-bold' => __( 'Bold', 'happyforms' )
				),
				'target' => 'form_class',
				'sanitize' => 'sanitize_text_field'
			),
			'part_description_alignment' => array(
				'default' => '',
				'options' => array(
					'' => __( 'Left', 'happyforms' ),
					'happyforms-form--part-description-text-align-center' => __( 'Center', 'happyforms' ),
					'happyforms-form--part-description-text-align-right' => __( 'Right', 'happyforms' )
				),
				'sanitize' => 'sanitize_text_field',
				'target' => 'form_class'
			),
			'part_description_font_size' => array(
				'default' => 14,
				'unit' => 'px',
				'min' => 10,
				'max' => 20,
				'step' => 1,
				'target' => 'css_var',
				'variable' => '--happyforms-part-description-font-size',
				'sanitize' => 'sanitize_text_field'
			),
			'part_value_alignment' => array(
				'default' => '',
				'options' => array(
					'' => __( 'Left', 'happyforms' ),
					'happyforms-form--part-value-text-align-center' => __( 'Center', 'happyforms' ),
					'happyforms-form--part-value-text-align-right' => __( 'Right', 'happyforms' )
				),
				'sanitize' => 'sanitize_text_field',
				'target' => 'form_class'
			),
			'part_value_font_size' => array(
				'default' => 16,
				'unit' => 'px',
				'min' => 12,
				'max' => 24,
				'step' => 1,
				'target' => 'css_var',
				'variable' => '--happyforms-part-value-font-size',
				'sanitize' => 'sanitize_text_field'
			),
			'submit_button_border' => array(
				'default' => '',
				'options' => array(
					'' => __( 'Show', 'happyforms' ),
					'happyforms-form--submit-button-border-hide' => __( 'Hide', 'happyforms' )
				),
				'target' => 'form_class',
				'sanitize' => 'sanitize_text_field'
			),
			'submit_button_border_radius' => array(
				'default' => '',
				'options' => array(
					'happyforms-form--submit-button-border-radius-square' => __( 'Square', 'happyforms' ),
					'' => __( 'Round', 'happyforms' ),
					'happyforms-form--submit-button-border-radius-pill' => __( 'Pill', 'happyforms' )
				),
				'target' => 'form_class',
				'sanitize' => 'sanitize_text_field'
			),
			'submit_button_width' => array(
				'default' => '',
				'options' => array(
					'' => __( 'Default', 'happyforms' ),
					'happyforms-form--submit-button-fullwidth' => __( 'Full width', 'happyforms' )
				),
				'target' => 'form_class',
				'sanitize' => 'sanitize_text_field'
			),
			'submit_button_padding' => array(
				'default' => '',
				'options' => array(
					'happyforms-form--submit-button-padding-narrow' => __( 'Narrow', 'happyforms' ),
					'' => __( 'Default', 'happyforms' ),
					'happyforms-form--submit-button-padding-wide' => __( 'Wide', 'happyforms' )
				),
				'target' => 'form_class',
				'sanitize' => 'sanitize_text_field'
			),
			'submit_button_font_size' => array(
				'default' => 18,
				'unit' => 'px',
				'min' => 14,
				'max' => 40,
				'step' => 1,
				'target' => 'css_var',
				'variable' => '--happyforms-submit-button-font-size',
				'sanitize' => 'sanitize_text_field'
			),
			'submit_button_font_weight' => array(
				'default' => '',
				'options' => array(
					'happyforms-form--submit-button-normal' => __( 'Normal', 'happyforms' ),
					'' => __( 'Bold', 'happyforms' )
				),
				'target' => 'form_class',
				'sanitize' => 'sanitize_text_field'
			),
			'submit_button_alignment' => array(
				'default' => '',
				'options' => array(
					'' => __( 'Left', 'happyforms' ),
					'happyforms-form--submit-button-align-center' => __( 'Center', 'happyforms' ),
					'happyforms-form--submit-button-align-right' => __( 'Right', 'happyforms' )
				),
				'target' => 'form_class',
				'sanitize' => 'sanitize_text_field'
			),
			'submit_button_part_of_last_input' => array(
				'default' => '',
				'sanitize' => 'sanitize_text_field',
				'target' => 'form_class',
				'value' => 'happyforms-form--submit-part-of-input',
			),
			'color_primary' => array(
				'default' => '#000000',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-primary',
			),
			'color_success' => array(
				'default' => '#39b54a',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-success',
			),
			'color_error' => array(
				'default' => '#ff7550',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-error',
			),
			'color_part_title' => array(
				'default' => '#000000',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-part-title',
			),
			'color_part_text' => array(
				'default' => '#000000',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-part-value',
			),
			'color_part_placeholder' => array(
				'default' => '#888888',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-part-placeholder',
			),
			'color_part_border' => array(
				'default' => '#dbdbdb',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-part-border',
			),
			'color_part_border_focus' => array(
				'default' => '#407fff',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-part-border-focus',
			),
			'color_part_background' => array(
				'default' => '#ffffff',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-part-background',
			),
			'color_part_background_focus' => array(
				'default' => '#ffffff',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-part-background-focus',
			),
			'color_submit_background' => array(
				'default' => '#407fff',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-submit-background',
			),
			'color_submit_background_hover' => array(
				'default' => '#3567cc',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-submit-background-hover',
			),
			'color_submit_border' => array(
				'default' => 'transparent',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-submit-border',
			),
			'color_submit_text' => array(
				'default' => '#ffffff',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-submit-text',
			),
			'color_submit_text_hover' => array(
				'default' => '#ffffff',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-submit-text-hover',
			),
			'color_rating_star' => array(
				'default' => '#cccccc',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-rating',
			),
			'color_rating_star_hover' => array(
				'default' => '#f39c00',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-rating-hover',
			),
			'color_rating_background' => array(
				'default' => '#efefef',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-rating-bg',
			),
			'color_rating_background_hover' => array(
				'default' => '#407fff',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-rating-bg-hover',
			),
			'color_table_row_odd' => array(
				'default' => '#fcfcfc',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-table-row-odd',
			),
			'color_table_row_even' => array(
				'default' => '#efefef',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-table-row-even',
			),
			'color_table_row_odd_text' => array(
				'default' => '#000000',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-table-row-odd-text',
			),
			'color_table_row_even_text' => array(
				'default' => '#000000',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-table-row-even-text',
			),
			'color_choice_checkmark_bg' => array(
				'default' => '#ffffff',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-choice-checkmark-bg',
			),
			'color_choice_checkmark_bg_focus' => array(
				'default' => '#000000',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-choice-checkmark-bg-focus',
			),
			'color_choice_checkmark_color' => array(
				'default' => '#ffffff',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-choice-checkmark-color',
			),
			'color_dropdown_item_bg' => array(
				'default' => '#ffffff',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-dropdown-item-bg',
			),
			'color_dropdown_item_text' => array(
				'default' => '#000000',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-dropdown-item-text',
			),
			'color_dropdown_item_bg_hover' => array(
				'default' => '#dbdbdb',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-dropdown-item-bg-hover',
			),
			'color_dropdown_item_text_hover' => array(
				'default' => '#000000',
				'sanitize' => 'sanitize_text_field',
				'target' => 'css_var',
				'variable' => '--happyforms-color-dropdown-item-text-hover',
			),
			'notices_position' => array(
				'default' => '',
				'options' => array(
					'' => __( 'Above form', 'happyforms' ),
					'happyforms-form--notices-below' => __( 'Below form', 'happyforms' ),
				),
				'target' => 'form_class',
				'sanitize' => 'sanitize_text_field'
			),
		);

		return apply_filters( 'happyforms_style_fields', $fields );
	}

	public function get_controls() {
		$controls = array(
			100 => array(
				'type' => 'divider',
				'label' => __( 'General', 'happyforms' ),
				'id' => 'general',
			),
			200 => array(
				'type' => 'range',
				'label' => __( 'Width', 'happyforms' ),
				'field' => 'form_width'
			),
			300 => array(
				'type' => 'buttonset',
				'label' => __( 'Padding', 'happyforms' ),
				'field' => 'form_padding',
			),
			400 => array(
				'type' => 'buttonset',
				'label' => __( 'Direction', 'happyforms' ),
				'field' => 'form_direction'
			),
			500 => array(
				'type' => 'buttonset',
				'label' => __( 'Display notices', 'happyforms' ),
				'field' => 'notices_position'
			),
			600 => array(
				'type' => 'heading',
				'label' => __( 'Colors', 'happyforms' )
			),
			700 => array(
				'type' => 'color',
				'label' => __( 'Primary', 'happyforms' ),
				'field' => 'color_primary',
			),
			800 => array(
				'type' => 'color',
				'label' => __( 'Success', 'happyforms' ),
				'field' => 'color_success',
			),
			900 => array(
				'type' => 'color',
				'label' => __( 'Error', 'happyforms' ),
				'field' => 'color_error',
			),
			1000 => array(
				'type' => 'divider',
				'label' => __( 'Form title', 'happyforms' ),
				'id' => 'form_title',
			),
			1100 => array(
				'type' => 'buttonset',
				'label' => __( 'Display', 'happyforms' ),
				'field' => 'form_title',
			),
			1200 => array(
				'type' => 'buttonset',
				'label' => __( 'Alignment', 'happyforms' ),
				'field' => 'form_title_alignment'
			),
			1300 => array(
				'type' => 'range',
				'label' => __( 'Font size', 'happyforms' ),
				'field' => 'form_title_font_size',
			),
			1400 => array(
				'type' => 'divider',
				'label' => __( 'Part borders & spacing', 'happyforms' ),
				'id' => 'borders-spacing',
			),
			1500 => array(
				'type' => 'buttonset',
				'label' => __( 'Border', 'happyforms' ),
				'field' => 'part_border',
			),
			1600 => array(
				'type' => 'buttonset',
				'label' => __( 'Border location', 'happyforms' ),
				'field' => 'part_border_location',
			),
			1700 => array(
				'type' => 'buttonset',
				'label' => __( 'Border radius', 'happyforms' ),
				'field' => 'part_border_radius',
			),
			1800 => array(
				'type' => 'buttonset',
				'label' => __( 'Outer padding', 'happyforms' ),
				'field' => 'part_outer_padding',
			),
			1900 => array(
				'type' => 'buttonset',
				'label' => __( 'Inner padding', 'happyforms' ),
				'field' => 'part_inner_padding',
			),
			2000 => array(
				'type' => 'heading',
				'label' => __( 'Colors', 'happyforms' )
			),
			2100 => array(
				'type' => 'color',
				'label' => __( 'Border', 'happyforms' ),
				'field' => 'color_part_border',
			),
			2200 => array(
				'type' => 'color',
				'label' => __( 'Border on focus', 'happyforms' ),
				'field' => 'color_part_border_focus',
			),
			2300 => array(
				'type' => 'color',
				'label' => __( 'Background', 'happyforms' ),
				'field' => 'color_part_background',
			),
			2400 => array(
				'type' => 'color',
				'label' => __( 'Background on focus', 'happyforms' ),
				'field' => 'color_part_background_focus',
			),
			2500 => array(
				'type' => 'divider',
				'label' => __( 'Part labels & text', 'happyforms' ),
				'id' => 'labels-text',
			),
			2600 => array(
				'type' => 'checkbox',
				'label' => __( 'Toggle placeholder on part focus', 'happyforms' ),
				'field' => 'part_toggle_placeholders',
			),
			2700 => array(
				'type' => 'buttonset',
				'label' => __( 'Title alignment', 'happyforms' ),
				'field' => 'part_title_alignment'
			),
			2800 => array(
				'type' => 'range',
				'label' => __( 'Title font size', 'happyforms' ),
				'field' => 'part_title_font_size',
			),
			2900 => array(
				'type' => 'buttonset',
				'label' => __( 'Title font weight', 'happyforms' ),
				'field' => 'part_title_font_weight',
			),
			3000 => array(
				'type' => 'buttonset',
				'label' => __( 'Description alignment', 'happyforms' ),
				'field' => 'part_description_alignment'
			),
			3100 => array(
				'type' => 'range',
				'label' => __( 'Description font size', 'happyforms' ),
				'field' => 'part_description_font_size',
			),
			3200 => array(
				'type' => 'buttonset',
				'label' => __( 'Placeholder &amp; value alignment', 'happyforms' ),
				'field' => 'part_value_alignment'
			),
			3300 => array(
				'type' => 'range',
				'label' => __( 'Value font size', 'happyforms' ),
				'field' => 'part_value_font_size',
			),
			3400 => array(
				'type' => 'heading',
				'label' => __( 'Colors', 'happyforms' )
			),
			3500 => array(
				'type' => 'color',
				'label' => __( 'Title', 'happyforms' ),
				'field' => 'color_part_title',
			),
			3600 => array(
				'type' => 'color',
				'label' => __( 'Value', 'happyforms' ),
				'field' => 'color_part_text',
			),
			3700 => array(
				'type' => 'color',
				'label' => __( 'Placeholder', 'happyforms' ),
				'field' => 'color_part_placeholder',
			),
			3800 => array(
				'type' => 'divider',
				'label' => __( 'Dropdowns', 'happyforms' ),
				'id' => 'dropdowns',
			),
			3900 => array(
				'type' => 'heading',
				'label' => __( 'Items', 'happyforms' )
			),
			4000 => array(
				'type' => 'color',
				'label' => __( 'Background', 'happyforms' ),
				'field' => 'color_dropdown_item_bg',
			),
			4100 => array(
				'type' => 'color',
				'label' => __( 'Text', 'happyforms' ),
				'field' => 'color_dropdown_item_text',
			),
			4200 => array(
				'type' => 'color',
				'label' => __( 'Background on focus', 'happyforms' ),
				'field' => 'color_dropdown_item_bg_hover',
			),
			4300 => array(
				'type' => 'color',
				'label' => __( 'Text focused', 'happyforms' ),
				'field' => 'color_dropdown_item_text_hover',
			),
			4400 => array(
				'type' => 'divider',
				'label' => __( 'Checkboxes & Radios', 'happyforms' ),
				'id' => 'checkboxes-radios',
			),
			4500 => array(
				'type' => 'color',
				'label' => __( 'Background', 'happyforms' ),
				'field' => 'color_choice_checkmark_bg',
			),
			4600 => array(
				'type' => 'color',
				'label' => __( 'Background on focus', 'happyforms' ),
				'field' => 'color_choice_checkmark_bg_focus',
			),
			4700 => array(
				'type' => 'color',
				'label' => __( 'Checkmark', 'happyforms' ),
				'field' => 'color_choice_checkmark_color',
			),
			4800 => array(
				'type' => 'divider',
				'label' => __( 'Rating', 'happyforms' ),
				'id' => 'rating',
			),
			4900 => array(
				'type' => 'color',
				'label' => __( 'Rating star color', 'happyforms' ),
				'field' => 'color_rating_star',
			),
			5000 => array(
				'type' => 'color',
				'label' => __( 'Rating star color on hover', 'happyforms' ),
				'field' => 'color_rating_star_hover',
			),
			5100 => array(
				'type' => 'color',
				'label' => __( 'Item background', 'happyforms' ),
				'field' => 'color_rating_background',
			),
			5200 => array(
				'type' => 'color',
				'label' => __( 'Item background on hover', 'happyforms' ),
				'field' => 'color_rating_background_hover',
			),
			5300 => array(
				'type' => 'divider',
				'label' => __( 'Tables', 'happyforms' ),
				'id' => 'tables',
			),
			5400 => array(
				'type' => 'color',
				'label' => __( 'Odd row primary', 'happyforms' ),
				'field' => 'color_table_row_odd',
			),
			5500 => array(
				'type' => 'color',
				'label' => __( 'Odd row secondary', 'happyforms' ),
				'field' => 'color_table_row_odd_text',
			),
			5600 => array(
				'type' => 'color',
				'label' => __( 'Even row primary', 'happyforms' ),
				'field' => 'color_table_row_even',
			),
			5700 => array(
				'type' => 'color',
				'label' => __( 'Even row secondary', 'happyforms' ),
				'field' => 'color_table_row_even_text',
			),
			5800 => array(
				'type' => 'divider',
				'label' => __( 'Submit button', 'happyforms' ),
				'id' => 'submit',
			),
			5900 => array(
				'type' => 'buttonset',
				'label' => __( 'Border', 'happyforms' ),
				'field' => 'submit_button_border',
			),
			6000 => array(
				'type' => 'buttonset',
				'label' => __( 'Border radius', 'happyforms' ),
				'field' => 'submit_button_border_radius',
			),
			6100 => array(
				'type' => 'buttonset',
				'label' => __( 'Width', 'happyforms' ),
				'field' => 'submit_button_width',
			),
			6200 => array(
				'type' => 'buttonset',
				'label' => __( 'Padding', 'happyforms' ),
				'field' => 'submit_button_padding',
			),
			6300 => array(
				'type' => 'range',
				'label' => __( 'Font Size', 'happyforms' ),
				'field' => 'submit_button_font_size',
			),
			6400 => array(
				'type' => 'buttonset',
				'label' => __( 'Font Weight', 'happyforms' ),
				'field' => 'submit_button_font_weight',
			),
			6500 => array(
				'type' => 'buttonset',
				'label' => __( 'Alignment', 'happyforms' ),
				'field' => 'submit_button_alignment',
			),
			6600 => array(
				'type' => 'checkbox',
				'label' => __( 'Make button a part of last input', 'happyforms' ),
				'field' => 'submit_button_part_of_last_input'
			),
			6700 => array(
				'type' => 'heading',
				'label' => __( 'Colors', 'happyforms' )
			),
			6800 => array(
				'type' => 'color',
				'label' => __( 'Background', 'happyforms' ),
				'field' => 'color_submit_background',
			),
			6900 => array(
				'type' => 'color',
				'label' => __( 'Background on focus', 'happyforms' ),
				'field' => 'color_submit_background_hover',
			),
			7000 => array(
				'type' => 'color',
				'label' => __( 'Border', 'happyforms' ),
				'field' => 'color_submit_border',
			),
			7100 => array(
				'type' => 'color',
				'label' => __( 'Text', 'happyforms' ),
				'field' => 'color_submit_text',
			),
			7200 => array(
				'type' => 'color',
				'label' => __( 'Text focused', 'happyforms' ),
				'field' => 'color_submit_text_hover',
			),
		);

		$controls = apply_filters( 'happyforms_style_controls', $controls );
		ksort( $controls, SORT_NUMERIC );

		return $controls;
	}

	public function do_control( $control, $field, $index ) {
		$type = $control['type'];
		$path = happyforms_get_include_folder() . '/core/templates/customize-controls/style';

		switch( $control['type'] ) {
			case 'divider':
			case 'checkbox':
			case 'range':
			case 'buttonset':
			case 'color':
			case 'text':
			case 'select':
			case 'heading':
				require( "{$path}/{$type}.php" );
				break;
			default:
				break;
		}
	}

	public function is_class_field( $field ) {
		return 'form_class' === $field['target'];
	}

	public function is_css_var_field( $field ) {
		return 'css_var' === $field['target'];
	}

	public function form_html_class( $class, $form ) {
		$fields = $this->get_fields();
		$class_fields = array_filter( $fields, array( $this, 'is_class_field' ) );

		foreach ( $class_fields as $key => $field ) {
			if ( '' !== $form[$key] ) {
				$class[] = $form[$key];
			}
		}

		return $class;
	}

	public function form_html_styles( $form = array() ) {
		$fields = $this->get_fields();
		$styles = array_filter( $fields, array( $this, 'is_css_var_field' ) );

		return $styles;
	}

	public function form_css_vars( $form = array() ) {
		$styles = $this->form_html_styles( $form );
		$variables = wp_list_pluck( $styles, 'variable' );

		return $variables;
	}

	/**
	 * Filter: add fields to form meta.
	 *
	 * @hooked filter happyforms_meta_fields
	 *
	 * @since 1.3.0.
	 *
	 * @param array $fields Current form meta fields.
	 *
	 * @return array
	 */
	public function meta_fields( $fields ) {
		$fields = array_merge( $fields, $this->get_fields() );

		return $fields;
	}

}

if ( ! function_exists( 'happyforms_get_styles' ) ):

function happyforms_get_styles() {
	return HappyForms_Form_Styles::instance();
}

endif;

happyforms_get_styles();
