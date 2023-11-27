<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
class AdminController extends Controller
{
    public function Login(){
        return view('login');
    }

    public function xlLogin(Request $re){

        $log=Admin::where('ten_dang_nhap', $re->ten_dang_nhap)->first();
        
        if(Auth::attempt(['ten_dang_nhap' => $re->ten_dang_nhap, 'password' => $re->password])){
            return redirect()->route('sanpham.danh-sach');
        }
        return redirect()->route('login')->with('thong_bao','Chưa nhập thông tin');
    }

    public function ThongTin(){
        if(Auth::check()){
            $user=Auth::user();
            return $user;
        }
        return "Nguoi dung chua dang nhap";
    }

    public function Logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
