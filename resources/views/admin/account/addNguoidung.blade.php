

@extends('template.admin.master') {{-- kế thừa từ master.blade.php --}}
@section('content') {{-- gọi lại tên trong yield --}}
<style type="text/css" media="screen">
   label {
   margin-top: 1%;
   font-weight: bold;
   }
</style>
<script type="text/javascript">
   $(document).ready(function() {
      var x = document.getElementsByClassName('active has-sub');
      var i;
      for(i=0;i<x.length;i++)
         x[i].className = "none";
      document.getElementById('tknd').className = 'active has-sub' ;
   } );
</script>
</div>
<h3 style="margin-bottom:2%;"z>Thêm mới người dùng</h3>
<div class="form-group">
   <form action="{{route('sosadmin.user.AddUser')}}"" method="post" accept-charset="utf-8">
      {{csrf_field()}}
      <div class="form-group">
         <label>Số cmnd</label><input class="form-control" type="text" name="cmnd" value="">
      </div>
      @if($errors->has('cmnd'))
      <b><font color="red">{{$errors->first('cmnd')}}!</font></b>
      @endif
      <div class="form-group">
         <label>Họ và tên</label><input class="form-control" type="text" name="ten" value="">
      </div>
      @if($errors->has('ten'))
      <b><font color="red">{{$errors->first('ten')}}!</font></b>
      @endif
      <div class="form-group">
         <label>Ngày Sinh</label><input class="form-control" type="date" name="ngaysinh" value="">
      </div>
      @if($errors->has('ngaysinh'))
      <b><font color="red">{{$errors->first('ngaysinh')}}!</font></b>
      @endif
      <div class="form-group">
         <label>Email</label><input class="form-control" type="email" name="email" value="">
      </div>
      @if($errors->has('email'))
      <b><font color="red">{{$errors->first('email')}}!</font></b>
      @endif
      <div class="form-group">
         <label>Điện thoại</label><input class="form-control" type="text" name="dienthoai" value="">
      </div>
      @if($errors->has('dienthoai'))
      <b><font color="red">{{$errors->first('dienthoai')}}!</font></b>
      @endif
      <div class="form-group">
         <label>Mật khẩu</label><input class="form-control" type="text" name="matkhau" value="">
      </div>
      @if($errors->has('matkhau'))
      <b><font color="red">{{$errors->first('matkhau')}}!</font></b>
      @endif
      <div class="form-group">
         <label>Hình ảnh</label><input class="form-control" type="file" name="hinhanh" value="">
      </div>
      @if($errors->has('hinhanh'))
      <b><font color="red">{{$errors->first('hinhanh')}}!</font></b>
      @endif
      <div class="form-group"></div>
      <br>
      <input type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small" name="" value="Thêm tài khoản">
   </form>
</div>
@endsection

