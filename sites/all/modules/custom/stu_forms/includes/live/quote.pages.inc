<?php

/**
 * Quote callback functions
 */
 /**
 * Function to get cost by location
 * $location_nid = 2 For (Bangkok) & 21 for Phuket
 */
function _getSurgeryPriceByLocation($surgeries, $destinations) {
	$price = array();
	$night = array();
	$procedures = array();
	$lipo = array(25,26,27,28,29,30,31,32);
	$lipo_vaser = array(61,62,63,64,65,67,68);
	$lipo_status = true;
	$lipo_vaser_status = true;
	$parents = _getAllParents();
	if (sizeof($destinations) > 0) {
		foreach ($destinations as $location_nid => $destination) {
			if (sizeof($surgeries) > 0) {
				foreach ($surgeries as $surgery) {
					if (!in_array($surgery[tid], $parents)) { // Filter out parent terms
						// Get Nights
						$nights = db_select('field_data_field_procedure_nights','p')
							 -> fields('p',array('field_procedure_nights_value'))
							 -> condition('bundle', 'surgery_only', '=')
							 -> condition('entity_type', 'taxonomy_term', '=')
							 -> condition('entity_id', $surgery[tid] , '=')
							 -> execute()->fetchField();
						
						if (is_numeric($nights)) {
							$night[$surgery[tid]] = $nights;
						}
						// Get Cost
								$query = db_select('field_data_field_procedures','p');
								$query->join('field_data_field_procedure_city', 'city', 'p.field_procedures_value = city.entity_id');
								$query->join('field_data_field_procedure_cost', 'cost', 'cost.entity_id = city.entity_id');
								$query->fields('cost',array('field_procedure_cost_value'))
										 -> condition('p.bundle', 'surgery_only', '=')
										 -> condition('p.entity_type', 'taxonomy_term', '=')
										 -> condition('p.entity_id', $surgery[tid] , '=')
										 -> condition('city.field_procedure_city_nid', $location_nid , '=');
						$cost = $query->execute()->fetchField();
						
						if (in_array($surgery[tid], $lipo_vaser) && ($lipo_vaser_status && $location_nid == 21)) {
							$output[$location_nid]['price'][$surgery[tid]] 	= '80000';
							$output[$location_nid]['procedures'][$surgery[tid]] 	= db_query("SELECT name FROM {taxonomy_term_data} WHERE tid = :tid", array(':tid' => $surgery[tid]))->fetchField();
							$lipo_vaser_status = false;
						}
						else if (in_array($surgery[tid], $lipo) && ($lipo_status && $location_nid == 21)) {
							$output[$location_nid]['price'][$surgery[tid]] 	= '60000';
							$output[$location_nid]['procedures'][$surgery[tid]] 	= db_query("SELECT name FROM {taxonomy_term_data} WHERE tid = :tid", array(':tid' => $surgery[tid]))->fetchField();
							$lipo_status = false;
						}
						else {
							$output[$location_nid]['price'][$surgery[tid]] 	= $cost;
							$output[$location_nid]['procedures'][$surgery[tid]] 	= db_query("SELECT name FROM {taxonomy_term_data} WHERE tid = :tid", array(':tid' => $surgery[tid]))->fetchField();
						}
					}
				}
				// Total Nights (take max)
				$output[$location_nid]['night4surgery'] = max($night);
				
				if (sizeof($night) == 2) {
				  if (max($night) <= 12) {
					  $output[$location_nid]['night4surgery'] = 12;	
					}
					else if (max($night) > 12) {
						$output[$location_nid]['night4surgery'] = max($night);	
					}
				}
				else if (sizeof($night) >= 3) {
				  if (max($night) <= 14) {
					  $output[$location_nid]['night4surgery'] = 14;	
					}
					else if (max($night) > 14) {
						$output[$location_nid]['night4surgery'] = max($night);	
					}	
				}
				
				// Booking Cost
				$output[$location_nid]['surgerybooking'] = ($location_nid == 2) ? variable_get('makeover_surgery_booking_fee', '') : variable_get('makeover_outpatient_booking_fee','');
				// Tranfer Cost
				$output[$location_nid]['transferCost'] = ($location_nid == 2) ? variable_get('makeover_surgery_transfer_cost', '') : variable_get('makeover_outpatient_transfer_cost','');
				// Location
				$output[$location_nid]['location'] = ucfirst($destination);
			}
	  }
	}
	return $output;
}


