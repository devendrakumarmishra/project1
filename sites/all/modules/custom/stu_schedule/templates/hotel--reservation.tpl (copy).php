<table border=1 cellspacing=0 cellpadding=2 style="border:1px solid #000000;border-collapse: collapse;margin-top: 20px;" width="600" height="100%">
  <?php if($guestname):?>
  <tr>
    <td width=50% align="right">Guest Name</td>
    <td width=50% align="left"><?php print $guestname; ?></td>
  </tr>
  <?php endif; ?>
  
  <?php if($companion):?>
  <tr>
    <td width=50% align="right">Companion</td>
    <td width=50% align="left"><?php print $companion; ?></td>
  </tr>
  <?php endif; ?>
  
  <?php if($bedding):?>
  <tr>
    <td width=50% align="right">Bedding</td>
    <td width=50% align="left"><?php print $bedding; ?></td>
  </tr>
  <?php endif; ?>
  
  <?php if($checkin):?>
  <tr>
    <td width=50% align="right">Check In</td>
    <td width=50% align="left"><?php print $checkin; ?></td>
  </tr>
  <?php endif; ?>
  
  <?php if($checkout):?>
  <tr>
    <td width=50% align="right">Check Out</td>
    <td width=50% align="left"><?php print $checkout; ?></td>
  </tr>
  <?php endif; ?>
  
  <?php if($roomtype):?>
  <tr>
    <td width=50% align="right">Room Type</td>
    <td width=50% align="left"><?php print $roomtype; ?></td>
  </tr>
  <?php endif; ?>
  
  <tr>
    <td colspan=2 align=center><span style="color:blue">with free upgrade to a ***</span></td>
  </tr>
  <tr>
    <td colspan=2 align=center><span style="color:blue">LATE CHECK OUT TO 15:00hrs REQUESTED</span></td>
  </tr>
  
  <?php if($ratepernight):?>
  <tr>
    <td width=50% align="right">Rate per night</td>
    <td width=50% align="left"><?php print number_format($ratepernight); ?></td>
  </tr>
  <?php endif; ?>
  
  <?php if($numberofnights):?>
  <tr>
    <td width=50% align="right">Number of Nights</td>
    <td width=50% align="left"><?php print $numberofnights; ?></td>
  </tr>
  <?php endif; ?>
  
  <?php if($totalpayable):?>
  <tr>
    <td width=50% align="right">Total Payable</td>
    <td width=50% align="left"><?php print number_format($totalpayable); ?></td>
  </tr>
  <?php endif; ?>
  
</table>
