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

  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    //print render($content);
  ?>
  
  <div class="content">
	<h1 class="dest-title">Packages</h1>
    <h2 class="second-title"><?php echo $node->title;?></h2>
		<div class="packages-image">
			<?php print render($content['field_package_image']);?>
		</div>
		
		<div class="packages-price">
		  <?php print render($content['body']);?>
		</div>
		
		<?php /* ?>	
		<div class="sub-header-black">How to book</div>
		<div>
			<?php print render($content['field_package_how_to_book']);?>
		</div>
		
		<div class="sub-header-black">Package inclusions</div>
		<div class="sub-header-li">
			<?php print render($content['field_package_inclusion']);?>
		</div>
		<?php */ ?>
		
		<?php 
		$results = views_get_view_result('packages_relate_procedure', "default",$node->nid);
		if ($results) { 
		?>
		<div class="sub-header">This Procedure is available at:</div>
		<div>
			<?php echo views_embed_view("packages_relate_procedure", "default",$node->nid);?>
		</div>
		<?php } ?>
		
  </div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</article>