/**
 * Function to get cost by location
 * $location_nid = 2 For (Bangkok) & 21 for Phuket
 */
function _getHairTransplantPriceByLocation($hairTransplants, $destinations) {
	$price = array();
	$night = array();
	$procedures = array();
	$parents = _getAllParents();
	if (sizeof($destinations) > 0) {
		foreach ($destinations as $location_nid => $destination) {
			if (sizeof($hairTransplants) > 0) {
				foreach ($hairTransplants as $hairTransplant) {
					if (!in_array($hairTransplant[tid], $parents)) { // Filter out parent terms
						// Get Nights
						$nights = db_select('field_data_field_procedure_nights','p')
							 -> fields('p',array('field_procedure_nights_value'))
							 -> condition('bundle', 'hair_transplant', '=')
							 -> condition('entity_type', 'taxonomy_term', '=')
							 -> condition('entity_id', $hairTransplant[tid] , '=')
							 -> execute()->fetchField();
						
						if (is_numeric($nights)) {
							$night[$hairTransplant[tid]] = $nights;
						}
						// Get Cost
								$query = db_select('field_data_field_procedures','p');
								$query->join('field_data_field_procedure_city', 'city', 'p.field_procedures_value = city.entity_id');
								$query->join('field_data_field_procedure_cost', 'cost', 'cost.entity_id = city.entity_id');
								$query->fields('cost',array('field_procedure_cost_value'))
										 -> condition('p.bundle', 'hair_transplant', '=')
										 -> condition('p.entity_type', 'taxonomy_term', '=')
										 -> condition('p.entity_id', $hairTransplant[tid] , '=')
										 -> condition('city.field_procedure_city_nid', $location_nid , '=');
						$cost = $query->execute()->fetchField();
						//if (is_numeric($cost)) {
							$output[$location_nid]['price'][$hairTransplant[tid]] 	= $cost;
							$output[$location_nid]['procedures'][$hairTransplant[tid]] 	= db_query("SELECT name FROM {taxonomy_term_data} WHERE tid = :tid", array(':tid' => $hairTransplant[tid]))->fetchField();
						//}
					}
				}
				// Total Nights (take max)
				$output[$location_nid]['night4surgery'] = max($night);
				
				if (sizeof($night) == 2) {
				  if (max($night) <= 12) {
					  $output[$location_nid]['night4surgery'] = 12;	
					}
					else if (max($night) > 12){
						$output[$location_nid]['night4surgery'] = max($night);	
					}
				}
				else if (sizeof($night) >= 3) {
				  if (max($night) <= 14) {
					  $output[$location_nid]['night4surgery'] = 14;	
					}
					else if (max($night) > 14){
						$output[$location_nid]['night4surgery'] = max($night);	
					}	
				}
				
				// Booking Cost
				$output[$location_nid]['surgerybooking'] = ($location_nid == 2) ? variable_get('makeover_surgery_booking_fee', '') : variable_get('makeover_outpatient_booking_fee','');
				// Tranfer Cost
				$output[$location_nid]['transferCost'] = ($location_nid == 2) ? variable_get('makeover_surgery_transfer_cost', '') : variable_get('makeover_outpatient_transfer_cost','');
				// Optional Accommodation & Transfers
				$output[$location_nid]['accommodation_transfers'] = ($location_nid == 2) ? variable_get('makeover_outpatient_hair_transplant_bangkok', '') : variable_get('makeover_outpatient_hair_transplant_phuket','');
				// Location
				$output[$location_nid]['location'] = ucfirst($destination);
			}
		}
	}
	return $output;
}

/**
 * Function to get cost by location
 * $location_nid = 2 For (Bangkok) & 21 for Phuket
 */
