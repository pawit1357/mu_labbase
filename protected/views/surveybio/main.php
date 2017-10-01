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

.content_poll .poll h2 {
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
			<?//php echo CHtml::link('ย้อนกลับ',array('surveyBio/'),array('class'=>'btn btn-default btn-sm'));?>
			</div>
		</div>
		<div class="portlet-body form">
			<div class="form-body">


				<div class="panel-group accordion" id="accordion1">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse"
									data-parent="#accordion1" href="#collapse_1"> 2
									การทำงานด้านความปลอดภัยทางชีวภาพ </a>
							</div>
						</div>
						<div id="collapse_1" class="panel-collapse in">
							<div class="panel-body">
							
								<p  class="list-datetime bold uppercase font-red">2.1 การบริหารจัดการด้านความปลอดภัยทางชีวภาพ</p>
								<div class="poll">
									<!-- 									<div class="num">2.1.1</div> -->
									<h6>2.1.1 มีการแต่งตั้งคณะกรรมการความปลอดภัยทางชีวภาพ
										ระดับส่วนงาน (Institute Biosafety Committee; IBC-ส่วนงาน)</h6>

									<div class="choices">
										<div class="choice">
											<div class="choice">
												<input type="radio" value="1" name="answers_choices[2.1.1A]"
													id="rd211A"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.1A", "1")?>
													id="answers_choices_211A">มี
												(โปรดแนบสำเนาคำสั่งแต่งตั้งคณะกรรมการ) <label> <input
													name="answer_files[]" type="file" style="display: none;"
													onchange='getFilename("211A",this)' /><a>&nbsp;&nbsp;<i
														class="fa fa-paperclip"></i></a></label> <input
													id="fpath_211A" placeholder="" disabled="disabled"
													style="border: none;"
													value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "2.1.1A", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "2.1.1A", "") != ''){?>
<a title="Download" class="fa fa-download"
													href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "2.1.1A", "")?>"></a>
												<input type="hidden" name="tmpPath[2.1.1A]"
													value="<?php echo  QuestionUtil::getAnswerValue($answers, "4", "2.1.1A", "")?>">
