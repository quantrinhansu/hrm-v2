<!DOCTYPE html>
<html lang="en">
<head>
	<title>Export</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<style type="text/css">
    *{ font-family: DejaVu Sans; font-size: 12px;}
    table {
    border-collapse: collapse;
    }

    table, td, th {
        border: 1px solid black;
    }
</style>
<body>
     <h1 style="text-align: center;">DANH SÁCH NHÂN VIÊN CỦA CÔNG TY</h1>
	 <table>
        <thead>
            <tr>
            <th>STT</th>
            <th>Mã Nhân Viên</th>
            <th>Tên Nhân Viên</th>
            <th>Email</th>
            <th>Giới Tính</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ Thường Trú</th>
            <th>Địa Chỉ Hiện Tại</th>
            <th>Phòng Ban</th>
            <th>Chức Vụ</th>
            <th>Chuyên Môn</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        @foreach($user as $us)
            <tr>
                <td><?php echo $i++; ?></td>
                <td>{{$us['username']}}</td>
                <td>{{$us['name']}}</td>
                <td>{{$us['email']}}</td>
                <td>
					@if($us['gender'] == 1)
						Nam
					@else
						Nữ
					@endif
                </td>
                <td>{{$us['phone_number']}}</td>
                <td>{{$us['permanet_address']}}</td>
                <td>{{$us['present_address']}}</td>
                <td>{{$us->UserDepartment['user_id'] == null ? '' : $us->UserDepartment->Department['name']}}</td>
                <td>{{$us->UserPositionJobtype['user_id'] == null ? '' : $us->UserPositionJobtype->Position['name']}}</td>
                <td>{{$us->UserPositionJobtype['user_id'] == null ? '' : $us->UserPositionJobtype->Jobtype['name']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>