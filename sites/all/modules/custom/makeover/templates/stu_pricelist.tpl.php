<div class="gray-box">
	<div class="gray-box-header">
		<div class="gray-box-content">
	<div class='pricelist-header'><span style="width:280px;float:left;">PROCEDURE</span><span style="width: 105px; float: left; text-align: right;">Bangkok from</span><span style="float: left; margin-left: 5px; width: 100px;text-align: right;">Phuket from</span></div>	
<?php $results = views_get_view_result('procedure_group_list',null);  //procedure order by nid -- procedure nid order by date create
		foreach($results as $result){ 
			$nid = $result->nid;
			$node = node_load($nid);
			$title = $node->title;
			$image = $node->field_procedure_group_image[0]['filepath']; 

?>		
	
<h3 class="pricelist-group-title"><?php echo $title;?></h3>
						<?php $procedures = views_get_view_result('procedure_related_group',null,$nid);
						
						$item = count($procedures);
						$count= 1;
						
						echo "<table width='100%' cellpadding='0' cellspacing='0'>";
						foreach($procedures as $procedure){ 
							echo "<tr>";
							$node =  node_load($procedure->nid);
							$proc_special_title = $procedure->node_data_field_procedure_group_field_procedure_price_txt_value;

							if($proc_special_title)
							{
								echo "<td width='280'><span class='procedure-name'>".l($proc_special_title,"node/".$procedure->nid)."</span></td>";
							}else
							{
								echo "<td width='280'><span class='procedure-name'>".l($procedure->node_title,"node/".$procedure->nid)."</span></td>";
							}
							echo "<td><div class='proc-price'>";
							if($node->procedure_costs[2] && $node->procedure_costs[2] > 0){
								echo "	<span id='convert' amount='".$node->procedure_costs[2]."' override='print_base:0'>". number_format($node->procedure_costs[2])."</span>";
							}else
							{
								echo "<span>POA</span>";
							}
							echo "</div></td>";
							
							echo "<td><div class='proc-price'>";
							if($node->procedure_costs[21] && $node->procedure_costs[21] > 0){
								echo "	<span id='convert' amount='".$node->procedure_costs[21]."' override='print_base:0'>". number_format($node->procedure_costs[21])."</span>";
							}else{
								echo "<span>POA</span>";
							}
							echo "</div></td>";
							$count++;
							// echo "<pre>";
							// print_r($procedures);
							// echo "</pre>";
							echo "</tr>";
						} 
						
						echo "</table>";
						
						?>
	<?php } ?> <!-- end foreach -->
		</div>
	</div>
	<div class="clear-block"></div>
	<div class="gray-box-footer"></div>
</div>
