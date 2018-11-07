

@extends('template.admin.master') {{-- kế thừa từ master.blade.php --}}
@section('content') {{-- gọi lại tên trong yield --}}
    <h2 style="margin-bottom: 3%;">Khóa tài khoản</h2>
    @php
        $id = $thongTinTaiKhoan->ID;
        $email = $thongTinTaiKhoan->EMAIL;
    @endphp
    <form action="{{route('sosadmin.user.postlock')}}" method="POST">
        {{csrf_field()}}
    <div class="form-group">
    <label for="">Tài khoản: {{$email}}</label>
    <input type="hidden" name="Id" value="{{$id}}">
    </div>
    <div class="form-group">
        <label for="">Từ ngày</label>
        <input type="date" name="TuNgay" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Đến ngày</label>
        <input type="date" name="DenNgay" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Lý do</label>
        <textarea name="LyDo" class="form-control"></textarea>
    </div>
    <a class="btn btn-outline-secondary btn-sm" href="{{route('sosadmin.taikhoan.index')}}">Quay về danh sách</a>
    <input type="submit" class="btn btn-primary" value="Khóa">
</form>
@endsection

