<?php
 $sum = 0;
 $guest = array();
 $guest[] = $guestname;
 $guest[] = $guestname2;
 $guest[] = $guestname3;
 $guest[] = $guestname4;
 $guest = array_filter($guest);
?>

<table border=1 cellspacing=0 cellpadding=2 style="border:1px solid #000000;border-collapse: collapse;margin-top: 20px;" width="600" height="100%">
  <tr>
		<?php if($guestname): ?>
    <td align="right">Guest Name: </td> <td align="left"><?php print $guestname;?></td>
    <?php endif; ?>
  </tr>
  <tr>
    <?php if($guestname2): ?>
    <td align="right">Companion: </td> <td align="left"><?php print $guestname2;?></td>
    <?php endif; ?>
  </tr>
  <tr>
    <?php if($guestname3): ?>
    <td align="right">Companion: </td> <td align="left"><?php print $guestname3;?></td>
    <?php endif; ?>
  </tr>
  <tr>  
    <?php if($guestname4): ?>
    <td align="right">Companion: </td> <td align="left"><?php print $guestname4;?></td>
    <?php endif; ?>
  </tr>
  <tr>  
    <?php if(!empty($guest)): ?>
    <td align="right">No. Guests: </td> <td align="left"><?php print count($guest);?></td>
    <?php endif; ?>
  </tr>
  <td align="right">&nbsp;</td> <td align="left">&nbsp;</td>
  <?php if(sizeof($iterations) > 0):?>
    <?php foreach($iterations as $tour):?>
      <?php if($tour->field_tour_name->value() != 'Chaophraya River Dinner Cruise'):?>
        <tr>  
					<td align="right">&nbsp;</td> <td align="left">&nbsp;</td>
				</tr>
  
        <tr>  
         <td align="right">Tour Details: </td> <td align="left"><?php print $tour->field_tour_name->value();?></td>
        </tr>
        
        <tr>  
         <td align="right">Tour Duration: </td> <td align="left"><?php print $tour->field_tour_duration_estimated->value();?></td>
        </tr>
        
        <tr>  
         <td align="right">Tour Date: </td> <td align="left"><?php print date('l jS M', strtotime($tour->field_tour_date_time->value()));?></td>
        </tr>
        
        <tr>  
         <td align="right">Pick up From: </td> <td align="left"><?php print $tour->field_pick_up_location->value();?></td>
        </tr>
        
        <tr>  
         <td align="right">Pick up Time: </td> <td align="left"><?php print $tour->field_pick_up->value();?></td>
        </tr>
			 
			 <?php endif;?>
    <?php endforeach;?>
  <?php endif;?>
</table>
