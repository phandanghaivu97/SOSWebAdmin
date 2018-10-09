@extends('template.admin.master') {{-- kế thừa từ master.blade.php --}}
@section('content') {{-- gọi lại tên trong yield --}}
<div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Tài Khoản Người Dùng</h2>
                                </div>
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Danh sách</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>Lọc</button>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
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
                                           <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
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
                                                    @if($item->TINH_TRANG==0)
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Xóa">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    @else
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="chặn">
                                                            <i class="zmdi zmdi-block-alt"></i>
                                                        </button>
                                                    @endif
                                                    </div>
                                                </td>
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                    <div style="float: left;">
                                    {{$danhSachTaiKhoan->links()}}
                                    </div>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
@endsection