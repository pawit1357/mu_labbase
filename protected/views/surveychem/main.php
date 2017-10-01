<?php
$criteria = new CDbCriteria ();
$dept_id = $_GET ["dept_id"];
if (isset ( $dept_id )) {
	$criteria->condition = "department_id = " . $dept_id;
} else {
	$criteria->condition = "department_id = " . UserLoginUtils::getRegisterInfo ()->dep_department_id;
}
$answers = Answers::model ()->findAll ( $criteria );
if (count ( $answers ) == 0) {
	header ( "Location: " . ConfigUtil::getAppName().'/index.php/DashBoard/NotFoundData' );
}
?>
<head>
<style>
.content_poll {
	width: 100%;
	margin: 0 auto;
	padding: 10px 40px;
	background-color: white;
}

.content_poll .poll {
	position: relative;
	margin-top: 30px;
}

.content_poll .poll .num {
	position: absolute;
	left: -40px;
	top: -5px;
	background: #eeeeee;
	color: #666666;
	padding: 3px 4px;
	font-size: 14px;
	box-shadow: -7px 0px 0px #dddddd;
}

.content_poll .poll p {
	font-weight: 200;
	font-color: green;
	font-size: 16px;
}

.content_poll .poll .choices {
	margin: 10px 0 0 0;
}

.content_poll .poll .choices .choice {
	width: 100%;
	margin: 10px 0;
}

.content_poll .poll .choices .choice label {
	color: #666;
	font-size: 13px;
	margin-left: 5px;
}
</style>
<script
	src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery.min.js"
	type="text/javascript"></script>

<script type="text/javascript">

	function getFilename($id,$elm) {
		 var fn = $($elm).val();
		 
		 $('#fpath_'+$id).val(fn);
			
	}
	
jQuery(document).ready(function () {
});
</script>
</head>
<form id="Form1" method="POST" enctype="multipart/form-data">
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<?php echo  MenuUtil::getMenuName($_SERVER['REQUEST_URI'])?>
			</div>
			<div class="actions">
			<?//php echo CHtml::link('ย้อนกลับ',array('surveyChem/'),array('class'=>'btn btn-default btn-sm'));?>
			</div>
		</div>
		<div class="portlet-body form">
			<div class="form-body">
				<div class="content_poll">

					<div class="panel-group accordion" id="accordion1">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse"
										data-parent="#accordion1" href="#collapse_1"> 1
										การทำงานกับสารเคมี </a>
									</h4>
							
							</div>
							<div id="collapse_1" class="panel-collapse in">
								<div class="panel-body">
									<br><p class="list-datetime bold uppercase font-red"> 1.1 การบริการจัดการด้านความปลอดภัยทางเคมี</p>

									<div class="poll">
										<!-- 										<div class="num">1.1.1</div> -->
										<h6>1.1.1
											มีการแต่งตั้งคณะกรรมการที่กำกับดูแลงานด้านความปลอดภัยทางเคมี?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[1.1.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.1A", "1")?>
													id="rd111A">ไม่มี คาดว่าจะมีการดำเนินการเสร็จสิ้นภายใน <input
													id="answer_text_111A" name="answer_texts[1.1.1A]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.1.1A", "")?>"
													style="border: none; border-bottom-style: dotted;">
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[1.1.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.1A", "0")?>
													id="rd111A">มี (โปรดแนบสำเนาคำสั่งแต่งตั้งคณะกรรมการ) <label>
													<input name="answer_files[]" type="file"
													style="display: none;" onchange='getFilename("111A",this)' /><a>&nbsp;&nbsp;<i
														class="fa fa-paperclip"></i></a>
												</label> <input id="fpath_111A" placeholder=""
													disabled="disabled" style="border: none;"
													value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "1.1.1A", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "1.1.1A", "") != ''){?>
<a title="Download" class="fa fa-download"
													href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "1.1.1A", "")?>"></a>
												<input type="hidden" name="tmpPath[1.1.1A]"
													value="<?php echo  QuestionUtil::getAnswerValue($answers, "4", "1.1.1A", "")?>">
