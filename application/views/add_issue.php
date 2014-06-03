<div class="container">


<div class="row">
  <div class="col-md-4">

  <h3>Describe the Problem</h3>

  <?php echo $errors; ?>
  <?php echo $form; ?>
    



  </div>
  <div class="col-md-8">






  <div id="map-canvas"></div>





  </div>
</div>

</div>



<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>


<script type="text/javascript">
      function initialize() {

         var myLatlng = new google.maps.LatLng(28.632916, 77.219424);


        var mapOptions = {
          center: myLatlng,
          zoom: 6
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);

var marker = new google.maps.Marker({
      draggable:true,
      position: myLatlng,
      map: map,
      title: 'Hello World!'
  });

google.maps.event.addListener(marker, 'dragend', function() 
{
    geocodePosition(marker.getPosition());
});


  }
google.maps.event.addDomListener(window, 'load', initialize);




function geocodePosition(pos) 
{
   geocoder = new google.maps.Geocoder();
   geocoder.geocode
    ({
        latLng: pos
    }, 
        function(results, status) 
        {
            if (status == google.maps.GeocoderStatus.OK) 
            {
                
                console.log(results[0].formatted_address);
                //$("#mapSearchInput").val(results[0].formatted_address);
                //$("#mapErrorMsg").hide(100);
            } 
            else 
            {
                console.log('errro');
                //$("#mapErrorMsg").html('Cannot determine address at this location.'+status).show(100);
            }
        }
    );
}

</script>



