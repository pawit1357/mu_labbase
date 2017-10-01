<form id="Form1" method="post" enctype="multipart/form-data"
	class="form-horizontal">

	<div class="portlet light bordered">
		<div class="portlet-title">
			<i class="icon-settings font-dark"></i> <span
				class="caption-subject font-dark sbold uppercase">ยืนยันการลงทะเบียนห้องปฎิบัติการวิทยาศาสตร์ </span>
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
																<h4>ข้อมูลการลงทะเบียนห้องปฏิบัติการทางวิทยาศาสตร์ (รายงานประจำปี)</h4>
												<br></br>
																<table>
																	<tr>
																		<td style="text-align: right">ชื่อ-นามสกุล :</td>
																		<td><?php echo $user->first_name.'  '.$user->last_name; ?></td>
																	</tr>
																	<tr>
																		<td style="text-align: right">รหัสผู้ใช้ :</td>
																		<td><?php echo $user->username; ?></td>
																	</tr>
																	<tr>
																		<td style="text-align: right">รหัสผ่าน :</td>
																		<td><?php echo $_GET['pwd'];?></td>
																	</tr>
																</table>

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
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กดลิงค์เพื่อยืนยันการลงทะเบียน
														? 
														<?php
		echo CHtml::link ( 'ตกลง', array (
				'RegisterReport/Result2',
				'user_id' => $user->id 
		) )?>



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


