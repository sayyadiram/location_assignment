<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
  
  <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
</head>

<body>
    
    <p>Catch your current location</p>
    <div class="abc">
        <button onclick="getLocation()">Get your location</button>
        <!--<input type="text" name="latitude"  value=""readonly>
        <input type="text" name="longitude" value="" readonly>-->
        <br><br>
        <a href="add_location.php" >Add your location</a>
    </div>
    <div id="mapDiv" style="width:100%; height: 500px"></div>
    <script>
        //intalize latitude and longitude
        var lat;
        var lng;
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } 
            else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        function showPosition(position) {
            lat = position.coords.latitude; 
            lng = position.coords.longitude;
            
            // //pass value to input
            // document.latitude.value = lat;
            // document.longitude.value = lng;

            // initialize map
            map = L.map('mapDiv').setView([lat, lng], 13);

            // set map tiles source
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 18,
            }).addTo(map);

            // add marker to the map
            marker = L.marker([lat, lng]).addTo(map);

            // add popup to the marker
            //marker.bindPopup("<b>ACME CO.</b><br />This st. 48<br />New York").openPopup();
        }
    </script>
</body>
</html>