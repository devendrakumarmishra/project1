<?php
/**
 * Makeover Schedule callback functions
 */
function makeover_schedule_settings() {
  $form['transfer'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Driver Email Settings',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	  '#description' => "Available tokens are: !client_name, !date_of_first_transfer, !transfer_details, !logo, !social_icons",
	);
	$form['transfer']['transfer_email'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Driver Email Address',
	  '#description' => 'Diver Email Address',
	  '#default_value' => variable_get('transfer_email', 'taweesak_bkk@hotmail.com')
	);
	$form['transfer']['transfer_email_from'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Email Address (From)',
	  '#description' => 'Email Address (From)',
	  '#default_value' => variable_get('transfer_email_from', 'swee@stunningmakeovers.com')
	);
  $form['transfer']['transfer_email_cc'] = array(
	  '#type' => 'textfield',
	  '#title' => 'CC Email Address',
	  '#description' => 'CC Email Address',
	  '#default_value' => variable_get('transfer_email_cc', 'swee@stunningmakeovers.com')
	);
	$form['transfer']['transfer_subject'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Subject',
	  '#description' => 'Subject',
	  '#default_value' => variable_get('transfer_subject', 'Transfers: !client_name//!date_of_first_transfer')
	);
	$form['transfer']['transfer_body'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Body',
	  '#description' => 'Mail text here',
	  '#default_value' => variable_get('transfer_body', ''),
	  '#rows' => 15,
	);
	
	$form['hoteldreamhotel'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Dream Hotel, Bangkok Email Settings',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	  '#description' => "Available tokens are: !client_name, !check_in_date, !check_out_date, !booking_details, !logo, !social_icons",
	);
	$form['hoteldreamhotel']['dreamhotel_email'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Email Address Dream Hotel, Bangkok',
	  '#description' => 'Email Address Dream Hotel, Bangkok',
	  '#default_value' => variable_get('dreamhotel_email', '')
	);
	$form['hoteldreamhotel']['dreamhotel_cc_email'] = array(
	  '#type' => 'textfield',
	  '#title' => 'CC Email Address',
	  '#description' => 'CC Email Address',
	  '#default_value' => variable_get('dreamhotel_cc_email', 'swee@stunningmakeovers.com, bianca@stunningmakeovers.com')
	);
	$form['hoteldreamhotel']['dreamhotel_email_from'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Email Address (From)',
	  '#description' => 'Email Address (From)',
	  '#default_value' => variable_get('dreamhotel_email_from', 'bianca@stunningmakeovers.com')
	);
	$form['hoteldreamhotel']['dreamhotel_subject'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Subject',
	  '#description' => 'Subject',
	  '#default_value' => variable_get('dreamhotel_subject', 'Reservation: !client_name//!check_in_date - !check_out_date')
	);
	$form['hoteldreamhotel']['dreamhotel_body'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Body',
	  '#description' => 'Mail text here',
	  '#default_value' => variable_get('dreamhotel_body', ''),
	  '#rows' => 15,
	);
	
	
	$form['hotaldeevana_resort'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Deevana Resort and Spa, Phuket Email Settings',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	  '#description' => "Available tokens are: !client_name, !check_in_date, !check_out_date, !booking_details, !logo, !social_icons",
	);
  $form['hotaldeevana_resort']['deevana_resort_email'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Email Address Deevana Resort and Spa, Phuket',
	  '#description' => 'Email Address Deevana Resort and Spa, Phuket',
	  '#default_value' => variable_get('deevana_resort_email', '')
	);
	$form['hotaldeevana_resort']['deevana_resort_cc_email'] = array(
	  '#type' => 'textfield',
	  '#title' => 'CC Email Address',
	  '#description' => 'CC Email Address',
	  '#default_value' => variable_get('deevana_resort_cc_email', 'swee@stunningmakeovers.com, bianca@stunningmakeovers.com')
	);
	$form['hotaldeevana_resort']['deevana_resort_email_from'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Email Address (From)',
	  '#description' => 'Email Address (From)',
	  '#default_value' => variable_get('deevana_resort_email_from', 'bianca@stunningmakeovers.com')
	);
	$form['hotaldeevana_resort']['deevana_resort_subject'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Subject',
	  '#description' => 'Subject',
	  '#default_value' => variable_get('deevana_resort_subject', 'Reservation: !client_name//!check_in_date - !check_out_date')
	);
	$form['hotaldeevana_resort']['deevana_resort_body'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Body',
	  '#description' => 'Mail text here',
	  '#default_value' => variable_get('deevana_resort_body', ''),
	  '#rows' => 15,
	);
	
	// Tour Mail Settings
	$form['tour'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Tour Email Settings',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	  '#description' => "Available tokens are: !client_name, !check_in_date, !check_out_date, !tour_details, !logo, !social_icons",
	);
  $form['tour']['tour_email'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Email Address (To)',
	  '#description' => 'Email Address Tour',
	  '#default_value' => variable_get('tour_email', '')
	);
	$form['tour']['tour_cc_email'] = array(
	  '#type' => 'textfield',
	  '#title' => 'CC Email Address',
	  '#description' => 'CC Email Address',
	  '#default_value' => variable_get('tour_cc_email', 'swee@stunningmakeovers.com, bianca@stunningmakeovers.com')
	);
	$form['tour']['tour_email_from'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Email Address (From)',
	  '#description' => 'Email Address (From)',
	  '#default_value' => variable_get('tour_email_from', 'bianca@stunningmakeovers.com')
	);
	$form['tour']['tour_subject'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Subject',
	  '#description' => 'Subject',
	  '#default_value' => variable_get('tour_subject', 'Tour Booking: !client_name//!check_in_date - !check_out_date')
	);
	$form['tour']['tour_body'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Body',
	  '#description' => 'Mail text here',
	  '#default_value' => variable_get('tour_body', ''),
	  '#rows' => 15,
	);
	
	// Tour Mail Settings
	$form['cruise'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'Dinner Cruise Email Settings',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	  '#description' => "Available tokens are: !client_name, !check_in_date, !check_out_date, !cruise_details, !logo, !social_icons",
	);
  $form['cruise']['cruise_email'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Email Address (To)',
	  '#description' => 'Email Address dinner cruise',
	  '#default_value' => variable_get('cruise_email', '')
	);
	$form['cruise']['cruise_cc_email'] = array(
	  '#type' => 'textfield',
	  '#title' => 'CC Email Address',
	  '#description' => 'CC Email Address',
	  '#default_value' => variable_get('cruise_cc_email', 'swee@stunningmakeovers.com, bianca@stunningmakeovers.com')
	);
	$form['cruise']['cruise_email_from'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Email Address (From)',
	  '#description' => 'Email Address (From)',
	  '#default_value' => variable_get('cruise_email_from', 'bianca@stunningmakeovers.com')
	);
	$form['cruise']['cruise_subject'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Subject',
	  '#description' => 'Subject',
	  '#default_value' => variable_get('cruise_subject', 'Dinner Cruise Booking: !client_name//!check_in_date - !check_out_date')
	);
	$form['cruise']['cruise_body'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Body',
	  '#description' => 'Mail text here',
	  '#default_value' => variable_get('cruise_body', ''),
	  '#rows' => 15,
	);
	
	// MOS to client Mail settings
	$form['mos'] = array(
	  '#type' => 'fieldset',
	  '#title' => 'MOS to client email settings',
	  '#collapsible' => TRUE,
	  '#collapsed' => false,
	);
	$form['mos']['mos_email'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Email Address (To)',
	  '#description' => 'Email Address of client for MOS',
	  '#default_value' => variable_get('mos_email', '')
	);
  $form['mos']['mos_email_from'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Email Address (From)',
	  '#description' => 'Email Address (From)',
	  '#default_value' => variable_get('mos_email_from', 'bianca@stunningmakeovers.com')
	);
	$form['mos']['mos_subject'] = array(
	  '#type' => 'textfield',
	  '#title' => 'Subject',
	  '#description' => 'Subject',
	  '#default_value' => variable_get('mos_subject', '')
	);
	$form['mos']['mos_body'] = array(
	  '#type' => 'textarea',
	  '#title' => 'Body',
	  '#description' => 'Mail text here',
	  '#default_value' => variable_get('mos_body', ''),
	  '#rows' => 15,
	);
  return system_settings_form($form);
}

