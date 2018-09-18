<?php

/**
 * @file
 * Customize the display of a complete webform.
 *
 * This file may be renamed "webform-form-[nid].tpl.php" to target a specific
 * webform on your site. Or you can leave it "webform-form.tpl.php" to affect
 * all webforms on your site.
 *
 * Available variables:
 * - $form: The complete form array.
 * - $nid: The node ID of the Webform.
 *
 * The $form array contains two main pieces:
 * - $form['submitted']: The main content of the user-created form.
 * - $form['details']: Internal information stored by Webform.
 */
?>
<?php
  // If editing or viewing submissions, display the navigation at the top.
  if (isset($form['submission_info']) || isset($form['navigation'])) {
    print drupal_render($form['navigation']);
    print drupal_render($form['submission_info']);
  }

   //echo "<pre>";
   //print_r($form);
   //echo "</pre>";
 
  // Print out the main part of the form.
  // Feel free to break this up and move the pieces within the array.
  // print drupal_render($form['submitted']);

  // Always print out the entire $form. This renders the remaining pieces of the
  // form that haven't yet been rendered above.
  //print drupal_render($form);
  
// unset($form['#node'],$form['#parameters']);
  // echo '<pre>';
  // print_r($form['actions']['captcha']);
  // echo '</pre>';
  // exit;

  
  
  if($form['submitted']['first_name']) {   
	  echo "<div class='enquiry-page-1'>";
		  echo "<div class='enquiry-tell-us-box'>";
			  echo "<div class='enquiry-tell-us-box-inner'>";
				  echo "<h2>Tell us about yourself:</h2>";
				  echo drupal_render($form['submitted']['first_name']);
				  echo drupal_render($form['submitted']['last_name']);
				  echo drupal_render($form['submitted']['gender']);
				  echo drupal_render($form['submitted']['date_of_birth']);
				  echo "<div class='clear-block'></div>";
				  echo drupal_render($form['submitted']['country_of_residence']);
				  echo drupal_render($form['submitted']['city']);
				  echo drupal_render($form['submitted']['phone_number']);
				  echo drupal_render($form['submitted']['email_address']);
				  echo "<div class='clear-block'></div>";?>
				  
				  <!-- Dynamic Converter -->
				  <script language='JavaScript' type='text/javascript'>
				  function dc_ld() {
				  var dc_dlay = document.createElement('script');
				  dc_dlay.setAttribute('type', 'text/javascript');
				  dc_dlay.setAttribute('language', 'javascript');
				  dc_dlay.setAttribute('id', 'dcdlay');
				  <?php //"dc_dlay.setAttribute('src', 'http'+(window.location.protocol.indexOf('https:')==0?'s://converter':'://converter2')+'.dynamicconverter.com/accounts/10/10452'+'.'+'js'); ";?>
				  dc_dlay.setAttribute('src', 'http'+(window.location.protocol.indexOf('https:')==0?'s://converter':'://converter2')+'.dynamicconverter.com/accounts/11/11595'+'.'+'js');
				  document.getElementsByTagName('head')[0].appendChild(dc_dlay);
				   } setTimeout('dc_ld();',10); setTimeout('get_converter();',5000);
				  </script>
				  <a href='http://dynamicconverter.com' style='display: none;'>Free currency conversion</a>
				  <?php//echo '<!-- Dynamic Converter --> <script language="JavaScript" type="text/javascript"> function dc_ld() { var dc_dlay = document.createElement("script"); dc_dlay.setAttribute(\'type\', \'text/javascript\'); dc_dlay.setAttribute(\'language\', \'javascript\'); dc_dlay.setAttribute(\'id\', \'dcdlay\'); dc_dlay.setAttribute("src", "http"+(window.location.protocol.indexOf("https:")==0?"s://converter":"://converter2")+".dynamicconverter.com/accounts/11/11595"+"."+"js"); document.getElementsByTagName("head")[0].appendChild(dc_dlay); } setTimeout(\'dc_ld()\',10); </script><a href="http://dynamicconverter.com" style="display: none;">Free currency converter</a>';?>
				  
				  <div class='convert-from' style='float:none;'>TH <span id=\"base_currency_symbol\"></span>1 = 
				  <span id="selected_currency_2"></span>
				  <span id="selected_currency_symbol"></span>
				  	<span id='convert' amount='1' override="decimals: 1,display_format: 10" ></span>
				  </div>
				  <div class='convert-to' style='float:none;'>
				  	<label>Please select your preferred currency</label><br/>
				  	<span id='currency_select'></span>
				  </div>
			      </div><!-- end converter -->
				  <input id='convert-hide' type='hidden' value='' />
		  </div>
		  
		  <div class='enquiry-what-procedure-box'>
			  <div class='enquiry-what-procedure-box-inner'>
				  <h2>What procedures are of interest?</h2>
				  <label>Plastic Surgery</label>
				  <div id="plastic-procedures"></div>
				  <a id='webform-plastic-bt' class='webform-select-bt' href='javascript:void(0);'>Select</a>
				  <label>Non-surgical Procedures</label>
				  <div id="non-surgical-procedures"></div>
				  <a id='webform-non-surgical-bt' class='webform-select-bt' href='javascript:void(0);'>Select</a>
				  <div id="enquiry-dental-procedure-1" class="enquiry-dental-procedure">
				  	<label>Dental Procedures</label>
					<a id='webform-dental-close-1' class='webform-close-bt' href='javascript:void(0);'>X</a>
					<div>
				    <span id="dental-procedure" class="dental-procedure-html"></span>
				  	<span id="dental-procedure-teeth"></span>
					</div>
					 
					<div class='clear-block'></div>
					<div class='dental-button-wrapper'>
						<a id='webform-dental-bt' class='webform-select-bt' href='javascript:void(0);'>Select</a>
						<a id='webform-dental-add' class='webform-add-more' href='javascript:void(0);'>Add Another Dental Procedure</a>
						<div class='clear-block'></div>
				    </div>
				 </div>
				 <div id="enquiry-dental-procedure-2" class="enquiry-dental-procedure">
				  	<label>Dental Procedures</label>
					<a id='webform-dental-close-2' class='webform-close-bt' href='javascript:void(0);'>X</a>
					<div>
				    <span id="dental-procedure-2" class="dental-procedure-html"></span>
				  	<span id="dental-procedure-2-teeth"></span>
					</div>
					<div class='clear-block'></div>
					<div class='dental-button-wrapper'>
						<a id='webform-dental-bt-2' class='webform-select-bt' href='javascript:void(0);'>Select</a>
						<a id='webform-dental-add-2' class='webform-add-more' href='javascript:void(0);'>Add Another Dental Procedures</a>
						<div class='clear-block'></div>
				  </div>
				  </div>
				  <div id="enquiry-dental-procedure-3" class="enquiry-dental-procedure">
				  	<label>Dental Procedures</label>
					<a id='webform-dental-close-3' class='webform-close-bt' href='javascript:void(0);'>X</a>
					<div>
				    <span id="dental-procedure-3" class="dental-procedure-html"></span>
				  	<span id="dental-procedure-3-teeth"></span>
					</div>
					<div class='clear-block'></div>
					<a id='webform-dental-bt-3' class='webform-select-bt' href='javascript:void(0);'>Select</a>
				  </div>
				  <label>Packages</label>
				  <div id="packages"></div> 
				  <a id='webform-package-bt' class='webform-select-bt' href='javascript:void(0);'>Select</a>
			  </div>
		  </div>
		  <div class='clear-block'></div>
	  </div>
   <?php }
 
   if($form['submitted']['preferred_destination']) {
	  echo "<div class='enquiry-page-2'>";
		  echo "<div class='enquiry-about-trip-box'>";
			  echo "<div class='enquiry-about-trip-box-inner'>";
				  echo "<h2>About your trip:</h2>";
				  echo drupal_render($form['submitted']['preferred_destination']);?>
				  <div class="clearfix"></div>
				  <?php echo drupal_render($form['submitted']['when_do_you_plan_to_have_surgery']);
				  echo "<div class='clear-block'></div>";
				  echo drupal_render($form['submitted']['are_you_travelling_with_others']);
				  echo "<div class='clear-block'></div>";
				  echo drupal_render($form['submitted']['how_many']);
			  echo "</div>";
		  echo "</div>";
		  echo "<div class='enquiry-do-you-box'>";
			  echo "<div class='enquiry-do-you-box-inner'>";
				  echo "<h2>About you:</h2>";
				  /*
				  echo "<div class='enquiry-left-wrapper'>";
				  	  echo "<div class='enquiry-do-you-top'>";
						  //echo drupal_render($form['submitted']['accommodation']);
						  //echo drupal_render($form['submitted']['airfares']);
						  echo "<div class='clear-block'></div>";
					  echo "</div>";
					  echo "<div class='enquiry-airfare-wraper'>";
						  echo drupal_render($form['submitted']['fromcity_or_airport']);
						  echo drupal_render($form['submitted']['departing']);
						  echo "<div class='clear-block'></div>";
						  echo drupal_render($form['submitted']['tocity_or_airport']);
						  echo drupal_render($form['submitted']['returning']);
						  echo "<div class='clear-block'></div>";
						  echo "<div class='enquiry-do-you-bottom'>";
							  echo drupal_render($form['submitted']['airport_tranfers']);
							  echo drupal_render($form['submitted']['hospital_transfers']);
							  echo "<div class='clear-block'></div>";
						  echo "</div>";
					  echo "</div>";
				  echo "</div>";
				  */
				  echo "<div class='enquiry-right-wrapper'>";
					  echo drupal_render($form['submitted']['how_did_you_find_out_about']);
					  echo drupal_render($form['submitted']['can_we_contact_you_by_phone']); 
					  echo "<div class='clear-block'></div>";
					  echo drupal_render($form['submitted']['contact_number']); 
					  echo "<div class='clear-block'></div>";
					  echo "<p class='term-condition'>I have read, understood and accept the terms and conditions outlined in the <a id='term-condition' href='/disclaimer'>disclaimer</a>: <span title=\"This field is required.\" class=\"form-required\">*</span></p>"; 
					  echo drupal_render($form['submitted']['have_you_read_understood_and_agree_to_the_terms__conditions']);
					  echo "<div class='clear-block'></div>";
					  echo drupal_render($form['actions']['captcha']);
				  echo "</div>";
			  echo "</div>";
		  echo "</div>";
		  echo "<div class='clear-block'></div>";
	  echo "</div>"; 
  }	
  unset ($form['#node']->field_mail_subject[0]['value']);
  unset ($form['#node']->field_mail_salutation[0]['value']);
  unset ($form['#node']->field_mail_top[0]['value']);
  unset ($form['#node']->field_mail_table_header[0]['value']);
  unset ($form['#node']->field_mail_accom_heading[0]['value']);
  unset ($form['#node']->field_mail_table_header_dental[0]['value']);
  unset ($form['#node']->field_mail_table_content[0]['value']);
  unset ($form['#node']->field_mail_signature[0]['value']);
  // we can delete this eventually
  unset ($form['submitted']['plactic_surgery___non_surgical_procedures']);
  unset ($form['submitted']['dental_procedures']);
  unset ($form['submitted']['dental_procedures_2']);
  unset ($form['submitted']['dental_procedures_3']);
  unset ($form['submitted']['packages']);
  unset ($form['submitted']['fromcity_or_airport']);
  unset ($form['submitted']['departing']);
  unset ($form['submitted']['tocity_or_airport']);
  unset ($form['submitted']['returning']);
  unset ($form['submitted']['airport_tranfers']);
  unset ($form['submitted']['hospital_transfers']);
  
  
  print drupal_render($form);  //print everything that not manual print  e.g. nextpageBT , previousBT , submitBT
