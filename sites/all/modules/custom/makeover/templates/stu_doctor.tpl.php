<!-- LEFT MENU FOR DOCTOR DETAIL PAGE -->
<?php 
 $arg = arg();
 $data = node_load($arg[1]);
 $doctor_type = field_get_items('node', $data, 'field_doctor_type');
 $doctor_type = $doctor_type[0]['value'];
 $output = views_embed_view('surgeon_left_menus', 'block', array($doctor_type));
?>
<div class="left-navigation">
	<?php if($doctor_type == 'plastic_surgeon'): ?>
	<div class="plastic-surgeons">
		<a id="plastic-surgeons-title" href="javascript:void(0)" class="doctor-type">PLASTIC SURGEONS</a>
		<?php
		  print $output;
		?>
	</div>
	<?php endif; ?>
	
	<?php if($doctor_type == 'dental_surgeon'): ?>
	<div class="dental-surgeons">
		<a id="dental-surgeons-title" href="javascript:void(0)" class="doctor-type">DENTAL SURGEONS</a>
		 <?php
		  print $output;
		?>
	</div>
	<?php endif; ?>
</div>
