@extends('template.admin.master') {{-- kế thừa từ master.blade.php --}}
@section('content') {{-- gọi lại tên trong yield --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Trang Chủ</h2>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div><br>
                                            <div class="text">
                                                <h2>103</h2>
                                                <span>Người đăng ký trong tháng này</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h2>388</h2>
                                                <span>Người cầu cứu tuần vừa rồi</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <h2>1,060,000đ</h2>
                                                <span>Donation</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <h2 class="title-1">Người dùng đang chờ xác nhận.</h2>
                            <hr>
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
         <thead>
            <tr style="background-color: #424949;color:  #f0f3f4 ;">
               <th>Họ và tên</th>
               <th>Email</th>
               <th>Ngày đăng ký</th>
               <th>Tình trạng</th>
               <th>Điện thoại</th>
               <th>Thao tác</th>
            </tr>
         </thead>
         <tbody>
            @if(count($data) > 0)
            @foreach($data as $nguoiDung)
            @php
                $id         = $nguoiDung->ID;
                $hoTen      = $nguoiDung->HO_VA_TEN;
                $email      = $nguoiDung->EMAIL;
                $ngayDangKy = $nguoiDung->NGAY_DANG_KY;
                $tinhTrang  = $nguoiDung->TINH_TRANG;
                $dienThoai  = $nguoiDung->DIEN_THOAI;
            @endphp
            <tr>
               <td>{{$hoTen}}</td>
               <td>
                  <span class="block-email">{{$email}}</span>
               </td>
               <td>{{$ngayDangKy}}</td>
               <td>Chưa kích hoạt</td>
               <td>
                  {{$dienThoai}}
               </td>
               <td>
                  <a href="{{route('sosadmin.user.detail',['id'=>$id])}}"><span class="status--process">Nhấn để kích hoạt</span></a>
               </td>
            </tr>
            @endforeach
            @endif
         </tbody>
         <tfoot>
            <tr style="background-color: #424949;color:  #f0f3f4 ;">
               <th>Họ và tên</th>
               <th>Email</th>
               <th>Ngày đăng ký</th>
               <th>Tình trạng</th>
               <th>Điện thoại</th>
               <th>Thao tác</th>
            </tr>
         </tfoot>
      </table>
                        </div>
@endsection