function _getDentalPriceByLocation($dentals, $destinations) {
	$price = array();
	$night = array();
	$procedures = array();
	$parents = _getAllParents();
	if (sizeof($destinations) > 0) {
		foreach ($destinations as $location_nid => $destination) {
			if (sizeof($dentals) > 0) {
				foreach ($dentals as $dental) {
					if (!in_array($dental[tid], $parents)) { // Filter out parent terms
						// Get Nights
						$nights = db_select('field_data_field_procedure_nights','p')
							 -> fields('p',array('field_procedure_nights_value'))
							 -> condition('bundle', 'dental_only', '=')
							 -> condition('entity_type', 'taxonomy_term', '=')
							 -> condition('entity_id', $dental[tid] , '=')
							 -> execute()->fetchField();
					 if (is_numeric($nights)) {
							$night[$dental[tid]] = $nights;
						} 
						// Get Cost
								$query = db_select('field_data_field_procedures','p');
								$query->join('field_data_field_procedure_city', 'city', 'p.field_procedures_value = city.entity_id');
								$query->join('field_data_field_procedure_cost', 'cost', 'cost.entity_id = city.entity_id');
								$query->fields('cost',array('field_procedure_cost_value'))
										 -> condition('p.bundle', 'dental_only', '=')
										 -> condition('p.entity_type', 'taxonomy_term', '=')
										 -> condition('p.entity_id', $dental[tid] , '=')
										 -> condition('city.field_procedure_city_nid', $location_nid , '=');
						$cost = $query->execute()->fetchField();
						//if (is_numeric($cost)) {
							$output[$location_nid]['price'][$dental[tid]] 	= $cost;
							$output[$location_nid]['procedures'][$dental[tid]] 	= db_query("SELECT name FROM {taxonomy_term_data} WHERE tid = :tid", array(':tid' => $dental[tid]))->fetchField();
						//}
					}
				}
				// Total Nights (take max)
				$output[$location_nid]['night4dental'] = max($night);
				
				if (sizeof($night) == 2) {
				  if (max($night) <= 12) {
					  $output[$location_nid]['night4surgery'] = 12;	
					}
					else if (max($night) > 12) {
						$output[$location_nid]['night4surgery'] = max($night);	
					}
				}
				else if (sizeof($night) >= 3) {
				  if (max($night) <= 14) {
					  $output[$location_nid]['night4surgery'] = 14;	
					}
					else if (max($night) > 14) {
						$output[$location_nid]['night4surgery'] = max($night);	
					}	
				}
				
				// Booking Cost fixed
				$output[$location_nid]['dentalbooking'] = variable_get('makeover_dental_booking_fee', 50);
				
				// note, no transfers included if only dental treatment is requested
				$output[$location_nid]['transferCost'] = 0;
				
				// Location
				$output[$location_nid]['location'] = ucfirst($destination);
			}
		}
	}
	return $output;
}


/**
 * Estimate for Hair Transplant only
 */
