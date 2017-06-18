<?php

use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i = 1; $i <= 4; $i++)
        {
            DB::table('role_user')->insert([
            	'user_id'	=> $i,
            	'role_id'	=> $i
            ]);
        }

        for($i = 5; $i <= 30; $i++)
        {
            DB::table('role_user')->insert([
            	'user_id'	=> $i,
            	'role_id'	=> '5'
            ]);
        }
    }
}
