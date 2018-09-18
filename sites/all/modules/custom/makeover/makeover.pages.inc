<?php

function makeover_send_mail($firstname, $mail){
	$url_theme = variable_get('theme_default', '');
	$url_prefix = 'http://'.$_SERVER['HTTP_HOST'];
	$email_header_image_path = $url_prefix.'/sites/all/themes/' . $url_theme . '/images/email_templates/header.jpg';
	$email_preview_image_path = $url_prefix.'/sites/all/themes/' . $url_theme . '/images/email_templates/footer.jpg';
			 
	$subject = "Welcome to Stunning Makeover !"; 
					    
						
	$message =  "<table style='width:650px;font-family: lucida sans,lucida grande,tahoma,verdana,arial,sans-serif;font-size:13px;' border='0'>
	<tr><td align='center' colspan='2'><p style='margin-top:20px;'>
		<a href='".$url_prefix."' style='color: #198097;text-decoration: none;' onmouseover=\"this.style.color ='#FF6C00'\" onmouseout=\"this.style.color ='#198097'\">login</a>
		<span style='color: #929898;margin-left: 10px;margin-right: 10px;'>|</span>
		<a href='".$url_prefix."/register' style='color: #198097;text-decoration: none;' onmouseover=\"this.style.color ='#FF6C00'\" onmouseout=\"this.style.color ='#198097'\">Register</a>
		<span style='color: #929898;margin-left: 10px;margin-right: 10px;'>|</span>
		<a href='".$url_prefix."/faqs' style='color: #198097;text-decoration: none;' onmouseover=\"this.style.color ='#FF6C00'\" onmouseout=\"this.style.color ='#198097'\">FAQs</a>
		<span style='color: #929898;margin-left: 10px;margin-right: 10px;'>|</span>
		<a href='".$url_prefix."/enquire-now' style='color: #198097;text-decoration: none;' onmouseover=\"this.style.color ='#FF6C00'\" onmouseout=\"this.style.color ='#198097'\">Enquire Now</a>
		<span style='color: #929898;margin-left: 10px;margin-right: 10px;'>|</span>
		<a href='".$url_prefix."/contact-us' style='color: #198097;text-decoration: none;' onmouseover=\"this.style.color ='#FF6C00'\" onmouseout=\"this.style.color ='#198097'\">Contact us</a></p>
	</p></td></tr>
	<tr>
		<td colspan='2' height='177px' style='padding-left:58px; padding-right:58px; color:#000000; font-size:12px;background-repeat:no-repeat;' background='$email_header_image_path' valign='bottom'>
			<p style='margin-top:20px;color: #333333;'>Hello $firstname,<br>Thank you for your interest in Stunning Makeovers.</p>
		</td>
	</tr>
		
	<tr><td width='120' valing='top'>
		<p style='margin-left:58px;margin-top:10px;color: #333333;background-color:#ebeae2;padding:7px;'>
			<span style='color:#198097;font-style:italic;font-size:14px;'>Take the next step to make your dream come true!</span><br/><br/>
			Call us to discuss your treatment:<br/>
			<b>0800-454-453534</b>
			<br/><br/>
			Email us at:<br/>
			<a href='mailto:info@stunningmakeovers.com' style='color: #333333;text-decoration: none;'>info@stunningmakeovers.com</a>
		</p>
	</td>
	<td rowspan='3' style='padding:10px;' valign='top'> 
		<p>
		<span style='color: #FF6C00;font-size:14px;'>Your Quotation:</span>
		<table border='0' cellspacing='0' cellpadding='2'>
			<tr style='text-transform:uppercase;font-size:14px;color:#333333;'><td style='border-bottom:1px solid #333333;padding-top:10px;' width='200'>Plastic Surgery</td><td width='120' style='border-bottom:1px solid #333333;padding-top:10px;'>Price</td></tr>
			<tr style='font-size:12px;color:#198097;'><td >Rhinosphasty</td><td>from 999 AUS $</td></tr>
			<tr style='font-size:12px;color:#198097;'><td >sss</td><td>from 999 AUS $</td></tr>
		</table>
		</p>
	</td>
	</tr>
	<tr><td valing='top'>
		<p style='margin-left:58px;margin-top:10px;color: #333333;background-color:#ebeae2;padding:7px;'>
			Login to our website now to book your treatment:
			username:<br/>
			$username
			<br/><br/>
			Password:<br/>
			$pwd<br/>
		</p>
	</td></tr>
	<tr><td style='padding-left:80px;'>
		<a href='' target='_blank'><img src='/sites/all/themes/stu/images/bt_orange.png' border='0'></a>
	</td></tr>
	";
	
			
	$message .= "<tr>
					<td style='padding:0;' colspan='2'>
						<img style='margin-top: 0px;' src='$email_preview_image_path'>
					</td>
				</tr>
				<tr>
					<td align='center' colspan='2'><p>
						<a href='".$url_prefix."' style='color: #198097;text-decoration: none;' onmouseover=\"this.style.color ='#FF6C00'\" onmouseout=\"this.style.color ='#198097'\">www.stunningmakeovers.com</a>
					</p></td>
				</tr>
				</table>";
				
	$params = array(
		'subject' => $subject,
		'body' => $message,
	);
	$from = '';			   	   
	drupal_mail('htmlmail', 'htmlmail_test', $mail, language_default(), $params,$from);
}