function _sendmail_quote_hair_transplant_estimate($values, $hotalPrice, $exchangeRate, $hairTransplants, $preferred_currency) {
	global $base_url;
	$send = TRUE;
  $language = language_default();
  $variables = array();
  $to = $values['field_sg_email'][LANGUAGE_NONE][0][email];
  $surgeries = $values['field_surgical_procedures'][LANGUAGE_NONE];
  $dentals = $values['field_dental_procedures'][LANGUAGE_NONE];
  
  $estimate = theme(
   'quote_hair_estimate', 
		 array(
			'hotalPrice' => $hotalPrice, 
			'exchangeRate' => $exchangeRate, 
			'hairTransplants' => $hairTransplants,
			'currency' => $preferred_currency,
		 )
  );

  // variables
  $first_name  = $values['field_sg_first_name'][LANGUAGE_NONE][0][value];
  $last_name  = $values['field_sg_last_name'][LANGUAGE_NONE][0][value];
  $variables['!name'] = ucwords($first_name);
  $variables['!estimate'] = $estimate;
  $variables['!hair_image1'] = "<span style='margin:10 0px;'><img width='200' src='$base_url/sites/all/themes/smo/images/email_templates/hair_image1.jpg'/></span>";
  $variables['!hair_transplant'] = "<span style='margin:10 0px;'><img src='$base_url/sites/all/themes/smo/images/email_templates/hair_transplant.jpg' width='500px' /></span>";
  
  
  $variables['!face_neck'] = 
  "<span style='margin:10 0px;'><img src='$base_url/sites/all/themes/smo/images/email_templates/face_neck.jpg' width='260' height='100' /></span>";
  $variables['!breasts'] = 
  "<span style='margin:10 0px;'><img src='$base_url/sites/all/themes/smo/images/email_templates/breasts.jpg' width='270' height='85'/></span>";
  $variables['!dental_treatment'] = 
  "<span style='margin:10 0px;'><img src='$base_url/sites/all/themes/smo/images/email_templates/dental_treatment.jpg' width='600' height='100' /></span>";
  $variables['!hair_transplant'] = 
  "<span style='margin:10 0px;'><img src='$base_url/sites/all/themes/smo/images/email_templates/hair_transplant.jpg' width='500' height='100' /></span>";
  $variables['!tummy'] = "<span style='margin:10 0px;'><img src='$base_url/sites/all/themes/smo/images/email_templates/tummy.jpg' width='265' height='150' /></span>";
  // Social Media Icons in mail footer
  $variables['!social_icons'] = "<div><table border=0 style='margin-top:-30px;' valign='top'>
  <tr>
  <td valign='top'><a href='https://www.facebook.com/stunningmakeovers'>
  <img src='$base_url/sites/all/themes/smo/images/mailicon.png'/></a></td>
  <td valign='top'><a href='http://www.stunningmakeovers.com/index.php?option=com_facileforms&Itemid=57'>
  <img src= '$base_url/sites/all/themes/smo/images/mailcontact.png'/></a></td>
  <td valign='top'><a href='http://www.stunningmakeovers.com/'>
  <img src= '$base_url/sites/all/themes/smo/images/mailhome.png'/></a></td>
  </tr>
  </table></div>";
  
 
  $variables['!findusonfb'] = "<div style='margin-top:-10px;margin-bottom:-10px;'><a href='https://www.facebook.com/stunningmakeovers'><img src= '$base_url/sites/all/themes/smo/images/email_templates/findusonfb.png' width='100px' ></a></div>";
  
  // Logo in mail
  $variables['!logo'] = "<span style='margin:2px;'><img src= '$base_url/sites/all/themes/smo/logo.png' width='200px' height='58px'></a></span>";
  $variables['!group_trips'] = l(t('group trips'), url('group-trip', array('absolute' => true)));
  $variables['!accommodation'] = l(t('Accommodation'), url('surgery-accommodation', array('absolute' => true)));
  $variables['!surgeons_form_url'] = l(t('Surgeons Form '), url('node/add/surgeon', array('absolute' => true)));
  
  $params['subject'] = t(variable_get('hair_transplant_subject', ''), $variables);
	$body = t(variable_get('hair_transplant_body', ''), $variables);
	$params['body'] = $body;
	
	$from = variable_get('quote_surgery_sender','');
	$params['headers']['Content-Type'] = 'text/html; charset=UTF-8;'; 
	if(variable_get('bcc_notification_receiver', '')) {
	  $params['headers']['Bcc'] = variable_get('bcc_notification_receiver', ''); 
	} 
    
	$result = drupal_mail('makeover', 'quote_form', $to, $language, $params, $from, $send);
	if ($result['result'] == TRUE) {
    drupal_set_message(t('Your message has been sent.'));
  }
  else {
    drupal_set_message(t('There was a problem sending your message and it was not sent.'), 'error');
  }
}


/**
 * Estimate for Dental only
 */
