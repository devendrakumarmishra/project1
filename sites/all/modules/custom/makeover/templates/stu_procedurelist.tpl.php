<div class='procedure-group'>
<?php $results = views_get_view_result('procedure_group_list',null);  //procedure order by nid -- procedure nid order by date create
		foreach($results as $result){ 
			$nid = $result->nid;
			$node = node_load($nid);
			$title = $node->title;
?>		
			<div class="procedure-gray-box <?php echo $title; ?>">
				<div class="procedure-gray-box-header">
					<div class="procedure-gray-box-content">
						<h3 class="procedure-group-title"><?php echo $title; ?></h2>
						<?php 
						  print render(field_view_field('node', $node, 'field_procedure_group_image', array('label'=>'hidden','settings' => array())));
						?>
						
						<?php $procedures = views_get_view_result('procedure_related_group', null, $nid);
						$item = count($procedures);
						$count= 1;
						
						echo "<div class='procedure-list'><ul class='procedure-item'>";
						foreach($procedures as $procedure){ 
						  echo "<li>".l($procedure->node_title, "node/".$procedure->nid)."</li>";
					    $count++;
					  } 
						
						echo "</ul></div>";
						
						?>

					</div>
				</div>
				<div class="clear-block"></div>
				<div class="procedure-gray-box-footer"></div>
			</div>
	<?php } ?>
</div>
