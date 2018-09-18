<?php

/**
 * Function Get Quote Surgery
 * Estimate for Surgery with or without Dental
 */
function get_quote_currency_rate_admin_settings() {
	$form['currency_rate'] = array(
			'#type' => 'fieldset',
			'#title' => t('Currency Rate'),
	);
	$form['currency_rate']['THB'] = array(
			'#type' => 'textfield',
			'#title' => t('THB Thailand Baht - Base currency'),
			'#size' => 10,
			'#default_value' => variable_get('THB',''),
			'#field_suffix' => 'THB',
	);
	$form['currency_rate']['GBP'] = array(
			'#type' => 'textfield',
			'#title' => t('1 GBP Pound Sterling'),
			'#size' => 10,
			'#default_value' => variable_get('GBP',''),
			'#field_suffix' => 'THB',
			'#description' => "Latest Rate - " .number_format(era_rate('GBP', 'THB'), 3, '.', ',') . ' THB',
	);
	$form['currency_rate']['AUD'] = array(
			'#type' => 'textfield',
			'#title' => t('1 AUD Australian Dollar'),
			'#size' => 10,
			'#default_value' => variable_get('AUD',''),
			'#field_suffix' => 'THB',
			'#description' => "Latest Rate - " .number_format(era_rate('AUD', 'THB'), 3, '.', ','). ' THB',
	);
	$form['currency_rate']['CAD'] = array(
			'#type' => 'textfield',
			'#title' => t('1 CAD Canadian Dollar'),
			'#size' => 10,
			'#default_value' => variable_get('CAD',''),
			'#field_suffix' => 'THB',
			'#description' => "Latest Rate - " .number_format(era_rate('CAD', 'THB'), 3, '.', ','). ' THB',
	);
	$form['currency_rate']['HKD'] = array(
			'#type' => 'textfield',
			'#title' => t('1 HKD Hong Kong Dollar'),
			'#size' => 10,
			'#default_value' => variable_get('HKD',''),
			'#field_suffix' => 'THB',
			'#description' => "Latest Rate - " .number_format(era_rate('HKD', 'THB'), 3, '.', ','). ' THB',
	);
	$form['currency_rate']['NZD'] = array(
			'#type' => 'textfield',
			'#title' => t('1 NZD New Zealand Dollar'),
			'#size' => 10,
			'#default_value' => variable_get('NZD',''),
			'#field_suffix' => 'THB',
			'#description' => "Latest Rate - " .number_format(era_rate('NZD', 'THB'), 3, '.', ','). ' THB',
	);
	$form['currency_rate']['MYR'] = array(
			'#type' => 'textfield',
			'#title' => t('1 MYR Malaysian Ringgit'),
			'#size' => 10,
			'#default_value' => variable_get('MYR',''),
			'#field_suffix' => 'THB',
			'#description' => "Latest Rate - " .number_format(era_rate('MYR', 'THB'), 3, '.', ','). ' THB',
	);
	$form['currency_rate']['USD'] = array(
			'#type' => 'textfield',
			'#title' => t('1 US Dollar'),
			'#size' => 10,
			'#default_value' => variable_get('USD',''),
			'#field_suffix' => 'THB',
			'#description' => "Latest Rate - " .number_format(era_rate('USD', 'THB'), 3, '.', ','). ' THB',
	);
	$form['currency_empty'] = array(
			'#type' => 'fieldset',
			'#title' => t('Empty Price Text Setting'),
	);
	$form['currency_empty']['thbcoltext'] = array(
			'#type' => 'textfield',
			'#title' => t('THB Column Text'),
			'#default_value' => variable_get('thbcoltext','Contact Us'),
	);
	$form['currency_empty']['amountcoltext'] = array(
			'#type' => 'textfield',
			'#title' => t('Amount Column Text'),
			'#default_value' => variable_get('amountcoltext','For Details'),
	);
	return system_settings_form($form);
}

/**
 * Function Get Quote Surgery
 * Estimate for Surgery with or without Dental
 */
function get_quote_surgery_admin_settings() {
	$form['quote_surgery'] = array(
			'#type' => 'fieldset',
			'#title' => t('Estimate for Surgery with or without Dental'),
	);
	$form['quote_surgery']['quote_surgery_sender'] = array(
			'#type' => 'textfield',
			'#title' => t('Mail Sender'),
			'#default_value' => variable_get('quote_surgery_sender',''),
	);
	$form['quote_surgery']['quote_surgery_subject'] = array(
			'#type' => 'textfield',
			'#title' => t('Subject'),
			'#default_value' => variable_get('quote_surgery_subject','Stunning Makeover for !name'),
			'#maxlength' => 180,
	);
	$form['quote_surgery']['quote_surgery_body'] = array(
			'#type' => 'textarea',
			'#title' => t('Body'),
			'#default_value' => variable_get('quote_surgery_body', ''),
			'#rows' => 15,
	);
  return system_settings_form($form);
}

