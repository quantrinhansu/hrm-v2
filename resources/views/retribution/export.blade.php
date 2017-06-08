<!DOCTYPE html>
<html>
<head>
	<title>Export</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th colspan="9" height="40" valign="middle" align="center"><h1>DANH SÁCH KHEN THƯỞNG - KỶ LUẬT</h1></th>
    </tr>
    
    <tbody>
    <tr>
        <th>STT</th>
        <th>Mã Nhân Viên</th>
        <th>Tên Nhân Viên</th>
        <th>Số Hiệu</th>
        <th>Loại Quyết Định</th>
        <th>Lý Do</th>
        <th>Hình Thức</th>
        <th>Ngày ra quyết định</th>
    </tr>

    <?php $i = 1; ?>
    @foreach($retribution as $re)
    <tr id="retribution_{{$re['id']}}">
        <td><?php echo $i++;?></td>
        <td id="username_{{$re['id']}}">{{$re->User['username']}}</td>
        <td id="name_{{$re['id']}}">{{$re->User['name']}}</td>
        <td id="code_{{$re['id']}}">{{$re['code']}}</td>
        <td id="decide_{{$re['id']}}">
            @if($re['decide'] == 'khenthuong')
                Khen Thưởng
            @else
                Kỷ Luật
            @endif
        </td>
        <td id="reason_{{$re['id']}}">{{$re['reason']}}</td>
        <td id="description_{{$re['id']}}">{{$re['description']}}</td>
        <td id="create_date_{{$re['id']}}">{{Carbon\Carbon::parse($re['create_date'])->format('d-m-Y')}}</td>
    </tr>
    @endforeach
    </tbody>
    </thead>
</table>
</body>
</html>