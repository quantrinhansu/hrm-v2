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
            'timekeeping_show',
            'department',
            'retribution',
            'business_trip',
            'manage_access',  
            'ACL'  	
        );

        $display_name = array(
            'Quản lý nhân viên',
            'Quản lý hợp đồng',
            'Chức vụ',
            'Chuyên môn',
            'Danh sách lương',
           	'Chấm công',
            'Quản lý phòng ban',
            'Quản lý khen thưởng',
            'Quản lý công tác',
            'Quản lý truy cập',
            'Quản lý phân quyền'
        );

        for($i = 0; $i < 11; $i++)
        {
            DB::table('permissions')->insert([
                'name' => $name[$i],
                'display_name' => $display_name[$i],
            ]);
        }
    }
}
