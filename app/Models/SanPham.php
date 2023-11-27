<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table="san_pham";

    protected $hidden=['created_at','updated_at','deleted_at','loai_san_pham_id'];

    public function loai_san_pham(){
        return $this->belongsTo(LoaiSanPham::class);
    }
}
