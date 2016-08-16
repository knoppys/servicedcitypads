<script type="text/javascript">
jQuery(document).ready(function(){
	var directionsDisplay;
	var directionsService = new google.maps.DirectionsService();

	function initialize() {
	  directionsDisplay = new google.maps.DirectionsRenderer();
	  	var lat = document.getElementById('lat').value;
		var longi = document.getElementById('long').value;
	  	var mapOptions = {
	    	zoom: 10,
	    	center: new google.maps.LatLng(lat, longi)

	  	};
	  var map = new google.maps.Map(document.getElementById('gmap_canvas'),
	      mapOptions
	      );
	   var marker = new google.maps.Marker({
		      position: new google.maps.LatLng(lat, longi),
		      map: map,		   
		  });
	  directionsDisplay.setMap(map);
	  directionsDisplay.setPanel(document.getElementById('directions-panel'));

	  var control = document.getElementById('control');
	  control.style.display = 'block';
	  map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);
	}


	jQuery(document).ready(function(){
		  jQuery('#go').click(function(){
			  	var start = document.getElementById('latlong').value;
			  var end = document.getElementById('end').value;
			  var request = {
			    origin: start,
			    destination: end,
			    travelMode: google.maps.TravelMode.DRIVING
			  };
			  directionsService.route(request, function(response, status) {
			    if (status == google.maps.DirectionsStatus.OK) {
			      directionsDisplay.setDirections(response);
			    }
			  });
			});
	});



	google.maps.event.addDomListener(window, 'load', initialize);
})
</script>
	<div class="apartments-map">
	<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
	<div class="row" style="position:relative;">
		<div class="col-md-12">
			<div id="control" class="panel">
		      <strong>Directions from here to:</strong>
		      <input type="text" id="end" placeholder="Town / City / Post Code">
		      <a class="btn btn-primary" id="go">Go</a>
		    </div>	 
		</div>			
	</div>
	<div class="row" style="position:relative;">
		<div class="col-md-12">
			<div id="gmap_canvas" style="height:500px;width:100%;"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div id="directions-panel" class="panel"></div>
		</div>
	</div>
	</div>	

	


