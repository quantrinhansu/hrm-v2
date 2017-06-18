<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = array(
            'Phòng nhân sự',
            'Phòng tài chính', 
            'Phòng kỹ thuật',
            'Phòng kinh doanh',
            'Phòng dự án'         
        );

        $code = array(
            'PNS',
            'PTC',
            'PKT',
            'PKD',
            'PDA'        
        );

        for($i = 0; $i < 5; $i++)
        {
            DB::table('departments')->insert([
                'name' => $name[$i],
                'code' => $code[$i],
            ]);
        }
    }
}
