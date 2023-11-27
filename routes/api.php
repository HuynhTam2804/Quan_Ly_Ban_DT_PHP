<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APISanPhamController;
use App\Http\Controllers\APILoaiSanPhamController;
use App\Http\Controllers\APIAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Login
Route::post('login',[APIAuthController::class,'Login']);


Route::middleware('auth:api')->group(function(){
    
    Route::post('logout',[APIAuthController::class,'Logout']);

    
    Route::post('/san-pham/them-moi',[APISanPhamController::class,'ThemMoi']);
    Route::put('/san-pham/cap-nhat/{id}',[APISanPhamController::class,'CapNhat']);
    Route::delete('/san-pham/xoa/{id}',[APISanPhamController::class,'Xoa']);
    
    
    //LoaiSanPham
    
    Route::post('/loai-san-pham/them-moi',[APILoaiSanPhamController::class,'ThemMoi']);
    Route::put('/loai-san-pham/cap-nhat/{id}',[APILoaiSanPhamController::class,'CapNhat']);
    Route::delete('/loai-san-pham/xoa/{id}',[APILoaiSanPhamController::class,'Xoa']);
    
});

Route::get('/san-pham/{$id}',[APISanPhamController::class,'ChiTietSP']);

Route::get('/san-pham-danh-sach',[APISanPhamController::class,'DanhSachSP']);
Route::get('/san-pham/tim-kiem',[APISanPhamController::class,'TimKiem']);

Route::get('/loai-san-pham/tim-kiem',[APILoaiSanPhamController::class,'TimKiem']);
Route::get('/loai-san-pham',[APILoaiSanPhamController::class,'DS_LSP_SP']);
Route::get('/loai-san-pham/ct-danh-sach-lsp-sp/{id}',[APILoaiSanPhamController::class,'CT_DS_LSP_SP']);

//SanPham

//HoaDonBanHang

//KhachHang

