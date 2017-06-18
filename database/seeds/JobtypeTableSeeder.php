<?php

use Illuminate\Database\Seeder;

class JobtypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = array(
            'Kế toán',
            'Marketting', 
            'Công nghệ thông tin'         
        );

        $code = array(
            'manager',
            'employee',
            'it'        
        );

        for($i = 0; $i < 3; $i++)
        {
            DB::table('job_type')->insert([
                'name' => $name[$i],
                'code' => $code[$i],
            ]);
        }
    }
}
