<?php
  global $base_url;
  
  // Fieldcollection
	$wrapper = entity_metadata_wrapper('node', $node);
	
	// Client Details
	$field_room_type = $values[field_room_type][LANGUAGE_NONE][0][value];
	$field_clients_passport_name = $values[field_clients_passport_name][LANGUAGE_NONE][0][value];
	$field_clients_preferred_name = $values[field_clients_preferred_name][LANGUAGE_NONE][0][value];
	$field_contact_phone_no = $values[field_contact_phone_no][LANGUAGE_NONE][0][value];
	$field_custom_title = $values[field_custom_title][LANGUAGE_NONE][0][value];
	$clientname = ($field_clients_passport_name) ? $field_clients_passport_name : $node->title;
	
	$guestname = $clientname;
	if ($field_custom_title != 'None') {
		$guestname = $field_custom_title .' 	'. $clientname;
    }
	
	
	//Accommodation Arranged by Client
	$field_client_hotel_name = $values[field_client_hotel_name][LANGUAGE_NONE][0][value];
	$field_client_hotel_address = $values[field_client_hotel_address][LANGUAGE_NONE][0][value];
	$field_client_hotel_phone_number = $values[field_client_hotel_phone_number][LANGUAGE_NONE][0][value];
	
	
	//Accommodation Arranged by Stunning Makeovers Limited
	$field_accommodation_arranged = $values[field_accommodation_arranged][LANGUAGE_NONE][0][value];
	$field_mm_accommodation = $values[field_mm_accommodation][LANGUAGE_NONE][0][value];
	$field_hotel_name = $values[field_hotel_name][LANGUAGE_NONE][0][tid];
	
	if ($field_hotel_name == 93) {
	  $field_hotelname =  'Deevana Resort';
	  $field_hotelphone = variable_get('deevana_phone','');
	}
	if ($field_hotel_name == 92) {
	  $field_hotelname =  'Dream Hotel';
	  $field_hotelphone = variable_get('dream_phone','');	
	}
	
	$field_room_type = $values[field_room_type][LANGUAGE_NONE][0][value];
	$field_check_in_date = date('l, jS F Y', $wrapper->field_check_in_date->value());
	$field_check_out_date = date('l, jS F Y', $wrapper->field_check_out_date->value());
	$field_no_nights = $values[field_no_nights][LANGUAGE_NONE][0][value];
	$field_qualify_for_upgrade = $values[field_qualify_for_upgrade][LANGUAGE_NONE][0][value];
	$field_upgrade_room_type = $values[field_upgrade_room_type][LANGUAGE_NONE][0][value];
	$field_bedding = $values[field_bedding][LANGUAGE_NONE][0][value];
	$field_rollaway_bed_required = $values[field_rollaway_bed_required][LANGUAGE_NONE][0][value];
	
	$field_primary_guest = $values[field_primary_guest][LANGUAGE_NONE][0][value];
	$field_guest_2 = $values[field_guest_2][LANGUAGE_NONE][0][value];
	$field_guest_3 = $values[field_guest_3][LANGUAGE_NONE][0][value];
	$field_guest_4 = $values[field_guest_4][LANGUAGE_NONE][0][value];
	$field_cost_per_night_thb = $values[field_cost_per_night_thb][LANGUAGE_NONE][0][value];
	$field_cost_for_rollaway_bed = $values[field_cost_for_rollaway_bed][LANGUAGE_NONE][0][value];
	$field_total_cost = $values[field_total_cost][LANGUAGE_NONE][0][value];
	$field_hotel_providing_airport = $values[field_hotel_providing_airport][LANGUAGE_NONE][0][value];
	$field_hotel_booking_confirmation = $values[field_hotel_booking_confirmation][LANGUAGE_NONE][0][value];
	
	$field_vip_benefits = $values[field_vip_benefits][LANGUAGE_NONE][0][value];
	$field_share_hotel_room = $values[field_share_hotel_room][LANGUAGE_NONE][0][value];
	
	//Hospital
	$surgeon_names = array();
	$field_hospital = $values[field_hospital][LANGUAGE_NONE][0][nid];
	
	if ($field_hospital == 731) { //Phuket Plastic Surgery Institute 
	  $field_hospitalname = 'Phuket Plastic Surgery Institute';
	  $field_hospital_address = variable_get('ppsi_address','');
	  $field_hospital_contact = variable_get('ppsi_phone','');
	} 
	else if ($field_hospital == 721) { //Bangpakok 9 International Hospital  
		$field_hospitalname = 'Bangpakok 9 International Hospital';
		$field_hospital_address = variable_get('bangpakok9_address','');
		$field_hospital_contact = variable_get('bangpakok9_phone','');
	} 
	else if ($field_hospital == 67) { //Vejthani International Hospital 
		$field_hospitalname = 'Vejthani International Hospital';
		$field_hospital_address = variable_get('vejthani_address','');
		$field_hospital_contact = variable_get('vejthani_phone','');	
	}
	else if ($field_hospital == 66) { //Yanhee International Hospital 
		$field_hospitalname = 'Yanhee International Hospital';
		$field_hospital_address = variable_get('yanhee_address','');
		$field_hospital_contact = variable_get('yanhee_phone','');	
	}
	
	$field_consultation_before_surger = $values[field_consultation_before_surger][LANGUAGE_NONE][0][value];
	$field_consultation_date = $values[field_consultation_date][LANGUAGE_NONE][0][value];
	$field_surgery_date = $values[field_surgery_date][LANGUAGE_NONE][0][value];
	$field_transfer_for_consultation = $values[field_transfer_for_consultation][LANGUAGE_NONE][0][value];
	$field_consultation_transfer_time = $values[field_consultation_transfer_time][LANGUAGE_NONE][0][value];
	$field_consultation_appointment = $values[field_consultation_appointment][LANGUAGE_NONE][0][value];
	
	$field_mm_surgeon = $values[field_mm_surgeon][LANGUAGE_NONE][0][nid];
	if(is_numeric($field_mm_surgeon)) {
	  $field_mm_surgeon = db_query('SELECT title FROM node WHERE nid =:nid',array(':nid' => $field_mm_surgeon))->fetchField();
	  $surgeon_names[] = $field_mm_surgeon;	
	}
	$field_mm_coordinator = $values[field_mm_coordinator][LANGUAGE_NONE][0][value];
	$field_surgery_appointment_date = $values[field_surgery_appointment_date][LANGUAGE_NONE][0][value];
	
	$field_mm_surgeon2 = $values[field_mm_surgeon2][LANGUAGE_NONE][0][nid];
	if(is_numeric($field_mm_surgeon2)) {
	  $field_mm_surgeon2 = db_query('SELECT title FROM node WHERE nid =:nid',array(':nid' => $field_mm_surgeon2))->fetchField();
	  $surgeon_names[] = $field_mm_surgeon2;
	}
  $field_mm_coordinator2 = $values[field_mm_coordinator2][LANGUAGE_NONE][0][value];
  
  $field_other_surgeon = $values[field_other_surgeon][LANGUAGE_NONE][0][value];
  if ($field_other_surgeon) {
		$surgeon_names[] = $field_other_surgeon;
	}
  
  $field_other_surgeon2 = $values[field_other_surgeon2][LANGUAGE_NONE][0][value];
  if ($field_other_surgeon2) {
		$surgeon_names[] = $field_other_surgeon2;
	}
	
  $field_surgery_appointment_date2 = $values[field_surgery_appointment_date2][LANGUAGE_NONE][0][value];
	
	$field_transfer_surgery_appoint = $values[field_transfer_surgery_appoint][LANGUAGE_NONE][0][value];
	$field_surgery_appoint_tran_time = $values[field_surgery_appoint_tran_time][LANGUAGE_NONE][0][value];
	$field_surgery_appointment = $values[field_surgery_appointment][LANGUAGE_NONE][0][value];
  $field_consultation_pre_operative = $values[field_consultation_pre_operative][LANGUAGE_NONE][0][value];
  
  //Dental
  $field_transfer_dental_appoint = $values[field_transfer_dental_appoint][LANGUAGE_NONE][0][value];
	$field_dental_date = $values[field_dental_date][LANGUAGE_NONE][0][value];
	$field_dental_appoint_transf_time = $values[field_dental_appoint_transf_time][LANGUAGE_NONE][0][value];
	$field_dental_app_transfe_no_pass = $values[field_dental_app_transfe_no_pass][LANGUAGE_NONE][0][value];
	$field_dental_practice_options = $values[field_dental_practice_options][LANGUAGE_NONE][0][value];
	
	if ($field_dental_practice_options == 'Bangkok Smile Nana Sukhumvit Soi 5') {
	  $field_dental_practice_address = variable_get('bangkoksmilenanasukhumvit_address','');
	  $field_dental_practice_phone = variable_get('bangkoksmilenanasukhumvit_phone','');
	}
	else if ($field_dental_practice_options == 'Bangkok Smile ASOK Sukhumvit Soi 21') {
	  $field_dental_practice_address = variable_get('bangkoksmileasoksukhumvit_address','');
	  $field_dental_practice_phone = variable_get('bangkoksmileasoksukhumvit_phone','');
	}
	else if ($field_dental_practice_options == 'Bangkok Smile Ploenchit') {
	  $field_dental_practice_address = variable_get('bangkoksmileploenchit_address','');
	  $field_dental_practice_phone = variable_get('bangkoksmileploenchit_phone','');
	}
	else if ($field_dental_practice_options == 'Bangkok Silom Smile Studio') {
	  $field_dental_practice_address = variable_get('bangkoksilomsmilestudio_address','');
	  $field_dental_practice_phone = variable_get('bangkoksilomsmilestudio_phone','');
	}
	else if ($field_dental_practice_options == 'Phuket Sea Smile Dental Clinic (Jungceylon)') {
	  $field_dental_practice_address = variable_get('phuketseasmiledentalclinic_address','');
	  $field_dental_practice_phone = variable_get('phuketseasmiledentalclinic_phone','');
	}
	else if ($field_dental_practice_options == 'Phuket Sea Smile International Dental Clinic') {
	  $field_dental_practice_address = variable_get('phuketseasmileinternationaldentalclinic_address','');
	  $field_dental_practice_phone = variable_get('phuketseasmileinternationaldentalclinic_phone','');
	}
	else if ($field_dental_practice_options == 'Phuket Sea Smile @ The Kee Dental Clinic') {
	  $field_dental_practice_address = variable_get('phuketseasmilethekeedentalclinic_address','');
	  $field_dental_practice_phone = variable_get('phuketseasmilethekeedentalclinic_phone','');
	}
	
  //Flight
  $arrival_date = $wrapper->field_arrival_flight_details->field_flight_date->value();
  //$arrival_date = $wrapper->field_arrival_flight_details->field_flight_arrives_destination->value();
	$flight_number = $wrapper->field_arrival_flight_details->field_flight_number->value();
	$flight_from = $wrapper->field_arrival_flight_details->field_flight_from->value();
	$flight_to = $wrapper->field_arrival_flight_details->field_flight_to->value();
	$airport = $wrapper->field_arrival_flight_details->field_airport->value();
	$field_flight_arranged_by = $wrapper->field_arrival_flight_details->field_flight_arranged_by->value();
	$field_transfers_pickup_date = $wrapper->field_arrival_flight_details->field_transfers_pickup_date->value();
	$field_airport_transfer = $wrapper->field_arrival_flight_details->field_airport_transfer->value();
	$field_gate_no = $wrapper->field_arrival_flight_details->field_gate_no->value();
  if (strpos($airport, 'Bangkok') !== false) {
	  $destination = 'Bangkok';
	}
	if (strpos($airport, 'Phuket') !== false) {
	  $destination = 'Phuket';
	}
  
  //Tour
  $field_tour = $values[field_tour][LANGUAGE_NONE][0][value];
  $image_path = $base_url . '/' .drupal_get_path('module','stu_schedule') . '/images';
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
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <style>
		table {
		  font-family: sans-serif;
		  font-size:13px;
		  line-height:16px;
		  page-break-inside:auto;
		  border-collapse: collapse;
      z-index:9999;
		}
		.cap {
		  text-transform: uppercase;	
		}
		.nobmargin {
		  margin-bottom:0px;	
		}
		.notmargin {
		  margin-top:0px;	
		}
		.paddingtop {
		  padding-top:10px;
		  padding-bottom:0px;
		}
	
		.bgyellow {background:yellow;}
		.margintop {margin-top:5px;}
		table tr, table tr td {border-collapse: collapse;}
		table tr td {border: 1px solid #000000;}
    table.toptable tr td {border: none;}
    table tr .normaltxt {color:#000000; margin-top:5px;margin-bottom:5px;}
    table tr .orangetxt {color:#ff7300; font-weight:bold;}
    table tr .bluetxt {color:#0051a3;}
    table tr .redtxt {color:#bf0b11;font-weight:bold;}
    .own_arrangements {margin-top:0px; margin-bottom:0px;padding-top:0px; padding-bottom:0px;}
    @page { margin-bottom: 20px; }
    #watermark {
      position: fixed;
      top: 25%;
      width: 100%;
      text-align: center;
      opacity: .6;
      transform: rotate(10deg);
      transform-origin: 50% 50%;
      z-index: -9000;
      font-size:120px;
      color:#eaeaea;
      font-style:italic;
      font-family: sans-serif;
    }
  </style>
<body>
<div id="watermark">
 Stunning Makeovers Schedule
</div>
<table width="100%" nobr="true">
	<tr>
    <td colspan=3>
      <table class="toptable" align="center" width="100%" height="100%">
         <tr><td align="center" colspan=3><img src="http://stunningmakeovers.com/sites/all/themes/smo/logo.png" width="300" height="100"/></td></tr>
         <tr><td align="center" colspan=3>Australia Toll Free: 1-800-606-284</td></tr>
         <tr><td align="center" colspan=3>New Zealand Toll Free: 0800-7-88-66-33</td></tr>
         <tr><td align="center" colspan=3>Paul: +64 21 983 225</td></tr>
         <tr><td align="center" colspan=3><a href="http://www.stunningmakeovers.com">http://www.stunningmakeovers.com</a></td></tr>
      </table>
    </td>
  </tr>
  
  <tr>
    <td colspan=3 align="center" bgcolor="#ff9000"><b>Makeover Schedule Prepared Specially for <?php print $guestname; ?></b></td>
  </tr>
  
  <tr>
		<td colspan=3>
		  <table class="toptable" width="100%" height="100%">
		    <tr>
		      <td width=50% align="center"><b>Arrival Date:</b> <?php print date('l, jS F Y', $arrival_date); ?></td>
				  <td width=50% align="center"><b>Destination:</b> <?php print $destination; ?></td>
		    </tr>
		  </table>
		</td>
  </tr>
	
	<tr>
    <td width=20% align="center"><b>Date/Time</b></td>
    <td width=60% align="center"><b>Activity</b></td>
    <td width=20% align="center"><b>Responsible</b></td>
  </tr>
  
 <?php
  // Use this if we are arranging flights Refer to flight itinerary for departure time at originating airport 
   if ($field_flight_arranged_by == 'Stunning Makeovers Limited'):
		?>
		<tr>
			<td width=20% align="center"></td>
			<td width=60% align="center">
				<div class="normaltxt">Please refer to the E-ticket for flight details.</div>
			</td>
			<td width=20% align="center">
				<div class="bluetxt">Please check with the airline for any changes in the departure time of the flight.</div>
			</td>
		</tr>
		<tr>
			<td width=20% align="center"></td>
			<td width=60% align="center">
				<div class="normaltxt">We recommend that you proceed through Immigration and customs soon after checking in as there can be long delays in this area.</div>
			</td>
			<td width=20% align="center"></td>
		</tr>
	<?php endif; ?>
    
  <!--Use this if hotel is providing airport transfers-->
  <?php if ($field_airport_transfer == 'Hotel'):?>
      <tr>
		<td width=20% align="center">
		  <?php print date('l, jS F', $arrival_date); ?><br>
		  <?php print date('g:ia', $arrival_date); ?><br>
		  <?php print ($destination == 'Phuket') ? '(Phuket local time)' : ''; ?>
		</td>
		<td width=60% align="center" class="paddingtop">
			<div class="orangetxt cap">ARRIVE <?php print strtoupper($destination); ?></div>
			<div class="orangetxt cap">FLIGHT <?php print $flight_number; ?> ex <?php print $flight_from; ?></div>
			<div class="normaltxt">Upon arrival at Phuket International Airport please complete arrival formalities, collect your luggage and proceed to <b>outside GATE 2</b></div>
			<img src="<?php print $image_path; ?>/PPSI_logo.jpg" width="100px"/>
			<div class="normaltxt">You will be greeted by a hospital representative who will have a sign bearing your name
 for your transfer to your Hotel</div>
		</td>
		<td width=20% align="center">
			<div class="normaltxt">Deevana Resort and Spa +66 76 341414 or 341415 or 341705</div>
		</td>
	</tr>
  <?php endif; ?>
  
  <!--Use if Hospital is providing transfers-->
	<?php if ($field_airport_transfer == 'Hospital'):?>
	<tr>
    <td width=20% align="center">
			<?php print date('l, jS F', $arrival_date); ?><br>
			<?php print date('g:ia', $arrival_date); ?><br>
			<?php print ($destination == 'Bangkok') ? '(Bangkok local time)' : ''; ?>
			<?php print ($destination == 'Phuket') ? '(Phuket local time)' : ''; ?>
		</td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt cap">ARRIVE <?php print strtoupper($destination); ?></div>
			<div class="orangetxt cap">FLIGHT <?php print $flight_number; ?> ex <?php print $flight_from; ?></div>
			<div class="normaltxt">Upon arrival at <?php print $airport; ?> Airport please complete arrival formalities, collect your luggage and proceed to</div>
			
			<!--client arrives before 10pm -->
			<?php if ($field_hospital == 67 && date('H', $arrival_date) < 22):?>
				<?php if ( !empty($field_gate_no) && $airport == 'Bangkok Don Mueang' ) { ?>
				<div class="bluetxt"><b>Gate <?php print $field_gate_no; ?> Meeting Point.</b></div>
				<?php } else { ?>
				<div class="bluetxt"><b>EXIT C, Meeting Point 10 (ARRIVAL HALL)</b></div>
				<div class="normaltxt"><b>Look for the Vejthani Hospital Booth</b></div>
				<?php } ?>
			<?php endif; ?>
			
			<!--client arrives after 10pm -->
			<?php
			if ($field_hospital == 67 && date('H', $arrival_date) > 22):?>
			    <?php if ( !empty($field_gate_no) && $airport == 'Bangkok Don Mueang') { ?>
					<div class="bluetxt"><b>Gate <?php print $field_gate_no; ?> Meeting Point.</b></div>
					<?php } else { ?>
					<div class="bluetxt"><b>EXIT C, GATE 9 (ARRIVAL HALL)</b></div>
					<?php } ?>
					<div class="normaltxt"><b>Look for the AOT Limousine Counter</b></div>
			    <img src="<?php print $image_path; ?>/AOTLimo.jpg" width="100px" height="50px"/>
			<?php endif; ?>
			
			<?php if ($field_hospital == 66):?>
			    <?php if ( !empty($field_gate_no) && $airport == 'Bangkok Don Mueang') { ?>
					<div class="bluetxt"><b>Gate <?php print $field_gate_no; ?> Meeting Point.</b></div>
					<?php } else { ?>
					<div class="normaltxt"><b>Gate 3 Meeting Point.</b></div>
					<img src="<?php print $image_path; ?>/meetingpoint.jpg" width="100px"/>
					<?php } ?>
			    <div class="normaltxt"><b>Look out for driver holding a sign with Stunning Makeovers logo or your name</b></div>
			    <img src="<?php print $image_path; ?>/logo.png" width="100px"/>
			<?php endif; ?>
			
			<?php if ($field_hospital == 731):?>
			<div class="normaltxt">Upon arrival at Phuket International Airport please complete arrival formalities, collect your luggage and proceed to <b>outside GATE 2</b></div>
			<img src="<?php print $image_path; ?>/PPSI_logo.jpg" width="100px"/>
			<div class="normaltxt">You will be greeted by a hospital representative who will have a sign bearing your name
 for your transfer to your Hotel</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 721):?>
			    <?php if ( !empty($field_gate_no) && $airport == 'Bangkok Don Mueang') { ?>
					<div class="bluetxt"><b>Gate <?php print $field_gate_no; ?> Meeting Point.</b></div>
					<?php } else { ?>
					<div class="normaltxt"><b>Gate 3 Meeting Point.</b></div>
					<span><img src="<?php print $image_path; ?>/meetingpoint.jpg" width="100px"/></span>
					<?php } ?>
			    <span><img src="<?php print $image_path; ?>/bpk9_logo.jpg" width="100px"/></span>
			    <div class="normaltxt"><b>Look for driver holding a sign with <?php print $field_hospitalname; ?> logo or your name</b></div>
			<?php endif; ?>
		  
		  
		</td>
    <td width=20% align="center">
			
			<!--client arrives before 10pm -->
			<?php if ($field_hospital == 67 && date('H', $arrival_date) < 22):?>
			  <?php if ( !empty($field_gate_no) && $airport == 'Bangkok Don Mueang') { ?>
          <div class="normaltxt">Vejthani Hospital<br>Ph: +66-8-5223-8888</div>
        <?php } else { ?>
					<div class="normaltxt">Vejthani Hospital<br>Airport Booth<br>Ph: +66-8-5223-8888</div>
				<?php } ?>
					
			<?php endif; ?>
			
			<!--client arrives after 10pm -->
			<?php if ($field_hospital == 67 && date('H', $arrival_date) > 22):?>
        <div class="normaltxt">Vejthani Hospital<br>Ph: +66-8-5223-8888</div>
			<?php endif; ?>

			<?php if ($field_hospital == 66):?>
			  <?php if (empty($field_gate_no)) : ?>
         <img src="<?php print $image_path; ?>/meetingpoint.jpg" width="100px"/>
        <?php endif; ?>
		  <div>Dan or his staff<br>Ph: +66 83 2576 555</div>
			<?php endif; ?>

			<?php if ($field_hospital == 731):?>
        <div class="normaltxt">Phuket Plastic Surgery Institute<br> Ph: +66 98 701 5952</div>
			<?php endif; ?>

			<?php if ($field_hospital == 721):?>
      <div class="normaltxt">
        <?php if (empty($field_gate_no)) : ?>
         <img src="<?php print $image_path; ?>/meetingpoint.jpg" width="100px"/>
        <?php endif; ?>
      </div>
			<div class="normaltxt">Bangpakok9 International Hospital<br>Ph: +66 90-198-7726</div>
			<div class="normaltxt"><img src="<?php print $image_path; ?>/bpk9_logo.jpg" width="100px"/></div>
			<?php endif; ?>
			
	  </td>
  </tr>
  <?php endif; ?>
  
  
  <!--Use this if we are providing airport transfer.-->
	<?php if ($field_airport_transfer == 'Stunning Makeovers Limited'):?>
	<tr>
    <td width=20% align="center">
			<?php print date('l, jS F', $arrival_date); ?><br>
			<?php print date('g:ia', $arrival_date); ?><br>
			<?php print ($destination == 'Bangkok') ? '(Bangkok local time)' : ''; ?>
			<?php print ($destination == 'Phuket') ? '(Phuket local time)' : ''; ?>
		</td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt cap">ARRIVE <?php print strtoupper($destination); ?></div>
			<div class="orangetxt cap">FLIGHT <?php print $flight_number; ?> ex <?php print $flight_from; ?></div>
			<div class="normaltxt">Upon arrival at <?php print $airport; ?> Airport please complete arrival formalities, collect your luggage and proceed to</div>
			
			<?php if ($field_hospital == 67):?>
			    <?php if (!empty($field_gate_no) && $airport == 'Bangkok Don Mueang') { ?>
					<div class="bluetxt"><b>Gate <?php print $field_gate_no; ?> Meeting Point.</b></div>
					<?php } else { ?>
					<div class="bluetxt"><b>Gate 5 Meeting Point.</b></div>
					<?php } ?>
			    <div class="normaltxt">Look for driver holding a sign with Stunning Makeovers logo or your name</div>
			    <img src="<?php print $image_path; ?>/logo.png" width="100px" height="50px"/>
			<?php endif; ?>
			
			<?php if ($field_hospital == 66):?>
			    <?php if (!empty($field_gate_no) && $airport == 'Bangkok Don Mueang') { ?>
					<div class="bluetxt"><b>Gate <?php print $field_gate_no; ?> Meeting Point.</b></div>
					<?php } else { ?>
					<div class="normaltxt"><b>Gate 3 Meeting Point.</b></div>
					<img src="<?php print $image_path; ?>/meetingpoint.jpg" width="100px"/>
					<?php } ?>
			    <div class="normaltxt"><b>Look out for driver holding a sign with Stunning Makeovers logo or your name</b></div>
			    <img src="<?php print $image_path; ?>/logo.png" width="100px"/>
			<?php endif; ?>
			
			<?php if ($field_hospital == 731):?>
			<div class="normaltxt"><b> outside GATE 2</b></div>
			<img src="<?php print $image_path; ?>/PPSI_logo.jpg" width="100px"/>
			<div class="normaltxt">You will be greeted by a hospital representative who will have a sign bearing your name for your transfer to your Hotel</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 721):?>
			    <?php if (!empty($field_gate_no) && $airport == 'Bangkok Don Mueang') { ?>
					<div class="bluetxt"><b>Gate <?php print $field_gate_no; ?> Meeting Point.</b></div>
					<?php } else { ?>
					<div class="normaltxt"><b>Gate 3 Meeting Point.</b></div>
					<span><img src="<?php print $image_path; ?>/meetingpoint.jpg" width="100px"/></span>
					<?php } ?>
			    <span><img src="<?php print $image_path; ?>/logo.png" width="100px"/></span>
			    <div class="normaltxt"><b>Look for driver holding a sign with Stunning Makeovers logo or your name</b></div>
			<?php endif; ?>
		  
		  
		</td>
    <td width=20% align="center">
			
			<?php if ($field_hospital == 67):?>
        <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			<?php endif; ?>

			<?php if ($field_hospital == 66):?>
        <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			<?php endif; ?>
      
      <?php if ($field_hospital == 721):?>
       <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			<?php endif; ?>
      
			<?php if ($field_hospital == 731):?>
        <div class="normaltxt">Phuket Plastic Surgery Institute<br> Ph: +66 98 701 5952</div>
			<?php endif; ?>

		</td>
  </tr>
  <?php endif; ?>
  
  
  <!--Use this if client doing own airport transfers.-->
	<?php if ($field_airport_transfer == 'Client'):?>
	<tr>
    <td width=20% align="center">
      <?php print date('l, jS F', $arrival_date); ?><br>
			<?php print date('g:ia', $arrival_date); ?><br>
			<?php print ($destination == 'Bangkok') ? '(Bangkok local time)' : ''; ?>
			<?php print ($destination == 'Phuket') ? '(Phuket local time)' : ''; ?>
    </td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt cap">ARRIVE <?php print strtoupper($destination); ?></div>
			<div class="orangetxt cap">FLIGHT <?php print $flight_number; ?> ex <?php print $flight_from; ?></div>
			<div class="normaltxt">Upon arrival at <?php print $airport; ?> Airport please complete arrival formalities, collect your luggage.</div>
			<div class="normaltxt">You have arranged transfer to your hotel.</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Own arrangements</div>
	  </td>
  </tr>
  <?php endif; ?>
  
  <!--Use this if we are providing accommodation-->
  
  <!--DREAM HOTEL-->
	<?php if ($field_accommodation_arranged == 'Accommodation Arranged by Stunning Makeovers Limited' && $field_hotel_name == 92):?>
	  <tr>
    <td width=20% align="center">
      <?php print date('l, jS F', strtotime("+1 hour", $field_transfers_pickup_date)); ?><br>
      <?php print date('g:ia', strtotime("+1 hour", $field_transfers_pickup_date)); ?>
    </td>
    <td width=60% align="center" class="paddingtop">
			<div class="normaltxt">
				<span class="orangetxt">HOTEL CHECK-IN</span><br>
				<b>DREAM HOTEL</b><br>
			  <span class="normaltxt">10 Sukhumvit Soi 15, Kloeng Toey Nua, Wattana <br>Bangkok 10110 Thailand<br> Tel: (66 2) 254-8500</span>
			</div>
			
		  <div class="normaltxt">Your accommodation is confirmed for <?php print $field_no_nights;?> nights in a <?php print $field_room_type;?> including daily buffet breakfast.<br>
		  
		  <?php if($field_bedding): ?>
		  <b>Your room will have <?php print ($field_bedding == 'Double Bed') ? 'a ' : ''; print $field_bedding; ?> 
		    <?php if($field_rollaway_bed_required):?>
		    and a Rollaway Bed
		    <?php endif; ?>
		  </b> 
		  <?php endif; ?>
		  
		  
		  
		  <?php if($field_share_hotel_room): ?>
		    <br><b>You will be sharing your room with <?php print $field_guest_2;?></b><br>
		  <?php endif; ?>
      </div>
      
      <?php if ($field_no_nights >= 12 && $field_qualify_for_upgrade && $field_hospital != 731) { ?>
        <div class="bluetxt">As a Stunning Makeovers client, we have arranged a complimentary upgrade to a <?php print $field_upgrade_room_type; ?> based on your length of stay</div>
      <?php } ?>
      
      <div class="normaltxt">
		    <b>Check in: </b><?php print $field_check_in_date;?><br>
        <b>Check out: </b><?php print $field_check_out_date;?><br>
        <span class="orangetxt">CONFIRMATION No: <?php print $field_hotel_booking_confirmation;?></span>
      </div>
      
      <div class="normaltxt">Your room is prepaid, however the hotel will take an impression of your credit card for incidentals</div>
    </td>
    <td width=20%>
			<?php if($field_vip_benefits):?>
				<div class="bluetxt" style="margin:10px;padding-left:10px;">
					<small><?php print variable_get('dream_benefit','');?></small>
				</div>
			<?php endif; ?>
	  </td>
  </tr>
	<?php endif; ?>
	
	
	<!--Deevana Resort and Spa-->
	<?php if ($field_accommodation_arranged == 'Accommodation Arranged by Stunning Makeovers Limited' && $field_hotel_name == 93):?>
	  <tr>
    <td width=20% align="center">
      <?php print date('l, jS F', strtotime("+1 hour", $field_transfers_pickup_date)); ?><br>
      <?php print date('g:ia', strtotime("+1 hour", $field_transfers_pickup_date)); ?>
    </td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">HOTEL CHECK-IN</div>
			<div class="normaltxt"><b>Deevana Resort and Spa</b></div>
			<div class="normaltxt"><?php print variable_get('deevana_address',''); ?></div>

		  <div class="normaltxt">Your accommodation is confirmed for <?php print $field_no_nights;?> nights in a <?php print $field_room_type;?> including daily buffet breakfast.
		  
		  <?php if($field_bedding): ?>
		  <b>Your room will have <?php print ($field_bedding == 'King Double Bed') ? 'a ' : ''; print $field_bedding; ?> 
		    <?php if($field_rollaway_bed_required):?>
		    and a Rollaway Bed
		    <?php endif; ?>
		  </b>
		  <?php endif; ?>
		  
		  <?php if($field_share_hotel_room): ?>
		   <br><b> You will be sharing your room with <?php print $field_guest_2;?></b>
		  <?php endif; ?>
      
      </div>
      <div class="normaltxt"><b>Check in: </b><?php print $field_check_in_date;?></div>
      <div class="normaltxt"><b>Check out: </b><?php print $field_check_out_date;?></div>
      <div class="orangetxt">CONFIRMATION No: <?php print $field_hotel_booking_confirmation;?></div>
      <div class="normaltxt">Your room is prepaid, however the hotel will take an impression of your credit card for incidentals</div>
		</td>
    <td width=20% align="center"></td>
  </tr>
  
  <?php if($field_vip_benefits):?>
  <tr>
		<td colspan=3>
      <div class="normaltxt" align="center">
        <div class="normaltxt"><b>Exclusive FREE offers for Stunning Makeovers clients*</b><br><small class="bluetxt">* must stay consecutive nights - excludes period 24th Dec to 5th January - booking made with Stunning Makeovers for entire stay</small></div>
				</div>
		 </td>
  </tr>
  
  <tr>
    <td colspan=3>
      
      <div  style="width:31%;display:inline-block;padding:0 10px;"><br>
        <b>5 consecutive nights</b>
				<ul style="padding-left:12px;" class="own_arrangements">
          <li>One-time welcome minibar <br><small class="bluetxt">(2 local beers & 2 soft drinks)</small></li>
        </ul>
			</div>
      <div   style="width:31%;display:inline-block;padding:0 10px;"><br>
        <b>8 consecutive nights</b>
				<ul style="padding-left:12px;" class="own_arrangements">
        <li>One-time welcome minibar <br><small class="bluetxt">(2 local beers & 2 soft drinks)</small></li>
        <li>One Set Lunch <small class="bluetxt">(food only)</small></li>
        <li>1hr Thai Massage for 1 adult</li>
      </ul>
			</div>
      <div  style="width:31%;display:inline-block;padding:0 10px;"><br>
        <b>12 consecutive nights</b>
				<ul style="padding-left:15px;" class="own_arrangements">
        <li>One-time welcome minibar <br><small class="bluetxt">(2 local beers & 2 soft drinks)</small></li>
        <li>One Set Lunch <small class="bluetxt" >(food only)</small></li>
        <li>One Set Dinner <small class="bluetxt">(food only)</small></li>
        <li>1hr Thai Massage for 1 adult</li>
        <li>1hr Foot Massage for 1 adult</li>
      </ul>
			</div>
		 </td>
  </tr>
  <?php endif; ?>
  
	<?php endif; ?>
	
	<!--Deevana Resort-->
	<?php if ($field_accommodation_arranged == 'Accommodation Arranged by Client'):?>
	  <tr>
    <td width=20% align="center"><?php //print date('l, jS F', $arrival_date); ?></td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">ACCOMMODATION</div>
			<div class="normaltxt">You have advised us that your accommodation is booked at 
				<center><?php print $field_client_hotel_name;?></center>
				<center><?php print $field_client_hotel_address; ?></center>
				<center><?php print $field_client_hotel_phone_number;?></center>
			</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Own arrangements</div>
	  </td>
  </tr>
	<?php endif; ?>
  
  <!--Use this if client having dental treatment BEFORE surgery appointment. 
	If there is no dental appointment or if the dental appointment is after surgery – delete this -->
		<?php 
if ( 
 !empty($field_dental_date) && 
 strtotime($field_dental_date) < strtotime($field_surgery_appointment_date) && 
 strtotime($field_dental_date) < strtotime($field_consultation_date)
):?>
			<tr>
			<td width=20% align="center" class="redtxt"><b>Important</b></td>
			<td width=60% align="center" class="paddingtop">
				<div class="bluetxt">Do not to take any <b>aspirin, ibuprofen, neurofen or non-steroid anti-inflammatory</b> after your dental procedures.</div>
				<div class="bluetxt">It is very important to follow this instruction as these drugs can have a blood thinning effect and cause post op complications. If you take these medications, it may result in your surgery being postponed or cancelled. Paracetamol with Codeine is the recommended choice of painkiller. Please advise the dentist of this at your consultation and ensure you know the type of painkiller (if any) you have been prescribed.</div>
				<div class="bluetxt"><b>It is your responsibility to ensure that you do not take any of the painkillers mentioned above.</b></div>
			</td>
			<td width=20% align="center">
				<div class="redtxt"><b>Important</b></div>
			</td>
		</tr>
  
    <?php if (!empty($field_dental_practice_options) && in_array($field_transfer_dental_appoint, array('Stunning Makeovers Limited','Hospital'))): ?>
			<tr>
				<td width=20% align="center">
					<?php print date('l, jS F', $wrapper->field_dental_appoint_transf_time->value()); ?><br>
					<?php print date('g:ia', $wrapper->field_dental_appoint_transf_time->value()); ?>
				</td>
				<td width=60% align="center" class="paddingtop">
					<div class="orangetxt">TRANSFER FOR DENTAL APPOINTMENT</div>
					<div class="normaltxt"><b><?php print $field_dental_practice_options;?></b></div>
					<div class="normaltxt"><?php print nl2br($field_dental_practice_address);?></div>
					<div class="normaltxt">Please meet the driver in the Hotel lobby for your complimentary one-way transfer to the practice for your first visit.</div>
				</td>
				<td width=20% align="center">
					
					<?php if($field_transfer_dental_appoint == 'Hospital'): ?>
						<div class="normaltxt"><?php print $field_dental_practice_options;?><br><?php print $field_dental_practice_phone;?></div>
					<?php endif;?>
					
					<?php if($field_transfer_dental_appoint == 'Stunning Makeovers Limited'): ?>
						
						<?php if($field_hospital == 67 || $field_hospital == 66 || $field_hospital == 721): ?>
							<div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
						<?php endif;?>
						
						<?php if($field_hospital == 731): ?>
							<div class="normaltxt">Deevana Resort and Spa<br>Ph: +66 76 341414</div>
						<?php endif;?>
					
					<?php endif;?>
				</td>
			</tr>
			<?php endif;?>
			
			<!--If client having dental treatment & doing own transfers to clinic or no transfer is provided-->
			<?php if (!empty($field_dental_practice_options) && ($field_transfer_dental_appoint == 'Client' || empty($field_transfer_dental_appoint))): ?>
			<tr>
				<td width=20% align="center">
					 <?php print date('l, jS F',$wrapper->field_dental_date->value()); ?><br>
					 <?php print date('g:ia',$wrapper->field_dental_date->value()); ?>
				</td>
				<td width=60% align="center" class="paddingtop">
					<div class="orangetxt">DENTAL APPOINTMENT</div>
					<div class="normaltxt"><b><?php print $field_dental_practice_options;?></b></div>
					<div class="normaltxt"><?php print nl2br($field_dental_practice_address);?></div>
					<div class="normaltxt">Please arrive at the practice at least 10 minutes prior to your appointment at <?php print $field_dental_practice_options;?></div>
					<div class="bluetxt">NOTE: Your Appointment is at <?php print date('g:ia', $wrapper->field_dental_date->value()); ?></div>
				</td>
				<td width=20% align="center">
					<div class="normaltxt">Own Arrangements</div>
				</td>
			</tr>
			<?php endif;?>
			
			<!--If client having dental treatment -->
			<?php if (!empty($field_dental_practice_options)): ?>
			<tr>
				<td width=20% align="center"></td>
				<td width=60% align="center">
					<div class="normaltxt">Should you require subsequent visits to the dental practice, the staff will coordinate and advise you of the time/date</div>
				</td>
				<td width=20% align="center">
					<div class="normaltxt"></div>
				</td>
			</tr>
			<?php endif;?>
	  <?php endif; ?>
	
	
  <!--Use this if hotel is doing hospital transfers -->
  <?php if (
      $field_consultation_before_surger == 'Yes' && 
      (in_array($field_transfer_for_consultation, array('Hotel'))) && 
      (strtotime($field_consultation_date) < strtotime($field_surgery_appointment_date))
    ):
  ?>
  <tr>
	<td width=20% align="center" class="redtxt">
	  <?php print date('l, jS F', $wrapper->field_consultation_transfer_time->value()); ?><br>
	  <?php print date('g:ia', $wrapper->field_consultation_transfer_time->value()); ?>
	</td>
	<td width=60% align="center" class="paddingtop">
	  <div class="orangetxt cap">TRANSFER TO <?php print $field_hospitalname; ?> FOR PRE-OPERATIVE CONSULTATION</div>
	  <div class="redtxt bgyellow"><b>NO FOOD OR WATER at least 6- 8 hours before appointment.</b></div>
	  <div class="normaltxt"><b>Please meet the driver in the Hotel lobby for your transfer to <?php print $field_hospitalname; ?>.</b></div>
	</td>
	<td width=20% align="center">
	  <div class="normaltxt">Deevana Resort and Spa +66 76 341414 or 341415 or 341705</div>
	</td>
  </tr>
  <?php endif; ?>
	
	<!--Use this if there is a consultation on a different day to the surgery appointment 
and we are providing hospital transfers-->
  <?php if (
      $field_consultation_before_surger == 'Yes' && 
      (in_array($field_transfer_for_consultation, array('Stunning Makeovers Limited','Hospital'))) && 
      (strtotime($field_consultation_date) < strtotime($field_surgery_appointment_date))
    ):
  ?>
	  <tr>
    <td width=20% align="center">
      <?php print date('l, jS F', $wrapper->field_consultation_transfer_time->value()); ?><br>
	  <?php print date('g:ia', $wrapper->field_consultation_transfer_time->value()); ?>
    </td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt cap">TRANSFER TO <?php print $field_hospitalname; ?> FOR PRE-OPERATIVE CONSULTATION</div>
			<div class="redtxt bgyellow"><b>NO FOOD OR WATER at least 6- 8 hours before appointment.</b></div>
			<div class="normaltxt" style="padding-left:10px;padding-right:10px;">
			<?php if ($field_transfer_for_consultation == 'Hospital'): ?>
			Today's transfer will be provided by <?php print $field_hospitalname; ?>. 
			<?php endif; ?>
			
			<?php if ($field_transfer_for_consultation == 'Stunning Makeovers Limited'): ?>
			<b>Please meet the driver in the Hotel lobby for your transfer to <?php print $field_hospitalname; ?>.</b> 
			<?php endif; ?>
			Please go to the hotel lobby and advise the reception desk your name and room number and that you are waiting for pick up. The driver will go to reception and ask for you when he arrives.
			</div>
		</td>
    
    <td width=20% align="center">
			
		<?php if ($field_hospital == 67 && $field_transfer_for_consultation == 'Hospital'):?>
			 <div class="normaltxt">Vejthani Hospital 24/7 Hotline Ph +66-8-5223-8888</div>
			 <div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
		<?php endif; ?>
		
		<?php if ($field_hospital == 67 && $field_transfer_for_consultation == 'Stunning Makeovers Limited'):?>
			 <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			 <div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
		<?php endif; ?>
    
    <?php if ($field_hospital == 66 && $field_transfer_for_consultation == 'Hospital'):?>
      <div class="normaltxt">Dan or his staff <br>Ph: +66 83 2576 555</div>
			<div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
		<?php endif; ?>
		
		<?php if ($field_hospital == 66 && $field_transfer_for_consultation == 'Stunning Makeovers Limited'):?>
      <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			<div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
		<?php endif; ?>

		<?php if ($field_hospital == 731 && $field_transfer_for_consultation == 'Hospital'):?>
    <div class="normaltxt">Phuket International Aesthetic Centre<br>Ph: +66 (0) 7624 940025</div>
    <div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
		<?php endif; ?>
		
		<?php if ($field_hospital == 731 && $field_transfer_for_consultation == 'Stunning Makeovers Limited'):?>
    <div class="normaltxt">Deevana Resort and Spa <br>Ph: +66 76 341414</div>
    <div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
		<?php endif; ?>

		<?php if ($field_hospital == 721 && $field_transfer_for_consultation == 'Hospital'):?>
      <div class="normaltxt">Bangpakok9 International Hospital<br>Ph: +66 90-198-7726</div>
			<div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.<br><br> If the delay is more than 15 minutes you may ask the reception desk to call +66 90-198-7726 for an update.</div>
		<?php endif; ?>
		
		<?php if ($field_hospital == 721 && $field_transfer_for_consultation == 'Stunning Makeovers Limited'):?>
      <div class="normaltxt">Mr T or his staff  <br>Ph: +66 81 8445243</div>
			<div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.<br><br> If the delay is more than 15 minutes you may ask the reception desk to call +66 90-198-7726 for an update.</div>
		<?php endif; ?>
		
	  </td>
  </tr>
	<?php endif; ?>
	
	
	<!--Use this if there is the consultation is on a different day to the surgery appointment and client doing transfers-->
  <?php if (
      $field_consultation_before_surger == 'Yes' && 
      ($field_transfer_for_consultation == 'Client') && 
      (strtotime($field_consultation_date) < strtotime($field_surgery_appointment_date))
    ):
  ?>
	  <tr>
    <td width=20% align="center">
			<?php print date('l, jS F', $wrapper->field_consultation_date->value()); ?>
		</td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">PRE-OPERATIVE CONSULTATION</div>
			<div class="redtxt bgyellow"><b>NO FOOD OR WATER at least 6- 8 hours before consultation.</b></div>
			
			<div class="orangetxt cap"><?php print $field_hospitalname; ?></div>
			<div class="normaltxt"><?php print nl2br($field_hospital_address); ?> <br>Ph: <?php print $field_hospital_contact; ?>
			<?php if ($field_hospital == 67):?>
			  <br>Please proceed to the International Patients Desk on LEVEL 1 to meet your Coordinator.</div>
			<?php endif; ?>
			<div class="bluetxt"><b>Please arrive at least 10 minutes before your appointment and proceed to the International Patients Counter</b></div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt yellowbg"> Own arrangements</div>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if there is a consultation on a different day to the surgery appointment 
and we are providing hospital transfers-->
  <?php if (
      $field_consultation_before_surger == 'Yes' && 
      (in_array($field_transfer_for_consultation, array('Stunning Makeovers Limited','Hospital'))) && 
      (strtotime($field_consultation_date) < strtotime($field_surgery_appointment_date))
    ):
  ?>
	  <tr>
    <td width=20% align="center">
			<?php print date('l, jS F', strtotime("+45 minutes", $wrapper->field_consultation_transfer_time->value())); ?><br>
			<?php print date('g:ia', strtotime("+45 minutes", $wrapper->field_consultation_transfer_time->value()));?>
	  </td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt cap">ARRIVE AT <?php print $field_hospitalname; ?></div>
			<div class="normaltxt"><?php print nl2br($field_hospital_address); ?> <br>Ph: <?php print $field_hospital_contact; ?>
			<?php if ($field_hospital == 67):?>
			  <br>Please proceed to the International Patients Desk on LEVEL 1 to meet your Coordinator.</div>
			<?php endif; ?>
		</td>
    <td width=20% align="center">
			<?php if ($field_hospital == 67 && $field_transfer_for_consultation == 'Hospital'):?>
			 <div class="normaltxt">International Patient Coordinator 24/7 Hotline <br>Ph: +66-8-5223-8888</div>
      <?php endif; ?>
      
      <?php if ($field_hospital == 67 && $field_transfer_for_consultation == 'Stunning Makeovers Limited'):?>
			  <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
      <?php endif; ?>

			<?php if ($field_hospital == 66 && $field_transfer_for_consultation == 'Hospital'):?>
      <div class="normaltxt">Please ask for <?php print $field_mm_coordinator; ?>, your English speaking coordinator on arrival at the hospital</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 66 && $field_transfer_for_consultation == 'Stunning Makeovers Limited'):?>
       <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			<?php endif; ?>

			<?php if ($field_hospital == 731 && $field_transfer_for_consultation == 'Hospital'):?>
        Phuket International Aesthetic Centre <br>Ph: +66 (0) 7624 940025
			<?php endif; ?>
			
			<?php if ($field_hospital == 731 && $field_transfer_for_consultation == 'Stunning Makeovers Limited'):?>
        Deevana Resort and Spa <br>Ph: +66 76 341414
			<?php endif; ?>

			<?php if ($field_hospital == 721 && $field_transfer_for_consultation == 'Hospital'):?>
       <div class="normaltxt">Bangpakok9 International Hospital<br>Ph: +66 90-198-7726</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 721 && $field_transfer_for_consultation == 'Stunning Makeovers Limited'):?>
       <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			<?php endif; ?>
			
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if there is the consultation is on a different day to the surgery appointment -->
  <?php if ($field_consultation_before_surger == 'Yes' && strtotime($field_consultation_date) < strtotime($field_surgery_appointment_date)):?>
	  <tr>
    <td width=20% align="center">
      <?php if ($field_consultation_pre_operative) {
         print $field_consultation_pre_operative; 
       } else { 
      ?>
			<?php print date('l, jS F', $wrapper->field_consultation_date->value()); ?><br>
			<?php print date('g:ia', $wrapper->field_consultation_date->value());?>
		  <?php } ?>
    </td>
    
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">CONSULTATION & PRE-OPERATIVE TESTS</div>
			<div class="normaltxt">Meet the surgeon and have any required pre-operative tests, X-Rays etc</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt"><?php print $field_mm_surgeon; ?><br><?php print $field_other_surgeon; ?></div>
	  </td>
  </tr>
		<?php if($field_mm_surgeon2 || $field_other_surgeon2): ?>
		<tr>
			<td width=20% align="center">
        <?php if ($field_consultation_pre_operative) {
           print $field_consultation_pre_operative; 
         } else { 
        ?>
				<?php print date('l, jS F', strtotime("+30 minutes",$wrapper->field_consultation_date->value())); ?><br>
				<?php print date('g:ia', strtotime("+30 minutes",$wrapper->field_consultation_date->value()));?>
        <?php } ?>
			</td>
			<td width=60% align="center" class="paddingtop">
				<div class="orangetxt">CONSULTATION & PRE-OPERATIVE TESTS</div>
				<div class="normaltxt">Meet the surgeon and have any required pre-operative tests, X-Rays etc</div>
			</td>
			<td width=20% align="center">
				<div class="normaltxt"><?php print $field_mm_surgeon2; ?><br><?php print $field_other_surgeon2; ?></div>
			</td>
		</tr>
		<?php endif; ?>
	<?php endif; ?>
	
	<!--Use this if there is the consultation is on a different day to the surgery appointment and Hotel is providing hospital transfers-->
	<?php if (
      $field_consultation_before_surger == 'Yes' && 
      ($field_transfer_for_consultation == 'Hotel') && 
      (strtotime($field_consultation_date) < strtotime($field_surgery_appointment_date))
    ):
  ?>
	  <tr>
		<td width=20% align="center"><?php print date('l, jS F', $wrapper->field_consultation_date->value()); ?><br>Time TBA</td>
		<td width=60% align="center" class="paddingtop">
			<div class="orangetxt">RETURN TO HOTEL</div>
			<div class="normaltxt">Following your consultation and tests please ask your English speaking Coordinator to call the hotel for your transfer back to your hotel.</div>
		  <div class="normaltxt">You will be advised of your surgery date and time.</div>
		  <div class="normaltxt">Please advise the driver so that your transfer can be arranged for the surgery day.</div>
		</td>
		<td width=20% align="center">
		  <div class="normaltxt"></div>
		</td>
	  </tr>
	<?php endif; ?>
	
	
	<!--Use this if there is the consultation is on a different day to the surgery appointment and hospital is providing hospital transfers-->
	<?php if (
      $field_consultation_before_surger == 'Yes' && 
      ($field_transfer_for_consultation == 'Hospital') && 
      (strtotime($field_consultation_date) < strtotime($field_surgery_appointment_date))
    ):
  ?>
	  <tr>
    <td width=20% align="center"><?php print date('l, jS F', $wrapper->field_consultation_date->value()); ?><br>Time TBA</td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">RETURN TO HOTEL</div>
			<div class="normaltxt">Following your consultation and tests the International Coordinator will arrange your transfer back to your hotel.</div>
		  <div class="normaltxt">You will be advised of your surgery date and pick up time from the Hotel for your surgery appointment.</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">International Patient Coordinator</div>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if there is the consultation is on a different day to the surgery appointment and we are providing the transfer-->
	<?php if (
      $field_consultation_before_surger == 'Yes' && 
      ($field_transfer_for_consultation == 'Stunning Makeovers Limited') && 
      (strtotime($field_consultation_date) < strtotime($field_surgery_appointment_date))
    ):
  ?>
	  <tr>
    <td width=20% align="center"><?php print date('l, jS F', $wrapper->field_consultation_date->value()); ?><br>Time TBA</td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">RETURN TO HOTEL</div>
			<div class="normaltxt">Following your consultation and tests please ask the International Coordinator to call the driver for your transfer back to your hotel.</div>
		  <div class="bluetxt">Please advise the driver your surgery date and appointment time so he can schedule the transfer.</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Mr T or his staff <br>Ph: <?php print $field_hospital_contact;?></div>
	  </td>
  </tr>
	<?php endif; ?>
	
	
	<!--Use this if there is the consultation is on a different day to the surgery appointment and client is doing own hospital transfers-->
	<?php if (
      $field_consultation_before_surger == 'Yes' && 
      ($field_transfer_for_consultation == 'Client') && 
      (strtotime($field_consultation_date) < strtotime($field_surgery_appointment_date))
    ):
  ?>
	  <tr>
    <td width=20% align="center"><?php print date('l, jS F', $wrapper->field_consultation_date->value()); ?><br>Time TBA</td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">RETURN TO HOTEL</div>
			<div class="normaltxt">Following your consultation and tests you will be advised of your surgery appointment date and time.</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Own arrangements</div>
	  </td>
  </tr>
	<?php endif; ?>
  
  
    <?php if (
  !empty($field_dental_date) && 
  strtotime($field_dental_date) > strtotime($field_consultation_date) &&
  strtotime($field_dental_date) < strtotime($field_surgery_appointment_date)
  ):?>
  
  <tr>
    <td width=20% align="center" class="redtxt"><b>Important</b></td>
    <td width=60% align="center" class="paddingtop">
      <div class="bluetxt">Do not to take any <b>aspirin, ibuprofen, neurofen or non-steroid anti-inflammatory</b> after your dental procedures.</div>
      <div class="bluetxt">It is very important to follow this instruction as these drugs can have a blood thinning effect and cause post op complications. If you take these medications, it may result in your surgery being postponed or cancelled. Paracetamol with Codeine is the recommended choice of painkiller. Please advise the dentist of this at your consultation and ensure you know the type of painkiller (if any) you have been prescribed.</div>
      <div class="bluetxt"><b>It is your responsibility to ensure that you do not take any of the painkillers mentioned above.</b></div>
    </td>
    <td width=20% align="center">
      <div class="redtxt"><b>Important</b></div>
    </td>
  </tr>
  
	<!--If client having dental treatment & we are doing transfers to clinic-->
	<?php if (!empty($field_dental_practice_options) && in_array($field_transfer_dental_appoint, array('Stunning Makeovers Limited','Hospital'))): ?>
	<tr>
    <td width=20% align="center">
			<?php print date('l, jS F', $wrapper->field_dental_appoint_transf_time->value()); ?><br>
			<?php print date('g:ia', $wrapper->field_dental_appoint_transf_time->value()); ?>
		</td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">TRANSFER FOR DENTAL APPOINTMENT</div>
			<div class="normaltxt"><b><?php print $field_dental_practice_options;?></b></div>
			<div class="normaltxt"><?php print nl2br($field_dental_practice_address);?></div>
			<div class="normaltxt">Please meet the driver in the Hotel lobby for your complimentary one-way transfer to the practice for your first visit.</div>
		</td>
    <td width=20% align="center">
			
			<?php if($field_transfer_dental_appoint == 'Hospital'): ?>
			  <div class="normaltxt"><?php print $field_dental_practice_options;?><br><?php print $field_dental_practice_phone;?></div>
			<?php endif;?>
			
			<?php if($field_transfer_dental_appoint == 'Stunning Makeovers Limited'): ?>
			  
			  <?php if($field_hospital == 67 || $field_hospital == 66 || $field_hospital == 721): ?>
			    <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			  <?php endif;?>
			  
			  <?php if($field_hospital == 731): ?>
			    <div class="normaltxt">Deevana Resort and Spa<br>Ph: +66 76 341414</div>
			  <?php endif;?>
			
			<?php endif;?>
	  </td>
  </tr>
	<?php endif;?>
	
	<!--If client having dental treatment & doing own transfers to clinic or no transfer is provided-->
	<?php if (!empty($field_dental_practice_options) && ($field_transfer_dental_appoint == 'Client' || empty($field_transfer_dental_appoint))): ?>
	<tr>
    <td width=20% align="center">
       <?php print date('l, jS F',$wrapper->field_dental_date->value()); ?><br>
       <?php print date('g:ia', $wrapper->field_dental_date->value()); ?>
    </td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">DENTAL APPOINTMENT</div>
			<div class="normaltxt"><b><?php print $field_dental_practice_options;?></b></div>
			<div class="normaltxt"><?php print nl2br($field_dental_practice_address);?></div>
			<div class="normaltxt">Please arrive at the practice at least 10 minutes prior to your appointment at <?php print $field_dental_practice_options;?></div>
			<div class="bluetxt">NOTE: Your Appointment is at <?php print date('g:ia', $wrapper->field_dental_date->value()); ?></div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Own Arrangements</div>
	  </td>
  </tr>
	<?php endif;?>
  
  <!--If client having dental treatment -->
	<?php if (!empty($field_dental_practice_options)): ?>
	<tr>
    <td width=20% align="center"></td>
    <td width=60% align="center">
			<div class="normaltxt">Should you require subsequent visits to the dental practice, the staff will coordinate and advise you of the time/date</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt"></div>
	  </td>
  </tr>
	<?php endif;?>
	
	<?php endif;?>
  
  
  <!--Use this if the surgery is on a different day to the consultation appointment and hotel is providing hospital transfers -->
  <?php if (
      $field_consultation_before_surger == 'Yes' &&
      ($field_transfer_surgery_appoint == 'Hotel') && 
      (strtotime($field_consultation_date) < strtotime($field_surgery_appointment_date))
    ):
  ?>
  <tr>
    <td width=20% align="center">
      <?php print date('l, jS F', $wrapper->field_surgery_appoint_tran_time->value()); ?><br>
			<?php print date('g:ia',$wrapper->field_surgery_appoint_tran_time->value()); ?>
    </td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">TRANSFER TO HOSPITAL FOR SURGERY</div>
			<div class="redtxt bgyellow"><b>NO FOOD OR WATER at least 6- 8 hours before appointment</b></div>
			<div class="normaltxt"><b>Your surgery will be performed as an outpatient procedure and you will be able to return to the hotel today.</b></div>
			<div class="normaltxt"><b>Please meet the driver in the Hotel lobby for your transfer to <?php print $field_hospitalname;?></b></div>
		</td>
    <td width=20% align="center">Deevana Resort and Spa +66 76 341414 or 341415 or 341705</td>
   </tr>
  <?php endif; ?>
  
  <!--Use this if the surgery is on a different day to the consultation appointment and hospital is providing hospital transfers -->
  <?php if (
      $field_consultation_before_surger == 'Yes' &&
      ($field_transfer_surgery_appoint == 'Hospital') && 
      (strtotime($field_consultation_date) < strtotime($field_surgery_appointment_date))
    ):
  ?>
  <tr>
    <td width=20% align="center">
      <?php print date('l, jS F', $wrapper->field_surgery_appoint_tran_time->value()); ?><br>
			<?php print date('g:ia',$wrapper->field_surgery_appoint_tran_time->value()); ?>
    </td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">TRANSFER TO HOSPITAL FOR SURGERY</div>
			<div class="redtxt bgyellow"><b>NO FOOD OR WATER at least 6- 8 hours before appointment</b></div>
			<div class="normaltxt"><b>Your surgery will be performed as an outpatient procedure and you will be able to return to the hotel today.</b></div>
			<div class="normaltxt"><b>Please meet the driver in the Hotel lobby for your transfer to <?php print $field_hospitalname;?></b></div>
		</td>
    <td width=20% align="center">
			
			<?php if ($field_hospital == 67):?>
      <div class="normaltxt">International Patient Coordinator 24/7 Hotline <br>Ph: +66-8-5223-8888</div>
      <div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br>The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
			<?php endif; ?>

			<?php if ($field_hospital == 66):?>
      <div class="normaltxt">Dan or his staff <br>Ph: +66 83 2576 555</div>
			<div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br>The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
			<?php endif; ?>

			<?php if ($field_hospital == 731):?>
      <div class="normaltxt">Phuket International Aesthetic Centre <br>Ph: +66 (0) 7624 9400</div>
      <div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br>The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
			<?php endif; ?>

			<?php if ($field_hospital == 721):?>
       <div class="normaltxt">Bangpakok9 International Hospital<br>Ph: +66 90-198-7726</div>
       <div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br>The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.<br><br> If the delay is more than 15 minutes you may ask the reception desk to call +66 90-198-7726 for an update</div>
			<?php endif; ?>
			
	  </td>
  </tr>
	<?php endif; ?>
	
	
	<!--Use this if the surgery is on a different day to the consultation appointment and we are providing hospital transfer -->
  <?php if (
      $field_consultation_before_surger == 'Yes' &&
      ($field_transfer_surgery_appoint == 'Stunning Makeovers Limited') && 
      (strtotime($field_consultation_date) < strtotime($field_surgery_appointment_date))
    ):
  ?>
  <tr>
    <td width=20% align="center">
      <?php print date('l, jS F', $wrapper->field_surgery_appoint_tran_time->value()); ?><br>
			<?php print date('g:ia',$wrapper->field_surgery_appoint_tran_time->value()); ?>
    </td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">TRANSFER TO HOSPITAL FOR SURGERY</div>
			<div class="redtxt bgyellow"><b>NO FOOD OR WATER at least 6- 8 hours before appointment</b></div>
			<div class="normaltxt"><b>Your surgery will be performed as an outpatient procedure and you will be able to return to the hotel today.</b></div>
			<div class="normaltxt"><b>Please meet the driver in the Hotel lobby for your transfer to <?php print $field_hospitalname;?></b></div>
			<div class="normaltxt">Please go to the hotel lobby and advise the reception desk your name and room number and that you are waiting for pick up.</div>
			<div class="normaltxt">The driver will go to reception and ask for you when he arrives.</div>
		</td>
    <td width=20% align="center">
			
			<?php if ($field_hospital == 67):?>
      <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
      <div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
			<?php endif; ?>

			<?php if ($field_hospital == 66):?>
      <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			<div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
			<?php endif; ?>

			<?php if ($field_hospital == 731):?>
      <div class="normaltxt">Deevana Resort and Spa <br>Ph: +66 76 341414</div>
      <div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
			<?php endif; ?>

			<?php if ($field_hospital == 721):?>
       <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
       <div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.<br><br> If the delay is more than 15 minutes you may ask the reception desk to call +66 81 8445243 for an update</div>
			<?php endif; ?>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if there is a consultation on a different day to the surgery appointment and client doing own hospital transfers -->
	<?php if (
	     $field_consultation_before_surger == 'Yes' &&
      ($field_transfer_surgery_appoint == 'Client') && 
      (strtotime($field_consultation_date) < strtotime($field_surgery_appointment_date))
    ):
  ?>
  <tr>
    <td width=20% align="center"><?php //print date('l, jS F', $wrapper->field_surgery_appoint_tran_time->value()); ?>
     <?php print date('l, jS F', $wrapper->field_surgery_appointment_date->value());?> <br>
      <?php print date('g:ia', $wrapper->field_surgery_appointment_date->value()); ?>
    </td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">SURGERY APPOINTMENT</div>
			<div class="redtxt bgyellow"><b>NO FOOD OR WATER at least 6- 8 hours before appointment</b></div>
			<div class="normaltxt"><b>Your surgery will be performed as an outpatient procedure and you will be able to return to the hotel today.</b></div>
			<div class="normaltxt"><div class="orangetxt cap"><?php print $field_hospitalname;?></div><?php print nl2br($field_hospital_address);?> <br>Ph: <?php print $field_hospital_contact; ?></div>
			<div class="bluetxt"><b>Please arrive at least 10 minutes before your appointment and proceed to the International Patients Counter</b></div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Own arrangements</div>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if the surgery is on a different day to the consultation appointment and we are providing hospital transfers -->
	<?php if (
	     $field_consultation_before_surger == 'Yes' &&
      (in_array($field_transfer_surgery_appoint, array('Stunning Makeovers Limited','Hospital'))) && 
      (strtotime($field_consultation_date) < strtotime($field_surgery_appointment_date))
    ):
  ?>
  <tr>
    <td width=20% align="center">
			<?php print date('l, jS F',strtotime("+45 minutes", $wrapper->field_surgery_appoint_tran_time->value()));?> <br>
      <?php print date('g:ia',strtotime("+45 minutes", $wrapper->field_surgery_appoint_tran_time->value())); ?>
	  </td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt cap">ARRIVE AT <?php print $field_hospitalname;?></div>
			<div class="normaltxt"><?php print nl2br($field_hospital_address); ?> <br>Ph: <?php print $field_hospital_contact; ?>
			<?php if ($field_hospital == 67):?>
			<br> Please proceed to the International Patients. Desk on LEVEL 1 to meet your Coordinator.</div>
			<?php endif; ?>
		</td>
    <td width=20% align="center">
			<?php if ($field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
			  
			  <?php if ($field_hospital == 67):?>
			    <div class="normaltxt">Mr T or his staff<br>Ph: +66 81 8445243</div>
			  <?php endif; ?>
			  
			  <?php if ($field_hospital == 66):?>
			    <div class="normaltxt">Mr T or his staff<br>Ph: +66 81 8445243</div>
			    <div class="normaltxt">Please ask for <?php print $field_mm_coordinator; ?>, your English speaking coordinator on arrival at the hospital</div>
			  <?php endif; ?>
			  
			  <?php if ($field_hospital == 731):?>
			    <div class="normaltxt"> Deevana Resort and Spa<br>Ph: +66 76 341414</div>
			  <?php endif; ?>
			  
			  <?php if ($field_hospital == 721):?>
			    <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			  <?php endif; ?>
			<?php endif; ?>
			
			<?php if ($field_transfer_surgery_appoint == 'Hospital'):?>
			  <?php if ($field_hospital == 67):?>
			    <div class="normaltxt">International Patient Coordinator 24/7 Hotline <br>Ph: +66-8-5223-8888</div>
			  <?php endif; ?>
			  
			  <?php if ($field_hospital == 66):?>
			  <div class="normaltxt">Dan or his staff <br>Ph: +66 83 2576 555</div>
			  <?php endif; ?>
			  
			  <?php if ($field_hospital == 731):?>
			    <div class="normaltxt">Phuket International Aesthetic Centre <br>Ph: +66 (0) 7624 9400</div>
			  <?php endif; ?>
			  
			  <?php if ($field_hospital == 721):?>
        <div class="normaltxt">Bangpakok9 International Hospital<br>Ph: +66 90-198-7726</div>
			  <?php endif; ?>
		  <?php endif; ?>
		</td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if there is NOT a consultation on a different day to the surgery appointment and we are providing hospital transfers-->
  <?php if (
    $field_consultation_before_surger == 'No' && 
    !empty($field_surgery_appointment_date) &&
    (in_array($field_transfer_surgery_appoint, array('Stunning Makeovers Limited','Hospital')))
  ):?>
  <tr>
    <td width=20% align="center">
		  <?php print date('l, jS F', $wrapper->field_surgery_appoint_tran_time->value()); ?><br>
			<?php print date('g:ia', $wrapper->field_surgery_appoint_tran_time->value()); ?>	
		</td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt cap">TRANSFER TO <?php print $field_hospitalname;?></div>
			<div class="redtxt bgyellow"><b>NO FOOD OR WATER at least 6- 8 hours before consultation</b></div>
			<div class="normaltxt"><b>Your surgery will be performed as an outpatient procedure and you will be able to return to the hotel today.</b></div>
			<div class="normaltxt">Please go to the hotel lobby and advise the reception desk your name and room number and that you are waiting for pick up.<br>The driver will go to reception and ask for you when he arrives.</div>
		</td>
    <td width=20% align="center">
			<?php if ($field_hospital == 67 && $field_transfer_surgery_appoint == 'Hospital'):?>
        <div class="normaltxt">International Patient Coordinator 24/7 Hotline <br>Ph: +66-8-5223-8888</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 67 && $field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
        <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
        <div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
			<?php endif; ?>

			<?php if ($field_hospital == 66 && $field_transfer_surgery_appoint == 'Hospital'):?>
      <div class="normaltxt">Dan or his staff <br>Ph: +66 83 2576 555</div>
      <div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 66 && $field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
      <div class="normaltxt">Mr T or his staff<br>Ph: +66 81 8445243</div>
      <div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
			<?php endif; ?>

			<?php if ($field_hospital == 731 && $field_transfer_surgery_appoint == 'Hospital'):?>
      <div class="normaltxt">Phuket International Aesthetic Centre <br>Ph: +66 (0) 7624 9400</div>
      <div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 731 && $field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
      <div class="normaltxt">Deevana Resort and Spa<br>Ph: +66 76 341414</div>
      <div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
			<?php endif; ?>

			<?php if ($field_hospital == 721 && $field_transfer_surgery_appoint == 'Hospital'):?>
      <div class="normaltxt">Bangpakok9 International Hospital<br>Ph: +66 90-198-7726</div>
      <div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA. If the delay is more than 15 minutes you may ask the reception desk to call +66 90-198-7726 for an update</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 721 && $field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
      <div class="normaltxt">Mr T or his staff<br>Ph: +66 81 8445243</div>
      <div class="bluetxt small">Due to traffic congestion, pick up time may be delayed.<br> The driver and the hospital are in contact and will adjust your appointment according to your updated ETA. If the delay is more than 15 minutes you may ask the reception desk to call +66 81 8445243 for an update</div>
			<?php endif; ?>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if there is NOT a consultation on a different day to the surgery appointment and client is providing hospital transfers-->
  <?php if (
       $field_consultation_before_surger == 'No' && 
       !empty($field_surgery_appointment_date) &&
      ($field_transfer_surgery_appoint == 'Client')
    ):?>
  <tr>
    <td width=20% align="center">
      <?php print date('l, jS F', $wrapper->field_surgery_appointment_date->value()); ?><br>
      <?php print date('g:ia',$wrapper->field_surgery_appointment_date->value()); ?>
    </td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">SURGERY APPOINTMENT</div>
			<div class="redtxt bgyellow"><b>NO FOOD OR WATER at least 6- 8 hours before consultation</b></div>
			<div class="normaltxt"><b>Your surgery will be performed as an outpatient procedure and you will be able to return to the hotel today.</b></div>
			
			<div class="normaltxt"><div class="orangetxt cap"><?php print $field_hospitalname;?> </div> 
			  <?php print nl2br($field_hospital_address);?> <br>Ph: <?php print $field_hospital_contact;?>
			</div>
			<div class="bluetxt"><b>Please arrive at least 10 minutes before your appointment and proceed to the International Patients Counter.</b></div>
		
		</td>
    <td width=20% align="center">
			<div class="normaltxt">
			  <div class="normaltxt">Own arrangements</div>
			</div>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if there is NOT a consultation on a different day to the surgery appointment and WE are doing transfers-->
  <?php 
   if (
     $field_consultation_before_surger == 'No' && 
     !empty($field_surgery_appointment_date) &&
    (in_array($field_transfer_surgery_appoint, array('Stunning Makeovers Limited','Hospital')))
   ):?>
  <tr>
    <td width=20% align="center">
			<?php print date('l, jS F',strtotime("+45 minutes", $wrapper->field_surgery_appoint_tran_time->value()));?><br>
			<?php print date('g:ia',strtotime("+45 minutes", $wrapper->field_surgery_appoint_tran_time->value())); ?>	
		</td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt cap">ARRIVE AT <?php print $field_hospitalname;?></div>
			<div class="normaltxt"><?php print nl2br($field_hospital_address); ?> <br>Ph: <?php print $field_hospital_contact; ?>
			<?php if ($field_hospital == 67):?>
			<br>Please proceed to the International Patients Desk on LEVEL 1 to meet your Coordinator.</div>
			<?php endif; ?>
			</td>
    <td width=20% align="center">
			<?php if ($field_hospital == 67 && $field_transfer_surgery_appoint == 'Hospital'):?>
        <div class="normaltxt">International Patient Coordinator 24/7 Hotline <br>Ph: +66-8-5223-8888</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 67 && $field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
        <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			<?php endif; ?>
      
      <?php if ($field_hospital == 66 && $field_transfer_surgery_appoint == 'Hospital'):?>
      <div class="normaltxt">Dan or his staff <br>Ph: +66 83 2576 555</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 66 && $field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
      <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
      <div class="normaltxt">Please ask for <?php print $field_mm_coordinator; ?>, your English speaking coordinator on arrival at the hospital.</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 731 && $field_transfer_surgery_appoint == 'Hospital'):?>
      <div class="normaltxt">Phuket International Aesthetic Centre <br>Ph: +66 (0) 7624 9400</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 731 && $field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
      <div class="normaltxt">Deevana Resort and Spa<br>Ph: +66 76 341414</div>
			<?php endif; ?>

			<?php if ($field_hospital == 721 && $field_transfer_surgery_appoint == 'Hospital'):?>
      <div class="normaltxt">Bangpakok9 International Hospital<br>Ph: +66 90-198-7726</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 721 && $field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
      <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			<?php endif; ?>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if there is the consultation is on a different day to the surgery appointment -->
	<?php if ($field_consultation_before_surger == 'No' && !empty(strtotime($field_surgery_appointment_date))):?>
  <tr>
    <td width=20% align="center">
      <?php if($field_transfer_surgery_appoint == 'Client') { ?>
      <?php print date('l, jS F', $wrapper->field_surgery_appointment_date->value());?><br>Time TBA
      <?php } else { ?>
      <?php print date('l, jS F',strtotime("+1 hour", $wrapper->field_surgery_appoint_tran_time->value()));?><br>
      <?php print date('g:ia',strtotime("+1 hour", $wrapper->field_surgery_appoint_tran_time->value()));?>
      <?php } ?>
		</td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">CONSULTATION & PRE-OPERATIVE TESTS</div>
			<div class="normaltxt">Meet the surgeon and have any required pre-operative tests, X-Rays etc</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt"><?php print $field_mm_surgeon;?><br><?php print $field_other_surgeon; ?></div>
	  </td>
  </tr>
  
  <?php if($field_mm_surgeon2 || $field_other_surgeon2): ?>
  <tr>
    <td width=20% align="center">
      <?php if($field_transfer_surgery_appoint == 'Client') { ?>
      <?php print date('l, jS F', $wrapper->field_surgery_appointment_date->value());?><br>Time TBA
      <?php } else { ?>
      <?php 
      if ($field_surgery_appointment_date2) {
         print date('l, jS F',$wrapper->field_surgery_appointment_date2->value());
         print '<br>';
         print  date('g:ia', $wrapper->field_surgery_appointment_date2->value());
      }
      else  {
        print date('l, jS F',strtotime("+1 hour", $wrapper->field_surgery_appoint_tran_time->value()));
        print '<br>';
        print  date('g:ia',strtotime("+1 hour", $wrapper->field_surgery_appoint_tran_time->value()));
      }
      ?>
     <?php } ?>
		</td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">CONSULTATION & PRE-OPERATIVE TESTS</div>
			<div class="normaltxt">Meet the surgeon and have any required pre-operative tests, X-Rays etc</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt"><?php print $field_mm_surgeon2;?><br><?php print $field_other_surgeon2; ?></div>
	  </td>
  </tr>
  <?php endif; ?>
  
  <?php endif; ?>
  
  <?php if (!empty($field_surgery_appointment_date)):?>
  <tr>
    <td width=20% align="center">
      <?php print date('l, jS F',$wrapper->field_surgery_appointment_date->value());?><br>Time TBA
    </td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">SURGERY</div>
			<div class="normaltxt">As discussed and agreed with the surgeon <br>You are having an out-patient procedure and will not be hospitalised overnight. </div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">
				<?php 
				  //$surgeon_names = array_filter($surgeon_names);
				  //print $surgeon_names = implode(', <br>', $surgeon_names);
				?> 
        <?php print $field_mm_surgeon;?><br><?php print $field_other_surgeon; ?>
			</div>
	  </td>
  </tr>
  <?php endif; ?>
  
  <!--Use this if we are providing hospital transfers -->
	<?php if (in_array($field_transfer_surgery_appoint, array('Stunning Makeovers Limited','Hospital'))): ?>
  <tr>
    <td width=20% align="center"><?php print date('l, jS F',$wrapper->field_surgery_appointment_date->value());?><br>Time TBA</td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">RETURN TO HOTEL</div>
			
			<?php if ($field_transfer_surgery_appoint == 'Hospital'):?>
			<div class="normaltxt">
				Your transfer back to your hotel will be arranged by the International Patient Coordinator
