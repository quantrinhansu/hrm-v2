<?php

use Illuminate\Database\Seeder;

class allowanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = array(
        	'Ăn trưa',
        	'Điện thoại',
        	'Xăng xe',
        	'Nhà ở'
        );

        for($i = 0; $i < 4; $i++)
        {
            DB::table('allowance')->insert([
                'name' => $name[$i],
                'type' => rand(0, 1)
            ]);
        }
    }
}
