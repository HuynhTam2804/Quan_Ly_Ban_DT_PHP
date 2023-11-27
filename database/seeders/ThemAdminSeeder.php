<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
 
class ThemAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new Admin();
        $user->ten_dang_nhap="test";
        $user->password=Hash::make('123456');
        $user->ho_ten="Huynh Minh Tam";
        $user->save();

        echo "Them user huynhtam thanh cong";
    }
}
