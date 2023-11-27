<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class CapNhatAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = Admin::all();

        foreach ($users as $user ) {
            echo "Cap nhat mat khau cho user ($user->ten_dang_nhap)";
            $user->password=Hash::make('123456');
            $user->save();
        }

    }
}
