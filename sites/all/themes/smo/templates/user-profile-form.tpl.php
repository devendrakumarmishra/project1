<?php
/*print 'hiiii';
print '<pre>';
print_r($form);
print '</pre>';*/
?>


				
   <div class="row">
		   <div class="pull-full"> <?php print drupal_render($form['account']['current_pass']); ?> </div>
		</div>

		<div class="row">
		   <div class="pull-full"> <?php print drupal_render($form['account']['mail']); ?> </div>
		</div>
		
		<div class="row">
		   <div class="pull-full"><?php print render($form['picture']['picture_current']); ?></div>
       <div class="pull-full"><?php print render($form['picture']['picture_upload']); ?></div>
       <div class="pull-full"><?php print render($form['picture']['picture_delete']); ?></div>
		</div>
		
	  <div class="row">
		  <div class="pull-left col"> <?php print drupal_render($form['account']['pass']['pass1']);?> </div>
		  <div class="pull-right col"> <?php print drupal_render($form['account']['pass']['pass2']);?> </div>
		</div>
		
		
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render($form['field_sg_first_name']['und'][0]['value']) ; ?> </div>
		  <div class="pull-right col"><?php print drupal_render($form['field_sg_last_name']['und'][0]['value']) ; ?> </div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render($form['field_sg_age']) ; ?> </div>
		  <div class="pull-right col"><?php print  drupal_render($form['field_sg_nationality']); ?> </div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render($form['field_sg_gender']) ; ?> </div>
		  <div class="pull-right col"><?php print drupal_render($form['field_sg_dob']); ?> </div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render($form['field_sg_height']) ; ?> </div>
		  <div class="pull-right col"><?php print drupal_render($form['field_sg_weight']); ?> </div>
		</div>
		
		<div class="row">
		  <div class="pull-full"><?php print drupal_render($form['field_sg_phone']) ; ?> </div>
		  
		</div>
			
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render($form['field_sg_suburb']) ; ?> </div>
		  <div class="pull-right col"><?php print drupal_render($form['field_sg_city']); ?> </div>
		</div>
		
		<div class="row">
			<div class="pull-full"><?php print drupal_render($form['field_sg_postal_street_address']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render($form['field_sg_region_state']); ?></div>
		  <div class="pull-right col"><?php print drupal_render($form['field_sg_postcode_zip']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render($form['field_sg_countries']); ?></div>
		  <div class="pull-right col"><?php print drupal_render($form['field_sg_passport_number']); ?></div>
		</div>

		<div class="row">
		   <div class=""><?php print drupal_render($form['actions']['submit']); ?></div>
		</div>
		
		<div class="clearfix">
			<?php print render($form['actions']);?>
		</div>
						
<?php

	print drupal_render($form['form_id']);
	print drupal_render($form['form_build_id']);
	print drupal_render($form['form_token']);
?>
	