function stu_doctor_plastic_surgeons() {
	$results = views_get_view_result('surgeons',null);
	
	foreach($results as $result){
		$doctor_nid = $result->nid;  //doctor nid
		$path = drupal_get_path_alias("node/".$doctor_nid); //doctor alias path
		$doctor_type = $result->node_data_field_doctor_type_field_doctor_type_value; //doctor type
		
		$facility_node = node_load($result->node_node_data_field_doctor_facility_nid); //doctor facility nid (hospital)
		$destination_node = node_load($facility_node->field_facilities_destination[0]['nid']); //destination nid
		
		if(!isset($doctor[$doctor_type][$destination_node->title])) {
			$doctor[$doctor_type][$destination_node->title] = array(); //new array
		}
		array_push($doctor[$doctor_type][$destination_node->title] ,$path);
	}	
	drupal_goto($doctor['plastic_surgeon']['Bangkok'][0]);

}
function stu_doctor_dental_surgeons() {
	$results = views_get_view_result('surgeons',null);
	
	foreach($results as $result){
		$doctor_nid = $result->nid;  //doctor nid
		$path = drupal_get_path_alias("node/".$doctor_nid); //doctor alias path
		$doctor_type = $result->node_data_field_doctor_type_field_doctor_type_value; //doctor type
		
		$facility_node = node_load($result->node_node_data_field_doctor_facility_nid); //doctor facility nid (hospital)
		$destination_node = node_load($facility_node->field_facilities_destination[0]['nid']); //destination nid
		
		if(!isset($doctor[$doctor_type][$destination_node->title])) {
			$doctor[$doctor_type][$destination_node->title] = array(); //new array
		}
		array_push($doctor[$doctor_type][$destination_node->title] ,$path);
	}	
	drupal_goto($doctor['dental_surgeon']['Bangkok'][0]);
}
function tlg_practice_pdf_content(){
	$content = node_load(arg(1));
	$reg_ex = "[[:space:]]";
	$replace_word = "-"; 
	$practice_name = ereg_replace($reg_ex, $replace_word, $content->title);
	$practice_name = ereg_replace("&", "", $practice_name);

	//$wk_path = $_SERVER['DOCUMENT_ROOT'].'/sites/all/modules/tlg_pdf/pdf_create/wkhtmltopdf';
	//$wk_path = $_SERVER['DOCUMENT_ROOT'].'/wkhtmltopdf/wkhtmltopdf-i386';     // for unixy
	$wk_path = $_SERVER['DOCUMENT_ROOT'].'/wkhtmltopdf/wkhtmltopdf';				//for window
	
	$template_path = $_SERVER['HTTP_HOST'].'/practice-pdf-create/'.arg(1);
	$destination_path = $_SERVER['DOCUMENT_ROOT'].'/sites/default/files/pdf-content/Tilleke-'.$practice_name.'.pdf';
	
	$update_date = $content->changed;

	exec($wk_path.' -B 20 -L 0 -R 0 -T 20 --header-html  "'.$_SERVER['HTTP_HOST'].'/sites/all/modules/tlg_pdf/pdf_create/header_template.php" --footer-html  "'.$_SERVER['HTTP_HOST'].'/sites/all/modules/tlg_pdf/pdf_create/footer_template.php?update_date='.$update_date.'" '.$template_path.' '.$destination_path);

	$filename = $_SERVER['DOCUMENT_ROOT'].'/sites/default/files/pdf-content/Tilleke-'.$practice_name.'.pdf';
	header("Pragma: public");
	header("Expires: 0");
	header("Pragma: no-cache");
	header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
	//header('Content-disposition: attachment; filename=' . basename($filename));
	header("Content-Type: application/pdf");
	header("Content-Transfer-Encoding: binary");
	header('Content-Length: ' . filesize($filename));
	@readfile($filename);

}
function tlg_professional_pdf_content(){
	$content = node_load(arg(1));
	
	$reg_ex = "[[:space:]]";
	$replace_word = "-"; 
	$professional_name = ereg_replace($reg_ex, $replace_word, $content->title);

	//$wk_path = $_SERVER['DOCUMENT_ROOT'].'/sites/all/modules/tlg_pdf/pdf_create/wkhtmltopdf';
	//$wk_path = $_SERVER['DOCUMENT_ROOT'].'/wkhtmltopdf/wkhtmltopdf-i386';     // for unix
	$wk_path = $_SERVER['DOCUMENT_ROOT'].'/wkhtmltopdf/wkhtmltopdf';				//for window
	
	$template_path = $_SERVER['HTTP_HOST'].'/professional-pdf-create/'.arg(1);
	$destination_path = $_SERVER['DOCUMENT_ROOT'].'/sites/default/files/pdf-content/Tilleke-'.$professional_name.'.pdf';
	
	$update_date = $content->changed;
	//echo exec('whoami');exit;
	exec($wk_path.' -B 20 -L 0 -R 0 -T 20 --header-html  "'.$_SERVER['HTTP_HOST'].'/sites/all/modules/tlg_pdf/pdf_create/header_template.php" --footer-html  "'.$_SERVER['HTTP_HOST'].'/sites/all/modules/tlg_pdf/pdf_create/footer_template.php?update_date='.$update_date.'"  '.$template_path.' '.$destination_path);
	
	$filename = $_SERVER['DOCUMENT_ROOT'].'/sites/default/files/pdf-content/Tilleke-'.$professional_name.'.pdf';
	header("Pragma: public");
	header("Expires: 0");
	header("Pragma: no-cache");
	header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
	//header('Content-disposition: attachment; filename=' . basename($filename));
	header("Content-Type: application/pdf");
	header("Content-Transfer-Encoding: binary");
	header('Content-Length: ' . filesize($filename));
	@readfile($filename);

}

