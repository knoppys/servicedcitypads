<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<div style="overflow:hidden;height:400px;width:100%;">
<div id="gmap_canvas" style="height:400px;width:100%;"></div>

<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>

</div>

<script type="text/javascript"> function init_map(){
	var myOptions = {
		zoom:12,
		scrollwheel: false,
		center:new google.maps.LatLng(53.40845359999999,-2.973780799999986),
		mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
		
		marker = new google.maps.Marker({
			map: map,position: new google.maps.LatLng(53.40845359999999, -2.973780799999986)});

		infowindow = new google.maps.InfoWindow({content:"<b>Serviced City Pads Limited</b><br/>29-31 Seymour Terrace, Seymour Street<br/>L3 5PE Liverpool" });
		google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
</script>