<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests\TaiKhoanRequest;
use App\Model\TaiKhoan;
class TaiKhoanController extends Controller
{
    public function __construct(TaiKhoan $taiKhoan){
        $this->taiKhoan = $taiKhoan;
    }

    public function index(){
        $danhSachTaiKhoan = $this->taiKhoan->getAll();
        return view('admin.account.index',compact('danhSachTaiKhoan'));
    }

    public function formdangNhap(){
        return view('admin.login');
    }
    public function getKhoa($id){
        $thongTinTaiKhoan = $this->taiKhoan->getById($id);
        return view('admin.account.Lock',compact('thongTinTaiKhoan'));
    }
    public function postKhoa(Request $request){
        $id = $request->Id;
        $tuNgay = $request->TuNgay;
        $denNgay = $request->DenNgay;
        $lyDo = $request->LyDo;
        $data = Array('ID'=>$id,'TU_NGAY'=>$tuNgay,'DEN_NGAY'=>$denNgay,'LY_DO'=>$lyDo);
        $this->taiKhoan->khoaTaiKhoan($data);
        return redirect()->route('sosadmin.taikhoan.index');
    }
    public function kiemTraDangNhap(TaiKhoanRequest $request){
        $tenDangNhap = $request->tendangnhap;
        $matKhau = $request->password;
        $matkhauEncode = md5($matKhau);
        $infoTaiKhoan = $this->taiKhoan->thongTinTaiKhoan($tenDangNhap,$matkhauEncode);
        if($infoTaiKhoan==null){
            session()->flash('msg','Đăng nhập thất bại!');
            return view('admin.login');
        }
        else {
            Session::put(['tenDangNhap'=>$infoTaiKhoan->TEN_DANG_NHAP,'quyen'=>$infoTaiKhoan->QUYEN,'hinhAnh'=>$infoTaiKhoan->HINH_ANH]);
            return redirect()->route('sosadmin.trangchu');
        }
    }
    public function xacNhanTaiKhoan($id){
        $status = $this->taiKhoan->xacNhanTaiKhoan($id);
        // if($status){
        //     $to_name = '';
        // $to_email = $email;
        // $data = array('name'=>$ten, "body" => "Một số thông tin của bạn đã được hệ thống cập nhật, vui lòng kiểm tra lại.");
        // Mail::send('admin.mail.edit', $data, function($message) use ($to_name, $to_email) {
        // $message->to($to_email, $to_name)
        //         ->subject('Cập nhật thông tin');
        // $message->from('sosapplication.caps1@gmail.com','Thông tin của bạn đã được thay đổi');
        // });
        // }
        return 'succcess';
    }
    public function huyXacNhanTaiKhoan($id){
        $status = $this->taiKhoan->xacNhanTaiKhoan($id);
        
    }
    public function KiemtraDangNhapUser($email,$matKhau){
        $response = array();
        $infoTaiKhoan = $this->taiKhoan->thongTinTaiKhoanUser($email,$matKhau);
        if($infoTaiKhoan==null){
            $response['status'] = 0;
            $response['msg'] = 'Fail!';
            echo json_encode($response);
        }
        else {
            $response['status'] = 1;
            $response['msg'] = 'success!';
            echo json_encode($response);
        }
    }
}