<?php }?>

							</div>
										</div>
									</div>
									<!-- END -->
									<div class="poll">
										<!-- 										<div class="num">1.1.2</div> -->
										<h6>1.1.2 มีแผนงานความปลอดภัยทางเคมีที่ครอบคลุ่มด้านต่าง ?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[1.1.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.2A", "1")?>
													id="rd112A">ไม่มีแผน คาดว่าจะมีการดำเนินการเสร็จสิ้นภายใน <input
													id="answer_text_112A"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.1.2A", "")?>"
													name="answer_texts[1.1.2A]" type="text"
													style="border: none; border-bottom-style: dotted;">
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[1.1.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.2A", "0")?>
													id="rd112A">มีแผน <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.1.2B.1]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.2B.1", "1")?>
													id="answer_choices_5">ด้านการปฏิบัติงานที่เกี่ยวข้องกับการใช้งานเคมีที่มีผลต่อสุขภาพ
												<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.1.2B.2]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.2B.2", "1")?>
													id="answer_choices_6">ด้านการโต้ตอบเหตุฉุกเฉินกรณีเกิดอุบัติเหตุจากสารเคมี
												<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.1.2B.3]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.2B.3", "1")?>
													id="answer_choices_7">ด้านการสำรวจความเสี่ยงด้านความปลอดภัยทางเคมี
												<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.1.2B.4]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.2B.4", "1")?>
													id="answer_choices_8">ด้านการตรวจประเมินและติดตามความปลอดภัยในห้องปฏิบัติการเคมี
												<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.1.2B.5]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.2B.5", "1")?>
													id="ck112B5">อื่น ๆ โปรดระบุ <input
													name="answer_texts[1.1.2B.5]" type="text"
													id="answer_text_112B5"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.1.2B.5", "")?>"
													style="border: none; border-bottom-style: dotted;">
											</div>
										</div>
									</div>
									<!-- END -->
									<div class="poll">
										<!-- 										<div class="num">1.1.3</div> -->
										<h6>1.1.3
											ส่วนงานมีการจัดทำเอกสารด้านความปลอดภัยในห้องปฏิบัติการ?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[1.1.3A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.3A", "1")?>
													id="rd113A">ไม่มี คาดว่าจะมีการดำเนินการเสร็จสิ้นภายใน <input
													id="answer_text_113A" name="answer_texts[1.1.3A]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.1.3A", "")?>"
													style="border: none; border-bottom-style: dotted;">
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[1.1.3A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.3A", "0")?>
													id="rd113A">มี <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.1.3B.1]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.3B.1", "1")?>
													id="answer_choices_12">คู่มือ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.1.3B.2]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.3B.2", "1")?>
													id="answer_choices_13">แนวปฏิบัติ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.1.3B.3]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.3B.3", "1")?>
													id="answer_choices_14">กฎ/ระเบียบ/ข้อบังคับ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.1.3B.4]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.3B.4", "1")?>
													id="ck113B4">อื่น ๆ โปรดระบุ <input id="answer_text_113B4"
													name="answer_texts[1.1.3B.4]" type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.1.3B.4", "")?>"
													style="border: none; border-bottom-style: dotted;">

											</div>
										</div>
									</div>
									<!-- END -->

									<!-- 1.2 -->
									<br><p class="list-datetime bold uppercase font-red">1.2 การบริหารจัดการของเสียสารเคมี</p>
									<div class="poll">
										<!-- 										<div class="num">1.2.1</div> -->
										<h6>1.2.1
											มีระบบบันทึกข้อมูลของเสียสารเคมีที่เกิดขึ้นในส่วนงาน?</h6>
										<div class="choices">
											<div class="choice">
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เอกสาร <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.2.1A.1]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.1A.1", "1")?>
													id="answer_choices_16">ไม่มี <br>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.2.1A.2]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.1A.2", "1")?>
													id="answer_choices_17">มี
											</div>
											<div class="choice">
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อิเล็กทรอนิกส์ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.2.1B.1]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.1B.1", "1")?>
													id="answer_choices_18">ไม่มี <br>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.2.1B.2]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.1B.2", "1")?>
													id="answer_choices_19">มี
											</div>
										</div>
									</div>
									<!-- END -->

									<div class="poll">
										<!-- 										<div class="num">1.2.2</div> -->
										<h6>1.2.2
											มีการจัดทำรายงานสรุปผลข้อมูลของเสียสารเคมีที่เกิดขึ้นในส่วนงาน?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[1.2.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.2A", "1")?>
													id="rd122A">ไม่มี <input id="answer_text_122A"
													name="answer_texts[1.2.2A]" type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.2A", "")?>"
													style="border: none; border-bottom-style: dotted;">
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[1.2.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.2A", "0")?>
													id="rd122A">มี
												(โปรดแนบรายงานสรุปผลข้อมูลประเภทและปริมาณของเสียสารเคมีประจำปี)<label>
													<input name="answer_files[]" type="file"
													style="display: none;" onchange='getFilename("122A",this)' /><a>&nbsp;&nbsp;<i
														class="fa fa-paperclip"></i></a> <input id="fpath_122A"
													placeholder="" disabled="disabled" style="border: none;"
													value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "1.2.2A", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "1.2.2A", "") != ''){?>
<a title="Download" class="fa fa-download"
													href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "1.2.2A", "")?>"></a>
													<input type="hidden" name="tmpPath[1.2.2A]"
													value="<?php echo  QuestionUtil::getAnswerValue($answers, "4", "1.2.2A", "")?>">
