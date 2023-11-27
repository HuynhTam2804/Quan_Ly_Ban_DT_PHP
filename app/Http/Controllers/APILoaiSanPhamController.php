<?php

namespace App\Http\Controllers;

use  App\Models\LoaiSanPham;
use Illuminate\Http\Request;

class APILoaiSanPhamController extends Controller
{
    public function DanhSachAllLSP()
    {
        $dsLSP = LoaiSanPham::all();
        
        return response()->json([
            'success' => true ,
            'data'    => $dsLSP
        ]);
    }

    public function ChiTietLSP($id)
    {
        $dsLSP = LoaiSanPham::find($id);

        if(empty($dsLSP))
        {
            return response()->json([
                'success' => false ,
                'mes'     => "Loại sản phẩm ID {$id} không tồn tại"
            ]);
        }

        return response()->json([
            'success' => true ,
            'data'    => $dsLSP
        ]);
    }

    public function DS_LSP_SP()
    {
        $dsLSP = LoaiSanPham::with('ds_san_pham')->get();

        return response()->json([
            'success' => true ,
            'data'    => $dsLSP
        ]);

    }

    public function CT_DS_LSP_SP($id){
        $lsp = LoaiSanPham::with('ds_san_pham')->find($id);

        if(empty($lsp))
        {
            return response()->json([
                'success' => false ,
                'mes'     => "Loại sản phẩm {$lsp} không tồn tại"
            ]);
        }
        return response()->json([
            'success' => true ,
            'data'     => $lsp
        ]);
    }

    public function ThemMoi(Request $re){
        if(empty($re->ten)){
            return response()->json([
                'success' => false ,
                'mes'     => "Chưa nhập tên loại sản phẩm"
            ]);
        }

        $lsp=LoaiSanPham::where('ten',$re->ten)->first();

        if(!empty($lsp)){
            return response()->json([
                'success' => false ,
                'mes'     => "Loại sản phẩm {$re->ten} đã tồn tại"
            ]);
        }

        $lsp=new LoaiSanPham();
        $lsp->ten=$re->ten;
        $lsp->save();

        return response()->json([
            'success' => true ,
            'mes'     => "Thêm loại sản phẩm thành công"
        ]);
    }

    public function CapNhat(Request $re,$id){
        $lsp=LoaiSanPham::find($id);

        if(empty($lsp))
        {
            return response()->json([
                'success' => false ,
                'mes'     => "Loại sản phẩm ID {$id} không tồn tại"
            ]);
        }

        $count=LoaiSanPham::where('id','<>',$id)->where('ten',$re->ten)->count();

        if($count > 0){
            return response()->json([
                'success' => false ,
                'mes'     => "Loại sản phẩm {$re->ten} đã tồn tại"
            ]);
        }

        $lsp->ten=$re->ten;
        $lsp->save();

        return response()->json([
            'success' => true ,
            'mes'     => "Cập nhật loại sản phẩm thành công"
        ]);
    }
     
    public function Xoa($id){
        $lsp=LoaiSanPham::find($id);

        if(empty($lsp))
        {
            return response()->json([
                'success' => false ,
                'mes'     => "Loại sản phẩm ID {$id} không tồn tại"
            ]);
        }

        $lsp->delete();

        return response()->json([
            'success' => true ,
            'mes'     => "Xóa loại sản phẩm thành công"
        ]);
    }

    public function TimKiem(Request $re){
        $lsp=LoaiSanPham::where('ten',$re->ten)->get();

        if(empty($lsp)){
            return response()->json([
                'success' => false ,
                'mes'     => "Tên loại sản phẩm không tồn tại"
            ]);
        }

        return response()->json([
            'success' => true ,
            'data'     => $lsp
        ]);
    }
}
