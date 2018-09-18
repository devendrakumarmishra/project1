<?php
/**
 * Surgery mail templates
 */
 $hotalPrice; 
 $exchangeRate; 
 $surgeryEstimate;
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
 
 if (sizeof($surgeryEstimate) > 0) {
	 foreach ($surgeryEstimate as $location_id => $surgeryEstimates) {
		 $nights = $surgeryEstimates[night4surgery];
		 $booking = $surgeryEstimates[surgerybooking];
		 $transferCost = $surgeryEstimates[transferCost];
		 $estimateSurgeryOnly = array_sum($surgeryEstimates['price']);
		 $nototal = false;
		 //The easiest way to determine if a surgery requires the $400 booking fee or
		 //the $200 out patient booking fee is based on the total cost of surgery. If
		 //the total surgery cost is less than THB51,000 then the $200 applies.
		 
		 if ($estimateSurgeryOnly < 51000)
			 $booking = 200;
		 else
			 $booking = 400;
			 
		 // $estimatedSurgeryCosts =  ($booking + ($estimateSurgeryOnly) * $exchangeRate);
		 $estimatedSurgeryCosts =  ($booking + ($estimateSurgeryOnly / $exchangeRate));
		 // Hotel accommodation costs are calculated based on the rate per night x the
		 // number of nights overseas plus the cost of transfers (for surgery or
		 // surgery with dental treatment).
		 // $accommodation = ($hotalPrice[$location_id] * $nights * $exchangeRate);
		 $accommodation = (($hotalPrice[$location_id] * $nights) / $exchangeRate);
		 
		 // Transfer costs are $300 for Bangkok and $150 for Phuket. This amount is a
		 // fixed number whether it is for Australian client or New Zealand client. No
		 // conversion needed.
		 $accommodation = $accommodation + $transferCost;
		 $totalestimatedCosts = ($accommodation  + $estimatedSurgeryCosts);
   
 ?>

<table border=1 cellspacing=0 cellpadding=2 style="border:1px solid #000000;border-collapse: collapse;margin-top: 20px;" width="600px" height="100%">
	<thead>
	<tr style="background:#FF7F00;">
    <th align="center" width="20%"><b><?php print t('Destination'); ?></b></th>
    <th align="center" width="40%"><b><?php print t('Treatment/Surgery'); ?></b></th> 
    <th align="center" width="20%"><b>From approx<br>Thai Baht</b></th>
    <th align="center" width="20%"><b><?php print t('approx <br>!currency!currency_symbol', array('!currency' => $currency,'!currency_symbol' => $currency_symbol)); ?></b></th>
  </tr>
  </thead>
  <tbody>
  <?php $i = 1; foreach ($surgeryEstimates['price'] as $key => $value):
    if (empty($value)) {
			$nototal = true;
		}
  ?>
  <tr>
    <td align="center"><font color=blue><?php print ($i == 1) ? $surgeryEstimates['location'] : '' ; ?></font></td>
    <td align="center"><?php print $surgeryEstimates['procedures'][$key];?></td> 
    <td align="center"><?php print ($value) ? number_format($value) : $noprice; ?></td>
    <td align="center"><?php print ($value) ? theme('format_currency', array('price' => ($value / $exchangeRate), 'param' => $currency)) : $nopriceAmountText; ?></td>
  </tr>
  <?php $i++; endforeach; ?>
  
  <tr>
	  <td align="center"><font color=blue></font></td>
    <td align="center"><?php print t('Surgery Booking Fee');?></td>
    <td></td>
    <td align="center"><?php 
    if($nototal) {
		  print $tba;
		}
		else {
      print theme('format_currency', array('price' => $booking, 'param' => $currency)); 
    }
    ?></td>
  </tr>
 
  <tr>
	  <td align="center"></td>
    <td colspan="2" align="right"><b><i><font color=blue><?php print t('Estimated Surgery Costs');?></font></i></b></td>
    <td align="center"><?php 
    if($nototal) {
		  print $tba;
		}
		else {
      print theme('format_currency', array('price' => $estimatedSurgeryCosts, 'param' => $currency)); 
    }
    ?></td>
  </tr>
 
  <tr style="background:#FF7F00;">
	  <td colspan="4" align="center"><b><?php print t('Optional Accommodation & Transfers');?></b></td>
  </tr>
 
  <tr>
    <td align="right"><?php 
    if($nototal) {
		  print $tba;
		}
		else {
      print $nights; 
    } ?></td>
    <td colspan="2" align="left"><?php print t('Nights Accommodation and Transfers');?></td> 
    <td align="center"><?php 
    if($nototal) {
		  print $tba;
		}
		else {
      print theme('format_currency', array('price' => $accommodation, 'param' => $currency)); 
		}
    ?></td>
  </tr>
  
  <tr>
		<td></td>
    <td colspan="2" align="right"><b><i><font color=blue><?php print t('Total Estimated Cost');?></font></i></b></td>
    <td align="center"><?php 
    if($nototal) {
		  print $tba;
		}
		else {
      print theme('format_currency', array('price' => $totalestimatedCosts, 'param' => $currency)); 
    }
    ?></td>
  </tr>
  </tbody>
</table>

<?php
  } // end foreach
 } // end if
  if (sizeof($dentalEstimate) > 0) {
	 foreach ($dentalEstimate as $location => $dentalEstimates) {
		 $nototal = false;
?>
<!-- New Table -->
<?php if(sizeof($dentalEstimates['price']) > 0 && !empty($dentalEstimates['price'])): ?>
<table border=1 cellspacing=0 cellpadding=2 style="border:1px solid #000000;border-collapse: collapse;margin-top: 20px;" width="600" height="100%">
	<tr style="background:#FF7F00;">
    <td align="center"><b><?php print ('Destination'); ?></b></td>
    <td align="center"><b><?php print ('Dental Treatment'); ?></b></td> 
    <td align="center"><b>From approx<br>Thai Baht</b></td>
    <td align="center"><b><?php print t('approx <br>!currency!currency_symbol', array('!currency' => $currency,'!currency_symbol' => $currency_symbol)); ?></b></td>
  </tr>
  
  <?php $j = 1; foreach ($dentalEstimates['price'] as $key => $value):
    if (empty($value)) { $nototal = true;}
  ?>
  <tr>
    <td align="center"><font color=blue><?php print ($j == 1) ? $dentalEstimates['location'] : ''; ?></font></td>
    <td align="center"><?php print $dentalEstimates['procedures'][$key];?></td> 
    <td align="center"><?php print ($value) ? number_format($value) : $noprice;?></td>
    <td align="center"><?php print ($value) ? theme('format_currency', array('price' => ($value / $exchangeRate), 'param' => $currency)) : $nopriceAmountText; ?></td>
  </tr>
  <?php $j++; endforeach; ?>
  
  <tr>
    <td align="center"></td>
    <td colspan="2" align="center">Dental Booking Fee <b><font color=blue>Waived</font></b> if Having Plastic Surgery</td>
    <td style="text-decoration:line-through;" align="center">
			<?php 
			if ($nototal) {
			  print $tba;
			}
			else {
			   print theme('format_currency', array('price' => variable_get('makeover_dental_booking_fee', 50), 'param' => $currency)); 
			}   
			?>
		</td>
  </tr>
  
</table>
<?php endif; ?>
<?php
  } // end foreach
 } // end if
?>

