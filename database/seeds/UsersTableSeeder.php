<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = array(
            'Phạm Công Bình',
            'Nguyễn Văn Đức',
            'Trần Trọng Bình',
            'Trần Đình Phú',
            'Trần Quang Tiến',
            'Nguyễn Hoài Nam',
            'Y Tuấn Hwing',
            'Nguyễn Đức Cường',
            'Lê Viết Hoàng Dũng',
            'Nguyễn Trọng Khương',
            'Nguyễn Công Vũ',
            'Lê Hửu Tài',
            'Nguyễn Thành Nhân',
            'Phạm Quang Minh',
            'Nguyễn Thành Công',
            'Nguyễn Ngọc Thành',
            'Nguyễn Ngọc Trà',
            'Trần Đăng Nam',
            'Nguyễn Quỳnh Như',
            'Lê Thu Hoài Trang',
            'Nguyễn Thị Vân Anh',
            'Phạm Ngọc Huyền',
            'Trần Thanh Tùng',
            'Phùng Quang Minh Trí',
            'Nguyễn Đình Diệu',
            'Trần Ngọc Huy',
            'Nguyễn Yến Nhi',
            'Lê Ngọc Lâm',
            'Phạm Văn Hà',
            'Nguyễn Văn Duy'
        );

        $email = array(
            'congbinh@gmail.com',
            'vanduc@gmail.com',
            'cbinh951@gmail.com',
            'dinhphu@gmail.com',
            'quangtien@gmail.com',
            'hoainam@gmail.com',
            'hwing@gmail.com',
            'duccuong@gmail.com',
            'hoangdung@gmail.com',
            'trongkhuong@gmail.com',
            'congvu@gmail.com',
            'huutai@gmail.com',
            'thanhnhanh@gmail.com',
            'quangminh@gmail.com',
            'thanhcong@gmail.com',
            'ngocthanh@gmail.com',
            'ngoctra@gmail.com',
            'dangnam@gmail.com',
            'quynhnhu@gmail.com',
            'hoaitrang@gmail.com',
            'vananh@gmail.com',
            'ngochuyen@gmail.com',
            'thanhtung@gmail.com',
            'minhtri@gmail.com',
            'dinhdieu@gmail.com',
            'ngochuy@gmail.com',
            'yennhi@gmail.com',
            'ngoclam@gmail.com',
            'vanha@gmail.com',
            'vanduy@gmail.com'
        );

        $username = array(
            'binhpc',
            'ducnv',
            'binhtt',
            'phutd',
            'tientq',
            'namnh',
            'hwingyt',
            'cuongnd',
            'dunglvh',
            'khuongnt',
            'vunc',
            'tailh',
            'nhannt',
            'minhpq',
            'congnt',
            'thanhnn',
            'trann',
            'namtd',
            'nhunq',
            'tranglth',
            'anhntv',
            'huyenpn',
            'tungtt',
            'tripqm',
            'dieund',
            'huytn',
            'nhiny',
            'lamln',
            'hapv',
            'duynv',
        );

        $permanent_address = array(
            'Xuân Sơn, Châu Đức, Bà Rịa Vũng Tàu',
            'Số 16C Tôn Đức Thắng, phường Mỹ Bình, TP. Long Xuyên, tỉnh An Giang',
            'Số 04 đường Phan Đình Phùng, phường 3, TP.Bạc Liêu, tỉnh Bạc Liêu',
            'Số 82  đường Hùng Vương, TP. Bắc Giang, tỉnh Bắc Gian',
            'Tổ 1A, phường Phùng Chí Kiên, TX.Bắc Kạn, tỉnh Bắc Kạn',
            'Số 10  đường Phù Đổng Thiên Vươn, phường Suối Hoa, TP.Bắc Ninh, tỉnh Bắc Ninh',
            'Số 7 đường Cách Mạng Tháng 8, phường 3, TP. Bến Tre, tỉnh Bến Tre',
            'Số 01 Trần Phú, TP.Quy Nhơn, tỉnh Bình Định',
            'Số 04 Hải Thượng Lãn Ông, TP.Phan Thiết, tỉnh Bình Thuận',
            'Số 02, đường Hùng Vương, phường 5, TP.Cà Mau, tỉnh Cà Mau',
        );

        $present_address = array(
            '23-25 NGUYỄN HUY TỰ, P.ĐK, Q.1, TP. HCM',
            '26A NGUYỄN VĂN CỪ, P.CK, Q.1, TP. HCM',
            '81 Đường TA 21, phường Thới An, Quận 12, TP Hồ Chí Minh',
            '31/40/8 Ung Văn Khiêm, Phường 25, Quận Bình Thạnh, TP Hồ Chí Minh',
            'Số 8 Đường số 9, Phường Tân Thuận Đông, Quận 7, TP Hồ Chí Minh',
            '38 Võ Văn Tần, Phường 06, Quận 3, TP Hồ Chí Minh',
            'Số 988 Đường Vĩnh Lộc, Xã Vĩnh Lộc B, Huyện Bình Chánh, TP Hồ Chí Minh',
            'Số 1 Đường số 354, Xã Nhuận Đức, Huyện Củ Chi, TP Hồ Chí Minh',
            '635/13 Hương lộ 2, Phường Bình Trị Đông, Quận Bình Tân, TP Hồ Chí Minh',
            '652 âu Cơ, Phường 10, Quận Tân Bình, TP Hồ Chí Minh',
            '151/4 Gò Xoài, Phường Bình Hưng Hòa A, Quận Bình Tân, TP Hồ Chí Minh',
            '7F Nguyễn Thị Minh Khai, Phường Bến Nghé, Quận 1, TP Hồ Chí Minh',
            '129/1 Võ Văn Tần, Phường 06, Quận 3, TP Hồ Chí Minh',
            'C3/28 Lê Đình Chi, ấp 3, Xã Lê Minh Xuân, Huyện Bình Chánh, TP Hồ Chí Minh',
            '606A Võ Văn Kiệt, Phường Cầu Kho, Quận 1, TP Hồ Chí Minh',
            '377/1 Cách Mạng Tháng 8, Phường 12, Quận 10, TP Hồ Chí Minh',
            '608 Quốc Lộ 1A, phường An Phú Đông, Quận 12, TP Hồ Chí Minh',
        );

        $date_of_birth = array(
            '1990-10-02',
            '1991-10-03',
            '1991-05-04',
            '1992-04-06',
            '1992-04-25',
            '1992-04-25',
            '1994-08-20',
            '1994-09-10',
            '1995-02-26',
            '1993-04-23',
            '1992-11-20',
        );

        $joining_date = array(
            '2013-02-10',
            '2013-03-10',
            '2013-05-10',
            '2014-05-17',
            '2014-03-16',
            '2014-08-20',
            '2015-05-5',
            '2015-04-10',
            '2015-06-15',
            '2016-05-20'
        );

        $date_CMND = array(
            '2010-02-10',
            '2010-03-10',
            '2009-05-10',
            '2005-05-17',
            '2008-03-16',
            '2010-08-20',
            '2008-05-5',
            '2011-04-10',
            '2012-06-15',
            '2013-05-20'
        );

        $phone_number = array(
            '0988992518',
            '01688883627',
            '0907000350',
            '0989420655',
            '01699118349',
            '01689525898',
            '0907467077',
            '01235099415',
            '0906919522',
            '01214907840',
            '0939945565',
            '0939166160',
            '0914409356',
            '0979748494',
            '0913199757',
        );

        $bank_account_name = array(
            '1606205061263',
            '10621511216012',
            '0107271365',
            '0071004445089',
            '100000761789',
            '158602829',
        );

        $bank_name = array(
            'Ngân hàng NN&PTNT - Agibank',
            'Ngân hàng Techcombank',
            'Ngân hàng Đông Á',
            'Ngân hàng Vietcombank',
            'Ngân hàng Vietinbank',
            'Ngân hàng ACB',
        );

        $CMND = array(
            '233016918',
            '233031256',
            '233032569',
            '233033589',
            '233028784',
            '273016918',
            '273031256',
            '273032569',
            '273033589',
            '273028784',

        );

        for($i = 0; $i < 30; $i++)
        {
            DB::table('users')->insert([
                'username' => $username[$i],
                'email' => $email[$i],
                'password' => bcrypt('123456'),
                'active'   => '1',
                'gender'   => rand(0,1),
                'avatar'   => $i + 1 . '.jpg',
                'name'      => $name[$i],
                'permanent_address' => $permanent_address[rand(0, 9)],
                'present_address'   => $present_address[rand(0, 16)],
                'date_of_birth'     => $date_of_birth[rand(0, 9)],
                'joining_date'     => $joining_date[rand(0, 9)],
                'nationality'       => 'Việt Nam',
                'ethnic'        =>  'Kinh',
                'phone_number'      =>  $phone_number[rand(0, 14)],
                'bank_account_name' => $bank_account_name[rand(0, 5)],
                'bank_name'     =>  $bank_name[rand(0, 5)],
                'CMND'          => $CMND[rand(0, 9)],
                'date_CMND'     =>  $date_CMND[rand(0, 9)],
                'address_CMND'  => $permanent_address[rand(0, 9)],
            ]);
        }
         
    }
}