<?php }?>

											
								</div>
											<div class="choice">
												<input type="radio" value="0" name="answers_choices[2.1.1A]"
													id="rd211A"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.1A", "0")?>
													id="answers_choices_2">ไม่มี
												คาดว่าจะมีการดำเนินการเสร็จสิ้นภายใน <input
													id="answer_text_211A" name="answer_texts[2.1.1A]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.1.1A", "") ?>"
													style="border: none; border-bottom-style: dotted;">
											</div>
										</div>
									</div>
								</div>
								<!-- END -->
								<div class="poll">
									<!-- 									<div class="num">2.1.2</div> -->
									<h6>2.1.2 มีเจ้าหน้าที่ความปลอดภัยทางชีวภาพ (Biosafety Officer;
										BSO) หรือผู้รับผิดชอบดูแลงานด้านความปลอดภัยทางชีวภาพ</h6>

									<div class="choices">
										<div class="choice">

											<input type="radio" value="1" name="answers_choices[2.1.2A]"
												id="rd212A"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.2A", "1")?>
												id="answers_choices_3">มี (โปรดระบุ) <input
												id="answer_text_212A" name="answer_texts[2.1.2A]"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.1.2A", "") ?>"
												type="text"
												style="border: none; border-bottom-style: dotted;"
												placeholder="">
										</div>

										<div class="choice">
											<input type="radio" value="0" name="answers_choices[2.1.2A]"
												id="rd212A"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.2A", "0")?>
												id="answers_choices_4">ไม่มี
										</div>
									</div>
								</div>
								<!-- END -->

								<div class="poll">
									<!-- 									<div class="num">2.1.3</div> -->
									<h6>2.1.3 มีแผนงานด้านความปลอดภัยทางชีวภาพที่ครอบคลุมด้านต่าง
										ๆ?</h6>
									<div class="choices">
										<div class="choice">
											<input type="radio" value="1" name="answers_choices[2.1.3A]"
												id="rd213A"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.3A", "1")?>>มีแผน
											<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
												type="checkbox" value="1" name="answers_choices[2.1.3.1]"
												id="ck2131"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.3.1", "1")?>>ด้านการปฏิบัติงานที่เกี่ยวข้องกับการเชื้อจุลินทรีย์ก่อโรค
											สิ่งมีชีวิตดัดแปลงพันธุกรรมและแมลงพาหะที่มีผลต่อสุขภาพ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
												type="checkbox" value="1" name="answers_choices[2.1.3.2]"
												id="ck2132"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.3.2", "1")?>>ด้านการโต้ตอบเหตุฉุกเฉินกรณีเกิดอุบัติเหตุจากสารชีวภาพ
											<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
												type="checkbox" value="1" name="answers_choices[2.1.3.3]"
												id="ck2133"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.3.3", "1")?>>ด้านการสำรวจความเสี่ยงด้านความปลอดภัยทางชีวภาพ
											<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
												type="checkbox" value="1" name="answers_choices[2.1.3.4]"
												id="ck2134"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.3.4", "1")?>>ด้านการตรวจประเมินและติดตามความปลอดภัยในห้องปฏิบัติการทางชีวภาพ
											<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
												type="checkbox" value="1" name="answers_choices[2.1.3.5]"
												id="ck2135"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.3.5", "1")?>>อื่น
											ๆ (โปรดระบุ) <input id="answer_text_2135"
												name="answer_texts[2.1.3.5]" type="text"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.1.3.5", "") ?>"
												style="border: none; border-bottom-style: dotted;">
										</div>
										<div class="choice">
											<input type="radio" value="0" name="answers_choices[2.1.3A]"
												id="rd213A"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.3A", "0")?>>ไม่มีแผน
											คาดว่าจะมีการดำเนินการเสร็จสิ้นภายใน <input
												id="answer_text_213A" name="answer_texts[2.1.3A]"
												type="text"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.1.3A", "") ?>"
												style="border: none; border-bottom-style: dotted;">
										</div>
									</div>
								</div>
								<!-- END -->
								<div class="poll">
									<!-- 									<div class="num">2.1.4</div> -->
									<h6>2.1.4 มีการจดแจ้งการครอบครองเชื้อโรคและพิษจากสัตว์ ตาม พรบ.
										เชื้อโรคและพิษจากสัตว์?</h6>
									<div class="choices">
										<div class="choice">
											<input type="radio" value="1" name="answers_choices[2.1.4A]"
												id="rd214A"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.4A", "1")?>
												id="answers_choices_12">มี
											(โปรดแนบสำเนาหนังสือรับรองการจดแจ้งและรายการจดแจ้งตามแบบ
											จจ.ช.๑) <label> <input name="answer_files[]" type="file"
												style="display: none;" onchange='getFilename("214A",this)' /><a>&nbsp;&nbsp;<i
													class="fa fa-paperclip"></i></a></label> <input
												id="fpath_214A" placeholder="" disabled="disabled"
												style="border: none;"
												value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "2.1.4A", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "2.1.4A", "") != ''){?>
<a title="Download" class="fa fa-download"
												href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "2.1.4A", "")?>"></a>
											<input type="hidden" name="tmpPath[2.1.4A]"
												value="<?php echo  QuestionUtil::getAnswerValue($answers, "4", "2.1.4A", "")?>">
