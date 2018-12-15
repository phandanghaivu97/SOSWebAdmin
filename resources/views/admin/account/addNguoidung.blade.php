@extends('template.admin.master') {{-- kế thừa từ master.blade.php --}}
@section('content') {{-- gọi lại tên trong yield --}}
<style type="text/css" media="screen">
   label {
      margin-top: 1%;
      font-weight: bold;
   }
</style>
</style>
   <h3 style="margin-bottom:2%;"z>Thêm mới người dùng</h3>
   <div class="form-group">
      <form action="{{route('sosadmin.user.AddUser')}}"" method="post" accept-charset="utf-8">
         {{csrf_field()}}
         <label>Số cmnd</label><input class="form-control" type="text" name="cmnd" value="">
         <label>Họ và tên</label><input class="form-control" type="text" name="ten" value="">
         <label>Ngày Sinh</label><input class="form-control" type="date" name="ngaysinh" value="">
         <label>Email</label><input class="form-control" type="email" name="email" value="">
         <label>Điện thoại</label><input class="form-control" type="text" name="dienthoai" value="">
         <label>Mật khẩu</label><input class="form-control" type="text" name="matkhau" value="">
         <label>Hình ảnh</label><input class="form-control" type="file" name="hinhanh" value="">
         <br>
         <input type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small" name="" value="Thêm tài khoản">
      </form>
   </div>
@endsection
