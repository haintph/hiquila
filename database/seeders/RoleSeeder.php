<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Owner', 'description' => 'Chủ sở hữu nhà hàng'],
            ['name' => 'Manager', 'description' => 'Quản lý nhà hàng'],
            ['name' => 'Chef', 'description' => 'Đầu bếp'],
            ['name' => 'Waiter', 'description' => 'Nhân viên phục vụ'],
            ['name' => 'Cashier', 'description' => 'Thu ngân'],
            ['name' => 'Customer', 'description' => 'Khách hàng'],
        ];

        DB::table('roles')->insert($roles);
    }
}