function tlg_create_practice_pdf(){
}
function tlg_create_professional_pdf(){
}

/**
 * Generate a PDF version of the printer-friendly page
 *
 * @see print_controller()
 * @see _print_pdf_dompdf()
 * @see _print_pdf_tcpdf()
 */
function makeover_pdf_controller() {
	global $base_url;
  require_once(drupal_get_path('module', 'print') .'/print.pages.inc');
  require_once(drupal_get_path('module', 'print') .'/print_pdf/print_pdf.pages.inc');
  
	// Disable caching for generated PDFs, as Drupal doesn't ouput the proper headers from the cache
  $GLOBALS['conf']['cache'] = FALSE;

  $args = func_get_args();
  $path = filter_xss(implode('/', $args));
  $cid = isset($_GET['comment']) ? (int)$_GET['comment'] : NULL;

  // Handle the query
  $query = $_GET;
  unset($query['q']);

  if (!empty($path)) {
    if ($alias = drupal_lookup_path('source', $path)) {
      // Alias
      $path_arr = explode('/', $alias);
      $node = node_load($path_arr[1]);
    }
    elseif (ctype_digit($args[0])) {
      // normal nid
      $node = node_load($args[0]);
    }
  
    $pdf_filename = variable_get('print_pdf_filename', PRINT_PDF_FILENAME_DEFAULT);
    $pdf_filename = $node->nid;
    if (!empty($pdf_filename) && !empty($node)) {
      $pdf_filename = token_replace($pdf_filename, array('node' => $node), array('clear' => TRUE));
    }
    else {
      $pdf_filename = token_replace($pdf_filename, array('site'), array('clear' => TRUE));
      if (empty($pdf_filename)) {
        // If empty, use a fallback solution
        $pdf_filename = str_replace('/', '_', $path);
      }
    }
  }
  else {
    $pdf_filename = 'page';
  }

  if (function_exists('transliteration_clean_filename')) {
    $pdf_filename = transliteration_clean_filename($pdf_filename, language_default('language'));
  }

  drupal_alter('print_pdf_filename', $pdf_filename, $path);
  
  
  $pdf = print_pdf_generate_path($path, $query, $cid, $pdf_filename . '.pdf');
  if ($pdf == NULL) {
    drupal_goto($path);
    exit;
  }
 
  $nodepath = (isset($node->nid)) ? 'node/' . $node->nid : drupal_get_normal_path($path);
  db_merge('print_pdf_page_counter')
    ->key(array('path' => $nodepath))
    ->fields(array(
        'totalcount' => 1,
        'timestamp' => REQUEST_TIME,
    ))
    ->expression('totalcount', 'totalcount + 1')
    ->execute();

  drupal_exit();
}

