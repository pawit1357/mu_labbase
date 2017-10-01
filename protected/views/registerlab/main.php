<?php
$facultys = MFaculty::model ()->findAll ();
$buildings = MBuilding::model ()->findAll ();
$labOperChars = MLabOperChar::model ()->findAll ();
$labTypes = MLabType::model ()->findAll ();
$titles = MTitle::model ()->findAll ();
$dep = MDepartment::model ()->findAll ();
$provinces = MProvince::model ()->findAll ();
$amphurs = MAmphur::model ()->findAll ();
$district = MDistrict::model ()->findAll ();
?>
<form id="Form1" method="post" enctype="multipart/form-data"
	class="form-horizontal">
<!-- 	<input id="isUserOk" type="hidden" value="false" /> <input -->
<!-- 		id="isEmailOk" type="hidden" value="false" /> -->

	<div class="portlet light bordered">
		<div class="portlet-title">
			<i class="icon-settings font-dark"></i> <span
				class="caption-subject font-dark sbold uppercase">ลงทะเบียนห้องปฎิบัติการวิทยาศาสตร์</span>
			<div class="actions">
			<?php echo CHtml::link('ย้อนกลับ',array('Site/LogOut'),array('class'=>'btn btn-default btn-sm'));?>
			</div>
		</div>
		<div class="portlet-body form">
			<div class="form-body">
				<!-- BEGIN FORM-->
				<div class="alert alert-danger display-hide">
					<button class="close" data-close="alert"></button>
					You have some form errors. Please check below.
				</div>
				<div class="alert alert-success display-hide">
					<button class="close" data-close="alert"></button>
					Your form validation is successful!
				</div>

				<h4 class="form-section">&nbsp;ข้อมูลหน่วยงาน</h4>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">หน่วยงานที่สังกัด:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<select class="form-control select2"
									name="LabRegister[faculty_id]" id="faculty_id">
									<option value="0">-- โปรดเลือก --</option>
			<?php foreach($facultys as $item) {?>
			<option value="<?php echo $item->id?>"><?php echo $item->code.'-'.$item->name?></option>
			<?php }?>
								</select>
							</div>
							<div id="divReq-faculty_id"></div>

						</div>
					</div>


				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">เลขที่:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="dep_addr" type="text" value="" class="form-control"
									name="LabRegister[dep_addr]">
							</div>
							<div id="divReq-dep_addr"></div>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">ซอย:<span class="required">*</span></label>
							<div class="col-md-6">
								<input id="dep_soi" type="text" value="" class="form-control"
									name="LabRegister[dep_soi]">
							</div>
							<div id="divReq-dep_soi"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">ถนน:<span class="required">*</span></label>
							<div class="col-md-6">
								<input id="dep_road" type="text" value="" class="form-control"
									name="LabRegister[dep_road]">
							</div>
							<div id="divReq-dep_road"></div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">จังหวัด:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<select class="form-control select2"
									name="LabRegister[dep_province_id]" id="dep_province_id"
									onchange="onchangeProvince(this.value)">
									<option value="0">-- โปรดเลือก --</option>
												<?php foreach($provinces as $item) {?>
			<option value="<?php echo $item->PROVINCE_ID?>"><?php echo $item->PROVINCE_NAME?></option>
			<?php }?>
								</select>
							</div>
							<div id="divReq-dep_province_id"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">เขต/อำเภอ:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<select class="form-control select2"
									name="LabRegister[dep_amphur_id]" id="dep_amphur_id"
									onchange="onchangeAmphur(this.value)">
									<option value="0">-- โปรดเลือก --</option>
								</select>


							</div>
							<div id="divReq-dep_amphur_id"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3"> แขวง/ตำบล:<span
								class="required"> * </span>
							</label>
							<div class="col-md-6">
								<select class="form-control select2"
									name="LabRegister[dep_tambon_id]" id="dep_tambon_id">
									<option value="0">-- โปรดเลือก --</option>
								</select>

							</div>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">รหัสไปรษณีย์:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="dep_zipcode" type="text" value=""
									class="form-control" name="LabRegister[dep_zipcode]">
							</div>
							<div id="divReq-dep_zipcode"></div>
						</div>
					</div>
				</div>

				<h4 class="form-section">&nbsp;ข้อมูลห้องปฏิบัติการ</h4>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">ชื่อห้องปฏิบัติการ:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="lab_name" type="text" value="" class="form-control"
									name="LabRegister[lab_name]">
							</div>
							<div id="divReq-lab_name"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">เลขห้องปฏิบัติการ:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="lab_room_no" type="text" value=""
									class="form-control" name="LabRegister[lab_room_no]">
							</div>
							<div id="divReq-lab_room_no"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">ชั้น:<span class="required">*</span></label>
							<div class="col-md-6">
								<input id="lab_floor" type="text" value="" class="form-control"
									name="LabRegister[lab_floor]">
							</div>
							<div id="divReq-lab_floor"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">อาคาร:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<select class="form-control select2"
									name="LabRegister[building_id]" id="building_id">
									<option value="0">-- โปรดเลือก --</option>
												<?php foreach($buildings as $item) {?>
			<option value="<?php echo $item->id?>"><?php echo $item->code.'-'.$item->name?></option>
			<?php }?>
								</select>


							</div>
							<div id="divReq-building_id"></div>
						</div>
					</div>
				</div>

				<!-- 				<div class="row"> -->
				<!-- 					<div class="col-md-10"> -->
				<!-- 						<div class="form-group"> -->
				<!-- 							<label class="control-label col-md-3">อายุอาคารที่ตั้งห้องปฏิบัติการ:<span -->
				<!-- 								class="required">*</span></label> -->
				<!-- 							<div class="col-md-6"> -->
				<!-- 								<input id="lab_building_age" type="text" value="" -->
				<!-- 									class="form-control" name="LabRegister[lab_building_age]"> -->
				<!-- 							</div> -->
				<!-- 							<div id="divReq-lab_building_age"></div> -->
				<!-- 						</div> -->
				<!-- 					</div> -->
				<!-- 				</div> -->
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">พื้นที่ห้องปฏิบัติการ:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="lab_area" type="text" value="" class="form-control"
									name="LabRegister[lab_area]">
							</div>
							<div id="divReq-lab_area">(หน่วย:ตารางเมตร)</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">จำนวนผู้ใช้งาน:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="lab_number_of_use" type="text" value=""
									class="form-control" name="LabRegister[lab_number_of_use]">
							</div>
							<div id="divReq-lab_number_of_use">(หน่วย:คน)</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">โทรศัพท์:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="lab_telephone" type="text" value=""
									class="form-control" name="LabRegister[lab_telephone]">
							</div>
							<div id="divReq-lab_telephone"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">โทรสาร:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="lab_fax" type="text" value="" class="form-control"
									name="LabRegister[lab_fax]">
							</div>
							<div id="divReq-lab_fax"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">ลักษณะการดำเนินการ:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<select class="form-control select2"
									name="LabRegister[lab_operating_characteristics_id]"
									id="lab_operating_characteristics_id">
									<option value="0">-- โปรดเลือก --</option>
			<?php foreach($labOperChars as $item) {?>
			<option value="<?php echo $item->id?>"><?php echo $item->name?></option>
			<?php }?>
								</select>
							</div>
							<div id="divReq-lab_operating_characteristics_id"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">ประเภทห้องปฏิบัติการ:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<select class="form-control select2"
									name="LabRegister[lab_type_id]" id="lab_type_id">
									<option value="0">-- โปรดเลือก --</option>
			<?php foreach($labTypes as $item) {?>
			<option value="<?php echo $item->id?>"><?php echo $item->code.'-'.$item->name?></option>
			<?php }?>
								</select>
							</div>
							<div id="divReq-lab_type_id"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">หน่วยงาน:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<select class="form-control select2"
									name="LabRegister[dep_department_id]" id="dep_department_id">
									<option value="0">-- โปรดเลือก --</option>
			<?php foreach($dep as $item) {?>
			<option value="<?php echo $item->id?>"><?php echo $item->code.'-'.$item->name?></option>
			<?php }?>
								</select>
							</div>
							<div id="divReq-dep_department_id"></div>
						</div>
					</div>
				</div>

				<h4 class="form-section">&nbsp;ข้อมูลบัญชีผู้ใช้งาน</h4>

				<!-- 				<h4 class="form-section">&nbsp;ข้อมูลหัวหน้าห้องปฏิบัติการ</h4> -->

				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">คำนำหน้าชื่อ:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<select class="form-control select2" name="UsersLogin[title_id]"
									id="title_id">
									<option value="0">-- โปรดเลือก --</option>
			<?php foreach($titles as $item) {?>
			<option value="<?php echo $item->id?>"><?php echo $item->name?></option>
			<?php }?>
								</select>
							</div>
							<div id="divReq-title_id"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">ชื่อ:<span class="required">*</span></label>
							<div class="col-md-6">
								<input id="first_name" type="text" value="" class="form-control"
									name="UsersLogin[first_name]">
							</div>
							<div id="divReq-first_name"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">นามสกุล:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="last_name" type="text" value="" class="form-control"
									name="UsersLogin[last_name]">
							</div>
							<div id="divReq-last_name"></div>
						</div>
					</div>
				</div>
				<!-- 				<div class="row"> -->
				<!-- 					<div class="col-md-10"> -->
				<!-- 						<div class="form-group"> -->
				<!-- 							<label class="control-label col-md-3">เลขประจำตัวประชาชน:<span -->
				<!-- 								class="required">*</span></label> -->
				<!-- 							<div class="col-md-6"> -->
				<!-- 								<input id="lab_head_idcard" type="text" value="" -->
				<!-- 									class="form-control" name="LabRegister[lab_head_idcard]"> -->
				<!-- 							</div> -->
				<!-- 							<div id="divReq-lab_head_idcard"></div> -->
				<!-- 						</div> -->
				<!-- 					</div> -->
				<!-- 				</div> -->
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">ทะเบียนผู้ใช้งาน:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="username" type="text" value=""
									class="form-control" name="UsersLogin[username]">
							</div>
