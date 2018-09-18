<?php

/**
 * @file
 * Customize the e-mails sent by Webform after successful submission.
 *
 * This file may be renamed "webform-mail-[nid].tpl.php" to target a
 * specific webform e-mail on your site. Or you can leave it
 * "webform-mail.tpl.php" to affect all webform e-mails on your site.
 *
 * Available variables:
 * - $node: The node object for this webform.
 * - $submission: The webform submission.
 * - $email: The entire e-mail configuration settings.
 * - $user: The current user submitting the form.
 * - $ip_address: The IP address of the user submitting the form.
 *
 * The $email['email'] variable can be used to send different e-mails to different users
 * when using the "default" e-mail template.
 */
?>

<?php 
/* print ($email['html'] ? '<p>' : '') . t('Submitted on %date'). ($email['html'] ? '</p>' : '');  ?>

<?php if ($user->uid): ?>
<?php print ($email['html'] ? '<p>' : '') . t('Submitted by user: %username') . ($email['html'] ? '</p>' : ''); ?>
<?php else: ?>
<?php print ($email['html'] ? '<p>' : '') . t('Submitted by anonymous user: [%ip_address]') . ($email['html'] ? '</p>' : ''); ?>
<?php endif; ?>

<?php print ($email['html'] ? '<p>' : '') . t('Submitted values are') . ':' . ($email['html'] ? '</p>' : ''); ?>

%email_values



<?php print ($email['html'] ? '<p>' : '') . t('The results of this submission may be viewed at:') . ($email['html'] ? '</p>' : '') ?>

<?php print ($email['html'] ? '<p>' : ''); ?>%submission_url<?php print ($email['html'] ? '</p>' : '');  */?>
<?php
// Some preprocessing
  $surgery = FALSE;
  $salutation = str_replace('[name]', $submission->data[1][value][0], $node->field_mail_salutation[0]['value']);
  $destinations = makeover_destinations_select('nid');
  foreach ($destinations as $nid => $destination) $destinations[$nid] = node_load($nid);

  $curr_conversion_value = $submission->data[43][value][0];
  $curr_format = $submission->data[44][value][0];
  $curr_country = '';
  $parts = explode(' ', $curr_format);
  if (isset($parts[1])) {
    $curr_format = $parts[1];
	$curr_country = $parts[0];
  }
  else $curr_format = $parts[0];
  $row = stu_get_row_from_table($node->field_mail_table_header[0]['value']);
  $header_row = $row['row'];
  //  We do this here to get the generic row html for subsequent content rows and the row styling
  $row = stu_get_row_from_table($node->field_mail_table_content[0]['value'], 1);
  $subsequent_row = $row['row'];
  //
  $style = $row['style']; // get the style of the content row
  $cols = substr_count($header_row, '<td');
  $total_span = $cols - 1;  //  the totals row only needs the final  cell
  //watchdog('stunning', 'cols <pre>'. print_r($cols,1) .'</pre>');
  $row = stu_get_row_from_table($node->field_mail_accom_heading[0]['value']);
  $accom_row = $row['row'];
  $accom_row = stu_get_accom_header($accom_row, $cols);
  $nights = stu_get_accom_nights($sections);
  $sections = array();
  $teeth = array();
  // surgical submission 47 relates to 38 (liposuction body areas)
  $sections['surgery'] = array();
  if($submission->data[38][value][0] != '') $sections['surgery'] = explode(",",$submission->data[38][value][0]);
  if($submission->data[47][value][0] != '') $lipo_areas = explode(",",$submission->data[47][value][0]);
  
  $lipo_map = stu_liposuction_areas_map();
  
  if (is_array($lipo_areas)) {
    $lipo_names = array();
	$lipo_areas_count = 0;
    foreach ($lipo_areas as $i) {
      if (isset($lipo_map[$i])) {
	    $lipo_names[] = $lipo_map[$i];
		$lipo_areas_count++;
	  }
    }	
	$lipo_text = implode(', ', $lipo_names);
  }
  $non_surgical = array();
  if($submission->data[48][value][0] != '') $non_surgical = explode(",",$submission->data[48][value][0]);
  $non_surgical_count = 0;
  foreach ($non_surgical as $number) {
    if ($number > 0) {
      $sections['surgery'][] = $number;
	  $non_surgical_count++;
	}
  }
  watchdog('stunning', 'submission <pre>'. print_r($submission,1) .'</pre>');
  // dental submission 39 relates to 30
  // dental submission 40 relates to 34 
  // dental submission 41 relates to 36
  if($submission->data[39][value][0] != '') {
    //$sections['dental'] = explode(",", $submission->data[30][value][0]);
	$sections['dental'][39] = $submission->data[39][value][0];
	$tooth = explode(',', $submission->data[30][value][0]);
	$teeth[39] = count($tooth);
	if($submission->data[40][value][0] != '') {
	  $sections['dental'][40] = $submission->data[40][value][0];
	  $tooth = explode(',', $submission->data[34][value][0]);
	  
	  $teeth[40] = count($tooth);
	}
	if($submission->data[41][value][0] != '') {
	  $sections['dental'][41] = $submission->data[41][value][0];
	  $tooth = explode(',', $submission->data[36][value][0]);
	  $teeth[41] = count($tooth);
	}
  }
  if($submission->data[42][value][0] != '') $sections['packages'] = explode(",",$submission->data[42][value][0]);
  