/**
 * Generate the PDF file using the dompdf library
 *
 * @param $print
 *   array containing the configured data
 * @param $html
 *   contents of the post-processed template already with the node data
 * @param $filename
 *   name of the PDF file to be generated
 * @see print_pdf_controller()
 */
function _makeover_pdf_dompdf($print, $html, $filename, $node) {
  $print_pdf_pdf_tool = variable_get('print_pdf_pdf_tool', PRINT_PDF_PDF_TOOL_DEFAULT);
  $print_pdf_paper_size = variable_get('print_pdf_paper_size', PRINT_PDF_PAPER_SIZE_DEFAULT);
  $print_pdf_page_orientation = variable_get('print_pdf_page_orientation', PRINT_PDF_PAGE_ORIENTATION_DEFAULT);
  $print_pdf_content_disposition = variable_get('print_pdf_content_disposition', PRINT_PDF_CONTENT_DISPOSITION_DEFAULT);

  if (variable_get('print_pdf_autoconfig', PRINT_PDF_AUTOCONFIG_DEFAULT)) {
    define("DOMPDF_ENABLE_PHP", FALSE);
    define("DOMPDF_ENABLE_REMOTE", TRUE);
    define("DOMPDF_TEMP_DIR", file_directory_temp());
    define("DOMPDF_UNICODE_ENABLED", variable_get('print_pdf_dompdf_unicode', PRINT_PDF_DOMPDF_UNICODE_DEFAULT));
  }

  require_once($print_pdf_pdf_tool);
  if (function_exists('spl_autoload_register')) {
    spl_autoload_register('DOMPDF_autoload');
  }

  // Try to use local file access for image files
  $html = _print_pdf_file_access_images($html);

  // dompdf seems to have problems with something in system.css so let's not use it
  $html = preg_replace('!<link.*?modules/system/system.css.*?/>!', '', $html);

  $url_array  = parse_url($print['url']);

  $protocol = $url_array['scheme'] .'://';
  $host = $url_array['host'];
  $path = dirname($url_array['path']) .'/';

  $dompdf = new DOMPDF();
  $dompdf->set_base_path($path);
  $dompdf->set_host($host);
  $dompdf->set_paper(drupal_strtolower($print_pdf_paper_size), $print_pdf_page_orientation);
  $dompdf->set_protocol($protocol);

// dompdf can't handle footers cleanly, so disable the following
//  $html = theme('print_pdf_dompdf_footer', $html);

  // If dompdf Unicode support is disabled, try to convert to ISO-8859-1 and then to HTML entities
  if (!variable_get('print_pdf_dompdf_unicode', PRINT_PDF_DOMPDF_UNICODE_DEFAULT)) {
  // Convert the euro sign to an HTML entity
  $html = str_replace('€', '&#0128;', $html);

  // Convert from UTF-8 to ISO 8859-1 and then to HTML entities
  if (function_exists('utf8_decode')) {
    $html = utf8_decode($html);
  }
// iconv fails silently when it encounters something that it doesn't know, so don't use it
//  else if (function_exists('iconv')) {
//    $html = iconv('UTF-8', 'ISO-8859-1', $html);
//  }
  elseif (function_exists('mb_convert_encoding')) {
    $html = mb_convert_encoding($html, 'ISO-8859-1', 'UTF-8');
  }
  elseif (function_exists('recode_string')) {
    $html = recode_string('UTF-8..ISO_8859-1', $html);
  }
  $html = htmlspecialchars_decode(htmlentities($html, ENT_NOQUOTES, 'ISO-8859-1'), ENT_NOQUOTES);
  }

  //must get rid of tbody (dompdf goes into recursion)
  $html = preg_replace('!<tbody[^>]*?>|</tbody>!i', '', $html);

  $dompdf->load_html($html);

  $dompdf->render();
  $contents = $dompdf->output();
  // The private-pdfs directory has a .htaccess file that prohibits access except via php script
  $filename = str_replace(array(' ', '&'), '', $filename);
  $filepath = file_directory_path().'/private-pdfs/'. $node->nid;
  if (!file_exists($filepath)) @mkdir($filepath, 0777);
  $filepath = $filepath .'/'. $filename;
  file_put_contents($filepath, $contents);
  if (file_exists($filepath)) watchdog('makeover', 'pdf created '.$filepath);
  else watchdog('makeover', 'pdf not created '.$filepath);
  return $filepath;
}
/*
 *  Form function to send surgeon form
 */
