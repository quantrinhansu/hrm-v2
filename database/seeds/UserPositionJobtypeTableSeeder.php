<?php

use Illuminate\Database\Seeder;

class UserPositionJobtypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_position_jobtype')->insert([
            	'user_id'	=> '3',
            	'position_id'	=> '1',
            	'jobtype_id'	=> '3'
            ]);
       	DB::table('user_position_jobtype')->insert([
            	'user_id'	=> '4',
            	'position_id'	=> '1',
            	'jobtype_id'	=> '1'
            ]);
       	DB::table('user_position_jobtype')->insert([
            	'user_id'	=> '5',
            	'position_id'	=> '1',
            	'jobtype_id'	=> '3'
            ]);
       	DB::table('user_position_jobtype')->insert([
            	'user_id'	=> '6',
            	'position_id'	=> '1',
            	'jobtype_id'	=> '2'
            ]);
   		DB::table('user_position_jobtype')->insert([
        	'user_id'	=> '7',
        	'position_id'	=> '1',
        	'jobtype_id'	=> '2'
        ]);

        for($i = 8; $i <= 30; $i++){
        	 DB::table('user_position_jobtype')->insert([
            	'user_id'	=> $i,
	        	'position_id'	=> '2',
	        	'jobtype_id'	=> '3'
            ]);
        }
    }
}