function _sendmail_quote_dental_estimate($values, $hotalPrice, $exchangeRate, $dentalEstimate, $preferred_currency) {
	global $base_url;
	 // Send mail to user whose have submitted the form
  $send = TRUE;
  $language = language_default();
  $variables = array();
  $to = $values['field_sg_email'][LANGUAGE_NONE][0][email];
  $dentals = $values['field_dental_procedures'][LANGUAGE_NONE];
  
  $estimate = theme(
   'quote_dental_estimate', 
		 array(
			'hotalPrice' => $hotalPrice, 
			'exchangeRate' => $exchangeRate, 
		  'dentalEstimate' => $dentalEstimate,
		  'currency' => $preferred_currency,
		)
  );
  
  // variables
  $first_name  = $values['field_sg_first_name'][LANGUAGE_NONE][0][value];
  $last_name  = $values['field_sg_last_name'][LANGUAGE_NONE][0][value];
  
  $variables['!name'] = ucwords($first_name);
  $variables['!group_trip'] = '';
  $variables['!accommodation'] = '';
  $variables['!dental_implants'] = '';
  $variables['!example_photo'] = '';
  $variables['!mailicons'] = '';
  $variables['!estimate'] = '';
  
  // <link to group trip page>
  $variables['!group_trips'] = l(t('group trips'), url('group-trip', array('absolute' => true)));
  $variables['!accommodation'] = l(t('Accommodation'), url('dental-accommodation', array('absolute' => true)));
  $variables['!dental_implants'] = l(t('Dental Implants'), url('dental-implant', array('absolute' => true)));
  $variables['!example_photo'] = "<span style='margin:10 0px;'><img src='$base_url/sites/all/themes/smo/images/email_templates/emaildental.jpg' width='500px' /></span>";
  $variables['!social_icons'] = "<div><table border=0 style='margin-top:-30px;' valign='top'>
  <tr>
  <td valign='top'><a href='https://www.facebook.com/stunningmakeovers'>
  <img src='$base_url/sites/all/themes/smo/images/mailicon.png'/></a></td>
  <td valign='top'><a href='http://www.stunningmakeovers.com/index.php?option=com_facileforms&Itemid=57'>
  <img src= '$base_url/sites/all/themes/smo/images/mailcontact.png'/></a></td>
  <td valign='top'><a href='http://www.stunningmakeovers.com/'>
  <img src= '$base_url/sites/all/themes/smo/images/mailhome.png'/></a></td>
  </tr>
  </table></div>";
   $variables['!findusonfb'] = "<div style='margin-top:-10px;margin-bottom:-10px;'><a href='https://www.facebook.com/stunningmakeovers'><img src= '$base_url/sites/all/themes/smo/images/email_templates/findusonfb.png' width='100px' ></a></div>";

  $variables['!logo'] = "<span style='margin:2px;'><img src= '$base_url/sites/all/themes/smo/logo.png' width='200px' height='58px'></a></span>";
  $variables['!surgeons_form_url'] = l(t('Surgeons Form '), url('node/add/surgeon', array('absolute' => true)));
  $variables['!estimate'] = $estimate;
  
  $from = variable_get('dental_sender','');
	$params['subject'] = t(variable_get('dental_subject', ''), $variables);
	$body = t(variable_get('dental_body', ''), $variables);	
	$params['body'] = $body;
	if(variable_get('bcc_notification_receiver', '')) {
	  $params['headers']['Bcc'] = variable_get('bcc_notification_receiver', ''); 
	}
  $result = drupal_mail('makeover', 'quote_form', $to, $language, $params, $from, $send);
	if ($result['result'] == TRUE) {
    drupal_set_message(t('Your message has been sent.'));
  }
  else {
    drupal_set_message(t('There was a problem sending your message and it was not sent.'), 'error');
  }
}

/**
 * Estimate for Surgery with or without Dental
 */
