<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function ThemMoi(){
        $KH=KhachHang::all();
        return view('khach_hang.them-moi',compact('KH'));
    }

    public function xlThemMoi(Request $re){
        $KH=new KhachHang();
        $KH->ten=$re->ten;
        $KH->email=$re->email;
        $KH->gioi_tinh=$re->gioi_tinh;
        $KH->sdt=$re->sdt;
        $KH->dia_chi = $re->dia_chi;
        $KH->save();
        return redirect()->route('khachhang.danh-sach')->with('thong_bao','Thêm khách hàng thành công');
    }

    public function DanhSach(){
        $KH=KhachHang::all();
        return view('khach_hang.danh-sach',compact('KH'));
    }

    public function CapNhat($id){
        $KH=KhachHang::find($id);
        if (empty($KH)) {
            return "Khách hàng không tồn tại";
        }
        return view('khach_hang.cap-nhat',compact('KH'));
    }

    public function xlCapNhat(Request $re, $id){
        $KH = KhachHang::find($id);
        if (empty($KH)) {
            return "Khách hàng không tồn tại";
        }
        $KH->ten = $re->ten;
        $KH->email = $re->email;
        $KH->gioi_tinh = $re->gioi_tinh;
        $KH->sdt=$re->sdt;
        $KH->dia_chi = $re->dia_chi;
        $KH->save();
        return redirect()->route("khachhang.danh-sach")->with('thong_bao','Cập nhật khách hàng thành công');
    }

    public function Xoa($id){
        $KH=KhachHang::find($id);
        if(empty($KH)){
            return "Khách hàng không tồn tại";
        }
        $KH->delete();
        return redirect()->route("khachhang.danh-sach")->with('thong_bao','Xóa khách hàng thành công');
    }
}