<?php }?>
								</div>
										<div class="choice">
											<input type="radio" value="0" name="answers_choices[2.1.4A]"
												id="rd214A"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.4A", "0")?>
												id="answers_choices_13">ไม่มี
											คาดว่าจะมีการดำเนินการเสร็จสิ้นภายใน <input
												id="answer_text_214A"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.1.4A", "") ?>"
												name="answer_texts[2.1.4A]" type="text"
												style="border: none; border-bottom-style: dotted;"
												placeholder="">
										</div>

									</div>
								</div>
								<!-- END -->

								<div class="poll">
									<!-- 									<div class="num">2.1.5</div> -->
									<h6>2.1.5 มีห้องปฏิบัติการทางชีวภาพ จำนวน?</h6>
									<div class="choices">
										<div class="choice">
											BSL1 จำนวน <input id="answer_text_14"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.1.5.1", "") ?>"
												name="answer_texts[2.1.5.1]" type="text"
												style="border: none; border-bottom-style: dotted;">ห้อง <br>BSL1
											จำนวน<input id="answer_text_15"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.1.5.2", "") ?>"
												name="answer_texts[2.1.5.2]" type="text"
												style="border: none; border-bottom-style: dotted;">ห้อง <br>BSL2
											จำนวน<input id="answer_text_16" name="answer_texts[2.1.5.3]"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.1.5.3", "") ?>"
												type="text"
												style="border: none; border-bottom-style: dotted;">ห้อง <br>BSL3
											จำนวน<input id="answer_text_17" name="answer_texts[2.1.5.4]"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.1.5.4", "") ?>"
												type="text"
												style="border: none; border-bottom-style: dotted;">ห้อง
										</div>
										<div class="choice"></div>
									</div>
								</div>
								<!-- END -->
								<div class="poll">
									<!-- 									<div class="num">2.1.6</div> -->
									<h6>2.1.6 ส่วนงานมีการจัดทำเอกสารด้านความปลอดภัยทางชีวภาพ?</h6>
									<div class="choices">
										<div class="choice">
											<input type="radio" value="1" name="answers_choices[2.1.6A]"
												id="rd216A"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.6A", "1")?>>มี
											<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
												type="checkbox" value="1" name="answers_choices[2.1.6A.1]"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.6A.1", "1")?>
												id="ck216A1">คู่มือ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
												type="checkbox" value="1" name="answers_choices[2.1.6A.2]"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.6A.2", "1")?>
												id="ck216A2">แนวปฏิบัติ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
												type="checkbox" value="1" name="answers_choices[2.1.6A.3]"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.6A.3", "1")?>
												id="ck216A3">กฎ/ระเบียบ/ข้อบังคับ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
												type="checkbox" value="1" name="answers_choices[2.1.6A.4]"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.6A.4", "1")?>
												id="ck216A4">อื่น ๆ (โปรดระบุ) <input id="answer_text_216A4"
												name="answer_texts[2.1.6A.4]" type="text"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.1.6A.4", "") ?>"
												style="border: none; border-bottom-style: dotted;">

										</div>
										<div class="choice">
											<input type="radio" value="0" name="answers_choices[2.1.6A]"
												id="rd216A"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.6A", "0")?>
												id="answers_choices_23">ไม่มี
											คาดว่าจะมีการดำเนินการเสร็จสิ้นภายใน <input
												id="answer_text_216A" name="answer_texts[2.1.6A]"
												type="text"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.1.6A", "") ?>"
												style="border: none; border-bottom-style: dotted;">
										</div>
									</div>
								</div>
								<!-- END -->
								<div class="poll">
									<!-- 									<div class="num">2.1.7</div> -->
									<h6>2.1.7 มีการเคลื่อนย้ายหรือขนส่งสารชีวภาพ/วัตถุชีวภาพ?</h6>
									<div class="choices">
										<div class="choice">
											<input type="radio" value="1" name="answers_choices[2.1.7A]"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.7A", "1")?>
												id="answers_choices_24">มี
											**โปรดระบุรายละเอียดหรือแนบเอสการที่เกี่ยวข้อง เช่น
											คู่มือการปฏิบัติงาน ** <label> <input name="answer_files[]"
												type="file" style="display: none;"
												onchange='getFilename("217A",this)' /><a>&nbsp;&nbsp;<i
													class="fa fa-paperclip"></i></a></label> <input
												id="fpath_217A" placeholder="" disabled="disabled"
												style="border: none;"
												value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "2.1.7A", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "2.1.7A", "") != ''){?>
<a title="Download" class="fa fa-download"
												href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "2.1.7A", "")?>"></a>
											<input type="hidden" name="tmpPath[2.1.7A]"
												value="<?php echo  QuestionUtil::getAnswerValue($answers, "4", "2.1.7A", "")?>">
