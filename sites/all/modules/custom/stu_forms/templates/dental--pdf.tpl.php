<?php
 //watchdog('debug',print_r($node,true)); 
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
 
 //~ watchdog('debug',print_r($node,true));
 //~ 
 //~ watchdog('debug',"DATA = ".  $field_dental_procedure);
 //~ 
 //~ watchdog('debug',"DATA = ".$field_dental_expectation);
 
 
 // Medical History
 $field_dental_medications = field_get_items('node', $node, 'field_dental_medications');
 $field_dental_medications = $field_dental_medications[0]['value'];
 
 $field_dental_vitamins = field_get_items('node', $node, 'field_dental_vitamins');
 $field_dental_vitamins = $field_dental_vitamins[0]['value'];
 
 $field_sg_medications = field_get_items('node', $node, 'field_sg_medications');
 $field_sg_medications = $field_sg_medications[0]['value'];
 
 $field_sg_supplements = field_get_items('node', $node, 'field_sg_supplements');
 $field_sg_supplements = $field_sg_supplements[0]['value'];
 
 
 // Medical Condition
 $field_sg_heart = field_get_items('node', $node, 'field_sg_heart');
 $field_sg_heart = $field_sg_heart[0]['value'];
 
 $field_sg_heart_info = field_get_items('node', $node, 'field_sg_heart_info');
 $field_sg_heart_info = $field_sg_heart_info[0]['value'];
 
 $field_sg_diabetes = field_get_items('node', $node, 'field_sg_diabetes');
 $field_sg_diabetes = $field_sg_diabetes[0]['value'];
 
 $field_sg_diabetes_info = field_get_items('node', $node, 'field_sg_diabetes_info');
 $field_sg_diabetes_info = $field_sg_diabetes_info[0]['value'];
 
 $field_sg_blood_disorder = field_get_items('node', $node, 'field_sg_blood_disorder');
 $field_sg_blood_disorder = $field_sg_blood_disorder[0]['value'];
 
 $field_sg_blood_disorder_info = field_get_items('node', $node, 'field_sg_blood_disorder_info');
 $field_sg_blood_disorder_info = $field_sg_blood_disorder_info[0]['value'];
 
 $field_sg_blood_pressure = field_get_items('node', $node, 'field_sg_blood_pressure');
 $field_sg_blood_pressure = $field_sg_blood_pressure[0]['value'];
 
 $field_sg_blood_pressure_info = field_get_items('node', $node, 'field_sg_blood_pressure_info');
 $field_sg_blood_pressure_info = $field_sg_blood_pressure_info[0]['value'];
 
 $field_sg_neurologic = field_get_items('node', $node, 'field_sg_neurologic');
 $field_sg_neurologic = $field_sg_neurologic[0]['value'];
 
 $field_sg_neurologic_info = field_get_items('node', $node, 'field_sg_neurologic_info');
 $field_sg_neurologic_info = $field_sg_neurologic_info[0]['value'];
 
 $field_sg_hiv = field_get_items('node', $node, 'field_sg_hiv');
 $field_sg_hiv = $field_sg_hiv[0]['value'];
 
 $field_sg_hiv_info = field_get_items('node', $node, 'field_sg_hiv_info');
 $field_sg_hiv_info = $field_sg_hiv_info[0]['value'];
 
 $field_sg_thyroid = field_get_items('node', $node, 'field_sg_thyroid');
 $field_sg_thyroid = $field_sg_thyroid[0]['value'];
 
 $field_sg_thyroid_info = field_get_items('node', $node, 'field_sg_thyroid_info');
 $field_sg_thyroid_info = $field_sg_thyroid_info[0]['value'];
 
 $field_sg_lung = field_get_items('node', $node, 'field_sg_lung');
 $field_sg_lung = $field_sg_lung[0]['value'];
 
 $field_sg_lung_info = field_get_items('node', $node, 'field_sg_lung_info');
 $field_sg_lung_info = $field_sg_lung_info[0]['value'];
 
 $field_sg_liver = field_get_items('node', $node, 'field_sg_liver');
 $field_sg_liver = $field_sg_liver[0]['value'];
 
 $field_sg_liver_info = field_get_items('node', $node, 'field_sg_liver_info');
 $field_sg_liver_info = $field_sg_liver_info[0]['value'];
 
 $field_sg_cancer = field_get_items('node', $node, 'field_sg_cancer');
 $field_sg_cancer = $field_sg_cancer[0]['value'];
 
 $field_sg_cancer_info = field_get_items('node', $node, 'field_sg_cancer_info');
 $field_sg_cancer_info = $field_sg_cancer_info[0]['value'];
 
 $field_sg_depression = field_get_items('node', $node, 'field_sg_depression');
 $field_sg_depression = $field_sg_depression[0]['value'];
 
 $field_sg_depression_info = field_get_items('node', $node, 'field_sg_depression_info');
 $field_sg_depression_info = $field_sg_depression_info[0]['value'];
 
 $field_sg_anaesthesia = field_get_items('node', $node, 'field_sg_anaesthesia');
 $field_sg_anaesthesia = $field_sg_anaesthesia[0]['value'];
 
 $field_sg_anaesthesia_info = field_get_items('node', $node, 'field_sg_anaesthesia_info');
 $field_sg_anaesthesia_info = $field_sg_anaesthesia_info[0]['value'];
 
 $field_sg_other = field_get_items('node', $node, 'field_sg_other');
 $field_sg_other = $field_sg_other[0]['value'];
 
 $field_sg_other_specify = field_get_items('node', $node, 'field_sg_other_specify');
 $field_sg_other_specify = $field_sg_other_specify[0]['value'];
 
 $field_cardiovascular_accidents = field_get_items('node', $node, 'field_cardiovascular_accidents');
 $field_cardiovascular_accidents = $field_cardiovascular_accidents[0]['value'];
 
 $field_cardiovascular_acc_info = field_get_items('node', $node, 'field_cardiovascular_acc_info');
 $field_cardiovascular_acc_info = $field_cardiovascular_acc_info[0]['value'];
 
 $field_bleeding_tendency = field_get_items('node', $node, 'field_bleeding_tendency');
 $field_bleeding_tendency = $field_bleeding_tendency[0]['value'];
 
 $field_bleeding_tendency_info = field_get_items('node', $node, 'field_bleeding_tendency_info');
 $field_bleeding_tendency_info = $field_bleeding_tendency_info[0]['value'];
 
 $field_hyperthyroidism = field_get_items('node', $node, 'field_hyperthyroidism');
 $field_hyperthyroidism = $field_hyperthyroidism[0]['value'];
 
 $field_hyperthyroidism_info = field_get_items('node', $node, 'field_hyperthyroidism_info');
 $field_hyperthyroidism_info = $field_hyperthyroidism_info[0]['value'];
 
 $field_adrenal_insufficiency = field_get_items('node', $node, 'field_adrenal_insufficiency');
 $field_adrenal_insufficiency = $field_adrenal_insufficiency[0]['value'];
 
 $field_adrenal_insufficiency_info = field_get_items('node', $node, 'field_adrenal_insufficiency_info');
 $field_adrenal_insufficiency_info = $field_adrenal_insufficiency_info[0]['value'];
 
 $field_hepatitus = field_get_items('node', $node, 'field_hepatitus');
 $field_hepatitus = $field_hepatitus[0]['value'];
 
 $field_hepatitus_info = field_get_items('node', $node, 'field_hepatitus_info');
 $field_hepatitus_info = $field_hepatitus_info[0]['value'];
 
 $field_keloid_scarring = field_get_items('node', $node, 'field_keloid_scarring');
 $field_keloid_scarring = $field_keloid_scarring[0]['value'];
 
 $field_keloid_scarring_info = field_get_items('node', $node, 'field_keloid_scarring_info');
 $field_keloid_scarring_info = $field_keloid_scarring_info[0]['value'];
 
 $field_major_operation = field_get_items('node', $node, 'field_major_operation');
 $field_major_operation = $field_major_operation[0]['value'];
 
 $field_major_operation_info = field_get_items('node', $node, 'field_major_operation_info');
 $field_major_operation_info = $field_major_operation_info[0]['value'];
 
 $field_underlying_disease = field_get_items('node', $node, 'field_underlying_disease');
 $field_underlying_disease = $field_underlying_disease[0]['value'];
 
 $field_underlying_disease_info = field_get_items('node', $node, 'field_underlying_disease_info');
 $field_underlying_disease_info = $field_underlying_disease_info[0]['value'];
 
 $field_have_you_ever_been_treated = field_get_items('node', $node, 'field_have_you_ever_been_treated');
 $field_have_you_ever_been_treated = $field_have_you_ever_been_treated[0]['value'];
 
 $field_treated_info = field_get_items('node', $node, 'field_treated_info');
 $field_treated_info = $field_treated_info[0]['value'];
 
  
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
		
		<!--DENTAL DETAILS-->
    <tr>
			<td>
				<table width="100%">
					<tr bgcolor="#0070C0" class="heading">
						 <td colspan=4><font color="#ffffff"><b>DENTAL DETAILS</b></font></td>
					</tr>
          
					<tr>
						 <td colspan=2>Treatment date</td>
						 <td colspan=2><div class="textbox"><?php print ($field_dental_plan_date) ? date('d/m/Y',$field_dental_plan_date) : ''; ?></div></td>
					</tr>
          
				  <tr>
						 <td colspan=2>Flying home date</td>
						 <td colspan=2><div class="textbox"><?php print ($field_dental_homedate) ? date('d/m/Y',$field_dental_homedate) : ''; ?></div></td>
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
    
    <!--Medical History-->
    <?php /* if($field_dental_medications || $field_dental_vitamins || $field_sg_medications ||  $field_sg_supplements) { ?>
    <tr>
			<td>
				<table width="100%">
					<tr bgcolor="#0070C0" class="heading">
						 <td colspan=4><font color="#ffffff"><b>MEDICAL HISTORY</b></font></td>
					</tr>
          
          <?php if($field_sg_medications): ?>
					<tr>
						 <td colspan=2>List all medications you currently take including dosage for each</td>
						 <td colspan=2><div class="textbox"><?php print $field_sg_medications; ?></div></td>
					</tr>
          <?php endif; ?>
          
          <?php if($field_dental_medications): ?>
					<tr>
						 <td colspan=2>List all medications you currently take including dosage for each</td>
						 <td colspan=2><div class="textbox"><?php print $field_dental_medications; ?></div></td>
					</tr>
          <?php endif; ?>
          
          <?php if($field_sg_supplements): ?>
				  <tr>
						 <td colspan=2>List all vitamins or food/nutritional supplements you currently take</td>
						 <td colspan=2><div class="textbox"><?php print $field_sg_supplements; ?></div></td>
					</tr>
					<?php endif; ?>
          
          <?php if($field_dental_vitamins): ?>
				  <tr>
						 <td colspan=2>List all vitamins or food/nutritional supplements you currently take</td>
						 <td colspan=2><div class="textbox"><?php print $field_dental_vitamins; ?></div></td>
					</tr>
					<?php endif; ?>
          
        </table>
			</td>
		</tr>
    <?php } */ ?>
    <!--Medical History-->
    
    <!--Medicines & Conditions-->
    <?php if($field_dental_medicine || $field_dental_supplements || $field_dental_medical_conditions) { ?>
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
    <?php } else { ?>
    <!--Medicines & Conditions-->
     
    <tr>
			<td>
				<table width="100%">
					<tr bgcolor="#0070C0" class="heading">
						 <td colspan=5><font color="#ffffff"><b>MEDICINES & CONDITIONS</b></font></td>
					</tr>
					<?php if($field_sg_diabetes == 'Yes'):?>
					<tr>
						 <td>Diabetes or blood sugar problems</td>
						 <td><div class="checkbox <?php print ($field_sg_diabetes == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_diabetes == 'No') ? 'active' : ''; ?>"></div>No</td>
						 <td>If yes, please specify</td>
				     <td><div class="textbox"><?php print $field_sg_diabetes_info; ?></div></td>
					</tr>
					<?php endif;?>
          <?php if($field_sg_thyroid == 'Yes'):?>
					<tr>
						 <td>Thyroid problems</td>
						 <td><div class="checkbox <?php print ($field_sg_thyroid == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_thyroid == 'No') ? 'active' : ''; ?>"></div>No</td>
						 <td>If yes, please specify</td>
				     <td><div class="textbox"><?php print $field_sg_thyroid_info; ?></div></td>
					</tr>
					<?php endif;?>
          <?php if($field_sg_heart == 'Yes'):?>
					<tr>
						 <td>Heart problems</td>
						 <td><div class="checkbox <?php print ($field_sg_heart == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_heart == 'No') ? 'active' : ''; ?>"></div>No</td>
						 <td>If yes, please specify</td>
				     <td><div class="textbox"><?php print $field_sg_heart_info; ?></div></td>
					</tr>
					<?php endif;?>
          <?php if($field_sg_lung == 'Yes'):?>
					<tr>
					   <td>Lung problems </td>
						 <td><div class="checkbox <?php print ($field_sg_lung == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_lung == 'No') ? 'active' : ''; ?>"></div>No</td>
						 <td>If yes, please specify</td>
				     <td><div class="textbox"><?php print $field_sg_lung_info; ?></div></td>
					</tr>
					<?php endif;?>
          <?php if($field_sg_blood_pressure == 'Yes'):?>
					<tr>
						 <td>Blood pressure problems</td>
						 <td><div class="checkbox <?php print ($field_sg_blood_pressure == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_blood_pressure == 'No') ? 'active' : ''; ?>"></div>No</td>
						 <td>If yes, please specify</td>
				     <td><div class="textbox"><?php print $field_sg_blood_pressure_info; ?></div></td>
					</tr>
					<?php endif;?>
          <?php if($field_sg_liver == 'Yes'):?>
					<tr>
						 <td>Kidney or Liver problems</td>
						 <td><div class="checkbox <?php print ($field_sg_liver == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_liver == 'No') ? 'active' : ''; ?>"></div>No</td>
						 <td>If yes, please specify</td>
				     <td><div class="textbox"><?php print $field_sg_liver_info; ?></div></td>
					</tr>
					<?php endif;?>
          <?php if($field_sg_blood_disorder == 'Yes'):?>
					
					<tr>
						 <td>Blood disorders</td>
						 <td><div class="checkbox <?php print ($field_sg_blood_disorder == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_blood_disorder == 'No') ? 'active' : ''; ?>"></div>No</td>
						 <td>If yes, please specify</td>
				     <td><div class="textbox"><?php print $field_sg_blood_disorder_info; ?></div></td>
					</tr>
					<?php endif;?>
          <?php if($field_sg_cancer == 'Yes'):?>
					<tr>
						 <td>Previous/current history of cancer</td>
						 <td><div class="checkbox <?php print ($field_sg_cancer == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_cancer == 'No') ? 'active' : ''; ?>"></div>No</td>
						 <td>If yes, please specify</td>
				     <td><div class="textbox"><?php print $field_sg_cancer_info; ?></div></td>
					</tr>
					<?php endif;?>
          <?php if($field_sg_hiv == 'Yes'):?>
					<tr>
						 <td>HIV or AIDS</td>
						 <td><div class="checkbox <?php print ($field_sg_hiv == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_hiv == 'No') ? 'active' : ''; ?>"></div>No</td>
						 <td>If yes, please specify</td>
				     <td><div class="textbox"><?php print $field_sg_hiv_info; ?></div></td>
					</tr>
					<?php endif;?>
          <?php if($field_sg_depression == 'Yes'):?>
					<tr>
						 <td>Nervous Breakdowns/Depression</td>
						 <td><div class="checkbox <?php print ($field_sg_depression == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_depression == 'No') ? 'active' : ''; ?>"></div>No</td>
						 <td>If yes, please specify</td>
				     <td><div class="textbox"><?php print $field_sg_depression_info; ?></div></td>
					</tr>
					<?php endif;?>
          <?php if($field_sg_neurologic == 'Yes'):?>
					<tr>
						 <td>Neurologic problems</td>
						 <td><div class="checkbox <?php print ($field_sg_neurologic == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_neurologic == 'No') ? 'active' : ''; ?>"></div>No</td>
						 <td>If yes, please specify</td>
				     <td><div class="textbox"><?php print $field_sg_neurologic_info; ?></div></td>
				  </tr>
					<?php endif;?>
          <?php if($field_sg_anaesthesia == 'Yes'):?>
					<tr>
						 <td>Anesthesia problems</td>
						 <td><div class="checkbox <?php print ($field_sg_anaesthesia == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_anaesthesia == 'No') ? 'active' : ''; ?>"></div>No</td>
						 <td>If yes, please specify</td>
				     <td><div class="textbox"><?php print $field_sg_anaesthesia_info; ?></div></td>
					</tr>
					<?php endif;?>
          <?php if($field_cardiovascular_accidents == 'Yes'):?>
					<tr>
				    <td>Cardiovascular Accidents</td>
				    <td><div class="checkbox <?php print ($field_cardiovascular_accidents == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
				    <td><div class="checkbox <?php print ($field_cardiovascular_accidents == 'No') ? 'active' : ''; ?>"></div>No</td>
				    <td>If yes, please specify</td>
				    <td><div class="textbox"><?php print $field_cardiovascular_acc_info; ?></div></td>
				  </tr>
				  <?php endif;?>
          <?php if($field_bleeding_tendency == 'Yes'):?>
				  <tr>
				    <td>Bleeding Tendency</td>
				    <td><div class="checkbox <?php print ($field_bleeding_tendency == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
				    <td><div class="checkbox <?php print ($field_bleeding_tendency == 'No') ? 'active' : ''; ?>"></div>No</td>
				    <td>If yes, please specify</td>
				    <td><div class="textbox"><?php print $field_bleeding_tendency_info; ?></div></td>
				  </tr>
				  <?php endif;?>
          <?php if($field_hyperthyroidism == 'Yes'):?>
				  <tr>
				    <td>Hyperthyroidism</td>
				    <td><div class="checkbox <?php print ($field_hyperthyroidism == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
				    <td><div class="checkbox <?php print ($field_hyperthyroidism == 'No') ? 'active' : ''; ?>"></div>No</td>
				    <td>If yes, please specify</td>
				    <td><div class="textbox"><?php print $field_hyperthyroidism_info; ?></div></td>
				  </tr>
				  <?php endif;?>
          <?php if($field_adrenal_insufficiency == 'Yes'):?>
				  <tr>
				    <td>Adrenal Insufficiency</td>
				    <td><div class="checkbox <?php print ($field_adrenal_insufficiency == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
				    <td><div class="checkbox <?php print ($field_adrenal_insufficiency == 'No') ? 'active' : ''; ?>"></div>No</td>
				    <td>If yes, please specify</td>
				    <td><div class="textbox"><?php print $field_adrenal_insufficiency_info; ?></div></td>
				  </tr>
				  <?php endif;?>
          <?php if($field_hepatitus == 'Yes'):?>
				  <tr>
				    <td>Hepatitus</td>
				    <td><div class="checkbox <?php print ($field_hepatitus == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
				    <td><div class="checkbox <?php print ($field_hepatitus == 'No') ? 'active' : ''; ?>"></div>No</td>
				    <td>If yes, please specify</td>
				    <td><div class="textbox"><?php print $field_hepatitus_info; ?></div></td>
				  </tr>
				  <?php endif;?>
          <?php if($field_keloid_scarring == 'Yes'):?>
				  <tr>
				    <td>Keloid Scarring</td>
				    <td><div class="checkbox <?php print ($field_keloid_scarring == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
				    <td><div class="checkbox <?php print ($field_keloid_scarring == 'No') ? 'active' : ''; ?>"></div>No</td>
				    <td>If yes, please specify</td>
				    <td><div class="textbox"><?php print $field_keloid_scarring_info; ?></div></td>
				  </tr>
				  <?php endif;?>
          <?php if($field_major_operation == 'Yes'):?>
				  <tr>
				    <td>Major Operation</td>
				    <td><div class="checkbox <?php print ($field_major_operation == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
				    <td><div class="checkbox <?php print ($field_major_operation == 'No') ? 'active' : ''; ?>"></div>No</td>
				    <td>If yes, please specify</td>
				    <td><div class="textbox"><?php print $field_major_operation_info; ?></div></td>
				  </tr>
				  <?php endif;?>
          <?php if($field_underlying_disease == 'Yes'):?>
				  <tr>
				    <td>Underlying Disease/Pre-existing Medical Conditions</td>
				    <td><div class="checkbox <?php print ($field_underlying_disease == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
				    <td><div class="checkbox <?php print ($field_underlying_disease == 'No') ? 'active' : ''; ?>"></div>No</td>
				    <td>If yes, please specify</td>
				    <td><div class="textbox"><?php print $field_underlying_disease_info; ?></div></td>
				  </tr>
				  <?php endif;?>
          <?php if($field_have_you_ever_been_treated == 'Yes'):?>
				  <tr>
				    <td>Have you ever been treated for depression?</td>
				    <td><div class="checkbox <?php print ($field_have_you_ever_been_treated == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
				    <td><div class="checkbox <?php print ($field_have_you_ever_been_treated == 'No') ? 'active' : ''; ?>"></div>No</td>
				    <td>If yes, please specify</td>
				    <td><div class="textbox"><?php print $field_treated_info; ?></div></td>
				  </tr>
				  <?php endif;?>
				 </table>
			</td>
		</tr>
    
    <?php } ?>
    
   <!--DENTAL HEALTH-->
   
    <tr>
      <td>
				<table width="100%">
          <tr bgcolor="#0070C0" class="heading">
						 <td colspan=5><font color="#ffffff"><b>DENTAL HEALTH</b></font></td>
					</tr>
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
  <div class="bottom" style="font-size:10px;margin-top:20px;padding-top:20;"><span style="margin-top:10px;font-weight:bold;color:red;"><i>(Please tick)</i></span> <div class="checkbox <?php print ($field_term_condition) ? 'active' : ''; ?>"></div><b> I hereby certify that all the information above are true and correct.</b></div>
 </body>
</html>
