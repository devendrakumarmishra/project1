<?php
	$_update = $_GET['update_date'];
	$last_update = date('F j, Y',$_update);
?>

<html>
	<head>
		<script>
			function subst() {
			  var vars={};
			  var x=document.location.search.substring(1).split('&');
			  for(var i in x) {var z=x[i].split('=',2);vars[z[0]] = unescape(z[1]);}
			  var x=['page'];
			  for(var i in x) {
				var y = document.getElementsByClassName(x[i]);
				for(var j=0; j<y.length; ++j) y[j].textContent = vars[x[i]];
			  }
			}
		</script>
	</head>
<body  onload="subst()" style="margin-top:20px; padding: 0;">
	<div class="footer">
		<table style="width:910px;margin-left:50px;margin-right:50px;font-size:11px;" border="0">
			<tr>		
				<td style="text-align:left">
				  <span class="page"></span> | <b>Tilleke & Gibbins International Ltd.</b>
				</td>
				<td style="text-align:right">Last Updated: <?php echo $last_update;?></td>
			</tr>
		</table>
	</div>
</body>
</html>
