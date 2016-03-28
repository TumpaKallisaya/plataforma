
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="<?php echo base_url();?>theme/js/js-maps/jquery.min.js"></script>
<script src="<?php echo base_url();?>theme/js/js-maps/map.class.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
				var mapap0 = new Map(-16.495655697429967, -68.13356295195922, 17);
		            mapap0.init("map-canvasap0");
		            mapap0.changeLatLng("lat-id","lng-id");
		            mapap0.findAddress("La Paz");        
		            $("#buscar-direccion").click(function() {
		               mapap0.findAddress(document.getElementById("direccion").value);
		            });  
		            });

		;
</script>
		<div id="map-canvasap0" style="width: 700px; height: 350px; border: 2px solid black;"></div>
				<input readonly type="text" class="span3" id="lat-id" placeholder="0.0000">
				<input readonly type="text" class="span3" id="lng-id" placeholder="0.0000">

