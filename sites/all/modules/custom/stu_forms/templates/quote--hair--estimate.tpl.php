<?php
/**
 * Hair Transplant mail templates
 */
 $hotalPrice; 
 $exchangeRate; 
 $hairTransplants;
 $currency;
  // Currency Symbol
 $currency_symbol = '$';
 $currency = 'NZD';
 $currency_symbol = $_SESSION['CURRENCY_SYMBOL'];
 $currency = $_SESSION['CURRENCY'];
 $noprice = variable_get('thbcoltext','Contact Us');
 $nopriceAmountText = variable_get('amountcoltext','For Details');
 $tba = 'TBA';
  
 if (sizeof($hairTransplants) > 0) {
	 foreach ($hairTransplants as $location_id => $hairTransplant) {
		 $nototal = false;
		 $nights = $hairTransplant[night4surgery];
		 $booking = $hairTransplant[surgerybooking];
		 $accommodation_transfers = $hairTransplant[accommodation_transfers];
		 $transferCost = $hairTransplant[transferCost];
		 
		 $estimateHairOnly = array_sum($hairTransplant['price']);
		 
		 if ($estimateHairOnly < 51000)
			 $booking = 200;
		 else
			 $booking = 400;
		 
	  //$estimatedHairCosts =  ($booking + ($estimateHairOnly) * $exchangeRate);
	  $estimatedHairCosts =  ($booking + ($estimateHairOnly / $exchangeRate));
		 
		 // Hotel accommodation costs are calculated based on the rate per night x the
		 // number of nights overseas plus the cost of transfers (for surgery or
		 // surgery with dental treatment).
		 //$accommodation = ($hotalPrice[$location_id] * $nights * $exchangeRate);
		 $accommodation = (($hotalPrice[$location_id] * $nights) / $exchangeRate);
		 
		 // Transfer costs are $300 for Bangkok and $150 for Phuket. This amount is a
		 // fixed number whether it is for Australian client or New Zealand client. No
		 // conversion needed.
		 $accommodation = $accommodation + $transferCost;
?>
<!-- New Table -->
<table border=1 cellspacing=0 cellpadding=2 style="border:1px solid #000000;border-collapse: collapse;margin-top: 20px;" width="600" height="100%">
	<tr style="background:#FF7F00;">
    <td align="center"><b><?php print t('Destination'); ?></b></td>
    <td align="center"><b><?php print t('Treatment/Surgery'); ?></b></td> 
    <td align="center"><b><?php print t('From approx <br> Thai Baht'); ?></b></td>
    <td align="center"><b><?php print t('approx <br> !currency!currency_symbol per graft', array('!currency' => $currency,'!currency_symbol' => $currency_symbol)); ?></b></td>
  </tr>
  
  <?php $i = 1; foreach ($hairTransplant['price'] as $key => $value):
    if (empty($value)) {
			$nototal = true;
		}
  ?>
  <tr>
    <td align="center"><font color=blue><?php print ($i == 1) ? $hairTransplant['location'] : ''; ?></font></td>
    <td align="center"><?php print $hairTransplant['procedures'][$key];?></td> 
    <td align="center"><?php print ($value) ? number_format($value) . ' each' : $noprice;?> </td>
    <td align="center"><?php print ($value) ? theme('format_currency', array('price' => ($value / $exchangeRate), 'param' => $currency)) : $nopriceAmountText; ?></td>
  </tr>
  <?php $i++; endforeach; ?>
  
  <tr>
	  <td align="center"></td>
    <td align="center"><?php print t('Out-Patient Surgery Booking Fee');?></td>
    <td></td>
    <td align="center"><?php 
    if($nototal) {
		  print $tba;
		}
		else {
      print theme('format_currency', array('price' => $booking, 'param' => $currency)); 
    } ?></td>
  </tr>
 
  <!--<tr>
	  <td></td>
    <td colspan=2 align="center"><i><?php print t('Estimated Surgery Costs');?></i></td>
    <td align="center"><?php print theme('format_currency', array('price' => $estimatedHairCosts, 'param' => $currency)); ?></td>
  </tr>-->
 
  <tr style="background:#FF7F00;">
    <td colspan=4 align="center"><b><?php print t('Optional Accommodation & Transfers');?></b></td>
  </tr>
 
  <tr>
    <td align="right"><?php 
    if($nototal) {
		  print $tba;
		}
		else {
      print $nights; 
    }
    ?></td>
    <td colspan=2 align="left"><?php print t('Nights double/twin share Accommodation and Transfers');?></td> 
    <td align="center"><?php 
    if($nototal) {
		  print $tba;
		}
		else {
      print theme('format_currency', array('price' => $accommodation_transfers, 'param' => $currency)); 
    }
    ?></td>
  </tr>
</table>
<?php
	 } // end foreach
 } // end if
?>