function makeover_send_surgeon_form($form_state, $nid) {
  $form['send'] = array(
    '#type' => 'submit',
	  '#value' => 'Send form'
  );
  $form['node_nid'] = array(
    '#type' => 'hidden',
	  '#value' => $nid
  );
  return $form;
}


/**
 * Attach pdf & send mail
 */
function makeover_send_surgeon_form_submit($form, &$form_state) {
  
  $form_state['#redirect'] = 'makeover/pdf/'. $nid;
  
  $nid = $form_state['build_info']['args'][0];
  $node = node_load($nid);
  
  $field_sg_email = field_get_items('node', $node, 'field_sg_email');
  $field_sg_email = $field_sg_email[0]['email'];
  
  $attachments = array();
  $attachments[] = array(
    'filename' => $node->nid . '.pdf',
	  'filepath' => variable_get('file_public_path','') .'/surgeons/'  . $node->nid . '.pdf',
  );
  
  $field_sg_images = field_get_items('node', $node, 'field_sg_images');
  foreach ($field_sg_images as $image) {
		$uri = $image['uri'];
		$imagePath = image_style_url('attachment', $uri);
		$filename = $image['filename'];
    //$imagePath =  file_create_url($uri);
  
		$attachments[] = array(
				'filename' => $filename,
				'filepath' =>  $imagePath, 
		);
	}
	// $staff_users = _makeover_get_staff_user();
	$mail = variable_get('site_mail', '');
  require_once (drupal_get_path('module', 'makeover') .'/attachment_email.class.php');
  $subject = 'Surgeon form from '. $node->title;
  $message = 'See Attached';
  
  $email = new AttachmentEmail($mail, variable_get('site_mail'), $subject, $message, $attachments);
  $result = $email->send();
  if ($result) drupal_set_message('Your surgeon form was sent successfully');
  else drupal_set_message('Surgeon Form failed to send.  Try again or contact us through the contact form');
  
  // Send mail to user whose have submitted the form
  $send = TRUE;
  $language = language_default();
  $to = $field_sg_email;
  $params['subject'] = 'We have received you mail';
  $body = 'Hi,
  We have received you mail & contact you shortly.
  
  Thanks & Regards,
  Stunning Make Overs';
  $body = nl2br($body);
  $params['body'] = $body;
  drupal_mail('makeover', 'surgeon_form', $to, $language, $params, $mail, $send);
}