?>
<?php $results = views_get_view_result('webform_procedure_group',null); 
  foreach($results as $result): 
	$group_nid = $result->nid;
	$group_title = $result->node_title;
?>
<?php if ($group_nid == 130):?>
  <div id="webform-plastic-procedure">
	<h2>Plastic Surgery</h2>
	<div class="plastic-bt">
		<a id="plastic-clear" class="clear-bt" href="javascript:void(0);">CLEAR ALL</a>
		<a id="plastic-select" class="submit-bt" href="javascript:void(0);">Submit</a>
		<div class="clear-block"></div>
	</div>
			<div id='webform-plastic-procedure-div' class='webform-plastic-procedure-group'>
				<h3 class='procedure-group-title'><?php print $group_title?></h2>
				<?php $procedures = views_get_view_result('webform_plastic_procedure',null,$group_nid);?>
				    <ul id="procedure-list-left">
					<?php $c = 0;
					foreach($procedures as $procedure):?> 
						<?php $procedure_title = $procedure->node_title;
						echo "<li><input type='checkbox' id='".$procedure->nid."' class='plastic_procedure' name='plastic_procedure' value='".$procedure_title."' /> ".$procedure_title."</li>";
						if ($c == 12):?>
						  <li><input type="checkbox" id="other-surgery-check" class="plastic_procedure" name='other_surgery_check' value="Other Surgery" />Other<input type="text" id="other-surgery-input" class="other-makeover" name="other_surgery_input" size="25" /></li>
						  </ul><ul id="procedure-list-right">
						  
						  <?php endif;
						$c++;?>
					<?php endforeach ?>
					
				    </ul>
			
						  <div id="liposuction-procedure">
			                <div class="webform-surgical-procedure-left">
				              <p>Liposuction</p>
				              <table>
					            <tr>
					            <?php for($i=1;$i<=13;$i++) {
						          echo "<td><input type='checkbox' class='liposuction' name='liposuction' value='".$i."' /> ".$i."</td>";
						          if($i%4 == 0){
							        echo "</tr><tr>";
						          }
					            }
					            ?>
					            </tr>
				              </table>
						    </div>
	                        <div class="webform-surgical-procedure-right">
		                      <div class="liposuction-image">
			                    <img src="/sites/all/themes/stu/images/quote/liposuction-areas-400px.jpg" />
		                      </div>
	                        </div>
						  </div>
						  <div class="clear-block"></div>
			</div>
	<div class='clear-block'></div>
