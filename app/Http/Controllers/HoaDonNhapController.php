<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDonNhap;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\ChiTietHoaDonNhap;
use App\Models\NhaCungCap;
use PDF;

class HoaDonNhapController extends Controller
{
    public function ThemMoi(){
        $NCC=NhaCungCap::all();
        $SP=SanPham::all();
        return view('hoa_don_nhap.them-moi',compact('NCC','SP'));
    }
    
    public function xlThemMoi(Request $re){
        $HDN=new HoaDonNhap();

        $HDN->nha_cung_cap_id=$re->nha_cung_cap_id;
        
        // Lấy JSON từ session
        $adminDataJson = session()->get('admin_login');
        // Chuyển JSON thành một mảng PHP
        $adminData = json_decode($adminDataJson, true);
        
        $HDN->admin_id = $adminData['id'];

        $HDN->ngay_nhap=$re->ngay_nhap;
        $HDN->tong_tien=0;
        $HDN->trang_thai=1;

        $HDN->save();
        $tong_tien=0;

        for($i=0;$i<count($re->so_luong);$i++){
            $CTHDN=new ChiTietHoaDonNhap();
            $CTHDN->hd_nhap_id=$HDN->id;
            $CTHDN->san_pham_id=$re->san_pham_id[$i];
            $CTHDN->so_luong=$re->so_luong[$i];
            $CTHDN->gia_nhap=$re->gia_nhap[$i];
            $CTHDN->gia_ban=$re->gia_ban[$i];
            $CTHDN->thanh_tien=$re->thanh_tien[$i];
            $CTHDN->save();
            
            $tong_tien+=$CTHDN->thanh_tien;
        }
        $HDN->tong_tien=$tong_tien;
        $HDN->save();
        
        return redirect()->route('hoadonnhap.danh-sach')->with('thong_bao','Thêm hóa đơn nhập thành công');
    }

    public function DanhSach(){
        $HDN=HoaDonNhap::all();
        $CTHDN=ChiTietHoaDonNhap::all();
        return view('hoa_don_nhap.danh-sach',compact('HDN','CTHDN'));
    }
    
    public function XemCTHD($hd_nhap_id){
        $CTHDN = ChiTietHoaDonNhap::where('hd_nhap_id', $hd_nhap_id)->get();
        return view('hoa_don_nhap.cthd_nhap',compact('CTHDN'));
    }

    public function Xoa($id){
        $HDN =  HoaDonNhap::find($id);
        if(empty($HDN)){
            return "Hóa đơn nhập không tồn tại";
        }
        $HDN->delete();
        
        return redirect()->route('hoadonnhap.danh-sach');
    }

    public function ViewPDF(){
        $data = HoaDonNhap::all();
        $pdf = PDF::loadView('hoa_don_nhap.hd_nhap_pdf',  compact('data'));
    	return $pdf->stream('HoaDonNhap.pdf');
    }

    public function ViewPDFDetail($id){
        $data = ChiTietHoaDonNhap::where('hd_nhap_id',$id)->get();
        $pdf = PDF::loadView('hoa_don_nhap.cthd_nhap_pdf',compact('data'));
    	return $pdf->stream('HoaDonNhap.pdf');
    }

    public function DownloadPDF(){
        $data = HoaDonNhap::all();
        $pdf = PDF::loadView('hoa_don_nhap.hd_nhap_pdf',compact('data'));
    	return $pdf->download('HoaDonNhap.pdf');
    }
}
