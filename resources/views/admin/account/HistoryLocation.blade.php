@extends('template.admin.master') {{-- kế thừa từ master.blade.php --}}
@section('content') {{-- gọi lại tên trong yield --}}
<script type="text/javascript">
    var positions = [
        @foreach($locations as $location)
            {lat: {{$location->KINH_DO}},lng: {{$location->VI_DO}}},
        @endforeach
    ];
    var titles = [
        @foreach($locations as $location)
            {{$location->THOI_GIAN}},
        @endforeach
    ];
</script>
	<div class="row">
		<div class="col-md-12">
			<div id = "map" style="width: 100%;height: 500px;">
			</div>
		</div>
    </div>
    <table id="example" class="table table-striped table-bordered" style="width:100%;margin-top: 5%;">
        <thead>
           <tr style="background-color: #424949;color:#f0f3f4;">
              <th>Nguoid dùng</th>
              <th>Thời gian</th>
              <th>Địa điểm</th>
           </tr>
        </thead>
        <tbody>
           @foreach($locations as $location)
           <tr>
              <td>{{$location->HO_VA_TEN}}</td>
              <td>{{$location->THOI_GIAN}}</td>
              <td>{{$location->NOI_DUNG}}</td>
           </tr>
           @endforeach
        </tbody>
        <tfoot>
           <tr style="background-color: #424949;color:#f0f3f4;">
            <th>Nguoid dùng</th>
            <th>Thời gian</th>
            <th>Địa điểm</th>
           </tr>
        </tfoot>
     </table>
<script>
function myMap() {
	var mapOptions = {
		center: positions[0],
		zoom: 17,
		mapTypeId: google.maps.MapTypeId.HYBRID
	}
	var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    for (var i = 0; i < positions.length; i++)
	    var marker = new google.maps.Marker({position: positions[i], map: map,title: ''+titles[i]});
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzmyhWaNEQ_i55-LLOfNPka-8BAhZRUaM&callback=myMap"></script>
@endsection
