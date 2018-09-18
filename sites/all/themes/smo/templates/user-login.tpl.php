<p style="margin-left:15px;">Take the next step to make your dream come true!</p>
<div id="login-panel">
	<div class="login-header-box">
		<div id="block-email"><?php print render($form["name"]); ?></div>
		<div id="block-pwd"><?php print render($form["pass"]); ?></div>	
		<div id="block-forgetpwd">
			 <?php print l(t('Forgot password?') ,'user/password', array('attributes' => array('id' => 'forget-pwd'))); ?>
		</div>
		<div class="block-login"><?php print drupal_render($form['actions']); ?></div>
	</div>
	<div class="login-footer-box">
	</div>
</div>
<?php
  print drupal_render($form['form_build_id']);
	print drupal_render($form['form_id']);
?>
