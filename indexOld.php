<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

<p>Logo</p>
<p>Click the button to get your location.</p>

<button onclick="getLocation()">Location:</button>

<p id="demo"></p>

<script>
var x = document.getElementById("demo");
var ax;


function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
    // var ab = position.coords.latitude;
    // document.write(ab);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
    
function showPosition(position) {
    x.innerHTML="Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
     Lat = position.coords.latitude;
     Long = position.coords.longitude;
         
     // ax ="asdf";
     // document.write(ax);
     <?php
       $test='foods';
       ?>

    
}
var ab = position.coords.latitude;
                   
    document.write('hi');
    document.write(5 + 6);
</script>
<script>
    ax ="asdf";
    document.write('You're located at');
    document.write(ab);
    document.write(ax);
</script>
 <?php 
       
        // echo $test.' food';
 ?>


<p>Click the button below to Clock in.</p>

<button onclick="myFunction()">Clock in</button>

<p id="demo"></p>

<script>
function myFunction() {
  window.location.href = "clockin.php?Lat=" + Lat + "&Long=" + Long;   //send javascript variables to php
}
</script>

</body>
</html>
</body>
</html>
