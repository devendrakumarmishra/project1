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

  <?php if (!$page && $title): ?>
    <h2 class="title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>

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
  <?php 
  	$sql = "SELECT 	node.nid
            FROM node , content_type_procedure
            WHERE type = 'procedure' AND status = 1 AND node.nid = content_type_procedure.nid
            ORDER BY content_type_procedure.field_procedure_group_nid ASC , node.created ASC ;";    //procedure order by nid -- procedure nid order by date create
	
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
  <div class="content">
    <!--?php print $content; ?-->
	<div class="procedure-overview">
		<h2 class="second-title">PROCEDURE OVERVIEW</h2>
		<div class="procedure-banner">
			<?php if($node->field_procedure_banner[0]['filepath']) { ?>
			<img src="/<?php echo $node->field_procedure_banner[0]['filepath'] ?>" />
			<?php } ?>
		</div>
		<div class="procedure-detail">
			<?php if($node->title) { ?>
			<p><span class="dark-gray">Surgery: </span>
			<?php 
			echo $node->title." ";
			if($node->field_procedure_alternative_name[0]['value']){
			echo "(".$node->field_procedure_alternative_name[0]['value'].")";
			}
			?></p>
			<?php }
			/*if($node->field_procedure_duration[0]['value'])  { ?>
			<p><span class="dark-gray">Time required: </span><?php echo $node->field_procedure_duration[0]['value'] ?></p>
			<?php } if($node->field_procedure_anaesthesia[0]['value'])  { ?>
			<p><span class="dark-gray">Anaesthesia: </span><?php echo $node->field_procedure_anaesthesia[0]['value'] ?></p>
			<?php } if($node->field_procedure_hospital_stay[0]['value'])  { ?>
			<p><span class="dark-gray">Hospital stay: </span><?php echo $node->field_procedure_hospital_stay[0]['value'] ?></p>
			<?php } if($node->field_procedure_follow_up[0]['value'])  { ?>
			<p><span class="dark-gray">Follow up: </span><?php echo $node->field_procedure_follow_up[0]['value'] ?></p>
			<?php } */?>
		</div>
		<div class="procedure-body">
			<!--<h3>Procedure</h3>-->
			<?php echo $node->content['body']['#value'] ?>
		</div>
		<div class="procedure-facility">			
			<?php 
				$procedure_facilities_nid = "";
				$f_nid = $node->field_procedure_facilities;
				foreach($f_nid as $fid) {    //$fid is mean  facilities node id				
					$procedure_facilities_nid = ($procedure_facilities_nid)?$procedure_facilities_nid.','.$fid['nid']:$fid['nid'];
					//$procedure_facilities_nid .= $fid['nid'].",";
				}				
				//$procedure_facilities_nid = substr($procedure_facilities_nid,0,strlen($procedure_facilities_nid)-1); //remove last ","
				
				$results = views_get_view_result('procedure_facilities',null, $procedure_facilities_nid);
			?>
			<?php if(count($results)>0){?>
			<h3>This Procedure is available at:</h3>
				<?php
					echo "<ul>";
					foreach($results as $result){
						echo "<li>".l($result->node_title." - ".$result->node_node_data_field_facilities_destination_title,"node/".$result->nid)."</li>";
					}
					echo "</ul>";
				?>
			<?php }?>
		</div>
		<div class="precedure-page-bottom">
			
			<div class="procedure-next-prev">
			<?php	if($prev != 0 || $next != 0) {
						if($prev != 0){
							echo "<div class='previous'>";
							echo l("Previous Procedure","node/".$prev,array( 'html' => FALSE,'fragment' => 'procedure_overview'));
							echo "</div>";
						}
						if($prev != 0 && $next != 0) {
							echo "<span class='line'> | </span>";
						}
						if($next != 0){
							echo "<div class='next'>";
							echo l("Next Procedure","node/".$next,array( 'html' => FALSE,'fragment' => 'procedure_overview'));
							echo "</div>";
						}  
					} 
			?>
			<div class="clear-block"></div>
			</div>
			<?php
				//block name: live-online
				//$block = module_invoke('block', 'block', 'view', 16);
				//print $block['content'];
			?>			
			<div class="clear-block"></div>
		</div>
		<div class="clear-block"></div>
	</div>
	<div class="procedure-before-after">
		<h2 class="second-title">BEFORE & AFTER</h2>
		<?php for($i=0;$i<count($node->field_procedure_before_after);$i++) { ?>
					<div class='procedure-before-after-image'>
						<img src="/<?php echo $node->field_procedure_before_after[$i]['filepath']?>"/>
					</div>
					<div class='procedure-before-after-text'>
						<span class='procedure-before'>Before</span><span class='procedure-after'>After</span>
					</div>
		<?php } ?>
		<div class="precedure-page-bottom">
		<!--	<div class="live-online">
				<a id="live-online" href="javascript:void(0);"></a>
			</div>  -->
			<div class="procedure-next-prev">
			<?php	if($prev != 0 || $next != 0) {
						if($prev != 0){
							echo "<div class='previous'>";
							echo l("Previous Procedure","node/".$prev,array( 'html' => FALSE,'fragment' => 'procedure_overview'));
							echo "</div>";
						}
						if($prev != 0 && $next != 0) {
							echo "<span class='line'> | </span>";
						}
						if($next != 0){
							echo "<div class='next'>";
							echo l("Next Procedure","node/".$next,array( 'html' => FALSE,'fragment' => 'procedure_overview'));
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
	<div class="procedure-testimonial">
		<h2 class="second-title">TESTIMONIALS</h2>
		<?php $results = views_get_view_result('procedure_testimonial',null,$node->nid); ?>
			<?php foreach($results as $result){ ?>
				<div class="gray-box">
					<div class="gray-box-header">
						<div class="gray-box-content">
							<div class="procedure-testimonial-content">
								<div class="procedure-testimonial-title">
									<span class="testimonial-title"><?php echo $result->node_data_field_testimonial_procedures_field_testimonial_patient_name_value; ?></span>
									<span class="line">from</span>
									<span class="testimonial-destination"><?php echo $result->node_data_field_testimonial_procedures_field_testimonial_location_value; ?></span>
								</div>								
								<div class="procedure-testimonial-second">
									<?php if($result->node_node_data_field_testimonial_doctor_title){
									 echo l($result->node_node_data_field_testimonial_doctor_title,'node/'.$result->node_node_data_field_testimonial_doctor_nid);
									?>
									<!--?php echo $result->node_node_data_field_testimonial_doctor_title; ?-->
									<!--?php echo $result->node_node_data_field_testimonial_doctor_nid; ?-->
									
									<span> at </span>
									<?php } ?>
									
									<?php echo l($result->node_node_data_field_testimonial_facilities_title,'node/'.$result->node_node_data_field_testimonial_facilities_nid); ?>
									<!--?php echo $result->node_node_data_field_testimonial_facilities_title; ?-->
									<!--?php echo $result->node_node_data_field_testimonial_facilities_nid; ?-->
								</div>
								<div class="video-testimonial-info">
									<div class="text-quote-open"><img src="/sites/all/themes/stu/images/quote1.png" /></div>
									<div class="testimonial-body-main">
										<div class="procedure-testimonial-body">
											<!--<a href="/whatclientssay/written#T<?php //echo $result->nid; ?>"><?php //echo trim_text($result->node_revisions_body,250); ?></a>-->
											<?php echo $result->node_revisions_body; ?>
										</div>
										<!--<div class="procedure-testimonial-longbody">
											<?php //echo $result->node_data_field_testimonial_procedures_field_testimonial_long_body_value; ?>
										</div>-->
										<div class="text-quote-close"><img src="/sites/all/themes/stu/images/quote2.png" /></div>
									</div>
									<div class="clear-block"></div>
								</div>
								<!--<div class="view-more">
									<a class="view-more-a" href="javascript:void(0);">view more</a>
								</div>-->
								
							</div>	
						</div>
					</div>
					<div class="gray-box-footer"></div>
				</div>									  
			<?php } ?>
		<div class="precedure-page-bottom">
		<!--	<div class="live-online">
				<a id="live-online" href="javascript:void(0);"></a>
			</div>  -->
			<div class="procedure-next-prev">
			<?php	if($prev != 0 || $next != 0) {
						if($prev != 0){
							echo "<div class='previous'>";
							echo l("Previous Procedure","node/".$prev,array( 'html' => FALSE,'fragment' => 'procedure_overview'));
							echo "</div>";
						}
						if($prev != 0 && $next != 0) {
							echo "<span class='line'> | </span>";
						}
						if($next != 0){
							echo "<div class='next'>";
							echo l("Next Procedure","node/".$next,array( 'html' => FALSE,'fragment' => 'procedure_overview'));
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
	<div class="procedure-faq">
		<h2 class="second-title">FREQUENTLY ASKED QUESTIONS</h2>
		<?php if($node->field_procedure_faq_question[0]['view']){?>
			<div class="procedure-faq-inner">
			<?php for($i=0;$i<count($node->field_procedure_faq_question);$i++) {?>
				<div class="procedure-faq-item">		
					<div class="procedure-faq-q">
						<a class="faq-question"><?php echo $node->field_procedure_faq_question[$i]['view']; ?></a>
					</div>
					<div class="procedure-faq-a">
						<?php echo $node->field_procedure_faq_answer[$i]['view']; ?>
					</div>
				</div>
				
			<?php } ?>
			</div>
		<?php }?>
		<div class="precedure-page-bottom">
			<!--<div class="live-online">
				<a id="live-online" href="javascript:void(0);"></a>
			</div> -->
			<?php
				//block name: live-online
				//$block = module_invoke('block', 'block', 'view', 16);
				//print $block['content'];
			?>
			<div class="procedure-next-prev">
			<?php	if($prev != 0 || $next != 0) {
						if($prev != 0){
							echo "<div class='previous'>";
							echo l("Previous Procedure","node/".$prev,array( 'html' => FALSE,'fragment' => 'procedure_overview'));
							echo "</div>";
						}
						if($prev != 0 && $next != 0) {
							echo "<span class='line'> | </span>";
						}
						if($next != 0){
							echo "<div class='next'>";
							echo l("Next Procedure","node/".$next,array( 'html' => FALSE,'fragment' => 'procedure_overview'));
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
	
	<pre>
	<!--?php print_r($node) ?-->
	</pre>
	
  </div>

  <?php print $links; ?>
</div><!-- /.node -->
