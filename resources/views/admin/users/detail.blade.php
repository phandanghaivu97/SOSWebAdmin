@extends('template.admin.master') {{-- kế thừa từ master.blade.php --}}
@section('content') {{-- gọi lại tên trong yield --}}
<div class="row">
	<div class="col-sm-5 col-md-6">
		<div class="overview-wrap">
                        <h2 class="title-1">Tài Khoản Người Dùng</h2>
                </div><br>
		<h4>Tên:</h4>{{$info->HO_VA_TEN}}<br>
		<h4>CMND: </h4>{{$info->SO_CMND}}<br>
		<h4>Ngày Sinh: </h4>{{$info->NGAY_SINH}}<br>
		<h4>Email: </h4>{{$info->EMAIL}}<br>
		<h4>Số điện thoại: </h4>{{$info->DIEN_THOAI}}<br>
		<h4>Ngày đăng ký: </h4>{{$info->NGAY_DANG_KY}}<br>
	</div>
	<div class="
col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-0">
		<img src="{{url('img/icon/avatar-01.jpg')}}" width="600px" height="600px">
	</div>
    <a class="btn btn-outline-secondary btn-sm" href="{{route('sosadmin.taikhoan.index')}}">Quay về danh sách</a>
    @if($info->TINH_TRANG == 0)
	<a class="btn btn-primary" href="{{route('sosadmin.taikhoan.xacnhan',['cmnd'=>$info->SO_CMND])}}" style="margin-left: 5%;">Xác nhận tài khoản</a>
    @endif
</div>
@endsection