/**
 * Send mail to client
 */
function _send_mail_to_client1($node, $variables) {
  global $base_url;
  $language = language_default();
  $params['headers']['Content-Type'] = 'text/html; charset=UTF-8;'; 
  $to = variable_get('mos_email', '');
  $from = variable_get('mos_email_from', '');
  $subject = t(variable_get('mos_subject', ''), $variables);
	$msg = t(variable_get('mos_body', ''), $variables);
  
  $attachments = array();
  $pdf_filepath = $base_url .'/' . variable_get('file_public_path','') .'/schedule/'  . $node->nid . '.pdf';
  $attachments[] = array(
		'path' => $pdf_filepath,
		'filecontent' => file_get_contents($pdf_filepath),
		'filename' => $node->nid . '.pdf',
		'mime' => 'application/pdf',
		'encoding' => 'base64',
		'disposition' => 'attachment',
		'list' => TRUE,
	);
  
  $module = 'mimemail';
  $token = time();
  $message = array(
		'id' => $module . '_' . $token,
		'to' => $to . ',',
		'subject' => $subject,
		'body' => nl2br($msg),
		'headers' => array(
			'From' => $from,
			'Sender' => $from,
			'Return-Path' => $from,
			'MIME-Version' => '1.0',
			'Content-Type' => 'text/html; charset=UTF-8',
		),
	);

	$message['params']['attachments'] = $attachments;

	$system = drupal_mail_system($module, $token);
	$message = $system->format($message);

	if ($system->mail($message)) {
		drupal_set_message('Your MOS has been sent successfully');
		watchdog('debug','MOS mail has been sent.');
	}
	else {
		drupal_set_message('MOS failed to send. Try again or contact us through the contact form');
		watchdog('debug','MOS mail has not been sent.');
	}
}

