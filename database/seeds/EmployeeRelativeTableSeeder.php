<?php

use Illuminate\Database\Seeder;

class EmployeeRelativeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ho = array(
            'Phạm', 'Nguyễn', 'Trần', 'Lê', 'Lý'
        );

        $lot = array(
            'Công', 'Văn', 'Viết', 'Thành', 'Trọng', 'Đức', 'Đình', 'Hoài'
        );

        $ten = array(
            'Bằng', 'Hòa', 'Hà', 'Ban', 'Trí', 'Trung', 'Nhật', 'Hải'
        );

        $full_name = array(
        	'Phạm Quốc Bằng',
        	'Nguyễn Văn Ban',
        	'Trần Hữu Trí',
        	'Nguyễn Quốc Toản',
        	'Lê Viết Lộc'
        );

        $address = array(
        	'Số 988 Đường Vĩnh Lộc, Xã Vĩnh Lộc B, Huyện Bình Chánh, TP Hồ Chí Minh',
            'Số 1 Đường số 354, Xã Nhuận Đức, Huyện Củ Chi, TP Hồ Chí Minh',
            '635/13 Hương lộ 2, Phường Bình Trị Đông, Quận Bình Tân, TP Hồ Chí Minh',
            '652 âu Cơ, Phường 10, Quận Tân Bình, TP Hồ Chí Minh',
            '151/4 Gò Xoài, Phường Bình Hưng Hòa A, Quận Bình Tân, TP Hồ Chí Minh',
            '606A Võ Văn Kiệt, Phường Cầu Kho, Quận 1, TP Hồ Chí Minh',
            '377/1 Cách Mạng Tháng 8, Phường 12, Quận 10, TP Hồ Chí Minh',
            '608 Quốc Lộ 1A, phường An Phú Đông, Quận 12, TP Hồ Chí Minh'
        );

        $phone_number = array(
        	'0988992518',
            '01688883627',
            '0907000350',
            '0989420655',
            '01699118349',
            '0939166160',
            '0914409356',
            '0979748494',
            '0913199757'
        );

        for($i = 0; $i < 30; $i++)
        {
            DB::table('employee_relatives')->insert([
                'full_name' => $ho[rand(0, 4)] . ' ' . $lot[rand(0, 7)] . ' ' . $ten[rand(0, 7)],
                'address' => $address[rand(0, 7)],
                'phone_number'	=>	$phone_number[rand(0, 8)],
                'relation'	=>	'cha con',
                'user_id'   =>  $i + 1
            ]);
        }
    }
}
