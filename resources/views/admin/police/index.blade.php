@extends('template.admin.master') {{-- kế thừa từ master.blade.php --}}
@section('content') {{-- gọi lại tên trong yield --}}
<script type="text/javascript">
   $(document).ready(function() {
      var x = document.getElementsByClassName('active has-sub');
	   var i;
	   for(i=0;i<x.length;i++)
		  x[i].className = "none";
	   document.getElementById('tkcs').className = 'active has-sub' ;
       $('#example').DataTable();
   } );
</script>
<div class="row">
   <div class="col-md-12">
      <div style="margin-bottom: 5%;" class="overview-wrap">
         <h2 class="title-1">Tài Khoản Cảnh Sát</h2>
         <a href = "{{route('sosadmin.user.AddPolice')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
            <i class="zmdi zmdi-plus"></i>Thêm tài khoản
         </a>
      </div>
      <table id="example" class="table table-striped table-bordered" style="width:100%">
         <thead>
            <tr style="background-color: #424949;color:#f0f3f4;">
               <th>Số tài khoản</th>
               <th>Họ và tên</th>
               <th>Tên đăng nhập</th>
               <th>Ngày kích hoạt</th>
               <th>Tình trạng</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            @if($danhSach!=null)
               @foreach($danhSach as $item)
               <tr>
                  <td>{{$item->SO_TAI_KHOAN}}</td>
                  <td>{{$item->HO_VA_TEN}}</td>
                  <td>{{$item->TEN_DANG_NHAP}}</td>
                  <td>{{$item->NGAY_KICH_HOAT}}</td>
                  @if($item->TINH_TRANG==0)
                     <td>
                        <span class="status--denied">Đã khóa</span>
                     </td>
                  @else
                     <td>
                        <span class="status--process">Đang sủ dụng</span>
                     </td>
                  @endif
                  <td></td>
                  </tr>
               @endforeach
            @endif
         </tbody>
         <tfoot>
            <tr style="background-color: #424949;color:#f0f3f4;">
               <th>Số tài khoản</th>
               <th>Họ và tên</th>
               <th>Tên đăng nhập</th>
               <th>Ngày kích hoạt</th>
               <th>Tình trạng</th>
               <th></th>
            </tr>
         </tfoot>
      </table>
   </div>
</div>
@endsection

