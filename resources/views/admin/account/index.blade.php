

@extends('template.admin.master') {{-- kế thừa từ master.blade.php --}}
@section('content') {{-- gọi lại tên trong yield --}}
<script type="text/javascript">
   $(document).ready(function() {
       $('#example').DataTable();
   } );
</script>
<div class="row">
   <div class="col-md-12">
      <div class="overview-wrap" style="margin-bottom: 5%;">
         <h2 class="title-1">Tài Khoản Người Dùng</h2>
         <button class="au-btn au-btn-icon au-btn--green au-btn--small">
            <i class="zmdi zmdi-plus"></i>Thêm tài khoản
         </button>
      </div>
      <table id="example" class="table table-striped table-bordered" style="width:100%">
         <thead>
            <tr style="background-color: #424949;color:  #f0f3f4 ;">
               <th>Họ và tên</th>
               <th>Email</th>
               <th>Ngày đăng ký</th>
               <th>Ngày kích hoạt</th>
               <th>Tình trạng</th>
               <th>Điện thoại</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            @foreach($danhSachTaiKhoan as $item)
            @php
            $cmnd = $item->SO_CMND;
            @endphp
            <tr>
               <td>{{$item->HO_VA_TEN}}</td>
               <td>
                  <span class="block-email">{{$item->EMAIL}}</span>
               </td>
               <td>{{$item->NGAY_DANG_KY}}</td>
               @if($item->NGAY_KICH_HOAT=='0000-00-00')
               <td>Chưa kích hoạt</td>
               @else
               <td>{{$item->NGAY_KICH_HOAT}}</td>
               @endif
               @if($item->TINH_TRANG==0)
               <td>
                  <span class="status--denied">Đang chờ</span>
               </td>
               @else
               <td>
                  <span class="status--process">Đã xác nhận</span>
               </td>
               @endif
               <td>{{$item->DIEN_THOAI}}</td>
               <td>
                  <div class="table-data-feature">
                     <a class="item" href="{{route('sosadmin.user.detail',['cmnd'=>$cmnd])}}" data-toggle="tooltip" data-placement="top" title="Xem">
                     <i class="zmdi zmdi-more"></i>
                     </a>
                     <a class="item" href="{{route('sosadmin.user.detail',['cmnd'=>$cmnd])}}" data-toggle="tooltip" data-placement="top" title="Xem">
                     <i class="zmdi zmdi-assignment-o"></i>
                     </a>
                     @if($item->TINH_TRANG==0)
                     <button class="item" data-toggle="tooltip" data-placement="top" title="Xóa">
                     <i class="zmdi zmdi-delete"></i>
                     </button>
                     @else
                     <button class="item" data-toggle="tooltip" data-placement="top" title="khóa">
                     <i class="zmdi zmdi-lock-outline"></i>
                     </button>
                     @endif
                  </div>
               </td>
            </tr>
            @endforeach
         </tbody>
         <tfoot>
            <tr style="background-color: #424949;color:  #f0f3f4 ;">
               <th>Họ và tên</th>
               <th>Email</th>
               <th>Ngày đăng ký</th>
               <th>Ngày kích hoạt</th>
               <th>Tình trạng</th>
               <th>Điện thoại</th>
               <th></th>
            </tr>
         </tfoot>
      </table>
   </div>
</div>
@endsection

