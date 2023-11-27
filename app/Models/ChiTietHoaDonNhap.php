<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonNhap extends Model
{
    use HasFactory;
    protected $table="cthd_nhap";

    public function san_pham(){
        return $this->belongsTo(SanPham::class);
    }
    
    public function hd_nhap(){
        return $this->belongsTo(HoaDonNhap::class);
    }
}
