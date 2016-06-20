<?php

 echo "<script type='text/javascript'
      src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBDGEH75PFLiwTiCUrpj1lPWB5p19cye04&sensor=false'>
    </script>
	
	<script type='text/javascript'>
        var mapOptions = {
          center: { lat: ".$_REQUEST['tdk'].", lng: ".$_REQUEST['tdv']."},
          zoom: 16
        };
        var map = new google.maps.Map(document.getElementById('maps'),
            mapOptions);
     
      
    </script>";

?>