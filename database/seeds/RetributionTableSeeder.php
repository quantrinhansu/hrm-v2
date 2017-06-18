<?php

use Illuminate\Database\Seeder;

class RetributionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('retribution')->insert([
                'code' => 'QDKT1',
                'decide' => 'khenthuong',
                'reason'	=>	'Làm việc tốt',
                'description'	=>	'Thưởng 500k',
                'user_id'	=>	'8',
                'create_by'	=>	'1'
            ]);
    }
}
