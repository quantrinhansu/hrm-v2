<?php

use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = array(
            'Trưởng phòng',
            'Nhân viên',          
        );

        $code = array(
            'manager',
            'employee',        
        );

        for($i = 0; $i < 2; $i++)
        {
            DB::table('position')->insert([
                'name' => $name[$i],
                'code' => $code[$i],
            ]);
        }
    }
}