following confirmation of your discharge time.You will be advised of your post-operative follow up appointment time and day.
      </div>
      <?php endif; ?>
      
      <?php if ($field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
			<div class="normaltxt">
				Please ask the International Patient Coordinator to call the driver to arrange your transfer following confirmation of your discharge time.
      </div>
      <?php endif; ?>
      
      <div class="normaltxt">
				<b>Please ensure you understand how to contact the hospital should you need assistance or advice before your post operative consultation.</b>
			</div>
      
      <div class="normaltxt">
				<b>Please follow the surgeon's advice on post-operative care. Should you have any concerns during your recovery period please contact the hospital coordinator or call the hospital immediately.</b>
		 </div>
     
     <div class="normaltxt">
      <b>You must return to the hospital at the request of the surgeon for follow up or additional treatment/dressing changes.</b>
     </div>
      
      <div class="normaltxt"><b>Failure to do so may result in complications.</b></div>
		</td>
    <td width=20% align="center">
			<?php if ($field_hospital == 67 && $field_transfer_surgery_appoint == 'Hospital'):?>
        <div class="normaltxt">International Patient Coordinator 24/7 Hotline <br>Ph: +66-8-5223-8888</div>
			<?php endif; ?>
      
      <?php if ($field_hospital == 67 && $field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
        <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			<?php endif; ?>
      
			<?php if ($field_hospital == 66 && $field_transfer_surgery_appoint == 'Hospital'):?>
      <div class="normaltxt">Dan or his staff <br>Ph: +66 83 2576 555</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 66 && $field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
      <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			<?php endif; ?>

			<?php if ($field_hospital == 731 && $field_transfer_surgery_appoint == 'Hospital'):?> 
      <div class="normaltxt">Phuket International Aesthetic Centre <br>Ph: +66 (0) 7624 9400</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 731 && $field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?> 
      <div class="normaltxt">Deevana Resort and Spa<br>Ph: +66 76 341414</div>
			<?php endif; ?>

			<?php if ($field_hospital == 721 && $field_transfer_surgery_appoint == 'Hospital'):?>
      <div class="normaltxt">Bangpakok9 International Hospital<br>Ph: +66 90-198-7726</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 721 && $field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
      <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			<?php endif; ?>
	  </td>
  </tr>
	<?php endif; ?>
	
	
  <!--Use this if client is providing hospital transfers -->
	<?php if ($field_transfer_surgery_appoint == 'Client'):?>
  <tr>
    <td width=20% align="center"><?php print date('l, jS F',$wrapper->field_surgery_appointment_date->value());?><br>Time TBA</td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">RETURN TO HOTEL</div>
			<div class="normaltxt">You will be advised of your post-operative follow up appointment time and day.</div>
			<div class="normaltxt">Please ensure you understand how to contact the hospital should you need assistance or advice before your post operative consultation.</div>
			<div class="normaltxt">Please follow the surgeon's advice on post-operative care. Should you have any concerns during your recovery period please contact the hospital coordinator or call the hospital immediately.</div>
			<div class="normaltxt">You must return to the hospital at the request of the surgeon for follow up or additional treatment/dressing changes.</b></div>
			<div class="normaltxt">Failure to do so may result in complications.</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Own arrangements</div>
	  </td>
  </tr>
 <?php endif; ?>
 
 
 <!--Use this if client is providing hospital transfers -->
	<?php if ($field_transfer_surgery_appoint == 'Hotel'):?>
  <tr>
    <td width=20% align="center"><?php print date('l, jS F',$wrapper->field_surgery_appointment_date->value());?><br>Time TBA</td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">RETURN TO HOTEL</div>
			<div class="normaltxt">Following your surgery please ask the International Coordinator to  call the hotel for your transfer back to your hotel.</div>
			<div class="normaltxt">You will be advised of your follow up appointment date and time. Please let the driver know so that your transfer can be scheduled.</div>
			<div class="normaltxt"><b>Please ensure you understand how to contact the hospital should you need assistance or advice before your post operative consultation.</b></div>
			<div class="normaltxt"><b>Please follow the surgeon’s advice on post-operative care. Should you have any concerns during your recovery period please contact the hospital coordinator or call the hospital immediately.</b></div>
			<div class="normaltxt"><b>You must return to the hospital at the request of the surgeon for follow up or additional treatment/dressing changes.</b></div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Deevana Resort and Spa +66 76 341414 or 341415 or 341705</div>
	  </td>
  </tr>
 <?php endif; ?>
  
 <?php if (!empty($field_dental_date) && $wrapper->field_dental_date->value() > $wrapper->field_surgery_appointment_date->value()):?>
	<!--If client having dental treatment & we are doing transfers to clinic-->
	<?php if (!empty($field_dental_practice_options) && in_array($field_transfer_dental_appoint, array('Stunning Makeovers Limited','Hospital'))): ?>
	<tr>
    <td width=20% align="center">
			<?php print date('l, jS F', $wrapper->field_dental_appoint_transf_time->value()); ?><br>
			<?php print date('g:ia', $wrapper->field_dental_appoint_transf_time->value()); ?>
		</td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">TRANSFER FOR DENTAL APPOINTMENT</div>
			<div class="normaltxt"><b><?php print $field_dental_practice_options;?></b></div>
			<div class="normaltxt"><?php print nl2br($field_dental_practice_address);?></div>
			<div class="normaltxt">Please meet the driver in the Hotel lobby for your complimentary one-way transfer to the practice for your first visit.</div>
		</td>
    <td width=20% align="center">
			
			<?php if($field_transfer_dental_appoint == 'Hospital'): ?>
			  <div class="normaltxt"><?php print $field_dental_practice_options;?><br><?php print $field_dental_practice_phone;?></div>
			<?php endif;?>
			
			<?php if($field_transfer_dental_appoint == 'Stunning Makeovers Limited'): ?>
			  
			  <?php if($field_hospital == 67 || $field_hospital == 66 || $field_hospital == 721): ?>
			    <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			  <?php endif;?>
			  
			  <?php if($field_hospital == 731): ?>
			    <div class="normaltxt">Deevana Resort and Spa<br>Ph: +66 76 341414</div>
			  <?php endif;?>
			
			<?php endif;?>
	  </td>
  </tr>
	<?php endif;?>
	
	<!--If client having dental treatment & doing own transfers to clinic or no transfer is provided-->
	<?php if (!empty($field_dental_practice_options) && ($field_transfer_dental_appoint == 'Client' || empty($field_transfer_dental_appoint))): ?>
	<tr>
    <td width=20% align="center">
       <?php print date('l, jS F',$wrapper->field_dental_date->value()); ?><br>
       <?php print date('g:ia', $wrapper->field_dental_date->value()); ?>
    </td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">DENTAL APPOINTMENT</div>
			<div class="normaltxt"><b><?php print $field_dental_practice_options;?></b></div>
			<div class="normaltxt"><?php print nl2br($field_dental_practice_address);?></div>
			<div class="normaltxt">Please arrive at the practice at least 10 minutes prior to your appointment at <?php print $field_dental_practice_options;?></div>
			<div class="bluetxt">NOTE: Your Appointment is at <?php print date('g:ia', $wrapper->field_dental_date->value()); ?></div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Own Arrangements</div>
	  </td>
  </tr>
	<?php endif;?>
  
  <!--If client having dental treatment -->
	<?php if (!empty($field_dental_practice_options)): ?>
	<tr>
    <td width=20% align="center"></td>
    <td width=60% align="center">
			<div class="normaltxt">Should you require subsequent visits to the dental practice, the staff will coordinate and advise you of the time/date</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt"></div>
	  </td>
  </tr>
	<?php endif;?>
	<?php endif;?>
	
	<!--If we are providing hospital transfers-->
	<?php if (in_array($field_transfer_surgery_appoint, array('Stunning Makeovers Limited','Hospital'))):?>
	<tr>
    <td width=20% align="center">Date & Time TBA</td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">TRANSFER FOR POST-OPERATIVE CONSULTATION</div>
			<div class="normaltxt">Please meet the driver at the hotel lobby for your return transport to the hospital for your post-operative consultation with your surgeon.</div>
			<div class="normaltxt">Your transfer back to your hotel will be arranged by the International Patient Coordinator following your post operative consultation.</div>
		</td>
    <td width=20% align="center">
			<?php if ($field_hospital == 67 && $field_transfer_surgery_appoint == 'Hospital'):?>
        <div class="normaltxt">International Patient Coordinator 24/7 Hotline <br>Ph: +66-8-5223-8888</div>
			<?php endif; ?>
      
      <?php if ($field_hospital == 67 && $field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
        <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 66 && $field_transfer_surgery_appoint == 'Hospital'):?>
      <div class="normaltxt">Dan or his staff <br>Ph: +66 83 2576 555</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 66 && $field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
      <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			<?php endif; ?>

			<?php if ($field_hospital == 731 && $field_transfer_surgery_appoint == 'Hospital'):?>
      <div class="normaltxt">Phuket International Aesthetic Centre <br>Ph: +66 (0) 7624 9400</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 731 && $field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
      <div class="normaltxt">Deevana Resort and Spa<br>Ph: +66 76 341414</div>
			<?php endif; ?>

			<?php if ($field_hospital == 721 && $field_transfer_surgery_appoint == 'Hospital'):?>
      <div class="normaltxt"> Bangpakok9 International Hospital Tel: +66 90-198-7726</div>
			<?php endif; ?>
			
			<?php if ($field_hospital == 721 && $field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
      <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
			<?php endif; ?>
	  </td>
  </tr>
	<?php endif;?>
	
	<!--If we are not providing hospital transfers-->
	<?php if ($field_transfer_surgery_appoint == 'Client'):?>
	<tr>
    <td width=20% align="center">Date & TBA</td>
    <td width=60% align="center" class="paddingtop">
			<div class="orangetxt">POST-OPERATIVE CONSULTATION</div>
			<div class="normaltxt"><span class="redtxt"><b>Please arrive at the hospital 10 minutes before</b></span> your post-operative consultation with the surgeon. Your appointment time was provided when you were discharged from the hospital</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Own arrangements</div>
	  </td>
  </tr>
	<?php endif;?>
	
	
	<!--If client doing a tour. If more than one, copy and create another row-->
	
	<?php 
	$temple_tour = false;
  if (!empty($wrapper->field_tour)):
		foreach ($wrapper->field_tour as $tour): 
		  $tour_name = $tour->field_tour_name->value();
		  if (strpos($tour_name, 'Temple') !== false || strpos($tour_name, 'Grand') !== false) {
				$temple_tour = true;
			}
		  if ($tour->field_tour_name->value() == 'Chaophraya River Dinner Cruise') {
		?>
	
	<tr>
			<td width=20% align="center">
			  <?php print date('l, jS F', $tour->field_tour_date_time->value());?><br>
			 <?php print date('g:ia', $tour->field_tour_date_time->value());?>
			</td>
			<td width=60% align="center">
				<div class="orangetxt cap"><?php print $tour->field_tour_name->value();?></div>
				<div class="normaltxt">Please meet representative from Chaophraya Cruises at hotel lobby for your complimentary transfer by coach to the River City Pier for the Dinner Cruise.</div>
			</td>
			<td width=20% align="center">Chaophraya Cruises<br>Ph: +662-541-5599</td>
  </tr>
  
  <tr>
			<td width=20% align="center">6:45pm</td>
			<td width=60% align="center">
				<div class="normaltxt">Check in at River City Pier</div>
			</td>
			<td width=20% align="center"></td>
  </tr>
  
  <tr>
			<td width=20% align="center">7:00pm</td>
			<td width=60% align="center">
			  <div class="normaltxt">Welcome on board by crew in typical Thai culture</div>
			</td>
			<td width=20% align="center"></td>
  </tr>
  
  <tr>
			<td width=20% align="center">7:30pm</td>
			<td width=60% align="center">
			 <div class="normaltxt">Cruise departs River City Pier.  
Sit back and listen to Live Music while delicious Thai & International Buffet is served</div>
			</td>
			<td width=20% align="center"></td>
	</tr>
  
  <tr>
			<td width=20% align="center">8:30pm</td>
			<td width=60% align="center">
			 <div class="normaltxt">Sight-seeing along Chaophraya river bank</div>
			</td>
			<td width=20% align="center"></td>
	</tr>
  
  <tr>
			<td width=20% align="center">9.00pm</td>
			<td width=60% align="center">
			 <div class="normaltxt">Cruise returns to River City Pier</div>
			</td>
			<td width=20% align="center"></td>
	</tr>
  
  <tr>
			<td width=20% align="center"><?php print $tour->field_arrive_back_at_hotel->value();?></td>
			<td width=60% align="center">
			 <div class="orangetxt">RETURN TO HOTEL</div>
			 <div class="normaltxt">Please meet representative from Chaophraya Cruises for your complimentary transfer by coach to the hotel</div>
			</td>
			<td width=20% align="center"></td>
	</tr>
   
   <?php } else { ?>
	  <tr>
			<td width=20% align="center">
				<?php print date('l, jS F',$tour->field_tour_date_time->value()); ?> <br> 
				<?php print date('g:ia',$tour->field_tour_date_time->value()); ?> <br>
			<td width=60% align="center" class="paddingtop">
				<div class="orangetxt cap"><b><?php print $tour->field_tour_name->value();?></div>
				<div class="normaltxt">Please meet representative from the tour company for your seat-in-coach tour.<br> Please take money, water, a hat, sunglasses and sunscreen</div>  
				<div class="normaltxt">	 
					 <b>Duration:</b> <?php print $tour->field_tour_duration_estimated->value();?><br> 
					 <b>Pick Up Location:</b> <?php print $tour->field_pick_up_location->value();?><br>
				</div>
			</td>
			<td width=20% align="center">Please contact Mr T at least 24 hours in advance if you wish to reschedule this tour <br>Ph: +66 81 8445243</td>
		</tr>
	 
	 <?php } ?>
  <?php endforeach; ?>
  <?php endif; ?>
  
  <?php
    $field_transfers_pickup_date = $wrapper->field_departure_flight_details->field_transfers_pickup_date->value();
	  $field_airport_transfer = $wrapper->field_departure_flight_details->field_airport_transfer->value();
  ?>
  
	<!--Use this if we are providing the accommodation and transfer to the airport is after 11.00am-->
	
	<?php 
  $chktime = ($field_hotel_name == 93) ? 10 : 11;
  if ($field_accommodation_arranged == 'Accommodation Arranged by Stunning Makeovers Limited' && (date('H', $field_transfers_pickup_date) > $chktime) ):?>
			<tr>
			<td width=20% align="center">
			  <?php print date('l, jS F', $field_transfers_pickup_date); ?><br>
				<?php print $chktime; ?>.00am
			</td>
			<td width=60% align="center" class="paddingtop">
				<div class="orangetxt"><b>LATE CHECK-OUT & KEY REACTIVATION</b></div>
				<div class="normaltxt">Hotel normal check out time is <?php print $chktime; ?>.00am. As a valued Stunning Makeovers client you may enjoy a late check out up to 3.00pm <span class="bluetxt">subject to availability.</span></div>
				 <div class="normaltxt">Please contact reception and have your key reactivated for late check out.</div>
			</td>
			<td width=20% align="center"></td>
		</tr>
    <tr>
			<td width=20% align="center">
			  <?php print date('l, jS F',$field_transfers_pickup_date); ?><br>
			  <?php print $chktime; ?>.00am <div class="bluetxt"> or as agreed by the hotel </div>
			</td>
			<td width=60% align="center" class="paddingtop">
				<div class="orangetxt"><b>HOTEL CHECK OUT</b></div>
				<div class="normaltxt">Please settle any costs such as telephone calls, room service or additional nights stayed.</div>
			</td>
			<td width=20% align="center"></td>
		</tr>
  <?php endif; ?>
  
  <!--Use this if we are providing the accommodation-->
	<?php 
  if ($field_accommodation_arranged == 'Accommodation Arranged by Stunning Makeovers Limited' && (date('H', $field_transfers_pickup_date) < $chktime)):?>
			<tr>
			<td width=20% align="center">
			  <?php print date('l, jS F',$field_transfers_pickup_date); ?><br>
			  <?php print date('g:ia',strtotime("-10 minutes",$field_transfers_pickup_date)); ?>
			</td>
			<td width=60% align="center" class="paddingtop">
				<div class="orangetxt"><b>HOTEL CHECK OUT</b></div>
				<div class="normaltxt">Please settle any costs such as telephone calls, room service or additional nights stayed.</div>
			</td>
			<td width=20% align="center"></td>
		</tr>
  <?php endif; ?>
  
  <!--Use this if we are providing transfers but NOT the flights-->
  <?php
  
  //Flight
  $arrival_date = $wrapper->field_departure_flight_details->field_departure_date->value();
  //$arrival_date = $wrapper->field_departure_flight_details->field_flight_arrives_destination->value();
	$flight_number = $wrapper->field_departure_flight_details->field_departure_flight_number->value();
	$flight_from = $wrapper->field_departure_flight_details->field_departure_from->value();
	$flight_to = $wrapper->field_departure_flight_details->field_departure_to->value();
	$airport = $wrapper->field_departure_flight_details->field_departure_airport->value();
	$field_flight_arranged_by = $wrapper->field_departure_flight_details->field_flight_arranged_by->value();
	$field_transfers_pickup_date = $wrapper->field_departure_flight_details->field_transfers_pickup_date->value();
	$field_airport_transfer = $wrapper->field_departure_flight_details->field_airport_transfer->value();
	
  if ($field_airport_transfer == 'Hospital' && $field_flight_arranged_by != 'Hospital'):?>
			<tr>
			<td width=20% align="center">
        <?php print date('l, jS F', $field_transfers_pickup_date); ?><br>
        <?php print date('g:ia',$field_transfers_pickup_date); ?> 
      </td>
      <?php if($field_flight_arranged_by == 'Stunning Makeovers Limited') { ?>
      
      <td width=60% align="center" class="paddingtop">
				<div class="orangetxt"><b>TRANSFER TO THE AIRPORT</b></div>
				<div class="orangetxt cap"><b>Flight <?php print $flight_number; ?> <?php print $flight_from; ?> to <?php print $flight_to; ?> departs at <?php print date('g:ia', $arrival_date);?></b></div>
        <div class="bluetxt"><b>Recommended check-in at the airport for International flights is three hours prior to departure.</b></div>
        <div class="normaltxt">Please meet the driver in the hotel lobby for your pre-paid transport to the airport.</div>
      </td>
      
      <?php } else { ?>  
			
        <?php if($field_hospital == 731) { ?>
         <td width=60% align="center" class="paddingtop">
          <div class="orangetxt"><b>TRANSFER TO THE AIRPORT</b></div>
          <div class="normaltxt">You have advised us that your flight departs at <?php print date('g:ia', $arrival_date);?></div>
          <div class="bluetxt">Please check the flight time and advise the ground services team if you would like to change your transfer time to the airport.<br>Please meet the driver in the hotel lobby for your pre-paid transport to the airport.</div>
         </td>
       
       <?php } else { ?>
        
        <td width=60% align="center" class="paddingtop">
          <div class="orangetxt"><b>TRANSFER TO THE AIRPORT</b></div>
          <div class="normaltxt">You have advised us that your flight <?php print $flight_number; ?> <?php print $flight_from; ?> to <?php print $flight_to; ?> departs at <?php print date('g:ia', $arrival_date);?></div>
          <div class="normaltxt">Please meet the driver in the hotel lobby for your pre-paid transport to the airport</div>
        </td>
        
        <?php } ?>
      
      <?php } ?>
			
      <td width=20% align="center">
        <?php if ($field_hospital == 67 && $field_airport_transfer == 'Hospital'):?>
          <div class="normaltxt">International Patient Coordinator 24/7 Hotline <br>Ph: +66-8-5223-8888</div>
        <?php endif; ?>
        
        <?php if ($field_hospital == 67 && $field_airport_transfer == 'Stunning Makeovers Limited'):?>
          <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
        <?php endif; ?>
        
        <?php if ($field_hospital == 66 && $field_airport_transfer == 'Hospital'):?>
        <div class="normaltxt">Dan or his staff <br>Ph: +66 83 2576 555</div>
        <?php endif; ?>
        
        <?php if ($field_hospital == 66 && $field_airport_transfer == 'Stunning Makeovers Limited'):?>
        <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
        <?php endif; ?>

        <?php if ($field_hospital == 731 && $field_airport_transfer == 'Hospital'):?>
        <div class="normaltxt">Phuket International Aesthetic Centre <br>Ph: +66 (0) 7624 9400</div>
        <?php endif; ?>
        
        <?php if ($field_hospital == 731 && $field_airport_transfer == 'Stunning Makeovers Limited'):?>
        <div class="normaltxt">Deevana Resort and Spa<br>Ph: +66 76 341414</div>
        <?php endif; ?>

        <?php if ($field_hospital == 721 && $field_airport_transfer == 'Hospital'):?>
        <div class="normaltxt"> Bangpakok9 International Hospital <br>Ph: +66 90-198-7726</div>
        <?php endif; ?>
        
        <?php if ($field_hospital == 721 && $field_airport_transfer == 'Stunning Makeovers Limited'):?>
        <div class="normaltxt">Mr T or his staff <br>Ph: +66 81 8445243</div>
        <?php endif; ?>
      </td>
		</tr>
    <?php if($field_flight_arranged_by == 'Stunning Makeovers Limited') { 
        $time = ($field_hospital == 731) ? "+30 minutes" : "+1 hour"; 
      ?>
    
      <tr>
			<td width=20% align="center">
			  <?php print date('l, jS F', strtotime($time, $field_transfers_pickup_date)); ?><br>
			  <?php print date('g:ia', strtotime($time, $field_transfers_pickup_date)); ?>
			</td>
			<td width=60% align="center" class="paddingtop">
				<div class="orangetxt" style="text-transform: uppercase;"><b>ARRIVE <?php print $airport; ?></b></div>
        <div class="orangetxt cap"><b>Flight <?php print $flight_number; ?> <?php print $flight_from; ?> to <?php print $flight_to; ?> departs at <?php print date('g:ia', $arrival_date);?></b></div>
        <div class="bluetxt"><b>Recommended check-in at the airport for International flights is three hours prior to departure.</b></div>
				<div class="normaltxt">Please have a pleasant flight</div>
		  </td>
			<td width=20% align="center">Please refer to the E-ticket for full details of your flight arrangements.</td>
		</tr>
    
    <?php } else { 
      $time = ($field_hospital == 731) ? "+30 minutes" : "+1 hour"; 
    ?>
    
    <tr>
			<td width=20% align="center">
			  <?php print date('l, jS F', strtotime($time, $field_transfers_pickup_date)); ?><br>
			  <?php print date('g:ia', strtotime($time, $field_transfers_pickup_date)); ?>
			</td>
			<td width=60% align="center" class="paddingtop">
				<div class="orangetxt" style="text-transform: uppercase;"><b>ARRIVE <?php print $airport; ?></b></div>
				<div class="normaltxt">Please have a pleasant flight</div>
		  </td>
			<td width=20% align="center"></td>
		</tr>
    
    <?php } ?>
    
  <?php endif; ?>
  
  
  <?php if ($field_airport_transfer == 'Stunning Makeovers Limited' && $field_flight_arranged_by != 'Stunning Makeovers Limited'):?>
			<tr>
			<td width=20% align="center">
        <?php print date('l, jS F', $field_transfers_pickup_date); ?><br>
        <?php print date('g:ia',$field_transfers_pickup_date); ?> 
      </td>
			<td width=60% align="center" class="paddingtop">
				<div class="orangetxt"><b>TRANSFER TO THE AIRPORT</b></div>
				<div class="normaltxt">You have advised us that your flight <?php print $flight_number; ?> <?php print $flight_from; ?> to <?php print $flight_to; ?> departs at <?php print date('g:ia', $arrival_date);?></div>
				<div class="bluetxt">Please advise Mr T of any changes to your flight departure time and whether you wish to reschedule your transfer to the airport.</div>
			  <div class="normaltxt">Please meet the driver in the hotel lobby for your pre-paid transport to the airport.</div>
			</td>
			<td width=20% align="center">Mr T or his staff <br>Ph: +66 81 8445243</td>
		</tr>
    
    <tr>
			<td width=20% align="center">
			  <?php print date('l, jS F', strtotime('+1 hour', $field_transfers_pickup_date)); ?><br>
			  <?php print date('g:ia', strtotime('+1 hour', $field_transfers_pickup_date)); ?>
			</td>
			<td width=60% align="center">
				<div class="orangetxt" style="text-transform: uppercase;"><b>ARRIVE <?php print $airport; ?></b></div>
				<div class="normaltxt">Please have a pleasant flight</div>
		  </td>
			<td width=20% align="center"></td>
		</tr>
    
  <?php endif; ?>
  
  <!--Use this if we are providing transfers AND providing the flights-->
  <?php 
  if ($field_airport_transfer == 'Stunning Makeovers Limited' && $field_flight_arranged_by == 'Stunning Makeovers Limited'):?>
			<tr>
			<td width=20% align="center">
			  <?php print date('l, jS F', $field_transfers_pickup_date); ?><br>
				<?php print date('g:ia', $field_transfers_pickup_date); ?>
			</td>
			<td width=60% align="center" class="paddingtop">
				
				<div class="orangetxt"><b>TRANSFER TO THE AIRPORT</b></div>
				
				<div class="orangetxt cap"><b>Flight <?php print $flight_number; ?> <?php print $flight_from; ?> to <?php print $flight_to; ?> departs at <?php print date('g:ia', $arrival_date);?></b></div>
				
				<div class="bluetxt"><b>Recommended check-in at the airport for International flights is three hours prior to departure.</b></div>
			  <div class="normaltxt">Please check with the airline for any changes in the departure time of the flight and advise Mr T if you wish to reschedule your transfer to the airport.</div>
			  <div class="normaltxt">Please meet the driver in the hotel lobby for your pre-paid transport to the airport</div>
			</td>
			<td width=20% align="center">Mr T or his staff <br>Ph: +66 81 8445243</td>
		</tr>
    
    <tr>
			<td width=20% align="center">
			   <?php print date('l, jS F', strtotime('+1 hour', $field_transfers_pickup_date)); ?><br>
			  <?php print date('g:ia', strtotime('+1 hour', $field_transfers_pickup_date)); ?>
			</td>
			<td width=60% align="center" class="paddingtop">
				<div class="orangetxt" style="text-transform: uppercase;"><b>ARRIVE <?php print $airport; ?></b></div>
        <!--<div class="orangetxt cap"><b>Flight <?php //print $flight_number; ?> <?php //print $flight_from; ?> to <?php //print $flight_to; ?> departs at <?php print date('g:ia', $arrival_date);?></b></div>
        <div class="bluetxt"><b>Recommended check-in at the airport for International flights is three hours prior to departure.</b></div>-->
				<div class="normaltxt">Please have a pleasant flight</div>
		  </td>
			<td width=20% align="center"><div class="bluetxt">Please refer to the attached E-ticket for full details of your flight arrangements.</div></td>
		</tr>
  
  <?php endif; ?>
  
  <!--Use this if we are not providing transfers AND providing the flights-->
  <?php 
  if ($field_airport_transfer == 'Client'):?>
			<tr>
			<td width=20% align="center"><?php print date('l, jS F', $wrapper->field_check_out_date->value()); ?></td>
			<td width=60% align="center" class="paddingtop">
				<div class="orangetxt"><b>TRANSFER TO THE AIRPORT</b></div>
				<div class="normaltxt">You have arranged transfer to the airport Please have a pleasant flight</div>
			</td>
			<td width=20% align="center">
			  <div class="normaltxt"> Own arrangements</div>
			</td>
		</tr>
  <?php endif; ?>
  
  <!--Use this if Hotel is providing transfers-->
  <?php 
  if ($field_airport_transfer == 'Hotel'):?>
			<tr>
			<td width=20% align="center"><?php print date('l, jS F', $wrapper->field_check_out_date->value()); ?></td>
			<td width=60% align="center" class="paddingtop">
				<div class="orangetxt"><b>TRANSFER TO THE AIRPORT</b></div>
				<div class="normaltxt">You have advised us that your flight departs at <?php print date('g:ia', $arrival_date);?> Please check and advise the hotel of any changes for your return trip to the airport</div>
				<div>Please meet the driver in the hotel lobby for your pre-paid transport to the airport</div>
			</td>
			<td width=20% align="center">
			  <div class="normaltxt"> Deevana Resort and Spa +66 76 341414 or 341415 or 341705 </div>
			</td>
		</tr>
  <?php endif; ?>
  
   <?php if (!empty($temple_tour) && sizeof($wrapper->field_tour) > 0): ?>
		  <tr>
				<td width=100% colspan=3 style="padding:10px;line-height:18px;">A strict dress code applies for Grand Palace and Temple tours. They are Thailand's most sacred sites. Visitors must be properly dressed before being allowed entry to the temple. Men must wear long pants and shirts with sleeves (no tank tops. If you're wearing sandals or flip-flops you must wear socks (in other words, no bare feet.) Women must be similarly modestly dressed. No see-through clothes, bare shoulders, etc. If you show up at the front gate improperly dressed, there is a booth near the entrance that can provide clothes to cover you up properly (a deposit is required).</td>
			</tr>
		<?php endif; ?>
		
		<tr>
			<td width=100% colspan=3 style="padding:10px;"><b>Notes:</b><br>
			  <div class="normaltxt"><center><b>DEBIT CARDS and TRAVEL CARDS</b> - are not accepted by the hospital or dental practice</center></div>
        <div class="normaltxt">Payment may be made using cash and internationally-recognised credit cards at the time of registration before surgery.
        </div>
        
        <div class="normaltxt"><b>CASH</b> - Thai Baht is accepted.  Bills must be new, crisp, and free of wrinkles, tears, smudges, and ink-marks.
        </div>
        
        <div class="normaltxt"><b>CREDIT CARD</b> - Please inform your bank ahead of time that you will be charging a large amount overseas.
        </div>
        
        <div class="normaltxt" style="margin-top:10px;"><center>
					<?php 
					$field_clients_preferred_name_arr = explode(' ', $field_clients_preferred_name);
					if ($field_clients_preferred_name_arr > 0) {
					  print $field_clients_preferred_name_arr[0];
				  }
					?>, thank you for choosing 
					<span class="orangetxt">Stunning Makeovers.</span></center>
          <div class="normaltxt"><center>We hope you enjoy your experience and look forward to your feedback upon your return.</center></div>
          <div class="normaltxt"><center>Please remember that you can contact us by text or phone +64-21-983-225 (Paul) while you are in Thailand.</center></div>
       </div>
        
        
			</td>
		</tr>
  </table>
</body>
</html>
