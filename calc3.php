<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 } 

$memberAir = 0;
$marketAir = 0;
$marketPriceAir = 0;
$totalAir = 0;

$memberDragon = 0;
$marketDragon = 0;
$marketPriceDragon = 0;
$totalDragon = 0;

$memberElectric = 0;
$marketElectric = 0;
$marketPriceElectric = 0;
$totalElectric = 0;

$memberFire = 0;
$marketFire = 0;
$marketPriceFire = 0;
$totalFire = 0;

$memberGhost = 0;
$marketGhost = 0;
$marketPriceGhost = 0;
$totalGhost = 0;

 $memberGrass = 0;
$marketGrass = 0;
$marketPriceGrass = 0;
$totalGrass = 0;

$memberGround = 0;
$marketGround = 0;
$marketPriceGround = 0;
$totalGround = 0;

$memberIce = 0;
$marketIce = 0;
$marketPriceIce = 0;
$totalIce = 0;

 $memberPoison = 0;
$marketPoison = 0;
$marketPricePoison = 0;
$totalPoison = 0;
 
  $memberPsychic = 0;
$marketPsychic = 0;
$marketPricePsychic = 0;
$totalPsychic = 0;
 
  $memberRock = 0;
$marketRoc = 0;
$marketPriceRoc = 0;
$totalRoc = 0;
 
  $memberWater = 0;
$marketWater = 0;
$marketPriceWater = 0;
$totalWater = 0;
 

$mQuery3 = mysqli_query($conn, "SELECT * FROM `members`");
$mQuery4 = mysqli_query($conn, "SELECT * FROM `markets`");

