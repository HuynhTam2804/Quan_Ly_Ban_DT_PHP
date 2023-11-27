<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDonXuat;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\ChiTietHoaDonXuat;
use App\Models\KhachHang;
use PDF;

class HoaDonXuatController extends Controller
{
    public function ThemMoi(){
        $KH=KhachHang::all();
        $SP=SanPham::all();
        return view('hoa_don_xuat.them-moi',compact('KH','SP'));
    }
    
    public function xlThemMoi(Request $re){
        $HDX=new HoaDonXuat();
        
        $HDX->khach_hang_id=$re->khach_hang_id;

        $HDX->ngay_xuat=$re->ngay_xuat;
        $HDX->tong_tien=0;
        $HDX->trang_thai=1;

        $HDX->save();
        $tong_tien=0;

        for($i = 0;$i<count($re->so_luong);$i++){
            $CTHDX = new ChiTietHoaDonXuat();
            $CTHDX->hd_xuat_id=$HDX->id;
            $CTHDX->san_pham_id=$re->san_pham_id[$i];
            $CTHDX->so_luong=$re->so_luong[$i];
            $CTHDX->gia_ban=$re->gia_ban[$i];
            $CTHDX->thanh_tien=$re->thanh_tien[$i];
            $CTHDX->save();

            $tong_tien+=$CTHDX->thanh_tien;
        }
        $HDX->tong_tien=$tong_tien;
        $HDX->save();

        return redirect()->route('hoadonxuat.danh-sach')->with('thong_bao','Thêm hóa đơn xuất thành công');
    }  

    public function DanhSach(){
        $HDX=HoaDonXuat::all();
        $CTHDX=ChiTietHoaDonXuat::all();
        return view('hoa_don_xuat.danh-sach',compact('HDX','CTHDX'));
    }
    
    public function XemCTHD($hd_xuat_id){
        $CTHDX = ChiTietHoaDonXuat::where('hd_xuat_id', $hd_xuat_id)->get();
        return view('hoa_don_xuat.cthd_xuat',compact('CTHDX'));
    }

    public function Xoa($id){
        $HDX =  HoaDonNhap::find($id);
        if(empty($HDX)){
            return "Hóa đơn xuất không tồn tại";
        }
        $HDX->delete();
        
        return redirect()->route('hoadonxuat.danh-sach');
    }

    public function ViewPDF(){
        $data = HoaDonXuat::all();
        $pdf = PDF::loadView('hoa_don_xuat.hd_xuat_pdf',  compact('data'));
    	return $pdf->stream('HoaDonXuat.pdf');
    }

    public function ViewPDFDetail($id){

        $data = ChiTietHoaDonXuat::where('hd_xuat_id',$id)->get();
        $pdf = PDF::loadView('hoa_don_xuat.cthd_xuat_pdf',compact('data'));
    	return $pdf->stream('HoaDonXuat.pdf');
    }

    public function DownloadPDF(){
        $data = HoaDonXuat::all();
        $pdf = PDF::loadView('hoa_don_xuat.hd_xuat_pdf',compact('data'));
    	return $pdf->download('HoaDonXuat.pdf');
    }
}
