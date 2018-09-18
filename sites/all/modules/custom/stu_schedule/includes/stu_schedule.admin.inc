<?php
/**
 * Makeover Schedule callback functions
 */
function schedule_hotel_settings() {
  $form['hotel'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Deevana Hotels Details',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	);
	$form['hotel2'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Dream Hotels Details',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	);
	$form['hotel']['deevana_phone'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Deevana Resort Phone',
	  '#description' => 'Deevana Resort Phone',
	  '#default_value' => variable_get('deevana_phone', '')
	);
	$form['hotel']['deevana_contact'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Deevana Resort Contact Person',
	  '#description' => 'Deevana Resort Contact Person',
	  '#default_value' => variable_get('deevana_contact', '')
	);
	$form['hotel']['deevana_address'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Deevana Resort Address',
	  '#description' => 'Deevana Resort Address',
	  '#default_value' => variable_get('deevana_address', ''),
	  '#rows' => 5,
	);
	$form['hotel']['deevana_benefit'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Deevana Resort VIP Benefits',
	  '#description' => 'Deevana Resort VIP Benefits',
	  '#default_value' => variable_get('deevana_benefit', ''),
	  '#rows' => 8,
	);
	
	
	$form['hotel2']['dream_phone'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Dream Hotel Phone',
	  '#description' => 'Dream Hotel Phone',
	  '#default_value' => variable_get('dream_phone', '')
	);
	$form['hotel2']['dream_contact'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Dream Hotel Contact Person',
	  '#description' => 'Dream Hotel Person',
	  '#default_value' => variable_get('dream_contact', '')
	);
	$form['hotel2']['dream_address'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Dream Hotel Address',
	  '#description' => 'Dream Hotel Address',
	  '#default_value' => variable_get('dream_address', ''),
	  '#rows' => 5,
	);
	$form['hotel2']['dream_benefit'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Dream Hotel VIP Benefits',
	  '#description' => 'Dream Hotel VIP Benefits',
	  '#default_value' => variable_get('dream_benefit', ''),
	  '#rows' => 8,
	);
	
  return system_settings_form($form);
}

function schedule_hospitals_settings() {
	$form['hospitals'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Phuket Plastic Surgery Institute',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	);
	$form['hospitals']['ppsi_phone'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Phone',
	  '#description' => 'Phuket Plastic Surgery Institute Phone Number',
	  '#default_value' => variable_get('ppsi_phone', '')
	);
	$form['hospitals']['ppsi_contact'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Contact Person',
	  '#description' => 'Phuket Plastic Surgery Institute Contact Person',
	  '#default_value' => variable_get('ppsi_contact', '')
	);
	$form['hospitals']['ppsi_address'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Address',
	  '#description' => 'Phuket Plastic Surgery Institute Address',
	  '#default_value' => variable_get('ppsi_address', ''),
	  '#rows' => 5,
	);
	
	$form['hospitals2'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Bangpakok 9 International Hospital',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	);
	$form['hospitals2']['bangpakok9_phone'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Phone',
	  '#description' => 'Bangpakok 9 International Hospital Phone Number',
	  '#default_value' => variable_get('bangpakok9_phone', '')
	);
	$form['hospitals2']['bangpakok9_contact'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Contact Person',
	  '#description' => 'Bangpakok 9 International Hospital Contact Person',
	  '#default_value' => variable_get('bangpakok9_contact', '')
	);
	$form['hospitals2']['bangpakok9_address'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Address',
	  '#description' => 'Bangpakok 9 International Hospital Address',
	  '#default_value' => variable_get('bangpakok9_address', ''),
	  '#rows' =>5,
	);
	
	$form['hospitals3'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Vejthani International Hospital',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	);
	$form['hospitals3']['vejthani_phone'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Phone',
	  '#description' => 'Vejthani International Hospital Phone Number',
	  '#default_value' => variable_get('vejthani_phone', '')
	);
	$form['hospitals3']['vejthani_contact'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Contact Person',
	  '#description' => 'Vejthani International Hospital Contact Person',
	  '#default_value' => variable_get('vejthani_contact', '')
	);
	$form['hospitals3']['vejthani_address'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Address',
	  '#description' => 'Vejthani International Hospital Address',
	  '#default_value' => variable_get('vejthani_address', ''),
	  '#rows' => 5,
	);
	
	$form['hospitals4'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Yanhee International Hospital',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	);
	$form['hospitals4']['yanhee_phone'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Phone',
	  '#description' => 'Yanhee International Hospital Phone Number',
	  '#default_value' => variable_get('yanhee_phone', '')
	);
	$form['hospitals4']['yanhee_contact'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Contact Person',
	  '#description' => 'Yanhee International Hospital Contact Person',
	  '#default_value' => variable_get('yanhee_contact', '')
	);
	$form['hospitals4']['yanhee_address'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Address',
	  '#description' => 'Yanhee International Hospital Address',
	  '#default_value' => variable_get('yanhee_address', ''),
	  '#rows' => 5,
	);
  
  $form['hospitals5'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Sikarin International Hospital',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	);
	$form['hospitals5']['sikarin_phone'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Phone',
	  '#description' => 'Sikarin International Hospital Phone Number',
	  '#default_value' => variable_get('sikarin_phone', '')
	);
	$form['hospitals5']['sikarin_contact'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Contact Person',
	  '#description' => 'Sikarin International Hospital Contact Person',
	  '#default_value' => variable_get('sikarin_contact', '')
	);
	$form['hospitals5']['sikarin_address'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Address',
	  '#description' => 'Sikarin International Hospital Address',
	  '#default_value' => variable_get('sikarin_address', ''),
	  '#rows' => 5,
	);
	return system_settings_form($form);
}
//Bangkok Smile Nana Sukhumvit Soi 5
//Bangkok Smile ASOK Sukhumvit Soi 21
//Bangkok Smile Ploenchit - bangkoksmileploenchit
//Bangkok Silom Smile Studio - bangkoksilomsmilestudio
//Phuket Sea Smile Dental Clinic (Jungceylon) - phuketseasmiledentalclinic
//Phuket Sea Smile International Dental Clinic
//Phuket Sea Smile @ The Kee Dental Clinic
function schedule_dental_hospitals_settings() {
	$form['hospitals'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Bangkok Smile Nana Sukhumvit Soi 5',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	);
	$form['hospitals']['bangkoksmilenanasukhumvit_phone'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Phone',
	  '#default_value' => variable_get('bangkoksmilenanasukhumvit_phone', '')
	);
	$form['hospitals']['bangkoksmilenanasukhumvit_contact'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Contact Person',
	  '#default_value' => variable_get('bangkoksmilenanasukhumvit_contact', '')
	);
	$form['hospitals']['bangkoksmilenanasukhumvit_address'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Address',
	  '#default_value' => variable_get('bangkoksmilenanasukhumvit_address', ''),
	  '#rows' => 5,
	);
	
	$form['hospitals2'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Bangkok Smile ASOK Sukhumvit Soi 21',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	);
	$form['hospitals2']['bangkoksmileasoksukhumvit_phone'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Phone',
	  '#default_value' => variable_get('bangkoksmileasoksukhumvit_phone', '')
	);
	$form['hospitals2']['bangkoksmileasoksukhumvit_contact'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Contact Person',
	  '#default_value' => variable_get('bangkoksmileasoksukhumvit_contact', '')
	);
	$form['hospitals2']['bangkoksmileasoksukhumvit_address'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Address',
	  '#default_value' => variable_get('bangkoksmileasoksukhumvit_address', ''),
	  '#rows' => 5,
	);
	
	$form['hospitals3'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Bangkok Smile Ploenchit',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	);
	$form['hospitals3']['bangkoksmileploenchit_phone'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Phone',
	  '#default_value' => variable_get('bangkoksmileploenchit_phone', '')
	);
	$form['hospitals3']['bangkoksmileploenchit_contact'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Contact Person',
	  '#default_value' => variable_get('bangkoksmileploenchit_contact', '')
	);
	$form['hospitals3']['bangkoksmileploenchit_address'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Address',
	  '#default_value' => variable_get('bangkoksmileploenchit_address', ''),
	  '#rows' => 5,
	);
	
	$form['hospitals4'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Bangkok Silom Smile Studio',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	);
	$form['hospitals4']['bangkoksilomsmilestudio_phone'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Phone',
	  '#default_value' => variable_get('bangkoksilomsmilestudio_phone', '')
	);
	$form['hospitals4']['bangkoksilomsmilestudio_contact'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Contact Person',
	  '#default_value' => variable_get('bangkoksilomsmilestudio_contact', '')
	);
	$form['hospitals4']['bangkoksilomsmilestudio_address'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Address',
	  '#default_value' => variable_get('bangkoksilomsmilestudio_address', ''),
	  '#rows' => 5,
	);
	
	$form['hospitals5'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Phuket Sea Smile Dental Clinic (Jungceylon)',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	);
	$form['hospitals5']['phuketseasmiledentalclinic_phone'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Phone',
	  '#default_value' => variable_get('phuketseasmiledentalclinic_phone', '')
	);
	$form['hospitals5']['phuketseasmiledentalclinic_contact'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Contact Person',
	  '#default_value' => variable_get('phuketseasmiledentalclinic_contact', '')
	);
	$form['hospitals5']['phuketseasmiledentalclinic_address'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Address',
	  '#default_value' => variable_get('phuketseasmiledentalclinic_address', ''),
	  '#rows' => 5,
	);
	// phuketseasmileinternationaldentalclinic
	$form['hospitals6'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Phuket Sea Smile International Dental Clinic',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	);
	$form['hospitals6']['phuketseasmileinternationaldentalclinic_phone'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Phone',
	  '#default_value' => variable_get('phuketseasmileinternationaldentalclinic_phone', '')
	);
	$form['hospitals6']['phuketseasmileinternationaldentalclinic_contact'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Contact Person',
	  '#default_value' => variable_get('phuketseasmileinternationaldentalclinic_contact', '')
	);
	$form['hospitals6']['phuketseasmileinternationaldentalclinic_address'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Address',
	  '#default_value' => variable_get('phuketseasmileinternationaldentalclinic_address', ''),
	  '#rows' => 5,
	);
	// phuketseasmilethekeedentalclinic
	$form['hospitals7'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Phuket Sea Smile @ The Kee Dental Clinic',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	);
	$form['hospitals7']['phuketseasmilethekeedentalclinic_phone'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Phone',
	  '#default_value' => variable_get('phuketseasmilethekeedentalclinic_phone', '')
	);
	$form['hospitals7']['phuketseasmilethekeedentalclinic_contact'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Contact Person',
	  '#default_value' => variable_get('phuketseasmilethekeedentalclinic_contact', '')
	);
	$form['hospitals7']['phuketseasmilethekeedentalclinic_address'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Address',
	  '#default_value' => variable_get('phuketseasmilethekeedentalclinic_address', ''),
	  '#rows' => 5,
	);
	return system_settings_form($form);
}
