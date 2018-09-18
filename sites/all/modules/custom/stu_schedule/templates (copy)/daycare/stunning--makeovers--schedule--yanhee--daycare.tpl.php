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
	
	$guestname = $field_custom_title .''. ($node->title) ? $node->title : $field_clients_preferred_name;
	$variables['!client_name'] = $guestname;
	
	//Accommodation Arranged by Client
	$field_client_hotel_name = $values[field_client_hotel_name][LANGUAGE_NONE][0][value];
	$field_client_hotel_address = $values[field_client_hotel_address][LANGUAGE_NONE][0][tid];
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
	$field_check_in_date = $values[field_check_in_date][LANGUAGE_NONE][0][value];
	$field_check_out_date = $values[field_check_out_date][LANGUAGE_NONE][0][value];
	$field_no_nights = $values[field_no_nights][LANGUAGE_NONE][0][value];
	$field_qualify_for_upgrade = $values[field_qualify_for_upgrade][LANGUAGE_NONE][0][value];
	$field_upgrade_room_type = $values[field_upgrade_room_type][LANGUAGE_NONE][0][value];
	$field_bedding = $values[field_bedding][LANGUAGE_NONE][0][value];
	$field_rollaway_bed_required = $values[field_rollaway_bed_required][LANGUAGE_NONE][0][value];
	$field_share_hotel_room = $values[field_share_hotel_room][LANGUAGE_NONE][0][value];
	
	$field_primary_guest = $values[field_primary_guest][LANGUAGE_NONE][0][value];
	$field_guest_2 = $values[field_guest_2][LANGUAGE_NONE][0][value];
	$field_guest_3 = $values[field_guest_3][LANGUAGE_NONE][0][value];
	$field_guest_4 = $values[field_guest_4][LANGUAGE_NONE][0][value];
	$field_cost_per_night_thb = $values[field_cost_per_night_thb][LANGUAGE_NONE][0][value];
	$field_cost_for_rollaway_bed = $values[field_cost_for_rollaway_bed][LANGUAGE_NONE][0][value];
	$field_total_cost = $values[field_total_cost][LANGUAGE_NONE][0][value];
	$field_hotel_providing_airport = $values[field_hotel_providing_airport][LANGUAGE_NONE][0][value];
	$field_hotel_booking_confirmation = $values[field_hotel_booking_confirmation][LANGUAGE_NONE][0][value];
	$field_own_accom_details = $values[field_own_accom_details][LANGUAGE_NONE][0][value];
	$field_vip_benefits = ($values[field_vip_benefits][LANGUAGE_NONE][0][value] == 'Yes') ? 1 : 0;
	
  //Hospital
	$field_hospital = $values[field_hospital][LANGUAGE_NONE][0][nid];
	
	if ($field_hospital == 731) { //Phuket Plastic Surgery Institute 
	  $field_hospitalname = 'Phuket International Hospital';
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
	}
  $coordinator = $values[field_mm_coordinator][LANGUAGE_NONE][0][value];
	$field_surgery_appointment_date = $values[field_surgery_appointment_date][LANGUAGE_NONE][0][value];
	$field_transfer_surgery_appoint = $values[field_transfer_surgery_appoint][LANGUAGE_NONE][0][value];
	$field_surgery_appoint_tran_time = $values[field_surgery_appoint_tran_time][LANGUAGE_NONE][0][value];
	$field_surgery_appointment = $values[field_surgery_appointment][LANGUAGE_NONE][0][value];
  
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
		$field_dental_practice_address = variable_get('bangkoksmilenanasukhumvit_address','');
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
	
	
	//Transfers
	if ($wrapper->field_transfers_iterations[0]->field_transfers_details->value() == 'Airport to Hotel') {
	  //Airport to Hotel Date (Important Date/Time)
	  $field_transfers_pickup_date = $wrapper->field_transfers_iterations[0]->field_transfers_pickup_date->value();
	  //Airport Transfers   
    $field_airport_transfer = $wrapper->field_transfers_iterations[0]->field_airport_transfer->value();
	}
	
  //Flight
  $arrival_date = $wrapper->field_arrival_flight_details->field_flight_date->value();
	$flight_number = $wrapper->field_arrival_flight_details->field_flight_number->value();
	$flight_from = $wrapper->field_arrival_flight_details->field_flight_from->value();
	$flight_to = $wrapper->field_arrival_flight_details->field_flight_to->value();
	$airport = $wrapper->field_arrival_flight_details->field_airport->value();
	$field_flight_arranged_by = $wrapper->field_arrival_flight_details->field_flight_arranged_by->value();
	
  if (strpos($airport, 'Bangkok') !== false) {
	  $destination = 'Bangkok';
	}
	if (strpos($airport, 'Phuket') !== false) {
	  $destination = 'Phuket';
	}
  
  //Tour
  $tour_duration = _get_tour_duration();
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
		  border-collapse: collapse;
		  font-family: sans-serif;
		  font-size:12px;
		  line-height:20px;
		  page-break-inside:auto
		}
    table tr td {border: 1px solid #000000;}
    table.toptable tr td {border: none;}
    table tr .normaltxt {color:#000000;}
    table tr .orangetxt {color:#ff7300; font-weight:bold;}
    table tr .bluetxt {color:#0051a3;}
    table tr .redtxt {color:#bf0b11;font-weight:bold;}
    table, tr, td, th, tbody, thead {
      page-break-inside: auto;
    }
    @page { margin-bottom: 20px; }
    
    
  </style>
  <body>

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
		      <td width=50%>Arrival Date: <?php print date('l jS M', $arrival_date); ?></td>
				  <td width=50%>Destination: <?php print $destination; ?></td>
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
			<td width=20% align="center"><?php print date('l jS M h:ia', $arrival_date); ?></td>
			<td width=60% align="center">
				<div class="orangetxt"><b>FLIGHT <?php print $flight_number;?> From <?php print $flight_from;?> To <?php print $flight_to;?></b>
				 </div>
				 <div class="bluetxt"><b>Recommended check-in at the airport for International flights is three hours prior to departure.</b></div>
				 <div class="normaltxt">Please check with the airline for any changes in the departure time of the flight.</div>
			</td>
			<td width=20% align="center">
				<div class="bluetxt">Please refer to the attached E-ticket for full details of your flight arrangements.</div>
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
    
  
  
  
  <!--For clients having surgery at Yanhee Hospital and if we are providing the airport transfer, we use this row.-->
	<?php if ($field_airport_transfer == 'Stunning Makeovers Limited'):?>
	<tr>
    <td width=20% align="center"><?php print date('l jS M h:ia',$arrival_date); ?></td>
    <td width=60% align="center">
			<div class="orangetxt">ARRIVE <?php print strtoupper($destination); ?></div>
			<div class="orangetxt">FLIGHT <?php print $flight_number; ?> <?php print $flight_from; ?></div>
			<div class="normaltxt">Upon arrival at <?php print $airport; ?> Airport please complete arrival formalities, collect your luggage and proceed to</div>
			<div class="normaltxt"><b>Gate 3 Meeting Point.</b></div>
			<img src="<?php print $image_path; ?>/meetingpoint.jpg" width="100px"/>
			<div class="normaltxt"><b>Look out for driver holding a sign with Stunning Makeovers logo or your name</b></div>
			<img src="<?php print $image_path; ?>/logo.png" width="100px"/>
		</td>
    <td width=20% align="center">
		  <img src="<?php print $image_path; ?>/meetingpoint.jpg" width="100px"/>
		  <div>Dan or his staff<br>+66 83 2576 555</div>
	  </td>
  </tr>
  <?php endif; ?>
  
  
  <!--Use this if client doing own airport transfers.-->
	<?php if ($field_airport_transfer == 'Client'):?>
	<tr>
    <td width=20% align="center"><?php print date('l jS M h:ia',$arrival_date); ?></td>
    <td width=60% align="center">
			<div class="orangetxt">ARRIVE <?php print strtoupper($destination); ?></div>
			<div class="orangetxt">FLIGHT <?php print $flight_number; ?> ex <?php print $flight_from; ?></div>
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
    <td width=20% align="center"><?php print date('l jS M h:ia', strtotime("+1 hour", $field_transfers_pickup_date)); ?></td>
    <td width=60% align="center">
			<div class="orangetxt">HOTEL CHECK-IN</div>
			<div class="normaltxt"><b>DREAM HOTEL</b></div>
			<div class="normaltxt">10 Sukhumvit Soi 15, Kloeng Toey Nua, Wattana Bangkok 10110 Thailand Tel: (66 2) 254-8500</div>
		  <div class="normaltxt">Your accommodation is confirmed for <?php print $field_no_nights;?> nights in a <?php print $field_room_type;?> including daily buffet breakfast. Your room will have <?php print $field_bedding;?> 
		  <?php if($field_share_hotel_room): ?>
		    You will be sharing your room with <?php print $field_guest_2;?>
		  <?php endif; ?>
      </div>
      <div class="bluetxt">As a Stunning Makeovers client, we have arranged a complimentary upgrade to a <?php print $field_room_type;?> based on your length of stay</div>
      <div class="normaltxt"><b>Check in: </b><?php print $field_check_in_date;?></div>
      <div class="normaltxt"><b>Check out: </b><?php print $field_check_out_date;?></div>
      <div class="orangetxt">CONFIRMATION No: <?php print $field_hotel_booking_confirmation;?></div>
      
      <?php if ($field_no_nights >= 10) { ?>
        <div class="bluetxt">As a Stunning Makeovers client, we have arranged a complimentary upgrade to a Dream Room</div>
      <?php } ?>
      <div class="normaltxt">Your room is prepaid, however the hotel will take an impression of your credit card for incidentals</div>
      
		</td>
    <td width=20% align="center">
			<?php if($field_vip_benefits):?>
				<div class="bluetxt">
					<?php print variable_get('dream_benefit','');?>
				</div>
			<?php endif; ?>
	  </td>
  </tr>
	<?php endif; ?>
	
	
	<!--Deevana Resort and Spa-->
	<?php if ($field_accommodation_arranged == 'Accommodation Arranged by Stunning Makeovers Limited' && $field_hotel_name == 93):?>
	  <tr>
    <td width=20% align="center"><?php print date('l jS M h:ia',strtotime("+1 hour", $field_transfers_pickup_date) ); ?></td>
    <td width=60% align="center">
			<div class="orangetxt">HOTEL CHECK-IN</div>
			<div class="normaltxt"><b>Deevana Resort and Spa</b></div>
			<div class="normaltxt">Deevana Resort and Spa Patong Beach Phuket 43/2 Raj-U-Thid 200 Pee Road, Patong Beach Phuket 83150, Thailand Tel: +66 76 341414 or 341415 or 341705</div>

		  <div class="normaltxt">Your accommodation is confirmed for <?php print $field_no_nights;?> nights in a <?php print $field_room_type;?> including daily buffet breakfast. Your room will have <?php print $field_bedding;?> You will be sharing your room with 
		   <?php print $field_guest_2;?>
      </div>
      <div class="bluetxt">As a Stunning Makeovers client, we have arranged a complimentary upgrade to a <?php print $field_room_type;?> based on your length of stay</div>
      <div class="normaltxt"><b>Check in: </b><?php print $field_check_in_date;?></div>
      <div class="normaltxt"><b>Check out: </b><?php print $field_check_out_date;?></div>
      <div class="orangetxt">CONFIRMATION No: <?php print $field_hotel_booking_confirmation;?></div>
      
      <?php if ($field_no_nights >= 10) { ?>
        <div class="bluetxt">As a Stunning Makeovers client, we have arranged a complimentary upgrade to a Dream Room</div>
      <?php } ?>
      
      <div class="normaltxt">Your room is prepaid, however the hotel will take an impression of your credit card for incidentals</div>
		</td>
    <td width=20% align="center"></td>
  </tr>
  <tr>
		<td colspan=3>
      <?php if($field_vip_benefits):?>
			<div class="bluetxt">
				<?php print variable_get('deevana_benefit','');?>
			</div>
		 <?php endif; ?>
    </td>
  </tr>
	<?php endif; ?>
	
	<!--Deevana Resort-->
	<?php if ($field_accommodation_arranged == 'Accommodation Arranged by Client'):?>
	  <tr>
    <td width=20% align="center"><?php print date('l jS M', strtotime($field_transfers_pickup_date)); ?></td>
    <td width=60% align="center">
			<div class="normaltxt">You have advised us that your accommodation is booked at <?php print $field_client_hotel_name; print $field_client_hotel_address; print $field_client_hotel_phone_number;?></div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Own arrangements</div>
	  </td>
  </tr>
	<?php endif; ?>
  
  
  
  <!--Use this if client having dental treatment BEFORE surgery appointment. 
	If there is no dental appointment or if the dental appointment is after surgery – delete this -->
	<?php if (date('d', strtotime($field_dental_date)) > date('d', strtotime($field_surgery_appointment_date))):?>
	  <tr>
    <td width=20% align="center" class="redtxt">Important</td>
    <td width=60% align="center">
			<div class="bluetxt">Do not to take any <ul><b>aspirin, ibuprofen, neurofen or non-steroid anti-inflammatory</b></ul> after your dental procedures.</div>
			<div class="bluetxt">It is very important to follow this instruction as these drugs can have a blood thinning effect and cause post op complications. If you take these medications, it may result in your surgery being postponed or cancelled. Paracetamol with Codeine is the recommended choice of painkiller. Please advise the dentist of this at your consultation and ensure you know the type of painkiller (if any) you have been prescribed.</div>
			<div class="bluetxt"><b>It is your responsibility to ensure that you do not take any of the painkillers mentioned above.</b></div>
		</td>
    <td width=20% align="center">
			<div class="redtxt">Important</div>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if there is a consultation on a different day to the surgery appointment 
and we are providing hospital transfers-->
  <?php if (
      $field_consultation_before_surger && 
      ($field_transfer_for_consultation == 'Stunning Makeovers Limited') && 
      ( date('Y-m-d',strtotime($field_consultation_date)) != date('Y-m-d',strtotime($field_surgery_appointment_date)) )
    ):
  ?>
	  <tr>
    <td width=20% align="center" class="redtxt"><?php print date('l jS M h:ia', strtotime($field_consultation_transfer_time)); ?></td>
    <td width=60% align="center">
			<div class="orangetxt">TRANSFER TO YANHEE HOSPITAL FOR PRE-OPERATIVE CONSULTATION</div>
			<div class="bluetxt">NO FOOD OR WATER at least 6- 8 hours before appointment.</div>
			<div class="normaltxt">
			  <b>Please meet the driver in the Hotel lobby for your transfer to Yanhee International  Hospital </b>
			  Please go to the hotel lobby and advise the reception desk your name and room number and that you are waiting for pick up.
        The driver will go to reception and ask for you when he arrives.
			</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Mr T or his staff +66 81 8445243</div>
			<div class="bluetxt small">Due to traffic congestion, pick up time may be delayed. The driver and the hospital are in contact and will adjust your appointment according to your updated ETA. If the delay is more than 15 minutes you may ask the reception desk to call +66 81 8445243 for an update.</div>
	  </td>
  </tr>
	<?php endif; ?>
	
	
	<!--Use this if there is the consultation is on a different day to the surgery appointment and client doing transfers-->
  <?php if (
      $field_consultation_before_surger && 
      ($field_transfer_for_consultation == 'Client') && 
      (date('Y-m-d',strtotime($field_consultation_date)) != date('Y-m-d',strtotime($field_surgery_appointment_date)))
    ):
  ?>
	  <tr>
    <td width=20% align="center" class="redtxt"><?php print $field_consultation_date; ?></td>
    <td width=60% align="center">
			<div class="orangetxt">PRE-OPERATIVE CONSULTATION</div>
			<div class="bluetxt">NO FOOD OR WATER at least 6- 8 hours before consultation.</div>
			
			<div class="orangetxt"><?php print $field_hospitalname; ?></div>
			<div class="normaltxt"><?php print $field_hospital_address; ?> <?php print $field_hospital_contact; ?></div>
			<div class="normaltxt">Please proceed to the International Patients Desk on LEVEL 1 to meet your Coordinator.</div>
			<div class="bluetxt"><b>Please arrive at least 10 minutes before your appointment and proceed to the International Patients Counter</b></div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Own arrangements<br>Please ask for <?php print $coordinator; ?>, your English speaking coordinator on arrival at the hospital</div>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if there is a consultation on a different day to the surgery appointment 
and we are providing hospital transfers-->
  <?php if (
      $field_consultation_before_surger && 
      ($field_transfer_for_consultation == 'Stunning Makeovers Limited') && 
      (date('Y-m-d',strtotime($field_consultation_date)) != date('Y-m-d',strtotime($field_surgery_appointment_date)))
    ):
  ?>
	  <tr>
    <td width=20% align="center" class="redtxt">
			<?php 
			  // Day date Month xxTime 45 minutes after pick up from hotel
			  print date('l jS M', strtotime("+45 minutes", strtotime($field_consultation_transfer_time))); 
			?>
	  </td>
    <td width=60% align="center">
			<div class="orangetxt">ARRIVE AT YANHEE HOSPITAL</div>
			<div class="normaltxt"><?php print $field_hospital_address; ?> Tel: <?php print $field_hospital_contact; ?></div>
		  <div class="normaltxt">Please proceed to the International Patients Desk on LEVEL 1 to meet your Coordinator.</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Please ask for <?php print $coordinator; ?>, your English speaking coordinator on arrival at the hospital</div>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if there is the consultation is on a different day to the surgery appointment -->
  <?php if ( date('Y-m-d',strtotime($field_consultation_date)) != date('Y-m-d',strtotime($field_surgery_appointment_date)) ):
  ?>
	  <tr>
    <td width=20% align="center" class="redtxt"><?php print $field_consultation_date; ?></td>
    <td width=60% align="center">
			<div class="orangetxt">CONSULTATION & PRE-OPERATIVE TESTS</div>
			<div class="normaltxt">Meet the surgeon and have any required pre-operative tests, X-Rays etc</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt"><?php print $field_mm_surgeon; ?></div>
	  </td>
  </tr>
  <?php endif; ?>
	
	
	<!--Use this if there is the consultation is on a different day to the surgery appointment and we are providing hospital transfers-->
	<?php if (
      $field_consultation_before_surger && 
      ($field_transfer_for_consultation == 'Stunning Makeovers Limited') && 
      (date('Y-m-d',strtotime($field_consultation_date)) != date('Y-m-d',strtotime($field_surgery_appointment_date)))
    ):
  ?>
	  <tr>
    <td width=20% align="center" class="redtxt">Date & Time TBA</td>
    <td width=60% align="center">
			<div class="orangetxt">RETURN TO HOTEL</div>
			<div class="normaltxt">Following your consultation and tests the International Coordinator will arrange your transfer back to your hotel.</div>
		  <div class="normaltxt">You will be advised of your surgery date and pick up time from the Hotel for your surgery appointment.</div>
		  <div>PLEASE ADVISE THE DRIVER YOUR NEXT APPOINTMENT DATE AND TIME SO A TRANFER CAN BE SCHEDULED</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">International Patient Coordinator<br>+66 2 2879 0300 ext. 10188</div>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if there is the consultation is on a different day to the surgery appointment and client is doing own hospital transfers-->
	<?php if (
      $field_consultation_before_surger && 
      ($field_transfer_for_consultation == 'Client') && 
      (date('Y-m-d',strtotime($field_consultation_date)) != date('Y-m-d',strtotime($field_surgery_appointment_date)))
    ):
  ?>
	  <tr>
    <td width=20% align="center" class="redtxt">Date & Time TBA</td>
    <td width=60% align="center">
			<div class="orangetxt">RETURN TO HOTEL</div>
			<div class="normaltxt">Following your consultation and tests you will be advised of your surgery appointment date and time.</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Own arrangements</div>
	  </td>
  </tr>
	<?php endif; ?>

	
	<!--Use this if the surgery is on a different day to the consultation appointment and we are providing hospital transfers -->
  <?php if (
      ($field_transfer_surgery_appoint == 'Stunning Makeovers Limited') && 
      (date('Y-m-d',strtotime($field_consultation_date)) != date('Y-m-d',strtotime($field_surgery_appointment_date)))
    ):
  ?>
  <tr>
    <td width=20% align="center" class="redtxt"><?php print date('l jS M h:ia',$field_surgery_appoint_tran_time); ?></td>
    <td width=60% align="center">
			<div class="orangetxt">TRANSFER TO HOSPITAL FOR SURGERY</div>
			<div class="redtxt">NO FOOD OR WATER at least 6- 8 hours before appointment</div>
			<div class="normaltxt">Following your consultation and tests you will be advised of your surgery appointment date and time.</div>
			<div class="normaltxt"><b>Pack a bag with the recommended items listed below for your hospital admission.</b></div>
			<div class="normaltxt"><b>Please meet the driver in the Hotel lobby for your transfer to Yanhee International Hospital</b></div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Mr T or his staff +66 81 8445243</div>
			<div class="bluetxt">Due to traffic congestion, pick up time may be delayed.</div>
			<div class="bluetxt">The driver and the hospital are in contact and will adjust your appointment according to your updated ETA.</div>
			<div class="bluetxt">If the delay is more than 15 minutes you may ask the reception desk to call +66 81 8445243 for an update</div>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if there is a consultation on a different day to the surgery appointment and client doing own hospital transfers -->
	<?php if (
      ($field_transfer_surgery_appoint == 'Client') && 
      (date('Y-m-d',strtotime($field_consultation_date)) != date('Y-m-d',strtotime($field_surgery_appointment_date)))
    ):
  ?>
  <tr>
    <td width=20% align="center" class="redtxt"><?php print date('l jS M h:ia',$field_surgery_appoint_tran_time); ?></td>
    <td width=60% align="center">
			<div class="orangetxt">SURGERY APPOINTMENT</div>
			<div class="redtxt">NO FOOD OR WATER at least 6- 8 hours before appointment</div>
			<div class="normaltxt"><b>Your surgery will be performed as an outpatient procedure and you will be able to return to the hotel today.</b></div>
			<div class="orangetxt"><?php print $field_hospitalname;?></div>
			<div class="normaltxt"><?php print $field_hospital_address;?></div>
			<div class="bluetxt">Please arrive at least 10 minutes before your appointment and proceed to the International Patients Counter</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Own arrangements</div>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if there is NOT a consultation on a different day to the surgery appointment and we are providing hospital transfers-->
  <?php if (
    date('Y-m-d',strtotime($field_consultation_date)) == date('Y-m-d',strtotime($field_surgery_appointment_date)) &&
    ($field_transfer_surgery_appoint == 'Stunning Makeovers Limited')
  ):?>
  <tr>
    <td width=20% align="center" class="redtxt"><?php print date('l jS M h:ia',strtotime($field_surgery_appoint_tran_time)); ?></td>
    <td width=60% align="center">
			<div class="orangetxt">TRANSFER TO YANHEE HOSPITAL</div>
			<div class="redtxt">NO FOOD OR WATER at least 6- 8 hours before consultation</div>
			<div class="normaltxt"><b>Your surgery will be performed as an outpatient procedure and you will be able to return to the hotel today.</b></div>
			<div class="normaltxt"><b>Please meet the driver in the Hotel lobby for your transfer to Yanhee International Hospital.</b></div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Mr T or his staff +66 81 8445243</div>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if there is NOT a consultation on a different day to the surgery appointment and client is providing hospital transfers-->
  <?php if (
      date('Y-m-d',strtotime($field_consultation_date)) == date('Y-m-d',strtotime($field_surgery_appointment_date)) &&
      ($field_transfer_surgery_appoint == 'Client')
    ):?>
  <tr>
    <td width=20% align="center" class="redtxt"><?php print date('l jS M h:ia',strtotime($field_surgery_appoint_tran_time)); ?></td>
    <td width=60% align="center">
			<div class="orangetxt">SURGERY APPOINTMENT</div>
			<div class="redtxt">NO FOOD OR WATER at least 6- 8 hours before consultation</div>
			<div class="normaltxt"><b>Your surgery will be performed as an outpatient procedure and you will be able to return to the hotel today.</b></div>
			<div class="orangetxt">YANHEE INTERNATIONAL HOSPITAL </div>
			<div class="normaltxt"><?php print $field_hospital_address; ?> Tel: <?php print $field_hospital_contact; ?></div>
			<div class="bluetxt"><b>Please arrive at least 10 minutes before your appointment and proceed to the International Patients Counter.</b></div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Own arrangements</div>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if there is NOT a consultation on a different day to the surgery appointment and WE are doing transfers-->
  <?php if (
    date('Y-m-d',strtotime($field_consultation_date)) == date('Y-m-d',strtotime($field_surgery_appointment_date)) &&
    ($field_transfer_surgery_appoint == 'Stunning Makeovers Limited')
   ):?>
  <tr>
    <td width=20% align="center" class="redtxt">
			<?php print date('l jS M h:ia',strtotime("+45 minutes", strtotime($field_surgery_appoint_tran_time))); //Day date Month xxTime 45 minutes after pick up from hotel; ?>
			</td>
    <td width=60% align="center">
			<div class="orangetxt">ARRIVE AT YANHEE HOSPITAL</div>
			<div class="normaltxt">Please proceed to the International Patients Desk on LEVEL 1 to meet your Coordinator.</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Mr T or his staff +66 81 8445243</div>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if there is the consultation is on a different day to the surgery appointment -->
	<?php if (
      $field_consultation_before_surger && 
      ( date('Y-m-d',strtotime($field_consultation_date)) != date('Y-m-d', strtotime($field_surgery_appointment_date)) )
    ):
  ?>
  <tr>
    <td width=20% align="center" class="redtxt">
			 <?php print date('l jS M h:ia',strtotime("+45 minutes", strtotime($field_surgery_appoint_tran_time))); //Day date Month xxTime 45 minutes after pick up from hotel; ?>
		</td>
    <td width=60% align="center">
			<div class="orangetxt">CONSULTATION & PRE-OPERATIVE TESTS</div>
			<div class="normaltxt">Meet the surgeon and have any required pre-operative tests, X-Rays etc</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt"><?php print $field_mm_surgeon;?></div>
	  </td>
  </tr>
  
  <tr>
    <td width=20% align="center" class="redtxt">Day date Month Time TBA</td>
    <td width=60% align="center">
			<div class="orangetxt">SURGERY</div>
			<div class="normaltxt">As discussed and agreed with the surgeon The time of surgery will be advised by the nursing staff. </div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt"><?php print $field_mm_surgeon;?></div>
	  </td>
  </tr>
 <?php endif; ?>
	
	
	
	<!--Use this if we are providing hospital transfers -->
	<?php if ($field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
  <tr>
    <td width=20% align="center" class="redtxt">Date & Time TBA</td>
    <td width=60% align="center">
			<div class="orangetxt">RETURN TO HOTEL</div>
			<div class="normaltxt">Your transfer back to your hotel will be arranged by your English speaking coordinator following confirmation of your discharge time. You will be advised of your post-operative follow up appointment time and day.</div>
      <div class="normaltxt"><b>Please ensure you understand how to contact the hospital should you need assistance or advice before your post operative consultation. <br> <span class="bluetxt">Tel: +66 2 2879 0300 ext. 10188</span> <br>Please follow the surgeon’s advice on post-operative care. Should you have any concerns during your recovery period please contact the hospital coordinator or call the hospital immediately.<br>You must return to the hospital at the request of the surgeon for follow up or additional treatment/dressing changes.<br>Failure to do so may result in complications.</b></div>
      <div class="bluetxt">PLEASE ADVISE THE DRIVER YOUR NEXT APPOINTMENT DATE AND TIME SO A TRANFER CAN BE SCHEDULED</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Mr T or his staff +66 81 8445243</div>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--Use this if we are providing hospital transfers -->
	<?php if ($field_transfer_surgery_appoint == 'Client'):?>
  <tr>
    <td width=20% align="center" class="redtxt">Date & Time TBA</td>
    <td width=60% align="center">
			<div class="orangetxt">RETURN TO HOTEL</div>
			<div class="normaltxt">You will be advised of your post-operative follow up appointment time and day.<br>Please ensure you understand how to contact the hospital should you need assistance or advice before your post operative consultation. <br> <span class="bluetxt">Tel: +66 2 2879 0300 ext. 10188</span> <br>Please follow the surgeon’s advice on post-operative care. Should you have any concerns during your recovery period please contact the hospital coordinator or call the hospital immediately.<br>You must return to the hospital at the request of the surgeon for follow up or additional treatment/dressing changes.<br>Failure to do so may result in complications. </div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Own arrangements</div>
	  </td>
  </tr>
  
  <tr>
    <td width=20% align="center" class="redtxt"></td>
    <td width=60% align="center">
			<div class="orangetxt">OWN ARRANGEMENTS</div>
			<div class="normaltxt">Once you are up to it there is plenty to do during your stay in Thailand such:
			<ul>
				<li>Sightseeing and tours</li>
				<li>Spa/Pampering sessions</li>
				<li>Shopping</li>
				<li>Custom made tailoring</li>
				<li>Day/Night Markets</li>
			</ul>
			</div>
			<div class="normaltxt"><b>During recovery, please do not undertake activities that could risk your recovery</b></div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Own arrangements</div>
	  </td>
  </tr>
	<?php endif; ?>
	
	<!--If client having dental treatment & we are doing transfers to clinic-->
	<?php if (!empty($field_dental_practice_options) && $field_transfer_dental_appoint = 'Stunning Makeovers Limited'): ?>
	<tr>
    <td width=20% align="center" class="redtxt">
			<?php print date('l jS M h:ia',strtotime($field_dental_appoint_transf_time)); ?>
		</td>
    <td width=60% align="center">
			<div class="orangetxt">TRANSFER FOR DENTAL APPOINTMENT</div>
			<div class="normaltxt"><b><?php print $field_dental_practice_options;?></b></div>
			<div class="normaltxt"><?php print $field_dental_practice_address;?></div>
			<div class="normaltxt">Please meet the driver in the Hotel lobby for your complimentary one-way transfer to <?php print $field_dental_practice_options;?> Clinic for your first visit.</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt"><?php print $field_dental_practice_options;?><?php print $field_dental_practice_phone;?></div>
	  </td>
  </tr>
	<?php endif;?>
	
	<!--If client having dental treatment & doing own transfers to clinic or no transfer is provided-->
	<?php if (!empty($field_dental_practice_options) && ($field_transfer_dental_appoint = 'Client' || empty($field_transfer_dental_appoint))): ?>
	<tr>
    <td width=20% align="center" class="redtxt"><?php print date('l jS M h:ia',strtotime($field_dental_appoint_transf_time)); ?></td>
    <td width=60% align="center">
			<div class="orangetxt">DENTAL APPOINTMENT</div>
			<div class="normaltxt"><b><?php print $field_dental_practice_options;?></b></div>
			<div class="normaltxt"><?php print $field_dental_practice_address;?></div>
			<div class="normaltxt">Please arrive at the practice at least 10 minutes prior to your appointment at <?php print $field_dental_practice_options;?></div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt"><?php print $field_dental_practice_options;?><?php print $field_dental_practice_phone;?></div>
	  </td>
  </tr>
	<?php endif;?>
  
  <!--If client having dental treatment -->
	<?php if (!empty($field_dental_practice_options)): ?>
	<tr>
    <td width=20% align="center" class="redtxt">Date & TBA</td>
    <td width=60% align="center">
			<div class="normaltxt">Should you require subsequent visits to the dental practice, the staff will coordinate and advise you of the time/date</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt"><?php print $field_dental_practice_options;?> <?php print $field_dental_practice_phone;?></div>
	  </td>
  </tr>
	<?php endif;?>
	
	<!--If we are providing hospital transfers-->
	<?php if ($field_transfer_surgery_appoint == 'Stunning Makeovers Limited'):?>
	<tr>
    <td width=20% align="center" class="redtxt">Date & TBA</td>
    <td width=60% align="center">
			<div class="orangetxt">TRANSFER FOR POST-OPERATIVE CONSULTATION</div>
			<div class="normaltxt">Please meet the driver at the hotel lobby for your return transport to the hospital for your post-operative consultation with your surgeon.<br>Your transfer back to your hotel will be arranged by the International Patient Coordinator <br>following your post operative consultation</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Mr T or his staff +66 81 8445243</div>
	  </td>
  </tr>
	<?php endif;?>
	
	<!--If we are not providing hospital transfers-->
	<?php if ($field_transfer_surgery_appoint == 'Client'):?>
	<tr>
    <td width=20% align="center" class="redtxt">Date & TBA</td>
    <td width=60% align="center">
			<div class="orangetxt">POST-OPERATIVE CONSULTATION</div>
			<div class="redtxt"><b>Please arrive at the hospital 10 minutes before</b>your post-operative consultation with the surgeon. Your appointment time was provided when you were discharged from the hospital</div>
		</td>
    <td width=20% align="center">
			<div class="normaltxt">Own arrangements</div>
	  </td>
  </tr>
	<?php endif;?>
	
	<!--If client doing a tour. If more than one, copy and create another row-->
	
	<?php 
  if (!empty($wrapper->field_tour)):
		foreach ($wrapper->field_tour as $tour): 
		  if ($tour->field_tour_name->value() == 'Chaophraya River Dinner Cruise'):
		  
		?>
	
	<tr>
			<td width=20% align="center"><?php print $tour->field_pick_up->value();?></td>
			<td width=60% align="center">
				<div class="orangetxt"><?php print $tour->field_tour_name->value();?></div>
				<div class="normaltxt">Please meet representative from Chaophraya Cruises at hotel lobby for your complimentary transfer by coach to the River City Pier for the <?php print $tour->field_tour_duration_estimated->value();?></div>
			</td>
			<td width=20% align="center">Chaophraya Cruises Ph +662-541-5599</td>
  </tr>
  
  <tr>
			<td width=20% align="center">6:45pm</td>
			<td width=60% align="center">
				<div class="normaltxt">Check in at River City Pier</div>
			</td>
			<td width=20% align="center">Chaophraya Cruises Ph +662-541-5599</td>
  </tr>
  
  <tr>
			<td width=20% align="center">7:00pm</td>
			<td width=60% align="center">
			  <div class="normaltxt">Welcome on board by crew in typical Thai culture</div>
			</td>
			<td width=20% align="center">Chaophraya Cruises Ph +662-541-5599</td>
  </tr>
  
  <tr>
			<td width=20% align="center">7:30pm</td>
			<td width=60% align="center">
			 <div class="normaltxt">Cruise departs River City Pier.  
Sit back and listen to Live Music while delicious Thai & International Buffet is served</div>
			</td>
			<td width=20% align="center">Chaophraya Cruises Ph +662-541-5599</td>
  </tr>
  
  <tr>
			<td width=20% align="center">8:30pm</td>
			<td width=60% align="center">
			 <div class="normaltxt">Sight-seeing along Chaophraya river bank</div>
			</td>
			<td width=20% align="center">Chaophraya Cruises Ph +662-541-5599</td>
  </tr>
  
  <tr>
			<td width=20% align="center">9.00pm</td>
			<td width=60% align="center">
			 <div class="normaltxt">Cruise returns to River City Pier</div>
			</td>
			<td width=20% align="center">Chaophraya Cruises Ph +662-541-5599</td>
	</tr>
  
  <tr>
			<td width=20% align="center"><?php print $tour->field_arrive_back_at_hotel->value();?></td>
			<td width=60% align="center">
			 <div class="orangetxt">RETURN TO HOTEL</div>
			 <div class="normaltxt">Please meet representative from Chaophraya Cruises for your complimentary transfer by coach to the hotel</div>
			</td>
			<td width=20% align="center">Chaophraya Cruises Ph + 662-541-5599</td>
  </tr>
   <?php endif; ?>
  <?php endforeach; ?>
  <?php endif; ?>
  
  
	
	<?php 
  if (!empty($wrapper->field_tour)):
		foreach ($wrapper->field_tour as $tour): 
		  if ($tour->field_tour_name->value() != 'Chaophraya River Dinner Cruise'):
		  $tour_name = $tour->field_tour_name->value();
		?>
			<tr>
			<td width=20% align="center"><?php print date('l jS M h:ia',$tour->field_tour_date_time->value()); ?> <br> <?php print $tour->field_tour_duration_estimated->value();?></td>
			<td width=60% align="center">
				<div class="orangetxt"><b>TOUR <?php print $tour->field_tour_name->value();?> DETAILS</div>
				<div class="normaltxt">Please meet representative from the tour company for your seat-in-coach tour <br>Please take money, water, a hat, sunglasses and sunscreen</div>  
				<div class="normaltxt">	 
					 <b>Duration:</b> <?php print $tour_duration[$tour_name];?><br> 
					 <b>Pick Up Date:</b> <?php print $tour->field_pick_up->value();?><br>
					 <b>Arrive Back at Hotel:</b> <?php print $tour->field_arrive_back_at_hotel->value();?><br>
					 <b>Pick Up Location:</b> <?php print $tour->field_pick_up_location->value();?><br>
				 </div>
			</td>
			<td width=20% align="center">Please contact Mr T at least 24 hours in advance if you wish to reschedule this tour Ph +66 81 8445243</td>
		</tr>
		 <?php endif; ?>
    <?php endforeach; ?>
  <?php endif; ?>
  
  <?php
  //Transfers
	foreach ($wrapper->field_transfers_iterations as $transfers) {
	  if ($transfers->field_transfers_details->value() == 'Hotel to Airport') {
		  $field_airport_transfer = $transfers->field_airport_transfer->value();
		  $arrival_date = $transfers->field_transfers_pickup_date->value();	
		}	
	}
  ?>
  
	<!--Use this if we are providing the accommodation and transfer to the airport is after 11.00am-->
	
	<?php 
  if ($field_accommodation_arranged == 'Stunning Makeovers Limited' && $field_airport_transfer == 'Stunning Makeovers Limited' && date('G') == 11):?>
			<tr>
			<td width=20% align="center"><?php print date('l jS M h:ia',strtotime($field_check_out_date)); ?></td>
			<td width=60% align="center">
				<div class="orangetxt"><b>LATE CHECK-OUT & KEY REACTIVATION</b></div>
				<div class="normaltxt">Hotel normal check out time is 11.00am As a valued Stunning Makeovers client you may enjoy a late check out up to 3.00pm  
subject to availability – please contact reception and have your key reactivated for late check out.</div>
			</td>
			<td width=20% align="center"></td>
		</tr>
  <?php endif; ?>
  
  <!--Use this if we are providing the accommodation-->
	<?php 
  if ($field_accommodation_arranged == 'Stunning Makeovers Limited'):?>
			<tr>
			<td width=20% align="center"><?php print date('l jS M h:ia',strtotime($field_check_out_date)); ?></td>
			<td width=60% align="center">
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
	$flight_number = $wrapper->field_departure_flight_details->field_departure_flight_number->value();
	$flight_from = $wrapper->field_departure_flight_details->field_departure_from->value();
	$flight_to = $wrapper->field_departure_flight_details->field_departure_to->value();
	$airport = $wrapper->field_departure_flight_details->field_departure_airport->value();
	$field_flight_arranged_by = $wrapper->field_departure_flight_details->field_flight_arranged_by->value();
	
	if (sizeof($wrapper->field_transfers_iterations) > 0) {
	  foreach ($wrapper->field_transfers_iterations as $transfers) {
			 if ($transfers->field_transfers_details->value() == 'Hotel to Airport') {
				  //Airport to Hotel Date (Important Date/Time)
					$field_transfers_pickup_date = $wrapper->field_transfers_iterations[0]->field_transfers_pickup_date->value();
					//Airport Transfers   
					$field_airport_transfer = $wrapper->field_transfers_iterations[0]->field_airport_transfer->value();
			 }
		}	
	}
	
	if ($field_airport_transfer == 'Stunning Makeovers Limited' && $field_flight_arranged_by != 'Stunning Makeovers Limited'):?>
			<tr>
			<td width=20% align="center"><?php print date('l jS M h:ia', strtotime($field_transfers_pickup_date)); ?></td>
			<td width=60% align="center">
				<div class="orangetxt"><b>TRANSFER TO AIRPORT</b></div>
				<div class="normaltxt">You have advised us that your flight <?php print $flight_number; ?> departs at <?php print $arrival_date;?> </div>
				<div class="bluetxt"><b>Please advise Mr T of any changes to your flight departure time and whether you wish to reschedule your transfer to the airport.</b></div>
			  <div class="normaltxt">Please meet the driver in the hotel lobby for your pre-paid transport to the airport.</div>
			</td>
			<td width=20% align="center">Mr T or his staff Ph +66 81 8445243</td>
		</tr>
  <?php endif; ?>
  
  <!--Use this if we are providing transfers AND providing the flights-->
  <?php 
  if ($field_airport_transfer == 'Stunning Makeovers Limited' && $field_flight_arranged_by == 'Stunning Makeovers Limited'):?>
			<tr>
			<td width=20% align="center"><?php print date('l jS M h:ia', strtotime($field_transfers_pickup_date)); ?></td>
			<td width=60% align="center">
				<div class="orangetxt"><b>TRANSFER TO AIRPORT FLIGHT <?php print $flight_number; ?> FROM BANGKOK TO <?php print $flight_to; ?> DEPARTS <?php print date('l jS M h:ia', strtotime($arrival_date)); ?></b></div>
				<div class="bluetxt"><b>Recommended check-in at the airport for International flights is three hours prior to departure.</b></div>
			  <div class="normaltxt">Please check with the airline for any changes in the departure time of the flight and advise Mr T if you wish to reschedule your transfer to the airport.</div>
			  <div class="normaltxt">Please meet the driver in the hotel lobby for your pre-paid transport to the airport</div>
			</td>
			<td width=20% align="center">Mr T or his staff Ph +66 81 8445243</td>
		</tr>
  <?php endif; ?>
  
  <!--Use this if we are not providing transfers AND providing the flights-->
  <?php 
  if ($field_airport_transfer == 'Client'):?>
			<tr>
			<td width=20% align="center"><?php print date('l jS M', strtotime($field_check_out_date)); ?></td>
			<td width=60% align="center">
				<div class="orangetxt"><b>TRANSFER TO AIRPORT</b></div>
				<div class="normaltxt">You have arranged transfer to the airport Please have a pleasant flight</div>
			</td>
			<td width=20% align="center">Own arrangements</td>
		</tr>
  <?php endif; ?>
  
  <!--Use this if we are providing transfers but NOT the flights-->
  <?php 
  if ($field_airport_transfer == 'Stunning Makeovers Limited' && $field_flight_arranged_by != 'Stunning Makeovers Limited'):?>
			<tr>
			<td width=20% align="center"><?php print date('l jS M h:ia', strtotime('+1 hour',strtotime($field_transfers_pickup_date))); ?></td>
			<td width=60% align="center">
				<div class="orangetxt" style="text-transform: uppercase;"><b><?php print $airport; ?></b></div>
				<div class="normaltxt">Please have a pleasant flight</div>
		  </td>
			<td width=20% align="center"></td>
		</tr>
  <?php endif; ?>
  
  <!--Use this if we are arranging flights and providing airport transfers -->
  <?php 
  if ($field_airport_transfer == 'Stunning Makeovers Limited' && $field_airport_transfer == 'Stunning Makeovers Limited'):?>
			<tr>
			<td width=20% align="center"><?php print date('l jS M h:ia', strtotime('+1 hour',strtotime($field_transfers_pickup_date))); ?></td>
			<td width=60% align="center">
				<div class="orangetxt" style="text-transform: uppercase;"><b>ARRIVE <?php print $airport; ?></b></div>
				<div class="normaltxt">FLIGHT <?php print $flight_number; ?> FROM <?php print strtoupper($destination); ?> TO <?php print $flight_to; ?> DEPARTS <?php print date('l jS M h:ia', strtotime($arrival_date)); ?></div>
				<div class="bluetxt"><b>Recommended check-in at the airport for International flights is three hours prior to departure.</b></div>
		    <div class="normaltxt">Please have a pleasant flight</div>
		  </td>
			<td width=20% align="center"><div class="bluetxt">Please refer to the attached E-ticket for full details of your flight arrangements.</div></td>
		</tr>
  <?php endif; ?>
  
  
		<tr>
			<td width=20% align="center"><?php print date('l jS M h:ia', strtotime('+1 hour',strtotime($field_transfers_pickup_date))); ?></td>
			<td width=60% align="center">
				<div class="orangetxt"><b>ITEMS TO TAKE TO HOSPITAL</b></div>
				<div class="normaltxt" style="text-align:left;">
				  <ul style="text-align:left;">
				    <li>Passport for hospital registration procedures</li>
				    <li>Local THB currency for incidentals such as drinks, snacks, transfers and magazines</li>
				    <li>Credit Card or cash for surgery payment</li>
				    <li>Contact lenses or glasses</li>
				    <li>Medication</li>
				    <li>Nightwear (if being admitted overnight)</li>
				    <li>Toiletries including tooth brush and paste</li>
				    <li>Reading Material</li>
				  </ul>
				</div>
			 </td>
			<td width=20% align="center">There is a safe in your room to keep your valuables</td>
		</tr>
		
		<?php if (!empty($wrapper->field_tour) && sizeof($wrapper->field_tour) > 0): ?>
		  <tr>
				<td width=100% colspan=3 style="padding:10px;">A strict dress code applies. The Grand Palace with The Temple of the Emerald Buddha is Thailand's most sacred site. Visitors must be properly dressed before being allowed entry to the temple. Men must wear long pants and shirts with sleeves (no tank tops. If you'rewearing sandals or flip-flops you must wear socks (in other words, no bare feet.) Women must be similarly modestly dressed. No see-through clothes, bare shoulders, etc. If you show up at the front gate improperly dressed, there is a booth near the entrance that can provide clothes to cover you up properly (a deposit is required).</td>
			</tr>
		<?php endif; ?>
		
		<tr>
			<td width=100% colspan=3 style="padding:10px;"><b>Notes:</b><br>
			  <div class="normaltxt"><b>DEBIT CARDS and TRAVEL CARDS</b> – are not accepted by the hospital or Dental Practice
Payment may be made using cash and internationally-recognised credit cards at the time of registration before surgery.
        </div>
        
        <div class="normaltxt"><b>CASH</b> - Thai Baht is accepted.  Bills must be new, crisp, and free of wrinkles, tears, smudges, and ink-marks.
        </div>
        
        <div class="normaltxt"><b>CREDIT CARD</b> - Please inform your bank ahead of time that you will be charging a large amount overseas.
        </div>
        
        <div class="normaltxt"><?php print $guestname; ?>, thank you for choosing <span class="orangetxt">Stunning Makeovers.</span></div>
        
        <div class="normaltxt">We hope you enjoy your experience and look forward to your feedback upon your return.</div>
        
        <div class="normaltxt">Please remember that you can contact us by text or phone +64-21-983-225 (Paul) while you are in Thailand.</div>
			</td>
		</tr>
  </table>
</body>
</html>
