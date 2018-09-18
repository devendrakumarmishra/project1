<?php
function makeover_settings() {

    $form['costings'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Costings',
	  '#collapsible' => TRUE,
	  '#collapsed' => TRUE
	);
    $form['costings']['makeover_surgery_booking_fee'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Surgery Booking Fee',
	  '#description' => 'The amount of surgery booking fee',
	  '#default_value' => variable_get('makeover_surgery_booking_fee', 400)
	);
    $form['costings']['makeover_outpatient_booking_fee'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Outpatient Booking Fee',
	  '#description' => 'The amount of outpatient booking fee',
	  '#default_value' => variable_get('makeover_outpatient_booking_fee', 200)
	);
	$form['costings']['makeover_surgery_transfer_cost'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Surgery Tranfer Cost',
	  '#description' => 'The amount of surgery booking fee',
	  '#default_value' => variable_get('makeover_surgery_transfer_cost', 300)
	);
    $form['costings']['makeover_outpatient_transfer_cost'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Outpatient Tranfer Cost',
	  '#description' => 'The amount of outpatient booking fee',
	  '#default_value' => variable_get('makeover_outpatient_transfer_cost', 150)
	);
	// Hair Transplant
	$form['costings']['makeover_outpatient_hair_transplant_bangkok'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Hair Transplant - Optional Accommodation & Transfers (Bangkok)',
	  '#description' => '10 Nights double/twin share Accommodation and Transfers',
	  '#default_value' => variable_get('makeover_outpatient_hair_transplant_bangkok', 1100)
	);
	$form['costings']['makeover_outpatient_hair_transplant_phuket'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Hair Transplant - Optional Accommodation & Transfers (Phuket)',
	  '#description' => '10 Nights double/twin share Accommodation and Transfers',
	  '#default_value' => variable_get('makeover_outpatient_hair_transplant_phuket', 950)
	);
	
  /*$form['costings']['makeover_dental_booking_fee'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Dental Booking Fee',
	  '#description' => 'The amount of dental booking fee',
	  '#default_value' => variable_get('makeover_dental_booking_fee', 50)
	);
    $form['costings']['makeover_surgery_booking_fee_baht'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Surgery Booking Fee',
	  '#description' => 'The amount of surgery booking fee in Baht',
	  '#default_value' => variable_get('makeover_surgery_booking_fee_baht', 4000)
	);
    $form['costings']['makeover_outpatient_booking_fee_baht'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Outpatient Booking Fee',
	  '#description' => 'The amount of outpatient booking fee in Baht',
	  '#default_value' => variable_get('makeover_outpatient_booking_fee_baht', 2000)
	);
    $form['costings']['makeover_dental_booking_fee_baht'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Dental Booking Fee',
	  '#description' => 'The amount of dental booking fee in Baht',
	  '#default_value' => variable_get('makeover_dental_booking_fee_baht', 500)
	);*/
    $form['email_template'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Email Template',
	  '#collapsible' => TRUE,
	  '#collapsed' => TRUE
	);
    $form['email_template']['makeover_surgery_header'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Surgery Header',
	  '#description' => 'The table header for surgery',
	  '#default_value' => variable_get('makeover_surgery_header', 'Treatment/Surgery')
	);
    $form['email_template']['makeover_accom_header'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Accommodation Header',
	  '#description' => 'The table header for accommodation',
	  '#default_value' => variable_get('makeover_accom_header', 'Optional Accommodation and Transfers')
	);
    $form['email_template']['makeover_dental_header'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Dental Header',
	  '#description' => 'The table header for dental treatments',
	  '#default_value' => variable_get('makeover_dental_header', 'Dental Treatment')
	);
  $form['email_template']['makeover_packages_header'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Packages Header',
	  '#description' => 'The table header for packages',
	  '#default_value' => variable_get('makeover_packages_header', 'Packages')
	);
	return system_settings_form($form);
}

function makeover_docs() {
  drupal_goto(drupal_get_path_alias('node/536'));
}
