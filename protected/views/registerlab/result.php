<form id="Form1" method="post" enctype="multipart/form-data"
	class="form-horizontal">

	<div class="portlet light bordered">
		<div class="portlet-title">
			<i class="icon-settings font-dark"></i> <span
				class="caption-subject font-dark sbold uppercase">ระบบสารสนเทศฐานข้อมูลห้องปฏิบัติการทางวิทยาศาสตร์</span>
			<div class="actions">
			<?php echo CHtml::link('ย้อนกลับ',array('Site/LogOut'),array('class'=>'btn btn-default btn-sm'));?>
			</div>
		</div>
		<div class="portlet-body">

		
<?php

if (isset ( $data [0] )) {
	
	if ($user->status == "I") {
		?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody>
					<tr>
						<td style="padding-bottom: 20px;">
							<center>
								<table border="0" cellpadding="0" cellspacing="0" width="600px"
									style="height: 100%;">
									<tbody>
										<tr>
											<td valign="top" class="bodyContent">
												<table border="0" cellpadding="20" cellspacing="0"
													width="100%">
													<tbody>
														<tr>
															<td valign="top">
																<h3>ข้อมูลการลงทะเบียนห้องปฏิบัติการทางวิทยาศาสตร์</h3>
																รหัสทะเบียน&nbsp;:&nbsp;<font color='green'
																style="font-weight: bold"><?php echo $data[0]->lab_code; ?></font>
																<br> <font color='green'>
														<?php if( isset($data[0]->faculty)){?>
														(&nbsp;
														<?php }?>
														<?php echo $data[0]->faculty->name; ?>
														<?php echo $data[0]->department->name; ?>
														<?php echo $data[0]->build->name; ?>
														<?//php echo $_GET['floor']; ?>
														<?php echo $data[0]->lab_type->name; ?>
														<?php if( isset($data[0]->faculty)){?>
														)&nbsp;
														<?php }?>
														</font> <br></br>


															</td>
															<td></td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</center>
						</td>
					</tr>
				</tbody>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="100%"
				style="background-color: #f8f8f8; border-top: 1px solid #e7e7e7; border-bottom: 1px solid #e7e7e7;">
				<tbody>
					<tr>
						<td>
							<center>
								<table border="0" cellpadding="0" cellspacing="0" width="600px"
									style="height: 100%;">
									<tbody>
										<tr>
											<td valign="top" style="font-size: 12px; padding: 20px;">
												<!-- 												<h3></h3> -->
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โปรดตรวจสอบรายละเอียดการลงทะเบียนในอีเมล์&nbsp;&nbsp;<?php echo $user->email;?>




													</td>
										</tr>
									</tbody>
								</table>
							</center>
						</td>
					</tr>
				</tbody>
			</table>
<?php
	} else {
		
		
		echo '<div class="alert alert-warning">ข้อมูลผู้ใช้นี้ได้ลงทะเบียนเรียบร้อยแล้ว</div>';
	}
} else {
	echo 'เกิดความผิดพลาดในการบันทึกข้อมูล';
}
?>
</div>
	</div>
</form>


