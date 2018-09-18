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
     </header>
  <?php endif; ?>
  
  <?php //print nl2br(variable_get('quote_welcome', '')) ;?>
  
  
  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    global $user;
	  $roles_list = array_keys($user->roles);
	  //if(in_array('2',$roles_list)){ 
			  print "<div class='separator'><span><b>These are the following information you've filled in quote form:</b></span>";
        print render($content);
        print '</div>';
	  //}
	?>
 
  
  <?php //print render($content['links']); ?>

  <?php //print render($content['comments']); ?>

</article>
