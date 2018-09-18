<?php
 $field_sg_gender = field_get_items('node', $node, 'field_sg_gender');
 $field_sg_gender = $field_sg_gender[0][value];
 
 $field_sg_dob = field_get_items('node', $node, 'field_sg_dob');
 $field_sg_dob = $field_sg_dob[0][value];
 
 $field_sg_plan_date = field_get_items('node', $node, 'field_sg_plan_date');
 $field_sg_plan_date = $field_sg_plan_date[0][value];
 
 $field_sg_age = field_get_items('node', $node, 'field_sg_age');
 $field_sg_age = $field_sg_age[0][value];
 
 $field_sg_procedures = field_get_items('node', $node, 'field_sg_procedures');
 $field_sg_procedures = $field_sg_procedures[0][value];
 $title = $field_sg_procedures;
 
 $field_sg_expectation = field_get_items('node', $node, 'field_sg_expectation');
 $field_sg_expectation =  $field_sg_expectation[0][value];
 
 $field_sg_questions = field_get_items('node', $node, 'field_sg_questions');
 $field_sg_questions = $field_sg_questions[0][value];
 
 $field_sg_home_date = field_get_items('node', $node, 'field_sg_home_date');
 $field_sg_home_date =  $field_sg_home_date[0][value];
 
 $field_sg_email = field_get_items('node', $node, 'field_sg_email');
 $field_sg_email = $field_sg_email[0][value];
 
 $field_sg_postal_street_address = field_get_items('node', $node, 'field_sg_postal_street_address');
 $field_sg_postal_street_address = $field_sg_postal_street_address[0][value];
 
 $field_sg_suburb = field_get_items('node', $node, 'field_sg_suburb');
 $field_sg_suburb = $field_sg_suburb[0][value];
 
 $field_sg_city = field_get_items('node', $node, 'field_sg_city');
 $field_sg_city = $field_sg_city[0][value];
 
 $field_sg_region_state = field_get_items('node', $node, 'field_sg_region_state');
 $field_sg_region_state = $field_sg_region_state[0][value];
 
 $field_sg_postcode_zip = field_get_items('node', $node, 'field_sg_postcode_zip');
 $field_sg_postcode_zip = $field_sg_postcode_zip[0][value];
 
 $field_sg_countries = field_get_items('node', $node, 'field_sg_countries');
 $field_sg_countries = $field_sg_countries[0][value];
 
 $countries = field_info_field('field_sg_countries');
 $allowed_values = list_allowed_values($countries);
 
 $field_sg_countries = $allowed_values[$field_sg_countries];
 
 $field_sg_preferred_surgeon = field_get_items('node', $node, 'field_sg_preferred_surgeon');
 $field_sg_preferred_surgeon = $field_sg_preferred_surgeon[0][value];
 
 $field_sg_phone = field_get_items('node', $node, 'field_sg_phone');
 $field_sg_phone = $field_sg_phone[0][value];
 
 $field_sg_first_name = field_get_items('node', $node, 'field_sg_first_name');
 $field_sg_first_name = $field_sg_first_name[0][value];
 
 $field_sg_last_name = field_get_items('node', $node, 'field_sg_last_name');
 $field_sg_last_name = $field_sg_last_name[0][value];
 
 $field_sg_nationality = field_get_items('node', $node, 'field_sg_nationality');
 $field_sg_nationality = $field_sg_nationality[0][value];
 
 $field_sg_passport_number = field_get_items('node', $node, 'field_sg_passport_number');
 $field_sg_passport_number = $field_sg_passport_number[0][value];
 
 $languages = array();
 $field_sg_preferred_language = field_get_items('node', $node, 'field_sg_preferred_language');
 if (sizeof($field_sg_preferred_language) > 0) {
	 foreach ($field_sg_preferred_language as $key => $preferred_language) {
		 if ($preferred_language[value]) {
		   $languages[$key] =  $preferred_language[value];
		 }
	 } 
 }
 
 $field_sg_requested_size = field_get_items('node', $node, 'field_sg_requested_size');
 $field_sg_requested_size = $field_sg_requested_size[0][value];
 
 $field_sg_title = field_get_items('node', $node, 'field_sg_title');
 $field_sg_title = $field_sg_title[0]['value'];
 
 $field_term_condition = field_get_items('node', $node, 'field_term_condition');
 $field_term_condition = $field_term_condition[0]['value'];
 
 $field_term_condition = field_get_items('node', $node, 'field_term_condition');
 $field_term_condition = $field_term_condition[0]['value'];
 
 
 // Dental Health
 $field_dental_health = field_get_items('node', $node, 'field_dental_health');
 $field_dental_health = $field_dental_health[0]['value'];
 
 $field_dental_health_text = field_get_items('node', $node, 'field_dental_health_text');
 $field_dental_health_text = $field_dental_health_text[0]['value'];
 
 // Medicines & Conditions
 $field_dental_medicine = field_get_items('node', $node, 'field_dental_medicine');
 $field_dental_medicine = $field_dental_medicine[0]['value'];
 
 $field_dental_supplements = field_get_items('node', $node, 'field_dental_supplements');
 $field_dental_supplements = $field_dental_supplements[0]['value'];
 
 $field_dental_medical_conditions = field_get_items('node', $node, 'field_dental_medical_conditions');
 $field_dental_medical_conditions = $field_dental_medical_conditions[0]['value'];
 
 // Dental Details
  $field_sg_plan_date = field_get_items('node', $node, 'field_sg_plan_date');
  $field_sg_plan_date = $field_sg_plan_date[0][value];
  
  $field_sg_home_date = field_get_items('node', $node, 'field_sg_home_date');
  $field_sg_home_date =  $field_sg_home_date[0][value];
  
 $field_dental_plan_date = field_get_items('node', $node, 'field_dental_plan_date');
 $field_dental_plan_date = ($field_dental_plan_date[0]['value']) ? $field_dental_plan_date[0]['value'] : $field_sg_plan_date;
 
 $field_dental_procedure = field_get_items('node', $node, 'field_dental_procedure');
 $field_dental_procedure = $field_dental_procedure[0]['value'];
 
 $field_dental_expectation = field_get_items('node', $node, 'field_dental_expectation');
 $field_dental_expectation = $field_dental_expectation[0]['value'];
 
 $field_dental_questions = field_get_items('node', $node, 'field_dental_questions');
 $field_dental_questions = $field_dental_questions[0]['value'];
 
 $field_dental_homedate = field_get_items('node', $node, 'field_dental_homedate');
 $field_dental_homedate = ($field_dental_homedate[0]['value']) ? $field_dental_homedate[0]['value'] : $field_sg_home_date;
 
 $field_dental_concerns = field_get_items('node', $node, 'field_dental_concerns');
 $field_dental_concerns = $field_dental_concerns[0]['value'];
 
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>">
  <head>
    <?php print $head; ?>
    <base href='<?php print $url ?>' />
    <title><?php print $print_title; ?></title>
    <?php print $scripts; ?>
    <?php if (isset($sendtoprinter)) print $sendtoprinter; ?>
    <?php print $robots_meta; ?>
    <?php if (theme_get_setting('toggle_favicon')): ?>
      <link rel='shortcut icon' href='<?php print theme_get_setting('favicon') ?>' type='image/x-icon' />
    <?php endif; ?>
    <?php print $css; ?>
  </head>
  <style>
		table {
		  border-collapse: collapse;	
		}
    table tr td {border: 1px solid #cccccc;}
    table.inputcheckbox tr td {border:none;}
    table tr td .checkbox,
    .bottom .checkbox {    
			width: 10px;
      height: 10px;
      background: lightgray;
      outline: 1px solid #ccc;
      display: inline-block;
      margin: 0 5px;
    }
    table tr td .checkbox.active,
    .bottom .checkbox.active {    
			width: 10px;
      height: 10px;
      background: gray;
      outline: 1px solid #333;
      display: inline-block;
      margin: 0 5px;
    }
    .textbox {
		  height: 25px;
      background: lightgray;
      outline: 1px solid #ccc;
      display: inline-block;
      margin: 0 5px;	
		}
  </style>
  <body>
	 <div style="margin-bottom:20px;">
	 <?php /*if ($print_logo): ?>
      <div class="print-logo"><?php print $print_logo; ?></div>
    <?php endif;*/ ?>
    <img src="https://stunningmakeovers.com/sites/all/themes/smo/logo.png" />
   </div>
   <table style="font-size:10px;" width="100%" id="surgeon" cellpadding=0>
		<tr>
			<td>
				<table width="100%" border=0>
					<tr bgcolor="#0070C0" class="heading"><td colspan=8><font color="#ffffff"><b>GENERAL INFORMATION</b></font></td></tr>
					<tr>
						<td width="10%"><b>Title:</b></td>
						<td width="20%">
								<table width="100%" border=0 class="inputcheckbox">
								 <tr>
									<td width="50%"><div class="checkbox <?php print ($field_sg_title == 'Mr.') ? 'active' : '' ?>"></div>Mr.</td>
									<td width="50%"><div class="checkbox <?php print ($field_sg_title == 'Ms.') ? 'active' : '' ?>"></div>Ms.</td>
								 </tr>
								 <tr>
									<td width="50%"><div class="checkbox <?php print ($field_sg_title == 'Mrs.') ? 'active' : '' ?>"></div>Mrs.</td>
									<td width="50%"><div class="checkbox <?php print ($field_sg_title == 'Miss') ? 'active' : '' ?>"></div>Miss</td>
								 </tr>
								</table>
						</td>
						<td width="8%"><b>First Name:</b></td>
						<td width="15%"><div class="textbox"><?php print $field_sg_first_name; ?></div></td>
						<td width="8%"><b>Last Name:</b></td>
						<td width="15%"><div class="textbox"><?php print $field_sg_last_name; ?></div></td>
						<td width="8%"><b>Gender:</b></td>
						<td width="14%">
							<div class="checkbox <?php print ($field_sg_gender == 'Male') ? 'active' : ''; ?>"></div>Male<br>
							<div class="checkbox <?php print ($field_sg_gender == 'Female') ?'active' : ''; ?>"></div>Female
						</td>
					</tr>
					<tr>
						<td colspan=8>
							<table width="100%" border=0>
								<tr>
									<td width=5%><b>Age:</b></td>
									<td width=10%><div class="textbox"><?php print $field_sg_age; ?></div></td>
									<td width=15%><b>Birthdate:</b></td>
									<td width=25%><div class="textbox"><?php print date('d/m/Y',$field_sg_dob); ?></div></td>
									<td width=25%><b>Nationality:</b></td>
									<td width=20%><div class="textbox"><?php print $field_sg_nationality; ?></div></td>
                </tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan=2><b>Postal Code:</b></td>
						<td colspan=2><div class="textbox"><?php print $field_sg_postcode_zip;?></div></td>
						<td colspan=2><b>Country:</b></td>
						<td colspan=2><div class="textbox"><?php print $field_sg_countries;?></div></td>
					</tr>
				</table>
			</td>
		</tr>
		
		<tr>
			<td>
				<table width="100%">
					<tr rowspan="4">
						<td colspan=4><b>Preferred language:</b></td>
						<td width="20%">
							<div class="checkbox <?php print (in_array("Arabic", $languages)) ? 'active' : ''; ?>"></div>Arabic
					  </td>
						<td width="20%">
						  <div class="checkbox <?php print (in_array("English", $languages)) ? 'active' : ''; ?>"></div>English
						</td>
						<td width="20%">
						  <div class="checkbox <?php print (in_array("Italian", $languages)) ? 'active' : ''; ?>"></div>Italian
					  </td>
						<td width="20%">
						  <div class="checkbox <?php print (in_array("Russian", $languages)) ? 'active' : ''; ?>"></div>Russian
						</td>
					</tr>
					
					<tr rowspan="4">
						<td colspan=4></td>
						<td width="20%">
							<div class="checkbox <?php print (in_array("Burmese", $languages)) ? 'active' : ''; ?>"></div>Burmese
						</td>
						<td width="20%">
						  <div class="checkbox <?php print (in_array("Filipino", $languages)) ? 'active' : ''; ?>"></div>Filipino
						</td>
						<td width="20%">
						  <div class="checkbox <?php print (in_array("Japanese", $languages)) ? 'active' : ''; ?>"></div>Japanese
						</td>
						<td width="20%">
						  <div class="checkbox <?php print (in_array("Spanish", $languages)) ? 'active' : ''; ?>"></div>Spanish
						</td>
					</tr>
					
					<tr>
						<td colspan=4></td>
						<td width="20%">
							<div class="checkbox <?php print (in_array("Cambodian", $languages)) ? 'active' : ''; ?>"></div>Cambodian
						</td>
						<td width="20%">
						  <div class="checkbox <?php print (in_array("French", $languages)) ? 'active' : ''; ?>"></div>French
						</td>
						<td width="20%">
						  <div class="checkbox <?php print (in_array("Korean", $languages)) ? 'active' : ''; ?>"></div>Korean
						</td>
						<td width="20%">
						  <div class="checkbox <?php print (in_array("Thai", $languages)) ? 'active' : ''; ?>"></div>Thai
						</td>
					</tr>
					
					<tr>
						<td colspan=4></td>
						<td width="20%">
							<div class="checkbox <?php print (in_array("Chinese", $languages)) ? 'active' : ''; ?>"></div>Chinese
					  </td>
						<td width="20%">
						  <div class="checkbox <?php print (in_array("German", $languages)) ? 'active' : ''; ?>"></div>German
						</td>
						<td width="20%">
						  <div class="checkbox <?php print (in_array("Malayu", $languages)) ? 'active' : ''; ?>"></div>Malayu
						</td>
						<td width="20%">
						  <div class="checkbox <?php print (in_array("Vietnamese", $languages)) ? 'active' : ''; ?>"></div>Vietnamese
						</td>
					</tr>
				</table>
			</td>
		</tr>
    
    <!--DENTAL DETAILS-->
    <tr>
			<td>
				<table width="100%">
					<tr bgcolor="#0070C0" class="heading">
						 <td colspan=4><font color="#ffffff"><b>DENTAL DETAILS</b></font></td>
					</tr>
          
					<tr>
						 <td colspan=2>Treatment date</td>
						 <td colspan=2><div class="textbox"><?php print date('d/m/Y',$field_dental_plan_date); ?></div></td>
					</tr>
          
				  <tr>
						 <td colspan=2>Flying home date</td>
						 <td colspan=2><div class="textbox"><?php print date('d/m/Y',$field_dental_homedate); ?></div></td>
					</tr>
					
					
					<tr>
						 <td colspan=2>What concerns do you have about your teeth?</td>
						 <td colspan=2><div class="textbox"><?php print $field_dental_concerns; ?></div></td>
					</tr>
          
					<tr>
						 <td colspan=2>What treatment do you require?</td>
						 <td colspan=2><div class="textbox"><?php print $field_dental_procedure; ?></div></td>
					</tr>
					
					
					<tr>
						 <td colspan=2><b>What results do you expect?</b></td>
						 <td colspan=2><div class="textbox"><?php print $field_dental_expectation; ?></div></td>
					</tr>
          
					<tr>
						 <td colspan=2><b>Questions to dentist</b></td>
						 <td colspan=2><div class="textbox"><?php print $field_dental_questions; ?></div></td>
					</tr>
					
        </table>
			</td>
		</tr>
    
    <!--Medicines & Conditions-->
    <tr>
			<td>
				<table width="100%">
					<tr bgcolor="#0070C0" class="heading">
						 <td colspan=4><font color="#ffffff"><b>MEDICINES & CONDITIONS</b></font></td>
					</tr>
          
					<tr>
						 <td colspan=2>Name and dosage of medications you take</td>
						 <td colspan=2><div class="textbox"><?php print $field_dental_medicine; ?></div></td>
					</tr>
          
				  <tr>
						 <td colspan=2>Details of vitamins/supplements you take</td>
						 <td colspan=2><div class="textbox"><?php print $field_dental_supplements; ?></div></td>
					</tr>
					
					<tr>
						 <td colspan=2>Details of any medical conditions you have</td>
						 <td colspan=2><div class="textbox"><?php print $field_dental_medical_conditions; ?></div></td>
					</tr>
          
        </table>
			</td>
		</tr>
    
   <!--DENTAL HEALTH-->
   
    <tr>
      <td>
				<table width="100%">
          <tr>
           <td>Do you have pain anywhere in the mouth or any other oral or dental issues?</td>
           <td><div class="checkbox <?php print ($field_dental_health == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
           <td><div class="checkbox <?php print ($field_dental_health == 'No') ? 'active' : ''; ?>"></div>No</td>
           <td>If yes, please specify</td>
           <td><div class="textbox"><?php print $field_dental_health_text; ?></div></td>
          </tr>
       </table>
			</td>
    </tr>
  
  </table>
	
	<div class="bottom" style="font-size:10px;margin-top:20px;"><span style="margin-top:10px;font-weight:bold;color:red;"><i>(Please tick)</i></span> <div class="checkbox <?php print ($field_term_condition) ? 'active' : ''; ?>"></div><b> I hereby certify that all the information above are true and correct.</b></div>
		 
 </body>
</html>
