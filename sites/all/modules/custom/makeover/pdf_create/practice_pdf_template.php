<?php
	$nid = arg(1);
	$content = node_load($nid);
	$_SESSION['pdf_last_update'] = date('F j, Y',$content->changed);
	$title = $content->title;	
	$overview = $content->body;
	
	$experients = views_get_view_result("practice_experience", "default",$nid);
	foreach($experients as $key=>$value){
		$exp[] = $value->node_node_data_field_practice_experience__node_revisions_body;
	}
	
	$contact_thailand = views_get_view_result("practice_contact_thailand", "default",$nid);
	foreach($contact_thailand as $key=>$value){
		$contacts_th[$value->node_node_data_field_practices_contact_thailand_nid]['name'] = $value->node_node_data_field_practices_contact_thailand_node_data_field_professional_given_name_field_professional_given_name_value.' '.$value->node_node_data_field_practices_contact_thailand_node_data_field_professional_given_name_field_professional__family_name_value;
		$contacts_th[$value->node_node_data_field_practices_contact_thailand_nid]['phone'] = $value->node_node_data_field_practices_contact_thailand_node_data_field_professional_given_name_field_professional_tel_number_value;
		$contacts_th[$value->node_node_data_field_practices_contact_thailand_nid]['email'] = $value->node_node_data_field_practices_contact_thailand_node_data_field_professional_given_name_field_professional_email_address_value;
	}
	
	$contact_vietnam = views_get_view_result("practice_contact_vietnam", "default",$nid);
	foreach($contact_vietnam as $key=>$value){
		$contacts_vn[$value->node_node_data_field_practices_contact_vietnam_nid]['name'] = $value->node_node_data_field_practices_contact_vietnam_node_data_field_professional_given_name_field_professional_given_name_value.' '.$value->node_node_data_field_practices_contact_vietnam_node_data_field_professional_given_name_field_professional__family_name_value;
		$contacts_vn[$value->node_node_data_field_practices_contact_vietnam_nid]['phone'] = $value->node_node_data_field_practices_contact_vietnam_node_data_field_professional_given_name_field_professional_tel_number_value;
		$contacts_vn[$value->node_node_data_field_practices_contact_vietnam_nid]['email'] = $value->node_node_data_field_practices_contact_vietnam_node_data_field_professional_given_name_field_professional_email_address_value;
	}
	
	if($nid == '89'){
		$ip_registration = node_load(235);
		$content_ip_registration =  $ip_registration->body;
		$exp_reg = views_get_view_result('sub_practice_experience',defaults,235);
		foreach($exp_reg as $key=>$value){
			$exp_r[] = $value->node_node_data_field_subpractice_experience__node_revisions_body;
		}
		
		$ip_commercialization = node_load(236);
		$content_ip_commercialization = $ip_commercialization->body;
		$exp_commerc = views_get_view_result('sub_practice_experience',defaults,236);
		foreach($exp_commerc as $key=>$value){
			$exp_c[] = $value->node_node_data_field_subpractice_experience__node_revisions_body;
		}
		
		$ip_litigation = node_load(237);
		$content_ip_litigation = $ip_litigation->body;
		$exp_litig = views_get_view_result('sub_practice_experience',defaults,237);
		foreach($exp_litig as $key=>$value){
			$exp_l[] = $value->node_node_data_field_subpractice_experience__node_revisions_body;
		}
	}
	
?>

<link type="text/css" rel="stylesheet" media="all" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/sites/all/themes/tlg/css/pdf_template.css';?>"/>
<div id="pdf">
	<div class="pdf-header">
		<div id="practice-title"><h1><?php echo $title;?></h1></div>
		<div id="practice-contact">
			<table><tr>
				<td valign="top">
					<div id="contacts"><b>Contacts:&nbsp;&nbsp;</b></div>
				</td>
				<td>
					<div>	
						<?php if(is_array($contacts_th)){?>
							<div id="header-th" class='text-header-sub'>THAILAND</div>
							<?php foreach($contacts_th as $key=>$value){?>
								<div class="contact"><span class="contact-name"><?php echo $value['name'];?></span>&nbsp;&nbsp;&nbsp;<?php echo 'T: '.$value['phone'];?>&nbsp;&nbsp;&nbsp;<?php echo 'E: '.$value['email'];?></div>
							<?php }?>
						<?php }?>
						
						<?php if(is_array($contacts_vn)){?>
							<div id="header-vn" class='text-header-sub'>VIETNAM</div>
							<?php foreach($contacts_vn as $key=>$value){?>
								<div class="contact"><span class="contact-name"><?php echo $value['name'];?></span>&nbsp;&nbsp;&nbsp;<?php echo 'T: '.$value['phone'];?>&nbsp;&nbsp;&nbsp;<?php echo 'E: '.$value['email'];?></div>
							<?php }?>
						<?php }?>
					</div>
				</td>
			</tr></table>
		</div>
	</div>
	<div class="pdf-line">&nbsp;</div>
	<div class="pdf-content">
		<div id="header-overview" class='text-header'>OVERVIEW</div>
		<div><p><?php echo $overview;?></p></div>
		
		<?php if(is_array($exp)){?>
		<div>
			<ul>
			<?php foreach($exp as $key=>$value){?>
				<?php if($value):?>
					<li><?php echo $value;?></li>
				<?php endif;?>
			<?php }?>
			</ul>
		</div>
		<?php }?>
		<?php if($nid=='89'):?>
			<div><p><?php echo $content_ip_registration;?></p></div>
			<?php if(is_array($exp_r)){?>
			<div>
				<ul>
				<?php foreach($exp_r as $key=>$value){?>
					<?php if($value):?>
						<li><?php echo $value;?></li>
					<?php endif;?>
				<?php }?>
				</ul>
			</div>
			<?php }?>
			
			<div><p><?php echo $content_ip_commercialization;?></p></div>
			<?php if(is_array($exp_c)){?>
			<div>
				<ul>
				<?php foreach($exp_c as $key=>$value){?>
					<?php if($value):?>
						<li><?php echo $value;?></li>
					<?php endif;?>
				<?php }?>
				</ul>
			</div>
			<?php }?>
			
			<div><p><?php echo $content_ip_litigation;?></p></div>
			<?php if(is_array($exp_l)){?>
			<div>
				<ul>
				<?php foreach($exp_l as $key=>$value){?>
					<?php if($value):?>
						<li><?php echo $value;?></li>
					<?php endif;?>
				<?php }?>
				</ul>
			</div>
			<?php }?>
			<?php endif;?>
	</div>
</div>

