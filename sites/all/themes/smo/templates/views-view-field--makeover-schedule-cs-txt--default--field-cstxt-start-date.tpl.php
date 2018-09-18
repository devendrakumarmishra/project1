<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
 global $base_url;
 $tz_utc = new DateTimeZone('UTC');
 $tz = "Pacific/Auckland";
  
 $end = $start = $row->field_field_cstxt_start_date[0][raw][value];
 
  $startDate = new DateTime($start);
  $startDate->setTimezone($tz_utc);

  $endDate = new DateTime($end);
  $endDate->setTimezone($tz_utc);

  $start_timestamp = $startDate->getTimestamp();
  $end_timestamp = $endDate->getTimestamp();

  $diff_timestamp = $end_timestamp - $start_timestamp;

  $start_date = gmdate('Ymd', $start_timestamp) . 'T' . gmdate('His', $start_timestamp) . 'Z';
  $end_date = gmdate('Ymd', $end_timestamp) . 'T' . gmdate('His', $end_timestamp) . 'Z';
  
  
  $google_url = url('http://www.google.com/calendar/event', array(
    'query' => array(
      'action' => 'TEMPLATE',
      'text' => $row->field_field_clients_passport_name[0][raw][value] .'-'.$row->field_field_cstxt_action[0][raw][value],
      'dates' => $start_date . '/' . $end_date,
      'sprop' => 'website:' . $_SERVER['HTTP_HOST'],
      'location' => 'Location',
      'details' => $row->field_field_cstxt_action[0][raw][value] . " Phone Number: " . $row->field_field_client_name[0][raw][value] . " Client Name: " .$row->field_field_clients_passport_name[0][raw][value],
      'website' => url(drupal_get_path_alias(current_path()), array('absolute' => TRUE)),
    ),
  ));
?>
<?php print l($output,$google_url,array('attributes' => array('target' => 'blank'),'html' => true)); ?>
