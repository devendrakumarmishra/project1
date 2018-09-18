<div class='procedure-group'>
<?php $results = views_get_view_result('procedure_group_list',null);  //procedure order by nid -- procedure nid order by date create
		foreach($results as $result){ 
			$nid = $result->nid;
			$node = node_load($nid);
			$title = $node->title;
			$image = $node->field_procedure_group_image[LANGUAGE_NONE][0]['filepath']; 
?>		
			<div class="procedure-gray-box <?php echo $title; ?>">
				<div class="procedure-gray-box-header">
					<div class="procedure-gray-box-content">
						<h3 class="procedure-group-title"><?php echo $title; ?></h2>
						<img src='/<?php echo $image; ?>' />
						
						<?php $procedures = views_get_view_result('procedure_related_group',null,$nid);
						$item = count($procedures);
						$count= 1;
						
						echo "<div class='procedure-list'><ul class='procedure-item'>";
						foreach($procedures as $procedure){ 
						
							echo "<li>".l($procedure->node_title,"node/".$procedure->nid)."</li>";
					
							//if($count == ceil($item/2)) {
							//	echo "</ul></div><div class='procedure-list'><ul class='procedure-item'>";
							//}
							$count++;
							// echo "<pre>";
							// print_r($procedures);
							// echo "</pre>";
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
