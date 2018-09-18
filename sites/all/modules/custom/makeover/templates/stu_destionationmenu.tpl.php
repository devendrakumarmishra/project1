<?php 
global $base_url;
$rows = views_get_view_result('Destination',null);?>
<?php foreach($rows as $row){ ?>
	<p class="header-group-menu"><?php 
	//echo l($row->node_title, drupal_get_path_alias('node/'. $row->nid));
	  echo l($row->node_title, drupal_get_path_alias('node/96'));
	?></p>
	<ul class="menu-group">
		<?php $results = views_get_view_result('facilities_relate_destination',null,$row->nid);?>
		<?php foreach($results as $result){ ?>
			<?php $_nid = 'node/'.$result->nid;
				  $path = url(drupal_get_path_alias($_nid),array('absolute' => true));?>
			<li id="dest-menu-<?php echo $result->nid;?>" <?php if($result->nid == arg(1)) echo "class='active-trail'"?>><a href="<?php echo $path;?>" <?php if($result->nid == arg(1)) echo "class='active'"?>><?php echo $result->node_title;?></a></li>
		<?php }?>	
	</ul>
<?php }?>
<p class="header-group-menu"><a href="<?php print $base_url;?>/accommodation">ACCOMMODATION</a></p>
