<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaCungCap;

class NhaCungCapController extends Controller
{
    public function ThemMoi(){
        $NCC=NhaCungCap::all();
        return view('nha_cung_cap.them-moi',compact('NCC'));
    }

    public function xlThemMoi(Request $re){
        $NCC=new NhaCungCap();
        $NCC->ten=$re->ten;
        $NCC->sdt=$re->sdt;
        $NCC->dia_chi=$re->dia_chi;
        $NCC->mo_ta=$re->mo_ta;
        $NCC->save();
        return redirect()->route('nhacungcap.danh-sach')->with('thong_bao','Thêm nhà cung cấp thành công');
    }

    public function DanhSach(){
        $NCC=NhaCungCap::all();
        return view('nha_cung_cap.danh-sach',compact('NCC'));
    }

    public function CapNhat($id){
        $NCC=NhaCungCap::find($id);
        if(empty($NCC)){
            return "Nhà cung cấp không tồn tại";
        }
        return view('nha_cung_cap.cap-nhat',compact('NCC'));
    }

    public function xlCapNhat(Request $re,$id){
        $NCC=NhaCungCap::find($id);
        if(empty($NCC)){
            return "Nhà cung cấp không tồn tại";
        }
        $NCC->ten=$re->ten;
        $NCC->sdt=$re->sdt;
        $NCC->dia_chi=$re->dia_chi;
        $NCC->mo_ta=$re->mo_ta;
        $NCC->save();
        return redirect()->route('nhacungcap.danh-sach')->with('thong_bao','Cập nhật nhà cung cấp thành công');
    }

    public function Xoa($id)
    {
        $NCC=NhaCungCap::find($id);
        if(empty($NCC))
        {
            return "Nhà cung cấp không tồn tại";
        }
        $NCC->delete();
        return redirect()->route('nhacungcap.danh-sach')->with('thong_bao','Xóa nhà cung cấp thành công');
    }
}