</div>

<?php else: ?>
<div id="webform-non-surgical-procedure">
	<h2>Non-Surgical Procedures</h2>
	<div class="non-surgical-bt">
		<a id="non-surgical-clear" class="clear-bt" href="javascript:void(0);">CLEAR ALL</a>
		<a id="non-surgical-select" class="submit-bt" href="javascript:void(0);">Submit</a>
		<div class="clear-block"></div>
	</div>
			<div class='webform-plastic-procedure-group'>
				<h3 class='procedure-group-title'><?php print $group_title?></h2>
				<?php $procedures = views_get_view_result('webform_plastic_procedure',null,$group_nid);
					foreach($procedures as $procedure){ 
						$procedure_title = $procedure->node_title;
						echo "<input type='checkbox' id='".$procedure->nid."' class='non_surgical_procedure' name='non_surgical_procedure' value='".$procedure_title."' /> ".$procedure_title."<br>";
					}?>
				    <input type="checkbox" id="other-non-surgical-check" class="plastic_procedure" name='other_non_surgical_check' value="Other Non Surgical Procedure" />Other<input type="text" id="other-non-surgical-input" class="other-makeover" name="other_non_surgical_input" size="25" />
			</div>
			
	<div class='clear-block'></div>
</div>
<?php endif;?>
<?php endforeach;?>
<!--Dental Procedure 1st item -->
<div id="webform-dental-procedure">
	<div class="webform-dental-procedure-left">
		<h2>Dental Procedure</h2>
		<?php $results = views_get_view_result('webform_dental_procedure',null); 
				echo "1. <select id='dental_procedure' name='dental_procedure'>";
				echo "<option value='0'>Please select a procedure</option>";
				foreach($results as $result){ 
					$dental_nid = $result->nid;
					$dental_title = $result->node_title;
					echo "<option id='d1-".$dental_nid."' value='".$dental_title."'>".$dental_title."</option>";
				}
				echo "</select>";
		?>
		<div id="dental_procedure_msg"></div>
		<p>2. Please select a tooth/teeth requiring treatment:</p>
		<div class="select-all"><input type="checkbox" name="dental_select_all" class="dental-select-all" value="1" /> Select all</div>
		<div class="dental-bt">
			<a id="dental-clear" class="clear-bt" href="javascript:void(0);">CLEAR ALL</a>
			<a id="dental-select" class="submit-bt" href="javascript:void(0);">Submit</a>
			<div class="clear-block"></div>
		</div>
		
		<div class="dental-upper-teeth">
			<div class="dental-upper-teeth-inner">
				<p>Upper Teeth</p>
				<table>
					<tr>
					<?php for($i=1;$i<=16;$i++) {
						echo "<td><input type='checkbox' class='tooth' name='teeth' value='".$i."' /> ".$i."</td>";
						if($i%4 == 0){
							echo "</tr><tr>";
						}
					}
					?>
					</tr>
				</table>
			</div>
		</div>
		<div class="dental-lower-teeth">
			<div class="dental-lower-teeth-inner">
				<p>Lower Teeth</p>
					<table>
						<tr>
						<?php for($i=17;$i<=32;$i++) {
							echo "<td><input type='checkbox' class='tooth' name='teeth' value='".$i."' /> ".$i."</td>";
							if($i%4 == 0){
								echo "</tr><tr>";
							}
						}
						?>
						</tr>
					</table>
			</div>
		</div>
	</div>
	<div class="webform-dental-procedure-right">
		<div class="dental-image">
			<img src="/sites/all/themes/stu/images/quote/teeth_chart.jpg" />
		</div>
	</div>
	<div class="clear-block"></div>
