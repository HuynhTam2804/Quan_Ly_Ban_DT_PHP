<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonXuat extends Model
{
    use HasFactory;
    protected $table="hd_xuat";

    public function khach_hang(){
        return $this->belongsTo(KhachHang::class);
    }
}
