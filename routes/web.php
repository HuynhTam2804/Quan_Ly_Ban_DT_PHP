<?php
use App\Http\Controllers\AdminController;

use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\LoaiSanPhamController;

use App\Http\Controllers\NhaCungCapController;

use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\QuanTriVienController;

use App\Http\Controllers\HoaDonNhapController;
use App\Http\Controllers\HoaDonXuatController;

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//View
Route::get('/', function () {
    return view('login');
});

//Login
Route::get('/login',[AdminController::class,'Login'])->name('login')->middleware('guest');
Route::post('/login',[AdminController::class,'xlLogin'])->name('xl-login')->middleware('guest');

//Logout
Route::get('/logout',[AdminController::class,'Logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function(){
 
    //SanPham
    Route::prefix('/SanPham')->group(function(){
        Route::name('sanpham.')->group(function(){

            Route::get('danh-sach',[SanPhamController::class,'DanhSach'])->name('danh-sach');
            
            Route::get('them-moi',[SanPhamController::class,'ThemMoi'])->name('them-moi');
            Route::post('them-moi',[SanPhamController::class,'xlThemMoi'])->name('xl-themmoi');
            
            Route::get('cap-nhat/{id}',[SanPhamController::class,'CapNhat'])->name('cap-nhat');
            Route::post('cap-nhat/{id}',[SanPhamController::class,'xlCapNhat'])->name('xl-capnhat');
            
            Route::get('xoa/{id}',[SanPhamController::class,'Xoa'])->name('xoa');

        });
    });

    //LoaiSanPham
    Route::prefix('/LoaiSanPham')->group(function(){
        Route::name('loaisanpham.')->group(function(){

            Route::get('danh-sach',[LoaiSanPhamController::class,'DanhSach'])->name('danh-sach');
            
            Route::get('them-moi',[LoaiSanPhamController::class,'ThemMoi'])->name('them-moi');
            Route::post('them-moi',[LoaiSanPhamController::class,'xlThemMoi'])->name('xl-themmoi');
            
            Route::get('cap-nhat/{id}',[LoaiSanPhamController::class,'CapNhat'])->name('cap-nhat');
            Route::post('cap-nhat/{id}',[LoaiSanPhamController::class,'xlCapNhat'])->name('xl-capnhat');
            
            Route::get('xoa/{id}',[LoaiSanPhamController::class,'Xoa'])->name('xoa');

        });
    });

    //NhaCungCap
    Route::prefix('/NhaCungCap')->group(function(){
        Route::name('nhacungcap.')->group(function(){

            Route::get('danh-sach',[NhaCungCapController::class,'DanhSach'])->name('danh-sach');
            
            Route::get('them-moi',[NhaCungCapController::class,'ThemMoi'])->name('them-moi');
            Route::post('them-moi',[NhaCungCapController::class,'xlThemMoi'])->name('xl-themmoi');
            
            Route::get('cap-nhat/{id}',[NhaCungCapController::class,'CapNhat'])->name('cap-nhat');
            Route::post('cap-nhat/{id}',[NhaCungCapController::class,'xlCapNhat'])->name('xl-capnhat');
            
            Route::get('xoa/{id}',[NhaCungCapController::class,'Xoa'])->name('xoa');

        });
    });

    //KhachHang
    Route::prefix('/KhachHang')->group(function(){
        Route::name('khachhang.')->group(function(){

            Route::get('danh-sach',[KhachHangController::class,'DanhSach'])->name('danh-sach');
            
            Route::get('them-moi',[KhachHangController::class,'ThemMoi'])->name('them-moi');
            Route::post('them-moi',[KhachHangController::class,'xlThemMoi'])->name('xl-themmoi');
            
            Route::get('cap-nhat/{id}',[KhachHangController::class,'CapNhat'])->name('cap-nhat');
            Route::post('cap-nhat/{id}',[KhachHangController::class,'xlCapNhat'])->name('xl-capnhat');
            
            Route::get('xoa/{id}',[KhachHangController::class,'Xoa'])->name('xoa');

        });
    });

    //QuanTriVien
    Route::prefix('/QuanTriVien')->group(function(){
        Route::name('quantrivien.')->group(function(){

            Route::get('danh-sach',[QuanTriVienController::class,'DanhSach'])->name('danh-sach');
            
            Route::get('them-moi',[QuanTriVienController::class,'ThemMoi'])->name('them-moi');
            Route::post('them-moi',[QuanTriVienController::class,'xlThemMoi'])->name('xl-themmoi');
            
            Route::get('cap-nhat/{id}',[QuanTriVienController::class,'CapNhat'])->name('cap-nhat');
            Route::post('cap-nhat/{id}',[QuanTriVienController::class,'xlCapNhat'])->name('xl-capnhat');
            
            Route::get('xoa/{id}',[QuanTriVienController::class,'Xoa'])->name('xoa');

        });
    });
    
    //HoaDonNhap
    Route::prefix('/HoaDonNhap')->group(function(){
        Route::name('hoadonnhap.')->group(function(){

            Route::get('danh-sach',[HoaDonNhapController::class,'DanhSach'])->name('danh-sach');
            
            Route::get('them-moi',[HoaDonNhapController::class,'ThemMoi'])->name('them-moi');
            Route::post('them-moi',[HoaDonNhapController::class,'xlThemMoi'])->name('xl-themmoi');
            
            Route::get('xoa/{id}',[HoaDonNhapController::class,'Xoa'])->name('xoa');
    
            //HoaDonNhapPDF
            Route::get('View-PDF',[HoaDonNhapController::class,'ViewPDF'])->name('view-pdf');
            Route::get('ViewDetail-PDF/{id}',[HoaDonNhapController::class,'ViewPDFDetail'])->name('viewdetail-pdf');
            Route::get('Download-PDF',[HoaDonNhapController::class,'DownloadPDF'])->name('download-pdf');

        });
    });

    //ChiTietHoaDonNhap
    Route::get('/ChiTietHoaDonNhap/{hd_nhap_id}',[HoaDonNhapController::class,'XemCTHD'])->name('cthoadonnhap.chi-tiet');
    
    //HoaDonXuat
    Route::prefix('/HoaDonXuat')->group(function(){
        Route::name('hoadonxuat.')->group(function(){

            Route::get('danh-sach',[HoaDonXuatController::class,'DanhSach'])->name('danh-sach');
            
            Route::get('them-moi',[HoaDonXuatController::class,'ThemMoi'])->name('them-moi');
            Route::post('them-moi',[HoaDonXuatController::class,'xlThemMoi'])->name('xl-themmoi');
            
            Route::get('xoa/{id}',[HoaDonXuatController::class,'Xoa'])->name('xoa');
            
            //HoaDonXuatPDF
            Route::get('View-PDF',[HoaDonXuatController::class,'ViewPDF'])->name('view-pdf');
            Route::get('ViewDetail-PDF/{id}',[HoaDonXuatController::class,'ViewPDFDetail'])->name('viewdetail-pdf');
            
            Route::get('Download-PDF',[HoaDonXuatController::class,'DownloadPDF'])->name('download-pdf');
            
        });
    });

    //ChiTietHoaDonXuat
    Route::get('/ChiTietHoaDonXuat/{hd_xuat_id}',[HoaDonXuatController::class,'XemCTHD'])->name('cthoadonxuat.chi-tiet');
});


