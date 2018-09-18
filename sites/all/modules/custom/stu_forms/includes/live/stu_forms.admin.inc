<?php
/**
 * Admin settings
 */
function surgeon_admin_settings() {
	$form['surgeon'] = array(
			'#type' => 'fieldset',
			'#title' => t('surgeon admin settings'),
	);
	$form['surgeon']['surgeon_welcome'] = array(
			'#type' => 'textarea',
			'#title' => t('Welcome message for surgeon after submit'),
			'#default_value' => variable_get('surgeon_welcome', ''),
			'#rows' => 15,
	);
	$form['surgeon']['surgeon_staff'] = array(
			'#type' => 'textfield',
			'#title' => t('Surgeon Staff Email Address.'),
			'#default_value' => variable_get('surgeon_staff',''),
	);
	/*$form['surgeon']['surgeon_sender'] = array(
			'#type' => 'textfield',
			'#title' => t('Sender email address.'),
			'#default_value' => variable_get('surgeon_sender',''),
	);*/
	$form['surgeon']['surgeon_subject'] = array(
			'#type' => 'textfield',
			'#title' => t('Subject'),
			'#default_value' => variable_get('surgeon_subject',''),
			'#maxlength' => 180,
	);
	$form['surgeon']['surgeon_body'] = array(
			'#type' => 'textarea',
			'#title' => t('Body'),
			'#default_value' => variable_get('surgeon_body', ''),
			'#rows' => 15,
	);
        $form['surgeonclient'] = array(
			'#type' => 'fieldset',
			'#title' => t('Client Authentication Mail Settings'),
	);
	$form['surgeonclient']['client_cc'] = array(
			'#type' => 'textfield',
			'#title' => t('CC Email Address'),
			'#default_value' => variable_get('client_cc',''),
	);
	$form['surgeonclient']['client_subject'] = array(
			'#type' => 'textfield',
			'#title' => t('Subject'),
			'#default_value' => variable_get('client_subject','Authorisation and Acknowledgement of Case Files: !client_name'),
			'#maxlength' => 180,
	);
	$form['surgeonclient']['client_body'] = array(
			'#type' => 'textarea',
			'#title' => t('Body'),
			'#default_value' => variable_get('client_body', ''),
			'#rows' => 15,
	);
  
  
  $form['dentalhospital'] = array(
    '#type' => 'fieldset',
    '#title' => t('Dental Hospital email address settings'),
	);
	$form['dentalhospital']['hospital_smile'] = array(
			'#type' => 'textfield',
			'#title' => t('Bangkok Smile Team'),
			'#default_value' => variable_get('hospital_smile', ''),
			'#rows' => 2,
			'#description' => 'We can enter multiple email addresses with comma separate like example@example.com,example@example.com,example@example.com'
	);
  
  $form['surgeonhospital'] = array(
			'#type' => 'fieldset',
			'#title' => t('Hospital Mail Settings'),
	);
	$form['surgeonhospital']['hospital_vejthani'] = array(
			'#type' => 'textfield',
			'#title' => t('Vejthani Hospital'),
			'#default_value' => variable_get('hospital_vejthani', ''),
			'#rows' => 2,
			'#description' => 'We can enter multiple email addresses with comma separate like example@example.com,example@example.com,example@example.com'
	);
	$form['surgeonhospital']['hospital_bangpakok'] = array(
			'#type' => 'textfield',
			'#title' => t('Bangpakok 9 Hospital'),
			'#default_value' => variable_get('hospital_bangpakok', ''),
			'#rows' => 2,
			'#description' => 'We can enter multiple email addresses with comma separate like example@example.com,example@example.com,example@example.com'
	);
	$form['surgeonhospital']['hospital_yanhee'] = array(
			'#type' => 'textfield',
			'#title' => t('Yanhee Hospital'),
			'#default_value' => variable_get('hospital_yanhee', ''),
			'#rows' => 2,
			'#description' => 'We can enter multiple email addresses with comma separate like example@example.com,example@example.com,example@example.com'
	);
	$form['surgeonhospital']['hospital_ppsi'] = array(
			'#type' => 'textfield',
			'#title' => t('PPSI Hospital'),
			'#default_value' => variable_get('hospital_ppsi', ''),
			'#rows' => 2,
			'#description' => 'We can enter multiple email addresses with comma separate like example@example.com,example@example.com,example@example.com'
	);
  $form['surgeonhospital']['hospital_sikarin'] = array(
			'#type' => 'textfield',
			'#title' => t('Sikarin Hospital'),
			'#default_value' => variable_get('hospital_sikarin', ''),
			'#rows' => 2,
			'#description' => 'We can enter multiple email addresses with comma separate like example@example.com,example@example.com,example@example.com'
	);
	$form['surgeonhospital']['hospital_cc'] = array(
			'#type' => 'textfield',
			'#title' => t('CC Email Address'),
			'#default_value' => variable_get('hospital_cc',''),
	);
	$form['surgeonhospital']['hospital_subject'] = array(
			'#type' => 'textfield',
			'#title' => t('Subject'),
			'#default_value' => variable_get('hospital_subject','Stunning Makeovers Surgery Enquiry: !client_name'),
			'#maxlength' => 180,
	);
	$form['surgeonhospital']['hospital_body'] = array(
			'#type' => 'textarea',
			'#title' => t('Body'),
			'#default_value' => variable_get('hospital_body', ''),
			'#rows' => 15,
	);
  $form['surgeonhospital']['dental_hospital_subject'] = array(
			'#type' => 'textfield',
			'#title' => t('Subject'),
			'#default_value' => variable_get('dental_hospital_subject','Stunning Makeovers Dental Enquiry: !client_name'),
			'#maxlength' => 180,
	);
	$form['surgeonhospital']['dental_hospital_body'] = array(
			'#type' => 'textarea',
			'#title' => t('Body'),
			'#default_value' => variable_get('dental_hospital_body', ''),
			'#rows' => 15,
	);
  return system_settings_form($form);
}
