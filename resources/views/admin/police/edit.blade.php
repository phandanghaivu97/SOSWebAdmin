

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
       document.getElementById('tkcs').className = 'active has-sub' ;
   } );
</script>
<h3 style="margin-bottom:2%;">Chỉnh sửa thông tin</h3>
<div class="form-group" >
   <form action="{{route('sosadmin.user.PostEditPolice')}}" method="post" accept-charset="utf-8">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{$data->SO_TAI_KHOAN}}">
      <div class="form-group">
         <label>Họ và tên</label><input class="form-control" type="text" name="tene" placeholder="Nhập họ và tên" value="{{$data->HO_VA_TEN}}">
      </div>
      @if($errors->has('tene'))
      <b><font color="red">{{$errors->first('ten')}}!</font></b>
      @endif
      <div class="form-group">
         <label>Tên đăng nhập</label><input class="form-control" type="text" name="tendangnhap" placeholder="Nhập tên đăng nhập" value="{{$data->TEN_DANG_NHAP}}">
      </div>
      @if($errors->has('tendangnhap'))
      <b><font color="red">{{$errors->first('tendangnhap')}}!</font></b>
      @endif
      <div class="form-group">
         <label>Mật khẩu</label><input class="form-control" type="text" name="matkhau" placeholder="Mật khẩu" value="{{$data->MAT_KHAU}}">
      </div>
      @if($errors->has('matkhau'))
      <b><font color="red">{{$errors->first('matkhau')}}!</font></b>
      @endif
      <div class="form-group">
         <label>Đơn vị</label>
         <select name="donvi" class="form-control">
            @foreach($dsDonVi as $item)
                @if($data->DON_VI == $item->MA_DON_VI)
                <option value="{{$item->MA_DON_VI}}" selected>{{$item->TEN_DON_VI}}</option>
                @else
                <option value="{{$item->MA_DON_VI}}">{{$item->TEN_DON_VI}}</option>
                @endif
            @endforeach
         </select>
      </div>
      <div class="form-group">
         <label>Hình ảnh</label><input class="form-control" type="file" name="hinhanhe" value="">
      </div>
      <br>
      <input type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small" name="" value="Thêm tài khoản">
   </form>
</div>
@endsection

