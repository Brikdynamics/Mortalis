<html>
<head>
<script src="js/script.js">
</script>
</head>
<body>
<table width="500" align="center" cellpadding="5" cellspacing="0" border="0">
    <tr>
    	<td width="10%"><strong>#</strong></td>
        <td width="30%"><strong>Name</strong></td>
        <td width="10%"><strong>Price</strong></td>
        <td width="10%" align="center" colspan="3"><strong>Quantity</strong></td>
    </tr>
    <?php 
$shopgold = $userRow['gold']; 
$pricegold = 255; 
$maxkopengold = $shopgold / $pricegold;
?>
    <tr>
        <td><img src="metals/gold.png" width="100%"></td>
        <td>Gold</td>
        <td><?php echo $pricegold; ?></td>
        <td><button name="goldValue" onClick="countDownGold()" value="<?php echo $maxkopengold; ?>">-</button></td>
        <td align="center">(<span id="goldValue">0</span>/<?php echo $maxkopengold; ?>)</td>
        <td><button name="goldValueUp" onClick="countUpGold()" value="<?php echo $maxkopengold; ?>">+</button></td>
    </tr>
        <?php 
$shopsilver = $userRow['gold']; 
$pricesilver = 10; 
$maxkopensilver = $shopsilver / $pricesilver;
?>
    <tr>
        <td><img src="metals/silver.png" width="100%"></td>
        <td>Silver</td>
        <td><?php echo $pricesilver; ?></td>
        <td><button onClick="countDownSilver()" value="silverValue">-</button></td>
        <td align="center">(<span id="silverValue">0</span>/<?php echo $maxkopensilver; ?>)</td>
        <td><button onClick="countUpSilver()" value="silverValue">+</button></td>
    </tr>
    <tr>
</table>
</body>
</html>

