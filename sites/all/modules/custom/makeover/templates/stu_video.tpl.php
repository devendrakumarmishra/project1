<?php $results = views_get_view_result('whatclientssay_video',null); ?>
<?php $count = count($results);?>
<div class="video-content-page">
<?php for($i=1;$i<=$count;$i++){?>
	<?php echo "<span class='video-page-number";?>
			<?php if($i==1){?>
				<?php echo " active";?>
			<?php }?>
			<?php echo "' id='video-page-number-".$i."' style='cursor:pointer;' onclick='gotoblock(\"".$i."\",\"video\")'>".$i."</span>";?>
<?php }?>
</div>

<div id="video-content">
<?php $loop = 1;?>
<?php foreach($results as $result){ ?>


<?php $node = node_load($result->nid);?>

<?php foreach($node->field_video_procedures as $procedure_id){
	  $pcd_id = 'node/'.$procedure_id[nid];
	  $path = drupal_get_path_alias($pcd_id);
	 
	  $title = node_load($procedure_id[nid]);
//echo print_r($title);	  
	  $pcd_name = $title->title;
	  
	  //$pcd = ($pcd)?$pcd.' <a href="/'.$path.'">'.$pcd_name.'</a>':'<a href="/'.$path.'">'.$pcd_name.'</a>';
	  $pcd = l($pcd_name,'node/'.$procedure_id[nid]);
 }?>

<?php if($loop !=1){?>
	<div id="video-<?php echo $loop;?>" style="display:none;">
<?php }else{?>
	<div id="video-<?php echo $loop;?>">
<?php }?>
	<div class="gray-box">
		<div class="gray-box-header">
			<div class="gray-box-content">
				<div class="procedure-testimonial-content">
					<div class="procedure-testimonial-title">
						<span class="testimonial-title"><?php echo $result->node_data_field_video_patient_location_field_video_patient_name_value; ?></span>
						<?php if($result->node_data_field_video_patient_location_field_video_patient_location_value){ ?>
						<span class="line">-</span>
						<?php } ?>
						<span class="testimonial-destination"><?php echo $result->node_data_field_video_patient_location_field_video_patient_location_value; ?></span>
					</div>								
					<div class="procedure-testimonial-second">
						<?php echo $pcd;?>
						<?php if($pcd_name && $result->node_node_data_field_video_doctor_title) { ?>
						<span class="line">|</span>
						<?php } ?>
						<?php echo l($result->node_node_data_field_video_doctor_title,'node/'.$result->node_node_data_field_video_doctor_nid); ?>
					</div>
					<div class="video-testimonials">
						<object width="490" height="350">
							<param name="movie" value="<?php echo $node->field_video_youtube[0]['data']['flash']['url'];?>" />
							<embed src="<?php echo $node->field_video_youtube[0]['data']['flash']['url'];?>" type="application/x-shockwave-flash" width="500" height="350" />
						</object>	
					</div>
					<?php if($result->node_revisions_body){ ?>
					<div class="video-testimonial-info">
					<div class="text-quote-open"><img src="/sites/all/themes/stu/images/quote1.png" /></div>
					<div class="procedure-testimonial-body">
						<?php echo $result->node_revisions_body; ?>
						<div class="text-quote-close"><img src="/sites/all/themes/stu/images/quote2.png" /></div>
					</div>
					<div class="clear-block"></div>
					</div>
					<?php } ?>
				</div>	
			</div>
		</div>
		<div class="gray-box-footer"></div>
	</div>
	</div>
<?php $loop++;?>	
<?php } ?>
</div>
<?php
	//block name: live-online
	//$block = module_invoke('block', 'block', 'view', 16);
	//print $block['content'];
?>