<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 } 
$memberGold = 0;
$marketGold = 0;
$marketPriceGold = 0;
$totalGold = 0;

$memberSilver = 0;
$marketSilver = 0;
$marketPriceSilver = 0;
$totalSilver = 0;

$memberBronze = 0;
$marketBronze = 0;
$marketPriceBronze = 0;
$totalBronze = 0;

$memberIron = 0;
$marketIron = 0;
$marketPriceIron = 0;
$totalIron = 0;

$memberAluminum = 0;
$marketAluminum = 0;
$marketPriceAluminum = 0;
$totalAluminum = 0;



$mQuery1 = mysqli_query($conn, "SELECT * FROM `members`");
$mQuery2 = mysqli_query($conn, "SELECT * FROM `markets`");

while ($goldOfMember = mysqli_fetch_array($mQuery1)) {
	$memberGold = $memberGold + $goldOfMember['gold'];
	$totalGold = $totalGold + $goldOfMember['gold'];
	
		$memberSilver = $memberSilver + $goldOfMember['silver'];
	$totalSilver = $totalSilver + $goldOfMember['silver'];
	
		$memberBronze = $memberBronze + $goldOfMember['bronze'];
	$totalBronze = $totalBronze + $goldOfMember['bronze'];
	
		$memberIron = $memberIron + $goldOfMember['iron'];
	$totalIron = $totalIron + $goldOfMember['iron'];
	
		$memberAluminum = $memberAluminum + $goldOfMember['aluminum'];
	$totalAluminum = $totalAluminum + $goldOfMember['aluminum'];

}
while ($goldOfMarket = mysqli_fetch_array($mQuery2)) {
	$tijdelijkgoldvalue = $goldOfMarket['goldvalue'];
	$tijdelijkgold = $goldOfMarket['gold'];
	$marketGoldTotal = $marketGoldTotal + $tijdelijkgold;
	$calcMarketGold = $calcMarketGold + ($tijdelijkgold * $tijdelijkgoldvalue);
	$totalGold = $totalGold + $marketGoldTotal;
	//silver
		$tijdelijksilvervalue = $goldOfMarket['silvervalue'];
	$tijdelijksilver = $goldOfMarket['silver'];
	$marketSilverTotal = $marketSilverTotal + $tijdelijksilver;
	$calcMarketSilver = $calcMarketSilver + ($tijdelijksilver * $tijdelijksilvervalue);
	$totalSilver = $totalSilver + $marketSilverTotal;
	
		$tijdelijkbronzevalue = $goldOfMarket['bronzevalue'];
	$tijdelijkbronze = $goldOfMarket['bronze'];
	$marketBronzeTotal = $marketBronzeTotal + $tijdelijkbronze;
	$calcMarketBronze = $calcMarketBronze + ($tijdelijkbronze * $tijdelijkbronzevalue);
	$totalBronze = $totalBronze + $marketBronzeTotal;
	
		$tijdelijkironvalue = $goldOfMarket['ironvalue'];
	$tijdelijkiron = $goldOfMarket['iron'];
	$marketIronTotal = $marketIronTotal + $tijdelijkiron;
	$calcMarketIron = $calcMarketIron + ($tijdelijkiron * $tijdelijkironvalue);
	$totalIron = $totalIron + $marketIronTotal;
	
		$tijdelijkaluminumvalue = $goldOfMarket['aluminumvalue'];
	$tijdelijkaluminum = $goldOfMarket['aluminum'];
	$marketAluminumTotal = $marketAluminumTotal + $tijdelijkaluminum;
	$calcMarketAluminum = $calcMarketAluminum + ($tijdelijkaluminum * $tijdelijkaluminumvalue);
	$totalAluminum = $totalAluminum + $marketAluminumTotal;
}
$allCalc = $totalGold + $totalSilver + $totalBronze + $totalIron + $totalAluminum;

$calculateTheResult = $allCalc / 5;

$resultGold = $calculateTheResult / $totalGold;
$resultSilver = $calculateTheResult / $totalSilver;
$resultBronze = $calculateTheResult / $totalBronze;
$resultIron = $calculateTheResult / $totalIron;
$resultAluminum = $calculateTheResult / $totalAluminum;

$resultGold = round($resultGold,2);
$resultSilver = round($resultSilver,2);
$resultBronze = round($resultBronze,2);
$resultIron = round($resultIron,2);
$resultAluminum = round($resultAluminum,2);

$calcMemberGold = $memberGold * $resultGold;
$calcGold = ($calcMarketGold + $calcMemberGold) / $totalGold;
$calcGold = round($calcGold,2);

$calcMemberSilver = $memberSilver * $resultSilver;
$calcSilver = ($calcMarketSilver + $calcMemberSilver) / $totalSilver;
$calcSilver = round($calcSilver,2);

$calcMemberBronze = $memberBronze * $resultBronze;
$calcBronze = ($calcMarketBronze + $calcMemberBronze) / $totalBronze;
$calcBronze = round($calcBronze,2);

$calcMemberIron = $memberIron * $resultIron;
$calcIron = ($calcMarketIron + $calcMemberIron) / $totalIron;
$calcIron = round($calcIron,2);

$calcMemberAluminum = $memberAluminum * $resultAluminum;
$calcAluminum = ($calcMarketAluminum + $calcMemberAluminum) / $totalAluminum;
$calcAluminum = round($calcAluminum,2);


?>
<table width="90%" border="0" cellspacing="5" cellpadding="5" align="center" bgcolor="#CCFFFF">
  <tr>
    <td width="37%" rowspan="12" align="center" valign="middle" style="color:#333; font-size:26px" bgcolor="#66FF99"><strong>METALS</strong></td>
    <td width="38%" style="color:#333; font-size:20px"><img src="metals/gold.png" width="20" /> GOLD</td>
    <td width="25%"><div align="center" style="color:#09F; font-size:24px">&Psi;<strong><?php echo $resultGold; ?></strong></div></td>
  </tr>
  <tr>
    <td style="color:#333; font-size:20px"><img src="metals/silver.png" width="20" /> SILVER</td>
    <td><div align="center" style="color:#09F; font-size:24px">&Psi;<strong><?php echo $resultSilver; ?></strong></div></td>
  </tr>
  <tr>
    <td style="color:#333; font-size:20px"><img src="metals/bronze.png" width="20" /> BRONZE</td>
    <td><div align="center" style="color:#09F; font-size:24px">&Psi;<strong><?php echo $resultBronze; ?></strong></div></td>
  </tr>
  <tr>
    <td style="color:#333; font-size:20px"><img src="metals/iron.png" width="20" /> IRON</td>
    <td><div align="center" style="color:#09F; font-size:24px">&Psi;<strong><?php echo $resultIron; ?></strong></div></td>
  </tr>
  <tr>
    <td style="color:#333; font-size:20px"><img src="metals/aluminum.png" width="20" /> ALUMINUM</td>
    <td><div align="center" style="color:#09F; font-size:24px">&Psi;<strong><?php echo $resultAluminum; ?></strong></div></td>
  </tr>
</table>