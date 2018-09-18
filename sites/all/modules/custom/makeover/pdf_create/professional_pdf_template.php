<?php

	$nid = arg(1);

	$content = node_load($nid);
	$title = $content->title;	
	$photo = $content->field_profession_photo['0']['filepath'];

	if($content->field_profession_custom_job_role['0']['value']){
		$jobrole =  $content->field_profession_custom_job_role['0']['value'];
	}else{	
		$node_job = node_load($content->field_professional_job_role['0']['nid']);
		$jobrole =  $node_job->title;
	}
	
	$phone =  'T: '.$content->field_professional_tel_number['0']['value'];
	
	$location_id = $content->field_professional_location['0']['nid'];
	$content2 = node_load($location_id);
	$fax = 'F: '.$content2->field_location_fax['0']['value'];
	
	$email = 'E: '.$content->field_professional_email_address['0']['value'];
	
	$biography = $content->field_profession_bio['0']['value'];
	$language = $content->field_profession_languages['0']['value'];
	$lang = explode(',',$language);
	$num_lang = count($lang);

	$education = $content->field_profession_education['0']['value'];
	
	$experients = views_get_view_result("professional_experience_tab", "default",$nid);
	foreach($experients as $key=>$value){
		$exp[] = $value->node_node_data_field_profess_experience__node_revisions_body;
	}

	$localtion_id = $content->field_professional_location['0']['nid'];
	$content2 = node_load($localtion_id);
	$office = $content2->title.', '.$content2->field_location_country_name['0']['value'];
	
	$num_practice = 0;
	$relate_practice = views_get_view_result("professional_related_practice", "default",$nid);
	foreach($relate_practice as $key=>$value){
		$practice  = ($practice)?$practice.', '.$value->node_node_data_field_profess_related_practice_title:$value->node_node_data_field_profess_related_practice_title;
		$num_practice++;
	}	
?>

<link type="text/css" rel="stylesheet" media="all" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/sites/all/themes/tlg/css/pdf_template.css';?>"/>
<div id="pdf">
	<div class="pdf-header">
		<div class="professional-header">
			<div id="professional-photo"><img src="/<?php echo $photo;?>" alt="photo"></div>
			<div id="professional-profile">
				<div id="professional-contact1">
					<div id="professional-name"><?php echo $title;?></div>
					<div id="professional-jobrole"><?php echo $jobrole;?></div>
					<div id="professional-contact"><?php echo $phone.'&nbsp;&nbsp;&nbsp;'.$fax.'&nbsp;&nbsp;&nbsp;'.$email;?></div>
				</div>
				<div id="professional-contact2">
					<table>
						<tr><td><b>Office:&nbsp;&nbsp;</b></td><td><?php echo $office;?></td></tr>	
						<tr><td valign="top">
							<?php if($num_practice>1):?>
								<b>Practices:&nbsp;&nbsp;</b>
							<?php else:?>
								<b>Practice:&nbsp;&nbsp;</b>
							<?php endif;?>
						</td><td><?php echo $practice;?></td></tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="pdf-line">&nbsp;</div>
	<div class="pdf-content">	
		<div class='text-header'>BIOGRAPHY</div>
		<div><p><?php echo $biography;?></p></div>
		
		<div class='text-header'>EXPERIENCE</div>
		<?php if(is_array($exp)):?>
		<div>
			<ul>
			<?php foreach($exp as $key=>$value):?>
				<li><?php echo $value;?></li>
			<?php endforeach;?>
			</ul>
		</div>
		<?php endif;?>	
		
		<div id="header-overview" class='text-header'>EDUCATION</div>
		<div><p><?php echo $education;?></p></div>
		
		<?php if($num_lang>1):?>
			<div class='text-header'>LANGUAGES</div>
		<?php else:?>
			<div class='text-header'>LANGUAGE</div>
		<?php endif;?>
		<div><p><?php echo $language;?></p></div>					
	</div>
</div>