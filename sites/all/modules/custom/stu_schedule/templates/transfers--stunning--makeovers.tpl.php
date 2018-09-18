<style>
  table tr td {font-size:13px;font-family:Helvetica, Arial, sans-serif;}
</style>
<?php
 $sum = 0;
?>

<table border=1 cellspacing=0 cellpadding=2 style="border:1px solid #000000;border-collapse: collapse;margin-top: 20px;" width="600" height="100%">
  
  <?php if(!empty($arrival) && sizeof($arrival) > 0):?>
    
    <tr>
      <td width=50% align="right">Guest Name</td>
      <td width=50% align="left"><?php print $guestname;?></td>
    </tr>
    
    
    
    <tr>
			<td width=50% align="right">&nbsp;</td>
			<td width=50% align="left">&nbsp;</td>
	  </tr>
	  
    <tr>
      <td width=100% align="center" colspan=2 bgcolor="#FF6C00"><em>Transfer To Hotel</em></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Date</td>
      <td width=50% align="left"><?php print date('l, jS F, Y', $arrival->field_transfers_pickup_date->value());?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Time</td>
      <td width=50% align="left"><?php print date('g:ia', $arrival->field_transfers_pickup_date->value());?></td>
    </tr>
    
    <tr>
			<td width=50% align="right">From</td>
			<td width=50% align="left"><?php print $arrival->field_transfers_from->value();?></td>
	  </tr>
	  
	  <tr>
			<td width=50% align="right">To</td>
			<td width=50% align="left"><?php print $arrival->field_transfers_to->value();?></td>
	  </tr>
	  
	  <tr>
			<td width=50% align="right">&nbsp;</td>
			<td width=50% align="left">&nbsp;</td>
	  </tr>
	  
	  <tr>
      <td width=50% align="right">Flight</td>
      <td width=50% align="left"><?php print $arrival->field_flight_number->value();?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">From</td>
      <td width=50% align="left"><?php print $arrival->field_flight_from->value();?></td>
    </tr>
	  
    <tr>
      <td width=50% align="right">No. Passengers</td>
      <td width=50% align="left"><?php print $arrival->field_no_passengers->value();?></td>
    </tr>
    
	  <tr>
			<td width=50% align="right">&nbsp;</td>
			<td width=50% align="left">&nbsp;</td>
	  </tr>
	  
    <tr>
			<td width=50% align="right">Rate THB</td>
			<td width=50% align="left"><?php print number_format($arrival->field_transfers_rate_thb->value());?></td>
	  </tr>
	  
	  <tr>
			<td width=50% align="right">&nbsp;</td>
			<td width=50% align="left">&nbsp;</td>
	  </tr>
	  
    <?php $sum = $sum + ($arrival->field_transfers_rate_thb->value());?>
  <?php endif;?>
  
  <!-- Consultation -->
  <?php if(!empty($consultation) && sizeof($consultation) > 0):?>
    <tr>
      <td width=100% align="center" colspan=2 bgcolor="#FF6C00"><em>Transfer For Consultation</em></td>
    </tr>
    <tr>
      <td width=50% align="right">Pick Up Date</td>
      <td width=50% align="left"><?php print date('l, jS F, Y', $consultation['date']);?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Time</td>
      <td width=50% align="left"><?php print date('g:ia', $consultation['date']);?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">From</td>
      <td width=50% align="left"><?php print $consultation['from'];?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">To</td>
      <td width=50% align="left"><?php print $consultation['to'];?></td>
    </tr>
    
     <tr>
      <td width=50% align="right">No. Passengers</td>
      <td width=50% align="left"><?php print $consultation['passengers'];?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Rate THB</td>
      <td width=50% align="left"><?php print number_format($consultation['cost']);?></td>
    </tr>
	  
	  <tr>
			<td width=50% align="right">&nbsp;</td>
			<td width=50% align="left">&nbsp;</td>
	  </tr>
    
    <?php $sum = $sum + ($consultation['cost']);?>
    
    <tr>
      <td width=100% align="center" colspan=2><b>Return</b></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Date</td>
      <td width=50% align="left">Please check with client</td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Time</td>
      <td width=50% align="left">TBC</td>
    </tr>
    
    <tr>
      <td width=50% align="right">From</td>
      <td width=50% align="left"><?php print $consultation['to'];?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">To</td>
      <td width=50% align="left"><?php print $consultation['from'];?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">No. Passengers</td>
      <td width=50% align="left"><?php print $consultation['passengers'];?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Rate THB</td>
      <td width=50% align="left"><?php print number_format($consultation['cost']);?></td>
    </tr>
	  
	  <tr>
			<td width=50% align="right">&nbsp;</td>
			<td width=50% align="left">&nbsp;</td>
	  </tr>
    <?php $sum = $sum + ($consultation['cost']);?>
  <?php endif;?>
  
  
  <!-- Surgery -->
  <?php if(!empty($surgery) && sizeof($surgery) > 0):?>
    
    <tr>
      <td width=100% align="center" colspan=2 bgcolor="#FF6C00"><em>Transfer For Surgery</em></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Date</td>
      <td width=50% align="left"><?php print date('l, jS F, Y', $surgery['date']);?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Time</td>
      <td width=50% align="left"><?php print date('g:ia', $surgery['date']);?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">From</td>
      <td width=50% align="left"><?php print $surgery['from'];?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">To</td>
      <td width=50% align="left"><?php print $surgery['to'];?></td>
    </tr>
    
     <tr>
      <td width=50% align="right">No. Passengers</td>
      <td width=50% align="left"><?php print $surgery['passengers'];?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Rate THB</td>
      <td width=50% align="left"><?php print number_format($surgery['cost']);?></td>
    </tr>
	  
	  <tr>
			<td width=50% align="right">&nbsp;</td>
			<td width=50% align="left">&nbsp;</td>
	  </tr>
    <?php $sum = $sum + ($surgery['cost']);?>
    
    <tr>
      <td width=100% align="center" colspan=2><b>Return</b></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Date</td>
      <td width=50% align="left">Please check with client</td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Time</td>
      <td width=50% align="left">TBC</td>
    </tr>
    
    <tr>
      <td width=50% align="right">From</td>
      <td width=50% align="left"><?php print $surgery['to'];?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">To</td>
      <td width=50% align="left"><?php print $surgery['from'];?></td>
    </tr>
    
     <tr>
      <td width=50% align="right">No. Passengers</td>
      <td width=50% align="left"><?php print $surgery['passengers'];?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Rate THB</td>
      <td width=50% align="left"><?php print number_format($surgery['cost']);?></td>
    </tr>
	  
	  <tr>
			<td width=50% align="right">&nbsp;</td>
			<td width=50% align="left">&nbsp;</td>
	  </tr>
    <?php $sum = $sum + ($surgery['cost']);?>
    
    
  <?php endif;?>
  
  <!-- Dental -->
  <?php if(!empty($dental) && sizeof($dental) > 0):?>
    <tr>
      <td width=100% align="center" colspan=2 bgcolor="#FF6C00"><em>Transfer For Dental Surgery</em></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Date</td>
      <td width=50% align="left"><?php print date('l, jS F, Y', $dental['date']);?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Time</td>
      <td width=50% align="left"><?php print date('g:ia', $dental['date']);?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">From</td>
      <td width=50% align="left"><?php print $dental['from'];?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">To</td>
      <td width=50% align="left"><?php print $dental['to'];?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">No. Passengers</td>
      <td width=50% align="left"><?php print $dental['passengers'];?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Rate THB</td>
      <td width=50% align="left"><?php print number_format($dental['cost']);?></td>
    </tr>
	  
	  <tr>
			<td width=50% align="right">&nbsp;</td>
			<td width=50% align="left">&nbsp;</td>
	  </tr>
    <?php $sum = $sum + ($dental['cost']);?>
    
    
    <?php if(!empty($dental['dental_return'])):?>
    <tr>
      <td width=100% align="center" colspan=2><b>Return</b></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Date</td>
      <td width=50% align="left">Please check with client</td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Time</td>
      <td width=50% align="left">TBC</td>
    </tr>
    
    <tr>
      <td width=50% align="right">From</td>
      <td width=50% align="left"><?php print $dental['to'];?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">To</td>
      <td width=50% align="left"><?php print $dental['from'];?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">No. Passengers</td>
      <td width=50% align="left"><?php print $dental['passengers'];?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Rate THB</td>
      <td width=50% align="left"><?php print number_format($dental['cost']);?></td>
    </tr>
	  
	  <tr>
			<td width=50% align="right">&nbsp;</td>
			<td width=50% align="left">&nbsp;</td>
	  </tr>
    
    <?php $sum = $sum + ($dental['cost']);?>
    <?php endif;?>
    
    
    
  <?php endif;?>
  
  <!-- TRANSFER FOR POST-OPERATIVE CONSULTATION --->
  
  <?php if($hospital == 66):?>
    <tr>
      <td width=100% align="center" colspan=2 bgcolor="#FF6C00"><em>Transfer For Post-Operative Consultation</em></td>
    </tr>
    <tr>
      <td width=50% align="right">Pick Up Date</td>
      <td width=50% align="left">Please check with client</td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Time</td>
      <td width=50% align="left">TBC</td>
    </tr>
    
    <tr>
      <td width=50% align="right">From</td>
      <td width=50% align="left">Hotel</td>
    </tr>
    
    <tr>
      <td width=50% align="right">To</td>
      <td width=50% align="left">Yanhee International Hospital</td>
    </tr>
    
    <?php if(isset($arrival) && !empty($arrival)):?>
     <tr>
      <td width=50% align="right">No. Passengers</td>
      <td width=50% align="left"><?php print $arrival->field_no_passengers->value();?></td>
    </tr>
    <?php endif; ?>
    
    <tr>
      <td width=50% align="right">Rate THB</td>
      <td width=50% align="left"><?php print number_format(700);?></td>
    </tr>
	  
	  <tr>
			<td width=50% align="right">&nbsp;</td>
			<td width=50% align="left">&nbsp;</td>
	  </tr>
    
    <?php $sum = $sum + (700);?>
    
    <tr>
      <td width=100% align="center" colspan=2><b>Return</b></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Date</td>
      <td width=50% align="left">Please check with client</td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Time</td>
      <td width=50% align="left">TBC</td>
    </tr>
    
    <tr>
      <td width=50% align="right">From</td>
      <td width=50% align="left">Yanhee International Hospital</td>
    </tr>
    
    <tr>
      <td width=50% align="right">To</td>
      <td width=50% align="left">Hotel</td>
    </tr>
    
    <?php if(isset($arrival) && !empty($arrival)):?>
    <tr>
      <td width=50% align="right">No. Passengers</td>
      <td width=50% align="left"><?php print $arrival->field_no_passengers->value();?></td>
    </tr>
    <?php endif; ?>
    
    <tr>
      <td width=50% align="right">Rate THB</td>
      <td width=50% align="left"><?php print number_format(700);?></td>
    </tr>
	  
	  <tr>
			<td width=50% align="right">&nbsp;</td>
			<td width=50% align="left">&nbsp;</td>
	  </tr>
    <?php $sum = $sum + (700);?>
  <?php endif;?>
  
  <!-- Departure -->
  <?php if(!empty($departure) && sizeof($departure) > 0):?>
    
    <tr>
      <td width=100% align="center" colspan=2 bgcolor="#FF6C00"><em>Transfer To Airport</em></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Date</td>
      <td width=50% align="left"><?php print date('l, jS F, Y', $departure->field_transfers_pickup_date->value());?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">Pick Up Time</td>
      <td width=50% align="left"><?php print date('g:ia', $departure->field_transfers_pickup_date->value());?></td>
    </tr>
    
    <tr>
			<td width=50% align="right">Pick Up From</td>
			<td width=50% align="left"><?php print $departure->field_transfers_from->value();?></td>
	  </tr>
	  
	  <tr>
			<td width=50% align="right">To</td>
			<td width=50% align="left"><?php print $departure->field_transfers_to->value();?></td>
	  </tr>
	  
	  <tr>
			<td width=50% align="right">&nbsp;</td>
			<td width=50% align="left">&nbsp;</td>
	  </tr>
	  
	  <tr>
      <td width=50% align="right">Flight</td>
      <td width=50% align="left"><?php print $departure->field_departure_flight_number->value();?></td>
    </tr>
    
    <tr>
      <td width=50% align="right">To</td>
      <td width=50% align="left"><?php print $departure->field_departure_to->value();?></td>
    </tr>
	  
	  <tr>
			<td width=50% align="right">&nbsp;</td>
			<td width=50% align="left">&nbsp;</td>
	  </tr>
	  
    <tr>
			<td width=50% align="right">Rate THB</td>
			<td width=50% align="left"><?php print number_format($departure->field_transfers_rate_thb->value());?></td>
	  </tr>
	  
	  <tr>
			<td width=50% align="right">&nbsp;</td>
			<td width=50% align="left">&nbsp;</td>
	  </tr>
    
    <?php $sum = $sum + ($departure->field_transfers_rate_thb->value());?>
  <?php endif;?>
  
  <tr>
    <td width=50% align="right">Total Transfer Cost THB</td>
    <td width=50% align="left"><?php print number_format($sum); ?></td>
  </tr>
</table>
