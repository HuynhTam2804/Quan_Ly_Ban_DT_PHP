<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonXuat extends Model
{
    use HasFactory;
    protected $table="cthd_xuat";

    public function san_pham(){
        return $this->belongsTo(SanPham::class);
    }

    public function hd_xuat(){
        return $this->belongsTo(HoaDonXuat::class);
    }
}
