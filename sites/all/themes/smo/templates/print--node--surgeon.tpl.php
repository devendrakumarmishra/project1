<?php

/**
 * @file
 * Default theme implementation to display a printer-friendly version page.
 *
 * This file is akin to Drupal's page.tpl.php template. The contents being
 * displayed are all included in the $content variable, while the rest of the
 * template focuses on positioning and theming the other page elements.
 *
 * All the variables available in the page.tpl.php template should also be
 * available in this template. In addition to those, the following variables
 * defined by the print module(s) are available:
 *
 * Arguments to the theme call:
 * - $node: The node object. For node content, this is a normal node object.
 *   For system-generated pages, this contains usually only the title, path
 *   and content elements.
 * - $format: The output format being used ('html' for the Web version, 'mail'
 *   for the send by email, 'pdf' for the PDF version, etc.).
 * - $expand_css: TRUE if the CSS used in the file should be provided as text
 *   instead of a list of @include directives.
 * - $message: The message included in the send by email version with the
 *   text provided by the sender of the email.
 *
 * Variables created in the preprocess stage:
 * - $print_logo: the image tag with the configured logo image.
 * - $content: the rendered HTML of the node content.
 * - $scripts: the HTML used to include the JavaScript files in the page head.
 * - $footer_scripts: the HTML  to include the JavaScript files in the page
 *   footer.
 * - $sourceurl_enabled: TRUE if the source URL infromation should be
 *   displayed.
 * - $url: absolute URL of the original source page.
 * - $source_url: absolute URL of the original source page, either as an alias
 *   or as a system path, as configured by the user.
 * - $cid: comment ID of the node being displayed.
 * - $print_title: the title of the page.
 * - $head: HTML contents of the head tag, provided by drupal_get_html_head().
 * - $robots_meta: meta tag with the configured robots directives.
 * - $css: the syle tags contaning the list of include directives or the full
 *   text of the files for inline CSS use.
 * - $sendtoprinter: depending on configuration, this is the script tag
 *   including the JavaScript to send the page to the printer and to close the
 *   window afterwards.
 *
 * print[--format][--node--content-type[--nodeid]].tpl.php
 *
 * The following suggestions can be used:
 * 1. print--format--node--content-type--nodeid.tpl.php
 * 2. print--format--node--content-type.tpl.php
 * 3. print--format.tpl.php
 * 4. print--node--content-type--nodeid.tpl.php
 * 5. print--node--content-type.tpl.php
 * 6. print.tpl.php
 *
 * Where format is the ouput format being used, content-type is the node's
 * content type and nodeid is the node's identifier (nid).
 *
 * @see print_preprocess_print()
 * @see theme_print_published
 * @see theme_print_breadcrumb
 * @see theme_print_footer
 * @see theme_print_sourceurl
 * @see theme_print_url_list
 * @see page.tpl.php
 * @ingroup print
 */
 
 
 $field_sg_height = field_get_items('node', $node, 'field_sg_height');
 $field_sg_height = $field_sg_height[0][value];
 
 $field_sg_weight = field_get_items('node', $node, 'field_sg_weight');
 $field_sg_weight = $field_sg_weight[0][value];
 
 $field_sg_images = field_get_items('node', $node, 'field_sg_images');
 $field_sg_images = $field_sg_images[0][value];
 
 $field_sg_gender = field_get_items('node', $node, 'field_sg_gender');
 $field_sg_gender = $field_sg_gender[0][value];
 
 $field_sg_dob = field_get_items('node', $node, 'field_sg_dob');
 $field_sg_dob = $field_sg_dob[0][value];
 
 $field_sg_plan_date = field_get_items('node', $node, 'field_sg_plan_date');
 $field_sg_plan_date = $field_sg_plan_date[0][value];
 
 $field_sg_age = field_get_items('node', $node, 'field_sg_age');
 $field_sg_age = $field_sg_age[0][value];
 
 $field_sg_procedures = field_get_items('node', $node, 'field_sg_procedures');
 $field_sg_procedures = $field_sg_procedures[0][nid];
 
 $field_sg_procedures =$title = db_query("SELECT title FROM {node} WHERE nid = :nid", array(':nid' => $field_sg_procedures))->fetchField();
 
 $field_sg_expectation = field_get_items('node', $node, 'field_sg_expectation');
 $field_sg_expectation =  $field_sg_expectation[0][value];
 
 $field_sg_questions = field_get_items('node', $node, 'field_sg_questions');
 $field_sg_questions = $field_sg_questions[0][value];
 
 $field_sg_home_date = field_get_items('node', $node, 'field_sg_home_date');
 $field_sg_home_date =  $field_sg_home_date[0][value];
 
 $field_sg_diabetes = field_get_items('node', $node, 'field_sg_diabetes');
 $field_sg_diabetes = $field_sg_diabetes[0][value];
 
 $field_sg_heart = field_get_items('node', $node, 'field_sg_heart');
 $field_sg_heart = $field_sg_heart[0][value];
 
 $field_sg_blood_pressure = field_get_items('node', $node, 'field_sg_blood_pressure');
 $field_sg_blood_pressure = $field_sg_blood_pressure[0][value];
 
 $field_sg_blood_disorder = field_get_items('node', $node, 'field_sg_blood_disorder');
 $field_sg_blood_disorder = $field_sg_blood_disorder[0][value];
 
 $field_sg_hiv = field_get_items('node', $node, 'field_sg_hiv');
 $field_sg_hiv = $field_sg_hiv[0][value];
 
 $field_sg_neurologic = field_get_items('node', $node, 'field_sg_neurologic');
 $field_sg_neurologic  = $field_sg_neurologic [0][value];
 
 $field_sg_thyroid = field_get_items('node', $node, 'field_sg_thyroid');
  $field_sg_thyroid  = $field_sg_thyroid [0][value];

 $field_sg_lung = field_get_items('node', $node, 'field_sg_lung');
 $field_sg_lung = $field_sg_lung[0][value];
 
 $field_sg_liver = field_get_items('node', $node, 'field_sg_liver');
 $field_sg_liver = $field_sg_liver[0][value];
 
 $field_sg_cancer = field_get_items('node', $node, 'field_sg_cancer');
 $field_sg_cancer = $field_sg_cancer[0][value];
 
 $field_sg_depression = field_get_items('node', $node, 'field_sg_depression');
  $field_sg_depression = $field_sg_depression[0][value];
 
 $field_sg_anaesthesia = field_get_items('node', $node, 'field_sg_anaesthesia');
 $field_sg_anaesthesia = $field_sg_anaesthesia[0][value];
 
 $field_sg_specify = field_get_items('node', $node, 'field_sg_specify');
 $field_sg_specify = $field_sg_specify[0][value];
 
 $field_sg_other = field_get_items('node', $node, 'field_sg_other');
 $field_sg_other = $field_sg_other[0][value];
 
 $field_sg_other_specify = field_get_items('node', $node, 'field_sg_other_specify');
 $field_sg_other_specify = $field_sg_other_specify[0][value];
 
 $field_sg_wm_medication = field_get_items('node', $node, 'field_sg_wm_medication');
 $field_sg_wm_medication = $field_sg_wm_medication[0][value];
 
 $field_sg_wm_surgery = field_get_items('node', $node, 'field_sg_wm_surgery');
 $field_sg_wm_surgery = $field_sg_wm_surgery[0][value];
 
 $field_sg_wm_pregnant = field_get_items('node', $node, 'field_sg_wm_pregnant');
 $field_sg_wm_pregnant = $field_sg_wm_pregnant[0][value];
 
 $field_sg_wm_pregnancies = field_get_items('node', $node, 'field_sg_wm_pregnancies');
 $field_sg_wm_pregnancies = $field_sg_wm_pregnancies[0][value];
 
 $field_sg_wm_children = field_get_items('node', $node, 'field_sg_wm_children');
 $field_sg_wm_children = $field_sg_wm_children[0][value];
 
 $field_sg_wm_age_youngest = field_get_items('node', $node, 'field_sg_wm_age_youngest');
 $field_sg_wm_age_youngest = $field_sg_wm_age_youngest[0][value];
 
 $field_sg_wm_breastfed = field_get_items('node', $node, 'field_sg_wm_breastfed');
 $field_sg_wm_breastfed = $field_sg_wm_breastfed[0][value];
 
 $field_sg_wm_last_baby = field_get_items('node', $node, 'field_sg_wm_last_baby');
 $field_sg_wm_last_baby = $field_sg_wm_last_baby[0][value];
 
 $field_sg_wm_milk = field_get_items('node', $node, 'field_sg_wm_milk');
 $field_sg_wm_milk = $field_sg_wm_milk[0][value];
 
 $field_sg_when_hospitalized = field_get_items('node', $node, 'field_sg_when_hospitalized');
 $field_sg_when_hospitalized = $field_sg_when_hospitalized[0][value];
 
 $field_sg_wm_lastfeed = field_get_items('node', $node, 'field_sg_wm_lastfeed');
 $field_sg_wm_lastfeed = $field_sg_wm_lastfeed[0][value];
 
 $field_sg_hospitalized = field_get_items('node', $node, 'field_sg_hospitalized');
 $field_sg_hospitalized = $field_sg_hospitalized[0][value];
 
 $field_sg_implants = field_get_items('node', $node, 'field_sg_implants');
 $field_sg_implants = $field_sg_implants[0][value];
 
 $field_sg_implants_specify = field_get_items('node', $node, 'field_sg_implants_specify');
 $field_sg_implants_specify = $field_sg_implants_specify[0][value];
 
 $field_sg_healing = field_get_items('node', $node, 'field_sg_healing');
 $field_sg_healing = $field_sg_healing[0][value];
 
 $field_sg_allergies = field_get_items('node', $node, 'field_sg_allergies');
 $field_sg_allergies = $field_sg_allergies[0][value];
 
 $field_sg_allergies_specify = field_get_items('node', $node, 'field_sg_allergies_specify');
 $field_sg_allergies_specify = $field_sg_allergies_specify[0][value];
 
 $field_sg_medications = field_get_items('node', $node, 'field_sg_medications');
 $field_sg_medications = $field_sg_medications[0][value];
 
 $field_sg_supplements = field_get_items('node', $node, 'field_sg_supplements');
 $field_sg_supplements = $field_sg_supplements[0][value];
 
 $field_sg_inhibitor = field_get_items('node', $node, 'field_sg_inhibitor');
 $field_sg_inhibitor = $field_sg_inhibitor[0][value];
 
 $field_sg_inhibitor_date = field_get_items('node', $node, 'field_sg_inhibitor_date');
 $field_sg_inhibitor_date = $field_sg_inhibitor_date[0][value];
 
 $field_sg_anticoagulant = field_get_items('node', $node, 'field_sg_anticoagulant');
 $field_sg_anticoagulant = $field_sg_anticoagulant[0][value];
 
 $field_sg_anticoagulant_date = field_get_items('node', $node, 'field_sg_anticoagulant_date');
 $field_sg_anticoagulant_date = $field_sg_anticoagulant_date[0][value];
 
 $field_sg_smoke = field_get_items('node', $node, 'field_sg_smoke');
 $field_sg_smoke = $field_sg_smoke[0][value];
 
 $field_sg_smoke_howmuch = field_get_items('node', $node, 'field_sg_smoke_howmuch');
 $field_sg_smoke_howmuch = $field_sg_smoke_howmuch[0][value];
 
 $field_sg_smoke_date = field_get_items('node', $node, 'field_sg_smoke_date');
 $field_sg_smoke_date = $field_sg_smoke_date[0][value];
 
 $field_sg_alcohol = field_get_items('node', $node, 'field_sg_alcohol');
 $field_sg_alcohol = $field_sg_alcohol[0][value];
 
 $field_sg_alcohol_howmuch = field_get_items('node', $node, 'field_sg_alcohol_howmuch');
 $field_sg_alcohol_howmuch = $field_sg_alcohol_howmuch[0][value];
 
 $field_sg_hospitalized_reason = field_get_items('node', $node, 'field_sg_hospitalized_reason');
 $field_sg_hospitalized_reason = $field_sg_hospitalized_reason[0][value];
 
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
 
 $field_sg_country = field_get_items('node', $node, 'field_sg_country');
 $field_sg_country = $field_sg_country[0][value];
 
 $field_sg_preferred_surgeon = field_get_items('node', $node, 'field_sg_preferred_surgeon');
 $field_sg_preferred_surgeon = $field_sg_preferred_surgeon[0][value];
 
 $field_sg_phone = field_get_items('node', $node, 'field_sg_phone');
 $field_sg_phone = $field_sg_phone[0][value];
 
 $field_adrenal_insufficiency = field_get_items('node', $node, 'field_adrenal_insufficiency');
 $field_adrenal_insufficiency = $field_adrenal_insufficiency[0][value];
 
 $field_adrenal_insufficiency_info = field_get_items('node', $node, 'field_adrenal_insufficiency_info');
 $field_adrenal_insufficiency_info =$field_adrenal_insufficiency_info[0][value];
 
 $field_bleeding_tendency = field_get_items('node', $node, 'field_bleeding_tendency');
 $field_bleeding_tendency = $field_bleeding_tendency[0][value];
 
 $field_bleeding_tendency_info = field_get_items('node', $node, 'field_bleeding_tendency_info');
 $field_bleeding_tendency_info = $field_bleeding_tendency_info[0][value];
 
 $field_breast_cancer = field_get_items('node', $node, 'field_breast_cancer');
 $field_breast_cancer =  $field_breast_cancer[0][value];
 
 $field_breast_cancer_info = field_get_items('node', $node, 'field_breast_cancer_info');
 $field_breast_cancer_info = $field_breast_cancer_info[0][value];
 
 $field_cardiovascular_acc_info = field_get_items('node', $node, 'field_cardiovascular_acc_info');
 $field_cardiovascular_acc_info = $field_cardiovascular_acc_info[0][value];
 
 $field_cardiovascular_accidents = field_get_items('node', $node, 'field_cardiovascular_accidents');
 $field_cardiovascular_accidents = $field_cardiovascular_accidents[0][value];
 
 $field_have_you_ever_been_treated = field_get_items('node', $node, 'field_have_you_ever_been_treated');
 $field_have_you_ever_been_treated = $field_have_you_ever_been_treated[0][value];
 
 $field_hepatitus = field_get_items('node', $node, 'field_hepatitus');
 $field_hepatitus = $field_hepatitus[0][value];
 
 $field_hepatitus_info = field_get_items('node', $node, 'field_hepatitus_info');
 $field_hepatitus_info = $field_hepatitus_info[0][value];
 
 $field_hiv = field_get_items('node', $node, 'field_hiv');
 $field_hiv = $field_hiv[0][value];
 
 $field_hiv_info = field_get_items('node', $node, 'field_hiv_info');
 $field_hiv_info = $field_hiv_info[0][value];
 
 $field_hyperthyroidism = field_get_items('node', $node, 'field_hyperthyroidism');
 $field_hyperthyroidism = $field_hyperthyroidism[0][value];
 
 $field_hyperthyroidism_info = field_get_items('node', $node, 'field_hyperthyroidism_info');
 $field_hyperthyroidism_info = $field_hyperthyroidism_info[0][value];
 
 $field_keloid_scarring = field_get_items('node', $node, 'field_keloid_scarring');
 $field_keloid_scarring = $field_keloid_scarring[0][value];
 
 $field_keloid_scarring_info = field_get_items('node', $node, 'field_keloid_scarring_info');
 $field_keloid_scarring_info = $field_keloid_scarring_info[0][value];
 
 $field_major_operation = field_get_items('node', $node, 'field_major_operation');
 $field_major_operation = $field_major_operation[0][value];
 
 $field_major_operation_info = field_get_items('node', $node, 'field_major_operation_info');
 $field_major_operation_info = $field_major_operation_info[0][value];
 
 $field_sg_asthma = field_get_items('node', $node, 'field_sg_asthma');
 $field_sg_asthma = $field_sg_asthma[0][value];
 
 $field_sg_cancer_new = field_get_items('node', $node, 'field_sg_cancer_new');
 $field_sg_cancer_new =$field_sg_cancer_new[0][value];
 
 $field_sg_current_bra_size = field_get_items('node', $node, 'field_sg_current_bra_size');
 $field_sg_current_bra_size = $field_sg_current_bra_size[0][value];
 
 $field_sg_desired_implant = field_get_items('node', $node, 'field_sg_desired_implant');
 $field_sg_desired_implant = $field_sg_desired_implant[0][value];
 
 $field_sg_desired_incision = field_get_items('node', $node, 'field_sg_desired_incision');
 $field_sg_desired_incision = $field_sg_desired_incision[0][value];
 
 $field_sg_desired_placement = field_get_items('node', $node, 'field_sg_desired_placement');
 $field_sg_desired_placement = $field_sg_desired_placement[0][value];
 
 $field_sg_diabetes_new = field_get_items('node', $node, 'field_sg_diabetes_new');
 $field_sg_diabetes_new =$field_sg_diabetes_new[0][value];
 
 $field_sg_first_name = field_get_items('node', $node, 'field_sg_first_name');
 $field_sg_first_name = $field_sg_first_name[0][value];
 
 $field_sg_heart_disease = field_get_items('node', $node, 'field_sg_heart_disease');
 $field_sg_heart_disease = $field_sg_heart_disease[0][value];
 
 $field_sg_hypertension = field_get_items('node', $node, 'field_sg_hypertension');
 $field_sg_hypertension =$field_sg_hypertension[0][value];
 
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
		   $langguages[] =  $preferred_language[value];
		 }
	 } 
 }
 //$field_sg_preferred_language = $field_sg_preferred_language[0][value];
 
 $field_sg_requested_size = field_get_items('node', $node, 'field_sg_requested_size');
 $field_sg_requested_size = $field_sg_requested_size[0][value];
 
 $field_sg_title = field_get_items('node', $node, 'field_sg_title');
 $field_sg_title = $field_sg_title[0]['value'];
 
 $field_term_condition = field_get_items('node', $node, 'field_term_condition');
 $field_term_condition = $field_term_condition[0]['value'];
 
 $field_term_condition = field_get_items('node', $node, 'field_term_condition');
 $field_term_condition = $field_term_condition[0]['value'];
 
 $field_treated_info = field_get_items('node', $node, 'field_treated_info');
 $field_treated_info = $field_treated_info[0]['value'];
 
 $field_underlying_disease = field_get_items('node', $node, 'field_underlying_disease');
 $field_underlying_disease = $field_underlying_disease[0]['value'];
 
 $field_underlying_disease_info = field_get_items('node', $node, 'field_underlying_disease_info');
 $field_underlying_disease_info = $field_underlying_disease_info[0]['value'];
 
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
    table tr td {border: 1px solid #cccccc;}
    table.inputcheckbox tr td {border:none;}
    table tr td .checkbox,
    .bottom .checkbox {    
			width: 10px;
      height: 10px;
      background: lightgray;
      border: 1px solid #ccc;
      display: inline-block;
      margin: 0 5px;
    }
    table tr td .checkbox.active,
    .bottom .checkbox.active {    
			width: 10px;
      height: 10px;
      background: gray;
      border: 1px solid #333;
      display: inline-block;
      margin: 0 5px;
    }
    .textbox {
		  height: 20px;
      background: lightgray;
      border: 1px solid #ccc;
      display: inline-block;
      margin: 0 5px;	
		}
  </style>
  <body>
	 <div style="margin-bottom:20px;">
		 <img src="http://localhost/smo/sites/all/themes/smo/logo.png" width="100%" height="100%" />
	 <?php if ($print_logo): ?>
      <div class="print-logo"><?php print render($print_logo); ?></div>
    <?php endif; ?>
   </div>
   <div style="font-size:13px;margin-bottom:5px;margin-top:5px;font-weight:bold;color:red;text-align:center;"><i>Please provide First Name and Last Name AS APPEARS IN YOUR PASSPORT.</i></div>
   <table style="font-size:13px;" width="100%" id="surgeon" cellpadding=0>
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
							<div class="checkbox"><?php print ($field_sg_gender == 'Female') ?'active' : ''; ?></div>Female
						</td>
					</tr>
					<tr>
						<td colspan=8>
							<table width="100%" border=0>
								<tr>
									<td><b>Age:</b></td>
									<td><div class="textbox"><?php print $field_sg_age; ?></div></td>
									<td width=10%><b>Birthdate:</b></td>
									<td><div class="textbox"><?php print date('d/m/Y',$field_sg_dob); ?></div></td>
									<td width=10%><b>Nationality:</b></td>
									<td><div class="textbox"><?php print $field_sg_nationality; ?></div></td>
									<td><b>Height (cm):</b></td>
									<td><div class="textbox"><?php print $field_sg_height; ?></div></td>
									<td><b>Weight (kg):</b></td>
									<td><div class="textbox"><?php print $field_sg_weight; ?></div></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td><b>Passport Number:</b></td>
						<td colspan=2><div class="textbox"><?php print $field_sg_passport_number; ?></div></td>
						<td><b>Postal Code:</b></td>
						<td colspan=2><div class="textbox"><?php print $field_sg_postcode_zip;?></div></td>
						<td><b>Country:</b></td>
						<td><div class="textbox"><?php print $field_sg_country;?></div></td>
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
							<div class="checkbox <?php print ((in_array("Arabic", $languages))) ? 'active' : ''; ?>"></div>Arabic
					  </td>
						<td width="20%">
						  <div class="checkbox <?php print ((in_array("English", $languages))) ? 'active' : ''; ?>"></div>English
						</td>
						<td width="20%">
						  <div class="checkbox <?php print ((in_array("Italian", $languages))) ? 'active' : ''; ?>"></div>Italian
					  </td>
						<td width="20%">
						  <div class="checkbox <?php print ((in_array("Russian", $languages))) ? 'active' : ''; ?>"></div>Russian
						</td>
					</tr>
					
					<tr rowspan="4">
						<td colspan=4></td>
						<td width="20%">
							<div class="checkbox <?php print ((in_array("Burmese", $languages))) ? 'active' : ''; ?>"></div>Burmese
						</td>
						<td width="20%">
						  <div class="checkbox <?php print ((in_array("Filipino", $languages))) ? 'active' : ''; ?>"></div>Filipino
						</td>
						<td width="20%">
						  <div class="checkbox <?php print ((in_array("Japanese", $languages))) ? 'active' : ''; ?>"></div>Japanese
						</td>
						<td width="20%">
						  <div class="checkbox <?php print ((in_array("Spanish", $languages))) ? 'active' : ''; ?>"></div>Spanish
						</td>
					</tr>
					
					<tr>
						<td colspan=4></td>
						<td width="20%">
							<div class="checkbox <?php print ((in_array("Cambodian", $languages))) ? 'active' : ''; ?>"></div>Cambodian
						</td>
						<td width="20%">
						  <div class="checkbox <?php print ((in_array("French", $languages))) ? 'active' : ''; ?>"></div>French
						</td>
						<td width="20%">
						  <div class="checkbox <?php print ((in_array("Korean", $languages))) ? 'active' : ''; ?>"></div>Korean
						</td>
						<td width="20%">
						  <div class="checkbox <?php print ((in_array("Thai", $languages))) ? 'active' : ''; ?>"></div>Thai
						</td>
					</tr>
					
					<tr>
						<td colspan=4></td>
						<td width="20%">
							<div class="checkbox <?php print ((in_array("Chinese", $languages))) ? 'active' : ''; ?>"></div>Chinese
					  </td>
						<td width="20%">
						  <div class="checkbox <?php print ((in_array("German", $languages))) ? 'active' : ''; ?>"></div>German
						</td>
						<td width="20%">
						  <div class="checkbox <?php print ((in_array("Malayu", $languages))) ? 'active' : ''; ?>"></div>Malayu
						</td>
						<td width="20%">
						  <div class="checkbox <?php print ((in_array("Vietnamese", $languages))) ? 'active' : ''; ?>"></div>Vietnamese
						</td>
					</tr>
				</table>
			</td>
		</tr>
		
		<tr>
			<td>
				<table width="100%">
					<tr bgcolor="#0070C0" class="heading">
						 <td colspan=4><font color="#ffffff"><b>SURGERY DETAILS</b></font></td>
					</tr>
					<tr>
						 <td width=20%><b>Planned Date of Surgery:</b></td>
						 <td width=30%><div class="textbox"><?php print date('d/m/Y', $field_sg_plan_date); ?></div><br>(Day/Month/Year)</td>
						 <td width=20%><b>Flying home on (Date):</td>
						 <td width=30%><div class="textbox"><?php print date('d/m/Y', $field_sg_home_date); ?></div><br>(Day/Month/Year)</td>
					</tr>
					<tr>
						<td colspan=2><b>What procedures do you require?</b></td>
						<td colspan=2><div class="textbox"><?php print $field_sg_procedures; ?></div></td>
					</tr>
					<tr>
						<td colspan=2><b>What results do you expect?<br></b>(Please be as specific as possible)</td>
						<td colspan=2><div class="textbox"><?php print $field_sg_expectation; ?></div></td>
					</tr>
					<tr>
						<td colspan=2><b>Questions to surgeon:</b></td>
						<td colspan=2><div class="textbox"><?php print $field_sg_questions; ?></div></td>
					</tr>
				</table>
			</td>
		</tr>
		
		<tr>
			<td>
				<table width="100%">
					<tr bgcolor="#0070C0" class="heading">
						 <td colspan=7><font color="#ffffff"><b>MEDICAL CONDITIONS</b> (Please specify <b>yes</b> or <b>no</b> by clicking the box)</font></td>
					</tr>
					<tr>
						 <td></td>
						 <td>Yes</td>
						 <td>No</td>
						 <td></td>
						 <td></td>
						 <td>Yes</td>
						 <td>No</td>
					</tr>
					<tr>
						 <td>Diabetes or blood sugar problems</td>
						 <td><div class="checkbox <?php print ($field_sg_diabetes == 'Yes') ? 'active' : ''; ?>"></div></td>
						 <td><div class="checkbox <?php print ($field_sg_diabetes == 'No') ? 'active' : ''; ?>"></div></td>
						 <td></td>
						 <td>Thyroid problems</td>
						 <td><div class="checkbox <?php print ($field_sg_thyroid == 'Yes') ? 'active' : ''; ?>"></div></td>
						 <td><div class="checkbox <?php print ($field_sg_thyroid == 'No') ? 'active' : ''; ?>"></div></td>
					</tr>
					<tr>
						 <td>Heart problems</td>
						 <td><div class="checkbox <?php print ($field_sg_heart == 'Yes') ? 'active' : ''; ?>"></div></td>
						 <td><div class="checkbox <?php print ($field_sg_heart == 'No') ? 'active' : ''; ?>"></div></td>
						 <td></td>
						 <td>Lung problems </td>
						 <td><div class="checkbox <?php print ($field_sg_lung == 'Yes') ? 'active' : ''; ?>"></div></td>
						 <td><div class="checkbox <?php print ($field_sg_lung == 'No') ? 'active' : ''; ?>"></div></td>
					</tr>
					<tr>
						 <td>Blood pressure problems</td>
						 <td><div class="checkbox <?php print ($field_sg_blood_pressure == 'Yes') ? 'active' : ''; ?>"></div></td>
						 <td><div class="checkbox <?php print ($field_sg_blood_pressure == 'No') ? 'active' : ''; ?>"></div></td>
						 <td></td>
						 <td>Kidney or Liver problems</td>
						 <td><div class="checkbox <?php print ($field_sg_liver == 'Yes') ? 'active' : ''; ?>"></div></td>
						 <td><div class="checkbox <?php print ($field_sg_liver == 'No') ? 'active' : ''; ?>"></div></td>
					</tr>
					<tr>
						 <td>Blood disorders</td>
						 <td><div class="checkbox <?php print ($field_sg_blood_disorder == 'Yes') ? 'active' : ''; ?>"></div></td>
						 <td><div class="checkbox <?php print ($field_sg_blood_disorder == 'No') ? 'active' : ''; ?>"></div></td>
						 <td></td>
						 <td>Previous/current history of cancer</td>
						 <td><div class="checkbox <?php print ($field_sg_cancer == 'Yes') ? 'active' : ''; ?>"></div></td>
						 <td><div class="checkbox <?php print ($field_sg_cancer == 'No') ? 'active' : ''; ?>"></div></td>
					</tr>
					<tr>
						 <td>HIV or AIDS</td>
						 <td><div class="checkbox <?php print ($field_sg_hiv == 'Yes') ? 'active' : ''; ?>"></div></td>
						 <td><div class="checkbox <?php print ($field_sg_hiv == 'No') ? 'active' : ''; ?>"></div></td>
						 <td></td>
						 <td>Nervous Breakdowns/Depression</td>
						 <td><div class="checkbox <?php print ($field_sg_depression == 'Yes') ? 'active' : ''; ?>"></div></td>
						 <td><div class="checkbox <?php print ($field_sg_depression == 'No') ? 'active' : ''; ?>"></div></td>
					</tr>
					<tr>
						 <td>Previous history of Deep Vein Thrombosis (DVT) or Pulmonary Embolism</td>
						 <td><div class="checkbox <?php print ($field_sg_diabetes == 'Yes') ? 'active' : ''; ?>"></div></td>
						 <td><div class="checkbox <?php print ($field_sg_diabetes == 'No') ? 'active' : ''; ?>"></div></td>
						 <td></td>
						 <td>Previous/current history of cancer</td>
						 <td><div class="checkbox <?php print ($field_sg_cancer == 'Yes') ? 'active' : ''; ?>"></div></td>
						 <td><div class="checkbox <?php print ($field_sg_cancer == 'No') ? 'active' : ''; ?>"></div></td>
					</tr>
					<tr>
						 <td colspan=4><b>If you have answered YES to any of the above, please specify:</b></td>
						 <td colspan=3><div class="textbox"><?php print $field_sg_specify; ?></div></td>
				  </tr>
					<tr>
						 <td colspan=3 width=60%><b>Have you had or do you have any medical conditions not mentioned above?</b></td>
						 <td colspan=2><div class="checkbox <?php print ($field_sg_other == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td colspan=2><div class="checkbox <?php print ($field_sg_other == 'No') ? 'active' : ''; ?>"></div>No</td>
					</tr>
					<tr>
						 <td colspan=4>If yes, please specify</td>
						 <td colspan=3><div class="textbox"><?php print $field_sg_other_specify; ?></div></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%">
					<tr bgcolor="#0070C0" class="heading">
						 <td colspan=4><font color="#ffffff"><b>FOR WOMEN</b></font></td>
					</tr>
					<tr>
						 <td colspan=2><b>Do you take birth control pills, hormone replacement medication, or wear a hormone patch?</td>
						 <td><div class="checkbox"></div>Yes</td>
						 <td><div class="checkbox"></div>No</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%">
					<tr bgcolor="#0070C0" class="heading">
						 <td colspan=4><font color="#ffffff"><b>FOR WOMEN HAVING BREAST SURGERY OR TUMMY TUCK</b></font></td>
					</tr>
					<tr>
						 <td colspan=2>Have you undergone any surgical means of birth control (e.g. Tubal Ligation)?</td>
						 <td><div class="checkbox <?php print ($field_sg_wm_surgery == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_wm_surgery == 'No') ? 'active' : ''; ?>"></div>No</td>
					</tr>
					<tr>
						 <td colspan=2>Are you pregnant now?</td>
						 <td><div class="checkbox <?php print ($field_sg_wm_pregnant == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_wm_pregnant == 'No') ? 'active' : ''; ?>"></div>No</td>
					</tr>
					<tr>
						 <td colspan=2>Are you planning any more pregnancies?</td>
						 <td><div class="checkbox <?php print ($field_sg_wm_pregnancies == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_wm_pregnancies == 'No') ? 'active' : ''; ?>"></div>No</td>
					</tr>
					<tr>
						 <td colspan=2>How many children have you had?</td>
						 <td colspan=2><div class="textbox"><?php print $field_sg_wm_children; ?></div></td>
					</tr>
					<tr>
						 <td colspan=2>How old is your youngest child? (Month & Year)</td>
						 <td colspan=2><div class="textbox"><?php print $field_sg_wm_age_youngest; ?></div></td>
					</tr>
					<tr>
						 <td colspan=2>Have you ever breastfed?</td>
						 <td><div class="checkbox <?php print ($field_sg_wm_breastfed == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_wm_breastfed == 'No') ? 'active' : ''; ?>"></div>No</td>
					</tr>
					<tr>
						 <td colspan=2>When did you last breastfeed? (Month & Year)</td>
						 <td colspan=2><div class="textbox"><?php print $field_sg_wm_lastfeed; ?></div></td>
					</tr>
					<tr>
						 <td colspan=2>Do your breasts still have milk at this time? <br>NOTE:  Lactation may also be induced by other factors such as hormone intake.  Please test by squeezing breasts.</td>
						 <td><div class="checkbox <?php print ($field_sg_wm_milk == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_wm_milk == 'No') ? 'active' : ''; ?>"></div>No</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%">
					<tr bgcolor="#0070C0" class="heading">
						 <td colspan=4><font color="#ffffff"><b>MEDICAL HISTORY</b></font></td>
					</tr>
					<tr>
						 <td colspan=2><b>Have you been hospitalized or received medical care in the past 12 months?</b></td>
						 <td><div class="checkbox <?php print ($field_sg_hospitalized == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_hospitalized == 'No') ? 'active' : ''; ?>"></div>No</td>
					</tr>
					<tr>
						 <td colspan=2>If yes, when?</td>
						 <td colspan=2><div class="textbox"><?php print $field_sg_when_hospitalized; ?></div></td>
					</tr>
					<tr>
						 <td colspan=2>If yes, what was the reason for this?</td>
						 <td colspan=2><div class="textbox"><?php print $field_sg_hospitalized_reason; ?></div></td>
					</tr>
					<tr>
						 <td colspan=2><b>Have you had any surgery before?</b></td>
						<td><div class="checkbox <?php print ($field_sg_diabetes == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_diabetes == 'No') ? 'active' : ''; ?>"></div>No</td>
					</tr>
					<tr>
						 <td colspan=2><b>When did you last breastfeed? (Month & Year)</b></td>
						 <td colspan=2><div class="textbox"><?php print $field_sg_wm_lastfeed; ?></div></td>
					</tr>
					<tr>
						 <td colspan=2>If yes, when?</td>
						 <td colspan=2><div class="textbox"><?php print $field_sg_when_hospitalized; ?></div></td>
					</tr>
					<tr>
						 <td colspan=2>If yes, what kind?</td>
						 <td colspan=2><div class="textbox"><?php //print $ ?></div></td>
					</tr>
					<tr>
						 <td colspan=2><b>Do you have fillers, implants or any metal objects in your body?</b></td>
						 <td><div class="checkbox <?php print ($field_sg_implants_specify == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_implants_specify == 'No') ? 'active' : ''; ?>"></div>No</td>
					</tr>
					<tr>
						 <td colspan=2>If yes, please specify what & when this was inserted/injected</td>
						<td colspan=2><div class="textbox"></div></td>
					</tr>
					<tr>
						 <td colspan=2><b>Do you have difficulty with healing or scarring?</b></td>
						<td><div class="checkbox <?php print ($field_sg_healing == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_healing == 'Yes') ? 'active' : ''; ?>"></div>No</td>
					</tr>
					<tr>
						 <td colspan=2><b>Do you have any allergies to food, drugs, etc?</b></td>
						 <td><div class="checkbox <?php print ($field_sg_allergies == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_allergies == 'No') ? 'active' : ''; ?>"></div>No</td>
					</tr>
					<tr>
						 <td colspan=2>If yes, please specify</td>
						<td colspan=2><div class="textbox"><?php print $field_sg_allergies_specify; ?></div></td>
					</tr>
					<tr>
						 <td colspan=2><b>List all medications you currently take including dosage for each:</b></td>
						 <td colspan=2><div class="textbox"><?php print $field_sg_medications; ?></div></td>
					</tr>
					<tr>
						 <td colspan=2><b>List all vitamins or food/nutritional supplements you currently take:</b></td>
						 <td colspan=2><div class="textbox"><?php print $field_sg_supplements; ?></div></td>
					</tr>
					<tr>
						 <td colspan=2><b>Have you ever taken a MAO inhibitor such as Nardil, Marplan or Parnate?</b></td>
						 <td><div class="checkbox <?php print ($field_sg_inhibitor == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_inhibitor == 'No') ? 'active' : ''; ?>"></div>No</td>
					</tr>
					<tr>
						 <td colspan=2>If yes, when was your last dose?</td>
						 <td colspan=2><div class="textbox"><?php print $field_sg_inhibitor_date; ?></div></td>
					</tr>
					<tr>
						 <td colspan=2><b>Have you ever taken an anticoagulant such as Coumadin, Heparin, or a daily Aspirin?</b></td>
						 <td><div class="checkbox <?php print ($field_sg_anticoagulant == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_anticoagulant == 'No') ? 'active' : ''; ?>"></div>No</td>
					</tr>
					<tr>
						 <td colspan=2><b>If yes, when was your last dose?</td>
						 <td colspan=2><div class="textbox"><?php print $field_sg_anticoagulant_date;?></div></td>
					</tr>
					<tr>
						 <td colspan=2><b>Do you smoke?</b></td>
						 <td><div class="checkbox <?php print ($field_sg_smoke == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_smoke == 'No') ? 'active' : ''; ?>"></div>No</td>
					</tr>
					<tr>
						 <td colspan=2>If yes, how much do you smoke?</td>
						 <td colspan=2><div class="textbox"><?php print $field_sg_smoke_howmuch; ?></div></td>
					</tr>
					<tr>
						 <td colspan=2>If yes, when did you last smoke?</td>
						 <td colspan=2><div class="textbox"><?php print $field_sg_smoke_date; ?></div></td>
					</tr>
					<tr>
						 <td colspan=2><b>Do you drink alcohol?</b></td>
						 <td><div class="checkbox <?php print ($field_sg_alcohol == 'Yes') ? 'active' : ''; ?>"></div>Yes</td>
						 <td><div class="checkbox <?php print ($field_sg_alcohol == 'No') ? 'active' : ''; ?>"></div>No</td>
					</tr>
					<tr>
						 <td colspan=2>If yes, how much do you drink?</td>
						 <td colspan=2><div class="textbox"><?php print $field_sg_alcohol_howmuch; ?></div></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	
	<div class="bottom" style="font-size:13px;margin-top:20px;"><span style="margin-top:10px;font-weight:bold;color:red;"><i>(Please tick)</i></span> <div class="checkbox"></div><b> I hereby certify that all the information above are true and correct.</b></div>
		 
 </body>
</html>
