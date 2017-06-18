<?php

use Illuminate\Database\Seeder;

class UserDepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_department')->insert([
            	'user_id'	=> '3',
            	'department_id'	=> '1',
            	'manager'	=> '1'
            ]);
        DB::table('users_department')->insert([
            	'user_id'	=> '4',
            	'department_id'	=> '2',
            	'manager'	=> '1'
            ]);
        DB::table('users_department')->insert([
            	'user_id'	=> '5',
            	'department_id'	=> '3',
            	'manager'	=> '1'
            ]);
        DB::table('users_department')->insert([
            	'user_id'	=> '6',
            	'department_id'	=> '4',
            	'manager'	=> '1'
            ]);
        DB::table('users_department')->insert([
            	'user_id'	=> '7',
            	'department_id'	=> '5',
            	'manager'	=> '1'
            ]);

        for($i = 8; $i <= 11; $i++){
        	 DB::table('users_department')->insert([
            	'user_id'	=> $i,
            	'department_id'	=> '1',
            ]);
        }

        for($i = 12; $i <= 16; $i++){
        	 DB::table('users_department')->insert([
            	'user_id'	=> $i,
            	'department_id'	=> '2',
            ]);
        }

        for($i = 17; $i <= 21; $i++){
        	 DB::table('users_department')->insert([
            	'user_id'	=> $i,
            	'department_id'	=> '3',
            ]);
        }

        for($i = 21; $i <= 24; $i++){
        	 DB::table('users_department')->insert([
            	'user_id'	=> $i,
            	'department_id'	=> '4',
            ]);
        }

        for($i = 24; $i <= 25; $i++){
        	 DB::table('users_department')->insert([
            	'user_id'	=> $i,
            	'department_id'	=> '5',
            ]);
        }
    }
}
