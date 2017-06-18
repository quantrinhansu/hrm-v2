<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = array(
            'user_show',
            'contract_show',
            'position_show',
            'jobtype_show',
            'salary_show',
            'timekeeping_show'    	
        );

        $display_name = array(
            'Xem danh sách nhân viên',
            'Xem danh sách hợp đồng',
            'Chức vụ',
            'Chuyên môn',
            'Danh sách lương',
           	'Chấm công'
        );

        for($i = 0; $i < 6; $i++)
        {
            DB::table('permissions')->insert([
                'name' => $name[$i],
                'display_name' => $display_name[$i],
            ]);
        }
    }
}
