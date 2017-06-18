<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = array(
            'supper_admin',
            'admin',
            'nhansu',
            'ketoan',
            'nhanvien',
           
        );

        $display_name = array(
            'Quản trị viên cấp cao',
            'Quản trị viên',
            'Nhân sự',
            'Kế toán',
            'Nhân viên'
           
        );

        for($i = 0; $i < 5; $i++)
        {
            DB::table('roles')->insert([
                'name' => $name[$i],
                'display_name' => $display_name[$i],
            ]);
        }
    }
}