</div>
<!--Dental Procedure 2nd item -->
<div id="webform-dental-procedure-2">
	<div class="webform-dental-procedure-left">
		<h2>Dental Procedure</h2>
		<?php $results = views_get_view_result('webform_dental_procedure',null); 
				echo "1. <select id='dental_procedure-2' name='dental_procedure'>";
				echo "<option value='0' selected='selected'>Please select a procedure</option>";
				foreach($results as $result){ 
					$dental_nid = $result->nid;
					$dental_title = $result->node_title;
					echo "<option id='d2-".$dental_nid."' value='".$dental_title."'>".$dental_title."</option>";
				}
				echo "</select>";
		?>
		<div id="dental_procedure_msg2"></div>
		<p>2. Please select a tooth/teeth requiring treatment:</p>
		<div class="select-all"><input type="checkbox" name="dental_select_all" class="dental-select-all" value="1" /> Select all</div>
		<div class="dental-bt">
			<a id="dental-clear-2" class="clear-bt" href="javascript:void(0);">CLEAR ALL</a>
			<a id="dental-select-2" class="submit-bt" href="javascript:void(0);">Submit</a>
			<div class="clear-block"></div>
		</div>

		<div class="dental-upper-teeth">
			<div class="dental-upper-teeth-inner">
				<p>Upper Teeth</p>
				<table>
					<tr>
					<?php for($i=1;$i<=16;$i++) {
						echo "<td><input type='checkbox' class='tooth' name='teeth-2' value='".$i."' /> ".$i."</td>";
						if($i%4 == 0){
							echo "</tr><tr>";
						}
					}
					?>
					</tr>
				</table>
			</div>
		</div>
		<div class="dental-lower-teeth">
			<div class="dental-lower-teeth-inner">
				<p>Lower Teeth</p>
					<table>
						<tr>
						<?php for($i=17;$i<=32;$i++) {
							echo "<td><input type='checkbox' class='tooth' name='teeth-2' value='".$i."' /> ".$i."</td>";
							if($i%4 == 0){
								echo "</tr><tr>";
							}
						}
						?>
						</tr>
					</table>
			</div>
		</div>
	</div>
	<div class="webform-dental-procedure-right">
		<div class="dental-image">
			<img src="/sites/all/themes/stu/images/quote/teeth_chart.jpg" />
		</div>
	</div>
	<div class="clear-block"></div>
