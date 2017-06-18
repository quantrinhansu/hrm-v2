<?php

use Illuminate\Database\Seeder;

class LeaveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leaves')->insert([
                'description' => 'Bị bệnh',
                'type' => 'chapnhan',
                'from'	=>	'2017-06-19',
                'to'	=>	'2017-06-20',
                'user_id'	=>	'8',
                'accepter_id'	=>	'1'
            ]);
    }
}