/**
 * Function Get Quote Dental
 * Estimate for Dental only
 */
function get_quote_dental_admin_settings() {
  $form['quote_dental'] = array(
			'#type' => 'fieldset',
			'#title' => t('Estimate for Dental only'),
	);
	$form['quote_dental']['dental_sender'] = array(
			'#type' => 'textfield',
			'#title' => t('Mail Sender'),
			'#default_value' => variable_get('dental_sender',''),
	);
	$form['quote_dental']['dental_subject'] = array(
			'#type' => 'textfield',
			'#title' => t('Subject'),
			'#default_value' => variable_get('dental_subject','Stunning Makeover for !name'),
			'#maxlength' => 180,
	);
	$form['quote_dental']['dental_body'] = array(
			'#type' => 'textarea',
			'#title' => t('Body'),
			'#default_value' => variable_get('dental_body', ''),
			'#rows' => 15,
	);
  return system_settings_form($form);
}

/**
 * Function Get Quote Hair
 * Estimate for Hair Transplant only
 */
function get_quote_hair_admin_settings() {
  $form['quote_hair'] = array(
			'#type' => 'fieldset',
			'#title' => t('Estimate for Hair Transplant only'),
	);
	$form['quote_hair']['hair_transplant_sender'] = array(
			'#type' => 'textfield',
			'#title' => t('Mail Sender'),
			'#default_value' => variable_get('hair_transplant_sender',''),
	);
	$form['quote_hair']['hair_transplant_subject'] = array(
			'#type' => 'textfield',
			'#title' => t('Subject'),
			'#default_value' => variable_get('hair_transplant_subject','Stunning Makeover for !name'),
			'#maxlength' => 180,
	);
	$form['quote_hair']['hair_transplant_body'] = array(
			'#type' => 'textarea',
			'#title' => t('Body'),
			'#default_value' => variable_get('hair_transplant_body', ''),
			'#rows' => 15,
	);
  return system_settings_form($form);
}

/**
 * Function Sent Notification to user that we have receive your Quote Estimation.
 */
function send_quote_notification() {
  $form['quote_notification'] = array(
			'#type' => 'fieldset',
			'#title' => t('Sent Notification'),
	);
	$form['quote_notification']['notification_sender'] = array(
			'#type' => 'textfield',
			'#title' => t('Mail Receiver'),
			'#default_value' => variable_get('notification_sender',''),
	);
	$form['quote_notification']['notification_subject'] = array(
			'#type' => 'textfield',
			'#title' => t('Subject'),
			'#default_value' => variable_get('notification_subject',''),
			'#maxlength' => 180,
	);
	$form['quote_notification']['notification_body'] = array(
			'#type' => 'textarea',
			'#title' => t('Body'),
			'#default_value' => variable_get('notification_body', ''),
			'#rows' => 15,
	);
  return system_settings_form($form);
}

/**
 * Function Sent Notification to user that we have receive your Quote Estimation.
 */
function send_quote_notification_staff() {
	$form['quote_notification'] = array(
			'#type' => 'fieldset',
			'#title' => t('Sent Notification To Staff'),
	);
	$form['quote_notification']['quote_welcome'] = array(
			'#type' => 'textarea',
			'#title' => t('Welcome message for quote after submit'),
			'#default_value' => variable_get('quote_welcome', ''),
			'#rows' => 15,
	);
	$form['quote_notification']['bcc_notification_receiver'] = array(
			'#type' => 'textfield',
			'#title' => t('BCC Mail Receiver'),
			'#default_value' => variable_get('bcc_notification_receiver',''),
			'#description' => 'A copy of quote estimate mail will be passed to this email address',
	);
	$form['quote_notification']['notification_receiver'] = array(
			'#type' => 'textfield',
			'#title' => t('Mail Receiver'),
			'#default_value' => variable_get('notification_receiver',''),
	);
	$form['quote_notification']['notification_staff_subject'] = array(
			'#type' => 'textfield',
			'#title' => t('Subject'),
			'#default_value' => variable_get('notification_staff_subject',''),
			'#maxlength' => 180,
	);
	$form['quote_notification']['notification_staff_body'] = array(
			'#type' => 'textarea',
			'#title' => t('Body'),
			'#default_value' => variable_get('notification_staff_body', ''),
			'#rows' => 15,
	);
  return system_settings_form($form);
}