function _send_mail_to_client($node, $variables) {
  global $base_url;
  require_once(libraries_get_path('phpmailer') . '/class.phpmailer.php');
  $language = language_default();
  
  $to = variable_get('mos_email', '');
  $from = variable_get('mos_email_from', '');
  $subject = t(variable_get('mos_subject', ''), $variables);
	$body = t(variable_get('mos_body', ''), $variables);
  
  
  if (!empty($to)) {
    
    $filepath[] = 'sites/default/files/schedule/'  . $node->nid . '.pdf';
    
    $from = variable_get('site_mail', '');
    $email = new PHPMailer();
    $email->From      = $from;
    $email->FromName  = 'Stunning Makeovers- Ann Angcao';
    $email->Subject   = $subject;
    $email->Body      = $body;
    $email->AddAddress($to);
    
    if (sizeof($filepath) > 0) {
      foreach ($filepath as $key => $value) {
        $email->AddAttachment($filepath[$key]);
      }
    }
      
    if ($email->Send()) {
      drupal_set_message(t('Your MOS has been sent successfully'));
		  watchdog('debug','MOS mail has been sent.');
    }
    else {
      drupal_set_message(t('MOS failed to send. Try again or contact us through the contact form'),'error');
		  watchdog('debug','MOS mail has not been sent.');
    }
  }
  
}

/**
 * Send mail to hotel
 */
function _send_mail_to_hotel($hotal, $variables) {
  $language = language_default();
  $params['headers']['Content-Type'] = 'text/html; charset=UTF-8;'; 
  // Deevana Resort
  if ($hotal == 93) {
		$to = variable_get('deevana_resort_email', '');
		$cc = variable_get('deevana_resort_cc_email', '');
		$from = variable_get('deevana_resort_email_from', '');
		$subject = t(variable_get('deevana_resort_subject', ''), $variables);
		$body = t(variable_get('deevana_resort_body', ''), $variables);
	}
	// Dream Hotel
	if ($hotal == 92) {
		$to = variable_get('dreamhotel_email', '');
		$cc = variable_get('dreamhotel_cc_email', '');
		$from = variable_get('dreamhotel_email_from', '');
		$subject = t(variable_get('dreamhotel_subject', ''), $variables);
		$body = t(variable_get('dreamhotel_body', ''), $variables);
	}
	$send = TRUE;
	$params['subject'] = $subject;
	$params['body'] = $body;
	if($cc) {
		$params['headers']['Cc'] = $cc; 
	} 
	$result = drupal_mail('stu_schedule', 'hotalbooking', $to, $language, $params, $from, $send);
	if ($result['result'] == TRUE) {
		drupal_set_message(t('Your message has been sent to hotel - !to.',array('!to' => $to)));
    watchdog('debug', 'Your message has been sent to hotel - !to.', array('!to' => $to), WATCHDOG_INFO);
	}
	else {
		drupal_set_message(t('There was a problem sending your message and it was not sent.'), 'error');
    watchdog('debug', 'Your message has not been sent to hotel - !to.', array('!to' => $to), WATCHDOG_INFO);
	}
}

