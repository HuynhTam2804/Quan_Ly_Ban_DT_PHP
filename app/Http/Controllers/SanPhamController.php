<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\HinhAnh;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function ThemMoi(){
        $SP=SanPham::all();
        $LSP=LoaiSanPham::all();
        return view('san_pham.them-moi',compact('SP','LSP'));
    }

    public function xlThemMoi(Request $re){
        $SP= new SanPham();
        $SP->ten=$re->ten;
        $SP->gia_nhap=$re->gia_nhap;
        $SP->gia_ban=$re->gia_ban;
        $SP->so_luong = $re->so_luong;
        $SP->mo_ta = $re->mo_ta;
        $SP->loai_san_pham_id = $re->loai_san_pham_id;
        $SP->save();

        $files=$re->hinh_anh;
        foreach($files as $file){
            $hinh=new HinhAnh();
            $hinh->san_pham_id=$SP->id;
            $path=$file->store('hinhanh');
            $hinh->url=$path;
            $hinh->save();
        }
        return redirect()->route("sanpham.danh-sach")->with('thong_bao','Thêm sản phẩm thành công');
    }

    public function DanhSach(){
        $SP=SanPham::all();
        $hinh=HinhAnh::all();
        return view('san_pham.danh-sach',compact('SP','hinh'));
    }

    public function CapNhat($id){
        $SP=SanPham::find($id);
        $LSP=LoaiSanPham::all();
        if (empty($SP)) {
            return "Sản phẩm không tồn tại";
        }
        return view('san_pham.cap-nhat',compact('SP','LSP'));
    }

    public function xlCapNhat(Request $re, $id){
        $SP = SanPham::find($id);
        if (empty($SP)) {
            return "Sản phẩm không tồn tại";
        }
        $SP->ten = $re->ten;
        $SP->gia_nhap=$re->gia_nhap;
        $SP->gia_ban = $re->gia_ban;
        $SP->so_luong = $re->so_luong;
        $SP->mo_ta = $re->mo_ta;
        $SP->loai_san_pham_id = $re->loai_san_pham_id;
        $SP->save();

        $Ha=$re->hinh_anh;

        $h_anh=HinhAnh::where('san_pham_id',$id)->delete();

        foreach($Ha as $data){
            $anh=new HinhAnh();
            $anh->san_pham_id=$id;
            $img=$data->store('hinhanh');
            $anh->url=$img;
            $anh->save();
        }
        return redirect()->route("sanpham.danh-sach")->with('thong_bao','Cập nhật sản phẩm thành công');
    }

    public function Xoa($id){
        $SP=SanPham::find($id);
        if(empty($SP)){
            return "Sản phẩm không tồn tại";
        }
        $SP->delete();
        return redirect()->route("sanpham.danh-sach")->with('thong_bao','Xóa sản phẩm thành công');
    }
}
