<?php

use Illuminate\Database\Seeder;

class ContractTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 3; $i < 30; $i++)
        {
            DB::table('contract')->insert([
                'create_by'	=>	'1',
                'employee' => 	$i,
                'code'		=>	$i,
                'name'		=> 	'Hợp Đồng Lao Động',
                'type'		=>	'12',
                'work_description'	=>	'Xây dựng các kế hạch kinh doanh',
                'from'		=>	'2017-03-20',
                'to'		=>	'2018-03-20'
            ]);
        }

        for($i = 3; $i < 30; $i++)
        {
            DB::table('salary')->insert([
            	'user_id'	=>	$i,
            	'base_salary'	=>	'10000000'
            ]);
        }

        for($i = 3; $i < 30; $i++)
        {
            DB::table('salary_allowance')->insert([
            	'user_id'	=>	$i,
            	'allowance_id'	=>	'1',
            	'value'			=>	'1000000'
            ]);

            DB::table('salary_allowance')->insert([
            	'user_id'	=>	$i,
            	'allowance_id'	=>	'2',
            	'value'			=>	'500000'
            ]);

            DB::table('salary_allowance')->insert([
            	'user_id'	=>	$i,
            	'allowance_id'	=>	'3',
            	'value'			=>	'500000'
            ]);

            DB::table('salary_allowance')->insert([
            	'user_id'	=>	$i,
            	'allowance_id'	=>	'4',
            	'value'			=>	'1000000'
            ]);
        }
    }
}
