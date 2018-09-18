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

<?php /* print ($email['html'] ? '<p>' : '') . t('Submitted on %date'). ($email['html'] ? '</p>' : '');  ?>

<?php if ($user->uid): ?>
<?php print ($email['html'] ? '<p>' : '') . t('Submitted by user: %username') . ($email['html'] ? '</p>' : ''); ?>
<?php else: ?>
<?php print ($email['html'] ? '<p>' : '') . t('Submitted by anonymous user: [%ip_address]') . ($email['html'] ? '</p>' : ''); ?>
<?php endif; ?>

<?php print ($email['html'] ? '<p>' : '') . t('Submitted values are') . ':' . ($email['html'] ? '</p>' : ''); ?>

%email_values



<?php print ($email['html'] ? '<p>' : '') . t('The results of this submission may be viewed at:') . ($email['html'] ? '</p>' : '') ?>

<?php print ($email['html'] ? '<p>' : ''); ?>%submission_url<?php print ($email['html'] ? '</p>' : '');  */?>

<div class="htmlmail-body" style="width:650px;margin:0 auto; font-family:lucida sans,lucida grande,tahoma,verdana,arial,sans-serif; color:#333333;">
<table border=0 cellpadding=0 class="htmlmail-body">
<tbody valign="top">
	<tr>
		<td style="width:650px; margin: 0px auto; background-repeat:no-repeat;" background="<?php echo $_SERVER['SERVER_NAME'];?>/sites/default/files/email_templates/mail_header.jpg";>
			<div style="margin-left:65px; margin-top:140px;">
				<?php echo "Hello ".$submission->data[1][value][0].","; ?>
				<?php echo "<br/>Thank you for your interest in Stunning Makeovers<br/>"; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td>	
			<div style="margin-left:65px; margin-top:30px;">
				<div style="float:left; width:220px;">
					<div style="background-color:#EBEAE2; color:#333333;">
						<p style="font-family:Times New Roman,times,georgia,serif; font-style:italic; color:#198097; font-size:19px; padding:10px; margin-top:0; padding-bottom:0px; margin-bottom:0px;">Take the next step to make your dream come true!</p>

						<p style="margin-top:0; padding:10px;  padding-bottom:0px; margin-bottom:0px;">Call us to discuss your treatment:</p>
						<p style="margin:0; padding-left:10px; padding-right:10px;">0800-454-453534</p>

						<p style="margin-top:0; padding:10px; padding-top:10px; padding-bottom:0px; margin-bottom:0px;">Email us at:</p>
						<p style="margin:0; padding-left:10px; padding-right:10px; padding-bottom:10px;">info@stunningmakeovers.com</p>
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
				</div>
				<div style="float:left; width:270px; margin-left:50px;">
					<div>
						<p style="margin:0; padding:0; font-size:17px; color:#FF6C00">Your Quotation</p>
					</div>
					<div>
						<?php 
							$currency_value = $submission->data[43][value][0];
							$currency_format = $submission->data[44][value][0];
						
							////////////PLASTIC////////////////
							$s_plastic_nid = explode(",",$submission->data[38][value][0]);
							//if($s_plastic_nid != ''){
							watchdog('stunning', 'submission <pre>'. print_r($submission,1) .'</pre>');
							if($submission->data[38][value][0] != ''){
								echo '<table style="width:100%; padding-right:5px; margin-top:10px; border-collapse:collapse;"><tr>';
								echo '<td style="border-bottom:1px solid #cccccc; padding-bottom:3px;">PLASTIC SURGERY</td>';
								echo '<td style="border-bottom:1px solid #cccccc; padding-bottom:3px;text-align: center;">PRICE</td></tr>';
								foreach($s_plastic_nid as $nid){
									$node  = node_load($nid);
									//print_r($node);
									watchdog('stunning', 'node <pre>'. print_r($node,1) .'</pre>');
									if($node->title != ""){
									
									//currency
									$proc_cost_normal = $node->field_procedure_cost[0]['value'] * $currency_value;
									$proc_cost_bkk = $node->field_procedure_costbkk[0]['value'] * $currency_value;
									$proc_cost_phuket = $node->field_procedure_costphuket[0]['value'] * $currency_value;
									
										echo '<tr><td style="padding-top:3px; color:#198097;vertical-align: top;">'.$node->title.'</td>';
										echo '<td style="padding-top:3px; color:#198097; width:45%;">from '.$currency_format.' '.$proc_cost_normal.'<br/>';
										echo 'from Bangkok <br/>'.$currency_format.' '.$proc_cost_bkk;
										echo '<br/>from Phuket <br/>'.$currency_format.' '.$proc_cost_phuket.'</td></tr>';
									}
								}
							echo '</table>';
							}
							////////////DENTAL//////////////////
							if($submission->data[39][value][0] != ''){
								echo '<table style="width:100%; padding-right:5px; margin-top:10px; border-collapse:collapse;"><tr>';
								echo '<td style="border-bottom:1px solid #cccccc; padding-bottom:3px;">COSMETIC DENTISTRY</td>';
								echo '<td style="border-bottom:1px solid #cccccc; padding-bottom:3px;text-align: center;">PRICE</td></tr>';
									if($submission->data[39][value][0] != ''){
										$node  = node_load($submission->data[39][value][0]);
										
										//currency
										$proc_cost_normal = $node->field_procedure_cost[0]['value'] * $currency_value;
										$proc_cost_bkk = $node->field_procedure_costbkk[0]['value'] * $currency_value;
										$proc_cost_phuket = $node->field_procedure_costphuket[0]['value'] * $currency_value;
										
										echo '<tr><td style="padding-top:3px; color:#198097;vertical-align: top;">'.$node->title.'</td>';
										echo '<td style="padding-top:3px; color:#198097; width:45%;">from '.$proc_cost_normal.'<br/>';
										echo 'from Bangkok <br/>'.$currency_format.' '.$proc_cost_bkk;
										echo '<br/>from Phuket <br/>'.$currency_format.' '.$proc_cost_phuket.'</td></tr>';
									}
									if($submission->data[40][value][0] != ''){
										$node  = node_load($submission->data[40][value][0]);
										
										//currency
										$proc_cost_normal = $node->field_procedure_cost[0]['value'] * $currency_value;
										$proc_cost_bkk = $node->field_procedure_costbkk[0]['value'] * $currency_value;
										$proc_cost_phuket = $node->field_procedure_costphuket[0]['value'] * $currency_value;
										
										echo '<tr><td style="padding-top:3px; color:#198097;vertical-align: top;">'.$node->title."</td>";
										echo '<td style="padding-top:3px; color:#198097; width:45%;">from '.$proc_cost_normal.'<br/>';
										echo 'from Bangkok <br/>'.$currency_format.' '.$proc_cost_bkk;
										echo '<br/>from Phuket <br/>'.$currency_format.' '.$proc_cost_phuket.'</td></tr>';
									}
									if($submission->data[41][value][0] != ''){
										$node  = node_load($submission->data[41][value][0]);
										
										//currency
										$proc_cost_normal = $node->field_procedure_cost[0]['value'] * $currency_value;
										$proc_cost_bkk = $node->field_procedure_costbkk[0]['value'] * $currency_value;
										$proc_cost_phuket = $node->field_procedure_costphuket[0]['value'] * $currency_value;
										
										echo '<tr><td style="padding-top:3px; color:#198097;vertical-align: top;">'.$node->title."</td>";
										echo '<td style="padding-top:3px; color:#198097; width:30%;">from '.$proc_cost_normal.'<br/>';
										echo 'from Bangkok <br/>'.$currency_format.' '.$proc_cost_bkk;
										echo '<br/>from Phuket <br/>'.$currency_format.' '.$proc_cost_phuket.'</td></tr>';
									}
								echo '</table>';
							}
							
							//////////PACKAGE////////////////
							$s_package_nid = explode(",",$submission->data[42][value][0]);
							//if($s_package_nid != ''){
							if($submission->data[42][value][0] != ''){
								echo '<table style="width:100%; padding-right:5px; margin-top:10px; border-collapse:collapse;"><tr>';
								echo '<td style="border-bottom:1px solid #cccccc; padding-bottom:3px;">PACKAGE</td>';
								echo '<td style="border-bottom:1px solid #cccccc; padding-bottom:3px;text-align: center;">PRICE</td></tr>';
								foreach($s_package_nid as $nid){
									$node  = node_load($nid);
									//print_r($node);
									if($node->title != ""){

										//currency
										$package_cost_normal = $node->field_package_price[0]['value'] * $currency_value;
									
										echo '<tr><td style="padding-top:3px; color:#198097;vertical-align: top;">'.$node->title."</td>";
										echo '<td style="padding-top:3px; color:#198097; width:45%;">from '.$currency_format.' '.$package_cost_normal."</td></tr>";
									}
								}
								echo '</table>';
							}
							
							////////////FLIGHT///////////
							$results = views_get_view_result('get_flight_cost',null,$submission->data[16][value][0],$submission->data[18][value][0]); 
							$flight_nid = $results[0]->nid;
							if($flight_nid != ''){
								$node  = node_load($flight_nid);
								
								//currency
								$filght_cost_normal = $node->field_filght_price[0]['value'] * $currency_value;
								
								echo '<table style="width:100%; padding-right:5px; margin-top:10px; border-collapse:collapse;"><tr>';
								echo '<td style="border-bottom:1px solid #cccccc; padding-bottom:3px;">FLIGHTS</td>';
								echo '<td style="border-bottom:1px solid #cccccc; padding-bottom:3px;text-align: center;">PRICE</td></tr>';
								echo '<tr><td style="padding-top:3px; color:#198097;vertical-align: top;">'.$node->title.'</td>';
								echo '<td style="padding-top:3px; color:#198097; width:45%;">from '.$currency_format.' '.$filght_cost_normal."</td></tr>";
								echo '</table>';
							}
						?>
				
					</div>
				</div>
				<div style="clear:both"></div>
			</div>
		</td>
	</tr>
	<tr>
		<td style="width:650px; margin: 0px auto;">
			<img src="<?php echo $_SERVER['SERVER_NAME'];?>/sites/default/files/email_templates/mail_footer.jpg" />
		</td>
	</tr>
</tbody>
</table>

</div>

<pre>
<?php //print_r($submission); ?>
</pre>