while ($elementsMember = mysqli_fetch_array($mQuery3)) {		
	$memberAir = $memberAir + $elementsMember['air'];
	$totalAir = $totalAir + $elementsMember['air'];

	$memberDragon = $memberDragon + $elementsMember['dragon'];
	$totalDragon = $totalDragon + $elementsMember['dragon'];
	
	$memberElectric = $memberElectric + $elementsMember['electric'];
	$totalElectric = $totalElectric + $elementsMember['electric'];
	
	$memberFire = $memberFire + $elementsMember['fire'];
	$totalFire = $totalFire + $elementsMember['fire'];
	
	$memberGhost = $memberGhost + $elementsMember['ghost'];
	$totalGhost = $totalGhost + $elementsMember['ghost'];
	
	$memberGrass = $memberGrass + $elementsMember['grass'];
	$totalGrass = $totalGrass + $elementsMember['grass'];
	
	$memberGround = $memberGround + $elementsMember['ground'];
	$totalGround = $totalGround + $elementsMember['ground'];
	
	$memberIce = $memberIce + $elementsMember['ice'];
	$totalIce = $totalIce + $elementsMember['ice'];
	
	$memberPoison = $memberPoison + $elementsMember['poison'];
	$totalPoison = $totalPoison + $elementsMember['poison'];
	
	$memberPsychic = $memberPsychic + $elementsMember['psychic'];
	$totalPsychic = $totalPsychic + $elementsMember['psychic'];
	
	$memberRock = $memberRock + $elementsMember['rock'];
	$totalRock = $totalRock + $elementsMember['rock'];
	
	$memberWater = $memberWater + $elementsMember['water'];
	$totalWater = $totalWater + $elementsMember['water'];
	
}
while ($elementsMarket = mysqli_fetch_array($mQuery4)) {
	// Air
	$tijdelijkairvalue = $elementsMarket['airvalue'];
	$tijdelijkair = $elementsMarket['air'];
	$marketAirTotal = $marketAirTotal + $tijdelijkair;
	$calcMarketAir = $calcMarketAir + ($tijdelijkair * $tijdelijkairvalue);
	$totalAir = $totalAir + $marketAirTotal;
	// Dragon
	$tijdelijkdragonvalue = $elementsMarket['dragonvalue'];
	$tijdelijkdragon = $elementsMarket['dragon'];
	$marketDragonTotal = $marketDragonTotal + $tijdelijkdragon;
	$calcMarketDragon = $calcMarketDragon + ($tijdelijkdragon * $tijdelijkdragonvalue);
	$totalDragon = $totalDragon + $marketDragonTotal;
	// Electric
	$tijdelijkelectricvalue = $elementsMarket['electricvalue'];
	$tijdelijkelectric = $elementsMarket['electric'];
	$marketElectricTotal = $marketElectricTotal + $tijdelijkelectric;
	$calcMarketElectric = $calcMarketElectric + ($tijdelijkelectric * $tijdelijkelectricvalue);
	$totalElectric = $totalElectric + $marketElectricTotal;
	// Fire
	$tijdelijkfirevalue = $elementsMarket['firevalue'];
	$tijdelijkfire = $elementsMarket['fire'];
	$marketFireTotal = $marketFireTotal + $tijdelijkfire;
	$calcMarketFire = $calcMarketFire + ($tijdelijkfire * $tijdelijkfirevalue);
	$totalFire = $totalFire + $marketFireTotal;
	// Ghost
	$tijdelijkghostvalue = $elementsMarket['ghostvalue'];
	$tijdelijkghost = $elementsMarket['ghost'];
	$marketGhostTotal = $marketGhostTotal + $tijdelijkghost;
	$calcMarketGhost = $calcMarketGhost + ($tijdelijkghost * $tijdelijkghostvalue);
	$totalGhost = $totalGhost + $marketGhostTotal;
	// Grass
	$tijdelijkgrassvalue = $elementsMarket['grassvalue'];
	$tijdelijkgrass = $elementsMarket['grass'];
	$marketGrassTotal = $marketGrassTotal + $tijdelijkgrass;
	$calcMarketGrass = $calcMarketGrass + ($tijdelijkgrass * $tijdelijkgrassvalue);
	$totalGrass = $totalGrass + $marketGrassTotal;
	// Ground
	$tijdelijkgroundvalue = $elementsMarket['groundvalue'];
	$tijdelijkground = $elementsMarket['ground'];
	$marketGroundTotal = $marketGroundTotal + $tijdelijkground;
	$calcMarketGround = $calcMarketGround + ($tijdelijkground * $tijdelijkgroundvalue);
	$totalGround = $totalGround + $marketGroundTotal;
	// Ice
	$tijdelijkicevalue = $elementsMarket['icevalue'];
	$tijdelijkice = $elementsMarket['ice'];
	$marketIceTotal = $marketIceTotal + $tijdelijkice;
	$calcMarketIce = $calcMarketIce + ($tijdelijkice * $tijdelijkicevalue);
	$totalIce = $totalIce + $marketIceTotal;
	// Poison
	$tijdelijkpoisonvalue = $elementsMarket['poisonvalue'];
	$tijdelijkpoison = $elementsMarket['poison'];
	$marketPoisonTotal = $marketPoisonTotal + $tijdelijkpoison;
	$calcMarketPoison = $calcMarketPoison + ($tijdelijkpoison * $tijdelijkpoisonvalue);
	$totalPoison = $totalPoison + $marketPoisonTotal;
	// Psychic
	$tijdelijkpsychicvalue = $elementsMarket['psychicvalue'];
	$tijdelijkpsychic = $elementsMarket['psychic'];
	$marketPsychicTotal = $marketPsychicTotal + $tijdelijkpsychic;
	$calcMarketPsychic = $calcMarketPsychic + ($tijdelijkpsychic * $tijdelijkpsychicvalue);
	$totalPsychic = $totalPsychic + $marketPsychicTotal;
	// Rock
	$tijdelijkrockvalue = $elementsMarket['rockvalue'];
	$tijdelijkrock = $elementsMarket['rock'];
	$marketRockTotal = $marketRockTotal + $tijdelijkrock;
	$calcMarketRock = $calcMarketRock + ($tijdelijkrock * $tijdelijkrockvalue);
	$totalRock = $totalRock + $marketRockTotal;
	// Water
	$tijdelijkwatervalue = $elementsMarket['watervalue'];
	$tijdelijkwater = $elementsMarket['water'];
	$marketWaterTotal = $marketWaterTotal + $tijdelijkwater;
	$calcMarketWater = $calcMarketWater + ($tijdelijkwater * $tijdelijkwatervalue);
	$totalWater = $totalWater + $marketWaterTotal;


}
$eleCalc = $totalAir + $totalDragon + $totalElectric + $totalFire + $totalGhost + $totalGrass + $totalGround + $totalIce + $totalPoison + $totalPsychic + $totalRock + $totalWater;

