<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests\NguoiDungRequest;
use App\Model\User;
use Mail;
class UserController extends Controller
{
    public function __construct(User $user){
        $this->user = $user;
    }
    public function thongTinChiTiet($id){
    	$info = $this->user->getByID($id);
    	return view('admin.users.detail',compact('info'));
    }
    public function getThemNguoiDung(){
    	return view('admin.account.addNguoidung');
    }
    public function postThemNguoiDung(NguoiDungRequest $request){
        $ten = $request->ten;
        $email=$request->email;
        $cmnd = $request->cmnd;
        $matkhau = $request->matkhau;
        $dienthoai = $request->dienthoai;
        $ngaysinh = $request->ngaysinh;
        $hinhanh = $request->hinhanh;
        $this->user->themUser($ten,$email,$cmnd,md5($matkhau),$dienthoai,$ngaysinh,$hinhanh);
        return redirect()->route('sosadmin.taikhoan.index');
    }
    public function getSuaNguoiDung($id){
        $info = $this->user->getSuaNguoiDung($id);
        return view('admin.account.editNguoiDung',compact('info'));
    }

    public function postSuaNguoiDung(Request $request){
        //thong tin nguoi dung
        $idNguoiDung   = $request->IdNguoiDung;
        $ten           = $request->ten;
        $cmnd          = $request->cmnd;
        $dienthoai     = $request->dienthoai;
        $ngaysinh      = $request->ngaysinh;
        $hinhanh       = "";
        $dataNguoiDung = array('HO_VA_TEN'=>$ten,'SO_CMND'=>$cmnd,'DIEN_THOAI'=>$dienthoai,'NGAY_SINH'=>$ngaysinh,'HINH_ANH'=>$hinhanh);
        //thong tin tai khoan
        $idTaiKhoan    = $request->IdTaiKhoan;
        $matkhau       = $request->matkhau;
        $email         = $request->email;
        $dataTaiKhoan  = array('MAT_KHAU'=>$matkhau,'EMAIL'=>$email);
        $status = $this->user->SuaNguoiDung($dataNguoiDung,$dataTaiKhoan,$idNguoiDung,$idTaiKhoan);
        if($status == true)
            $request->session()->flash('TrangThai','Cập nhật thông tin thành công');
        else
            $request->session()->flash('TrangThai','Cập nhật thông tin thất bại, vui long kiểm tra lại!');
        $to_name = '';
        $to_email = $email;
        $data = array('name'=>$ten, "body" => "Một số thông tin của bạn đã được hệ thống cập nhật, vui lòng kiểm tra lại.");
        Mail::send('admin.mail.edit', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
                ->subject('Cập nhật thông tin');
        $message->from('sosapplication.caps1@gmail.com','Thông tin của bạn đã được thay đổi');
        });
        return redirect()->route('sosadmin.taikhoan.index');
    }
}
