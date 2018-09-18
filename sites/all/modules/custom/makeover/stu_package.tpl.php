<p class="header-group-menu"><a href="/costs/packages" <?php if(arg(1)=='73') echo "style='color:#f8912a;'"?>>PACKAGES</a></p>
<?php $results = views_get_view_result('packages',null);?>
<ul class="menu-group">
<?php foreach($results as $result){ ?>
	<?php $_nid = 'node/'.$result->nid;
		  $path = drupal_get_path_alias($_nid);
	?>	
	<li id="dest-menu-<?php echo $result->nid;?>" <?php if($result->nid == arg(1)) echo "class='active-trail'"?>><a href="/<?php echo $path;?>" <?php if($result->nid == arg(1)) echo "class='active'"?>><?php echo $result->node_title;?></a></li>
<?php }?>
</ul>
<p class="header-group-menu"><a href="/costs/price-list" <?php if(arg(1)=='104') echo "style='color:#f8912a;'"?>>Price List</a></p>
<p class="header-group-menu"><a href="/costs/specials">Specials</a></p>
<p class="header-group-menu"><a href="/costs/finance">Finance</a></p>