$calculateEleResult = $eleCalc / 12;

$resultAir = $calculateEleResult / $totalAir;
$resultDragon = $calculateEleResult / $totalDragon;
$resultElectric = $calculateEleResult / $totalElectric;
$resultFire = $calculateEleResult / $totalFire;
$resultGhost = $calculateEleResult / $totalGhost;
$resultGrass = $calculateEleResult / $totalGrass;
$resultGround = $calculateEleResult / $totalGround;
$resultIce = $calculateEleResult / $totalIce;
$resultPoison = $calculateEleResult / $totalPoison;
$resultPsychic = $calculateEleResult / $totalPsychic;
$resultRock = $calculateEleResult / $totalRock;
$resultWater = $calculateEleResult / $totalWater;


$resultAir = round($resultAir,2);
$resultDragon = round($resultDragon,2);
$resultElectric = round($resultElectric,2);
$resultFire = round($resultFire,2);
$resultGhost = round($resultGhost,2);
$resultGrass = round($resultGrass,2);
$resultGround = round($resultGround,2);
$resultIce = round($resultIce,2);
$resultPoison = round($resultPoison,2);
$resultPsychic = round($resultPsychic,2);
$resultRock = round($resultRock,2);
$resultWater = round($resultWater,2);



$calcMemberAir = $memberAir * $resultAir;
$calcAir = ($calcMarketAir + $calcMemberAir) / $totalAir;
$calcAir = round($calcAir,2);

$calcMemberDragon = $memberDragon * $resultDragon;
$calcDragon = ($calcMarketDragon + $calcMemberDragon) / $totalDragon;
$calcDragon = round($calcDragon,2);

$calcMemberElectric = $memberElectric * $resultElectric;
$calcElectric = ($calcMarketElectric + $calcMemberElectric) / $totalElectric;
$calcElectric = round($calcElectric,2);

$calcMemberFire = $memberFire * $resultFire;
$calcFire = ($calcMarketFire + $calcMemberFire) / $totalFire;
$calcFire = round($calcFire,2);

$calcMemberGhost = $memberGhost * $resultGhost;
$calcGhost = ($calcMarketGhost + $calcMemberGhost) / $totalGhost;
$calcGhost = round($calcGhost,2);

$calcMemberGrass = $memberGrass * $resultGrass;
$calcGrass = ($calcMarketGrass + $calcMemberGrass) / $totalGrass;
$calcGrass = round($calcGrass,2);

$calcMemberGround = $memberGround * $resultGround;
$calcGround = ($calcMarketGround + $calcMemberGround) / $totalGround;
$calcGround = round($calcGround,2);

$calcMemberIce = $memberIce * $resultIce;
$calcIce = ($calcMarketIce + $calcMemberIce) / $totalIce;
$calcIce = round($calcIce,2);

$calcMemberPoison = $memberPoison * $resultPoison;
$calcPoison = ($calcMarketPoison + $calcMemberPoison) / $totalPoison;
$calcPoison = round($calcPoison,2);

$calcMemberPsychic = $memberPsychic * $resultPsychic;
$calcPsychic = ($calcMarketPsychic + $calcMemberPsychic) / $totalPsychic;
$calcPsychic = round($calcPsychic,2);