</div>

<!--Dental Procedure 3st item -->
<div id="webform-dental-procedure-3">
	<div class="webform-dental-procedure-left">
		<h2>Dental Procedure</h2>
		<?php $results = views_get_view_result('webform_dental_procedure',null); 
				echo "1. <select id='dental_procedure-3' name='dental_procedure'>";
				echo "<option value='0' selected='selected'>Please select a procedure</option>";
				foreach($results as $result){ 
					$dental_nid = $result->nid;
					$dental_title = $result->node_title;
					echo "<option id='d3-".$dental_nid."' value='".$dental_title."'>".$dental_title."</option>";
				}
				echo "</select>";
		?>
		<div id="dental_procedure_msg3"></div>
		<p>2. Please select a tooth/teeth requiring treatment:</p>
		<div class="select-all"><input type="checkbox" name="dental_select_all" class="dental-select-all" value="1" /> Select all</div>
		<div class="dental-bt">
			<a id="dental-clear-3" class="clear-bt" href="javascript:void(0);">CLEAR ALL</a>
			<a id="dental-select-3" class="submit-bt" href="javascript:void(0);">Submit</a>
			<div class="clear-block"></div>
		</div>
		
		<div class="dental-upper-teeth">
			<div class="dental-upper-teeth-inner">
				<p>Upper Teeth</p>
				<table>
					<tr>
					<?php for($i=1;$i<=16;$i++) {
						echo "<td><input type='checkbox' class='tooth' name='teeth-3' value='".$i."' /> ".$i."</td>";
						if($i%4 == 0){
							echo "</tr><tr>";
						}
					}
					?>
					</tr>
				</table>
			</div>
		</div>
		<div class="dental-lower-teeth">
			<div class="dental-lower-teeth-inner">
				<p>Lower Teeth</p>
					<table>
						<tr>
						<?php for($i=17;$i<=32;$i++) {
							echo "<td><input type='checkbox' class='tooth' name='teeth-3' value='".$i."' /> ".$i."</td>";
							if($i%4 == 0){
								echo "</tr><tr>";
							}
						}
						?>
						</tr>
					</table>
			</div>
		</div>
	</div>
	<div class="webform-dental-procedure-right">
		<div class="dental-image">
			<img src="/sites/all/themes/stu/images/quote/teeth_chart.jpg" />
		</div>
	</div>
	<div class="clear-block"></div>
</div>

<div id="webform-package">
	<h2>Package</h2>
	<p>Please select a package/packages:</p>
	<?php $results = views_get_view_result('webform_package',null); 
			foreach($results as $result){ 
				$package_nid = $result->nid;
				$package_title = $result->node_title;
				echo "<input type='checkbox' id='".$package_nid."' class='package' name='package' value='".$package_title."' />".$package_title."<br>";
			
			}
	?>
	<div class="package-bt">
		<a id="package-clear" class="clear-bt" href="javascript:void(0);">CLEAR ALL</a>
		<a id="package-select" class="submit-bt" href="javascript:void(0);">Submit</a>
		<div class="clear-block"></div>
	</div>
</div> 

<?php

  // Print out the navigation again at the bottom.
  if (isset($form['submission_info']) || isset($form['navigation'])) {
    unset($form['navigation']['#printed']);
    print drupal_render($form['navigation']);
  }
  
  
  