<?php }?>


								</div>
										<div class="choice">
											<input type="radio" value="0" name="answers_choices[2.1.7A]"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.7A", "0")?>
												id="answers_choices_25">ไม่มี
										</div>
									</div>
								</div>
								<!-- END -->
								<div class="poll">
									<!-- 									<div class="num">2.1.8</div> -->
									<h6>2.1.8
										ผู้ที่ปฏิบัติงานในห้องปฏิบัติการทางชีวภาพได้รับการสร้างภูมิคุ้มกันต่อเชื้อที่ต้นปฏิบัติงานตามความเหมาะสม?</h6>
									<div class="choices">
										<div class="choice">
											<input type="radio" value="1" name="answers_choices[2.1.8A]"
												id="rd218A"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.8A", "1")?>
												id="answers_choices_26">มี **โปรดระบุรายละเอียด ** <input
												id="answer_text_218A" name="answer_texts[2.1.8A]"
												type="text"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.1.8A", "") ?>"
												style="border: none; border-bottom-style: dotted;">
										</div>
										<div class="choice">
											<input type="radio" value="0" name="answers_choices[2.1.8A]"
												id="rd218A"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.1.8A", "0")?>
												id="answers_choices_27">ไม่มี
										</div>
									</div>
								</div>
								<br>
								<!-- END -->
								<p class="list-datetime bold uppercase font-red">2.2 การบริหารจัดการของเสียอันตรายชีวภาพ/ขยะติดเชื้อ</p>
								<div class="poll">
									<!-- 									<div class="num">2.2.1</div> -->
									<h6>2.2.1 มีการแยกประเภทขยะ/ของเสียจากห้องปฏิบัติการทางชีวภาพ?</h6>
									<div class="choices">
										<div class="choice">
											<input type="radio" value="1" name="answers_choices[2.2.1A]"
												id="rd221A"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.2.1A", "1")?>
												id="answers_choices_28">มี จัดแยกเป็น <input
												id="answer_text_221A1" name="answer_texts[2.2.1A.1]"
												type="text"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.2.1A.1", "") ?>"
												style="border: none; border-bottom-style: dotted;"> ประเภท
											โปรดระบุ <input id="answer_text_221A2"
												name="answer_texts[2.2.1A.2]" type="text"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.2.1A.2", "") ?>"
												style="border: none; border-bottom-style: dotted;">
										</div>
										<div class="choice">
											<input type="radio" value="0" name="answers_choices[2.2.1A]"
												id="rd221A"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.2.1A", "0")?>
												id="answers_choices_30">ไม่มี
										</div>
									</div>
								</div>
								<!-- END -->
								<div class="poll">
									<!-- 									<div class="num">2.2.2</div> -->
									<h6>2.2.2 มีการลดการปนเปื้นอและการจัดการของเสียทางชีวภาพ?</h6>
									<div class="choices">
										<div class="choice">
											<input type="radio" value="1" name="answers_choices[2.2.2A]"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.2.2A", "1")?>
												id="answers_choices_31">มี **โปรดแนบเอกสาร
											วิธีการหรือมาตรการที่เกี่ยวข้อง** <label> <input
												name="answer_files[]" type="file" style="display: none;"
												onchange='getFilename("222A",this)' /><a>&nbsp;&nbsp;<i
													class="fa fa-paperclip"></i></a></label> <input
												id="fpath_222A" placeholder="" disabled="disabled"
												style="border: none;"
												value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "2.2.2A", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "2.2.2A", "") != ''){?>
<a title="Download" class="fa fa-download"
												href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "2.2.2A", "")?>"></a>
											<input type="hidden" name="tmpPath[2.2.2A]"
												value="<?php echo  QuestionUtil::getAnswerValue($answers, "4", "2.2.2A", "")?>">
<?php }?>



								</div>
										<div class="choice">
											<input type="radio" value="0" name="answers_choices[2.2.2A]"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.2.2A", "0")?>
												id="answers_choices_32">ไม่มี
										</div>
									</div>
								</div>
								<!-- END -->
								<div class="poll">
									<!-- 									<div class="num">2.2.3</div> -->
									<h6>2.2.3 การส่งกำจัดของเสียอันตรายทางชีวภาพ/ขยะติดเชื้อ?</h6>
									<div class="choices">
										<div class="choice">
											** โปรดระบุรายละเอียดการดำเนินการ บริษัทที่รับจำกัด
											และความถี่ในการส่งกำจัด <input id="answers_text_33"
												name="answer_texts[2.2.3]" type="text"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.2.3", "") ?>"
												style="border: none; border-bottom-style: dotted;">
										</div>
										<div class="choice"></div>
									</div>
								</div>
								<!-- END -->
