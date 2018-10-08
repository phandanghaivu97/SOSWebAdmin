@extends('template.admin.master') {{-- kế thừa từ master.blade.php --}} @section('content') {{-- gọi lại tên trong yield --}}
<script type="text/javascript">
    //-----------------------------------JS---------------------------------------
    $(document).ready(function() {
        //check /uncheck tất cả bản ghi
        $(document).on('change', '#checkall', function() {
            $('.checkitem').prop('checked', this.checked).trigger('change');
        });
        //check/uncheck từng bản ghi
        $(document).on('change', '.checkitem', function() {
            var dem_r = 0;
            var checked_r = 1;
            //duyệt tất cả các check item
            $('.checkitem').each(function() {
                if ($(this).is(':checked')) {
                    dem_r++;
                } else {
                    checked_r = 0;
                }
            });
            $('#checkall').prop('checked', checked_r);
            if (dem_r > 0) {
                $('#deleteall').show(0.5);
            } else {
                $('#deleteall').hide(0.5);
            }
        });
    });

    function checkDelete(id) {
        if (confirm('Bạn có thực sự muốn xóa ID ' + id + ' không!')) {
            location.href = 'delete.php?id=' + id, true;
        }
        return false;
    }
    //----------------------------------------END----------------------------------------
</script>
<script type="text/javascript">
    function abc(status, cl) {
        $.ajax({
            url: '/template/admin/assets/ajax/status_user.php',
            type: 'POST',
            cache: false,
            data: {
                astatus: status,
                acls: cl
            },
            success: function(data) {
                $('#' + cl).html(data);
            },
            error: function() {
                alert('Có lỗi xảy ra');
            }
        });
        return false;
    }
</script>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="header">
                        <h4 class="title">Danh sách người dùng </h4>

                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <input type="text" name="idusers" class="form-control border-input" value="" placeholder="ID">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="fullnameusers" class="form-control border-input" value="" placeholder="Họ tên" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="submit" name="search" value="Tìm kiếm" class="is" />
                                        <input type="submit" name="reset" value="Hủy tìm kiếm" class="is" />
                                    </div>
                                </div>
                            </div>

                        </form>

                        <a href="add.php" class="addtop"><img src="/template/admin/assets/img/add.jpg" style="width: 30px;heigth:40px;border-radius: 8px; " alt="" /> Thêm</a>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive ">
                            <form action="" method="post" id="frm">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>

                                        <th>ID </th>
                                        <th>Tên đăng nhập</th>
                                        <th>Tên Người Dùng</th>
                                        <th>Chức vụ</th>
                                        <th>Trạng Thái</th>
                                        <th>Chức năng</th>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>                                            
                                            <td>

                                                <a href="" class="btn btn-primary">Sửa</a>

                                                <a href="" onclick="return confirm('Bạn có chắc chắn muốn xóa')" class="btn btn-danger">Xóa</a>

                                            </td>
                                        </tr>

                                    </tbody>

                                </table>
                                <tfoot>
                                    <td colspan="4">
                                        <input style="display:none;" type="submit" name="delete" class="btn" id="deleteall" value="Xóa Chọn">
                                    </td>
                                </tfoot>
                            </form>

                            <div class="text-center">
                                <ul class="pagination">

                                    <li class="paginate_button ">
                                        <a href="index.php?page="></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    $("#checkAl").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
@endsection