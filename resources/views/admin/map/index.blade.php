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
	var myLatLng = {lat: 16.063502, lng: 108.209799};
	var mapOptions = {
		center: myLatLng,
		zoom: 19,
		mapTypeId: google.maps.MapTypeId.HYBRID
	}
	var map = new google.maps.Map(document.getElementById("map"), mapOptions);
	var marker = new google.maps.Marker({position: myLatLng, map: map});
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzmyhWaNEQ_i55-LLOfNPka-8BAhZRUaM&callback=myMap"></script>
@endsection