<br>
								<p class="list-datetime bold uppercase font-red">2.3
									การดำเนินงานโครงการที่ส่งเสริม/สนับสนุนงานด้านความปลดภัยทางชีวภาพ</p>

								<div class="poll">
									<!-- 									<div class="num">2.3.1</div> -->
									<h6>2.3.1
										มีการฝึกอบรมความปลอดภัยทางชีวภาพให้กับผู้ที่ปฏิบัติงานในห้องปฏิบัติการทางชีวภาพ?</h6>
									<div class="choices">
										<div class="choice">
											<input type="radio" value="1" name="answers_choices[2.3.1A]"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.3.1A", "1")?>
												id="answers_choices_34">มี
										</div>
										<div class="choice">
											<input type="radio" value="0" name="answers_choices[2.3.1A]"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.3.1A", "0")?>
												id="answers_choices_35">ไม่มี
										</div>
									</div>
								</div>
								<!-- END -->
								<div class="poll">
									<!-- 									<div class="num">2.3.2</div> -->
									<h6>2.3.2
										มีการทบทวนความรู้ด้านความปลอดภัยทางชีวภาพให้กับผู้ที่ปฏิบัติงานในห้องปฏิบัติการทางชีวภาพอย่างน้อยปีละ
										1 ครั้ง?</h6>
									<div class="choices">
										<div class="choice">
											<input type="radio" value="1" name="answers_choices[2.3.2A]"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.3.2A", "1")?>
												id="answers_choices_36">มี
										</div>
										<div class="choice">
											<input type="radio" value="0" name="answers_choices[2.3.2A]"
												<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.3.2A", "0")?>
												id="answers_choices_37">ไม่มี
										</div>
									</div>
								</div>
								<!-- END -->
								<div class="poll">
									<!-- 									<div class="num">2.3.3</div> -->
									<h6>2.3.3โครงการ/การดำเนินงาน
										ที่ส่งเสริมและสนับสนุนงานด้านความปลดภัยทางชีวภาพ?</h6>
									<div class="choices">
										<div class="choice">
											<input id="answers_text_38" name="answer_texts[2.3.3]"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.3", "") ?>"
												type="text"
												style="border: none; border-bottom-style: dotted;">
										</div>
										<div class="choice"></div>
									</div>
								</div>
								<!-- END -->
								<div class="poll">
									<!-- 									<div class="num">2.3.4</div> -->
									<h6>2.3.4 ข้อบกพร่อง ปัญหา และอุปสรรคในการปฏิบัติงาน?</h6>
									<div class="choices">
										<div class="choice">
											<input id="answers_text_39" name="answer_texts[2.3.4]"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.4", "") ?>"
												type="text"
												style="border: none; border-bottom-style: dotted;">
										</div>
										<div class="choice"></div>
									</div>
								</div>
								<!-- END -->
