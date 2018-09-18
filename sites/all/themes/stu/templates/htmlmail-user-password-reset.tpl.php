<?php

/**
 * @file
 * Sample template for sending user password reset messages with HTML Mail
 *
 * The following variables are available in this template:
 *
 *  - $message_id: The email message id, which is 'user_password_reset'
 *  - $module: The sending module, which is 'user'.
 *  - $key: The user email action, which is 'password_reset'.
 *  - $headers: An array of email (name => value) pairs.
 *  - $from: The configured sender address.
 *  - $to: The recipient email address.
 *  - $subject: The message subject line.
 *  - $body: The formatted message body.
 *  - $language: The language object for this message.
 *  - $params: An array containing the following keys:
 *    - account: The user object whose password is being requested, which
 *      contains the following useful properties:
 *      - uid: The user-id number.
 *      - name: The user login name.
 *      - mail: The user email address.  Should be the same as $to.
 *      - theme: The user-chosen theme, or a blank string if unset.
 *      - signature: The user signature block.
 *      - signature_format: The text input filter used to format the signature.
 *      - created: Account creation date, as a unix timestamp.
 *      - access: Account access date, as a unix timestamp.
 *      - login: Account login date, as a unix timestamp.
 *      - status: Integer 0 = disabled; 1 = enabled.
 *      - timezone: User timezone, or NULL if unset.
 *      - language: User language, or blank string if unset.
 *      - picture: Path to user picture, or blank string if unset.
 *      - init: The email address used to initially register this account.
 *      - data: User profile data, as a serialized string.
 *      - roles: Array of roles assigned to this user, as (rid => role_name)
 *        pairs.
 *  - $template_path: The relative path to the template directory.
 *  - $template_url: The absolute url to the template directory.
 *  - $theme: The name of the selected Email theme.
 *  - $theme_path: The relative path to the Email theme directory.
 *  - $theme_url: The absolute url to the Email theme directory.
 */
  $template_name = basename(__FILE__);
  $current_path = realpath(NULL);
  $current_len = strlen($current_path);
  $template_path = realpath(dirname(__FILE__));
  if (!strncmp($template_path, $current_path, $current_len)) {
    $template_path = substr($template_path, $current_len + 1);
  }
  $template_url = url($template_path, array('absolute' => TRUE));
  
  $url_theme = variable_get('theme_default', '');
  $url_prefix = 'http://'.$_SERVER['HTTP_HOST'];
  $email_header_image_path = $url_prefix.'/sites/all/themes/' . $url_theme . '/images/email_templates/header.jpg';
  $email_footer_image_path = $url_prefix.'/sites/all/themes/' . $url_theme . '/images/email_templates/footer.jpg';
  
?>
<div class="htmlmail-user-password-reset-body htmlmail-user-body htmlmail-body">

<table style='width:650px;font-family: lucida sans,lucida grande,tahoma,verdana,arial,sans-serif;font-size:13px;' border='0'>
	<tr><td align='center' style='padding-top:20px;'>
		<a href="<?php echo $url_prefix;?>" style='color: #198097;text-decoration: none;'>login</a><span style='color: #929898;margin-left: 10px;margin-right: 10px;'>|</span><a href="<?php echo $url_prefix.'/faqs';?>" style='color: #198097;text-decoration: none;'>FAQs</a><span style='color: #929898;margin-left: 10px;margin-right: 10px;'>|</span><a href="<?php echo $url_prefix.'/enquire-now';?>" style='color: #198097;text-decoration: none;'>Enquire Now</a><span style='color: #929898;margin-left: 10px;margin-right: 10px;'>|</span><a href="<?php echo $url_prefix.'/contact/Contact_us';?>" style='color: #198097;text-decoration: none;'>Contact us</a>
	</td></tr>
	<tr>
		<td style='padding:0;'>
			<img style='margin-top: 0px;' src="<?php echo $email_header_image_path;?>">
		</td>
	</tr>
	<tr>
		<td style='padding:20px;'>
			<?php echo "Hello ".$body; ?>
		</td>
	</tr>
	<tr>
		<td style='padding:0;'>
			<img style='margin-top: 0px;' src="<?php echo $email_footer_image_path;?>">
		</td>
	</tr>
	<tr>
		<td align='center'><p>
			<a href="<?php echo $url_prefix;?>" style='color: #198097;text-decoration: none;' onmouseover="this.style.color ='#FF6C00'" onmouseout="this.style.color ='#198097'">www.stunningmakeovers.com</a>
		</p></td>
	</tr>
</table>

	
</div>
<?php if ($debug):
  $module_template = "htmlmail-user.tpl.php";
  $message_template = 'htmlmail-user-password-reset.tpl.php';
?>
<hr />
<div class="htmlmail-user-password-reset-debug htmlmail-user-debug htmlmail-debug">
  <dl><dt><p>
    To customize your user password reset messages:
  </p></dt><dd><ol><li><p><?php if (empty($theme)): ?>
    Visit <u>admin/settings/htmlmail</u>
    and select a theme to hold your custom email template files.
  </p></li><li><p><?php elseif (empty($theme_path)): ?>
    Visit <u>admin/build/themes</u>
    to enable your selected <u><?php echo drupal_ucfirst($theme); ?></u> theme.
  </p></li><li><?php endif;
if ("$template_path/$template_name" == "$theme_path/$message_template"): ?><p>
    Edit your<br />
    <u><code><?php echo "$template_path/$template_name"; ?></code></u>
    <br />file.
  </p></li><li><?php
else:
  if (!file_exists("$theme_path/htmlmail.tpl.php")): ?><p>
    Copy<br />
    <u><code><?php echo "$module_path/htmlmail.tpl.php"; ?></code></u>
    <br />to<br />
    <u><code><?php echo "$theme_path/htmlmail.tpl.php"; ?></code></u>
  </p></li><li><?php
  endif;
  if (!file_exists("$theme_path/$module_template")): ?><p>
    For general user-module message customization, copy<br />
    <u><code><?php echo "$module_path/htmlmail.tpl.php"; ?></code></u>
    <br />to<br />
    <code><?php echo "$theme_path/$module_template"; ?></code>
  </p></li><li><?php
  endif;
  if (!file_exists("$theme_path/$message_template")): ?><p>
    Copy<br />
    <u><code><?php echo "$template_path/$template_name"; ?></code></u>
    <br />to<br />
    <u><code><?php echo "$theme_path/$message_template"; ?></code></u>.
  </p></li><li><?php endif; ?><p>
    Edit the copied file.
  </p></li><li><?php
endif; ?><p>
    Send a test message to make sure your customizations worked.
  </p></li><li><p>
    If you think your customizations would be of use to others,
    please contribute your file as a feature request in the
    <a href="http://drupal.org/node/add/project-issue/htmlmail">issue queue</a>.
  </p></li></ol></dd><dt><p>
    The user module sets the <u><code>$params</code></u> variable.
    For this message,
  </p></dt><dd><p><code><pre>
$params = <?php echo check_plain(print_r($params, 1)); ?>
  </pre></code></p></dd></dl>
</div>
<?php endif;
