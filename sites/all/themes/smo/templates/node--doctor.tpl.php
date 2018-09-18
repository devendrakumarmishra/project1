<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
 global $base_url;
?>
<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  
  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
    <header>
      <?php print render($title_prefix); ?>
      <?php if (!$page && $title): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>

      <?php if ($display_submitted): ?>
        <p class="submitted">
          <?php print $user_picture; ?>
          <?php print $submitted; ?>
        </p>
      <?php endif; ?>

      <?php if ($unpublished): ?>
        <mark class="unpublished"><?php print t('Unpublished'); ?></mark>
      <?php endif; ?>
    </header>
  <?php endif; ?>

  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    //print render($content);
  ?>
  
  <?php
    $doctor_type = field_get_items('node', $node, 'field_doctor_type');
    $doctor_type = $doctor_type[0]['value']; 
    $results = _custom_pre_next($doctor_type);
    
    /*$sql = "SELECT 	node.nid 
            FROM node , content_type_doctor
            WHERE type = 'doctor' AND status = 1 AND node.nid = content_type_doctor.nid
            ORDER BY content_type_doctor.field_doctor_type_value DESC, content_type_doctor.field_doctor_facility_nid ASC , node.title ASC ;";    //procedure order by nid -- procedure nid order by date create
	
	  $results = db_query($sql);*/
    $prev = 0;
    $next = 0;
    $stop = false;
			
   foreach ($results as $result) {
		 if($stop){
          $next = $result->nid;
          break;
      }
      if($node->nid == $result->nid){
          $stop = true;
	  }
	  else {
          $prev = $result->nid;
      }
   }
  ?>
	<div class="doctor-next-prev">
	<?php	if($prev != 0 || $next != 0) {
				if($prev != 0){
					echo "<div class='previous'>";
					echo l("Previous","node/".$prev);
					//echo l("Previous Surgeon","node/".$prev,array( 'html' => FALSE,'fragment' => 'procedure_overview'));
					echo "</div>";
				}
				if($prev != 0 && $next != 0) {
					echo "<span class='line'> | </span>";
				}
				if($next != 0){
					echo "<div class='next'>";
					//echo l("Next Surgeon","node/".$next,array( 'html' => FALSE,'fragment' => 'procedure_overview'));
					echo l("Next","node/".$next);
					echo "</div>";
				}  
			} 
	?>
	<div class="clear-block"></div>
	</div>
	
	<div class="clear-block"></div>
  <!-- NEXT / PREV -->	

  <div class="content">
    
	<div class="doctor-facility">
		<?php
		 if($node->field_doctor_facility[LANGUAGE_NONE][0]['value']) { ?>
		<?php echo $node->field_doctor_facility[LANGUAGE_NONE][0]['value']; ?> 
		<?php } ?>
		
	  <?php echo render($content['field_doctor_facility']); ?>
	  <?php //echo render($content['field_doctor_active']); ?>
	  
	  <?php if($node->field_doctor_active[LANGUAGE_NONE][0]['value']) { ?>
			<div class="years">(<?php echo $node->field_doctor_active[LANGUAGE_NONE][0]['value']; ?>)</div>
		<?php } ?>
		
		<?php 
	    /*print render(field_view_field('node', $node, 'field_doctor_facility', array('label'=>'hidden','settings' => array())));
			print render(field_view_field('node', $node, 'field_doctor_active', array('label'=>'hidden','settings' => array())));
			* */
		?>
  </div>
	<div class="doctor-image">
		<?php 
			//print render(field_view_field('node', $node, 'field_doctor_image', array('label'=>'hidden','settings' => array())));
		?>
		<?php echo render($content['field_doctor_image']); ?>
	</div>
	<div class="doctor-content-right">
		<div class="doctor-resume">
			<?php 
			  // print render(field_view_field('node', $node, 'field_doctor_resume', array('label'=>'hidden','settings' => array())));
		  ?>
			<?php if($node->field_doctor_resume[und][0]['filename']) { ?>
			<a id="download-pdf" href="<?php echo file_create_url($node->field_doctor_resume['und'][0]['uri']); ?>" target="_blank">Download CV</a>
			<?php } ?>
			<?php //echo render($content['field_doctor_resume']); ?>
		</div>
		<div class="doctor-body">
			<?php echo render($content['body']); ?>
		</div>
	</div>
	
	<div class="doctor-next-prev">
	<?php	if($prev != 0 || $next != 0) {
				if($prev != 0){
					echo "<div class='previous'>";
					echo l("Previous","node/".$prev);
					echo "</div>";
				}
				if($prev != 0 && $next != 0) {
					echo "<span class='line'> | </span>";
				}
				if($next != 0){
					echo "<div class='next'>";
					echo l("Next","node/".$next);
					echo "</div>";
				}  
			} 
	?>
	<div class="clear-block"></div>
	</div>
	<div class="clear-block"></div>
	
	<div class="clear-block"></div>
	
		
		<div class="doctor-page-bottom">
				<div class="doctor-view-testimonial">
					<?php $results = views_get_view_result('doctor_testimonial', null, $node->nid); 
					
					if($results){
						echo '<div class="doctor-view-testimonial-title"><h3>TESTIMONIALS</h3></div>';
					}
					?>
					<?php foreach($results as $result){ //print_r($result);?>
					<?php $node = node_load($result->nid);?>
					<?php 
					    $items = array(); 
					    foreach($node->field_testimonial_procedures[LANGUAGE_NONE] as $key => $procedure_id){
								$nid = $procedure_id[nid];
								$pcd_id = 'node/'.$nid;
								$path = drupal_get_path_alias($pcd_id);
								$query = db_select('node','n');
								$query->fields('n',array('title'));
								$query->condition('n.nid', $nid, '=');
								$title = $query->execute()->fetchField();
								$items[$key] = l(trim($title), 'node/' . $nid);
								$pcd = l($title, 'node/' . $nid);
								if($key == 2) break;
					 }?>
						<div class="gray-box">
							<div class="gray-box-header">
								<div class="gray-box-content">
									<div class="procedure-testimonial-content">
										<div class="procedure-testimonial-title">
											<span class="testimonial-title"><?php print render($result->field_field_testimonial_patient_name); ?></span>
											<span class="line">from</span>
											<span class="testimonial-destination"><?php echo render($result->field_field_testimonial_location); ?></span>
										</div>								
										<div class="procedure-testimonial-second">
											<?php echo (!empty($items)) ? implode(', ', $items) : '' ;?>
										</div>
										<div class="video-testimonial-info">
										<div class="text-quote-open"><img src="<?php print $base_url; ?>/sites/all/themes/stu/images/quote1.png"/></div>
										<div class="testimonial-body-main">
											<div class="procedure-testimonial-body">
												<?php echo render($result->field_body); ?>
											</div>
											<div class="procedure-testimonial-longbody">
												<?php echo render($result->field_field_testimonial_long_body); ?>
											</div>
											<div class="text-quote-close"><img src="<?php print $base_url; ?>/sites/all/themes/stu/images/quote2.png" /></div>
										</div>
										<div class="clear-block"></div>
										</div>
										<?php if($result->field_field_testimonial_long_body){?>
										<div class="view-more">
											<!--<a class="view-more-a" href="javascript:void(0);">view more</a>-->
										</div>
										<?php }?>
									</div>	
								</div>
							</div>
							<div class="gray-box-footer"></div>
						</div>									  
					<?php } ?>
					
				</div>
				
				
		</div>
		<div class="clear-block"></div>
 	</div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>
</article><!-- /.node -->
