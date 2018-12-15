@extends('template.admin.master') {{-- kế thừa từ master.blade.php --}}
@section('content') {{-- gọi lại tên trong yield --}}
<style type="text/css" media="screen">
   label {
      margin-top: 1%;
      font-weight: bold;
   }
</style>
</style>
   <h3 style="margin-bottom:2%;">Chỉnh sửa thông tin người dùng</h3>
   <div class="form-group">
      @php
         $idNguoiDung = $info->ID;
         $idTaiKhoan  = $info->TK_ID;
         $cmnd        = $info->SO_CMND;
         $hoVaTen     = $info->HO_VA_TEN;
         $ngaysinh    = $info->NGAY_SINH;
         $email       = $info->EMAIL;
         $sdt         = $info->DIEN_THOAI;
         $matKhau     = $info->MAT_KHAU;
      @endphp
      <form action="{{route('sosadmin.user.postedit')}}" method="post" accept-charset="utf-8">
         {{csrf_field()}}
         <input type="hidden" name="IdNguoiDung" value="{{$idNguoiDung}}">
         <input type="hidden" name="IdTaiKhoan" value="{{$idTaiKhoan}}">
         <label>Số cmnd</label><input class="form-control" type="text" name="cmnd" value="{{$cmnd}}">
         <label>Họ và tên</label><input class="form-control" type="text" name="ten" value="{{$hoVaTen}}">
         <label>Ngày Sinh</label><input class="form-control" type="date" name="ngaysinh" value="">
         <label>Email</label><input class="form-control" type="email" name="email" value="{{$email}}">
         <label>Điện thoại</label><input class="form-control" type="text" name="dienthoai" value="{{$sdt}}">
         <label>Mật khẩu</label><input class="form-control" type="text" name="matkhau" value="{{$matKhau}}">
         <label>Hình ảnh</label><input class="form-control" type="file" name="hinhanh" value="">
         <br>
         <a href="" class=""></a>
         <input type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small" name="" value="Cấp nhật">
      </form>
   </div>
@endsection
