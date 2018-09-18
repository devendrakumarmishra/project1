<?php
/**
 * Dental mail templates
 */
 $hotalPrice;
 $exchangeRate; 
 $dentalEstimate;
 $currency;
 // Currency Symbol
 $currency_symbol = '$';
 $currency = 'NZD';
 $currency_symbol = $_SESSION['CURRENCY_SYMBOL'];
 $currency = $_SESSION['CURRENCY'];
 $noprice = variable_get('thbcoltext','Contact Us');
 $nopriceAmountText = variable_get('amountcoltext','For Details');
 $tba = 'TBA';
 
 // Booking fees are;
 // $400 for a surgery that requires admission to hospital
 // $200 for surgery that does not require overnight admission (Out Patient Surgery) and $50 for dental.
 if (sizeof($dentalEstimate) > 0) {
	 foreach ($dentalEstimate as $location_id => $dentalEstimates) {
		 $nototal = false;
		 $estimateDentalOnly = '';
		 $booking = $dentalEstimates[dentalbooking];
		 $estimateDentalOnly = array_sum($dentalEstimates['price']);
		 $nights = $dentalEstimates[night4dental];
		 //$accommodation = ($hotalPrice[$location_id] * $nights * $exchangeRate);
		 $accommodation = (($hotalPrice[$location_id] * $nights) / $exchangeRate);
		 
		 // Hotel accommodation costs are calculated based on the rate per night x the
		 // number of nights overseas plus the cost of transfers (for surgery or
		 // surgery with dental treatment).
		 
		 // For dental treatment only, no transfers are calculated. Hotel accommodation
		 // rate is shown in the lower part of the spreadsheet.
		 $accommodation = $accommodation + $dentalEstimates['transferCost'];
?>
<!-- New Table -->
<table border=1 cellspacing=0 cellpadding=2 style="border:1px solid #000000;border-collapse: collapse;margin-top: 20px;" width="600" height="100%">
  <tr style="background:#FF7F00;">
    <th align="center" width="20%"><b><?php print ('Destination');?></b></th>
    <th align="center" width="40%"><b><?php print ('Dental Treatment');?></b></th> 
    <th align="center" width="20%"><b>From approx<br>Thai Baht</b></th>
    <th align="center" width="20%"><b><?php print t('approx <br>!currency!currency_symbol', array('!currency' => $currency,'!currency_symbol' => $currency_symbol)); ?></b></th>
  </tr>
  
  <?php $i = 1; foreach ($dentalEstimates['price'] as $key => $value):
    if (empty($value)) {
			$nototal = true;
		}
  ?>
  <tr>
    <td align="center"><font color=blue><?php print ($i == 1) ? $dentalEstimates['location'] : ''; ?></font></td>
    <td align="center"><?php print $dentalEstimates['procedures'][$key];?></td> 
    <td align="center"><?php print ($value) ? number_format($value) : $noprice;?></td>
    <td align="center"><?php print ($value) ? theme('format_currency', array('price' => ($value / $exchangeRate), 'param' => $currency)) : $nopriceAmountText; ?></td>
  </tr>
  <?php $i++; endforeach; ?>
  
  <tr>
    <td align="center"></td>
    <td colspan=2 align="center"><?php print ('Dental Booking Fee');?></td> 
    <td align="center"><?php 
    if($nototal) {
		  print $tba;
		}
		else {
      print theme('format_currency', array('price' => $booking, 'param' => $currency)); 
    }
    ?></td>
  </tr>
 
 <tr style="background:#FF7F00;">
	  <td colspan=4 align="center"><b><i><?php print ('Optional Accommodation');?></i></b></td>
 </tr>
 
 <tr>
    <td align="right	"><?php 
    if($nototal) {
		  print $tba;
		}
		else {
      print $nights;
    } 
   ?></td>
    <td colspan=2 align="left"><?php print ('Nights Accommodation'); ?></td> 
    <td align="center"><?php 
    if($nototal) {
		  print $tba;
		}
		else {
      print theme('format_currency', array('price' => $accommodation, 'param' => $currency)); 
    }
    ?></td>
  </tr>
</table>

<?php
	 } // end foreach
 } // end if
?>
