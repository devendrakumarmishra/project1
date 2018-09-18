<?php
/**
 * function to send feedback notification to staff member.
 */
function _sendmail_feedback_notification_staff($node) {
	$send = TRUE;
  $language = language_default();
  $variables = array();
  // Fields
	$from = variable_get('site_mail', ini_get('sendmail_from'));
  $to = variable_get('feedback_receiver','');
  $subject = "Client Feedback";
  $nodeload = node_load($node->nid);
	$body = drupal_render(node_view($nodeload));
	$params['subject'] = $subject;
  $params['body'] = $body;
	
	$result = drupal_mail('makeover', 'quote_form_staff', $to, $language, $params, $from, $send);
	
	if ($result['result'] == TRUE) {
    drupal_set_message(t('We have received your feedback with thanks.'));
  }
  else {
    drupal_set_message(t('There was a problem sending your message and it was not sent.'), 'error');
  }
}
