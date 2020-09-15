<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mortalis game</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<style type="text/css">
tr.land {
	padding: 0px
	}
	
td.land {
	border: 6px inset #3C0;
	width: 80px; height: 80px; 
	padding: 0px; 
	overflow: hidden
	}
	
td.land a {
	margin: 0em; 
	padding: 0em; 
	display: block
	}
td.land a:hover {
	background-color: #000;
	opacity: 0.8;
	filter: alpha(opacity=80)	
}
td.land a:active {
	background-color: #FFF;
	opacity: 0.8;
	filter: alpha(opacity=80)	
}
tr.verboden {
	padding: 0px
	}
	
td.verboden {
	background-image:url(images/defense.png);
	background-size: 100% 100%;
	border: 6px inset #F00;
	width: 80px; height: 80px; 
	padding: 0px; 
	overflow: hidden;
	opacity: 0.5;
	filter: alpha(opacity=50)	
	}
	
td.verboden a {
	margin: 0em; 
	padding: 0em; 
	display: block;
	opacity: 0.8;
	filter: alpha(opacity=80)	
	}
td.verboden a:hover {
	background-image:url(images/verboden.jpg);
	opacity: 0.1;
	filter: alpha(opacity=10)	
}
</style>

</script>
</head>
<body>
<table width="100%" align="center" border="0" cellspacing="15" cellpadding="0">
  <tr>
  <td align="center">
<?php echo "Your level: $level<br>Mortalis level: $mortlevel"; ?>

</td></tr>
</table>
<table width="100%" border="0" cellspacing="15" cellpadding="0">
  <tr>
    <td width="33,333333333%">
    	<table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%">
        	<tr>
        		<td class="<?php if ($level > 0) { echo "land"; } else { echo "verboden"; } ?>"><div class="<?php if ($level > 0) { echo "land"; } else { echo "verboden"; } ?>" width="100%"><a href="home.php?page=dig&land=1"><img src="images/map1.jpg" width="100%"></a></div>
        		</td>
    		</tr>
    		<tr>
            	<td><?php if ($level > 0) { echo "<img src=\"images/available.png\" width=\"100%\">"; } else { echo "<img src=\"images/unavailable.png\" width=\"100%\">"; } ?></td>
            </tr>
    	</table>
    </td>
    <td width="33,333333333%">
    <table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%"><tr><td class="<?php if ($level >= 5) { echo "land"; } else { echo "verboden"; } ?>"><div class="<?php if ($level >= 5) { echo "land"; } else { echo "verboden"; } ?>" width="100%"><a href="home.php?page=dig&land=2"><img src="images/map2.jpg" width="100%"></a></div></td>
    </tr>
    <tr>
    <td><?php if ($level >= 5) { echo "<img src=\"images/available.png\" width=\"100%\">"; } else { echo "<img src=\"images/unavailable.png\" width=\"100%\">"; } ?></td>
    </tr>
    </table>
    </td>
    <td width="33,333333333%">
    <table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%"><tr><td class="<?php if ($level >= 10) { echo "land"; } else { echo "verboden"; } ?>"><div class="<?php if ($level >= 10) { echo "land"; } else { echo "verboden"; } ?>" width="100%"><a href="home.php?page=dig&land=3"><img src="images/map3.jpg" width="100%"></a></div></td>
    </tr>
    <tr>
    <td><?php if ($level >= 10) { echo "<img src=\"images/available.png\" width=\"100%\">"; } else { echo "<img src=\"images/unavailable.png\" width=\"100%\">"; } ?></td>
    </tr>
    </table>
    </td>
  </tr>
  </tr>
</table>
