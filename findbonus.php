<html>
<head>

  <title>Google Maps Multiple Markers</title>
  

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2tkWEsbrA7GxFfnzo-de8jRCmh3yGaPM&callback=initMap" async defer></script></head>
<body>
<table width="90%" cellpadding="0" cellspacing="0" align="center">
<tr>
<td>Click on the markers to view the bonus information<br>Map not showing? Try refreshing the page!</td>
</tr>
<tr>
<td>
  <div id="map" style="height: 400px; width: 500px; z-index: 0; color: #000">
</div></td>
</tr>
</table>
<script type="text/javascript">
    var locations = [
		<?php 
	$bonu=mysqli_query($conn, "SELECT * FROM bonus WHERE found = '0' ORDER BY ID DESC ");
	$bid = 2;
	while ($bonusRow = mysqli_fetch_array($bonu)) {
		$bonname = $bonusRow['name'];
		$bonlocation = $bonusRow['location'];
	?>
      ['<?php echo $bonname; ?>',<?php echo $bonlocation; ?>, <?php echo $bid; ?>],
	  <?php $bid++; ?>
<?php } ?>
['DO NOT GO HERE', 52.383333, 4.916667, 1]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(52.40, 4.90),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
</body>
</html>