<!-- 							<input id="btnCheckUser" type="button" value="ตรวจสอบผู้ใช้" -->
<!-- 								class="btn blue uppercase" /> -->

							<div id="divReq-username"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">รหัสผ่าน:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="password" type="password" value=""
									class="form-control" name="UsersLogin[password]">
							</div>
							<div id="divReq-password"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">อีเมล์:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="email" type="text" value="" class="form-control"
									name="UsersLogin[email]">
							</div>
<!-- 							<input id="btnCheckEmail" type="button" value="ตรวจสอบอีเมล์" -->
<!-- 								class="btn blue uppercase" /> -->
							<div id="divReq-email"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="control-label col-md-3">โทรศัพท์:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="mobile_phone" type="text" value=""
									class="form-control" name="UsersLogin[mobile_phone]">
							</div>
							<div id="divReq-mobile_phone"></div>
						</div>
					</div>
				</div>

				<!-- 				<div class="row"> -->
				<!-- 					<div class="col-md-10"> -->
				<!-- 						<div class="form-group"> -->
				<!-- 							<label class="control-label col-md-3">โทรศัพท์มือถือ:<span -->
				<!-- 								class="required">*</span></label> -->
				<!-- 							<div class="col-md-6"> -->
				<!-- 								<input id="lab_login_phone" type="text" value="" -->
				<!-- 									class="form-control" name="LabRegister[lab_login_phone]"> -->
				<!-- 							</div> -->
				<!-- 							<div id="divReq-lab_login_phone"></div> -->
				<!-- 						</div> -->
				<!-- 					</div> -->
				<!-- 				</div> -->
				<!-- END FORM-->


			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="button" id="btnSubmit" class="btn green uppercase"><?php echo ConfigUtil::getBtnSaveButton();?></button>
								<?php echo CHtml::link(ConfigUtil::getBtnCancelButton(),array('Users/'),array('class'=>'btn btn-default uppercase'));?>
							</div>
						</div>
					</div>
					<div class="col-md-9"></div>
				</div>
			</div>
		</div>
	</div>



	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo ConfigUtil::getAppName();?>/js/jquery.validate.js"
		type="text/javascript"></script>
	<script>
	var host = 'http://myapps1357.com';
	
	function isValidEmailAddress(emailAddress) {
	    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
	    // alert( pattern.test(emailAddress) );
	    return pattern.test(emailAddress);
	}
	
    function onchangeProvince($id){
    	$.ajax({
		     url: host+"/labbase/index.php/AjaxRequest/GetAmphur",
		     type: "GET",
		     data: { province_id: $id },
		     dataType: "json",
		     success: function (json) {
		            $('#dep_amphur_id').empty();
		            $('#dep_amphur_id').append($('<option>').text('--โปรดเลือก--').attr('value', '0'));
		            $.each(json, function(i, obj){
		                    $('#dep_amphur_id').append($('<option>').text(obj.AMPHUR_NAME).attr('value', obj.AMPHUR_ID));
		            });
		     },
		     error: function (xhr, ajaxOptions, thrownError) {
				alert('ERROR');
		     }
    	});
    }
    
    function onchangeAmphur($id){
    	$.ajax({
		     url: host+"/labbase/index.php/AjaxRequest/GetTambon",
		     type: "GET",
		     data: { amphur_id: $id },
		     dataType: "json",
		     success: function (json) {
		            $('#dep_tambon_id').empty();
		            $('#dep_tambon_id').append($('<option>').text('--โปรดเลือก--').attr('value', '0'));
		            $.each(json, function(i, obj){
		                    $('#dep_tambon_id').append($('<option>').text(obj.DISTRICT_NAME).attr('value', obj.DISTRICT_ID));
		            });
		     },
		     error: function (xhr, ajaxOptions, thrownError) {
				alert('ERROR');
		     }
    	});
    }

    
    jQuery(document).ready(function () {

		
	$( "#btnSubmit" ).click(function() {
	
            	
     
            	if($("#faculty_id").val() == "0"){
            		$("#faculty_id").closest('.form-group').addClass('has-error');
            		$("#divReq-faculty_id").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#faculty_id").focus();
            		return false;
                    }else{
                	$("#divReq-faculty_id").html('');
            		$("#faculty_id").closest('.form-group').removeClass('has-error');
            	}
            	if($("#dep_addr").val().length == 0){
            		$("#dep_addr").closest('.form-group').addClass('has-error');
            		$("#divReq-dep_addr").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#dep_addr").focus();
            		return false;
                    }else{
                	$("#divReq-dep_addr").html('');
            		$("#dep_addr").closest('.form-group').removeClass('has-error');
            	}
            	if($("#dep_soi").val().length == 0){
            		$("#dep_soi").closest('.form-group').addClass('has-error');
            		$("#divReq-dep_soi").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#dep_soi").focus();
            		return false;
                    }else{
                	$("#divReq-dep_soi").html('');
            		$("#dep_soi").closest('.form-group').removeClass('has-error');
            	}
            	if($("#dep_road").val().length == 0){
            		$("#dep_road").closest('.form-group').addClass('has-error');
            		$("#divReq-dep_road").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#dep_road").focus();
            		return false;
                    }else{
                	$("#divReq-dep_road").html('');
            		$("#dep_road").closest('.form-group').removeClass('has-error');
            	}
            	if($("#dep_province_id").val() == "0"){
            		$("#dep_province_id").closest('.form-group').addClass('has-error');
            		$("#divReq-dep_province_id").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#dep_province_id").focus();
            		return false;
                    }else{
                	$("#divReq-dep_province_id").html('');
            		$("#dep_province_id").closest('.form-group').removeClass('has-error');
            	}
            	if($("#dep_amphur_id").val() == "0"){
            		$("#dep_amphur_id").closest('.form-group').addClass('has-error');
            		$("#divReq-dep_amphur_id").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#dep_amphur_id").focus();
            		return false;
                    }else{
                	$("#divReq-dep_amphur_id").html('');
            		$("#dep_amphur_id").closest('.form-group').removeClass('has-error');
            	}
            	if($("#dep_tambon_id").val() == "0"){
            		$("#dep_tambon_id").closest('.form-group').addClass('has-error');
            		$("#divReq-dep_tambon_id").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#dep_tambon_id").focus();
            		return false;
                    }else{
                	$("#divReq-dep_tambon_id").html('');
            		$("#dep_tambon_id").closest('.form-group').removeClass('has-error');
            	}


            	if($("#dep_zipcode").val().length == 0){
            		$("#dep_zipcode").closest('.form-group').addClass('has-error');
            		$("#divReq-dep_zipcode").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#dep_zipcode").focus();
            		return false;
                    }else{
                	$("#divReq-dep_zipcode").html('');
            		$("#dep_zipcode").closest('.form-group').removeClass('has-error');
            	}
            	if($("#lab_name").val().length == 0){
            		$("#lab_name").closest('.form-group').addClass('has-error');
            		$("#divReq-lab_name").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#lab_name").focus();
            		return false;
                    }else{
                	$("#divReq-lab_name").html('');
            		$("#lab_name").closest('.form-group').removeClass('has-error');
            	}
            	if($("#lab_room_no").val().length == 0){
            		$("#lab_room_no").closest('.form-group').addClass('has-error');
            		$("#divReq-lab_room_no").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#lab_room_no").focus();
            		return false;
                    }else{
                	$("#divReq-lab_room_no").html('');
            		$("#lab_room_no").closest('.form-group').removeClass('has-error');
            	}
            	if($("#lab_floor").val().length == 0){
            		$("#lab_floor").closest('.form-group').addClass('has-error');
            		$("#divReq-lab_floor").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#lab_floor").focus();
            		return false;
                    }else{
                	$("#divReq-lab_floor").html('');
            		$("#lab_floor").closest('.form-group').removeClass('has-error');
            	}
            	if($("#building_id").val() == "0"){
            		$("#building_id").closest('.form-group').addClass('has-error');
            		$("#divReq-building_id").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#building_id").focus();
            		return false;
                    }else{
                	$("#divReq-building_id ").html('');
            		$("#building_id ").closest('.form-group').removeClass('has-error');
            	}
            	if($("#lab_area").val().length == 0){
            		$("#lab_area").closest('.form-group').addClass('has-error');
            		$("#divReq-lab_area").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#lab_area").focus();
            		return false;
                    }else{
                	$("#divReq-lab_area").html('');
            		$("#lab_area").closest('.form-group').removeClass('has-error');
            	}
            	if($("#lab_number_of_use").val().length == 0){
            		$("#lab_number_of_use").closest('.form-group').addClass('has-error');
            		$("#divReq-lab_number_of_use").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#lab_number_of_use").focus();
            		return false;
                    }else{
                	$("#divReq-lab_number_of_use").html('');
            		$("#lab_number_of_use").closest('.form-group').removeClass('has-error');
            	}
            	if($("#lab_telephone").val().length == 0){
            		$("#lab_telephone").closest('.form-group').addClass('has-error');
            		$("#divReq-lab_telephone").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#lab_telephone").focus();
            		return false;
                    }else{
                	$("#divReq-lab_telephone").html('');
            		$("#lab_telephone").closest('.form-group').removeClass('has-error');
            	}
            	if($("#lab_fax").val().length == 0){
            		$("#lab_fax").closest('.form-group').addClass('has-error');
            		$("#divReq-lab_fax").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#lab_fax").focus();
            		return false;
                    }else{
                	$("#divReq-lab_fax").html('');
            		$("#lab_fax").closest('.form-group').removeClass('has-error');
            	}
            	if($("#lab_operating_characteristics_id").val() == "0"){
            		$("#lab_operating_characteristics_id").closest('.form-group').addClass('has-error');
            		$("#divReq-lab_operating_characteristics_id").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#lab_operating_characteristics_id").focus();
            		return false;
                    }else{
                	$("#divReq-lab_operating_characteristics_id").html('');
            		$("#lab_operating_characteristics_id").closest('.form-group').removeClass('has-error');
            	}
            	if($("#lab_type_id").val() == "0"){
            		$("#lab_type_id").closest('.form-group').addClass('has-error');
            		$("#divReq-lab_type_id").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#lab_type_id").focus();
            		return false;
                    }else{
                	$("#divReq-lab_type_id").html('');
            		$("#lab_type_id").closest('.form-group').removeClass('has-error');
            	}
            	if($("#dep_department_id").val() == "0"){
            		$("#dep_department_id").closest('.form-group').addClass('has-error');
            		$("#divReq-dep_department_id").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#dep_department_id").focus();
            		return false;
                    }else{
                	$("#divReq-dep_department_id").html('');
            		$("#dep_department_id").closest('.form-group').removeClass('has-error');
            	}

            	if($("#title_id").val() == "0"){
            		$("#title_id").closest('.form-group').addClass('has-error');
            		$("#divReq-title_id").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#title_id").focus();
            		return false;
                    }else{
                	$("#divReq-title_id").html('');
            		$("#title_id").closest('.form-group').removeClass('has-error');
            	}
            	
            	if($("#first_name").val().length == 0){
            		$("#first_name").closest('.form-group').addClass('has-error');
            		$("#divReq-first_name").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#first_name").focus();
            		return false;
                    }else{
                	$("#divReq-first_name").html('');
            		$("#first_name").closest('.form-group').removeClass('has-error');
            	}
            	if($("#last_name").val().length == 0){
            		$("#last_name").closest('.form-group').addClass('has-error');
            		$("#divReq-last_name").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#last_name").focus();
            		return false;
                    }else{
                	$("#divReq-last_name").html('');
            		$("#last_name").closest('.form-group').removeClass('has-error');
            	}

            	
            	if($("#username").val().length == 0){
            		$("#username").closest('.form-group').addClass('has-error');
            		$("#divReq-username").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#username").focus();
            		return false;
                    }else{
                	$("#divReq-username").html('');
            		$("#username").closest('.form-group').removeClass('has-error');
            	}
            	
            	if($("#password").val().length == 0){
            		$("#password").closest('.form-group').addClass('has-error');
            		$("#divReq-password").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#password").focus();
            		return false;
                    }else{
                	$("#divReq-password").html('');
            		$("#password").closest('.form-group').removeClass('has-error');
            	}
            	
            	if($("#email").val().length == 0){
            		$("#email").closest('.form-group').addClass('has-error');
            		$("#divReq-email").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#email").focus();
            		return false;
                    }else{
                	$("#divReq-email").html('');
            		$("#email").closest('.form-group').removeClass('has-error');
            	}
            	
            	if(!isValidEmailAddress($("#email").val())){
            		$("#email").closest('.form-group').addClass('has-error');
            		$("#divReq-email").html("<span id=\"name-error\" class=\"help-block help-block-error\">รูปแบบอีเมล์ไม่ถูกต้อง.</span>");
            		$("#email").focus();
            		return false;
                    }else{
                	$("#divReq-email").html('');
            		$("#email").closest('.form-group').removeClass('has-error');
            	}
            	
				
        		
            	if($("#mobile_phone").val().length == 0){
            		$("#mobile_phone").closest('.form-group').addClass('has-error');
            		$("#divReq-mobile_phone").html("<span id=\"name-error\" class=\"help-block help-block-error\">This field is required.</span>");
            		$("#mobile_phone").focus();
            		return false;
                    }else{
                	$("#divReq-mobile_phone").html('');
            		$("#mobile_phone").closest('.form-group').removeClass('has-error');
            	}
            	
            	
            	/* VALIDATE */
            	$.blockUI({ message: '<h3><img src="/labbase/images/busy.gif" /> Just a moment...</h3>' }); 
            	$.ajax({
		   			     url: host+"/labbase/index.php/AjaxRequest/CheckUser",
		   			     type: "GET",
		   			     data: { user: $('#username').val() },
// 		   			     dataType: "json",
		   			     success: function (json) {
			   			    	if(json == 'false') {
			   	 		      	
		   	            		$("#username").closest('.form-group').addClass('has-error');
		   	            		$("#divReq-username").html("<span id=\"name-error\" class=\"help-block help-block-error\">รหัสผู้ใช้นี้ถูกใช้แล้ว</span>");
		   	            		$("#username").focus();
		   	            		return false;
		   		            }
		   		            else {
			   		            
		   		            	$("#divReq-username").html('');
		   	            		$("#username").closest('.form-group').removeClass('has-error');
		   	            		/////
					            	$.ajax({
						   			     url: host+"/labbase/index.php/AjaxRequest/CheckEmail",
						   			     type: "GET",
						   			     data: { email: $('#email').val() },
// 						   			     dataType: "json",
						   			     success: function (json) {
							   			    	if(json == 'false') {
							   	 		      	
						   	            		$("#email").closest('.form-group').addClass('has-error');
						   	            		$("#divReq-email").html("<span id=\"name-error\" class=\"help-block help-block-error\">อีเมล์นี้ถูกใช้แล้ว</span>");
						   	            		$("#email").focus();
						   	            		return false;
						   		            }
						   		            else {
							   		            
						   		            	$("#divReq-email").html('');
						   	            		$("#email").closest('.form-group').removeClass('has-error');
						   	            		$( "#Form1" ).submit(); 
						   		            }
						   			     },
							   			  complete: function(){
							   				$.unblockUI();
							   		      },
						   			     error: function (xhr, ajaxOptions, thrownError) {
						   					return false;
						   			     }
						   	    	});
		   	            		////
		   		            }
		   			     },
		   			  
			   			  complete: function(){
			   				$.unblockUI();
			   		      },
		   			     error: function (xhr, ajaxOptions, thrownError) {
		   					return false;
		   			     }
		   	    	});
            		 
	   	    	
   			

        	});
        
    });
</script>

</form>