<?php }?>
								</label>
											</div>
										</div>
									</div>
									<!-- END -->
									<div class="poll">
										<!-- 										<div class="num">1.2.3</div> -->
										<h6>1.2.3
											มีการจัดแยกประเภทของเียสารเคมีตามเกณฑ์ของมหาวิทยาลัยมหิดล (MU
											ChemWaste)?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[1.2.3A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.3A", "1")?>
													id="rd123A">ไม่มีการแยกประเภท
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[1.2.3A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.3A", "0")?>
													id="rd123A">มีการแยกประเภทตามเกณฑ์อื่น (โปรดระบุ) <input
													id="answer_text_123A" name="answer_texts[1.2.3A]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.3A", "")?>"
													style="border: none; border-bottom-style: dotted;">
											</div>
										</div>
									</div>
									<!-- END -->
									<div class="poll">
										<!-- 										<div class="num">1.2.4</div> -->
										<h6>1.2.4
											มีการแยกพื้นที่จัดกเก็บของเสียสารเคมีที่เหมาะสมและมีป้ายระบุอันตรายอย่างชัดเจน?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[1.2.4A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.4A", "1")?>
													id="answer_choices_24">ไมมี
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[1.2.4A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.4A", "0")?>
													id="answer_choices_25">มี สถานที่จัดเก็บ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="checkbox" value="1"
													name="answer_choices[1.2.4B.1]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.4B.1", "1")?>
													id="answer_choices_26">เก็บในห้องปฏิบัติการ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="checkbox" value="1"
													name="answer_choices[1.2.4B.2]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.4B.2", "1")?>
													id="answer_choices_27">มีอาคารจัดเก็บของเสียสารเคมีประจำส่วนงาน
												**โปรดระบุตำแหน่งพื้นที่จัดเก็บพร้อมแนบภาพประกอบ** <label> <input
													name="answer_files[]" type="file" style="display: none;"
													onchange='getFilename("124B2",this)' /><a>&nbsp;&nbsp;<i
														class="fa fa-paperclip"></i></a></label> <input
													id="fpath_124B2" placeholder="" disabled="disabled"
													style="border: none;"
													value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "1.2.4B.2", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "1.2.4B.2", "") != ''){?>
<a title="Download" class="fa fa-download"
													href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "1.2.4B.2", "")?>"></a>
												<input type="hidden" name="tmpPath[1.2.4B.2]"
													value="<?php echo  QuestionUtil::getAnswerValue($answers, "4", "1.2.4B.2", "")?>">
