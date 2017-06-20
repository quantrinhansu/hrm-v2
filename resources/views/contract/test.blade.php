<!DOCTYPE html>
<html>
<head>
	<title>HD</title>
	<meta charset="UTF-8">
</head>
<style type="text/css">
    *{ 
    	font-family: DejaVu Sans!important; 
    }
    .page-break {
    page-break-after: always;
	}
</style>
<body>

<table >
	<tbody>
		<tr>
			<td>
				<div>
					<span style="font-family:times new roman,times,serif;"><span style="color:#000000;"><span style="font-size:16px;">&nbsp;</span></span></span></div>
				<div style="text-align: center;">
					<span style="font-family:times new roman,times,serif;"><strong><span style="color:#000000;"><span style="font-size:18px;">C</span><span style="font-size:16px;">ỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</span></span></strong><br>
					<span style="color:#000000;"><span style="font-size:16px;"><strong>Độc lập - Tự do - Hạnh phúc</strong><br>
					<strong>------------------------------------</strong></span></span></span></div>
				<div style="text-align: right;">
					<span style="font-family:times new roman,times,serif;"><span style="color:#000000;"><span style="font-size:16px;"><em>TPHCM</em><em>, ngày</em><em>&nbsp;..<?php echo date("d");?>..&nbsp;</em><em>&nbsp;tháng.</em><em>..<?php echo date("m");?></em><em>.. năm ..</em><em><?php echo date("Y");?></em><em>..</em></span></span></span></div>
				<div>
					<span style="font-family:times new roman,times,serif;"><span style="color:#000000;"><span style="font-size:16px;">&nbsp;</span></span></span></div>
				<h3 style="text-align: center;">
					<span style="font-family:times new roman,times,serif;"><span style="font-size:18px;"><strong>HỢP ĐỒNG LAO ĐỘNG</strong><br>
					(Số: {{$contract['code']}}/HĐLĐ)</span></span></h3>
				<div>
					<span style="font-family:times new roman,times,serif;"><span style="color:#000000;"><span style="font-size:16px;">&nbsp;<br>
					<strong>Chúng tôi, một bên là</strong>:&nbsp;</span></span><strong><span style="color: rgb(0, 0, 0); font-family: ''times new roman'', times, serif; font-size: 16px;">Công ty TNHH BESIGN SOFT</span></strong></span></div>
				<div style="margin-left: 80px;">
					<span style="font-family:times new roman,times,serif;"><span style="color: rgb(0, 0, 0); font-family: ''times new roman'', times, serif; font-size: 16px;">Địa chỉ: Ktx Khu B, Đông Hòa, Dĩ An, Bình Dương.</span></span></div>
				<div>
					<span style="font-family:times new roman,times,serif;"><span style="color: rgb(0, 0, 0); font-family: ''times new roman'', times, serif; font-size: 16px;">Đại diện&nbsp;</span><span style="color:#000000;"><span style="font-size:16px;">bởi</span></span></span><span style="color: rgb(0, 0, 0); font-size: 16px; font-family: ''times new roman'', times, serif;">:</span></div>
				<div style="margin-left: 40px;">
					<span style="font-family:times new roman,times,serif;"><span style="color:#000000;"><span style="font-size:16px;"><strong>Ông:&nbsp;</strong><strong>&nbsp;{{Auth::User()->name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</strong></span></span></span></div>
				<div style="margin-left: 40px;">
					<span style="font-family:times new roman,times,serif;"><span style="color:#000000;"><span style="font-size:16px;">Sinh ngày..{{Carbon\Carbon::parse(Auth::User()->date_of_birth)->format('d')}}..... tháng...{{Carbon\Carbon::parse(Auth::User()->date_of_birth)->format('m')}}.. năm....{{Carbon\Carbon::parse(Auth::User()->date_of_birth)->format('Y')}}..&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<br>
					Số CMND: {{Auth::User()->CMND}} cấp ngày..{{Carbon\Carbon::parse(Auth::User()->date_CMND)->format('d')}}.../..{{Carbon\Carbon::parse(Auth::User()->date_CMND)->format('m')}}.../..{{Carbon\Carbon::parse(Auth::User()->date_CMND)->format('Y')}}... tại..{{Auth::User()->address_CMND}}..<br>
					Địa chỉ nơi cư trú: {{Auth::User()->present_address}}.<br>
					Chức vụ: Giám đốc.</span></span></span></div>
				<div>
					<span style="font-family:times new roman,times,serif;"><span style="color:#000000;"><span style="font-size:16px;">&nbsp;<br>
					<strong>Và một bên là Ông: {{$contract->User['name']}}</strong></span></span></span></div>
				<div style="margin-left: 40px;">
					<span style="font-family:times new roman,times,serif;"><span style="color:#000000;"><span style="font-size:16px;">Sinh ngày...{{Carbon\Carbon::parse($contract->User['date_of_birth'])->format('d')}}.... tháng..{{Carbon\Carbon::parse($contract->User['date_of_birth'])->format('m')}}... năm...{{Carbon\Carbon::parse($contract->User['date_of_birth'])->format('Y')}}... &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Giới tính: @if($contract->User['gender'] == 1) Nam @else Nữ @endif<br>
					Số CMND: {{$contract->User['CMND']}} &nbsp;cấp ngày...{{Carbon\Carbon::parse($contract->User['date_CMND'])->format('d')}}../..{{Carbon\Carbon::parse($contract->User['date_CMND'])->format('m')}}..../..{{Carbon\Carbon::parse($contract->User['date_CMND'])->format('Y')}}..... tại ...{{$contract->User['address_CMND']}}.......<br>
					Nơi đăng ký hộ khẩu thường trú: {{$contract->User['permanent_address']}}.<br>
					Chỗ ở hiện nay: {{$contract->User['present_address']}}.</span></span></span><br>
					&nbsp;</div>
				<div>
					<span style="font-family:times new roman,times,serif;"><span style="color:#000000;"><span style="font-size:16px;">Thỏa thuận ký kết hợp đồng lao động và cam kết làm đúng những điều khoản sau đây:<br>
					<br>
					<strong>Điều</strong><strong>&nbsp;1</strong><strong>. Công việc và địa điểm làm việc</strong><strong>:</strong><br>
					1) Công việc:<br>
					- Phòng ban: {{$contract->User->UserDepartment->Department['name']}}.<br>
					- Chức vụ: {{$contract->User->UserPositionJobtype->Position['name']}}.<br>
					- Chuyên môn: {{$contract->User->UserPositionJobtype->Jobtype['name']}}.<br>
					- Công việc phải làm:</span></span></span></div>
				<div style="margin-left: 40px;">
					<span style="font-family:times new roman,times,serif;"><span style="color:#000000;"><span style="font-size:16px;">{!!nl2br($contract['work_description'])!!}</span></span></span></div>
				<div>
		<div class="page-break"></div>
					<br>
					<span style="font-family:times new roman,times,serif;"><span style="color:#000000;"><span style="font-size:16px;">2) Địa điểm làm việc của người lao động: Tại trụ sở của công ty: Phòng 207, Tòa nhà B5, KTX khu B, Đông Hòa, Dĩ An, Bình Dương.<br>
					&nbsp;<br>
					<strong>Điều 2:&nbsp;</strong><strong>Thời hạn của hợp đồng lao động</strong>:<br>
					- Loại hợp đồng lao động: {{$contract['type']}} tháng<br>
					- Bắt đầu từ ngày..{{Carbon\Carbon::parse($contract['from'])->format('d')}}.. tháng..{{Carbon\Carbon::parse($contract['from'])->format('m')}}.. năm ..{{Carbon\Carbon::parse($contract['from'])->format('Y')}}.. đến hết ngày..{{Carbon\Carbon::parse($contract['to'])->format('d')}}.. tháng..{{Carbon\Carbon::parse($contract['to'])->format('m')}}.. năm...{{Carbon\Carbon::parse($contract['to'])->format('Y')}}...<br>
					&nbsp;<br>
					<strong>Điều 3:</strong>&nbsp;<strong>Thời giờ làm việc, thời giờ nghỉ ngơi:&nbsp;</strong><br>
					1) Thời giờ làm việc:<br>
					-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Trong ngày: 8h/ngày – Sáng từ 7h30 đến 11h30, Chiều từ 1h30 đến 17h30<br>
					-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Trong tuần: 6 ngày/tuần: từ thứ 2 đến thứ 7<br>
					2) Thời gian nghỉ:<br>
					- Nghỉ hằng năm, nghỉ lễ, tết, nghỉ việc riêng: Theo quy định của Luật lao động.<br>
					<br>
					<strong>Điều&nbsp;</strong><strong>4</strong><strong>:</strong>&nbsp;<strong>Nghĩa vụ và quyền lợi của người lao động</strong><br>
					<strong>1. Quyền lợi:</strong><br>
					-&nbsp;<strong>Mức lương chính</strong>: {{number_format($contract->User->Salary['base_salary'])}} đồng/tháng<br>
					-&nbsp;<strong>Phụ cấp</strong>:</span></span></span></div>
				<div style="margin-left: 40px;">
					<span style="font-family:times new roman,times,serif;"><span style="color:#000000;"><span style="font-size:16px;">
					@foreach($salary_allowance as $sa)
						+ {{$sa->Allowance['name']}}: {{number_format($sa['value'])}} đồng/tháng<br>
					@endforeach
					</span></span></span></div>
				<div>
					<span style="font-family:times new roman,times,serif;"><span style="color:#000000;"><span style="font-size:16px;">- Tiền thưởng lễ, tết: Được hưởng theo quy chế lương thưởng chung của toàn công ty.<br>
					- Hình thức trả lương: theo thời gian<br>
					- Được trả lương vào ngày cuối tháng.<br>
					- Chế độ nâng lương: 1 năm 1 lần căn cứ vào kết quả thực hiện công việc của người lao động.<br>
					- Bảo hiểm xã hội, bảo hiểm y tế, bảo hiểm thất nghiệp: Được tham gia bảo hiểm theo quy định của Luật bảo hiểm về mức tham đóng và tỷ lệ đóng.<br>
					- Cách khoản bổ sung, phúc lợi khác: Hàng năm người lao động được đi tham quan, du lịch, nghỉ mát, quà sinh nhật theo quy định của công ty.<br>
					<br>
			<div class="page-break"></div>
					<strong>2. Nghĩa vụ:</strong><br>
					- Hoàn thành những công việc đã cam kết trong hợp đồng lao động.<br>
					- Chấp hành lệnh điều hành sản xuất-kinh doanh, nội quy kỷ luật lao động, an toàn lao động....<br>
					&nbsp;<br>
					<strong>Điều 5:</strong>&nbsp;<strong>Nghĩa vụ và quyền hạn của người sử dụng lao động</strong><br>
					1. Nghĩa vụ:<br>
					- Bảo đảm việc làm và thực hiện đầy đủ những điều đã cam kết trong hợp đồng lao động.<br>
					- Thanh toán đầy đủ, đúng thời hạn các chế độ và quyền lợi cho người lao động theo hợp đồng lao động.<br>
					2. Quyền hạn:<br>
					- Điều hành người lao động hoàn thành công việc theo hợp đồng (bố trí, điều chuyển, tạm ngừng việc)<br>
					- Tạm hoãn, chấm dứt hợp đồng lao động, kỷ luật người lao động theo quy định của pháp luật và nội quy lao động của doanh nghiệp.<br>
					<br>
					<strong>Điều 6:</strong>&nbsp;Điều khoản thi hành<br>
					- Những vấn đề về lao động không ghi trong hợp đồng lao động này thì áp dụng theo nội quy lao động và quy chế lương thưởng của công ty.<br>
					- Hợp đồng lao động được làm thành 02 bản có giá trị ngang nhau, mỗi bên giữ một bản và có hiệu lực từ ngày ..{{Carbon\Carbon::parse($contract['from'])->format('d')}}.. tháng ..{{Carbon\Carbon::parse($contract['from'])->format('m')}}.. năm ..{{Carbon\Carbon::parse($contract['from'])->format('Y')}} . Khi hai bên ký kết phụ lục hợp đồng lao động thì nội dung của phụ lục hợp đồng lao động cũng có giá trị như các nội dung của bản hợp đồng lao động này.<br>
					Hợp đồng này làm tại trụ sở của công ty, ngày..<?php echo date("d");?>.. tháng..<?php echo date("m");?>.. năm...<?php echo date("Y");?>...</span></span></span><br>
					&nbsp;</div>
				<table align="center" border="0" cellpadding="0" cellspacing="0" style="text-align: center; width: 670px;">
					<tbody>
						<tr>
							<td style="width: 272px;">
								<span style="font-family:times new roman,times,serif;"><span style="color:#000000;"><span style="font-size:16px;"><strong>Người lao động</strong><br>
								(Ký tên)<br>
								Ghi rõ Họ và Tên</span></span></span></td>
							<td style="width: 293px;">
								<span style="font-family:times new roman,times,serif;"><span style="color:#000000;"><span style="font-size:16px;"><strong>Người sử dụng lao động</strong><br>
								(Ký tên, đóng dấu)<br>
								Ghi rõ Họ và Tên</span></span></span></td>
						</tr>
					</tbody>
				</table>
				<div style="clear: both;">
					&nbsp;</div>
				<div>
					&nbsp;</div>
			</td>
		</tr>
	</tbody>
</table>	
	
</body>
</html>