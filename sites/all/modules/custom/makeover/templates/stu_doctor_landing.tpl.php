<?php $results = views_get_view_result('surgeons',null);
	foreach($results as $result){
		$doctor_nid = $result->nid;  //doctor nid
		$node = node_load($doctor_nid);
		
		$doctor_type = field_get_items('node', $node, 'field_doctor_type');
		$doctor_type = $doctor_type[0]['value']; //doctor type
		
		$path = url(drupal_get_path_alias("node/".$doctor_nid),array('absolute' => true)); //doctor alias path
	  
		$facility_node = node_load($result->node_field_data_field_doctor_facility_nid); //doctor facility nid (hospital)
	  $destination_node = node_load($facility_node->field_facilities_destination[LANGUAGE_NONE][0]['nid']); //destination nid
		
		if(!isset($doctor[$doctor_type][$destination_node->title])) {
			$doctor[$doctor_type][$destination_node->title] = array(); //new array
		}
		array_push($doctor[$doctor_type][$destination_node->title] ,"<a href='".$path."'>".$result->node_title."</a>");

		ksort($doctor['plastic_surgeon']); //sort destination  1.Bangkok 2.Phuket
		ksort($doctor['dental_surgeon']); //sort destination  1.Bangkok 2.Phuket
	}	
?>

<div class="procedure-gray-box">
	<div class="procedure-gray-box-header">
		<div class="procedure-gray-box-content">
			<h3 class="procedure-group-title">Plastic Surgeons</h2>
		  <?php foreach($doctor['plastic_surgeon'] as $destination_key=>$doctor_name){?>
				<p class="head-destination"><?php echo $destination_key;?></p>
				<div class="gray-box-doctor">
					<?php foreach($doctor_name as $dc){?>
						<p><?php echo $dc;?></p>
					<?php }?>
				</div>
			<?php }?>			
		</div>
	</div>
	<div class="clear-bloack"></div>
	<div class="procedure-gray-box-footer"></div>
</div>

<div class="procedure-gray-box">
	<div class="procedure-gray-box-header">
		<div class="procedure-gray-box-content">
			<h3 class="procedure-group-title">Dental Surgeons</h2>
			<?php foreach($doctor['dental_surgeon'] as $destination_key=>$doctor_name){?>
				<p class="head-destination"><?php echo $destination_key;?></p>
				<div class="gray-box-doctor">
					<?php foreach($doctor_name as $dc){?>
						<p><?php echo $dc;?></p>
					<?php }?>
				</div>
			<?php }?>
						
		</div>
	</div>
	<div class="clear-bloack"></div>
	<div class="procedure-gray-box-footer"></div>
</div>