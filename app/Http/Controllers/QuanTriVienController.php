<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuanTriVien;


class QuanTriVienController extends Controller
{
    public function ThemMoi(){
        $QTV=QuanTriVien::all();
        return view('quan_tri_vien.them-moi',compact('QTV'));
    }

    public function xlThemMoi(Request $re){
        $QTV=new QuanTriVien();
        $QTV->ten=$re->ten;
        $QTV->email=$re->email;
        $QTV->gioi_tinh=$re->gioi_tinh;
        $QTV->sdt=$re->sdt;
        $QTV->dia_chi = $re->dia_chi;
        $QTV->save();
        return redirect()->route('quantrivien.danh-sach')->with('thong_bao','Thêm quản trị viên thành công');
    }

    public function DanhSach(){
        $QTV=QuanTriVien::all();
        return view('quan_tri_vien.danh-sach',compact('QTV'));
    }

    public function CapNhat($id){
        $QTV=QuanTriVien::find($id);
        if (empty($QTV)) {
            return "Quản Trị Viên không tồn tại";
        }
        return view('quan_tri_vien.cap-nhat',compact('QTV'));
    }

    public function xlCapNhat(Request $re, $id){
        $QTV = QuanTriVien::find($id);
        if (empty($QTV)) {
            return "Quản Trị Viên không tồn tại";
        }
        $QTV->ten = $re->ten;
        $QTV->email = $re->email;
        $QTV->gioi_tinh = $re->gioi_tinh;
        $QTV->sdt=$re->sdt;
        $QTV->dia_chi = $re->dia_chi;
        $QTV->save();
        return redirect()->route("quantrivien.danh-sach")->with('thong_bao','Cập nhật quản trị viên thành công');
    }

    public function Xoa($id){
        $QTV=QuanTriVien::find($id);
        if(empty($QTV)){
            return "Quản Trị Viên không tồn tại";
        }
        $QTV->delete();
        return redirect()->route("quantrivien.danh-sach")->with('thong_bao','Xóa quản trị viên thành công');
    }

}
