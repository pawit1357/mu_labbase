<form id="Form1" method="post" enctype="multipart/form-data"
	class="form-horizontal">

	<div class="portlet light bordered">
		<div class="portlet-title">
			<i class="icon-settings font-dark"></i> <span
				class="caption-subject font-dark sbold uppercase">ยืนยันการลงทะเบียนห้องปฎิบัติการวิทยาศาสตร์</span>
			<div class="actions">
			<?php echo CHtml::link('ย้อนกลับ',array('Site/LogOut'),array('class'=>'btn btn-default btn-sm'));?>
			</div>
		</div>
		<div class="portlet-body">
			<div class="alert alert-success">
				<p>ลงทะเบียนเรียบร้อยแล้ว &nbsp;&nbsp;	<?php
				echo CHtml::link ( 'LogIn', array (
						'Site/LogOut',
						
				) )?>
		</p>
			</div>


		</div>
	</div>
</form>


