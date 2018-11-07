@extends('template.admin.master') {{-- kế thừa từ master.blade.php --}}
@section('content') {{-- gọi lại tên trong yield --}}
<style type="text/css" media="screen">
   label {
      margin-top: 1%;
      font-weight: bold;
   }
</style>
<h3 style="margin-bottom:2%;">Thêm mới cảnh sát</h3>
   <div class="form-group" >
      <form action="{{route('sosadmin.user.AddPolice')}}"" method="post" accept-charset="utf-8">
         {{csrf_field()}}
         <label>Số tài khoản</label><input class="form-control" type="text" name="sotaikhoan" placeholder="Nhập số tài khoản" value="">
         <label>Họ và tên</label><input class="form-control" type="text" name="ten" placeholder="Nhập họ và tên" value="">
         <label>Tên đăng nhập</label><input class="form-control" type="text" name="tendangnhap" placeholder="Nhập tên đăng nhập" value="">
         <label>Mật khẩu</label><input class="form-control" type="password" name="matkhau" placeholder="Mật khẩu" value="">
         <label>Đơn vị</label>
            <select name="donvi" class="form-control">
               @foreach($dsDonVi as $item)
               <option value="{{$item->MA_DON_VI}}">{{$item->TEN_DON_VI}}</option>
               @endforeach
            </select>
         <label>Hình ảnh</label><input class="form-control" type="file" name="hinhanh" value="">
         <br>
         <input type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small" name="" value="Thêm tài khoản">
      </form>
   </div>
@endsection