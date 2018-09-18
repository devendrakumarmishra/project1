<?php
 $sum = 0;
?>

<table border=1 cellspacing=0 cellpadding=2 style="border:1px solid #000000;border-collapse: collapse;margin-top: 20px;" width="600" height="100%">
  <tr>
    <td align="center" colspan=5><center>Client Name(s): <?php print $guestname;?></center></td>
  </tr>
  <tr style="background:#FF7F00;">
		<th>No. Passengers</th>
    <th>Pick Up Date</th>
    <th>From</th>
    <th>To</th>
    <th>Rate THB</th>
  </tr>
  <?php if(sizeof($iterations) > 0):?>
    <?php foreach($iterations as $iteration):?>
    <tr>
      <td align="center"><center><?php print $iteration->field_no_passengers->value();?></center></td>
      <td align="center"> <center><?php print date('m/d/Y h:ia', $iteration->field_transfers_pickup_date->value());?></center></td>
			<td align="center"><center><?php print $iteration->field_transfers_from->value();?></center></td>
			<td align="center"><center><?php print $iteration->field_transfers_to->value();?></center></td>
			<td align="center"><center><?php print number_format($iteration->field_transfers_rate_thb->value());?></center></td>
		</tr>
    <?php $sum = $sum + $iteration->field_transfers_rate_thb->value(); endforeach;?>
  <?php endif;?>
  <tr>
    <td colspan=4 align="right">Transfer Cost THB</td>
    <td colspan=2 align="center"><center><?php print number_format($sum); ?></center></td>
  </tr>
</table>
