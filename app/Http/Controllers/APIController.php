<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\APIModel;

class APIController extends Controller
{
    public function __construct(APIModel $APIModel){
        $this->APIModel = $APIModel;
    }

    public function dangNhap(Request $request){
        $request->session()->token();
        $email = $request->email;
        $password = $request->password;
        $ketQua = Array();
        $data = $this->APIModel->kiemTraDangNhap($email,$password);

        if($email == null || $password == null){
            $ketQua['id'] = "null";
            $ketQua['status'] = "0";
            $ketQua['msg'] = "Please enter email and password!";
            return json_encode($ketQua);
        }
        if($data == null){
            $ketQua['id'] = "null";
            $ketQua['status'] = "0";
            $ketQua['msg'] = "Login unsuccessfully!";
            return json_encode($ketQua);
        }
        $check = $this->APIModel->kiemTraTaiKhoanBiKhoa($email);
        if($check != null ){
            $ketQua['id'] = "null";
            $ketQua['status'] = "0";
            $ketQua['msg'] = "Your account are being locked until ".$check->DEN_NGAY." by reason ".$check->LY_DO." !";
            return json_encode($ketQua);
        }
        else{
            $ketQua['id'] = $data->NGUOI_DUNG;
            $ketQua['status'] = "1";
            $ketQua['msg'] = "Login successfully!";
            $ketQua['name'] = "";
            return json_encode($ketQua);
        }
    }

    public function dangKy(Request $request){
        $ngaydangky = date('Y-m-d');
        $cmnd       = $request->cmnd;
        $hovaten    = $request->hovaten;
        $dienthoai  = $request->dienthoai;
        $ngaysinh   = $request->ngaysinh;
        $hinhanh    = $request->hinhanh;
        $email      = $request->email;
        $matkhau    = $request->matkhau;

        //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
        if ($cmnd == null || $hovaten == null || $email == null || $dienthoai == null || $ngaysinh == null || $hinhanh == null ||$matkhau == null)
        {
            $valid = array();
            $valid['status'] = '0';
            $valid['msg'] = 'Please enter all information.';
            return json_encode($valid);
        }

        //kiem tra cmnd
        if (!preg_match("/^[0-9]|9$/", $dienthoai))
        {
            $valid = array();
            $valid['status'] = '0';
            $valid['msg'] = 'Invalid phone number.';
            return json_encode($valid);
        }

        //Kiểm tra email có đúng định dạng hay không
        if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email))
        {
            $valid = array();
            $valid['status'] = '0';
            $valid['msg'] = 'Invalid Email.';
            return json_encode($valid);
        }

        //Kiểm tra email đã có người dùng chưa
        if ($this->APIModel->kiemTraEmailTonTai($email) != null)
        {
            $valid = array();
            $valid['status'] = '0';
            $valid['msg'] = 'Email has already in use.';
            return json_encode($valid);
        }

        //Kiểm tra dạng nhập vào của ngày sinh
        if (!preg_match("/^\d{4}(\-)(((0)[0-9])|((1)[0-2]))(\-)([0-2][0-9]|(3)[0-1])$/", $ngaysinh))
        {
            $valid = array();
            $valid['status'] = '0';
            $valid['msg'] = 'Invalid date of birth, correct format is yyyy-mm-dd';
            return json_encode($valid);
        }

        //kiem tra dien thoai
        if (!preg_match("/^[0-9]|10$/", $dienthoai))
        {
            $valid = array();
            $valid['status'] = '0';
            $valid['msg'] = 'Invalid phone number.';
            return json_encode($valid);
        }

        else{
            $matkhau = md5($matkhau);
            $dataUser = Array('SO_CMND'=>$cmnd, 'NGAY_DANG_KY'=>$ngaydangky, 'HO_VA_TEN'=>$hovaten, 'DIEN_THOAI'=>$dienthoai, 'NGAY_SINH'=>$ngaysinh, 'HINH_ANH'=>"");
            $dataAccount = Array('EMAIL'=>$email, 'MAT_KHAU'=>$matkhau, 'TINH_TRANG'=>'0');
            $this->APIModel->luuNguoiDung($dataUser,$dataAccount);
            $valid = array();
            $valid['status'] = '1';
            $valid['msg'] = 'Register successfully.';
            return json_encode($valid);
        }
    }

    public function luuHoatDong(Request $request){
        $nguoiDung = $request->NguoiDung;
        $thoiGian = $request->ThoiGian;
        $kinhDo = $request->KinhDo;
        $viDo = $request->ViDo;
        $noiDung = $request->NoiDung;
        $data = Array('NGUOI_DUNG'=>$nguoiDung,'THOI_GIAN'=>$thoiGian,'KINH_DO'=>$kinhDo,'VI_DO'=>$viDo,'NOI_DUNG'=>$noiDung);
        $this->APIModel->luuHoatDong($data);
    }
}
