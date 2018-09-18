<?php
global $base_url;
?>
<p class="header-group-menu"><a href="<?php print $base_url;?>/costs/packages" <?php if(arg(1)=='73') echo "style='color:#f8912a;'"?>>PACKAGES</a></p>
<?php $results = views_get_view_result('packages',null);?>
<ul class="menu-group">
<?php foreach($results as $result){ ?>
	<?php $_nid = 'node/'.$result->nid;
		  $path = drupal_get_path_alias($_nid);
	?>	
	<li id="dest-menu-<?php echo $result->nid;?>" <?php if($result->nid == arg(1)) echo "class='active-trail'"?>><a href="<?php print $base_url;?>/<?php echo $path;?>" <?php if($result->nid == arg(1)) echo "class='active'"?>><?php echo $result->node_title;?></a></li>
<?php }?>
</ul>
<p class="header-group-menu"><a href="<?php print $base_url;?>/price-list" <?php if(arg(1)=='price-list') echo "style='color:#f8912a;'"?>>Price List</a></p>
<p class="header-group-menu"><a href="<?php print $base_url;?>/costs/specials">Specials</a></p>
<p class="header-group-menu"><a href="<?php print $base_url;?>/costs/finance">Finance</a></p>
