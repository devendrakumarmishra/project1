<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
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

  <div class="content">
	<h1 class="header-landing-page">Destinations</h1>
    <h2 class="second-title"><?php echo $node->title;?></h2>
    
                <?php if ($content['field_sub_title_details']): ?>
                <div class="title_details">
		   <?php print render($content['field_sub_title_details']);?>
		</div>
		<?php endif; ?>
		
		<div class="destination-image">
			<?php print render($content['field_facilities_image']);?>
		</div>
		<div class="destination-body">
			<?php print render($content['field_facilities_long_body']);?>
		</div>
		<div class="destination-sub-header">
		<?php
		  $status = false; 
			$procedure_list = '';
			$results = views_get_view_result('procedure_group_list', null);
			foreach($results as $group){
				$procedure_list .= views_embed_view("facilities_relate_procedure", "default",$node->nid,$group->nid);
				 if(count(views_get_view_result("facilities_relate_procedure", "default",$node->nid,$group->nid))>0 && !$status) {
					 $status = true;   
				 }
			}
			if($status) {
			?>
			<div class="sub-header sh-left">Available Procedures:</div>
		<?php }?>
		<?php if(count(views_get_view_result("facilities_relate_doctor", "default",$node->nid))>0){?>
			<div class="sub-header sh-right">Available Doctors:</div>
		<?php }?>
		<div class="clear-block"></div>
		</div>
		<div class="destination-list">
			<div class="destination-relate-procedure">
				<?php 
					echo $procedure_list;
				?>
			</div>
			<div class="destination-relate-doctor">
				<?php 
					echo views_embed_view("facilities_relate_doctor", "default",$node->nid);
				?>
			</div>
			<div class="clear-block"></div>
		</div>
		<div class="destination-enquire">For procedures not shown please <?php echo l("Enquire Now","node/add/quote"); ?></div>
	</div>

  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    //print render($content);
  ?>

  <?php print render($content['links']); ?>

  <?php //print render($content['comments']); ?>

</article>
