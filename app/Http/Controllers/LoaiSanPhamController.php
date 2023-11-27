<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;

class LoaiSanPhamController extends Controller
{
    public function ThemMoi(){
        $LSP=LoaiSanPham::all();
        return view('loai_san_pham.them-moi',compact('LSP'));
    }

    public function xlThemMoi(Request $re){
        $LSP=new LoaiSanPham();
        $LSP->ten=$re->ten;
        $LSP->save();
        return redirect()->route('loaisanpham.danh-sach')->with('thong_bao','Thêm loại sản phẩm thành công');
    }

    public function DanhSach(){
        $LSP=LoaiSanPham::all();
        return view('loai_san_pham.danh-sach',compact('LSP'));
    }

    public function CapNhat($id){
        $LSP=LoaiSanPham::find($id);
        if(empty($LSP)){
            return "Loại điện thoại không tồn tại";
        }
        return view('loai_san_pham.cap-nhat',compact('LSP'));
    }

    public function xlCapNhat(Request $re,$id){
        $LSP=LoaiSanPham::find($id);
        if(empty($LSP)){
            return "Loại điện thoại không tồn tại";
        }
        $LSP->ten = $re->ten;
        $LSP->save();
        return redirect()->route('loaisanpham.danh-sach')->with('thong_bao','Cập nhật loại sản phẩm thành công');
    }

    public function Xoa($id)
    {
        $LSP=LoaiSanPham::find($id);
        if(empty($LSP))
        {
            return "Loại sản phẩm không tồn tại";
        }
        $LSP->delete();
        return redirect()->route('loaisanpham.danh-sach')->with('thong_bao','Xóa loại sản phẩm thành công');
    }
}