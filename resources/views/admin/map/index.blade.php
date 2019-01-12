@extends('template.admin.master') {{-- kế thừa từ master.blade.php --}}
@section('content') {{-- gọi lại tên trong yield --}}
<script type="text/javascript">
    var positions = [
            @foreach($data as $item)
                {lat: {{$item->KINH_DO}},lng: {{$item->VI_DO}}},
            @endforeach
    ];
	$(document).ready(function() {
	   var x = document.getElementsByClassName('active has-sub');
	   var i;
	   for(i=0;i<x.length;i++)
		  x[i].className = "none";
	   document.getElementById('ddn').className = 'active has-sub' ;
	} );
 </script>
	<div class="row">
		<div class="col-md-12">
			<div id = "map" style="width: 100%;height: 500px;">
			</div>
		</div>
	</div>
	<script>
function myMap() {
	var myLatLng = positions[i];
	var mapOptions = {
		center: myLatLng,
		zoom: 19,
		mapTypeId: google.maps.MapTypeId.HYBRID
	}
	var map = new google.maps.Map(document.getElementById("map"), mapOptions);
	for (var i = 0; i < positions.length; i++)
	    var marker = new google.maps.Marker({position: positions[i], map: map});
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzmyhWaNEQ_i55-LLOfNPka-8BAhZRUaM&callback=myMap"></script>
@endsection
