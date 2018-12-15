

@extends('template.admin.master') {{-- kế thừa từ master.blade.php --}}
@section('content') {{-- gọi lại tên trong yield --}}
<script type="text/javascript">
   $(document).ready(function() {
      var x = document.getElementsByClassName('active has-sub');
	   var i;
	   for(i=0;i<x.length;i++)
		  x[i].className = "none";
	   document.getElementById('ndbc').className = 'active has-sub' ;
       $('#example').DataTable();
   } );
</script>
<div style="margin-bottom: 3%;">
   <h2 class="title-1" style="margin-bottom: 2%;">Người dùng bị báo cáo nhiều nhất</h2>
   <form class="form-header" action="{{route('sosadmin.report.search')}}" method="POST">
   	{{csrf_field()}}
      <input class="au-input au-input--xl" type="text" name="search" placeholder="Tìm theo tên người dùng" />
      <button class="au-btn--submit" type="submit">
      <i class="zmdi zmdi-search"></i>
      </button>
   </form>
   <a href="{{route('sosadmin.report.index')}}" style="color: #4272D7;">Hủy tìm!</a>
</div>
<style type="text/css">
	a{
	    color: white;
	}
</style>
<div class="row">
   <div class="col-lg-3">
      <div class="au-card au-card--bg-blue au-card-top-countries m-b-30">
         <div class="au-card-inner">
            <div class="table-responsive">
               <h3 style="color: #fff">Tên người dùng</h3>
               <table class="table table-top-countries">
                  <tbody>
                     @foreach($danhSach as $item)
                     @php
                     	$id = $item->NGUOI_BI_BAO_CAO;
                     @endphp
	                     <tr>
	                        <td><a href="{{route('sosadmin.report.detail',['id'=>$id])}}">{{$item->HO_VA_TEN}}</a></td>
	                        <td class="text-right">{{$item->SO_LAN}}</td>
	                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-9">
      <div class="table-responsive table--no-card m-b-30">
         <table class="table table-borderless table-striped table-earning">
            <thead>
               <tr>
                  <th>Thời gian</th>
                  <th>Người báo cáo</th>
                  <th>Tọa độ</th>
                  <th>Ghi chú</th>
                  <th>Khóa tài khoản</th>
               </tr>
            </thead>
            <tbody>
            	@if(isset($danhSachChiTiet))
	            	@foreach($danhSachChiTiet as $item)
	               		<tr>
                  			<td>{{$item->NGAY_BAO_CAO}}</td>
                           <td>{{$item->HO_VA_TEN}}</td>
                           <td><a href="{{route('sosadmin.map.index',['lat'=>$item->KINH_DO,'lng'=>$item->VI_DO])}}" style="color: #1a8cff;">Xem</a></td>
                           <td>{{$item->GHI_CHU}}</td>
                           <td><a href="{{route('sosadmin.user.getlock',['id'=>$item->NGUOI_BI_BAO_CAO])}}" style="color: #1a8cff;">Thực hiện</a></td>
               			</tr>
	                @endforeach
                @endif
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection

