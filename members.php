<?php
include_once'header.php';
include_once 'locations_model.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Member page</title>
	<style type="text/css">
#map {
        height: 100%;
      }
      
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        background-color:lightgreen;
      }
		.head {


   width: 97.4%;

  color: black;
  background: white;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 1%;
}
		
.for{
  width: 97%;
color: black;
  background: white;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 1%;
}
.log{
	width: 97.9%;
	display: inline-block;
	color: white;
    background: black;
	text-align: right;
	border: 1px solid #B0C4DE;
    border-bottom: none;
    border-radius: 0px 0px 10px 10px;
	padding: 10px;
}
.news{
	height:500px;
  width: 100%;
  color: black;
  background: white;
  text-align-left:top;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 10px 10px;
  
  margin: 50px auto 0px;

}
	</style>



</head>
<body>
	<div class="head">
		<img src="smart_garbage_collection_pmc.png" style="width:30%;height:20%;" >
		<h1>Colombo Garbage Collection project</h1>
	</div>
	<div class="log">
	<p>Loging As member</p>
  <button class="logout"><a href=logout.php  style="text-decoration: none;">Log Out</a></button>

	</div>
<div id="map" height="460px" width="100%"></div>
    
   
<div id="for" style="display: none">
       <form id="form" method="POST" action="new.php?">

      <table>
      <tr><td>Name   :<br><input type='text' name='name'/> </td> </tr>
      <tr><td>image :<br><input type="file" name="image" accept="image/*"></td> </tr>
      <tr><td>description  :<br><input type='text' name='description'/></td></tr>
                 <tr><td>lat:<br><input type="text" name="lt" id="lt"></tr></td><tr><td>lng:<br><input type="text" name="lg" id="lg"></td></tr>
                 <tr><td><button name="submited" onclick="myFunction()">Get Location and save</button></td></tr>
                 
      </table>
</form>
</div>

    
    <script>
      var map;
      var marker;
      var infowindow;
      var infowindow1;
      var locations = <?php get_all_locations() ?>;
     //add markers in member map//
      function initMap() {
        
        map = new google.maps.Map(document.getElementById('map'), {
         center: new google.maps.LatLng(6.927417, 79.861071),
                zoom: 15,
        });
        
        infowindow = new google.maps.InfoWindow({
          content: document.getElementById('form')
        });
        google.maps.event.addListener(map, 'click', function(event) {
          marker = new google.maps.Marker({
            position: event.latLng,
            map: map

          });
         google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map, marker);
          });});
         //show add markers in member map//
          var i ; 
          for (i = 0; i < locations.length; i++) {

          marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][3], locations[i][4]),
          map: map,
          
          });
         
        }

      }

      

    </script>




<script>
function myFunction() {
  var latlng = marker.getPosition();
  document.getElementById("lt").value = latlng.lat();
  document.getElementById("lg").value = latlng.lng();

}
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBASl0AXJrqLuHm_negrmEYrBnGntLhIoM&callback=initMap">
    </script>
    
</body>
</html>