?>
<div class="htmlmail-body" style="margin-left: 20px; font-family:lucida sans,lucida grande,tahoma,verdana,arial,sans-serif; color:#333333;">
<table border=0 cellpadding=0 class="htmlmail-body"><tbody valign="top">
	<tr>
		<td style="width:650px; margin: 0px auto; background-repeat:no-repeat;" background="<?php echo $_SERVER['SERVER_NAME'];?>/sites/default/files/email_templates/mail_header.jpg";>
			<div style="margin-top:40px;">
				<?php print $salutation ?>
			</div>
		</td>
	</tr>
	<tr>
		<td>	
			
				
					<div style="background-color:#EBEAE2; color:#333333;">
						<?php print $node->field_mail_top[0]['value']; ?>
					</div>
					<?php
						//check already user display login username/password
						$sql = "SELECT uid FROM users WHERE name='".$submission->data[8][value][0]."'";
						$query = db_query($sql);
						$results = db_fetch_array($query);
						
						if($results[uid] == ''){
					?>
					<div style="background-color:#EBEAE2; color:#333333; margin-top:20px; ">
						<p style="margin-top:0; padding:10px; padding-top:10px; padding-bottom:0px; margin-bottom:0px; color:#333333;">Login to our website now to book your treatment:</p>

						<p style="margin-top:0; padding:10px; padding-top:10px; padding-bottom:0px; margin-bottom:0px; color:#333333;">Username:</p>
						<p style="margin:0; padding-left:10px; padding-right:10px; color:#333333;"><?php echo $submission->data[8][value][0];?></p>
						
						<p style="margin-top:0; padding:10px; padding-top:10px; padding-bottom:0px; margin-bottom:0px; color:#333333;">Password:</p>
						<p style="margin:0; padding-left:10px; padding-right:10px; padding-bottom:10px; color:#333333;"><?php echo $submission->data[37][value][0];?></p>	
					</div>
					<?php } ?>
				
		</td>
	</tr>
	<tr>
		<td>	
				
					<div>
						<p style="margin:0; padding:0; font-size:17px; color:#FF6C00">Your Quotation</p>
					</div>
					<div>
					  <table style="width:100%; padding-right:5px; margin-top:10px; border-collapse:collapse;">
						<?php 
							
						
							////////////PLASTIC////////////////
							$s_plastic_nid = explode(",",$submission->data[38][value][0]);
							//if($s_plastic_nid != ''){
							//watchdog('stunning', 'submission <pre>'. print_r($submission,1) .'</pre>');
							// Plastic surgery
							//if($submission->data[38][value][0] != ''){
						  foreach ($destinations as $dest_nid => $destination) {
						    //watchdog('stunning', 'destination <pre>'. print_r($destination,1) .'</pre>');
						    $total = 0;
							$nights = 0;
                            $procedure_count = 0;

							foreach ($sections as $type => $section) {
							    if ($type == 'surgery') {
								  if (empty($section)) continue;
								  
								  $surgery = TRUE;
								  $rows = count($sections['surgery']);
								  $row = stu_get_row_from_table($node->field_mail_table_content[0]['value'], $rows, TRUE);
								  $first_row = $row['row'];
								  
								  
                                  $surgery_header = str_replace('[stu-currency]', $curr_country . $curr_format, $header_row);
								  $surgery_header = str_replace('[stu-product]', variable_get('makeover_surgery_header', 'Treatment/Surgery'), $surgery_header);
								  $this_surgery_header = str_replace('[stu-base-currency]', $destination->field_destination_currency[0]['value'], $surgery_header);
								    print $this_surgery_header;
									$c = 1;
								    foreach($section as $nid){
									  $procedure_count++;
									  $procedure  = node_load($nid);
									  if ($procedure->field_procedure_nights[0]['value'] > $nights) $nights = $procedure->field_procedure_nights[0]['value'];
									  //watchdog('stunning', 'procedure <pre>'. print_r($procedure,1) .'</pre>');
									  if(!$procedure) continue;
									  // liposuction nodes - multiply cost by number of areas
									  switch ($nid) {
									    case 147:
										case 149:
										case 150:
									      if (isset($lipo_areas_count) && $procedure->procedure_costs[$dest_nid] > 0) {
									        $procedure->procedure_costs[$dest_nid] = $lipo_areas_count * $procedure->procedure_costs[$dest_nid];
									      }
										  if (isset($lipo_text)) {
										    $procedure->title .= ' ('. $lipo_text .')';
										  }
										  
									  }
								      $procedure->destination = $destination->title;
								      $procedure->dest_nid = $dest_nid;
								      $procedure->curr_format = $curr_format;
									  $procedure->curr_country = $curr_country;
								      $procedure->curr_conversion_value = $curr_conversion_value;
									  if ($c == 1) $row = $first_row;
									  else $row = $subsequent_row;
									  $row = token_replace($row, 'node', $procedure, TOKEN_PREFIX, TOKEN_SUFFIX, NULL, TRUE);
								      print $row;
									  //  calculate total
									  if ($procedure->procedure_costs[$dest_nid] > 0) {
									    $total = $total + ($procedure->procedure_costs[$dest_nid] * $curr_conversion_value);
									  }
									  $c++;
								    }
									// Non surgical procedures do not attract nights
									$procedure_count = $procedure_count - $non_surgical_count;
									// Recalculate nights according to number of procedures
									switch ($procedure_count) {
									  case 0:
									    $nights = 0;
										break;
									  case 3:
									    if ($nights < 14) $nights = 14;
										break;
									  case 4:
									    if ($nights < 21) $nights = 21;
										break;
									}
									// Add three nights if we have a dental procedure
									if (!empty($sections['dental'])) $nights = $nights + 3;
									// Booking Fee
									if ($nights > 8) {
									  if ($curr_country == 'NZ' || $curr_country == 'AU') $fee = variable_get('makeover_surgery_booking_fee', 400);
									  else $fee = variable_get('makeover_surgery_booking_fee_baht', 4000) * $curr_conversion_value;
									  $label = 'Surgery booking fee';
									}
									else {
									  if ($curr_country == 'NZ' || $curr_country == 'AU') $fee = variable_get('makeover_outpatient_booking_fee', 200);
									  else $fee = variable_get('makeover_outpatient_booking_fee_baht', 2000) * $curr_conversion_value;
									  $label = 'Outpatient booking fee';
									}
									print '<tr style="'. $style .'"><td colspan="'. $total_span .'" style="text-align: right">'. $label .'</td><td style="text-align: right">'. $curr_format . number_format($fee) .'</td></tr>';
									$total = $total + $fee;
									// Total Row
									print '<tr style="'. $style .'"><td colspan="'. $total_span .'" style="text-align: right">Estimated surgery cost</td><td style="text-align: right">'. $curr_format . number_format($total) .'</td></tr>';
									// Now for accommodation
									if ($nights) {
									  $accom_cost = $nights * $destination->field_destination_accom[0]['value'] * $curr_conversion_value;
								      $total = $total + $accom_cost;
									  print $accom_row;
									  print '<tr style="'. $style .'"><td colspan="'. $total_span .'" style="text-align: right">'. $nights .' nights double/twin share Accommodation and Transfers</td><td style="text-align: right">'. $curr_format . number_format($accom_cost) .'</td></tr>';
									}
									// Total Row
									if ($total > 0) print '<tr style="'. $style .'"><td colspan="'. $total_span .'" style="text-align: right">Total estimated cost</td><td style="text-align: right">'. $curr_format . number_format($total) .'</td></tr>';
								  
								}
								if ($type == 'dental') {
								  $rows = count($sections['dental']);
								  $row = stu_get_row_from_table($node->field_mail_table_content[0]['value'], $rows, TRUE);
								  $first_row = $row['row'];
                                  $dental_header = str_replace('[stu-currency]', $curr_format, $header_row);
								  $dental_header = str_replace('[stu-product]', variable_get('makeover_dental_header', 'Dental Treatment'), $dental_header);
								  $this_dental_header = str_replace('[stu-base-currency]', $curr_country . $destination->field_destination_currency[0]['value'], $dental_header);
								  print $this_dental_header;
								  $c = 1;
								  foreach($section as $key => $nid){
									  
									  $procedure  = node_load($nid);
									  if ($procedure->field_procedure_nights[0]['value'] > $nights) $nights = $procedure->field_procedure_nights[0]['value'];
									  //watchdog('stunning', 'procedure <pre>'. print_r($procedure,1) .'</pre>');
									  if(!$procedure) continue;
								      $procedure->destination = $destination->title;
								      $procedure->dest_nid = $dest_nid;
								      $procedure->curr_format = $curr_format;
									  $procedure->curr_country = $curr_country;
								      $procedure->curr_conversion_value = $curr_conversion_value;
									  if ($c == 1) $row = $first_row;
									  else $row = $subsequent_row;
									  if (isset($teeth[$key]) && $procedure->procedure_costs[$dest_nid] > 0) {
									    $procedure->procedure_costs[$dest_nid] = $teeth[$key] * $procedure->procedure_costs[$dest_nid];
									  }
								      $procedure->title = $teeth[$key] .' '.$procedure->title;
									  $row = token_replace($row, 'node', $procedure, TOKEN_PREFIX, TOKEN_SUFFIX, NULL, TRUE);
									  //watchdog('stunning', 'row <pre>'. print_r($row,1) .'</pre>');
								      print $row;
									  //  calculate total
									  if ($procedure->procedure_costs[$dest_nid] > 0) {
									    $total = $total + ($procedure->procedure_costs[$dest_nid] * $curr_conversion_value);
									  }
									  $c++;
								  }
								  reset($section);
								  // Booking Fee
								  if (!$surgery) {
									  if ($curr_country == 'NZ' || $curr_country == 'AU') $fee = variable_get('makeover_outpatient_booking_fee', 200);
									  else $fee = variable_get('makeover_dental_booking_fee_baht', 50) * $curr_conversion_value;
									  print '<tr style="'. $style .'"><td colspan="'. $total_span .'" style="text-align: right">Booking fee</td><td style="text-align: right">'. $curr_format . number_format($fee) .'</td></tr>';
									  $total = $total + $fee;
									  // Total Row
									  print '<tr style="'. $style .'"><td colspan="'. $total_span .'" style="text-align: right">Estimated dental cost</td><td style="text-align: right">'. $curr_format . number_format($total) .'</td></tr>';
									  // Now for accommodation
									  $accom_cost = $nights * $destination->field_destination_accom[0]['value'] * $curr_conversion_value;
								      $total = $total + $accom_cost;
									  print $accom_row;
									  print '<tr style="'. $style .'"><td colspan="'. $total_span .'" style="text-align: right">'. $nights .' nights double/twin share Accommodation and Transfers</td><td style="text-align: right">'. $curr_format . number_format($accom_cost) .'</td></tr>';
									}
									// Total Row
									if ($total > 0) print '<tr style="'. $style .'"><td colspan="'. $total_span .'" style="text-align: right">Total estimated cost</td><td style="text-align: right">'. $curr_format . number_format($total) .'</td></tr>';
								  
								}
							    if ($type == 'packages') {
								  $rows = count($sections['packages']);
								  $row = stu_get_row_from_table($node->field_mail_table_content[0]['value'], $rows, TRUE);
								  $first_row = $row['row'];
                                  $packages_header = str_replace('[stu-currency]', $curr_format, $header_row);
								  $packages_header = str_replace('[stu-product]', variable_get('makeover_packages_header', 'Packages'), $packages_header);
								    $this_packages_header = str_replace('[stu-base-currency]', $destination->field_destination_currency[0]['value'], $packages_header);
								    print $this_packages_header;
									$c = 1;
								    foreach($section as $nid){
									  $procedure  = node_load($nid);
									  
									  if(!$procedure) continue;
								      $procedure->destination = $destination->title;
								      $procedure->dest_nid = $dest_nid;
								      $procedure->curr_format = $curr_format;
								      $procedure->curr_conversion_value = $curr_conversion_value;
									  if ($c == 1) $row = $first_row;
									  else $row = $subsequent_row;
									  $row = token_replace($row, 'node', $procedure, TOKEN_PREFIX, TOKEN_SUFFIX, NULL, TRUE);
								      print $row;
									  //  calculate total
									  if ($procedure->procedure_costs[$dest_nid] > 0) {
									    $total = $total + ($procedure->procedure_costs[$dest_nid] * $curr_conversion_value);
									  }
									  $c++;
								    }
									// Total Row
									if ($total > 0) print '<tr style="'. $style .'"><td colspan="'. $total_span .'" style="text-align: right">Total estimated cost&nbsp;&nbsp;&nbsp;&nbsp;</td><td style="text-align: right">'. $curr_format . number_format($total) .'</td></tr>';
								}
							}
						  }
							
							
							
						?>
				      </table>
					</div>
				
				<div style="clear:both"></div>
			
		</td>
	</tr>
	<tr>
		<td style="width:650px; margin: 0px auto;">
			<div style="margin-left:65px; margin-top:140px;">
				<?php print $node->field_mail_signature[0]['value'] ?>
			</div>
			<img src="<?php echo $_SERVER['SERVER_NAME'];?>/sites/default/files/email_templates/mail_footer.jpg" />
		</td>
	</tr>
</tbody>
</table>

</div>

<pre>
<?php //print_r($submission); ?>
</pre>