$calcMemberRock = $memberRock * $resultRock;
$calcRock = ($calcMarketRock + $calcMemberRock) / $totalRock;
$calcRock = round($calcRock,2);

$calcMemberWater = $memberWater * $resultWater;
$calcWater = ($calcMarketWater + $calcMemberWater) / $totalWater;
$calcWater = round($calcWater,2);

?>
<table width="90%" border="0" cellspacing="5" cellpadding="5" align="center" bgcolor="#CCFFFF">
  <tr>
    <td width="37%" rowspan="12" align="center" valign="middle" style="color:#333; font-size:26px" bgcolor="#66FF99"><strong>ELEMENTS</strong></td>
    <td width="38%" style="color:#333; font-size:20px"><img src="elements/air.png" width="20" /> AIR</td>
    <td width="25%"><div align="center" style="color:#09F; font-size:24px">&Psi;<strong><?php echo $resultAir; ?></strong></div></td>
  </tr>
  <tr>
    <td style="color:#333; font-size:20px"><img src="elements/dragon.png" width="20" /> DRAGON</td>
    <td><div align="center" style="color:#09F; font-size:24px">&Psi;<strong><?php echo $resultDragon; ?></strong></div></td>
  </tr>
  <tr>
    <td style="color:#333; font-size:20px"><img src="elements/electric.png" width="20" /> ELECTRIC</td>
    <td><div align="center" style="color:#09F; font-size:24px">&Psi;<strong><?php echo $resultElectric; ?></strong></div></td>
  </tr>
  <tr>
    <td style="color:#333; font-size:20px"><img src="elements/fire.png" width="20" /> FIRE </td>
    <td><div align="center" style="color:#09F; font-size:24px">&Psi;<strong><?php echo $resultFire; ?></strong></div></td>
  </tr>
  <tr>
    <td style="color:#333; font-size:20px"><img src="elements/ghost.png" width="20" /> GHOST</td>
    <td><div align="center" style="color:#09F; font-size:24px">&Psi;<strong><?php echo $resultGhost; ?></strong></div></td>
  </tr>
    <tr>
    <td style="color:#333; font-size:20px"><img src="elements/grass.png" width="20" /> GRASS</td>
    <td><div align="center" style="color:#09F; font-size:24px">&Psi;<strong><?php echo $resultGrass; ?></strong></div></td>
  </tr>
    <tr>
    <td style="color:#333; font-size:20px"><img src="elements/ground.png" width="20" /> GROUND</td>
    <td><div align="center" style="color:#09F; font-size:24px">&Psi;<strong><?php echo $resultGround; ?></strong></div></td>
  </tr>
    <tr>
    <td style="color:#333; font-size:20px"><img src="elements/ice.png" width="20" /> ICE</td>
    <td><div align="center" style="color:#09F; font-size:24px">&Psi;<strong><?php echo $resultIce; ?></strong></div></td>
  </tr>
    <tr>
    <td style="color:#333; font-size:20px"><img src="elements/poison.png" width="20" /> POISON</td>
    <td><div align="center" style="color:#09F; font-size:24px">&Psi;<strong><?php echo $resultPoison; ?></strong></div></td>
  </tr>
    <tr>
    <td style="color:#333; font-size:20px"><img src="elements/psychic.png" width="20" /> PSYCHIC</td>
    <td><div align="center" style="color:#09F; font-size:24px">&Psi;<strong><?php echo $resultPsychic; ?></strong></div></td>
  </tr>
    <tr>
    <td style="color:#333; font-size:20px"><img src="elements/rock.png" width="20" /> ROCK</td>
    <td><div align="center" style="color:#09F; font-size:24px">&Psi;<strong><?php echo $resultRock; ?></strong></div></td>
  </tr>
    <tr>
    <td style="color:#333; font-size:20px"><img src="elements/water.png" width="20" /> WATER</td>
    <td><div align="center" style="color:#09F; font-size:24px">&Psi;<strong><?php echo $resultWater; ?></strong></div></td>
  </tr>
</table>