function _sendmail_quote_surgery_estimate($values, $hotalPrice, $exchangeRate, $surgeryEstimate, $dentalEstimate, $preferred_currency) {
  global $base_url;
  $send = TRUE;
  $language = language_default();
  $variables = array();
  $to = $values['field_sg_email'][LANGUAGE_NONE][0][email];
  $surgeries = $values['field_surgical_procedures'][LANGUAGE_NONE];
  $dentals = $values['field_dental_procedures'][LANGUAGE_NONE];
  
  $estimate = theme(
   'quote_surgery_estimate', 
		 array(
			'hotalPrice' => $hotalPrice, 
			'exchangeRate' => $exchangeRate, 
			'surgeryEstimate' => $surgeryEstimate, 
			'dentalEstimate' => $dentalEstimate,
			'currency' => $preferred_currency,
		)
  );
  
  // variables
  
  $variables['!estimate'] = '';
  
  $variables['!face_neck'] = 
  "<span style='margin:10 0px;'><img src='$base_url/sites/all/themes/smo/images/email_templates/face_neck.jpg' width='260' height='100' /></span>";
  $variables['!breasts'] = 
  "<span style='margin:10 0px;'><img src='$base_url/sites/all/themes/smo/images/email_templates/breasts.jpg' width='270' height='85'/></span>";
  $variables['!dental_treatment'] = 
  "<span style='margin:10 0px;'><img src='$base_url/sites/all/themes/smo/images/email_templates/dental_treatment.jpg' width='600' height='100' /></span>";
  $variables['!hair_transplant'] = 
  "<span style='margin:10 0px;'><img src='$base_url/sites/all/themes/smo/images/email_templates/hair_transplant.jpg' width='500' height='100' /></span>";
  $variables['!tummy'] = "<span style='margin:10 0px;'><img src='$base_url/sites/all/themes/smo/images/email_templates/tummy.jpg' width='265' height='150' /></span>";
  // Social Media Icons in mail footer
  $variables['!social_icons'] = "<div><table border=0 style='margin-top:-30px;' valign='top'>
  <tr>
  <td valign='top'><a href='https://www.facebook.com/stunningmakeovers'>
  <img src='$base_url/sites/all/themes/smo/images/mailicon.png'/></a></td>
  <td valign='top'><a href='http://www.stunningmakeovers.com/index.php?option=com_facileforms&Itemid=57'>
  <img src= '$base_url/sites/all/themes/smo/images/mailcontact.png'/></a></td>
  <td valign='top'><a href='http://www.stunningmakeovers.com/'>
  <img src= '$base_url/sites/all/themes/smo/images/mailhome.png'/></a></td>
  </tr>
  </table></div>";
  // Logo in mail
  $variables['!findusonfb'] = "<div style='margin-top:-10px;margin-bottom:-10px;'><a href='https://www.facebook.com/stunningmakeovers'><img src= '$base_url/sites/all/themes/smo/images/email_templates/findusonfb.png' width='100px' ></a></div>";

  $variables['!logo'] = "<span style='margin:2px;'><img src= '$base_url/sites/all/themes/smo/logo.png' width='200px' height='58px'></a></span>";
  $variables['!group_trips'] = l(t('group trips'), url('group-trip', array('absolute' => true)));
  $variables['!accommodation'] = l(t('Accommodation'), url('surgery-accommodation', array('absolute' => true)));
  $variables['!surgeons_form_url'] = l(t('Surgeons Form '), url('node/add/surgeon', array('absolute' => true)));
  $variables['!estimate'] = $estimate;
  $first_name  = $values['field_sg_first_name'][LANGUAGE_NONE][0][value];
  $last_name  = $values['field_sg_last_name'][LANGUAGE_NONE][0][value];
  $variables['!name'] = ucwords($first_name);
  
  $from = variable_get('quote_surgery_sender','');
  $params['subject'] = t(variable_get('quote_surgery_subject', ''), $variables);
	$body = t(variable_get('quote_surgery_body', ''), $variables);	
	$params['body'] = $body;
	if(variable_get('bcc_notification_receiver', '')) {
	  $params['headers']['Bcc'] = variable_get('bcc_notification_receiver', ''); 
	}
	$result = drupal_mail('makeover', 'quote_form', $to, $language, $params, $from, $send);
	if ($result['result'] == TRUE) {
    drupal_set_message(t('Your message has been sent to customer.'));
  }
  else {
    drupal_set_message(t('There was a problem sending your message and it was not sent.'), 'error');
  }
}

/**
 * Get symbol
 */
function _currency_symbol() {
  return array(
   'GBP' => '£', 
   'AUD' => '$',
   'CAD' => '$',
   'HKD' => '$',
   'NZD' => '$',
   'MYR' => 'RM',
   'THB' => '฿',
  );	
}

/**
 * function to send get a quote notification to staff member.
 */
function _sendmail_quote_estimate_notification_staff($node) {
	$send = TRUE;
  $language = language_default();
  $variables = array();
  // Fields
	$fname = $node->field_sg_first_name[LANGUAGE_NONE][0][value];
	$lname = $node->field_sg_last_name[LANGUAGE_NONE][0][value];
	$from = $node->field_sg_email[LANGUAGE_NONE][0][email];
  $to = variable_get('notification_receiver','');
  $name = $fname;
	
	$varibles['!name'] = ucwords($name);
	$varibles['!userurl'] = l(t('click here'), url('user/' . $node->uid, array('absolute' => TRUE)));
	$varibles['!nodeurl'] = l(t('click here'), url('node/' . $node->nid, array('absolute' => TRUE)));
	
  $subject = t(variable_get('notification_staff_subject',''),$varibles);
	$body = t(variable_get('notification_staff_body', ''), $varibles);
	
	$params['subject'] = $subject;
  $params['body'] = $body;
	
	$result = drupal_mail('makeover', 'quote_form_staff', $to, $language, $params, $from, $send);
	
	if ($result['result'] == TRUE) {
    drupal_set_message(t('Your message has been sent to staff member.'));
  }
  else {
    drupal_set_message(t('There was a problem sending your message and it was not sent.'), 'error');
  }
}

/**
 * Welcome page for Quote/Surgeon
 */
function _thank_you_page($type) {
	$output = '';
	
	$message = drupal_get_messages();
	unset($messages['status']);
	
  if ($type == 'surgeon') {
		$output = nl2br(variable_get('surgeon_welcome', '')) ;
  }
  else if ($type == 'quote') {
		$output = nl2br(variable_get('quote_welcome', '')) ;
  }
  return $output;	
}
