<?php
/**
 * Function client feedback form.
 */
function feedback_form_settings() {
  $form['feedback'] = array(
			'#type' => 'fieldset',
			'#title' => t('Client Feedback'),
	);
  $form['feedback']['feedback_receiver'] = array(
			'#type' => 'textfield',
			'#title' => t('Feedback Receiver'),
			'#default_value' => variable_get('feedback_receiver',''),
  );
	$form['feedback']['feedback_welcome'] = array(
			'#type' => 'textarea',
			'#title' => t('Welcome message for feedback after submit'),
			'#default_value' => variable_get('feedback_welcome', ''),
			'#rows' => 15,
	);
  return system_settings_form($form);
}
