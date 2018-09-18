  <?php
  global $user,$base_url;
  ?> 
    <div class="block-menu-price">
			<a href="<?php print $base_url;?>/price-list" class="block-menu-contactus-text" style="display: inline-block;">Price List</a>
	  </div>
    <?php print render($form['group_contact_detail']['#prefix']);?>
		
	  <div class="row">
		  <div class="pull-left col"> <?php print drupal_render_children($form['group_contact_detail']['field_sg_first_name'])?> </div>
		  <div class="pull-right col"> <?php print drupal_render_children($form['group_contact_detail']['field_sg_last_name'])?> </div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_contact_detail']['field_sg_email']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_contact_detail']['field_confirm_email_address']); ?></div>
		</div>
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_contact_detail']['field_sg_phone']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_contact_detail']['field_sg_gender']); ?></div>
		</div>
	  <!--<div class="row">
		  <div class="pull-left col"> <?php print drupal_render_children($form['group_contact_detail']['field_sg_daytime_phone_number'])?> </div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_contact_detail']['field_sg_evening_phone_number']); ?> </div>
		</div>-->
		
		<!--<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_contact_detail']['field_sg_gender']); ?> </div>
		</div>-->
		
	  <div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_contact_detail']['field_sg_email']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_contact_detail']['field_sg_phone']); ?></div>
		</div>
		
		<div class="row">
			<div class="pull-full"><?php print drupal_render_children($form['group_contact_detail']['field_sg_postal_street_address']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_contact_detail']['field_sg_suburb']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_contact_detail']['field_sg_city']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_contact_detail']['field_sg_region_state']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_contact_detail']['field_sg_postcode_zip']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_contact_detail']['field_sg_countries']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_contact_detail']['field_sg_passport_number']); ?></div>
		</div>
		
		<div class="row">
		   <div class="pull-left col"><?php print drupal_render_children($form['group_contact_detail']['field_sg_prefer_contact']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_contact_detail']['field_preferred_currency']); ?></div>
	  </div>
		<?php print render($form['group_contact_detail']['#suffix']);?>  
		<?php //endif; ?>
		
		
		<div class="group_categories clearfix">
			<?php print render($form['group_categories']);?>
		</div>
		
	  <div class="group_destination clearfix">
			<?php print render($form['group_destination']);?>
		</div>
		
	  <div class="group_submit clearfix">
			<?php print render($form['group_submit']);?>
		</div>
		
		<div class="clearfix">
			<?php print render($form['captcha']);?>
		</div>
		
		<div class="clearfix">
			<?php if($user->uid == 1) {print render($form['additional_settings']);}?>
		</div>
		
		
		<div class="clearfix">
			<?php print render($form['actions']);?>
		</div>
		
		<div class="clearfix">
			<small>
			  <span class="form-required" title="This field is required.">*</span>If estimate does not arrive in your inbox within 5 minutes please check your junk or spam or call us.
			</small>
		</div>
		
		<div style="display:none;">
			<?php print drupal_render_children($form);?>
		</div>