/**
 * Send mail to Driver
 */
function _send_transfer_mail($variables) {
	$language = language_default();
  $to = variable_get('transfer_email', '');
	$from = variable_get('transfer_email_from', '');
  $cc = variable_get('transfer_email_cc', '');
	$subject = t(variable_get('transfer_subject', ''), $variables);
	$body = t(variable_get('transfer_body', ''), $variables);
	
	$send = TRUE;
	$params['subject'] = $subject;
	$params['body'] = $body;
	if($cc) {
		$params['headers']['Cc'] = $cc; 
	} 
	$result = drupal_mail('stu_schedule', 'transfer', $to, $language, $params, $from, $send);
	if ($result['result'] == TRUE) {
		drupal_set_message(t('Your message has been sent to driver - !to.',array('!to' => $to)));
    watchdog('debug', 'Your message has been sent to driver - !to.', array('!to' => $to), WATCHDOG_INFO);
	}
	else {
		drupal_set_message(t('There was a problem sending your message and it was not sent.'), 'error');
    watchdog('debug', 'Your message has not been sent to driver - !to.', array('!to' => $to), WATCHDOG_INFO);
	}
}

/**
 * Send mail for tour
 */
function _send_tour_mail($variables) {
	$language = language_default();
  $to = variable_get('tour_email', '');
  $cc = variable_get('tour_cc_email','');
	$from = variable_get('tour_email_from', '');
	$subject = t(variable_get('tour_subject', ''), $variables);
	$body = t(variable_get('tour_body', ''), $variables);
	
	$send = TRUE;
	$params['subject'] = $subject;
	$params['body'] = $body;
	if($cc) {
		$params['headers']['Cc'] = $cc; 
	} 
	$result = drupal_mail('stu_schedule', 'tour', $to, $language, $params, $from, $send);
	if ($result['result'] == TRUE) {
		drupal_set_message(t('Your message has been sent to - !to. tour manager',array('!to' => $to)));
    watchdog('debug', 'Your message has been sent to - !to. tour manager.', array('!to' => $to), WATCHDOG_INFO);
	}
	else {
		drupal_set_message(t('There was a problem sending your message and it was not sent.'), 'error');
    watchdog('debug', 'Your message has not been sent to - !to. tour manager.', array('!to' => $to), WATCHDOG_INFO);
	}
}

/**
 * Send mail for cruise
 */
function _send_cruise_mail($variables) {
	$language = language_default();
  $to = variable_get('cruise_email', '');
  $cc = variable_get('cruise_cc_email','');
	$from = variable_get('cruise_email_from', '');
	$subject = t(variable_get('cruise_subject', ''), $variables);
	$body = t(variable_get('cruise_body', ''), $variables);
	
	$send = TRUE;
	$params['subject'] = $subject;
	$params['body'] = $body;
	if($cc) {
		$params['headers']['Cc'] = $cc; 
	} 
	$result = drupal_mail('stu_schedule', 'cruise', $to, $language, $params, $from, $send);
	if ($result['result'] == TRUE) {
		drupal_set_message(t('Your message has been sent to - !to.',array('!to' => $to)));
    watchdog('debug', 'Your message has been sent to - !to. tour cruise manager.', array('!to' => $to), WATCHDOG_INFO);
	}
	else {
		drupal_set_message(t('There was a problem sending your message and it was not sent.'), 'error');
    watchdog('debug', 'Your message has not been sent to - !to. tour cruise manager.', array('!to' => $to), WATCHDOG_INFO);
	}
}