<br>
								<div class="poll">
									<!-- 									<div class="num">2.4</div> -->
									<p class="list-datetime bold uppercase font-red">2.4 สรุปผลโครงการวิจัยด้านความปลอดภัยทางชีวภาพ ระดับ
										BSL1-3? </p>
									<div class="choices">
										<div class="choice">
											ระดับ BSL 1 <input id="answers_text_40"
												name="answer_texts[2.4.1]" type="text"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.4.1", "") ?>"
												style="border: none; border-bottom-style: dotted;"> โครงการ
											<br> ระดับ BSL 2 <input id="answers_text_40"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.4.2", "") ?>"
												name="answer_texts[2.4.2]" type="text"
												style="border: none; border-bottom-style: dotted;"> โครงการ
											<br> ระดับ BSL 3 <input id="answers_text_40"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.4.3", "") ?>"
												name="answer_texts[2.4.3]" type="text"
												style="border: none; border-bottom-style: dotted;"> โครงการ
										</div>
										<div class="choice">

											<table id="gvResult" border="1">
												<thead>
													<tr>
														<th style="text-align: center;">&nbsp;&nbsp;&nbsp;ลำดับ&nbsp;&nbsp;&nbsp;</th>
														<th style="text-align: center;">&nbsp;&nbsp;&nbsp;โครงการวิจัย&nbsp;&nbsp;&nbsp;</th>
														<th style="text-align: center;">&nbsp;&nbsp;&nbsp;หัวหน้าโครงการวิจัย&nbsp;&nbsp;&nbsp;</th>
														<th style="text-align: center;">&nbsp;&nbsp;&nbsp;BSL
															Level&nbsp;&nbsp;&nbsp;</th>
														<th style="text-align: center;">&nbsp;&nbsp;&nbsp;Date of
															Approval&nbsp;&nbsp;&nbsp;</th>
														<th style="text-align: center;">&nbsp;&nbsp;&nbsp;Date of
															Expiration&nbsp;&nbsp;&nbsp;</th>
														<th style="text-align: center;">&nbsp;&nbsp;&nbsp;หมายเหตุ&nbsp;&nbsp;&nbsp;</th>
													
													
													<tr>
												
												</thead>
												<tbody>
						<?php
						$order = 1;
						$index = 4;
						for($x = 43; $x < 53; $x ++) {
							echo '<tr>';
							echo '<td  style="text-align: center;">' . $order . '</td>';
							for($y = 1; $y <= 6; $y ++) {
								echo '<td>&nbsp;&nbsp;&nbsp;<input id="answers_text_2.4.' . $index . '" name="answer_texts[2.4.' . $index . ']" type="text" value="' . (QuestionUtil::getAnswerValue ( $answers, CommonUtil::TEXT_TYPE, "2.4." . $index, "" )) . '"  style="border: none; border-bottom-style: dotted;width:100px;">&nbsp;&nbsp;&nbsp;</td>';
								$index ++;
							}
							echo '</tr>';
							$order ++;
						}
						?>
						</tbody>
											</table>
										</div>
									</div>

								</div>
							</div>
						</div>

					</div>
				</div>



				<div class="content_poll">


					<!-- END -->
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
		   	case "rd211A":
			   	switch(this.value){
				   	case "1":$('#answer_text_211A').val('');break;
			   	}
			break;
		   	case "rd212A":
			   	switch(this.value){
				   	case "0":$('#answer_text_212A').val('');break;
	   			}
	   		break;
		   	case "rd213A":
			   	switch(this.value){
				   	case "1":
					   	$('#answer_text_213A').val('');
					   	break;
				   	case "0":
				   		
// 				   		$('#ck2131').prop('checked', false);
// 				   		$('#ck2132').prop('checked', false);
// 				   		$('#ck2133').prop('checked', false);
// 				   		$('#ck2134').prop('checked', false);
// 				   		$('#ck2135').prop('checked', false);

				   		$('#answer_text_2135').val('');
				   		
					   	break;
	   			}
	   		break;
		   	case "rd214A":
			   	switch(this.value){
				   	case "1":$('#answer_text_214A').val('');break;
	   			}
	   		break;
	   		
		   	case "rd216A":
			   	switch(this.value){
				   	case "1":
					   	$('#answer_text_216A').val('');
				   	case "0":
// 				   		$('#ck216A1').attr('checked', false);
// 				   		$('#ck216A2').attr('checked', false);
// 				   		$('#ck216A3').attr('checked', false);
// 				   		$('#ck216A4').attr('checked', false);
				   		$('#answer_text_216A4').val('');
				   		
					   	break;
				   	break;
	   			}
	   		break;
		   	case "rd218A":
			   	switch(this.value){
				   	case "0":$('#answer_text_218A').val('');break;
	   			}
	   		break;
		   	case "rd221A":
			   	switch(this.value){
				   	case "0":
					   	$('#answer_text_221A1').val('');
					   	$('#answer_text_221A2').val('');
				   	break;
	   			}
	   		break;

	   		
		   }
	    });
	    
	   $('input[type=checkbox]').click(function(){
		   switch(this.id){
		   	case "ck2135":
			   	if(!this.checked){
				   	$('#answer_text_2135').val('');
			   	}
			   	break;
		   	case "ck216A4":
			   	if(!this.checked){
				   	$('#answer_text_216A4').val('');
			   	}
			   	break;
			   	
		   }
	    });

	   
	    
});

</script>

</form>