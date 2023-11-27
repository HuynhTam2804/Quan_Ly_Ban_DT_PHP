<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\SanPham;


class APISanPhamController extends Controller
{
    //
    public function DanhSachAllSP()
    {
        $dsSP = SanPham::all();
        
        return response()->json([
            "status" => false,
            "data"   => $dsSP
        ]);
    }

    public function ChiTietSP($id)
    {
        $dsSP = SanPham::find($id);

        if(empty($dsSP))
        {
            return response()->json([
                'success' => false ,
                'mes'     => "Sản Phẩm ID {$id} không tồn tại"
            ]);
        }

        return response()->json([
            'success' => true ,
            'data'    => $dsSP
        ]);
    }

    public function DanhSachSP()
    {
        $dsSP = SanPham::with('loai_san_pham')->get();

        return response()->json([
            'success' => true ,
            'data'    => $dsSP
        ]);
        
    }

    public function ThemMoi(Request $re){
        if(empty($re->ten)){
            return response()->json([
                'success' => false ,
                'mes'     => "Chưa nhập tên sản phẩm"
            ]);
        }

        $sp=SanPham::where('ten',$re->ten)->first();

        if(!empty($sp)){
            return response()->json([
                'success' => false ,
                'mes'     => "Sản phẩm {$re->ten} đã tồn tại"
            ]);
        }

        $sp=new SanPham();
        $sp->ten=$re->ten;
        $sp->gia_ban=$re->gia_ban;
        $sp->gia_nhap = $re->gia_nhap;
        $sp->so_luong = $re->so_luong;
        $sp->loai_san_pham_id = $re->loai_san_pham_id;
        $sp->mo_ta = $re->mo_ta;
        $sp->save();

        return response()->json([
            'success' => true ,
            'mes'     => "Thêm sản phẩm thành công"
        ]);
    }

    public function CapNhat(Request $re,$id){
        $sp=SanPham::find($id);

        if(empty($sp))
        {
            return response()->json([
                'success' => false ,
                'mes'     => "Sản phẩm ID {$id} không tồn tại"
            ]);
        }

        $count=SanPham::where('id','<>',$id)->where('ten',$re->ten)->count();

        if($count > 0){
            return response()->json([
                'success' => false ,
                'mes'     => "Sản phẩm {$re->ten} đã tồn tại"
            ]);
        }
        
        $lsp->ten=$re->ten;
        $sp->gia_ban=$re->gia_ban;
        $sp->gia_nhap = $re->gia_nhap;
        $sp->so_luong = $re->so_luong;
        $sp->loai_san_pham_id = $re->loai_san_pham_id;
        $sp->mo_ta = $re->mo_ta;
        $lsp->save();

        return response()->json([
            'success' => true ,
            'mes'     => "Cập nhật sản phẩm thành công"
        ]);
    }

    public function Xoa($id){
        $sp = SanPham::find($id);

        if(empty($sp))
        {
            return response()->json([
                'success' => false ,
                'mes'     => "Sản phẩm {$id} không tồn tại"
            ]);
        }

        $sp->delete();
        return response()->json([
            'success' => true ,
            'mes'     => "Xóa sản phẩm thành công"
        ]);
    }

    public function TimKiem(Request $re){
        $sp = SanPham::where('ten',$request->ten)->get();

        if(empty($sp)){
            return response()->json([
                'success' => false ,
                'mes'     => "Tên sản phẩm không tồn tại"
            ]);
        }

        return response()->json([
            'success' => true ,
            'data'     => $sp
        ]);
    }
}
