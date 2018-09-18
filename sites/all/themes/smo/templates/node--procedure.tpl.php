<?php
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
	
  <!-- NEXT / PREV -->	
  <?php 
  	$sql = "SELECT 	node.nid
            FROM node , content_type_procedure
            WHERE type = 'procedure' AND status = 1 AND node.nid = content_type_procedure.nid
            ORDER BY content_type_procedure.field_procedure_group_nid ASC , node.created ASC ;"; 
	
	  $results = db_query($sql);
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
  <a name="procedure_overview">&nbsp;</a>
  <div class="content">
   <div class="procedure-overview">
		<h2 class="second-title">PROCEDURE OVERVIEW</h2>
		<div class="procedure-banner">
			<?php print render($content['field_procedure_banner']);?>
		</div>
		<div class="procedure-detail">
			<?php if($node->title) { ?>
			<p><span class="dark-gray">Surgery: </span>
			<?php 
			echo $node->title." ";
			if($node->field_procedure_alternative_name[LANGUAGE_NONE][0]['value']){
			echo "(".$node->field_procedure_alternative_name[LANGUAGE_NONE][0]['value'].")";
			}
			?></p>
			<?php } ?>
		</div>
		
		<div class="clear-block"></div>
		<?php
		  $block = block_load('block', 3);
      $render_array = _block_get_renderable_array(_block_render_blocks(array($block)));
      $output = render($render_array);
      print $output;
		?>
		<div class="clear-block"></div>
		
		<div class="procedure-body">
		  <?php 
		  print render(field_view_field('node', $node, 'body', array('label'=>'hidden','settings' => array())));
		  //print render($content['body']);
		  ?>
		</div>
		<div class="clear-block"></div>
		<?php
		  /*$block = block_load('block', 3);
      $render_array = _block_get_renderable_array(_block_render_blocks(array($block)));
      $output = render($render_array);
      print $output;*/
		?>
		<div class="clear-block"></div>
		
		<div class="procedure-facility">			
			<?php 
				/*$procedure_facilities_nid = "";
				$f_nid = $node->field_procedure_facilities[LANGUAGE_NONE];
				foreach($f_nid as $fid) {		
					$procedure_facilities_nid = ($procedure_facilities_nid)?$procedure_facilities_nid.','.$fid['nid']:$fid['nid'];
				}				
			  $results = views_get_view_result('procedure_facilities',null, $procedure_facilities_nid);
			  //print_r($results);*/
			?>
			
			<?php 
				$procedure_facilities_nid = "";
				$f_nid = $node->field_procedure_facilities[LANGUAGE_NONE];
				$items = array();
				foreach($f_nid as $fid) {
					$destinations_id = $fid['node']->field_facilities_destination[LANGUAGE_NONE][0][nid];
					$destinations = db_query("SELECT title FROM {node} WHERE nid = :nid", array(':nid' => $destinations_id))->fetchField();
					$items[$fid['nid']] = l($fid['node']->title. " - " .$destinations, 'node/' . $fid['nid']) ;
					
				}	
			?>
			<?php
			if (count($items)>0) { ?>
			<h3>This Procedure is available at:</h3>
				<?php
					print theme('item_list',array('items' => $items));
				?>
			<?php } ?>
		</div>
		<div class="precedure-page-bottom">
			
			<div class="procedure-next-prev">
			<?php	if($prev != 0 || $next != 0) {
						if($prev != 0){
							echo "<div class='previous'>";
							echo l("Previous","node/".$prev,array( 'html' => FALSE,'fragment' => 'procedure_overview'));
							echo "</div>";
						}
						if($prev != 0 && $next != 0) {
							echo "<span class='line'> | </span>";
						}
						if($next != 0){
							echo "<div class='next'>";
							echo l("Next","node/".$next,array( 'html' => FALSE,'fragment' => 'procedure_overview'));
							echo "</div>";
						}  
					} 
			?>
			<div class="clear-block"></div>
			</div>
					
			<div class="clear-block"></div>
		</div>
		<div class="clear-block"></div>
	</div>
	<div class="procedure-before-after">
		<!--<h2 class="second-title">BEFORE & AFTER</h2>-->
		<?php /*for($i=0;$i<count($node->field_procedure_before_after[LANGUAGE_NONE]);$i++) { ?>
					<div class='procedure-before-after-image'>
						<img src="/<?php echo $node->field_procedure_before_after[LANGUAGE_NONE][$i]['filepath']?>"/>
					</div>
					<div class='procedure-before-after-text'>
						<span class='procedure-before'>Before</span><span class='procedure-after'>After</span>
					</div>
		<?php }*/ ?>
		<!--<div class="precedure-page-bottom">
		
			<div class="procedure-next-prev">
			<?php	if($prev != 0 || $next != 0) {
						if($prev != 0){
							echo "<div class='previous'>";
							echo l("Previous","node/".$prev,array( 'html' => FALSE,'fragment' => 'procedure_overview'));
							echo "</div>";
						}
						if($prev != 0 && $next != 0) {
							echo "<span class='line'> | </span>";
						}
						if($next != 0){
							echo "<div class='next'>";
							echo l("Next","node/".$next,array( 'html' => FALSE,'fragment' => 'procedure_overview'));
							echo "</div>";
						}  
					} 
			?>
			<div class="clear-block"></div>
			</div>
			<div class="clear-block"></div>
		</div>-->
		<div class="clear-block"></div>
	</div>
	<a name="procedure_faq">&nbsp;</a>
	<div class="procedure-faq">
		<?php if($node->field_procedure_faq_question[LANGUAGE_NONE][0]['value']){?>
			<h2 class="second-title">FREQUENTLY ASKED QUESTIONS</h2>
			<div class="procedure-faq-inner">
				<div id="accordion">
			<?php for( $i = 0; $i < count($node->field_procedure_faq_question[LANGUAGE_NONE]); $i++) {?>
				<h3><?php echo $node->field_procedure_faq_question[LANGUAGE_NONE][$i]['value']; ?></h3>
				 <div>
					 <div class="procedure-faq-item">		
						<div class="procedure-faq-a">
							<?php echo $node->field_procedure_faq_answer[LANGUAGE_NONE][$i]['value']; ?>
						</div>
					</div>
				 </div>
				<?php } ?>
			</div>
			</div>
		<?php }?>
	  <div class="clear-block"></div>
	</div>
	
	<a name="procedure_testimonial">&nbsp;</a>
	
	<div class="procedure-testimonial">
		
		<?php $results = views_get_view_result('procedure_testimonial',null,$node->nid); 
		     if(sizeof($results) > 0) {
		?>
		  <h2 class="second-title">TESTIMONIALS</h2>
			<?php foreach($results as $result) { 
				$nodeload = node_load($result->nid);
				?>
				<div class="gray-box">
					<div class="gray-box-header">
						<div class="gray-box-content">
							<div class="procedure-testimonial-content">
								<div class="procedure-testimonial-title">
									<span class="testimonial-title"><?php echo $nodeload->field_testimonial_patient_name[LANGUAGE_NONE][0]['value']; ?></span>
									<span class="line">from</span>
									<span class="testimonial-destination"><?php echo $nodeload->field_testimonial_location[LANGUAGE_NONE][0]['value']; ?></span>
								</div>								
								<div class="procedure-testimonial-second">
									<?php if($result->node_field_data_field_testimonial_doctor_title){
									 echo l($result->node_field_data_field_testimonial_doctor_title,'node/'.$result->node_field_data_field_testimonial_doctor_nid);
									?>
									
									
									<span> at </span>
									<?php } ?>
									
									<?php echo l($result->node_field_data_field_testimonial_facilities_title,'node/'.$result->node_field_data_field_testimonial_facilities_nid); ?>
									
								</div>
								<div class="video-testimonial-info">
									<div class="text-quote-open"><img src="<?php print $base_url; ?>/sites/all/themes/stu/images/quote1.png" /></div>
									<div class="testimonial-body-main">
										<div class="procedure-testimonial-body">
											
											<?php print render(field_view_field('node', $nodeload, 'body', array('label'=>'hidden','settings' => array())));?>
										</div>
										
										<div class="text-quote-close"><img src="<?php print $base_url; ?>/sites/all/themes/stu/images/quote2.png" /></div>
									</div>
									<div class="clear-block"></div>
								</div>
								
								
							</div>	
						</div>
					</div>
					<div class="gray-box-footer"></div>
				</div>									  
			<?php } ?>
		 <?php } ?>
	   <div class="clear-block"></div>
	</div>
 </div>

  <?php //print render($content['links']); ?>

  <?php print render($content['comments']); ?>
</article>
