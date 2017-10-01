<form id="Form1" method="POST" enctype="multipart/form-data"
	class="form-horizontal">

	<div class="row">
		<div class="col-md-12">

			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-newspaper-o"></i> ประชาสัมพันธ์
					</div>
					<div class="actions"></div>
				</div>
				<div class="portlet-body">
					<?php echo InformationUtil::genInformation_2();?>
				</div>
			</div>
		</div>
	</div>

	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery.min.js"
		type="text/javascript"></script>

	<script>
jQuery(document).ready(function () {
	
});

</script>
</form>
