@extends('template.admin.master') {{-- kế thừa từ master.blade.php --}}
@section('content') {{-- gọi lại tên trong yield --}}
	<div class="row">
		<div class="col-md-12">
			<div id = "map" style="width: 100%;height: 500px;">
				
			</div>
		</div>
	</div>
	<script>
function myMap() {
var mapOptions = {
    center: new google.maps.LatLng(	16.047079, 	108.206230),
    zoom: 10,
    mapTypeId: google.maps.MapTypeId.HYBRID
}
var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaZ3DL4SDQidUfXeT3noyB_tcRgv1GkE4&callback=myMap"></script>
@endsection