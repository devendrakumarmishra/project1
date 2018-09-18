<?php 
global $base_url;
$results = views_get_view_result('packages',null);
$i = 0;
$j = 0; 

foreach($results as $result) { 
    $node = node_load($result->nid);
    $body = field_get_items('node', $node, 'body');
    $body = $body[0]['value'];
    
    $field_innerpage_package = field_get_items('node', $node, 'field_innerpage_package');
    $field_innerpage_package = $field_innerpage_package[0]['value'];
    
    $package_id = 'node/'.$result->nid;
    $path = url(drupal_get_path_alias($package_id),array('absolute' => true));
    $custom_class = ($j%2) ? 'odd':'even';
?>
		<div class="package-gray-box <?php print $custom_class; ?>">
			<div class="package-gray-box-header">
				<div class="package-gray-box-content">
					<div class="package-title"><a href='<?php echo $path;?>'><?php echo $node->title;?></a></div>
					<div class="package-body"><?php echo $field_innerpage_package;?></div>
					<div class="package-more">
						<a href='<?php echo $path;?>' onmouseover="document.package_readmore_<?php echo $node->nid;?>.src='<?php print $base_url; ?>/sites/all/themes/stu/images/bt_readmoreOver.jpg'" onmouseout="document.package_readmore_<?php echo $result->nid;?>.src='<?php print $base_url; ?>/sites/all/themes/stu/images/bt_readmore.jpg'">
							
							<img src='<?php print $base_url; ?>/sites/all/themes/stu/images/bt_readmore.jpg' name='package_readmore_<?php echo $node->nid;?>' alt='readmore-package'>
						</a>
					</div>
					<div class="clear-block"></div>
				</div>
			</div>		
			<div class="package-gray-box-footer"></div>
			<div class="clear-block"></div>
		</div>
	   <?php 
		$i++; 
		if($i>1) $i=0;?>
 <?php $j++; 
  }
?>
