<?php
$required = happyforms_is_truthy( $part['required'] );
$empty = empty( happyforms_get_part_preview_value( $part, $form ) );
$hidden = ( ! $required && $empty );
?>
<div class="happyforms-form__part happyforms-part-preview" <?php if ( $hidden ) : ?>style="display: none;"<?php endif; ?>>
	<label class="happyforms-part__label">
		<span class="label"><?php echo esc_html( $part['label'] ); ?></span>
	</label>
	<div class="happyforms-part__el-preview"><?php happyforms_the_part_preview_value( $part, $form ); ?></div>
	<div class="happyforms-hide">