<?php }?>
							</div>
										</div>
									</div>
									<!-- END -->
									<div class="poll">
										<!-- 										<div class="num">1.2.5</div> -->
										<h6>1.2.5
											มีผู้รับผิดชอบ/หน่วยงานที่ดูแลเรื่องการบริหารจัดการของเสียสารเคมี?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[1.2.5A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.5A", "1")?>
													id="rd125A">ไม่มี
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[1.2.5A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.5A", "0")?>
													id="rd125A">มี <input id="answer_text_125A"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.5A", "")?>"
													name="answer_texts[1.2.5A]" type="text"
													style="border: none; border-bottom-style: dotted;"
													placeholder="**โปรดระบุ ชื่อ / ตำแหน่ง / หน่วยงาน **">
											</div>
										</div>
									</div>
									<!-- END -->
									<div class="poll">
										<!-- 										<div class="num">1.2.6</div> -->
										<h6>1.2.6
											มีการกำหนดแนวปฏิบัติในการบริหารจัดการของเสียสารเคมีระดับส่วนงาน?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[1.2.6A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.6A", "1")?>
													id="answer_choices_30">ไม่มี
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[1.2.6A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.6A", "0")?>
													id="answer_choices_31">มี ** โปรดแนบเอกสาร ** <label> <input
													name="answer_files[]" type="file" style="display: none;"
													onchange='getFilename("126A",this)' /><a>&nbsp;&nbsp;<i
														class="fa fa-paperclip"></i></a></label> <input
													id="fpath_126A" placeholder="" disabled="disabled"
													style="border: none;"
													value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "1.2.6A", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "1.2.6A", "") != ''){?>
<a title="Download" class="fa fa-download"
													href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "1.2.6A", "")?>"></a>
												<input type="hidden" name="tmpPath[1.2.6A]"
													value="<?php echo  QuestionUtil::getAnswerValue($answers, "4", "1.2.6A", "")?>">
<?php }?>
							</div>
										</div>
									</div>
									<!-- END -->

									<div class="poll">
										<!-- 										<div class="num">1.2.7</div> -->
										<h6>1.2.7
											มีแนวทางปฏิบัติหรือมาตราการในการลดการเกิดของเสียสารเคมีในห้องปฏิบัติการ/ส่วนงาน?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[1.2.7A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.7A", "0")?>
													id="answer_choices_32">ไม่มี
											</div>
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[1.2.7A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.7A", "1")?>
													id="answer_choices_33">มี ** โปรดแนบเอกสาร
												วิธีการ/มาตราการลดการเกิดของเสียสารเคมี** <label> <input
													name="answer_files[]" type="file" style="display: none;"
													onchange='getFilename("127A",this)' /><a>&nbsp;&nbsp;<i
														class="fa fa-paperclip"></i></a></label> <input
													id="fpath_127A" placeholder="" disabled="disabled"
													style="border: none;"
													value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "1.2.7A", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "1.2.7A", "") != ''){?>
<a title="Download" class="fa fa-download"
													href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "1.2.7A", "")?>"></a>
												<input type="hidden" name="tmpPath[1.2.7A]"
													value="<?php echo  QuestionUtil::getAnswerValue($answers, "4", "1.2.7A", "")?>">
<?php }?>

							</div>
										</div>
									</div>
									<!-- END -->

									<div class="poll">
										<!-- 										<div class="num">1.2.8</div> -->
										<h6>1.2.8 การส่งของเสียสารเคมีไปกำจัดโดย?</h6>
										<div class="choices">
											<div class="choice">
												บริษัท <input id="answer_text_34"
													name="answer_texts[1.2.8.1]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.8.1", "")?>"
													type="text"
													style="border: none; border-bottom-style: dotted;"> ปีละ <input
													id="answer_text_35" name="answer_texts[1.2.8.2]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.8.2", "")?>"
													type="text"
													style="border: none; border-bottom-style: dotted;"> ครั้ง
											</div>
											<div class="choice"></div>
										</div>
									</div>
									<!-- END -->

									<div class="poll">
										<!-- 										<div class="num">1.2.9</div> -->
										<h6>1.2.9 ค่าใช้จ่ายในการส่งกำจัดของเสียสารเคมี?</h6>
										<div class="choices">
											<div class="choice">
												<input id="answer_text_36" name="answer_texts[1.2.9]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.9", "")?>"
													type="text"
													style="border: none; border-bottom-style: dotted;"> บาท/ปี
											</div>
											<div class="choice"></div>
										</div>
									</div>
									<!-- END -->

									<!-- 1.3 -->
									<br><p class="list-datetime bold uppercase font-red">1.3 ระบบตรวจติดตาม / ประเมินผล</p>
									<div class="poll">
										<!-- 										<div class="num">1.3.1</div> -->
										<h6>1.3.1 มีห้องปฏิบัติการวิทยาศาสตร์ทางเคมีจำนวน?</h6>
										<div class="choices">
											<div class="choice">
												<input id="answer_text_37" name="answer_texts[1.3.1]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.3.1", "")?>"
													type="text"
													style="border: none; border-bottom-style: dotted;">ห้อง
											</div>
											<div class="choice"></div>
										</div>
									</div>
									<div class="poll">
										<!-- 										<div class="num">1.3.2</div> -->
										<h6>1.3.2
											มีระบบตรวจติดตามเพื่อให้เกิดความปลอดภัยในห้องปฏิบัติการวิทยาศาสตร์ทางเคมี?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[1.3.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.3.2A", "1")?>
													id="rd132A">ไม่มี
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[1.3.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.3.2A", "0")?>
													id="rd132A">มี ผ่านระบบ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.3.2B.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.3.2B.1A", "1")?>
													id="ck132B1A">ESPRel Checklists ความถื่ในการติดตาม <input
													id="answer_text_132B1A" name="answer_texts[1.3.2B.1A]"
													value="	<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.3.2B.1A", "")?>"
													type="text"
													style="border: none; border-bottom-style: dotted;">ครั้ง /
												ปี <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.3.2B.1B]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.3.2B.1B", "1")?>
													id="ck132B1B">อื่น ๆ (โปรดระบุชื่อและความถี่) <input
													id="answer_text_132B1B" name="answer_texts[1.3.2B.1B]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.3.2B.1B", "")?>"
													type="text"
													style="border: none; border-bottom-style: dotted;">ครั้ง /
												ปี
											</div>
										</div>
									</div>
									<div class="poll">
										<!-- 										<div class="num">1.3.3</div> -->
										<h6>1.3.3
											ห้องปฏิบัติการวิทยาศาสตร์ทางเคมีที่มีการตรวจประเมินด้านความปลอดภัย?</h6>
										<div class="choices">
											<div class="choice">
												มีการลงทะเบียนห้องปฏิบัติการ<input id="answer_text_42"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.3.3.1", "")?>"
													name="answer_texts[1.3.3.1]" type="text"
													style="border: none; border-bottom-style: dotted;">ห้อง
											</div>
											<div class="choice">
												ทำการตรวจประเมิน ESPRel Checklists<input id="answer_text_43"
													name="answer_texts[1.3.3.2]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.3.3.2", "")?>"
													type="text"
													style="border: none; border-bottom-style: dotted;">ห้อง <br>ผ่านมาตรฐาน
												(ระดับคะแนนไม่น้อยกว่า 80 เปอร์เซ็นต์)<input
													id="answer_text_44" name="answer_texts[1.3.3.3]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.3.3.3", "")?>"
													type="text"
													style="border: none; border-bottom-style: dotted;">ห้อง
											</div>
										</div>
									</div>
									<div class="poll">
										<!-- 										<div class="num">1.3.4</div> -->
										<h6>1.3.4
											มีการนำข้อมูลจากการตรวจติดตามมาใช้วิเคราะห์และจัดทำแผนพัฒนายกระดับความปลอดภัยในห้องปฏิบัติการทางเคมี
											(โปรดระบุวิธีการดำเนินงาน ระยะเวลาดำเนินงาน ผลการดำเนินงาน
											ปัญหาและอุปสรรค)?</h6>
										<div class="choices">
											<div class="choice">
												<textarea rows="5" cols="20" style="width: 500px"
													name="answer_texts[1.3.4]">
									<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.3.4", "")?>
									</textarea>

											</div>
											<div class="choice"></div>
										</div>
									</div>
									<!-- END -->

									<!-- 1.4 -->
									<br><p class="list-datetime bold uppercase font-red">1.4 ระบบการจัดการเครื่องมือที่ใช้ในห้องปฏิบัติการ</p>
									<div class="poll">
										<!-- 										<div class="num">2.3.1</div> -->
										<h6>2.3.1
											มีระบบการตรวจสอบเครื่งมือให้มีความปลอดภัยและพร้อมใช้งาน?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[1.3.1]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.3.1", "1")?>
													id="rd231">ไม่มี
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[1.3.1]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.3.1", "0")?>
													id="rd231">มี โปรดระบุวิธีการดำเนินการ <input
													id="answer_text_231" name="answer_texts[1.3.1]" type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.3.1", "")?>"
													style="border: none; border-bottom-style: dotted;">

											</div>
										</div>
									</div>
									<!-- END -->

									<!-- 1.5 -->
									<br><p class="list-datetime bold uppercase font-red">1.5 การรายงานการเกิดอุบัติเหตุที่เกี่ยวข้องกับการใช้สารเคมี
										หรือที่เกิดขึ้นในห้องปฏิบัติการทางวิทยาศาสตร์ทางเคมี</p>

									<div class="poll">
										<!-- 										<div class="num">1.5.1</div> -->
										<h6>1.5.1 มีระบบการแจ้งเหตุ หรือการรายงานการเกิดอุบัติเหตุ?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[1.5.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.5.1A", "1")?>
													id="rd151A">ไม่มี
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[1.5.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.5.1A", "0")?>
													id="rd151A">มี ผ่านระบบ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.5.1B.1]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.5.1B.1", "1")?>
													id="ck151B1">เอกสาร <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.5.1B.2]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.5.1B.2", "1")?>
													id="ck151B2">อิเล็กทรอนิกส์ (โปรดระบุชื่อ)<input
													id="answer_text_151B2" name="answer_texts[1.5.1B.2]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.5.1B.2", "")?>"
													style="border: none; border-bottom-style: dotted;">

											</div>
										</div>
									</div>
									<div class="poll">
										<!-- 										<div class="num">1.5.2</div> -->
										<h6>1.5.2 ความถี่ในการเกิดอุบัติเหตุ?</h6>
										<div class="choices">
											<div class="choice">
												<input id="answer_text_52" name="answer_texts[1.5.2]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.5.2", "")?>"
													type="text"
													style="border: none; border-bottom-style: dotted;">ครั้ง/ปี
											</div>
											<div class="choice"></div>
										</div>
									</div>
									<div class="poll">
										<!-- 										<div class="num">1.5.3</div> -->
										<h6>1.5.3 ความเสียหายจากการเกิดอุบัติเหตุ?</h6>
										<div class="choices">
											<div class="choice">
												เสียชีวิต จำนวน <input id="answer_text_53"
													name="answer_texts[1.5.3.1]" type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.5.3.1", "")?>"
													style="border: none; border-bottom-style: dotted;">ราย/ปี <br>บาดเจ็บ/เจ็บป่วย/
												จำนวน <input id="answer_text_54"
													name="answer_texts[1.5.3.2]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.5.3.2", "")?>"
													type="text"
													style="border: none; border-bottom-style: dotted;">ราย/ปี <br>ทรัพย์สินเสียหาย
												จำนวน <input id="answer_text_55"
													name="answer_texts[1.5.3.3]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.5.3.3", "")?>"
													type="text"
													style="border: none; border-bottom-style: dotted;">ราย/ปี
											</div>
											<div class="choice"></div>
										</div>
									</div>
									<div class="poll">
										<!-- 										<div class="num">1.5.4</div> -->
										<h6>1.5.4 มีรายงานการสอบสวนอุบัติเหตุ?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[1.5.4A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.5.4A", "1")?>
													id="answer_choices_56">ไม่มี
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[1.5.A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.5.4A", "0")?>
													id="answer_choices_57">มี
											</div>
										</div>
									</div>
									<div class="poll">
										<!-- 										<div class="num">1.5.5</div> -->
										<h6>1.5.5
											มีมาตรการ/วิธีการการดำเนินการแก้ไขและป้องกันการเกิดซ้ำ?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[1.5.5A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.5.5A", "1")?>
													id="rd155A">ไม่มี
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[1.5.5A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.5.5A", "0")?>
													id="rd155A">มี (โปรดระบุ)<input id="answer_text_155A"
													name="answer_texts[1.5.5B]" type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.5.5B", "")?>"
													style="border: none; border-bottom-style: dotted;">
											</div>
										</div>
									</div>
									<!-- END -->

									<!-- 1.6 -->
									<br><p class="list-datetime bold uppercase font-red">1.6 การบริหารจัดการความเสี่ยง</p>
									<div class="poll">
										<!-- 										<div class="num">1.6.1</div> -->
										<h6>1.6.1 มีการประเมินความเสี่ยงครอบคลุมเรื่องต่อไปนี้
											(พร้อมแนบแบบประเมินความเสี่ยง)?</h6>
										<div class="choices">
											<div class="choice">
												<input type="checkbox" value="1"
													name="answer_choices[1.6.1.1]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.6.1.1", "1")?>
													id="answer_choices_60">สารเคมี การใช้ การเก็บ และการทิ้ง <br>
												<input type="checkbox" value="1"
													name="answer_choices[1.6.1.2]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.6.1.2", "1")?>
													id="answer_choices_61">ผลกระทบด้านสุขภาพจากการทำงานกับสารเคมี
												<br> <input type="checkbox" value="1"
													name="answer_choices[1.6.1.3]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.6.1.3", "1")?>
													id="answer_choices_62">พื้นที่ในการทำงาน/สิ่งแวดล้อมในสถานที่ทำงาน
												<br> <input type="checkbox" value="1"
													name="answer_choices[1.6.1.4]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.6.1.4", "1")?>
													id="answer_choices_63">เครื่องมือที่ใช้ในการทำงาน <br> <input
													type="checkbox" value="1" name="answer_choices[1.6.1.5]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.6.1.5", "1")?>
													id="answer_choices_64">กิจกรรมที่ทำในห้องปฏิบัติการ
											</div>
											<div class="choice"></div>
										</div>
									</div>
									<div class="poll">
										<!-- 										<div class="num">1.6.2</div> -->
										<h6>1.6.2
											มีการนำข้อมูลจากรายงานการบริหารความเสี่ยงมาใช้ประโยชน์?</h6>
										<div class="choices">
											<div class="choice">
												<input type="checkbox" value="1"
													name="answer_choices[1.6.2.1]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.6.2.1", "1")?>
													id="answer_choices_65">จัดทำมาตราฐานขั้นตอนการปฏิบัติงาน
												(Standard Operating Procedure) <br> <input type="checkbox"
													value="1" name="answer_choices[1.6.2.2]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.6.2.2", "1")?>
													id="answer_choices_66">การสอน แนะนำ อบรมแก่ผู้ปฏิบัติงาน <br>
												<input type="checkbox" value="1"
													name="answer_choices[1.6.2.3]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.6.2.3", "1")?>
													id="answer_choices_67">การประเมินผล ทบทวน และวางแผนปรับปรุง
												การบริหารความเสี่ง <br> <input type="checkbox" value="1"
													name="answer_choices[1.6.2.4]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.6.2.4", "1")?>
													id="answer_choices_68">การจัดสรรงบประมาณในการบริหารความเสี่ยง
											</div>
											<div class="choice"></div>
										</div>
									</div>
									<div class="poll">
										<!-- 										<div class="num">1.6.3</div> -->
										<h6>1.6.3 มีเอกสาร บันทึก ข้อมูลต่อไปนี้อยู่ในห้องปฏิบัติการ?</h6>
										<div class="choices">
											<div class="choice">
												<input type="checkbox" value="1"
													name="answer_choices[1.6.3.1]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.6.3.1", "1")?>
													id="answer_choices_69">เอกสารด้านข้อมูลความปลอดภัย (SDS) <br>
												<input type="checkbox" value="1"
													name="answer_choices[1.6.3.2]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.6.3.2", "1")?>
													id="answer_choices_70">คู่มือการปฏิบัติงาน (SOP) <br>
											</div>
											<div class="choice"></div>
										</div>
									</div>
									<!-- END -->

								</div>
							</div>
						</div>

					</div>


					<div class="form-actions">
						<button type="submit" class="btn blue"><?php echo ConfigUtil::getBtnSaveButton();?></button>
						<button type="button" class="btn default"><?php echo ConfigUtil::getBtnCloseName();?></button>
					</div>
				</div>


			</div>
		</div>
	</div>



	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery.min.js"
		type="text/javascript"></script>

	<script>
	jQuery(document).ready(function () {

		   $('input[type=radio]').click(function(){
			   switch(this.id){
			   	case "rd111A":
				   	switch(this.value){
					   	case "0":
						   	$('#answer_text_111A').val('');
					   	break;
				   	}
				break;
			   	case "rd112A":
				   	switch(this.value){
					   	case "0":
						   	$('#answer_text_112A').val('');
						   	$('#answer_text_112B5').val('');
//				 			ck112B5
					   	break;
					   	case "1":	
						   	$('#answer_text_112B5').val('');
					   		
						   	break;
				   	}
				break;
			   	case "rd113A":
				   	switch(this.value){
					   	case "0":
						   	$('#answer_text_113A').val('');
							
// 							ck113B4
					   	break;
					   	case "1":
					   		$('#answer_text_113B4').val('');
						   	break;
				   	}
				break;
			   	case "rd122A":
				   	switch(this.value){
					   	case "0":
						   	$('#answer_text_122A').val('');
					   	break;
				   	}
				break;
			   	case "rd123A":
				   	switch(this.value){
					   	case "1":
						   	$('#answer_text_123A').val('');
					   	break;
				   	}
				break;
			   	case "rd125A":
				   	switch(this.value){
					   	case "1":
						   	$('#answer_text_125A').val('');
					   	break;
				   	}
				break;
			   	case "rd132A":

				   	switch(this.value){
					   	case "1":
						   	$('#answer_text_132B1A').val('');
						  	$('#answer_text_132B1B').val('');
// 						  	ck132B1A
// 						  	ck132B1B
					   	break;
				   	}
				break;
			   	case "rd231":
				   	switch(this.value){
					   	case "1":
						   	$('#answer_text_231').val('');
					   	break;
				   	}
				break;
			   	case "rd151A":
				   	switch(this.value){
					   	case "1":
						   	$('#answer_text_151B2').val('');
// 						   	ck151B1
// 						   	ck151B1
					   	break;
				   	}
				break;
			   	case "rd155A":
				   	switch(this.value){
					   	case "1":
						   	$('#answer_text_155A').val('');
					   	break;
				   	}
				break;
			   }
		    });
		    
		   $('input[type=checkbox]').click(function(){
			   switch(this.id){
			   	case "ck112B5":
			   	   	if(!this.checked){
					   	$('#answer_text_112B5').val('');
				   	}
	 				break;
			   	case "ck113B4":
			   	   	if(!this.checked){
			   	 		$('#answer_text_113B4').val('');
				   	}
	 				break;
			   	case "ck132B1A":
			   	   	if(!this.checked){
			   	   		$('#answer_text_132B1A').val('');
				   	}
	 				break;
			   	case "ck132B1B":
			   	   	if(!this.checked){
			   	   		$('#answer_text_132B1B').val('');
				   	}
	 				break;
			   	case "ck151B2":
			   	   	if(!this.checked){
					   	$('#answer_text_151B2').val('');
				   	}
	 				break;
	 				
				   	
			   }
		    });

		    
		});

</script>

</form>