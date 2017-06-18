<?php

use Illuminate\Database\Seeder;

class BussinessTripTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_trip')->insert([
                'reason' => 'Gặp khách hàng',
                'place' => 'Bình Dương',
                'allowance'	=>	'1000000',
                'from'	=>	'2017-06-20',
                'to'	=>	'2017-06-23',
                'user_id'	=>	'8'
            ]);
    }
}
