<?php
/**
 * @file
 * Theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: Node body or teaser depending on $teaser flag.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $display_submitted: whether submission information should be displayed.
 * - $submitted: Themed submission information output from
 *   theme_node_submitted().
 * - $links: Themed links like "Read more", "Add new comment", etc. output
 *   from theme_links().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 *   The following applies only to viewers who are registered users:
 *   - node-by-viewer: Node is authored by the user currently viewing the page.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $build_mode: Build mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $build_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * The following variable is deprecated and will be removed in Drupal 7:
 * - $picture: This variable has been renamed $user_picture in Drupal 7.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see zen_preprocess()
 * @see zen_preprocess_node()
 * @see zen_process()
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix">
  <?php print $user_picture; ?>

  <?php if ($title): ?>
    <h1 class="title node-title"><?php print $title; ?></h1>
  <?php endif; ?>
  <?php 
  	$sql = "SELECT 	node.nid 
            FROM node , content_type_doctor
            WHERE type = 'doctor' AND status = 1 AND node.nid = content_type_doctor.nid
            ORDER BY content_type_doctor.field_doctor_type_value DESC, content_type_doctor.field_doctor_facility_nid ASC , node.title ASC ;";    //procedure order by nid -- procedure nid order by date create
	
	$query = db_query($sql);
    $prev = 0;
    $next = 0;
    $stop = false;
			
   while($result = db_fetch_object($query)){
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
								echo l("Previous Surgeon","node/".$prev,array( 'html' => FALSE,'fragment' => 'procedure_overview'));
								echo "</div>";
							}
							if($prev != 0 && $next != 0) {
								echo "<span class='line'> | </span>";
							}
							if($next != 0){
								echo "<div class='next'>";
								echo l("Next Surgeon","node/".$next,array( 'html' => FALSE,'fragment' => 'procedure_overview'));
								echo "</div>";
							}  
						} 
				?>
				<div class="clear-block"></div>
				</div>
				<div class="clear-block"></div>

  <?php if ($unpublished): ?>
    <div class="unpublished"><?php print t('Unpublished'); ?></div>
  <?php endif; ?>

  <?php if ($display_submitted || $terms): ?>
    <div class="meta">
      <?php if ($display_submitted): ?>
        <span class="submitted">
          <?php print $submitted; ?>
        </span>
      <?php endif; ?>

      <?php if ($terms): ?>
        <div class="terms terms-inline"><?php print $terms; ?></div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  
  <!-- NEXT / PREV -->	

  <div class="content">
    <!--?php print $content; ?-->
	<div class="doctor-facility">
		<?php if($node->field_doctor_facility[0]['view']) { ?>
			<?php echo $node->field_doctor_facility[0]['view']; ?> 
		<?php } ?>
		<?php if($node->field_doctor_active[0]['view']) { ?>
			(<?php echo $node->field_doctor_active[0]['view']; ?>)
		<?php } ?>
	</div>
	<div class="doctor-image">
		<?php echo $node->field_doctor_image[0]['view']; ?>
	</div>
	<div class="doctor-content-right">
		<div class="doctor-resume">
			<?php if($node->field_doctor_resume[0]['filepath']) { ?>
				<a id="download-pdf" href="/<?php echo $node->field_doctor_resume[0]['filepath']; ?>" target="_blank">Download CV</a>
			<?php } ?>
		</div>
		<div class="doctor-body">
			<?php echo $node->content[body]['#value']; ?>
		</div>
		<!--<div class="doctor-education">
			<?php if($node->field_doctor_education[0]['view']) { ?>
				<h3>EDUCATIONAL BACKGROUND</h3>
				<?php for($i=0;$i<count($node->field_doctor_education);$i++) {?>
					<?php echo $node->field_doctor_education[$i]['view']; ?><br />
				<?php } ?>
			<?php } ?>
		</div>-->
		<!--<div class="doctor-awards">
			<?php if($node->field_doctor_award[0]['view']) { ?>
				<h3>Honours/Awards</h3>
				<?php for($i=0;$i<count($node->field_doctor_award);$i++) {?>
					<?php echo $node->field_doctor_award[$i]['view']; ?><br />
				<?php } ?>
			<?php } ?>
		</div>
		<div class="doctor-research">
			<?php if($node->field_doctor_research[0]['view']) { ?>
				<h3>Research</h3>
				<?php for($i=0;$i<count($node->field_doctor_research);$i++) {?>
					<?php echo $node->field_doctor_research[$i]['view']; ?><br />
				<?php } ?>
			<?php } ?>
		</div>
		<div class="doctor-specialty">
			<?php if($node->field_doctor_specialty[0]['view']) { ?>
				<h3>SPECIALTY TRAINING</h3>
				<?php for($i=0;$i<count($node->field_doctor_specialty);$i++) {?>
					<?php echo $node->field_doctor_specialty[$i]['view']; ?><br />
				<?php } ?>
			<?php } ?>
		</div>
		<div class="doctor-fellowship">
			<?php if($node->field_doctor_fellowship[0]['view']) { ?>
				<h3>MEMBERSHIP, SPECIALTY BOARDS & FELLOWSHIP</h3>
				<?php for($i=0;$i<count($node->field_doctor_fellowship);$i++) {?>
					<?php echo $node->field_doctor_fellowship[$i]['view']; ?><br />
				<?php } ?>
			<?php } ?>
		</div>
		<div class="doctor-conference">
			<?php if($node->field_doctor_conferences[0]['view']) { ?>
				<h3>Conferences Attended</h3>
				<?php for($i=0;$i<count($node->field_doctor_conferences);$i++) {?>
					<?php echo $node->field_doctor_conferences[$i]['view']; ?><br />
				<?php } ?>
			<?php } ?>
		</div>-->
	</div>
	<div class="clear-block"></div>
	<!--<div class="doctor-training">
		<?php if($node->field_doctor_training[0]['view']) { ?>
			<h3>INTERNATIONAL TRAINING/SEMINARS ATTENDED</h3>
			<?php for($i=0;$i<count($node->field_doctor_training);$i++) {?>
				<?php echo $node->field_doctor_training[$i]['view']; ?><br />
			<?php } ?>
		<?php } ?>
	</div>
	<div class="doctor-work">
		<?php if($node->field_doctor_work[0]['view']) { ?>
			<h3>WORK EXPERIENCE</h3>
			<?php for($i=0;$i<count($node->field_doctor_work);$i++) {?>
				<?php echo $node->field_doctor_work[$i]['view']; ?><br />
			<?php } ?>
		<?php } ?>
	</div>
	<div class="doctor-graduate">
		<?php if($node->field_doctor_graduate[0]['view']) { ?>
			<h3>POST-GRADUATE ATTENDANCE</h3>
			<?php for($i=0;$i<count($node->field_doctor_graduate);$i++) {?>
				<?php echo $node->field_doctor_graduate[$i]['view']; ?><br />
			<?php } ?>
		<?php } ?>
	</div>
	<div class="doctor-cases">
		<?php //if($node->field_doctor_graduate[0]['view']) { ?>
			<h3>NUMBER OF CASES PERFORMED</h3>
			<?php for($i=0;$i<count($node->field_doctor_cases);$i++) {?>
				<?php echo $node->field_doctor_cases[$i]['view']; ?><br />
			<?php } ?>
		<?php //} ?>
	</div>-->
		<!--<div class="doctor-language">
			<?php if($node->field_doctor_languages[0]['view']) { ?>
				<h3>Languages</h3>
				<?php for($i=0;$i<count($node->field_doctor_languages);$i++) {?>
					<?php echo $node->field_doctor_languages[$i]['view']; ?><br />
				<?php } ?>
			<?php } ?>
		</div>-->
		<div class="doctor-page-bottom">
				<div class="doctor-view-testimonial">
					<!--<a id="view-testimonial" href="/whatclientssay/written">TESTIMONIALS</div>-->

					<?php $results = views_get_view_result('doctor_testimonial',null,$nid); 
					if($results){
						echo '<div class="doctor-view-testimonial-title"><h3>TESTIMONIALS</h3></div>';
					}
					?>
					<?php foreach($results as $result){ ?>
					<?php $node = node_load($result->nid);?>
					<?php foreach($node->field_testimonial_procedures as $procedure_id){
						  
						  $pcd_id = 'node/'.$procedure_id[nid];
						  $path = drupal_get_path_alias($pcd_id);
						  
						  $title = node_load($procedure_id[nid]);				  
						  $pcd_name = $title->title;
						  //bug
						  //$pcd = ($pcd)?$pcd.', <a href="/'.$path.'">'.$pcd_name.'</a>':'<a href="/'.$path.'">'.$pcd_name.'</a>';
						  $pcd = "<a href= '/".$path."'>".$pcd_name."</a>";
					 }?>
						<div class="gray-box">
							<div class="gray-box-header">
								<div class="gray-box-content">
									<div class="procedure-testimonial-content">
										<div class="procedure-testimonial-title">
											<span class="testimonial-title"><?php echo $result->node_data_field_testimonial_patient_name_field_testimonial_patient_name_value; ?></span>
											<span class="line">from</span>
											<span class="testimonial-destination"><?php echo $result->node_data_field_testimonial_patient_name_field_testimonial_location_value; ?></span>
										</div>								
										<div class="procedure-testimonial-second">
											<?php echo $pcd; ?>
											<!--<span class="line">|</span>-->
											<?php //echo $result->node_node_data_field_testimonial_doctor_title; ?>
										</div>
										<div class="video-testimonial-info">
										<div class="text-quote-open"><img src="/sites/all/themes/stu/images/quote1.png" /></div>
										<div class="testimonial-body-main">
											<div class="procedure-testimonial-body">
												<?php echo $result->node_revisions_body; ?>
											</div>
											<div class="procedure-testimonial-longbody">
												<?php echo $result->node_data_field_testimonial_patient_name_field_testimonial_long_body_value; ?>
											</div>
											<div class="text-quote-close"><img src="/sites/all/themes/stu/images/quote2.png" /></div>
										</div>
										<div class="clear-block"></div>
										</div>
										<?php if($result->node_data_field_testimonial_patient_name_field_testimonial_long_body_value){?>
										<div class="view-more">
											<a class="view-more-a" href="javascript:void(0);">view more</a>
										</div>
										<?php }?>
									</div>	
								</div>
							</div>
							<div class="gray-box-footer"></div>
						</div>									  
					<?php } ?>
					
				</div>
				<!--<div class="live-online">
					<a id="live-online" href="javascript:void(0);"></a>
				</div>-->
				<?php
					//block name: live-online
					//$block = module_invoke('block', 'block', 'view', 16);
					//print $block['content'];
				?>
		</div>
		<div class="clear-block"></div>
 	</div>

  <?php print $links; ?>
</div><!-- /.node -->
